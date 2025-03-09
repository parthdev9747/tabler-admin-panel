<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\DataTables\ProductCategoriesDataTable;
use App\Http\Requests\ProductCategoryRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductCategoryController extends Controller implements HasMiddleware
{
    protected $moduleName;
    protected $moduleRoute;
    protected $moduleView = "product_categories";
    protected $model;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:list-product-category|add-product-category|edit-product-category|delete-product-category', only: ['index']),
            new Middleware('permission:add-product-category', only: ['create', 'store']),
            new Middleware('permission:edit-product-category', only: ['edit', 'update']),
            new Middleware('permission:delete-product-category', only: ['destroy']),
        ];
    }

    public function __construct(ProductCategory $model)
    {
        $this->moduleName = ucfirst(__('messages.product_category'));
        $this->moduleRoute = url('product-category');
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    public function index(ProductCategoriesDataTable $dataTable)
    {
        return $dataTable->render($this->moduleView . '.index');
    }

    public function create()
    {
        $data['categories'] = $this->model->where('status', 'active')->get();
        return view('general.create', $data);
    }

    public function store(ProductCategoryRequest $request)
    {
        try {
            $productCategory = $this->model->create([
                'name' => trim($request->name),
                'p_id' => $request->p_id,
                'sequence' => $request->sequence ?? 0
            ]);

            if ($productCategory) {
                return redirect($this->moduleRoute)->with('success', __('messages.product_category') . ' ' . __('messages.created_successfully'));
            } else {
                return redirect($this->moduleRoute)->with('error', __('messages.went_wrong'));
            }
        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $data['result'] = $this->model->where('id', $id)->first();
        $data['categories'] = $this->model->where('status', 'active')
            ->where('id', '!=', $id)
            ->get();
        return view('general.edit', $data);
    }

    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        try {
            $updated = $productCategory->update([
                'name' => trim($request->name),
                'p_id' => $request->p_id,
                'sequence' => $request->sequence ?? 0
            ]);

            if ($updated) {
                return redirect($this->moduleRoute)->with('success', __('messages.product_category') . ' ' . __('messages.updated_successfully'));
            } else {
                return redirect($this->moduleRoute)->with('error', __('messages.went_wrong'));
            }
        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $response = [];
        $data = $this->model->where('id', $id)->first();
        if ($data) {

            $hasChildren = $this->model->where('p_id', $id)->exists();

            if ($hasChildren) {
                $response['message'] = __('messages.product_category') . ' has child categories. Please delete them first.';
                $response['status'] = false;
            } else {
                $data->delete();
                $response['message'] = __('messages.product_category') . ' ' . __('messages.deleted_successfully');
                $response['status'] = true;
            }
        } else {
            $response['message'] = $this->moduleName . " not Found!";
            $response['status'] = false;
        }
        return response()->json($response);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $response = [];
        $data = $this->model->findOrFail($id);
        if ($data) {
            $status = ($data->status == 'inactive') ? 'active' : 'inactive';
            $data->status = $status;
            $data->save();

            $response['message'] = __('messages.product_category') . ' ' . __('messages.updated_successfully');
            $response['status'] = true;
        } else {
            $response['message'] = __('messages.product_category') . " not Found!";
            $response['status'] = false;
        }
        return response()->json($response);
    }
}

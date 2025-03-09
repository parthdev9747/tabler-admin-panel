<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GlassCategory;
use App\DataTables\GlassCategoriesDataTable;
use App\Http\Requests\GlassCategoryRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GlassCategoryController extends Controller implements HasMiddleware
{
    protected $moduleName;
    protected $moduleRoute;
    protected $moduleView = "glass_categories";
    protected $model;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:glass-category-list|glass-category-create|glass-category-edit|glass-category-delete', only: ['index']),
            new Middleware('permission:glass-category-create', only: ['create', 'store']),
            new Middleware('permission:glass-category-edit', only: ['edit', 'update']),
            new Middleware('permission:glass-category-delete', only: ['destroy']),
        ];
    }

    public function __construct(GlassCategory $model)
    {
        $this->moduleName = ucfirst(__('messages.glass_category'));
        $this->moduleRoute = url('glass-category');
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    public function index(GlassCategoriesDataTable $dataTable)
    {
        return $dataTable->render($this->moduleView . '.index');
    }

    public function create()
    {
        $data['categories'] = $this->model->where('status', 'active')->get();
        return view('general.create', $data);
    }

    public function store(GlassCategoryRequest $request)
    {
        try {
            $glassCategory = $this->model->create([
                'name' => trim($request->name),
                'p_id' => $request->p_id,
                'sequence' => $request->sequence ?? 0
            ]);

            if ($glassCategory) {
                return redirect($this->moduleRoute)->with('success', __('messages.glass_category') . ' ' . __('messages.created_successfully'));
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

    public function update(GlassCategoryRequest $request, GlassCategory $glassCategory)
    {
        try {
            $updated = $glassCategory->update([
                'name' => trim($request->name),
                'p_id' => $request->p_id,
                'sequence' => $request->sequence ?? 0
            ]);

            if ($updated) {
                return redirect($this->moduleRoute)->with('success', __('messages.glass_category') . ' ' . __('messages.updated_successfully'));
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
            // Check if there are child categories
            $hasChildren = $this->model->where('p_id', $id)->exists();

            if ($hasChildren) {
                $response['message'] = __('messages.glass_category') . ' has child categories. Please delete them first.';
                $response['status'] = false;
            } else {
                $data->delete();
                $response['message'] = __('messages.glass_category') . ' ' . __('messages.deleted_successfully');
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

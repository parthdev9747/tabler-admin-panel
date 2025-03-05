<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\DataTables\PermissionsDataTable;
use App\Http\Requests\PermissionRequest;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{
    protected $moduleName;
    protected $moduleRoute;
    protected $moduleView = "permissions";
    protected $model;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:permission-list|permission-create|permission-edit|permission-delete', only: ['index']),
            new Middleware('permission:permission-create', only: ['index', 'store']),
            new Middleware('permission:permission-edit', only: ['edit', 'update']),
            new Middleware('permission:permission-delete', only: ['destroy']),
        ];
    }

    public function __construct(Permission $model)
    {

        $this->moduleName = ucfirst(__('messages.permission'));
        $this->moduleRoute = url('permission');
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    public function index(PermissionsDataTable $dataTable)
    {
        return $dataTable->render($this->moduleView . '.index');
    }

    public function create()
    {
        return view('general.create');
    }

    public function store(PermissionRequest $request)
    {
        try {
            $permission = $this->model->create(["name" => strtolower(trim($request->name)), 'group_name' => strtolower(trim($request->group_name))]);
            if ($permission) {
                return redirect($this->moduleRoute)->with('success', __('messages.permission') . ' ' . __('messages.created_successfully'));
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
        return view('general.edit', $data);
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        try {
            $permission = $permission->update(["name" => strtolower(trim($request->name)), 'group_name' => strtolower(trim($request->group_name))]);
            if ($permission) {
                return redirect($this->moduleRoute)->with('success', __('messages.permission') . ' ' . __('messages.updated_successfully'));
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
            $data->delete();
            $response['message'] = __('messages.permission') . ' ' . __('messages.deleted_successfully');
            $response['status'] = true;
        } else {
            $response['message'] = $this->moduleName . " not Found!";
            $response['status'] = false;
        }
        return response()->json($response);
    }
}

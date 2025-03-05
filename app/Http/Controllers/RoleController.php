<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\DataTables\RolesDataTable;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    protected $moduleName;
    protected $moduleRoute;
    protected $moduleView = "roles";
    protected $model;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:role-list|role-create|role-edit|role-delete', only: ['index']),
            new Middleware('permission:role-create', only: ['index', 'store']),
            new Middleware('permission:role-edit', only: ['edit', 'update']),
            new Middleware('permission:role-delete', only: ['destroy']),
        ];
    }

    function __construct(Role $model)
    {

        $this->moduleName = ucfirst(__('messages.role'));
        $this->moduleRoute = url('role');
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    public function index(RolesDataTable $dataTable)
    {
        return $dataTable->render($this->moduleView . '.index');
    }

    public function create()
    {
        $permission = Permission::get();
        $data['groupedPermissions'] = $permission->groupBy('group_name')->all();
        return view('general.create', $data);
    }

    public function store(RoleRequest $request)
    {
        try {

            $permissionsID = array_map(
                function ($value) {
                    return (int)$value;
                },
                $request->input('permission')
            );

            $role = $this->model->create(['name' => $request->input('name')]);
            $role->syncPermissions($permissionsID);

            if ($role) {
                return redirect($this->moduleRoute)->with('success', __('messages.role') . ' ' . __('messages.created_successfully'));
            } else {
                return redirect($this->moduleRoute)->with('error', __('messages.went_wrong'));
            }
        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $data['result'] = $role;
        $permission = Permission::get();
        $data['groupedPermissions'] = $permission->groupBy('group_name')->all();
        $data['rolePermissions'] = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('general.edit', $data);
    }

    public function update(RoleRequest $request, Role $role)
    {
        try {

            $role->update(['name' => strtolower(trim($request->name))]);

            $permissionsID = array_map(
                function ($value) {
                    return (int)$value;
                },
                $request->input('permission')
            );

            $role->syncPermissions($permissionsID);

            if ($role) {
                return redirect($this->moduleRoute)->with('success', __('messages.role') . ' ' . __('messages.updated_successfully'));
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
            $response['message'] = __('messages.role') . ' ' . __('messages.deleted_successfully');
            $response['status'] = true;
        } else {
            $response['message'] = $this->moduleName . " not Found!";
            $response['status'] = false;
        }
        return response()->json($response);
    }
}

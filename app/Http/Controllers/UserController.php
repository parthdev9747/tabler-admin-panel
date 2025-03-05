<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Models\User;
use Hash;
use DB;
use Illuminate\Support\Arr;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class UserController extends Controller implements HasMiddleware
{
    protected $moduleName;
    protected $moduleRoute;
    protected $moduleView = "users";
    protected $model;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:user-list|user-create|user-edit|user-delete', only: ['index']),
            new Middleware('permission:user-create', only: ['index', 'store']),
            new Middleware('permission:user-edit', only: ['edit', 'update']),
            new Middleware('permission:user-delete', only: ['destroy']),
        ];
    }

    function __construct(User $model)
    {

        $this->moduleName = ucfirst(__('messages.user'));
        $this->moduleRoute = url('user');
        $this->model = $model;

        View::share('module_name', $this->moduleName);
        View::share('module_route', $this->moduleRoute);
        View::share('module_view', $this->moduleView);
    }

    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function create()
    {
        $data['roles'] = Role::pluck('name', 'name')->all();
        return view('general.create', $data);
    }

    public function store(UserRequest $request)
    {
        try {

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = $this->model->create($input);
            $user->assignRole($request->input('role'));

            if ($user) {
                return redirect($this->moduleRoute)->with('success', __('messages.user') . ' ' . __('messages.created_successfully'));
            } else {
                return redirect($this->moduleRoute)->with('error', __('messages.went_wrong'));
            }
        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $data['result'] = User::find($id);
        $data['roles'] = Role::pluck('name', 'name')->all();
        $data['userRole'] = $data['result']->roles->pluck('name', 'name')->all();

        return view('general.edit', $data);
    }

    public function update(UserRequest $request, User $user)
    {
        try {

            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }

            $user->update($input);
            DB::table('model_has_roles')->where('model_id', $user->id)->delete();

            $user->assignRole($request->input('role'));

            if ($user) {
                return redirect($this->moduleRoute)->with('success', __('messages.user') . ' ' . __('messages.updated_successfully'));
            } else {
                return redirect($this->moduleRoute)->with('error', __('messages.went_wrong'));
            }
        } catch (\Exception $e) {
            return redirect($this->moduleRoute)->with('error', $e->getMessage());
        }
    }
}

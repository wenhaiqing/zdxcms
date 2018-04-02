<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    protected $role;
    protected $permission;

    public function __construct(Role $role,Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index(Role $role)
    {
        $this->authorize('view',$role);
        $roles = $this->role->paginate(config('admin.global.paginate'));

        return view(getThemeView('roles.index'),compact('roles'));
    }

    public function create()
    {
        $role = $this->role;
        $this->authorize('create',$role);
        $permissions = $this->permission->get()->pluck('name','remarks');
        $rolePermissions = [];
        return view(getThemeView('roles.create_and_edit'),compact('role','permissions','rolePermissions'));

    }

    public function store(Request $request, Role $role)
    {
        $this->authorize('create',$role);
        $role = Role::create($request->only(['name','remarks']));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->givePermissionTo($permissions);
        return redirect()->route('roles.index')->with('success', trans('global.stored'));
    }

    public function edit(Role $role)
    {
        $this->authorize('update',$role);
        $permissions = Permission::get()->pluck('name','remarks')->toArray();
        $rolePermissions = $role->permissions()->pluck('name', 'name')->toArray();

       return view(getThemeView('roles.create_and_edit'), compact('role','permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('update',$role);
        $role->update($request->only(['name','remarks']));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', trans('global.updated'));
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);
        $role->delete();
        return redirect()->route('roles.index')->with('success', trans('global.destoried'));
    }


}

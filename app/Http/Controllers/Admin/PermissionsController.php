<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Services\Admin\PermissionService;
class PermissionsController extends Controller
{
    protected $permissionService;



    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;


    }

    public function index(Permission $permission)
    {
        $this->authorize('view',$permission);
        $permission = $permission->get()->toArray();
        $permissions = $this->permissionService->tree($permission);
        return view(getThemeView('permissions.index'),compact('permissions'));

    }

    public function create(Permission $permission)
    {
        $this->authorize('create',$permission);
        $res = $permission->get()->toArray();
        $permissions = $this->permissionService->tree($res);
        return view(getThemeView('permissions.create_and_edit'),compact('permission','permissions'));
    }

    public function store(Request $request,Permission $permission)
    {
        $this->authorize('create',$permission);
        $res = $permission->create($request->only(['name','remarks','icon','url','status','sort','pid']));
        return redirect()->route('permissions.index')->with('success',trans('global.stored'));

    }

    public function edit(Permission $permission)
    {
        $this->authorize('update',$permission);
        $res = $permission->get()->toArray();
        $permissions = $this->permissionService->tree($res);
        return view(getThemeView('permissions.create_and_edit'),compact('permission','permissions'));
    }

    public function update(Request $request , Permission $permission)
    {
        $this->authorize('update',$permission);
        $permission->update($request->only(['name','remarks','icon','url','status','sort','pid']));

        return redirect()->route('permissions.index')->with('success',trans('global.updated'));
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('delete',$permission);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', trans('global.destoried'));
    }

}

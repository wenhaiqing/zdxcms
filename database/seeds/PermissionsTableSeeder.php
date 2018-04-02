<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // 重置角色和权限的缓存
        app()['cache']->forget('spatie.permission.cache');

        $system = Permission::create([
            'name' => "manage_system",
            'pid' => 0,
            'icon' => "fa fa-cog",
            'url' => "zdxadmin",
            'status' =>1,
            'remarks' => "系统管理",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        $users = Permission::create([
            'name' => "manage_users",
            'pid' => $system->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/users",
            'status'=>1,
            'remarks' => "用户管理",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        Permission::create([
            'name' => "create_users",
            'pid' => $users->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/users/create",
            'remarks' => "添加用户",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_users",
            'pid' => $users->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/users",
            'remarks' => "修改用户",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_users",
            'pid' => $users->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/users",
            'remarks' => "删除用户",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $roles = Permission::create([
            'name' => "manage_roles",
            'pid' => $system->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/roles",
            'status' =>1,
            'remarks' => "角色管理",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "create_roles",
            'pid' => $roles->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/roles/create",
            'remarks' => "添加角色",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_roles",
            'pid' => $roles->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/roles",
            'remarks' => "修改角色",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_roles",
            'pid' => $roles->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/roles/create",
            'remarks' => "删除角色",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $permissions = Permission::create([
            'name' => "manage_permission",
            'pid' => $system->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/permissions",
            'status' => 1,
            'remarks' => "权限管理",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "create_permission",
            'pid' => $permissions->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/permissions/create",
            'remarks' => "添加权限",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_permission",
            'pid' => $permissions->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/permissions",
            'remarks' => "修改权限",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_permission",
            'pid' => $permissions->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/permissions",
            'remarks' => "删除权限",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

    }
}

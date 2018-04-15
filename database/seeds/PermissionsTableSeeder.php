<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use App\Models\Wechat;

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

        $wechat = Permission::create([
            'name' => "manage_wechats",
            'pid' => $system->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/wechats",
            'status' => 1,
            'remarks' => "微信管理",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "create_wechats",
            'pid' => $wechat->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/wechats/create",
            'remarks' => "添加微信",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_wechats",
            'pid' => $wechat->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/wechats",
            'remarks' => "修改微信",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_wechats",
            'pid' => $wechat->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/wechats",
            'remarks' => "删除微信",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $dang = Permission::create([
            'name' => "manage_dang",
            'pid' => 0,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/notifies",
            'status' => 1,
            'remarks' => "党建管理",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $notify = Permission::create([
            'name' => "manage_notify",
            'pid' => $dang->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/notifies",
            'remarks' => "通知管理",
            'status'=>1,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "create_notify",
            'pid' => $notify->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/notifies/create",
            'remarks' => "添加通知",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_notify",
            'pid' => $notify->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/notifies",
            'remarks' => "编辑通知",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_notify",
            'pid' => $notify->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/notifies",
            'remarks' => "删除通知",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $theme = Permission::create([
            'name' => "manage_theme_dang",
            'pid' => $dang->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/theme_dangs",
            'remarks' => "主题党日",
            'status'=>1,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "create_theme_dang",
            'pid' => $theme->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/theme_dangs/create",
            'remarks' => "添加主题党日",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_theme_dang",
            'pid' => $theme->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/theme_dangs",
            'remarks' => "编辑主题党日",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_theme_dang",
            'pid' => $theme->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/theme_dangs",
            'remarks' => "删除主题党日",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        $video = Permission::create([
            'name' => "manage_videos",
            'pid' => $dang->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/videos",
            'remarks' => "视频管理",
            'status'=>1,
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "create_videos",
            'pid' => $video->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/videos/create",
            'remarks' => "添加视频",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "edit_videos",
            'pid' => $video->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/videos",
            'remarks' => "编辑视频",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        Permission::create([
            'name' => "destory_videos",
            'pid' => $video->id,
            'icon' => "fa fa-users",
            'url' => "zdxadmin/videos",
            'remarks' => "删除视频",
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

    }
}

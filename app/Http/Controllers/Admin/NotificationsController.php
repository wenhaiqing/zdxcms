<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;

class NotificationsController extends BaseController
{

    public function index()
    {
        // 获取登录用户的所有通知
        $notifications = Auth::user()->notifications()->paginate(config('admin.global.paginate'));
        Auth::user()->markAsRead();
        return view(getThemeView('notifications.index'), compact('notifications'));
    }
}

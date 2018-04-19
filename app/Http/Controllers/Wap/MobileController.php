<?php

namespace App\Http\Controllers\Wap;

use App\Models\Notify;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MobileController extends Controller
{
    public function index()
    {
        $member = Auth::guard('wap')->user();
        return view('wap.dang.index',compact('member'));
    }

    public function notice()
    {
        $id = Auth::guard('wap')->user()->user_id;
        $ids = get_mobileson([$id],[$id]);
        $notices = User::whereIn('id',$ids)->get();
        return view('wap.dang.notice',compact('notices'));

    }

    public function noticelist(Request $request)
    {
        $user_id = $request->id;
        $notices = Notify::where('user_id',$user_id)->get();
        return view('wap.dang.noticelist',compact('notices'));
    }

    public function noticedetail(Request $request)
    {
        $id = $request->id;
        $notices = Notify::where('id',$id)->get();
        return view('wap.dang.noticedetail',compact('notices'));
    }
}

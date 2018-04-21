<?php

namespace App\Http\Controllers\Wap;

use App\Models\Notify;
use App\Models\ThemeDang;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

/**
 * Class MobileController
 *
 * @package App\Http\Controllers\Wap
 */
class MobileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $member = Auth::guard('wap')->user();
        return view('wap.dang.index',compact('member'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notice()
    {
        $id = Auth::guard('wap')->user()->user_id;
        $ids = get_mobileson([$id],[$id]);
        $notices = User::whereIn('id',$ids)->get();
        return view('wap.dang.notice',compact('notices'));

    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function noticelist(Request $request)
    {
        $user_id = $request->id;
        $notices = Notify::where('user_id',$user_id)->get();
        return view('wap.dang.noticelist',compact('notices'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function noticedetail(Request $request)
    {
        $id = $request->id;
        $notices = Notify::where('id',$id)->get();
        return view('wap.dang.noticedetail',compact('notices'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videos(Request $request)
    {
        $lists = Video::all();
        return view('wap.dang.videolist',compact('lists'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videodetail(Request $request)
    {
        $id = $request->id;
        $video = Video::where('id',$id)->first();
        return view('wap.dang.videodetail',compact('video'));
    }

    public function themed()
    {
        $id = Auth::guard('wap')->user()->user_id;
        $ids = get_mobileson([$id],[$id]);
        $themeds = User::whereIn('id',$ids)->get();
        return view('wap.dang.themed',compact('themeds'));
    }

    public function themedlist(Request $request)
    {
        $user_id = $request->id;
        $themeds = ThemeDang::where('user_id',$user_id)->get();
        return view('wap.dang.Themedlist',compact('themeds'));
    }

    public function themeddetail(Request $request)
    {
        $id = $request->id;
        $themeds = ThemeDang::where('id',$id)->get();
        return view('wap.dang.themeddetail',compact('themeds'));
    }
}

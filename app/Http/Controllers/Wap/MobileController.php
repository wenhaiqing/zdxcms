<?php

namespace App\Http\Controllers\Wap;

use App\Models\BuildDang;
use App\Models\Meeting;
use App\Models\Member;
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

    public function testimage()
    {
        return view('wap.dang.testimage');
    }
    public function index()
    {
        return view('wap.dang.index_yin');
    }
    public function index_youke()
    {
        return view('wap.dang.index_youke');
    }

    public function indexlist()
    {
        $member = Auth::guard('wap')->user();
        return view('wap.dang.index',compact('member'));
    }

    public function dangwei()
    {
        return view('wap.dang.dangwei');
    }

    public function dangwang()
    {
        return view('wap.dang.dangwang');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notice(Request $request,User $user)
    {
        if($keyword = $request->keyword ?? ''){
            $user = $user->where('name', 'like', "%{$keyword}%");
        }
        $id = Auth::guard('wap')->user()->user_id;
        $linshiid = Auth::guard('wap')->user()->linshi_user_id;
        if ($linshiid != 0){
            $id = [$id,$linshiid];
        }else{
            $id = [$id];
        }
        $ids = get_mobileson($id,$id);
        $notices = $user->whereIn('id',$ids)->paginate(config('wap.global.paginate'));
        return view('wap.dang.notice',compact('notices'));

    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function noticelist(Request $request,Notify $notify)
    {
        if($keyword = $request->keyword ?? ''){
            $notify = $notify->where('title', 'like', "%{$keyword}%");
        }
        $user_id = $request->id;
        //$notices = $notify->where('user_id',$user_id)->recent()->paginate(config('wap.global.paginate'));
        $notices = $notify->recent()->paginate(config('wap.global.paginate'));
        return view('wap.dang.noticelist',compact('notices','user_id'));
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

    public function builddanglist(Request $request,BuildDang $buildDang)
    {
        if($keyword = $request->keyword ?? ''){
            $buildDang = $buildDang->where('title', 'like', "%{$keyword}%");
        }
        $user_id = $request->id;
        //$notices = $notify->where('user_id',$user_id)->recent()->paginate(config('wap.global.paginate'));
        $notices = $buildDang->recent()->paginate(config('wap.global.paginate'));
        return view('wap.dang.builddanglist',compact('notices','user_id'));
    }

    public function builddangdetail(Request $request)
    {
        $id = $request->id;
        $notices = BuildDang::where('id',$id)->get();
        return view('wap.dang.builddangdetail',compact('notices'));
    }

    public function zhuanti()
    {
        return view('wap.dang.zhuanti');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function videos(Request $request,Video $video)
    {
        if($keyword = $request->keyword ?? ''){
            $video = $video->where('title', 'like', "%{$keyword}%");
        }
        $lists = $video->recent()->paginate(config('wap.global.paginate'));
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

    public function themed(User $user,Request $request)
    {
        if($keyword = $request->keyword ?? ''){
            $user = $user->where('name', 'like', "%{$keyword}%");
        }
        $id = Auth::guard('wap')->user()->user_id;
        $linshiid = Auth::guard('wap')->user()->linshi_user_id;
        if ($linshiid != 0){
            $id = [$id,$linshiid];
        }else{
            $id = [$id];
        }
        $ids = get_mobileson($id,$id);
        $themeds = $user->whereIn('id',$ids)->paginate(config('wap.global.paginate'));
        $themedjing = ThemeDang::where('if_cream',1)->get();
        return view('wap.dang.themed',compact('themeds','themedjing'));
    }

    public function themedlist(Request $request,ThemeDang $themeDang)
    {
        if($keyword = $request->keyword ?? ''){
            $themeDang = $themeDang->where('title', 'like', "%{$keyword}%");
        }
        $id = Auth::guard('wap')->user()->linshi_user_id;
        $user_id = $request->id;
        if ($user_id == $id){
            $themeDang = $themeDang->where('if_all','0');
        }

        $themeds = $themeDang->where('user_id',$user_id)->recent()->paginate(config('wap.global.paginate'));
        $themedjing = $themeDang->where('if_cream',1)->recent()->get();
        return view('wap.dang.themedlist',compact('themeds','user_id','themedjing'));
    }

    public function themeddetail(Request $request)
    {
        $id = $request->id;
        $themeds = ThemeDang::where('id',$id)->get();
        return view('wap.dang.themeddetail',compact('themeds'));
    }

    public function meetings(User $user,Request $request)
    {
        if($keyword = $request->keyword ?? ''){
            $user = $user->where('name', 'like', "%{$keyword}%");
        }
        $id = Auth::guard('wap')->user()->user_id;
        $linshiid = Auth::guard('wap')->user()->linshi_user_id;
        if ($linshiid != 0){
            $id = [$id,$linshiid];
        }else{
            $id = [$id];
        }
        $ids = get_mobileson($id,$id);
        $meetings = $user->whereIn('id',$ids)->paginate(config('wap.global.paginate'));
        return view('wap.dang.meetings',compact('meetings'));
    }

    public function meetingslist(Meeting $meeting,Request $request)
    {
        if($keyword = $request->keyword ?? ''){
            $meeting = $meeting->where('meeting_title', 'like', "%{$keyword}%");
        }
        $id = Auth::guard('wap')->user()->linshi_user_id;
        $user_id = $request->id;
        if ($user_id == $id){
            $meeting = $meeting->where('if_all','0');
        }
        $meetings = $meeting->where('user_id',$user_id)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.dang.meetingslist',compact('meetings','user_id'));
    }

    public function meetingsdetail(Request $request)
    {
        $id = $request->id;
        $meetings = Meeting::where('id',$id)->get();
        return view('wap.dang.meetingsdetail',compact('meetings','id'));
    }

    public function getuserinfo(User $user)
    {
        $id = \Auth::guard('wap')->user()->user_id;
        $userinfo = $user->where('id',$id)->first();
        if(strpos($userinfo->name,'小组') !== false){
            $user = $user->where('id',$userinfo->pid)->first();
            $ids = $this->get_adminson([$user->id],[$user->id]);
            $list = Member::whereIn('user_id',$ids)->paginate(config('admin.global.paginate'));
        }else{
            $list = Member::where('user_id',$id)->paginate(config('admin.global.paginate'));
        }
        return view('wap.dang.userinfo',compact('userinfo','list'));
    }
    public function get_adminson($id,$arr = array())
    {

        $res = User::whereIn('pid',$id)->pluck('id')->toArray();

        if (!$res){
            return $arr;
        }
        $arr = array_merge($arr,$res);

        return $this->get_adminson($res,$arr);
    }


}

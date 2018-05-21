<?php

namespace App\Http\Controllers\Wap;

use App\Models\DangMoney;
use App\Models\Member;
use App\Models\ThemeDang;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function get_adminson($id,$arr = array())
    {

        $res = User::whereIn('pid',$id)->pluck('id')->toArray();

        if (!$res){
            return $arr;
        }
        $arr = array_merge($arr,$res);

        return $this->get_adminson($res,$arr);
    }
    public function bind_admin()
    {
        return view('wap.backend.bind');
    }

    public function bind_admin_post(Request $request)
    {
        if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])){
            $mid = \Auth::guard('wap')->id();
            $adminid = \Auth::guard('web')->id();
            Member::where('if_admin',$adminid)->update(['if_admin'=>0]);//把已绑定的账号解绑一个后台只允许绑一个
            Member::where('id',$mid)->update(['if_admin'=>$adminid]);
            return redirect()->route('wap.center');
        };
        flash('账号密码错误或者还未通过审核');
        return back();
    }

    public function untie_admin()
    {
        $mid = \Auth::guard('wap')->id();
        Member::where('id',$mid)->update(['if_admin'=>0]);
        return redirect()->route('wap.center');
    }

    public function themed_list(Request $request,ThemeDang $themeDang)
    {
        if($keyword = $request->keyword ?? ''){
            $themeDang = $themeDang->where('title', 'like', "%{$keyword}%");
        }
        $id = \Auth::guard('wap')->user()->if_admin;
        $ids = $this->get_adminson([$id],[$id]);
        $themeds = $themeDang->whereIn('user_id',$ids)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.backend.themedlist', compact('themeds'));
    }

    public function themed_create(ThemeDang $theme_dang)
    {
        return view('wap.backend.themedcreate',compact('theme_dang'));
    }

    public function themed_store(Request $request)
    {
        $theme_dang = ThemeDang::create($request->all());
        return redirect()->route('wap.admin_themed_list')->with('message', trans('global.stored'));
    }

    public function themed_edit(ThemeDang $theme_dang,Request $request)
    {
        $theme_dang = $theme_dang->where('id',$request->id)->first();
        return view('wap.backend.themedcreate', compact('theme_dang'));
    }

    public function themed_update(Request $request,ThemeDang $themeDang)
    {
        $themeDang->where('id',$request->id)->update($request->only(['user_id','title','descript','content','if_all']));
        return redirect()->route('wap.admin_themed_list')->with('message', trans('global.updated'));
    }

    public function themed_destroy(ThemeDang $theme_dang,Request $request)
    {
        $theme_dang = $theme_dang->where('id',$request->id)->first();
        $theme_dang->delete();
        return redirect()->route('wap.admin_themed_list')->with('message', trans('global.destoried'));
    }

    public function meeting_list(Request $request,Meeting $meeting)
    {
        if($keyword = $request->keyword ?? ''){
            $meeting = $meeting->where('title', 'like', "%{$keyword}%");
        }
        $id = \Auth::guard('wap')->user()->if_admin;
        $ids = $this->get_adminson([$id],[$id]);
        $meetings = $meeting->whereIn('user_id',$ids)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.backend.meetinglist', compact('meetings'));
    }

    public function meeting_create(Meeting $meeting)
    {
        return view('wap.backend.meetingcreate',compact('meeting'));
    }

    public function meeting_store(Request $request)
    {
        $meeting = Meeting::create($request->all());
        return redirect()->route('wap.admin_meeting_list')->with('message', trans('global.stored'));
    }

    public function meeting_edit(Meeting $meeting,Request $request)
    {
        $meeting = $meeting->where('id',$request->id)->first();
//        dd($meeting);
        return view('wap.backend.meetingcreate', compact('meeting'));
    }

    public function meeting_update(Request $request,Meeting $meeting)
    {
        $meeting->where('id',$request->id)->update($request->only(['user_id','meeting_title','meeting_compere','meeting_address','meeting_starttime','meeting_endtime','if_all']));
        return redirect()->route('wap.admin_meeting_list')->with('message', trans('global.updated'));
    }

    public function meeting_destroy(Meeting $meeting,Request $request)
    {
        $meeting = $meeting->where('id',$request->id)->first();
        $meeting->delete();
        return redirect()->route('wap.admin_meeting_list')->with('message', trans('global.destoried'));
    }
    public function notice_list(Request $request,Notify $notice)
    {
        if($keyword = $request->keyword ?? ''){
            $notice = $notice->where('title', 'like', "%{$keyword}%");
        }
        $notices = $notice->recent()->paginate(config('wap.global.paginate'));
        return view('wap.backend.noticelist', compact('notices'));
    }

    public function notice_create(Notify $notify)
    {
        return view('wap.backend.noticecreate',compact('notify'));
    }

    public function notice_store(Request $request)
    {
        $notice = Notify::create($request->all());
        return redirect()->route('wap.admin_notice_list')->with('message', trans('global.stored'));
    }

    public function notice_edit(Notify $notify,Request $request)
    {
        $notify = $notify->where('id',$request->id)->first();
//        dd($notice);
        return view('wap.backend.noticecreate', compact('notify'));
    }

    public function notice_update(Request $request,Notify $notice)
    {
        $notice->where('id',$request->id)->update($request->only(['user_id','title','content']));
        return redirect()->route('wap.admin_notice_list')->with('message', trans('global.updated'));
    }

    public function notice_destroy(Notify $notice,Request $request)
    {
        $notice = $notice->where('id',$request->id)->first();
        $notice->delete();
        return redirect()->route('wap.admin_notice_list')->with('message', trans('global.destoried'));
    }

    public function dangmoney_list(Request $request,DangMoney $dangmoney)
    {
        if($keyword = $request->keyword ?? ''){
            $dangmoney = $dangmoney->where('name', 'like', "%{$keyword}%");
        }
        $id = \Auth::guard('wap')->user()->user_id;
        $ids = $this->get_adminson([$id],[$id]);
        $members = Member::whereIn('user_id',$ids)->pluck('id')->toArray();
        $dangmoneys = $dangmoney->whereIn('member_id',$members)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.backend.dangmoneylist', compact('dangmoneys'));
    }

    public function dangmoney_create(DangMoney $dang_money)
    {
        $id = \Auth::guard('wap')->user()->user_id;
        $ids = $this->get_adminson([$id],[$id]);
        $members = Member::whereIn('user_id',$ids)->get();
        return view('wap.backend.dangmoneycreate',compact('dang_money','members'));
    }

    public function dangmoney_store(Request $request)
    {
        $dangmoney = DangMoney::create($request->all());
        return redirect()->route('wap.admin_dangmoney_list')->with('message', trans('global.stored'));
    }

    public function dangmoney_edit(DangMoney $dang_money,Request $request)
    {
        $id = \Auth::guard('wap')->user()->user_id;
        $ids = $this->get_adminson([$id],[$id]);
        $members = Member::whereIn('user_id',$ids)->get();
        $dang_money = $dang_money->where('id',$request->id)->first();
        return view('wap.backend.dangmoneycreate', compact('dang_money','members'));
    }

    public function dangmoney_update(Request $request,DangMoney $dangmoney)
    {
        $dangmoney = $dangmoney->where('id',$request->id)->first();
        $dangmoney->update($request->all());
        return redirect()->route('wap.admin_dangmoney_list')->with('message', trans('global.updated'));
    }

    public function dangmoney_destroy(DangMoney $dangmoney,Request $request)
    {
        $dangmoney = $dangmoney->where('id',$request->id)->first();
        $dangmoney->delete();
        return redirect()->route('wap.admin_dangmoney_list')->with('message', trans('global.destoried'));
    }
}

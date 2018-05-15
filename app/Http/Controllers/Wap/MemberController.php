<?php

namespace App\Http\Controllers\Wap;

use App\Models\Browselog;
use App\Models\Meeting;
use App\Models\MeetingSign;
use App\Models\Qianyi;
use App\Models\Reply;
use App\Models\Sign;
use App\Models\ThemeDang;
use App\Models\Topic;
use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Redis;
use Auth;

/**
 * Class MemberController
 *
 * @package App\Http\Controllers\Wap
 */
class MemberController extends Controller
{
    /**
     * @param \App\Models\Member $member
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function center(Member $member)
    {
        $member = Auth::guard('wap')->user();
        return view('wap.member.center',compact('member'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function qianyi(Request $request, User $user)
    {
        $id = $request->id;
        $list = $user->where(['pid'=>$id,'status'=>1])->paginate(config('wap.global.paginate'));
        if (!$list->count()){
            $member = \Auth::guard('wap')->user();
            $qianyi = Qianyi::where('member_id',$member->id)->where('status','<>',2)->first();
            if ($qianyi){
                flash('您已提交过申请了，请耐心等待');
                return back();
            }
            $res['member_id'] = $member->id;
            $res['name'] = $member->name;
            $res['to_user_name'] = $request->name;
            $res['to_user_id'] = $id;
            $res['from_user_id'] = $member->user_id;
            $res['from_user_name'] = $member->user->name;
            $arr = Qianyi::create($res);
            flash('您的党组织迁移申请已提交,请等待上级管理员审核处理');
            return back();
        }
        return view('wap.member.list',compact('list'));
    }
    public function linshi_qianyi(Request $request,User $user)
    {
        $id = $request->id;
        $list = $user->where(['pid'=>$id,'status'=>1])->paginate(config('wap.global.paginate'));
        if (!$list->count()){
            $member = \Auth::guard('wap')->user();
            $qianyi = Qianyi::where('member_id',$member->id)->where('status','<>',2)->first();
            if ($qianyi){
                flash('您已提交过申请了，请耐心等待');
                return back();
            }
            $res['member_id'] = $member->id;
            $res['name'] = $member->name;
            $res['linshi_to_user_name'] = $request->name;
            $res['linshi_to_user_id'] = $id;
            $res['from_user_id'] = $member->user_id;
            $res['from_user_name'] = $member->user->name;
            $arr = Qianyi::create($res);
            flash('您的党组织迁移申请已提交,请等待上级管理员审核处理');
            return back();
        }
        return view('wap.member.linshilist',compact('list'));
    }

    public function myqianyi()
    {
        $member_id = Auth::guard('wap')->id();
        $qianyi = Qianyi::where('member_id',$member_id)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.myqianyi',compact('qianyi'));
    }

    public function searchqianyi(Request $request,User $user)
    {
        $this->validate($request, [
            'keyword' => 'required',
        ],[],[
            'keyword' => '搜索关键字'
        ]);
        if($keyword = $request->keyword ?? ''){
            $list = $user->where('name', 'like', "%{$keyword}%")->paginate(config('wap.global.paginate'));
        }
        return view('wap.member.list',compact('list'));

    }
    public function linshi_searchqianyi(Request $request,User $user)
    {
        $this->validate($request, [
            'keyword' => 'required',
        ],[],[
            'keyword' => '搜索关键字'
        ]);
        if($keyword = $request->keyword ?? ''){
            $list = $user->where('name', 'like', "%{$keyword}%")->paginate(config('wap.global.paginate'));
        }
        return view('wap.member.linshilist',compact('list'));

    }

    public function myvideo(Request $request,Video $video)
    {
        if($keyword = $request->keyword ?? ''){
            $video = $video->where('title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $videos = Browselog::where(['member_id'=>$member_id,'model_name'=>'videos'])->pluck('model_id')->toArray();
        $lists = $video->whereIn('id',$videos)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.myvideo',compact('lists'));

    }

    public function mythemed(Request $request,ThemeDang $themeDang)
    {
        if($keyword = $request->keyword ?? ''){
            $themeDang = $themeDang->where('title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $res = Browselog::where(['member_id'=>$member_id,'model_name'=>'theme_dangs'])->pluck('model_id')->toArray();
        $themeds = $themeDang->whereIn('id',$res)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.mythemed',compact('themeds'));

    }

    public function mytopic(Request $request,Topic $topic)
    {
        if($keyword = $request->keyword ?? ''){
            $topic = $topic->where('title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $topics = $topic->where('member_id',$member_id)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.mytopic',compact('topics'));
        
    }

    public function myreply(Request $request,Reply $reply)
    {
        if($keyword = $request->keyword ?? ''){
            $reply = $reply->where('content', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $replies = $reply->where('member_id',$member_id)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.myreply',compact('replies'));

    }

    public function myhistory()
    {
        $member_id = Auth::guard('wap')->id();
        $lists = Browselog::where('member_id',$member_id)->recent()->get();
        return view('wap.member.myhistory',compact('lists'));

    }

    public function myqiandao()
    {
        $member_id = Auth::guard('wap')->id();
        $if_sign = 0;
        $preve = Sign::where('member_id',$member_id)->orderBy('id','desc')->first();
        if ($preve){
            if ($preve->sign_time == Carbon::now()->toDateString()){
                $if_sign = 1;
                //签到天数，如果今天已签到就直接取，如果今天没签到就看上一次签到是不是昨天，如果是就加一如果不是就为0
                $sign_contiday = $preve->sign_contiday;
            }else{
                if ($preve->sign_time == Carbon::yesterday()->toDateString()){
                    $sign_contiday = $preve->sign_contiday+1;
                }else{
                    $sign_contiday = 0;
                }
            }
        }
        return view('wap.member.myqiandao',compact('if_sign'));

    }

    public function qiandao(Request $request)
    {
        $member_id = Auth::guard('wap')->id();
        $year = date('Y');
        $month = date('m');
        $res = [];
        $list = Sign::where(['member_id'=>$member_id,'sign_year'=>$year,'sign_month'=>$month])->pluck('sign_day')->toArray();
        foreach ($list as $k=>$v){
            $res[]['signDay']=$v;
        }
        return json_encode($res);
    }

    public function getsign(Request $request)
    {
        $member_id = Auth::guard('wap')->id();
        $year = $request->year;
        $month = $request->month;
        $res = [];
        $list = Sign::where(['member_id'=>$member_id,'sign_year'=>$year,'sign_month'=>$month])->pluck('sign_day')->toArray();
        foreach ($list as $k=>$v){
            $res[]['signDay']=$v;
        }
        return json_encode($res);

    }

    public function qiandao_create(Sign $sign)
    {
        $res = $sign->sign_create();
        return $res;

    }

    public function myjifen()
    {
        $member_id = Auth::guard('wap')->id();
        $lists = Browselog::where('member_id',$member_id)->where('jifen','>','0')->orderBy('id','desc')->paginate(config('wap.global.paginate'));
        return view('wap.member.myjifen',compact('lists'));
    }

    public function meeting_sign(Request $request)
    {
        $meeting_id = $request->meeting_id;
        return view('wap.member.meetingsign',compact('meeting_id'));
    }

    public function meeting_signlist(Request $request,MeetingSign $meetingsign)
    {
        if($keyword = $request->keyword ?? ''){
            $meetingsign = $meetingsign->where('sign_title', 'like', "%{$keyword}%");
        }
        $meeting_id = $request->meeting_id;
        $member_id = Auth::guard('wap')->id();
        $meeting_signs = $meetingsign->where(['member_id'=>$member_id,'meeting_id'=>$meeting_id])->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.meetingsignlist',compact('meeting_signs','meeting_id'));
    }

    public function meeting_signsdetail(Request $request)
    {
        $id = $request->id;
        $lists = MeetingSign::where('id',$id)->first();
        return view('wap.member.meetingsignsdetail',compact('lists'));

    }

    public function meeting_sign_create(Request $request)
    {
        $meetingsign = MeetingSign::create($request->all());
        flash(trans('会议签到成功'));
        return back();
    }

    public function mymeeting(Request $request,Meeting $meeting)
    {
        if($keyword = $request->keyword ?? ''){
            $meeting = $meeting->where('meeting_title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $res = MeetingSign::where(['member_id'=>$member_id])->pluck('meeting_id')->toArray();
        $meetings = $meeting->whereIn('id',$res)->recent()->paginate(config('wap.global.paginate'));
        return view('wap.member.mymeeting',compact('meetings'));
    }

    public function member_active()
    {
        $members = Member::orderBy('jifen','desc')->paginate(config('wap.global.paginate'));
        return view('wap.member.memberactive',compact('members'));
    }

    public function user_active(Member $member)
    {
        $users = $member->getActiveUsers();
        return view('wap.member.useractive',compact('users'));
    }


}

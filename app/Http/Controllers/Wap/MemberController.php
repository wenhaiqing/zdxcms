<?php

namespace App\Http\Controllers\Wap;

use App\Models\Browselog;
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
use Auth;

class MemberController extends Controller
{
    public function center(Member $member)
    {
        $member = Auth::guard('wap')->user();
        return view('wap.member.center',compact('member'));
    }

    public function qianyi(Request $request,User $user)
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

    public function myqianyi()
    {
        $member_id = Auth::guard('wap')->id();
        $qianyi = Qianyi::where('member_id',$member_id)->paginate(config('wap.global.paginate'));
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

    public function myvideo(Request $request,Video $video)
    {
        if($keyword = $request->keyword ?? ''){
            $video = $video->where('title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $videos = Browselog::where(['member_id'=>$member_id,'model_name'=>'videos'])->pluck('model_id')->toArray();
        $lists = $video->whereIn('id',$videos)->paginate(config('wap.global.paginate'));
        return view('wap.member.myvideo',compact('lists'));

    }

    public function mythemed(Request $request,ThemeDang $themeDang)
    {
        if($keyword = $request->keyword ?? ''){
            $themeDang = $themeDang->where('title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $res = Browselog::where(['member_id'=>$member_id,'model_name'=>'theme_dangs'])->pluck('model_id')->toArray();
        $themeds = $themeDang->whereIn('id',$res)->paginate(config('wap.global.paginate'));
        return view('wap.member.mythemed',compact('themeds'));

    }

    public function mytopic(Request $request,Topic $topic)
    {
        if($keyword = $request->keyword ?? ''){
            $topic = $topic->where('title', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $topics = $topic->where('member_id',$member_id)->paginate(config('wap.global.paginate'));
        return view('wap.member.mytopic',compact('topics'));
        
    }

    public function myreply(Request $request,Reply $reply)
    {
        if($keyword = $request->keyword ?? ''){
            $reply = $reply->where('content', 'like', "%{$keyword}%");
        }
        $member_id = Auth::guard('wap')->id();
        $replies = $reply->where('member_id',$member_id)->paginate(config('wap.global.paginate'));
        return view('wap.member.myreply',compact('replies'));

    }

    public function myhistory()
    {
        $member_id = Auth::guard('wap')->id();
        $lists = Browselog::where('member_id',$member_id)->get();
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
        $lists = Browselog::where('member_id',$member_id)->orderBy('id','desc')->paginate(config('wap.global.paginate'));
        return view('wap.member.myjifen',compact('lists'));
    }


}

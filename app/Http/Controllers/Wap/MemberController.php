<?php

namespace App\Http\Controllers\Wap;

use App\Models\Qianyi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;

class MemberController extends Controller
{
    public function center(Member $member)
    {
        $member = \Auth::guard('wap')->user();
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


}

<?php

namespace App\Models\Traits;

use App\Models\Browselog;
use App\Models\Member;
use Redis;
use Carbon\Carbon;
use Log;
use App\Jobs\SendEmail;

trait RecordThemedDang
{
    public function check_member_themed()
    {
        $list = Member::where('status',1)->pluck('id')->toArray();
        foreach ($list as $k=>$v){
            $res = Browselog::where(['member_id'=>$v,'model_name'=>'theme_dangs'])->orderBy('id','desc')->first();
            if ($res){
                //如果最后一次的时间小于一个月前说明一个月没参加了
                if ($res->created_at<Carbon::parse('-1 months')){
                    $member = Member::where('id',$v)->first();
                    //更新党员if_out（判断党员是否一个月没来了）字段
                    $member->update(['if_out'=>1]);
                    //发送邮件给该党员的上级支部
                    $title = '党员'.$member->name.'已经一个月没有参加主题党日了';
                    $to = $member->user->email;
                    dispatch(new SendEmail($title,$to));
                }else{
                    Member::where('id',$v)->update(['if_out'=>0]);
                }
            }

        }

    }

}
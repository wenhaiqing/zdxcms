<?php

namespace App\Models\Traits;

use App\Models\Browselog;
use App\Models\Member;
use Redis;
use Carbon\Carbon;
use Log;

trait RecordThemedDang
{
    public function check_member_themed()
    {
        $list = Member::where('status',1)->pluck('id')->toArray();
        foreach ($list as $k=>$v){
            $res = Browselog::where(['member_id'=>$v,'model_name'=>'theme_dangs'])->orderBy('id','desc')->first();
            if ($res){
                if ($res->created_at<Carbon::parse('-1 months')){
                    Member::where('id',$v)->update(['if_out'=>1]);
                }else{
                    Member::where('id',$v)->update(['if_out'=>0]);
                }
            }

        }

    }

}
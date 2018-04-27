<?php

namespace App\Models;

use Carbon\Carbon;
class Sign extends Model
{
    protected $fillable = ['member_id', 'sign_day', 'sign_month', 'sign_year', 'sign_year_month', 'sign_contiday', 'jifen','sign_time'];

    public function sign_create()
    {
        $member_id = \Auth::guard('wap')->id();
        $preve = Sign::where('member_id',$member_id)->orderBy('id','desc')->first();
        $sign_contiday = 0;
        if ($preve){
            if ($preve->sign_time == Carbon::yesterday()->toDateString()){
                $sign_contiday = $preve->sign_contiday+1;
            }
        }
        $res = [
            'member_id'=>$member_id,
            'sign_day'=>date('d'),
            'sign_month'=>date('m'),
            'sign_year'=>date('Y'),
            'sign_year_month'=>date('Y-m'),
            'sign_time'=>date('Y-m-d'),
            'sign_contiday'=>$sign_contiday,
            'jifen'=>config('wap.global.signs'),
        ];
        $arr = Sign::create($res);
        if ($arr){
            $data['msg']='签到成功';
            $data['code']=1;
        }else{
            $data['msg']='签到失败';
            $data['code']=0;
        }
        return $data;
    }
}

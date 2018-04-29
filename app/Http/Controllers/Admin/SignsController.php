<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Sign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignRequest;

class SignsController extends BaseController
{


    public function signshow(Sign $sign,Request $request)
    {
        $member_id = $request->member_id;
        return view(getThemeView('signs.show'), compact('member_id'));
    }


	public function store(SignRequest $request)
	{
        $member_id = $request->member_id;
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
        $member_id = $request->member_id;
        $year = $request->year;
        $month = $request->month;
        $res = [];
        $list = Sign::where(['member_id'=>$member_id,'sign_year'=>$year,'sign_month'=>$month])->pluck('sign_day')->toArray();
        foreach ($list as $k=>$v){
            $res[]['signDay']=$v;
        }
        return json_encode($res);

	}


}
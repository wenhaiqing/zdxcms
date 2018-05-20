<?php

namespace App\Http\Controllers\Wap;

use App\Models\DangMoney;
use App\Models\Diaoyan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiaoyanController extends Controller
{
    public function index()
    {
        return view('wap.diaoyan.index');
    }

    public function create()
    {
        return view('wap.diaoyan.add');
    }

    public function store(Request $request)
    {
        $res = Diaoyan::create($request->all());
        return redirect()->route('wap.indexlist');
    }

    public function paydang()
    {
        $month = date('m');
        $year = date('Y');
        $member_id = \Auth::guard('wap')->id();
        $member = DangMoney::where(['member_id'=>$member_id,'if_adminset'=>1])->where('created_at','like',"%{$year}%")->first();
        return view('wap.diaoyan.paydang',compact('member','month'));
    }

    public function paydang_help()
    {
        return view('wap.diaoyan.paydang_help');
    }

    public function paydang_histroy()
    {
        $year = date('Y');
        $member_id = \Auth::guard('wap')->id();
        $members = DangMoney::where(['member_id'=>$member_id])->where('paytime','like',"%{$year}%")->get();
        return view('wap.diaoyan.paydang_histroy',compact('members'));
    }

    public function paydang_add(Request $request)
    {
        $res = DangMoney::create($request->all());
        return redirect()->route('wap.paydang.histroy');
    }
}

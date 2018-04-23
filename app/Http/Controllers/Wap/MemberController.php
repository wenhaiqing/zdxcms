<?php

namespace App\Http\Controllers\Wap;

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


}

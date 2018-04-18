<?php

namespace App\Http\Controllers\Wap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MobileController extends Controller
{
    public function index()
    {
        $member = Auth::guard('wap')->user();
        return view('wap.dang.index',compact('member'));
    }
}

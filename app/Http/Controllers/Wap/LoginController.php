<?php

namespace App\Http\Controllers\Wap;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\Wap\MemberRequest;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('wap.login.index');
    }

    public function login(Request $request)
    {
        if (Auth::guard('wap')->attempt(['mobile' => $request->mobile, 'password' => $request->password, 'status' => 1])){
            dd('登录成功');
        };
        //return redirect()->route('wap.login');
    }

    public function registerForm()
    {
        return view('wap.login.register');
    }

    public function register(MemberRequest $memberRequest)
    {
        $res = $memberRequest->all();
        $res['password'] = Hash::make($memberRequest->password);
        $member = Member::create($res);
        Auth::guard('wap')->login($member, true);
        return redirect()->route('wap.login');
    }

    public function logout()
    {
        Auth::guard('wap')->logout();
        return redirect()->route('wap.login');
    }
}

<?php

namespace App\Http\Controllers\Wap;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\Wap\MemberRequest;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Wap
 */
class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $res = $this->is_weixin();
        return view('wap.login.index');
    }

    /**
     * 判断用户是否使用微信浏览器
     * @return bool
     */
    public function is_weixin(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
        }
        return false;
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function login(Request $request)
    {
        if (Auth::guard('wap')->attempt(['mobile' => $request->mobile, 'password' => $request->password, 'status' => 1])){

            return redirect()->route('wap.index');
        };
        return redirect()->route('wap.login')->with('message','账号或者密码错误');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerForm(Request $request)
    {
        $user_id = $request->user_id;
        return view('wap.login.register',compact('user_id'));
    }

    /**
     * @param \App\Http\Requests\Wap\MemberRequest $memberRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(MemberRequest $memberRequest)
    {
        $res = $memberRequest->all();
        $res['password'] = Hash::make($memberRequest->password);
        $member = Member::create($res);
        Auth::guard('wap')->login($member, true);
        return redirect()->route('wap.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('wap')->logout();
        return redirect()->route('wap.login');
    }
}

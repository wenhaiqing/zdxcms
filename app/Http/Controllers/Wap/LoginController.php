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
        flash('账号密码错误或者还未通过审核');
        return redirect()->route('wap.login');
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
        //自己注册
//        $res = $memberRequest->all();
//        $res['password'] = Hash::make($memberRequest->password);
//        $member = Member::create($res);
//        flash('您已注册成功，请等待上级支部管理员审核');
        //因为注册之后要通过审核所以这里不直接登录
       // Auth::guard('wap')->login($member, true);
        //return redirect()->route('wap.index');
        //匹配用户
        $res = $memberRequest->all();
        $user_id = $res['user_id'];
        $name = $res['name'];
        $mobile = $res['mobile'];
        $cardnum = $res['cardnum'];
//        $arr = Member::where('');
//        $member = Member::create($res);
//        flash('您已注册成功，请等待上级支部管理员审核');
        //因为注册之后要通过审核所以这里不直接登录
        // Auth::guard('wap')->login($member, true);
        //return redirect()->route('wap.index');
        return redirect()->route('wap.login');
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

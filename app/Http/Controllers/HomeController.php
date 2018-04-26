<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Qianyi;
use App\Notifications\MemberQianyi;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        $num = Mail::raw('邮件内容', function($message) {

            $message->from('whqrlm@163.com', '发件人名称');
            $message->subject('邮件主题');
            $message->to('243083741@qq.com');
        });
    }
}

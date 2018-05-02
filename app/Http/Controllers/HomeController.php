<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Qianyi;
use App\Notifications\MemberQianyi;
use App\Jobs\SendEmail;
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
        return view('welcome');
    }

    public function test()
    {
//        $qianyi = Qianyi::find(1);
//        $qianyi->user->notify(new MemberQianyi($qianyi));
//        $content = 'aa';$from = 'whqrlm@163.com';$from_name='a';$title='test';$to='243083741@qq.com';
//        $num = Mail::raw($content, function($message) use ($from_name,$from,$title,$to) {
//
//            $message->from($from, $from_name);
//            $message->subject('吕梁市委通知');
//            $message->to('243083741@qq.com');
//        });

//        new SendEmail('邮件内','whqrlm@163.com','wenhaiqing','hh','243083741@qq.com');
        $member = User::where('id','49')->first();
        $to = $member->email;
        \Log::info($to);
        dispatch(new SendEmail('title',$to));
//        $content = 'aa';$from = 'whqrlm@163.com';$from_name='a';$title='s';$to='243083741@qq.com';
//        $num = Mail::raw($content, function($message) use ($from_name,$from,$title,$to) {
//            $message->from($from, $from_name);
//            $message->subject($title);
//            $message->to($to);
//        });
    }
}

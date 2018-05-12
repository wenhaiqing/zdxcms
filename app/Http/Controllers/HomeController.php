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
        Member::chunk(1000, function ($members) {
            foreach ($members as $member) {
                $age = rand(0,50);
                    $member->update(['dang_age'=>$age]);
                }
        });


        return view('welcome');
    }

    public function test()
    {
        Member::chunk(1000, function ($members) {
            foreach ($members as $member) {
                if ($member->cardnum){
                    $cardnum = substr($member->cardnum,6,4);
                    $d = date('Y');
                    $age = ($d-$cardnum+1);
                    if ($age>100 || $age<0){
                        $age = 0;
                    }
                    $member->update(['age'=>$age]);
                }
            }
        });
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
//        $member = User::where('id','49')->first();
//        $to = $member->email;
//        \Log::info($to);
//        dispatch(new SendEmail('title',$to));
//        $content = 'aa';$from = 'whqrlm@163.com';$from_name='a';$title='s';$to='243083741@qq.com';
//        $num = Mail::raw($content, function($message) use ($from_name,$from,$title,$to) {
//            $message->from($from, $from_name);
//            $message->subject($title);
//            $message->to($to);
//        });
    }
}

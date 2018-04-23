<?php

namespace App\Http\Controllers\Wap;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{

    public function index()
    {

    }
    public function create()
    {
        $member_id = \Auth::guard('wap')->id();
        $topics = Topic::where('member_id',$member_id)->orderBy('id','desc')->get();
        return view('wap.topic.huzhu',compact('topics'));
    }

    public function store(Request $request,Topic $topic)
    {
        $topics = Topic::create($request->all());
        return redirect()->route('wap.topic_create')->with('success', trans('global.stored'));
    }
}

<?php

namespace App\Http\Controllers\Wap;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{

    public function index(Request $request,Topic $topic)
    {
        if($keyword = $request->keyword ?? ''){
            $topic = $topic->where('title', 'like', "%{$keyword}%");
        }
        $topics = $topic->orderBy('id','desc')->paginate(config('wap.global.paginate'));
        return view('wap.topic.index',compact('topics'));

    }
    public function create()
    {
        $member_id = \Auth::guard('wap')->id();
        $topics = Topic::where('member_id',$member_id)->orderBy('id','desc')->paginate(config('wap.global.paginate'));
        return view('wap.topic.huzhu',compact('topics'));
    }

    public function store(Request $request,Topic $topic)
    {
        $topics = Topic::create($request->all());
        return redirect()->route('wap.topic_create')->with('success', trans('global.stored'));
    }

    public function show(Request $request,Topic $topic)
    {
        $topics = Topic::where('id',$request->id)->first();
        return view('wap.topic.show',compact('topics'));
    }


}

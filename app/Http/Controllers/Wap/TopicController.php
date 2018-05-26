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
        $topics = $topic->orderBy('id','desc')->where('status',1)->paginate(config('wap.global.paginate'));
        $topicsjin = $topic->orderBy('id','desc')->where(['status'=>1,'if_cream'=>1])->paginate(config('wap.global.paginate'));
        return view('wap.topic.index',compact('topics','topicsjin'));

    }
    public function create()
    {
        $member_id = \Auth::guard('wap')->id();
        $topics = Topic::where('member_id',$member_id)->where('status',1)->orderBy('id','desc')->paginate(config('wap.global.paginate'));
        return view('wap.topic.huzhu',compact('topics'));
    }

    public function store(Request $request,Topic $topic)
    {
        $topics = Topic::create($request->all());
         flash(trans('global.stored'));
//        flash(trans('互助消息已提交，请等待审核'));
        return redirect()->route('wap.topic_create');
    }

    public function show(Request $request,Topic $topic)
    {
        $topics = Topic::where('id',$request->id)->first();
        return view('wap.topic.show',compact('topics'));
    }

    public function destroy(Request $request,Topic $topic)
    {
        if (\Auth::guard('wap')->id() == $request->member_id){
            $topic = $topic->find($request->id);
            $topic->delete();
        }
        return back()->with('message', 'Deleted successfully.');
    }


}

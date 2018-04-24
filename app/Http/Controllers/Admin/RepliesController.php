<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;

class RepliesController extends Controller
{

    public function index(Request $request,Reply $reply)
    {
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $reply = $reply->where('content', 'like', "%{$keyword}%");
        }
        $replies = $reply->where('topic_id',$request->id)->paginate(config('wap.global.paginate'));
        return view(getThemeView('topics.reply'), compact('replies'));
    }

	public function store(ReplyRequest $request)
	{
		$reply = Reply::create($request->all());
		return redirect()->route('wap.topic_show', ['id'=>$request->topic_id])->with('message', 'Created successfully.');
	}


	public function destroy(Request $request,Reply $reply)
	{
        $this->authorize('destroy', $reply);
        $reply->delete();
        return redirect()->route('replies.index')->with('message', trans('global.destoried'));
	}
}
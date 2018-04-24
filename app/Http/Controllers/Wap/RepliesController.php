<?php

namespace App\Http\Controllers\Wap;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;

class RepliesController extends Controller
{

	public function store(ReplyRequest $request)
	{
		$reply = Reply::create($request->all());
		return redirect()->route('wap.topic_show', ['id'=>$request->topic_id])->with('message', 'Created successfully.');
	}


	public function destroy(Request $request,Reply $reply)
	{
		if (\Auth::guard('wap')->id() == $request->member_id){
		    $reply = $reply->find($request->id);
            $reply->delete();
        }
		return back()->with('message', 'Deleted successfully.');
	}
}
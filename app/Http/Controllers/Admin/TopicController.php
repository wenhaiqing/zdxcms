<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Topic $topic)
    {
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $topic = $topic->where('title', 'like', "%{$keyword}%");
        }
        if($keyword = $request->if_cream ?? ''){
            $topic = $topic->where('if_cream', 1);
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
        $members = Member::whereIn('user_id',$ids)->pluck('id')->toArray();
        $topics = $topic->whereIn('member_id',$members)->recent()->paginate(config('wap.global.paginate'));
//        dd($topics);
        return view(getThemeView('topics.index'), compact('topics'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view(getThemeView('topics.create_and_edit'), compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $this->authorize('update', $topic);
        return view(getThemeView('topics.create_and_edit'), compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());
        return redirect()->route('topics.index', $topic->id)->with('message', trans('global.updated'));
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('destroy', $topic);
        $topic->delete();
        return redirect()->route('topics.index')->with('message', trans('global.destoried'));
    }
}

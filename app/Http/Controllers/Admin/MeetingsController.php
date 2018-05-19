<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meeting;
use App\Models\MeetingSign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MeetingRequest;

class MeetingsController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request,Meeting $meeting)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $meeting = $meeting->where('meeting_title', 'like', "%{$keyword}%");
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
        $meetings = $meeting->whereIn('user_id',$ids)->recent()->paginate(config('wap.global.paginate'));
		return view(getThemeView('meetings.index'), compact('meetings'));
	}

    public function show(Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }

	public function create(Meeting $meeting)
	{
		return view(getThemeView('meetings.create_and_edit'), compact('meeting'));
	}

	public function store(MeetingRequest $request)
	{
		$meeting = Meeting::create($request->all());
		return redirect()->route('meetings.index')->with('message', trans('global.stored'));
	}

	public function edit(Meeting $meeting)
	{
        $this->authorize('update', $meeting);
		return view(getThemeView('meetings.create_and_edit'), compact('meeting'));
	}

	public function update(MeetingRequest $request, Meeting $meeting)
	{
		$this->authorize('update', $meeting);
		$meeting->update($request->all());

		return redirect()->route('meetings.index', $meeting->id)->with('message', trans('global.updated'));
	}

	public function destroy(Meeting $meeting)
	{
		$this->authorize('destroy', $meeting);
		$meeting->delete();

		return redirect()->route('meetings.index')->with('message', trans('global.destoried'));
	}

    public function sign(Request $request)
    {
        $meeting_id = $request->id;
        $lists = MeetingSign::where('meeting_id',$meeting_id)->paginate(config('admin.global.paginate'));
        return view(getThemeView('meetings.sign'),compact('lists'));
	}

    public function sign_destroy(Request $request)
    {
        $meetsign = MeetingSign::where('id',$request->id)->first();
        $meetsign->delete();
        return back()->with('message',trans('global.destoried'));
	}
}
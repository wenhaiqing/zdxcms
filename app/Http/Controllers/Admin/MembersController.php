<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberRequest;
use Hash;

class MembersController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Member $member,MemberRequest $memberRequest)
	{
        // 关键字过滤
        if($keyword = $memberRequest->keyword ?? ''){
            $member = $member->where('name', 'like', "%{$keyword}%");
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
		$members = $member->whereIn('user_id',$ids)->paginate(config('admin.global.paginate'));
		return view(getThemeView('members.index'), compact('members'));
	}

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

	public function create(Member $member)
	{
		return view(getThemeView('members.create_and_edit'), compact('member'));
	}

	public function store(MemberRequest $request)
	{
	    $res = $request->all();
	    $res['password'] = Hash::make($request->password);
		$member = Member::create($request->all());
		return redirect()->route('members.index', $member->id)->with('message', trans('global.stored'));
	}

	public function edit(Member $member)
	{
        $this->authorize('update', $member);
		return view(getThemeView('members.create_and_edit'), compact('member'));
	}

	public function update(MemberRequest $request, Member $member)
	{
		$this->authorize('update', $member);
		$member->update($request->all());
		return redirect()->route('members.index', $member->id)->with('message', trans('global.updated'));
	}

	public function destroy(Member $member)
	{
		$this->authorize('destroy', $member);
		$member->delete();
		return redirect()->route('members.index')->with('message', trans('global.destoried'));
	}
}
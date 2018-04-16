<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$members = Member::paginate();
		return view('members.index', compact('members'));
	}

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

	public function create(Member $member)
	{
		return view('members.create_and_edit', compact('member'));
	}

	public function store(MemberRequest $request)
	{
		$member = Member::create($request->all());
		return redirect()->route('members.show', $member->id)->with('message', 'Created successfully.');
	}

	public function edit(Member $member)
	{
        $this->authorize('update', $member);
		return view('members.create_and_edit', compact('member'));
	}

	public function update(MemberRequest $request, Member $member)
	{
		$this->authorize('update', $member);
		$member->update($request->all());

		return redirect()->route('members.show', $member->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Member $member)
	{
		$this->authorize('destroy', $member);
		$member->delete();

		return redirect()->route('members.index')->with('message', 'Deleted successfully.');
	}
}
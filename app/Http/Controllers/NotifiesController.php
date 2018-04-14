<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotifyRequest;

class NotifiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$notifies = Notify::paginate(config('admin.global.paginate'));
		return view(getThemeView('notifies.index'), compact('notifies'));
	}

    public function show(Notify $notify)
    {
        return view('notifies.show', compact('notify'));
    }

	public function create(Notify $notify)
	{
		return view('notifies.create_and_edit', compact('notify'));
	}

	public function store(NotifyRequest $request)
	{
		$notify = Notify::create($request->all());
		return redirect()->route('notifies.show', $notify->id)->with('message', 'Created successfully.');
	}

	public function edit(Notify $notify)
	{
        $this->authorize('update', $notify);
		return view('notifies.create_and_edit', compact('notify'));
	}

	public function update(NotifyRequest $request, Notify $notify)
	{
		$this->authorize('update', $notify);
		$notify->update($request->all());

		return redirect()->route('notifies.show', $notify->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Notify $notify)
	{
		$this->authorize('destroy', $notify);
		$notify->delete();

		return redirect()->route('notifies.index')->with('message', 'Deleted successfully.');
	}
}
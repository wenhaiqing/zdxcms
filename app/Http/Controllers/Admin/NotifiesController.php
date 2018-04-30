<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notify;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotifyRequest;

class NotifiesController extends BaseController
{

	public function index(Notify $notify,Request $request)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $notify = $notify->where('title', 'like', "%{$keyword}%");
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
		$notifies = $notify->whereIn('user_id',$ids)->recent()->paginate(config('admin.global.paginate'));
		return view(getThemeView('notifies.index'), compact('notifies'));
	}

    public function show(Notify $notify)
    {
        return view('notifies.show', compact('notify'));
    }

	public function create(Notify $notify)
	{
		return view(getThemeView('notifies.create_and_edit'), compact('notify'));
	}

	public function store(NotifyRequest $request)
	{
		$notify = Notify::create($request->all());
		return redirect()->route('notifies.index', $notify->id)->with('message', trans('global.stored'));
	}

	public function edit(Notify $notify)
	{
        $this->authorize('update', $notify);
		return view(getThemeView('notifies.create_and_edit'), compact('notify'));
	}

	public function update(NotifyRequest $request, Notify $notify)
	{
		$this->authorize('update', $notify);
		$notify->update($request->all());

		return redirect()->route('notifies.index', $notify->id)->with('message', trans('global.updated'));
	}

	public function destroy(Notify $notify)
	{
		$this->authorize('destroy', $notify);
		$notify->delete();

		return redirect()->route('notifies.index')->with('message', trans('global.destoried'));
	}
}
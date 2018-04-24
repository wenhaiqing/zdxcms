<?php

namespace App\Http\Controllers\Admin;

use App\Models\Qianyi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QianyiRequest;

class QianyisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$qianyis = Qianyi::paginate();
		return view(getThemeView('qianyis.index'), compact('qianyis'));
	}

    public function show(Qianyi $qianyi)
    {
        return view('qianyis.show', compact('qianyi'));
    }

	public function create(Qianyi $qianyi)
	{
		return view('qianyis.create_and_edit', compact('qianyi'));
	}

	public function store(QianyiRequest $request)
	{
		$qianyi = Qianyi::create($request->all());
		return redirect()->route('qianyis.show', $qianyi->id)->with('message', 'Created successfully.');
	}

	public function edit(Qianyi $qianyi)
	{
        $this->authorize('update', $qianyi);
		return view('qianyis.create_and_edit', compact('qianyi'));
	}

	public function update(QianyiRequest $request, Qianyi $qianyi)
	{
		$this->authorize('update', $qianyi);
		$qianyi->update($request->all());

		return redirect()->route('qianyis.show', $qianyi->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Qianyi $qianyi)
	{
		$this->authorize('destroy', $qianyi);
		$qianyi->delete();

		return redirect()->route('qianyis.index')->with('message', 'Deleted successfully.');
	}
}
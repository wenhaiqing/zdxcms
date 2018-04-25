<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Qianyi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QianyiRequest;
use App\Notifications\MemberQianyi;

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

		return redirect()->route('qianyis.index')->with('message', trans('global.destoried'));
	}

    public function up_qianyi(Request $request)
    {
        $id = $request->id;
        $qianyi = Qianyi::find($id);
        $qianyi->touser->notify(new MemberQianyi($qianyi));
        $qianyi->status=1;
        $qianyi->save();
        return redirect()->route('qianyis.index')->with('message', trans('qianyis.upqianyi_success'));
        
	}

    public function end_qianyi(Request $request)
    {
        $id = $request->id;
        $qianyi =  Qianyi::find($id);
        $qianyi ->status = 2;
        $qianyi->save();
        Member::where('id',$qianyi->member_id)->update(['user_id'=>$qianyi->to_user_id]);
        return back()->with('message',trans('qianyis.end'));
	}
}
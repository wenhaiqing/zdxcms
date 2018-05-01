<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Qianyi;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\QianyiRequest;
use App\Notifications\MemberQianyi;
use App\Jobs\SendEmail;

class QianyisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request,Qianyi $qianyi)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $qianyi = $qianyi->where('name', 'like', "%{$keyword}%");
        }
	    //迁出申请
		$qianyis = $qianyi->where('to_user_id','<>','0')->recent()->paginate(config('admin.global.paginate'));

		return view(getThemeView('qianyis.index'), compact('qianyis','linshi_qianyis'));
	}

    public function linshi_index(Request $request,Qianyi $qianyi)
    {

        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $qianyi = $qianyi->where('name', 'like', "%{$keyword}%");
        }
        //流动党员临时迁入申请
        $qianyis = $qianyi->where('linshi_to_user_id','<>','0')->paginate(config('admin.global.paginate'));
        return view(getThemeView('qianyis.linshiindex'), compact('qianyis'));
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
        $title = $qianyi->name.'提出了迁党申请,请前往迁党管理中处理';
        $upuser = User::where('id',$qianyi->user->pid)->first();
        $to = $upuser->email;
        dispatch(new SendEmail($title,$to));
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
    public function linshi_end_qianyi(Request $request)
    {
        $id = $request->id;
        $qianyi =  Qianyi::find($id);
        $qianyi ->status = 2;
        $qianyi->save();
        Member::where('id',$qianyi->member_id)->update(['linshi_user_id'=>$qianyi->linshi_to_user_id]);
        return back()->with('message',trans('qianyis.end'));
    }
}
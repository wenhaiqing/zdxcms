<?php

namespace App\Http\Controllers\Admin;

use App\Models\DangMoney;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DangMoneyRequest;

class DangMoneysController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request,DangMoney $dangMoney)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $dangMoney = $dangMoney->where('name', 'like', "%{$keyword}%");
        }
		$dang_moneys = $dangMoney->paginate(config('admin.global.paginate'));

		return view(getThemeView('dang_moneys.index'), compact('dang_moneys'));
	}


	public function create(DangMoney $dang_money)
	{
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
        $members = Member::whereIn('user_id',$ids)->get();
		return view(getThemeView('dang_moneys.create_and_edit'), compact('dang_money','members'));
	}

	public function store(DangMoneyRequest $request)
	{
		$dang_money = DangMoney::create($request->all());
		return redirect()->route('dang_moneys.index')->with('message', trans('global.stored'));
	}

	public function edit(DangMoney $dang_money)
	{
        $this->authorize('update', $dang_money);
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
        $members = Member::whereIn('user_id',$ids)->get();
		return view(getThemeView('dang_moneys.create_and_edit'), compact('dang_money','members'));
	}

	public function update(DangMoneyRequest $request, DangMoney $dang_money)
	{
		$this->authorize('update', $dang_money);
		$dang_money->update($request->all());

		return redirect()->route('dang_moneys.index')->with('message', trans('global.updated'));
	}

	public function destroy(DangMoney $dang_money)
	{
		$this->authorize('destroy', $dang_money);
		$dang_money->delete();

		return redirect()->route('dang_moneys.index')->with('message', trans('global.destoried'));
	}
}
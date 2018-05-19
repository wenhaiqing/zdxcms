<?php

namespace App\Http\Controllers\Admin;

use App\Models\DangMoney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DangMoneyRequest;

class DangMoneysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$dang_moneys = DangMoney::paginate(config('admin.global.paginate'));
		return view(getThemeView('dang_moneys.index'), compact('dang_moneys'));
	}


	public function create(DangMoney $dang_money)
	{
		return view(getThemeView('dang_moneys.create_and_edit'), compact('dang_money'));
	}

	public function store(DangMoneyRequest $request)
	{
		$dang_money = DangMoney::create($request->all());
		return redirect()->route('dang_moneys.index')->with('message', 'Created successfully.');
	}

	public function edit(DangMoney $dang_money)
	{
        $this->authorize('update', $dang_money);
		return view(getThemeView('dang_moneys.create_and_edit'), compact('dang_money'));
	}

	public function update(DangMoneyRequest $request, DangMoney $dang_money)
	{
		$this->authorize('update', $dang_money);
		$dang_money->update($request->all());

		return redirect()->route('dang_moneys.index')->with('message', 'Updated successfully.');
	}

	public function destroy(DangMoney $dang_money)
	{
		$this->authorize('destroy', $dang_money);
		$dang_money->delete();

		return redirect()->route('dang_moneys.index')->with('message', 'Deleted successfully.');
	}
}
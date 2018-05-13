<?php

namespace App\Http\Controllers\Admin;

use App\Models\BuildDang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuildDangController extends BaseController
{

	public function index(BuildDang $buildDang,Request $request)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $buildDang = $buildDang->where('title', 'like', "%{$keyword}%");
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
		$builddangs = $buildDang->whereIn('user_id',$ids)->recent()->paginate(config('admin.global.paginate'));
		return view(getThemeView('builddangs.index'), compact('builddangs'));
	}

    public function show(BuildDang $buildDang)
    {
        return view('builddangs.show', compact('buildDang'));
    }

	public function create(BuildDang $buildDang)
	{
		return view(getThemeView('builddangs.create_and_edit'), compact('buildDang'));
	}

	public function store(Request $request)
	{
		$buildDang = BuildDang::create($request->all());
		return redirect()->route('builddangs.index', $buildDang->id)->with('message', trans('global.stored'));
	}

	public function edit(BuildDang $buildDang,Request $request)
	{
		return view(getThemeView('builddangs.create_and_edit'), compact('buildDang'));
	}

	public function update(Request $request, BuildDang $buildDang)
	{
		$buildDang->update($request->all());

		return redirect()->route('builddangs.index', $buildDang->id)->with('message', trans('global.updated'));
	}

	public function destroy(BuildDang $buildDang)
	{
		$buildDang->delete();

		return redirect()->route('builddangs.index')->with('message', trans('global.destoried'));
	}
}
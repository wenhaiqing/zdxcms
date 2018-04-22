<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThemeDang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThemeDangRequest;

class ThemeDangsController extends BaseController
{

	public function index(ThemeDang $themeDang,Request $request)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $themeDang = $themeDang->where('title', 'like', "%{$keyword}%");
        }
        if($if_cream = $request->if_cream ?? ''){
            $themeDang = $themeDang->where('if_cream', $if_cream);
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
		$theme_dangs = $themeDang->whereIn('user_id',$ids)->paginate(config('admin.global.paginate'));
		return view(getThemeView('theme_dangs.index'), compact('theme_dangs'));
	}


	public function create(ThemeDang $theme_dang)
	{
		return view(getThemeView('theme_dangs.create_and_edit'), compact('theme_dang'));
	}

	public function store(ThemeDangRequest $request)
	{
		$theme_dang = ThemeDang::create($request->all());
		return redirect()->route('theme_dangs.index', $theme_dang->id)->with('message', trans('global.stored'));
	}

	public function edit(ThemeDang $theme_dang)
	{
        $this->authorize('update', $theme_dang);
		return view(getThemeView('theme_dangs.create_and_edit'), compact('theme_dang'));
	}

	public function update(ThemeDangRequest $request, ThemeDang $theme_dang)
	{
		$this->authorize('update', $theme_dang);
		$theme_dang->update($request->all());
		return redirect()->route('theme_dangs.index', $theme_dang->id)->with('message', trans('global.updated'));
	}

	public function destroy(ThemeDang $theme_dang)
	{
		$this->authorize('destroy', $theme_dang);
		$theme_dang->delete();

		return redirect()->route('theme_dangs.index')->with('message', trans('global.destoried'));
	}

    public function jinghua(Request $request,ThemeDang $themeDang)
    {
        $id = $request->id;
        $themeDang->where('id',$id)->update(['if_cream'=>1]);
        return redirect()->route('theme_dangs.index', $themeDang->id)->with('message', trans('global.updated'));
    }
}
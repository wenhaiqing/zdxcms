<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;

class VideosController extends BaseController
{

	public function index(Video $video,Request $request)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $video = $video->where('title', 'like', "%{$keyword}%");
        }
        if($if_cream = $request->if_cream ?? ''){
            $video = $video->where('if_cream', $if_cream);
        }
        $id = \Auth::id();
        $ids = $this->get_adminson([$id],[$id]);
		$videos = $video->whereIn('user_id',$ids)->recent()->paginate(config('admin.global.paginate'));
		return view(getThemeView('videos.index'), compact('videos'));
	}



	public function create(Video $video)
	{
	    $category = VideoCategory::all();
		return view(getThemeView('videos.create_and_edit'), compact('video','category'));
	}

	public function store(VideoRequest $request)
	{
		$video = Video::create($request->all());
		return redirect()->route('videos.index', $video->id)->with('message', trans('global.stored'));
	}

	public function edit(Video $video)
	{
        $this->authorize('update', $video);
        $category = VideoCategory::all();
		return view(getThemeView('videos.create_and_edit'), compact('video','category'));
	}

	public function update(VideoRequest $request, Video $video)
	{
		$this->authorize('update', $video);
		$video->update($request->all());

		return redirect()->route('videos.index', $video->id)->with('message', trans('global.updated'));
	}

	public function destroy(Video $video)
	{
		$this->authorize('destroy', $video);
		$video->delete();

		return redirect()->route('videos.index')->with('message', trans('global.destoried'));
	}

    public function jinghua(Request $request,Video $video)
    {
        $id = $request->id;
        $video->where('id',$id)->update(['if_cream'=>1]);
        return redirect()->route('videos.index', $video->id)->with('message', trans('global.updated'));
	}

    public function category(Request $request,VideoCategory $videoCategory)
    {
        $lists = $videoCategory->paginate(config('admin.global.paginate'));

        return view(getThemeView('videos.category'),compact('lists'));
	}
    public function categoryadd(Request $request,VideoCategory $videoCategory)
    {
        return view(getThemeView('videos.category_create_and_edit'), compact('videoCategory'));
    }

    public function categorystore(Request $request)
    {
        $video = VideoCategory::create($request->all());
        return redirect()->route('videos.category.index')->with('message', trans('global.stored'));
    }
    public function categoryedit(Request $request,VideoCategory $videoCategory)
    {
        $videoCategory = $videoCategory->where('id',$request->id)->first();
        return view(getThemeView('videos.category_create_and_edit'), compact('videoCategory'));
    }
    public function categoryupdate(Request $request, VideoCategory $videoCategory)
    {
        $videoCategory->where('id',$request->id)->update(['title'=>$request->title]);

        return redirect()->route('videos.category.index')->with('message', trans('global.updated'));
    }

    public function categorydestroy(Request $request,VideoCategory $videoCategory)
    {
        $videoCategory = $videoCategory->find($request->id);
        $videoCategory->delete();

        return redirect()->route('videos.category.index')->with('message', trans('global.destoried'));
    }
}
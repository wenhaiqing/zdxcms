<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;

class VideosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Video $video,Request $request)
	{
        // 关键字过滤
        if($keyword = $request->keyword ?? ''){
            $video = $video->where('title', 'like', "%{$keyword}%");
        }
		$videos = $video->paginate(config('admin.global.paginate'));
		return view(getThemeView('videos.index'), compact('videos'));
	}

    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

	public function create(Video $video)
	{
		return view(getThemeView('videos.create_and_edit'), compact('video'));
	}

	public function store(VideoRequest $request)
	{
		$video = Video::create($request->all());
		return redirect()->route('videos.index', $video->id)->with('message', trans('global.stored'));
	}

	public function edit(Video $video)
	{
        $this->authorize('update', $video);
		return view(getThemeView('videos.create_and_edit'), compact('video'));
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
}
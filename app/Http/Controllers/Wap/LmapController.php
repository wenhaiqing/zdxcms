<?php

namespace App\Http\Controllers\Wap;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class LmapController
 *
 * @package App\Http\Controllers\Wap
 */
class LmapController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lvliang()
    {
        $title='吕梁市';
        $pid = User::where('name',$title)->first();
        $list = User::where(['pid'=>$pid->id,'if_zhi'=>1])->paginate(config('wap.global.paginate'));
        return view('wap.lmap.index',compact('list'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getxian(Request $request)
    {
        $name = $request->name;
        return view('wap.lmap.'.$name);
    }

    /**
     * @param $name
     * @param $title
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toxian($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
        $pid = User::where('name',$title)->first();
        $list = User::where(['pid'=>$pid->id,'if_zhi'=>1])->paginate(config('wap.global.paginate'));
        return view('wap.lmap.sun',compact('name','title','list'));
    }

    /**
     * @param $title
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function danglist($title)
    {
        $list = User::where('name',$title)->paginate(config('wap.global.paginate'));
        return view('wap.dang.list',compact('list'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function list_tree(Request $request)
    {
        $id = $request->id;
        $list = User::where(['pid'=>$id,'status'=>1])->paginate(config('wap.global.paginate'));
        if (!$list->count()){
            return redirect()->route('wap.register', ['user_id'=>$id]);
        }
        return view('wap.dang.list',compact('list'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchdang(Request $request, User $user)
    {
        $this->validate($request, [
            'keyword' => 'required',
        ],[],[
            'keyword' => '搜索关键字'
        ]);
        if($keyword = $request->keyword ?? ''){
            $list = $user->where('name', 'like', "%{$keyword}%")->paginate(config('wap.global.paginate'));
        }
        return view('wap.dang.list',compact('list'));


    }
}

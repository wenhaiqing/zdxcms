<?php

namespace App\Http\Controllers\Wap;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LmapController extends Controller
{
    public function lvliang()
    {
        $list = $this->getzhishu('吕梁市');
        return view('wap.lmap.index',compact('list'));
    }

    public function getxian(Request $request)
    {
        $name = $request->name;
        return view('wap.lmap.'.$name);
    }

    public function toxian($name,$title)
    {
        $this->name = $name;
        $this->title = $title;
        $list = $this->getzhishu($title);
        return view('wap.lmap.sun',compact('name','title','list'));
    }

    public function danglist($title)
    {
        $list = User::where('name',$title)->get();
        return view('wap.dang.list',compact('list'));
    }

    public function list_tree(Request $request)
    {
        $id = $request->id;
        $list = User::where(['pid'=>$id,'status'=>1])->get();
        if (!$list->count()){
            return redirect()->route('wap.register', ['user_id'=>$id]);
        }
        return view('wap.dang.list',compact('list'));
    }

    public function getzhishu($title)
    {
        $pid = User::where('name',$title)->first();
        if ($pid){
            $list = User::where(['pid'=>$pid->id,'if_zhi'=>1])->get();
            return $list;
        }else{
            return User::where('name',$title)->get();
        }


    }
}

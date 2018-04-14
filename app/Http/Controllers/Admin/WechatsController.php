<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wechat;
use App\Http\Requests\Admin\WechatRequest;

class WechatsController extends BaseController
{
    public function index(Wechat $wechat)
    {
        $this->authorize('view', $wechat);
        $wechats = Wechat::paginate(config('admin.global.paginate'));
        return view(getThemeView('wechats.index'), compact('wechats'));
    }

    public function create(Wechat $wechat)
    {
        $this->authorize('create',$wechat);
        return view(getThemeView('wechats.create_and_edit'), compact('wechat'));
    }

    public function store(WechatRequest $request,Wechat $wechat)
    {
        $this->authorize('create',$wechat);
        $wechat = Wechat::create($request->all());
        return redirect()->route('wechats.index')->with('success', trans('global.stored'));
    }

    public function edit(Wechat $wechat)
    {
        $this->authorize('update', $wechat);
        return view(getThemeView('wechats.create_and_edit'), compact('wechat'));
    }

    public function update(WechatRequest $request, Wechat $wechat)
    {
        $this->authorize('update', $wechat);
        $wechat->update($request->all());

        return redirect()->route('wechats.index')->with('success', trans('global.updated'));
    }

    public function destroy(Wechat $wechat)
    {
        $this->authorize('delete', $wechat);
        $wechat->delete();

        return redirect()->route('wechats.index')->with('success', trans('global.destoried.'));
    }

    // 接入
    public function integrate(Wechat $wechat){
        $this->authorize('view', $wechat);
        return view(getThemeView('wechats.integrate'), compact('wechat'));
    }

    // 设置响应
    public function setResponse($type = 'default'){

    }
}

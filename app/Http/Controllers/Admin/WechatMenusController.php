<?php

namespace App\Http\Controllers\Admin;

use App\Models\Wechat;
use App\Models\WechatMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WechatMenuRequest;
use App\Handlers\WechatMenuHandler;
use EasyWeChat\Factory;

class WechatMenusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Wechat $wechat, WechatMenuHandler $handler)
	{
        $wechat_menus = collect($handler->level(WechatMenu::where('group',$wechat->id)->get()));
		return view(getThemeView('wechat_menus.index'), compact('wechat_menus', 'wechat'));
	}

    public function show(WechatMenu $wechat_menu)
    {
        return view(getThemeView('wechat_menus.show'), compact('wechat_menu'));
    }

	public function create(WechatMenu $wechat_menu, Wechat $wechat, $parent = 0)
	{
		return view(getThemeView('wechat_menus.create_and_edit'), compact('wechat_menu', 'wechat', 'parent'));
	}

	public function store(WechatMenuRequest $request, Wechat $wechat)
	{
		$wechat_menu = WechatMenu::create($request->all());
		return redirect()->route('wechat_menus.index',$wechat_menu->group)->with('success',trans('global.stored'));
	}

	public function edit(WechatMenu $wechat_menu, Wechat $wechat)
	{
        //$this->authorize('update', $wechat_menu);
        $parent = $wechat_menu->parent;
		return view(getThemeView('wechat_menus.create_and_edit'), compact('wechat_menu','wechat', 'parent'));
	}

	public function update(WechatMenuRequest $request, WechatMenu $wechat_menu,  Wechat $wechat)
	{
		//$this->authorize('update', $wechat_menu);
		$wechat_menu->update($request->all());
		return redirect()->route('wechat_menus.index',$wechat->id)->with('success', trans('global.updated'));
	}

	public function destroy(WechatMenu $wechat_menu,Wechat $wechat)
	{
		//$this->authorize('destroy', $wechat_menu);
		$wechat_menu->delete();
		return redirect()->route('wechat_menus.index',$wechat->id)->with('success', trans('global.destoried'));
	}

    /**
     * 同步到微信服务器
     */
    public function synchronizeWechatServer(Wechat $wechat, WechatMenuHandler $handler){
        $buttons = $handler->withRecursionWeixinServer(WechatMenu::where('group',$wechat->id)->get());
        $app = Factory::officialAccount(['app_id'=>$wechat->app_id,'secret'=>$wechat->app_secret]);
        $app->menu->create($buttons);
        return redirect()->route('wechat_menus.index',$wechat->id)->with('success', trans('wechat.success_to_wechat_menu'));
    }
}
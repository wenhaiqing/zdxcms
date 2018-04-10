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
		return redirect()->route('wechat_menus.index',$wechat_menu->group)->with('success', '添加成功.');
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
		return redirect()->route('wechat_menus.index',$wechat->id)->with('success', '更新成功.');
	}

	public function destroy(WechatMenu $wechat_menu,Wechat $wechat)
	{
		//$this->authorize('destroy', $wechat_menu);
		$wechat_menu->delete();
		return redirect()->route('wechat_menus.index',$wechat->id)->with('success', '删除成功.');
	}

    public function order(WechatMenu $wechat_menu, $wechat){
        $this->authorize('update', $wechat_menu);
        $ids = request('id',[]);
        $order = request('order',[]);
        foreach($ids as $k => $id){
            $wechat_menu->where('id',$id)->update(['order' => $order[$k] ?? 999 ]);
        }
        return redirect()->route('wechat_menus.index', $wechat)->with('success', '操作成功.');
    }

    /**
     * 同步到微信服务器
     */
    public function synchronizeWechatServer(Wechat $wechat, WechatMenuHandler $handler){
        $buttons = $handler->withRecursionWeixinServer(WechatMenu::where('group',$wechat->id)->get());
        $app = Factory::officialAccount(['app_id'=>$wechat->app_id,'secret'=>$wechat->app_secret]);
        $app->menu->create($buttons);
        return redirect()->route('wechat_menus.index',$wechat->id)->with('success', '成功同步到微信服务器.');
    }
}
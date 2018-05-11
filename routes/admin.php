<?php

Route::group(['prefix' => 'zdxadmin','namespace' => 'Admin', 'middleware' => ['auth:web', 'language']],function ($router)
{
    $router->get('/','HomeController@index')->name('zdxadmin.home');
    $router->get('/main','HomeController@main')->name('zdxadmin.main');
    // 权限
    $router->resource('permissions','PermissionsController');
    // 角色
    $router->resource('roles','RolesController');
    // 用户
    $router->resource('users','UsersController');
    $router->get('users/{user}/password','UsersController@editPassword')->name('zdxadmin.password.edit');
    $router->put('user/password/{user}','UsersController@updatePassword')->name('zdxadmin.password.update');
    $router->get('user/search','UsersController@searchindex')->name('zdxadmin.searchuser');

    // 微信公众号相关路由
    Route::put('wechats/order','WechatsController@order')->name('wechats.order');
    Route::get('wechats/{wechat}/integrate','WechatsController@integrate')->name('wechats.integrate');
    Route::resource('wechats', 'WechatsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

    Route::get('wechat_menus/{wechat}','WechatMenusController@index')->name('wechat_menus.index');
    Route::post('wechat_menus/{wechat}','WechatMenusController@store')->name('wechat_menus.store');
    Route::get('wechat_menus/create/{wechat}/{parent}','WechatMenusController@create')->name('wechat_menus.create');
    Route::get('wechat_menus/{wechat_menu}/{wechat}','WechatMenusController@show')->name('wechat_menus.show');
    Route::get('wechat_menus/{wechat_menu}/edit/{wechat}','WechatMenusController@edit')->name('wechat_menus.edit');
    Route::put('wechat_menus/{wechat}/order','WechatMenusController@order')->name('wechat_menus.order');
    Route::put('wechat_menus/{wechat_menu}/{wechat}','WechatMenusController@update')->name('wechat_menus.update');
    Route::delete('wechat_menus/{wechat_menu}/{wechat}','WechatMenusController@destroy')->name('wechat_menus.destroy');
    Route::post('wechat_menus/sync/{wechat}','WechatMenusController@synchronizeWechatServer')->name('wechat_menus.sync');
//    Route::resource('wechat_menus', 'WechatMenusController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

    Route::get('wechat_response/{wechat}','WechatResponseController@index')->name('wechat_response.index');
    Route::post('wechat_response/{wechat}','WechatResponseController@store')->name('wechat_response.store');
    Route::get('wechat_response/create/{wechat}/{parent}','WechatResponseController@create')->name('wechat_response.create');
    Route::get('wechat_response/{wechat_response}/{wechat}','WechatResponseController@show')->name('wechat_response.show');
    Route::get('wechat_response/{wechat_response}/edit/{wechat}','WechatResponseController@edit')->name('wechat_response.edit');
    Route::put('wechat_response/{wechat}/order','WechatResponseController@order')->name('wechat_response.order');
    Route::put('wechat_response/{wechat_response}/{wechat}','WechatResponseController@update')->name('wechat_response.update');
    Route::delete('wechat_response/{wechat_response}/{wechat}','WechatResponseController@destroy')->name('wechat_response.destroy');

    Route::get('wechat_response/set_response/{wechat}/{group}','WechatResponseController@setResponse')->name('wechat_response.set_response.create');
    Route::post('wechat_response/set_response/{wechat}/{group}','WechatResponseController@setResponseStore')->name('wechat_response.set_response.store');

    Route::resource('notifies', 'NotifiesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::post('upload_image', 'UploadController@uploadImage')->name('upload_image');
    Route::resource('theme_dangs', 'ThemeDangsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('videos', 'VideosController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('members', 'MembersController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    //设置视频为推荐视频
    Route::post('videos/jinghua','VideosController@jinghua')->name('videos.jinghua');
    //设置主题党日为精华
    Route::post('theme_dangs/jinghua','ThemeDangsController@jinghua')->name('theme_dangs.jinghua');

    Route::resource('topics', 'TopicController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('replies', 'RepliesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

    Route::resource('qianyis', 'QianyisController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::get('linshi_index', 'QianyisController@linshi_index')->name('qianyis.linshi_index');
    Route::get('up_qianyis', 'QianyisController@up_qianyi')->name('zdxadmin.up_qianyis');
    Route::post('end_qianyis', 'QianyisController@end_qianyi')->name('qianyis.end');
    Route::post('linshi_end_qianyis', 'QianyisController@linshi_end_qianyi')->name('qianyis.linshi_end');

    Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

    Route::resource('signs', 'SignsController', ['only' => [ 'store']]);
    Route::post('signs/getsign', 'SignsController@getsign')->name('signs.getsign');
    Route::get('signs/signshow', 'SignsController@signshow')->name('signs.signshow');
    Route::resource('meetings', 'MeetingsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    //数据分析
    Route::get('echarts/bar','EchartsController@bar')->name('echarts.bar');
    Route::get('echarts/pie','EchartsController@pie')->name('echarts.pie');
    Route::get('echarts/test','EchartsController@test')->name('echarts.test');
    Route::get('echarts/zheng','EchartsController@zheng')->name('echarts.zheng');
    Route::get('echarts/sex','EchartsController@sex')->name('echarts.sex');
    Route::get('echarts/current','EchartsController@current')->name('echarts.current');


});
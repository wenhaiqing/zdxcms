<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

// 微信路由
Route::any('wechat/{wechat}.html', 'WeChatController@serve')->name('wechat.api');

Route::group([ 'middleware' => 'language'], function ($router)
{
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::group(['prefix' => 'zdxadmin','namespace' => 'Admin', 'middleware' => ['auth', 'language']],function ($router)
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

});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

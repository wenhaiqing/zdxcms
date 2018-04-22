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

require_once 'admin.php';

Route::group([ 'namespace'=>'Wap','prefix' => 'wap',], function ($router)
{
    // Authentication Routes...
    Route::get('login', 'LoginController@index')->name('wap.login');
    Route::post('login', 'LoginController@login')->name('login.create');
    Route::get('logout', 'LoginController@logout')->name('wap.logout');

    Route::get('register', 'LoginController@registerForm')->name('wap.register');
    Route::post('register', 'LoginController@register')->name('register.create');

    Route::get('lmap', 'LmapController@lvliang')->name('wap.lmap');
    Route::get('getxian', 'LmapController@getxian')->name('wap.getxian');
    Route::get('danglist/{title}', 'LmapController@danglist')->name('wap.danglist');
    Route::get('list_tree', 'LmapController@list_tree')->name('wap.list_tree');
    Route::get('toxian/{name}/{title}', 'LmapController@toxian');
    Route::get('searchdang', 'LmapController@searchdang')->name('wap.searchdang');

});

Route::group([ 'namespace'=>'Wap','prefix' => 'wap', 'middleware' => ['auth:wap']], function ($router)
{
    Route::get('index', 'MobileController@index')->name('wap.index');

    //手机端通知公告
    Route::get('notice', ['uses'=>'MobileController@notice'])->name('wap.notice');
    Route::get('noticelist', ['uses'=>'MobileController@noticelist'])->name('wap.noticelist');
    Route::get('noticedetail', ['middleware'=>'everyaction:notifies','uses'=>'MobileController@noticedetail'])->name('wap.noticedetail');

    //手机端在线学习
    Route::get('videos', ['uses'=>'MobileController@videos'])->name('wap.videos');
    Route::get('videodetail', ['middleware'=>'everyaction:videos','uses'=>'MobileController@videodetail'])->name('wap.videodetail');
    //手机端主题党日
    Route::get('themed', ['uses'=>'MobileController@themed'])->name('wap.themed');
    Route::get('themedlist/{title?}', ['uses'=>'MobileController@themedlist'])->name('wap.themedlist');
    Route::get('themeddetail', ['middleware'=>'everyaction:theme_dangs','uses'=>'MobileController@themeddetail'])->name('wap.themeddetail');


});




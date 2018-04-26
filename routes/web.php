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

Route::get('wap/home', 'HomeController@test')->name('wap.test');
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
    Route::get('themedlist', ['uses'=>'MobileController@themedlist'])->name('wap.themedlist');
    Route::get('themeddetail', ['middleware'=>'everyaction:theme_dangs','uses'=>'MobileController@themeddetail'])->name('wap.themeddetail');

    //个人中心
    Route::get('center', ['uses'=>'MemberController@center'])->name('wap.center');
    //互助中心
    Route::get('topic/index', ['uses'=>'TopicController@index'])->name('wap.topic_index');
    Route::get('topic/show', ['uses'=>'TopicController@show'])->name('wap.topic_show');
    Route::get('topic/create', ['uses'=>'TopicController@create'])->name('wap.topic_create');
    Route::post('topic/store', ['uses'=>'TopicController@store'])->name('wap.topic_store');

    Route::post('reply/store', ['uses'=>'RepliesController@store'])->name('wap.reply_store');
    Route::delete('reply/destroy', ['uses'=>'RepliesController@destroy'])->name('wap.reply_destroy');

    Route::post('upload_image', 'UploadController@uploadImage')->name('wap.upload_image');

    Route::get('qianyi', ['uses'=>'MemberController@qianyi'])->name('wap.qianyi');
    Route::get('searchqianyi', ['uses'=>'MemberController@searchqianyi'])->name('wap.searchqianyi');

    Route::get('myvideo', ['uses'=>'MemberController@myvideo'])->name('wap.myvideo');
    Route::get('mythemed', ['uses'=>'MemberController@mythemed'])->name('wap.mythemed');
    Route::get('mytopic', ['uses'=>'MemberController@mytopic'])->name('wap.mytopic');
    Route::get('myreply', ['uses'=>'MemberController@myreply'])->name('wap.myreply');
    Route::get('myhistory', ['uses'=>'MemberController@myhistory'])->name('wap.myhistory');


});






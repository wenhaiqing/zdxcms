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


Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


Route::get('wap/home', 'HomeController@test')->name('wap.test');
Route::get('/getuser', 'WeChatController@get_userinfo')->name('wap.getuser');
Route::get('/profile', 'WeChatController@profile');
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
Route::group([ 'namespace'=>'Wap','prefix' => 'wap',], function ($router)
{
    //首页
    Route::get('index', 'MobileController@index')->name('wap.index');
    Route::get('index_youke', 'MobileController@index_youke')->name('wap.index_youke');
    Route::get('testimage', 'MobileController@testimage')->name('wap.testimage');
    Route::get('dangwei', 'MobileController@dangwei')->name('wap.dangwei');
    Route::get('dangwang', 'MobileController@dangwang')->name('wap.dangwang');
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

Route::group([ 'prefix' => 'wap', 'middleware' => ['auth:wap']], function ($router)
{
    Route::get('bind_wechat','WeChatController@bind')->name('wap.bind_wechat');
});

Route::group([ 'namespace'=>'Wap','prefix' => 'wap', 'middleware' => ['auth:wap']], function ($router)
{


    Route::get('indexlist', 'MobileController@indexlist')->name('wap.indexlist');

    //展示党支部详情
    Route::get('usersinfo', 'MobileController@getuserinfo')->name('wap.getuserinfo');
    //专题教育
    Route::get('zhuanti', 'MobileController@zhuanti')->name('wap.zhuanti');

    //手机端通知公告
    Route::get('notice', ['uses'=>'MobileController@notice'])->name('wap.notice');
    Route::get('noticelist', ['uses'=>'MobileController@noticelist'])->name('wap.noticelist');
    Route::get('noticedetail', ['middleware'=>'everyaction:notifies','uses'=>'MobileController@noticedetail'])->name('wap.noticedetail');

    Route::get('builddanglist', ['uses'=>'MobileController@builddanglist'])->name('wap.builddanglist');
    Route::get('builddangdetail', ['uses'=>'MobileController@builddangdetail'])->name('wap.builddangdetail');

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
    Route::post('diao_upload_image', 'UploadController@diao_upload')->name('wap.diao_upload');
    //更改党员头像
    Route::post('member_avatar', 'UploadController@member_avatar')->name('wap.member_avatar');
    //申请迁党
    Route::get('qianyi', ['uses'=>'MemberController@qianyi'])->name('wap.qianyi');
    Route::get('searchqianyi', ['uses'=>'MemberController@searchqianyi'])->name('wap.searchqianyi');
    //临时迁移 流动党员
    Route::get('linshi_qianyi', ['uses'=>'MemberController@linshi_qianyi'])->name('wap.linshi_qianyi');
    Route::get('linshi_searchqianyi', ['uses'=>'MemberController@linshi_searchqianyi'])->name('wap.linshi_searchqianyi');

    Route::get('myvideo', ['uses'=>'MemberController@myvideo'])->name('wap.myvideo');
    Route::get('mythemed', ['uses'=>'MemberController@mythemed'])->name('wap.mythemed');
    Route::get('mytopic', ['uses'=>'MemberController@mytopic'])->name('wap.mytopic');
    Route::get('myreply', ['uses'=>'MemberController@myreply'])->name('wap.myreply');
    Route::get('myhistory', ['uses'=>'MemberController@myhistory'])->name('wap.myhistory');
    Route::get('myqianyi', ['uses'=>'MemberController@myqianyi'])->name('wap.myqianyi');
    Route::get('myqiandao', ['uses'=>'MemberController@myqiandao'])->name('wap.myqiandao');
    Route::post('qiandao', ['uses'=>'MemberController@qiandao'])->name('wap.qiandao');
    Route::post('qiandao_create', ['uses'=>'MemberController@qiandao_create'])->name('wap.qiandao_create');
    Route::post('getsign', ['uses'=>'MemberController@getsign'])->name('wap.getsign');
    Route::get('myjifen', ['uses'=>'MemberController@myjifen'])->name('wap.myjifen');
    Route::get('mymeeting', ['uses'=>'MemberController@mymeeting'])->name('wap.mymeeting');
    //会议签到
    Route::get('meeting_sign', ['uses'=>'MemberController@meeting_sign'])->name('wap.meeting_sign');
    Route::get('meeting_signlist', ['uses'=>'MemberController@meeting_signlist'])->name('wap.meeting_signlist');
    Route::get('meeting_signsdetail', ['uses'=>'MemberController@meeting_signsdetail'])->name('wap.meeting_signsdetail');
    Route::post('meeting_sign_create', ['uses'=>'MemberController@meeting_sign_create'])->name('wap.meeting_sign_create');
    //三会一课
    Route::get('meetings', ['uses'=>'MobileController@meetings'])->name('wap.meetings');
    Route::get('meetingslist', ['uses'=>'MobileController@meetingslist'])->name('wap.meetingslist');
    Route::get('meetingsdetail', ['uses'=>'MobileController@meetingsdetail'])->name('wap.meetingsdetail');

    Route::get('member_active', ['uses'=>'MemberController@member_active'])->name('wap.member_active');
    Route::get('user_active', ['uses'=>'MemberController@user_active'])->name('wap.user_active');
    Route::get('analysis/index', ['uses'=>'AnalysisController@indexlist'])->name('wap.analysis.index');

    //数据分析
    Route::get('analysis/bar','AnalysisController@bar')->name('analysis.bar');
    Route::get('analysis/pie','AnalysisController@pie')->name('analysis.pie');
    Route::get('analysis/test','AnalysisController@test')->name('analysis.test');
    Route::get('analysis/zheng','AnalysisController@zheng')->name('analysis.zheng');
    Route::get('analysis/sex','AnalysisController@sex')->name('analysis.sex');
    Route::get('analysis/current','AnalysisController@current')->name('analysis.current');
    Route::get('analysis/census_age','AnalysisController@census_age')->name('analysis.census_age');
    Route::get('analysis/census_dang_age','AnalysisController@census_dang_age')->name('analysis.census_dang_age');
    Route::get('analysis/census_xian','AnalysisController@census_xian')->name('analysis.census_xian');
    Route::get('analysis/census_move','AnalysisController@census_move')->name('analysis.census_move');
    Route::get('analysis/census_meeting','AnalysisController@census_meeting')->name('analysis.census_meeting');
    Route::get('analysis/census_video','AnalysisController@census_video')->name('analysis.census_video');
    Route::post('analysis/census_video_json','AnalysisController@census_video_json')->name('analysis.census_video_json');

    Route::get('diaoyan', ['uses'=>'DiaoyanController@index'])->name('wap.diaoyan.index');
    Route::get('diaoyan/add', ['uses'=>'DiaoyanController@create'])->name('wap.diaoyan.add');
    Route::post('diaoyan/store', ['uses'=>'DiaoyanController@store'])->name('wap.diaoyan.store');


});







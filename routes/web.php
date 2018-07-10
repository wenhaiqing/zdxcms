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
    Route::resource('builddangs', 'BuildDangController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::post('upload_image', 'UploadController@uploadImage')->name('upload_image');
    Route::post('delete_image', 'UploadController@deleteImage')->name('delete_image');
    Route::resource('theme_dangs', 'ThemeDangsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::resource('videos', 'VideosController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    Route::get('videos_category', 'VideosController@category')->name('videos.category.index');
    Route::get('videos_category/add', 'VideosController@categoryadd')->name('videos.category.add');
    Route::post('videos_category/store', 'VideosController@categorystore')->name('videos.category.store');
    Route::get('videos_category/edit', 'VideosController@categoryedit')->name('videos.category.edit');
    Route::patch('videos_category/update', 'VideosController@categoryupdate')->name('videos.category.update');
    Route::delete('videos_category/destroy', 'VideosController@categorydestroy')->name('videos.category.destroy');
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
    Route::get('meeting/sign', 'MeetingsController@sign')->name('meetings.sign');
    Route::delete('meeting/sign/destroy', 'MeetingsController@sign_destroy')->name('meetings.sign.destroy');
    Route::resource('diaoyan', 'DiaoyanController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
    //数据分析
    Route::get('echarts/bar','EchartsController@bar')->name('echarts.bar');
    Route::get('echarts/pie','EchartsController@pie')->name('echarts.pie');
    Route::get('echarts/test','EchartsController@test')->name('echarts.test');
    Route::get('echarts/zheng','EchartsController@zheng')->name('echarts.zheng');
    Route::get('echarts/sex','EchartsController@sex')->name('echarts.sex');
    Route::get('echarts/current','EchartsController@current')->name('echarts.current');
    Route::get('echarts/census_age','EchartsController@census_age')->name('echarts.census_age');
    Route::get('echarts/census_dang_age','EchartsController@census_dang_age')->name('echarts.census_dang_age');
    Route::get('echarts/census_xian','EchartsController@census_xian')->name('echarts.census_xian');
    Route::get('echarts/census_move','EchartsController@census_move')->name('echarts.census_move');
    Route::get('echarts/census_meeting','EchartsController@census_meeting')->name('echarts.census_meeting');
    Route::get('echarts/census_video','EchartsController@census_video')->name('echarts.census_video');
    Route::post('echarts/census_video_json','EchartsController@census_video_json')->name('echarts.census_video_json');

    //党费缴纳
    Route::resource('dang_moneys', 'DangMoneysController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);


});

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
    Route::delete('topic/destroy', ['uses'=>'TopicController@destroy'])->name('wap.topic_destroy');

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
    Route::get('today_myjifen', ['uses'=>'MemberController@today_myjifen'])->name('wap.today_myjifen');
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

    Route::get('paydang', ['uses'=>'DiaoyanController@paydang'])->name('wap.paydang.index');
    Route::get('paydang/help', ['uses'=>'DiaoyanController@paydang_help'])->name('wap.paydang.help');
    Route::get('paydang/histroy', ['uses'=>'DiaoyanController@paydang_histroy'])->name('wap.paydang.histroy');
    Route::post('paydang/add', ['uses'=>'DiaoyanController@paydang_add'])->name('wap.paydang.add');

    Route::get('bind_admin','BackendController@bind_admin')->name('wap.bind_admin');
    Route::get('untie_admin','BackendController@untie_admin')->name('wap.untie_admin');
    Route::post('bind_admin_post','BackendController@bind_admin_post')->name('wap.bind_admin.post');
    Route::get('admin_themed_list','BackendController@themed_list')->name('wap.admin_themed_list');
    Route::get('admin_themed_create','BackendController@themed_create')->name('wap.admin_themed_create');
    Route::post('admin_themed_store','BackendController@themed_store')->name('wap.admin_themed_store');
    Route::get('admin_themed_edit','BackendController@themed_edit')->name('wap.admin_themed_edit');
    Route::patch('admin_themed_update','BackendController@themed_update')->name('wap.admin_themed_update');
    Route::delete('admin_themed_destroy','BackendController@themed_destroy')->name('wap.admin_themed_destroy');
    Route::get('admin_meeting_list','BackendController@meeting_list')->name('wap.admin_meeting_list');
    Route::get('admin_meeting_create','BackendController@meeting_create')->name('wap.admin_meeting_create');
    Route::post('admin_meeting_store','BackendController@meeting_store')->name('wap.admin_meeting_store');
    Route::get('admin_meeting_edit','BackendController@meeting_edit')->name('wap.admin_meeting_edit');
    Route::patch('admin_meeting_update','BackendController@meeting_update')->name('wap.admin_meeting_update');
    Route::delete('admin_meeting_destroy','BackendController@meeting_destroy')->name('wap.admin_meeting_destroy');
    Route::get('admin_notice_list','BackendController@notice_list')->name('wap.admin_notice_list');
    Route::get('admin_notice_create','BackendController@notice_create')->name('wap.admin_notice_create');
    Route::post('admin_notice_store','BackendController@notice_store')->name('wap.admin_notice_store');
    Route::get('admin_notice_edit','BackendController@notice_edit')->name('wap.admin_notice_edit');
    Route::patch('admin_notice_update','BackendController@notice_update')->name('wap.admin_notice_update');
    Route::delete('admin_notice_destroy','BackendController@notice_destroy')->name('wap.admin_notice_destroy');
    Route::get('admin_dangmoney_list','BackendController@dangmoney_list')->name('wap.admin_dangmoney_list');
    Route::get('admin_dangmoney_create','BackendController@dangmoney_create')->name('wap.admin_dangmoney_create');
    Route::post('admin_dangmoney_store','BackendController@dangmoney_store')->name('wap.admin_dangmoney_store');
    Route::get('admin_dangmoney_edit','BackendController@dangmoney_edit')->name('wap.admin_dangmoney_edit');
    Route::patch('admin_dangmoney_update','BackendController@dangmoney_update')->name('wap.admin_dangmoney_update');
    Route::delete('admin_dangmoney_destroy','BackendController@dangmoney_destroy')->name('wap.admin_dangmoney_destroy');
    
    Route::get('userinfo_picture','MobileController@userinfo_picture')->name('wap.userinfo_picture');
    Route::post('userinfo_picture_add','MobileController@userinfo_picture_add')->name('wap.userinfo_picture_add');

    Route::resource('wap_suirecords','SuiRecordController',['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);


});








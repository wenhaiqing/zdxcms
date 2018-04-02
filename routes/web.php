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
//    // 菜单
//    $router->get('menu/clear','MenuController@cacheClear');
//    $router->resource('menu','MenuController');
//    $router->get('setting/{lang}', 'SettingController@language');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

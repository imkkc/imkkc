<?php
/**
 * 后台路由配置,配置方法参看
 * app/Http/Kernel.php 与 Providers/RouteServiceProvider.php
 */


Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    //登录与退出
    $router->get('/', 'LoginController@showLoginForm');
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->any('logout', 'LoginController@logout');

    Route::get('dash', 'DashboardController@index');

});


Route::group(['namespace' => 'Admin','middleware' => ['auth.admin:admin','menu:admin']],function ()
{
    //主页面
    Route::get('admin/dash', 'DashboardController@index');

    //后台用户的路由
    Route::any('batAdmin', 'AdminController@batAdmin');
    Route::any('admin/icons', 'AdminController@icons');
    Route::any('admin/index', 'AdminController@index');
    Route::any('admin/changeStatus', 'AdminController@changeStatus');
    Route::resource('admin', 'AdminController');

    //后台菜单的路由
    Route::any('admin-cate/index', 'CateController@index');
    Route::any('admin-cate/getTree', 'CateController@getTree');
    Route::any('admin-cate/addTree', 'CateController@addTree');
    Route::any('admin-cate/editTree', 'CateController@editTree');
    Route::any('admin-cate/changeStatus', 'CateController@changeStatus');
    Route::resource('admin-cate', 'CateController');

});


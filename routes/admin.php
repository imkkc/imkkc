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
    //其他页面
    Route::get('admin/dash', 'DashboardController@index');

    //后台权限管理
    Route::any('batAdmin', 'AdminController@batAdmin');
    Route::any('admin/index', 'AdminController@index');
    Route::resource('admin', 'AdminController');

});


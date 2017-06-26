<?php
/**
 * 后台路由配置,配置方法参看
 * app/Http/Kernel.php 与 Providers/RouteServiceProvider.php
 */

/**
 * 登录与退出
 */
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function ($router)
{
    $router->get('/', 'LoginController@showLoginForm');
    $router->get('login', 'LoginController@showLoginForm')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->any('logout', 'LoginController@logout');
    $router->get('dash', 'DashboardController@index');
});

/**
 * 后台权限管理
 */
Route::any('admin/batAdmin', 'Admin\AdminController@batAdmin');
Route::resource('admin', 'Admin\AdminController');


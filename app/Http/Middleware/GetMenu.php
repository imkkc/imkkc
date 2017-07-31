<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GetMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->attributes->set('left_menu',$this->getMenu());
        return $next($request);
    }

    function getMenu(){
        $left_menu = array(
            array(
                'name' => '审核管理',
                'link' => '/Admin/apply/list',
                'icon' => 'fa-slideshare',
                'sub'  => array(
                    array(
                        'name' => '文章审核',
                        'link' => '/Admin/apply/list',
                        'icon' => 'fa-circle-o',
                        'sub'  => array(),
                    ),
                    array(
                        'name' => '会员审核',
                        'link' => '/Admin/apply/list',
                        'icon' => 'fa-circle-o',
                        'sub'  => array(),
                    ),
                ),
            ),
            array(
                'name' => '订单查询',
                'link' => '/Admin/orders/index',
                'icon' => 'fa-files-o',
                'sub'  => array(),
            ),
            array(
                'name' => '账号管理',
                'link' => '#',
                'icon' => 'fa-group',
                'sub'  => array(
                    array(
                        'name' => '用户列表',
                        'link' => '/admin/index',
                        'icon' => 'fa-circle-o',
                        'sub'  => array(

                        ),
                    ),
                    array(
                        'name' => '权限菜单',
                        'link' => '/admin-cate/index',
                        'icon' => 'fa-circle-o',
                        'sub'  => array(),
                    ),
                ),
            ),
        );
        return $left_menu;
    }

}
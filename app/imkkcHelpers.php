<?php
/**
 * 自定义方法库
 *
 * 在composer.json中 找到autoload 追加
 *
 *   "files": [
 *       "app/imkkcHelpers.php"
 *   ],
 *
 * 运行命令 composer dump-autoload 任何位置都可以使用这里方法，就像laravel的dd()、abort()
 *
 */

if (!function_exists('kkc')) {
    function pageNav($menu_node, $page_title)
    {
        $page = [
            'page_title'       => $page_title,
            'page_description' => '后台管理者中心',
            'top_menu'         => [
                ['link' => '/admin/dash', 'name' => '首页'],
                ['link' => '/admin/index', 'name' => $menu_node],
            ]
        ];
        return $page;
    }
}
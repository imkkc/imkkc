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
    function pageNav($menu_node, $page_title,$page_description='后台管理者中心')
    {
        $page = [
            'page_title'       => $page_title,
            'page_description' => $page_description,
            'top_menu'         => [
                ['link' => '/admin/dash', 'name' => '首页'],
                ['link' => '/admin/index', 'name' => $menu_node],
            ]
        ];
        return $page;
    }
}

if (!function_exists("get_file_name"))
{
    /**
     * return random key
     * @return string
     */
    function get_file_name($path) {
        $handle = opendir($path);
        $file_name = array();
        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != "..") {
                $fileArr = explode('.',$file);
                $file_name[] = $fileArr[0];
            }
        }
        closedir($handle);
        return $file_name;
    }
}

if (!function_exists("getTree")) {
    /**
     * getTree无限递归函数
     * @param $data
     * @param int $pid
     * @return array
     * @nodes 变量，保存子集数据
     */
    function getTree($data, $pId)
    {
        $tree = '';
        foreach($data as $k => $v)
        {
            if($v['parent'] == $pId)
            {
                //父亲找到儿子
                $v['nodes'] = getTree($data, $v['id']);
                $tree[] = $v;
                //unset($data[$k]);
            }
        }
        return $tree;
    }
}

if(!function_exists("leftMenu")){
    function leftMenu($left_menu) {
        $tree = '';
        foreach($left_menu as $item)
        {

            if($item['sub'])
            {
                $tree .= '<li class="treeview">';
                $tree .= '<a href="'.$item['link'].'"><i class="fa '.$item['icon'].'"></i><span>'.$item['name'].'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
                $tree .= '<ul class="treeview-menu">';
                $tree .= leftMenu($item['sub']) ;
                $tree .= '</ul>';
                $tree .= '</li>';
            }else{
                $tree .= '<li>';
                $tree .= '<a href="'.$item['link'].'"><i class="fa '.$item['icon'].'"></i>'.$item['name'].'</a>';
                $tree .= '</li>';
            }

        }
        return $tree;
    }
}
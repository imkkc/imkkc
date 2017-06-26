{{--
这里的面包屑样式修改了源文件css（不知为何修改后无法覆盖原css就先改了bootstrap源文件、在这里备份下源文件样式）
源文件位置 /Users/hm/webroot/imkkc/public/packages/admin-lte/dist/css/AdminLTE.min.css
一共改了两处.content-header与.content-header>.breadcrumb
.content-header{position:relative;padding:15px 15px 0 15px}
.content-header>.breadcrumb{float:right;background:transparent;margin-top:0;margin-bottom:0;font-size:12px;padding:7px 5px;position:absolute;top:15px;right:10px;border-radius:2px}
--}}
<section class="content-header">
    <h1>
        {{ $page_title or null }}
        <small>{{ $page_description or null }}</small>
    </h1>

    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> 帐号管理</a></li>
        <li class="active">用户列表</li>
    </ol>
</section>

{{--
这里的面包屑样式修改了源文件css（不知为何修改后无法覆盖原css就先改了bootstrap源文件、在这里备份下源文件样式）
源文件位置 /Users/hm/webroot/imkkc/public/packages/admin-lte/dist/css/AdminLTE.min.css
一共改了两处.content-header与.content-header>.breadcrumb
.content-header{position:relative;padding:15px 15px 0 15px}
.content-header>.breadcrumb{float:right;background:transparent;margin-top:0;margin-bottom:0;font-size:12px;padding:7px 5px;position:absolute;top:15px;right:10px;border-radius:2px}
--}}
<section class="content-header">
    <h1>
        {{ $page['page_title'] or null }}
        <small>{{ $page['page_description'] or null }}</small>
    </h1>

    <!-- You can dynamically generate breadcrumbs here -->
    <ol class="breadcrumb">
        @foreach ($page['top_menu'] as $item)
            <li><a href="{{$item['link']}}"><i class="fa fa-dashboard"></i> {{$item['name']}}</a></li>
        @endforeach
        <li class="active">{{$page['page_title']}}</li>
    </ol>
</section>

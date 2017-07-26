<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset("/packages/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ auth('admin')->user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    {{--<form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>--}}
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview active"><a href="#"><i class="fa fa-chain-broken"></i><span>Link</span></a></li>
      <li class="treeview"><a href="#"><i class="fa fa-files-o"></i><span>Another Link</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-slideshare"></i><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
        <?php $left_menu=Request::get('left_menu'); ?>
      {!! leftMenu($left_menu) !!}
{{--      @foreach($left_menu as $item)
        @if($item['sub'])
          <li class="treeview">
            <a href="#"><i class="fa {{$item['icon']}}"></i><span>{{$item['name']}}</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              @foreach($item['sub'] as $sub)
              <li><a href="{{$sub['link']}}"><i class="fa {{$sub['icon']}}"></i>{{$sub['name']}}</a></li>
              @endforeach
            </ul>
          </li>
        @else
          <li class="treeview"><a href="#"><i class="fa {{$item['icon']}}"></i><span>{{$item['name']}}</span></a></li>
        @endif
      @endforeach--}}

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
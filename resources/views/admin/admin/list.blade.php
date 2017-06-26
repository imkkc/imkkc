@extends('layouts.dashboard')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("/packages/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<style>
  div.dataTables_filter {
    text-align: left;
  }
</style>
@endsection
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
          {{--<button type="button" class="btn btn-success">添加</button>--}}

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_filter" class="dataTables_filter">
            账户名:<input type="search" class="form-control" placeholder="" aria-controls="example1">
            邮箱:<input type="search" class="form-control" placeholder="" aria-controls="example1">
            <a class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>搜索</a>
            <a class="btn btn-default"><i class="glyphicon glyphicon-user"></i> 添加</a>
          </div>

          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th>用户名称</th>
              <th>邮箱帐号</th>
              <th>创建时间</th>
              <th>修改时间</th>
              <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($model as $item)
            <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td>
                <a class="btn btn-xs"><i class="fa fa-edit"></i> 修改</a>
                <a class="btn btn-xs"><i class="fa fa-pause"></i> 停用</a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>用户名称</th>
              <th>邮箱帐号</th>
              <th>创建时间</th>
              <th>修改时间</th>
              <th>操作</th>
            </tr>
            </tfoot>
          </table>
          {{ $model->appends($pageQuery)->links('pagination::imkkc-default') }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@endsection
@section('js')
<!-- DataTables -->
<script src="{{asset('/packages/admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/packages/admin-lte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset("/packages/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{asset("/packages/admin-lte/plugins/fastclick/fastclick.js")}}"></script>

<!-- page script -->
<script>
    $(function () {
//        $("#example1").DataTable();
        $('#example1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false
        });

        $(".glyphicon-search").parent().click(function(){
            location.href = '{{url()->current()}}?perPage={{$pageQuery['perPage']}}';
        });

    });
</script>
@endsection
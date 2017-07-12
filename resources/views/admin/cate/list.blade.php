@extends('layouts.dashboard')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ config('app.plugins')."datatables/dataTables.bootstrap.css"}}">
<style>
  div.dataTables_filter {
    text-align: left;
  }
  .float-right{float: right;margin-left: 5px;}
  .red{ color: red }
  .green{  color: green;}
  .width-10{width: 10%;display:inline}
  .radius-4{border-radius:4px;}
</style>
@endsection
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        {{--<div class="box-header">--}}
          {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
          {{--<button type="button" class="btn btn-success">添加</button>--}}
        {{-- </div>--}}
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_filter" class="dataTables_filter">
            {!! Form::open(array('route' => array('admin-cate.index'), 'class'=>'form-horizontal', 'method'=>'get')) !!}
            {!! Form::label('title','菜单名:') !!}
            {!! Form::text('cate_name',null,['placeholder' => '请输入菜单名','class'=>'form-control radius-4']) !!}
            {!! Form::hidden('perPage', $pageQuery['perPage']) !!}
            {!! Form::label('title','状态:') !!}
            {!! Form::select('status', [1000=>'请选择状态',1=>'开启', 0 =>'关闭'],null,['placeholder' => '请选择状态','class'=>'form-control width-10']) !!}
            <a class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>搜索</a>
            <a class="btn btn-default float-right" data-toggle="tooltip" data-original-title="关闭勾选菜单" onclick="batChangeStatus('close')"><i class="glyphicon glyphicon-pause"></i> 关闭</a>
            <a class="btn btn-default float-right" data-toggle="tooltip" data-original-title="开启勾选菜单" onclick="batChangeStatus('open')"><i class="glyphicon glyphicon-play"></i> 开启</a>
            <a class="btn btn-default float-right" data-toggle="tooltip" data-original-title="添加新的菜单" href="{{url('/admin-cate/create')}}"><i class="fa fa-plus"></i> 添加</a>
            {!! Form::close() !!}
          </div>

          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
              <th><input type="checkbox" name="check_all" onclick="check_all(this)"></th>
              <th>菜单名称</th>
              <th>菜单路径</th>
              <th>创建时间</th>
              <th>修改时间</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($model as $item)
            <tr>
              <td><input type="checkbox" name="check_item" value="{{$item->id}}" onclick="check_item()"></td>
              <td>{{$item->cate_name}}</td>
              <td>{{$item->cate_path}}</td>
              <td>{{$item->created_at}}</td>
              <td>{{$item->updated_at}}</td>
              <td class="{{$status['color'][$item->status]}}">{{$status['isOpen'][$item->status]}}</td>
              <td>
                <a class="btn btn-xs" href="{{ url('admin-cate/'.$item->id) }}"><i class="fa fa-edit"></i> 修改</a>
                <a class="btn btn-xs {{$option['color'][$item->status]}}" onclick="changeStatus({{$item->id}})"><i class="fa {{$option['icons'][$item->status]}}"></i> {{$option['status'][$item->status]}} </a>
              </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th><input type="checkbox" name="check_all" onclick="check_all(this)"></th>
                <th>菜单名称</th>
                <th>菜单路径</th>
                <th>创建时间</th>
                <th>修改时间</th>
                <th>状态</th>
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
<script src="{{config('app.plugins').'datatables/jquery.dataTables.min.js'}}"></script>
<script src="{{config('app.plugins').'datatables/dataTables.bootstrap.min.js'}}"></script>
<!-- SlimScroll -->
<script src="{{config('app.plugins')."slimScroll/jquery.slimscroll.min.js" }}"></script>
<!-- FastClick -->
<script src="{{config('app.plugins')."fastclick/fastclick.js"}}"></script>

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
            {{--location.href = '{{url()->current()}}?perPage={{$pageQuery['perPage']}}';--}}
            $('.form-horizontal').submit();
        });
    });

    function check_all(obj){
        if($(obj).prop("checked") == true){
            $('input[name=check_item]').prop("checked",true);
        }else{
            $('input[name=check_item]').prop("checked",false);
        }
    }

    function check_item(){
        var tt = $('input[name=check_item]:checked').length;
        var qq = $('input[name=check_item]').length;
        if(tt < qq){
            $('input[name=check_all]').prop('checked',false);
        }else if(tt.length == qq.length){
            $('input[name=check_all]').prop('checked',true);
        }
    }

    function batChangeStatus(opt){
        var msg = '';
        if(opt == 'open')
            msg = '确认开启选中项吗？';
        if(opt == 'close')
            msg = '确认关闭选中项吗？';
        var checkItems = $('input[name=check_item]:checked').length;
        if (checkItems <= 0) {
            alert('请先打勾选项!');
          //  doAlert('请先打勾选项!请先打勾选项!请先打勾选项!请先打勾选项!');
            return false;
        }
        if(window.confirm(msg)){
            var ids = '';
            $('input[name=check_item]:checked').each(function(){
                ids += $(this).val() + ',';
            });
            ids = ids.substring(0,ids.length-1);
            $.post('{{url('/admin-cate/changeStatus')}}',{ids:ids,opt:opt},function(data) {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.info);
                }
            });
        }
        return false;
    }

    function changeStatus(id) {
        $.post('{{url('/admin-cate/changeStatus')}}',{ids:id},function(data) {
            if (data.success) {
                window.location.reload();
            } else {
                alert(data.info);
            }
        });
    }

</script>
@endsection
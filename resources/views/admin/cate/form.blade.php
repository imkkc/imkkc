@extends('layouts.dashboard')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ config('app.plugins')."datatables/dataTables.bootstrap.css"}}">
@endsection

@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="panel-heading">管理者的创建/修改</div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="panel-body">
              @if(Session::has('message'))
                  <div class="alert alert-info alert-dismissable" style="text-align: center;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                          &times;
                      </button>
                      {{Session::get('message')}}
                  </div>
              @endif
              @if(Session::has('errorMessage'))
                  <div class="alert alert-error alert-dismissable" style="text-align: center;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                          &times;
                      </button>
                      {{Session::get('errorMessage')}}
                  </div>
              @endif

          @if (!$model->exists)
                  {{ Form::open(array('route' => array('admin-cate.store'), 'files' => true, 'class' => 'form-horizontal')) }}
              @else
                  {{ Form::model($model, array('method' => 'PATCH', 'route' => array('admin-cate.update', $model->id), 'files' => true, 'class' => 'form-horizontal')) }}
              @endif

              <div class="form-group{{ $errors->has('cate_name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">菜单名称</label>
                <div class="col-md-6">
                    {{ Form::text('cate_name', null, array('placeholder' => '请输入菜单名称','class' => 'form-control')) }}
                  @if ($errors->has('cate_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cate_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('cate_path') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">菜单路径</label>
                <div class="col-md-6">
                    {{ Form::text('cate_path', null, array('placeholder' => '请输入菜单路径','class' => 'form-control')) }}
                  @if ($errors->has('cate_path'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cate_path') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label">所属菜单</label>
                  <div class="col-md-6">
                      {{ Form::text('parent', null, array('placeholder' => '请输入所属菜单的id','class' => 'form-control')) }}
                      @if ($errors->has('parent'))
                          <span class="help-block">
                    <strong>{{ $errors->first('parent') }}</strong>
                </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">确认提交</button>
                  <button type="button" class="btn btn-default" onclick="history.go(-1)">返回</button>
                </div>
              </div>

                  {{ Form::close()  }}

          </div>
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
    });
</script>
@endsection
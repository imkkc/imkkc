@extends('layouts.dashboard')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset("/packages/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<link rel="stylesheet" href="{{ asset("/packages/admin-lte/imkkc.css")}}">
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
                  {{ Form::open(array('route' => array('admin.store'), 'files' => true, 'class' => 'form-horizontal')) }}
              @else
                  {{ Form::model($model, array('method' => 'PATCH', 'route' => array('admin.update', $model->id), 'files' => true, 'class' => 'form-horizontal')) }}
              @endif

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">用户帐号</label>
                <div class="col-md-6">
                    {{ Form::text('name', null, array('placeholder' => '请输入用户名','class' => 'form-control')) }}
                  @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">邮箱地址</label>
                <div class="col-md-6">
                    {{ Form::text('email', null, array('placeholder' => '请输入邮箱','class' => 'form-control')) }}
                  @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">登录密码</label>
                <div class="col-md-6">
                    {{ Form::text('password', '', array('placeholder' => !$model->exists ? '请输入密码' : '重新设置密码','class' => 'form-control')) }}
                  @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
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
    });
</script>
@endsection
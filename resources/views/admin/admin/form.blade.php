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
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.store') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">用户名</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" value="{{ $model->name or old('name') }}" autofocus>

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
                  <input id="email" type="email" class="form-control" name="email" value="{{ $model->email or old('email') }}" autofocus>

                  @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">密码</label>

                <div class="col-md-6">
                  <input id="password" type="text" class="form-control" name="password">

                  @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    确认提交
                  </button>
                </div>
              </div>

            </form>
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
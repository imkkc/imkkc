@extends('layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ config('app.plugins')."select2/select2.min.css"}}">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #3c8dbc;
        border-color: #367fa9;
        padding: 1px 10px;
        color: #fff;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-right: 5px;
        color: rgba(255,255,255,0.7);
    }
/*    .select2-container--default .select2-selection--multiple {
        background-color: white;
        border: 1px solid #aaa;
        border-radius: 0px;
        cursor: text;
    }*/
</style>
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
                      {!! Form::select('status', [1000=>'请选择状态',1=>'开启', 0 =>'关闭'],null,['placeholder' => '请选择状态','class'=>'form-control width-10']) !!}
                      @if ($errors->has('parent'))
                          <span class="help-block">
                    <strong>{{ $errors->first('parent') }}</strong>
                </span>
                      @endif
                  </div>
              </div>

                  <div class="form-group">
                  <label class="col-md-4 control-label">所属角色</label>
                  <div class="col-md-6">
                      <select class="form-control select2" multiple="multiple" data-placeholder="  可以在这选定有权访问菜单的角色，也可以添加完后去角色管理中设置">
                          <option value="0">超级管理员</option>
                          <option value="1">用户管理</option>
                          <option value="2">运营审核组</option>
                          <option value="3">财务管理</option>
                          <option value="4">商务管理</option>
                          <option value="5">知识产权</option>
                          <option value="6">市场部门</option>
                      </select>
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
<!-- SlimScroll -->
<script src="{{config('app.plugins')."slimScroll/jquery.slimscroll.min.js" }}"></script>
<!-- FastClick -->
<script src="{{config('app.plugins')."fastclick/fastclick.js"}}"></script>
<!-- Select2 -->
<script src="{{config('app.plugins')."select2/select2.full.min.js"}}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
@endsection
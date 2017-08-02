@extends('layouts.AdminLTE-2-4-0')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('packages/bootstrap-treeview/bootstrap-treeview.min.css')}}">
<style>

    .margin-t-5{margin-bottom: 5px;}
    .form-control{height: 40px;}
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
            <div class="container">


                <div class="row">
                    <div class="col-md-3">
                        <div class="panel panel-info ">
                            <div class="panel-heading">
                                <h3 class="panel-title">系统权限</h3>
                            </div>
                            <div class="panel-body right_centent">
                                <div id="left-tree"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#add-cates" data-toggle="tab" aria-expanded="true">添加.权限菜单</a></li>
                                <li class=""><a href="#edit-cates" data-toggle="tab" aria-expanded="false">编辑.权限菜单</a></li>
                                <li class=""><a href="#del-cates" data-toggle="tab" aria-expanded="false">删除.权限菜单</a></li>
                                <li class=""><a href="#out-cates" data-toggle="tab" aria-expanded="false">释放.权限菜单</a></li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane active" id="add-cates">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">添加区</h3>
                                        </div>
                                        <!--添加操作权限 start-->
                                        <div class="panel-body ">
                                            <div id="addShow">
                                                <div>
                                                    <div class="input-group margin-t-5">
                                                        <span class="input-group-addon">权限名称:</span>
                                                        <input id="addName" type="text" class="form-control">
                                                    </div>
                                                    <div class="input-group margin-t-5">
                                                        <span class="input-group-addon">菜单链接:</span>
                                                        <input id="addLink" type="text" class="form-control">
                                                    </div>
                                                    <div class="input-group margin-t-5">
                                                        <span class="input-group-addon">所属上级:</span>
                                                        <input id="addParentText" type="text" class="form-control">
                                                        <input id="addParentID" type="hidden" class="form-control">
                                                    </div>
                                                    <div class="input-group margin-t-5">
                                            <span class="input-group-addon" data-toggle="modal" href="/admin/icons" data-target=".bs-example-modal-lg" style="cursor: pointer">
                                                ICON <i class="icon_i fa fa-fw fa-plus-square"></i>
                                            </span>
                                                        <input type="text" class="form-control IconInput">
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px;">
                                                    <input id="Save" class="btn btn-success" type="button" value="确认添加">
                                                </div>
                                            </div>
                                        </div><!--添加操作权限 end-->
                                    </div>
                                </div>

                                <div class="tab-pane" id="edit-cates">

                                    <div class="panel panel-warning">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">编辑区（修改选中节点）</h3>
                                        </div>
                                        <!--编辑操作权限 start-->
                                        <div class="panel-body ">
                                            <div id="editShow">
                                                <div>
                                                    <div class="input-group margin-t-5">
                                                        <span class="input-group-addon">权限名称:</span>
                                                        <input id="editName" type="text" class="form-control">
                                                    </div>
                                                    <div class="input-group margin-t-5">
                                                        <span class="input-group-addon">菜单链接:</span>
                                                        <input id="editLink" type="text" class="form-control">
                                                    </div>
                                                    <div class="input-group margin-t-5">
                                                        <span id="btnMove" class="input-group-addon" style="cursor: pointer">选上级<i class="fa fa-fw fa-plus-square"></i></span>
                                                        <input id="editParentText" type="text" class="form-control">
                                                        <input id="editParentID" type="hidden" class="form-control">
                                                        <input id="treeID" type="hidden" class="form-control">
                                                    </div>
                                                    <div class="input-group margin-t-5">
                                            <span class="input-group-addon" data-toggle="modal" href="/admin/icons" data-target=".bs-example-modal-lg" style="cursor: pointer">
                                                ICON <i class="icon_i fa fa-fw fa-plus-square"></i>
                                            </span>
                                                        <input type="text" class="form-control IconInput">
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px;">
                                                    <input id="Edit" class="btn btn-warning" type="button" value="确认修改">
                                                </div>
                                            </div>
                                        </div><!--编辑操作权限 end-->
                                    </div>
                                </div>

                                <div class="tab-pane" id="del-cates">
                                    <div class="panel panel-danger ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">删除区</h3>
                                        </div>
                                        <!--删除操作权限 start-->
                                        <div class="panel-body ">
                                            <div id="delShow">
                                                <div>
                                                    <div class="input-group margin-t-5">
                                                        选中节点进行删除操作
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px;">
                                                    <input id="btnDel" class="btn btn-danger" type="button" value="删除节点">
                                                </div>
                                            </div>
                                        </div><!--删除操作权限 end-->
                                    </div>
                                </div>

                                <div class="tab-pane" id="out-cates">
                                    <div class="panel panel-info ">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">释放区（释放选中节点）</h3>
                                        </div>
                                        <div class="panel-body ">
                                            <div id="toggle-selected">
                                                <div>
                                                    <div class="input-group margin-t-5">
                                                        释放选中节点，添加区、编辑区还原
                                                    </div>
                                                </div>
                                                <div style="margin-top: 10px;">
                                                    <input id="btn-toggle-selected" class="btn btn-info" type="button" value="释放节点">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>

                </div>
            </div>

            <!--弹出框 更改节点 start-->
            <div class="modal fade" id="addOperation-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content radius_5">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">系统权限</h4>
                        </div>
                        <div class="modal-body">
                            <div class="panel panel-primary ">
                                <div class="panel-heading">
                                    <h3 class="panel-title">系统权限</h3>
                                </div>
                                <div class="panel-body right_centent">
                                    <div class="left-tree"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="Save" type="button" class="btn btn-primary">保存</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--弹出框 更改节点 end-->

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
<script type="text/javascript" src="{{url('packages/bootstrap-treeview/bootstrap-treeview.js')}}"></script>
<script>

    $(function () {

        regHtml('modal-lg');//icons弹层
        onLoad();//页面进入、修改之后都用到

        //页面加载
        function onLoad() {
            $.ajax({
                type: "post",
                url: '{{url('/admin-cate/getTree')}}',
                data: {},
                //async : false, //同步，但是同步是要同步请求将锁住浏览器，必须等待请求完成才可以执行其他
                success: function (data) {
                    if (data.status == 200) {
                        //渲染树
                        $('#left-tree').treeview({
                            data: data.info,
                            levels: 3,
                            onNodeSelected: function (event, node) {
                                //编辑区
                                $('#editName').val(node.text);
                                $('#editLink').val(node.link);
                                $('#treeID').val(node.id);
                                $('#edit-cates').find('.IconInput').val(node.icon);
                                $('#edit-cates').find('.icon_i').removeClass().addClass('icon_i '+node.icon);
                                var parent = $('#left-tree').treeview('getParents', node);
                                if (parent.length == 0) {
                                    $('#editParentID').val(0);
                                    $('#editParentText').val('');
                                } else {
                                    $('#editParentID').val(parent[0].id);
                                    $('#editParentText').val(parent[0].text);
                                }
                                //添加区
                                //$('#addName').val('');
                                //$('#addLink').val('');
                                $('#addParentID').val(node.id);
                                $('#addParentText').val(node.text);
                            },
                            showCheckbox: false//是否显示多选
                        });
                    } else {
                        imkkcAlerts('没有数据');
                    }
                }
            });
        }


        $("#btn-toggle-selected").click(function(){
            var node = $('#left-tree').treeview('getSelected');
            $('#left-tree').treeview('unselectNode', [node]);
            //编辑区
            $('#editName').val('');
            $('#editLink').val('');
            $('#treeID').val('');
            $('#editParentID').val('');
            $('#editParentText').val('');
            //添加区
            $('#addName').val('');
            $('#addLink').val('');
            $('#addParentID').val('');
            $('#addParentText').val('');
        });

        //保存-新增
        $("#Save").click(function () {
            $.ajax({
                type: "post",
                url: '{{url('/admin-cate/addTree')}}',
                data: {
                    text: $('#addName').val(),
                    parent: $('#addParentID').val(),
                    icon: $('.IconInput').val(),
                    link: $('#addLink').val()
                },
                success: function (data) {
                    if (data.status == 200) {
                        //静态添加节点
                        var parentNode = $('#left-tree').treeview('getSelected');
                        var node = {
                            text: $('#addName').val(),
                            parent: $('#addParentID').val(),
                            icon: $('.IconInput').val(),
                            link: $('#addLink').val()
                        };
                        $('#left-tree').treeview('addNode', [node, parentNode]);

                    } else {
                        imkkcAlerts(data.message);
                    }
                }
            });
        });

        //保存-编辑
        $('#Edit').click(function () {
            var node = $('#left-tree').treeview('getSelected');
            if (node.length == 0) {
                imkkcAlerts('请选择节点');
                return false;
            }else{
                $.ajax({
                    type: "post",
                    url: '{{url('/admin-cate/editTree')}}',
                    data: {
                        id: $('#treeID').val(),
                        text: $('#editName').val(),
                        link: $('#editLink').val(),
                        icon: $('.IconInput').val(),
                        parent: $('#editParentID').val()
                    },
                    success: function (data) {
                        if (data.status == 200) {

//                        var node = $('#left-tree').treeview('getSelected');
//                        var newNode = {
//                            text: $('#editName').val(),
//                            link: $('#editLink').val(),
//                            parent: $('#editParentID').val()
//                        };
//                        $('#left-tree').treeview('updateNode', [node, newNode]);
                            onLoad();
                        } else {
                            imkkcAlerts(data.message);
                        }
                    }
                });
            }
        });


        //删除
        $("#btnDel").click(function () {
            var node = $('#left-tree').treeview('getSelected');
            if (node.length == 0) {
                imkkcAlerts('请选择节点');
                return false;
            }
            if(confirm('确认要删除该节点吗？')){
                $.ajax({
                    type: "post",
                    url: '{{url('/admin-cate/delTree')}}',
                    data: {
                        id: $('#treeID').val(),
                        opt: 'close'
                    },
                    success: function (data) {
                        if (data.status == 200) {
                            $('#left-tree').treeview('removeNode', [node, {silent: true}]);
                        } else {
                            imkkcAlerts(data.message);
                        }
                    }
                });

            }

        });
        $("#btnMove").click(function () {
            $('#addOperation-dialog').modal('show');
            $.ajax({
                type: "post",
                url: '{{url('/admin-cate/getTree')}}',
                data: {},
                //async : false, //同步，但是同步是要同步请求将锁住浏览器，必须等待请求完成才可以执行其他
                success: function (data) {
                    if (data.status == 200) {
                        //渲染树
                        $('.left-tree').treeview({
                            data: data.info,
                            levels: 3,
                            onNodeSelected: function (event, node) {
                                if ($('#editName').val() == node.text)
                                {
                                    $('#addOperation-dialog').modal('hide');
                                    imkkcAlerts('权限菜单不能选择自己作为上级，请选择菜单树其他节点');
                                    return false;
                                }
                                $('#editParentID').val(node.id);
                                $('#editParentText').val(node.text);
                                $('#addOperation-dialog').modal('hide');
                            },
                            showCheckbox: false//是否显示多选
                        });
                    } else {
                        imkkcAlerts('没有数据');
                    }
                }
            });
        });

        /*-----页面pannel内容区高度自适应 start-----*/
        $(window).resize(function () {
            setCenterHeight();
        });
        setCenterHeight();
        function setCenterHeight() {
            var height = $(window).height();
            var centerHight = height - 200;
            $(".right_centent").height(centerHight).css("overflow", "auto");
        }

        /*-----页面pannel内容区高度自适应 end-----*/
    });


</script>
@endsection
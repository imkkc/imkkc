@extends('layouts.AdminLTE-2-4-0')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('packages/bootstrap-treeview/bootstrap-treeview.min.css')}}">
<link rel="stylesheet" href="{{url('packages/bootstrap-dialog/bootstrap-dialog.min.css')}}">
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
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <h3 class="panel-title">系统权限</h3>
                            </div>
                            <div class="panel-body right_centent">
                                <div id="left-tree"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <h3 class="panel-title">添加区</h3>
                            </div>
                            <!--添加操作权限 start-->
                            <div class="panel-body ">
                                <div id="addShow">
                                    <div>
                                        <div class="input-group margin-t-5">
                                            <span class="input-group-addon" >权限名称:</span>
                                            <input id="addName" type="text"  class="form-control" />
                                        </div>
                                        <div class="input-group margin-t-5">
                                            <span class="input-group-addon" >菜单链接:</span>
                                            <input id="addLink" type="text"  class="form-control" />
                                        </div>
                                        <div class="input-group margin-t-5">
                                            <span class="input-group-addon" >所属上级:</span>
                                            <input id="addParentText" type="text"  class="form-control" />
                                            <input id="addParentID" type="hidden"  class="form-control" />
                                        </div>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <input id="Save" class="btn btn-primary" type="button" value="确认添加" />
                                    </div>
                                </div>
                            </div><!--添加操作权限 end-->
                        </div>

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
                    <div class="col-md-3">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <h3 class="panel-title">编辑区（修改选中节点）</h3>
                            </div>
                            <!--编辑操作权限 start-->
                            <div class="panel-body ">
                                <div  id="editShow">
                                    <div>
                                        <div class="input-group margin-t-5">
                                            <span class="input-group-addon" >权限名称:</span>
                                            <input id="editName" type="text"  class="form-control" />
                                        </div>
                                        <div class="input-group margin-t-5">
                                            <span class="input-group-addon" >菜单链接:</span>
                                            <input id="editLink" type="text"  class="form-control" />
                                        </div>
                                        <div class="input-group margin-t-5">
                                            <span id="btnMove" class="input-group-addon" style="cursor: pointer">属上级<i class="fa fa-fw fa-plus-square"></i></span>
                                            <input id="editParentText" type="text"  class="form-control" />
                                            <input id="editParentID" type="hidden"  class="form-control" />
                                            <input id="treeID" type="hidden"  class="form-control" />
                                        </div>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <input id="Edit" class="btn btn-primary" type="button" value="确认修改" />
                                    </div>
                                </div>
                            </div><!--编辑操作权限 end-->
                        </div>
                        <div class="panel panel-info ">
                            <div class="panel-heading">
                                <h3 class="panel-title">刷新区（释放选中节点）</h3>
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
<script type="text/javascript" src="{{url('packages/bootstrap-dialog/bootstrap-dialog.min.js')}}"></script>
<script>
    function changeStatus(id) {
        $.post('{{url('/admin-cate/changeStatus')}}',{ids:id},function(data) {
            if (data.success) {
                window.location.reload();
            } else {
                alert(data.info);
            }
        });
    }

    $(function () {
        $.extend({
            /**
             *dialog
             *des:提示框
             */
            showMsg: function (options) {
                var defaults = {
                    text: '成功',
                    title: '提示'
                }
                var opts = $.extend({}, defaults, options);
                BootstrapDialog.show({
                    title: '提示',
                    size: BootstrapDialog.SIZE_SMALL,
                    type: BootstrapDialog.TYPE_DEFAULT,
                    message: opts.text,
                    buttons: [{
                        label: '确定',
                        action: function (dialog) {
                            dialog.close();
                        }
                    }]
                });
            },
            /**
             *dialog
             *des:提示框
             */
            showMsgText: function (text) {
                $.showMsg({text: text});
            }
        });


        onLoad();

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
                                var parent = $('#left-tree').treeview('getParents', node);
                                if (parent.length == 0) {
                                    $('#editParentID').val(0);
                                    $('#editParentText').val('');
                                } else {
                                    $('#editParentID').val(parent[0].id);
                                    $('#editParentText').val(parent[0].text);
                                }
                                //添加区
                                $('#addName').val('');
                                $('#addLink').val('');
                                $('#addParentID').val(node.id);
                                $('#addParentText').val(node.text);
                            },
                            showCheckbox: false//是否显示多选
                        });
                    } else {
                        alert('没有数据');
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
                    link: $('#addLink').val()
                },
                success: function (data) {
                    if (data.status == 200) {
                        //静态添加节点
                        var parentNode = $('#left-tree').treeview('getSelected');
                        var node = {
                            text: $('#addName').val(),
                            parent: $('#addParentID').val(),
                            link: $('#addLink').val()
                        };
                        $('#left-tree').treeview('addNode', [node, parentNode]);

                    } else {
                        alert('添加失败了');
                    }
                }
            });
        });

        //保存-编辑
        $('#Edit').click(function () {
            $.ajax({
                type: "post",
                url: '{{url('/admin-cate/editTree')}}',
                data: {
                    id: $('#treeID').val(),
                    text: $('#editName').val(),
                    link: $('#editLink').val(),
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
                        alert('添加失败了');
                    }
                }
            });
        });


        //删除
        $("#btnDel").click(function () {
            var node = $('#left-tree').treeview('getSelected');
            if (node.length == 0) {
                $.showMsgText('请选择节点');
                return;
            }
            BootstrapDialog.confirm({
                title: '提示',
                message: '确定删除此节点?',
                size: BootstrapDialog.SIZE_SMALL,
                type: BootstrapDialog.TYPE_DEFAULT,
                closable: true,
                btnCancelLabel: '取消',
                btnOKLabel: '确定',
                callback: function (result) {
                    if (result) {
                        del();
                    }
                }
            });
            function del() {
                $('#left-tree').treeview('removeNode', [node, {silent: true}]);
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
                                $('#editParentID').val(node.id);
                                $('#editParentText').val(node.text);
                                $('#addOperation-dialog').modal('hide');
                            },
                            showCheckbox: false//是否显示多选
                        });
                    } else {
                        alert('没有数据');
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
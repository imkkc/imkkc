@extends('layouts.dashboard')
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
            {{--<div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <input id="btnAdd" class="btn btn-primary" type="button" value="添加节点">
                        <input id="btnMove" class="btn btn-success" type="button" value="节点移动">
                        <input id="btnDel" class="btn btn-danger" type="button" value="删除节点">
                    </div>
                </div>
            </div>--}}
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <h3 class="panel-title">系统权限</h3>
                            </div>
                            <div class="panel-body right_centent">
                                <div id="left-tree"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
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
                                            <span class="input-group-addon" >所属上级:</span>
                                            <input id="editParent" type="text"  class="form-control" />
                                        </div>
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <input id="Edit" class="btn btn-primary" type="button" value="确认修改" />
                                    </div>
                                </div>
                            </div><!--编辑操作权限 end-->
                        </div>
                        <input id="btnAdd" class="btn btn-primary" type="button" value="添加节点">
                        <input id="btnMove" class="btn btn-success" type="button" value="节点移动">
                        <input id="btnDel" class="btn btn-danger" type="button" value="删除节点">
                    </div>
                </div>
            </div>
            <!-- 弹出框 新增权限 start -->
            <div class="modal fade" id="addOperation-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">

                    <div class="modal-content radius_5">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">新增节点</h4>
                        </div>
                        <div class="modal-body">
                            <div group="" item="add">
                                <div class="input-group margin-t-5">
                                    <span class="input-group-addon">权限名称:</span>
                                    <input id="addName" type="text" class="form-control" />
                                </div>
                                <div class="input-group margin-t-5">
                                    <span class="input-group-addon">菜单链接:</span>
                                    <input id="addLink" type="text" class="form-control" />
                                </div>
                                <div class="input-group margin-t-5">
                                    <span class="input-group-addon">所属上级:</span>
                                    <input id="addParent" type="text" class="form-control" />
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
            <!-- 弹出框 新增权限 end -->

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
<!-- page script -->
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
            showMsgText:function(text)
            {
                $.showMsg({ text: text });
            }
        });


            onLoad();

            BindEvent();
            //页面加载
            function onLoad()
            {
                //渲染树
                $('#left-tree').treeview({
                    data: getTree(),
                    levels: 1,
                    onNodeSelected:function(event, node){
                        $('#editName').val(node.text);
                        $('#editLink').val(node.link);
                    },
                    showCheckbox:false//是否显示多选
                });
            }

            //事件注册
            function BindEvent()
            {
                //保存-新增
                $("#Save").click(function () {
                    $('#addOperation-dialog').modal('hide')
                    //静态添加节点
                    var parentNode = $('#left-tree').treeview('getSelected');
                    var node = {
                        text: $('#addName').val()
                    };
                    $('#left-tree').treeview('addNode', [node, parentNode]);

                });
            }
            //保存-编辑
            $('#Edit').click(function(){
                var node = $('#left-tree').treeview('getSelected');
                var newNode={
                    text:$('#editName').val(),
                    link:$('#editLink').val()
                };
                $('#left-tree').treeview('updateNode', [ node, newNode]);
            });

            //显示-添加
            $("#btnAdd").click(function(){
                var node = $('#left-tree').treeview('getSelected');
                //console.log(JSON.stringify(node));
//                if (node.length == 0) {
//                    $.showMsgText('请选择节点');
//                    return;
//                }
                $('#addName').val('');
                $('#addLink').val('');
                if (node.length > 0) {
                    $('#addParent').val(node[0].text);
                }
                $('#addOperation-dialog').modal('show');
            });
            //显示-编辑
            $("#btnEdit").click(function(){
                var node=$('#left-tree').treeview('getSelected');
                $('#editShow').show();

            });
            //删除
            $("#btnDel").click(function(){
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
                        if(result)
                        {
                            del();
                        }
                    }
                });
                function del(){

                    $('#left-tree').treeview('removeNode', [ node, { silent: true } ]);
                }

            });
            $("#btnMove").click(function(){
                $.showMsgText('更新中...');
            });

            //获取树数据
            function getTree(){
                var tree = [
                    {
                        text: "一年级",
                        id:"1",
                        nodes: [
                            {
                                text: "一班",
                                id:"2",
                                nodes: [
                                    {
                                        text: "物理",
                                        id:"3",
                                        link:"abc/wuli"
                                    },
                                    {
                                        text: "化学",
                                        id:"4",
                                        link:"abc/huaxue"
                                    }
                                ]
                            },
                            {
                                text: "二班"
                            }
                        ]
                    },
                    {
                        text: "二年级"
                    },
                    {
                        text: "三年级"
                    },
                    {
                        text: "四年级"
                    },
                    {
                        text: "五年级"
                    }
                ];
                return tree;
            }

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
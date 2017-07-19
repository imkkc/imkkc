@extends('layouts.dashboard')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ config('app.plugins')."datatables/dataTables.bootstrap.css"}}">
<link rel="stylesheet" href="{{url('packages/bootstrap-treeview/bootstrap-treeview.min.css')}}">
<link rel="stylesheet" href="{{url('packages/bootstrap-dialog/bootstrap-dialog.min.css')}}">
<style>
  div.dataTables_filter {
    text-align: left;
  }
  .float-right{float: right;margin-left: 5px;}
  .red{ color: red }
  .green{  color: green;}
  .width-10{width: 10%;display:inline}
  .radius-4{border-radius:4px;}
    .margin-t-5{margin-top: 5px;}
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
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <input id="btnAdd" class="btn btn-primary" type="button" value="添加节点">
                        <input id="btnMove" class="btn btn-success" type="button" value="节点移动">
                        <input id="btnDel" class="btn btn-danger" type="button" value="删除节点">
                    </div>
                </div>
            </div>
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
                                <h3 class="panel-title">编辑区</h3>
                            </div>
                            <!--编辑操作权限 start-->
                            <div class="panel-body right_centent">
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
                                    </div>
                                    <div style="margin-top: 10px;">
                                        <input id="Edit" class="btn btn-primary" type="button" value="确定" />
                                        <input id="Edit_cancel" class="btn btn-default" type="button" style="margin-left:80px;display:none;" value="取消" />
                                    </div>
                                </div>
                            </div>
                            <!--编辑操作权限 end-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- 弹出框 新增权限 start -->
            <div class="modal fade" id="addOperation-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">

                    <div class="modal-content radius_5">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">新增</h4>
                        </div>
                        <div class="modal-body">
                            <div group="" item="add">
                                <div>
                                    <div class="input-group margin-t-5">
                                        <span class="input-group-addon">名称:</span>
                                        <input id="addName" type="text" class="form-control" />
                                    </div>

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
<!-- DataTables -->
<script src="{{config('app.plugins').'datatables/jquery.dataTables.min.js'}}"></script>
<script src="{{config('app.plugins').'datatables/dataTables.bootstrap.min.js'}}"></script>
<!-- SlimScroll -->
<script src="{{config('app.plugins')."slimScroll/jquery.slimscroll.min.js" }}"></script>
<!-- FastClick -->
<script src="{{config('app.plugins')."fastclick/fastclick.js"}}"></script>
    <script type="text/javascript" src="{{url('packages/bootstrap-treeview/bootstrap-treeview.js')}}"></script>
    <script type="text/javascript" src="{{url('packages/bootstrap-dialog/bootstrap-dialog.min.js')}}"></script>
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
    <script type="text/javascript">
        $(function(){

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
                    text:$('#editName').val()
                };
                $('#left-tree').treeview('updateNode', [ node, newNode]);
            });



            //显示-添加
            $("#btnAdd").click(function(){
//                var node = $('#left-tree').treeview('getSelected');
//                if (node.length == 0) {
//                    $.showMsgText('请选择节点');
//                    return;
//                }
                $('#addName').val('');
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
                                        text: "物理"
                                    },
                                    {
                                        text: "化学"
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
                var centerHight = height - 240;
                $(".right_centent").height(centerHight).css("overflow", "auto");
            }
            /*-----页面pannel内容区高度自适应 end-----*/
        });



    </script>
@endsection
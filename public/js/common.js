$(function () {
    //Ajax提交POST表单CSRF攻击防护，Token先设置在meta中（在模板layout主页）
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

/**
 * 根据参数构造原始AdminLTE弹层
 * @param type 弹出层类型 default|primary|info|warning|success|danger
 * @returns {string}
 */
function imkkcModal(element,type) {
    if(!element){
        element = 'msg or html';
    }
    if(!type){
        type = 'default';
    }
    //保证弹出层modal元素唯一
    $.each(['default','primary','info','warning','success','danger'], function(i,val){
        if ($('#modal-'+val).length) {
            $('#modal-'+val).modal('hide').remove();
        }
    });

    var html = '';
    html += '<div class="modal modal-'+type+' fade" id="modal-'+type+'">';
    html += '<div class="modal-dialog">';
    html += '<div class="modal-content">';
    html += '<div class="modal-header">';
    html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    html += '<span aria-hidden="true">&times;</span></button>';
    html += '<h4 class="modal-title">Danger Modal</h4>';
    html += '</div>';
    html += '<div class="modal-body">';
    html += '<p>One fine body&hellip;</p>';
    html += '</div>';
    html += '<div class="modal-footer">';
    html += '<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>';
    html += '<button type="button" class="btn btn-outline">Save changes</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    //构造弹出层html结构
    $('section.content').append(html);
    $('#modal-'+type).find('div.modal-body').html(element);
    $("#modal-"+type).modal('show');
}

/**
 * 弹层提示（alert与modal组合）
 * @param message
 * @param type  弹层类型 default|primary|info|warning|success|danger
 */
function imkkcAlerts(message,type) {

    if(!message){
        message = 'msg or html';
    }
    if(!type){
        type = 'info';
    }
    //保证弹出层modal元素唯一
    $.each(['default','primary','info','warning','success','danger'], function(i,val){
        if ($('#modal-'+val).length) {
            $('#modal-'+val).modal('hide').remove();
        }
    });
    var html = '';
    html += '<div class="modal modal-'+type+' fade" id="modal-'+type+'">';
    html += '<div class="modal-dialog">';
    html += '<div class="modal-content">';
    html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    html += '<span aria-hidden="true">&times;</span>&nbsp;&nbsp;</button>';
    html += '<div class="alert alert-'+type+' alert-dismissible">';
    html += '<h4><i class="icon fa fa-'+type+'"></i> Alert!</h4>'+message;
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    $('section.content').prepend(html);
    $("#modal-"+type).modal('show');
}

/**
 * 可以使用这样的方式加载页面，a标签改成span也行
 * <a data-toggle="modal" href="/admin/icons" data-target=".bs-example-modal-lg">Icons</a>
 */
function regHtml(name) {
    var html = '';
    name = name || 'modal-lg';
    if(name == 'modal-lg'){
        html += '<div class="modal fade bs-example-modal-lg" role="dialog" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;">';
        html += '<div class="modal-dialog modal-lg" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
        html += '<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4></div>';
        html += '<div class="modal-body"> ...</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    }
    $('section.content').prepend(html);

}
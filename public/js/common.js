$(function () {
    //Ajax提交POST表单CSRF攻击防护，Token先设置在meta中（在模板layout主页）
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
/**
 * 动态生成弹出层
 * @param html
 * @param type 弹出层类型 default|primary|info|warning|success|danger
 */
function imkkcModal(html,type){
    if(!html){
        html = 'msg or html';
    }
    if(!type){
        type = 'default';
    }
    //构造弹出层html结构
    $('section.content').append(createHtmlModal(type));
    $('#modal-'+type).find('div.modal-body').html(html);
    $("#modal-"+type).modal('show');
}

/**
 * 根据参数构造原始AdminLTE弹层html
 * @param type 弹出层类型 default|primary|info|warning|success|danger
 * @returns {string}
 */
function createHtmlModal(type) {
    if(!type){
        type = 'default';
    }
    //保证弹出层modal元素唯一
    if ($('#modal-'+type).length) {
        $('#modal-'+type).remove();
    }
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
    return html;
}
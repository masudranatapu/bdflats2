/*Add edit Account name model*/
$(document).on('click', '#box_label', function () {
    var url = $(this).data('url');
    var box_id = $(this).data('id');
    var box_label = $(this).data('box_label');

    $('#box_label_update_frm').attr('action', url);
    $('#box_label_update_frm .box_id').val(box_id);
    $('#box_label_update_frm .box_label').val(box_label);

    $('#heading').text('Edit Box Label');
});

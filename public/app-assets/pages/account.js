/*Add edit Account name model*/
$(document).on('click','.editSourceModal', function(){
    var url             = $(this).data('url');
    // var id              = $(this).data('id');
    var bank_name       = $(this).data('bank_name');
    var bank_acc_name   = $(this).data('bank_acc_name');
    var bank_acc_no     = $(this).data('bank_acc_no');

    $('#bank_update_frm').attr('action',url);
    // $('#bank_update_frm .source_id').val(id);
    $('#bank_update_frm .bank_name').val(bank_name);
    $('#bank_update_frm .bank_acc_name').val(bank_acc_name);
    $('#bank_update_frm .bank_acc_no').val(bank_acc_no);
});

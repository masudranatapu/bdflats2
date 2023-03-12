/*Add edit Account name model*/
$(document).on('click','.editCodeModal', function(){
    var url         = $(this).data('url');
    var value       = $(this).data('value');
    var type        = $(this).data('type');

    $('#currncy_update_frm').attr('action',url);
    $('#currncy_update_frm .type').val(type);
    $('#currncy_update_frm .currency_value').val(value);

    if (type == 'code'){
        $('#input_title').text('Edit Currency Code');
        $('.currency_value').attr('placeholder','Enter Currency Code');
        $('#currncy_update_frm .submit-btn').val('Update change');
    }else if (type == 'name'){
        $('#input_title').text('Edit Currency Name');
        $('.currency_value').attr('placeholder','Enter Currency Name');
        $('#currncy_update_frm .submit-btn').val('Update change');
    }else{
        $('#input_title').text('Edit Currency Exchange Rate');
        $('.currency_value').attr('placeholder','Enter Currency Exchange Rate');
        $('#currncy_update_frm .submit-btn').val('Update change');
    }
});

/*Add New Currency */
$(document).on('click','.addCurrencyModal', function(){
    var url = $(this).data('url');
    $('#currncy_store_frm').attr('action',url);
});

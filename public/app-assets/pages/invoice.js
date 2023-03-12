/*Subcategory by Category*/
$(document).on('change','#acc_source', function(){
    var id = $(this).val();
    var url = $(this).attr('data-url');
    $('#bank_acc').html('');
    $('#payment_method').html('');
    if ('' != id) {
        var pageurl = url+'/'+id;
        $.ajax({
            type:'get',
            url:pageurl,
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                $('#bank_acc').html(data.bank_acc);
                $('#payment_method').html(data.payment_method);
                // var scatId = $('#sub_category').find(":selected").val();
                // var url = $('#sub_category').attr('data-url');
                // getHscode(scatId,url);
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }


});

$('#gbp_to_ac').val(1);
$('#alian_currency').text('GBP');

$(document).on('change', '#purchase_currency', function(e){

    var val     = $(this).val();
        var rate    = $(this).find(':selected').data('rate');
    var code    = $(this).find(':selected').data('code');

    $('#gbp_to_ac').val(rate);
    $('    #alian_currency').text(code);

})

$(document).on('click', '.stockGenerate', function(e){
    var vendor_country_no   = $(this).data('vendor_country_no');
    var invoice_id   = $(this).data('invoice_id');
    var pk_no   = $(this).data('pk_no');
    $('#invoice_pk_no').val(pk_no);
    $('#invoice_id').text(invoice_id);
    $('#warehouse_no').val(vendor_country_no);

})

// $(document).on('click','.page-link', function(){
//     var pageNum = $(this).data('dt-idx');
//     setCookie('invoice',pageNum);
// });

// var value = getCookie('invoice');
// var table = $('#indextable').dataTable();

// if (value != '') {
//     var value = value-1
//     table.fnPageChange(value,true);
//     // setCookie('invoice','');
// }

function setCookie(invoice,pageNum) {
    var today = new Date();
    var name = invoice;
    var elementValue = pageNum;
    var expiry = new Date(today.getTime() + 30 * 24 * 3600 * 1000); // plus 30 days

    document.cookie = name + "=" + elementValue + "; path=/; expires=" + expiry.toGMTString();
    // console.log(document.cookie);

}
function getCookie(name) {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/*View Product Details Modal*/
$(document).on('click','#popup_product_modal', function(){
    var url         = $(this).data('url');
    var sku_id      = $(this).data('sku_id');
    var warehouse   = $(this).data('warehouse_no');
    var type        = $(this).data('type');
    var get_url = $('#base_url').val();

    var pageurl = get_url+'/'+url+'/'+type;
    $.ajax({
        type:'post',
        url:pageurl,
        dataType: "json",
        data: {
            sku_id: sku_id,
            warehouse_no: warehouse,
            type: type,
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            var label = ''
            if (type == 'boxed') {
                var label = 'Product In Box'
            }else if (type == 'shipped') {
                var label = 'Product In Shipment'
            }else if (type == 'shelved') {
                var label = 'Product In Shelve'
            }else if (type == 'dispatched') {
                var label = 'Product That Is Dispatched'
            }
            $('#modal_title').text(label);
            $('#append_view').html('');
            $('#append_view').html(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});

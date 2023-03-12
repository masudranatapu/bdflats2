$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var get_url = $('#base_url').val();
/*Shipment barcode entry events*/
$(document).ready(function() {

    $("#shipment_submit").click(function(){
        var bar_code1 = $('#bar_code1').val();
        var bar_code2 = $('#bar_code2').val();
        check_if_product_exists(bar_code2);
        if (status == 0) {
            call_ajax_post(bar_code1,bar_code2);
        }else{
            alert('Dupliucate Box Entry !')
            flag = 0;
        }
      });

    function call_ajax_post(bar_code1, bar_code2) {

    $.ajax({
        type:'post',
        url: get_url+'/get-box-details',
        data:{
            bar_code1: bar_code1,
            bar_code2: bar_code2,
        },
        // dataType: 'JSON',
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if(data == 1) {
                alert('Shipment not found !');
            }else if(data == 2){
                alert('Box not found !');
            }else if(data == 3){
                alert('Duplicate Box Serial !');
            }else if(data == 4){
                alert('Duplicate Box Label !');
            }else if(data == 5){
                alert('Box is empty !');
            }else if(data == 6){
                alert('Product quantity does not match !');
            }else if(data == 7){
                alert('Box and Ship label mismatch !');
            }else if(data == 8){
                alert('Box Item & Shipment Method Does Not Match !');
            }
            else if(data == 9){
                alert('Please try again !');
            }else{
                $('#append_tr').append(data);
                alert('Box Added Successfully !');
            }
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
    }
});
function check_if_product_exists(product) {
    status = 0;
    $('#append_tr tr').each(function (i, row) {
        var rows = $(row);
        var prd = rows.find('#box_name').text();
        if (prd == String(product)) {
            status = 1;
        }else{
            status = 0;
        }
    });
}
/*delete product row method*/
$(document).on('click','#append_tr [id*=delete_prd]', function(){
    if(confirm('Are you sure your want to delete?')){
        var row = $(this).closest("tr");
        var id = $(this).data('shipment_id');
        var get_url = $('#base_url').val();
        $.ajax({
            type:'post',
            url: get_url+'/delete-shipment-box',
            data:{
                id: id,
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'JSON',
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if(data == 1) {
                    alert('Shipment box not found !');
                }else if(data == 2){
                    alert('Product not found !');
                }else if(data == 5 || data == 3){
                    alert('Please try again !');
                }else{
                    // alert('Box deleted successfully !')
                    toastr.success('Box Is Now Free of Shipment!', 'Box Deassigned Successfully');
                    $(row).fadeOut();
                    $(row).remove();
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }
});

var prev_val;



$('#rows_ [id*=shipment_status]').focus(function() {
    prev_val = $(this).val();
}).change(function() {
     $(this).blur() // Firefox fix as suggested by AgDude
    var success = confirm('Are you sure you want to change status ?');
    if(success){
        var status = this.value;
        var shipment_id = $(this).data('shipment_id');
        $.ajax({
            type:'post',
            url: get_url+'/update-shipment-status',
            data:{
                status: status,
                shipment_id: shipment_id,
            },
            dataType: 'JSON',
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if(data == 1) {
                    alert('Shipment not found !');
                }else if(data == 2) {
                    location.reload();
                }
                toastr.success('Shipment status changed successfull', 'successfull');
                var id_ = 'shipment_status'+shipment_id;
                var selectobject = document.getElementById(id_);
                for (var i=0; i<selectobject.length; i++) {
                    if (selectobject.options[i].value < status)
                        selectobject.remove(i);
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }
    else{
        $(this).val(prev_val);
        return false;
    }
});

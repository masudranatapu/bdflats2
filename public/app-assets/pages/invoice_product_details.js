/*customer radio button events*/
$('input[type=radio][name=scustomer]').change(function() {
    if (this.value == 'ukshop') {
        var type = 'ukshop';
    }
    else if (this.value == 'reseller') {
        var type = 'reseller';
    }
    var pageurl = '/parent-root/'+type;
    $.ajax({
        type:'get',
        url:pageurl,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#book_customer').html(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});

function add_box(shipment_name) {
    var pageurl = '/add_box_ajax/'+shipment_name;
    $.ajax({
        type:'get',
        url:pageurl,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            console.log(data);
            // $('#book_customer').html(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
}

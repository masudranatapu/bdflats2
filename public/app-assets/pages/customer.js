/*customer radio button events*/
$('input[type=radio][name=scustomer]').change(function() {
    if (this.value == 'ukshop') {
        var type = 'ukshop';
    }
    else if (this.value == 'reseller') {
        var type = 'reseller';
    }
    var get_url  = $('#base_url').val();

    var pageurl  = get_url+'/parent-root/'+type;
    $.ajax({
        type:'get',
        url:pageurl,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#booking_under').html(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});
$('#checkbox1').change(function() {
    if(this.checked) {
        $('#display_none').fadeIn();
    }else{
        $('#display_none').fadeOut();
    }
});

function getState(country) {
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/customer_state_by_country/'+country,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
                $('#state').html(data);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
}
$(document).on('change','#country', function(){
    var country_id     = $(this).val();
    getState(country_id);
});

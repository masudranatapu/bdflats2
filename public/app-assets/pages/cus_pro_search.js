$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/*booking customer radio button events*/
var get_url = $('#base_url').val();
jQuery(document).ready(function($) {
    var value = $('input[type=radio][name=booking_radio]:checked').val()
    typeahead(value);
    var checked_val = $("input[type=radio][name=booking_radio]:checked").val();
    if (checked_val == 'customer') {
        var placeholder = 'Enter Customer Name';
        var name        = 'Customer';
    }else{
        var placeholder = 'Enter Reseller Name';
        var name        = 'Reseller';
    }
    $('#book_customer').attr('placeholder', placeholder);
    $('#cusorresellername').text(name);
});
$('input[type=radio][name=booking_radio]').change(function() {
    var value = this.value;
    change_radio(value);
    $('#post_code').val(0);
});
function change_radio(value) {
    if (value == 'customer') {
        var type = 'customer';
        var placeholder = 'Enter Customer Name';
        var name        = 'Customer';
        $('#customer_id').val(0);
        $('#post_code').val(0);
        $('#customer_address').val(0);
    }
    else if (value == 'reseller') {
        var type = 'reseller';
        var placeholder = 'Enter Reseller Name';
        var name        = 'Reseller';
        $('#cus_mobile').fadeOut();
        $('#cus_no_section').fadeOut();
        $('#cus_country').fadeOut();
        $('#cus_email').fadeOut();
        $('#customer_id').val(0);
        $('#post_code').val(0);
        $('#customer_address').val(0);
    }
    $('#scrollable-dropdown-menu2').html('');
    $('#cusorresellername').text(name);
    $('#cus_details').css('display','none');
    $('<input>').attr('type','search').attr('id','book_customer').attr('required',true).attr('name','q').addClass('form-control search-input2').attr('placeholder', placeholder).attr('autocomplete','off').appendTo('#scrollable-dropdown-menu2');
    typeahead(type);
}
function typeahead(type) {
    var get_url = $('#base_url').val();
    var engine = new Bloodhound({
        remote: {
            url: get_url+'/get-customer-info?q=%QUERY%&type='+type,
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $('.search-input2').on('typeahead:selected', function (e, datum) {
        $.ajax({
            type:'post',
            url: get_url+'/get-customer-details',
            data:{
              customer: datum,
              type: type
            },
            dataType: 'json',
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                // console.log(data['billing_address'].length);
                $('#cus_details').fadeIn();
                $('#cus_mobile').fadeOut();
                $('#cus_no_section').fadeOut();
                $('#cus_country').fadeOut();
                $('#cus_email').fadeOut();
                if( data['info'].EMAIL){
                    var email =  data['info'].EMAIL;
                }else{
                    var email = '------';
                }
                if( data['info'].POST_CODE){
                    var post_code =  data['info'].POST_CODE;
                }else{
                    var post_code = '------';
                }
                if(type == 'reseller'){
                    var no = data['info'].RESELLER_NO;
                }else{
                    var no = data['info'].CUSTOMER_NO;
                }
                var append = '<tr><td><small>'+ data['info'].NAME +' ( '+no+')</small></td><td><small id="mobile_no_">'+ data['info'].MOBILE_NO +'</small></td><td><small>'+ email +'</small></td><td><small>'+ post_code +'</small></td></tr>';
                if (data['billing_address'] !== null) {
                    var add_1 = data['billing_address'].ADDRESS_LINE_1 !== null ? data['billing_address'].ADDRESS_LINE_1 : '';
                    var add_2 = data['billing_address'].ADDRESS_LINE_2 !== null ? ','+data['billing_address'].ADDRESS_LINE_2 : '';
                    var add_3 = data['billing_address'].ADDRESS_LINE_3 !== null ? ','+data['billing_address'].ADDRESS_LINE_3 : '';
                    var add_4 = data['billing_address'].ADDRESS_LINE_4 !== null ? ','+data['billing_address'].ADDRESS_LINE_4 : '';
                    var state = data['billing_address'].STATE !== null ? ','+data['billing_address'].STATE : '';
                    var city = data['billing_address'].CITY !== null ? ','+data['billing_address'].CITY : '';
                    var post = data['billing_address'].POST_CODE !== null ? ','+data['billing_address'].POST_CODE : '';
                    var country = data['billing_address'].COUNTRY !== null ? ','+data['billing_address'].COUNTRY : '';
                    append += '<tr><td colspan="4"><small>Billing Address : '+add_1+add_2+add_3+add_4+state+city+post+country+'<small></td></tr>';
                }
                if(type != 'reseller' && data['delivery_address'] !== null ){
                    var add_1 = data['delivery_address'].ADDRESS_LINE_1 !== null ? data['delivery_address'].ADDRESS_LINE_1 : '';
                    var add_2 = data['delivery_address'].ADDRESS_LINE_2 !== null ? ','+data['delivery_address'].ADDRESS_LINE_2 : '';
                    var add_3 = data['delivery_address'].ADDRESS_LINE_3 !== null ? ','+data['delivery_address'].ADDRESS_LINE_3 : '';
                    var add_4 = data['delivery_address'].ADDRESS_LINE_4 !== null ? ','+data['delivery_address'].ADDRESS_LINE_4 : '';
                    var state = data['delivery_address'].STATE !== null ? ','+data['delivery_address'].STATE : '';
                    var city = data['delivery_address'].CITY !== null ? ','+data['delivery_address'].CITY : '';
                    var post = data['delivery_address'].POST_CODE !== null ? ','+data['delivery_address'].POST_CODE : '';
                    var country = data['delivery_address'].COUNTRY !== null ? ','+data['delivery_address'].COUNTRY : '';
                    append += '<tr><td colspan="4"><small>Delivery Address : '+add_1+add_2+add_3+add_4+state+city+post+country+'<small></td></tr>';
                }
                $('#append_cus').html(append);
                $('#post_code').val(data['info'].POST_CODE);
                $('#customer_id').val(data['info'].PK_NO);
                $('#customer_address').val(data['billing_address'] !== null ? data['billing_address'].PK_NO : 0);
                get_customer_postcode_update_ss();
                count_amount();
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    });
    $(".search-input2").typeahead({
        hint: true,
        highlight: true,
        minLength: 1,
    }, {
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        display: 'NAME',
        limit: 20,

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            // empty: [
            //     // '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            // ],
            empty: function(context){
                $(".tt-dataset").html('<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>');
                var IfChecked = $('input[id="radio_btn"]:checked').length;
                if (IfChecked>0) {
                    $('#cus_mobile').fadeIn();
                    $('#cus_no_section').fadeIn();
                    $('#cus_country').fadeIn();
                    $('#cus_email').fadeIn();
                }
                $('#customer_id').val(0);
                $('#cus_details').fadeOut();
            },
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                // $('#cus_mobile').fadeOut();
                // $('#cus_no_section').fadeOut();
                // $('#cus_country').fadeOut();
                if(data.POST_CODE){
                    var post_code = '('+data.POST_CODE+')';
                }else{
                    var post_code = '';
                }
                if(data.CITY){
                    var city = '('+data.CITY+')';
                }else{
                    var city = '';
                }
                if(data.CUSTOMER_NO){
                    var customer_no = '(CUST NO-'+data.CUSTOMER_NO+')';
                }else{
                    var customer_no = '';
                }
                if(data.RESELLER_NO){
                    var reseller_no = '(RES NO-'+data.RESELLER_NO+')';
                }else{
                    var reseller_no = '';
                }

                if (type == 'customer') {
                    return '<span class="list-group-item" style="cursor: pointer;" data-id="'+data.pk_no1+'" >' + data.NAME +'('+data.CUSTOMER_NO+')-'+ data.MOBILE_NO +'-'+ post_code +'-' + city + '</span>'
                }else{
                    return '<span class="list-group-item" style="cursor: pointer;" data-id="'+data.pk_no1+'" >' + data.NAME +'('+data.RESELLER_NO+')-'+ data.MOBILE_NO +'-'+ post_code +'-' + city + '</span>'
                }
            }
        }
    });
}
/*customer onkey change Event*/
    $(document).ready(function($) {
        // Set the Options for "Bloodhound" suggestion engine
        var get_url = $('#base_url').val();

        var engine = new Bloodhound({
            remote: {
                url: get_url+'/get-variant-info?q=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });
        $('.search-input').on('typeahead:selected', function (e, datum) {
            var product = $('#product').val();
            var flag = 0;
            flag = check_if_product_exists(product);
            if (flag == 0) {
                if (product != '') {
                    // $('#prd_name').html($('#product').val());
                    $.ajax({
                        type:'get',
                        url: get_url+'/get-prd-details',
                        data:{
                            product: product,
                        //   _token: "csrf _token()",
                        },
                        async :true,
                        beforeSend: function () {
                            $("body").css("cursor", "progress");
                        },
                        success: function (data) {
                            if(data.length != undefined) {
                                $('#append_tr').prepend(data);
                                get_air_sea_cost();
                                count_amount();
                                grand_total();
                                $('.search-input').typeahead('val', '');

                            }else{
                                alert('Product not found !');
                            }
                        },
                        complete: function (data) {
                            $("body").css("cursor", "default");
                        }
                    });
                }else{
                    alert('Product not found !')
                }
            }else{
                alert('You can not add same product twice !')
                flag = 0;
            }
        });
        $(".search-input").typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
            autoFocus: true
        }, {
            source: engine.ttAdapter(),
            // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
            display: 'IG_CODE',
            limit: 100,
            // the key from the array we want to display (name,id,email,etc...)
            templates: {
                empty: [
                    '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    // $('#cus_mobile').fadeIn()
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    return '<span class="list-group-item" style="cursor: pointer;"><img style="width:60px;height:50px;" class="mr-1" src="'+get_url+data.PRD_VARIANT_IMAGE_PATH+'" alt=" ">' + data.PRD_VARINAT_NAME + '</span>'
                    // $('#cus_mobile').fadeOut()
          }
            }
        });
    });
////////////////////// ADD CUSTOMER ///////////////////////////
$(document).on('click', '#cus_no_input', function(){
    var customer_name   = $('#book_customer').val();
    var customer_mobile = $('#cus_mobile_input').val();
    var custom_email    = $('#custom_email').val();
    var country         = $('#country_single').val();
    var url             = $(this).data('url');
    var customer_mobile_int = parseInt(customer_mobile);
    var customer_mobile_int = customer_mobile_int.toString().length;

    if (customer_mobile_int == 9 || customer_mobile_int == 10) {
        $.ajax({
            type:'post',
            url:url,
            data:{
                customer_name: customer_name,
                customer_mobile: customer_mobile,
                custom_email: custom_email,
                country: country
            },
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if (data.customer_id == 0) {
                    if(data.duplicate == 1){
                        alert('This mobile no existed on reseller table !');
                    }else{
                        alert('Duplicate Mobile No !');
                    }
                }else{
                    alert('Customer Added Successfully !')
                    $('#cus_add').fadeIn();
                    $('#cus_no').html('Customer No.<br><br>'+data.customer_no)
                    $('#cus_details').fadeIn();
                    $('#customer_id').val(data.customer_id);
                    var append = '<td><small>'+ customer_name +'</small></td><td><small id="mobile_no_">'+ customer_mobile +'</small></td><td><small>-------</small><td><small>-------</small></td></td>';
                    $('#append_cus').html(append);
                }

            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }else{
        alert('Mobile Number Must be Between 10 to 11 digit');
    }
});

function check_if_product_exists(product) {
    var flag = 0;
    $('#append_tr tr').each(function (i, row) {
        var rows = $(row);
        var prd = rows.find('#prd_ig_code').text();

        if (prd == product) {
            flag = 1;
        }
    });
    return flag;
}
/*delete product row method*/
$(document).on('click','#delete_prd', function(){
    if(confirm('Are you sure your want to delete?')){
        var row = $(this).closest("tr");
        $(row).fadeOut();
        $(row).remove();
        count_total_final();
        count_qty_final();
        count_amount();
        }
});

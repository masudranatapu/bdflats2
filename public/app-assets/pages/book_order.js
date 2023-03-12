$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on("keyup paste change keypress","[id*=booking_qty],[id*=amount_freight]", function (evt) {
    var self = $(this);
    self.val(self.val().replace(/[^0-9\.]/g, ''));
    if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
    {
        evt.preventDefault();
    }
});
function destroycreatetypeahead(country) {
    $(".search-input4").typeahead("destroy");
    call_typeahead(country);
}
function destroycreatetypeahead2(country) {
    $(".search-input8").typeahead("destroy");
    call_typeahead2(country);
}

$(document).on('click','[id*=book_to_order]',function(event) {
    event.preventDefault();
    var offer_status = $(this).val();
    $("#offer_status").val(offer_status);
    var type = $('input[name="booking_radio"]:checked').val();
    var get_url = $('#base_url').val();
    var flag = check_if_product_from_multi_source();
    if (flag > 0) {
        alert('Multiple Product Source Not Allowed !')
    }else{
        var customer_id = $('#customer_id').val();
        if (customer_id == 0) {
            if (type == 'reseller') {
                alert('Please Add Reseller First !');
            }else{
                alert('Please Add Customer First !');
            }
            return false;
        }else{

            var booking_under = $('#booking_under').find(":selected").val();
            if (type == 'customer') {
                var customer_id = $('#customer_id').val();
                $.ajax({
                    type:'get',
                    url:get_url+'/checkifCustomerAddressexists/'+customer_id+'/'+type,
                    async :true,
                    dataType: 'json',
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                    },
                    success: function (data) {

                        if (data['response'] == 1) {

                            $('#cus_add_modal').html('').append(data.html);
                            destroycreatetypeahead(2);
                            destroycreatetypeahead2(2);

                            $('#customeraddress').val($('#book_customer').val());
                            $('#customeraddress2').val($('#book_customer').val());
                            $('#mobilenoadd').val(($('#mobile_no_').text()).trim());
                            $('#mobilenoadd2').val(($('#mobile_no_').text()).trim());

                            if (data['billing'] === null && data['delivery'] === null) {
                                $('#checkbox1').prop('checked', false);
                                $('#same_as_label').css('display','block');
                                $('#booking_create').val(1);
                            }else if(data['billing'] === null || data['delivery'] === null){
                                if (data['delivery'] === null) {
                                    $('#addresstype option[value=1]').attr('selected','selected');
                                    $('#addresstype').css("pointer-events", 'none');
                                }else if(data['billing'] === null) {

                                    $('#addresstype option[value=1]').attr('selected','selected');
                                    $('#addresstype').css("pointer-events", 'none');
                                }
                                $('#checkbox1').prop('checked', true);
                                $('#same_as_label').css('display','block');
                                $('#billing_address_section').fadeIn();
                                $('#booking_create').val(0);
                            }

                            $('#UpdateCustomerAddress').modal('show');
                            $('#customer_id_modal_').val(customer_id);
                            return false;

                        }else if (booking_under > 0) {
                            var url = $('#post_form').attr('action');
                            $('#post_form').attr('action', url+"/order").submit();
                        }else{
                            alert('Please Select Agent !');
                        }
                    },
                    complete: function (data) {
                        $("body").css("cursor", "default");
                    }
                });
            }else if (booking_under > 0) {
                var url = $('#post_form').attr('action');
                $('#post_form').attr('action', url+"/order").submit();
            }else{
                alert('Please Select Agent !');
            }
        }
    }
});

// $(document).on('submit','.offer_apply',function(e){
//     e.preventDefault();
//     alert(1);

// })

function add_address_bookorder() {
    var get_url             = $('#base_url').val();
    var order_date_         = $('input[name=order_date]').val();
    $('#order_date_').val(order_date_);
    var customer_mobile_int = $('#mobilenoadd').val();

    var customer_mobile_int = parseInt(customer_mobile_int);
    var customer_mobile_int = customer_mobile_int.toString().length;

    var customeraddress = $('#customeraddress').val();
    var post_code = $('#post_code_').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var ad_1 = $('#ad_1_').val();

    var customeraddress2 = $('#customeraddress2').val();
    var post_code2 = $('#post_code_2').val();
    var city2 = $('#city2').val();
    var state2 = $('#state2').val();
    var ad1 = $('#ad1').val();

    if (!$('input[name=same_as_add]').is(':checked')) {
        if(customeraddress == ''){alert('Please enter a name');return false;}
        if(post_code == ''){alert('Please enter post code');return false;}
        if(city == ''){alert('Please select city');return false;}
        if(state == ''){alert('Please select state');return false;}
        if(ad_1 == ''){alert('Please enter addres 1');return false;}

    } else {

        if(customeraddress == ''){alert('Please enter a name');return false;}
        if(post_code == ''){alert('Please enter post code');return false;}
        if(city == ''){alert('Please select city');return false;}
        if(state == ''){alert('Please select state');return false;}
        if(ad_1 == ''){alert('Please enter addres line 1');return false;}

        if(customeraddress2 == ''){alert('Please enter a name');return false;}
        if(post_code2 == ''){alert('Please enter post code');return false;}
        if(city2 == ''){alert('Please select city');return false;}
        if(state2 == ''){alert('Please select state');return false;}
        if(ad1 == ''){alert('Please enter addres 1');return false;}
    }

    if (customer_mobile_int == 9 || customer_mobile_int == 10) {
        $.ajax({
            type:'POST',
            url:get_url+'/postCustomerAddress2',
            data: $('#add_new_customer_form').serialize(),
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if (data['status'] == 1) {
                    $('#UpdateCustomerAddress').modal('hide');
                    $('#customer_address').val(data['final_address']);
                    var is_sm = data['post_code'] >= 87000 ? 0 : 1;
                    $('#is_sm').val(is_sm);
                    var url = $('#post_form').attr('action');
                   $('#post_form').attr('action', url+"/order").submit();
                }else{
                    alert('Please Try Again !');
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }else{
        alert('Mobile Number Must be Between 10 to 11 digit');
    }
}

$(document).on('click','#check_offer',function(e) {
    var get_url             = $('#base_url').val();
    var form = $('#post_form');
    var flag = check_if_product_from_multi_source();
    if (flag > 0) {
        alert('Multiple Product Source Not Allowed !')
    }else{

        $.ajax({
            type :'post',
            data: form.serialize(),
            url: get_url+'/check-offer',
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if(data.status == false){
                    toastr.warning(data.msg,'Error');
                }else if(data.status == true){
                    console.log(data);
                    $("#checkOfferSection").html(data.html);
                    $('#check_offer_txt').text('Recheck Offer');
                    toastr.success(data.msg,'Success');
                }
            },
            complete: function (data){
                $("body").css("cursor", "default");
            }
        });

    }
})

$(document).on('click','.submit_button_book2',function(){
    $('#customer_section').fadeIn();
    var booking_type = $(this).val();
    $("#booking_type").val(booking_type);
    $('.submit_button_book2').removeClass('submit_button_book2').addClass('d-none');
    $('#book_and_order_with_offer').removeClass('d-none');
    $(this).attr('id','submit_button_book');
    if(booking_type == 'book_and_check_offer'){
        $('.proceed_book_with_offer').text('Proceed to Book with Offer');
    }else{
        $(this).removeClass('d-none');
    }
});

$(document).on('click','#book_2_order2',function(){
    $('#customer_section').fadeIn();
    $('#book_2_order2').attr('id','book_to_order');
});

$(document).on('click', '#submit_button_book', function(event) {
    event.preventDefault();
    // $(this).attr('disabled',true);
    var booking_type = $(this).val();
    $("#booking_type").val(booking_type);
    var type = $('input[name="booking_radio"]:checked').val();
    var flag = check_if_product_from_multi_source();
    if (flag > 0) {
        alert('Multiple Product Source Not Allowed !');
        $(this).removeAttr('disabled');
    }else if($('#booking_under').val() == ''){
        alert('Please Select Agent !');
    }else{
        var customer_id = $('#customer_id').val();
        if (customer_id == 0) {
            $(this).removeAttr('disabled');
            if (type == 'reseller') {
                alert('Please Add Reseller First !');
            }else{
                alert('Please Add Customer First !');
            }
            return false;
        }else{
            $('#post_form').submit();
        }
    }
});
$(document).on('click', '#book_and_order_with_offer', function(event) {
    event.preventDefault();
    // $(this).attr('disabled',true);
    var booking_type = $(this).val();
    $("#booking_type").val(booking_type);
    var type = $('input[name="booking_radio"]:checked').val();
    var flag = check_if_product_from_multi_source();
    if (flag > 0) {
        alert('Multiple Product Source Not Allowed !');
        $(this).removeAttr('disabled');
    }else{
        var customer_id = $('#customer_id').val();
        if (customer_id == 0) {
            $(this).removeAttr('disabled');
            if (type == 'reseller') {
                alert('Please Add Reseller First !');
            }else{
                alert('Please Add Customer First !');
            }
            return false;
        }else{

            var booking_under = $('#booking_under').find(":selected").val();
            if($('#booking_under').val() == ''){
                    alert('Please Select Agent !');
            }else if (type == 'customer') {
                var customer_id = $('#customer_id').val();
                $.ajax({
                    type:'get',
                    url:get_url+'/checkifCustomerAddressexists/'+customer_id+'/'+type,
                    async :true,
                    dataType: 'json',
                    beforeSend: function () {
                        $("body").css("cursor", "progress");
                    },
                    success: function (data) {

                        if (data['response'] == 1) {

                            $('#cus_add_modal').html('').append(data.html);
                            destroycreatetypeahead(2);
                            destroycreatetypeahead2(2);

                            $('#customeraddress').val($('#book_customer').val());
                            $('#customeraddress2').val($('#book_customer').val());
                            $('#mobilenoadd').val(($('#mobile_no_').text()).trim());
                            $('#mobilenoadd2').val(($('#mobile_no_').text()).trim());

                            if (data['billing'] === null && data['delivery'] === null) {
                                $('#checkbox1').prop('checked', false);
                                $('#same_as_label').css('display','block');
                                $('#booking_create').val(1);
                            }else if(data['billing'] === null || data['delivery'] === null){
                                if (data['delivery'] === null) {
                                    $('#addresstype option[value=1]').attr('selected','selected');
                                    $('#addresstype').css("pointer-events", 'none');
                                }else if(data['billing'] === null) {

                                    $('#addresstype option[value=1]').attr('selected','selected');
                                    $('#addresstype').css("pointer-events", 'none');
                                }
                                $('#checkbox1').prop('checked', true);
                                $('#same_as_label').css('display','block');
                                $('#billing_address_section').fadeIn();
                                $('#booking_create').val(0);
                            }

                            $('#UpdateCustomerAddress').modal('show');
                            $('#customer_id_modal_').val(customer_id);
                            return false;

                        }else if (booking_under > 0) {
                            var url = $('#post_form').attr('action');
                            $('#post_form').attr('action', url+"/order").submit();
                        }else{
                            alert('Please Select Agent !');
                        }
                    },
                    complete: function (data) {
                        $("body").css("cursor", "default");
                    }
                });
            }else if (booking_under > 0) {
                $('#post_form').submit();
            }else{
                alert('Please Select Agent !');
            }
        }
        // var booking_under = $('#booking_under').find(":selected").val();
        // if (booking_under > 0) {
        //     $('#post_form').submit();
        // }else{
        //     $(this).removeAttr('disabled');
        //     alert('Please Select Agent !');
        // }
    }
});
$(document).on('click','#book_update_btn',function(){
    var flag = check_if_product_from_multi_source();
    if (flag > 0) {
        alert('Multiple Product Source Not Allowed !')
    }else{
        $('#post_form').submit();
    }
});

function check_if_product_from_multi_source(){
    var flag = 0;
    var first_item = 0
    var is_found = 0
    var house_first = 0
    var ship_no_first = 0
    $('#append_tr tr').each(function (i, row) {
        var rows = $(row);
        rows.find('#th_book_qty tr').each(function (i, row2) {
            // var rows2 = $(row2);
            // var type = rows2.find('#booking_qty').data('type');
            // var value = rows2.find('#booking_qty').val();
            // if (value > 0 && is_found == 0) {
            //     is_found++;
            //     first_item =  rows2.find('#booking_qty').data('type');
            // }
            // if (type != first_item && value > 0 && is_found == 1) {
            //     flag++;
            // }

            var rows2 = $(row2);
                var type = rows2.find('#booking_qty').data('type');
                var house = rows2.find('#booking_qty').data('house');
                var ship_no = rows2.find('#booking_qty').data('ship_no');
                var value = rows2.find('#booking_qty').val();
                if (value > 0 && is_found == 0) {
                    is_found++;
                    first_item =  rows2.find('#booking_qty').data('type');
                    house_first = rows2.find('#booking_qty').data('house');
                    ship_no_first = rows2.find('#booking_qty').data('ship_no');
                    var value = rows2.find('#booking_qty').val();
                }
                if ((house == 1 && house_first == 1 && ship_no_first == 0 && ship_no == 0) && (value > 0 && is_found == 1)) {
                    return;
                }else if(type != first_item && (value > 0 && is_found == 1)){
                    flag++;
                }
        });
    });
    return flag;
}
jQuery(document).ready(function($) {
    get_customer_postcode_update_ss();
    count_total_final();
    count_qty_final();
    count_amount();
    get_air_sea_cost();
    grand_total();
    $(document).on('input','#append_tr [id*=booking_qty]', function(){
        var tr = $(this).closest('tr');
        count_total_final();
        count_qty_final();
        count_amount();
        grand_total();
    });
    $("#amount_freight,#amount_freight2,#postage_cost,#postage_cost2").keyup(function(){
        grand_total();
    });
    /*CHANGING SS & SM COST*/
    $('input[type=radio][id*=is_sm_cost]').change(function() {
        count_amount();
        grand_total();
    });
    /*CHANGING REGULAR INSTALLMENT COST*/
    $('input[type=radio][id*=regular_price_all],input[type=radio][id*=installmnt_price_all]').change(function() {
        count_amount();
        grand_total();
    });
    /*CHANGING PRICE TYPE*/
    $('input[type=radio][id=price_type]').change(function() {
        // var value = this.value;
        // alert(value)
        count_amount();
        grand_total();
    });
    /*CHANGE PREFERRED SEA/AIR FREIGH FOR ALL PRODUCTS*/
    $('#customer_preferred_all').change(function() {
        var value = this.value;
        $('#append_tr tr').each(function (i, row) {
            var rows = $(row);
            if (value == 'air') {
                rows.find("input[type=radio][id=customer_preferred1]").prop("checked", true);
                rows.find("input[type=radio][id=customer_preferred2]").prop("checked", false);
            }else if(value == 'sea'){
                rows.find("input[type=radio][id=customer_preferred2]").prop("checked", true);
                rows.find("input[type=radio][id=customer_preferred1]").prop("checked", false);
            }
        });
        count_amount();
        grand_total();
    });
});
function get_customer_postcode_update_ss() {
    var post_code = $('#post_code').val();
    if (post_code >= 87000 ) {
        $('input[type=radio][id=is_sm_cost2]').prop("checked", true);
        $('input[type=radio][id=is_sm_cost1]').prop("checked", false);
        $('#is_sm').val(0);
    }else{
        $('input[type=radio][id=is_sm_cost1]').prop("checked", true);
        $('input[type=radio][id=is_sm_cost2]').prop("checked", false);
        $('#is_sm').val(1);
    }
}
/*booking customer radio button events*/
function get_air_sea_cost() {
    $('input[type=radio][id*=customer_preferred],input[type=radio][id=price_type]').change(function() {
        count_amount();
        grand_total();
    });
}
function count_total_final() {
    var ss_price_count = 0;
    $('#append_tr tr').each(function (i, row) {
        var rows = $(row);
        var ss_price = rows.find('#amount_ss').val();
        if (ss_price > 0) {
            ss_price_count += parseFloat(ss_price);
        }
    });
    $('#append_tfoot tr').find('#ss_amount_final').html(ss_price_count);
}
function count_qty_final() {
    var booking_qty = 0;
    $('#append_tr tr').each(function (i, row) {
        var rows = $(row);
        rows.find('#th_book_qty tr').each(function (i, row2) {
            var rows2 = $(row2);
            var qty = rows2.find('#booking_qty').val();
            if (qty > 0) {
                booking_qty += parseInt(qty);
            }
        });
    });
    $('#append_tfoot tr').find('#final_qty').html(booking_qty);
}
function count_amount() {
    var total_ss = 0;
    var total_freight = 0;
    var ss_postage_cost = 0;
    var sm_postage_cost = 0;
    var grand_ss_postage_cost = 0;
    var grand_sm_postage_cost = 0;
    var is_sm_postage = $('#append_tfoot tr').find("input[type=radio][id*=is_sm_cost]:checked").val();
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        var ss_price = '';
        ss_price = $(this).find('#ss_price').text();
        ss_price = parseFloat(ss_price);
        var sm_price = '';
        sm_price = $(this).find('#sm_price').text();
        sm_price = parseFloat(sm_price);

        ss_postage_cost = $(this).find('#ss_postage_cost').val();
        ss_postage_cost = parseFloat(ss_postage_cost);

        sm_postage_cost = $(this).find('#sm_postage_cost').val();
        sm_postage_cost = parseFloat(sm_postage_cost);

        var price_type = $('#append_tfoot tr').find("input[type=radio][name=price_type_all]:checked").val();

        ig_code = $(this).find('#prd_ig_code').text();
        if ($(this).find("input[type=radio][id=customer_preferred1]:checked").val()) {
            $(this).find("input[type=hidden][id=product_freight_type-"+ig_code+"]").val("AIR")
        }else{
            $(this).find("input[type=hidden][id=product_freight_type-"+ig_code+"]").val("SEA")
        }
        // console.log(grand_ss_postage_cost);
        var booking_qty = 0;
        var freight_cost = 0;
        var uk_only_qty = 0;
        var single_freight = 0;
        var sub_total_ss_postage_cost = 0;
        var sub_total_sm_postage_cost = 0;
        ///// LOOP THROUGH CHILD ROW OF PARENT /////
        rows.find('#th_book_qty tr').each(function (i, row2) {
            var rows2 = $(row2);
            var qty = rows2.find('#booking_qty').val();
            var type = '';
            type = rows2.find('#booking_qty').attr('data-type');
            if (type == 'house-1-ship-0-box-0-ship_no-0') {
                uk_only_qty += parseInt(qty);
            }if (qty > 0) {
                booking_qty += parseInt(qty);
            }
        });
        var single_ss = 0;
        var single_sm = 0;

        sub_total_ss_postage_cost = ss_postage_cost*booking_qty;
        grand_ss_postage_cost += sub_total_ss_postage_cost;

        sub_total_sm_postage_cost = sm_postage_cost*booking_qty;
        grand_sm_postage_cost += sub_total_sm_postage_cost;

        if(is_sm_postage == 1){
            $(this).find('#sm_postage_cost_section').fadeIn();
            $(this).find('#sm_postage_cost_').text(sub_total_sm_postage_cost.toFixed(2));
        }else if (is_sm_postage == 0) {
            $(this).find('#sm_postage_cost_section').fadeOut();
        }

        if(is_sm_postage == 0){
            $(this).find('#ss_postage_cost_section').fadeIn();
            $(this).find('#ss_postage_cost_').text(sub_total_ss_postage_cost.toFixed(2));
        }else if(is_sm_postage == 1){
            $(this).find('#ss_postage_cost_section').fadeOut();
        }
        if (price_type == 1) {
            single_ss = ss_price*booking_qty;
            single_sm = ss_price*booking_qty;
        }else{
            single_ss = sm_price*booking_qty;
            single_sm = sm_price*booking_qty;
        }
        total_ss += single_ss;
        if (uk_only_qty > 0) {
            freight_cost = $(this).find("input[type=radio][id*=customer_preferred]:checked").val();
            total_freight += uk_only_qty*freight_cost
            single_freight += uk_only_qty*freight_cost
        }
        if (single_freight != 0) {
            $(this).find('#freight_cost_section').fadeIn();
            $(this).find('#freight_cost').text(single_freight.toFixed(2));
        }else{
            $(this).find('#freight_cost_section').fadeOut();
        }
        $(this).find('#amount_ss').val(single_ss.toFixed(2));
    });
    $('#append_tfoot tr').find('#ss_amount_final').html(total_ss.toFixed(2));
    $('#append_tfoot tr').find('#amount_freight').val(total_freight.toFixed(2));
    var given_freight = $('#append_tfoot tr').find('#given_freight').text();
    given_freight = parseFloat(given_freight);
    if (total_freight == given_freight) {
        $('#append_tfoot tr').find('#given_freight_td').remove();
    }
    /////// SELECT SS / SM PRICE //////
    if (is_sm_postage == 1) {
        $('#append_tfoot tr').find('#postage_cost').val(grand_sm_postage_cost.toFixed(2));
        var given_postage = $('#append_tfoot tr').find('#given_postage').text();
        given_postage = parseFloat(given_postage);
        if (grand_sm_postage_cost == given_postage) {
            $('#append_tfoot tr').find('#given_postage_td').remove();
        }
    }else{
        $('#append_tfoot tr').find('#postage_cost').val(grand_ss_postage_cost.toFixed(2));
        var given_postage = $('#append_tfoot tr').find('#given_postage').text();
        given_postage = parseFloat(given_postage);
        if (grand_ss_postage_cost == given_postage) {
            $('#append_tfoot tr').find('#given_postage_td').remove();
        }
    }
}
function grand_total() {
    var total_ss = '';
    var grand_ss = 0;
    var freight_cost = 0;
    var postage_cost = 0;
    total_ss = $('#append_tfoot tr').find('#ss_amount_final').text();
    total_ss = parseFloat(total_ss);
    freight_cost = $('#append_tfoot tr').find('#amount_freight').val();
    freight_cost = parseFloat(freight_cost);
    postage_cost = $('#append_tfoot tr').find('#postage_cost').val();
    postage_cost = parseFloat(postage_cost);
    grand_ss = total_ss + freight_cost + postage_cost;
    $('#append_tfoot tr').find('#grand_total_ss').html(grand_ss.toFixed(2));
    $('#append_tfoot tr').find('#grand_total').val(grand_ss.toFixed(2));
    $('#append_tfoot tr').find('#grand_total_ss').html(grand_ss.toFixed(2));
}

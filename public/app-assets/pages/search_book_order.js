$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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

$('[id*=book_to_order]').click(function(event) {
    event.preventDefault();
    var customer_name = $('#book_customer').val();
    var type = $('input[name="booking_radio"]:checked').val();
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/getCustomerByName/'+customer_name+'/'+type,
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if (data == 0) {
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
                                        $('#addresstype option[value=2]').attr('selected','selected');
                                        $('#addresstype').css("pointer-events", 'none');
                                    }
                                    $('#checkbox1').prop('checked', true);
                                    $('#same_as_label').css('display','none');
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
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});
function add_address_bookorder() {
    var get_url             = $('#base_url').val();
    var order_date_         = $('input[name=order_date]').val();
    $('#order_date_').val(order_date_);
    var customer_mobile_int = $('#mobilenoadd').val();
  var customer_mobile_int = parseInt(customer_mobile_int);
    var customer_mobile_int = customer_mobile_int.toString().length;

    if (customer_mobile_int == 9 || customer_mobile_int == 10) {
        $.ajax({
            type:'POST',
            url:get_url+'/postCustomerAddress',
            data: $('#add_new_customer_form').serialize(),
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if (data['status'] == 1) {
                    $('#UpdateCustomerAddress').modal('hide');
                    $('#customer_address').val(data['final_address']);
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
$(document).on('click','#submit_button_book2',function(){
    $('#customer_section').fadeIn();
    $('#submit_button_book2').attr('id','submit_button_book');
});
$(document).on('click','#book_2_order2',function(){
    $('#customer_section').fadeIn();
    $('#book_2_order2').attr('id','book_to_order');
});
$('[id*=submit_button_book]').click(function(event) {
    event.preventDefault();
    var customer_name = $('#book_customer').val();
    var type = $('input[name="booking_radio"]:checked').val();
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/getCustomerByName/'+customer_name+'/'+type,
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if (data == 0) {
                if (type == 'reseller') {
                    alert('Please Add Reseller First !');
                }else{
                    alert('Please Add Customer First !');
                }
                return false;
            }
            var booking_under = $('#booking_under').find(":selected").val();
            if (booking_under > 0) {
                $('#post_form').submit();
            }else{
                alert('Please Select Agent !');
            }
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});
jQuery(document).ready(function($) {
    get_customer_postcode_update_ss();
    count_total_final();
    count_qty_final();
    count_amount();
    get_air_sea_cost();
    grand_total();
    $(document).on('keyup','#append_tr [id*=booking_qty]', function(){
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
    }else{
        $('input[type=radio][id=is_sm_cost1]').prop("checked", true);
        $('input[type=radio][id=is_sm_cost2]').prop("checked", false);
    }
    // count_amount();
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
    var sm_price_count = 0;
    $('#append_tr tr').each(function (i, row) {
        var rows = $(row);
        var ss_price = rows.find('#amount_ss').val();
        // var sm_price = rows.find('#amount_sm').val();
        if (ss_price > 0) {
            ss_price_count += parseFloat(ss_price);
        }
        // if (sm_price > 0) {
        //     sm_price_count += parseFloat(sm_price);
        // }
    });
    $('#append_tfoot tr').find('#ss_amount_final').html(ss_price_count);
    // $('#append_tfoot tr').find('#sm_amount_final').html(sm_price_count);
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
    // var total_sm = 0;
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
        // grand_ss_postage_cost += ss_postage_cost;

        sm_postage_cost = $(this).find('#sm_postage_cost').val();
        sm_postage_cost = parseFloat(sm_postage_cost);
        // grand_sm_postage_cost += sm_postage_cost;

        // var price_type = $(this).find("input[type=radio][id=price_type]:checked").val();
        var price_type = $('#append_tfoot tr').find("input[type=radio][name=price_type_all]:checked").val();
        console.log(price_type);

        ig_code = $(this).find('#prd_ig_code').text();
        if ($(this).find("input[type=radio][id=customer_preferred1]:checked").val()) {
            $(this).find("input[type=hidden][id=product_freight_type-"+ig_code+"]").val("AIR")
            // $(this).find('#product_freight_type').val("AIR")
            // alert(0)
        }else{
            $(this).find("input[type=hidden][id=product_freight_type-"+ig_code+"]").val("SEA")
            // $(this).find('#product_freight_type').val("SEA")
            // alert(1)
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
                // freight_cost = $(this).find('#customer_preferred').val();
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
        // total_sm += single_sm;
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
        // $(this).find('#price').val(single_ss.toFixed(2));
        // $(this).find('#amount_sm').val(single_sm.toFixed(2));
    });
    $('#append_tfoot tr').find('#ss_amount_final').html(total_ss.toFixed(2));
    // $('#append_tfoot tr').find('#sm_amount_final').html(total_sm.toFixed(2));
    $('#append_tfoot tr').find('#amount_freight').val(total_freight.toFixed(2));
    // $('#append_tfoot tr').find('#amount_freight2').val(total_freight.toFixed(2));
    var given_freight = $('#append_tfoot tr').find('#given_freight').text();
    given_freight = parseFloat(given_freight);
    if (total_freight == given_freight) {
        $('#append_tfoot tr').find('#given_freight_td').remove();
    }
    /////// SELECT SS / SM PRICE //////
    if (is_sm_postage == 1) {
        $('#append_tfoot tr').find('#postage_cost').val(grand_sm_postage_cost.toFixed(2));
        // $('#append_tfoot tr').find('#postage_cost2').val(grand_sm_postage_cost.toFixed(2));
        var given_postage = $('#append_tfoot tr').find('#given_postage').text();
        given_postage = parseFloat(given_postage);
        if (grand_sm_postage_cost == given_postage) {
            $('#append_tfoot tr').find('#given_postage_td').remove();
        }
    }else{
        $('#append_tfoot tr').find('#postage_cost').val(grand_ss_postage_cost.toFixed(2));
        // $('#append_tfoot tr').find('#postage_cost2').val(grand_ss_postage_cost.toFixed(2));
        var given_postage = $('#append_tfoot tr').find('#given_postage').text();
        given_postage = parseFloat(given_postage);
        if (grand_ss_postage_cost == given_postage) {
            $('#append_tfoot tr').find('#given_postage_td').remove();
        }
    }
}
function grand_total() {
    var total_ss = '';
    // var total_sm = '';
    var grand_ss = 0;
    var grand_sm = 0;
    var freight_cost = 0;
    var freight_cost2 = 0;
    var postage_cost = 0;
    // var postage_cost2 = 0;
    total_ss = $('#append_tfoot tr').find('#ss_amount_final').text();
    total_ss = parseFloat(total_ss);
    // total_sm = $('#append_tfoot tr').find('#sm_amount_final').text();
    // total_sm = parseFloat(total_sm);
    freight_cost = $('#append_tfoot tr').find('#amount_freight').val();
    freight_cost = parseFloat(freight_cost);
    // freight_cost2 = $('#append_tfoot tr').find('#amount_freight2').val();
    // freight_cost2 = parseFloat(freight_cost2);
    postage_cost = $('#append_tfoot tr').find('#postage_cost').val();
    postage_cost = parseFloat(postage_cost);
    // postage_cost2 = $('#append_tfoot tr').find('#postage_cost2').val();
    // postage_cost2 = parseFloat(postage_cost2);
    grand_ss = total_ss + freight_cost + postage_cost;
    // grand_sm = total_sm + freight_cost2 + postage_cost2;
    // console.log(total_ss.toFixed(2));
    // console.log(freight_cost);
    $('#append_tfoot tr').find('#grand_total_ss').html(grand_ss.toFixed(2));
    $('#append_tfoot tr').find('#grand_total').val(grand_ss.toFixed(2));
    $('#append_tfoot tr').find('#grand_total_ss').html(grand_ss.toFixed(2));
}

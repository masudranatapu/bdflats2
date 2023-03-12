$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('change','#order_date_',function(){
    $("#new_order_date_").val($(this).val());
})
jQuery(document).ready(function($) {
    $('[id*=single_postage_value],[id*=per_product_freight_value],[id*=per_product_value],[id*=line_subtotal_value],[id*=discount_amount]').on('wheel', function(e){
        return false;
    });
    // count_total_final();
    count_qty_final();
    put_values();
    count_amount();
    grand_total();
    put_checkbox_values();
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        rows.find('#line_subtotal_costs_th #line_subtotal_costs').each(function (i, row9) {
            var rows9 = $(row9);
            var line_cost = rows9.find('#line_subtotal_value_hidden').val();
            line_cost = parseFloat(line_cost);
            line_cost = line_cost.toFixed(2);
            rows9.find('#line_subtotal_value').val(line_cost);
        });
    });
    $(document).on('keyup','[id*=single_postage_value],[id*=per_product_freight_value],[id*=per_product_value]', function(){
        count_amount();
        grand_total();
        update_checkbox_and_balance();
    });
    $('[id*=line_subtotal_value]').change(function() {
        count_line_total();
        update_checkbox_and_balance();
    });
    $(document).on('keyup','[id*=line_subtotal_value]', function(){
        count_line_total();
        update_checkbox_and_balance();
    });
    /*CHANGE DISCOUNT AMOUNT*/
    $("#discount_amount, #penalty_amount").keyup(function(){
        grand_total();
    });
    // $("#penalty_amount").keyup(function(){
    //     var penalty_amount  = $('#penalty_amount').val();
    //     if (penalty_amount > 0) {
    //         $('#append_tfoot tr').find('#penalty_fee').text(parseFloat(penalty_amount).toFixed(2));
    //         $('#penalty_fee_tr').fadeIn();
    //         grand_total();
    //     }else{
    //         $('#penalty_fee_tr').fadeOut();
    //     }
    // });

    $("#discount_amount").change(function(){
        grand_total();
    });
    var option_type = $('#is_regular').val();
    if (option_type == 1) {
        $('#change_option option[value=1]').attr('selected','selected').change();
    }else{
        $('#change_option option[value=0]').attr('selected','selected').change();
    }

    $(document).on('change','#change_option',function(){
        $('[id*=is_regular]').val($(this).val());
        $('#append_tr > tr').each(function (i, row) {
            var rows = $(row);
            ///// LOOP THROUGH EACH PRODUCT COSTS /////
            rows.find('#per_product_costs_th #per_product_costs').each(function (i, row3) {
                var rows3 = $(row3);
                var price_type = rows3.find("#is_regular").val();
                if (price_type == 1) {
                    var is_regular_price = rows3.find('#regular_price').val();
                    is_regular_price = parseFloat(is_regular_price);
                    is_regular_price = is_regular_price.toFixed(3);
                    rows3.find('#per_product_value').val(is_regular_price);
                }else{
                    var is_regular_price = rows3.find('#installment_price').val();
                    is_regular_price = parseFloat(is_regular_price);
                    is_regular_price = is_regular_price.toFixed(3);
                    rows3.find('#per_product_value').val(is_regular_price);
                }
            });
        })
        count_amount();
        grand_total();
        update_checkbox_and_balance();
    })
    ////////// CHECKBOX CHANGED /////////
    $('[id*=checkbox_of_order]').on('ifChanged', function() {
        var order_outstanding = $('#order_outstanding_hidden').val();
            order_outstanding = parseFloat(order_outstanding);
        var order_balance_used = $('#balance_used').val();
            order_balance_used = parseFloat(order_balance_used);
        var pk_no = $(this).data('pk_no');
        var order_price = $('[id*=per_item_checkbox_price'+pk_no+']').val();
        order_price = parseFloat(order_price);
        if($(this).is(":checked")) {
            order_outstanding = order_outstanding - order_price;
            order_outstanding = parseFloat(order_outstanding);
            $('#order_outstanding').text(order_outstanding);
            $('#order_outstanding_hidden').val(order_outstanding);

            order_balance_used = order_balance_used + order_price;
            order_balance_used = parseFloat(order_balance_used);
            $('#order_balance_used').text(order_balance_used);
            $('#balance_used').val(order_balance_used);
            $('[id*=checked_item_price'+pk_no+']').val(order_price);

            $('[id=delete_single_prd'+pk_no+']').css('display','none');
        }else{
            if ($('[id=if_change_value'+pk_no+']').val() == 1) {
                order_outstanding = order_outstanding + order_price;
                order_outstanding = parseFloat(order_outstanding);
                $('#order_outstanding').text(order_outstanding);
                $('#order_outstanding_hidden').val(order_outstanding);

                order_balance_used = order_balance_used - order_price;
                order_balance_used = parseFloat(order_balance_used);
                $('#order_balance_used').text(order_balance_used);
                $('#balance_used').val(order_balance_used);
                $('[id=delete_single_prd'+pk_no+']').css('display','block');
            }
            $('[id=if_change_value'+pk_no+']').val(1);
        }
        // console.log(order_balance_used);
        var get_url = $('#base_url').val();
        var pageurl = get_url+'/update_order_payment';
        payment_checkbox_action();
    });
    var customer_id = $('#customer_id').val();
    checkIfAddress(customer_id);
});
function checkIfAddress(customer_id) {
    var get_url = $('#base_url').val();
    var is_reseller     = $('#is_reseller').val();
    var page_is_view    = $('#page_is_view').val();
    var booking_id      = $('#booking_id').val();
    if (page_is_view == 1 && is_reseller == 0) {
        var customer_id = $('#customer_id').val();
        $.ajax({
            type:'get',
            url:get_url+'/checkifCustomerAddressexists/'+customer_id+'/'+is_reseller+'/'+booking_id,
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
                    $('#customeraddress').val($('#book_customer').text());
                    $('#customeraddress2').val($('#book_customer').text());
                    $('#mobilenoadd').val(($('#mobile_no_').text()).trim());
                    $('#mobilenoadd2').val(($('#mobile_no_').text()).trim());
                    if (data['billing'] === null && data['delivery'] === null) {
                        $('#checkbox1').prop('checked', false);
                        $('#same_as_label').css('display','block');
                        $('#booking_create').val(1);
                    }else if(data['billing'] === null || data['delivery'] === null){
                        if (data['delivery'] === null) {
                            $('#addresstype option[value=1]').attr('selected','selected');
                        }else if(data['billing'] === null) {
                            $('#addresstype option[value=2]').attr('selected','selected');
                        }
                        $('#addresstype').css("pointer-events", 'none');
                        $('#checkbox1').prop('checked', true);
                        $('#same_as_label').css('display','none');
                        $('#booking_create').val(0);
                    }
                    $('#UpdateCustomerAddress').modal('show');
                    $('#add_new_btn').css('display','none');
                    $('#customer_id_modal_').val(customer_id);
                    return false;
                }
                // else{
                //     var url = $('#post_form').attr('action');
                //     $('#post_form').attr('action', url+"/order").submit();
                // }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }
}


function add_address_bookorder() {
    var get_url = $('#base_url').val();
    var order_date_ = $('input[name=order_date]').val();
    $('input[name=order_date_]').val(order_date_);
    var customer_mobile_int = $('#mobilenoadd').val();
    var customer_mobile_int = parseInt(customer_mobile_int);
    var customer_mobile_int = customer_mobile_int.toString().length;

    var customeraddress = $('#customeraddress').val();
    var post_code = $('#post_code_').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var ad_1 = $('#ad_1_').val();

    if(customeraddress == ''){alert('Please enter a name');return false;}
    if(post_code == ''){alert('Please enter post code');return false;}
    if(city == ''){alert('Please select city');return false;}
    if(state == ''){alert('Please select state');return false;}
    if(ad_1 == ''){alert('Please enter addres 1');return false;}


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
                    $('[id*=customer_address]').val(data['final_address']);
                    $('#booktoorderform').submit();
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

$(document).on('input','#cancellation_amount', function() {

    var cancel_fee = Number($(this).val());
    var credit = Number($(this).attr('max'));
    var new_credit = credit - cancel_fee;
    $('.refund_ampunt').text(new_credit.toFixed(2));
    $('.can_fee').text(cancel_fee.toFixed(2));


})

function count_line_total() {
    var sub_total_only_line = 0;
    var subtotal_with_exta_costs = 0;
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        ///// LOOP THROUGH EACH LINE SUB-TOTAL /////
        rows.find('#line_subtotal_costs_th #line_subtotal_costs').each(function (i, row2) {
        var rows2 = $(row2);
        var product_inv_pk = rows2.find('#product_inv_pk').val();

        var line_total_cost = rows2.find('[id=line_subtotal_value]').val();
        sub_total_only_line += line_total_cost;
        line_total_cost = parseFloat(line_total_cost);
        line_total_cost = line_total_cost.toFixed(2);
        $('#per_item_checkbox_price'+product_inv_pk).val(line_total_cost);
        });
    });
    $('#append_tfoot tr').find('#total_with_extra_costs').html(sub_total_only_line.toFixed(2));
    grand_total();
}
function payment_checkbox_action() {
    var order_outstanding = $('#order_outstanding_hidden').val();
    order_outstanding = parseFloat(order_outstanding);
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        rows.find('#checkbox_th #checkbox_div').each(function (i, row2) {
            var rows2 = $(row2);
            var item_price = rows2.find('[id*=per_item_checkbox_price]').val();
            item_price = parseFloat(item_price);
            var order_status = rows2.find('[id*=order_status]').val();

            if (order_status < 80) {
                if(rows2.find('input[id="checkbox_of_order"]').is(":checked")) {
                    rows2.find('#checkbox_of_order').prop("disabled", false);
                }else{
                    if (item_price > order_outstanding) {
                        rows2.find('#checkbox_of_order').prop("disabled", true);
                    }else{
                        rows2.find('#checkbox_of_order').prop("disabled", false);
                    }
                }
            }
        });
    });
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
    $('#append_tfoot tr').find('#grand_final_qty').html(booking_qty);
    $('#append_tfoot tr').find('#final_qty_').val(booking_qty);
}
function update_checkbox_and_balance() {
    var order_outstanding = $('#order_outstanding_hidden').val();
        order_outstanding = parseFloat(order_outstanding);
    var order_balance_used = $('#balance_used').val();
        order_balance_used = parseFloat(order_balance_used);
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        rows.find('#checkbox_th #checkbox_div').each(function (j, row5) {
            var rows5 = $(row5);
            var product_inv_pk = rows5.find('#product_pk').val();
            var prev_value = rows5.find('[id=checked_item_price'+product_inv_pk+']').val();
            prev_value = parseFloat(prev_value);
            var new_value = rows5.find('[id=per_item_checkbox_price'+product_inv_pk+']').val();
            new_value = parseFloat(new_value);
            if (rows5.find('[id=checkbox_of_order]').is(":checked")) {

                if (new_value != prev_value) {

                    order_balance_used = order_balance_used - prev_value;
                    order_outstanding = order_outstanding + prev_value;
                    rows5.find('[id=if_change_value]').val(0);
                    rows5.find('#checkbox_of_order').iCheck('uncheck');
                    $('#order_outstanding').text(order_outstanding);
                    $('#order_balance_used').text(order_balance_used);
                    $('#balance_used').val(order_balance_used);
                    $('#order_outstanding_hidden').val(order_outstanding);
                }
            }
        });
    });
    // var booking_id = $('#booking_id').val();

}
/////// ONLOAD PUT INPUT FIELD VALUES ///////
function put_values() {
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        ///// LOOP THROUGH EACH POSTAGE COSTS /////
        rows.find('#postage_costs_th #postage_costs').each(function (i, row2) {
            var rows2           = $(row2);
            var post_code       = rows2.find('#customer_postage').val();
            var is_self_pickup  = rows2.find('#is_self_pickup').val();
            if (is_self_pickup == 1 ) {

                var single_ss_cost = rows2.find('#single_ss_cost').val();
                rows2.find('#single_postage').html('');
                rows2.find('#single_postage_value').val(0.00);
            }else if (post_code >= 87000 ) {
                var single_ss_cost = rows2.find('#single_ss_cost').val();
                rows2.find('#single_postage').html('SS : ');
                rows2.find('#single_postage_value').val(single_ss_cost);
            }else{
                var single_sm_cost = rows2.find('#single_sm_cost').val();
                rows2.find('#single_postage').html('SM :');
                rows2.find('#single_postage_value').val(single_sm_cost);
            }
        });
        ///// LOOP THROUGH EACH FREIGHT COSTS /////
        rows.find('#freight_costs_th #freight_costs').each(function (i, row3) {
            var rows3 = $(row3);
            var single_freight = rows3.find('#is_freight').val();
            // single_freight = parseFloat(single_freight);
            // single_freight = single_freight.toFixed(2);
            if (single_freight == 1) {
                single_air_freight = rows3.find('#single_air_cost').val();
                single_air_freight = parseFloat(single_air_freight);
                single_air_freight = single_air_freight.toFixed(3);
                rows3.find('#per_product_freight_value').val(single_air_freight);
            }else if(single_freight == 2){
                single_sea_freight = rows3.find('#single_sea_cost').val();
                single_sea_freight = parseFloat(single_sea_freight);
                single_sea_freight = single_sea_freight.toFixed(3);
                rows3.find('#per_product_freight_value').val(single_sea_freight);
            }else{
                rows3.find('#per_product_freight_value').val(0);
            }
        });
        ///// LOOP THROUGH EACH PRODUCT COSTS /////
        rows.find('#per_product_costs_th #per_product_costs').each(function (i, row3) {
            var rows3 = $(row3);
            var price_type = rows3.find("#is_regular").val();
            if (price_type == 1) {
                var is_regular_price = rows3.find('#regular_price').val();
                is_regular_price = parseFloat(is_regular_price);
                is_regular_price = is_regular_price.toFixed(3);
                rows3.find('#per_product_value').val(is_regular_price);
            }else{
                var is_regular_price = rows3.find('#installment_price').val();
                is_regular_price = parseFloat(is_regular_price);
                is_regular_price = is_regular_price.toFixed(3);
                rows3.find('#per_product_value').val(is_regular_price);
            }
        });
    });
}
function put_checkbox_values() {
    var order_outstanding = $('#order_outstanding_hidden').val();
    order_outstanding = parseFloat(order_outstanding);
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        rows.find('#checkbox_th #checkbox_div').each(function (j, row5) {
            var rows5 = $(row5);
            var pk_no = rows5.find('[id=product_pk]').val();
            var per_product_cost = rows5.find('[id*=per_item_checkbox_price]').val();
            per_product_cost = parseFloat(per_product_cost);
            rows5.find('[id*=checked_item_price]').val(per_product_cost);
            var order_status = rows5.find('[id*=order_status]').val();
            if (order_status >= 80) {
                rows5.find('#checkbox_of_order').prop("disabled", true);
                rows5.find('#checkbox_of_order').iCheck('check');
            }else if (order_status >= 60) {
                rows5.find('#checkbox_of_order').iCheck('check');
                $('#delete_single_prd'+pk_no).remove();
            }else{
                if (per_product_cost > order_outstanding) {
                    rows5.find('#checkbox_of_order').prop("disabled", true);
                }else{
                    rows5.find('#checkbox_of_order').prop("disabled", false);
                }
            }
        });
    });
}
function count_amount() {
    var total_freight = 0;
    var total_postage = 0;
    var total_subtotal = 0;
    var subtotal_with_exta_costs = 0;
    ///// LOOP THROUGH EACH ROW /////
    $('#append_tr > tr').each(function (i, row) {
        var rows = $(row);
        ig_code = $(this).find('#prd_ig_code').text();
        if ($(this).find("input[type=radio][id=customer_preferred1]:checked").val()) {
            $(this).find("input[type=hidden][id=product_freight_type-"+ig_code+"]").val("AIR")
        }else{
            $(this).find("input[type=hidden][id=product_freight_type-"+ig_code+"]").val("SEA")
        }
        var per_product_cost = 0;
        var per_item_freight_cost = 0;
        var product_inv_pk = 0;
        ///// LOOP THROUGH EACH LINE SUB-TOTAL /////
        rows.find('#line_subtotal_costs_th #line_subtotal_costs').each(function (i, row3) {
            var rows3 = $(row3);
            var line_total = 0;
            product_inv_pk = rows3.find('#product_inv_pk').val();
            single_postage_value    = rows.find('#postage_costs_th #postage_delete'+product_inv_pk+' #single_postage_value').val();
            single_postage_value = parseFloat(single_postage_value);
            // single_postage_value = single_postage_value.toFixed(2);
            per_item_freight_cost   = rows.find('#freight_costs_th #freight_delete'+product_inv_pk+' #per_product_freight_value').val();
            per_item_freight_cost = parseFloat(per_item_freight_cost);
            // per_item_freight_cost = per_item_freight_cost.toFixed(2);
            per_product_cost        = rows.find('#per_product_costs_th #per_product_costs_delete'+product_inv_pk+' #per_product_value').val();
            per_product_cost = parseFloat(per_product_cost);
            // per_product_cost = per_product_cost.toFixed(2);
            total_postage += single_postage_value;
            total_freight += per_item_freight_cost;
            total_subtotal += per_product_cost;
            line_total = single_postage_value + per_item_freight_cost + per_product_cost;
            subtotal_with_exta_costs += line_total;
            $('#per_item_checkbox_price'+product_inv_pk).val(line_total);
            rows3.find('#line_subtotal_value_hidden').val(line_total);
            line_total = parseFloat(line_total);
            line_total = line_total.toFixed(2);
            rows3.find('#line_subtotal_value').val(line_total);
        });
    });
    total_postage = Math.ceil(total_postage);
    $('#append_tfoot tr').find('#ss_amount_final').html(total_subtotal.toFixed(2));
    $('#append_tfoot tr').find('#freight_cost_total').html(total_freight.toFixed(2));
    $('#append_tfoot tr').find('#postage_cost_final').html(total_postage.toFixed(2));
    $('#append_tfoot tr').find('#total_with_extra_costs').html(subtotal_with_exta_costs.toFixed(2));
}
function grand_total() {
    var total_cost          = '';
    var discount_amount     = 0;
    var grand_total         = 0;
    var penalty_amount      = 0;
    var penalty_amount_th   = 0;
    total_cost              = $('#append_tfoot tr').find('#total_with_extra_costs').text();
    total_cost              = parseFloat(total_cost);
    buffer_amount           = $('#buffer_amount').val();
    buffer_amount           = parseFloat(buffer_amount);
    balance_return          = $('#balance_return').val();
    balance_return          = parseFloat(balance_return);
    penalty_amount          = $('#penalty_amount').val();
    penalty_amount          = penalty_amount == '' ? 0 : penalty_amount;
    penalty_amount          = parseFloat(penalty_amount);
    penalty_amount_th       = $('#penalty_fee').text();

    if (penalty_amount > 0) {
        $('#append_tfoot tr').find('#penalty_fee').text(penalty_amount.toFixed(2));
        $('#penalty_fee_tr').fadeIn();
    }else{
        $('#penalty_fee_tr').fadeOut();
    }
    $('#append_tfoot tr').find('#discount_amount').attr({
        "max" : total_cost,
        "min" : 0
     });
    discount_amount     = $('#append_tfoot tr').find('#discount_amount').val();
    discount_amount     = parseFloat(discount_amount);
    if (discount_amount > total_cost) {
        $('#append_tfoot tr').find('#discount_amount').val(total_cost);
        discount_amount = total_cost;
    }
    if (discount_amount < 0 || !discount_amount) {
        $('#append_tfoot tr').find('#discount_amount').val(0);
        discount_amount = 0;
    }
    grand_total     = (total_cost - discount_amount) + penalty_amount;
    buffer_amount   = grand_total - buffer_amount - balance_return;
    after_return    = grand_total - penalty_amount;
    if (buffer_amount < 0) {
        buffer_amount = 0;
    }
    $('#append_tfoot tr').find('#grand_total_ss').html(grand_total.toFixed(2));
    $('#append_tfoot tr').find('#grand_total').val(total_cost.toFixed(2));
    $('#order_value').text(grand_total.toFixed(2));
    $('#due_amount').text(buffer_amount.toFixed(2));
    $('#after_return').text(after_return.toFixed(2));

}
//////////////// ORDER PAGE //////////////////
/*delete single product row method for order*/
$(document).on('click','[id*=delete_single_prd]', function(){
    var grand_total     = $('#grand_total').val();
    var buffer_amount   = $('#buffer_amount').val();
    var type            = $(this).attr('data-type');
    var booking_no      = $(this).attr('data-booking-no');
    if (grand_total <= buffer_amount) {
        alert('Please Unassign payment First !');
    }else if(confirm('Are you sure you want to delete?')){
        var prd_id = $(this).data('delete_id');
        var row = $(this).closest("tr");
        var warehouse_delete            = row.find('#warehouse_delete'+prd_id);
        var book_qty_delete             = row.find('#book_qty_delete'+prd_id);
        var postage_delete              = row.find('#postage_delete'+prd_id);
        var freight_delete              = row.find('#freight_delete'+prd_id);
        var per_product_costs_delete    = row.find('#per_product_costs_delete'+prd_id);
        var line_subtotal_delete        = row.find('#line_subtotal_delete'+prd_id);
        var checkbox_delete             = row.find('#checkbox_delete'+prd_id);
        var selfpickup_delete           = row.find('#selfpickup_delete'+prd_id);
        var delete_btn                  = row.find('#action_column'+prd_id);
        var get_url = $('#base_url').val();
        var pageurl = get_url+'/delete_book_to_order_item/'+prd_id+'/'+type+'/'+booking_no;
        $.ajax({
            type:'get',
            url:pageurl,
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                if (data == 1) {
                    location.reload();
                   /* $(book_qty_delete).fadeOut();
                    $(warehouse_delete).fadeOut();
                    $(postage_delete).fadeOut();
                    $(freight_delete).fadeOut();
                    $(per_product_costs_delete).fadeOut();
                    $(line_subtotal_delete).fadeOut();
                    $(checkbox_delete).fadeOut();
                    $(selfpickup_delete).fadeOut();
                    $(delete_btn).fadeOut();
                    // $(update_btn).fadeOut();
                    $(book_qty_delete).remove();
                    $(warehouse_delete).remove();
                    $(postage_delete).remove();
                    $(freight_delete).remove();
                    $(per_product_costs_delete).remove();
                    $(line_subtotal_delete).remove();
                    $(checkbox_delete).remove();
                    $(selfpickup_delete).remove();
                    $(delete_btn).remove();
                    // $(update_btn).remove();
                    // count_total_final();
                    count_qty_final();
                    count_amount(); */
                }else{
                    alert(data)
                }
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }
});
/*Get Customer Address For Rach ROw*/
$(document).on('click','[id*=update_btn]', function(){
    var customer_id         = $('#customer_id').val();
    var pk_no               = $(this).data('pk_no');
    var address_id          = $(this).data('customer_address_id');
    var order_status        = $(this).data('order_status');
    var type                = $(this).data('type');
    var is_reseller         = $('#is_reseller').val();
    var get_url             = $('#base_url').val();
    $('#add_new_btn').css('display','block');

    $.ajax({
        type:'get',
        url:get_url+'/booking/getCustomerAddress/'+customer_id+'/'+pk_no+'/'+address_id+'/'+is_reseller,
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#cus_add_modal').html('').append(data.html);

            if (type == 'sender') {
                $('#view_address_table tbody [id*=address_no_]').attr('data-type','sender');
            }else{
                $('#view_address_table tbody [id*=address_no_]').attr('data-type','receiver');
            }
            if (order_status >=80) {
                $('#view_address_table tbody [id*=address_no_]').prop('disabled',true);
            }
            // if (is_reseller == 1) {
            //     $('#add_new_btn').remove();
            // }
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});

$(document).on('click','[id=addCustomerAddressAll]', function(){
    var customer_id         = $('#customer_id').val();
    var pk_no               = $(this).data('pk_no');
    var address_id          = $(this).data('customer_address_id');
    var get_url             = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/booking/getCustomerAddress/'+customer_id+'/'+pk_no+'/'+address_id,
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#cus_add_modal').html('').append(data.html);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});
/*DONE EDITING*/
$(document).on('click','[id=address_done_sender]', function(){
    $(this).attr('disabled',true);
    $('#from_address_noneditable').fadeIn();
    $('#from_address_editable').css('display','none');
    var type = 'sender';
    updateCustomerAddress(type);
    location.reload();
});

$(document).on('click','[id=address_done_receiver]', function(){
    $(this).attr('disabled',true);
    $('#delivery_address_noneditable').fadeIn();
    $('#delivery_address_editable').css('display','none');
    var type = 'receiver';
    updateCustomerAddress(type);
    // location.reload();
});

function updateCustomerAddress(type) {
    var get_url     = $('#base_url').val();
    var order_id    = $('#order_id').val();
    $.ajax({
        type:'post',
        url:get_url+'/postUpdatedAddress/'+order_id+'/'+type,
        data: $('#booktoorderform').serialize(),
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if (data['status'] == 1) {
                if (type == 'sender') {
                    var dial_code = $('#sender_dial_code').val();
                    var request = data['request'];
                    var name    = request.FROM_NAME !== null ? request.FROM_NAME+'<br>' : '';
                    var add_1   = request.FROM_ADDRESS_LINE_1 !== null ? request.FROM_ADDRESS_LINE_1+'<br>' : '';
                    var add_2   = request.FROM_ADDRESS_LINE_2 !== null ? request.FROM_ADDRESS_LINE_2+'<br>' : '';
                    var add_3   = request.FROM_ADDRESS_LINE_3 !== null ? request.FROM_ADDRESS_LINE_3+'<br>' : '';
                    var add_4   = request.FROM_ADDRESS_LINE_4 !== null ? request.FROM_ADDRESS_LINE_4+'<br>' : '';
                    var city    = request.FROM_CITY !== null ? request.FROM_CITY+' ' : '';
                    var post_code= request.FROM_POSTCODE !== null ? request.FROM_POSTCODE+'<br>' : '';
                    var state   = request.FROM_STATE !== null ? request.FROM_STATE+'' : '';
                    var country = request.FROM_COUNTRY !== null ? ', '+request.FROM_COUNTRY+'<br>' : '';
                    if (request.FROM_MOBILE !== null) {
                        var mobile1 = request.FROM_MOBILE.substr(0,2);
                        var mobile2 = request.FROM_MOBILE.substr(2,3);
                        var mobile3 = request.FROM_MOBILE.substr(5,4);
                        var mobile  = dial_code+' '+mobile1+' '+mobile2+' '+mobile3;
                    }else{
                        var mobile = '';
                    }
                    $('#sender_td_inline').html('');
                    $('#sender_td_inline').html(name+add_1+add_2+add_3+add_4+city+post_code+state+country+mobile);
                }else{
                    var dial_code = $('#receiver_dial_code').val();
                    var request = data['request'];
                    var name    = request.DELIVERY_NAME !== null ? request.DELIVERY_NAME+'<br>' : '';
                    var add_1   = request.DELIVERY_ADDRESS_LINE_1 !== null ? request.DELIVERY_ADDRESS_LINE_1+'<br>' : '';
                    var add_2   = request.DELIVERY_ADDRESS_LINE_2 !== null ? request.DELIVERY_ADDRESS_LINE_2+'<br>' : '';
                    var add_3   = request.DELIVERY_ADDRESS_LINE_3 !== null ? request.DELIVERY_ADDRESS_LINE_3+'<br>' : '';
                    var add_4   = request.DELIVERY_ADDRESS_LINE_4 !== null ? request.DELIVERY_ADDRESS_LINE_4+'<br>' : '';
                    var city    = request.DELIVERY_CITY !== null ? request.DELIVERY_CITY+' ' : '';
                    var post_code= request.DELIVERY_POSTCODE !== null ? request.DELIVERY_POSTCODE+'<br>' : '';
                    var state   = request.DELIVERY_STATE !== null ? request.DELIVERY_STATE+'' : '';
                    var country = request.DELIVERY_COUNTRY !== null ? ', '+request.DELIVERY_COUNTRY+'<br>' : '';
                    if (request.DELIVERY_MOBILE !== null) {
                        var mobile1 = request.DELIVERY_MOBILE.substr(0,2);
                        var mobile2 = request.DELIVERY_MOBILE.substr(2,3);
                        var mobile3 = request.DELIVERY_MOBILE.substr(5,4);
                        var mobile  = dial_code+' '+mobile1+' '+mobile2+' '+mobile3;
                    }else{
                        var mobile = '';
                    }
                    $('#receiver_td_inline').html('');
                    $('#receiver_td_inline').html(name+add_1+add_2+add_3+add_4+city+post_code+state+country+mobile);

                    $.ajax({
                        type:'POST',
                        url:get_url+'/postPaymentUncheck',
                        // data: {
                        //     inv_pk_array : inv_pk_array,

                        //     // booking_id : booking_id,
                        // },
                        data : $('#booktoorderform').serialize(),
                        beforeSend: function () {
                            $("body").css("cursor", "progress");
                        },
                        success: function (data) {
                            if (data == 1) {
                                console.log('ok');
                            }
                            else{
                                // console.log(data);
                                location.reload();
                            }
                        },
                        complete: function (data) {
                            $("body").css("cursor", "default");
                        }
                    });
                }
            }
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
}
/*MAKE ADDRESS EDITABLE*/
$(document).on('click','[id=address_change_sender]', function(){
    $('#from_address_noneditable').css('display','none');
    $('#from_address_editable').fadeIn();
});
$(document).on('click','[id=address_change_receiver]', function(){
    $('#delivery_address_noneditable').css('display','none');
    $('#delivery_address_editable').fadeIn();
});
/*Change Customer Address For Rach ROw*/
$(document).on('click','[id*=address_no_]', function(){
    var customer_post_code  = $(this).data('customer_post_code');
    var address_no          = $(this).data('address_no');
    var pk_no               = $(this).data('pk_no');
    var type                = $(this).data('type');
    var get_url             = $('#base_url').val();

    var customeraddress     = $(this).data('customeraddress');
    var mobilenoadd         = $(this).data('mobilenoadd');
    var ad_1                = $(this).data('ad_1');
    var ad_2                = $(this).data('ad_2');
    var ad_3                = $(this).data('ad_3');
    var ad_4                = $(this).data('ad_4');
    var state               = $(this).data('state');
    var city                = $(this).data('city');
    var post_code           = $(this).data('customer_post_code');
    var country             = $(this).data('country');
    var dial_code           = $(this).data('dial_code');
    var country_no          = $(this).data('country_no');

    if (type == 'sender') {
        $('input[name=from_name]').val(customeraddress);
        $('input[name=from_add_1]').val(ad_1);
        $('input[name=from_add_2]').val(ad_2);
        $('input[name=from_add_3]').val(ad_3);
        $('input[name=from_add_4]').val(ad_4);
        $('input[name=from_add_4]').val(ad_4);
        $('input[name=from_city]').val(city);
        $('input[name=from_state]').val(state);
        $('input[name=from_country]').val(country);
        $('input[name=from_post_code]').val(post_code);
        $('input[name=from_mobile]').val(mobilenoadd);
        $('input[id=sender_f_country]').val(country_no);
        $('#sender_dial_code').val(dial_code);
    }else{
        $('input[name=delivery_name]').val(customeraddress);
        $('input[name=delivery_add_1]').val(ad_1);
        $('input[name=delivery_add_2]').val(ad_2);
        $('input[name=delivery_add_3]').val(ad_3);
        $('input[name=delivery_add_4]').val(ad_4);
        $('input[name=delivery_add_4]').val(ad_4);
        $('input[name=delivery_city]').val(city);
        $('input[name=delivery_state]').val(state);
        $('input[name=delivery_country]').val(country);
        $('input[name=delivery_post_code]').val(post_code);
        $('input[name=delivery_mobile]').val(mobilenoadd);
        $('input[id=receiver_f_country]').val(country_no);
        $('#receiver_dial_code').val(dial_code);

        ///// LOOP THROUGH EACH ROW /////
        $('#append_tr > tr').each(function (i, row) {
            var rows = $(row);
            rows.find('#postage_costs_th #postage_costs').each(function (j, row5) {
                var rows5 = $(row5);
                var order_status = rows5.find('[id=order_status]').val();
                if (order_status <= 70) {
                    if (customer_post_code >= 87000) {
                        var is_sm = 0;
                        rows5.find('#single_postage').text('SS : ');
                        var single_ss_cost = rows5.find('#single_ss_cost').val();
                        rows5.find('#single_postage_value').val(single_ss_cost);
                    }else{
                        var is_sm = 1;
                        rows5.find('#single_postage').text('SM :');
                        var single_sm_cost = rows5.find('#single_sm_cost').val();
                        rows5.find('#single_postage_value').val(single_sm_cost);
                    }
                    rows5.find('#customer_address').val(address_no);
                    rows5.find('#customer_postage').val(customer_post_code);
                    rows5.find('#is_sm').val(is_sm);
                }
            });
        });
        count_amount();
        grand_total();
        update_checkbox_and_balance();
    }
    toastr.success('Address Updated !', 'Product Delivery Address Updated');
});
/*GET NEW ADDRESS FORM*/
$(document).on('click','[id=add_new_btn]', function(){
    $('#view_address_table').css('display','none');
    $('#checkbox1').prop('checked', false);
    $('#same_as_label').css('display','none');
    $('#add_new_address_table').fadeIn();
    var customer_pk         = $('#customer_id').val();
    $('#customer_id_modal').val(customer_pk);
    destroycreatetypeahead(2);
    $('#addresstype option[value=1]').attr('selected','selected');
    $('#addresstype').css("pointer-events", 'none');
    $('#customeraddress').val('');
    $('#country').val(2);
    $('#state').val('');
    $('#city').val('');
    $('#post_code_').val('');
    $('#mobilenoadd').val('');
    $('#ad_1_').val('');
    $('#ad_2_').val('');
    $('#ad_3_').val('');
    $('#ad_4_').val('');
    $('#location').val('');
    $('#address_pk_').val(0);
    $('#action_btn').text(' Add Address');
});
$(document).on('click','[id=address_book]', function(){
    $('#add_new_address_table').css('display','none');
    $('#view_address_table').fadeIn();
});
$(document).on('click','[id*=edit_address]', function(){
    var customer_pk     = $('#customer_id').val();
    var pk_no           = $(this).data('pk_no');
    var address_id      = $(this).data('address_no');
    var post_code       = $(this).data('post_code');
    var addresstype     = $(this).data('addresstype');
    var customeraddress = $(this).data('customeraddress');
    var mobilenoadd     = $(this).data('mobilenoadd');
    var ad_1            = $(this).data('ad_1');
    var ad_2            = $(this).data('ad_2');
    var ad_3            = $(this).data('ad_3');
    var ad_4            = $(this).data('ad_4');
    var location        = $(this).data('location');
    var country         = $(this).data('country');
    var state           = $(this).data('state');
    var city            = $(this).data('city');
    var is_reseller     = $('#is_reseller').val();

    // getEditData(customer_pk,pk_no);
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/getCustomerAddressEdit/'+customer_pk+'/'+address_id+'/'+is_reseller,
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#cus_add_modal').html('').append(data.html);
            $('#is_reseller_modal').val(is_reseller);

            if (is_reseller == 1) {
                $('#checkbox1').prop('checked',false);
                $('#same_as_label').fadeOut();
                // $('#address_book').fadeOut();
                // $('#add_new_btn').remove();
            }
            destroycreatetypeahead(country);
            $('#checkbox1').prop('checked',false);
            $('#same_as_label').fadeOut();
            if (addresstype == 1) {
                $('#addresstype option[value=1]').attr('selected','selected');
            }else{
                $('#addresstype option[value=2]').attr('selected','selected');
            }
            $('#addresstype').css("pointer-events", 'none');
            $('#location').val(location);
            $('#address_pk_').val(address_id);
            $('#action_btn').text(' Update Address')
            $('#view_address_table').css('display','none');
            $('#add_new_address_table').fadeIn();
            $('#post_code_').val(post_code);
            $('#post_code_hidden').val(post_code);
            $('#customer_id_modal').val(customer_pk);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
    // destroycreatetypeahead(country);
    // console.log('after');
    // $('#checkbox1').prop('checked',false);
    // $('#same_as_label').fadeOut();
    // $('#addresstype').val(addresstype);
    // $('#customeraddress').val(customeraddress);
    // $('#country').val(country);
    // $('#state').val(state);
    // $('#city').val(city);
    // $('#mobilenoadd').val(mobilenoadd);
    // $('#ad_1_').val(ad_1);
    // $('#ad_2_').val(ad_2);
    // $('#ad_3_').val(ad_3);
    // $('#ad_4_').val(ad_4);
    // $('#location').val(location);
    // $('#address_pk_').val(pk_no);
    // $('#action_btn').text(' Update Address')
    // $('#view_address_table').css('display','none');
    // $('#add_new_address_table').fadeIn();
    // $('#post_code_').val(post_code);
    // $('#post_code_hidden').val(post_code);
});
function add_address(order_status,inv_pk) {
    var get_url     = $('#base_url').val();
    var is_reseller = $('#is_reseller').val();
    $('#is_reseller_modal').val(is_reseller);
    var customer_mobile_int = $('#mobilenoadd').val();
    var customeraddress = $('#customeraddress').val();
    var post_code = $('#post_code_').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var ad_1 = $('#ad_1_').val();
    if(customeraddress == ''){alert('Please enter a name');return false;}
    if(post_code == ''){alert('Please enter post code');return false;}
    if(city == ''){alert('Please select city');return false;}
    if(state == ''){alert('Please select state');return false;}
    if(ad_1 == ''){alert('Please enter addres 1');return false;}

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
                    var is_reseller = data['is_reseller'];
                    if ($('#address_pk_').val() > 0) {
                        toastr.success('Address Updated Successfully', 'Address Updated !');
                        $('#append_tr > tr').each(function (i, row) {
                            var rows = $(row);
                            ///// LOOP THROUGH EACH POSTAGE COSTS /////
                            rows.find('#postage_costs_th #postage_costs').each(function (i, row2) {
                                var rows2 = $(row2);
                                var is_self_pickup  = rows2.find('#is_self_pickup').val();
                                var address_pk      = rows2.find('#customer_address').val();

                                if ( data['address_pk'] == address_pk ) {

                                    if ( is_self_pickup == 1 ) {
                                        rows2.find('#single_postage').html('');
                                        rows2.find('#single_postage_value').val(0.00);
                                        rows2.find('#is_sm').val(0);
                                    }else if ( data['post_code'] >= 87000 ) {
                                        var single_ss_cost = rows2.find('#single_ss_cost').val();
                                        rows2.find('#single_postage').html('SS : ');
                                        rows2.find('#single_postage_value').val(single_ss_cost);
                                        rows2.find('#is_sm').val(0);
                                    }else{
                                        var single_sm_cost = rows2.find('#single_sm_cost').val();
                                        rows2.find('#single_postage').html('SM :');
                                        rows2.find('#single_postage_value').val(single_sm_cost);
                                        rows2.find('#is_sm').val(1);
                                    }
                                    rows2.find('#customer_postage').val(data['post_code']);
                                }
                            });
                        });
                        count_amount();
                        grand_total();
                        update_checkbox_and_balance();
                    }else{
                        toastr.success('New Address Added Successfully', 'Address Added !');
                    }
                    var customer_id         = $('#customer_id').val();
                    var address_id          = $('#address_pk_').val();
                    $.ajax({
                        type:'get',
                        url:get_url+'/booking/getCustomerAddress/'+customer_id+'/'+inv_pk+'/'+address_id+'/'+is_reseller,
                        // data: {
                        //     customer_id : customer_id,
                        //     customer_address_id : customer_address_id,
                        // },
                        async :true,
                        dataType: 'json',
                        beforeSend: function () {
                            $("body").css("cursor", "progress");
                        },
                        success: function (data) {
                            $('#cus_add_modal').html('').append(data.html);
                            if (is_reseller == 1) {
                                $('#UpdateCustomerAddress').modal('hide');
                            }
                            if (order_status >= 80) {
                                $('#view_address_table tbody [id*=address_no_]').prop('disabled',true);
                            }
                        },
                        complete: function (data) {
                            $("body").css("cursor", "default");
                        }
                    });
                }else{
                    toastr.warning('Error !', 'Something went wrong, Please try again');
                }

            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        })
    }else{
        alert('Mobile Number Must be Between 10 to 11 digit');
    }
}

/*SELF PICKUP BUTTON ACTIONS*/
$('[id*=selfpickup_of_order]').on('ifChanged', function() {
    var pk_no               = $(this).data('pk_no');
    var postage_section     = $('#append_tr tr').find('#postage_delete'+pk_no);
    if($(this).is(":checked")) {
        postage_section.find('#is_self_pickup').val(1);
        postage_section.find('#single_postage').text('');
        postage_section.find('#single_postage_value').val(0.00);
    }else{
        postage_section.find('#is_self_pickup').val(0);
        var customer_post_code  = postage_section.find('#customer_postage').val();
        if (customer_post_code >= 87000) {
            postage_section.find('#single_postage').text('SS : ');
            var single_ss_cost = postage_section.find('#single_ss_cost').val();
            postage_section.find('#single_postage_value').val(single_ss_cost);
        }else{
            postage_section.find('#single_postage').text('SM :');
            var single_sm_cost = postage_section.find('#single_sm_cost').val();
            postage_section.find('#single_postage_value').val(single_sm_cost);
        }
    }
});
function destroycreatetypeahead(country) {
    $(".search-input4").typeahead("destroy");
    // $('#scrollable-dropdown-menu2').html('');
    // $('<input>').attr('type','search').attr('id','post_code_').attr('required',true).attr('name','post_code').addClass('form-control search-input4').attr('placeholder', 'Post Code').attr('autocomplete','off').appendTo('#scrollable-dropdown-menu2');
    call_typeahead(country);
}
function destroycreatetypeahead2(country) {
    $(".search-input8").typeahead("destroy");
    // $('#scrollable-dropdown-menu4').html('');
    // $('<input>').attr('type','search').attr('id','post_code_').attr('required',true).attr('name','post_code').addClass('form-control search-input4').attr('placeholder', 'Post Code').attr('autocomplete','off').appendTo('#scrollable-dropdown-menu2');
    call_typeahead2(country);
}
$(document).on('click','[id=payidbookorder]', function(){
    var get_url         = $('#base_url').val();
    var order_id        = $(this).data('order_id');
    var is_reseller     = $(this).data('is_reseller');
    $.ajax({
        type:'get',
        url:get_url+'/bookorder/getPayInfo/'+order_id+'/'+is_reseller,
        // data: {
        //     customer_id : customer_id,
        //     customer_address_id : customer_address_id,
        // },
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#cus_add_modal2').html('').html(data.html);
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});
$(document).on('click','[id*=warehouse_delete]', function(){
    var get_url         = $('#base_url').val();
    var inv_pk          = $(this).data('inv_pk');
    $.ajax({
        type:'get',
        url:get_url+'/getStockExchangeInfo/'+inv_pk,
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#ExchangeStockModal_content').html('').append(data.html);
            $('#ExchangeStockModal').modal('show');
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});
$(document).on('click','#exchange_with', function(){
    var get_url         = $('#base_url').val();
    var warehouse       = $(this).data('warehouse');
    var box_type        = $(this).data('box_type');
    var shipment_type   = $(this).data('shipment_type');
    var shipment_no     = $(this).data('shipment_no');
    var skuid           = $(this).data('skuid');
    var inv_pk          = $(this).data('inv_pk');

    $.ajax({
        type:'post',
        url:get_url+'/getStockExchangeInfo-exchange',
        data: {
            warehouse : warehouse,
            box_type : box_type,
            shipment_type : shipment_type,
            shipment_no : shipment_no,
            skuid : skuid,
            inv_pk : inv_pk,
        },
        async :true,
        dataType: 'json',
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            $('#ExchangeStockModal').modal('hide');
            if (data == 1) {
                alert('Stock Exchanged Successfully !');
                location.reload();
            }else{
                alert(data);
            }
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
});

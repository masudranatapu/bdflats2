$(document).on('click', '.address_change', function(event) {

    var customer_id = $(this).attr("data-customer_id");
    var type = $(this).attr("data-type");
    var url = $(this).attr("data-url");
    $("#address_type").val(type);
    $("#customer_id").val(customer_id);

    $.ajax({
        // the route pointing to the post function
        url: url,
        type: 'GET',
        dataType: 'JSON',

        success: function(data) {
                var newTr = "";
                if( data['status'] == 'success' ) {
                var addressArr = data['address'];

                    addressArr.forEach(function(res) {
                        var email = '';
                        if(res.email){
                            email = res.email;
                        }

                    newTr += '<tr>';
                    newTr += '<td class="text-center"><input type="radio" name="change_address" class="flat-red" value="'+res.addressbook_pk_no+'" data-type="'+type+'" customer_post_code="'+res.post_code+'" data-address1="'+res.address1+'" data-address2="'+res.address2+'" data-address3="'+res.address3+'"  data-state="'+res.state+'" data-city="'+res.city+'" >';
                    newTr += '</td>';
                    newTr += '<td>'+res.name+'</td>';
                    newTr += '<td>'+res.full_address+'</td>';
                    newTr += '<td>'+email+'</td>';
                    newTr += '<td>'+res.mobile_no+'</td>';
                    newTr += '</tr>';
                    });
                    $('#add_new_address_table > tbody').empty();
                    $('#add_new_address_table > tbody').append(newTr);

                }
            },
        error: function (xhr, ajaxOptions, thrownError) {
            //console.log(xhr.status);
            //console.log(thrownError);
            }
    });



});


$(document).on('submit', '#new_address_frm', function(event) {
    var url = $(this).attr('data-url');
    var flag = true;
    var address_type = $('input[name="address_type"]').val();
    var phone_no = $('#phone_no').val();

    if(phone_no == ''){ flag = false; $(".err-phone_no").text("Please field is required").fadeIn(300).delay(3500).fadeOut(400); }
    if(flag == true){

    $.ajax({

    url: url,
    type: 'POST',

    data: $('#new_address_frm').serialize(),

    success: function(data) {
       //console.log(data);
       var newTr = "";
       if( data['status'] == 'success' ) {
                   var addressArr = data['address'];

                   addressArr.forEach(function(res) {
                       var email = '';
                       if(res.email){email = res.email;};

                    newTr += '<tr>';
                    newTr += '<td class="text-center"><input type="radio" name="change_address" class="flat-red" value="'+res.addressbook_pk_no+'" data-type="'+address_type+'" customer_post_code="'+res.post_code+'" data-address1="'+res.address1+'" data-address2="'+res.address2+'" data-address3="'+res.address3+'" data-state="'+res.state+'" data-city="'+res.city+'">';
                    newTr += '</td>';
                    newTr += '<td>'+res.name+'</td>';
                    newTr += '<td>'+res.full_address+'</td>';
                    newTr += '<td>'+email+'</td>';
                    newTr += '<td>'+res.mobile_no+'</td>';
                    newTr += '</tr>';
               });
                   $('#add_new_address_table > tbody').empty();
                   $('#add_new_address_table > tbody').append(newTr);

                   $('#add_new_address_from').css("display", "none");
                   $('#add_new_address_table_wrap').css("display", "block");
           
               }


           },
       error: function (xhr, ajaxOptions, thrownError) {

       }
   }); 
}else{
    return false;
}
    
});


$(document).on('click', '#add_new_address_btn', function (event) {
    $("#add_new_address_table_wrap").hide();
    $("#add_new_address_from").css("display", "block");
    $("#add_new_address_from").find("input[type=text], input[type=number], textarea").val("");
});


$(document).on("click", ".addressbook_modal_close", function(event) {

    $("#add_new_address_from").css("display", "none");
    $("#add_new_address_table_wrap").css("display", "block");

});

$(document).on("click", '#open_address_book', function (e) {

    $("#add_new_address_from").css("display", "none");
    $("#add_new_address_table_wrap").css("display", "block");

});



        $(function() {
            var input = document.querySelector("#phone");
            $('#phone_code_display').html('+60');
            $('#phone').attr('value', "+60");

            // $('.toooltipdm').tooltipster();
            //Initialize Select2 Elements
            $('.select2').select2();

            $(document).on('change', '#country', function() {
                var thisValue = $(this).val();
                var thisAttrPhonecode = $(this).find('option:selected').attr('phonecode');

                if ('#' === thisValue) {
                    $('#phone_code_display').html('<i class="fa fa-phone"></i>');
                    $('#phone').attr('value', "");
                    $('#phone_number').attr('value', "");
                } else {

                    $('#phone_code_display').text(thisAttrPhonecode);

                    var phone_number = $('#phone_number').val();
                    var phone_code_display = $('#phone_code_display').text();
                    var full_phone_number = phone_code_display + phone_number;

                    $('#phone').attr('value', full_phone_number);
                }
            });

            $(document).on('keyup', '#phone_number', function() {
                var thisValue = $(this).val();
                // var phone_code_display = $('#phone_code_display').text();
                // var full_phone_number = phone_code_display + thisValue;

                // $('#phone').attr('value', full_phone_number);
                $('#phone_no').attr('value', thisValue);
            });

        });

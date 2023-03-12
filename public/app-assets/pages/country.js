$(document).on("keyup paste change keypress","#cus_mobile_input,#mobilenoadd,#mobilenoadd2", function (evt) {
    var self = $(this);
    self.val(self.val().replace(/[^0-9\.]/g, ''));
    if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
    {
        evt.preventDefault();
    }
});
function getState(city,type) {
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/customer_state/'+city,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if (type == 1) {
                $('#state').html(data);
            }else{
                $('#state2').html(data);
            }
        },
        complete: function (data) {
            $("body").css("cursor", "default");
        }
    });
}
$(document).on('change','#city', function(){
    var city_id     = $(this).val();
    getState(city_id,1);
});
$(document).on('change','#city2', function(){
    var city_id     = $(this).val();
    getState(city_id,2);
});
$(document).on('keyup','[id=post_code_]', function(){
    var postcode = $('#post_code_').val();
    $('#post_code_hidden').val(postcode);
});
$(document).on('keyup','[id=post_code_2]', function(){
    var postcode = $('#post_code_2').val();
    $('#post_code2').val(postcode);
});
$(document).on('change','#country_single', function(){
    changeDialCode();
});
function changeDialCode() {
    var selected_country_dial = $('#country_single').find(":selected").data('dial_code');
    $('#phonecode').text(selected_country_dial);
    $('#cus_mobile_input').val('');
}
function changeDialCodePopups() {
    var selected_country_dial = $('#country').find(":selected").data('dial_code');
    console.log(selected_country_dial);
    $('#phonecode2').text(selected_country_dial);
    $('#mobilenoadd').val('');
}
function changeDialCodePopups2() {
    var selected_country_dial = $('#country2').find(":selected").data('dial_code');
    console.log(selected_country_dial);
    $('#phonecode3').text(selected_country_dial);
    $('#mobilenoadd2').val('');
}
/*Post Code onkey change city/state/country */
$(document).ready(function($) {

    changeDialCode();
    //Set the Options for "Bloodhound" suggestion engine
    var country = 2;
    var country2 = 2;
    call_typeahead(country);
    call_typeahead2(country2);
    $(document).on('change','#country', function(){
        // console.log(1);
        country = $(this).val();
        $(".search-input4").val('');
        $("#city").html('<option value="">Select City</option>');
        $("#state").html('<option value="">Select State</option>');
        $(".search-input4").typeahead("destroy");
        changeDialCode();
        changeDialCodePopups();
        call_typeahead(country);
    });
    $(document).on('change','#country2', function(){
        country2 = $(this).val();
        $(".search-input8").val('');
        $("#city2").html('<option value="">Select City</option>');
        $("#state2").html('<option value="">Select State</option>');
        $(".search-input8").typeahead("destroy");
        changeDialCodePopups2();
        call_typeahead2(country2);
    });
});
function call_typeahead(country) {
    var get_url = $('#base_url').val();
    // var country = $('#country').val();
    var engine = new Bloodhound({
        remote: {
            url: get_url+'/get-post-code?post_code=%QUERY%&country='+country,
            wildcard: '%QUERY%',
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('post_code'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });
    $('.search-input4').on('typeahead:selected', function (e, datum) {
        var post_code = $('.search-input4').val();
        $('#post_code_hidden').val(datum['PO_CODE'])
        $.ajax({
            type:'get',
            url:get_url+'/customer_city/'+datum['PO_CODE'],
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                $('#city').html(data);
                $('#state').html('<option value="">Select State</option>');
                var scatId = $('#city').find(":selected").val();
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    });
    $(".search-input4").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        display: 'PO_CODE',
        limit: 10,
        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<span class="list-group-item" style="cursor: pointer;">' + data.PO_CODE + '</span>'
        }
        }
    });
}
function call_typeahead2(country) {
    var get_url = $('#base_url').val();
    // var country = $('#country').val();
    var engine = new Bloodhound({
        remote: {
            url: get_url+'/get-post-code?post_code=%QUERY%&country='+country,
            wildcard: '%QUERY%',
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('post_code2'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $('.search-input8').on('typeahead:selected', function (e, datum) {
        var post_code = $('.search-input8').val();
        $('#post_code2').val(datum['PO_CODE'])
        var asd = $('#post_code2').val();
        console.log(asd);
        $.ajax({
            type:'get',
            url:get_url+'/customer_city/'+datum['PO_CODE'],
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                $('#city2').html(data);
                $('#state2').html('<option value="">Select State</option>');
                var scatId = $('#city2').find(":selected").val();
                // getState(scatId,2);
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    });
    $(".search-input8").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        display: 'PO_CODE',
        limit: 10,
        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<span class="list-group-item" style="cursor: pointer;">' + data.PO_CODE + '</span>'
        }
        }
    });
}
function getEditData(customer_id,id) {
    var get_url = $('#base_url').val();
    $.ajax({
        type:'get',
        url:get_url+'/getCustomerAddressEdit/'+customer_id+'/'+id,
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
}

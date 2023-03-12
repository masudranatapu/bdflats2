/*Subcategory by Category*/
$(document).on('change','#category', function(){
    var id = $(this).val();
    var url = $(this).attr('data-url');
    if ('' != id) {
        var pageurl = url+'/'+id;
        $.ajax({
            type:'get',
            url:pageurl,
            async :true,
            beforeSend: function () {
                $("body").css("cursor", "progress");
            },
            success: function (data) {
                $('#sub_category').html(data);
                setTimeout(function(){
                    var scatId = $('#sub_category').find(":selected").val();
                    var url = $('#sub_category').attr('data-url');
                    getHscode(scatId,url);
                },500); 

              
            },
            complete: function (data) {
                $("body").css("cursor", "default");
            }
        });
    }


});

/*Model by Brand*/
$(document).on('change','#brand', function(){
    var id      = $(this).val();
    var url     = $(this).attr('data-url');
    var pageurl = url+'/'+id;


    $.ajax({
        type:'get',
        url:pageurl,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if(data != '' ){
                $('#prod_model').html(data);
                //getAndSetIGprefix('prod_model_add','ig_prefix_add');
            } else {
                $('#prod_model').html("<option value=''>data not found</option>");
            }

        },
        complete: function (data) {
            $("body").css("cursor", "default");

        }
    });

});

function getHscode(scatId, url){
    var id      = scatId;
    var url     = url;
    var pageurl = url+'/'+id;

    $.ajax({
        type:'get',
        url:pageurl,
        async :true,
        beforeSend: function () {
            $("body").css("cursor", "progress");
        },
        success: function (data) {
            if(data != '' ){
                $('#hs_code').html(data);

            } else {
                $('#hs_code').html("<option value=''>data not found</option>");
            }

        },
        complete: function (data) {
            $("body").css("cursor", "default");

        }
    });
}

/*HS code by subcategory*/
$(document).on('change','#sub_category', function(){
    var scatId      = $(this).val();
    var url     = $(this).attr('data-url');
    var pageurl = url+'/'+scatId;
    getHscode(scatId, url);

});


/*add ig prefix*/
// function getAndSetIGprefix(getClass,putClass){
//     var thisElement = $('.'+getClass).find(":selected").data("igprifix");
//     $('.'+putClass).text(thisElement);
// }

// $(document).on('change','.prod_model_add', function(){
//     getAndSetIGprefix('prod_model_add','ig_prefix_add');

// })



$(document).on('click','#colorAdd', function(){
   $('#brand_name').text($(this).data('brand_name'));
   $('#brand_id').val($(this).data('brand_id'));

})


$(document).on('click','#sizeAdd', function(){
   $('#brand_name1').text($(this).data('brand_name'));
   $('#brand_id1').val($(this).data('brand_id'));

})

$(document).on('change','.set_variant_name', function(){
   var color = $('#color').find(":selected").text();
   var size = $('#size').find(":selected").text();
   var variant_name = $('#variant_name').data('variant_name');
   var new_variant_name = variant_name + ' - ' + color + ' - ' +  size;
   $('#variant_name').val(new_variant_name);


})

$(document).ready(function(){
    checkMFG();

})

function checkMFG(){
    var check = $("#barcode_by_mfg").is(":checked");
    if(check) {
        //$('#barcode').val('');
        $('#barcode').removeAttr('readonly');

    } else {
        $('#barcode').attr('readonly',true);
    }
}

$("#barcode_by_mfg").on("click", function(){

   checkMFG();
});










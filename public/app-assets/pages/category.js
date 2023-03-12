/*Add edit product subcategory*/
$(document).on('click','.editSubcategory, .addSubcategory', function(){
    var url         = $(this).data('url');
    var category_id    = $(this).data('category_id');
    var category_name  = $(this).data('category_name');
    var subcat_id    = $(this).data('subcat_id');
    var subcat_name  = $(this).data('subcat_name');
    var subcat_code  = $(this).data('subcat_code');
    var type        = $(this).data('type');

    $('#subcat_add_edit_frm').attr('action',url); 
    $('#subcat_add_edit_frm .category_id').val(category_id); 
    $('#subcat_add_edit_frm .subcat_name').val(subcat_name); 
    $('#subcat_add_edit_frm .subcat_code').val(subcat_code); 
    if (type == 'add'){
        $('#category_name').text('Add new subcategory for '+category_name); 
        $('#subcat_add_edit_frm .submit-btn').val('Save');
    }
    if (type == 'edit'){
        $('#category_name').text('Edit subcategory for '+category_name); 
        $('#subcat_add_edit_frm .submit-btn').val('Save change'); 
    }
});


/*Add edit product HS code*/
$(document).on('click','.editSHcode, .addSHcode', function(){
    var url             = $(this).data('url');
    var hscode_id       = $(this).data('hscode_id');
    var hscode          = $(this).data('hscode');
    var narration       = $(this).data('narration');
    var subcat_id       = $(this).data('subcat_id');
    var subcat_name     = $(this).data('subcat_name');
    var type            = $(this).data('type');


    $('#hscode_add_edit_frm').attr('action',url); 
    $('#hscode_add_edit_frm .subcat_id').val(subcat_id); 
    $('#hscode_add_edit_frm .hscode').val(hscode); 
    $('#hscode_add_edit_frm .narration').val(narration); 
    if (type == 'add'){
        $('#subcat_name').text('Add new HS code for '+subcat_name); 
        $('#hscode_add_edit_frm .submit-btn').val('Save');
    }
    if (type == 'edit'){
        $('#subcat_name').text('Edit HS code for '+subcat_name); 
        $('#hscode_add_edit_frm .submit-btn').val('Save change'); 
    }
});


$(document).on('click','.showSHcode',function(){
    var category_id = $(this).data('category_id');
    var subcat_id = $(this).data('subcat_id');
    $('.hs_cat_'+category_id).hide();
    $('.hs_scat_'+subcat_id).show();
})

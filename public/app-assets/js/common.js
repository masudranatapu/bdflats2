$(document).on('input', '.max_val_check',function(e){
	var val = Number($(this).val());
    var max = Number($(this).attr('max'));
	if (val > max) {
		$(this).val(max);
    }
});

$(document).on("wheel", ".max_val_check", function (e) {
    $(this).blur();
});
$(document).on("wheel", "input[type='number']", function (e) {
    $(this).blur();
});


$(document).on('submit', '.prev_duplicat_frm', function (e) {
    $(this).find('.prev_duplicat').attr('disabled',true);
})

$(document).on('keyup', '.remove_first_zero', function(e) {
    if((this.value+'').match(/^0/)) {
        this.value = (this.value+'').replace(/^0+/g, '');
    }
});

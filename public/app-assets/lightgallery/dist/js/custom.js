/*jquery.unveil.min.js*/
!function(t){t.fn.unveil=function(i,e){var n,r=t(window),o=i||0,u=window.devicePixelRatio>1?"data-src-retina":"data-src",s=this;function l(){var i=s.filter(function(){var i=t(this);if(!i.is(":hidden")){var e=r.scrollTop(),n=e+r.height(),u=i.offset().top;return u+i.height()>=e-o&&u<=n+o}});n=i.trigger("unveil"),s=s.not(n)}return this.one("unveil",function(){var t=this.getAttribute(u);(t=t||this.getAttribute("data-src"))&&(this.setAttribute("src",t),"function"==typeof e&&e.call(this))}),r.on("scroll.unveil resize.unveil lookup.unveil",l),l(),this}}(window.jQuery||window.Zepto);
$(document).ready(function() {
	$("img.unveil").unveil();

	var c_r = $("#c_r").text();

	$(".ch_menu[data-r='"+c_r+"']").closest('.treeview-menu').css("display","block");
	$(".ch_menu[data-r='"+c_r+"']").closest('.treeview').addClass("menu-open active");
	$(".ch_menu[data-r='"+c_r+"']").addClass("active");
	$(".ch_menu[data-r='"+c_r+"'] i").toggleClass("fa-circle-o fa-dot-circle-o");
});

// function startFilter(ele){
//     var cs1 = $(".ch_menu", ele).attr("data-r");
//     if(cs1 == 'type'){
//         //do something
//     }
// }

function isNumberKey(evt){
    //prevent negative number
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));

}

function removeCommasReturnInt(string){
	if(string){
		s = string.split(',').join('');
		return parseInt(s);

	}else{

		return 0;
	}

}

$(document).on("keyup paste change keypress",".number-only", function (evt) {

	var self = $(this);
	self.val(self.val().replace(/[^0-9\.]/g, ''));
	if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57))
	{
		evt.preventDefault();
	}
});

// call the_farm_house method & init preloader when window load
$(window).on('load', function () {
	$('#preloader').fadeOut('slow', function () {
		$(this).remove();
	});

});


// $('.date').datepicker({
//         format: 'dd-mm-yyyy',
//         autoclose: true,
//         todayHighlight: true
// });

$(document).on('click','.ch_menu', function(e){
$(".treeview-menu").css("display",'none');
$(this).closest(".treeview-menu").css("display",'block');
});

$(document).on('input','.limit_min', function(e){
	var min = $(this).attr('data-min');
	$(this).val(min);
});
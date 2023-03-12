$(document).ready(function(){

		//
	  	   //   featured slider
	   //
		$('.featured-sec .owl-carousel').owlCarousel({
			  items:3,
              autoplay :   true,
              smartSpeed : 1000,
              nav :  true ,
              loop: false,
              dots :  false ,
              autoplayHoverPause:true,
              autoplayTimeout:6000,
              items:5,
              margin:20,
              navText: [
             	 "<i class='fa fa-angle-left '></i>",
              	 "<i class='fa fa-angle-right'></i>"
           	 ],
              responsive:{
                  0:{
                      items:1,
                      autoplay: true,
                      loop: true,
                      slideBy:1,
                  },
                  576:{
                      items:2,
                      autoplay: true,
                      loop: true,
                      slideBy:1,
      
                  },
                  768:{
                      items:3,
                        autoplay: true,
                      loop: true,
                      slideBy:1,
                  },
                  992:{
                      items:4,
                       autoplay: true,
                      loop: true,
                      slideBy:1
                  }
              }
          })

		//
	  	   //   category slider
	   //
		$('.category-pro-sec .owl-carousel').owlCarousel({
			  items:3,
              smartSpeed : 1000,
              nav :  true ,
              loop: false,
              dots :  false ,
              autoplayHoverPause:true,
              autoplayTimeout:6000,
              items:5,
              margin:20,
              navText: [
             	 "<i class='fa fa-angle-left '></i>",
              	 "<i class='fa fa-angle-right'></i>"
           	 ],
              responsive:{
                  0:{
                      items:1,
                      loop: true,
                      slideBy:1
                  }
              }
          })


    //
         //   category slider
     //
    $('.testimonial-sec .owl-carousel').owlCarousel({
              items:3,
              smartSpeed : 1000,
              nav :  false,
              loop: false,
              dots :  false ,
              autoplayHoverPause:true,
              autoplayTimeout:5000,
              items:5,
              margin:20,
              responsive:{
                  0:{
                      items:1,
                      loop: true,
                      autoplay:true,
                      slideBy:1
                  }
              }
          })





     //
         //   scroll top
     //

     $(window).scroll(function(){
         if ($(this).scrollTop()>1000){
            $("#scroll").fadeIn("slow");
         }else{
            $("#scroll").fadeOut("slow");
         }
     })
     $("#scroll").click(function(){
        $("html, body").animate({scrollTop:0}, 500)
     })




     //
         //    show phone number
     //
     $(".show-number").click(function(){
        $(".hide_text").hide();
        $(".Show_num").removeClass("d-none");
     })




 // footer fixed menu
     $(window).bind("resize",function(){
        if($(this).width() <768){
            $(".fixed-menu").fadeIn();
        }else{
            $(".fixed-menu").fadeOut();
        }
     }).resize();

 
 




})//end document
 

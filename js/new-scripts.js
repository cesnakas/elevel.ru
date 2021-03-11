




//new 11.02.2014
$(document).ready(function() {
	//блок что вы получаете
	$('.b-advantage__item').hover(function(){
		$(this).find('.b-adv__pop').fadeIn(300);
	}, function(){
		$(this).find('.b-adv__pop').fadeOut(200);
	});



	//слайдер "Примеры реализации"
	/*if($(".slider-example").length>0){
	$(window).load(function() {
	  	$('.slider-example').flexslider({
	    	animation: "slide",
	    	controlNav: true,
	    	slideshow: false,
			slideshowSpeed: 7000,
			animationLoop: false,
			smoothHeight: true,
			useCSS: false
	  	});
	});
	}   */
    //слайдер "Примеры реализации"
	if($(".slider-example.b1").length>0){
	$(window).load(function() {
	  	$('.slider-example.b1').flexslider({
	    	animation: "slide",
	    	controlNav: true,
	    	slideshow: false,
			slideshowSpeed: 7000,
			animationLoop: false,
			smoothHeight: true,
			useCSS: false
	  	});
	});
	}
	    //слайдер "Примеры реализации"
	if($(".slider-example.b2").length>0){
	$(window).load(function() {
	  	$('.slider-example.b2').flexslider({
	    	animation: "slide",
	    	controlNav: true,
	    	slideshow: false,
			slideshowSpeed: 7000,
			animationLoop: false,
			smoothHeight: true,
			useCSS: false
	  	});
	});
	}
	    //слайдер "Примеры реализации"
	if($(".slider-example.b3").length>0){
	$(window).load(function() {
	  	$('.slider-example.b3').flexslider({
	    	animation: "slide",
	    	controlNav: true,
	    	slideshow: false,
			slideshowSpeed: 7000,
			animationLoop: false,
			smoothHeight: true,
			useCSS: false
	  	});
	});
	}

	//слайдер "Архитектура «умного дома»"
	if($(".slider-architecture").length>0){
	$(window).load(function() {
	  	$('.slider-architecture').flexslider({
	    	animation: "slide",
	    	controlNav: true,
	    	slideshow: false,
			slideshowSpeed: 7000,
			animationLoop: false,
			smoothHeight: false,
			useCSS: false
	  	});
	});
	}

	$('.btn-opac').append('<span></span>');


	//Табер
(function($) {  
$(function() {  
  
  $('.b-steps ul').on('hover', 'li:not(.active)', function() {  
      $(this).addClass('active').siblings().removeClass('active')  
          .parents('div.b-row__we-work').find('div.b-steps__cont_item').eq($(this).index()).fadeIn(150).siblings('div.b-steps__cont_item').hide();  
  })  
  
})  
})(jQuery)  
	
}); 

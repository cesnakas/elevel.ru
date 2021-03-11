$(document).ready(function(){
  $('.carousel-2').slick({
    dots: true,
    customPaging : function(slider, i) {
      return '<a href="#"><span class="carousel-dot"></span></a>';
    },
  });

  $('.carousel-2 .slick-dots li a').on('click', function(e){
    e.preventDefault(); // use this
  });

});
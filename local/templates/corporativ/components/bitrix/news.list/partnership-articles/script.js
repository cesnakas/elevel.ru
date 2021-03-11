$(document).ready(function(){
  $('.articles-carousel').slick({
    dots: true,
    slidesToShow: 4,
    customPaging : function(slider, i) {
      return '<a href="#"><span class="carousel-dot"></span></a>';
    },
  });

  $('.carousel .slick-dots li a').on('click', function(e){
    e.preventDefault(); // use this
  });

});
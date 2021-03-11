// page init
jQuery(function(){
     // countTo
    (function($) {
        $.fn.countTo = function(options) {
            // merge the default plugin settings with the custom options
            options = $.extend({}, $.fn.countTo.defaults, options || {});

            // how many times to update the value, and how much to increment the value on each update
            var loops = Math.ceil(options.speed / options.refreshInterval),
                increment = (options.to - options.from) / loops;

            return $(this).each(function() {
                var _this = this,
                    loopCount = 0,
                    value = options.from,
                    interval = setInterval(updateTimer, options.refreshInterval);

                function updateTimer() {
                    value += increment;
                    loopCount++;
                    $(_this).html(value.toFixed(options.decimals));

                    if (typeof(options.onUpdate) == 'function') {
                        options.onUpdate.call(_this, value);
                    }

                    if (loopCount >= loops) {
                        clearInterval(interval);
                        value = options.to;

                        if (typeof(options.onComplete) == 'function') {
                            options.onComplete.call(_this, value);
                        }
                    }
                }
            });
        };

        $.fn.countTo.defaults = {
            from: 0,  // the number the element should start at
            to: 100,  // the number the element should end at
            speed: 1000,  // how long it should take to count between the target numbers
            refreshInterval: 100,  // how often the element should be updated
            decimals: 0,  // the number of decimal places to show
            onUpdate: null,  // callback method for every time the element is updated,
            onComplete: null  // callback method for when the element finishes updating
        };
    })(jQuery);

    jQuery(function($) {
		
		$('.counterTo').each(function() {
			var to = parseInt($(this).text().replace(" ", ""));
			
			var refreshInterval = 3;
			if (to > 50 && to < 50000) refreshInterval = 10;
			if (to > 50000) refreshInterval = 50;
			
			$(this).countTo({
				from: 0,
				to: to,
				speed: 2000,
				refreshInterval: refreshInterval
			});
			
			
		});
    });

    // end countTo
	
	$('.slider-about').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        fade: true,
        asNavFor: '.slider-about-nav'
    });
	
	$('.slider-about-nav').slick({
        infinite: false,
        slidesToShow: 9,
        slidesToScroll: 1,
        asNavFor: '.slider-about',
        dots: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
	
	// плавная прокрутка к элементу с классом = /page.php?test=Y#[class]
	if(location.hash.length){
		var target=$('.'+location.hash.substr(1));
		
		if(target.length) $('html,body').animate({scrollTop:target.offset().top}, "slow");
	};
	
	// проставляем красный цвет тексту успешной отправки для всех форм не в попапе
	$(".feedback_form_note").each(function() {
		if ($(this).parents(".lightbox").length <= 0) {
			$(this).css("color", "red");
		}
	});
});

// показать еще
$(document).on('click', '[data-show-more]', function(){
	var btn = $(this);
	var page = btn.attr('data-next-page');
	var id = btn.attr('data-show-more');
	var bx_ajax_id = btn.attr('data-ajax-id');
	var block_id = "#comp_"+bx_ajax_id;
	var button_id = "#btn_"+bx_ajax_id;
	
	var data = {
		bxajaxid:bx_ajax_id
	};
	data['PAGEN_'+id] = page;

	$.ajax({
			type: "GET",
			url: window.location.href,
			data: data,
			timeout: 3000,
			success: function(data) {
				$(block_id).append($(data).find(block_id).html());
				
				if (!!$(data).find(button_id).html())
					$(button_id).html($(data).find(button_id).html());
				else
					$(button_id).remove();
				
				setTimeout(function() { console.log("before initSameHeight"); initSameHeight(); console.log("after initSameHeight"); }, 500);
			}
	});
});

function thousandSeparator (str) {
	var parts = (str + '').split('.'),
		main = parts[0],
		len = main.length,
		output = '',
		i = len - 1;
	
	while(i >= 0) {
		output = main.charAt(i) + output;
		if ((len - i) % 3 === 0 && i > 0) {
			output = ' ' + output;
		}
		--i;
	}

	if (parts.length > 1) {
		output += '.' + parts[1];
	}
	return output;
};

// перезагрузка всех js скриптов после ajax фильтрации
function ReinitAllScripts()
{
	initOpenClose();
    initPopups();
    initSameHeight();
    jcf.customForms.replaceAll();
    $("[rel='lightbox']").fancybox({
        theme : 'light'
    });
    jQuery('input, textarea').placeholder();

    $(".lightbox-open").fancybox({
        theme : 'light'
    });
    $("[data-fancybox]").fancybox({
        helpers: {
            media: {}
        }
    });
    $('.customOptions').selectric({
        optionsItemBuilder: function(itemData) {
            return itemData.value.length ? '<span class="ico ico-' + itemData.value +  '"></span>' + itemData.text : itemData.text;
        }
    });
    $('select').selectric();


    $('.link-scroll').on('click', function() {
        var scrollAnchor = $(this).data('scroll');
        if (typeof scrollAnchor != 'undefined') {
            var scrollPoint = $('[data-anchor="' + scrollAnchor + '"]').offset().top - 20;
            $('body,html').animate({
                scrollTop: scrollPoint
            }, 500);
        }
        return false;

    });

    // select
    $('.popup-holder').each(function(){
        var holder = $(this),
            inner = $('.inner',holder),
            li = $('.popup ul li',holder);
        $.each(li,function(){
            var element = $(this);
            $('a',element).click(function(e){
                inner.html($(this).text());
                li.removeClass('active');
                element.addClass('active');
            });
        })
    });
    // select

    /*if( $('.map-contact').length ){
        ymaps.ready(init);
    }*/
    var header = $('.header');
    if( header.length ){
        $(window).scroll(function(){
            if( $(window).scrollTop() >  100) {
                header.addClass("sticky");
                $('body').addClass("sticky");
            } else {
                header.removeClass("sticky");
                $('body').removeClass("sticky");
            }
        })
    }


    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.mobile-header').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('.mobile-header').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('.mobile-header').removeClass('nav-up').addClass('nav-down');
            }
        }

        lastScrollTop = st;
    }
    var mobile_nav = $('.mobile-header .mobile-menu .popup');
    function setPopupHeight(){
        mobile_nav.outerHeight($(window).height() - $('.mobile-header').outerHeight());
    }

    var slider_popup = $('.slider-brands .popup');
    function setSliderPopupWidth(){
        slider_popup.width($(this).closest('.section-content').width());
    }
    setPopupHeight();
    setSliderPopupWidth();
    $(window).resize(
        setPopupHeight,
        setSliderPopupWidth
    );
    $('.slider').slick({
        infinite: true,
        slidesToShow: 4,
        dots: false,
        arrows: true,
        speed: 300,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1099,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 499,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });
    $('.slider-documents').slick({
        infinite: true,
        slidesToShow: 5,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });
    $('.slider-brands').slick({
        infinite: true,
        slidesToShow: 3,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.video-slider').slick({
        infinite: true,
        slidesToShow: 3,
        vertical: true,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    vertical: false,
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.slider-video-categories').slick({
        infinite: true,
        slidesToShow: 3,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });
    $('.slider-other-services').slick({
        infinite: true,
        slidesToShow: 3,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });
    $('.slider-single').slick({
        infinite: true,
        slidesToShow: 3,
        dots: false,
        arrows: false,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    infinite: true
                }
            }
        ]
    });
    $('.slider-banners').slick({
        infinite: true,
        slidesToShow: 1,
        dots: true,
        arrows: false,
        slidesToScroll: 1
    });
    $('.slider-testimonials').slick({
        infinite: true,
        slidesToShow: 1,
        dots: false,
        arrows: true,
        slidesToScroll: 1
    });
    $('.slider-for').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    dots: true
                }
            }
        ]
    });
    $('.slider-nav').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        vertical: true,
        focusOnSelect: true
    });
    $('.slider-project-for').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        fade: true,
        asNavFor: '.slider-project-nav'
    });
    $('.slider-project-nav').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-project-for',
        dots: false,
        focusOnSelect: true
    });
    $('.slider-design-projects-for').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        draggable: false,
        fade: true,
        asNavFor: '.slider-design-projects-nav'
    });
    $('.slider-design-projects-nav').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-design-projects-for',
        dots: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    
    $('.slider-examples').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.slider-popup').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1099,
                settings: {
                    slidesToShow: 5
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });


    //slick init

	var sliders = [];
	var sliderOptions = [

	{
        infinite: true,
        slidesToShow: 5,
        dots: false,
        arrows: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 499,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    }

	]


    sliders.push($('.slider-brands2'));


	for(var i = 0; i < sliders.length; i++){
		sliders[i].slick(sliderOptions[i]);
	}
	var tabs = $('.tabs-content>div, .product-tabs-content>div');
	var timeout = 0;

    if($(window).width() < 1083) {
        $('.slider-list').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 2
                    }
                }
                ,
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

    } else {

        var target = $('.slider-list');
        if(target.hasClass('slick-initialized'))
            target.slick('unslick');
    }

    var SetArrowPosition = function(){
        $('.slider-arrow-position').each(function(){
            var picture_height = $(this).find('.visual').height(),
                arrow = $(this).find('.slick-arrow');
            arrow.css({
                top: Math.round(picture_height/2)
            })
        });
    };
	$(window).resize(function() {
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			for(var i = 0; i < sliders.length; i++){
                var slickElement = sliders[i].slick('getSlick');
                if(slickElement.hasOwnProperty('refresh'))
				    slickElement.refresh();
			}
		}, 50);

        timeout = setTimeout(function() {
            if($(window).width() < 1083) {
                $('.slider-list').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: true,
                    responsive: [
                        {
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 2
                            }
                        }
                        ,
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });

            } else {

                var target = $('.slider-list');
                if(target.hasClass('slick-initialized'))
                    target.slick('unslick');
            }
        }, 10);
        SetArrowPosition();


    });

   setTimeout(function() {
       SetArrowPosition();
       initSameHeight();
   }, 1000);

    initTabs();
}
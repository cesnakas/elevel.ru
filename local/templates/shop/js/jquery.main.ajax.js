// page init
jQuery(function(){
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
    $('.customOptions').selectric({
        optionsItemBuilder: function(itemData) {
            return itemData.value.length ? '<span class="ico ico-' + itemData.value +  '"></span>' + itemData.text : itemData.text;
        }
    });
    $('select').selectric();


    jQuery('.spinner').spinner({
        spin: function (event, ui) {
            if (ui.value < 1) {
                jQuery(this).spinner("value", 1);
                return false;
            }
        }
    });

	// сменить стоимость в разделе при увеличении/уменьшении
	$(".catalog-list .spinner").on("spinstop", function(){		
		var id = $(this).attr('id');		
		var price = parseFloat($("#price" + id).text().replace(/\s/g, '')).toFixed(2);		
		$("#sum" + id).text("" + ((price * $(this).spinner('value')).toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.')));
	});
	
	// положить в корзину в разделе
	$(".catalog-list .add2basket, .catalog-items .add2basket").click(function () {
		
		_this = $(this);
		if (!_this.hasClass("disabled"))
		{
			var product_id = _this.attr("id").substr(3);
			
			if (_this.hasClass("quantity_one"))
				var quantity = 1;
			else
				var quantity = $("#" + product_id).spinner('value');
			
			_this.addClass("preload");
			$.post(
				"/shop/ajax/add2basket.php",
				{
					quantity: quantity,
					productID: product_id
				},
				onAjaxSuccess
			).complete(function() { 
				_this.removeClass("preload");
			});

			function onAjaxSuccess(data)
			{
				var json = $.parseJSON(data);
							
				if (json.count > 0)
				{
					$("#bx_basket1").html('<div class="block-cart full">\
						<a title="' + window.locale_cart + '" class="link-cart" href="/personal/basket.php">\
								 ' + window.locale_goods + ' (' + json.count + ')<br/>\
								' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' ' + window.locale_rub + '.\
						</a>\
					</div>');
					
					$("#bx_basket2").html('<div class="block-cart popup-active">\
						<a title="' + window.locale_cart + '" class="open" href="/personal/basket.php">' + window.locale_cart + '</a>\
					</div>');
					
				}
				else
				{
					$("#bx_basket1").html('<div class="block-cart">\
						<a title="" class="link-cart" href="/personal/basket.php">\
								   ' + window.locale_cart_empty + '\
						</a>\
					</div>');
					
					$("#bx_basket2").html('<div class="block-cart">\
						<a title="' + window.locale_cart + '" class="open" href="/personal/basket.php">' + window.locale_cart + '</a>\
					</div>');
				}
			}
		}
		
		return false;
	});

    // slider prices
    var sliderPrice = $('#slider_price');
    $('#arrFilter_P3_MIN').on('input', function () {
        var val = parseInt($(this).val());
        var maxValue = sliderPrice.slider('values',1);
        var min = sliderPrice.slider('option','min');
        if(val >= maxValue || isNaN(val)){
            val = maxValue - 1;
        }
        if(val < min){
            val = min;
        }
        $(this).val(val);
        onInputRangeChange([val, maxValue]);
    });
    $('#arrFilter_P3_MAX').on('input', function() {
        var val2 = parseInt($(this).val());
        var minValue = sliderPrice.slider('values',0);
        var max = sliderPrice.slider('option','max');
        if(val2 <= minValue || isNaN(val2)){
            val2 = minValue + 1;
        }
        if(val2 > max){
            val2 = max;
        }

        $(this).val(val2);
        onInputRangeChange([minValue, val2]);

    });
	
	// ловушка для события изменения поля цены, если двигать слайдером
	$.valHooks.input = {
         get: function(a) {
             return a.value
         },
         set: function(a, b) {
             var c = a.value;
             a.value = b;
             "slider_price_input" == a.className && c !== b && $(a).trigger("change")
         }
     };
    
    // scroll top
    $('.link-top').click(function( e ) {
        e.preventDefault();
        $('body,html').animate({scrollTop:0},800);
    });
    // select
    $('.popup-holder').each(function(){
        var holder = $(this),
            inner = $('.inner .text',holder),
            li = $('.popup ul li',holder);
        $.each(li,function(){
            var element = $(this);
            $('a',element).click(function(e){
                inner.html($(this).text());
                //li.removeClass('active');   // косячные строки
                //element.addClass('active');
            });
        })
    });
    // select

    $('.brands-holder').each(function(){
        var holder = $(this),
            inner = $('.inner .text',holder),
            inputs =$('input',holder);
        $.each(inputs,function(){
            var element = $(this);
            element.on('change',function(){
                var str = '';
                $.each(inputs,function(){
                    var checkInput = $(this);
                    if(checkInput.is(':checked')){
						if (checkInput.next().find('img').is(":first-child"))
							var text = checkInput.next().find('img').attr('alt');
						else
							var text = checkInput.next().text();
						
                        str += text + ', ';
                    }
                });
                str = str.substr(0,str.length - 2);
                if(str == '')
                    str = window.locale_brands;
                inner.html(str)

            });
        })
    });
    $('.ownership div').click(function(){
        if($(this).hasClass('entity') || $(this).hasClass('jcf-class-entity')){
            $('.entity-block').addClass('visible');
        }
        else{
            $('.entity-block').removeClass('visible');
        }
    });
    $('.delivery-row .check-row div').click(function(){
        if($(this).hasClass('delivery') || $(this).hasClass('jcf-class-delivery')){
            $('.delivery-active').addClass('visible');
            $('.pickup-active').removeClass('visible');
        }
        else{
            $('.pickup-active').addClass('visible');
            $('.delivery-active').removeClass('visible');
        }
    });
    $('.delivery-choose.check-row div').click(function(){
        if($(this).hasClass('delivery') || $(this).hasClass('jcf-class-delivery')){
            $('.delivery-block').addClass('visible');
            $('.pickup-block').removeClass('visible');
            $('.tk-block').removeClass('visible');
        }
        else if($(this).hasClass('pickup') || $(this).hasClass('jcf-class-pickup')) {
            $('.pickup-block').addClass('visible');
            $('.delivery-block').removeClass('visible');
            $('.tk-block').removeClass('visible');
        }
        else{
            $('.tk-block').addClass('visible');
            $('.pickup-block').removeClass('visible');
            $('.delivery-block').removeClass('visible');
        }
    });




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
        $('.counter1').countTo({
            from: 0,
            to: 175000,
            speed: 3000,
            refreshInterval: 50
        });
        $('.counter2').countTo({
            from: 0,
            to: 30000,
            speed: 3000,
            refreshInterval: 10
        });
        $('.counter3').countTo({
            from: 0,
            to: 10,
            speed: 500,
            refreshInterval: 1
        });
        $('.counter4').countTo({
            from: 0,
            to: 50,
            speed: 500,
            refreshInterval: 10
        });
    });

    // end countTo

    


    var header = $('.mobile-header').offset().top;
    $(window).scroll(function(){
        if( $(window).scrollTop() >  100) {
            $('.mobile-header').addClass("sticky");
            $('body').addClass("sticky");
        } else {
            $('.mobile-header').removeClass("sticky");
            $('body').removeClass("sticky");
        }
    })


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

    $('.block-catalog').on('mouseover', function() {
        $('body').addClass('overlay');
        return false;
    });
    $('.block-catalog').on('mouseleave', function() {
        $('body').removeClass('overlay');
        return false;
    });
    var mobile_nav = $('.mobile-header .mobile-menu .popup');
    function setPopupHeight(){
        mobile_nav.outerHeight($(window).height() - $('.mobile-header').outerHeight());
    }
    setPopupHeight();
    $(window).resize(setPopupHeight);

	// простановка сортировки / количества товаров
	$("a.sort_link").click(function() {
		event.preventDefault();
		
		var changed_data = $(this).attr("data-change");		
		smartFilter.change_sort_or_count(this, changed_data);
	});
	
	$("#del_filter").click(function() {
		event.preventDefault();
		$('#link_del_filter').click();
		return false;
	});
	
	$(".ajax_stop").attr("onclick", ""); // отключаем ajax на ссылках в карточку товара
	$(".ajax_stop_container a").attr("onclick", ""); // отключаем ajax на ссылках на главной
});

// open-close init
function initOpenClose() {
	
	$( ".open-close a.opener" ).unbind( "click" );
	$( ".open-close a.opener" ).click(function(e) {
		e.preventDefault();
		
		$(this).parents("div.open-close").children("ul.slide-block").slideDown( "slow", function() {});
		$(this).remove();
	});
	
	$( ".accordion li a.accordion-open" ).unbind( "click" );
	$( ".accordion li a.accordion-open" ).click(function(e) {
		e.preventDefault();
		
		var parent_li = $(this).parents("li");
		var accordion_slide = $(parent_li).children(".accordion-slide");
		
		if ($(accordion_slide).is(':visible')) $(parent_li).removeClass("active");
		else $(parent_li).addClass("active");
			
		$(accordion_slide).slideToggle( "slow", function() {});
	});
	
    /*jQuery('.open-close').openClose({
        activeClass: 'active',
        opener: 'body .opener',
        slider: 'body .slide-block',
        animSpeed: 400,
        effect: 'slide'
    });
    
	jQuery('.accordion li').openClose({
        activeClass: 'active',
        opener: '.accordion-open',
        slider: '.accordion-slide',
        animSpeed: 400,
        effect: 'slide'
    });*/
	
}
// popups init
function initPopups() {
	
	$( ".popup-holder .open" ).unbind( "click" );
	$( ".popup-holder2 .open2" ).unbind( "click" );
	$( ".popup-holder-about .open" ).unbind( "click" );
	
	$( ".popup-holder-over .open" ).unbind( "mouseover" );
	
    jQuery('.popup-holder').contentPopup({
        mode: 'click',
        popup: '.popup',
        btnOpen: '.open',
        btnClose: '.popup a.close-link'
    });
    jQuery('.popup-holder2').contentPopup({
        mode: 'click',
        popup: '.popup2',
        btnOpen: '.open2',
        btnClose: '.popup2 a'
    });
    jQuery('.popup-holder-over').contentPopup({
        mode: 'mouseover',
        popup: '.popup',
        btnOpen: '.open'
    });
    jQuery('.popup-holder-about').contentPopup({
        mode: 'click',
        popup: '.popup',
        btnOpen: '.open',
        hideOnClickOutside: false
    });
}

// align blocks height
function initSameHeight() {
    jQuery('ul.list-staff').sameHeight({
        elements: '>li',
        multiLine: true
    });
    jQuery('ul.list-stock').sameHeight({
        elements: 'li',
        multiLine: true
    });
}

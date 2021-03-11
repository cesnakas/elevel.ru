// page init
jQuery(function(){
    window.locale_brands = "Бренды";
    window.locale_cart = "Корзина";
    window.locale_goods = "Товаров";
    window.locale_rub = "руб";
    window.locale_cart_empty = "В корзине нет товаров";

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

    // перезагружаем страницу при снятии/установке галки В наличии
    $('input[name=available]').change(function() {

        var check = $(this).prop('checked');
        if (check === false)
        {
            $("form[name=available]").append('<input name="available" value="N" type="hidden">');
        }

        $("form[name=available]").submit();
    });

    $( ".spinner" ).spinner({
        start: function( event, ui ) {			
            $( ".spinner" ).spinner( "option", "step", $( this ).data('multiplicity') );
        }
    });
    //$( ".spinner" ).spinner( "option", "step", $( ".spinner" ).data('multiplicity') );

    // сменить стоимость в разделе при увеличении/уменьшении
    $(".catalog-list .spinner").on("spinstop", function(){		
        var id = $(this).attr('id');		
        var price = parseFloat($("#price" + id).text().replace(/\s/g, '')).toFixed(2);		
        $("#sum" + id).text("" + ((price * $(this).spinner('value')).toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.')));
    });

    // положить в корзину в разделе
    $(".catalog-list .add2basket, .catalog-items .add2basket, .add-to-basket-item").click(function () {

        _this = $(this);
        //if (!_this.hasClass("disabled"))
        //{			
        if($("#" + _this.attr("id")).attr("href") != '')
        {				
            $(location).attr('href',$("#" + _this.attr("id")).attr("href"));
            //return false;
        }

        var product_id = _this.attr("id").substr(3);

        if (_this.hasClass("quantity_one"))
            var quantity = 1;
        else
            var quantity = $("#" + product_id).spinner('value');

        _this.addClass("preload");

        $('.item-modal').removeClass('show');	
        $("#modal" + product_id).addClass('show');
        $("#modalmobail" + product_id).addClass('show');
        $("#" + _this.attr("id") + " .center").html('В корзине');
        $("#" + _this.attr("id")).attr("href","/personal/basket.php");

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
                    <a title="Корзина" class="link-cart" href="/personal/basket.php">\
                    Товаров (' + json.count + ')<br/>\
                    ' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' руб.\
                    </a>\
                    </div>');

                $("#bx_basket2").html('<div class="block-cart popup-active">\
                    <a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
                    </div>');

                if(window.productInfo){

                    // Yandex.Ecommerce
                    dataLayerYa.push({
                        "ecommerce": {
                            "add": {
                                "products": [
                                    {
                                        "id": product_id,
                                        "name": window.productInfo[product_id]['name'],
                                        "price": window.productInfo[product_id]['price'],
                                        "quantity": quantity
                                    }
                                ]
                            }
                        }
                    });
                    // /Yandex.Ecommerce
                }
            }
            else
            {
                $("#bx_basket1").html('<div class="block-cart">\
                    <a title="Корзина" class="link-cart" href="/personal/basket.php">\
                    В корзине нет товаров\
                    </a>\
                    </div>');

                $("#bx_basket2").html('<div class="block-cart">\
                    <a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
                    </div>');
            }					
        }
        //}

        return false;
    });

    $('.item-modal-close').on('click', function(e) {
        e.preventDefault();
        $('#' + $(this).parent().attr("id")).removeClass('show');	  
    });

    $('.item-modal-link-close').on('click', function(e) {
        e.preventDefault();	  
        $('#' + $(this).parent().attr("id")).removeClass('show');	  
    });

    // slider prices
    var sliderPrice = $('#slider_price');
    $('#arrFilter_P3_MIN, #seriesFilter_P3_MIN').on('input', function () {
        var val = parseInt($(this).val());
if(!val) return false;
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
    $('#arrFilter_P3_MAX, #seriesFilter_P3_MAX').on('input', function() {
        var val2 = parseInt($(this).val());
if(!val2) return false;
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

    // проставляем такие же значения одноименным полям (в десктопной и мобильной версии)
    $('.form-catalog input').on('input change', function() {
        var name = $(this).attr('name');

        if ($(this).attr('type') == 'checkbox')
        {
            var check = $(this).prop('checked');
            $('.form-catalog input[name="' + name + '"]').prop('checked', check);
        }
        else
        {
            var value = $(this).val();
            $('.form-catalog input[name="' + name + '"]').val(value);
        }
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
                //li.removeClass('active');
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
                    str = 'Бренды';
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

        if (!!$('.counter1').length)
        {
            $('.counter1').countTo({
                from: 0,
                to: $(".counter1").data('to'),
                speed: 3000,
                refreshInterval: 50
            });
        }

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

    $('.slider-brands-main').slick({
        infinite: true,
        slidesToShow: 4,
        dots: false,
        arrows: true,
        speed: 300,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,	
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
    window.slider_single_params = {
        infinite: true,
        slidesToShow: 4,
        dots: false,
        arrows: true,
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
                breakpoint: 1025,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    };

    $('body .slider-single').slick(window.slider_single_params);

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
    $('.shop-address-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        fade: true,
        asNavFor: '.shop-address-slider-nav',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    dots: true
                }
            }
        ]
    });
    $('.shop-address-slider-nav').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.shop-address-slider',
        dots: false,
        focusOnSelect: true
    });
    $('.slider-stock').slick({
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
            },
            {
                breakpoint: 639,
                settings: {
                    slidesToShow: 1
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


    sliders.push($('.slider-brands'));


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
        $('.slider-list').each(function(){
            var picture_height = $(this).find('img').height(),
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
                sliders[i].slick('getSlick').slick('refresh');
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
        }, 1000);


    initTabs();

    /*$("a.sort_link").click(function() {
    event.preventDefault();

    var changed_data = $(this).attr("data-change");

    smartFilter.change_sort_or_count(this, changed_data);
    });

    $("#del_filter").click(function() {
    event.preventDefault();
    $('#link_del_filter').click();
    return false;
    });*/

    $(".ajax_stop").attr("onclick", ""); // отключаем ajax на ссылках в карточку товара
    $(".ajax_stop_container a").attr("onclick", ""); // отключаем ajax на ссылках на главной


    $( '.phone-mask' ).mask( '+7 (999) 999-99-99' );

    if (document.getElementById('phone-mask-order') != null)
    {
        document.getElementById('phone-mask-order').onkeypress = function(e) {
            e = e || event;
            var rep = /[a-zA-Zа-яА-Я]/;

            if (e.ctrlKey || e.altKey || e.metaKey) return;

            var chr = getChar(e);

            if (chr == null) return;

            if (rep.test(chr)){
                return false;
            }	
        }
    }

    $('.mobile-menu.dev').on('click', function(){
        $('body').toggleClass('active-menu');
    });

    $('.open-child').on('click', function(e){
        e.stopPropagation();
        $(this).addClass('active');
        console.log('click');
    });

    $('.mobile-menu-back').on('click', function(e){
        e.stopPropagation();
        var parent = $(this).parent('.mobile-menu-child').parent('.mobile-menu-item');
        console.log($(this));
        console.log($(this).parent('.mobile-menu-child'));
        console.log(parent);
        parent.removeClass('active');
    });

});

function getChar(event) {
    if (event.which == null) {
        if (event.keyCode < 32) return null;
        return String.fromCharCode(event.keyCode) // IE
    }

    if (event.which != 0 && event.charCode != 0) {
        if (event.which < 32) return null;
        return String.fromCharCode(event.which) // остальные
    }

    return null; // специальная клавиша
}

// open-close init
function initOpenClose() {

    $( ".open-close a.opener" ).click(function(e) {
        e.preventDefault();
        if ($(this).hasClass ('js-my-opener'))
        {
            $(this).parents("div.open-close").find("div.slide-block").slideToggle( "slow", function() {});
        }
        else
        {
            $(this).parents("div.open-close").children("ul.slide-block").slideDown( "slow", function() {});
            $(this).remove();  
        }    
    });

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

    jQuery('body .accordion li').openClose({
    activeClass: 'active',
    opener: '.accordion-open',
    slider: '.accordion-slide',
    animSpeed: 400,
    effect: 'slide'
    });*/
}
// popups init
function initPopups() {
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
// content tabs init
function initTabs() {
    jQuery('ul.sidebar-main-nav').contentTabs({
        event:'mouseover',
        tabLinks: 'a',
        attrib:'data-tab',
    });
    jQuery('ul.list-contact-cities').contentTabs({
        tabLinks: 'a.tab-link'
    });
    jQuery('ul.product-tabset').contentTabs({
        tabLinks: 'a'
    });

    jQuery('ul.tabset-inner').contentTabs({
        tabLinks: 'a'
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
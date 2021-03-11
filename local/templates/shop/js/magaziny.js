// page init
jQuery(function(){
    initOpenClose();
    //initPopups();
    
    jQuery('.menu-popup-holder').contentPopup({
        mode: 'click',
        popup: '.menu-popup',
        btnOpen: '.menu-opener'
    });
    
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
    $('.slider').not('slick-initialized').slick({
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
    $('.slider-documents').not('slick-initialized').slick({
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
    
    $('.video-slider').not('slick-initialized').slick({
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
    $('.slider-video-categories').not('slick-initialized').slick({
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
    $('.slider-other-services').not('slick-initialized').slick({
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
    $('.slider-single').not('slick-initialized').slick({
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
    $('.slider-banners').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 1,
        dots: true,
        arrows: false,
        slidesToScroll: 1
    });
    $('.slider-testimonials').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 1,
        dots: false,
        arrows: true,
        slidesToScroll: 1
    });
    $('.slider-for').not('slick-initialized').slick({
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
    $('.slider-nav').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        vertical: true,
        focusOnSelect: true
    });
    $('.slider-project-for').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        fade: true,
        asNavFor: '.slider-project-nav'
    });
    $('.slider-project-nav').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-project-for',
        dots: false,
        focusOnSelect: true
    });
    $('.slider-design-projects-for').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        draggable: false,
        fade: true,
        swipe: false,
        asNavFor: '.slider-design-projects-nav'
    });
    $('.slider-design-projects-nav').not('slick-initialized').slick({
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
    
    $('.slider-examples').not('slick-initialized').slick({
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
    $('.slider-popup').not('slick-initialized').slick({
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

    $('.slider-production').not('slick-initialized').slick({
        infinite: true,
        slidesToShow: 3,
        dots: false,
        arrows: true,
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
        $('.slider-list').not('slick-initialized').slick({
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
                $('.slider-list').not('slick-initialized').slick({
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
    
});

// open-close init
function initOpenClose() {
    jQuery('.open-close').openClose({
        activeClass: 'active',
        opener: '.opener',
        slider: '.slide-block',
        animSpeed: 400,
        effect: 'slide'
    });
    jQuery('.accordion li').openClose({
        activeClass: 'active',
        opener: '.accordion-open',
        slider: '.accordion-slide',
        animSpeed: 400,
        hideOnClickOutside: true,
        effect: 'slide'
    });
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
        btnOpen: '.open',
        btnClose: '.popup a.close-link'
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
    jQuery('ul.tabset').contentTabs({
        tabLinks: 'a'
    });
    jQuery('ul.list-contact-cities').contentTabs({
        tabLinks: 'a.tab-link'
    });
    jQuery('ul.tabset-inner').contentTabs({
        tabLinks: 'a'
    });
    jQuery('ul.tabset-cities').contentTabs({
        tabLinks: 'a'
    });
    /*jQuery('.slider-brands').contentTabs({
        tabLinks: 'a'
    });*/
    setTimeout(function(){
        var sliderBrands = $('.section-brands');
        var tabElements = $('.section-brands .tabs-content>div');
        var showOptions = {
            'visibility':'visible',
            'height':'auto',
            'position':'relative',
            'width':sliderBrands.width()
        };
        var hideOptions = {
            'visibility':'hidden',
            'height':0,
            position: 'absolute',
            'width':sliderBrands.width()
        };

        tabElements.css(hideOptions);
        var links = $('.visual.tab-link');
        links.each(function(index){
            var link = $(this);
            link.on('click', function(e){
                e.preventDefault();
                var href = link.attr('href');
                tabElements.css(hideOptions);
                tabElements.filter(href).css(showOptions);
            })
        });
        $(document).on( "click", ".ui-closable-tab", function() {
            var parentHolder = $(this).parent();
            parentHolder.css(hideOptions);
        });
        $(window).on('resize', function(){
            tabElements.css({width: sliderBrands.width()});
        })
    },0);
}
// align blocks height
function initSameHeight() {
    jQuery('ul.list-news').sameHeight({
        elements: 'a',
        multiLine: true
    });
    jQuery('ul.list-steps').sameHeight({
        elements: 'li',
        multiLine: true
    });
    jQuery('ul.list-faq').sameHeight({
        elements: 'li',
        multiLine: true
    });
    jQuery('ul.list-projects').sameHeight({
        elements: '.item',
        multiLine: true
    });
    jQuery('ul.main-blocks').sameHeight({
        elements: '.item',
        multiLine: true
    });
}

// map
/*
function init() {
    // ������
    var elementsCounts = {
        "map-msc":0,
        "map-spb":0,
        "map-rostov":0,
        "map-ekb":0,
        "map-novosib":0,
        "map-kazan":0,
        "map-ufa":0,
        "map-samara":0,
        "map-bryansk":0,
        "map-chelyabinsk":0,
        "map-partners-msc":0,
        "map-partners-spb":0,
        "map-partners-ekb":0
    };
    for(var key in elementsCounts){
        var element = $('#' + key);
        elementsCounts[key] = element.length;
    }
    if(elementsCounts["map-msc"]) {
        var myMapMsc = new ymaps.Map("map-msc", {
                center: [55.948521984437,37.757041178543],
                zoom: 8
            }
        );
        myMapMsc.behaviors.disable('scrollZoom');
        myMapMsc.geoObjects
            .add(new ymaps.Placemark([55.748521984437,37.757041178543], {
                    content: '�������� ���� �level',
                    balloonContent: '<strong>��������:</strong> �������� ���� �level<br/>'  + '<strong>�����:</strong> �. ����� �����������, 111524, ������, ��. �����������, 13�<br/>'  + '<strong>�������:</strong> <br>+7 (903) 546-15-23<br>+7 (495) 363-32-03<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 19:00, �� 10:00 - 18:00, �� ��������<br/>'  + '<strong>Email:</strong> dze@elevel.ru<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.798204407864,37.489619360118], {
                    content: '���� ������ �� ����������� ����',
                    balloonContent: '<strong>��������:</strong> ���� ������ �� ����������� ����<br/>'  + '<strong>�����:</strong> �. ����������� ����, �. ����������� ���� 123060, ������, ��. ������� �������, 10<br/>'  + '<strong>�������:</strong> +7 (495) 363-32-03<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, �� 10:00 - 18:00, �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:dzr@elevel.ru">dzr@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.805530492338,38.428519857778], {
                    content: '���� ������ � ������������',
                    balloonContent: '<strong>��������:</strong> ���� ������ � ������������<br/>'  + '<strong>�����:</strong> 144000, ����������&nbsp;�������,&nbsp;�. ������������, ��������� �����, ��� 28<br/>'  + '<strong>�������:</strong> +7 (977) 551-62-44+7 (495) 363-32-03<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, ��-��: ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:info_elec@elevel.ru">info_elec@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([56.349047614854,37.518247940475], {
                    content: '���� ������ � ��������',
                    balloonContent: '<strong>��������:</strong> ���� ������ � ��������<br/>'  + '<strong>�����:</strong> 141800, �. �������, �� ����������������, �. 3<br/>'  + '<strong>�������:</strong> +7 (495) 363-32-03, ���. 5103, 5104<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, ��-��: ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:info_dmitrov@elevel.ru">info_dmitrov@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.861507,38.439007], {
                    content: '���� ������ � ��������',
                    balloonContent: '<strong>��������:</strong> ���� ������ � ��������<br/>'  + '<strong>�����:</strong> �. �������, ���������� �������, ��. ����������� 1-�<br/>'  + '<strong>�������:</strong> +7 (495) 363-32-03, ���.  5113, 5110<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, ��-��: ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:info_noginsk@elevel.ru">info_noginsk@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([56.331776217848,38.15630985582], {
                    content: '���� ������ � �������-������',
                    balloonContent: '<strong>��������:</strong> ���� ������ � �������-������<br/>'  + '<strong>�����:</strong> �. ������� �����, ���������� �������, �������� ������� �����, �. 240<br/>'  + '<strong>�������:</strong> +7 (495) 363-32-03 , ���. 5106<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 19:00, ��-��: 10.00 - 17.00, <br>'  + '<strong>Email:</strong> <a href="mailto:info_sp@elevel.ru">info_sp@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.917521801621,37.995626959574], {
                    content: '���� ������ � �������',
                    balloonContent: '<strong>��������:</strong> ���� ������ � �������<br/>'  + '<strong>�����:</strong> 141102, ���������� ���., �. ٸ�����, ������������ ��������, 7�<br/>'  + '<strong>�������:</strong> 8 (495) 363-32-03, ���.: 5116, 5116<br/>'  + '<strong>������ ������:</strong> ��-�� 9:00 - 19:00, ��-�� 10:00 - 17:00<br/>'  + '<strong>Email:</strong> <a href="mailto:info_chel@elevel.ru">info_chel@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.985834761907,37.867611406746], {
                    content: '���� ������ � �������',
                    balloonContent: '<strong>��������:</strong> ���� ������ � �������<br/>'  + '<strong>�����:</strong> 141200, ���������� ���., �. �������, ����������� �., 4�<br/>'  + '<strong>�������:</strong> 8 (495) 363-32-03, ���. 5122<br>8 (495) 134-42-77, ���. 5120    <br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 20:00, <br>��-��: 10:00 - 18:00<br/>'  + '<strong>Email:</strong> <a href="mailto:info_puh@elevel.ru">info_puh@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.8211224,38.9656243], {
                    content: '���� ������ � �������-�����',
                    balloonContent: '<strong>��������:</strong> ���� ������ � �������-�����<br/>'  + '<strong>�����:</strong> 142600, ���������� ���., �. �������-�����, ��. ��������, �. 90<br/>'  + '<strong>�������:</strong> 8 (495) 363-32-03, ���.: 5130/5131<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 19:00, �� 10:00 - 17:00 <br/>'  + '<strong>Email:</strong> info_oz@elevel.ru<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.672219742162,37.583802695896], {
                    content: ' �.����������� ����������� �������� �. 24, ��� � 2',
                    balloonContent: '<strong>��������:</strong> �.����������� ����������� �������� �. 24, ��� � 2<br/>'  + '<strong>�����:</strong> �. �����������, ����� ������� � ��������� �EXPOSTROY� <br>����������� �������� �. 24, ��� � 2, ������ �, ����� 43. <br>'  + '<strong>�������:</strong> 8 (495) 363-32-03 ���. 5422<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.612575723131,37.486707126952], {
                    content: '������������ ����� 41 �� ����',
                    balloonContent: '<strong>��������:</strong> ������������ ����� 41 �� ����<br/>'  + '<strong>�����:</strong> �. Ҹ���� ����, ����, 41-� �� (����������� ���� � ��. �����������), ��������� �-22/2, �-22/2 <br/>'  + '<strong>�������:</strong> 8 (495) 363-32-03 ���. 5401, 5402<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00<br/>'  + '<strong>Email:</strong> <a href="mailto:41km@elevel.ru">41km@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.750158779419,37.887525259435], {
                    content: '�������-����������� �������� (���) ����������',
                    balloonContent: '<strong>��������:</strong> �������-����������� �������� (���) ����������<br/>'  + '<strong>�����:</strong> �. ����������, ������������� �., ��. 4 (2,7 �� �� ����)<br> �������� 2 - 17 �����<br> �������� 31 - 3 �����<br/>'  + '<strong>�������:</strong> 8 (495) 363-32-03 ���. 5426, 5427, 5428, 5429<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00<br/>'  + '<strong>Email:</strong> <a href="mailto:novokosino2@elevel.ru">novokosino2@elevel.ru</a><br> <a href="mailto:novokosino3@elevel.ru">novokosino3@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.678672901979,37.781642406746], {
                    content: '�� &quot;���������� ����&quot;',
                    balloonContent: '<strong>��������:</strong> �� &quot;���������� ����&quot;<br/>'  + '<strong>�����:</strong> �. �������, ���������� �������, 1�2�<br> �������� �-103 1 ����<br>'  + '<strong>�������:</strong> 8 (495) 363-32-03 ���. 5416, 5417<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 20:00<br/>'  + '<strong>Email:</strong> <a href="mailto:lyublino-2@elevel.ru">lyublino-2@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.881861715577,37.733366161377], {
                    content: '�������-������������ �������� (���) �����-��������',
                    balloonContent: '<strong>��������:</strong> �������-������������ �������� (���) �����-��������<br/>'  + '<strong>�����:</strong> �. ���� , ����������� �., 100 � �� ���� (�. ������, ��. ����������������, �. 25 �û) <br>����� "�����-��������", ������ 11, ��������� 9<br/>'  + '<strong>�������:</strong> 8 (495) 363-32-03 ���. 5436, 5437<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00<br/>'  + '<strong>Email:</strong> <a href="mailto:yaroslavka4@elevel.ru">yaroslavka4@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.664512808782,37.634763869034], {
                    content: '��� &quot;��������� ����-1&quot;',
                    balloonContent: '<strong>��������:</strong> ��� &quot;��������� ����-1&quot;<br/>'  + '<strong>�����:</strong> �. ���������, ��������� �., ��. 19�13 (����������� ���������� �. � ������������ ��.)<br>�������� 3-60 (3-� ����)<br/>'  + '<strong>�������:</strong> +7 (926) 940-49-14<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 21:00<br/>'  + '<strong>Email:</strong> <a href="mailto:kashirka4@elevel.ru">kashirka4@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }))
            .add(new ymaps.Placemark([55.574006407734,37.600683536385], {
                    content: '������������ ����� ��������� ����-3',
                    balloonContent: '<strong>��������:</strong> ������������ ����� ��������� ����-3<br/>'  + '<strong>�����:</strong> �. ����� , ����, 33-� �� (����������� ���� � ����������� �.) <br> ���������� �������� 2-8�<br>'  + '<strong>�������:</strong> 8 (495) 363-32-03 ���. 5406, 5407<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00<br/>'  + '<strong>Email:</strong> <a href="mailto:kashirka3@elevel.ru">kashirka3@elevel.ru</a><br><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: 'images/placeholder-orange.svg',
                    iconImageSize: [21, 29],
                    iconImageOffset: [-10, -15],
                    iconCaptionMaxWidth: '50'
                }));

        $('.link-map').each(function(){
            var link = $(this);
            var parent = link.closest('[id*="district-msc"]');
            link.on('click', function(e){
                e.preventDefault();
                $('html,body').animate({
                        scrollTop: $('.map-contact').offset().top},
                    'slow');
                var item = myMapMsc.geoObjects.get(parent.index());
                // ���������/��������� ����� � �����.
                if (item.balloon.isOpen()) {
                    item.balloon.close();
                } else {
// ������ ������ ����� ����� �� ���������� �����.

                    item.balloon.open(item.geometry.getCoordinates());
                }


            });

        });
    }
   if(elementsCounts["map-spb"]){
       // ����� - ����������
       var myMapSpb = new ymaps.Map("map-spb", {
               center: [59.939668,30.430675],
               zoom: 14
           }
       );
       myMapSpb.behaviors.disable('scrollZoom');
       myMapSpb.geoObjects
           .add(new ymaps.Placemark([59.939668,30.430675], {
                   content: '���� ������ �� ���������',
                   balloonContent: '<strong>��������:</strong> ���� ������ �� ���������<br/>'  + '<strong>�����:</strong> �. ��������� , �. ��������� 195027, �����-���������, ��. ��������������, 51 ���. ��<br/>'  + '<strong>�������:</strong> +7 (812) 324-69-95<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, �� � �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:info@elevel-spb.ru">info@elevel-spb.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
               },
               {
                   iconLayout: 'default#image',
                   iconImageHref: 'images/placeholder-orange.svg',
                   iconImageSize: [21, 29],
                   iconImageOffset: [-10, -15],
                   iconCaptionMaxWidth: '50'
               }))
   }
    if(elementsCounts["map-rostov"]){
    // ������-��-����
    var myMapRostov = new ymaps.Map("map-rostov", {
            center: [47.274544100169,39.687070135582],
            zoom: 14
        }
    );
    myMapRostov.behaviors.disable('scrollZoom');
    myMapRostov.geoObjects
        .add(new ymaps.Placemark([47.274544100169,39.687070135582], {
                content: '���� ������ �� ��������',
                balloonContent: '<strong>��������:</strong> ���� ������ �� ��������<br/>'  + '<strong>�����:</strong> 344038, ������-��-����, ��. ��������, 62�<br/>'  + '<strong>�������:</strong> +7 (863) 300-78-00<br/>'  + '<strong>������ ������:</strong> � 01 ���� �� 30 �������� ��-�� 09:00 - 18:00, �� � �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:info@elevel-rst.ru">info@elevel-rst.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-ekb"]){
    // ������������
    var myMapEkb = new ymaps.Map("map-ekb", {
            center: [56.831392207548,60.616552593254],
            zoom: 14
        }
    );
    myMapEkb.behaviors.disable('scrollZoom');
    myMapEkb.geoObjects
        .add(new ymaps.Placemark([56.831392207548,60.616552593254], {
                content: '���� ������ �� �������������',
                balloonContent: '<strong>��������:</strong> ���� ������ �� �������������<br/>'  + '<strong>�����:</strong> �. �������������, 620026, ������������, ��. ����������, �. 41 (������ ����), ����� � ����� ����������<br/>'  + '<strong>�������:</strong>  +7 (343) 287-01-61 (��������������)<br><strong>����:</strong>  +7 (343) 355-61-63<br>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, �� 10:00 - 17:00,  �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:elevel@elevel-ekt.ru">elevel@elevel-ekt.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-novosib"]){
    // �����������
    var myMapNovosib = new ymaps.Map("map-novosib", {
            center: [55.012495935336,82.931229050926],
            zoom: 14
        }
    );
    myMapNovosib.behaviors.disable('scrollZoom');
    myMapNovosib.geoObjects
        .add(new ymaps.Placemark([55.012495935336,82.931229050926], {
                content: '���� ������ �� ������ �������',
                balloonContent: '<strong>��������:</strong> ���� ������ �� ������ �������<br/>'  + '<strong>�����:</strong> �. ������ ������, 630102, �����������, ��. ������, 39<br/>'  + '<strong>�������:</strong>  +7 (383) 335-88-09 <br>+7 (383) 227-71-40 <br>+7 (383) 227-71-30<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, ��, �� ��������<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },

            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-kazan"]){
    //  ������
    var myMapKazan = new ymaps.Map("map-kazan", {
            center: [55.827622120818,49.158799330689],
            zoom: 14
        }
    );
    myMapKazan.behaviors.disable('scrollZoom');
    myMapKazan.geoObjects
        .add(new ymaps.Placemark([55.827622120818,49.158799330689], {
                content: '������������ �����������������',
                balloonContent: '<strong>��������:</strong> ������������ �����������������<br/>'  + '<strong>�����:</strong> �. ������, ��������� �. 1 ���� 317<br/>'  + '<strong>�������:</strong> +7 843 259 02 16<br>+7 843 204 25 03<br>+7 962 559 02 16<br/>'  + '<strong>������ ������:</strong>  ��-�� 09:00 - 18:00, ��, �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:i.mineev@elevel.ru">i.mineev@elevel.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },

            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-ufa"]){
    //  ���

    var myMapUfa = new ymaps.Map("map-ufa", {
            center: [54.775644155996,56.120393630624],
            zoom: 14
        }
    );
    myMapUfa.behaviors.disable('scrollZoom');
    myMapUfa.geoObjects
        .add(new ymaps.Placemark([54.775644155996,56.120393630624], {
                content: '������������ �������������',
                balloonContent: '<strong>��������:</strong> ������������ �������������<br/>'  + '<strong>�����:</strong> �� �. ���<br>��������� ������<br/>'  + '<strong>�������:</strong> +7 (927) 330-20-00<br/>'  + '<strong>Email:</strong> m.melnikov@elevel.ru<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },

            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-samara"]){
    //  ������

    var myMapSamara = new ymaps.Map("map-samara", {
            center: [53.180088773241,50.154457091263],
            zoom: 12
        }
    );
    myMapSamara.behaviors.disable('scrollZoom');
    myMapSamara.geoObjects
        .add(new ymaps.Placemark([53.180088773241,50.074457091263], {
                content: '�������',
                balloonContent: '<strong>��������:</strong> �������<br/><strong>�����:</strong> ������, ��. ��������, �.1, �� ��������, ������ 509<br/><strong>�������:</strong> (846) 270-8407 </br><strong>������ ������:</strong> ��-�� 09:00 - 20:00,  �� 09:00 - 18:00<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },


            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
        .add(new ymaps.Placemark([53.183740, 50.172135], {
                content: '�������',
                balloonContent: '<strong>��������:</strong> �������<br/><strong>�����:</strong> ������, ��. ������������ �. 48, <br/>�� ���������, ������ 401 <br/><strong>�������:</strong> (846) 278-7687 </br><strong>������ ������:</strong> ��-�� 09:00 - 19:00, ��-�� 09:00 - 18:00<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },

            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-bryansk"]){
    //  ������

    var myMapBryansk = new ymaps.Map("map-bryansk", {
            center: [53.329949425168,34.243964713223],
            zoom: 15
        }
    );
    myMapBryansk.behaviors.disable('scrollZoom');
    myMapBryansk.geoObjects
        .add(new ymaps.Placemark([53.329949425168,34.243964713223], {
                content: '������� ������ ���',
                balloonContent: '<strong>��������:</strong> ������� ������ ���<br/><strong>�����:</strong> ������, ��. �������������, 14 <br/>�� "�����������", �������� �30<br/><strong>�������:</strong> (4832) 30-50-30, </br><strong>������ ������:</strong> ��-�� 9:00�17:00; �� 9:00�15:00<a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
        .add(new ymaps.Placemark([53.329390, 34.244617], {
                content: '�������',
                balloonContent: '<strong>��������:</strong> �������<br/><strong>�����:</strong> ������, ��. �������������, 14 <br/>�� "�����������", ����� �9, <br/><strong>�������:</strong>  (4832) 30-50-30 </br><strong>������ ������:</strong> ��-�� 9:00�17:00; �� 9:00�15:00<a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },

            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-chelyabinsk"]){
    //  ���������

    var myMap�helyabinsk = new ymaps.Map("map-chelyabinsk", {
            center: [55.180674, 61.385274],
            zoom: 11
        }
    );
    myMap�helyabinsk.behaviors.disable('scrollZoom');
    myMap�helyabinsk.geoObjects
        .add(new ymaps.Placemark([55.180674, 61.385274], {
                content: '������� ��������������',
                balloonContent: '<strong>��������:</strong> ������� ��������������<br/><strong>�����:</strong> ���������, ������������ �������� 32, ������������ ����� �����������ʻ �������� � 5-��. <br/><strong>�������������� �������:</strong> (351) 200-3641. </br><strong>������ ������:</strong> ��-�� 9:00�18:00, �� 9:00�17:00, �� 9:00�15:00<a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
        .add(new ymaps.Placemark([55.184083, 61.245376], {
                content: '������� ��������������',
                balloonContent: '<strong>��������:</strong> ������� ��������������<br/><strong>�����:</strong> ���������, ������������ ����� �. 64, �� ������ �� ������������ ���������. <br/><strong>�������������� �������:</strong> (351) 200-3641. </br><strong>������ ������:</strong> ��-��  9:00�19:00, �� 9:00�18:00<a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
        .add(new ymaps.Placemark([55.093654, 61.385880], {
                content: '������� ��������������',
                balloonContent: '<strong>��������:</strong> ������� ��������������<br/><strong>�����:</strong> ���������, �������� ����� 21, ������-��������� ����� �����Ȼ, ������ �3 ����� �22. <br/><strong>�������������� �������:</strong> (351) 200-3641.</br><strong>������ ������:</strong> ��-�� 9:00�20:00, ��-�� 9:00�19:00<a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },

            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))

        .add(new ymaps.Placemark([55.093654, 61.385880], {
                content: '������� ��������������',
                balloonContent: '<strong>��������:</strong> ������� ��������������<br/><strong>�����:</strong> ���������, �������� ����� 21, ������-��������� ����� �����Ȼ, ������2 ����� �18. <br/><strong>�������������� �������:</strong> (351) 200-3641.</br><strong>������ ������:</strong> ��-�� 9:00�20:00, ��-�� 9:00�19:00<a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-partners-msc"]){
    // ������
    var myPartMapMsc = new ymaps.Map("map-partners-msc", {
            center: [55.948521984437,37.757041178543],
            zoom: 8
        }
    );
    myPartMapMsc.behaviors.disable('scrollZoom');
    myPartMapMsc.geoObjects
        .add(new ymaps.Placemark([55.748521984437,37.757041178543], {
                content: '�������� ���� �level',
                balloonContent: '<strong>��������:</strong> �������� ���� �level<br/>'  + '<strong>�����:</strong> �. ����� �����������, 111524, ������, ��. �����������, 13�<br/>'  + '<strong>�������:</strong> <br>+7 (903) 546-15-23<br>+7 (495) 363-32-03<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 19:00, �� 10:00 - 18:00, �� ��������<br/>'  + '<strong>Email:</strong> dze@elevel.ru<br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-partners-spb"]){
    // ����� - ����������
    var myPartMapSpb = new ymaps.Map("map-partners-spb", {
            center: [59.939668,30.430675],
            zoom: 14
        }
    );
    myPartMapSpb.behaviors.disable('scrollZoom');
    myPartMapSpb.geoObjects
        .add(new ymaps.Placemark([59.939668,30.430675], {
                content: '���� ������ �� ���������',
                balloonContent: '<strong>��������:</strong> ���� ������ �� ���������<br/>'  + '<strong>�����:</strong> �. ��������� , �. ��������� 195027, �����-���������, ��. ��������������, 51 ���. ��<br/>'  + '<strong>�������:</strong> +7 (812) 324-69-95<br/>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, �� � �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:info@elevel-spb.ru">info@elevel-spb.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
    if(elementsCounts["map-partners-ekb"]){
    // ������������
    var myPartMapEkb = new ymaps.Map("map-partners-ekb", {
            center: [56.831392207548,60.616552593254],
            zoom: 14
        }
    );
    myPartMapEkb.behaviors.disable('scrollZoom');
    myPartMapEkb.geoObjects
        .add(new ymaps.Placemark([56.831392207548,60.616552593254], {
                content: '���� ������ �� �������������',
                balloonContent: '<strong>��������:</strong> ���� ������ �� �������������<br/>'  + '<strong>�����:</strong> �. �������������, 620026, ������������, ��. ����������, �. 41 (������ ����), ����� � ����� ����������<br/>'  + '<strong>�������:</strong>  +7 (343) 287-01-61 (��������������)<br><strong>����:</strong>  +7 (343) 355-61-63<br>'  + '<strong>������ ������:</strong> ��-�� 09:00 - 18:00, �� 10:00 - 17:00,  �� ��������<br/>'  + '<strong>Email:</strong> <a href="mailto:elevel@elevel-ekt.ru">elevel@elevel-ekt.ru</a><br/><a class="print" href="print.html"><img width="14" height="14" src="images/printer.svg" alt=""/></a>'
            },
            {
                iconLayout: 'default#image',
                iconImageHref: 'images/placeholder-orange.svg',
                iconImageSize: [21, 29],
                iconImageOffset: [-10, -15],
                iconCaptionMaxWidth: '50'
            }))
    }
}*/


function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}
$(document).ready(function(){
	//window.hashName = window.location.hash;
	//window.location.hash = '';

	$(".availability-link a").click(function (e) {
		e.preventDefault();
		
		$("a[href=#availability]").click();
		$('html, body').animate({scrollTop: $("#availability").offset().top}, 2000);
		return false;
	});
	$(".availability-link").click(function (e) {
		e.preventDefault();

		$("a[href=#availability]").click();
		$('html, body').animate({scrollTop: $("#availability").offset().top}, 2000);
		return false;
	});
	$(".jce-mainAttributes-toAll .jce-link").click(function (e) {
		e.preventDefault();

		$("a[href=#product-tab1]").click();
		$('html, body').animate({scrollTop: $("#product-tab1").offset().top}, 2000);
		return false;
	});
	
	if (window.location.hash == "#availability")
	{		
		$(window).load(function () {
			$("a[href=" + window.location.hash + "]").click();
			$('html, body').animate({scrollTop: $(window.location.hash).offset().top}, 2000);
			return false;
		});
	}
	if (window.innerWidth < 1101) {
		const info = document.getElementById("jce-info-movable");
		const submit = document.getElementById("jce-single-submit");

		submit.after(info);
	}
	
	$('#credit-button').on('click',function() {
		$('#credit-flag').val('Y');
	});
	$('#buy-one-click-butto').on('click',function() {
		$('#credit-flag').val('N');
	});

	$(".spinner").on("spinstop", function(){
		
		var price = parseFloat($("#price").text().replace(/\s/g, '')).toFixed(2);
		var strPrice = (price * $(this).spinner('value')).toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.');
		
		$(".lower.total").text(strPrice + " руб.");

		$("#itemQuantity_0").val($(this).spinner('value'));
    $("#credit-sum").val((price * $(this).spinner('value')).toFixed(2));
    /*if ((price * $(this).spinner('value')) >= 3000)
    	$('#credit-button').removeClass('hide');
    else
      $('#credit-button').addClass('hide');*/
	});
	
	// выводим нужные магазины
	var selectedCity = window.BXmakerGeoIPCity.getCity();
	
	if (selectedCity == "Москва")	var selectedCities = $('.store_info[data-city="' + selectedCity + '"],.store_info[data-address ^= "Московская область"]');
	else 							var selectedCities = $('.store_info[data-city="' + selectedCity + '"]');
	 
	if(selectedCities.length > 0)
	{
		selectedCities.show();
		var cities = selectedCities;
		//$('.stock-shops-number').html(cities.length);
	}
	else
	{
		$('.store_info[data-city="Москва"]').show();
		var cities = $('.store_info[data-city="Москва"]');
		//$('.stock-shops-number').html(cities.length);
	}
	
	if( $('#map').length ){
        var myMap;
		console.log("map init");
        ymaps.ready(init);
    }
	
	// map

	function init() {
		
		console.log("map init2");
		
		var objectsCoords = [];
		
		$( cities ).each(function( index ) {
			objectsCoords[ objectsCoords.length ] = [ $( this ).attr('data-gps_n'), $( this ).attr('data-gps_s') ];
		});
		
		// Инициализация карты по известной области просмотра
		if (objectsCoords.length > 1)
		{
			var minLat, maxLat, minLong, maxLong;
			minLat = maxLat = objectsCoords[0][0];
			minLong = maxLong = objectsCoords[0][1];

			for (var i = 1, l = objectsCoords.length; i < l; i++) {
				minLat = Math.min(minLat, objectsCoords[i][0]);
				maxLat = Math.max(maxLat, objectsCoords[i][0]);
				minLong = Math.min(minLong, objectsCoords[i][1]);
				maxLong = Math.max(maxLong, objectsCoords[i][1]);
			}
			
			var container = $('#map'),
			myMap = new ymaps.Map(
				container.get(0),
				ymaps.util.bounds.getCenterAndZoom(
					[[maxLat, minLong], [minLat, maxLong]],
					[container.width(), container.height()]
			));
		}
		else
		{
			var myMap = new ymaps.Map("map", {
					center: [objectsCoords[0][0], objectsCoords[0][1]],
					zoom: 15
				}
			);
		}
		
		
		
		myMap.behaviors.disable('scrollZoom');
		
		$( cities ).each(function( index ) {
			myMap.geoObjects.add(new ymaps.Placemark([$( this ).attr('data-gps_n'), $( this ).attr('data-gps_s')], {
				balloonContent: $( this ).attr('data-address'),
				iconCaption: $( this ).attr('data-title')
			}, {
				preset: 'islands#redCircleDotIconWithCaption',
				iconCaptionMaxWidth: '50'
			}));
		});
	}
	
	// положить в корзину
	$(".add2basket").click(function () {
		
		_this = $(this);
		if (!_this.hasClass("disabled"))
		{
			if (_this.hasClass("quantity_one"))
				var quantity = 1;
			else
				var quantity = $(".spinner").spinner('value');
			var product_id = $("#product_top").attr('data-product_id');
			
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
				
				$("#modal" + product_id).addClass('show');
				$(".add2basket .button-title").html('В корзине');			
			});

			function onAjaxSuccess(data)
			{
				if (!!data) // получили json данные
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
/*
            // Yandex.Ecommerce
            dataLayerYa.push({
              "ecommerce": {
                "add": {
                  "products": [
                    {
                      "id": window.productInfo['ID'],
                      "name": window.productInfo['NAME'],
                      "price": window.productInfo['PRICE'],
                      "quantity": quantity
                    }
                  ]
                }
              }
            });
            // /Yandex.Ecommerce
		*/	
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
			}
		}
		
		return false;
	});
	
	
	$( '#buy-one-click button' ).click(
		function ()
		{
			var name = $( '#buy-one-click input[name="name"]' ).val();
			var phone = $( '#buy-one-click input[name="phone"]' ).val();
			var email = $( '#buy-one-click input[name="email"]' ).val();
			var credit = $( '#buy-one-click input[name="credit"]' ).val();
			var comment = $( '#buy-one-click textarea' ).val();
			var itemId = $( '#buy-one-click input[name="item-id"]' ).val();
			var captcha_word = $( '#buy-one-click input[name="captcha_word"]' ).val();
			var captcha_sid = $( '#buy-one-click input[name="captcha_sid"]' ).val();
			var g_recaptcha_response = $( '#buy-one-click [name="g-recaptcha-response"]' ).val();
			var buyOneClickButton = $(this);
			
			var error = false;
			var errorText = '';
			
			
			
			if ( !name )
			{
				error = true;
				errorText += 'Необходимо указать имя.<br />';
			}
			
			if ( !phone )
			{
				error = true;
				errorText += 'Необходимо указать телефон.<br />';
			}
			
			if ( !email )
			{
				error = true;
				errorText += 'Необходимо указать email.<br />';
			}
			else if ( !isEmail( email ) )
			{
				error = true;
				errorText += 'Неверный формат email.<br />';
			}
			
			
			if ( error )
			{
				$( '#buy-one-click .error-holder' ).html( errorText );
				$( '#buy-one-click .error-holder' ).show();
			}
			else
			{
				buyOneClickButton.addClass('loading');
				// $( '#buy-one-click .error-holder' ).hide();
				// $( '#buy-one-click' ).html( 'Спасибо, Ваш заказ принят! В ближайшее время с вами свяжется наш менеджер.' );
				//alert("post");
				// $.post(
					// '/ajax/one_click_buy.php',
					// {
						// ITEM_ID: itemId,
						// NAME: name,
						// PHONE: phone,
						// EMAIL: email,
						// COMMENT: comment
					// },
					// function(data)
					// {
						// //alert(data);
						// setTimeout(eval(data), 3000)
						// //console.log(data);
					// }
				// );
				
				// _data = "ITEM_ID=
				
				$.ajax({
					type: "POST",
					url: '/ajax/one_click_buy.php',
					data: {
						ITEM_ID: itemId,
						NAME: name,
						PHONE: phone,
						EMAIL: email,
						COMMENT: comment,
						CREDIT: credit,
						captcha_word: captcha_word,
						captcha_sid: captcha_sid,
						"g-recaptcha-response": g_recaptcha_response
					},
					// dataType: 'html',
					success: function(data){
						//alert(data);
						setTimeout(eval(data), 3000)
						//console.log(data);
					},
					complete: function(jqXHR, textStatus){
						buyOneClickButton.removeClass('loading');
						
						// обновляем картинку капчи
						$.getJSON('/ajax/reload_captcha.php', function(data) {
							$('.one_click_buy_captcha img').attr('src','/bitrix/tools/captcha.php?captcha_sid='+data);
							$('.one_click_buy_captcha input[name=captcha_sid]').val(data);
						});
						
						Recaptchafree.reset(); // сброс рекапчи, для повторного ввода
					},
					
					
				});
				
				
			}
		}
	);


	let sliderNav = $(".product-slider--nav");
	let slider = $(".product-slider");
	if (slider.find(".slide").length == 1) {
		slider.children(":first").addClass("only-slide");
	}
	let height = $(".mainAttributes-section-merge__lm").css("height");
	$(".mainAttributes-section__left").css("height", height);
	$(".product-slider--nav .slide")[0].classList.add("active");
	$(".product-slider .slide")[0].classList.add("active");
	$(".product-slider--nav").on("click", ".slide:not(.active)", function(e) {
		$(this)
		  .addClass("active")
		  .siblings()
		  .removeClass("active")
		  .closest(".product-slider__wrapper")
		  .find(".product-slider .slide")
		  .removeClass("active")
		  .eq($(this).index())
		  .addClass("active");
	});
	/*$(".product-slider .slide").on('swipeleft',  function(){
		let next = $(this).next();
		if(next.length == 0){
			$(this).removeClass("active");
			$(".product-slider .slide")[0].classList.add("active");
		} else {
			$(this).removeClass("active");
			next.addClass("active");
		}

	});
	$(".product-slider .slide").on('swiperight',  function(){
		let prev = $(this).prev();
		if(prev.length == 0) {
			$(this).removeClass("active");
			let length = $(".product-slider .slide").length;
			$(".product-slider .slide")[length-1].classList.add("active");
		} else {
			$(this).removeClass("active");
			prev.addClass("active");
		}
	});*/


	var wrap = document.querySelector(".product-slider");
	/* вызов функции swipe с предварительными настройками*/
	swipe(wrap, { maxTime: 30000, minTime: 1, maxDist: 1500,  minDist: 1 });

	// обработка свайпов
	wrap.addEventListener("swipe", function(e) {
		if(e.detail.dir == "right") {
			let item = $(this).find(".slide.active");
			let prev = item.prev();
			if(prev.length == 0) {
				item.removeClass("active");
				let length = $(".product-slider .slide").length;
				$(".product-slider .slide")[length-1].classList.add("active");
			} else {
				item.removeClass("active");
				prev.addClass("active");
			}
		}
		if(e.detail.dir == "left") {
			let item = $(this).find(".slide.active");
			let next = item.next();
			if(next.length == 0){
				item.removeClass("active");
				$(".product-slider .slide")[0].classList.add("active");
			} else {
				item.removeClass("active");
				next.addClass("active");
			}
		}
	});


});


function isEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}



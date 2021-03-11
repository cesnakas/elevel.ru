BX.ajax.insertToNode = function(url, node)
{
	node = BX(node);
	if (!!node)
	{
		var eventArgs = { cancel: false };
		BX.onCustomEvent('onAjaxInsertToNode', [{ url: url, node: node, eventArgs: eventArgs }]);
		if(eventArgs.cancel === true)
		{
			return;
		}

		/*var show = null;
		if (!tempDefaultConfig.denyShowWait)
		{
			show = BX.showWait(node);
			delete tempDefaultConfig.denyShowWait;
		}*/

		//$('body .slider-single').slick('unslick').hide();
		$("#ajax_loading").show();
		
		return BX.ajax.get(url, function(data) {
			node.innerHTML = data;
			
			//$('body .slider-single').slick(window.slider_single_params).show();
			$("#ajax_loading").hide();
			
			$.getScript( "/local/templates/shop/js/jquery.main.ajax.js", function( data, textStatus, jqxhr ) {});
		});
	}
};

$(document).ready(function(){
	$(".spinner").on("spinstop", function(){		
		var id = $(this).attr('id');		
		var price = parseFloat($("#price" + id).text().replace(/\s/g, '')).toFixed(2);		
		$("#sum" + id).text("" + ((price * $(this).spinner('value')).toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.')));
	});
	
	// положить в корзину
	/*$(".add2basket").click(function () {
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
						<a title="Корзина" class="link-cart" href="/personal/basket.php">\
								Товаров (' + json.count + ')<br/>\
								' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + '\
						</a>\
					</div>');
					
					$("#bx_basket2").html('<div class="block-cart popup-active">\
						<a title="Корзина" class="open" href="/personal/basket.php">Корзина</a>\
					</div>');
					
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
		
		return false;
	});*/
});
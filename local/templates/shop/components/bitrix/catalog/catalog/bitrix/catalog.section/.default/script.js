$(document).ready(function(){
	$(".spinner").on("spinstop", function(){		
		var id = $(this).attr('id');		
		var price = parseFloat($("#price" + id).text().replace(/\s/g, '')).toFixed(2);		
		$("#sum" + id).text("" + ((price * $(this).spinner('value')).toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.')));
	});
	
	// �������� � �������
	$(".add2basket").click(function () {
		
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
				if (!!data) // �������� json ������
				{
					var json = $.parseJSON(data);
				
					if (json.count > 0)
					{
						$("#bx_basket1").html('<div class="block-cart full">\
							<a title="�������" class="link-cart" href="/personal/basket.php">\
									������� (' + json.count + ')<br/>\
									' + json.summ.toLocaleString('ru', { minimumFractionDigits: 2, maximumFractionDigits: 2} ).replace(',', '.') + ' ���.\
							</a>\
						</div>');
						
						$("#bx_basket2").html('<div class="block-cart popup-active">\
							<a title="�������" class="open" href="/personal/basket.php">�������</a>\
						</div>');
						
					}
					else
					{
						$("#bx_basket1").html('<div class="block-cart">\
							<a title="�������" class="link-cart" href="/personal/basket.php">\
									� ������� ��� �������\
							</a>\
						</div>');
						
						$("#bx_basket2").html('<div class="block-cart">\
							<a title="�������" class="open" href="/personal/basket.php">�������</a>\
						</div>');
					}
				}
			}
		}
		
		return false;
	});
});
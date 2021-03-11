$( document ).ready(
	function ()
	{
		$( 'a.add-to-basket-item' ).click(
			function ()
			{
				_this = $(this);
				if (!_this.hasClass("disabled"))
				{
					var product_id = _this.attr("data-id");
					var quantity = 1;
					
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
							
							window.location.reload();
						}
					}
				}
			}
		);
	}
);
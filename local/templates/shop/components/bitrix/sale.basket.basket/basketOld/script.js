$( document ).ready( function () {
	
	$( '.basket-quantity' ).click( function () {

			var input = $( this ).find( 'input.basket-item-quantity' );
			var basketId = input.data( 'id' );
			var quantity = input.val();
			var price = input.data( 'price' );
			
			updateItemQuantity( basketId, quantity, price, $( this ).parent().parent().find( 'span.sum' ) );
		
	} );
	
	
	$( '#clear-basket' ).click(
		function ()
		{
			// получаем актуальную корзину
			var actualBasketItems;
      $.post(
        '/ajax/get_basket.php',
        function (response)
        {
          actualBasketItems = response;
        }
      );

			$.post(
				'/ajax/clear_basket.php',
				function ()
				{
					// Yandex.Ecommerce
          dataLayerYa.push({
            "ecommerce": {
              "remove": {
                "products": actualBasketItems
              }
            }
          });
          // /Yandex.Ecommerce

					window.location.reload();
				}
			);
		}
	);
	
} );



function updateItemQuantity( basketId, quantity, price, sumElement )
{	
	sumElement.text( nf( quantity * price ) );
	$.post(
		'/ajax/update_basket_quantity.php',
		{
			BASKET_ID: basketId,
			QUANTITY: quantity,
			PRICE: price
		},
		function ( data )
		{
			//sumElement.text( data );
			
			updateTotalSum();
		}
	);
}



function updateTotalSum()
{
	var sum = 0;
	var discount = 0;
	var priceDiscount = 10000;	
	var new_discount = 0;
	
	var couponsActive = false, discountActive = false;
	
	$( '.basket-item-quantity' ).each(
		function ( index, element )
		{
			var quantity = $( element ).attr( 'aria-valuenow' );
			var price = $( element ).data( 'price' );
			var s = quantity * price;
			
			sum += s;
		}
	);
		
	$( '.basket-item-quantity' ).each(
		function ( index, element )
		{
			var quantity = $( element ).attr( 'aria-valuenow' );
			var coupon = $( element ).data( 'coupon' );
			
			if (coupon == 'true') couponsActive = true;
			
			var price = $( element ).data( 'price' );
			var s = quantity * price;
			
			// if (sum > priceDiscount)
			// {
				// $( element ).data( 'discount', price * 0.05 );
				// $( element ).parents('.tablet-block').find(".old_price").text(nf( price ));
				// $( element ).parents('.tablet-block').find(".current_price").text(nf( price * 0.95 ));
				// $( element ).parents('.tablet-block').find(".sum").text(nf( price * 0.95 * quantity ));
			// }
			// else
			// {
				$( element ).data( 'discount', 0 );
				$( element ).parents('.tablet-block').find(".old_price").text('');
				$( element ).parents('.tablet-block').find(".current_price").text(nf( price ));
				$( element ).parents('.tablet-block').find(".sum").text(nf( price * quantity ));
			// }
			
			var disc = $( element ).data( 'discount' );
			
			if (disc > 0) discountActive = true;
			
			new_discount += s;
			
			var d = quantity * disc;
			discount += d;
		}
	);
		

	
	//if( coupon == 'true' || (sum  > priceDiscount && coupon == 'false') )
	// if( sum  > priceDiscount && !couponsActive && !discountActive)
	// {
		// //sum *= 0.95;
		// discount += new_discount * 0.05;
	// }
	
	$( '#order-sum' ).text( nf( sum ) );
	$( '#order-discount' ).text( nf( discount ) );
	$( '#order-total' ).text( nf( sum - discount ) );
}

function enterCoupon()
{
	var newCoupon = $( '#coupon' ).val();
	if ( newCoupon )
	{
		$.post(
			'/ajax/set_coupon.php',
			{
				COUPON: newCoupon
			},
			function ( data )
			{
				window.location.reload();
			}
		);
	}
}


function nf( number )
{

	var i, j, kw, kd, km;


	i = parseInt(number = (+number || 0).toFixed( 2 )) + "";

	if( (j = i.length) > 3 ){
		j = j % 3;
	} else{
		j = 0;
	}

	km = (j ? i.substr(0, j) + ' ' : "");
	kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ' ');
	kd = '.' + Math.abs(number - i).toFixed( 2 ).replace(/-/, 0).slice(2);


	return km + kw + kd;
}
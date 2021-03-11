$( document ).ready(
	function ()
	{
		
		
		$( '.delivery-row .check-row' ).click(
			function ()
			{
				var input = $( this ).find( 'input' );
				var delivery_type = $( this ).find( 'label' ).attr('for');
				
				if (delivery_type == "delivery")
				{
					$('input[name=delivery_address]').attr("required", "required");
					$('input[name=delivery_address]').parent().addClass("required");
				}
				else
				{
					$('input[name=delivery_address]').removeAttr("required");
					$('input[name=delivery_address]').parent().removeClass("required");
				}
				
				setDeliveryPrice( input );
			}
		);
		
		
		
		$( '.cart-buttons .label-holder label, .cart-buttons .chk-area' ).click(
			function ()
			{
				changeSubmitActivity();
			}
		);
		
		
		$( 'input[name="inn"]' ).keyup(
			function ()
			{
				var query = $( this ).val();
				
				getDadata( query );
			}
		);
		
		
		$( '#dadata-suggestions' ).on(
			'click',
			'div',
			function ()
			{
				var _this = $( this );
				setDataFromDadata( _this );
			}
		);
		
		
		$('.ownership span').click(function(){
			if($(this).hasClass('entity-ip')){
				$('.not-for-ip').hide();
			}
			else{
				$('.not-for-ip').show();
			}
		});
		
	}
	
);



function setDeliveryPrice( input )
{
	var deliveryPrice = 0;
	
	
	var type = input.attr( 'id' );
	
	if ( type == 'delivery' && $( 'input[name="delivery_address"]:visible' ).length )
	{
		var sum = $( '.total-sum' ).data( 'sum' );
		
		if ( sum <= 10000 )
		{
			deliveryPrice = 300;
		}
	}
	
	$( '#total-delivery' ).text( deliveryPrice );
	
	
	showPayment( type );
	updateTotalPrice();
}



function updateTotalPrice()
{
	var deliveryPrice = parseInt( $( '#total-delivery' ).text() );
	var sum = parseFloat( $( '.total-sum' ).data( 'sum' ) );
	
	var totalSum = deliveryPrice + sum;
	$( '.total-sum span' ).text( nf( totalSum ) );
}



function showPayment( type )
{
	switch ( type )
	{
		case 'pickup':
			$( '.only-delivery-payment' ).hide();
			$( '.only-pickup-payment' ).show();
			break;
		
		case 'delivery':
			$( '.only-pickup-payment' ).hide();
			$( '.only-delivery-payment' ).show();
			break;		
	}
}



function changeSubmitActivity()
{
	setTimeout(
		function ()
		{
			if ( $( '#agree' ).prop( 'checked' ) == true )
			{
				$( '#order-submit' ).prop( 'disabled', false );
			}
			else
			{
				$( '#order-submit' ).prop( 'disabled', true );
			}
		},
		100
	);
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


function getDadata( query )
{
	if ( query.length >= 3 )
	{
		$.post(
			'/local/components/magnitmedia/order/dadata.php',
			{
				QUERY: query
			},
			function ( data )
			{
				if ( data.suggestions.length )
				{
					var html = '';
					
					for ( var i = 0; i < data.suggestions.length; i++ )
					{
						var item = data.suggestions[i];
						
						html += '<div data-inn="' + item.data.inn + '" data-kpp="' + item.data.kpp + '" data-legal_address="' + item.data.address.value + '"><b>' + item.value + '</b>' + item.data.inn + ' ' + item.data.address.value + '</div>';
					}
					
					$( '#dadata-suggestions' ).html( html );
					$( '#dadata-suggestions' ).show();
				}
				else
				{
					$( '#dadata-suggestions' ).hide();
				}
			},
			'json'
		);
	}
	else
	{
		$( '#dadata-suggestions' ).hide();
	}
}



function setDataFromDadata( divElement )
{
	$( 'input[name="inn"]' ).val( divElement.data( 'inn' ) );
	$( 'input[name="company_name"]' ).val( divElement.find( 'b' ).text() );
	$( 'input[name="kpp"]' ).val( divElement.data( 'kpp' ) );
	$( 'input[name="legal_address"]' ).val( divElement.data( 'legal_address' ) );
		
	$( '#dadata-suggestions' ).hide();
}
$( document ).ready(
	function ()
	{
		
		
		$( '.delivery-row .check-row' ).click(
			function ()
			{
				var input = $( this ).find( 'input' );
				var delivery_type = $( this ).find( 'label' ).attr('for');
				
				if (delivery_type == "delivery" || delivery_type == "tk-client")
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
				$( 'input[name="inn"]' ).attr( 'pattern', '[0-9]{12}' );
				$( 'input[name="kpp"]' ).attr( 'pattern', '[0-9]{9}' );
				$( '.entity-block' ).css( 'overflow', 'visible' );
				$( 'input[name="company_name"]' ).prop( 'required', true );
				$( 'input[name="company_name_without_opf"]' ).prop( 'required', true );
				$( 'input[name="company_opf"]' ).prop( 'required', true );
				$( 'input[name="company_name_short"]' ).prop( 'required', true );
			}
			else if($(this).hasClass('entity-row')){
				$('.not-for-ip').show();
				$( 'input[name="inn"]' ).attr( 'pattern', '[0-9]{10}' );
				$( 'input[name="kpp"]' ).attr( 'pattern', '[0-9]{9}' );
				$( '.entity-block' ).css( 'overflow', 'visible' );
				$( 'input[name="company_name"]' ).prop( 'required', true );
				$( 'input[name="company_name_without_opf"]' ).prop( 'required', true );
				$( 'input[name="company_opf"]' ).prop( 'required', true );
				$( 'input[name="company_name_short"]' ).prop( 'required', true );
			}
			else
			{
				$( 'input[name="inn"]' ).attr( 'pattern', '' );
				$( 'input[name="kpp"]' ).attr( 'pattern', '' );
				$( '.entity-block' ).css( 'overflow', 'hidden' );
				$( 'input[name="company_name"]' ).prop( 'required', אפהûף );
				$( 'input[name="company_name_without_opf"]' ).prop( 'required', false );
				$( 'input[name="company_opf"]' ).prop( 'required', false );
				$( 'input[name="company_name_short"]' ).prop( 'required', false );
			}
			
			$( '.rad-area' ).removeClass( 'rad-checked' );
			$( '.rad-area' ).addClass( 'rad-unchecked' );
			$( 'input[name="ownership"]' ).prop( 'checked', false );
			
			$( this ).find( '.rad-area' ).removeClass( 'rad-unchecked' );
			$( this ).find( '.rad-area' ).addClass( 'rad-checked' );
			$( this ).find( 'input[name="ownership"]' ).prop( 'checked', true );
		});
		
		
		$( 'html, body' ).click(
			function ()
			{
				$( '#dadata-suggestions' ).hide();
			}
		);
		
		
		
		$( '.open-close.comment-block button' ).click(
			function ()
			{
				$( this ).parent().find( '.slide-block' ).toggleClass( 'active' );
			}
		);
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
	if ( type == 'pickup' )
	{
		$( '.only-delivery-payment' ).hide();
		$( '.only-pickup-payment' ).show();
	}
	else
	{
		$( '.only-pickup-payment' ).hide();
		$( '.only-delivery-payment' ).show();
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
						
						var opf = '';
						if ( item.data.opf )
						{
							opf = item.data.opf.short;
						}
						
						var kpp = '';
						if ( item.data.kpp )
						{
							kpp = item.data.kpp;
						}
						
						html += '<div data-inn="' + item.data.inn + '" data-kpp="' + kpp + '" data-legal_address="' + item.data.address.value + '" data-name-without-opf="' + item.data.name.short + '" data-opf="' + opf + '" data-name-short=\'' + item.unrestricted_value + '\'><b>' + item.value + '</b>' + item.data.inn + ' ' + item.data.address.value + '</div>';
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
	
	var companyNameWithoutOpf = divElement.data( 'name-without-opf' );
	if ( !companyNameWithoutOpf )
	{
		companyNameWithoutOpf = divElement.find( 'b' ).text().substring( 3 );
	}
	$( 'input[name="company_name_without_opf"]' ).val( companyNameWithoutOpf );
	
	$( 'input[name="company_opf"]' ).val( divElement.data( 'opf' ) );
	$( 'input[name="company_name_short"]' ).val( divElement.data( 'name-short' ) );
		
	$( '#dadata-suggestions' ).hide();
}
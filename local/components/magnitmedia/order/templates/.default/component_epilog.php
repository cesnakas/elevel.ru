<style type="text/css">
.only-delivery-payment
{
	display: none;
}

#order-submit:disabled
{
	background-color: #ccc;
}

#dadata-suggestions
{
	display: none;
	border: 1px solid #ccc;
	position: absolute;
    z-index: 1;
    top: 68px;
    left: 0;
}

#dadata-suggestions > div
{
	display: block;
	cursor: pointer;
	background-color: #fff;
	border-bottom: 1px solid #ccc;
	padding: 4px 8px;
}

#dadata-suggestions > div:last-child
{
	border-bottom: none;
}

#dadata-suggestions > div:hover
{
	background-color: #eee;
}

#dadata-suggestions > div b
{
	display: block;
	font-weight: bold;
}

.selectric-wrapper.selectric-customOptions
{
	z-index: 2 !important;
}

.open-close.comment-block .slide-block
{
	height: 0;
	overflow: hidden;
	transition: height 0.5s;
}

.open-close.comment-block .slide-block.active
{
	height: 245px;
}

</style>
<?
$arCitySDEK = array();
$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$CityName = $obLocation->getCity();
$CityRegion = $obLocation->getRegion();	

if( $CityRegion == 'Московская область' && $CityName != 'Москва' ):
	
   $db_vars = CSaleLocation::GetList(
        array(
                "SORT" => "ASC",
                "COUNTRY_NAME_LANG" => "ASC",
                "CITY_NAME_LANG" => "ASC"
            ),
        array("LID" => LANGUAGE_ID, "REGION_NAME" => $CityRegion),
        false,
        false,
        array("CITY_NAME")
    );
   while ($vars = $db_vars->Fetch()):
	if( !empty( $vars['CITY_NAME'] ) )
		$arCitySDEK[] = $vars['CITY_NAME'];
		
   endwhile;
   
   //echo "<pre>";print_r($arCitySDEK);echo "</pre>";	
else:
	$arCitySDEK = array( $CityName );
endif;

?>
<div id='ipolsdek' class="lightbox-sdek" style='display:none;'>
<? /* $APPLICATION->IncludeComponent("ipol:ipol.sdekPickup", "custom", Array(
	//"COMPONENT_TEMPLATE" => ".default",
	"COMPONENT_TEMPLATE" => "custom",
		"NOMAPS" => "N",	// Не подключать Яндекс-карты (если их подключает что-то еще на странице)
		"CNT_DELIV" => "N",	// Расчитывать доставку при подключении
		"CNT_BASKET" => "N",	// Расчитывать доставку для корзины
		"FORBIDDEN" => "",	// Отключить расчет для профилей
		"COUNTRIES" => "",	// Подключенные страны
		"CITIES" => $arCitySDEK,
		/*"CITIES" => array(	// Подключаемые города (если не выбрано ни одного - подключаются все)
			0 => $arResult["CITY_NAME"],
		)*//*
	),
	false
);*/?>
</div>

<script type="text/javascript">
function IPOLSDEK_DeliveryChangeEvent(id) { //Р Р…Р В°Р В·Р Р†Р В°Р Р…Р С‘Р Вµ Р С—РЎР‚Р С‘Р Р…РЎвЂ Р С‘Р С—Р С‘Р В°Р В»РЎРЉР Р…Р С•
	$('#'+id).prop('checked', 'Y');
	submitForm();
}

	$( document ).ready(
		function ()
		{
			$("#order-submit").click(function(event){
				if ( $( '#order-submit' ).hasClass( 'disabled' ) )
				{
					event.preventDefault();
					$("label[for='agree']").css("border", "1px solid red");
					$("label[for='agree']").parents(".check-row").find(".chk-area").css("border", "1px solid red");
				}
			
				if( $('input[name=address_point]').attr("required") && !$('input[name=address_point]').val() )
				{				
					event.preventDefault();
					$( '#delivery-block .point-sdek' ).css('border', '1px solid red');
					$( '#cdek_delivery_point_button' ).css('color', 'red');
					
					$('html, body').animate({
						scrollTop: $("#delivery-block").offset().top
					}, 1000);
				}
			});

		const DELIVERY_PICKUP_POINT_BUROVAYA_20 = 30;
		$(document).on("change", "select[name=delivery_pickup_point]", function()
		{
			console.log($(this).val());
			if ($(this).val() == DELIVERY_PICKUP_POINT_BUROVAYA_20)
			{
				$("input[name=delivery_type]").not("[value=pickup]").parents(".col").hide();
				$("input[name=payment]").not("[value=cloudpayments]").parents(".col").hide();

				$("input#pickup").prop('checked', true);
				$("input#payment_card_cloudpayments").prop('checked', true);
				jcf.customForms.replaceAll();
			}
			else
			{
				$("input[name=delivery_type]").not("[value=pickup]").parents(".col").show();
				$("input[name=payment]").not("[value=cloudpayments]").parents(".col").show();
			}
		});
		
		$(document).on("change", "input[name=delivery_type]",
			function ()
			{
				
				var setDeliveryPriceTrig = true;
				var input = $( this );
				// var input = $( this ).find( 'input' );
				// var delivery_type = $( this ).find( 'label' ).attr('for');
				var delivery_type = input.attr('id');
				
				if (delivery_type == "courier_sdek" || delivery_type == "point_sdek")
				{
					$("input[name=delivery_company]").val("СДЭК");
				}
				else
				{
					$("input[name=delivery_company]").val("");
				}
				
				if (delivery_type == "courier_sdek")
				{
					$('input[name=address_sdek]').attr("required", "required");
					$('input[name=address_sdek]').parent().addClass("required");
					$( '.delivery-address' ).css( 'display', 'block' );					
				}
				else
				{
					$('input[name=address_sdek]').removeAttr("required");
					$('input[name=address_sdek]').parent().removeClass("required");
					$( '.delivery-address' ).css( 'display', 'none' );					
				}
				
				// show map button for sdek
				if (delivery_type == "point_sdek"){
					$("#cdek_delivery_point_button").show();
					$('input[name=address_point]').prop( 'required', true );
					$('input[name=address_point]').parent().addClass("required");
					
					IPOLSDEK_pvz.init();
				}
				else{
					$("#cdek_delivery_point_button").hide();
					$('input[name=address_point]').prop( 'required', false );
					$('input[name=address_point]').parent().removeClass("required");
					$( '#delivery-block .point-sdek' ).css('border', '');
				}
				
				// load courier delivery price
				// 14.11.2018, winchester7, временно отключаем расчет доставки СДЭКом
				/*
				if (delivery_type == "courier_sdek"){
					
					IPOLSDEK_pvz.loadCityCostCourier(input);
					setDeliveryPriceTrig = false;
				}
				*/
				
				// clear cdek description
				if($(".point_sdek").length > 0)
					$(".point_sdek").html("");
				
				
				// calculate delivery price
				var deliveryPrice = 0;

				var type = input.attr( 'id' );
				
				if ( delivery_type == "delivery" && $( 'input[name="delivery_address"]:visible' ).length )
				{
					var sum = $( '.total-sum' ).data( 'sum' );
					
					if ( sum <= 10000 )
					{
						deliveryPrice = 490;
					}
				}
				
				if ( delivery_type == "point_sdek" || delivery_type == "courier_sdek" )
				{
					var sum = $( '.total-sum' ).data( 'sum' );
					
					if ( sum <= 10000 )
					{
						deliveryPrice = 490;
					}
				}
				
				if(setDeliveryPriceTrig)
					setDeliveryPrice( input, deliveryPrice );
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
				$( 'input[name="inn"]' ).attr( 'pattern', '[0-9]{10}' );
				$( 'input[name="kpp"]' ).attr( 'pattern', '[0-9]{9}' );
				$( '.entity-block' ).css( 'overflow', 'visible' );
				$( '.beznal' ).css( 'display', 'block' );
				$( '.card' ).css( 'display', 'none' );
				$( '.cloud_payment' ).css( 'display', 'none' );
				$( 'input[name="company_name"]' ).prop( 'required', true );
				$( 'input[name="company_name_without_opf"]' ).prop( 'required', true );
				$( 'input[name="company_opf"]' ).prop( 'required', true );
				$( 'input[name="company_name_short"]' ).prop( 'required', true );
				$( 'input[name="inn"]' ).prop( 'required', true );
				
				$( 'input[name="legal_address"]' ).prop( 'required', true );
				$( 'input[name="kpp"]' ).prop( 'required', false );
				$("input[name=legal_address]").parents(".input-holder").addClass("required");
				$("input[name=kpp]").parents(".input-holder").removeClass("required");
			}
			else if($(this).hasClass('entity-row')){
				$('.not-for-ip').show();
				$( 'input[name="inn"]' ).attr( 'pattern', '[0-9]{10}' );
				$( 'input[name="kpp"]' ).attr( 'pattern', '[0-9]{9}' );
				$( '.entity-block' ).css( 'overflow', 'visible' );
				$( '.beznal' ).css( 'display', 'block' );
				$( '.card' ).css( 'display', 'none' );
				$( '.cloud_payment' ).css( 'display', 'none' );
				$( 'input[name="company_name"]' ).prop( 'required', true );
				$( 'input[name="company_name_without_opf"]' ).prop( 'required', true );
				$( 'input[name="company_opf"]' ).prop( 'required', true );
				$( 'input[name="company_name_short"]' ).prop( 'required', true );
				$( 'input[name="inn"]' ).prop( 'required', true );
				
				$( 'input[name="legal_address"]' ).prop( 'required', true );
				$( 'input[name="kpp"]' ).prop( 'required', true );
				$("input[name=legal_address]").parents(".input-holder").addClass("required");
				$("input[name=kpp]").parents(".input-holder").addClass("required");
			}
			else
			{
				$( 'input[name="inn"]' ).attr( 'pattern', '' );
				$( 'input[name="kpp"]' ).attr( 'pattern', '' );
				$( '.entity-block' ).css( 'overflow', 'hidden' );
				$( '.beznal' ).css( 'display', 'none' );
				$( '.card' ).css( 'display', 'block' );
				$( '.cloud_payment' ).css( 'display', 'block' );
				$( 'input[name="company_name"]' ).prop( 'required', false );
				$( 'input[name="company_name_without_opf"]' ).prop( 'required', false );
				$( 'input[name="company_opf"]' ).prop( 'required', false );
				$( 'input[name="company_name_short"]' ).prop( 'required', false );
				$( 'input[name="legal_address"]' ).prop( 'required', false );
				$( 'input[name="kpp"]' ).prop( 'required', false );
				$( 'input[name="inn"]' ).prop( 'required', false );
				
				$("input[name=legal_address]").parents(".input-holder").removeClass("required");
				$("input[name=kpp]").parents(".input-holder").removeClass("required");

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
		
		
		// show cdek delivery points button
		// $(document).on("change", "input[name=delivery_type]", function(){
			
			// if($(this).is('#point_sdek:checked'))
				// $("#cdek_delivery_point_button").show();
			// else
				// $("#cdek_delivery_point_button").hide();
			
			// if($(this).is('#courier_sdek:checked'))
				// IPOLSDEK_pvz.loadCityCostCourier();
				
			// // clear cdek
			// if($(".point_sdek").length > 0)
				// $(".point_sdek").html("");
		// });
	}
	
);



function setDeliveryPrice( input, deliveryPrice )
{
	
	if(input.is(":checked")){
		
		var type = input.attr( 'id' );
		var user_type = $('input[name="ownership"]:checked').val();
		
		// set delivery price
		$( '#total-delivery' ).text( deliveryPrice );
		$( 'input[name="total-delivery"]' ).val(parseFloat(deliveryPrice));

		showPayment( type );
		updateTotalPrice();
	}
}

function updateTotalPrice()
{
	var deliveryPrice = parseInt( $( '#total-delivery' ).text() );
	var sum = parseFloat( $( '.total-sum' ).data( 'sum' ) );

	var totalSum = deliveryPrice + sum;
	
	// $( '.total-sum span' ).text( nf( totalSum ) );
	$( '.total-sum span' ).text( totalSum.toFixed(2) );
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
				$( '#order-submit' ).removeClass( 'disabled' );
			}
			else
			{
				$( '#order-submit' ).addClass( 'disabled' );
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
</script>
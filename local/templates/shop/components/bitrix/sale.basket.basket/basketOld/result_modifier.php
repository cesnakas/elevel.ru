<?
$arItemsIds = Array();

if ( !empty( $arResult['ITEMS']['AnDelCanBuy'] ) )
{
	$arResult['PRICE_WITHOUT_DISCOUNT'] = $arResult['allSum'] + $arResult['DISCOUNT_PRICE_ALL'];	
	//pokroman: скидка 5% от 10000 руб
	// $priceDiscount = 10000;
	
	// if ( $arResult['allSum'] > $priceDiscount && empty($arResult['COUPON_LIST']) )
		// $arResult['DISCOUNT_PRICE_ALL'] = 0;
	
	foreach ( $arResult['ITEMS']['AnDelCanBuy'] as $key => $arBasketItem )
	{
		$arItemsIds[] = $arBasketItem['PRODUCT_ID'];
		// if ( $arResult['allSum'] > $priceDiscount && empty($arResult['COUPON_LIST']) ):
			// $arResult['ITEMS']['AnDelCanBuy'][$key]['DISCOUNT_PRICE'] = $arResult['ITEMS']['AnDelCanBuy'][$key]['BASE_PRICE'] * 0.05;
			// $arResult['DISCOUNT_PRICE_ALL'] += $arResult['ITEMS']['AnDelCanBuy'][$key]['DISCOUNT_PRICE'] * $arResult['ITEMS']['AnDelCanBuy'][$key]['QUANTITY'];
		// endif;
	}
}



$arProducersIds = Array();

if ( !empty( $arItemsIds ) && CModule::IncludeModule( 'iblock' ) )
{
	$arFilter = Array(
		'IBLOCK_ID' => 83,
		'ID' => $arItemsIds
	);
	$arSelect = Array(
		'ID',
		'PROPERTY_MARKING_PRODUCER',
		'PROPERTY_PRODUCER'
	);
	$dbItems = CIBlockElement::GetList( Array(), $arFilter, false, false, $arSelect );
	while ( $arItem = $dbItems->Fetch() )
	{
		$arResult['ITEMS_DATA'][$arItem['ID']] = Array(
			'ARTICLE' => $arItem['PROPERTY_MARKING_PRODUCER_VALUE'],
			'PRODUCER' => $arItem['PROPERTY_PRODUCER_VALUE']
		);
		
		$arProducersIds[] = $arItem['PROPERTY_PRODUCER_VALUE'];
	}
}



if ( !empty( $arProducersIds ) )
{
	$arFilter = Array(
		'IBLOCK_ID' => 84,
		'ID' => $arProducersIds
	);
	$arSelect = Array(
		'ID',
		'NAME',
		'CODE'
	);
	$dbProducers = CIBlockSection::GetList( Array(), $arFilter, false, $arSelect );
	while ( $arProducer = $dbProducers->Fetch() )
	{
		$arResult['BRANDS_DATA'][$arProducer['ID']] = Array(
			'NAME' => $arProducer['NAME'],
			'URL' => '/brands/' . $arProducer['CODE'] . '/'
		);
	}
}
?>
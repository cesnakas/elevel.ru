<?

$arItemsIds = Array();

$sale3 = 3000;
$sale7 = 7000;
$sale10 = 10000;
$sale15 = 15000;
$tempSale = unserialize($arResult['APPLIED_DISCOUNT_LIST'][0]['ACTIONS'])['CHILDREN'][0]['DATA']['Value'];
$couponSale = is_array($arResult['APPLIED_DISCOUNT_LIST'][0]['COUPON']);
//print_r($couponSale);
if ( !empty( $arResult['ITEMS']['AnDelCanBuy'] ) )
{
	$arResult['PRICE_WITHOUT_DISCOUNT'] = $arResult['allSum'] + $arResult['DISCOUNT_PRICE_ALL'];

	switch ($arResult['PRICE_WITHOUT_DISCOUNT']):
        case $arResult['PRICE_WITHOUT_DISCOUNT'] < $sale3:
            $arResult['ROOT']['TIMELINE'][3] = percent($arResult['PRICE_WITHOUT_DISCOUNT'],$sale3);
            $arResult['ROOT']['PRICE_FOR_DISCOUNT'] = $sale3 - $arResult['PRICE_WITHOUT_DISCOUNT'];
            $arResult['ROOT']['PERCENT'] = 3;
            if($tempSale < 3):
                //\Bitrix\Sale\DiscountCouponsManager::clear(true);
            endif;
            break;
        case $arResult['PRICE_WITHOUT_DISCOUNT'] < $sale7:
            $arResult['ROOT']['TIMELINE'][7] = percent($arResult['PRICE_WITHOUT_DISCOUNT']-$sale3,$sale7 - $sale3);
            $arResult['ROOT']['PRICE_FOR_DISCOUNT'] = $sale7 - $arResult['PRICE_WITHOUT_DISCOUNT'];
            $arResult['ROOT']['PERCENT'] = 7;
            if($tempSale < 7):
                //\Bitrix\Sale\DiscountCouponsManager::clear(true);
            endif;
            break;
        case $arResult['PRICE_WITHOUT_DISCOUNT'] < $sale10:
            $arResult['ROOT']['TIMELINE'][10] = percent($arResult['PRICE_WITHOUT_DISCOUNT']-$sale7, $sale10-$sale7);
            $arResult['ROOT']['PRICE_FOR_DISCOUNT'] = $sale10 - $arResult['PRICE_WITHOUT_DISCOUNT'];
            $arResult['ROOT']['PERCENT'] = 10;
            if($tempSale < 10):
                //\Bitrix\Sale\DiscountCouponsManager::clear(true);
            endif;
            break;
        case $arResult['PRICE_WITHOUT_DISCOUNT'] < $sale15:
            $arResult['ROOT']['TIMELINE'][15] = percent($arResult['PRICE_WITHOUT_DISCOUNT']-$sale10,$sale15-$sale10);
            $arResult['ROOT']['PRICE_FOR_DISCOUNT'] = $sale15 - $arResult['PRICE_WITHOUT_DISCOUNT'];
            $arResult['ROOT']['PERCENT'] = 15;
            if($tempSale < 15):
                //\Bitrix\Sale\DiscountCouponsManager::clear(true);
            endif;
            break;
    endswitch;

	foreach ( $arResult['ITEMS']['AnDelCanBuy'] as $key => $arBasketItem )
	{
		$arItemsIds[] = $arBasketItem['PRODUCT_ID'];
        $arResult['ROOT']['QUANTITY'] += $arBasketItem['QUANTITY'];
	}
}

function percent($new = 0, $old = 0){
    return round(($new*100)/$old);
};

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
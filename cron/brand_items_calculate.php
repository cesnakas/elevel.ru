<?
if(!$_SERVER["DOCUMENT_ROOT"])
	$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/..");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule( 'iblock' );

// get all brands
$arFilter = array(
	'IBLOCK_ID' => IBLOCK_BRAND_ID, 
);
$arSelect = array(
	"ID",
	"NAME",
	"UF_BRAND_PRODUCTS"
);
$rsBrands = CIBlockSection::GetList(array('LEFT_MARGIN' => 'ASC'), $arFilter, false, $arSelect);
while ($arBrands = $rsBrands->Fetch())
{
	$arBrands['PRODUCT_QUANTITY'] = 0; // default value of real quantity
	$arResult['BRANDS'][$arBrands['ID']] = $arBrands;
}

// get all catalog items
$arFilter = Array(
	'IBLOCK_ID' => CATALOG_ID,
	'ACTIVE' => 'Y',
	'!PROPERTY_PRODUCER' => false
);
$arSelect = Array(
	'ID',
	'PROPERTY_PRODUCER'
);
$dbItems = CIBlockElement::GetList( Array(), $arFilter, false, false, $arSelect );
while ( $arItem = $dbItems->Fetch() )
{
	// $arResult['ITEMS'][] = $arItem;
	
	// increment real product quantity
	if($arResult['BRANDS'][$arItem['PROPERTY_PRODUCER_VALUE']])
		$arResult['BRANDS'][$arItem['PROPERTY_PRODUCER_VALUE']]['PRODUCT_QUANTITY']++;
	
	// $arResult['ITEMS_COUNT'][$arItem['PROPERTY_PRODUCER_VALUE']]++;
}

$i = 0;
foreach($arResult['BRANDS'] as $arBrand){
	
	// update only brands with new value of products
	if($arBrand['PRODUCT_QUANTITY'] != intval($arBrand['UF_BRAND_PRODUCTS'])){
		
		$i += $arBrand['PRODUCT_QUANTITY'];
		$obBrand = new CIBlockSection;

		$arBrandFields = Array(
			"UF_BRAND_PRODUCTS" => $arBrand['PRODUCT_QUANTITY']
		);

		$obBrand->Update($arBrand["ID"], $arBrandFields); 
		
	}
}

?>
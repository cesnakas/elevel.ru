<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();


$showCount = 4;
if ( count( $arResult['ITEMS'] ) > $showCount )
{
	$arResult['ITEMS'] = array_slice( $arResult['ITEMS'], 0, $showCount );
}


if ( CModule::IncludeModule( 'catalog' ) )
{
	$arItemsIds = Array();
	foreach ( $arResult['ITEMS'] as $arItem )
	{
		$arItemsIds[] = $arItem['ID'];
	}
	
	if ( !empty( $arItemsIds ) )
	{
		$arFilter = Array(
			'PRODUCT_ID' => $arItemsIds,
			'>AMOUNT' => 0
		);
		$arSelect = Array(
			'PRODUCT_ID',
			'ID'
		);
		$dbStores = CCatalogStoreProduct::GetList( Array(), $arFilter, false, false, $arSelect );
		while ( $arStore = $dbStores->Fetch() )
		{
			$arItemStores[$arStore['PRODUCT_ID']]++;
		}
	}
	
	
	if ( !empty( $arItemStores ) )
	{
		foreach ( $arResult['ITEMS'] as &$arItem )
		{
			$arItem['STORES_COUNT'] = intval( $arItemStores[$arItem['ID']] );
		}
	}
}
?>
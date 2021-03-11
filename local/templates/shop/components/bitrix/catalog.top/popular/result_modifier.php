<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if ( CModule::IncludeModule( 'catalog' ) )
{
	$arItemsIds = Array();
	foreach ( $arResult['ITEMS'] as &$arItem )
	{
		$arItemsIds[] = $arItem['ID'];
		
		if ($arItem["PREVIEW_PICTURE"]["SRC"])
		{
			$arPhotoSmall = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>292, 'height'=>292), BX_RESIZE_IMAGE_PROPORTIONAL, Array("name" => "sharpen", "precision" => 0));
			$arItem["PICTURE"] = $arPhotoSmall["src"];
		}
		elseif ($arItem["DETAIL_PICTURE"]["SRC"])
		{
			$arPhotoSmall = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>292, 'height'=>292), BX_RESIZE_IMAGE_PROPORTIONAL, Array("name" => "sharpen", "precision" => 0));
			$arItem["PICTURE"] = $arPhotoSmall["src"];
		}
		else $arItem["PICTURE"] = SITE_TEMPLATE_PATH . "/images/no_photo.png";
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
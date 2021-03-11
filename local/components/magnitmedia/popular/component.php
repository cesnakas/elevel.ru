<?
//if ( $this->StartResultCache( 86400 ) )
//{
	CModule::IncludeModule( 'sale' );



	global $DB;



	$arOrdersIds = Array();

	$dbOrders = $DB->Query( 'SELECT ID FROM b_sale_order WHERE LID="s1"' );
	while ( $arOrder = $dbOrders->Fetch() )
	{
		$arOrdersIds[] = $arOrder['ID'];
	}	



	$arItemsBuyedQuantity = Array();

	if ( !empty( $arOrdersIds ) )
	{
		$dbBasketItems = $DB->Query( 'SELECT PRODUCT_ID,QUANTITY FROM b_sale_basket WHERE ORDER_ID IN (' . implode( ',', $arOrdersIds ) . ') AND LID="s1"' );
		while ( $arBasketItem = $dbBasketItems->Fetch() )
		{
			$arItemsBuyedQuantity[$arBasketItem['PRODUCT_ID']] += intval( $arBasketItem['QUANTITY'] );
		}
	}
	
	
	
	$arItemsIds= Array();
	
	if ( !empty( $arItemsBuyedQuantity ) )
	{
		arsort( $arItemsBuyedQuantity );
		
		$arItemsBuyedQuantity = array_slice( $arItemsBuyedQuantity, 0, 300, true );
		
		
		
		foreach ( $arItemsBuyedQuantity as $itemId => $quantity )
		{
			$arItemsIds[] = $itemId;
		}
	}
	
	
	
	$arItemsResultIds = Array();
	
	if ( !empty( $arItemsIds ) && CModule::IncludeModule( 'iblock' ) )
	{
		
		$arItemsFilter = Array(
			'IBLOCK_ID' => 83,
			'ACTIVE' => 'Y',
			'>CATALOG_QUANTITY' => 0,
			'ID' => $arItemsIds
		);
		$arItemsNav = Array(
			'nTopCount' => 4
		);
		$arItemsSelect = Array(
			'ID',
			'NAME',
			'DETAIL_PAGE_URL',
			'PREVIEW_PICTURE',
			'DETAIL_PICTURE',
			'PROPERTY_MARKING_PRODUCER',
			'CATALOG_GROUP_3'
		);
		$dbItems = CIBlockElement::GetList( Array(), $arItemsFilter, false, $arItemsNav, $arItemsSelect );
		while ( $arItem = $dbItems->GetNext() )
		{
			$picture = SITE_TEMPLATE_PATH . '/images/no_photo.png';
			
			$picId = false;
			if ( $arItem['PREVIEW_PICTURE'] )
			{
				$picId = $arItem['PREVIEW_PICTURE'];
			}
			elseif ( $arItem['DETAIL_PICTURE'] )
			{
				$picId = $arItem['DETAIL_PICTURE'];
			}
			
			if ( $picId )
			{
				$pic = CFile::ResizeImageGet( $picId, Array( 'width' => 300, 'height' => 300 ) );
				$picture = $pic['src'];
			}
			
			
			$arItemsBuyedQuantity[$arItem['ID']] = Array(
				'ID' => $arItem['ID'],
				'NAME' => $arItem['NAME'],
				'URL' => $arItem['DETAIL_PAGE_URL'],
				'ARTICLE' => $arItem['PROPERTY_MARKING_PRODUCER_VALUE'],
				'PRICE' => $arItem['CATALOG_PRICE_3'],
				'QUANTITY' => $arItem['CATALOG_QUANTITY'],
				'PICTURE' => $picture
			);
			
			
			$arItemsResultIds[] = $arItem['ID'];
		}
	}
	
	
	
	$arResult['ITEMS'] = Array();
	
	if ( !empty( $arItemsBuyedQuantity ) )
	{
		foreach ( $arItemsBuyedQuantity as $itemId => $arItem )
		{
			if ( $arItem['ID'] )
			{
				$arResult['ITEMS'][$itemId] = $arItem;
			}
		}
	}
	
	
	
	$arItemsStores = Array();
	
	if ( !empty( $arItemsResultIds ) && CModule::IncludeModule( 'catalog' ) )
	{
		$arFilter = Array(
			'PRODUCT_ID' => $arItemsResultIds
		);
		$arSelect = Array(
			'PRODUCT_ID'
		);
		$dbStores = CCatalogStoreProduct::GetList( Array(), $arFilter, false, false, $arSelect );
		while ( $arStore = $dbStores->Fetch() )
		{
			$arItemsStores[$arStore['PRODUCT_ID']]++;
		}
	}
	
	
	if ( !empty( $arItemsStores ) )
	{
		foreach ( $arItemsStores as $itemId => $storesCount )
		{
			$arResult['ITEMS'][$itemId]['STORES_COUNT'] = $storesCount;
		}
	}
	
	
	
	$this->IncludeComponentTemplate();
//}
?>
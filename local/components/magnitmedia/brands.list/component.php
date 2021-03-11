<?
if ( $this->StartResultCache( 86400 ) )
{
	CModule::IncludeModule( 'iblock' );
	
	
	$arBrandsOrder = Array(
		'SORT' => 'ASC',
		'NAME' => 'ASC'
	);
	$arBrandsFilter = Array(
		'IBLOCK_ID' => 84,
		'ACTIVE' => 'Y',
		'DEPTH_LEVEL' => 1,
		"UF_IS_HIDDEN" => "N"
	);
	$arBrandsSelect = Array(
		'ID',
		'CODE',
		'NAME',
		'PICTURE'
	);
	$dbBrands = CIBlockSection::GetList( $arBrandsOrder, $arBrandsFilter, false, $arBrandsSelect );
	while ( $arBrand = $dbBrands->Fetch() )
	{
		$pic['src'] = '';
		if ( $arBrand['PICTURE'] )
		{
			$pic = CFile::ResizeImageGet( $arBrand['PICTURE'], Array( 'width' => 305, 'height' => 138 ) );
		}
		
		$arResult['BRANDS'][$arBrand['ID']] = Array(
			'NAME' => $arBrand['NAME'],
			'URL' => '/brands/' . $arBrand['CODE'] . '/',
			'PICTURE' => $pic['src'],
			'ITEMS_COUNT' => 0
		);
		
		
		
		if ( !in_array( $arBrand['ID'], $arBrandsIds ) )
		{
			$arBrandsIds[] = $arBrand['ID'];
		}
	}
	
	
	
	if ( !empty( $arBrandsIds ) )
	{
		$arItemsFilter = Array(
			'IBLOCK_ID' => 83,
			'ACTIVE' => 'Y',
			'SECTION_GLOBAL_ACTIVE' => 'Y',
			'PROPERTY_PRODUCER' => $arBrandsIds
		);
		$arItemsSelect = Array(
			'ID',
			'PROPERTY_PRODUCER'
		);
		$dbItems = CIBlockElement::GetList( Array(), $arItemsFilter, false, false, $arItemsSelect );
		while ( $arItem = $dbItems->Fetch() )
		{
			$arResult['BRANDS'][$arItem['PROPERTY_PRODUCER_VALUE']]['ITEMS_COUNT']++;
		}
	}
	
	
	
	$this->IncludeComponentTemplate();
}
?>
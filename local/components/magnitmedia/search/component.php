<?
if(!defined('B_PROLOG_INCLUDED')||B_PROLOG_INCLUDED!==true)die();

if($arParams['QUERY'])
	$arParams['QUERY'] = urldecode($arParams['QUERY']);

$query = $arParams['QUERY'];
$section = $arParams['SECTION'];
$arItemId = $arParams['ITEM_ID'];

//if ( $this->StartResultCache( 86400 ) )
//{
	
	
$obCache = new CPHPCache; 

$life_time = 3600; 
$cache_id = md5(serialize($arParams)); 

if($obCache->InitCache($life_time, $cache_id, "/search_page")){
	$arResult = $obCache->GetVars();
}
elseif($obCache->StartDataCache()){
	
	if ( $query && CModule::IncludeModule( 'iblock' ) )
	{
		$arResult['ITEMS_IDS'] = Array();
		
		
		$arItemsOrder = Array(
			'SORT' => 'ASC',
			'NAME' => 'ASC'
		);
		$arItemsFilter = Array(
			'IBLOCK_ID' => 83,
			'ACTIVE' => 'Y',
			'SECTION_ACTIVE' => 'Y',
			'SECTION_GLOBAL_ACTIVE' => 'Y',
			Array(
				'LOGIC' => 'OR',
				Array(
					'NAME' => '%' . $query . '%'
				),
				Array(
					'PROPERTY_PRODUCER_S' => '%' . $query . '%'
				)
			)
		);
		
		// $arItemsFilter = Array(
			// 'IBLOCK_ID' => 83,
			// 'ACTIVE' => 'Y',
			// 'SECTION_ACTIVE' => 'Y',
			// 'SECTION_GLOBAL_ACTIVE' => 'Y',
		// );
		
		// if(!empty($arItemId))
			// $arItemsFilter['ID'] = $arItemId;
		// else
			// $arItemsFilter['NAME'] = '%' . $query . '%';
		
		if ( $section )
		{
			$arItemsFilter['SECTION_ID'] = $section;
			$arItemsFilter['INCLUDE_SUBSECTIONS'] = 'Y';
		}
		
		$arItemsSelect = Array(
			'ID',
			'IBLOCK_SECTION_ID',
			"IBLOCK_ID"
		);
		$dbItems = CIBlockElement::GetList( $arItemsOrder, $arItemsFilter, false, false, $arItemsSelect );
		while ( $arItem = $dbItems->Fetch() )
		{
			$arResult['ITEMS_IDS'][] = $arItem['ID'];
			
			$arSectionsCount[$arItem['IBLOCK_SECTION_ID']]++;
		}
	}
	
	
	
	$arSectionsOrder = Array(
		'ID' => 'ASC',
		'NAME' => 'ASC'
	);
	$arSectionsFilter = Array(
		'IBLOCK_ID' => 83,
		'ACTIVE' => 'Y',
		'GLOBAL_ACTIVE' => 'Y',
		'INCLUDE_SUBSECTIONS' => 'Y'
	);
	
	if ( $section )
	{
		$arSectionsFilter['SECTION_ID'] = $section;
	}
	
	$arSectionsSelect = Array(
		'ID',
		'IBLOCK_SECTION_ID',
		'DEPTH_LEVEL',
		'NAME'
	);
	$dbSections = CIBlockSection::GetList( $arSectionsOrder, $arSectionsFilter, false, $arSectionsSelect );
	while ( $arSection = $dbSections->Fetch() )
	{
		$arSectionsData[$arSection['ID']] = $arSection;
	}
	
	
	
	$arParentsCount = Array();
	foreach ( $arSectionsCount as $sectionId => $itemsCount )
	{
		if ( $arSectionsData[$sectionId]['DEPTH_LEVEL'] >= 2 && !$section )
		{
			$parentId = $arSectionsData[$sectionId]['IBLOCK_SECTION_ID'];

			$arParentsCount[$parentId] += $itemsCount;
			
			unset( $arSectionsCount[$sectionId] );
		}
	}
	
	
	
	foreach ( $arSectionsCount as $sectionId => $itemsCount )
	{
		$arResult['CATEGORIES'][] = Array(
			'ID' => $sectionId,
			'NAME' => $arSectionsData[$sectionId]['NAME'],
			'ITEMS_COUNT' => $itemsCount,
			'URL' => $APPLICATION->GetCurPageParam( 'section=' . $sectionId . '&q=' . $query, Array( 'section', 'q' ) )
		);
	}
	
	foreach ( $arParentsCount as $sectionId => $itemsCount )
	{
		$arResult['CATEGORIES'][] = Array(
			'ID' => $sectionId,
			'NAME' => $arSectionsData[$sectionId]['NAME'],
			'ITEMS_COUNT' => $itemsCount,
			'URL' => $APPLICATION->GetCurPageParam( 'section=' . $sectionId . '&q=' . $query, Array( 'section', 'q' ) )
		);
	}
	
	$obCache->EndDataCache($arResult); 
}
	
	
	$this->IncludeComponentTemplate();
//}
?>
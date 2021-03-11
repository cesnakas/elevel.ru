<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ( count($arResult["ITEMS"]) > 0){
	$cityId = intval($_GET["city"]);	
	
	$arOrder = array("SORT" => "ASC");
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'] , 'ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME' , 'SORT', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'UF_CITY_LAT', 'UF_CITY_LONG');
	$rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
	$arSections = array();	

	while ($arSect = $rsSect->GetNext())
	{
		$arSections[$arSect['ID']] = $arSect;		
		$arResult['CITY_NAME'][] = $arSect['NAME'];
	}
	foreach($arResult["ITEMS"] as $num => $arItem){
		$arSections[$arItem['IBLOCK_SECTION_ID']]["ELEM_ID"][] = $arItem['ID'];	
	}
	
	foreach($arSections as $num => $arSection){
		if($arSection['DEPTH_LEVEL'] > 1){
			if(array_key_exists($arSection['IBLOCK_SECTION_ID'], $arSections)){
				$arSections[$arSection['IBLOCK_SECTION_ID']]['SECTIONS'][] = $arSection;

				foreach($arSection['ELEM_ID'] as $elemId){
					if(!in_array($elemId, $arSections[$arSection['IBLOCK_SECTION_ID']]['ELEM_ID']))
						$arSections[$arSection['IBLOCK_SECTION_ID']]['ELEM_ID'][] = $elemId;
				}
			
			}
			
			unset($arSections[$num]);
		}
	}

	if (is_array($arSections) && !empty($arSections)){
		
		$active_city = false;
		
		foreach($arSections as $num => &$value){
			$count_items = count($value['ELEM_ID']);
			
			if ( $count_items > 0){
				$value['COUNT_ITEMS'] = $count_items;
				
				if (!$active_city)
				{
					$active_city = $value["ID"];
					$active_city_name = $value["NAME"];
				}
				elseif ($cityId && $value['ID'] == $cityId)
				{
					$active_city = $cityId;
					$active_city_name = $value["NAME"];
				}
				
				
			}
			else{
				unset($arSections[$num]);
				continue;
			}
		}
	}	

	$arResult["ADDRESSES"] = $arSections;
	$arResult['OFFICE_ACTIVE'] = $active_city;
	$arResult['OFFICE_ACTIVE_NAME'] = $active_city_name;
}

$arResult['TABS'] = array();
$sections = array();

foreach( $arResult['ADDRESSES'] as $key => $arItem ):
	foreach( $arItem['ELEM_ID'] as $item ):
		$sections[ $item ] = $key;
	endforeach;
	$arResult['SECTIONS'][] = $key;
	$arResult['COORDS'][ 'map-'.$key ][] = $arItem['UF_CITY_LAT'];
	$arResult['COORDS'][ 'map-'.$key ][] = $arItem['UF_CITY_LONG'];
	
endforeach;

foreach( $arResult['ITEMS'] as $arItem ):	
	$arResult['TABS'][ $sections[ $arItem['ID'] ] ]['ITEMS'][] = $arItem;

	$arResult['ITEMS_MAP'][ 'map-'.$sections[ $arItem['ID'] ] ][] = array(
		'ID'   => $arItem["ID"],
		'NAME'   => $arItem["NAME"],
		'ADDRESS'   => $arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"],
		'PHONES'   => $arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"],
		'EMAIL'   => $arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"],
		'TIMETABLE'   => $arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"],
		'COORDS'   => $arItem["PROPERTIES"]["YANDEX_MAP"]["VALUE"],
	);
endforeach;
uasort($arResult['ADDRESSES'], 'name_sort');
unset($arResult['ITEMS']);
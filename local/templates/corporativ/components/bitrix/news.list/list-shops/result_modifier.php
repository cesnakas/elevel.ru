<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ( count($arResult["ITEMS"]) > 0){
	$arOrder = array("SORT" => "ASC");
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'] , 'ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME' , 'SORT', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID');
	$rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
	$arSections = array();
	while ($arSect = $rsSect->GetNext())
	{
		$arSections[$arSect['ID']] = $arSect;
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
		
		foreach($arSections as $num => &$value){
			$count_items = count($value['ELEM_ID']);
			
			if ( $count_items > 0){
				$value['COUNT_ITEMS'] = $count_items;			
			}
			else{
				unset($arSections[$num]);
				continue;
			}
		}
	}	

	$arResult["ADDRESSES"] = $arSections;
}
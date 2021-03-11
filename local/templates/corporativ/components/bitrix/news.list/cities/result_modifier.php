<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ( count($arResult["ITEMS"]) > 0){
	//

	$arOrder = array("SORT" => "ASC");
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'] , 'ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME' , 'SORT', "DEPTH_LEVEL", "IBLOCK_SECTION_ID", "UF_WHERE", "UF_CITY_LAT", "UF_CITY_LONG");
	$rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
	$arSections = array();
	while ($arSect = $rsSect->GetNext())
	{
		
		$arSections[$arSect['ID']] = $arSect;
	}
	// echo "<pre>"; print_r($arSections); echo "</pre>";
	$arTmp = array();
	foreach($arResult["ITEMS"] as $num => $arItem){
		$arSections[$arItem['IBLOCK_SECTION_ID']]["ELEM_ID"][] = $arItem['ID'];
		$arTmp[$arItem['ID']] = $arItem;
	}
	$arResult["ITEMS"] = $arTmp;
	
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
			elseif($value['DEPTH_LEVEL']!=1){
				unset($arSections[$num]);
				continue;
			}
			if ($value['NAME'] == $arParams['CITY']){
				$value['CLASS'] = 'active';
				$active_city = $value['ID']; 
			}
		}
	}	


	$arResult["ADDRESSES"] = $arSections;
	$arResult['OFFICE_ACTIVE'] = $active_city;

	
	// get departments
	$arResult['DEPARTMENTS'] = array();
	
	$officesIBlockId = DEPARTMENTS_CONTACTS_IBLOCK_ID;
	if(intval($officesIBlockId) >0){
		
		$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_CITY", "PROPERTY_EMAIL", "PROPERTY_ICON");
		$arFilter = Array("IBLOCK_ID"=>$officesIBlockId, "ACTIVE"=>"Y");
		$rsElement = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($arElement = $rsElement->GetNext())
		{	
	
			if(intval($arElement['PROPERTY_CITY_VALUE']) > 0){
				
				$arResult['DEPARTMENTS'][$arElement['PROPERTY_CITY_VALUE']][] = array(
					"ID" => $arElement['ID'],
					"NAME" => $arElement['NAME'],
					"EMAIL" => $arElement['PROPERTY_EMAIL_VALUE'],
					"ICON" => ((intval($arElement['PROPERTY_ICON_VALUE'])>0)?CFile::GetPath($arElement['PROPERTY_ICON_VALUE']):""),
				);
			}
		}
	}
	
	$this->__component->SetResultCacheKeys(array("DEPARTMENTS"));
}
// echo "<pre>"; print_r($arResult['DEPARTMENTS']); echo "</pre>";
	
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ( count($arResult["ITEMS"]) > 0){
	//echo "<pre>"; print_r($arResult); echo "</pre>";

	$arOrder = array("SORT" => "ASC");
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'] , 'ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME' , 'SORT');
	$rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
	$arSections = array();
	while ($arSect = $rsSect->GetNext())
	{
		$arSections[$arSect['ID']] = $arSect;
	}
	foreach($arResult["ITEMS"] as $num => $arItem){
		$arSections[$arItem['IBLOCK_SECTION_ID']]["ELEM_ID"][] = $arItem['ID'];
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
			if ($value['NAME'] == $arParams['CITY']){
				$value['CLASS'] = 'active';
				$active_city = $value['ID']; 
			}
		}
	}	

	$arResult["ADDRESSES"] = $arSections;
	$arResult['OFFICE_ACTIVE'] = $active_city;
}
	
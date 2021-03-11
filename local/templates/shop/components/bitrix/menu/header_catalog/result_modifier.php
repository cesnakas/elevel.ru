<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");
// 
$arMenuType = array();
$rsProperty = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>ZERO_SECTION_IBLOCK_ID, "CODE"=>"MENU_TYPE"));
while($arProperty = $rsProperty->GetNext())
	$arMenuType[$arProperty['ID']] = $arProperty;


// Собираем инфу по табам
$arFilter = Array(
	"IBLOCK_ID" => ZERO_SECTION_IBLOCK_ID, // Разделы 0-го уровня
);

$section_first2section_zero = array();
$tabs_sections = array();
$producers_ids = array();

// Цикл по всем разделам нулевого уровня
$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "ID"=>"ASC"), $arFilter, Array("NAME", "CODE", "ID", "PROPERTY_SECTIONS_FIRST_LEVEL", "PROPERTY_PRODUCERS", "PROPERTY_MENU_TYPE"));
while($ar_fields = $res->GetNext())
{	
	
	if (!in_array($ar_fields["ID"], $section_first2section_zero[ $ar_fields["PROPERTY_SECTIONS_FIRST_LEVEL_VALUE"] ]))
		$section_first2section_zero[ $ar_fields["PROPERTY_SECTIONS_FIRST_LEVEL_VALUE"] ][] = $ar_fields["ID"];

	if (!in_array($ar_fields["PROPERTY_PRODUCERS_VALUE"], $producers_ids))
		$producers_ids[] = $ar_fields["PROPERTY_PRODUCERS_VALUE"];
	
	// создаем справочник разделов нулевого уровня
	if(!is_array($arResult['TABS'][$ar_fields["ID"]])){
		
		$arResult['TABS'][$ar_fields["ID"]] = array(
			"NAME" => $ar_fields["NAME"],
			"CODE" => $ar_fields["CODE"],
			"MENU_TYPE" => $arMenuType[$ar_fields["PROPERTY_MENU_TYPE_ENUM_ID"]]['XML_ID'],
		);
	}
	
	// Справочник производителей в разделах нулевых уровней
	if(!in_array($ar_fields["PROPERTY_PRODUCERS_VALUE"],$arResult['TABS'][$ar_fields["ID"]]['PRODUCERS']))
		$arResult['TABS'][$ar_fields["ID"]]['PRODUCERS'][] = $ar_fields["PROPERTY_PRODUCERS_VALUE"];
}

// Цикл по всем производителям
$arFilter = Array(
	"IBLOCK_ID" => IBLOCK_BRAND_ID, // EWay Производители
	"=DEPTH_LEVEL" => 1
);

$rsSect = CIBlockSection::GetList(array('SORT' => 'asc'), $arFilter, false, array("ID", "NAME", "PICTURE", "SECTION_PAGE_URL"));
while ($arSect = $rsSect->GetNext())
{
	if ($arSect["PICTURE"])
	{
		$arPhotoSmall = CFile::ResizeImageGet($arSect["PICTURE"], array('width'=>127, 'height'=>32), BX_RESIZE_IMAGE_PROPORTIONAL, Array("name" => "sharpen", "precision" => 0));
		$arSect["PICTURE"] = $arPhotoSmall["src"];
	}
	
	// Справочник производителей
	$arResult['PRODUCERS'][$arSect["ID"]] = $arSect;
	
}

// Если найдены производители, найдем все серии
if(!empty($producers_ids)){
	
	$arFilter = Array(
		"IBLOCK_ID" => IBLOCK_BRAND_ID, // EWay Производители
		"SECTION_ID" => $producers_ids,
	);
	
	// Цикл по всем сериям отобранных производителей
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "ID"=>"ASC"), $arFilter, false, false, Array("NAME", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
	while($serie_fields = $res->GetNext())
	{
		// Сохраняем максимум 5 серий каждого производителя
		if(count($arResult['PRODUCERS'][$serie_fields["IBLOCK_SECTION_ID"]]['SERIES']) <= 5){
			
			// Справочник серий в производителях
			if(!in_array($serie_fields['ID'],$arResult['PRODUCERS'][$serie_fields["IBLOCK_SECTION_ID"]]['SERIES']))
				$arResult['PRODUCERS'][$serie_fields["IBLOCK_SECTION_ID"]]['SERIES'][] = $serie_fields['ID'];
			
			// Справочник серий
			$arResult['SERIES'][$serie_fields['ID']] = $serie_fields;
		}
		
	}
}


// Проставляем разделы по табам
$prevTab = -1;

foreach($arResult as $arItem)
{
	if ($arItem["PARAMS"]["PICTURE"])
	{
		$arPhotoSmall = CFile::ResizeImageGet($arItem["PARAMS"]["PICTURE"], array('width'=>111, 'height'=>66), BX_RESIZE_IMAGE_PROPORTIONAL, Array("name" => "sharpen", "precision" => 0));
		$arItem["PARAMS"]["PICTURE"] = $arPhotoSmall["src"];
	}
	
	if ($arItem["DEPTH_LEVEL"] > 1)
	{
		foreach($prevTab as $tab)
			$tabs_sections[ $tab ][] = $arItem;
	}
	else
	{
		$tab_array = $section_first2section_zero[ $arItem["PARAMS"]["SECTION_ID"] ];
		
		foreach($tab_array as $tab)
			$tabs_sections[ $tab ][] = $arItem;
		
		$prevTab = $tab_array;
	}
}

$arResult["TABS_SECTIONS"] = $tabs_sections;
?>
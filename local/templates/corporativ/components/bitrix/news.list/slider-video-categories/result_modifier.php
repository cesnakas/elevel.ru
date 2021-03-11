<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["SECTIONS"] = array();

$arFilter = Array('IBLOCK_ID' => $arParams["IBLOCK_ID"], 'GLOBAL_ACTIVE' => 'Y', 'ACTIVE' => "Y");
$db_list = CIBlockSection::GetList(Array("name"=>"asc"), $arFilter, false, array("ID", "NAME", "SORT"));
while($ar_result = $db_list->GetNext())
{
	$arResult["SECTIONS"][ $ar_result['ID'] ]["NAME"] = $ar_result['NAME'];
	$arResult["SECTIONS"][ $ar_result['ID'] ]["SORT"] = $ar_result['SORT'];
}

foreach($arResult["ITEMS"] as &$arItem)
{
	// $arItem["DATE_CREATE"] = CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arItem["DATE_ACTIVE_TO"], CSite::GetDateFormat()));
	$arItem["DATE_CREATE"] = CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat()));
	
	$sectionId = $arItem["IBLOCK_SECTION_ID"];
	
	$arResult["SECTIONS"][$sectionId]["ITEMS"][] = $arItem;
}

usort($arResult["SECTIONS"], "sectionsSort");

function sectionsSort($a, $b)
{
    if ($a["SORT"] == $b["SORT"]) return 0;

    return ($a["SORT"] < $b["SORT"]) ? -1 : 1;
}
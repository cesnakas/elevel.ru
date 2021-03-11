<?php
$_SERVER["DOCUMENT_ROOT"] = realpath( __DIR__ . "/../");
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
set_time_limit(0);
CModule::IncludeModule('iblock'); 

$ibp = new CIBlockProperty;

$arFields = Array(
	"PROPERTY_TYPE" => "S"
);

$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE" => "Y", "IBLOCK_ID" => CATALOG_ID, "PROPERTY_TYPE" => "N"));
while ($arFieldsProp = $properties->GetNext())
{
	//echo "<pre>".print_r($arFieldsProp,true)."</pre>";
	if(!$ibp->Update($arFieldsProp["ID"], $arFields))
		echo "Ошибка. ID: " . $arFieldsProp["ID"] . ". " . $ibp->LAST_ERROR . "<br/>";
}

echo "Готово.";

$section_ids = array(0);
$arFilter = array('IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y');
$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter, false, array("ID"));
while ($arSect = $rsSect->GetNext())
{
   $section_ids[] = $arSect["ID"];
}

foreach($section_ids as $section_id)
{
	$IBLOCK_INFO = CIBlockSectionPropertyLink::GetArray(CATALOG_ID, $section_id);

	foreach($IBLOCK_INFO as $propertyID => $arLink)
	{
		if ($arLink["PROPERTY_TYPE"] == "S" && $arLink["DISPLAY_TYPE"] != "P" && $arLink["SMART_FILTER"] == "Y")
		{
			$arLink["DISPLAY_TYPE"] = "P";
			CIBlockSectionPropertyLink::Set($section_id, $propertyID, $arLink);
		}
	}
	
	unset($IBLOCK_INFO);
}
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$activeSectionID = false;

if (isset($arResult["SECTION"]))
{
	$activeSectionID = $arResult["SECTION"]["PATH"][0]["ID"];
}

if(CModule::IncludeModule("iblock"))
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	 
	$arSort = array(
		"SORT" => "ASC"
	);
	
	$arSelect = array("ID", "NAME", "PICTURE", "SECTION_PAGE_URL");
	
	$rsSections = CIBlockSection::GetList($arSort, $arFilter, false, $arSelect);
	$rsSections->SetUrlTemplates();
	while($arSection = $rsSections->GetNext())
	{
		if ($arSection["PICTURE"])
		{
			$file = CFile::ResizeImageGet($arSection["PICTURE"], array('width'=>25, 'height'=>39), BX_RESIZE_IMAGE_PROPORTIONAL);                
			$arResult["CSS"][] = ".list-categories-actions li a.section_id" . $arSection["ID"] . ":before {
									background-image: url(" . $file['src'] . ");
									-webkit-background-size: 25px 39px;
									background-size: 25px 39px;
								}";
		}
		
		if ($activeSectionID && $arSection["ID"] == $activeSectionID)
		{
			$arSection["CHECKED"] = "Y";
			$arResult["SECTION_CHECKED_NAME"] = $arSection["NAME"];
		}
		
		$arResult["SECTIONS"][] = $arSection;
	}
	
	$arResult["CSS"] = implode("\r\n", $arResult["CSS"]);
}

foreach($arResult["ITEMS"] as &$arItem)
{
	$arItem["DATES"] = "";
	
	if ($arItem["DATE_ACTIVE_FROM"] && $arItem["DATE_ACTIVE_TO"])
	{
		$arItem["DISPLAY_ACTIVE_FROM"] = CIBlockFormatProperties::DateFormat("j M", MakeTimeStamp($arItem["DATE_ACTIVE_FROM"], CSite::GetDateFormat()));
		$arItem["DISPLAY_ACTIVE_TO"] = CIBlockFormatProperties::DateFormat("j M Y", MakeTimeStamp($arItem["DATE_ACTIVE_TO"], CSite::GetDateFormat()));
		
		$arItem["DATES"] = "Действует: " . $arItem["DISPLAY_ACTIVE_FROM"] . " - " . $arItem["DISPLAY_ACTIVE_TO"];
	}
	elseif ($arItem["DATE_ACTIVE_FROM"])
	{
		$arItem["DATES"] = "Действует: с " . $arItem["DISPLAY_ACTIVE_FROM"];
	}
	elseif ($arItem["DATE_ACTIVE_TO"])
	{
		$arItem["DISPLAY_ACTIVE_TO"] = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($arItem["DATE_ACTIVE_TO"], CSite::GetDateFormat()));
		
		$arItem["DATES"] = "Действует: до " . $arItem["DISPLAY_ACTIVE_TO"];
	}
}


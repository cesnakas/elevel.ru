<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CModule::IncludeModule("iblock");

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

// resize photo
foreach($arResult["ITEMS"] as &$arItem){
	if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["DETAIL_PICTURE"]["SRC"]){
		
		$resizeType = BX_RESIZE_IMAGE_PROPORTIONAL;
		
		if($arItem["DETAIL_PICTURE"]['HEIGHT'] < 163){
			$resizeType = BX_RESIZE_IMAGE_EXACT;
		}
		
		
		$arFile = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>365, 'height'=>163), $resizeType, true); 
		$arItem["DETAIL_PICTURE"]["SRC"] = $arFile['src'];
	}
}
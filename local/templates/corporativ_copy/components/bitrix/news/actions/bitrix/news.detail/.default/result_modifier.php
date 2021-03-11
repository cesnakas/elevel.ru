<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arResult["DATES"] = "";
	
if ($arResult["DATE_ACTIVE_FROM"] && $arResult["DATE_ACTIVE_TO"])
{
	$arResult["DISPLAY_ACTIVE_FROM"] = CIBlockFormatProperties::DateFormat("j M", MakeTimeStamp($arResult["DATE_ACTIVE_FROM"], CSite::GetDateFormat()));
	$arResult["DISPLAY_ACTIVE_TO"] = CIBlockFormatProperties::DateFormat("j M Y", MakeTimeStamp($arResult["DATE_ACTIVE_TO"], CSite::GetDateFormat()));
	
	$arResult["DATES"] = "Действует: " . $arResult["DISPLAY_ACTIVE_FROM"] . " - " . $arResult["DISPLAY_ACTIVE_TO"];
}
elseif ($arResult["DATE_ACTIVE_FROM"])
{
	$arResult["DATES"] = "Действует: с " . $arResult["DISPLAY_ACTIVE_FROM"];
}
elseif ($arResult["DATE_ACTIVE_TO"])
{
	$arResult["DISPLAY_ACTIVE_TO"] = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($arResult["DATE_ACTIVE_TO"], CSite::GetDateFormat()));
	
	$arResult["DATES"] = "Действует: до " . $arResult["DISPLAY_ACTIVE_TO"];
}
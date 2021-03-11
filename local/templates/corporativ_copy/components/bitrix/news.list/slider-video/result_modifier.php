<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["YOUTUBE"] = false;

// если id конкретного видео есть в GET
if (isset($_GET["id"]) && intval($_GET["id"]))
{
	// если видео есть среди 10 последних, то берем ссылку оттуда без лишних запросов
	foreach($arResult["ITEMS"] as &$arItem)
	{
		if ($arItem['ID'] == intval($_GET["id"]))
		{
			$arResult["YOUTUBE"] = $arItem["PROPERTIES"]["URL"]["VALUE"];
		}
	}
	
	// если нет видео среди 10 последних, запрашиваем из БД
	if (!$arResult["YOUTUBE"])
	{
		$arFilter = Array(
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ACTIVE"=>"Y",
			"ID" => intval($_GET["id"])
		);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("PROPERTY_URL"));
		if($ar_fields = $res->GetNext())
			if ($ar_fields["PROPERTY_URL_VALUE"])
				$arResult["YOUTUBE"] = $ar_fields["PROPERTY_URL_VALUE"];
	}
}

// если нет конкретного id, берем ссылку из последнего добавленного видео
if (!$arResult["YOUTUBE"])
{
	$arItem = current($arResult["ITEMS"]);
	$arResult["YOUTUBE"] = $arItem["PROPERTIES"]["URL"]["VALUE"];
}

foreach($arResult["ITEMS"] as &$arItem)
{
	$arItem["DATE_CREATE"] = CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat()));
}
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager,
	Bitrix\Iblock;
	
if ($arParams["SHOW_CONTENT"] !== "Y") return;


if (!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 86400;
$arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]);

$curPage = $APPLICATION->GetCurPage(true);

if ($this->StartResultCache($arParams["CACHE_TIME"], array($arParams, $curPage)))
{
	if (!Loader::includeModule('iblock'))
	{
		$this->AbortResultCache();
		ShowError("Модуль iblock не установлен");
		return;
	}
	
	if (!isset($arParams["IBLOCK_ID"]) || $arParams["IBLOCK_ID"] <= 0)
	{
		$this->AbortResultCache();
		ShowError("Не выбран инфоблок контента");
		return;
	}

	$arResult = array();
	
	$arFilter = Array(
		"IBLOCK_ID" => IntVal($arParams["IBLOCK_ID"]), 
		"ACTIVE"=>"Y", 
		"NAME" => $curPage
	);
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("DETAIL_TEXT", "DETAIL_TEXT_TYPE"));
	
	if ($arElem = $res->GetNext())
	{
		$arResult["CONTENT"] = $arElem["DETAIL_TEXT"];
	}
	
	$this->IncludeComponentTemplate();
}
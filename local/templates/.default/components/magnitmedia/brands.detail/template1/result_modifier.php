<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

switch($arResult["PAGE"]) {
	case "SERIE":
		$itemsCount = $arResult['SERIES_ITEMS_NUM'];
		break;
	case "BRAND":
		$itemsCount = $arResult['BRAND']['ITEMS_COUNT_NUM'];
		break;
}

if ($itemsCount == 0) {
	\Bitrix\Iblock\Component\Tools::process404();
}


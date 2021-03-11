<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
foreach($arResult["ITEMS"] as $arItem)
	$arResult["LETTERS"][ $arItem['NAME'][0] ][] = $arItem; // группируем города по буквам
	
ksort($arResult["LETTERS"]);
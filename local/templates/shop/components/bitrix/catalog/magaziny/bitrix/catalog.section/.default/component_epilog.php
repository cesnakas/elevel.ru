<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;
global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}

if($arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]){
    $APPLICATION->SetPageProperty("title", $arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]);      
}


if($arResult["NAME"] != "Пушкино" && $arResult["NAME"] != "Щелково"){
    $url = 'http://export.yandex.ru/inflect.xml?name='.$arResult["NAME"];
    $sxml = simplexml_load_file($url); 
    $sxml_arr = (array)$sxml; 
    $section_pp = iconv("UTF-8",'Windows-1251', $sxml_arr["inflection"][5]); 
}
else{
    $section_pp = $arResult["NAME"];
} 
$APPLICATION->SetPageProperty("title", "Магазины «Эlevel» в ".$section_pp);
?>
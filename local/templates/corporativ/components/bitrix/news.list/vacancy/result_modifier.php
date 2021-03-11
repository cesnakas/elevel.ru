<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$CityName = $obLocation->getCity();
$city = intval($_GET["city"]);
$IdMoscow = false;

$arOrder = array("SORT" => "ASC");
$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'] , 'ACTIVE' => 'Y');
$arSelect = array('ID', 'NAME' , 'SORT');
$rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
$arSections = array();
while ($arSect = $rsSect->GetNext())
{
	if ($city == $arSect['ID']) $arSect["SELECTED"] = "Y";
	if ($arSect['NAME'] == 'Москва'):	
		$arSect["SELECTED"] = "Y";
		$IdMoscow = $arSect['ID'];
	endif;
	if ($CityName == $arSect['NAME']):
		$arSections[$IdMoscow]["SELECTED"] = "N";
		$arSect["SELECTED"] = "Y";
		$arResult['CITY_SELECT'] = $arSect['ID'];
	endif;
	
	$arSections[$arSect['ID']] = $arSect;
}
//echo $IdMoscow;
//echo "<pre>";print_r($arSections);echo "</pre>";
$arResult["CITIES"] = $arSections;
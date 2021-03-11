<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule("altasib.geoip");
$arData = ALX_GeoIP::GetGeoData($_SERVER["GEOIP_ADDR"]);
echo "<pre>";print_r($arData);echo "</pre>";  
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
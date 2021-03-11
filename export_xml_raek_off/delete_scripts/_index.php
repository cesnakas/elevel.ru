<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//ini_set('error_reporting', E_ALL);   
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
ini_set('memory_limit', "6070M");
set_time_limit(2400);  
  
global $arrFilter; $arrFilter = array("=ACTIVE" => "Y");
  $APPLICATION->IncludeComponent(
	"tezart:xml_export_raek", 
	"export_raek", 
	array(
		"IBLOCK_TYPE" => "Каталог товаров",
		"IBLOCK_ID_IN" => array(
			0 => "53",
		),
		"IBLOCK_ID_EX" => array(
			0 => "0",
		),
		"IBLOCK_SECTION" => array(
			0 => "45295"
            //0 => "0",
			/*1 => "45335",
			2 => "45336",
			3 => "45337",
			4 => "45338",
			5 => "45341",
			6 => "45342",
			7 => "45343",
			8 => "45344",
			9 => "45345",
			10 => "45346",*/ 
		//11 => "45347",
			/*12 => "45348",
			13 => "45349",
			14 => "45350",
			15 => "45351",
			16 => "45352",
			17 => "45353",
			18 => "45354",*/
		),
		"SITE" => "http://www.elevel.ru/",
		"COMPANY" => "ООО \"Эlevel\"",
		"FILTER_NAME" => "arrFilter",
		"MORE_PHOTO" => "MORE_PHOTO",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "86400",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
			0 => "Московский филиал",
		),
		"IBLOCK_ORDER" => "N",
		"CURRENCY" => "RUR",
		"LOCAL_DELIVERY_COST" => "250",
		"COMPONENT_TEMPLATE" => "export_raek",
		"IBLOCK_CATALOG" => "Y",
		"DO_NOT_INCLUDE_SUBSECTIONS" => "N",
		"IBLOCK_AS_CATEGORY" => "Y",
		"CACHE_NON_MANAGED" => "N",
		"SKU_NAME" => "PRODUCT_AND_SKU_NAME",
		"SKU_PROPERTY" => "PROPERTY_CML2_LINK",
		"NAME_PROP" => "0",
		"PARAMS" => "",
		"COND_PARAMS" => "",
		"DISCOUNTS" => "PRICE_ONLY",
		"DEVELOPER" => "",
		"COUNTRY" => "",
		"DEVELOPER_ALT" => "",
		"CURRENCIES_CONVERT" => "NOT_CONVERT",
		"DETAIL_TEXT_PRIORITET" => "N"
	),
	false
);   
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
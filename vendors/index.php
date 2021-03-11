<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Интернет-магазин");
$APPLICATION->AddChainItem('Каталог электротоваров','/vendors/');  
?>
<?
$exp = explode("/", $_SERVER["REQUEST_URI"]);
global $arrFilter;
$url = $exp[2];
if ($exp[3]) {
    $sect = $exp[3];
}
$sect = "";

$arFilter = array('IBLOCK_CODE' => "tz_vendors", 'CODE'=>$url);
$rsSections = CIBlockElement::GetList(false, $arFilter, false, array("CODE", "NAME"));
global $filter_brand;
while ($obj = $rsSections->Fetch()){
    $fil = $obj["NAME"];
    $filter_brand = strtolower($obj["NAME"]);
}
$arrFilter1 = array("IBLOCK_CODE" => "new_catalog", "PROPERTY_MANUFACTURER" => $fil, "ACTIVE" => "Y");
$arSelect = array("ID", "CODE", "IBLOCK_SECTION_ID");
$res1 = CIBlockElement::GetList(
        false,
        $arrFilter1,
        array("IBLOCK_SECTION_ID"),
        false,
        $arSelect);
$sect_counts = array();
while ($ob = $res1->Fetch()){
    $sections[] = $ob["IBLOCK_SECTION_ID"];
    $sect_counts[$ob["IBLOCK_SECTION_ID"]] = $ob["CNT"];
}
//echo '<pre>'; print_r($sections); echo '</pre>';
//echo '<pre>'; print_r($sect_counts); echo '</pre>';
/*
$arSelect = Array("ID", "NAME", "CODE");

$arFilter = Array("IBLOCK_ID"=>48, "ACTIVE" => "Y", "ID"=> $sections);
$res3 = CIBlockSection::GetList(Array(), $arFilter, false, $arSelect);
while ($ob = $res3->Fetch()){
    //$arResult["SECTION_LIST"][] = $ob;
    $sect_fil[] = $ob["CODE"];
}
if (in_array($exp[3], $sect_fil)) {
    $sect_fil = $exp[3];
}*/
?>

    <?$APPLICATION->IncludeComponent("custom:vendor.section.list", "brand-left-menu", array(
        "IBLOCK_TYPE" => "Каталог товаров",
        "IBLOCK_ID" => getIBlockIDByCode("new_catalog"),
        "SECTION_ID" => $sections,
        "SECTION_CODE" => "",
        "COUNT_ELEMENTS" => $sect_counts,
        "TOP_DEPTH" => "4",
        "SECTION_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "SECTION_USER_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "SECTION_URL" => "/shop/#SECTION_CODE_PATH#/",
        "CACHE_TYPE" => "Y",
        "CACHE_TIME" => "36000",
        "CACHE_GROUPS" => "Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "FILTER_BRAND" => $url
        ),
        false
    );
    ?>

	<?
    if ($_GET["elem"] && intval($_GET["elem"]) <= 500) {
        $cnt = (int)$_GET["elem"];
    }
    else {
        $cnt = 30;
    }
    if ($_GET["filter"] == "cnt") {
        $quantity = 0;
    }

    else {
        $quantity = -1;
    }
    if ($_GET["order"]) {
        $sort = $_GET["order"];
    }
    if ($_GET["by"] == "price") {
        $by = "catalog_PRICE_3";
    } 
    elseif ($_GET["by"]) {
        $by = $_GET["by"];
    }

    $arrFilter = array("PROPERTY_MANUFACTURER" => $fil, /*"SECTION_CODE" => $sect_fil, */"!CATALOG_QUANTITY" => $quantity);   
    if ($_GET["filter_items"] == "new") {
        $arrFilter["PROPERTY_KATEGORIYA_3"] = array("N");
    }
    if ($_GET["filter_items"] == "discount") {
        $arrFilter[">PROPERTY_SPETS_SKIDKA"] = 0;
    }
                        
    $APPLICATION->SetPageProperty('title', $fil);
    $APPLICATION->SetTitle($fil);    
    $APPLICATION->IncludeComponent("bitrix:catalog.section", "vendors", array(
		"IBLOCK_TYPE" => "Каталог товаров",
		"IBLOCK_ID" => getIBlockIDByCode("new_catalog"),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"ELEMENT_SORT_FIELD" => $by,
		"ELEMENT_SORT_ORDER" => $sort,
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"PAGE_ELEMENT_COUNT" => $cnt,
		"LINE_ELEMENT_COUNT" => "3",

		"OFFERS_LIMIT" => "5",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "N",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
			0 => "Московский филиал",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
	//	"PAGER_TEMPLATE" => "wt_pages",
		"PAGER_TEMPLATE" => "modern",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
	    //"SECTION_LIST" => $arResult["SECTION_LIST"],
        "PROPERTY_CODE" => Array("CML2_ARTICLE", "ARTICLE", "PACKING", "POINT", "MORE_PHOTO", "PROPERTY_SPETS_SKIDKA", "PROPERTY_KATEGORIYA_3")
		),
		false
	);?> 
	</div>
	<?$APPLICATION->IncludeComponent(
	"bitrix:sale.viewed.product",
	    "",
	    Array(
	        "VIEWED_COUNT" => "999",
	        "VIEWED_NAME" => "Y",
	        "VIEWED_IMAGE" => "Y",
	        "VIEWED_PRICE" => "Y",
	        "VIEWED_CURRENCY" => "default",
	        "VIEWED_CANBUY" => "Y",
	        "VIEWED_CANBASKET" => "Y",
	        "VIEWED_IMG_HEIGHT" => "150",
	        "VIEWED_IMG_WIDTH" => "150",
	        "BASKET_URL" => "/personal/basket.php",
	        "ACTION_VARIABLE" => "action",
	        "PRODUCT_ID_VARIABLE" => "id",
	        "SET_TITLE" => "N"
	    )
	);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
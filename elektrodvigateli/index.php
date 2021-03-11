<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Защита и управление электродвигателем");
$APPLICATION->SetPageProperty("title", "Защита и управление электродвигателем");
$ids = file_get_contents("./id_list.csv");
$idsArr = array_merge(explode(";",$ids),array(""));


// echo "<pre>";
// print_r($idsArr);
// echo "</pre>";
global $arrFilter;
$arrFilter['ID'] = $idsArr;

?>

<?
// $APPLICATION->IncludeComponent(
	// "dev:catalog.smart.filter",
	// "dev",
	// array(
		// "IBLOCK_ID" => "83",
		// "IBLOCK_TYPE" => "1c_catalog",
		// "FILTER_NAME" => "arrFilter",
		// "PRICE_CODE" => array(
			// 0 => "Московский филиал",
		// ),
		// "CACHE_TYPE" => "A",
		// "CACHE_TIME" => "36000000",
		// "CACHE_GROUPS" => "Y",
		// "SAVE_IN_SESSION" => "N",
		// "FILTER_VIEW_MODE" => "VERTICAL",
		// "XML_EXPORT" => "Y",
		// "SECTION_TITLE" => "NAME",
		// "SECTION_DESCRIPTION" => "DESCRIPTION",
		// 'HIDE_NOT_AVAILABLE' => "L",
		// "TEMPLATE_THEME" => "blue",
		// 'CONVERT_CURRENCY' => "N",
		// "SEF_MODE" => "N",
		// /*"SEF_RULE" => "/elektrodvigateli/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/",*/
		// "SMART_FILTER_PATH" => "",
		// "PAGER_PARAMS_NAME" => "",
		// "INSTANT_RELOAD" => "Y",
		// "DISPLAY_ELEMENT_COUNT" => "N",
	// ),
	// $component,
	// array('HIDE_ICONS' => 'Y')
// );


$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"items_group", 
	array(
		"IBLOCK_ID" => "83",
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"INCLUDE_SUBSECTIONS" => "Y",
		"SHOW_ALL_WO_SECTION" => "Y",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"ELEMENT_SORT_FIELD" => "shows",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "shows",
		"ELEMENT_SORT_ORDER2" => "asc",
		"PAGE_ELEMENT_COUNT" => "18",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "5",
		"BACKGROUND_IMAGE" => "-",
		"SECTION_URL" => "",
		"DETAIL_URL" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"BROWSER_TITLE" => "-",
		"SET_META_KEYWORDS" => "Y",
		"META_KEYWORDS" => "-",
		"SET_META_DESCRIPTION" => "Y",
		"META_DESCRIPTION" => "-",
		"SET_LAST_MODIFIED" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRICE_CODE" => array(
			0 => "Московский филиал",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"DISPLAY_COMPARE" => "N",
		"PAGER_TEMPLATE" => "shop",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"COMPATIBLE_MODE" => "Y",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"COMPONENT_TEMPLATE" => "items_group"
	),
	false
);
?>

<style>
.catalog-items li .text-available {
    right: 120px !important;
}
</style>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
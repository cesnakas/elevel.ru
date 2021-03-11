<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurSection
 */

$APPLICATION->SetPageProperty("body_class", "catalog-page");

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y')
{
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else
{
	$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}

?>


<?
/*if ( !stripos( $APPLICATION->GetCurDir(), '/filter/' ) ):

	$APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
			"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);

endif;*/
//print_r();
$APPLICATION->IncludeComponent(
	"dev:catalog.smart.filter",
	"dev",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arCurSection['ID'],
		"SECTION_ID_FOR_LIST" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE_FOR_LIST" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL_FOR_LIST" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SAVE_IN_SESSION" => "N",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"XML_EXPORT" => "Y",
		"SECTION_TITLE" => "NAME",
		"SECTION_DESCRIPTION" => "DESCRIPTION",
		'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
		"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		"SEF_MODE" => $arParams["SEF_MODE"],
		"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
		//"SEF_RULE" => "",
		"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
		"DISPLAY_ELEMENT_COUNT" => "N",
	),
	$component,
	array('HIDE_ICONS' => 'Y')
);


//$ELEMENT_SORT_FIELD = "PROPERTY_FLAG_MAIN_QUANTITY";
//$ELEMENT_SORT_ORDER = "desc,nulls";

$ELEMENT_SORT_FIELD = "CATALOG_QUANTITY";
$ELEMENT_SORT_ORDER = "desc,nulls";
$ELEMENT_SORT_FIELD2 = "HAS_DETAIL_PICTURE";
$ELEMENT_SORT_ORDER2 = "desc,nulls";

$catalog_sort = "";
$catalog_order = "";

if(isset($_GET["sort"]) && $_GET["sort"])
{
	$catalog_sort = htmlspecialchars($_GET["sort"]);
	$_SESSION["catalog_sort"] = $catalog_sort;
}
elseif (isset($_SESSION["catalog_sort"])) $catalog_sort = $_SESSION["catalog_sort"];

if(isset($_GET["order"]) && $_GET["order"])
{
	$catalog_order = htmlspecialchars($_GET["order"]);
	$_SESSION["catalog_order"] = $catalog_order;
}
elseif (isset($_SESSION["catalog_order"])) $catalog_order = $_SESSION["catalog_order"];

if ($catalog_sort)
{
	if ($catalog_sort == "available")
	{
		//$ELEMENT_SORT_FIELD = "PROPERTY_FLAG_MAIN_QUANTITY";
		$ELEMENT_SORT_FIELD = "CATALOG_QUANTITY";
		$ELEMENT_SORT_FIELD2 = "SORT";
		$ELEMENT_SORT_ORDER2 = "asc";
	}
	elseif ($catalog_sort == "popular")
	{
		$ELEMENT_SORT_FIELD = "SHOW_COUNTER";
		$ELEMENT_SORT_FIELD2 = "SORT";
		$ELEMENT_SORT_ORDER2 = "asc";
	}
	elseif ($catalog_sort == "price")
	{
		$ELEMENT_SORT_FIELD = "CATALOG_PRICE_3";
		$ELEMENT_SORT_FIELD2 = "SORT";
		$ELEMENT_SORT_ORDER2 = "asc";
	}
	elseif ($catalog_sort == "alphabet")
	{
		$ELEMENT_SORT_FIELD = "NAME";
		$ELEMENT_SORT_FIELD2 = "SORT";
		$ELEMENT_SORT_ORDER2 = "asc";
	}
	
	$ELEMENT_SORT_ORDER = ($catalog_order == "asc" ? "asc" : "desc");
}

$PAGE_ELEMENT_COUNT = 30;

$array_counts = array(20, 30, 50);
if (isset($_GET["count"]) && in_array(intval($_GET["count"]), $array_counts))
{
	$PAGE_ELEMENT_COUNT = intval($_GET["count"]);
	$_SESSION["catalog_count"] = $PAGE_ELEMENT_COUNT;
}
elseif (isset($_SESSION["catalog_count"])) $PAGE_ELEMENT_COUNT = $_SESSION["catalog_count"];

$catalog_view = "items";
$array_views = array("items", "list");
if (isset($_GET["view"]) && in_array($_GET["view"], $array_views))
{
	$catalog_view = $_GET["view"];
	$_SESSION["catalog_view"] = $catalog_view;
}
elseif (isset($_SESSION["catalog_view"])) $catalog_view = $_SESSION["catalog_view"];

$CATALOG_AVAILABLE = "";
if (isset($_GET["available"]))
{
	$CATALOG_AVAILABLE = htmlspecialchars($_GET["available"]);
	$_SESSION["available"] = $CATALOG_AVAILABLE;
}
elseif (isset($_SESSION["available"])) $CATALOG_AVAILABLE = htmlspecialchars($_SESSION["available"]);


if ($CATALOG_AVAILABLE == "Y")
{

	global $arrFilter;
	$arrFilter[">CATALOG_QUANTITY"] = 0;

}

$catalogParams = array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"ELEMENT_SORT_FIELD" => $ELEMENT_SORT_FIELD,
	"ELEMENT_SORT_ORDER" => $ELEMENT_SORT_ORDER,
	"ELEMENT_SORT_FIELD2" => $ELEMENT_SORT_FIELD2,
	"ELEMENT_SORT_ORDER2" => $ELEMENT_SORT_ORDER2,
	"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
	"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
	"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
	"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
	"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
	"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
	"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
	"BASKET_URL" => $arParams["BASKET_URL"],
	"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
	"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
	"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
	"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
	"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
	"FILTER_NAME" => $arParams["FILTER_NAME"],
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_FILTER" => $arParams["CACHE_FILTER"],
	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	"SET_TITLE" => $arParams["SET_TITLE"],
	"MESSAGE_404" => $arParams["~MESSAGE_404"],
	"SET_STATUS_404" => $arParams["SET_STATUS_404"],
	"SHOW_404" => $arParams["SHOW_404"],
	"FILE_404" => $arParams["FILE_404"],
	"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
	"PAGE_ELEMENT_COUNT" => $PAGE_ELEMENT_COUNT,
	"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
	"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

	"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
	"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
	"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
	"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
	"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

	"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
	"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
	"PAGER_TITLE" => $arParams["PAGER_TITLE"],
	"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
	"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
	"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
	"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
	"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
	"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
	"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
	"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
	"LAZY_LOAD" => $arParams["LAZY_LOAD"],
	"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
	"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

	"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
	"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
	"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
	"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
	"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
	"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
	"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
	"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

	"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
	"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
	"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
	"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
	'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
	'CURRENCY_ID' => $arParams['CURRENCY_ID'],
	'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
	'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

	'LABEL_PROP' => $arParams['LABEL_PROP'],
	'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
	'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
	'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
	'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
	'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
	'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
	'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
	'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
	'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

	'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
	'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
	'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
	'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
	'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
	'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
	'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
	'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
	'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
	'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
	'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

	'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
	'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
	'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

	'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
	"ADD_SECTIONS_CHAIN" => "N",
	'ADD_TO_BASKET_ACTION' => $basketAction,
	'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
	'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
	'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
	'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
);

if ($arResult["VARIABLES"]["SECTION_ID"] === false)
{
	$catalogParams["SHOW_ALL_WO_SECTION"] = "Y"; // выводим фильтр для всех товаров
	unset($catalogParams["SECTION_ID"]);
	unset($catalogParams["SECTION_CODE"]);
}

$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	$catalog_view,
	$catalogParams,
	$component
);

?>
<div style="margin-top:20px;">
<?
$CUR = $APPLICATION->getCurDir();
$CUR = explode("filter",$CUR);
$CUR = $CUR[0];
$FCONTENT = str_replace("##URL##",$CUR,$GLOBALS['FILTER_HTML']);
?>
<?=$FCONTENT?>
</div>
<style>
.filter_html_wrapper{width:100%;}

.filter_html_url{display:inline-block; padding:10px; border:1px solid #fd7621;margin-right:15px;margin-bottom:15px;}
</style>
	<?global $arrFilter;
	$arrFilter = array("SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"]);
	?>
	
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.top",
		"popular",
		Array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "MORE_PHOTO",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"BASKET_URL" => "/personal/basket.php",
			"BRAND_PROPERTY" => "BRAND_REF",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
			"COMPARE_PATH" => "",
			"COMPATIBLE_MODE" => "N",
			"CONVERT_CURRENCY" => "N",
			"CURRENCY_ID" => "RUB",
			"DATA_LAYER_NAME" => "dataLayer",
			"DETAIL_URL" => "",
			"DISCOUNT_PERCENT_POSITION" => "bottom-right",
			"DISPLAY_COMPARE" => "N",
			"ELEMENT_COUNT" => "4",
			"ELEMENT_SORT_FIELD" => "property_SALES_AMOUNT",
			"ELEMENT_SORT_FIELD2" => "show_counter",
			"ELEMENT_SORT_ORDER" => "desc",
			"ELEMENT_SORT_ORDER2" => "desc",
			"ENLARGE_PRODUCT" => "STRICT",
			"FILTER_NAME" => "arrFilter",
			'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
			'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
			'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
			"ROTATE_TIMER" => "30",
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SEF_MODE" => $arParams["SEF_MODE"],
			"SEF_RULE" => "",
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
			'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
			'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
			'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
			"VIEW_MODE" => "SECTION"
		)
	);?>

	<?/*$APPLICATION->IncludeComponent(
		"magnitmedia:sale.bestsellers", 
		"popular-detail-card", 
		array(
			"COMPONENT_TEMPLATE" => ".default",
			"HIDE_NOT_AVAILABLE" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"PRODUCT_SUBSCRIPTION" => "N",
			"SHOW_NAME" => "Y",
			"SHOW_IMAGE" => "Y",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"PAGE_ELEMENT_COUNT" => "40",
			"LINE_ELEMENT_COUNT" => "40",
			"TEMPLATE_THEME" => "blue",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "86400",
			"BY" => "AMOUNT",
			"PERIOD" => "0",
			"FILTER" => array(
				0 => "N",
			),
			"DISPLAY_COMPARE" => "N",
			"SHOW_OLD_PRICE" => "N",
			"PRICE_CODE" => array(
				0 => "Московский филиал",
			),
			"SHOW_PRICE_COUNT" => "1",
			"PRICE_VAT_INCLUDE" => "Y",
			"CONVERT_CURRENCY" => "N",
			"BASKET_URL" => "/personal/basket.php",
			"ACTION_VARIABLE" => "action",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
			"SHOW_PRODUCTS_10" => "N",
			"SHOW_PRODUCTS_53" => "N",
			"SHOW_PRODUCTS_66" => "N",
			"SHOW_PRODUCTS_83" => "Y",
			"PROPERTY_CODE_83" => array(
				0 => "MARKING_PRODUCER",
			),
			"CART_PROPERTIES_83" => array(
				0 => "MARKING_PRODUCER",
			),
			"ADDITIONAL_PICT_PROP_83" => "GALLERY",
			"LABEL_PROP_83" => "-"
		),
		false
	);*/?>
	
	<section class="section-articles">
		<h2 class="headline-border">Вам может понадобиться, прочитайте</h2>
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "shop_articles",
			Array(
				"ACTIVE_DATE_FORMAT" => "j F Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "8640000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "NAME",
					1 => "PREVIEW_TEXT",
					2 => "DETAIL_PICTURE",
					3 => "DATE_CREATE",
					4 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "117",
				"IBLOCK_TYPE" => "vecancy",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "Y",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "4",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "999",
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
					2 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "ID",
				"SORT_BY2" => "ID",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "DESC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => ".default"
			),
			false
		);?>
	</section>


<? if ($isSidebar): ?>
	<div class="col-md-3 col-sm-4">
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => $arParams["SIDEBAR_PATH"],
				"AREA_FILE_RECURSIVE" => "N",
				"EDIT_MODE" => "html",
			),
			false,
			array('HIDE_ICONS' => 'Y')
		);
		?>
	</div>
<? endif ?>
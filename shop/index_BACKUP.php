<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, интернет-магазин, купить, цена, электрооборудование, низковольтное оборудование, электроустановочные изделия, кабель-проводниковая продукция, светотехника, розетки, выключатели, рамки, механизмы, лампы, светильники, кабель, провод, электрощиты, короба, кабель канал, стабилизаторы напряжения, трансформаторы, счетчики, электросчетчики, диммеры, таймеры, клеммы, узо, вру, eib, knx, компоненты, домофоны, промышленные разъемы, купить розетки, купить выключатели, купить кабель, купить домофон, купить звонок, купить электрощит, купить стабилизатор, купить трансформатор, купить кабель, абб, шнайдер электрик, легранд, анам, дкс, битичино, гира, мертен, лексел, abb, gira, legrand, anam, merten, lexel, elfo, elso, wago, bticino, schneider electric, dkc");
$APPLICATION->SetTitle("Интернет-магазин");
$APPLICATION->AddChainItem('Каталог электротоваров','/shop/');    

//Делаем редирект со старых урлов на новые
$APPLICATION->IncludeFile("/shop/redirects.php");
//Конец
global $arrFilter;
if(isset($_GET['by']) && isset($_GET['order'])){

	if((htmlspecialcharsEx($_GET['by'])=='price') || (htmlspecialcharsEx($_GET['by'])=='name'))
    {
		$use_sort_name_or_price = 1;
	}
    else
    {
		$use_sort_name_or_price = 0;
	}
    
    $field = htmlspecialcharsEx($_GET['by']);
    $order = htmlspecialcharsEx($_GET['order']);
    switch($field){
        case 'price': $arSorts["ELEMENT_SORT_FIELD"] = 'catalog_PRICE_3';$arSorts["ELEMENT_SORT_ORDER"] = 'asc';  break;
        case 'name': $arSorts["ELEMENT_SORT_FIELD"] = 'NAME';$arSorts["ELEMENT_SORT_ORDER"] = 'asc';  break;
        case 'popular': $arSorts["ELEMENT_SORT_FIELD"] = 'SHOW_COUNTER';$arSorts["ELEMENT_SORT_ORDER"] = 'desc'; break;
        //case 'popular': $_GET['order'] = 'desc'; break;
        default: $arSorts["ELEMENT_SORT_FIELD"] = 'popular';
    }
    switch($order)
    {
        case 'asc': $arSorts["ELEMENT_SORT_ORDER"] = 'asc'; break;
        case 'desc': $arSorts["ELEMENT_SORT_ORDER"] = 'desc'; break;
        default: $arSorts["ELEMENT_SORT_ORDER"] = 'asc'; 
    }    
}
else 
{
    $arSorts["ELEMENT_SORT_FIELD"] = "SHOWS";
    $arSorts["ELEMENT_SORT_ORDER"] = "DESC";
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"tezart_newlevel", 
	array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => CATALOG_ID,
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/shop/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Московский филиал",
		),
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "Московский филиал",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "3",
		"PAGE_ELEMENT_COUNT" => "21",
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => $arSorts["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arSorts["ELEMENT_SORT_ORDER"],
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "MARKING_PRODUCER",
			2 => "IMAGES",
			3 => "IMAGES",
			4 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "CML2_ARTICLE",
			2 => "ARTICLE",
			3 => "IMAGES",
			4 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"USE_STORE" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "modern",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"CURRENT_CITY" => $curr_city,
		"COMPONENT_TEMPLATE" => "tezart_newlevel",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"SHOW_DEACTIVATED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"STORES" => array(
			0 => "2",
			1 => "3",
			2 => "4",
			3 => "5",
			4 => "6",
			5 => "7",
			6 => "8",
			7 => "9",
			8 => "10",
			9 => "11",
			10 => "12",
			11 => "13",
			12 => "14",
			13 => "15",
			14 => "16",
		),
		"USE_MIN_AMOUNT" => "N",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FIELDS" => array(
			0 => "TITLE",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"STORE_PATH" => "/store/#store_id#",
		"MAIN_TITLE" => "Наличие на складах",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FILE_404" => "",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?>

<?$APPLICATION->IncludeComponent(
	"tezart:sale.viewed.product",
    "tezart_newlevel_viewed",
    array(
        "VIEWED_COUNT" => "20",
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
        "SET_TITLE" => "N",
        "CURRENT_CITY" => $curr_city
    )
);?>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

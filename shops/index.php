<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if($USER->IsAdmin()){
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, интернет-магазин, купить, цена, электрооборудование, низковольтное оборудование, электроустановочные изделия, кабель-проводниковая продукция, светотехника, розетки, выключатели, рамки, механизмы, лампы, светильники, кабель, провод, электрощиты, короба, кабель канал, стабилизаторы напряжения, трансформаторы, счетчики, электросчетчики, диммеры, таймеры, клеммы, узо, вру, eib, knx, компоненты, домофоны, промышленные разъемы, купить розетки, купить выключатели, купить кабель, купить домофон, купить звонок, купить электрощит, купить стабилизатор, купить трансформатор, купить кабель, абб, шнайдер электрик, легранд, анам, дкс, битичино, гира, мертен, лексел, abb, gira, legrand, anam, merten, lexel, elfo, elso, wago, bticino, schneider electric, dkc");
$APPLICATION->SetTitle("Интернет-магазин");
$APPLICATION->AddChainItem('Каталог электротоваров','/shop/');  
?>

<?//if($USER->IsAdmin()):?>
<?$page = $APPLICATION->GetCurPage();
$url = explode('/',$page);
$_SESSION["arrFilter"] = array();
$res_el = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("CODE"=>$url[count($url)-2], "IBLOCK_ID" => "62", "ACTIVE" => "Y"), false, false, Array('ID'));
if($ar_el_res = $res_el->GetNext()){
    if(isset($ar_el_res["ID"]) && !empty($ar_el_res["ID"])){
        $ELEMENT_ID = $ar_el_res["ID"];        
    }
}
foreach($url as $key=>$url_not_null){
    if($url_not_null == "index.php" || $url_not_null == ""){
        unset($url[$key]);
    }    
}
if($url[1] == 'shops' && empty($ELEMENT_ID)){
    
    //определяем в какой мы секции отрезая параметры фильтра
    $section = 1;
    $current_url = '/shops/';
    $i = 2;
    while($section == 1){
        $arFilter = array("CODE" => $url[$i], "IBLOCK_ID" => "62", "ACTIVE" => "Y");
        $arSelect = array('ID');
        $res = CIBlockSection::GetList(array(), $arFilter, false, false, $arSelect);
        if($ob = $res->GetNext())
        {
            $current_url .= $url[$i]."/";
            $this_section = $ob["ID"];
        }
        else{
            $first_filter_param = $i;
            $section = 0;
        }
        if(count($url) <= $i && $section !== 0){
            $section = 0;  
            $first_filter_param = 0;  
        }
        $i++;
    }
}
    if($first_filter_param == 0):
        $_SESSION["filter_cur_url"] = $current_url;
        $_SESSION["no_url_params"] = "Y";

        foreach($_GET as $key=>$arGet){               
            $pos = strrpos($key, "arrFilter");
            if($pos !== false){
                $_SESSION["no_url_params"] = "N";
            }    
        }        
        require_once($_SERVER["DOCUMENT_ROOT"]."/shops/shop_urlrewrite.php");?>
    <?
    else:
        $_SESSION["no_url_params"] = "N";
        require_once($_SERVER["DOCUMENT_ROOT"]."/shops/shop_urlrewrite.php");    
    endif?>
<?/*else:?>
    <? require_once($_SERVER["DOCUMENT_ROOT"]."/shop/shop_urlrewrite.php");?>
<?endif*/?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"tezart", 
	array(
		"IBLOCK_TYPE" => "Каталог товаров",
		"IBLOCK_ID" => "62",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/shops/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
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
		"ELEMENT_SORT_FIELD" => "name",
		"ELEMENT_SORT_ORDER" => "asc",
		"LIST_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
			2 => "POINT",
			3 => "KATEGORIYA_3",
			4 => "ARTICLE",
			5 => "PACKING",
			6 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
			2 => "ARTICLE",
			3 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"USE_STORE" => "N",
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
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);
?>

<?$APPLICATION->IncludeComponent(
"bitrix:sale.viewed.product",
    "",
    Array(
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
        "SET_TITLE" => "N"
    )
);?>
</div>
<?}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
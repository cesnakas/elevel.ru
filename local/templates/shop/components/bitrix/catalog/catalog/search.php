<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */


$arResult["VARIABLES"]["SECTION_ID"] = $_GET['section'];

if ( intval($arResult["VARIABLES"]["SECTION_ID"]) <= 0 )
{
    $arResult["VARIABLES"]["SECTION_ID"] = '';
}

$APPLICATION->SetPageProperty("body_class", "catalog-page");


if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
    $basketAction = (isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '');
}
else
{
    $basketAction = (isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '');
}


$temp_q = iconv("utf-8", "windows-1251", $_GET['q']);
if (substr_count($temp_q, "%") < 1 && preg_match("/[".chr(0x7F)."-".chr(0xff)."]+/",$temp_q))
{
    $temp_q_encoded = urlencode(urlencode($temp_q));

    if ($temp_q_encoded != $temp_q) LocalRedirect("/shop/search/?q=" . $temp_q_encoded);
}

$_REQUEST['q'] = urldecode($_REQUEST['q']);


$arElements = $APPLICATION->IncludeComponent(
    "magnitmedia:search.page",
    ".default",
    Array(
        "RESTART" => $arParams["SEARCH_RESTART"],
        "NO_WORD_LOGIC" => $arParams["SEARCH_NO_WORD_LOGIC"],
        "USE_LANGUAGE_GUESS" => $arParams["SEARCH_USE_LANGUAGE_GUESS"],
        "CHECK_DATES" => $arParams["SEARCH_CHECK_DATES"],
        "arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
        "arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"]),
        "USE_TITLE_RANK" => "N",
        "DEFAULT_SORT" => "rank",
        "FILTER_NAME" => "",
        "SHOW_WHERE" => "N",
        "arrWHERE" => array(),
        "SHOW_WHEN" => "N",
        "PAGE_RESULT_COUNT" => 50,
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
    ),
    $component,
    array('HIDE_ICONS' => 'Y')
);



if (!empty($arElements) && is_array($arElements))
{

    $ELEMENT_SORT_FIELD = "PROPERTY_FLAG_MAIN_QUANTITY";
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
        if ($catalog_sort == "popular")
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

    $catalog_view = "list";
    // $catalog_view = "items";
    // $array_views = array("items", "list");
    // if (isset($_GET["view"]) && in_array($_GET["view"], $array_views))
    // {
    // $catalog_view = $_GET["view"];
    // $_SESSION["catalog_view"] = $catalog_view;
    // }
    // elseif (isset($_SESSION["catalog_view"])) $catalog_view = $_SESSION["catalog_view"];

    global $searchFilter;
    $searchFilter = array(
        "=ID" => $arElements,
    );

    global $searchNavString;

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
        "FILTER_NAME" => "searchFilter",
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
        "DISPLAY_BOTTOM_PAGER" => 'N',
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
        // "SECTION_ID" => 46799,
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
        'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
        "NAV_STRING" => $searchNavString
    );

    if (intval($arResult["VARIABLES"]["SECTION_ID"]) <= 0)
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



}
else {
    if($_REQUEST['q']){
        //echo "К сожалению товаров, удовлетворяющих условию поиска, не найдено. Проверьте правильность запроса или введите другой запрос.";
        echo 'К сожалению товаров, удовлетворяющих условию поиска, не найдено. Попробуем воспользоватсья Яндекс.Поиском.';
    } elseif(!$_REQUEST['q'] && !$_REQUEST['text']) {
        echo "К сожалению товаров, удовлетворяющих условию поиска, не найдено. Проверьте правильность запроса или введите другой запрос.";
    }
    ?>
    <?
    $request = Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    $server = Bitrix\Main\Context::getCurrent()->getServer();
    $host = ($request->isHttps() ? 'https' : 'http') . '://' . $server->getServerName();
    ?>
    <div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'<?= $host?>/shop/search/index.php','arrow':false,'bg':'transparent','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск по elevel.ru','suggest':true,'target':'_self','tld':'ru','type':2,'usebigdictionary':true,'searchid':2320495,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'поиск по сайту','input_placeholderColor':'#000000','input_borderColor':'#7f9db9'}">

        <form id="ya-search" action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="windows-1251">
            <input type="hidden" name="searchid" value="2320495"/>
            <input type="hidden" name="l10n" value="ru"/>
            <input type="hidden" name="reqenc" value=""/>
            <input type="search" name="text" value=""/>
            <input type="submit" value="Найти"/>
        </form>

    </div>

    <div id="ya-site-results" onclick="return {'tld': 'ru','language': 'ru','encoding': '','htmlcss': '1.x','updatehash': true}"></div>
    <script type="text/javascript">
      (function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0];s.type='text/javascript';s.async=true;s.charset='windows-1251';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Results.init();})})(window,document,'yandex_site_callbacks');
    </script>

    <style type="text/css">
        .ya-page_js_yes .ya-site-form_inited_no {display: none;}
        .ya-site-form {display: none;}
    </style>
    <script type="text/javascript">
      (function(w,d,c){
        var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;
        if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';
        }
        s.type='text/javascript';
        s.async=true;s.charset='windows-1251';
        s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';
        h.parentNode.insertBefore(s,h);
        (w[c]||(w[c]=[])).push(function(){
          Ya.Site.Form.init();
        });
        (w[c]||(w[c]=[])).push(function(){

          var query = "<?=$_REQUEST['q'];?>";
          var yaSearchForm = $('#ya-search');


          if (query != '') {
            yaSearchForm.find('input[type="search"]').val(query);

            setTimeout(function() {
              var searchButton = $('.ya-site-form__submit');
              searchButton.click();
            }, 1000);
          }

        });
      })(window,document,'yandex_site_callbacks');
    </script>
    <script>

    </script>
    <?
}
?>
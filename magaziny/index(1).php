<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Page\Asset; 
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/magaziny.css"); 
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/magaziny.js"); 

$APPLICATION->SetPageProperty("title", "Предложение сотрудничества электромонтажнику, частному лицу от Эlevel");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, предложение сотрудничества электромонтажнику, частному лицу, адреса, телефоны, магазины, контакты, филиалы, точки розничной торговли, офисы продаж, шоу-румы, демзалы, демонстрационные залы");
$APPLICATION->SetPageProperty("keywords", "адреса, телефоны, магазины, контакты, филиалы, точки розничной торговли, офисы продаж, шоу-румы, демзалы, демонстрационные залы");
$APPLICATION->SetPageProperty("description", "Контакты офисов продаж, демонстрационных залов, шоу-румов, магазинов и точек розничной торговли, розничной сети Эlevel и филиалов");
$APPLICATION->SetTitle("Контактная информация о компании");     
?> <ul class="tabset tabset-shops">
    <li><a class="active" href="#shops">Магазины и офисы Эlevel</a></li>
    <li><a href="#partners">Магазины-партнеры</a></li>
</ul>
<div class="tabs-content">
    <div id="shops">
        <?
        global $arrFilterShops;
        $arrFilterShops['=ID'] = array (1404850, 1404857); 
        $APPLICATION->IncludeComponent(
            "bitrix:news.list", 
            "map-shops", 
            array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "vecancy",
                "IBLOCK_ID" => "60",
                "NEWS_COUNT" => "100",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "ID",
                "SORT_ORDER2" => "DESC",
                "FILTER_NAME" => "arrFilterShops",
                "FIELD_CODE" => array(
                    0 => "ID",
                    1 => "",
                ),
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "DESCRIPTION",
                    2 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "Y",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "Y",
                "PAGER_TEMPLATE" => "",
                "PAGER_DESC_NUMBERING" => "Y",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "Y",
                "PAGER_BASE_LINK_ENABLE" => "Y",
                "SET_STATUS_404" => "Y",
                "SHOW_404" => "Y",
                "MESSAGE_404" => "",
                "PAGER_BASE_LINK" => "",
                "PAGER_PARAMS_NAME" => "arrPager",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "CITY" => intval($_GET["city"]),
                "COMPONENT_TEMPLATE" => "map-shops",
                "STRICT_SECTION_CHECK" => "N",
                "FILE_404" => "",
                "PARAMETERS" => ""
            ),
            false
        );?>

    </div>
    <div id="partners">
        <?
        global $arrFilterPartners;
        $arrFilterPartners['!ID'] = $arrFilterShops['ID'];
        $APPLICATION->IncludeComponent(
            "bitrix:news.list", 
            "map-partners", 
            array(
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "AJAX_MODE" => "N",
                "IBLOCK_TYPE" => "vecancy",
                "IBLOCK_ID" => "126",
                "NEWS_COUNT" => "100",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "ID",
                "SORT_ORDER2" => "DESC",
                "FILTER_NAME" => "arrFilterPartners",
                "FIELD_CODE" => array(
                    0 => "ID",
                    1 => "",
                ),
                "PROPERTY_CODE" => array(
                    0 => "",
                    1 => "DESCRIPTION",
                    2 => "",
                ),
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_FILTER" => "Y",
                "CACHE_GROUPS" => "Y",
                "DISPLAY_TOP_PAGER" => "Y",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "PAGER_TITLE" => "Новости",
                "PAGER_SHOW_ALWAYS" => "Y",
                "PAGER_TEMPLATE" => "",
                "PAGER_DESC_NUMBERING" => "Y",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "Y",
                "PAGER_BASE_LINK_ENABLE" => "Y",
                "SET_STATUS_404" => "Y",
                "SHOW_404" => "Y",
                "MESSAGE_404" => "",
                "PAGER_BASE_LINK" => "",
                "PAGER_PARAMS_NAME" => "arrPager",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "CITY" => "Москва и Московская область",
                "COMPONENT_TEMPLATE" => "map-partners",
                "STRICT_SECTION_CHECK" => "N",
                "FILE_404" => ""
            ),
            false
        );?>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

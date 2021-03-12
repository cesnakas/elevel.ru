<?
error_reporting(E_ALL ^ E_DEPRECATED);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Компания Эlevel - продажи электрооборудования, инженерные услуги, сервис закупок, интернет-магазин");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, электрооборудование, электроснабжение, розетки, выключатели, электрощиты, кабель, провод, электрика, электромонтаж, светотехника, проектирование электроснабжения, стабилизаторы напряжения, автоматические выключатели");
$APPLICATION->SetPageProperty("keywords", "электрика, электротовары, электрика оптом, инженерные услуги, продажи электрооборудования");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает купить электротовары и электрооборудование от ведущих мировых производителей по доступным ценам оптом. Комплексные поставки современного электротехнического оборудования.");
$APPLICATION->SetPageProperty("not_show_nav_chain", "Y");
$APPLICATION->SetTitle("Продажи электрооборудования, инженерные услуги, сервис закупок,  интернет-магазин");
// D7
/*use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss("/css/fonts.css");
Asset::getInstance()->addCss("/css/index.css");
Asset::getInstance()->addCss("/js/bootstrap/bootstrap.min.css");

Asset::getInstance()->addJs("/js/jcarousellite.js");
Asset::getInstance()->addJs("/js/index.js");*/
?>

<script>
// page init
$(function(){
    
    if ($(window).width() <= '1024'){
        $("#main-blocks-shop").prependTo(".main-blocks");
    }
});
</script>
<ul class="main-blocks clearfix">
    <li> <a class="item" href="/partners/">
    <div class="visual-center">
 <img width="192" src="/local/templates/corporativ/images/img32.jpg" height="196" alt="">
    </div>
    <h3>Продажи оборудования</h3>
    <p>
         <? $APPLICATION->IncludeFile("/includes/nano/delivery.php", Array(), Array("MODE" => "text")); ?>
    </p>
 </a> </li>
    <li> <a class="item" href="/services/">
    <div class="visual-center">
 <img width="201" src="/local/templates/corporativ/images/img33.jpg" height="159" alt="">
    </div>
    <h3>Инженерные услуги</h3>
    <p>
         <? $APPLICATION->IncludeFile("/includes/nano/engineering-services.php", Array(), Array("MODE" => "html")); ?>
    </p>
 </a> </li>
    <li id="main-blocks-shop"> <a class="item" href="/shop/">
    <div class="visual-center">
 <img width="189" src="/local/templates/corporativ/images/img34.jpg" height="182" alt="">
    </div>
    <h3>Интернет магазин</h3>
    <p>
         <? $APPLICATION->IncludeFile("/includes/nano/store.php", Array(), Array("MODE" => "text")); ?>
    </p>
 </a> </li>
    <li> <a class="item" href="/eway/">
    <div class="visual-center">
 <img width="197" src="/local/templates/corporativ/images/img35.jpg" height="139" alt="">
    </div>
    <h3>Интернет сервис e.way</h3>
    <p>
         <? $APPLICATION->IncludeFile("/includes/nano/e-way-service.php", Array(), Array("MODE" => "text")); ?>
    </p>
 </a> </li>
</ul>
 <section>
<h2>Последние новости</h2>
 <?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "news",
    Array(
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "news",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(0=>"NAME",1=>"DETAIL_TEXT",2=>"DETAIL_PICTURE",3=>"DATE_ACTIVE_FROM",4=>"",),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "2",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(0=>"",1=>"",),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
);?> 

    <div class="button-center">
        <a href="/subscribe/" class="button">Подписаться на новости</a>
    </div>

</section>
<h1 class="headline projects">Наши проекты</h1>
 <section class="section-projects section-content"> <?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "projects",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "COMPONENT_TEMPLATE" => "projects",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"DETAIL_TEXT",3=>"DATE_ACTIVE_FROM",4=>"",),
        "FILTER_NAME" => "filterProjects",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "88",
        "IBLOCK_TYPE" => "engineering_services",
        "IBLOCK_URL" => "",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "9",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "",
        "PAGER_TITLE" => "",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(0=>"YEAR",1=>"EQUIPMENT",2=>"OBJECT_TYPE",3=>"SOLUTION_TYPE",4=>"",),
        "SECTION_URL" => "",
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "USE_PERMISSIONS" => "N"
    )
);?> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

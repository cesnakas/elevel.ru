<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetPageProperty("tags", "Специальное предложение, системным интеграторам, системным интеграторам и инсталляторам, сотрудничество с интеграторами, партнерские программы Эlevel, партнерство");
$APPLICATION->SetPageProperty("keywords", "Специальное предложение, системным интеграторам, системным интеграторам и инсталляторам, сотрудничество с интеграторами, партнерские программы Эlevel, партнерство");
$APPLICATION->SetPageProperty("description", "Предложение сотрудничества системным интеграторам IT от Эlevel");
$APPLICATION->SetTitle("Промышленным предприятиям и OEM-партнерам");
?>
    <div class="heading-partners clearfix">
        <h1 class="headline factories"><?= $APPLICATION->ShowTitle() ?></h1>
        <? $APPLICATION->IncludeComponent('magnitmedia:geoip.phone', '', array("TYPE" => "PHONE_CORP"), $component); ?>
    </div>
    <div class="top-service-block oem clearfix">
        <div class="left-block">
            <h3>Мы предлагаем:</h3>
            <div class="twocolumns clearfix">
                <div class="column">
                    <? $APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services1.php", Array(), Array("MODE" => "html")); ?>
                </div>
                <div class="column">
                    <? $APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services2.php", Array(), Array("MODE" => "html")); ?>
                </div>
            </div>
        </div>
        <div class="right-block">
            <h3>Уверены что Ваш поставщик лучший? - Проверим, присылайте запрос!</h3>
            <? $APPLICATION->IncludeComponent(
                "magnitmedia:form.result.new",
                "form3",
                array(
                    "CACHE_TIME" => "3600",
                    "CACHE_TYPE" => "A",
                    "CHAIN_ITEM_LINK" => "",
                    "CHAIN_ITEM_TEXT" => "",
                    "COMPONENT_TEMPLATE" => "form3",
                    "EDIT_URL" => "",
                    "FORM_TITLE" => "Уверены что Ваш поставщик лучший? Попробуйте это проверить. Присылайте запрос!",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "LIST_URL" => "",
                    "MANAGER_EMAIL" => "orpp_msk@elevel.ru",
                    "PAGE_TITLE" => "Промышленным предприятиям и OEM-партнерам",
                    "PAGE_URL" => "",
                    "SEF_MODE" => "N",
                    "SUCCESS_URL" => "",
                    "USE_EXTENDED_ERRORS" => "N",
                    "WEB_FORM_ID" => "102",
                    "VARIABLE_ALIASES" => array(
                        "WEB_FORM_ID" => "WEB_FORM_ID",
                        "RESULT_ID" => "RESULT_ID",
                    )
                ),
                false
            ); ?>
        </div>
    </div>
<? $APPLICATION->IncludeComponent('magnitmedia:geoip.manager_content', '', array("MANAGER_EMAIL" => "orpp_msk@elevel.ru", "FORM_TITLE" => "Форма обратной связи с руководителем", "PAGE_TITLE" => "Промышленным предприятиям и OEM-партнерам"), $component); ?>

    <section class="section-brands section-content">
        <h2>Ассортиментное предложение для предприятий</h2>
        <? $APPLICATION->IncludeComponent(
            "magnitmedia:assortiment",
            ".default",
            Array(
                "CACHE_TIME" => "86400",
                "CACHE_TYPE" => "A",
                "COMPONENT_TEMPLATE" => ".default",
                "HL_BLOCK_ID" => "1",
                "IBLOCK_ID" => "124",
                "IBLOCK_TYPE" => "vecancy",
                "SECTION_ID" => "47662"
            )
        ); ?> </section>
    <section class="section-other-services section-content">
        <h2>Другие инженерные услуги</h2>
        <? $APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/other_services.php", Array(), Array("MODE" => "html")); ?>
    </section>
<?
global $filterProjects;
$filterProjects = array(
    "PROPERTY_SOLUTION_TYPE_VALUE" => "проектирование систем электроснабжения до 35 кВ"
);
?>
    <h1 class="headline projects">Наши проекты</h1>
    <section class="section-projects section-content">
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.smart.filter",
            "projects",
            Array(
                "CACHE_GROUPS" => "N",
                "CACHE_TIME" => "86400",
                "CACHE_TYPE" => "A",
                "COMPONENT_TEMPLATE" => "projects",
                "CONVERT_CURRENCY" => "N",
                "DISPLAY_ELEMENT_COUNT" => "Y",
                "FIELD_CODE" => array(0 => "", 1 => "",),
                "FILTER_NAME" => "filterProjects",
                "FILTER_VIEW_MODE" => "vertical",
                "HIDE_NOT_AVAILABLE" => "N",
                "IBLOCK_ID" => "88",
                "IBLOCK_TYPE" => "engineering_services",
                "PAGER_PARAMS_NAME" => "",
                "POPUP_POSITION" => "left",
                "PRICE_CODE" => array(),
                "PROPERTY_CODE" => array(0 => "YEAR", 1 => "OTHER_PROJECTS", 2 => "EQUIPMENT", 3 => "OBJECT_TYPE", 4 => "SOLUTION_TYPE", 5 => "",),
                "SAVE_IN_SESSION" => "N",
                "SECTION_CODE" => "",
                "SECTION_DESCRIPTION" => "-",
                "SECTION_ID" => "",
                "SECTION_TITLE" => "-",
                "SEF_MODE" => "N",
                "TEMPLATE_THEME" => "blue",
                "XML_EXPORT" => "N"
            )
        ); ?><? $APPLICATION->IncludeComponent(
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
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array(0 => "NAME", 1 => "PREVIEW_PICTURE", 2 => "DETAIL_TEXT", 3 => "DATE_ACTIVE_FROM", 4 => "",),
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
                "PROPERTY_CODE" => array(0 => "YEAR", 1 => "EQUIPMENT", 2 => "OBJECT_TYPE", 3 => "SOLUTION_TYPE", 4 => "",),
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
        ); ?> </section>
    <section class="section-special-offer">
        <h2>Хотите получить спецпредложение на первую поставку?</h2>
        <? $APPLICATION->IncludeComponent(
            "magnitmedia:form.result.new",
            "form2",
            array(
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_URL" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "LIST_URL" => "",
                "SEF_MODE" => "N",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "N",
                "WEB_FORM_ID" => "102",
                "COMPONENT_TEMPLATE" => "form2",
                "MANAGER_EMAIL" => "orpp_msk@elevel.ru",
                "FORM_TITLE" => "Промышленным предприятиям и OEM-партнерам",
                "PAGE_URL" => "",
                "PAGE_TITLE" => "Розничным магазинам",
                "VARIABLE_ALIASES" => array(
                    "WEB_FORM_ID" => "WEB_FORM_ID",
                    "RESULT_ID" => "RESULT_ID",
                )
            ),
            false
        ); ?>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
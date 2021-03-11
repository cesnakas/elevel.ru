<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>
<div id="simul_form">
    <div class="info"></div>
    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
    <?
    $APPLICATION->IncludeComponent(
            "doal:form.result.new", "", Array(
        "SEF_MODE" => "N", // Включить поддержку ЧПУ
        "WEB_FORM_ID" => "SIMPLE_FORM_1", // ID веб-формы
        "LIST_URL" => "/sendquery/sended.php", // Страница со списком результатов
        "EDIT_URL" => "/sendquery/sended.php", // Страница редактирования результата
        "SUCCESS_URL" => "/sendquery/sended.php", // Страница с сообщением об успешной отправке
        "CHAIN_ITEM_TEXT" => "", // Название дополнительного пункта в навигационной цепочке
        "CHAIN_ITEM_LINK" => "", // Ссылка на дополнительном пункте в навигационной цепочке
        "IGNORE_CUSTOM_TEMPLATE" => "Y", // Игнорировать свой шаблон
        "USE_EXTENDED_ERRORS" => "Y", // Использовать расширенный вывод сообщений об ошибках
        "CACHE_TYPE" => "N", // Тип кеширования
        "CACHE_TIME" => "3600", // Время кеширования (сек.)
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
            )
    );
    ?>

</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
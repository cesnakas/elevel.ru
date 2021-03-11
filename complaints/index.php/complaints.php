<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$APPLICATION->SetTitle("Жалобы и предложения");
?><div id="complaints_container" class="container">

	<?$APPLICATION->IncludeComponent(    // Форма нового запроса
        "bitrix:form.result.new", 
        "complaints_suggestions", 
        array(
            "COMPONENT_TEMPLATE" => "complaints_suggestions",
            "WEB_FORM_ID" => "120",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "N",
            "SEF_MODE" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "LIST_URL" => "result_list.php",
            "EDIT_URL" => "result_edit.php",
            "SUCCESS_URL" => "",
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            ),
        ),
        false
    );?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
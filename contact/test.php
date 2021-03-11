<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
        echo SITE_TEMPLATE_PATH;
$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	".default", 
	array(
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => "56",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "Y",
		"USE_EXTENDED_ERRORS" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"COMPONENT_TEMPLATE" => ".default",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
                        
                        <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
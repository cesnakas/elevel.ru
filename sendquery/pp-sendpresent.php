<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Запрос презентации системы INNTECH");
?><div class="popup" style="width: 370px; height: 300px;" align="center">
<?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"",
	Array(
		"AJAX_MODE" => "N",
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => 14,
		"RESULT_ID" => $_REQUEST["RESULT_ID"],
		"START_PAGE" => "new",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_VIEW_PAGE" => "Y",
		"SUCCESS_URL" => "/sendquery/sended.php",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_ADDITIONAL" => "Y",
		"SHOW_STATUS" => "Y",
		"EDIT_ADDITIONAL" => "Y",
		"EDIT_STATUS" => "Y",
		"NOT_SHOW_FILTER" => Array(),
		"NOT_SHOW_TABLE" => Array(),
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 3600,
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"VARIABLE_ALIASES" => Array(
			"action" => "action"
		)
	),
false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
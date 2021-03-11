<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("Заказ на расчет системы защиты труб от замерзания ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" dir="ltr" lang="ru">
<head>
<title>Эlevel - Заказ на расчет системы защиты труб от замерзания </title>
<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
<link rel="Shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel='stylesheet' href='/css/main.css' type='text/css' media="screen" />
</head>
<body>
<h2>Заказ на расчет системы защиты труб от замерзания </h2>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
		"SEF_MODE" => "N", 
		"WEB_FORM_ID" => "5", 
		"LIST_URL" => "sended.php", 
		"EDIT_URL" => "sended.php", 
		"SUCCESS_URL" => "sended.php", 
		"CHAIN_ITEM_TEXT" => "", 
		"CHAIN_ITEM_LINK" => "", 
		"IGNORE_CUSTOM_TEMPLATE" => "N", 
		"USE_EXTENDED_ERRORS" => "N", 
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600", 
		"VARIABLE_ALIASES" => Array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID"
		)
	),
false
);?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
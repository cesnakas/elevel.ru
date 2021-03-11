<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Регистрация на мероприятия Эlevel Инженер");
$APPLICATION->SetPageProperty("tags", "Клиентские мероприятия, регистрация");
$APPLICATION->SetPageProperty("keywords", "Клиентские мероприятия, регистрация");
$APPLICATION->SetPageProperty("description", "Регистрация на мероприятия Эlevel Инженер, даты прохождения, семинары, клиентские мероприятия");
$APPLICATION->SetTitle("Акции");

?> 
<div> 
  <p class="h1">Регистрация на мероприятие Эlevel Инженер</p>

  <br />
 
  <h2><strong>ВЫ &ndash; дизайнер или архитектор – значит ВАМ сюда!</strong></h2>

  <br />
 
  <p> Море позитивных эмоций, спортивная подготовка и уютное общение с коллегами по цеху – гарантированы!</p>

  <br />
 
  <p> Приглашаем провести время с нами в Московском кёрлинг клубе&hellip;. 20 июня с 17.00 часов…. !</p>

  <br />
 
  <h3>Просто зарегистрируйтесь:</h3>
 
  <p><?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"",
	Array(
		"AJAX_MODE" => "N",
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => "39",
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"START_PAGE" => "new",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"SUCCESS_URL" => "/company/event/success.php",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_STATUS" => "N",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "N",
		"NOT_SHOW_FILTER" => array(),
		"NOT_SHOW_TABLE" => array(),
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"VARIABLE_ALIASES" => Array(
			"action" => "action"
		)
	)
);?></p>
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
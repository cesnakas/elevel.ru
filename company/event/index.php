<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "����������� �� ����������� �level �������");
$APPLICATION->SetPageProperty("tags", "���������� �����������, �����������");
$APPLICATION->SetPageProperty("keywords", "���������� �����������, �����������");
$APPLICATION->SetPageProperty("description", "����������� �� ����������� �level �������, ���� �����������, ��������, ���������� �����������");
$APPLICATION->SetTitle("�����");

?> 
<div> 
  <p class="h1">����������� �� ����������� �level �������</p>

  <br />
 
  <h2><strong>�� &ndash; �������� ��� ���������� � ������ ��� ����!</strong></h2>

  <br />
 
  <p> ���� ���������� ������, ���������� ���������� � ������ ������� � ��������� �� ���� � �������������!</p>

  <br />
 
  <p> ���������� �������� ����� � ���� � ���������� ������ �����&hellip;. 20 ���� � 17.00 �����. !</p>

  <br />
 
  <h3>������ �����������������:</h3>
 
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
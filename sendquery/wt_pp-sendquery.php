<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>
<script type="text/javascript" src="/bitrix/js/main/ajax.js"></script>
<script type="text/javascript" src="/js/4forms/SIMPLE_FORM_1.js"></script>


<div id="simul_form">
<?$APPLICATION->IncludeComponent("bitrix:form", "wt_webforms", Array(
	"START_PAGE" => "new",	// ��������� ��������
	"SHOW_LIST_PAGE" => "N",	// ���������� �������� �� ������� �����������
	"SHOW_EDIT_PAGE" => "N",	// ���������� �������� �������������� ����������
	"SHOW_VIEW_PAGE" => "N",	// ���������� �������� ��������� ����������
	"SUCCESS_URL" => "",	// �������� � ���������� �� �������� ��������
	"WEB_FORM_ID" => "1",	// ID ���-�����
	"RESULT_ID" => "",	// ID ����������
	"SHOW_ANSWER_VALUE" => "Y",	// �������� �������� ��������� ANSWER_VALUE
	"SHOW_ADDITIONAL" => "Y",	// �������� �������������� ���� ���-�����
	"SHOW_STATUS" => "Y",	// �������� ������� ������ ����������
	"EDIT_ADDITIONAL" => "Y",	// �������� �� �������������� �������������� ����
	"EDIT_STATUS" => "Y",	// �������� ����� ����� �������
	"NOT_SHOW_FILTER" => array(	// ���� �����, ������� ������ ���������� � �������
		0 => "F_SENDTOMAIL",
		1 => "",
	),
	"NOT_SHOW_TABLE" => array(	// ���� �����, ������� ������ ���������� � �������
		0 => "F_SENDTOMAIL",
		1 => "",
	),
	"IGNORE_CUSTOM_TEMPLATE" => "Y",	// ������������ ���� ������
	"USE_EXTENDED_ERRORS" => "Y",	// ������������ ����������� ����� ��������� �� �������
	"SEF_MODE" => "N",	// �������� ��������� ���
	"SEF_FOLDER" => "/services/",	// ������� ��� (������������ ����� �����)
	"AJAX_MODE" => "Y",	// �������� ����� AJAX
	"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
	"AJAX_OPTION_STYLE" => "N",	// �������� ��������� ������
	"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
	"CACHE_TYPE" => "N",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
	"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
	"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
	"VARIABLE_ALIASES" => array(
		"action" => "action",
	)
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
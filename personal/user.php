<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������ �������");
?>
<br/>
<br/>
<?/*$APPLICATION->IncludeComponent("bitrix:menu", "profile_menu", Array(
	"ROOT_MENU_TYPE" => "PERSONAL",	// ��� ���� ��� ������� ������
	"MENU_CACHE_TYPE" => "Y",	// ��� �����������
	"MENU_CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// ��������� ����� �������
	"MENU_CACHE_GET_VARS" => "",	// �������� ���������� �������
	"MAX_LEVEL" => "1",	// ������� ����������� ����
	"CHILD_MENU_TYPE" => "PERSONAL",	// ��� ���� ��� ��������� �������
	"USE_EXT" => "N",	// ���������� ����� � ������� ���� .���_����.menu_ext.php
	"DELAY" => "N",	// ����������� ���������� ������� ����
	"ALLOW_MULTI_SELECT" => "N",	// ��������� ��������� �������� ������� ������������
	),
	false
);*/?>
<br/>
<br/>
<?$APPLICATION->IncludeComponent("bitrix:main.profile", "def", array(
	"AJAX_MODE" => "N",
	"AJAX_OPTION_SHADOW" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"SET_TITLE" => "N",
	"USER_PROPERTY" => array(
	),
	"SEND_INFO" => "N",
	"CHECK_RIGHTS" => "N",
	"USER_PROPERTY_NAME" => "",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<?$APPLICATION->SetTitle("������ �������");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
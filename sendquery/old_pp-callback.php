<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������� ���������");
?>
<div class="popup">
<style>

</style>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"WEB_FORM_ID" => "28",	// ID ���-�����
	"LIST_URL" => "/sendquery/sended.php",	// �������� �� ������� �����������
	"EDIT_URL" => "/sendquery/sended.php",	// �������� �������������� ����������
	"SUCCESS_URL" => "/sendquery/sended.php",	// �������� � ���������� �� �������� ��������
	"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
	"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
	"IGNORE_CUSTOM_TEMPLATE" => "N",	// ������������ ���� ������
	"USE_EXTENDED_ERRORS" => "N",	// ������������ ����������� ����� ��������� �� �������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	)
);?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
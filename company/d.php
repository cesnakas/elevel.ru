<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("not_show_nav_chain", "N");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �������������������, ����������������, �������������, �������������� ����������������, ������������ ������������, ������������������ ������������, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, ���������, ���, �����������, �������������� ���������, ABB, Merten, Gira, Schneider Electric, Legrand, ���, Osram, Philips, ���, �����������, �������, �����������, ����������������, ����� ���, �����, �������������� �����������, �������������, ������, ������, ������ �����");
$APPLICATION->SetPageProperty("keywords", "������, �level, elevel, elevel.ru, �������������������, ����������������, �������������, �������������� ����������������, ������������ ������������, ������������������ ������������, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, ���������, ���, �����������, �������������� ���������, ABB, Merten, Gira, Schneider Electric, Legrand, ���, Osram, Philips, ���, �����������, �������, �����������, ����������������, ����� ���, �����, �������������� �����������, �������������, ������, ������, ������ �����");
$APPLICATION->SetPageProperty("description", "� �������� ������");
$APPLICATION->SetTitle("��������");
?>

<div class="block980a">

<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	"",
	Array(
		
	),
false
);?>




</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�������������������, ������, ������, �level, elevel, elevel.ru, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, schneider electric, abb, legrand, gira, merten, dkc, ���, ���������, osram, general electric, philips, ���������, ����, �������� ����������, lena lighting, bticino, anam, hensel, nexans, comtech, zamel, wago, elfo, ecoplast, ����������, knx, esylux, ���, teleco");
$APPLICATION->SetPageProperty("keywords", "�������������������, ������, ������, �level, elevel, elevel.ru, ������������������� �������, ������������� ������������, ��������-������������� ���������, ������������, schneider electric, abb, legrand, gira, merten, dkc, ���, ���������, osram, general electric, philips, ���������, ����, �������� ����������, lena lighting, bticino, anam, hensel, nexans, comtech, zamel, wago, elfo, ecoplast, ����������, knx, esylux, ���, teleco");
$APPLICATION->SetTitle("�������������");

?> 

<div class="brands-box">
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "brands", Array(
	"IBLOCK_TYPE" => "vecancy",	// ��� ����-�����
	"IBLOCK_ID" => "5",	// ����-����
	"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID �������
	"SECTION_CODE" => "",	// ��� �������
	"SECTION_URL" => "/brands/#SECTION_CODE#/",	// URL, ������� �� �������� � ���������� �������
	"COUNT_ELEMENTS" => "N",	// ���������� ���������� ��������� � �������
	"TOP_DEPTH" => "1",	// ������������ ������������ ������� ��������
	"SECTION_FIELDS" => "",	// ���� ��������
	"SECTION_USER_FIELDS" => "",	// �������� ��������
	"ADD_SECTIONS_CHAIN" => "Y",	// �������� ������ � ������� ���������
	"CACHE_TYPE" => "N",	// ��� �����������
	"CACHE_TIME" => "36000000",	// ����� ����������� (���.)
	"CACHE_GROUPS" => "Y",	// ��������� ����� �������
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
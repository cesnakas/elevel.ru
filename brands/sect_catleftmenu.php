<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="block210b right_brands">
					<p>�������������</p>
					<?
					$pathers=explode('/',$_SERVER['REQUEST_URI']);
					//var_dump($pathers);
					$u=count($pathers)-2;
					$RootPath="/brands/".$pathers[$u]."";
//echo $RootPath;
?>
	
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "brands_menu", Array(
	"IBLOCK_TYPE" => "vecancy",	// ��� ����-�����
	"IBLOCK_ID" => "5",	// ����-����
	"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID �������
	"SECTION_CODE" => "",	// ��� �������
	"SECTION_URL" => "/brands/#SECTION_CODE#/",	// URL, ������� �� �������� � ���������� �������
	"COUNT_ELEMENTS" => "Y",	// ���������� ���������� ��������� � �������
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "��������");
$APPLICATION->SetPageProperty("tags", "������, ��������, ��������, ��������, �������, ����� ��������� ��������, ����� ������, ���-����, �������, ���������������� ����");
$APPLICATION->SetPageProperty("keywords", "������, ��������, ��������, ��������, �������, ����� ��������� ��������, ����� ������, ���-����, �������, ���������������� ����");
$APPLICATION->SetPageProperty("description", "�������� ������ ������, ���������������� �����, ���-�����, ��������� � ����� ��������� ��������, ��������� ���� �level � ��������");
$APPLICATION->SetTitle("��������");      

$APPLICATION->SetPageProperty("body_class", "feedback-page");
$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$cityName = $obLocation->getCity();
?>
<h1><?=$APPLICATION->ShowTitle()?></h1>
<?$APPLICATION->IncludeComponent("magnitmedia:shops.maps", "template1", Array(
	"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",	// �������� ����� AJAX
		"IBLOCK_TYPE" => "vecancy",	// ��� ��������������� ����� (������������ ������ ��� ��������)
		"IBLOCK_ID" => "152",	// ��� ��������������� �����
		"NEWS_COUNT" => "20",	// ���������� �������� �� ��������
		"SORT_BY1" => "SORT",	// ���� ��� ������ ���������� ��������
		"SORT_ORDER1" => "ASC",	// ����������� ��� ������ ���������� ��������
		"SORT_BY2" => "ID",	// ���� ��� ������ ���������� ��������
		"SORT_ORDER2" => "DESC",	// ����������� ��� ������ ���������� ��������
		"FILTER_NAME" => "",	// ������
		"FIELD_CODE" => array(	// ����
			0 => "ID",
			1 => "",
		),
		"PROPERTY_CODE" => array(	// ��������
			0 => "",
			1 => "DESCRIPTION",
			2 => "",
		),
		"CHECK_DATES" => "Y",	// ���������� ������ �������� �� ������ ������ ��������
		"DETAIL_URL" => "",	// URL �������� ���������� ��������� (�� ��������� - �� �������� ���������)
		"PREVIEW_TRUNCATE_LEN" => "",	// ������������ ����� ������ ��� ������ (������ ��� ���� �����)
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// ������ ������ ����
		"SET_TITLE" => "N",	// ������������� ��������� ��������
		"SET_BROWSER_TITLE" => "N",	// ������������� ��������� ���� ��������
		"SET_META_KEYWORDS" => "N",	// ������������� �������� ����� ��������
		"SET_META_DESCRIPTION" => "N",	// ������������� �������� ��������
		"SET_LAST_MODIFIED" => "N",	// ������������� � ���������� ������ ����� ����������� ��������
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// �������� �������� � ������� ���������
		"ADD_SECTIONS_CHAIN" => "Y",	// �������� ������ � ������� ���������
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",	// �������� ������, ���� ��� ���������� ��������
		"PARENT_SECTION" => "",	// ID �������
		"PARENT_SECTION_CODE" => "",	// ��� �������
		"INCLUDE_SUBSECTIONS" => "Y",	// ���������� �������� ����������� �������
		"CACHE_TYPE" => "N",	// ��� �����������
		"CACHE_TIME" => "3600",	// ����� ����������� (���.)
		"CACHE_FILTER" => "N",	// ���������� ��� ������������� �������
		"CACHE_GROUPS" => "N",	// ��������� ����� �������
		"DISPLAY_TOP_PAGER" => "Y",	// �������� ��� �������
		"DISPLAY_BOTTOM_PAGER" => "Y",	// �������� ��� �������
		"PAGER_TITLE" => "�������",	// �������� ���������
		"PAGER_SHOW_ALWAYS" => "Y",	// �������� ������
		"PAGER_TEMPLATE" => "",	// ������ ������������ ���������
		"PAGER_DESC_NUMBERING" => "Y",	// ������������ �������� ���������
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// ����� ����������� ������� ��� �������� ���������
		"PAGER_SHOW_ALL" => "Y",	// ���������� ������ "���"
		"PAGER_BASE_LINK_ENABLE" => "Y",	// �������� ��������� ������
		"SET_STATUS_404" => "Y",	// ������������� ������ 404
		"SHOW_404" => "Y",	// ����� ����������� ��������
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK" => "",	// Url ��� ���������� ������ (�� ��������� - �������������)
		"PAGER_PARAMS_NAME" => "arrPager",	// ��� ������� � ����������� ��� ���������� ������
		"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
		"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
		"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
		"AJAX_OPTION_ADDITIONAL" => "",	// �������������� �������������
		"CITY" => $cityName,
		"COMPONENT_TEMPLATE" => ".default",
		"STRICT_SECTION_CHECK" => "N",	// ������� �������� ������� ��� ������ ������
		"FILE_404" => "",	// �������� ��� ������ (�� ��������� /404.php)
	),
	false
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
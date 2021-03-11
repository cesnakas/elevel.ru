<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");
?>

<div class="inner-banner">
  <img class="inner-banner__img" src="<?=SITE_TEMPLATE_PATH?>/images/merten_banner.png" alt=""> 
  <p></p>
</div>

<?$APPLICATION->IncludeComponent(
  "bitrix:news.list", 
  "carousel",
  Array(
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "AJAX_MODE" => "Y",
    "IBLOCK_TYPE" => "news",
    "IBLOCK_ID" => "154",
    "NEWS_COUNT" => "6",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(""),
    "PROPERTY_CODE" => Array("IMGS"),
    "CHECK_DATES" => "Y",
    "DETAIL_URL" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "SET_TITLE" => "N",
    "SET_BROWSER_TITLE" => "N",
    "SET_META_KEYWORDS" => "Y",
    "SET_META_DESCRIPTION" => "Y",
    "SET_LAST_MODIFIED" => "Y",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN" => "N",
    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "INCLUDE_SUBSECTIONS" => "Y",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "CACHE_FILTER" => "Y",
    "CACHE_GROUPS" => "Y",
    "DISPLAY_TOP_PAGER" => "Y",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "PAGER_TITLE" => "Íîâîñòè",
    "PAGER_SHOW_ALWAYS" => "Y",
    "PAGER_TEMPLATE" => "",
    "PAGER_DESC_NUMBERING" => "Y",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "Y",
    "PAGER_BASE_LINK_ENABLE" => "Y",
    "SET_STATUS_404" => "Y",
    "SHOW_404" => "Y",
    "MESSAGE_404" => "",
    "PAGER_BASE_LINK" => "",
    "PAGER_PARAMS_NAME" => "arrPager",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_ADDITIONAL" => ""
  )
);?>

<?$APPLICATION->IncludeComponent(
  "bitrix:news.list", 
  "partner-projects",
  Array(
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "AJAX_MODE" => "Y",
    "IBLOCK_TYPE" => "news",
    "IBLOCK_ID" => "156",
    "NEWS_COUNT" => "6",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(""),
    "PROPERTY_CODE" => Array("LINK","IMGS"),
    "CHECK_DATES" => "Y",
    "DETAIL_URL" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "SET_TITLE" => "N",
    "SET_BROWSER_TITLE" => "N",
    "SET_META_KEYWORDS" => "Y",
    "SET_META_DESCRIPTION" => "Y",
    "SET_LAST_MODIFIED" => "Y",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN" => "N",
    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "INCLUDE_SUBSECTIONS" => "Y",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "CACHE_FILTER" => "Y",
    "CACHE_GROUPS" => "Y",
    "DISPLAY_TOP_PAGER" => "Y",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "PAGER_TITLE" => "Íîâîñòè",
    "PAGER_SHOW_ALWAYS" => "Y",
    "PAGER_TEMPLATE" => "",
    "PAGER_DESC_NUMBERING" => "Y",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "Y",
    "PAGER_BASE_LINK_ENABLE" => "Y",
    "SET_STATUS_404" => "Y",
    "SHOW_404" => "Y",
    "MESSAGE_404" => "",
    "PAGER_BASE_LINK" => "",
    "PAGER_PARAMS_NAME" => "arrPager",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_ADDITIONAL" => ""
  )
);?>

<?$APPLICATION->IncludeComponent(
  "bitrix:news.list", 
  "partnership-articles",
  Array(
    "DISPLAY_DATE" => "Y",
    "DISPLAY_NAME" => "Y",
    "DISPLAY_PICTURE" => "Y",
    "DISPLAY_PREVIEW_TEXT" => "Y",
    "AJAX_MODE" => "Y",
    "IBLOCK_TYPE" => "news",
    "IBLOCK_ID" => "155",
    "NEWS_COUNT" => "6",
    "SORT_BY1" => "ACTIVE_FROM",
    "SORT_ORDER1" => "DESC",
    "SORT_BY2" => "SORT",
    "SORT_ORDER2" => "ASC",
    "FILTER_NAME" => "",
    "FIELD_CODE" => array(""),
    "PROPERTY_CODE" => Array("LINK"),
    "CHECK_DATES" => "Y",
    "DETAIL_URL" => "",
    "PREVIEW_TRUNCATE_LEN" => "",
    "ACTIVE_DATE_FORMAT" => "d.m.Y",
    "SET_TITLE" => "N",
    "SET_BROWSER_TITLE" => "N",
    "SET_META_KEYWORDS" => "Y",
    "SET_META_DESCRIPTION" => "Y",
    "SET_LAST_MODIFIED" => "Y",
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
    "ADD_SECTIONS_CHAIN" => "N",
    "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
    "PARENT_SECTION" => "",
    "PARENT_SECTION_CODE" => "",
    "INCLUDE_SUBSECTIONS" => "Y",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "CACHE_FILTER" => "Y",
    "CACHE_GROUPS" => "Y",
    "DISPLAY_TOP_PAGER" => "Y",
    "DISPLAY_BOTTOM_PAGER" => "Y",
    "PAGER_TITLE" => "Íîâîñòè",
    "PAGER_SHOW_ALWAYS" => "Y",
    "PAGER_TEMPLATE" => "",
    "PAGER_DESC_NUMBERING" => "Y",
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    "PAGER_SHOW_ALL" => "Y",
    "PAGER_BASE_LINK_ENABLE" => "Y",
    "SET_STATUS_404" => "Y",
    "SHOW_404" => "Y",
    "MESSAGE_404" => "",
    "PAGER_BASE_LINK" => "",
    "PAGER_PARAMS_NAME" => "arrPager",
    "AJAX_OPTION_JUMP" => "N",
    "AJAX_OPTION_STYLE" => "Y",
    "AJAX_OPTION_HISTORY" => "N",
    "AJAX_OPTION_ADDITIONAL" => ""
  )
);?>
<div class="inner-banner">
  <br><br>
  <p>Merten � ��� �������� ������������� �������������� � ����� ��� ��������� ��������, ������� Merten �������� ������ �������� ������� ��������. ������ ����� ������������ � �������, �����������, ������� �������� � ������� KNX. ������ ������� �������� �������� ������������� �������, �������� � ����������. �� ���������� ���� ������� Merten �������� ����������� ���������, ��� �� ��� ������� ����� �����������. ��� ������� � ������� Merten ���� �� ������� � ������ ������ ������������ � �� ������������ ���. ��� ���������� ����� ������������ ������� ������������ ������ ������� �������� ������, ��������, ������� �������. ������� Merten ���������� �������������, ���������� ������������� ��������� � ����������� QuickFlex, ������� ��������� �������� ������� ���� �������, ������������ ������� �� 25% ������� � ������������ �������������.</p>

  <p>Merten ������� � ��� ������������ ������� �����, 100% ������������������ ������ � �������� �������, ����������� ����������� ��������, �������� ��� ���������� ������� �����, �������� ����������� �������, ������������� ������� �� ��������� ������������� �������: Redot, German design awards, Good design.</p>

  <p>������������� ������ ������� � ������ �������� �������� ��� ���� ��������� ����� � ��������. �� �������� ���� Merten ������� ����� ��������� ��������� ������� � ����������� ����� � ����������� ������ �������� ��� �� ��������, ��� � �� ����������� ����������: ������, ������, �������, �����.</p>

  <p>� Merten ���� ��������� ������� �������� �� ���������� ����������, ��������, �������, ������� ��������� ������������� ������� ���� �������: ��� ��������, ����, ��� � �����, ����� � �.�., � ����� ����������� ������� ������ ���. � ��� ��� - � ������������ ������� ����� Merten!</p>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История компании");
?><article class="article">
<h1>История компании</h1>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"company_history", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "company_history",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "CODE",
			1 => "NAME",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "121",
		"IBLOCK_TYPE" => "vecancy",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "30",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "YEAR",
			1 => "HEADING",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "PROPERTY_YEAR",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>
<div class="text-holder">
	<h2>Эlevel сегодня &#8722; это две ключевые компетенции</h2>
	 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "/include/elevel_today.php", Array(), Array("MODE" => "html"));?>
</div>
<h2>Только цифры, им можно доверять</h2>
<ul class="list-statistics-about">
	 <?for($i = 1; $i < 10; $i++):?>
	<li><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/numbers/{$i}.php", Array(), Array("MODE" => "html"));?></li>
	 <?endfor;?>
</ul>
<h2>25-летний юбилей. Как это было</h2>
<div class="main-video">
	 <iframe width="100%" height="100%" src="https://www.youtube.com/embed/5xdSqP3af3k" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</div>
 </article><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
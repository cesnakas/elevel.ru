<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetPageProperty("description", "");
$APPLICATION->SetPageProperty("tags", "");
$APPLICATION->SetPageProperty("keywords", "");
$APPLICATION->SetTitle("Автоматизация и диспетчеризация");
?>
<div class="heading-partners clearfix">
	<h1 class="headline avtomatizaciya">Автоматизация и диспетчеризация</h1>
	<?$APPLICATION->IncludeComponent('magnitmedia:geoip.phone', '', array("TYPE" => "PHONE_CORP"), $component);?>
</div>
<div class="top-automation-block clearfix">
	<div class="left-block">
		<h3>Мы предлагаем:</h3>
		<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services1.php", Array(), Array("MODE" => "html"));?>
		
	</div>
	<div class="right-block">
		<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/services2.php", Array(), Array("MODE" => "html"));?>
		
	</div>
</div>
<?$APPLICATION->IncludeComponent('magnitmedia:geoip.manager_content', '', array("MANAGER_EMAIL" => "aid_msk@elevel.ru",	"FORM_TITLE" => "Форма обратной связи с руководителем",	"PAGE_TITLE" => "Автоматизация и диспетчеризация"), $component);?>

<section class="section-steps section-content">
	<h2>3 шага навстречу друг другу</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/steps.php", Array(), Array("MODE" => "html"));?>
	
</section>
<section class="section-documents section-content">
	<h2>Разрешительная документация, сертификаты</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/sertificates.php", Array(), Array("MODE" => "html"));?>
	
</section>
<?
global $filterProjects;
$filterProjects = array(
	"PROPERTY_SOLUTION_TYPE_VALUE" => "автоматизация и диспетчеризация"
);
?>
<h1 class="headline projects">Наши проекты</h1>
<section class="section-projects section-content">
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.smart.filter", 
		"projects", 
		array(
			"IBLOCK_TYPE" => "engineering_services",
			"IBLOCK_ID" => "88",
			"FILTER_NAME" => "filterProjects",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "YEAR",
				1 => "OTHER_PROJECTS",
				2 => "EQUIPMENT",
				3 => "OBJECT_TYPE",
				4 => "SOLUTION_TYPE",
				5 => "",
			),
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "86400",
			"CACHE_GROUPS" => "N",
			"PAGER_PARAMS_NAME" => "",
			"COMPONENT_TEMPLATE" => "projects",
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"HIDE_NOT_AVAILABLE" => "N",
			"TEMPLATE_THEME" => "blue",
			"FILTER_VIEW_MODE" => "vertical",
			"POPUP_POSITION" => "left",
			"DISPLAY_ELEMENT_COUNT" => "Y",
			"SEF_MODE" => "N",
			"SAVE_IN_SESSION" => "N",
			"PRICE_CODE" => array(
			),
			"CONVERT_CURRENCY" => "N",
			"XML_EXPORT" => "N",
			"SECTION_TITLE" => "-",
			"SECTION_DESCRIPTION" => "-"
		),
		false
	);
	?>
	
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"projects", 
	array(
		"IBLOCK_TYPE" => "engineering_services",
		"IBLOCK_ID" => "88",
		"NEWS_COUNT" => "9",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "DATE_ACTIVE_FROM",
			4 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "YEAR",
			1 => "EQUIPMENT",
			2 => "OBJECT_TYPE",
			3 => "SOLUTION_TYPE",
			4 => "",
		),
		"DETAIL_URL" => "",
		"SECTION_URL" => "",
		"IBLOCK_URL" => "",
		"SET_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"MESSAGE_404" => "",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_TEMPLATE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"USE_PERMISSIONS" => "N",
		"FILTER_NAME" => "filterProjects",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "projects",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?>

<section class="section-other-services section-content">
	<h2>Другие инженерные услуги</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/other_services.php", Array(), Array("MODE" => "html"));?>
	
</section>
<section class="section-special-offer">
	<h2>Хотите получить скидку 30% на автоматизацию?</h2>
	<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"form2", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "form2",
		"MANAGER_EMAIL" => "aid_msk@elevel.ru",
		"FORM_TITLE" => "Хотите получить скидку 30% на автоматизацию?",
		"PAGE_TITLE" => "Автоматизация и диспетчеризация",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</section>
<section class="section-testimonials">
	<h2>Наши клиенты думают о нас</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/reviews.php", Array(), Array("MODE" => "html"));?>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
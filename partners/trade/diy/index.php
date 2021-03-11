<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "DIY сетям");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, сотрудничество, торговому партнеру, электрооборудование, подбор, ассортимент, оптимальный складской запас, ценовая политика, оформление торговых стендов, скидки, доставка, бесплатные семинары, розетки, выключатели, лампы, кабель, провод, автоматические выключатели, электрощиты, стабилизаторы напряжения");
$APPLICATION->SetPageProperty("keywords", "эlevel, эlevel инженер, партнерство, сотрудничество, торговому партнеру, электрооборудование, подбор, ассортимент, оптимальный складской запас, ценовая политика, оформление торговых стендов, скидки, доставка, бесплатные семинары, розетки, выключатели, лампы, кабель, провод, автоматические выключатели, электрощиты, стабилизаторы напряжения, бесплатные торговые стенды, скидки торговым партнерам");
$APPLICATION->SetPageProperty("description", "Сотрудничество с Эlevel для DIY сетей");
$APPLICATION->SetTitle("DIY сетям");
?>
<div class="heading-partners clearfix">
	<ul class="trade-nav">
		<li><a href="/partners/trade/">Розничным магазинам</a></li>
		<li><h1>DIY сетям</h1></li>
		<li><a class="inet-shops" href="/partners/trade/ecommerce/">Интернет-магазинам</a></li>
	</ul>
	<?$APPLICATION->IncludeComponent('magnitmedia:geoip.phone', '', array("TYPE" => "PHONE_CORP"), $component);?>
	<br/>
	<br/>
</div>

<div class="top-service-block clearfix">
	<div class="left-block">
		<h3>Мы предлагаем:</h3>
		<ul class="list-ticks">
			<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/we_offer.php", Array(), Array("MODE" => "html"));?>
		</ul>
	</div>
	<? // TODO форма ?>
	<div class="right-block">
		<fieldset>
			<h3>Уверены, что ваш поставщик лучший?<br/>Попробуйте это проверить - присылайте запрос!</h3>
			<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	".default", 
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
		"COMPONENT_TEMPLATE" => ".default",
		"MANAGER_EMAIL" => "otk_msk@elevel.ru",
		"FORM_TITLE" => "Форма обратной связи DIY сетям",
		"PAGE_TITLE" => "DIY сетям",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
		</fieldset>
	</div>
</div>
<?$APPLICATION->IncludeComponent('magnitmedia:geoip.manager_content', '', array("MANAGER_EMAIL" => "otk_msk@elevel.ru",	"FORM_TITLE" => "Форма обратной связи с руководителем",	"PAGE_TITLE" => "DIY сетям"), $component);?>

<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "../include/advantages.php", Array(), Array("MODE" => "html"));?>

<section>
	<h2>Только цифры, им можно доверять</h2>
	<ul class="list-statistics-about">
		<?for($i = 1; $i < 7; $i++):?>
			<li><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "../include/numbers/{$i}.php", Array(), Array("MODE" => "html"));?></li>
		<?endfor;?>
	</ul>
</section>

<section class="section-brands section-content">
	<h2>Ассортиментное предложение для розничных магазинов</h2>
	<?$APPLICATION->IncludeComponent(
	"magnitmedia:assortiment", 
	".default", 
	array(
		"CACHE_TIME" => "86400",
		"IBLOCK_ID" => "124",
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "vecancy",
		"SECTION_ID" => "48307",
		"HL_BLOCK_ID" => "1",
		"CACHE_TYPE" => "A"
	),
	false
);?>
</section>

<section class="section-special-offer">
	<h2>Хотите получить спецпредложение на первую поставку?</h2>
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
		"MANAGER_EMAIL" => "otk_msk@elevel.ru",
		"FORM_TITLE" => "Спецпредложение на первую поставку",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "DIY сетям",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</section>

<?
CModule::IncludeModule("iblock");
global $arFilterActions;
$arFilter = array('IBLOCK_ID' => CORPORATIV_ACTIONS_IBLOCK_ID, "NAME" => "Для магазинов");
$rsSections = CIBlockSection::GetList(array('LEFT_MARGIN' => 'ASC'), $arFilter, false, array("ID"));
if ($arSection = $rsSections->Fetch())
{
	$arFilterActions["IBLOCK_SECTION_ID"] = $arSection["ID"];
?>
	<section>
		<?$APPLICATION->IncludeComponent(
		"bitrix:news.list", 
		"actions", 
		array(
			"ACTIVE_DATE_FORMAT" => "j F Y",
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
			"COMPONENT_TEMPLATE" => "actions",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "Y",
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
				4 => "DATE_ACTIVE_FROM",
				5 => "DATE_ACTIVE_TO",
				6 => "",
			),
			"FILTER_NAME" => "arFilterActions",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "123",
			"IBLOCK_TYPE" => "billet",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "3",
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
				0 => "",
				1 => "",
			),
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SORT_BY1" => "ID",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"H2_TITLE" => "Акции для торговых партнеров"
		),
		false
	);?>
	</section>
<?
}
?>

<section>
	<?
	global $arFilterNews;
	$tag1 = "отк";
	$tag2 = "новинка";
	$arFilterNews = array(
		"LOGIC" => "AND",
		Array(
			"LOGIC"=>"OR",
			Array("TAGS"=>$tag1.",%"),
			Array("TAGS"=>"%, ".$tag1),
			Array("TAGS"=>"%, ".$tag1.",%"),
			Array("TAGS"=>$tag1),
		),
		Array(
			"LOGIC"=>"OR",
			Array("TAGS"=>$tag2.",%"),
			Array("TAGS"=>"%, ".$tag2),
			Array("TAGS"=>"%, ".$tag2.",%"),
			Array("TAGS"=>$tag2),
		),
	);
	?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list", 
		"events", 
		array(
			"ACTIVE_DATE_FORMAT" => "j F Y",
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
			"COMPONENT_TEMPLATE" => "news",
			"DETAIL_URL" => "",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array(
				0 => "NAME",
				1 => "DETAIL_PICTURE",
				2 => "",
			),
			"FILTER_NAME" => "arFilterNews",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "2",
			"IBLOCK_TYPE" => "news",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "Y",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "3",
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
				0 => "",
				1 => "",
			),
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SORT_BY1" => "ID",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"H2_TITLE" => "Последние новинки"
		),
		false
	);?>
</section>

<section class="section-testimonials">
	<h2>Наши клиенты думают о нас</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "../include/reviews.php", Array(), Array("MODE" => "html"));?>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
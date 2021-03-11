<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карьера");
?>
<div class="heading-career clearfix">
	<h1 class="headline career">Карьера</h1>
	<div class="block-right">
		<a data-scroll="career" class="button link-scroll" href="">Текущие вакансии</a>
	</div>
</div>
<div class="block-career-top clearfix">
	<div class="left-block">
		<h3>Мы предлагаем:</h3>
		<ul class="list-ticks tabset">
			<?for($i = 1; $i <= 3; $i++):?>
				<li><a <?if ($i == 1):?>class="active"<?endif;?> href="#tab-career<?=$i?>">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/we_offer_tabs/link{$i}.php", Array(), Array("MODE" => "html"));?>
				</a></li>
			<?endfor;?>
		</ul>
	</div>
	<div class="right-block">
		<div class="tabs-content">
			<?for($i = 1; $i <= 3; $i++):?>
				<div id="tab-career<?=$i?>">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/we_offer_tabs/tab{$i}.php", Array(), Array("MODE" => "html"));?>
				</div>
			<?endfor;?>
		</div>
	</div>
</div>

<section class="section-quote section-content">
	<h2>Прямая речь</h2>
	<div class="clearfix">
		<div class="author-block">
			<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/director.php", Array(), Array("MODE" => "html"));?>
		</div>
		<div class="text-block">
			<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/director-quote.php", Array(), Array("MODE" => "html"));?>
			
			<div class="button-right">
				<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
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
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => "t.remneva@krokus.ru",
		"FORM_TITLE" => "Форма обратной связи с руководителем",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "Карьера",
		"BUTTON_TITLE" => "",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
			</div>
		</div>
	</div>
</section>

<section>
	<h2>Истории успеха</h2>
	<ul class="list-success-stories">
		<?for($i = 1; $i <= 5; $i++):?>
			<li>
				<div class="visual">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/stories/person{$i}.php", Array(), Array("MODE" => "html"));?>
				</div>
				<div class="text-block">
					<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/stories/story{$i}.php", Array(), Array("MODE" => "html"));?>
				</div>
			</li>
		<?endfor;?>
		
	</ul>
</section>

<section data-anchor="career" class="section-choose-job">
<header class="heading-choose-job clearfix">
	<h2>Вакансии в моём городе</h2>
	<?/*
	CModule::IncludeModule( 'sale' );
	CModule::IncludeModule( 'catalog' );
	CModule::IncludeModule( 'iblock' );
	
	$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
	$CityName = $obLocation->getCity();
	$arOrder = array("SORT" => "ASC");
	$arFilter = array('IBLOCK_ID' => 9 , 'ACTIVE' => 'Y', 'NAME' => $CityName);
	$arSelect = array('ID');
	$rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);	
	if ($arSect = $rsSect->GetNext())	
		$city_id = $arSect['ID'];
	*/
	
	global $vacancyFilter;
	$city = intval($_GET["city"]);
	//$carier_start = ($_GET["carier_start"] == "Y" ? "Да" : "");
	//$retail_net = ($_GET["retail_net"] == "Y" ? "Да" : "");
	
	$vacancyFilter = array();	
	//if ($city_id) $vacancyFilter["SECTION_ID"] = $city_id;
	if ($city) $vacancyFilter["SECTION_ID"] = $city;
	//if ($carier_start) $vacancyFilter["PROPERTY_CARIER_START_VALUE"] = $carier_start;
	//if ($retail_net) $vacancyFilter["PROPERTY_RETAIL_NET_VALUE"] = $retail_net;
	?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"vacancy", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "vecancy",
		"IBLOCK_ID" => "9",
		"NEWS_COUNT" => "1000",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "vacancyFilter",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "DESCRIPTION",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_LAST_MODIFIED" => "N",
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
		"PAGER_TITLE" => "Новости",
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
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "vacancy",
		"STRICT_SECTION_CHECK" => "N",
		"FILE_404" => "",
		"PARAMETERS" => ""
	),
	false
);?>
</section>

<section class="section-special-offer">
	<h2>Если Вы не нашли подходящую вакансию, но вам интересна работа в нашей компании, то просто напишите нам</h2>
	<p>Всегда рады видеть в нашей команде ответственных профессионалов. Даже если сейчас у нас нет подходящей вакансии, отправьте свое резюме, возможно, мы не сможем отказать:)</p>
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
		"MANAGER_EMAIL" => "t.remneva@krokus.ru, o.ananskih@krokus.ru",
		"FORM_TITLE" => "Интересна работа в компании",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "Карьера",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</section>
<section class="section-faq">
	<h2>Как поступить, если...</h2>
	<ul class="list-faq">
		<?for($i = 1; $i <= 4; $i++):?>
			<li><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/faq/{$i}.php", Array(), Array("MODE" => "html"));?></li>
		<?endfor;?>
	</ul>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
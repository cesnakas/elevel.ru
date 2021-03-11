<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Сборщикам электрощитов");
$APPLICATION->SetPageProperty("description", "Компании Эlevel осуществляет продажу электрощитового оборудования. Купить электрощиты от ведущих мировых производителей на выгодных условиях.");
$APPLICATION->SetPageProperty("tags", "производство электрощитового оборудования, электрощитовое оборудование, электрощиты, щиты, сборка электрощитов, производство щитов, изготовление электрощитов, шкафы управления, электрощитовое оборудование, сертифицированные электрощиты, производство щитов, щиты по индивидуальному проекту, серийные щиты, щитовая продукция, щитовое оборудование, ГРЩ, главные распределительные щиты, ВРУ, вводно распределительные устройства, ЩР, щиты распределительные, АВР, автоматический ввод резерва, ЩУ, щиты управления, ЩА, циты автоматики, щиты учет, ЩО, щиты осветительные, ЩС, щиты силовые, электрощиты на заказ, низковольтные комплектные устройства, НКУ");
$APPLICATION->SetPageProperty("keywords", "электрощит, сборка электрощитов, электрощитовое оборудование, монтаж электрощита, установка электрощита, купить электрощиты, производство электрощитов, сборка электрощитового оборудования, производство электрощитового оборудования");
$APPLICATION->SetTitle("Сборщикам электрощитов");
?>
<div class="heading-partners clearfix">
	<h1 class="headline shielder">Сборщикам электрощитов</h1>
	<?$APPLICATION->IncludeComponent('magnitmedia:geoip.phone', '', array("TYPE" => "PHONE_CORP"), $component);?>
</div>
<div class="three-tick-columns">
	<h3>Мы предлагаем:</h3>
	<div class="clearfix">
		 <?for($i = 1; $i <= 3; $i++):?>
		<div class="column">
			 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/we_offer/{$i}.php", Array(), Array("MODE" => "html"));?>
		</div>
		 <?endfor;?>
	</div>
</div>
<div class="columns-calculate clearfix">
	<div class="column">
		<h3 class="headline calculator">Рассчитать ориентировочную стоимость оболочки для напольных шкафов ГРЩ или ВРУ</h3>
		 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"calculator1", 
	array(
		"BUTTON_TITLE" => "Рассчитать",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "calculator1",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Калькулятор стоимости оболочки для напольных шкафов ГРЩ или ВРУ",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "orsch_msk@elevel.ru",
		"PAGE_TITLE" => "Сборщикам электрощитов",
		"POPUP_TITLE" => "Ориентировочная стоимость оболочки для напольных шкафов ГРЩ или ВРУ",
		"PAGE_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "106",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
	</div>
	<div class="column">
		<h3 class="headline calculator">Рассчитать ориентировочную стоимость изготовления электрощита</h3>
		 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"calculator2", 
	array(
		"BUTTON_TITLE" => "Рассчитать",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "calculator2",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Калькулятор стоимости изготовления электрощита",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "orsch_msk@elevel.ru",
		"PAGE_TITLE" => "Сборщикам электрощитов",
		"POPUP_TITLE" => "Ориентировочная стоимость изготовления электрощита",
		"PAGE_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "107",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
	</div>
</div>
<?$APPLICATION->IncludeComponent('magnitmedia:geoip.manager_content', '', array("MANAGER_EMAIL" => "orsch_msk@elevel.ru",	"FORM_TITLE" => "Форма обратной связи с руководителем",	"PAGE_TITLE" => "Сборщикам электрощитов"), $component);?>

<section>
<h2>Только цифры, им можно доверять</h2>
<ul class="list-statistics-about">
	 <?for($i = 1; $i < 7; $i++):?>
	<li><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/numbers/{$i}.php", Array(), Array("MODE" => "html"));?></li>
	 <?endfor;?>
</ul>
 </section> <section class="section-brands section-content">
<h2>Ассортиментное предложение для щитовиков</h2>
 <?$APPLICATION->IncludeComponent(
	"magnitmedia:assortiment", 
	".default", 
	array(
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"HL_BLOCK_ID" => "1",
		"IBLOCK_ID" => "124",
		"IBLOCK_TYPE" => "vecancy",
		"SECTION_ID" => "47755"
	),
	false
);?> </section> <section class="section-special-offer">
<h2>Хотите получить специальное предложение или дополнительную услугу?</h2>
 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"form2", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "form2",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Спецпредложение или дополнительная услуга",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "orsch_msk@elevel.ru",
		"PAGE_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"PAGE_TITLE" => "Сборщикам электрощитов",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?> </section>

<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/other_services.php", Array(), Array("MODE" => "html"));?>
 
<section>
 <?
	CModule::IncludeModule("iblock");
	global $arFilterActions;
	$arFilter = array('IBLOCK_ID' => CORPORATIV_ACTIONS_IBLOCK_ID, "NAME" => "Для щитовиков");
	$rsSections = CIBlockSection::GetList(array('LEFT_MARGIN' => 'ASC'), $arFilter, false, array("ID"));
	if ($arSection = $rsSections->Fetch())
	{
		$arFilterActions["IBLOCK_SECTION_ID"] = $arSection["ID"];
	?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"actions",
	Array(
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
		"FIELD_CODE" => array(0=>"CODE",1=>"NAME",2=>"DETAIL_TEXT",3=>"DETAIL_PICTURE",4=>"DATE_ACTIVE_FROM",5=>"DATE_ACTIVE_TO",6=>"",),
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
		"PROPERTY_CODE" => array(0=>"",1=>"",),
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
		"H2_TITLE" => "Акции для щитовиков"
	)
);?> <?
	}
	?> </section> <section>
	<?
	global $arFilterNews;
	$tag1 = "орщ"; $tag2 = "новинка";
	$arFilterNews = array(
		"LOGIC" => "AND",
		Array(
			"LOGIC"=>"OR",
			Array("TAGS"=> $tag1.",%"),
			Array("TAGS"=>"%, ".$tag1),
			Array("TAGS"=>"%, ".$tag1.",%"),
			Array("TAGS"=> $tag1),
		),
		Array(
			"LOGIC"=>"OR",
			Array("TAGS"=> $tag2.",%"),
			Array("TAGS"=>"%, ".$tag2),
			Array("TAGS"=>"%, ".$tag2.",%"),
			Array("TAGS"=> $tag2),
		),
	);
	?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"news",
	Array(
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
		"FIELD_CODE" => array(0=>"NAME",1=>"DETAIL_PICTURE",2=>"",),
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
		"PROPERTY_CODE" => array(0=>"",1=>"",),
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
	)
);?> </section>

<section class="section-testimonials">
	<h2>Наши клиенты думают о нас</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/reviews.php", Array(), Array("MODE" => "html"));?>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

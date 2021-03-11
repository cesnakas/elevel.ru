<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "светотехнические проекты, светотехника, проект освещения, проектирование освещения, наружное освещение, внутреннее освещение, архитектурная подсветка, ландшафтное освещение, визуализация освещения, энергосберегающее освещение, современное освещение, классическое освещение, уличное освещение, техническое освещение, садово-парковое освещение, светотехнические работы, светильники, фонари, лампы, прожекторы, световые технологии, galad, targetti, amira, zumtobel, metako, opora, osram, philips, нордклифф, светотехнические услуги, декоративное освещение");
$APPLICATION->SetPageProperty("keywords", "светотехнические проекты, светотехника, проект освещения, проектирование освещения, наружное освещение, внутреннее освещение, архитектурная подсветка, ландшафтное освещение, визуализация освещения, энергосберегающее освещение, современное освещение, классическое освещение, уличное освещение, техническое освещение, садово-парковое освещение, светотехнические работы, светильники, фонари, лампы, прожекторы, световые технологии, galad, targetti, amira, zumtobel, metako, opora, osram, philips, нордклифф, светотехнические услуги, декоративное освещение");
$APPLICATION->SetTitle("Светотехнические решения");
?><h1 class="headline light">Светотехнические решения</h1>
<div class="top-service-block clearfix">
	<div class="left-block">
		<h3>Мы предлагаем:</h3>
		<ul class="list-ticks">
			 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/we_produce.php", Array(), Array("MODE" => "html"));?>
		</ul>
	</div>
	<div class="right-block">
		<div class="light-works-block">
			<h3>Бесплатно подберем замену люминесцентных светильников на эффективные светодиодные</h3>
			<div class="visual">
				<img src="/local/templates/corporativ/images/img16.jpg" alt="">
			</div>
			<div class="button-right">
				 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new",
	"manager_feedback_form",
	Array(
		"BUTTON_LINK" => "N",
		"BUTTON_TITLE" => "Свяжитесь со мной",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Бесплатно подберем замену люминесцентных светильников на эффективные светодиодные",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "sr_msk@elevel.ru",
		"PAGE_TITLE" => "",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "102"
	)
);?>
			</div>
		</div>
		<div class="light-works-block">
			<h3>Заказать бесплатный расчет освещенности</h3>
			<div class="visual">
				<img src="https://www.elevel.ru/upload/medialibrary/440/44001befaee982eebf0f68a5727b6914.jpg" alt="">
			</div>
			<div class="button-right">
				 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new",
	"manager_feedback_form",
	Array(
		"BUTTON_LINK" => "N",
		"BUTTON_TITLE" => "Заказать расчет",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Заказать бесплатный расчет освещенности",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "sr_msk@elevel.ru",
		"PAGE_TITLE" => "",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "102"
	)
);?>
			</div>
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
	Array(
		"BUTTON_LINK" => "N",
		"BUTTON_TITLE" => "",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Форма обратной связи с руководителем",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "sr_msk@elevel.ru",
		"PAGE_TITLE" => "",
		"PAGE_URL" => "",
		"POPUP_TITLE" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "102"
	)
);?>
		</div>
	</div>
</div>
 </section> <section class="section-steps section-content">
<h2>Как мы работаем</h2>
<ul class="list-steps three-steps">
	 <?for($i = 1; $i < 4; $i++):?>
	<li> <strong class="title">Шаг <?=$i?></strong>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/steps/{$i}.php", Array(), Array("MODE" => "html"));?> </li>
	 <?endfor;?>
</ul>
 </section> <section class="section-examples section-content">
<h2>Примеры работ</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/work_examples.php", Array(), Array("MODE" => "html"));?> </section> <section>
<h2>Только цифры, им можно доверять</h2>
<ul class="list-statistics-about">
	 <?for($i = 1; $i <= 6; $i++):?>
	<li><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/numbers/{$i}.php", Array(), Array("MODE" => "html"));?></li>
	 <?endfor;?>
</ul>
 </section> <section class="section-brands section-content">
<h2>Ассортиментное предложение по светотехнике</h2>
 <?$APPLICATION->IncludeComponent(
	"magnitmedia:assortiment",
	".default",
	Array(
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"HL_BLOCK_ID" => "1",
		"IBLOCK_ID" => "124",
		"IBLOCK_TYPE" => "vecancy",
		"SECTION_ID" => "48116"
	)
);?> </section>
<?
global $filterProjects;
$filterProjects = array(
  "PROPERTY_SOLUTION_TYPE_VALUE" => "светотехнические решения"
);
?>
<h1 class="headline projects">Наши проекты</h1>
 <section class="section-projects section-content">
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.smart.filter",
	"projects",
	Array(
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "projects",
		"CONVERT_CURRENCY" => "N",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "filterProjects",
		"FILTER_VIEW_MODE" => "vertical",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "88",
		"IBLOCK_TYPE" => "engineering_services",
		"PAGER_PARAMS_NAME" => "",
		"POPUP_POSITION" => "left",
		"PRICE_CODE" => array(),
		"PROPERTY_CODE" => array(0=>"YEAR",1=>"OTHER_PROJECTS",2=>"EQUIPMENT",3=>"OBJECT_TYPE",4=>"SOLUTION_TYPE",5=>"",),
		"SAVE_IN_SESSION" => "N",
		"SECTION_CODE" => "",
		"SECTION_DESCRIPTION" => "-",
		"SECTION_ID" => "",
		"SECTION_TITLE" => "-",
		"SEF_MODE" => "N",
		"TEMPLATE_THEME" => "blue",
		"XML_EXPORT" => "N"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"projects",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "projects",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"DETAIL_TEXT",3=>"DATE_ACTIVE_FROM",4=>"",),
		"FILTER_NAME" => "filterProjects",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "88",
		"IBLOCK_TYPE" => "engineering_services",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"YEAR",1=>"EQUIPMENT",2=>"OBJECT_TYPE",3=>"SOLUTION_TYPE",4=>"",),
		"SECTION_URL" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N"
	)
);?> <section class="section-special-offer">
<h2>Отправьте свой проект и задание - мы сделаем всё, чтобы результат вас приятно удивил!</h2>
 <?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new",
	"form2",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "form2",
		"EDIT_URL" => "",
		"FORM_TITLE" => "Отправьте свой проект и задание - мы сделаем всё, чтобы результат вас приятно удивил!",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"MANAGER_EMAIL" => "sr_msk@elevel.ru",
		"PAGE_TITLE" => "",
		"PAGE_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "102"
	)
);?> </section> <section class="section-testimonials">
<h2>Наши клиенты думают о нас</h2>
 <?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/reviews.php", Array(), Array("MODE" => "html"));?> </section> </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
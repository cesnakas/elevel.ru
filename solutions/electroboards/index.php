<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Электрощитовое оборудование и сборка электрощитов | Эlevel");
$APPLICATION->SetPageProperty("description", "Компании Эlevel осуществляет продажу электрощитового оборудования. Купить электрощиты от ведущих мировых производителей на выгодных условиях.");
$APPLICATION->SetPageProperty("tags", "производство электрощитового оборудования, электрощитовое оборудование, электрощиты, щиты, сборка электрощитов, производство щитов, изготовление электрощитов, шкафы управления, электрощитовое оборудование, сертифицированные электрощиты, производство щитов, щиты по индивидуальному проекту, серийные щиты, щитовая продукция, щитовое оборудование, ГРЩ, главные распределительные щиты, ВРУ, вводно распределительные устройства, ЩР, щиты распределительные, АВР, автоматический ввод резерва, ЩУ, щиты управления, ЩА, циты автоматики, щиты учет, ЩО, щиты осветительные, ЩС, щиты силовые, электрощиты на заказ, низковольтные комплектные устройства, НКУ");
$APPLICATION->SetPageProperty("keywords", "электрощит, сборка электрощитов, электрощитовое оборудование, монтаж электрощита, установка электрощита, купить электрощиты, производство электрощитов, сборка электрощитового оборудования, производство электрощитового оборудования");
$APPLICATION->SetTitle("Конструирование и производство электрощитового оборудования (НКУ)");
?>
<h1 class="headline electrical-board">Конструирование и производство электрощитового оборудования (НКУ)</h1>
<div class="top-service-block clearfix">
	<div class="left-block">
		<h3>Мы производим:</h3>
		<ul class="categories">
			<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/we_produce.php", Array(), Array("MODE" => "html"));?>
		</ul>
	</div>
	<div class="right-block">
		<h3 class="headline calculator">Рассчитать примерную стоимость электрощита</h3>
		<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"calculator1", 
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
		"WEB_FORM_ID" => "106",
		"COMPONENT_TEMPLATE" => "calculator1",
		"MANAGER_EMAIL" => "nku_msk@elevel.ru",
		"FORM_TITLE" => "Рассчитать примерную стоимость электрощита",
		"BUTTON_TITLE" => "Рассчитать",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "Конструирование и производство электрощитового оборудования (НКУ)",
		"POPUP_TITLE" => "Примерная стоимость электрощита",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
	</div>
	<div class="right-block">
		<h3>Получить коммерческое предложение на НКУ</h3>
		<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"form5", 
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
		"WEB_FORM_ID" => "105",
		"COMPONENT_TEMPLATE" => "form5",
		"MANAGER_EMAIL" => "nku_msk@elevel.ru",
		"FORM_TITLE" => "Получить коммерческое предложение на НКУ",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
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
		"MANAGER_EMAIL" => "nku_msk@elevel.ru",
		"FORM_TITLE" => "Форма обратной связи с руководителем",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "",
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
<section class="section-steps section-content">
	<h2>Как мы работаем</h2>
	<ul class="list-steps">
		<?for($i = 1; $i < 5; $i++):?>
			<li>
				<strong class="title">Шаг <?=$i?></strong>
				<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/steps/{$i}.php", Array(), Array("MODE" => "html"));?>
			</li>
		<?endfor;?>
	</ul>
</section>
<section class="section-places section-content">
	<h2>Производственные площадки в Москве, Санкт-Петербурге и Новосибирске</h2>
	<div class="slider-single list-places">
		<?for($i = 1; $i <= 3; $i++):?>
			<div>
				<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/places/{$i}.php", Array(), Array("MODE" => "html"));?>
			</div>
		<?endfor;?>
	</div>
</section>
<section class="section-inside section-content">
	<h2>Посмотрите наше производство изнутри</h2>
	<div class="slider-single list-inside">
		<div>
			<div class="slide-inner">
				<a href="#obzornoe-video" class="visual video-link lightbox-open">
					<img src="/img/img39.jpg" alt=""/>
				</a>
				<strong>Обзорное видео</strong>
			</div>
			
			<div class="lightbox-holder">
				<div id="obzornoe-video" class="lightbox">
					<h2>Обзорное видео</h2>
					<div class="main-video">
						<iframe width="100%" height="100%" src="https://www.youtube.com/embed/p4ilZfmcxX0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="slide-inner">
				<a href="#3d-tour" class="visual street-view lightbox-open">
					<img src="/img/img40.jpg" alt=""/>
				</a>
				<strong>3D тур</strong>
				
				<div class="lightbox-holder">
					<div id="3d-tour" class="lightbox">
						<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/3d-tour.php", Array(), Array("MODE" => "html"));?>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="slide-inner">
				<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"webcam_feedback_form", 
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
		"COMPONENT_TEMPLATE" => "webcam_feedback_form",
		"MANAGER_EMAIL" => "nku_msk@elevel.ru",
		"FORM_TITLE" => "Форма обратной связи с руководителем",
		"POPUP_TITLE" => "Для получения ссылки для просмотра web-камер онлайн заполните данные и отправьте заявку",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "",
		"BUTTON_TITLE" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
				<strong>Web камера онлайн</strong>
			</div>
		</div>
	</div>
</section>
<?
global $filterProjects;
$filterProjects = array(
  "PROPERTY_SOLUTION_TYPE_VALUE" => "производство электрощитов"
);
?>

<section class="section-production section-content">
	<h2>Примеры работ</h2>
	<div class="slider-production slider-arrow-position">
		<div>
			<div class="slide-inner">
				<a class="lightbox-open" href="#visual-lightbox4">
					<span class="visual"><img src="<?=$APPLICATION->GetCurDir()?>/images/img39.jpg" alt=""/></span>
					<strong>Lorem ipsum dolar</strong>
				</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed  do eiusmod tempor incididunt ut labore</p>
			</div>
		</div>
		<div>
			<div class="slide-inner">
				<a class="lightbox-open" href="#visual-lightbox5">
					<span class="visual"><img src="<?=$APPLICATION->GetCurDir()?>/images/img40.jpg" alt=""/></span>
					<strong>Lorem ipsum dolar</strong>
				</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed  do eiusmod tempor incididunt ut labore</p>
			</div>
		</div>
		<div>
			<div class="slide-inner">
				<a class="lightbox-open" href="#visual-lightbox6">
					<span class="visual"><img src="<?=$APPLICATION->GetCurDir()?>/images/img41.jpg" alt=""/></span>
					<strong>Lorem ipsum dolar</strong>
				</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed  do eiusmod tempor incididunt ut labore</p>
			</div>
		</div>	
		<div>
			<div class="slide-inner">
				<a class="lightbox-open" href="#visual-lightbox6">
					<span class="visual"><img src="<?=$APPLICATION->GetCurDir()?>/images/img41.jpg" alt=""/></span>
					<strong>Lorem ipsum dolar</strong>
				</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed  do eiusmod tempor incididunt ut labore</p>
			</div>
		</div>		
	</div>
</section>
<div class="lightbox-holder">
	<div class="lightbox visual-lightbox" id="visual-lightbox4">
		<img src="<?=$APPLICATION->GetCurDir()?>/images/img39-big.jpg" alt=""/>
		<h3>Lorem ipsum dolar</h3>
	</div>
	<div class="lightbox visual-lightbox" id="visual-lightbox5">
		<img src="<?=$APPLICATION->GetCurDir()?>/images/img40-big.jpg" alt=""/>
		<h3>Lorem ipsum dolar</h3>
	</div>
	<div class="lightbox visual-lightbox" id="visual-lightbox6">
		<img src="<?=$APPLICATION->GetCurDir()?>/images/img41-big.jpg" alt=""/>
		<h3>Lorem ipsum dolar</h3>
	</div>
</div>
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

<section class="section-documents section-content">
	<h2>Разрешительная документация, сертификаты</h2>
	<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/documents.php", Array(), Array("MODE" => "html"));?>
</section>

<section class="section-brands section-content">
	<h2>Ассортиментное предложение</h2>
	
	<?$APPLICATION->IncludeComponent("magnitmedia:assortiment", "", Array(
	"CACHE_TIME" => "86400",	// Время кеширования (сек.)
		"IBLOCK_ID" => "124",	// Инфоблок
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "vecancy",	// Тип инфоблока
		"SECTION_ID" => "48788",	// Страница Ассортимента
		"HL_BLOCK_ID" => "1",	// Справочник картинок производителей
		"CACHE_TYPE" => "A",	// Тип кеширования
	),
	false
);?>
</section>

<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/other_services.php", Array(), Array("MODE" => "html"));?>

<section class="section-special-offer">
	<h2>Хотите получить специальное предложение или дополнительную услугу?</h2>
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
		"MANAGER_EMAIL" => "nku_msk@elevel.ru",
		"FORM_TITLE" => "Хотите получить специальное предложение или дополнительную услугу?",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
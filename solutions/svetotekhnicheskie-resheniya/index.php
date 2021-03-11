<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Cветотехнические решения для компаний - Элевел.ру");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, сотрудничество, инвестору, заказчику, ген. подрядчику, производство, услуги, электрооборудование, электромонтаж, проектирование, электроснабежние, поставки, декоративное освещение, освещение, проектирование электроснабжения, умный дом, инженерные системы, автоматизация зданий, электроснабжение");
$APPLICATION->SetPageProperty("description", "Светотехнические решения для компаний, консультации и поддержка проектов  освещения");
$APPLICATION->SetTitle("Cветотехнические решения для компаний - Элевел.ру");
?>
<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/new_pages.css">
<!-- begin header_bottom_block -->
<div class="header_bottom_block-svet">
	<div class="container">
		<div class="row">
			<div class="parallax_block">
				<div class="parallax_txt_block clearfix" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
					 <span>Эlevel для профессионалов:</span>
				</div>
				<div class="parallax_txt_block_2" data-jkit="[parallax:strength=1;axis=y; detect=scroll]">
					<h1 class="gen_font-svet">СВЕТОТЕХНИЧЕСКИЕ РЕШЕНИЯ</h1>
				</div>
			</div>
		</div>
	</div>
</div>
 <!-- end header_bottom_block --> <!-- end header -->
<div class="gen_block_1">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<div class="callback_phone_block clearfix">
 <b>8 (495) 134-24-21</b>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="round_box_or">
					 или
				</div>
			</div>
			<div class="col-lg-5">
				<div class="coop_block" onclick="_gaq.push(['_trackEvent', 'nignyaya-knopka-zapros-new', 'click']); _gaq.push(['_trackPageview', '/nignyaya-knopka-zapros-new_click']); yaCounter1485305.reachGoal('nignyaya-knopka-zapros-new_click');">
					 начать сотрудничество
				</div>
			</div>
		</div>
	</div>
</div>
<div class="content_block_1 gen_block_2">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="image_block">
					<div class="img_box">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/leader.php"
	)
);?>
					</div>
					 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/name_post.php"
	)
);?>
				</div>
			</div>
			<div class="col-md-1">
			</div>
			<div class="col-md-7">
 <i class="oure_competence_txt">Наши компетенции:</i>
				<ul class="oure_competence">
					 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/competence.php"
	)
);?>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="from_me_block">
					<div class="from_me_img">
 <img src="/bitrix/templates/partners-light-nano/img/v_ico.png" alt="">
					</div>
					 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/from_me.php"
	)
);?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content_block_5 gen_block_4">
	<div class="container">
		<div class="row">
			<div class="second_step clearfix">
				<div class="col-md-3 hidden-xs">
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="step_block">
							<div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
								<h2 class="header_txt_50">Наши клиенты всякое думают о нас и не скрывают этого:</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="parallax_block_reviews_1" data-jkit="[parallax:strength=0.3; axis=y; detect=scroll]">
					<div class="reviews_block_bg1">
					</div>
				</div>
				<div class="parallax_block_reviews_2" data-jkit="[parallax:strength=0.6; axis=y; detect=scroll]">
					<div class="reviews_block_bg2">
					</div>
				</div>
				<div class="parallax_block_reviews_3" data-jkit="[parallax:strength=0.9; axis=y; detect=scroll]">
					<div class="reviews_block_bg3">
					</div>
				</div>
				 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "Y",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"IBLOCK_ID" => "111",
		"IBLOCK_TYPE" => "vecancy",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "DESCRIPTION",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "Y",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "reviews",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FILE_404" => ""
	),
	false
);?>
			</div>
		</div>
	</div>
</div>

<div class="content_block_2 gen_block_3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="steps_block">
					Мы в одной фразе
				</div>
				<h4 class="header_fz24">У всего есть светлая сторона – главное,  правильно её подчеркнуть. И в этом мы  профи.</h4>
			</div>
		</div>
	</div>
</div>


<div class="gen_block_5">
	<div class="container">
		<div class="row">
			<!--<div class="auto_height_block">-->
			</div>
			<div class="col-md-12">
				<div class="vertical_line line_1">
				</div>
			</div>
			<div class="col-md-7">
				<div class="step_block">
					<div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
						<h2 class="header_txt_50">Подробнее</h2>
					</div>
					<div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
						<h2 class="header_txt_50">о наших возможностях</h2>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<p>
					Создать комфортную среду обитания – цель, которую мы достигаем в каждом проекте.  Именно поэтому мы предлагаем комплексные  интеллектуальные световые решения, которые нацелены на эффективность и энергосбережение.  
Предлагаемые решения – это не только выгода для конечного потребителя. Это также экономия времени и  создание добавочной стоимости объекта для инвесторов проектов.

				</p>
			</div>
			<div class="col-md-12">
				<div class="round_arrow_block">
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_7.png" alt="">
					<h5>Предварительная консультация заказчика</h5>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_2.png" alt="">
					<h5>Аудит существующей ситуации на объекте</h5>
Составление технического задания на проектирование
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_3.png" alt="">
					<h5>Разработка концепции осветительной установки</h5>
					 2D, 3D-изображения, визуализация
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_4.png" alt="">
					<h5>Полный цикл проектирования</h5>
					«Светотехнический раздел», «Электротехнический раздел», «Система управления освещением»
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block row_3">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_5.png" alt="">
					<h5>Повышение энергоэффективности объектов</h5>
					 Автоматизация освещения, оптимизация источников света
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block row_3">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_6.png" alt="">
					<h5>поставка светотехнического оборудования</h5>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="about_us_block row_3">
 <img src="/bitrix/templates/partners-light-nano/img/about_us_ico_7.png" alt="">
					<h5>Монтаж,  нацеливание осветительных приборов, пуско-наладка оборудования</h5>
					 				</div>
			</div>
			<div class="col-md-3 col-sm-12">
				<div class="about_us_block row_3">
<img src="/bitrix/templates/partners-light-nano/img/about_us_ico_1.png" alt="">
					<h5>Сервисное обслуживание системы управления освещением</h5>
				</div>
			</div>

			</div>
		</div>
	</div>
</div>
<div class="content_block_6 gen_block_6">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-9">
				<div class="step_block">
					<div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
						<h2>Наши преимущества</h2>
					</div>
					<div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
						<p>
							не в обещаниях, а реальных достижениях, которые мы совершаем для Вас.
						</p>
					</div>
					<div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
						<p>
							Мы работаем так, чтобы наши преимущества помогали Вашему бизнесу:
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="five_step_container clearfix">
				<div class="five_step_curve curve_1 hidden-md hidden-sm hidden-xs">
				</div>
				<div class="five_step_curve curve_2 hidden-md hidden-sm hidden-xs">
				</div>
				<div class="five_step_curve curve_3 hidden-md hidden-sm hidden-xs">
				</div>
				<div class="five_step_curve curve_4 hidden-md hidden-sm hidden-xs">
				</div>
				<div class="five_step_row clearfix">
					<div class="col-xs-12 col-md-4 col-lg-3">
						<div class="six_step_img_block hidden-lg hidden-md">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_1.png" class="step_img_1">
						</div>
						<div class="parallax_box hidden-sm hidden-xs" data-jkit="[parallax:strength=0.1;axis=both]">
							<div class="six_step_img_block">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_1.png" class="step_img_1">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-8 col-lg-9">
						<div class="six_step_box odd_box">
							 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/compl_services.php"
	)
);?>
						</div>
					</div>
				</div>
				<div class="five_step_row clearfix">
					<div class="col-xs-12 hidden-md hidden-lg">
						<div class="parallax_box">
							<div class="six_step_img_block">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_2.png" class="step_img_2">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-8 col-lg-9">
						<div class="six_step_box even_box clearfix">
							 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/quality.php"
	)
);?>
						</div>
					</div>
					<div class="col-xs-12 col-md-4 col-lg-3 hidden-sm hidden-xs">
						<div class="parallax_box" data-jkit="[parallax:strength=0.1;axis=both]">
							<div class="six_step_img_block">
 <img alt="Первый шаг"  src="/bitrix/templates/partners-light-nano/img/step_4_img.png" class="step_img_4">
							</div>
						</div>
					</div>
				</div>
				<div class="five_step_row clearfix">
					<div class="col-xs-12 col-md-4 col-lg-3">
						<div class="six_step_img_block hidden-lg hidden-md">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_3.png" class="step_img_3">
						</div>
						<div class="parallax_box hidden-sm hidden-xs" id="para_2">
							<div class="six_step_img_block">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_3.png" class="step_img_3">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-8 col-lg-9">
						<div class="six_step_box odd_box">
							 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/relevance.php"
	)
);?>
						</div>
					</div>
				</div>
				<div class="five_step_row clearfix">
					<div class="col-xs-12 col-md-4 col-lg-3 hidden-md hidden-lg">
						<div class="parallax_box">
							<div class="six_step_img_block">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/step_4_img.png" class="step_img_4">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-8 col-lg-9">
						<div class="six_step_box even_box clearfix">
							 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/compl_delivery.php"
	)
);?>
						</div>
					</div>
					<div class="col-xs-12 col-md-4 col-lg-3 hidden-sm hidden-xs">
						<div class="parallax_box" id="para_3">
							<div class="six_step_img_block">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_2.png" class="step_img_3">
							</div>
						</div>
					</div>
				</div>
				<div class="five_step_row clearfix">
					<div class="col-xs-12 col-md-4 col-lg-3">
						<div class="six_step_img_block hidden-md hidden-lg">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_4.png" class="step_img_5">
						</div>
						<div class="parallax_box hidden-sm hidden-xs" id="para_4">
							<div class="six_step_img_block">
 <img alt="Первый шаг" src="/bitrix/templates/partners-light-nano/img/plus_img_4.png" class="step_img_5">
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-8 col-lg-9">
						<div class="six_step_box odd_box">
							 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/comfort_care.php"
	)
);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        
        <div class="content_block_5 project_block">
            <div class="container">
                <div class="row">
                    <div class="second_step clearfix">
                        <div class="col-md-3 hidden-xs"></div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="step_block">

                                    <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                        <h2 class="header_txt_60">Проекты</h2>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="parallax_block_reviews_1" data-jkit="[parallax:strength=0.3; axis=y; detect=scroll]">
                            <div class="reviews_block_bg1"></div>
                        </div>
                        <div class="parallax_block_reviews_2" data-jkit="[parallax:strength=0.6; axis=y; detect=scroll]">
                            <div class="reviews_block_bg2"></div>
                        </div>
                        <div class="parallax_block_reviews_3" data-jkit="[parallax:strength=0.9; axis=y; detect=scroll]">
                            <div class="reviews_block_bg3"></div>
                        </div>

						<?$APPLICATION->IncludeComponent("bitrix:news.list","projects",Array(
							"DISPLAY_DATE" => "Y",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"AJAX_MODE" => "N",
							"IBLOCK_TYPE" => "engineering_services",
							"IBLOCK_ID" => "88",
							"NEWS_COUNT" => "20",
							"SORT_BY1" => "SORT",
							"SORT_ORDER1" => "ASC",
							"SORT_BY2" => "DATE_ACTIVE_FROM",
							"SORT_ORDER2" => "DESC",
							"FILTER_NAME" => "",
							"FIELD_CODE" => Array("ID"),
							"PROPERTY_CODE" => Array("DESCRIPTION"),
							"CHECK_DATES" => "Y",
							"DETAIL_URL" => "",
							"PREVIEW_TRUNCATE_LEN" => "",
							"ACTIVE_DATE_FORMAT" => "d.m.Y",
							"SET_TITLE" => "N",
							"SET_BROWSER_TITLE" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_LAST_MODIFIED" => "Y",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
							"ADD_SECTIONS_CHAIN" => "Y",
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
							"AJAX_OPTION_ADDITIONAL" => ""
							)
						);?>

                    </div>
                </div>
            </div>
        </div>
	<div class="two_column_block clearfix" style="padding-top: 400px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="header_fz24">Мы предлагаем многое и готовы предложить больше, если Вы находитесь в поиске.</h4>
				</div>


<div class="col-md-6-svet">
					<div class="column_block">
						<h4 class="header_fz40">
						Краткий список  </h4>
						<h4 class="header_fz40">
						поставляемой продукции </h4>
						<div class="line_block">
						</div>
						 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/includes/svetotehnicheskie-rescheniya/supplied_products.php"
	)
);?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="callback_form_block">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="callback_phone_block clearfix">
 <b>8 (495) 134-24-21</b>
						<p>
							Свяжитесь с менеджером для начала проектного сотрудничества
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="callback_box">
						 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"formResult-nano-city_select",
	Array(
		"AJAX_MODE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "/sendquery/sended.php",
		"ELEMENT_ID" => 1417794,
		"IBLOCK_CITY" => 91,
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "/sendquery/sended.php",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "/sendquery/sended.php",
		"USE_EXTENDED_ERRORS" => "N",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",),
		"WEB_FORM_ID" => "93"
	)
);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Сотрудничество с Эlevel");
$APPLICATION->SetPageProperty("keywords", "Эlevel инженер, эlevel, elevel.ru, партнерство, сотрудничество, торговые партнеры, инвесторы, заказчики, ген. подрядчики, дизайнеры, архитекторы, строители, монтажники, сеть магазинов, розничные, оптовые, поставки электрооборудования, электротехника, розетки, выключатели, производство электрощитов, торговые электротехнические стенды, инсталляторы, проектирование, сопровождение проектов, разработка проектной документации");
$APPLICATION->SetPageProperty("description", "Сотрудничество с компанией Эlevel, партнерские программы");
$APPLICATION->SetTitle("Сотрудничество");
?><nav>
<div class="container">
	<div class="row">
		<div class="wrap_nav_block">
			<div class="col-lg-3 col-md-12">
				<div class="navigation_box">
					<ul class="navigation_block">
						<li class="active_block_bg">
						<a href="/solutions/">Инженерные услуги</a>
						<div class="close_btn">
						</div>
 </li>
						 <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left-active",
	Array(
		"CACHE_SELECTED_ITEMS" => "N",
		"CACHE_TIME" => 3600,
		"CACHE_TYPE" => "A",
		"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
		"MAX_LEVEL" => "1",
		"ROOT_MENU_TYPE" => "left_solutions_cable",
		"USE_EXT" => "Y"
	)
);?>
					</ul>
					<ul class="navigation_block">
						<li class="bg_gray">
						Поставки оборудования
						<div class="close_btn">
						</div>
 </li>
						 <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left-active",
	Array(
		"CACHE_SELECTED_ITEMS" => "N",
		"CACHE_TIME" => 3600,
		"CACHE_TYPE" => "A",
		"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
		"MAX_LEVEL" => "1",
		"ROOT_MENU_TYPE" => "left_partners_cable",
		"USE_EXT" => "Y"
	)
);?>
					</ul>
				</div>

				<div class="association-top visible-lg">
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
				</div>

			</div>
		</div>
		 <!-- begin content -->
		<div class="col-md-12 col-lg-9">
<!--
			<div class="search_nav_block clearfix">
				<div class="search_block">
					<form action="#">
						    <div class="select-container">
	                           <div id="search-category" class="search-category">

	                                <span category="0" class="first_menu">Искать по всему сайту <i class="tz-caret"></i></span>

	                                <div class="list-cat">
	                                    <ul>
	                                        <li><span category="0">Весь сайт</span></li>
	                                        <li><span category="1">Корпоративный сайт</span></li>
	                                        <li><span category="2">Интернет - магазин</span></li>
	                                    </ul>
	                                </div>
	                           </div>
	                        </div>  <input type="text" placeholder="Поиск по сайту..."> <input type="submit" value=""> <i class="search_bg"></i>
					</form>
				</div>
				<div class="wrap_nav hidden-lg">
					<div class="nav_btn">
					</div>
				</div>
			</div>-->
			<div class="main_content_txt">
				<h1>Инженерные услуги</h1>
				<p>Мы предлагаем решения, которые будут также актуальны спустя десятилетия. Возможно ли это? Безусловно, ведь мы сочетаем ценный опыт с инновационными разработками и проверяем точность выбранных шагов на каждом этапе работы — и всё это разрабатываем с учётом индивидуальных потребностей каждого клиента:<br><a href="/solutions/proekty-elevel/"> Подробнее</a></p>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"table", 
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
		"IBLOCK_ID" => "71",
		"IBLOCK_TYPE" => "vecancy",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "30",
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
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "table",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FILE_404" => "404_solutions.php"
	),
	false
);?>
		</div>
	</div>
</div>


 </nav>    <!-- end side navigation -->

<div class="association-bottom hidden-lg">
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
	</div>
</div>

<!-- begin footer --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
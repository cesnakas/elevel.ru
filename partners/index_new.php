<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

global $USER;
if ($USER->IsAdmin()):

$APPLICATION->SetPageProperty("title", "Сотрудничество с Эlevel");
$APPLICATION->SetPageProperty("keywords", "Эlevel инженер, эlevel, elevel.ru, партнерство, сотрудничество, торговые партнеры, инвесторы, заказчики, ген. подрядчики, дизайнеры, архитекторы, строители, монтажники, сеть магазинов, розничные, оптовые, поставки электрооборудования, электротехника, розетки, выключатели, производство электрощитов, торговые электротехнические стенды, инсталляторы, проектирование, сопровождение проектов, разработка проектной документации");
$APPLICATION->SetPageProperty("description", "Сотрудничество с компанией Эlevel, партнерские программы");
$APPLICATION->SetTitle("Сотрудничество");
?> 
<nav>
    <div class="container">
        <div class="row">
            <div class="wrap_nav_block">
                <div class="col-lg-3 col-md-12">
                    <div class="navigation_box">
                    
                        <ul class="navigation_block">
						    <li class="active_block_bg">
						        <span>Поставки оборудования</span>
						        <div class="close_btn"></div>
						    </li>
	                        <?$APPLICATION->IncludeComponent("bitrix:menu", "left-active", 
				                Array(
				                    "ROOT_MENU_TYPE" => "left_partners_cable", 
				                    "MAX_LEVEL" => "1", 
				                    "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU", 
				                    "USE_EXT" => "Y",
				                    "CACHE_TYPE" => "A",
				                    "CACHE_TIME" => 3600,
				                    "CACHE_SELECTED_ITEMS" => "N"
				                )
				            );?>
				          </ul> 
                    
                    
	                     <ul class="navigation_block">
							    <li class="bg_gray">
							        <span>Инженерные услуги</span>
							        <div class="close_btn"></div>
							    </li>
							 	<?$APPLICATION->IncludeComponent("bitrix:menu", "left-active", 
					                Array(
					                    "ROOT_MENU_TYPE" => "left_solutions_cable", 
					                    "MAX_LEVEL" => "1", 
					                    "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU", 
					                    "USE_EXT" => "Y",
					                    "CACHE_TYPE" => "A",
					                    "CACHE_TIME" => 3600,
					                    "CACHE_SELECTED_ITEMS" => "N"
					                )
					            );?>
				          </ul> 
                    <?/*$APPLICATION->IncludeComponent("bitrix:news.list","left-list-active",Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "vecancy",
						"IBLOCK_ID" => "69",
						"NEWS_COUNT" => "30",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "NAME",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "mcFilter",
						"FIELD_CODE" => Array("ID"),
						"PROPERTY_CODE" => Array("DESCRIPTION"),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "Y",
						"SET_BROWSER_TITLE" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_META_DESCRIPTION" => "Y",
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
					);*/?>
                    
                    
                    <?/*$APPLICATION->IncludeComponent("bitrix:news.list","left-list",Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "vecancy",
						"IBLOCK_ID" => "70",
						"NEWS_COUNT" => "30",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "NAME",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "mcFilter",
						"FIELD_CODE" => Array("ID"),
						"PROPERTY_CODE" => Array("DESCRIPTION"),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "Y",
						"SET_BROWSER_TITLE" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_META_DESCRIPTION" => "Y",
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
					);*/?>
                    
                       <!-- <ul class="navigation_block first_block">
                            <li class="first_nav bg_gray">
                                <span>Инженерные услуги</span>
                            </li>
                            <li><a href="#">Проектирование систем электроснабжения и освещения</a></li>
                            <li><a href="#">Инженерная и промышленная автоматизация</a></li>
                            <li><a href="#">Электромонтаж и электролаборатория</a></li>
                            <li><a href="#">Производство электрощитов по заказу</a></li>
                            <li><a href="#">Системы кабельного обогрева</a></li>
                        </ul>   -->
                    </div>

                </div>
            </div>

            <!-- begin content -->

            <div class="col-md-12 col-lg-9">
                <div class="search_nav_block clearfix">
                    <div class="search_block">
                        <form action="#">
                         <!--  
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
                        </div>   -->
                           
                            <input type="text" placeholder="Поиск по сайту...">
                            <input type="submit" value="">
                            <i class="search_bg"></i>
                        </form>
                    </div>
                    <div class="wrap_nav hidden-lg">
                        <div class="nav_btn"></div>
                    </div>
                </div>

                <div class="main_content_txt">
                    <span>Компания Эlevel предлагает услуги проектирования и реализацию инженерных решений:</span>
                </div>

                <?$APPLICATION->IncludeComponent("bitrix:news.list","table",Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "vecancy",
						"IBLOCK_ID" => "70",
						"NEWS_COUNT" => "30",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"SORT_BY2" => "NAME",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						"FIELD_CODE" => Array("ID"),
						"PROPERTY_CODE" => Array("DESCRIPTION"),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "Y",
						"SET_BROWSER_TITLE" => "Y",
						"SET_META_KEYWORDS" => "Y",
						"SET_META_DESCRIPTION" => "Y",
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
</nav>    <!-- end side navigation -->

<!-- begin footer -->

<?endif?> <?// user->isAdmin?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


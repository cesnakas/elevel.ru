<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

global $USER;
if ($USER->IsAdmin()):

$APPLICATION->SetPageProperty("title", "Предложение сотрудничества дизайнеру и архитектору");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, сотрудничество, дизайнеру, архитектору, обеспечение, снабжение, поставки, подбор, демонстрация, электрооборудование, электротехническое оборудование, автоматизация зданий, электроинсталляция, домофоны, звонки, выключатели, розетки");
$APPLICATION->SetPageProperty("keywords", "Эlevel инженер, эlevel, elevel.ru, партнерство, сотрудничество, дизайнеру, архитектору, обеспечение, снабжение, поставки, подбор, демонстрация, электрооборудование, электротехническое оборудование, автоматизация зданий, электроинсталляция, домофоны, звонки, выключатели, розетки, демонстрационный зал, презентация, gira, abb, schneider electric, fontini, gi gambarellim merten, legrand, bticino, mk electric, fede,  декоративное электрооборудование, элитные серии выключателей");
$APPLICATION->SetPageProperty("description", "Сотрудничество с Эlevel для дизайнеров и архитекторов");
$APPLICATION->SetTitle("Дизайнеру и архитектору");
$APPLICATION->AddHeadString('<link href="http://allfont.ru/allfont.css?fonts=franklin-gothic-demi-cond" rel="stylesheet" type="text/css" />');
$APPLICATION->AddHeadString('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">');
$APPLICATION->AddHeadString('<script src="'.SITE_TEMPLATE_PATH.'/script.js"></script>');

$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>



  <?$mcFilter = array("=PROPERTY_MANAGER_CITY_VALUE" => $_SESSION["office_city"]);?>
  <?$APPLICATION->IncludeComponent("bitrix:news.list","managers",Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "vecancy",
		"IBLOCK_ID" => "68",
		"NEWS_COUNT" => "1",
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
	);?>
	
    <div class="content_block_2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="steps_block">3 шага на встречу друг другу:</div>
                </div>
                <div class="col-md-12">
                    <div class="vertical_line"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_block_3">
        <div class="container">
            <div class="row">
                <div class="step_one_block">
                    <div class="col-md-6">
                        <div class="step_block">
                            <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                <p>Шаг первый:</p>
                            </div>
                            <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                <h2>Давайте знакомиться</h2>
                            </div>
                            
                            <span>
	                            <?$APPLICATION->IncludeComponent(
									  "bitrix:main.include",
									  "",
									  Array(
									    "AREA_FILE_SHOW" => "file", 
									    "AREA_FILE_SUFFIX" => "",
									    "EDIT_TEMPLATE" => "",
									    "PATH" => "/includes/design-arch-nano/step1.php" 
									  )
								);?>
							</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_block_4 hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="vertical_line"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_block_5">
        <div class="container">
            <div class="row">
                <div class="second_step clearfix">
                    <div class="col-md-6 hidden-xs"></div>
                    <div class="col-md-6">
                        <div class="step_block">
                            <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                <p>Шаг второй:</p>
                            </div>
                            <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                <h2>Узнайте, как мы работаем</h2>
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

                    
                    <?$APPLICATION->IncludeComponent("bitrix:news.list","reviews",Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "Y",
						"IBLOCK_TYPE" => "vecancy",
						"IBLOCK_ID" => "69",
						"NEWS_COUNT" => "20",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
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
    </div>
    <div class="content_block_6">
        <div class="container">
            <div class="row">
                <div class="vertical_line hidden-xs"></div>
                <div class="col-md-9">
                    <div class="step_block">
                        <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                            <p>Шаг третий:</p>
                        </div>
                        <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                            <h2>Попробуйте - с нами действительно удобно!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="five_step_container clearfix">

                    <div class="five_step_curve curve_1 hidden-md hidden-sm hidden-xs"></div>
                    <div class="five_step_curve curve_2 hidden-md hidden-sm hidden-xs"></div>
                    <div class="five_step_curve curve_3 hidden-md hidden-sm hidden-xs"></div>
                    <div class="five_step_curve curve_4 hidden-md hidden-sm hidden-xs"></div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3">
                            <div class="six_step_img_block hidden-lg hidden-md">
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/step_1_img.png" alt="Первый шаг" class="step_img_1">
                            </div>
                            <div class="parallax_box hidden-sm hidden-xs" data-jkit="[parallax:strength=0.1;axis=both]">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_1_img.png" alt="Первый шаг" class="step_img_1">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-9">
                            <div class="six_step_box odd_box">
                                <h3>Забудьте</h3>
                                <p>
	                                <?$APPLICATION->IncludeComponent(
										  "bitrix:main.include",
										  "",
										  Array(
										    "AREA_FILE_SHOW" => "file", 
										    "AREA_FILE_SUFFIX" => "",
										    "EDIT_TEMPLATE" => "",
										    "PATH" => "/includes/design-arch-nano/step3_forget.php" 
										  )
									);?>
								</p>
                                
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 hidden-md hidden-lg">
                            <div class="parallax_box">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_2_img.png" alt="Первый шаг" class="step_img_2">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-9">
                            <div class="six_step_box even_box clearfix">
                                <h3>Экспериментируйте</h3>
                                <p>
                                	<?$APPLICATION->IncludeComponent(
										  "bitrix:main.include",
										  "",
										  Array(
										    "AREA_FILE_SHOW" => "file", 
										    "AREA_FILE_SUFFIX" => "",
										    "EDIT_TEMPLATE" => "",
										    "PATH" => "/includes/design-arch-nano/step3_experiment.php" 
										  )
									);?>
                                </p>
                                <div class="btn_start six_step_btn" onclick="_gaq.push(['_trackEvent', 'nignyaya-knopka-zapros-new', 'click']); _gaq.push(['_trackPageview', '/nignyaya-knopka-zapros-new_click']); yaCounter1485305.reachGoal('nignyaya-knopka-zapros-new_click');">Начать сотрудничество</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-3 hidden-sm hidden-xs">
                            <div class="parallax_box" data-jkit="[parallax:strength=0.1;axis=both]">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_2_img.png" alt="Первый шаг" class="step_img_2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3">
                            <div class="six_step_img_block hidden-lg hidden-md">
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/step_3_img.png" alt="Первый шаг" class="step_img_3">
                            </div>
                            <div class="parallax_box hidden-sm hidden-xs" id="para_2">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_3_img.png" alt="Первый шаг" class="step_img_3">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-9">
                            <div class="six_step_box odd_box">
                                <h3>Наслаждайтесь комфортом</h3>
                                
                                <p>
                                	<?$APPLICATION->IncludeComponent(
										  "bitrix:main.include",
										  "",
										  Array(
										    "AREA_FILE_SHOW" => "file", 
										    "AREA_FILE_SUFFIX" => "",
										    "EDIT_TEMPLATE" => "",
										    "PATH" => "/includes/design-arch-nano/step3_enjoy.php" 
										  )
									);?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3 hidden-md hidden-lg">
                            <div class="parallax_box">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_4_img.png" alt="Первый шаг" class="step_img_4">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-9">
                            <div class="six_step_box even_box clearfix">
                                <h3>Не ищите</h3>
                                <p>
                                	<?$APPLICATION->IncludeComponent(
										  "bitrix:main.include",
										  "",
										  Array(
										    "AREA_FILE_SHOW" => "file", 
										    "AREA_FILE_SUFFIX" => "",
										    "EDIT_TEMPLATE" => "",
										    "PATH" => "/includes/design-arch-nano/step3_dont_search.php" 
										  )
									);?>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-3 hidden-sm hidden-xs">
                            <div class="parallax_box" id="para_3">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_4_img.png" alt="Первый шаг" class="step_img_4">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3">
                            <div class="six_step_img_block hidden-md hidden-lg">
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/step_5_img.png" alt="Первый шаг" class="step_img_5">
                            </div>
                            <div class="parallax_box hidden-sm hidden-xs" id="para_4">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_5_img.png" alt="Первый шаг" class="step_img_5">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-9">
                            <div class="six_step_box odd_box">
                                <h3>И последнее - не ждите!</h3>
                                <p>
                                	<?$APPLICATION->IncludeComponent(
										  "bitrix:main.include",
										  "",
										  Array(
										    "AREA_FILE_SHOW" => "file", 
										    "AREA_FILE_SUFFIX" => "",
										    "EDIT_TEMPLATE" => "",
										    "PATH" => "/includes/design-arch-nano/step3_dont_wait.php" 
										  )
									);?>
                                </p>
                            </div>
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
                            <b>8 (495) 363-32-03</b>
                            <p>Свяжитесь с менеджером для начала проектного сотрудничества</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="callback_box">
                        
	                        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom-nano2", Array(
				                "SEF_MODE" => "N",    // Включить поддержку ЧПУ
				                "AJAX_MODE" => "N",
				                "WEB_FORM_ID" => "80",    // ID веб-формы
				                "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
				                "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
				                "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
				                "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
				                "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
				                "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
				                "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
				                "CACHE_TYPE" => "A",    // Тип кеширования
				                "CACHE_TIME" => "3600",    // Время кеширования (сек.)
				                "VARIABLE_ALIASES" => array(
				                    "WEB_FORM_ID" => "WEB_FORM_ID",
				                    "RESULT_ID" => "RESULT_ID",
				                )
				                ),
				                false
		                    );?>     
		                    
                           <div class="ans-container">
                           		<div class="callback_ico"></div>
                           		<p class="success-msg"></p>
                           		<p>Разделы, которые могут вас заинтересовать</p>
                           		
                           		<div class="links">
                           		
                           			<a href="/solutions/" class="orange">Инженерные услуги</a>
                           			<a href="/partners/" class="orange">Поставки оборудования</a>
                           			<a href="/catalog/" class="green">Интернет магазин</a>
                           			
                           		</div>
                           </div>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?endif?> <?// user->isAdmin?>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
 
   
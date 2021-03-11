<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Кабельные системы обогрева | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и реализацию кабельных систем обогрева");
$APPLICATION->SetPageProperty("tags", "кабель обогрева, системы кабельного обогрева, кабельные системы обогрева кровли, кабельные системы обогрева трубопроводов, кабельные системы обогрева и отопления, кабельные системы обогрева труб, теплый пол, системы обогрева, система обогрева дома, системы обогрева помещений, системы обогрева крышь, обогрев водостоков, обогрев крыш, обогрев пола, обогрев участков, обогрев теплыми полами, подогрев газонов, греющий кабель, электрообогрев, нагревательный кабель, подогрев грунта");
$APPLICATION->SetPageProperty("keywords", "кабельный обогрев, кабельные системы обогрева, кабельный обогрев система");
$APPLICATION->SetTitle("Системы кабельного обогрева ");
?>
	        <!-- begin header_bottom_block -->
        <div class="header_bottom_block">
            <div class="container">
                <div class="row">
                    <div class="parallax_block">
                        <div class="parallax_txt_block clearfix" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                            <span>Проекты Эlevel:</span>
                        </div>
                        <div class="parallax_txt_block_2" data-jkit="[parallax:strength=1;axis=y; detect=scroll]">
                            <h1 class="gen_font">Системы<br> кабельного<br> обогрева</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header_bottom_block -->

    </header>
    <!-- end header -->

    <div class="gen_block_1 electrics">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="callback_phone_block clearfix">
                        <b>8 (495) 363-32-03</b>
                    </div>

                </div>
                <div class="col-lg-2">
                    <div class="round_box_or">
                        <span>или</span>
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
    <div class="content_block_1 gen_block_2 electrics">
        <div class="container">
            <div class="row">
                <?$mcFilter = array("=PROPERTY_MANAGER_CITY_VALUE" => $_SESSION["office_city"]);?>
				<?$APPLICATION->IncludeComponent("bitrix:news.list","managers-short",Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "engineering_services",
						"IBLOCK_ID" => "100",
						"NEWS_COUNT" => "1",
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
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

                <div class="col-md-1"></div>
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
								"PATH" => "/includes/solutions/cable_systems/competence.php" 
							)
						);?>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="from_me_block">
                        <div class="from_me_img">
                            <img src="<?=SITE_TEMPLATE_PATH?>/img/v_ico.png" alt="">
                        </div>
                        <?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file", 
								"AREA_FILE_SUFFIX" => "",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/includes/solutions/cable_systems/from_me.php" 
							)
						);?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content_block_2 gen_block_3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="steps_block">Мы в одной фразе</div>
                    <h4 class="header_fz24">Круглогодичный комфорт — это не заслуга природы, а дело человеческих рук, а точнее рук специалистов Элевел.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="content_block_5 gen_block_4">
        <div class="container">
            <div class="row">
                <div class="second_step clearfix">
                    <div class="col-md-3 hidden-xs"></div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="step_block">

                                <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                    <h2 class="header_txt_60">Ваши истории о нас:</h2>
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

					<?$APPLICATION->IncludeComponent("bitrix:news.list","reviews",Array(
						"DISPLAY_DATE" => "Y",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"AJAX_MODE" => "Y",
						"IBLOCK_TYPE" => "engineering_services",
						"IBLOCK_ID" => "85",
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
    <div class="gen_block_5">
        <div class="container">
            <div class="row">

                <div id="auto_height_230"></div>

                <div class="col-md-12">
                    <div class="vertical_line"></div>
                </div>

            </div>
        </div>
    </div>

    <div class="content_block_6 gen_block_6 electric">
        <div class="container">
            <div class="row">

                <div class="two_column_block clearfix">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="column_block">
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file", 
										"AREA_FILE_SUFFIX" => "",
										"EDIT_TEMPLATE" => "",
										"PATH" => "/includes/solutions/cable_systems/systems_of_universal_use.php" 
									)
								);?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="column_block right_align">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										Array(
											"AREA_FILE_SHOW" => "file", 
											"AREA_FILE_SUFFIX" => "",
											"EDIT_TEMPLATE" => "",
											"PATH" => "/includes/solutions/cable_systems/cable_heating_systems.php" 
										)
									);?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="vertical_line"></div>
                            </div>

                        </div>

                    </div>
                </div>


                <div class="col-md-12">
                    <div class="step_block">

                        <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                            <h2>Наши преимущества</h2>
                        </div>

                        <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                            <p>не в обещаниях, а реальных достижениях, которые мы совершаем для Вас.
                                <br> Мы работаем так, чтобы наши преимущества помогали Вашему бизнесу:</p>
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
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_1.png" alt="Первый шаг" class="plus_img_1">
                            </div>
                            <div class="parallax_box hidden-sm hidden-xs" data-jkit="[parallax:strength=0.1;axis=both]">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_1.png" alt="Первый шаг" class="plus_img_1">
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
										"PATH" => "/includes/solutions/cable_systems/compl_services.php" 
									)
								);?>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 hidden-md hidden-lg">
                            <div class="parallax_box">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_4.png" alt="Первый шаг" class="step_img_5">
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
										"PATH" => "/includes/solutions/cable_systems/qualification_competence.php" 
									)
								);?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-3 hidden-sm hidden-xs">
                            <div class="parallax_box" data-jkit="[parallax:strength=0.1;axis=both]">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_4.png" alt="Первый шаг" class="step_img_5">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3">
                            <div class="six_step_img_block hidden-lg hidden-md">
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_2.png" alt="Первый шаг" class="plus_img_2">
                            </div>
                            <div class="parallax_box hidden-sm hidden-xs" id="para_2">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_2.png" alt="Первый шаг" class="plus_img_2">
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
										"PATH" => "/includes/solutions/cable_systems/electrical_components.php" 
									)
								);?>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3 hidden-md hidden-lg">
                            <div class="parallax_box">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_3.png" alt="Первый шаг" class="plus_img_3">
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
										"PATH" => "/includes/solutions/cable_systems/relevance_efficiency.php" 
									)
								);?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 col-lg-3 hidden-sm hidden-xs">
                            <div class="parallax_box" id="para_3">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/plus_img_3.png" alt="Первый шаг" class="plus_img_3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="five_step_row clearfix">
                        <div class="col-xs-12 col-md-4 col-lg-3">
                            <div class="six_step_img_block hidden-lg hidden-md">
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/step_4_img.png" alt="Первый шаг" class="step_img_4">
                            </div>
                            <div class="parallax_box hidden-sm hidden-xs" id="para_2">
                                <div class="six_step_img_block">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/img/step_4_img.png" alt="Первый шаг" class="step_img_4">
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
										"PATH" => "/includes/solutions/cable_systems/quality_reliability.php" 
									)
								);?>
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
							<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult-nano-city_select", Array(
									"SEF_MODE" => "N",    // Включить поддержку ЧПУ
									"AJAX_MODE" => "N",
									"WEB_FORM_ID" => "86",    // ID веб-формы
									"LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
									"EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
									"SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
									"CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
									"CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
									"IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
									"USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
									"CACHE_TYPE" => "A",    // Тип кеширования
									"CACHE_TIME" => "3600",    // Время кеширования (сек.)
									"VARIABLE_ALIASES" => 
									array(
									"WEB_FORM_ID" => "WEB_FORM_ID",
									"RESULT_ID" => "RESULT_ID",
									),
									"IBLOCK_CITY" => 91,
									"ELEMENT_ID" => 1417895,
									),
								false
							);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
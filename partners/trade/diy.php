<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?SetCookie("PARTNERS_TAB","diy");?>
<div class="content_block_1">
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
								"PATH" => "/includes/partners/trade/diy/leader.php" 
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
							"PATH" => "/includes/partners/trade/diy/name_post.php" 
						)
					);?>
                </div>
            </div>

            <div class="col-md-8">
                <div class="from_me_block">
                    <div class="from_me_img">
                        <img src="/includes/nano/icons/v_ico.png" alt="">
                    </div>
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file", 
							"AREA_FILE_SUFFIX" => "",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/includes/partners/trade/diy/from_me.php" 
						)
					);?>

                </div>

            </div>

        </div>
    </div>
</div>
<div class="content_block_2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="steps_block">Мы в одной фразе</div>
                <h4 class="header_fz24">Когда-то всё было в Греции – теперь всё есть у нас!!!</h4>
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
                                <h2 class="header_txt_60">Наши клиенты всякое думают о<br>нас. И не скрывают этого:</h2>
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
					"AJAX_MODE" => "N",
					"IBLOCK_TYPE" => "cooperation",
					"IBLOCK_ID" => "95",
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

            <div id="auto_height_180"></div>

            <div class="col-md-12">
                <div class="vertical_line"></div>
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
                <div class="step_block">
                   
                    <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                        <p>Для  сетей строительных магазинов, работающих в формате DIY, мы предлагаем специальные условия сотрудничества. Мы готовы взять на себя полностью процесс организации эффективной продажи электрооборудования в необходимом объеме ассортимента!</p>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-12">
                <div class="round_arrow_block"></div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="about_us_block">
                    <div class="about_us_img">
                        <img src="/includes/nano/icons/b_about_ico_2.png" alt="">
                    </div>
                    <div class="about_us_txt">
                        <h5>Подберём оптимальный</h5>
                        <span>товарный запас с  учетом особенностей региона расположения каждого магазина </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="about_us_block">
                    <div class="about_us_img">
                        <img src="/includes/nano/icons/b_about_ico_8.png" alt="">
                    </div>
                    <div class="about_us_txt">
                        <h5>Разработаем эффективную</h5>
                        <span>выкладку электротехнической продукции</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="about_us_block">
                    <div class="about_us_img">
                        <img src="/includes/nano/icons/b_about_ico_6.png" alt="">
                    </div>
                    <div class="about_us_txt">
                        <h5>Обучим ваш торговый персонал</h5>
                        <span>или предоставим мерчендайзеров для выкладки и продвижения товара</span>
                    </div>
                </div>
            </div>

            
            <div class="col-md-12 col-sm-12">
                <div class="vertical_line brigade"></div>
            </div>

        </div>
    </div>
</div>

<div class="content_block_6 gen_block_6">
    
    <div class="two_column_block clearfix">
        <div class="container">
            <div class="row">
               
                <div class="col-md-12">
                    
                    <h3>Наши преимущества, которые помогут<br> Вам «рассмотреть» нас со всех сторон:</h3>
                    
                    <div class="line_block"></div>
                    
                </div>

                <div class="col-md-6">
                    <div class="column_block">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file", 
								"AREA_FILE_SUFFIX" => "",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/includes/partners/trade/diy/advantages_left.php" 
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
								"PATH" => "/includes/partners/trade/diy/advantages_right.php" 
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
                        <b>8 (495) 363-32-03</b>
                        <p>Свяжитесь с менеджером для начала проектного сотрудничества</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="callback_box">
						<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult-nano-city_select", Array(
								"SEF_MODE" => "N",    // Включить поддержку ЧПУ
								"AJAX_MODE" => "N",
								"WEB_FORM_ID" => "90",    // ID веб-формы
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
								"ELEMENT_ID" => 1424961,
								),
							false
						);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
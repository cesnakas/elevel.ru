<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Предложение сотрудничества электромонтажнику, частному лицу от Эlevel");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, предложение сотрудничества электромонтажнику, частному лицу, адреса, телефоны, магазины, контакты, филиалы, точки розничной торговли, офисы продаж, шоу-румы, демзалы, демонстрационные залы");
$APPLICATION->SetPageProperty("keywords", "адреса, телефоны, магазины, контакты, филиалы, точки розничной торговли, офисы продаж, шоу-румы, демзалы, демонстрационные залы");
$APPLICATION->SetPageProperty("description", "Контакты офисов продаж, демонстрационных залов, шоу-румов, магазинов и точек розничной торговли, розничной сети Эlevel и филиалов");
$APPLICATION->SetTitle("Контактная информация о компании");	

?>
    <!-- begin header_bottom_block -->
    <div class="header_bottom_block">
        <div class="container">
            <div class="row">
                <div class="parallax_block">
                    <div class="parallax_txt_block clearfix" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                        <span>Эlevel для пофессионалов:</span>
                    </div>
                    <div class="parallax_txt_block_2" data-jkit="[parallax:strength=1;axis=y; detect=scroll]">
                        <h1>Электромонтажникам <br> и ЧАСТНЫМ ЛИЦАМ</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header_bottom_block -->

    <div class="gen_block_1">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="callback_phone_block clearfix">
                        <b>8 (495) 363-32-03</b>
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="round_box_or">
                        <span>или</span>
                    </div>
                </div>
                <div class="col-md-5">
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

                <div class="col-md-5">
                    <div class="image_block">
                        <div class="img_box">
                        	<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file", 
									"AREA_FILE_SUFFIX" => "",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/includes/shop/leader.php" 
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
								"PATH" => "/includes/shop/name_post.php" 
							)
						);?>
                    </div>
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
								"PATH" => "/includes/shop/competence.php" 
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
								"PATH" => "/includes/shop/from_me.php" 
							)
						);?>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>


</header>
<!-- end header -->

<div class="content_block_2 gen_block_3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="steps_block">Мы в одной фразе</div>
                <h4 class="header_fz24">Вы – клиент. И Вы правы. Поэтому мы работаем по Вашим правилам</h4>
            </div>
        </div>
    </div>
</div>
<div class="content_block_5 gen_block_4">
    <div class="container">
        <div class="row">
            <div class="second_step clearfix">
                <div class="col-md-3 hidden-xs"></div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="step_block">
                            <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                                <h2 class="header_txt_50">Ваши истории <br>о нас:</h2>
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
					"IBLOCK_TYPE" => "vecancy",
					"IBLOCK_ID" => "74",
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

<div class="gen_block_5">
    <div class="container">
        <div class="row">

            <div class="auto_height_block"></div>

            <div class="col-md-12">
                <div class="vertical_line vertical_line_3"></div>
            </div>

            <div class="col-md-12">
                <div class="step_block">
                    <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                        <h2 class="header_txt_50">Подробнее</h2>
                    </div>
                    <div class="parallax_txt_block" data-jkit="[parallax:strength=1; axis=y; detect=scroll]">
                        <h2 class="header_txt_50">о наших возможностях</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <p>Наши услуги для частных лиц включают в себя всё необходимое, что может понадобиться, если Вы решили повысить комфорт и безопасность своего жилья. Мы предлагаем полный комплекс услуг инженерного проектирования, начиная с консультаций и составления технического задания с комплектацией проектов до монтажных и пусконаладочных работ с последующим гарантийным и сервисным обслуживанием установленных систем.</p>
            </div>
            <div class="col-md-2"></div>

            <div class="col-md-12">
                <div class="round_arrow_block"></div>
            </div>

            <div class="col-md-12">
                <div class="about_header_block clearfix">
                    <div class="header_block">
                        <h4>Инженерые системы</h4>
                        <h4>«под ключ»</h4>
                    </div>
                    <div class="about_v_line"></div>
                    <div class="header_block green_font">
                        <h4>для частных</h4>
                        <h4>покупателей:</h4>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about_us_block">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/about_us_ico_1.png" alt="">
                    <h5>проектирование Систем электроснабжения</h5>
                    <span>энергосбережения и безопасности зданий</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about_us_block">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/about_us_ico_2.png" alt="">
                    <h5>Автоматизация зданий</h5>
                    <span>(на базе технологии KNX и др.)</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about_us_block">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/about_us_ico_3.png" alt="">
                    <h5>Диспетчеризация </h5>
                    <span>инженерных систем</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about_us_block">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/about_us_ico_4.png" alt="">
                    <h5>Системы внутреннего <br>и наружного </h5>
                    <span>освещения зданий</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about_us_block">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/about_us_ico_5.png" alt="">
                    <h5>Производство <br>электрощитов </h5>
                    <span>до 3200А</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="about_us_block">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/about_us_ico_6.png" alt="">
                    <h5>Системы антиобледенения и кабельного обогрева</h5>
                </div>
            </div>

            <div class="col-md-12">
                <div class="vertical_line vertical_line_2"></div>
            </div>

        </div>
    </div>
</div>

<div class="content_block_6 gen_block_6 personal">

    <!-- BEGIN TWO COLUMNS BLOCK -->
    <div class="two_col_block">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="two_col_header">

                        <h3>Поставляемая продукция:</h3>

                        <div class="two_col_horisontal_row"></div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">

                        <!-- BEGIN TWO COLUMN ROW -->
                        <div class="two_col_row clearfix">

                            <div class="col-md-6">
                                <div class="two_col_box left">

                                    <h3 class="col_block_header">Кабельно-проводниковая продукция</h3>
                                    <p>кабель силовой, информационный, оптико-волоконный,
                                        <br> для охранно-пожарной сигнализации
                                        <br> и систем аудио – видео</p>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="two_col_box">
                                    <h3 class="col_block_header">Низковольтное оборудование</h3>
                                    <p>комплектные распределительные устройства, автоматические выключатели, УЗО, контакторы, оборудование для управления электрическими нагрузками, учета и контроля параметров электроэнергии</p>
                                </div>
                            </div>

                        </div>
                        <!-- END TWO COLUMN ROW -->

                        <!-- BEGIN TWO COLUMN ROW -->
                        <div class="two_col_row clearfix">

                            <div class="col-md-6">
                                <div class="two_col_box left">

                                    <h3 class="col_block_header">Электроустановочные изделия</h3>
                                    <p>диммеры, розетки, выключатели, датчики и пр.</p>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="two_col_box">
                                    <h3 class="col_block_header">Кабеленесущие системы</h3>
                                    <p>короба, каналы, электромонтажные трубы, лючки, колонны, лотки</p>
                                </div>
                            </div>

                        </div>
                        <!-- END TWO COLUMN ROW -->

                        <!-- BEGIN TWO COLUMN ROW -->
                        <div class="two_col_row clearfix">

                            <div class="col-md-6">
                                <div class="two_col_box left">

                                    <h3 class="col_block_header">Структурированные кабельные системы</h3>
                                    <p>19” шкафы, патч-корды, патч-панели, кросс-панели,
                                        <br> кабельные органайзеры</p>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="two_col_box">
                                    <h3 class="col_block_header">Светотехническая продукция</h3>
                                    <p>дизайнерские и технические светильники
                                        <br> в различных ценовых категориях.</p>
                                </div>
                            </div>

                        </div>
                        <!-- END TWO COLUMN ROW -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END TWO COLUMNS BLOCK -->

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
							"WEB_FORM_ID" => "85",    // ID веб-формы
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
							"IBLOCK_CITY" => 77,
							"ELEMENT_ID" => 1417798,
							),
							false
						);?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?$APPLICATION->IncludeComponent("bitrix:news.list","partners-contacts",Array(
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_MODE" => "Y",
	"IBLOCK_TYPE" => "vecancy",
	"IBLOCK_ID" => "60",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "ID",
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
	"AJAX_OPTION_ADDITIONAL" => "",
	"CITY" => $_SESSION["office_city"],
	)
);?>

<div id="ya_map_all" style="width: 100%; height: 100%; min-height: 810px;"></div> 
 

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
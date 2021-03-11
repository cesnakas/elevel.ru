<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Пусконаладка | Монтаж и программирование | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает все виды пусконаладочных работ оборудования и монтаж инженерных систем.");
$APPLICATION->SetPageProperty("tags", "электромонтаж, электромонтажные работы, монтаж электрооборудования, монтаж электропроводки, монтаж электрощитов, монтаж электрощитового оборудования, монтаж нку, монтаж скс, монтаж лвс, прокладка кабельных трасс, монтаж щитового оборудования, монтаж систем кабельного обогрева, монтаж кабельного обогрева, монтаж теплого пола, монтаж умного дома, монтаж системы умный дом, монтаж инженерных систем, монтаж внутренних инженерных систем, монтаж систем автоматизации, монтаж приборов систем автоматизации, монтаж диспетчеризации, монтаж систем диспетчеризации, монтаж кабельных трасс, монтаж ктп, монтаж систем обогрева, расключение оборудования, расключение электрооборудования, электромонтаж оборудования, монтаж телефонной сети, монтаж компьютерных и телефонных сетей, монтаж нагревательного кабеля, монтаж освещения, монтаж систем освещения, монтаж внутреннего освещения, монтаж наружного освещения, монтаж светотехники, монтаж низковольтного оборудования, монтаж структурированных кабельных систем, монтаж систем управления, монтаж систем контроля управлением доступом, монтаж молниезащиты, монтаж слаботочных систем, монтаж электроустановочных изделий, программирование систем автоматизации, программирование умного дома, программирование инженерных систем, программирование аскуэ, пусконаладочные работы, пусконаладка, пусконаладка систем автоматизации, программирование освещения, пусконаладка нку, пусконаладка оборудования, пусконаладка инженерных систем, пусконаладка электрооборудования, пусконаладка электроснабжения, программирование энергосбережения, программирование датчиков, программирование информационных сетей, пусконаладка систем управления");
$APPLICATION->SetPageProperty("keywords", "пусконаладка оборудования, монтаж инженерных систем, монтаж и пусконаладка");
$APPLICATION->SetTitle("Установочно-эксплуатационные работы ");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered b-promo clearfix">
		<h1 class="tz-center">Монтаж, программирование, пусконаладка: пусконаладочные работы</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
<?$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "left-menu",
    Array(
        "ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "MENU_CACHE_GET_VARS" => array(),
        "MAX_LEVEL" => "1",
        "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
        "USE_EXT" => "N",
        "DELAY" => "N",
        "ALLOW_MULTI_SELECT" => "N"
    )
);?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "75",    // ID веб-формы
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
			</div><!--.b-form-->
			<div class="review s02">
				<p>Наша компания может предложить Вам выполнить полный комплекс услуг пуско-наладочных работ систем электроснабжения и автоматизации - комплекс мероприятий по вводу в эксплуатацию оборудования, смонтированного на объектах строительства.</p>
				<div class="pic"><img src="/services/project/img/el-alexeev.png"></div>
				<div class="name">Дмитрий Алексеев<br><span>(Руководитель отдела реализации проектов)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_orange">
			В нашей компании Вы можете заказать любой вид работ<br/> 
			для полной готовности оборудования и инженерных <br/>
			систем к эксплуатации
		</div>
		<p class="t_puskotitle">Мы предлагаем все виды работ по направлениям:</p>
		<div class="t_puskoblock">
			<p>
				<img src="/services/installation/img/t_man.png" alt=""/>
				Монтаж и пусконаладка 
			</p>
			Мы оказываем полный комплекс услуг по монтажу и пусконаладке инженерных систем и их элементов. Все работы выполняются специалистами с подтверждённой квалификацией и большим практическим опытом, с использованием сертифицированного оборудования:
			
			<ul>
				<li>монтаж, расключение и пусконаладка оборудования;</li>
				<li>установка <a href="/solutions/electroboards/" title="">электрощитового оборудования</a><br/> и расключение;</li>
				<li><a href="/solutions/automation/intellectual_building/ups/" title="">систем бесперебойного электроснабжения</a>;</li>
				<li>прокладка кабельных трасс;</li>
				<li><a href="/solutions/cable_systems/" title="">систем кабельного обогрева</a>;</li>
				<li>монтаж <a href="/solutions/automation/intellectual_building/sks/" title="">структурированных кабельных сетей</a>, систем 
					<a href="/solutions/automation/" title="">автоматизации</a> и <a href="/solutions/automation/scheduling/" title="">диспетчеризации</a>, <a href="/solutions/automation/intellectual_building/lighting_protection/" title="">молниезащиты</a>.
				</li>
			</ul>
			<div class="t_blu">
				Пусконаладочные работы выполняются в несколько этапов, которые включают в себя подготовку документации и объекта, ремонтные работы, испытания отдельных систем и комплексную их апробацию.
			</div>
		</div>
		<div class="t_puskoblock">
			<p>
				<img src="/services/installation/img/t_prog.png" alt=""/>
				Программирование 
			</p>
			Профессиональная настройка важна как залог безотказной работы и полного доступа к всем функциям оборудования, а также возможности настройки дополнительного функционала. 
			Наши специалисты оказывают услуги по программированию систем и отдельных элементов:
			<ul>
				<li><a href="/solutions/automation/smart_house/" title="">умный дом</a>;</li>
				<li><a href="/solutions/automation/intellectual_building/" title="">интеллектуальное здание</a>;</li>
				<li><a href="/solutions/automation/scheduling/" title="">диспетчеризация инженерных систем</a>;</li>
				<li><a href="/solutions/electroboards/control_and_automation/" title="">щиты управления и автоматики</a>.</li>
			</ul>
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать работы</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
					<div id="bottom_form">
					<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
	                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "75",    // ID веб-формы
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
	                </div>
				</div><!--.b-form-->

				<div class="b-pull-right1">
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/services/installation/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/services/installation/img/pic5a.gif" alt=""></a>
					</div>

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
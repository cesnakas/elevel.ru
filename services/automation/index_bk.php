<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Проектирование систем автоматизации зданий | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и программирование систем автоматизации зданий.");
$APPLICATION->SetPageProperty("tags", "автоматизация, система автоматизации, автоматизация гостиницы, автоматизация дома, abb автоматизация, knx, konnex, lcn автоматизация, inntech, yesinn, merten knx, gira knx, moeller, eaton, siemens автоматизация, legrand автоматизация, умный дом, smart house, интеллектуальное здание, промышленная автоматизация, системы промышленной автоматики, системы промышленной автоматизации, диспетчеризация, диспетчеризация зданий, система диспетчеризации, автоматизация инженерных систем, интеграция инженерных систем, интеграция систем автоматизации");
$APPLICATION->SetPageProperty("keywords", "системы автоматизации зданий");
$APPLICATION->SetTitle("Автоматизация ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">

		<h1>Системы автоматизации зданий</h1>

		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "left-menu-sol",
                    Array(
                         "ROOT_MENU_TYPE" => "TOP_MENU_FOOTER_SUBMENU", 
                         "MAX_LEVEL" => "3", 
                         "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU", 
                         "USE_EXT" => "Y" 
                     )
                );?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "76",    // ID веб-формы
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
				<p><strong>Автоматизация от «Эlevel» это:</strong>
				<ul class="list_sol">
				<li>Экономия ресурсов до 30%;</li>
				<li>Комфорт и уют в доме; </li>
				<li>Большой ассортимент производителей; </li>
				<li>Безопасность и упреждение;</li>
				<li>Наши решения под ваш бюджет и желания.</li>
				</ul>
				<em>«... наше преимущество в комплексном подходе. У нас свои проектировщики, свои склады оборудования, свой штат монтажников, свои программисты и инженеры. А это прямые гарантии качества, сроков и цены».</em></p>
				<div class="pic"><img src="/solutions/automation/img/el-babichevavt.png"></div>
				<div class="name">Алексей Бабичев<br><span>(Руководитель проектов)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_avtext">
			В нашей компании  представлен весь комплекс услуг по <span>автоматизации инженерных систем </span>для объектов любого назначения и уровня сложности: проектирование систем автоматизации, внедрение элементов автоматизации в уютной квартире, установка Систем Комплексной Автоматизации и Диспетчеризации масштабных объектов и др.
		</div>
		<div class="t_avgreyline">
			<div class="t_avtitle">
				Мы реализуем такие комплексные решения с единой системой управления, как:
			</div>
			<ul class="t_avul">
				<li><a href="/solutions/automation/smart_house/" title="">умный дом</a>;</li>
				<li><a href="/solutions/automation/intellectual_building/" title="">интеллектуальное здание</a>;</li>
				<li><a href="/solutions/automation/hotel_management_system/" title="">управление гостиничным комплексом</a>;</li>
				<li>управление инженерными системами (BMS) административно-офисных зданий, торговых центров, спортивных комплексов, объектов специального назначения.</li>
			</ul>
		</div>
		<div class="t_wrapdiv2">
			Также Вы можете заказать разработку и установку систем локальной автоматизации – от контроля бытовых <br/>приборов и <a href="/solutions/cable_systems/heating_gutters_roofs/">обогрева водостоков</a> до <a href="/solutions/automation/intellectual_building/alarm_system/">систем охранной сигнализации</a> и <a href="/solutions/automation/intellectual_building/hvac_system/">управления климатом</a>.
		</div>
		<div class="t_avorangebox">
			Любая заказываемая система разрабатывается и реализуется индивидуально под каждый проект, учитывая особенности конкретного объекта и пожелания Заказчика.  Мы используем оборудование высочайшего класса и задействуем самые актуальные решения от признанных лидеров электротехнического рынка — такие, как 
			<a href="/shop/merten-knx/" title="">Merten KNX</a>, 
			<a href="/shop/abb-knx/" title="">ABB I-bus KNX (ABB I-bus EIB)</a>, 
			<a href="/brands/bticino/my-home/" title="">Bticino My home</a>, 
			<a href="/shop/gira-knx/" title="">Gira Funkbus и Gira Instabus</a>, 
			<a href="/brands/legrand/in-one/" title="">Legrand In one</a>, 
			<a href="/brands/issendorff/" title="">Issendorff KG LCN</a>, 
			<a href="/brands/esylux/" title="">Esylux</a>, 
			<a href="/brands/inntech/" title="">Inntech</a> и др.
		</div>
		<div class="t_avtextupper">
			Результат от использования <span>систем автоматизации</span> Вы получите сразу же в виде существенной экономии средств, ресурсов, и, что немаловажно, времени и усилий
		</div>
		<div class="t_avblue">
			Предлагаемые решения гармонично впишутся в эстетику и стиль внешнего и внутреннего оформления. Но главное — они раз и навсегда изменят Ваши представления об  удобстве и функциональных возможностях, создавая идеальную домашнюю и рабочую среду
		</div>
		<p class="t_avtitlep">Основными направлениями автоматизации являются:</p>
		<div class="t_boxdo-wrap">
			<div class="t_boxdo t_marginleft">
				<img src="/solutions/automation/img/boxdo_01.png" alt=""/>
				<p>
					<a href="/solutions/automation/hotel_management_system/" title="">Система управления гостиницами и <br/>номерным фондом</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_02.png" alt=""/>
				<p>
					<a href="/solutions/automation/intellectual_building/" title="">Система <br/>«Интеллектуальное <br/>здание»</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_03.png" alt=""/>
				<p>
					<a href="/solutions/automation/smart_house/" title="">Система «Умный дом»</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_04.png" alt=""/>
				<p>
					<a href="/solutions/automation/process_automation_systems/" title="">Система промышленной автоматики от<br/>Эlevel Инженер</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_05.png" alt=""/>
				<p>
					<a href="/solutions/automation/scheduling/" title="">Диспетчеризация <br/>и визуализация</a>
				</p>
			</div>
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать систему</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "76",    // ID веб-формы
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
				<div class="b-pull-right1">
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/solutions/automation/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/solutions/automation/img/pic5a.gif" alt=""></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo--> 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
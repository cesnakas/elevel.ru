<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Интеллектуальное здание, Elevel - автоматизация здания. Управление зданием");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает систему управления зданием. Разработка и реализация системы «интеллектуальное здание» на выгодных условиях");
$APPLICATION->SetPageProperty("tags", "Интеллектуальное здание, интеллектуальные системы зданий, интеллектуальное здание, проектирование интеллектуального здания, проект интеллектуального здания, инженерные системы здания, система контроля доступа, система видеонаблюдения, система пожарной сигнализации, система охранной сигнализации, комплекс технических средств безопасности, комплекс систем жизнеобспечения, система гарантированного бесперебойного электроснабжения, системы отопления, системы вентиляции и кондиционирования, системы освещения, системы учета энергоносителей, астуэ, аскуэ, системы контроля, системы информационного обеспечения, проектирование лвс, проектирование телефонных сетей, интеграция инженерных систем, спутниковое и эфирное телевиденье, диспетчеризация, АСУ, скс, структурированная кабельная система, система интеллектуального здания, монтаж скс, монтаж лвс, система управления освещением, управление светом, диспетчеризация здания, проектирование охранной сигнализации, энергосбережение, интеллектуальные системы управления зданием, система управления микроклиматом, merten knx, система lcn, esylux, gira knx, инженерные системы интеллектуального здания, автоматизация инженерных систем, управление зданием, инженерно технические системы");
$APPLICATION->SetPageProperty("keywords", "интеллектуальное здание, управление здание");
$APPLICATION->SetTitle("Интеллектуальное здание ");
?> 
<div class="b-centered b-promo clearfix">
		<h1>Система «интеллектуальное здание»</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left">
				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "left-menu-sol",
                    Array(
                         "ROOT_MENU_TYPE" => "TOP_MENU_FOOTER_SUBMENU", 
                         "MAX_LEVEL" => "2", 
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
			<div class="review s07">
				<p><strong>Автоматизация от «Эlevel» это:</strong>
				</p><ul class="list_sol">
				<li>Экономия ресурсов до 30%;</li>
				<li>Комфорт и уют в доме; </li>
				<li>Большой ассортимент производителей; </li>
				<li>Безопасность и упреждение;</li>
				<li>Наши решения под ваш бюджет и желания.</li>
				</ul>
				<em>«... наше преимущество в комплексном подходе. У нас свои проектировщики, свои склады оборудования, свой штат монтажников, свои программисты и инженеры. А это прямые гарантии качества, сроков и цены».</em><p></p>
				<div class="pic"><img src="/solutions/automation/img/el-babichevavt.png"></div>
				<div class="name">Алексей Бабичев<br><span>(Руководитель проектов)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_siz_text1">
			Наша компания специализируется на реализации комплексных решений с единой системой управления, одним из которых является «<span>интеллектуальное здание</span>»
		</div>		
		<div class="t_siz_text2">
			<span>Интеллектуальное здание</span> — это управление зданием, представляющее собой пример идеальной организации работы групп инженерных систем, объединённых в общий программно-аппаратный комплекс с централизованным управлением
		</div>		
		<div class="t_siz_text3">
			Название комплекса вовсе не живописное сравнение. Его заслуженно сравнивают с искусственным интеллектом, поскольку управление всеми технологическими процессами ведётся в «думающем» 
			режиме — помимо обеспечения работы вверенных ей элементов система постоянно контролирует и анализирует текущую обстановку, и при необходимости мгновенно реагирует на нестандартные ситуации.
		</div>
		<div class="t_siz_grey">
			<h2>В качестве компонентов комплекса выступают <br/>такие группы инженерных систем, как</h2>
			<div>
				<p>Комплекс технических <br/>средств безопасности:</p>
				<ul>
					<li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">система контроля доступа</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/video_control/" title="">система видеонаблюдения</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/fire_alarm/" title="">система пожарной сигнализации</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/alarm_system/" title="">система охранной сигнализации</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">система молниезащиты</a>.</li>
				</ul>
			</div>			
			<div>
				<p>Комплекс систем  <br/>жизнеобеспечения:</p>
				<ul>
					<li><a href="/solutions/automation/intellectual_building/life-support_systems/" title="">система гарантированного бесперебойного электроснабжения</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/hvac_system/" title="">система отопления, вентиляции и кондиционирования воздуха</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/lighting_system/" title="">система освещения и управления освещением</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/accounting_system/" title="">система учета энергоносителей и другие учётные системы</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/elevator_system/" title="">система контроля управления лифтами и эскалаторами</a>.</li>
				</ul>
			</div>			
			<div>
				<p>Комплекс систем  <br/>информационного обеспечения:</p>
				<ul>
					<li><a href="/solutions/automation/intellectual_building/lan/" title="">ЛВС</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/phone_etwork/" title="">телефонные сети</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/tv/" title="">спутниковое и эфирное телевидение</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/rapid_communication/" title="">система оперативной связи обслуживающего персонала</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/sks/" title="">СКС</a> и другие.</li>
				</ul>
			</div>
		</div>
		<div class="t_siz_blue">
			Каждый раз система «интеллектуальное здание» проектируется под цели и задачи конкретного объекта и пожеланий заказчика, формируется комплекс систем и функциональные возможности на базе высокотехнологичных разработок от брендов-лидеров области систем автоматизации
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
					<p>Свяжитесь с менеджером отдела <br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					<!--<div class="b-top-link-wrp1">
						<div class="toplink1">
							<img src="/bitrix/templates/wt-elevel/images/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/bitrix/templates/wt-elevel/images/pic5a.gif" alt=""></a>
						</div>						
						<div class="toplink2">
							<img src="/bitrix/templates/wt-elevel/images/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/bitrix/templates/wt-elevel/images/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
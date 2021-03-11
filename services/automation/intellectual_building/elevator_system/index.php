<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "системы управления приводами, системы контроля лифтов, системы управления лифтами, системы управления эскалаторами");
$APPLICATION->SetPageProperty("keywords", "системы управления приводами, системы контроля лифтов, системы управления лифтами, системы управления эскалаторами");
$APPLICATION->SetTitle("Системы контроля и управления лифтами, эскалаторами ");
?>
<div class="b-centered b-promo clearfix">
		<h1>Система контроля и управления лифтами и эскалаторами</h1>		
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
			<div class="avr_descr review">
				<span>Применение таких систем направлено на обеспечение высокого уровня обслуживания  сотрудников и посетителей, а также оптимального сочетания надежности и производительности лифтов и эскалаторов в здании</span>
			</div>
		</div><!--.b-row__first-->

		<div class="t_sul_text1">
			<p>Система контроля и управления лифтами и эскалаторами позволяет реализовать следующий функционал:</p>
			<ul>
				<li>Местный и удаленный контроль и управление оборудованием</li>
				<li>Повышение уровня комфорта для пассажиров (безопасное и точное выравнивание кабины по уровню этажа плавная установка и пуск, даже при полной загрузке,  снижение вибраций и шума при торможении и т.д.)</li>
				<li>Оптимизация процессов работы оборудования (контроль движения и регуляция скорости эскалаторов в зависимости от нагрузки и пассажиропотока и пр.)
				локализация очагов повышенных потерь энергоресурсов</li>
				<li>Безопасность и контроль возникновения внештатных ситуаций (защита от неумелого обращения, доступ по паролю, высокоточные модули позиционирования кабины, включение специальных режимов при возникновении внештатных ситуаций  и пр.)</li>
				<li>Энергосбережение (например, автоматический запуск эскалатора, позволяющий значительно экономить электроэнергию)</li>
				<li>Простое взаимодействие с другими системами,  в том числе диспетчеризации инженерного оборудования в здании</li>
			</ul>
		</div>
		<div class="t_sul_grey">
			<img src="/bitrix/templates/wt-elevel/images/sul.jpg" alt=""/>
		</div>
		<div class="t_sul_text2">
			Система контроля и управления лифтами и эскалаторами является неотъемлемой частью комплекса систем жизнеобеспечения наряду со следующими системами
		</div>
		<ul class="t_sul_text3">
			<li><a href="/solutions/automation/intellectual_building/ups/" title="">Система гарантированного бесперебойного электроснабжения (генераторные установки)</a></li>
			<li><a href="/solutions/automation/intellectual_building/hvac_system/" title="">Система отопления, вентиляции и кондиционирования воздуха</a></li>
			<li><a href="/solutions/automation/intellectual_building/lighting_system/" title="">Система освещения и управления освещением</a></li>
			<li><a href="/solutions/automation/intellectual_building/accounting_system/" title="">Система учета энергоносителей (АСКУЭ, АСТУЭ)</a></li>
		</ul>		
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать</h3>
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

					<div class="b-top-link-wrp1">
						<div class="toplink1">
							<img src="/bitrix/templates/wt-elevel/images/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/bitrix/templates/wt-elevel/images/pic5a.gif" alt=""></a>
						</div>						
						<div class="toplink2">
							<img src="/bitrix/templates/wt-elevel/images/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/bitrix/templates/wt-elevel/images/pic5a.gif" alt=""></a>
						</div>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
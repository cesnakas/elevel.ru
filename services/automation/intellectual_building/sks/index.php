<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Монтаж сетей СКС, Elevel - установка структурированных кабельных систем");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает услуги по монтажу СКС. Мы осуществим монтаж СКС на выгодных условиях");
$APPLICATION->SetPageProperty("tags", "СКС, структурированная кабельная система, кабельная система, кабель, единая кабельная система, электрические кабельные системы, коммуникационные кабельные системы");
$APPLICATION->SetPageProperty("keywords", "монтаж скс, скс");
$APPLICATION->SetTitle("СКС");
?>
<div class="b-centered b-promo clearfix">
		<h1>Структурированная кабельная система  (СКС)</h1>		
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
				Структурированная кабельная система (СКС) — <span>это комплекс инженерных коммуникаций, объединяющий системы передачи данных, голоса, видео-, аудио- и других сигналов в пределах локальной сети или сети предприятия.</span>
				<p>Главное назначение СКС — объединение множества разнообразных по функциям информационных систем и сервисов предприятия для возможности передачи по кабелю всех основных типов слаботочных сигналов, независимо от типа питающих сред и использования неоднородного оборудования.</p>
			</div>
		</div><!--.b-row__first-->
		<div class="t_sks_cheme">
			Схема СКС
			<img src="/bitrix/templates/wt-elevel/images/sks.jpg" alt=""/>
		</div>
		<div class="t_sks">
			Такие единые кабельные системы используются для создания коммуникационной инфраструктуры систем автоматизации и управления технологическим оборудованием, внутренней телефонной сети, систем видеосвязи, охранного и промышленного телевидения и пр. Это обеспечивает универсальный независимый сервис и подключение любого оборудования, а также работу любого стандартного приложения.
			
			<p>Структурированная кабельная система является частью <br/>комплекса систем информационного обеспечения наряду со следующими системами:</p>			
			<ul>
				<li><a href="/solutions/automation/intellectual_building/lan/" title="">локальные высокоскоростные сети (ЛВС)</a></li>
				<li><a href="/solutions/automation/intellectual_building/phone_etwork/" title="">телефонные сети</a></li>
				<li><a href="/solutions/automation/intellectual_building/rapid_communication/" title="">система оперативной связи обслуживающего персонала</a></li>
				<li><a href="/solutions/automation/intellectual_building/tv/" title="">спутниковое и эфирное телевидение</a></li>
			</ul>
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
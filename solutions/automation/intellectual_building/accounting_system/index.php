<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Автоматизированная система контроля и учета энергоресурсов | АСКУЭ и АСТУЭ | Эlevel");
$APPLICATION->SetPageProperty("description", "Разработка и реализация систем контроля и учета энергоносителей АСКУЭ и АСТУЭ от компании Эlevel.");
$APPLICATION->SetPageProperty("tags", "система учета энергоносителей, автоматизированная система учета энергоносителей, учет энергоносителей, АСУ, АСТУЭ, АСКУЭ, система учета электроэнергии, система учета энергоресурсов, Автоматизированные системы контроля и учета энергоресурсов, автоматизированная система технического учета электроэнергии");
$APPLICATION->SetPageProperty("keywords", "аскуэ, система аскуэ, установка аскуэ, обслуживание аскуэ, проект аскуэ, монтаж аскуэ, астуэ, системы астуэ");
$APPLICATION->SetTitle("система учета энергоносителей и другие системы ");
?>
<div class="b-centered b-promo clearfix">
		<h1>Система учета энергоносителей (АСКУЭ, АСТУЭ)</h1>		
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
				<span>Для учёта потребления ресурсов мы предлагаем разработку и реализацию автоматизированной системы контроля и учета энергоресурсов (АСКУЭ)</span>
			</div>
		</div><!--.b-row__first-->

		<div class="t_sue">
			<p>С помощью такой системы можно обеспечить решение и <br/>контроль исполнения множества задач, направленных на энергосбережение:</p>
			<ul>
				<li>сбор данных о потреблении энергоресурсов</li>
				<li>автоматическая тарификация данных в соответствии с существующими тарифными зонами</li>
				<li>контроль за соблюдением лимитов энергопотребления</li>
				<li>локализация очагов повышенных потерь энергоресурсов</li>
				<li>регистрация, обработка и архивирование технологической информации и информации о коммерческом потреблении энергоресурсов</li>
				<li>текущая сводка информации в виде отчетов, графических схем, таблиц</li>
				<li>формирование отчетов в форме, принятой в системах автоматизированного документооборота.</li>
			<ul>
		</div>
		<div class="t_sue_cheme">
			<img src="/bitrix/templates/wt-elevel/images/sue-scheme.jpg" alt=""/>
		</div>
		<div class="t_sue">
			<p>Дополнительные возможности системы:</p>
			<ul>
				<li>непрерывный контроль работоспособности приборов и линий связи</li>
				<li>адресное и циркулярное оповещение персонала (на пейджер, мобильный телефон, электронную почту) о различных событиях в системе - отказах, превышениях лимитов и т. п.</li>
				<li>считывание информации с других систем учета и АСУ ТП</li>
				<li>разграничение доступа различных пользователей</li>
				<li>сохранность информации при пропадании электропитания</li>
			<ul>
		</div>
		<div class="t_sue_text2">
			Система учета энергоносителей (АСКУЭ, АСТУЭ) является неотъемлемой частью комплекса систем жизнеобеспечения наряду со следующими системами
		</div>
		<ul class="t_sue_text3">
			<li><a href="/solutions/automation/intellectual_building/ups/" title="">Система гарантированного бесперебойного электроснабжения (генераторные установки)</a></li>
			<li><a href="/solutions/automation/intellectual_building/hvac_system/" title="">Система отопления, вентиляции и кондиционирования воздуха</a></li>
			<li><a href="/solutions/automation/intellectual_building/lighting_system/" title="">Система освещения и управления освещением</a></li>
			<li><a href="/solutions/automation/intellectual_building/elevator_system/" title="">Система контроля и управления лифтами, эскалаторами</a></li>
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
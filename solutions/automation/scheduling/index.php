<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Системы автоматизации и диспетчеризации зданий | Диспетчеризация инженерных систем | Эlevel");
$APPLICATION->SetPageProperty("description", "Проектирование и реализация систем автоматизации и диспетчеризации инженерных систем зданий на выгодных условиях от компании Эlevel.");
$APPLICATION->SetPageProperty("tags", "диспетчеризация, система диспетчеризации зданий, диспетчеризация инженерных систем, системы диспетчеризации, диспетчеризация инженерии, диспетчеризация производства, проект диспетчеризации, проект систем диспетчеризации, диспетчеризация инженерного оборудования");
$APPLICATION->SetPageProperty("keywords", "система диспетчеризации, диспетчеризация инженерных систем, системы автоматизации и диспетчеризации, системы диспетчеризации зданий, монтаж системы диспетчеризации, автоматизация инженерных систем");
$APPLICATION->SetTitle("Диспетчеризация и визуализация ");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>Диспетчеризация и визуализация</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left">
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
			<div class="review s07">
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
		<div class="div_frame">
			<p>
				Как правило, для полноценного функционирования, поддержки комплекса жизнеобеспечения и безопасности любого современного здания, требуется ежесекундное чёткое выполнение огромного числа технологических задач. Централизованно и наиболее полно решить все задачи можно с помощью <span>систем диспетчеризации</span>, способных обеспечить комплексный мониторинг, координацию и управление инженерными объектами и сетями, а также диспетчеризация здания позволяет следить за всеми технологическими процессами. 
			</p>
			Современные системы диспетчеризации способны решать такие вопросы, как защита здания от внештатных и аварийных ситуаций и соблюдение санитарно-гигиенических норм на объекте.
			<div class="div_blue">
				Продуманное проектирование инженерных систем позволяет эффективно обеспечить диспетчеризацию объекта, которая в свою очередь создается с помощью автоматизированной системы контроля и управления эксплуатацией всего комплекса инженерных систем (АСКУЭ)
			</div>
			<div class="div_ultitle">
				Установка системы диспетчеризации позволяет реализовать множество задач:
			</div>
			<ul>
				<li>оптимизировать и согласовать работу инженерного оборудования;</li>
				<li>задать режимы работы узлов и агрегатов инженерных систем с одного пульта;</li>
				<li>оперативно оповещать об отклонении параметров от заданных значений, отказе технологического оборудования;</li>
				<li>обрабатывать запросы дежурного персонала (диалоговый режим);</li>
				<li>обеспечить автоматическое накопление и хранение информации о функционировании систем, учет часов наработки, коммутацию оборудования в соответствии с принятым алгоритмом;</li>
				<li>организовать сбор, обработку и отображение в виде мнемосхем, таблиц и графиков информации о состоянии инженерного оборудования в реальном масштабе времени;</li>
				<li>регистрировать и сохранять информацию о контролируемых параметрах, аварийных ситуациях и действиях персонала;</li>
				<li>вести архив с возможностью составления отчётов в виде обзоров, таблиц и диаграмм;</li>
				<li>планировать профилактические и регламентные работы;</li>
				<li>организовать многоуровневую систему доступа к управлению.</li>
			</ul>
		</div>
		<div class="div_orange">
			<p>Помимо решения технологических задач использование системы диспетчеризации поможет:</p>
			<ul>
				<li>повысить надежность работы инженерного оборудования,</li>
				<li>максимально сократить время принятия решений,</li>
				<li>обеспечить энергосбережение,</li>
				<li>снизить численность персонала эксплуатационных служб, одновременно повысив эффективность работы.</li>
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
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
					</div>						
					
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo--> 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Системы коммерческого учета (АСКУЭ) Elevel автоматизированные системы контроля доступа");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает систему АСКУЭ. Разработка и реализация системы контроля доступа на выгодных условиях");
$APPLICATION->SetPageProperty("tags", "система контроля доступа, СКД, СКУД, контроль доступа, управление доступом, система контроля и управления доступом");
$APPLICATION->SetPageProperty("keywords", "аскуэ, контроль доступа");
$APPLICATION->SetTitle("Система контроля доступа ");
?>
<div class="b-centered b-promo clearfix">

		<h1>Система контроля доступа</h1>

		
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
			<span>Системы управления и контроля доступа</span> в настоящее время являются неотъемлемой частью многих современных систем безопасности. 
		</div>
		<p class="t_scd_bold">
			Они позволяют простыми методами разграничить зоны доступа без необходимости <br/>расширения штата обслуживающего персонала:
		</p>
		<ul class="t_scd_ul">
			<li>запрет допуска посторонних в определённые помещения;</li>
			<li>ограниченный доступ сотрудников в ответственные помещения;</li>
			<li>контроль передвижения сотрудников и посетителей по охраняемой территории;</li>
			<li>многоуровневая система разрешённого доступа.</li>
		</ul>
		<div class="t_scd_cheme">
			<img src="/bitrix/templates/wt-elevel/images/scd.jpg" alt=""/>
		</div>
		<div class="t_scd_grey">
			Система контроля доступа является неотъемлемой частью комплекса<br/> технических средств безопасности наряду со следующими системами:
			<ul>
				<li>Система видеонаблюдения</li>
				<li>Система пожарной сигнализации</li>
			</ul>			
			<ul>
				<li>Система охранной сигнализации</li>
				<li>Система молниезащиты</li>
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
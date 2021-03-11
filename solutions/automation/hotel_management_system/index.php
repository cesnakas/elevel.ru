<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Система автоматизации гостиницы | Система управления гостиницей, отелем | Эlevel");
$APPLICATION->SetPageProperty("description", "Компании Эlevel предлагает решения по разработке систем автоматизации в гостиничном бизнесе.");
$APPLICATION->SetPageProperty("tags", "система управления гостиницей, система автоматизации гостиниц, автоматизация отелей, система управления номерами, автоматизация управления гостиницей, система контроля доступа, система видеонаблюдения, система пожарной сигнализации, система охранной сигнализации, комплекс технических средств безопасности, комплекс систем жизнеобспечения, система гарантированного бесперебойного электроснабжения, системы отопления, системы вентиляции и кондиционирования, системы освещения, управление освещением гостиниц, системы учета энергоносителей, астуэ, аскуэ, системы контроля, системы управления лифтами и эскалаторами, системы информационного обеспечения, проектирование лвс, проектирование телефонных сетей, телевидение в гостинице, гостиничное телевидение, система оперативной связи, интеллектуальная гостиница, система интеллектуального здания, диспетчеризация, управление номерами, автоматизированная система управления гостиницей, АСУ, скс, структурированная кабельная система, merten knx, система lcn, esylux, gira knx, инженерные системы здания");
$APPLICATION->SetPageProperty("keywords", "автоматизация гостиницы, система автоматизации гостиницы, автоматизация управления гостиницей, автоматизация отеля, автоматизированные системы управления гостиницей");
$APPLICATION->SetTitle("Система управления гостиницей ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<script type="text/javascript" src="/js/highslide.js"></script> 
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css" />
<![endif]--> 
<script type="text/javascript">
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.allowMultipleInstances = false;
</script> 
<script type="text/javascript">
//<![CDATA[
//hs.registerOverlay({
//	fade: 2 // fading the semi-transparent overlay looks bad in IE
//});
hs.graphicsDir = '/images/highslide/';
hs.wrapperClassName = 'borderless';
//]]>
</script>
<div class="b-centered b-promo clearfix">

		<h1>Система управления гостиницей (автоматизация гостиницы)</h1>

		
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

		<div class="sug_title">
			<span>Применение систем автоматизации в гостиничном бизнесе</span> — обязательная составляющая успеха предприятия, без которой невозможно эффективное управление, контроль обслуживания и предоставление максимума сервиса для гостей.
			<p>
				Если для Вас важно поддержать класс отеля или даже поднять его на новый уровень и при этом ощутимо экономить ресурсы, закажите разработку и реализацию автоматизированной системы управления гостиницей
			</p>
		</div>
		<div class="sug_grey">
			<p>Что это даёт в практическом применении:</p>
			<ul>
				<li>бесперебойная работа всех <a href="/solutions/automation/intellectual_building/" title="Система &laquo;интеллектуальное здание&raquo; от компании Эlevel Инженер">инженерных систем</a> (жизнеобеспечения, диспетчеризации, энергосбережения и пр.);</li>
				<li>мониторинг основных параметров состояния номеров и уровня сервиса, предоставляемого гостям;</li>
				<li>контроль возникновения внештатных ситуаций и <a href="/solutions/automation/intellectual_building/lighting_system/" title="системы освещения и управления освещением от компании Эlevel Инженер">оперативное оповещение</a>;</li>
				<li>экспресс-оценка обслуживания: статус номеров, контроль обращения в сервисную службу, скорость реакции персонала;</li>
				<li>получение детальной информации и составление отчётов для эффективного менеджмента;</li>
				<li>возможность интеграции в системы PMS (Property Management System).</li>
			</ul>
		</div>
		<p class="sug_justext">
			Неотъемлемой частью системы автоматизации гостиницы является <a href="/solutions/automation/hotel_management_system/numbers_management_system/" title="система управления номерами">система управления номерами</a>
		</p>
		<div class="sug_blue">
			Мы имеем опыт автоматизации отелей мирового уровня. Все проекты, выполняемые нашей компанией, реализуются на наиболее передовых системах от ведущих производителей оборудования — таких, как My Home от Bticino или система автоматизации гостиничных номеров YESINN компании INNTECH Co. Ltd
		</div>
		<div class="sug_below">
			Предлагаем решения, максимально отвечающие потребностям конкретного объекта<br/> и заложенному бюджету
			
			<p>Наши реализованные проекты по автоматизации гостиниц:</p>
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img01.png" alt=""/>
				Barvikha Luxury Village Hotel & SPA
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img02.png" alt=""/>
				Lotte Plaza
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img03.png" alt=""/>
				Holiday Inn Sokolniki
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img04.png" alt=""/>
				Baltschug Kempinski
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
					<p>Свяжитесь с менеджером отдела <br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					<!--<div class="b-top-link-wrp1">
						<div class="toplink1">
							<img src="/solutions/electroboards/panel_lighting/img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
						</div>						
						<div class="toplink2">
							<img src="/solutions/electroboards/panel_lighting/img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->  
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
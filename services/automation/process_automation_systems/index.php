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
<div class="b-centered b-promo clearfix">

		<h1>Системы промышленной автоматики</h1>

		
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
			При современных темпах развития технологий и уровне потребления любое предприятие непременно оказывается перед необходимостью внедрения современных <span>промышленных систем автоматизации</span>
		</div>
		<div class="sug_grey">
			<div>Достаточно привести лишь основные преимущества использования систем автоматизации в промышленности, чтобы понять, насколько их применение обоснованно и экономически выгодно:</div>
			<ul>
				<li>стабильный уровень и оперативный контроль качества за счёт автоматизации технологических процессов;</li>
				<li>бесперебойность работы и удлинение срока эксплуатации оборудования;</li>
				<li>повышение эффективности и безопасности производства;</li>
				<li>энергосбережение;</li>
				<li>снижение численности задействованного персонала.</li>
			</ul>
		</div>
		<div class="sug_blue">
			Мы имеем большой опыт работы по созданию и успешному внедрению систем промышленной автоматизации для объектов разного уровня — от инженерного обеспечения для небольших бизнес-объектов до инженерии крупномасштабных комплексов.
		</div>
		<div class="spa_orange">
			<p>В нашей компании предоставляет весь комплекс работ в области промышленной автоматики:</p>
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spaorange01.png" alt=""/><br/>
				проектирование систем автоматизации, в том числе для предприятий с тяжёлыми условиями эксплуатации
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spaorange03.png" alt=""/><br/>
				комплектация <br/>специализированным оборудованием от ведущих производителей
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spaorange02.png" alt=""/><br/>
				монтаж, пуско-наладочные работы и сервисное обслуживание
			</div>
		</div>
		<div class="sug_below">
			<p>Наши реализованные проекты:</p>
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img01.png" alt=""/>
				Животноводческой комплекс «Михайловский»
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img02.png" alt=""/>
				Завод компании «VEKA-RUS»
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img03.png" alt=""/>
				Завод Nexans
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img04.png" alt=""/>
				Фрязинский логистический комплекс
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
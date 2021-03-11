<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Кабельные системы обогрева | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и реализацию кабельных систем обогрева");
$APPLICATION->SetPageProperty("tags", "кабель обогрева, системы кабельного обогрева, кабельные системы обогрева кровли, кабельные системы обогрева трубопроводов, кабельные системы обогрева и отопления, кабельные системы обогрева труб, теплый пол, системы обогрева, система обогрева дома, системы обогрева помещений, системы обогрева крышь, обогрев водостоков, обогрев крыш, обогрев пола, обогрев участков, обогрев теплыми полами, подогрев газонов, греющий кабель, электрообогрев, нагревательный кабель, подогрев грунта");
$APPLICATION->SetPageProperty("keywords", "кабельный обогрев, кабельные системы обогрева, кабельный обогрев система");
$APPLICATION->SetTitle("Системы кабельного обогрева ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix solutions-box">
		<h1>Системы кабельного обогрева</h1>		
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
                    "WEB_FORM_ID" => "77",    // ID веб-формы
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
				<p>Профессиональные знания, многолетний практический опыт и сотрудничество с ведущими производителями позволяет нам  предлагать нашим клиентам комплексный подход к решению задач кабельного обогрева любой сложности.</p>
				<div class="pic"><img src="/solutions/cable_systems/img/sko-sushkov.png"></div>
				<div class="name">Михаил Захаров<br><span>(Продукт менеджер КНС)</span></div>
			</div>
		</div><!--.b-row__first-->
		<div class="t_sikabob01">
			Мы всегда готовы предложить Вам решения, позволяющие сочетать удобство и функциональность с ощутимой экономией ресурсов и денег
		</div>
		<div class="t_sikabob02">
			Использование систем кабельного обогрева — это важный шаг, <br/>благодаря которому Ваш объект перестанет зависеть от погодных условий и других внешних факторов
		</div>		
		<div class="t_sikabob03">
			Наши решения помогут избежать травматизма из-за скользких ступенек и разрыва труб на морозе, не допустят скопления снега на крыше и сделают тёплым пол в доме
		</div>
		<div class="t_avgreyline">
			<div class="t_avtitle t_sikabob04">
				Системы кабельного обогрева доказали свою эффективность и рациональность при использовании на коммерческих и крупномасштабных объектах:
			</div>
			<ul class="t_sikabob05">
				<li>защита от промерзания полов холодильных камер;</li>
				<li>системы обогрева в сельском хозяйстве (кабельный обогрев теплиц);</li>
				<li>подготовка замерзшего грунта для работ в зимний период;</li>
				<li>кабельный подогрев газонов, футбольных полей;</li>
				<li>решение зимних проблем по заливке бетона.</li>
			</ul>
		</div>
		<div class="t_sikabob06">
			Мы предлагаем то, что будет эффективно работать и беречь ресурсы — наши профессионалы помогут оценить потребности и заранее выявить особенности проектируемых СКС, <br/>максимально учесть будущую нагрузку и степень задействования систем
		</div>		
		<div class="t_sikabob07">
			Проекты реализуются с помощью высококачественного оборудования, современных высокопрочных материалов, по наиболее актуальным технологиям и в полном <br/>соответствии требованиям электробезопасности. Всеми работами от проектирования до <br/>рабочего запуска систем занимаются опытные специалисты нашей компании, имеющие соответствующую квалификацию
		</div>
		<div class="t_sikabob08">
			<p>Основные типы систем кабельного обогрева:</p>
			<ul>
				<li><a href="/solutions/cable_systems/warm_floor/" title="">теплый пол</a>;</li>
				<li><a href="/solutions/cable_systems/heating_gutters_roofs/" title="">обогрев водостоков и крыш</a>;</li>
				<li><a href="/solutions/cable_systems/heating_outdoor/" title="">обогрев наружных площадок</a>;</li>
				<li><a href="/solutions/cable_systems/floor_freezers/" title="">обогрев полов морозильных камер</a>;</li>
				<li><a href="/solutions/cable_systems/lawn_football_fields/" title="">обогрев газонов футбольных полей</a>.</li>
			</ul>
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать систему обогрева</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "77",    // ID веб-формы
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
					<p>Свяжитесь с менеджером <br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;" class="pp-callback" href="#">Заказать звонок<img alt="" src="/img/pic5a.gif"></a>
					</div>
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;" class="pp-sendquery" href="#">Отправить запроc<img alt="" src="/img/pic5a.gif"></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->  
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "комплекс систем информационного обеспечения, системы информационного обеспечения, проектирование лвс, локальная высокоскоростная сеть, телефонная сеть здания, проектирование телефонной сети, ip телефония, спутниковое и эфирное телевидение, системы телевидения, системы оперативной связи, диспетчеризация, СКС, структурированная кабельная система");
$APPLICATION->SetPageProperty("keywords", "комплекс систем информационного обеспечения, системы информационного обеспечения, проектирование лвс, локальная высокоскоростная сеть, телефонная сеть здания, проектирование телефонной сети, ip телефония, спутниковое и эфирное телевидение, системы телевидения, системы оперативной связи, диспетчеризация, СКС, структурированная кабельная система");
$APPLICATION->SetTitle("Комплекс систем информационного обеспечения ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div id="container">
	<div class="b-centered solutions-box clearfix">
		<h1>Комплекс систем информационного обеспечения</h1>		
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
			
			<div class="b-pull-right s01 b-form b-promo " id="bottom_form">
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
               <span>Все элементы, входящие в </span>комплекс систем информационного обеспечения, <span>направлены на то, чтобы обеспечить оперативность взаимодействия для внутренних и внешних контактов и получить максимальную пользу от применения информационных технологий в организации бизнеса.</span>
            </div>
		</div><!--.b-row__first-->

        <div class="col-xs-12">
            <div class="col-xs-2 col-sm-1 col-md-1 text-center"><img src="/solutions/automation/intellectual_building/information_system/img/malekul.png" alt=""></div>
            <div class="col-xs-10 lc_txt">
                Высокие темпы и многозадачность, присущие современной деловой среде, не допускают игнорирования актуальных технологий, особенно в области информационного обеспечения. <strong>Кто владеет информацией, тот владеет миром</strong> — очень ценная пословица для тех, кому важна чёткость и оперативность бизнес-процессов. Особенно если этот мир — Ваше предприятие с сильноразвитой инженерной инфраструктурой.
            </div>
        </div>
        <div class="col-xs-12 text-center insu_img">
            <img src="/solutions/automation/intellectual_building/information_system/img/information_suport.jpg" alt="">
        </div>
        <div class="col-xs-12  text-center">
            <div class="insu_orange_title">
                Комплекс систем информационного обеспечения состоит из
            </div>
        </div>
        <div class="insu_orange col-xs-12">
            <div class="insu_box">
                <ul>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_01.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/lan/">ЛВС</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_02.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/tv/">спутниковое и эфирное <br/>телевидение</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_03.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/sks/">СКС</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_04.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/rapid_communication/">система оперативной <br/>связи обслуживающего<br/>персонала</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_05.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/phone_etwork/">телефонные<br/>сети</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="insu_last text-center">
                Все предлагаемые системы разрабатываются с учётом потребностей и особенностей конкретного объекта и интегрируются в комплексные системы автоматизации
                <ul>
                    <li><a href="/solutions/automation/intellectual_building/" title="">«интеллектуальное здание» </a></li>
                    <li><a href="/solutions/automation/hotel_management_system/" title="">«управление гостиницами»</a></li>
                    <li><a href="/solutions/automation/smart_house/" title="">«умный дом»</a></li>
                </ul>
            </div>
        </div>

		<div class="b-row b-row__last clearfix b-promo ">
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
							<img src="/solutions/automation/intellectual_building/information_system/img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/solutions/automation/intellectual_building/information_system/img/pic5a.gif" alt=""></a>
						</div>
						
						<div class="toplink2">
							<img src="/solutions/automation/intellectual_building/information_system/img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/solutions/automation/intellectual_building/information_system/img/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
    </div><!--.b-promo-->
	</div><!--.b-promo--> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
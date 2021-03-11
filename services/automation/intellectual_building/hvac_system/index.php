<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "система отопления, система отопления здания, автоматизированная система отопления, система управления отоплением, блок управления системой отопления, умное отопление, дистанционное управление отоплением, автономное отопление, термостат, датчики температуры, система вентиляции, система вентиляции и кондиционирования, вентиляция и кондиционирование воздуха, управление вентиляцией, система управления вентиляцией, автоматизированная систему управления вентиляцией, автоматизация вентиляции, автоматизация систем вентиляции, автоматизация вентиляции и кондиционирования, автоматизация систем кондиционирования, автоматизация кондиционирования, система вентиляции и кондиционирования, управление вентиляцией и кондиционированием, вентиляция и кондиционирование в умном доме, управление температурой или влажностью, микроклимат помещений, микроклимат комнат, термостат, датчики температуры, датчики влажности");
$APPLICATION->SetPageProperty("keywords", "система отопления, система отопления здания, автоматизированная система отопления, система управления отоплением, блок управления системой отопления, умное отопление, дистанционное управление отоплением, автономное отопление, термостат, датчики температуры, система вентиляции, система вентиляции и кондиционирования, вентиляция и кондиционирование воздуха, управление вентиляцией, система управления вентиляцией, автоматизированная систему управления вентиляцией, автоматизация вентиляции, автоматизация систем вентиляции, автоматизация вентиляции и кондиционирования, автоматизация систем кондиционирования, автоматизация кондиционирования, система вентиляции и кондиционирования, управление вентиляцией и кондиционированием, вентиляция и кондиционирование в умном доме, управление температурой или влажностью, микроклимат помещений, микроклимат комнат, термостат, датчики температуры, датчики влажности");
$APPLICATION->SetTitle("системы отопления, вентиляции и кондиционирования воздуха ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div id="container">
	<div class="b-centered  solutions-box clearfix">

		<h1>Система отопления, вентиляции и кондиционирования воздуха</h1>

		
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
			
			
			<div class="b-pull-right s01 b-form b-promo" id="bottom_form">
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
            <div class="avr_descr review s02">
                Вы можете быть уверены в результате  <span> — применение системы обеспечит комфортные условия работы и отдыха, а также повысят срок службы оборудования и его эргономичность, что принесёт Вам</span> дополнительные экономические выгоды
            </div>
		</div><!--.b-row__first-->

        <div class="vent_orange col-xs-12">
                <div class="col-xs-2  col-sm-1 col-md-1 col-lg-1 text-center"><img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_01.png" alt=""></div>
                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 ">
                    Отопление, вентиляция и кондиционирование воздуха — важные слагаемые комплекса систем жизнеобеспечения, без которых невозможно функционирование любого современного здания. 
                    И только благодаря автоматизации процессов стало возможным создание и централизованная поддержка благоприятного микроклимата на объекте любого масштаба.
                </div>
        </div>
        <div class="col-xs-12 text-center vent_img">
            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_02.png" alt="">
        </div>

        <div class="col-xs-12 vent_txt">
            Мы занимаемся разработкой и <strong>профессиональным воплощением систем автоматизации</strong> отопления, вентиляции и кондиционирования любой конфигурации и категории сложности. Надёжность и качество работы любой системы отопления характеризуется не только характеристиками оборудования, но и квалификацией тех, кто займётся проектированием и монтажом систем отопления. Наши специалисты, оценив потребности объекта и Ваши пожелания, рекомендуют тип системы <strong>(воздушный, газовый или водяной)</strong> и источник теплоснабжения, сформируют оптимальный набор функций для будущей системы и подберут оптимальное оборудование, соответствующее всем расчётным и техническим параметрам. С учетом особенностей и потребностей объекта мы предложим оптимальную схему циркуляции свежего воздуха и кондиционирования, позволяющую поддерживать необходимые Вам влажность и температуру круглосуточно.
        </div>

        <div class="vent_orange col-xs-12">
            <div class="text-center">
                <h2>Возможности система отопления, вентиляции и кондиционирования воздуха:</h2>
            </div>
                <div class="text-center">
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_03.png" alt="">    
                        </div>
                        <strong>климат-контроль</strong> — централизованная поддержка температуры, уровня влажности и отопления
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_04.png" alt="">    
                        </div>
                        <strong>поддержка микроклимата</strong> в специальных помещениях;
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_05.png" alt="">    
                        </div>
                        <strong>дистанционное управление</strong> климатом, в том числе в конкретных помещениях;
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_06.png" alt="">    
                        </div>
                        <strong>мониторинг</strong> внутренних условий и автоматическая корректировка;
                    </div>                    
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_07.png" alt="">    
                        </div>
                        <strong>изменение микроклимата</strong> 
                        с учётом внешних условий 
                        (время суток, сезон и пр.);
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_08.png" alt="">    
                        </div>
                        <strong>очистка</strong>, озонирование, ионизация воздуха;
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_09.png" alt="">    
                        </div>
                        <strong>согласование</strong> работы отдельных систем и формирование задач для каждой (включение тёплого пола, управление вентиляцией в зависимости от температуры и влажности и пр.);
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_10.png" alt="">    
                        </div>
                        <strong>контроль</strong> аварийных ситуаций
                    </div>
                </div>
        </div>
           <div class="lc_list">
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_12.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/ups/" title="">система гарантированного бесперебойного электроснабжения (генераторные установки)</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_11.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/lighting_system/" title="">система освещения и управления освещением</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_13.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/elevator_system/" title="">система контроля и управления лифтами, эскалаторами</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_14.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/accounting_system/" title="">система учета энергоносителей (АСКУЭ, АСТУЭ)</a>
                    </div>
                </div>
            </div>

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
                  
                    </div>

                </div>
                
            </div><!--.b-form-contacts-->

        </div><!--.b-row__last-->
		
    </div><!--.b-promo-->
	</div><!--.b-promo-->
 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
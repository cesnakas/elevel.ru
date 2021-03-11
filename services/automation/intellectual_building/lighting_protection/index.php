<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "молниезащита, молниезащита зданий, молниезащита зданий и сооружений, системы молниезащиты, молниезащита дома, громозащита, громоотвод, молниезащита промышленных зданий, молниезащита кровли, заземление зданий, молниезащита и заземление, молниезащиты жилого дома, ограничители перенапряжения, система защиты от молний, проект молниезащиты, проект молниезащиты здания");
$APPLICATION->SetPageProperty("keywords", "молниезащита, молниезащита зданий, молниезащита зданий и сооружений, системы молниезащиты, молниезащита дома, громозащита, громоотвод, молниезащита промышленных зданий, молниезащита кровли, заземление зданий, молниезащита и заземление, молниезащиты жилого дома, ограничители перенапряжения, система защиты от молний, проект молниезащиты, проект молниезащиты здания");
$APPLICATION->SetTitle("Молниезащита ");
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

		<h1>Система молниезащиты</h1>

		
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
                система молниезащиты <span> является неотъемлемой частью комплекса технических средств безопасности наша компания предлягает</span> проектирование и монтаж <span>систем молниезащиты</span>
            </div>
		</div><!--.b-row__first-->

        <div class="row">
            <div class="lc_orange">
            Нередко проблема молниезащищённости зданий не воспринимается всерьёз или трактуется как малозначащая. Однако достаточно всего лишь одного попадания молнии, чтобы понять всю серьёзность проблемы, без решения которой под угрозой оказывается безопасность людей, сохранность самого объекта и работоспособность всех электрических устройств, которым наполнено любое современное здание.
            </div>
            <div class="light_shield_img text-center">
                <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_01.png" alt="">
            </div>
            <div class="light_shield_list">
                <div class="col-xs-12">
                    <div class="col-xs-5">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_02.png" alt="" class="pull-left"/>
                        <div class="lc_list_link">
                             <a href="/solutions/automation/smart_house/alarm_system/" title="">система пожарной сигнализации</a>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_03.png" alt="" class="pull-left"/>
                        <div class="lc_list_link">
                             <a href="/solutions/automation/intellectual_building/access_control_system/" title="">система контроля доступа</a>
                        </div>
                    </div>
                </div>                
                <div class="col-xs-12">
                    <div class="col-xs-5">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_04.png" alt="" class="pull-left"/>
                        <div class="lc_list_link">
                             <a href="/solutions/automation/smart_house/video_system/" title="">система видеонаблюдения</a>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_05.png" alt="" class="pull-left"/>
                        <div class="lc_list_link">
                             <a href="/solutions/automation/smart_house/alarm_system/" title="">система охранной сигнализации</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="light_shield_grey text-center">
            Наша компания предлагает <span>проектирование и монтаж систем молниезащиты</span> разрабатываемых в соответствии с новым стандартом <span>DIN EN 62305-4</span> Мы предлагаем три типа грозозащиты:
        </div>
        <div class="lc_orange text-center">
            <div class="orange_block">
                <div>
                <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_06.png" alt="">    
                </div>
                
                Внешняя (защита от прямых ударов молнии для предотвращения пожаров)
            </div>
            <div class="orange_block">
                <div>
                <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_07.png" alt="">    
                </div>
                
                Внутренняя (защита от импульсного перенапряжения, возникающего из-за влияния тока молнии, это особенно актуально для систем энергоснабжения
            </div>
            <div class="orange_block">
                <div>
                <img src="/solutions/automation/intellectual_building/alarm_system/img/lightning-shield_08.png" alt="">    
                </div>
                
                Защита электрооборудования с учетом селективности автоматических выключателей и устройств защитного отключения (УЗО)
            </div>
        </div>


		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2  b-promo">
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
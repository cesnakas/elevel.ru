<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "система пожарной сигнализации, датчики дыма, датчики задымленности, датчик температуры, термостаты, пожарная сигнализация, контроль возгорания");
$APPLICATION->SetPageProperty("keywords", "система пожарной сигнализации, датчики дыма, датчики задымленности, датчик температуры, термостаты, пожарная сигнализация, контроль возгорания");
$APPLICATION->SetTitle("Система пожарной сигнализации ");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div id="container">
	<div class="b-centered   solutions-box clearfix">
		<h1>Система пожарной сигнализации</h1>		
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
                <span>Многие считают, что пожар <br/></span>— это неотвратимое явление с неизбежными последствиями.<span>
                Мы докажем Вам обратное — с установкой системы пожарной сигнализации безопасность перестанет быть зависимой от случайных ситуаций, а также от скорости и непредсказуемости реакции персонала.</span>
            </div>
		</div><!--.b-row__first-->

        <div class="t_against_fire01 col-xs-12">
            <div class="col-xs-12">
                <h2>Для тушения очагов возгорания в контролируемых помещениях задействуются системы пожаротушения водяного, пенного и порошкового типа</h2>
                Система пожарной сигнализации является неотъемлемой частью комплекса  технических средств безопасности наряду со следующими системами:
            </div>
                <div class="col-xs-12">
                    <div class="centerpage">
                        <ul>
                            <li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">система контроля доступа</a></li>
                            <li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">система молниезащиты</a></li>
                        </ul>                   
                        <ul>
                            <li><a href="/solutions/automation/smart_house/video_system/" title="">система видеонаблюдения</a></li>
                            <li><a href="/solutions/automation/smart_house/alarm_system/" title="">система охранной сигнализации</a></li>
                        </ul>
                    </div>
                </div>
                <img src="/solutions/automation/intellectual_building/technical_security_set/img/against_fire.jpg" alt="" class="against_fire_img"/>
                <div class="text-center">
                    <div class="t_against_fire_title">
                        Основные преимущества системы:
                    </div>
                </div>
        </div>
        <div class="t_against_fire02 col-xs-12">

                <div>
                    <p>
                        раннее обнаружение очагов возгорания и задымления (датчики температуры, дыма и пр.)
                    </p>
                </div>              
                <div>
                    <p>
                        формирование команд на включение и запуск автоматических установок пожаротушения и дымоудаления, систем голосового оповещения о пожаре
                    </p>
                </div>              
                <div>
                    <p>
                        оперативное оповещение (включение сирены, голосовые предупреждения, передача сообщений с использованием цифровой связи); в штатном режиме системы оповещения могут использоваться также для передачи фоновой 
                    </p>
                </div>              
                <div>
                    <p>
                        регистрация и обработка информации о внештатных ситуациях (фиксация даты, места и времени 
несанкционированного проникновения, возникновения пожара)
                    </p>
                </div>              
                <div>
                    <p>
                        вызов сценариев для инженерных подсистем при возникновении опасности (вызов соответствующих режимов вентиляции, работы лифтов и пр.)
                    </p>
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
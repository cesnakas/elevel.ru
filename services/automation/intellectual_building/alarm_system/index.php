<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "система охранной сигнализации, датчики движения, системы безопасности, охранная сигнализация, датчики объема, датчики вибрации, тревожная кнопка, контроль проникновения");
$APPLICATION->SetPageProperty("keywords", "система охранной сигнализации, датчики движения, системы безопасности, охранная сигнализация, датчики объема, датчики вибрации, тревожная кнопка, контроль проникновения");
$APPLICATION->SetTitle("Система охранной сигнализации ");
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

		<h1>Система охранной сигнализации</h1>

		
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
                Индивидуальная оценка потребностей каждого проекта <span> использование оборудования ведущих брендов, отлично зарекомендовавшего себя в деле</span>
                <p>всё это плюс наш профессионализм гарантируют 100% уверенность в защищённости объекта</p>
            </div>
		</div><!--.b-row__first-->

        <div class="col-xs-12 text-center coc_img">
            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_01.jpg" alt="">
        </div>
        <div class="col-xs-12  lc_orange">
            Для любого объекта чрезвычайно важно обеспечить защиту от незаконных проникновений. Для решения этой задачи необходим комплексный подход и тщательная оценка требований к уровню безопасности конкретного объекта. Мы подходим с особой тщательностью к созданию систем охранной сигнализации, максимально расширяя возможности благодаря объединению традиционных элементов с инженерными системами. Наши решения одинаково эффективны для масштабных объектов, где требуются многоуровневые решения, и небольших помещений со стандартными задачами.
        </div>
        <div class="coc_list row">
            <div class="coc_icons">
                <div class=" col-xs-12 coc_line">
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_02.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/intellectual_building/access_control_system/" title="">система контроля доступа</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_03.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/smart_house/alarm_system/" title="">система пожарной сигнализации</a>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class=" col-xs-12 coc_line">
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_04.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/intellectual_building/lighting_protection/" title="">система молниезащиты</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_05.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/smart_house/video_system/" title="">система видеонаблюдения</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 coc_grey">
            <div class="text-center">
                <h2>Система обеспечит на объекте прежде недоступный уровень безопасности</h2>
            </div>
            <div class="coc_ul">
                <ul>
                    <li><strong>мгновенное выявление</strong> попыток несанкционированного проникновения на охраняемую территорию</li>
                    <li><strong>оперативное оповещение</strong> (включение сирены, голосовые предупреждения, передача сообщений с использованием цифровой связи)</li>
                    <li><strong>формирование команд</strong> на включение и запуск автоматических установок пожаротушения и 
    дымоудаления, систем голосового оповещения о пожаре; включение защитных режимов
    (режим «имитация присутствия» при попытке проникновения)</li>
                    <li><strong>регистрация и обработка</strong> информации о внештатных ситуациях (фиксация даты, места и времени несанкционированного проникновения)</li>
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
							<img src="img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="img/pic5a.gif" alt=""></a>
						</div>
						
						<div class="toplink2">
							<img src="img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="img/pic5a.gif" alt=""></a>
						</div>
					</div>-->

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
    </div><!--.b-promo-->
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
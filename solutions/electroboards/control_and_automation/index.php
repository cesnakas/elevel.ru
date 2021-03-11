<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Щиты управления (ЩУ) и автоматики (ЩА)");
?> 
<script>
	(function($) {
	$(function() {
		$('select.stylize').selectbox();
	})
	})(jQuery)
</script>
<div class="b-centered b-promo clearfix">
		<h1>Щиты управления (ЩУ) и автоматики (ЩА)</h1>	
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "left-menu", array(
	"ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "7",    // ID веб-формы
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
				Щитовое оборудование управления и автоматики <span>предназначено для функционирования систем автоматизации - освещения, отопления и вентиляции, пожарных и пр.</span>
				<p>Щиты управления (ЩУ) используются при необходимости ручной регулировки параметров работы систем.
Щиты автоматики (ЩА) применяются в ситуациях, когда за функционирование систем отвечают запрограммированные контроллеры.</p>
			</div>
		</div><!--.b-row__first-->

	<div class="avr_title">
		В зависимости от потребностей конкретного объекта электрощиты могут выполнять следующие функции:
	</div>
	<ul class="avrul">
		<li>обеспечение продолжительной и бесперебойной работы систем по заранее согласованной программе;</li>
		<li>контроль состояния оборудования и датчиков (тепловых, сенсорных, механических и пр.);</li>		
		<li>исполнение заданных переключений для предотвращения аварийных ситуаций;</li>
		<li>управление в автоматическом режиме в соответствии с заданными параметрами, либо в ручном режиме.</li>
	</ul>

	<div class="avrcontainer">
		<img src="/solutions/electroboards/main_switchboard/img/shusha.png" alt=""/>
		<div class="shusharyellow">
			В нашей компании можно заказать щиты ЩА и ЩУ по индивидуальной и типовой схеме в различном исполнении — уличном варианте в защищённом металлическом корпусе и варианте для помещений. Рекомендация использования зависит от функциональной нагрузки электрощита и особенностей конкретного объекта.
		</div>		
	</div>	
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать</h3>
				<div class="b-pull-left b-form" id="bottom_form">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "7",    // ID веб-формы
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
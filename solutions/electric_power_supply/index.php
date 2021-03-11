<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Электроснабжение, Эlevel -  проектирование электроснабжения. Разработка проекта.");
$APPLICATION->SetPageProperty("description", "Компания Эlevel - помощь в электроснабжении. Профессиональное проектирование электроснабжения по оптимальной цене.");
$APPLICATION->SetPageProperty("tags", "электорснабжение, распределительная сеть, выделенное питание, системы бесперебойного питания, энергоснабжение, система автономного электроснабжения, ИБП, электрощитовое оборудование, электрощиты, щиты, электропроводка, дизельные генераторы, система диспетчеризации, система шинопроводы, источник бесперебойного питания, КТП, НКУ, диспетчеризация инженерных систем, автоматизация и диспетчеризация инженерных систем, низковольтные комплектные устройства, комплектные трансформаторные подстанции,");
$APPLICATION->SetPageProperty("keywords", "Электроснабжение, проектирование");
$APPLICATION->SetTitle("Электроснабжение, Эlevel -  проектирование электроснабжения. Разработка проекта.");

?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
	<div class="b-centered b-promo clearfix">
		<h1>Электроснабжение</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
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
                    "WEB_FORM_ID" => "71",    // ID веб-формы
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
				<p>Мы не просто выполняем работы по созданию систем электроснабжения, мы готовы предложить современные и надежные решения начиная от распределительного щита до розетки.</p>
				<div class="pic"><img src="/solutions/electric_power_supply/img/el-alexeev.png"></div>
				<div class="name">Дмитрий Алексеев<br><span>(Руководитель отдела реализации проектов)</span></div>
			</div>
		</div><!--.b-row__first-->
		<div class="t_elektrotitle">
			Одной из специализаций нашей компании является <span>разработка и реализация сетей электроснабжения</span>, без которых невозможно представить ни один объект:
		</div>
		<div class="t_elektroboxwrap">
			<div class="t_elektrobox">
				<img src="img/t_ele-home.png" alt=""/>
				<p>бытовых и выделенных сетей электроснабжения для жилых или административных и  промышленных зданий;</p>
			</div>		
			<div class="t_elektrobox">
				<img src="img/t_ele-atention.png" alt=""/>
				<p>систем гарантированного и бесперебойного питания, надёжно защищающие объекты от отключений;</p>
			</div>		
			<div class="t_elektrobox">
				<img src="img/t_ele-mol.png" alt=""/>
				<p>а также внедрения специализированных систем защиты (молниезащита и пр.).</p>
			</div>
		</div>
	<div class="t_greyline">
		<p>К системам электроснабжения относят:</p>
		<div class="t_wrapdiv1">
			<ul class="t_elespis">
				<li>комплектные трансформаторные подстанции (КТП);</li>
				<li>низковольтные комплектные устройства <br/>(НКУ);</li>
				<li>шинопроводы;</li>
			</ul>			
			<ul class="t_elespis">
				<li>источники бесперебойного питания (ИБП) и дизельные генераторы (ДГ);</li>
				<li>системы диспетчеризации и визуализации;</li>
				<li>Мини-ТЭЦ, ГПУ, когенерационные установки.</li>
			</ul>
		</div>
	</div>
		<div class="t_wrapdiv1">
			Любой электропроект наши специалисты выполнят в кратчайшие сроки, произведя учет индивидуальных особенностей электроснабжения Вашего объекта.
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать систему</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "71",    // ID веб-формы
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
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="img/pic5a.gif" alt=""></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
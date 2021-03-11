<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Управление освещением (светом),  Elevel  системы управления. Управление светом");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает систему управления освещением. Разработка и реализация системы управления светом на выгодных условиях");
$APPLICATION->SetPageProperty("tags", "система управления освещением, управление освещением, управление светом, дистанционное управление освещением, управление наружным освещением, управлением внутренним освещением, автоматизированное управление освещением, светорегулятор, диммер, контроль освещения, система освещения в зданиях, система освещения в помещениях");
$APPLICATION->SetPageProperty("keywords", "управление освещением, управление светом");
$APPLICATION->SetTitle("системы освещения и управления освещением ");
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
		<h1>Система освещения и управления освещением</h1>		
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
            <div class="avr_descr review s02">
                Мы предусматриваем гибкую конфигурацию для систем освещения — <span> при необходимости перепланировки офисного пространства</span>
                Вам не придётся заново тратиться на монтаж кабельной сети
            </div>
		</div><!--.b-row__first-->

        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-2 col-sm-1 col-md-1 text-center"><img src="/solutions/automation/intellectual_building/alarm_system/img/light_control_01.png" alt=""></div>
                <div class="col-xs-9 lc_txt">
                    На объектах общественного и промышленного назначения при создании систем освещения требуется выполнение сразу нескольких условий — с одной стороны, <strong>обеспечить нужный уровень освещения</strong>, соответствующий назначению объекта и в то же время <strong>максимально снизить эксплуатационные затраты</strong>  и учесть требования, предъявляемые к промышленному освещению.
                </div>
            </div>
            <div class="col-xs-12 text-center lc_img">
                <img src="/solutions/automation/intellectual_building/alarm_system/img/light_control_02.jpg" alt="">
            </div>
            <div class="lc_txt2">
                <strong>Специалисты</strong> нашей компании имеют богатый и успешный опыт по созданию систем освещения. Именно поэтому мы  предлагаем решения по автоматизированному управлению освещением, полностью реализующие поставленные Вами задачи и максимально учитывающие условия будущей эксплуатации:
            </div>
            <div class="lc_orange">
                <ul>
                    <li><strong>Потребности</strong> и индивидуальные особенности объекта</li>
                    <li><strong>Функциональный набор</strong> (поддержка  уровня освещенности, локального и дистанционного управления из одного или нескольких помещений, контроля исправности осветительных приборов и пр.)
</li>
                    <li><strong>Реализация функционала</strong> в соответствии с  санитарно-гигиеническими нормами  и дизайн-проектом
обеспечение эффективного управления и контроля системой</li>
                    <li><strong>Интеграция энергосберегающих систем</strong>, контроль и учёт энергоресурсов</li>
                    <li><strong>Использование технологий</strong> и систем локальной автоматизации, расширяющих возможности  и оптимизирующих воплощение системы (беспроводные технологии при монтаже в помещениях с уже завершенной отделкой, системы группового управления жалюзи и пр.)</li>
                </ul>
            </div>
            <div class="lc_list">
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/light_control_03.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/ups/" title="">система гарантированного бесперебойного электроснабжения (генераторные установки)</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/light_control_04.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/hvac_system/" title="">система отопления, вентиляции и кондиционирования воздуха</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/light_control_05.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/elevator_system/" title="">система контроля и управления лифтами, эскалаторами</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/light_control_06.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/accounting_system/" title="">система учета энергоносителей (АСКУЭ, АСТУЭ)</a>
                    </div>
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
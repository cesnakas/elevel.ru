<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "лвс, проектирование лвс, локальная высокоскоростная сеть, монтаж лвс, монтаж компьютерных сетей");
$APPLICATION->SetPageProperty("keywords", "лвс, проектирование лвс, локальная высокоскоростная сеть, монтаж лвс, монтаж компьютерных сетей");
$APPLICATION->SetTitle("ЛВС");
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

		<h1>Локальные вычислительные сети (ЛВС)</h1>

		
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
               <span>ЛВС или (LAN) —</span> это совместное подключение отдельных компьютеров <span>(рабочих станций) к каналу передачи данных. ЛВС включает в себя кабельные сети (СКС), активное сетевое оборудование и компьютеры различного назначения.</span>
            </div>
		</div><!--.b-row__first-->

         <div class="lvc_blue col-xs-12">
            <div class="col-xs-3 col-sm-2 col-md-2 text-center">
                <img src="/solutions/automation/intellectual_building/information_system/img/lvc01.png" alt="">
            </div>
            <div class="col-xs-9 col-sm-10 col-md-10">
                В современном мире подавляющее число компьютеров объединены в различные локальные вычислительные сети (ЛВС) — от небольших, охватывающих несколько помещений офиса до крупных, обслуживающих целый комплекс зданий. Это вызвано потребностью в быстром обмене информацией между пользователями сети и совместного использования информационных и аппаратно-технических ресурсов, с чем отлично  и эффективно справляется ЛВС.
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <img src="/solutions/automation/intellectual_building/information_system/img/lvc02.jpg" alt="" class="lvc_img">
        </div>
        <div class="col-xs-12 lvc_grey">
            <div class="text-center">
                <h2>Преимущества создания ЛВС очевидны</h2>
            </div>
            <ul>
                <li><p><strong>оперативно взаимодействие</strong> и высокоскоростные коммуникации внутри ЛВС</p></li>
                <li><p><strong>возможность совместного использования технических средств</strong>, открывающая доступ к периферийным устройствам 
— хранилищам данных, принтерам, сканерам, факсам и пр.</p></li>
                <li><p><strong>централизованное управление сетью</strong>, позволяющее удалённо решать общие и локальные задачи (к примеру, централизованные инсталляции ПО для работы на компьютерах сети)</p></li>
                <li><p><strong>контролируемый совместный доступ</strong> и использование баз данных множеством пользователей ЛВС</p></li>
                <li><p><strong>оптимизация</strong> ресурсов внутри сети</p></li>
                <li><p><strong>эффективное использование средств</strong> совместной работы и коммуникаций (электронная почта, электронный документооборот, веб — технологии, Интернет и пр.)</p></li>
            </ul>
        </div>
        <div class="insu_orange col-xs-12">
            <div class="insu_box">
                <div class="text-center">
                    <h3>Локальные вычислительные сети (ЛВС) являются неотъемлемой частью комплекса систем информационного обеспечения наряду со следующими системами:</h3>
                </div>
                <ul>
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
        <div class="col-xs-12 lvc_last">
            <div class="col-xs-2 col-sm-1 col-md-2 text-center"><img src="/solutions/automation/intellectual_building/information_system/img/lvc02.png" alt=""></div>
            <div class="col-xs-10 ">
                Бесспорно то, что за проектированием и монтажом ЛВС  необходимо обращаться к профессионалам, поскольку только правильно выстроенная вычислительная <strong>сеть сможет обеспечить эффективную работу</strong>, а также оперативность взаимодействия, безопасность хранения и обмена информацией. Специалисты нашей компании помогут определить потребности будущей сети, разработать и реализовать ЛВС любого уровня в строгом соответствии со стандартами ЛВС.
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
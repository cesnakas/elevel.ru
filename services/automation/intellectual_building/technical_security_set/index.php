<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "комплекс технических средств безопасности, система контроля доступа, система видеонаблюдения, система пожарной сигнализации, система охранной сигнализации, безопасность интеллектуального здания, система безопасности здания, система охранно-пожарной безопасности, система безопасности интеллектуального здания, автоматическая пожарная сигнализация, голосовое оповещение о пожаре, автоматическое пожаротушение");
$APPLICATION->SetPageProperty("keywords", "комплекс технических средств безопасности, система контроля доступа, система видеонаблюдения, система пожарной сигнализации, система охранной сигнализации, безопасность интеллектуального здания, система безопасности здания, система охранно-пожарной безопасности, система безопасности интеллектуального здания, автоматическая пожарная сигнализация, голосовое оповещение о пожаре, автоматическое пожаротушение");
$APPLICATION->SetTitle("Комплекс технических средств безопасности ");
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

		<h1>Комплекс технических средств безопасности</h1>

		
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
                Вопрос обеспечения безопасности объекта <span>одинаково важен для частного и коммерческого жилья, приобретая особую актуальность и потребность в высокопрофессиональной разработке и реализации на крупномасштабных объектах</span>
                <p>ажно предупредить ситуации, подвергающие опасности здоровье людей, сохранность имущества и вызывающие повреждения здания и оборудования, именно поэтому в нашей компании подходят к проектирования и воплощению систем безопасности комплексно и с особенной тщательностью
            </div>
		</div><!--.b-row__first-->

        <div class="col-xs-12 text-center">
            <img src="/solutions/automation/intellectual_building/technical_security_set/img/kompleks-k-s-b.jpg" alt="" class="kompleksimg"/>
        </div>
            <div class="kom_tex_text">
                Специалисты нашей компании оценят необходимость установки тех или иных средств безопасности, учтут все Ваши пожелания и особенности исполнения для конкретного объекта, продумают необходимый функционал и создадут систему, поtлноценно обеспечивающую безопасность здания и его обитателей
            </div>
            <div class="kom_tex_center">
                <div class="kom_tex_title">
                    <h2>В комплекс технических средств безопасности входят:</h2>
                </div>
                <ul class="kom_tex_ul">
                    <li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">система контроля доступа</a></li>
                    <li><a href="/solutions/automation/intellectual_building/video_control/" title="">система видеонаблюдения</a></li>
                    <li><a href="/solutions/automation/intellectual_building/fire_alarm/" title="">система пожарной сигнализации</a></li>
                    <li><a href="/solutions/automation/intellectual_building/alarm_system/" title="">система охранной сигнализации</a></li>
                    <li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">система молниезащиты</a></li>
                </ul>
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
					<div class="b-top-link-wrp1">
						
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
    </div><!--.b-promo-->
	</div><!--.b-promo-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
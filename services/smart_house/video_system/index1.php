<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "система видеонаблюдения, домофония, видеодомофония, цифровые системы видеонаблюдения, охранные системы видеонаблюдения, системы видеонаблюдения для дома, датчики движения, датчики объема, видеосервер, камеры слежения дома, камеры видеонаблюдения, автоматизация видеонаблюдения, автоматизация системы видеоналюдения, видеорегистраторы в системе видеонаблюдения, мониторинг инженерных систем, мониторинг помещений, ip видеонаблюдения");
$APPLICATION->SetPageProperty("keywords", "умный дом видеонаблюдение, системы видеонаблюдения для дома");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает разработку систем видеонаблюдения - части комплекса технических средств систем безопасности.");
$APPLICATION->SetTitle("Система видеонаблюдения | Эlevel");
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

		<h1>Система видеонаблюдения</h1>

		
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
                <span>Одно из приоритетных направлений в области безопасности</span> – применение систем видеонаблюдения <span> (система охранного телевидения), необходимое для постоянного контроля ситуации на объекте</span>
            </div>
		</div><!--.b-row__first-->

        <div class="centerpage">
            <div class=" t_video_obs">
                <h2>Система гарантирует исполнение перечня функций</h2>
                <ul>
                    <li>распределение и управление сигналом с камер наблюдения на любой монитор или телевизор</li>
                    <li>удалённое управление положением камер видеонаблюдения</li>
                    <li>интеллектуальная обработка видеосигнала и регистрация видеоинформации</li>
                    <li>ведение архива цифровой информации в заданный период времени</li>
                    <li>активизация записи как на постоянной основе, так и в определенные промежутки времени (включение по таймеру, по движению, при постановке на охрану)</li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 t_video_beige">
            <div class="t_video_img">
                ПРИНЦИПИАЛЬНАЯ СХЕМА СОВРЕМЕННОЙ СИСТЕМЫ ВИДЕОНАБЛЮДЕНИЯ
                <img src="/solutions/automation/intellectual_building/technical_security_set/img/video_obs.jpg" alt=""/>
            </div>
        </div>
        <div class="col-xs-12">
            Мы предлагаем разработку систем на базе наиболее передовых и перспективных технологий – цифровых технологий с использованием IP-камер. В IP-видеонаблюдении информация с камеры передается на видеосервер по цифровым каналам и исключает недостатки аналоговой системы: здесь не требуется промежуточное преобразование видеосигнала, а также нет ограничения по разрешению видеоизображения.<br/><br/>

            Благодаря системе видеонаблюдения предоставляется возможность оперативно реагировать на события, не вступая в контакт с нарушителями. Кроме того, при использовании на коммерческом объекте система дисциплинирует сотрудников и предотвращает хищения имущества.
        </div>
        <div class="col-xs-12 t_video_last">
            <div class="col-xs-4">
                <div class="t_video_text">
                    Система видеонаблюдения является неотъемлемой частью комплекса технических средств безопасности наряду со следующими системами
                </div>                
            </div>
            <div class="col-xs-4">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <img src="/solutions/automation/intellectual_building/technical_security_set/img/video_obs01.jpg" alt=""/>
                        </div>                        
                        <div class="col-xs-8 t_video_ul">
                            <a href="/solutions/automation/intellectual_building/access_control_system/" title="">система контроля доступа</a>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <img src="/solutions/automation/intellectual_building/technical_security_set/img/video_obs02.jpg" alt=""/>
                        </div>                        
                        <div class="col-xs-8 t_video_ul">
                            <a href="/solutions/automation/smart_house/fire_alarm/" title="">система пожарной сигнализации</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <img src="/solutions/automation/intellectual_building/technical_security_set/img/video_obs03.jpg" alt=""/>
                        </div>                        
                        <div class="col-xs-8 t_video_ul">
                            <a href="/solutions/automation/smart_house/alarm_system/" title="">система охранной сигнализации</a>
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <img src="/solutions/automation/intellectual_building/technical_security_set/img/video_obs04.jpg" alt=""/>
                        </div>                        
                        <div class="col-xs-8 t_video_ul">
                            <a href="/solutions/automation/intellectual_building/lighting_protection/" title="">система молниезащиты</a>
                        </div>
                    </div>
                </div>                
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

					<div class="b-top-link-wrp1">
						
					</div>

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
    </div><!--.b-promo-->
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
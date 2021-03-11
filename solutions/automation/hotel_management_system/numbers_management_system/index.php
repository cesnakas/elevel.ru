<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "система управления номерами, система управления гостиничными номерами, управление освещением, управление отопление, управление вентиляцией и кондиционированием, контроль доступа, управление гостиничными номерами, система автоматизации номеров");
$APPLICATION->SetPageProperty("keywords", "система управления номерами, система управления гостиничными номерами, управление освещением, управление отопление, управление вентиляцией и кондиционированием, контроль доступа, управление гостиничными номерами, система автоматизации номеров");
$APPLICATION->SetTitle("Система управления номерами");
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

		<h1>Система управления номерами</h1>

		
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
                <span>Мы предлагаем разработку </span>систем управления номерами<span> и другими помещениями отеля, реализованных на комплексных решениях известнейших мировых электротехнических брендов</span>
                <p>
                    Одно из таких решений — уже заслужившая доверие в профессиональных кругах система автоматизации управления гостиничными номерами YESINN SYSTEM производства корейской компании INNTECH. Эту систему и другие не менее известные и надёжные комплексы можно устанавливать в любом отеле, независимо от степени его оснащенности и масштабности
                </p>
            </div>
		</div><!--.b-row__first-->

        <div class="col-xs-12 text-center coc_img">
            <img src="/solutions/automation/intellectual_building/technical_security_set/img/sun.jpg" alt="">
        </div>
        <div class="col-xs-12 suntext">
                Благодаря функционалу системы Вы сможете поддерживать класс отеля на высочайшем уровне, позволяя круглосуточно контролировать основные параметры состояния номера и уровень сервиса, предоставляемого гостям. Инновационные решения, реализованные при разработке системы, дают возможность менеджменту отеля получать детальную информацию о статусе номеров, предоставляемом гостям сервисе и скорости реакции персонала на потребности гостей.
        </div>
        <div class="col-xs-12 t_sun_grey">
            <div class="text-center">
                <h2>ОСНОВНЫЕ ЗАДАЧИ, РЕШАЕМЫЕ СИСТЕМОЙ:</h2>
            </div>
            <div class="col-xs-12 ">
                <div class="col-xs-6">
                   <ul class="t_sun_ul">
                    <li>
                        <strong>контроль</strong> и поддержание микроклимата в номерах отеля
                    </li>                   
                    <li>
                        <strong>широкие</strong> возможности для гостей: возможность 
                        централизованного управления с единой консоли всем 
                        оборудованием номера (освещение, температура 
                        воздуха, шторы и пр.), обращения в сервисные службы, 
                        а также доступ к внутреннему информационному сервису 
                        отеля
                    </li>                   
                    <li>
                        <strong>централизованный </strong>контроль состояния номеров и их статуса 
                        отеля
                    </li>                   
                    <li>
                        <strong>экономия</strong> энергоресурсов с помощью применения специальных технологий (датчики присутствия, обмен данными с системой контроля входа/выхода и пр.)
                    </li>
                </ul>
                </div>                
                <div class="col-xs-6">
                    <ul class="t_sun_ul">
                    <li>
                        <strong>возможность</strong> удалённого контроля работы персонала и нахождения на рабочих местах;
                    </li>                   
                    <li>
                        <strong>автоматическое</strong> ведение журнала событий для инженерных и сервисных служб;
                    </li>                   
                    <li>
                        <strong>обеспечение</strong> безопасности посетителей при помощи систем оповещения и видеонаблюдения
                    </li>                   
                    <li>
                        <strong>круглосуточный</strong> мониторинг обращения  гостей в сервисную службу для оперативной обработки и 
                        реагирования
                    </li>
                </ul>
                </div>
            </div>
        </div>
            <div class="t_sun_blue col-xs-12">
                <div class="col-xs-3 col-sm-2 col-md-2 text-center">
                    <img src="/solutions/automation/intellectual_building/technical_security_set/img/sun_blue.png" alt="">
                </div>
                <div class="col-xs-9 col-sm-10 col-md-10">
                    <strong>Помимо богатого функционала</strong>, применение систем управления номерами 
                    обеспечивает ряд дополнительных преимуществ благодаря оптимизации 
                    процессов монтажа оборудования, ввода в эксплуатацию и его сервисном 
                    обслуживании. Элементы системы, установленные  с помощью технологий 
                    скрытого монтажа, легко впишутся в любой интерьер, даже при сложных 
                    дизайнерских решениях. Возникающие неисправности не выводят из строя 
                    всю систему, касаются только отдельного номера, что легко и оперативно 
                    корректируется
                </div>
            </div>
            <div class="t_sun_lastext text-center">
            Система управления номерами является неотъемлемой частью <a href="/solutions/automation/hotel_management_system/" title="">системы автоматизации гостиницы</a>
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
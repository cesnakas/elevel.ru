<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает услуги технического и авторского надзора");
$APPLICATION->SetPageProperty("tags", "технический надзор, авторский надзор, ведение технического надзора, ведение авторского надзора, надзор за проектом, технический и авторский надзор, контроль за проектом, контроль реализации проекта");
$APPLICATION->SetPageProperty("keywords", "технический и авторский надзор");
$APPLICATION->SetTitle("Технический и авторский надзор ");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>Технический и авторский надзор</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
				<?$APPLICATION->IncludeComponent(
				    "bitrix:menu",
				    "left-menu",
				    Array(
				        "ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
				        "MENU_CACHE_TYPE" => "N",
				        "MENU_CACHE_TIME" => "3600",
				        "MENU_CACHE_USE_GROUPS" => "Y",
				        "MENU_CACHE_GET_VARS" => array(),
				        "MAX_LEVEL" => "1",
				        "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
				        "USE_EXT" => "N",
				        "DELAY" => "N",
				        "ALLOW_MULTI_SELECT" => "N"
				    )
				);?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "44",    // ID веб-формы
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
				<p>Мы рады предложить Вам услуги по осуществлению технического и авторского надзора на объектах. Наши специалисты грамотно подойдут к выполнению поставленных задач, проконтролируют соответствие производимых работ проектным решениям, организуют выпуск дополнительной (уточняющей) проектной документации, проведут консультации по оборудованию и решат иные вопросы в соответствии с договорными условиями.</p>
				<div class="pic"><img src="/services/supervision/img/el-avtzabavnikov.png"></div>
				<div class="name">Владимир Забавников<br><span>(Директор направления "Проекты")</span></div>
			</div>
		</div><!--.b-row__first-->
		<div class="t_orange t_boldtext">
			Авторский и технический надзор необходимы, если Вы хотите быть уверены в конечном результате и избежать спорных ситуаций при выполнении работ на объекте
		</div>
		<div class="tz-center">
			<div class="t_nadzbox">
				<img src="/services/supervision/img/nadzimg2.png" alt=""/>
				<p>Авторский надзор</p>
				<div>
					Это гарантия максимально полной и точной реализации решений, разработанных проектировщиком. При авторском надзоре Вашим доверенным лицом становится самый строгий и внимательный проверяющий — непосредственно автор проекта.
				</div>
			</div>
			<div class="t_nadzbox">
				<img src="/services/supervision/img/nadzimg.png" alt=""/>
				<p>Технический надзор</p>
				<div>
					Это целый комплекс экспертно-проверочных работ. Задачей технадзора служит точное соблюдение определённых при утверждении проекта стоимости, сроков, объемов и, безусловно, качества производимых работ.
				</div>		
			</div>
		</div>
		<div class="t_elektrotitle t_center">
			Авторский и технический надзор предполагают регулярное посещение <br/>объекта для <span>контроля над реализацией проекта</span>, а также решения иных<br/> вопросов в соответствии с договорными условиями.
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать услугу</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
					<div id="bottom_form">
					<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
	                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "44",    // ID веб-формы
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
	                </div>
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>Свяжитесь с менеджером <br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/services/supervision/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/services/supervision/img/pic5a.gif" alt=""></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "комплектация электрооборудованием, поставки электрооборудования, поставки электрооборудования, комплексные поставки электрооборудования, сметная экспертиза, экспертиза сметной документации, подбор оборудования по проекту, подбор электрооборудования, подбор аналогов оборудования, технические консультации, электротехнические консультации, доставка электрооборудования, доставка по графику-плану, поставки электротехнического оборудования, комплексные поставки электротехнического оборудования, составление смет, электроустановочные изделия, ЭУИ, кабельно проводниковая продукция, кабельная продукция, проводниковая продукция, светотехническая продукция, светотехника, осветительная продукция, низковольтное оборудование");
$APPLICATION->SetPageProperty("keywords", "поставки электрооборудования, комплексные поставки электрооборудования, оптовые поставки электрооборудования");
$APPLICATION->SetPageProperty("description", "Компания Эlevel - комплексный поставщик электрооборудования. Широкий ассортимент, поставки электрооборудования в розницу и оптом.");
$APPLICATION->SetTitle("Комплексные поставки электрооборудования | Эlevel");
?> 
<script>
	(function($) {
	$(function() {
		$('select.stylize').selectbox();
	})
	})(jQuery)
</script>

<div class="b-centered b-promo clearfix">
	<h1>Комплектация</h1>		
	
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
                    "WEB_FORM_ID" => "69",    // ID веб-формы
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
				<p>Мы предлагаем не просто поставку электрооборудования, мы готовы помочь Вам его подобрать! Ваш проект будет реализован в срок и не выйдет за рамки бюджета.</p>
				<div class="pic"><img src="/solutions/electric_power_supply/img/el-alexeev.png"></div>
				<div class="name">Дмитрий Алексеев<br><span>(Руководитель отдела реализации проектов)</span></div>
			</div>
		</div><!--.b-row__first-->
		<div class="t_wrapdiv1">
			<div class="t_car">
				<img src="/services/complect/img/t_car.png" alt=""/>
			</div>
			<div class="t_cartext">
				<div class="t_elektrotitle">
					Мы предлагаем <span>комплексные поставки <br/>
					электрооборудования для проекта</span>
				</div>
				Это означает, что наша компания берёт на себя весь цикл работ, в результате чего Ваш объект будет полностью и в срок обеспечен всем необходимым.
			</div>
		</div>
	<div class="t_greyline">
		<div class="t_wrapdiv1">
			<div class="t_greytitle">Мы предлагаем все виды работ по направлениям:</div>
			<p class="t_featitle">Подбор оборудования по проекту </p>
			<div class="t_featext">Эlevel является официальным дистрибьютором большинства ведущих электротехнических брендов. Именно поэтому для нас подбор оборудования по проекту– это процесс выбора из лучшего, что представлено на мировом рынке электроустановочных изделий, кабельно-проводниковой и светотехнической продукции. За нашими предложениями стоит разнообразный и продуманный ассортимент продукции исключительно высокого качества и уровня безопасности.</div>			
			<p class="t_featitle">Проведение сметной экспертизы</p>
			<div class="t_featext">Опыт показывает, что неверная оценка заложенных объёмов и их стоимости – нередкое явление в современном строительстве. Если Вы хотите защитить себя от неоправданных затрат, наши эксперты готовы предложить профессиональную оценку сметной документации.</div>			
			<p class="t_featitle">Подбор аналогов</p>
			<div class="t_featext">Если Вам пришлось собирать проект по частям из работ разных проектировщиков и на разной элементной базе, наши специалисты сведут их в единый продуманный проект. Также мы поможем в подборе аналогов, если необходимо повысить надёжность системы или скорректировать стоимость проекта под бюджет, либо хотелось бы укомплектовать проект оборудованием предпочитаемых Вами производителей.</div>			
			<p class="t_featitle">Технические консультации</p>
			<div class="t_featext">У нас Вы можете получить квалифицированную помощь по любым возникающим вопросам, связанных с разработкой концепции, выбором оборудования, оптимизацией функционального наполнения, согласованием решений по подсистемам и прочими производственными моментами, требующими разъяснения.</div>			
			<p class="t_featitle">Доставка на объект по согласованному плану-графику</p>
			<div class="t_featext">Благодаря чётко отлаженному логистическому процессу, собственному парку грузового автотранспорта и значительным складским площадям мы гарантируем бесперебойные и оперативные поставки оборудования на объект.</div>
		</div>
	</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3>Заказать комплектацию</h3>
				
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "69",    // ID веб-формы
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
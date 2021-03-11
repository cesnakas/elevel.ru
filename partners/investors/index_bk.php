<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Предложение сотрудничества инвестору, заказчику и ген. подрядчику от Эlevel");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, сотрудничество, инвестору, заказчику, ген. подрядчику, производство, услуги, электрооборудование, электромонтаж, проектирование, электроснабежние, поставки, декоративное освещение, освещение, проектирование электроснабжения, умный дом, инженерные системы, автоматизация зданий, электроснабжение");
$APPLICATION->SetPageProperty("keywords", "Эlevel инженер, эlevel, elevel.ru, партнерство, сотрудничество, инвестору, заказчику, ген. подрядчику, генеральному подрядчику производство, услуги, электрооборудование, электромонтаж, проектирование, электроснабежние, поставки, декоративное освещение, освещение, проектирование электроснабжения, умный дом, инженерные системы, автоматизация зданий, электроснабжение, сопровождение проектов, разработка проектной документации");
$APPLICATION->SetPageProperty("description", "Сотрудничество с Эlevel для инвестора, заказчика, ген. подрядчика");
$APPLICATION->SetTitle("Инвестору, заказчику, ген. подрядчику");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>Вы инвестор? Заказчик? Подрядчик?<br>Станьте нашим партнером сейчас!</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
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
			<div class="b-pull-right s01 b-form"  id="bottom_form">
            
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "65",    // ID веб-формы
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
				<p>Мы команда профессионалов, которая обеспечит ВАМ: низкие цены, комплексные решения, оперативность в обратной связи, индивидуальный подход</p>
				<div class="pic"><img src="/img/build-lico.jpg"></div>
				<div class="name">Роман Топольсков<br><span>(Менеджер по работе с инвесторами)</span></div>
			</div>
		</div><!--.b-row__first-->	
	<div class="blue_txt">
		<div class="ico"><img src="/partners/investors/img/ico.png"></div>
		<div class="item i1"><span class="shark"></span>Наступил момент, когда вы задумались – а всё ли запланировано верно, ведь<br>будущему проекту предназначено служить долгие годы…</div>
		<div class="item i2"><span class="shark"></span>С одной стороны, инновации необходимы для долгой жизни и актуальности<br>объекта, но как это совместить с экономической выгодой?</div>
		<div class="item i3"><span class="shark"></span><span class="orange">К нашей общей радости, тогда именно к нам вы<br
		>решили обратиться за помощью.</span></div>
	</div>
	
	<div class="pic-bl"><img src="/partners/investors/img/ico2.png" align="left" style="margin:0 20px 0;">Вы оценили, что наши решения не относятся к категории дополнительных затрат. Это действительно разумное вложение, которое избавит вас от дополнительных расходов и забот на долгие годы, что мы доказали неоднократно реализованными проектами.</div>
	<div class="long_orange">
		<div class="wrapp">
			<div class="title">Мы предложили вам:</div>
			<div class="item1 i01">
				<p>системы<br>электроснабжения и<br>автоматизация зданий</p>
			</div>
			<div class="item1 i02">
				<p>систему «умный<br>дом»</p>
			</div>
			<div class="item1 i03">
				<p>диспетчеризацию<br>инженерных систем</p>
			</div>
			<div class="item1 i04">
				<p>системы внутреннего и<br>наружного освещения<br>зданий, декоративное<br>освещение</p>
			</div>
			<div class="item1 i05">
				<p>информационные<br>сети и аудио-видео<br>комплексы</p>
			</div>
			<div class="item1 i06">
				<p>системы<br>антиобледенения и<br>кабельного обогрева</p>
			</div>
			<div class="item1 i07">
				<p>системы ввода и<br>распределения<br>электроэнергии</p>
			</div>
		</div>
	</div>
	<div class="pic-bl"><img src="/partners/investors/img/ico3.png" align="left" style="margin:0 20px 0;">Ваша гостиница, где был реализован наш проект, процветает до сих пор. И знаете, чего так и не смогли понять конкуренты? Как, не превратившись в милый архаизм, она по-прежнему остаётся всё тем же современным и комфортабельным местом для идеального отдыха?<br><br>

Вы их с улыбкой отправляете на десять лет назад, когда вы приняли верное и дальновидное, как оказалось, решение.</div>
	
	<p style="font-size:16px;">Мы и сегодня продолжаем создавать комплексные проекты для гостиниц, торговых и развлекательных комплексов, сетевых магазинов и бутиков, административно-офисных зданий, элитного жилья. И всё также готовы предоставить полный спектр услуг:</p>
	
	<ul class="ulorange">
		<li><span>проектирование</span></li>
		<li><span>производство электрощитового оборудования</span></li>
		<li><span>комплектация проектов электрооборудованием высокого качества</span></li>
		<li><span>монтаж и пусконаладочные работы</span></li>
		<li><span>гарантийное и сервисное обслуживание установленных систем</span></li>
	</ul>	
	<div class="blue_txt">
		<div class="ico" style="left:100px;"><img src="/partners/investors/img/ico.png"></div>
		<div class="item i1" style="left:50px;"><span class="shark"></span>Наступил момент, когда вы задумались – а всё ли запланировано верно, ведь<br>будущему проекту предназначено служить долгие годы…</div>
	</div>	
		<div class="b-row b-row__examples clearfix">
			<!--<h3 style="font-weight:normal; text-transform:uppercase; margin:40px 0 15px 0;">реализованные обьекты</h3>
			<div class="flexslider slider-example i5">
				<ul class="slides">
					<li>
						<div class="slider-expl__ins clearfix">
							<img src="/partners/investors/img/slide_2.png">
							<div class="txt">
								<div class="header">Маринс Парк Отель, Москва</div>
								<p>Используемое оборудование: <b>ABB</b></p>
								<p class="s18">
									Стоимость: <b>243 350 руб.</b><br>
									Срок: <b>30 дней</b>
								</p>
								<p><i>Все быстро, качественно и в срок. Все под одним пультом. Спасибо за сотрудничество</i></p>
								<div class="turd">
									<img src="/partners/investors/img/pic2_min.jpg">
									<div class="name">Иван Васильев</div>
									<div class="post">(отличный директор)</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-expl__ins clearfix">
							<img src="/partners/investors/img/slide_2.png">
							<div class="txt">
								<div class="header">Маринс Парк Отель, Москва</div>
								<p>Используемое оборудование: <b>ABB</b></p>
								<p class="s18">
									Стоимость: <b>243 350 руб.</b><br>
									Срок: <b>30 дней</b>
								</p>
								<p><i>Все быстро, качественно и в срок. Все под одним пультом. Спасибо за сотрудничество</i></p>
								<div class="turd">
									<img src="/partners/investors/img/pic2_min.jpg">
									<div class="name">Иван Васильев</div>
									<div class="post">(отличный директор)</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>-->

		</div><!--.b-row__examples-->		
		<div class="download">
			<a href="/Presentation_ru.ppt"><span>Общая презентация компании в формате</span>.ppt (12.3 мб)</a>
			<a href="/upload/pres/elevel_engineer_hotels.ppt"><span>Презентация решений для гостиниц в формате</span>.ppt (12.3 мб)</a>
		</div>		
		<div class="b-row b-row__last clearfix">			
<!-- 			<div class="b-to-first-step">
				<div class="b-title3">Вы уже на пороге дома своей мечты...</div>
				<p>Сделайте первый шаг прямо сейчас и вы получите <strong>скидку 5%</strong> на оборудование</p>
			</div>

			<div class="b-more-bonuses clearfix">
				<h3>Дополнительные<br>бонусы</h3>
				<ul class="b-list-bonuses">
					<li>
						<i class="n-ico ico-portfolio"></i>
						<p>Специальные условия для дизайн-бюро и архитекторов.</p>
					</li>
					<li class="w270">
						<i class="n-ico ico-wallet"></i>
						<p>Скидки в зависимости от стоимости проекта. </p>
					</li>
				</ul>
			</div> -->
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Отправить запрос</h3>
				<div class="b-pull-left b-form"  id="bottom_form_2">
					<div id="bottom_form">
					 <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
	                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "65",    // ID веб-формы
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
					<p>Свяжитесь с менеджером отдела по работе<br>с инвесторами и генеральными подрядчиками:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<!--<div class="b-top-link-wrp1">
						<div class="toplink1">
							<i class="tz-icon"></i>
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/partners/investors/img/pic5a.gif" alt=""></a>
						</div>						
						
						<div class="toplink2">
							<i class="tz-icon"></i>
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/partners/investors/img/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
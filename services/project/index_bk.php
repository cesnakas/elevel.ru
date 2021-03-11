<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "проектирование систем автоматизации, проектирование инженерных систем, проектная документация, проектирование внутренних инженерных систем зданий, проектирование электроснабжения, проектирование умного дома, проектирование интеллектуального здания, проектирование энергосбережения, проектирование диспетчеризации, проектирование систем диспетчеризации, проектирование нку, проектирование освещения, проектирование систем освещения, проектирование обогрева, проектирование систем обогрева, проектирование теплого пола, проектирование лвс, проектирование скс, проектирование ктп, проектирование ибп, проектирование кабельных систем, проектирование инженерных систем домов, проектирование инженерных систем зданий, проектирование инженерных сетей, проектирование телефонных сетей, проектирование телевидения, проект умного дома, проектирование кабельных трасс, проектирование систем диспетчеризации, проектирование диспетчеризации, проектирование структурированных кабельных систем, проектирование систем учета электроэнергии, проектирование аскуэ, проектирование астуэ, проектирование гарантированного электроснабжения, проектирование молниезащиты, проектирование молниезащиты зданий, разработка концепции освещения, электропроект, проектирование молниезащиты, проектирование молниезащиты зданий, проектирование систем антиоблединения, проектирование системы мультирум, проектирование слаботочных систем");
$APPLICATION->SetPageProperty("keywords", "проектирование электроснабжения, проектирование инженерных систем, проектирование систем электроснабжения, проектирование электроснабжения дома, предприятий, зданий, коттеджей, расчет, монтаж");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование электроснабжения и инженерных систем.");
$APPLICATION->SetTitle("Проектирование электроснабжения | Проектирование инженерных систем | Эlevel");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix">

		<h1 class="tz-center">Проектирование</h1>

		
		<div class="b-row b-row__first clearfix">
			<?/*<div class="b-pull-left">*/?>
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

            <div class="b-pull-right s01 b-form"  id="bottom_form">

                <?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "68",    // ID веб-формы
                    "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
                    "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
                    "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
                    "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
                    "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
                    "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
                    "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
                    "CACHE_TYPE" => "N",    // Тип кеширования
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
				<p>Мы выполним разработку проектной документации систем электроснабжения, автоматизации и диспетчеризации  для объектов любого уровня сложности.</p>
				<div class="pic"><img src="/services/project/img/el-alexeev.png"></div>
				<div class="name">Дмитрий Алексеев<br><span>(Руководитель отдела реализации проектов)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="grafic">
			Мы выполняем проектные работы для объектов любого уровня сложности и различного назначения. Наша главная задача – не штамповка проектов, а создание решений, сочетающих инновационные разработки с технически совершенной базой и чётко просчитанной функциональностью.
		</div>
		<div class="wrapdiv">
			<div class="divbox1">
				<p>Наши услуги по проектированию<br/> систем и комплексов охватывают<br/> такие области, как:</p>
				<ul>
					<li><a href="/solutions/electric_power_supply/" title="">системы электроснабжения</a>;</li>
					<li><a href="/solutions/energy_conservation/" title="">энергосбережение</a>;</li>
					<li><a href="/solutions/lighting_work/" title="">освещение</a>;</li>
					<li><a href="/solutions/automation/" title="">автоматизация и диспетчеризация зданий (проект «умный дом», «интеллектуальное здание»)</a>;</li>
					<li><a href="/solutions/automation/smart_house/multiroom/" title="">мультирум</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/sks/" title="">структурированные кабельные сети (СКС)</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/accounting_system/" title="">системы учета электроэнергии (АСКУЭ, АСТУЭ)</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/ups/" title="">системы гарантированного электроснабжения (ИБП)</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">молниезащита</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">системы контроля доступа и видеонаблюдения</a>;</li>
					<li><a href="/solutions/automation/smart_house/alarm_system/" title="">системы пожарно-охранной сигнализации</a></li>
				</ul>
			</div>
			<div class="divbox2">
				<p>Весь комплекс услуг разработан с учётом особенностей и потребностей объектов различного назначения:</p>
				<div class="matter1">
					<p>общественных</p>
					<a href="/clients/hotel/" title="">гостиницы</a>, <a href="/clients/trade/" title="">торгово-развлекательные комплексы</a>, отдельные торговые точки, <a href="/clients/trade/" title="">административно-офисные здания</a>, <a href="/clients/iobjects/" title="">культурно-досуговые объекты</a>
				</div>
				<div class="matter2">
					<p>промышленных</p>
					<a href="/clients/factures/" title="">производственные помещения</a>, <a href="/clients/factures/" title="">склады</a>, <a href="/clients/factures/" title="">животноводческие комплексы</a> и пр.
				</div>
				<div class="matter3">
					<p>жилых</p>
					<a href="/clients/liv/" title="">элитное жильё</a>, <a href="/clients/liv/" title="">загородные дома</a>
				</div>
			</div>
		</div>
		<div class="wrapdiv2">
			Наша команда объединяет высококвалифицированных инженеров-проектировщиков, имеющих богатый опыт в проектировании инженерных систем, именно поэтому мы всегда уверены в высоком качестве и функциональности выполненных работ.
		</div>
		<div class="bluediv">
			Профессионализм компании подтверждён всеми необходимыми лицензиями, предусмотренными для выполнения работ по проектированию внутренних инженерных систем зданий и сооружений. Все работы выполняются в полном соответствии с нормами и стандартами, принятыми в РФ.
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

				<h3>Отправить запрос</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
				<!--
                    <form action="/">
					<div class="b-form__row">
						<label for="/">Имя</label>
						<input type="text" class="inptxt-sty">
					</div>
					<div class="b-form__row">
						<label for="/">E-mail</label>
						<input type="text" class="inptxt-sty">
					</div>
					<div class="b-form__row">
						<label for="/">Телефон</label>
						<input type="text" class="inptxt-sty">
					</div>
					<div class="b-form__row">
						<label for="/">Время звонка</label>
						<select name="/" id="/" class="stylize">
							<option value="/">08:00-09:00</option>
							<option value="/">09:00-10:00</option>
							<option value="/">10:00-11:00</option>
							<option value="/">11:00-12:00</option>
							<option value="/">12:00-13:00</option>
						</select>
					</div>
					<div class="b-form__row b-form__row_btn">
						<input type="submit" value="Сделать первый шаг" class="btn gradient">
					</div>
				</form>
                    -->
                    <div id="bottom_form">
                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "68",    // ID веб-формы
                        "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
                        "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
                        "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
                        "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
                        "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
                        "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
                        "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
                        "CACHE_TYPE" => "N",    // Тип кеширования
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
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/services/project/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/services/project/img/pic5a.gif" alt=""></a>
					</div>
					
				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
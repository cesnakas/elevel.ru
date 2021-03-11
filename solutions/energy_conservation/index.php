<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Энергосбережение, альтернативные источники питания, системы автоматизации, солнечные батареи, ветрогенераторы, дизельгенераторы, экономя энергоресурсов, повышение энергоэффективности, энергосберегающие технологии, аккумуляторы, датчики присутствия, светодиодные светильники, автоматическое отключение света");
$APPLICATION->SetPageProperty("keywords", "Энергосбережение, альтернативные источники питания, системы автоматизации, солнечные батареи, ветрогенераторы, дизельгенераторы, экономя энергоресурсов, повышение энергоэффективности, энергосберегающие технологии, аккумуляторы, датчики присутствия, светодиодные светильники, автоматическое отключение света");
$APPLICATION->SetPageProperty("description", "Системы повышения энергоэффективности и энергосбережения (энергосберегающие системы) в решения компании Эlevel Инженер");
$APPLICATION->SetTitle("Системы энергосбережения в решениях Эlevel Инженер");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
	<div class="b-centered b-promo clearfix solutions-box">
		<h1>Энергосбережение</h1>		
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
                    "WEB_FORM_ID" => "72",    // ID веб-формы
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
				<p>Мы не просто внедряем современные технологии для повышения энергоэффективности, для нас энергосбережение - это важная задача по сохранению природных ресурсов и вашего бюджета!</p>
				<div class="pic"><img src="/solutions/electric_power_supply/img/el-alexeev.png"></div>
				<div class="name">Дмитрий Алексеев<br><span>(Руководитель отдела реализации проектов)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_text">
			<img src="img/t_earth.png" alt="" class="t_earth"/>
			Сейчас в России остро стоит вопрос об уменьшении количества потребляемой энергии, ведь Россия – одна из самых расточительных стран в мире. Перспективы энергосбережения в нашей стране огромны, нужно только рационально использовать энергоресурсы.<br/><br/>

			Промышленные объекты представляют собой огромную энергоемкую сферу, в которой в результате физического и морального старения оборудования происходит непрерывное и постоянное увеличение количества потребляемой энергии. Энергосбережение промышленных предприятий и объектов нельзя рассматривать без мероприятий, направленных на сокращение энергопотребления системами освещения, отопления, вентиляции и кондиционирования воздуха. Одновременно следует закладывать меры по снижению энергопотребления в эксплуатационных условиях.<br/><br/>
			<img src="img/t_arrow.png" alt="" class="t_arrow"/>			
			Грамотно выстроенная структура энергосбережения предприятия, позволяет добиться значительного <strong>повышения эффективности использования энергоресурсов и экономии финансовых средств.</strong>
			<br/><br/>
			Мы идем в ногу со временем и используем в работе современные энергосберегающие технологии – это не только очевидные экологические плюсы, это еще и экономическая выгода – значительное уменьшение расходов которые связаны с большими затратами на энергию.
			<div class="t_elektrotitle">
				Цель компании <span>Элевел</span> (Эlevel) – <span>максимально эффективные и комплексные решения энергообеспечения бизнеса и жизнедеятельности</span>
				<p>Основания для её достижения — это знание технологий и потребностей наших клиентов, комплексный, системный <br/>и творческий подход к решению поставленных задач, высококвалифицированная команда специалистов.</p>
			</div>
		</div>
	<div class="t_greyline">
		<div class="t_wrapdiv1">
			<div class="t_greytitle">Основные мотивы использования энергосберегающих технологий 
			в промышленности:</div>
			<ul class="t_motivi">
				<li>истощаемость природных ископаемых</li>
				<li>экологические факторы</li>
				<li>высокая энергоёмкость современной продукции</li>
			</ul>
		</div>
	</div>
	<div class="t_greyline">
		<div class="t_wrapdiv1">
			<div class="t_greytitle">Цели использования энергосберегающих технологий:</div>
			<ul class="t_motivi">
				<li>повышение эффективности экономики</li>
				<li>повышение конкурентоспособности продукции на рынке</li>
				<li>сокращение финансовых затрат</li>
			</ul>
		</div>
	</div>
		<div class="t_weready">
			<p>Мы готовы взять на себя</p>
			<div class="t_readyto">проектирование -</div>
			<div class="t_readyto">комплектацию -</div>
			<div class="t_readyto">поставку оборудования -</div>
			<div class="t_readyto">монтаж -</div>
			<span>систем энергосбережения, а также провести обучение как частных лиц, так и <br/>обслуживающего персонала на крупных промышленных объектах</span>
		</div>
		<div class="t_levels">
			<p>Уровни энергосбережения, предлагаемые компанией Эlevel:</p>
			<div class="t_level">
				1 уровень – <span>лёгкий</span>
				<div class="t_levelboxwrap">
					<div class="t_levelbox">
						<img src="img/t_esy.png" alt=""/>
						<p>Датчики присутствия и движения <strong>Esylux</strong> – это не только энергосбережение, но еще и комфорт.</p>
					</div>
				</div>
			</div>			
			<div class="t_level">
				2 уровень – <span>средний</span>
				<div class="t_levelboxwrap">
					<div class="t_levelbox">
						<img src="img/t_briaton.png" alt=""/>
						<img src="img/t_esy.png" alt=""/>
						<p>Датчики присутствия и движения Esylux и энергосберегающие светодиодные светильники<br/> <strong>Briaton</strong> — сочетание, позволяющее повысить энергоэффективность в разы. Автоматическое отключение света датчиками и низкое потребление электроэнергии светодиодными источниками света ощутимом образом повлияют на «толщину» Вашего кошелька. Используйте это оборудование в доме и за его пределами…</p>
					</div>
				</div>
			</div>			
			<div class="t_level">
				3 уровень – <span>полный</span>
				<div class="t_levelboxwrap">
					<div class="t_levelbox">
						<p>Совмещение уровней I и II с комплексными системами автоматизации и альтернативными источниками энергии:</p>
						<img src="img/t_levimg01.png" alt=""/>
						<p><span>Солнечные батареи</span> - это комплексы солнечных батарей, устройств преобразующих солнечную энергию в электрическую. Солнечные батареи — один из экологически чистых источников энергии со сравнительно высоким КПД.</p>
						<img src="img/t_levimg02.png" alt=""/>
						<p><span>Ветрогенераторы (ветряки)</span> — установки, перерабатывающие механическую энергию ветра в электричество.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="t_wrapdiv1">
			В ветро-солнечных электростанциях необходимо использовать <a href="#" alt=""><strong>дизельгенераторы</strong></a>, аккумуляторы и<br/> контроллеры. Совместная работа всего этого оборудования должна и может гарантировать бесперебойную работу энерговырабатывающей установки
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать систему</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "72",    // ID веб-формы
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
				</form>
				</div><!--.b-form-->

				<div class="b-pull-right1">
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;" class="pp-callback" href="#">Заказать звонок<img alt="" src="/img/pic5a.gif"></a>
					</div>
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;" class="pp-sendquery" href="#">Отправить запроc<img alt="" src="/img/pic5a.gif"></a>
					</div>
					
				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
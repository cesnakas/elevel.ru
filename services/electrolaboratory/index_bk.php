<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Электролаборатория (ЭТЛ) | Электротехническая лаборатория компании Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает услуги электролаборатории по выгодной цене.");
$APPLICATION->SetPageProperty("tags", "электролаборатория, электротехническая лаборатория, электроизмерительная лаборатория, электроизмерения и испытания, услуги электролаборатории, электрические испытания, измерение сопротивления изоляции кабелей, измерение сопротивления заземляющих устройств, измерение полного сопротивления петли фаза-ноль, электроиспытания, электротехнические испытания, электроизмерительные испытания");
$APPLICATION->SetPageProperty("keywords", "электролаборатория, электроиспытания, услуги электролаборатории, цены, этл этл передвижная, лаборатория этл");
$APPLICATION->SetTitle("Электролаборатория");

?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">

		<h1>Электролаборатория</h1>

		
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
			<?
			if($USER->IsAdmin())
			{
			   // echo "<pre>"; print_r($_POST); echo "</pre>";
			}
			?>
			
			<div class="b-pull-right s01 b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "74",    // ID веб-формы
                    //"WEB_FORM_ID" => $_REQUEST['formID'],    // ID веб-формы
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
            
<!--            <div class="tz-susses-form-popup">
            	<div class="tz-close-btn" >&times;</div>
            	<div class="tz-susses-form-popup-msg" >&times;</div>
            </div> -->
            
			</div><!--.b-form-->
			<div class="review s02">
				<p>Мы можем предложить Вам услуги электролаборатории. Наша компания имеет все необходимые лицензии Ростехнадзора на право проведения испытаний электроустановок до 1000 В. Измерения проводятся в соответствии с требованиями ПБ, ПУЭ, ПТЭЭП и другими действующими нормативно-техническими документами.</p>
				<div class="pic"><img src="/services/project/img/el-alexeev.png"></div>
				<div class="name">Дмитрий Алексеев<br><span>(Руководитель реализации проектов)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_elektrotitle t_center">
			НАША <span>ЭЛЕКТРОЛАБОРАТОРИЯ</span> СОЗДАНА ДЛЯ ПОДТВЕРЖДЕНИЯ БЕЗОПАСНОСТИ И ГОТОВНОСТИ К РАБОТЕ ЭЛЕКТРОУСТАНОВОК В РАЗЛИЧНЫХ СИТУАЦИЯХ:
		</div>
		<div class="t_elektroboxwrap">
			<div class="t_elektrobox">
				<img src="/services/electrolaboratory/img/t_ellab01.png" alt=""/>
				<p class="t_center t_fontbold">При вводе оборудования<br/> в эксплуатацию после <br/> монтажа, ремонтных <br/> работ и аварийных <br/> остановок</p>
			</div>		
			<div class="t_elektrobox">
				<img src="/services/electrolaboratory/img/t_ele-atention.png" alt=""/>
				<p class="t_center t_fontbold">С целью предотвращения <br/>сбоев в работе в текущем<br/> режиме</p>
			</div>		
			<div class="t_elektrobox">
				<img src="/services/electrolaboratory/img/t_ellab02.png" alt=""/>
				<p class="t_center t_fontbold">Для предоставления <br/>результатов пожарной <br/>инспекции и <br/> энергоснабжающим<br/> организациям</p>
			</div>
		</div>

	<div class="t_greyline">
		<p>К Вашим услугам весь спектр электроиспытаний оборудования и комплексных систем:</p>
		<div class="t_wrapdiv1">
			<ul class="t_labispis">
				<li><strong>проверка</strong> состояния элементов заземляющих устройств электроустановок;</li>
				<li><strong>проверка</strong>  наличия цепи и замеры переходных сопротивлений между заземлителями и 
				заземляющими проводниками, заземляемым 
				оборудованием (элементами) и заземляющими 
				проводниками;
				</li>
				<li><strong>измерение</strong>  удельного сопротивления земли;</li>
				<li><strong>измерение</strong>  сопротивления заземляющих устройств всех типов;</li>
				<li><strong>измерение</strong>  сопротивления изоляции кабелей, 
				обмоток электродвигателей, аппаратов, 
				вторичных цепей и электропроводок, и 
				электрооборудования, напряжение до 10 кВ;
				</li>
				<li><strong>измерение</strong>  полного сопротивления петли 
				«фаза-нуль» (тока однофазного которого 
				замыкания) в установках с глухозаземлённой 
				нейтралью;
				</li>
				<li><strong>проверка</strong>  срабатывания защиты при системе 
				питания с заземленной и изолированной 
				нейтралью;</li>
				<li><strong> проверка</strong>  срабатывания защиты, выполненной 
				плавкими вставками, в электроустановках 
				напряжением до 10 кВ, калибровка плавких <br/>
				вставок;</li>
			</ul>			
			<ul class="t_labispis">
				<li><strong>проверка</strong> автоматических выключателей в 
					электрических сетях напряжением до 1000 В 
					на срабатывание по току;
				</li>
				<li><strong>измерение</strong> переходных сопротивлений контактов 
					и сопротивлений обмоток электрических машин 
					и трансформаторов;
				</li>
				<li><strong>измерение</strong> сопротивления постоянному току 
					обмоток силовых трансформаторов и масляных 
					выключателей;
				</li>
				<li><strong>испытание</strong> повышением напряжением кабельных 
					линий и электрооборудования напряжением 
					до 10 кВ;
				</li>
				<li><strong>испытание</strong> и измерение характеристик 
					трансформаторов напряжения и трансформаторов 
					тока;
				</li>
				<li><strong>проверка</strong> напряжения и тока срабатывания 
					приводов масляных выключателей;
				</li>
				<li><strong>проверка</strong> устройств релейной защиты, автоматики 
					и телемеханики;
				</li>
				<li><strong>проверка</strong> устройств защитного отключения.</li>
			</ul>
		</div>
	</div>
	
	<div class="t_bluetime">
		<strong>Электроизмерения и испытания проводятся оперативно и с максимальной точностью. </strong><br/>
		Тратя сегодня минимум времени на все процедуры, Вы обеспечиваете безопасность и бесперебойную работу оборудования в дальнейшем.
	</div>

		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Заказать Услугу</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
					<div id="bottom_form">
					<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
	                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "74",    // ID веб-формы
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
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/services/electrolaboratory/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/services/electrolaboratory/img/pic5a.gif" alt=""></a>
					</div>

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
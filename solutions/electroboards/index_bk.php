<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Электрощитовое оборудование и сборка электрощитов | Эlevel");
$APPLICATION->SetPageProperty("description", "Компании Эlevel осуществляет продажу электрощитового оборудования. Купить электрощиты от ведущих мировых производителей на выгодных условиях.");
$APPLICATION->SetPageProperty("tags", "производство электрощитового оборудования, электрощитовое оборудование, электрощиты, щиты, сборка электрощитов, производство щитов, изготовление электрощитов, шкафы управления, электрощитовое оборудование, сертифицированные электрощиты, производство щитов, щиты по индивидуальному проекту, серийные щиты, щитовая продукция, щитовое оборудование, ГРЩ, главные распределительные щиты, ВРУ, вводно распределительные устройства, ЩР, щиты распределительные, АВР, автоматический ввод резерва, ЩУ, щиты управления, ЩА, циты автоматики, щиты учет, ЩО, щиты осветительные, ЩС, щиты силовые, электрощиты на заказ, низковольтные комплектные устройства, НКУ");
$APPLICATION->SetPageProperty("keywords", "электрощит, сборка электрощитов, электрощитовое оборудование, монтаж электрощита, установка электрощита, купить электрощиты, производство электрощитов, сборка электрощитового оборудования, производство электрощитового оборудования");
$APPLICATION->SetTitle("Купить электрощитовое оборудование Elevel - отличная цена на электрощиты.");
?> 
<script type="text/javascript" src="/js/highslide.js"></script>
 
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css" />
<![endif]-->
 
<script type="text/javascript">
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.allowMultipleInstances = false;
</script>
 
<script type="text/javascript">
//<![CDATA[
//hs.registerOverlay({
//	fade: 2 // fading the semi-transparent overlay looks bad in IE
//});
hs.graphicsDir = '/images/highslide/';
hs.wrapperClassName = 'borderless';
//]]>
</script>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix electroboards solutions-box">
		<h1>Производство электрощитового оборудования</h1>
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

			<div class="b-pull-right b-form partners-form">
				<div class="b-title-orange">ЗАКАЖИТЕ ЭЛЕКТРОЩИТ ПРЯМО СЕЙЧАС!</div>
				
				<script>
				    $(document).ready(function() {
				        $('#call_close').first().remove();
				        $('#suber').first().remove();
				        $('#config_info').remove();
				        $(".inner_params td").first().css('padding','0px');
				        
				        $(this).on( 'keypress','input[name="form_text_119"]', function (e){
				            if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
				                $(".error").html("Только цифры").show().fadeOut(3000); 
				                return false;
				            }
				        });

				        function isValidEmailAddress(emailAddress) {
				            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				            return pattern.test(emailAddress);
				        }
				        
				        $('form[name="smart_house"]').attr('class','back_call');
				        $('form[name="smart_house"]').attr('display','block !important');
				        
				        $(this).on('click', '.subm_form', function() {
				            CONTACTUSER = $('input[name="form_text_117"]').val();
				            PHONEUSER = $('input[name="form_text_119"]').val();
				            EMAIL = $('input[name="form_text_121"]').val();
				            MESSAGES = $('select[name="form_dropdown_call_time"]').val();
				            textError='';
				            error = 0;
				              
				            if(CONTACTUSER==''){textError='Введите контактное лицо<br>';error = 1;};
				                    
				            if(EMAIL==''){
				                textError+='Не введен email<br>';
				                error = 1;
				            } else {
				            if(!isValidEmailAddress(EMAIL)){
				                textError+='Не корректный email<br>';
				            };}
				            
				            if(PHONEUSER==''){textError+='Введите номер телефона<br>';error = 1;};
				            if(MESSAGES==''){textError+='Введите время звонка<br>';error = 1;};
				            
				            
				            if(error == 0){
				                /*if($(this.form).find('.subm_form').val() == "Сделать первый шаг"){
				                    _gaq.push(['_trackEvent', 'form', 'send', 'smart_house']);    
				                }
				                if($(this.form).find('.subm_form').val() == "Заказать электрощит"){
				                    _gaq.push(['_trackEvent', 'form', 'send', 'electroboards']);    
				                }             */   
				            var m_data=$("#simul_form1").serialize();
				            m_data = m_data + "&web_form_submit=Y";

				            /*$.ajax({
				                async: true,
				                type: "POST",
				                url: '/sendquery/fcallback.php',
				                dataType: "text",
				                data: m_data,
				                beforeSend: function() {
				                },
				                error:function(result) {
				                    alert(result);
				                },
				                
				                success: function(result) {
				                    $('.table-bottom').hide();
				                    $("#back_call").append('<div style="text-align: center; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')
				                }
				            });
				            return false;*/
				            } else{
				                $('.error').empty();
				                $('.b-pull-right').css('height','450px');
				                $('.error').show().fadeOut(3000);
				                $('.error').html(textError);
				                $('#simul_form').css('height','410px');
				                setTimeout( function () {$('#simul_form').css('height','320px');$('.b-pull-right').css('height','391px');}, 3000);
				                return false;
				            }
				        });
				        
				    });
				</script>

				    <div id="simul_form1">
				        <div class="info"></div>
				        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
					        <div id="bottom_form">
					        <?$APPLICATION->IncludeComponent("tezart:form.result.new", "formResult_electroshits", Array(
						        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
						        "AJAX_MODE" => "N",
						        "WEB_FORM_ID" => "7",	// ID веб-формы
						        "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
					            "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
					            "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
						        "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
						        "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
						        "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
						        "USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
						        "CACHE_TYPE" => "A",	// Тип кеширования
						        "CACHE_TIME" => "3600",	// Время кеширования (сек.)
						        "VARIABLE_ALIASES" => array(
							        "WEB_FORM_ID" => "WEB_FORM_ID",
							        "RESULT_ID" => "RESULT_ID",
						        )
						        ),
						        false
					        );?>
					        </div>
				    </div>

					<p>Вы можете заказать проект и сборку<br> силовых низковольтных электроустановок<br>  (ГРЩ, ЩР, ВРУ, АВР) и щитов управления <br> (в том числе микропроцессорным <br> управлением), щитов учета и<br>  автоматизации</p>
					<img src="/img/cask.png" alt="">
				
					<article>Проектирование и сборку<br> выполняют <br>высококвалифицированные <br>специалисты</article>
					
			</div><!--.b-form-->
			
			
			<div class="review s02">
				<p>Мы имеем многолетний опыт в проектировании и производстве электрощитового оборудования, оптимальное решение по сборке электрощитов, как по стандартным, так и по индивидуальным проектам с учетом специфики конкретного объекта.</p>
				<div class="pic"><img src="/img/nku-lico.jpg"></div>
				<div class="name">Александр Розанов <span>(Технический директор)</span></div>
			</div>
			
		</div><!--.b-row__first-->
		<div class="b-row b-row__task clearfix">
			<div id="orange_block">
			<header class="b-title-orange2">
				Наши специалисты проведут<span> проверку вашего проекта</span> и внесут корректировки <span>совершенно бесплатно!</span>
			</header>
			<figure><img src="/img/graph.png" alt=""></figure>
			<article>
				<p>В 75% случаев, технический проект является недостаточно корректным</p>
			</article>
			</div>	
		</div><!--.b-row__task-->
<p>Компания Эlevel выполняет проектирование, производство и сборку электрощитового оборудования — силовых низковольтных электроустановок, щитов управления, учета и автоматизации. Электрощиты собираются квалифицированными специалистами на базе надежных комплектующих ABB, Schneider Electric, Legrand, DEKraft. Вся продукция имеет сертификаты соответствия Всесоюзного научно-исследовательского института (ВНИИС) Госстандарта России. Разработка технической документации и сборка электрощитов осуществляется как по стандартным, так и по индивидуальным проектам с учетом специфики конкретного объекта.
<br><br>
<strong>В 2014 году производство нашей компании по сборке щитов получило сертификат таможенного союза</strong>, согласно технического регламента ТР ТС НВО (004/2011), на изготовление распределительных устройств низкого напряжения с номинальным током до 4000А.</p><br>
<h3>Сертификаты на производство электрощитов</h3><br>
 <center><sub>
		 <table cellspacing="1" cellpadding="1" border="0">
			 <tbody>
			 <tr> <td width="20%" align="center"><a href="/images/news/elevel-sert-tamojennogo-souza-new-1.jpg" class="highslide" onClick="return hs.expand(this, { align: 'center' })" title="РЎРµСЂС‚РёС"РёРєР°С‚ С‚Р°РјРѕР¶РµРЅРЅРѕРіРѕ СЃРѕСЋР·Р° EAC Р­LEVEL-Р РЈРќРќ, Р"Р Р© 4000Рђ" ><img src="/images/news/elevel-sert-tamojennogo-souza-new-1_sm.jpg" alt="Сертификат таможенного союза EAC ЭLEVEL-РУНН, ГРЩ до 4000А" title="Сертификат таможенного союза EAC ЭLEVEL-РУНН, ГРЩ до 4000А" class="sol_bp"  /></a></td><td width="20%" align="center"><a href="/images/news/3981de0b0fe52a1e2db25b71353310ea.jpg" class="highslide" onClick="return hs.expand(this, { align: 'center' })" title="Сертификат авторизованного партнера ABB - Инжиниринговый центр" ><img src="/images/news/3981de0b0fe52a1e2db25b71353310ea_sm.jpg" alt="Сертификат авторизованного партнера ABB - Инжиниринговый центр" title="Сертификат авторизованного партнера ABB - Инжиниринговый центр" class="sol_bp"  /></a></td><td width="20%" align="center"><a href="/images/news/2245a22fb29366d80df3448d8dc9d606.jpg" class="highslide" onClick="return hs.expand(this, { align: 'center' })" title="Сертификат Локальной адаптации у партнеров Schneider Electric" ><img src="/images/news/2245a22fb29366d80df3448d8dc9d606_sm.jpg" alt="Сертификат Локальной адаптации у партнеров Schneider Electric" title="Сертификат Локальной адаптации у партнеров Schneider Electric" class="sol_bp"  /></a></td><td width="20%" align="center"><a href="/images/news/c75fbc3cedea560811fae6b032ca91df.jpg" class="highslide" onClick="return hs.expand(this, { align: 'center' })" title="Сертификат партнера клуба щитовиков Legrand" ><img src="/images/news/c75fbc3cedea560811fae6b032ca91df_sm.jpg" alt="Сертификат партнера клуба щитовиков Legrand" title="Сертификат партнера клуба щитовиков Legrand" class="sol_bp"  /></a></td><td width="20%" align="center"><a href="/images/news/elevel-se-adaptaciya-nsx-a0-a1-level.jpg" class="highslide" onClick="return hs.expand(this, { align: 'center' })" title="Сертификат партнера клуба щитовиков Legrand" ><img src="/images/news/elevel-se-adaptaciya-nsx-a0-a1-level_sm.jpg" alt="Сертификат партнера клуба щитовиков Legrand" title="Сертификат партнера клуба щитовиков Legrand" class="sol_bp"  /></a></td></tr>
			 </tbody>
		 </table>
   </sub></center></p>
		<div class="b-row b-row__advantages clearfix">
			<h2>Что вы получаете?</h2>
			<div class="b-adv__col b-adv__col_left" style="padding-top: 180px;">
				<div class="b-advantage__item">				
					<i class="n-ico n-ico-multiroom"></i>
					<strong>РАЗРАБОТКА<br>ТЕХНИЧЕСКОЙ<br>ДОКУМЕНТАЦИИ </strong>
					<!--<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Слушайте музыку и смотрите любимые фильмы там, где Вам удобно. Не нужно оснащать каждую комнату громоздкой аудио-/видеоаппаратурой - технология «умный дом» позволяет передавать музыку и видео в любую точку здания, независимо от места установки источника сигнала (CD, DVD).</p></div>-->
				</div><!--.b-advantage__item-->
				<div class="b-advantage__item">
					<i class="n-ico n-ico-link" style="width: 55px"></i>
					<strong>ИЗГОТОВЛЕНИЕ<br>НКУ</strong>
					<!--<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Слушайте музыку и смотрите любимые фильмы там, где Вам удобно. Не нужно оснащать каждую комнату громоздкой аудио-/видеоаппаратурой - технология «умный дом» позволяет передавать музыку и видео в любую точку здания, независимо от места установки источника сигнала (CD, DVD).</p>
					</div>-->
				</div><!--.b-advantage__item-->
				<div class="b-advantage__item">
				</div><!--.b-advantage__item-->
				<!--.b-advantage__item-->		
			</div><!--.b-adv__col_left-->
<div class="b-adv__col b-adv__col_right">
				<div class="b-advantage__item"style="padding-right: 115px;">
					<i class="n-ico n-ico-home"></i>
					<strong>ПОДГОТОВКА<br>СМЕТ</strong>
					<!--<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Процессор «умного дома» не допустит конфликтов системы отопления и климатической техники, даже если ранней весной Вы откроете окно или включите сплит-систему при работающем отоплении.  Благодаря централизованному управлению отопительным оборудованием, теплым полом, кондиционером и вентиляцией в Вашем доме всегда будет уютно.</p>
					</div>-->
				</div><!--.b-advantage__item-->
				<div class="b-advantage__item" style="padding-right: 70px; padding-top: 25px;">
					<i class="n-ico n-ico-door"></i>
					<strong>ТИПОВЫЕ И<br>ИНДИВИДУАЛЬНЫЕ<br>ПРОЕКТЫ </strong>
					<!--<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Процессор «умного дома» не допустит конфликтов системы отопления и климатической техники, даже если ранней весной Вы откроете окно или включите сплит-систему при работающем отоплении.  Благодаря централизованному управлению отопительным оборудованием, теплым полом, кондиционером и вентиляцией в Вашем доме всегда будет уютно.</p>
					</div>-->
				</div><!--.b-advantage__item-->
				<div class="b-advantage__item"style="padding-right: 110px;margin-top: 10px">	
				</div><!--.b-advantage__item-->
				<!--.b-advantage__item-->				
			</div>
			  <div class="b-adv__col b-adv__col_right2">

				<div class="b-advantage__item"style="
    padding-right: 115px;
">
					<i class="n-ico n-ico-lamp"></i>
					<strong>РАЗРАБОТКА<br>КОНСТРУКЦИЙ НКУ </strong>
					<!--<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Хотите, чтобы свет в комнатах включался по датчику движения, становился приглушенным при просмотре фильмов и расставлял акценты в интерьере, когда Вы принимаете гостей? В память системы можно внести любые сценарии. Чтобы запустить выбранную программу достаточно одного касания к сенсорной панели.</p>
					</div>-->
				</div><!--.b-advantage__item-->
				<div class="b-advantage__item"style="padding-right: 70px;">
					<i class="n-ico n-ico-lock"></i>
					<strong>ГАРАНТИЯ И<br>ПОСЛЕГАРАНТИЙНОЕ<br>ОБСЛУЖИВАНИЕ </strong>
					<!--<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Хотите, чтобы свет в комнатах включался по датчику движения, становился приглушенным при просмотре фильмов и расставлял акценты в интерьере, когда Вы принимаете гостей? В память системы можно внести любые сценарии. Чтобы запустить выбранную программу достаточно одного касания к сенсорной панели.</p>
					</div>-->
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item"style="padding-right: 110px;margin-top: 10px">
					
				</div><!--.b-advantage__item-->

				<!--.b-advantage__item-->
				
			</div>
			<article>ПРОИЗВОДСТВО ЭЛЕКТРОЩИТОВ</article>

			<!--.b-adv__col_right-->

			<!-- <span class="b-title-pult">Единое централизованное управление</span> -->

		</div>


		<div class="b-row b-row__why clearfix">

			<h3>Почему Эlevel?</h3>
			
			<div class="b-why__list">

				<article>
					<figure><img src="/img/elevel_icon1.png" alt=""></figure>
					<header>Типовые и индивидуальные проекты</header>
				<p>Все электрощиты производятся по техническим условиям и имеют сертификаты соответствия. Собственная служба контроля качества нашей компании проверяет сборку каждой установки и тестирует ее работу. На готовые изделия выдается полный пакет сопроводительной документации и предоставляется двухлетняя гарантия. 
				</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon2.png" alt=""></figure>
					<header>Высококвалифицированные специалисты</header>
					<p>Мы осуществляем производство электрощитового оборудования любого уровня сложности с различными степенями защиты — от электрощитов для дома до НКУ промышленного значения.  Установки, изготовленные по индивидуальным проектам, в полной мере отвечают требованиям заказчиков по техническим параметрам, стоимости и срокам монтажа. 
					</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon3.png" alt=""></figure>
					<header>Широкий ассортимент оборудования</header>
					<p>Наша компания — официальный дистрибьютор ABB, Schneider Electric, Legrand и других ведущих мировых производителей компонентов электротехнических систем. Мы предлагаем исчерпывающий и постоянно обновляющийся ассортимент электроустановок для жилых, административных и промышленных объектов. 
					</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon4.png" alt=""></figure>
					<header>Минимальные сроки изготовления</header>
					<p>Благодаря собственному производству, профессионализму инженерно-технического персонала, большой номенклатуре комплектующих и постоянному наличию на складе всех необходимых элементов для сборки электрощитов, конструкции изготавливаются в кратчайшие сроки. 
					</p>
				</article>

			</div><!--.b-why__list-->
		</div><!--.b-row__why-->



		<div class="b-row b-row__packages clearfix">
			
			<h3>ТИПЫ СБОРКИ НКУ</h3>

			<div class="big_block">
			
				<header>По изготовленным изделиям НКУ классифицируются:</header>
				<div id="info_block">
					<img src="/img/img1.png" alt="">
					<header>ГРЩ</header>
					<article>(Главные распределительные щиты)</article>
					<p>Главный распределительный щит – устройство, отвечающее за энергоснабжение всего здания или его обособленной части.
					</p>
				</div>
				<div id="info_block">
					<img src="/img/img2.png" alt="" style="position: relative; right: 10px;">
					<header style="right: 465px;">ЩР, ЩУР</header>
					<article style="left: 10px;">(Щит учета распределения)</article>
					<p style="left: 50px;">Щит учета распределения -  оборудование для приема, учета, распределения электроэнергии, а также для защиты линий от перегрузок, токов короткого замыкания и токов утечки на землю.
					</p>
				</div>
				<div id="info_block">
					<img src="/img/img3.png" alt="">
					<header>ВРУ</header>
					<article>(Вводно-распределительное устройство)</article>
					<p>Вводно-распределительное устройство – комплексное низковольтное оборудование для приема, учета и распределения электроэнергии, а также защиты отходящих линий от перегрузок.
					</p>
				</div>
				<div id="info_block">
					<img src="/img/img4.png" alt="" >
					<header style="right: 535px;">ЯУ</header>
					<article style="left: 18px;">(Ящики управления)</article>
					<p style="left: 50px;">Ящик управления – устройство для  автоматического, локального, ручного или удаленного (с пульта диспетчера) управления сетями энергоснабжения.
					</p>
				</div>				
				<header>По функциональным назначениям изготавливаются:</header>			
				<table border="0" width="710" height="433" cellpadding="15" cellspacing="15">
					<tr>
						<td>
							<header><a href="/solutions/electroboards/control_and_automation/">ЩАП</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Обеспечивает бесперебойное электроснабжение объектов. Если напряжение на основном вводе пропадает/падает, ЩАП автоматически переключает подачу питания на резервный источник. Время реагирования устанавливается заранее — от 0,1 до 30 секунд.</p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/panel_lighting/">ЩО</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Управляет осветительными приборами в жилых, административных и производственных зданиях. С помощью ЩО осуществляется безопасная коммутация силовых осветительных цепей, а также обеспечивается защита от перегрузок и коротких замыканий.</p>
							</article>
						</td>
					</tr>
					<tr>
						<td>
							<header><a href="/solutions/electroboards/shield_accounting/">ЩУР</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Предназначен для коммерческого учета и распределения электроэнергии, защиты трехфазных силовых и осветительных сетей жилых, офисных зданий и промышленных потребителей от токов короткого замыкания и перегрузок.</p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/control_and_automation/">ЩАО</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Позволяет принимать напряжение от гарантированного источника питания. ЩАО автоматически включает и отключает аварийное освещение, а также контролирует заряд батареи.</p>
							</article>
						</td>						
					</tr>
					<tr>
					<td>
							<header>КУ</header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Устанавливаются на коммунальных и промышленных объектах с целью энергосбережения за счет компенсации реактивной мощности и поддержания параметров электрической энергии в допустимых качественных пределах. </p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/introductory_switchgear/">ВРУ</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
								<p>Комплекс электроконструкций, приборов и аппаратов для приема, учета, распределения и резервирования электроэнергии, а также защиты линии и потребителей от перегрузок и коротких замыканий.</p>
							</article>
						</td>
					</tr>
					<tr>
					<td>
							<header><a href="/solutions/electroboards/switchboard/">ЩР</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Предназначен для приема и распределения электроэнергии в жилых, административных и промышленных зданиях, защиты линий и потребителей от перегрузок и коротких замыканий, а также нечастых краткосрочных включений/отключений цепей.</p>
							</article>
						</td>
						<td>
							<header>ЯУ</header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Используются для дистанционного управления различным оборудованием, ввода, учета, контроля и распределения электроэнергии, защиты сети от короткого замыкания и перегрузок, а также аварийного включения резервного питания.</p>
							</article>
						</td>
					</tr>
					<tr>
					<td>
							<header><a href="/solutions/electroboards/main_switchboard/">ГРЩ</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Отвечают за обеспечение электропитанием всего здания или его обособленной части. Предназначены для приема и распределения энергии, защиты сети от короткого замыкания и перегрузок. Устанавливаются на объектах жилого, административного и общественного значения.</p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/control_and_automation/">ЩА</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>Обеспечивают стабильное функционирование систем автоматизации, управляемых запрограммированным контроллером — отопления, освещения, вентиляции, пожарной сигнализации и т.д.</p>
							</article>
						</td>
					</tr>
				</table>			
			</div>
		</div> <!--.b-row__packages-->
		<div class="b-row b-row__architecture clearfix">			
			<!-- <h3>Архитектура «умного дома»</h3> -->
			<div class="flexslider slider-architecture">
				<ul class="slides">

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-shits-1.jpg" alt="">
							<figcaption></figcaption>
						</figure>
					</li>
				</ul>
			</div><!--.slider-architecture-->
		</div><!--.b-row__architecture-->
		<div class="b-row b-row__we-work clearfix">			
			<div class="b-gray-bg">
			<h3>Как мы работаем?</h3>
			<div class="b-steps">
				<span class="blue-line gradient"></span>
				<ul class="clearfix">
					<li class="active">
						<a href="javascript: void(0)">
							<span class="b-numb">1</span><strong>Связь с менеджером</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">2</span><strong>Проектная документация</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">3</span><strong>Планирование сотрудничества</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">4</span><strong>Гарантия</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">5</span><strong>Сервисное обслуживание</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
				</ul>
			</div>

			</div><!--.b-gray-bg-->

			<div class="b-steps__content">
				<div class="b-steps__cont_item visible">
					<p>Специалисты технического отдела подробно обсудят с Вами требования к функционалу электрощитового оборудования. Если при разработке проекта необходимо учесть особенности энергоснабжения объекта, мы предоставим необходимые консультации и выслушаем все пожелания.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>Технический и производственный отделы компании работают в тесном сотрудничестве. Мы готовы реализовать на Вашем объекте новейшие схемы автоматического ввода резервного питания, в том числе не получившие пока широкого распространения в практике российских компаний.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>Вы сами выбираете удобный формат сотрудничества – выполнение работ по одному договору или заключение отдельных договоров на каждый этап установки системы: производство электрощита, монтаж оборудования, пусконаладочные работы.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>На каждое изделие предоставляется гарантия – 2 года. В течение этого срока мы бесплатно поможем с корректировкой параметров работы электрощитового оборудования и устраним выявленные неисправности.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>Вы можете заключить с нами договор на сервисное обслуживание за фиксированную плату или заказывать разовые выезды специалистов, когда в этом возникнет необходимость.</p>
				</div>
			</div><!--.b-steps__content-->
		</div><!--.b-row__we-work-->		
		<div class="b-row b-row__examples clearfix">
			<h3 align="center">Примеры реализации</h3>
			<div class="flexslider slider-example">
				<ul class="slides">
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/kempinski1.png" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<header>Гостиница «Балчуг Кемпинский», г. Москва</header>
								<!--<div class="slider-expl__row clearfix" style="	margin-top: 10px;">
									<div class="b-left">Проектирование</div>
									<div class="b-right"><p>10 дней</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Монтаж</div>
									<div class="b-right"><p>20 дней</p></div>
								</div>-->
								<div class="slider-expl__row clearfix">
									<div class="b-left">Используемое<br>оборудование:</div>
									<div class="b-right"><p>ABB, Gira, LCN</p></div>									
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Выполненные<br>работы:</div>
									<div class="b-right"><p>Проектирование и поставка систем управления освещением, фанкойлами. Поставка силовых щитов для распределенной системы электроснабжения. Электроустановочные изделия.</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<!--<div class="b-left">
										<img src="/img/face.png" alt="" id="face">
									</div>-->
									<div class="b-right">
									<!--<div id="right_block1">
										<article>Иван Васильев</article>
										<p>Все быстро, качественно и в срок. Все<br> под одним пультом. Спасибо за<br> сотрудничество</p>
									</div>-->
										<!-- <p>автоматика KNX — 511 000 руб.</p>
										<p>силовая автоматика защиты + кабели — 150 000 руб.</p>
										<p>электроустановочные изделия — <br>80 000 руб.</p>
										<p>монтаж и программирование — <br>500 000 руб.</p> -->
									</div>
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/moscowh1.png" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
									<header><p>Гостиница «Москва», г. Москва</header>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Используемое<br>оборудование</div>
									<div class="b-right"><p>ABB</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Выполненные<br>работы</div>
									<div class="b-right"><p>Сборка щитов НКУ</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<!--<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>автоматика KNX — 1 295 000 руб.</p>
										<p>силовая автоматика защиты + кабели — 500 000 руб.</p>
										<p>электроустановочные изделия — <br>250 000 руб.</p>
										<p>монтаж и программирование — <br>1 500 000 руб.</p>
									</div>-->
								</div>
								<!--<div class="slider-expl__row clearfix">
									<div class="b-left">Сроки реализации:</div>
									<div class="b-right"><p>ХХХ</p></div>
								</div>-->
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/croco1.png" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
								<header>Офисный центр КРОК, г. Москва</header>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Используемое<br>оборудование</div>
									<div class="b-right"><p>ABB, Schneider Electric</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Выполненные<br>работы</div>
									<div class="b-right"><p>Проектирование, сборка и монтаж щитов управления и диспетчеризации</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<!--<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>автоматика KNX — 2 821 000 руб.</p>
										<p>силовая автоматика защиты + кабели — 1 600 000 руб.</p>
										<p>электроустановочные изделия — <br>800 000 руб.</p>
										<p>монтаж и программирование — <br>3 000 000 руб.</p>
									</div>-->
								</div>
								<div class="slider-expl__row clearfix">
									<!--<div class="b-left">Сроки реализации:</div>
									<div class="b-right"><p>ХХХ</p></div>-->
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>
				</ul>
			</div><!--.slider-example-->
		</div><!--.b-row__examples-->
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<div class="b-pull-left b-form">
				
				    <div id="simul_form1">
                        <div class="info"></div>
                        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
                        <div id="bottom_form">
                        <?$APPLICATION->IncludeComponent("tezart:form.result.new", "formResult_smart_house", Array(
	                        "SEF_MODE" => "N",	// Включить поддержку ЧПУ
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "7",	// ID веб-формы
	                        "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
                            "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
                            "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
	                        "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
	                        "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
	                        "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
	                        "USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
	                        "CACHE_TYPE" => "A",	// Тип кеширования
	                        "CACHE_TIME" => "3600",	// Время кеширования (сек.)
	                        "VARIABLE_ALIASES" => array(
		                        "WEB_FORM_ID" => "WEB_FORM_ID",
		                        "RESULT_ID" => "RESULT_ID",
	                        )
	                        ),
	                        false
                        );?>
                        </div>
                    </div>

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
<div class="border">&nbsp;</div>
<div style="clear: both; "></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
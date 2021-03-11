<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Электрощитовое оборудование и сборка электрощитов | Эlevel");
$APPLICATION->SetPageProperty("description", "Компании Эlevel осуществляет продажу электрощитового оборудования. Купить электрощиты от ведущих мировых производителей на выгодных условиях.");
$APPLICATION->SetPageProperty("tags", "производство электрощитового оборудования, электрощитовое оборудование, электрощиты, щиты, сборка электрощитов, производство щитов, изготовление электрощитов, шкафы управления, электрощитовое оборудование, сертифицированные электрощиты, производство щитов, щиты по индивидуальному проекту, серийные щиты, щитовая продукция, щитовое оборудование, ГРЩ, главные распределительные щиты, ВРУ, вводно распределительные устройства, ЩР, щиты распределительные, АВР, автоматический ввод резерва, ЩУ, щиты управления, ЩА, циты автоматики, щиты учет, ЩО, щиты осветительные, ЩС, щиты силовые, электрощиты на заказ, низковольтные комплектные устройства, НКУ");
$APPLICATION->SetPageProperty("keywords", "электрощит, сборка электрощитов, электрощитовое оборудование, монтаж электрощита, установка электрощита, купить электрощиты, производство электрощитов, сборка электрощитового оборудования, производство электрощитового оборудования");
$APPLICATION->SetTitle("Купить электрощитовое оборудование Elevel - отличная цена на электрощиты.");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix">
		<h1>Собираете щитовое оборудование? Ищете надежного поставщика? - Эlevel то, что необходимо вашему бизнесу</h1>
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

			<div class="b-pull-right b-form partners-form">
				<div class="b-title-orange">СТАНЬТЕ НАШИМ ПАРТНЕРОМ ПРЯМО СЕЙЧАС!</div>
				
<script>
    $(document).ready(function() {
        $('#call_close').first().remove();
        $('#suber').first().remove();
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

    <div id="simul_form1" style="margin-left: 0px;">
        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <div id="bottom_form">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "electroshields_top", array(
				"WEB_FORM_ID" => "73",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"USE_EXTENDED_ERRORS" => "N",
				"SEF_MODE" => "N",
				"SEF_FOLDER" => "/partners/shielder/",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"LIST_URL" => "/sendquery/sended.php",
				"EDIT_URL" => "/sendquery/sended.php",
				"SUCCESS_URL" => "/sendquery/sended.php",
				"CHAIN_ITEM_TEXT" => "",
				"CHAIN_ITEM_LINK" => "",
				"VARIABLE_ALIASES" => array(
					"WEB_FORM_ID" => "WEB_FORM_ID",
					"RESULT_ID" => "RESULT_ID",
				  )
				),
				false
			);?>
		</div>
    </div>
				<?/*?>
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
						<input type="submit" value="Заказать оборудование" class="btn gradient">						
					</div>
				</form>
				<?*/?>
				<p>Вы можете заказать поставку оборудованиядля силовых низковольтных электроустановок  (ГРЩ, ЩР, ВРУ, АВР) и щитов управления  (в том числе микропроцессорным  управлением), щитов учета и  автоматизации</p>
				<img src="/img/cask.png" alt="">
				<!--<article>Проектирование и сборку<br> выполняют <br>высококвалифицированные <br>специалисты</article>-->
			</div><!--.b-form-->
			
			<div class="review s02">
				<p>Мы предлагаем решения, подкреплённые высоким профессионализмом, ответственностью и компетентностью. Наша команда работает только с безопасным оригинальным оборудованием и с проверенными опытом решениями.</p>
				<div class="pic"><img src="/img/shitovik-lico.jpg"></div>
				<div class="name">Антон Усков <span>(Руководитель ОСП)</span></div>
			</div>
			

		</div><!--.b-row__first-->
		<div class="b-row b-row__task clearfix">
			<div id="orange_block">
			<div>
				<figure><img src="/img/graph.png" alt=""></figure>
				<header class="b-title-orange2">
					Сотрудничая с нами, вы получаете комплексную поддержку компании,<span> входящей в ТОП-10</span> крупнейших российских поставщиков электрооборудования.
				</header>
			</div>
			<article>
				<p>Независимо от бюджета и объема услуг, результат нашей работы Вы ощутите уже завтра, а через годы – оцените в полной мере.</p>
			</article>
			</div>	
		</div><!--.b-row__task-->
<!--<p>Сотрудничая с нами, вы получаете комплексную поддержку компании, входящей в ТОП-10 крупнейших российских поставщиков электрооборудования. Независимо от бюджета и объема услуг, результат нашей работы Вы ощутите уже завтра, а через годы – оцените в полной мере.<p>-->
		<!--<div class="b-row b-row__advantages clearfix">
			<h2>Что вы получаете?</h2>
			<div class="b-adv__col b-adv__col_left" style="padding-top: 180px;">
				<div class="b-advantage__item">				
					<i class="n-ico n-ico-multiroom"></i>
					<strong>РАЗРАБОТКА<br>ТЕХНИЧЕСКОЙ<br>ДОКУМЕНТАЦИИ </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Слушайте музыку и смотрите любимые фильмы там, где Вам удобно. Не нужно оснащать каждую комнату громоздкой аудио-/видеоаппаратурой - технология «умный дом» позволяет передавать музыку и видео в любую точку здания, независимо от места установки источника сигнала (CD, DVD).</p></div>
				</div>
				<div class="b-advantage__item">
					<i class="n-ico n-ico-link" style="width: 55px"></i>
					<strong>ИЗГОТОВЛЕНИЕ<br>НКУ</strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Слушайте музыку и смотрите любимые фильмы там, где Вам удобно. Не нужно оснащать каждую комнату громоздкой аудио-/видеоаппаратурой - технология «умный дом» позволяет передавать музыку и видео в любую точку здания, независимо от места установки источника сигнала (CD, DVD).</p>
					</div>
				</div>
				<div class="b-advantage__item">
				</div>	
			</div>
<div class="b-adv__col b-adv__col_right">
				<div class="b-advantage__item"style="padding-right: 115px;">
					<i class="n-ico n-ico-home"></i>
					<strong>ПОДГОТОВКА<br>СМЕТ</strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Процессор «умного дома» не допустит конфликтов системы отопления и климатической техники, даже если ранней весной Вы откроете окно или включите сплит-систему при работающем отоплении.  Благодаря централизованному управлению отопительным оборудованием, теплым полом, кондиционером и вентиляцией в Вашем доме всегда будет уютно.</p>
					</div>
				</div>
				<div class="b-advantage__item" style="padding-right: 70px; padding-top: 25px;">
					<i class="n-ico n-ico-door"></i>
					<strong>ТИПОВЫЕ И<br>ИНДИВИДУАЛЬНЫЕ<br>ПРОЕКТЫ </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Процессор «умного дома» не допустит конфликтов системы отопления и климатической техники, даже если ранней весной Вы откроете окно или включите сплит-систему при работающем отоплении.  Благодаря централизованному управлению отопительным оборудованием, теплым полом, кондиционером и вентиляцией в Вашем доме всегда будет уютно.</p>
					</div>
				</div>
				<div class="b-advantage__item"style="padding-right: 110px;margin-top: 10px">	
				</div>			
			</div>
			  <div class="b-adv__col b-adv__col_right2">

				<div class="b-advantage__item"style="
    padding-right: 115px;
">
					<i class="n-ico n-ico-lamp"></i>
					<strong>РАЗРАБОТКА<br>КОНСТРУКЦИЙ НКУ </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Хотите, чтобы свет в комнатах включался по датчику движения, становился приглушенным при просмотре фильмов и расставлял акценты в интерьере, когда Вы принимаете гостей? В память системы можно внести любые сценарии. Чтобы запустить выбранную программу достаточно одного касания к сенсорной панели.</p>
					</div>
				</div>
				<div class="b-advantage__item"style="padding-right: 70px;">
					<i class="n-ico n-ico-lock"></i>
					<strong>ГАРАНТИЯ И<br>ПОСЛЕГАРАНТИЙНОЕ<br>ОБСЛУЖИВАНИЕ </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>Хотите, чтобы свет в комнатах включался по датчику движения, становился приглушенным при просмотре фильмов и расставлял акценты в интерьере, когда Вы принимаете гостей? В память системы можно внести любые сценарии. Чтобы запустить выбранную программу достаточно одного касания к сенсорной панели.</p>
					</div>
				</div>

				<div class="b-advantage__item"style="padding-right: 110px;margin-top: 10px">					
				</div>				
			</div>
			<article>ПРОИЗВОДСТВО ЭЛЕКТРОЩИТОВ</article>
			<span class="b-title-pult">Единое централизованное управление</span>

		</div>-->
		<div class="b-row b-row__why clearfix">
			<h3>Почему Эlevel?</h3>			
			<div class="b-why__list">
				<article>
					<figure><img src="/img/elevel_icon1.png" alt=""></figure>
					<header>Дополнительные услуги</header>
				<p>С первого звонка в компанию Вы убедитесь, что с нами комфортно работать. При необходимости мы предоставим исчерпывающие консультации по техническим вопросам, проведем экспертизу спецификаций, обеспечим техническую поддержку и гарантийное обслуживание оборудования после инсталляции.</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon2.png" alt=""></figure>
					<header>Гибкое ценообразование</header>
					<p>Наши клиенты не переплачивают за оборудование. Ваш заказ будет вести персональный менеджер, разрабатывающий оптимальное предложение для каждого конкретного проекта. Мы бережно относимся к Вашему бюджету и несем ответственность за эффективность всех рекомендованных решений.</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon3.png" alt=""></figure>
					<header>Все для проектов любого масштаба</header>
					<p>Мы предлагаем беспрецедентный ассортимент – свыше 55 000 наименований продукции ABB, Schneider Electric, Legrand, DEKraft, Rittal, Finder, DKC и других электротехнических брендов. У Вас всегда будет возможность выбора устройств модульной автоматики, частотных преобразователей, магнитных пускателей, контакторов и другого оборудования в различных ценовых сегментах.</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon4.png" alt=""></figure>
					<header>Отлаженная логистика</header>
					<p>Чтобы вы могли реализовать проект точно в срок, наша компания четко контролирует все этапы движения товаров и несет ответственность за каждую дату доставку. Клиенты из Москвы и Московской области могут получить продукцию уже на следующий день после оформления заказа.</p>
				</article>
			</div><!--.b-why__list-->
		</div><!--.b-row__why-->
		<!--<div class="b-row b-row__packages clearfix">			
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
		</div>-->
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
			</div><div class="b-steps__content">
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
			</div>
		</div>	
		<!--<div class="b-row b-row__examples clearfix">
			<h3>Примеры реализации</h3>
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
								<div class="slider-expl__row clearfix" style="	margin-top: 10px;">
									<div class="b-left">Проектирование</div>
									<div class="b-right"><p>10 дней</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Монтаж</div>
									<div class="b-right"><p>20 дней</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Используемое<br>оборудование:</div>
									<div class="b-right"><p>ABB, Gira, LCN</p></div>									
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Выполненные<br>работы:</div>
									<div class="b-right"><p>Проектирование и поставка систем управления освещением, фанкойлами. Поставка силовых щитов для распределенной системы электроснабжения. Электроустановочные изделия.</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">
										<img src="/img/face.png" alt="" id="face">
									</div>
									<div class="b-right">
									<div id="right_block1">
										<article>Иван Васильев</article>
										<p>Все быстро, качественно и в срок. Все<br> под одним пультом. Спасибо за<br> сотрудничество</p>
									</div>
										<p>автоматика KNX — 511 000 руб.</p>
										<p>силовая автоматика защиты + кабели — 150 000 руб.</p>
										<p>электроустановочные изделия — <br>80 000 руб.</p>
										<p>монтаж и программирование — <br>500 000 руб.</p>
									</div>
								</div>
							</div>
						</div>
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
									<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>автоматика KNX — 1 295 000 руб.</p>
										<p>силовая автоматика защиты + кабели — 500 000 руб.</p>
										<p>электроустановочные изделия — <br>250 000 руб.</p>
										<p>монтаж и программирование — <br>1 500 000 руб.</p>
									</div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Сроки реализации:</div>
									<div class="b-right"><p>ХХХ</p></div>
								</div>
							</div>
						</div>
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
									<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>автоматика KNX — 2 821 000 руб.</p>
										<p>силовая автоматика защиты + кабели — 1 600 000 руб.</p>
										<p>электроустановочные изделия — <br>800 000 руб.</p>
										<p>монтаж и программирование — <br>3 000 000 руб.</p>
									</div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Сроки реализации:</div>
									<div class="b-right"><p>ХХХ</p></div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>-->
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<div class="b-pull-left b-form">
				
				    <?/*<div id="simul_form1">*/?>
				    <div>
                        <div class="info"></div>
                        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
                        <div id="bottom_form">
                        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "electroshields_bottom", array(
							"WEB_FORM_ID" => "73",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"USE_EXTENDED_ERRORS" => "N",
							"SEF_MODE" => "N",
							"SEF_FOLDER" => "/partners/shielder/",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "3600",
							"LIST_URL" => "/sendquery/sended.php",
							"EDIT_URL" => "/sendquery/sended.php",
							"SUCCESS_URL" => "/sendquery/sended.php",
							"CHAIN_ITEM_TEXT" => "",
							"CHAIN_ITEM_LINK" => "",
							"VARIABLE_ALIASES" => array(
								"WEB_FORM_ID" => "WEB_FORM_ID",
								"RESULT_ID" => "RESULT_ID",
							)
							),
							false
						);?>
						</div>
                    </div>
				<?/*?>
				
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
						<input type="submit" value="Заказать звонок" class="btn gradient">
					</div>
				</form>
				<?*/?>
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>Свяжитесь с менеджером нашей компании <br>для начала сотрудничества:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<!--<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/img/pic5a.gif" alt=""></a>
					</div>						
					
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/img/pic5a.gif" alt=""></a>
					</div>-->

				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
<div class="border">&nbsp;</div>
<div style="clear: both; "></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

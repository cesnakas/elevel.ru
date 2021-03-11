<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Умный дом - разработка, проектирование и установка системы от компании Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и программирование системы «умный дом». Система «умный дом» позволяет управлять инженерными коммуникациями Вашего дома. ");
$APPLICATION->SetPageProperty("tags", "умный дом, smart house, система умный дом, система автоматизации дома, автоматизация дома, knx, eib, система lcn, merten knx, abb i-bus eib, legrand in one, bticino my home, gira funkbus, gira instabus, esylux, teleco, moeller, умный дом цена, умный дом стоимость, сколько стоит умный дом, управление бытовыми приборами, контроль бытовых приборов,  управление отоплением, контроль открытия дверей, контроль открытия окон, обогрев кровли, обогрев водостоков, управление кондиционированием, управление сигнализацией, контроль доступа, умный дом оборудование, проект умный дом, мультирум, управление освещением, управление светом, управление микроклиматом, управление умным домом, дистанционное управление домом, автоматизация дома, домашняя автоматизация, управление жалюзи, дистанционное управление жалюзи, управление воротами, дистанционное управление воротами, управление вентиляцией, управление климатом, имитация присутствия, сигнализация умный дом, ситемы охранной сигнализации");
$APPLICATION->SetPageProperty("keywords", "умный дом, система умный дом, цена, стоимость, оборудование, проект умный дом, умный дом купить, установка умный дом, проект системы умный дом, умный дом проектирование, монтаж умный дом");
$APPLICATION->SetTitle("Система «умный дом»");
?> 
<div class="b-centered b-promo clearfix">

		<h1>Система «умный дом»</h1>

		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left"><img src="/img/monitor.jpg" alt=""></div>
			<div class="b-pull-right b-form">
				<div class="b-title-orange">Управляйте домом одним касанием</div>
                
<script>
$(document).ready(function() {
    $('#call_close').first().remove();
    $('#suber').first().remove();
    //$(".table10").removeClass("table10").addClass("table-bottom")
    //$(".table-bottom").first().append('<tr><td colspan="4" style="padding: 26px 0 0 0;"><span id="suber-bottom" style="cursor:pointer; position: relative; left: 188px;"><img src="/i/btn140g.gif"></span></td></tr>');
    
   // $(".txt8").first().css('padding-top','12px');
   // $(".inputtext").attr('class','w170');
   // $('textarea').first().attr('class','h92');
    //$("#form_dropdown_TIME,#form_dropdown_CITY").first().attr('class','sel1');
    //$('input[name="web_form_submit"]').first().css('display','none');
    //$('form').css('height','392px');
   
    $(".inner_params td").first().css('padding','0px');
    
    
//$(this).on('event', ":element", function() {})
    $(this).on( 'keypress','input[name="form_text_411"]', function (e){
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
       //_gaq.push(['_trackEvent', 'sent_home_price', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_home_price');
        CONTACTUSER = $('input[name="form_text_409"]').val();
        PHONEUSER = $('input[name="form_text_411"]').val();
        EMAIL = $('input[name="form_text_410"]').val();
        MESSAGES = $('select[name="form_textarea_412"]').val();
        //console.log(MESSAGES);
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
            $('.error').show().fadeOut(3000);
            $('.error').html(textError);
            $('#simul_form').css('height','410px');
            setTimeout( function () {$('#simul_form').css('height','320px');}, 3000);
            return false;
        }
    });
    
});

</script>         
        <div class="bottom-form" style="float: left;"> 
        <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_smart_house", Array(
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"AJAX_MODE" => "N",
	"WEB_FORM_ID" => "30",	// ID веб-формы
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
 
<!--<div style="clear: both; "></div>-->
 
            
                    <!--<div class="b-form__row">
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
                        <p>Выберите свою конфигурацию системы управления </p>
                    </div>-->
    
			
			</div><!--.b-form-->
		</div><!--.b-row__first-->


		<div class="b-row b-row__task clearfix">

			<header class="b-title-orange2">
				Задача технологии «умный дом» — создать единый центр управления, обеспечивающий слаженную работу инженерных сетей и бытовой техники
			</header>

			<figure><img src="/img/task-img.jpg" alt=""></figure>

			<article>
				<p>
					Сегодня за Ваш комфорт отвечают десятки устройств — котлы, насосы, теплые полы, кондиционеры, приточная и вытяжная вентиляция. Задача технологии «умный дом» — создать единый центр управления, обеспечивающий слаженную работу инженерных сетей и бытовой техники. 
				</p>
				<p>
					Система готова меняться вместе с потребностями своего владельца. Чтобы добавить новое оборудование, не придется ломать стены и заново прокладывать кабельные сети, достаточно подключить дополнительные компоненты и немного изменить настройки системы.
				</p>
			</article>

		</div><!--.b-row__task-->


		<div class="b-row b-row__advantages clearfix">

			<h2>Что вы получаете?</h2>

			<div class="b-adv__col b-adv__col_left">

				<div class="b-advantage__item">
					<i class="n-ico n-ico-lamp"></i>
					<strong>Сценарное<br>освещение </strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Хотите, чтобы свет в комнатах включался по датчику движения, становился приглушенным при просмотре фильмов и расставлял акценты в интерьере, когда Вы принимаете гостей? В память системы можно внести любые сценарии. Чтобы запустить выбранную программу достаточно одного касания к сенсорной панели. 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-home"></i>
					<strong>Комфортная<br>температура</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Процессор «умного дома» не допустит конфликтов системы отопления и климатической техники, даже если ранней весной Вы откроете окно или включите сплит-систему при работающем отоплении.  Благодаря централизованному управлению отопительным оборудованием, теплым полом, кондиционером и вентиляцией в Вашем доме всегда будет уютно. 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-multiroom"></i>
					<strong>Мультирум</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Слушайте музыку и смотрите любимые фильмы там, где Вам удобно. Не нужно оснащать каждую комнату громоздкой аудио-/видеоаппаратурой - технология «умный дом» позволяет передавать музыку и видео в любую точку здания, независимо от места установки источника сигнала (CD, DVD).
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-lock"></i>
					<strong>Безопасность</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Где бы Вы ни были, безопасность дома останется под контролем. Датчики интеллектуальной системы управления мгновенно определят потенциальную угрозу – проникновение на территорию, возгорание, протечку. При срабатывании датчика видеозапись включится автоматически, и Вы сможете немедленно вывести картинку на экран компьютера или телевизора.  
						</p>
					</div>
				</div><!--.b-advantage__item-->
				
			</div><!--.b-adv__col_left-->

			<div class="b-adv__col b-adv__col_right">

				<div class="b-advantage__item">
					<i class="n-ico n-ico-door"></i>
					<strong>Дистанционное<br>управление </strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Доступ к управлению автоматикой дома открыт везде, где есть мобильная связь или сеть Интернет – можно одной SMS активировать систему снеготаяния на подъезде к загородному коттеджу, заранее включить свет в прихожей и теплый пол в гостиной. Забыли погасить свет в ванной? Сделайте это из машины по дороге на работу.  
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-link"></i>
					<strong>Связь и <br>домофония</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Вы всегда будете знать, кто стоит за дверью. Неважно, в какой точке дома Вы находитесь - видеодомофон с интеркомом позволит принять вызов, переговорить с посетителем, открыть дверь или запретить доступ на территорию. Можно организовать аудиосвязь внутри дома или объединить интерком с системой контроля управления доступом. 	 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-settings"></i>
					<strong>Энергосбережение</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Тарифы на электроэнергию растут каждый год. Однажды внедрив управление «умным домом», Вы будете экономить, не задумываясь. Даже когда энергоемкость технологий возрастет в разы. Система не упустит ничего: погасит свет, если Вы забыли о нем, синхронизирует работу отопительных приборов, чтобы Вам не пришлось переплачивать за комфорт.  	 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-shield"></i>
					<strong>Контроль внештатных ситуаций</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							Ваш дом может справиться с любой аварией. «Умный дом» запустит самый эффективный сценарий защиты при протечке воды, аварии котла, утечке газа. Все системы выступят единым фронтом: при срабатывании пожарной сигнализации приточная вентиляция будет отключена, аварийный участок – обесточен, Вы получите голосовое оповещение об аварии, сообщение по SMS или e-mail.
						</p>
					</div>
				</div><!--.b-advantage__item-->

			</div><!--.b-adv__col_right-->

			<span class="b-title-pult">Единое централизованное управление</span>

		</div><!--.b-row__advantages-->


		<div class="b-row b-row__why clearfix">

			<h3>Почему Эlevel?</h3>
			
			<div class="b-why__list">

				<article>
					<figure><img src="/img/why-img1.jpg" alt=""></figure>
					<header>Подбираем оборудование от автоматики KNX до розеток</header>
					<p>
						Наша компания — официальный поставщик оборудования LCN, Merten, Schneider Electric, INNTECH, Esylux, Gira, ABB. Конфигурацию системы можно дополнить или обновить в любой момент.
					</p>
				</article>

				<article>
					<figure><img src="/img/why-img2.jpg" alt=""></figure>
					<header>Мы понимаем Ваши потребности</header>
					<p>
						Каждый проект «умного дома» разрабатывается под индивидуальные задачи заказчика. Расскажите о своих идеях, и мы предложим решения в разных ценовых категориях. 
					</p>
				</article>

				<article>
					<figure><img src="/img/why-img3.jpg" alt=""></figure>
					<header>Реализуем проекты «под ключ»</header>
					<p>
						Надежная автоматизация дома — результат слаженной работы проектировщиков, инженеров и монтажников. Комплексный подход к домашней автоматизации — разумная экономия Вашего времени.
					</p>
				</article>

				<article>
					<figure><img src="/img/why-img4.jpg" alt=""></figure>
					<header>Поддерживаем, обновляем, расширяем функционал «умного дома»</header>
					<p>
						Наши специалисты ответят на каждый вопрос, помогут в настройке оборудования и дальнейшем обновлении системы.
					</p>
				</article>

			</div><!--.b-why__list-->

		</div><!--.b-row__why-->


		<div class="b-row b-row__examples clearfix">

			<h3>Примеры реализации</h3>

			<div class="flexslider slider-example">
				<ul class="slides">

					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">Проект</div>
									<div class="b-right"><p>Установка системы «умный дом» в квартире площадью 110 м2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Категория</div>
									<div class="b-right"><p>Стандарт</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Оборудование</div>
									<div class="b-right"><p>ABB</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>Автоматика KNX — 511 000 руб.</p>
										<p>Силовая автоматика защиты + кабели — 150 000 руб.</p>
										<p>Электроустановочные изделия — <br>80 000 руб.</p>
										<p>Монтаж и программирование — <br>500 000 руб.</p>
									</div>
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>

					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">Проект</div>
									<div class="b-right"><p>Автоматизация 2-этажнного загородного коттеджа площадью 300 м2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Категория</div>
									<div class="b-right"><p>Премиум</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Оборудование</div>
									<div class="b-right"><p>ABB</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>Автоматика KNX — 1 295 000 руб.</p>
										<p>Силовая автоматика защиты + кабели — 500 000 руб.</p>
										<p>Электроустановочные изделия — <br>250 000 руб.</p>
										<p>Монтаж и программирование — <br>1 500 000 руб.</p>
									</div>
								</div>
								<div class="slider-expl__row clearfix">
									<!--<div class="b-left">Сроки реализации:</div>
									<div class="b-right"><p>ХХХ</p></div>-->
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>

					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">Проект</div>
									<div class="b-right"><p>Инсталляция системы интеллектуального управления элитным 3-этажнным коттеджем площадью 1 100 м2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Категория</div>
									<div class="b-right"><p>Премиум</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Оборудование</div>
									<div class="b-right"><p>ABB</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Стоимость</div>
									<div class="b-right">
										<p>Автоматика KNX — 2 821 000 руб.</p>
										<p>Силовая автоматика защиты + кабели — 1 600 000 руб.</p>
										<p>Электроустановочные изделия — <br>800 000 руб.</p>
										<p>Монтаж и программирование — <br>3 000 000 руб.</p>
									</div>
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


		<div class="b-row b-row__packages clearfix">
			
			<h3>Пакеты услуг</h3>

			<div class="b-row__pack_col1">
				<p><span>Мультирум</span></p>
				<p><span>Домашний кинотеатр</span></p>
				<p><span>Управление энергоснабжением</span></p>
				<p><span>Управление освещением,<br>шторами, жалюзи</span></p>
				<p><span>Система отопления</span></p>
				<p><span>Система вентиляции<br>и кондиционирования</span></p>
				<p><span>Система пожаротушения</span></p>
				<p><span>Система охранно-пожарной сигнализации</span></p>
				<p><span>Дистанционный контроль и управление</span></p>
				<p><span>Система видеонаблюдения</span></p>
				<p><span>Контроль аварийных ситуаций</span></p>
			</div>

			<div class="b-row__pack_col b-row__pack_start">

				<header class="b-pack-col__green">
					<strong><i class="n-ico ico-home-green"></i><span>Старт</span></strong>
					от 1 000 000 руб.
				</header>

				<ul class="b-row-wrp">
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
				</ul>
				<a href="#" class="btn gradient btn-medium btn-opac">Заказать</a>

			</div><!--.b-row__pack_col__start-->

			<div class="b-row__pack_col b-row__pack_standart">

				<header class="b-pack-col__violet">
					<strong><i class="n-ico ico-home-violet"></i><span>Стандарт</span></strong>
					от 3 000 000 руб.
				</header>

				<ul class="b-row-wrp">
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
				</ul>
				<a href="#" class="btn gradient btn-medium">Заказать</a>

			</div><!--.b-row__pack_col_standart-->

			<div class="b-row__pack_col b-row__pack_premium">

				<header class="b-pack-col__orange">
					<strong><i class="n-ico ico-home-orange"></i><span>Премиум</span></strong>
					от 5 000 000 руб.
				</header>

				<ul class="b-row-wrp">
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
				</ul>
				<a href="#" class="btn gradient btn-large">Заказать</a>

			</div><!--.b-row__pack_col_premium-->

		</div><!--.b-row__packages-->


		<div class="b-row b-row__architecture clearfix">
			
			<h3>Архитектура «умного дома»</h3>

			<div class="flexslider slider-architecture">
				<ul class="slides">

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>сценарное освещение</figcaption>
						</figure>
					</li>

					<!--<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>сценарное освещение2</figcaption>
						</figure>
					</li>

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>сценарное освещение3</figcaption>
						</figure>
					</li>

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>сценарное освещение4</figcaption>
						</figure>
					</li>

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>сценарное освещение5</figcaption>
						</figure>
					</li>-->

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
							<span class="b-numb">2</span><strong>проектная докуменация</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">3</span><strong>планирование сотрудничества</strong>
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
					<p>
						Сначала менеджер отдела автоматизации подробно обсудит с Вами возможности отдельных инженерных систем и всего комплекса в целом. Если Вы уже знаете, каким хотите видеть свой дом, мы приступим к первичной оценке стоимости работ.
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						Договор на проектирование заключается после предварительного согласования бюджета и утверждения технического задания. На основе разработанного проекта составляется смета и рассчитывается полная стоимость «умного дома». 
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						Мы предлагаем Вам выбрать удобный формат сотрудничества – выполнение работ по одному договору или заключение отдельных договоров на каждый этап установки системы: кабельные работы, производство и установку электрощита, монтаж оборудования, пусконаладочные работы. 
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						На услуги специалистов Elevel предоставляется гарантия 1 год, в течение первых 3 месяцев эксплуатации мы бесплатно поможем с корректировкой индивидуальных настроек системы.  
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						В дальнейшем Вы можете заключить с нами договор на сервисное обслуживание за фиксированную плату или заказывать разовые выезды специалистов, когда в этом возникнет необходимость. 
					</p>
				</div>
			</div><!--.b-steps__content-->

		</div><!--.b-row__we-work-->


		<div class="b-row b-row__last clearfix">
			
			<div class="b-to-first-step">
				<div class="b-title3">Вы уже на пороге дома своей мечты...</div>
				<!--<p>Сделайте первый шаг прямо сейчас и вы получите <strong>скидку 5%</strong> на оборудование</p>-->
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
			</div>

			<div class="b-form-contacts clearfix">

 <div class="bottom-form" style="float: left;"> 
        <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_smart_house", Array(
    "SEF_MODE" => "N",    // Включить поддержку ЧПУ
    "AJAX_MODE" => "N",
    "WEB_FORM_ID" => "30",    // ID веб-формы
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
</div>
				

				<div class="b-pull-right">
					<p>Свяжитесь с менеджером отдела автоматизации<br>для начала работы над проектом:</p>
					<span class="numb-phone">8 (495) 363-32-03</span>

					<div class="b-top-link-wrp">
						<div class="toplink1">
							<img src="/img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="/img/pic5a.gif" alt=""></a>
						</div>
						
						<div class="toplink2">
							<img src="/img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="/img/pic5a.gif" alt=""></a>
						</div>
					</div>

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
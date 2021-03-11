<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Специальное предложение, системным интеграторам, системным интеграторам и инсталляторам, сотрудничество с интеграторами, партнерские программы Эlevel, партнерство");
$APPLICATION->SetPageProperty("keywords", "Специальное предложение, системным интеграторам, системным интеграторам и инсталляторам, сотрудничество с интеграторами, партнерские программы Эlevel, партнерство");
$APPLICATION->SetPageProperty("description", "Предложение сотрудничества системным интеграторам IT от Эlevel");
$APPLICATION->SetTitle("Предложение сотрудничества системным интеграторам IT от Эlevel");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>Приглашаем системных интеграторов к взаимовыгодному сотрудничеству</h1>
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
				<div class="b-title-orange">НАЧНИТЕ СОТРУДНИЧЕСТВО С КОМПАНИЕЙ Эlevel</div>
					<script>
					    $(document).ready(function() {
					        $('#call_close').first().remove();
					        $('#suber').first().remove();
					        $('#config_info').remove();
					        $(".inner_params td").first().css('padding','0px');
					        
					        $(this).on( 'keypress','input[name="form_text_788"]', function (e){
					            if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
					                $(".error").html("Только цифры").show().fadeOut(3000); 
					                return false;
					            }
					        });

					        function isValidEmailAddress(emailAddress) {
					            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
					            return pattern.test(emailAddress);
					        }
					        
					        $('form[name="request_systemit"]').attr('class','back_call');
					        $('form[name="request_systemit"]').attr('display','block !important');
					        $(this).on('click', '.form_subm', function() {
					            CONTACTUSER =  $(this.form).find('input[name="form_text_786"]').val();
					            PHONEUSER = $(this.form).find('input[name="form_text_788"]').val();
					            EMAIL = $(this.form).find('input[name="form_email_787"]').val();
					            MESSAGES = $(this.form).find('select[name="form_dropdown_request_time"]').val();
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
					            var m_data=$(this.form).serialize();
					            m_data = m_data + "&web_form_submit=Y";

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
	                <div id="request_systemit_1">
	                    <div class="info"></div>
	                    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
		                    <div id="bottom_form">
		                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_systemit", Array(
		                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
		                        "AJAX_MODE" => "N",
		                        "WEB_FORM_ID" => "59",    // ID веб-формы
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
	                <!--<form action="/">
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
							<input type="submit" value="Начать сотрудничество" class="btn gradient">
							
						</div>
					</form>  -->
					<img src="/img/arrs.png" alt="" class="pic2">
					<div class="dcrpt">Для профессионалов в области системной интеграции мы предлагаем в первую очередь удобство</div>
				</div><!--.b-form-->
					
				<div class="review s02 partners-review">
					<p>Мы команда профессионалов, которая обеспечит ВАМ: низкие цены, комплексные решения, оперативность в обратной связи, индивидуальный подход</p>
					<div class="pic"><img src="/img/build-lico.jpg"></div>
					<div class="name">Роман Топольсков<span> (Менеджер по работе с системными интеграторами)</span></div>
				</div>
			
			
			<?/*<div class="review">
				<div class="pic"><img src="/img/build-lico.jpg"></div>
				<div class="msg">
					<div class="txt">Мы команда профессионалов, которая обеспечит ВАМ: низкие цены, комплексные решения, оперативность в обратной связи, индивидуальный подход</div>
					<div class="name">Роман Топольсков <span>(Менеджер по работе с системными интеграторами)</span></div>
				</div>
			</div>*/?>
			
		</div><!--.b-row__first-->
		<div class="system_integration">
			<div><span class="title">Системная интеграция</span>Это область, в которой мы уже имеем значительный  опыт работы, однако продолжаем активно развивать свои возможности</div>
		</div>
		<div class="what_you_get">
			<div class="orange_title">Что вы получаете?</div>
			<div class="title i1">Прямые поставки оборудования от ведущих европейских производителей</div>
			<ul class="left">
				<li><span>Кабельная продукция – силовые кабели ВВГ, ВВГнг, ВВГнг-LS, NYM; кабели связи UTP/FTP, КССПВ, SAT, RG, РК, ТППэп, ТРП, ТСВ, КСПВ, кабели для систем охранно-пожарной сигнализации, аудио- и видеодомофонии; кабель и провод для воздушных линий.</span></li>
				<li><span>Низковольтное оборудование – пусковые устройства и УЗО, приборы для учета и контроля параметров потребляемой энергии, предохранители, щитки, распределительные шкафы и другие устройства управления. </span></li>
				<li><span>Электроустановочные изделия – выключатели, розетки, светорегуляторы, датчики движения, диммеры для теплого пола. </span></li>
			</ul>
			<ul class="right">
				<li><span>Кабеленесущие системы – короба, каналы, лючки, колонны, металлические кабельные лотки, электромонтажные трубы. </span></li>
				<li><span>Структурирование кабельные системы (19” шкафы, патч-корды, патч-панели, система мониторинга)</span></li>
			</ul>
			<div class="clear"></div>
			<div class="title i2">Разработка технических решений и полный комплекс услуг по их реализации:</div>
			<ul class="left">
				<li><span>Консультации на этапе составления технического задания (по слаботочным системам, среднему и низкому напряжениям)</span></li>
				<li><span>Разработка проектов на основании ТЗ (электротехнических систем и шинопроводов, трансформаторных подстанций (среднее напряжение), систем автоматизации и диспетчеризации гостиниц, бизнес-центров, торговых центров и других объектов, комплексов резервного энергоснабжения зданий гражданского и промышленного назначения. </span></li>
				<li><span>Подбор и поставка оборудования: расчет освещенности, подбор светотехнического оборудования, сборка НКУ (ГРЩ, ВРА, ЩА, ЩО и т.д.)</span></li>
				<li><span>Расчет освещенности и подбор свето-технического оборудования</span></li>
				<li><span>Разработка оптимальных решений по шинопроводу</span></li>
			</ul>
			<ul class="right">
				<li><span>Разработка и внедрение системы автоматизации и диспетчеризации по объектам гражданского строительства (управление номерным фондом, диспетчиризация инженерных систем)</span></li>
				<li><span>Разработка решений для резервного питания по объектам промышленного и гражданского назначения (ГПУ, ИБП и т.д.)</span></li>
				<li><span>Монтажные работы: компания имеет все необходимые допуски СРО, выполняет пуско-наладку и программирование оборудования, обеспечивает оформление готовых проектов в надзорных органах. </span></li>
			</ul>
			<div class="clear"></div>
			<div class="orange_dott_title">Системным интеграторам</div>
		</div>	
		<!--<div class="b-row b-row__architecture clearfix">			
			<div class="flexslider slider-architecture">
				<ul class="slides">
					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>сценарное освещение</figcaption>
						</figure>
					</li>
					<li>
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
					</li>
				</ul>
			</div>
		</div>-->
		<div class="b-row b-row__why clearfix">
			<h3>Почему Эlevel?</h3>			
			<div class="b-why__list">
				<article>
					<figure><img src="/img/elevel_icon1.png" alt=""></figure>
										<header>Персональный менеджер каждому клиенту</header>
					<p>Персональный менеджер всегда будет на связи, чтобы проинформировать о ходе выполнения заказа, оперативно ответить на Ваши вопросы и обеспечить оперативное решение любых проблем, которые могут возникнуть в ходе реализации проекта.</p>
				</article>
				<article>
					<figure><img src="/img/elevel_icon2.png" alt=""></figure>
					<header>Большой складской запас оборудования</header>
					<p>На складе представлено свыше 55 000 наименований продукции в различных ценовых категориях: 19?шкафы и аксессуары к ним, кабельная продукция, ИБП, УЗО и многое другое. Отлаженная складская логистика гарантирует соблюдение сроков поставок для проектов любого масштаба и сложности.</p>
				</article>
				<article>
					<figure><img src="/img/elevel_icon3.png" alt=""></figure>
					<header>Инженерный подход к каждому проекту</header>
					<p>В структуру компании входит собственный отдел проектирования и монтажный участок, что позволяет разрабатывать и реализовать нестандартные проекты «под ключ».  Мы предлагаем эффективные комплексные решения, от проектирования СКС до инсталляции оборудования на объекте.</p>
				</article>
				<article>
					<figure><img src="/img/elevel_icon4.png" alt=""></figure>
					<header>Синергия двух направлений: инженерное и дистрибьюторское</header>
					<p>Все разработанные инженерные решения могут быть реализованы на базе оборудования, представленного в ассортименте компании. Являясь официальным дистрибьютором крупнейших производителей кабельно-проводниковой и светотехнической продукции, мы готовы предложить несколько вариантов комплектации с учетом Вашего бюджета. </p>
				</article>
			</div><!--.b-why__list-->
		</div><!--.b-row__why-->
		<div class="b-row b-row__examples clearfix">
			<!--<h3>Примеры реализации</h3>
			<div class="flexslider slider-example">
				<ul class="slides">
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<header>Электрощит ВРУ, Кремль, Москва</header>
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
									<div class="b-right"><p>ААВВ</p></div>
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
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">Проект</div>
									<div class="b-right"><p>автоматизация 2-этажнного загородного коттеджа площадью 300 м2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Категория</div>
									<div class="b-right"><p>Премиум</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Оборудование</div>
									<div class="b-right"><p>ХХХ</p></div>
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
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">Заказать похожий проект</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">Проект</div>
									<div class="b-right"><p>инсталляция системы интеллектуального управления элитным 3-этажнным коттеджем площадью 1 100 м2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Категория</div>
									<div class="b-right"><p>Премиум</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">Оборудование</div>
									<div class="b-right"><p>ХХХ</p></div>
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
			</div>-->
		</div>
		<div class="b-row b-row__we-work clearfix">			
			<div class="b-gray-bg">
			<h3>Как мы работаем?</h3>
			<div class="b-steps">
				<span class="blue-line gradient"></span>
				<ul class="clearfix">
					<li class="active">
						<a href="javascript: void(0)">
							<span class="b-numb">1</span><strong>Звонок в компанию</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">2</span><strong>Анализ объекта</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">3</span><strong>Уточнение задач</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">4</span><strong>Разработка проектного решения</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">5</span><strong>Предоставление КП</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">6</span><strong>Заключение договора</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">7</span><strong>Поставка и монтаж оборудования</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
				</ul>
			</div>
			</div><!--.b-gray-bg-->
			<div class="b-steps__content">
				<div class="b-steps__cont_item visible">
					<p>Опишите задачу и оставьте телефон для связи. Наш менеджер уточнит особенности объекта, составит план дальнейшего сотрудничества и расскажет, какую документацию необходимо предоставить для начала работы.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>Мы изучим техническое задание, спецификации и проектную документацию, чтобы предложить самое эффективное решение в рамках выделенного бюджета. Или поможем Вам разработать документацию «с нуля». </p>
				</div>
				<div class="b-steps__cont_item">
					<p>Мы учтем особенности эксплуатации объекта, специфические требования в области системной интеграции, дадим профессиональные рекомендации по повышению безопасности и энергоэффективности СКС.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>Когда все данные собраны, мы приступаем к разработке проекта, в котором будут учтены все выявленные потребности Заказчика.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>За обработку информации и составление коммерческого предложения отвечает персональный технико-коммерческий инженер, который в курсе всех особенностей Вашего проекта.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>После завершения подготовительных работ и согласования с Заказчиком мы подписываем договор, в котором четко прописывается наша сфера ответственности и гарантийные обязательства.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>Собственная производственная база позволяет нам в сжатые сроки выпускать необходимое электрощитовое оборудование, а специалисты нашего монтажного участка предоставляют полный комплекс услуг по монтажу и пуско-наладке инженерных систем.</p>
				</div>
			</div><!--.b-steps__content-->
		</div><!--.b-row__we-work-->
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
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<div class="b-pull-left b-form">
				<div id="request_systemit_1">
                    <div class="info"></div>
                    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
	                    <div id="bottom_form">
	                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_systemit", Array(
	                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "59",    // ID веб-формы
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
                <!--<form action="/">
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
						<input type="submit" value="Начать сотрудничество" class="btn gradient">
					</div>
				</form> -->
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>Свяжитесь с менеджером отдела по работе<br>с системными интеграторами:</p>
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
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
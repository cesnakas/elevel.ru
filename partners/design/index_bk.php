<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Предложение сотрудничества дизайнеру и архитектору");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, сотрудничество, дизайнеру, архитектору, обеспечение, снабжение, поставки, подбор, демонстрация, электрооборудование, электротехническое оборудование, автоматизация зданий, электроинсталляция, домофоны, звонки, выключатели, розетки");
$APPLICATION->SetPageProperty("keywords", "Эlevel инженер, эlevel, elevel.ru, партнерство, сотрудничество, дизайнеру, архитектору, обеспечение, снабжение, поставки, подбор, демонстрация, электрооборудование, электротехническое оборудование, автоматизация зданий, электроинсталляция, домофоны, звонки, выключатели, розетки, демонстрационный зал, презентация, gira, abb, schneider electric, fontini, gi gambarellim merten, legrand, bticino, mk electric, fede,  декоративное электрооборудование, элитные серии выключателей");
$APPLICATION->SetPageProperty("description", "Сотрудничество с Эlevel для дизайнеров и архитекторов");
$APPLICATION->SetTitle("Дизайнеру и архитектору");
$APPLICATION->AddHeadString('<link href="http://allfont.ru/allfont.css?fonts=franklin-gothic-demi-cond" rel="stylesheet" type="text/css" />');
$APPLICATION->AddHeadString('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">');
$APPLICATION->AddHeadString('<script src="'.SITE_TEMPLATE_PATH.'/script.js"></script>');

$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>
<script>

$( document ).ready(function() {
    $(".text").text("");
    $(".adress_ul li").css("width","100%");
});

		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
		
		
</script>
  <div class="b-centered b-promo clearfix">
		<div class="h1-center" ><h1 style="line-height: 30px;  font-family: 'Franklin Gothic Demi Cond', arial; font-size: 36px;">Вы Дизайнер? Архитектор? – Эlevel лучший выбор для вас!</h1></div>
		<div class="b-row b-row__first clearfix">
			<!--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
<?/*$APPLICATION->IncludeComponent(
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
);*/?>
			</div>	-->		
			<div class="b-pull-right s01 b-form" id="bottom_form">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "62",    // ID веб-формы
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
        
			</div><!--.b-form--><!--.b-form-->

			<div class="review s02">
				<p>В одной компании Вы найдете всё необходимое для реализации Ваших самых смелых проектов - от выключателя и щитового оборудования до изысканных новинок дизайнерского освещения и фурнитуры. 
				</p><p>С каждым из Вас будет работать высококлассный специалист, готовый проконсультировать по любому вопросу в любое время. Гибкая система скидок, широчайший ассортимент и безупречный сервис сделает Вас нашим постоянным клиентом на долгие годы.
				</p><p>Просто позвоните нам!</p>
				<div class="pic"><img src="/partners/design/img/irinavoljanina.jpg"></div>
				<div class="name">Вера Голикова<br><span>(Руководитель отдела по работе с дизайнерами и архитекторами)</span></div>
			</div>
			<div class="review s02 last">
				<div class="review_adress">
					<div class="review_adress_title">Ждем Вас в наших шоу-румах по адресам: </div>
					<ul class="adress_ul">
						<li><i class="fa fa-map-marker"></i>111524, Москва, ул. Электродная, 13А</li>
						<li><i class="fa fa-map-marker"></i>123060, Москва, ул. Маршала Рыбалко, 10</li>
					</ul>
					<a href="/upload/pres/elevel_designers.ppt">
						<div class="download_link">Наша презентация.pdf<span>(800 Кб)</span></div>
					</a>	
				</div>
				
				<div class="review_contacts">
				 	<ul>
				 		<li>+7 (915) 256 67 79</li>
				 		<li>v.golikova@elevel.ru</li>
				 		<li><a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-2x"></i></a></li>
				 	</ul>
				</div>
				
			</div>

			
			
		</div><!--.b-row__first-->	
        </div>
        </div>
        </div>
	    <div class="long_orange"> 
		    <div class="wrapp">
			    <div class="title">Эlevel – надежный партнер на всех стадиях разработки и реализации дизайн-проекта»</div>
			    <div class="title_2">Этапы реализации проекта и виды услуг нашей команды:</div>
			    
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>1</strong></div></li>
                             <li>Помощь в подготовительных и проектных работах по электрике и освещению:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>помощь в подготовке схемы и привязки  точек осветительного оборудования</li>
                        <li><i class="fa fa-angle-right"></i>схема освещения по группам светильников</li>
                        <li><i class="fa fa-angle-right"></i>схема расположения розеток и выключателей</li>
                        <li><i class="fa fa-angle-right"></i>схема управления освещением (в том числе автоматизация освещения, «умный дом»)</li>
                        <li><i class="fa fa-angle-right"></i>подготовка и согласование технического задания для электрического проекта, а также самого проекта электроснабжения и освещения и рабочей документации</li>
                        <li><i class="fa fa-angle-right"></i>расчет освещенности</li>
                    </ul>
                </div>
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>2</strong></div></li>
                             <li>Подбор необходимого оборудования и материалов для реализации проекта:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>подбор светильников, люстр, бра, декоративной светодиодной подсветки, исходя из пожеланий стиля, вида освещения, бюджета и других требований</li>
                        <li><i class="fa fa-angle-right"></i>подбор выключателей, розеток и другой электрофурнитуры</li>
                        <li><i class="fa fa-angle-right"></i>схема расположения розеток и выключателей</li>
                        <li><i class="fa fa-angle-right"></i>составление сметы-спецификации в соответствии с дизайном помещения по каталогам различных брендов и фабрик</li>
                        <li><i class="fa fa-angle-right"></i>создание схемы и визуализации объекта </li>
                    </ul>
                </div>
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>3</strong></div></li>
                             <li>Услуги сопровождения объекта:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>выезд на объект с демо-материалами для согласования с заказчиком</li>
                        <li><i class="fa fa-angle-right"></i>комплектация и поставка светотехнического и электрооборудования</li>
                        <li><i class="fa fa-angle-right"></i>контроль поставки продукции на объект в полном  объеме и в необходимые сроки</li>
                    </ul>
                </div>
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>4</strong></div></li>
                             <li>Монтажные работы:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>разводка электросетей (имеются все необходимые допуски СРО)</li>
                        <li><i class="fa fa-angle-right"></i>пуско-наладка и программирование оборудования (системы KNX, умный дом) </li>
                        <li><i class="fa fa-angle-right"></i>согласование выполненных работ в надзорных органах</li>
                    </ul>
                </div>
			  
		    </div>
	    </div>

    <div class="contaigner">
   
            <div class="slider_menu">
                <ul>
                    <!--<li id="1" class="active_slider_menu">Акции<span>/</span></li> 
                	<li   id="2">Портфолио<span>/</span></li>
                   <li id="3" class="active_slider_menu">Мероприятия<span>/</span></li>-->
                </ul>
            
            </div>

            <!-- <div class="b-row b-row__examples i4 clearfix" id="slider_full_1" style="visibility: visible; position: unset;">
                    <div class="flexslider slider-example i3 b1">
                        <ul class="slides">
                            <li>
                            	<div class="desc-sl"><span>Бесплатная доставка со склада до 14/06/2016!</span></div>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                      <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                <div class="b-row b-row__examples i4 clearfix" id="slider_full_2" style="visibility: visible; position: unset;">
                    <div class="flexslider slider-example i3 b2">
                        <ul class="slides">
                            <li>
                                <div class="desc-sl s1"><span>HE BOOZE PUB, Екатеринбург</span></div>
                                <div class="desc-sl s2"><span><p>Используемое оборудование: Merten Antic (античная латунь), Светильники GIRA</p>
                                <p>Все быстро, качественно и в срок. Все под одним пультом. Спасибо за сотрудничество</p>
                                <p> АННА РЯЗАНОВА (Дизайнер)</p></span></div>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.jpg" draggable="false">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                      	<img src="/partners/design/img/demo_shlk.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                <div class="b-row b-row__examples i4 clearfix" id="slider_full_3" >
                    <div class="flexslider slider-example i3 b3">
                        <ul class="slides">
                            <li>
                            <div class="desc-sl s1"><span>Тест</span></div>
                                <div class="desc-sl s2"><span><p>Используемое оборудование: Merten Antic (античная латунь), Светильники GIRA</p>
                                <p>Все быстро, качественно и в срок. Все под одним пультом. Спасибо за сотрудничество</p>
                                <p> АННА РЯЗАНОВА (Дизайнер)</p></span></div>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                      <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
     <!--  <div class="b-row b-row__examples i4 clearfix"  id="slider_full_2">
                    <div class="flexslider slider-example i3">
                        <ul class="slides">
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.png">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_shlk.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
               <div class="b-row b-row__examples i4 clearfix"  id="slider_full_3">
                    <div class="flexslider slider-example i3">
                        <ul class="slides">
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.png">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_shlk.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 


<!--<div id="slider-wrap" >
	<div id="slider">
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
	</div>
</div> -->

        
           <div class="long_orange cl">
           		<div class="wrapp">
                	<div class="title">Что вы получаете?</div>
               		<div class="item i7">
                		<img src="/partners/design/img/part_i7_or.png">
                    	<p>Комплектация частных и общественных интерьеров электроустановочными изделиями от класса эконом до люкс и дизайнерским светом</p>
                	</div>
                    <div class="item i8">
                		<img src="/partners/design/img/part_i8_or.png">
                    	<p>Помощь в подборе электроустановочных изделий и дизайнерского света</p>
                	</div>
               </div>
           </div>
           <div class="elevel-deluxe">
           		<div class="long_orange cl">
           		<div class="wrapp">
                	<div class="item i7 t">
                		<img src="/partners/design/img/elevel-deluxe.jpg">
                   	</div>
                    <div class="item i8 t">
                		<p><strong>Уникальный интерактивный модуль подбора и поиска электроустановочных изделий и светильников премиум-класса</strong></p>
                    	<p>Практичный инструмент для дизайнеров и архитекторов, открывающим доступ к широкому выбору эксклюзивных светильников, выключателей, розеток и прочей продукции, сочетающей в себе роскошный декор и функциональность высочайшего уровня.</p>
                	    <a href="http://www.elevel-deluxe.ru/" class="btn gradient" >Перейти на Эlevel DELUXE</a>
                    </div>
                     
               </div>
               
           </div>
           </div>
		        
            <!--<div class="download"><a href="/upload/pres/elevel_designers.ppt"><span>Общая презентация для дизайнеров и архитекторов в формате</span>.ppt
            (1.29 мб)</a></div>	
            <div class="download"><a href="/partners/design/catalogs/"><span>Дизайнерские каталоги</span></a></div>	-->	
	       <div class="b-row b-row__last clearfix">			
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">Отправить запрос</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
                <div id="bottom_form">
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
                        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "62",    // ID веб-формы
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
					<p>Свяжитесь с менеджером отдела по работе<br>с архитекторами и дизайнерами:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<!--<div class="b-top-link-wrp1">
						<div class="toplink1">
							<i class="tz-icon"></i>
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">Заказать звонок<img src="img/pic5a.gif"/></a>
						</div>						
						
						<div class="toplink2">
							<i class="tz-icon"></i>
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">Отправить запроc<img src="img/pic5a.gif"/></a>
						</div>
					</div>-->
            	</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo--> 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
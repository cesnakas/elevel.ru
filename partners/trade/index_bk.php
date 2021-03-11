<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Предложение сотрудничества торгому партнеру от Эlevel");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, партнерство, сотрудничество, торговому партнеру, электрооборудование, подбор, ассортимент, оптимальный складской запас, ценовая политика, оформление торговых стендов, скидки, доставка, бесплатные семинары, розетки, выключатели, лампы, кабель, провод, автоматические выключатели, электрощиты, стабилизаторы напряжения");
$APPLICATION->SetPageProperty("keywords", "эlevel, эlevel инженер, партнерство, сотрудничество, торговому партнеру, электрооборудование, подбор, ассортимент, оптимальный складской запас, ценовая политика, оформление торговых стендов, скидки, доставка, бесплатные семинары, розетки, выключатели, лампы, кабель, провод, автоматические выключатели, электрощиты, стабилизаторы напряжения, бесплатные торговые стенды, скидки торговым партнерам");
$APPLICATION->SetPageProperty("description", "Сотрудничество с Эlevel для торговых партнеров");
$APPLICATION->SetTitle("Торговому партнеру");
$APPLICATION->AddHeadScript('/js/masked.js');
?>                                          
<style>
    .trade_partner {
        clear: both;
        padding-top: 24px;
    }
</style>
<script>
    (function ($) {
        $(function () {
            $('select.stylize').selectbox();
            $('.inputselect').selectbox();
        })
    })(jQuery)
</script>
 <script type=text/javascript>
    $(document).ready(function(){
        $(".tz-phone-input").mask("+7(999) 999-99-99");    
    });
</script>


<div class="b-centered b-promo clearfix">
<h1>Ищете надежного партнера? &ndash; Вы нашли его!</h1>

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

	<div class="b-pull-right b-form partners-form">
		<div id="bottom_form">
		    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "sendpartners", array(
			        "WEB_FORM_ID" => "61",
			        "IGNORE_CUSTOM_TEMPLATE" => "N",
			        "USE_EXTENDED_ERRORS" => "Y",
			        "SEF_MODE" => "N",
			        "SEF_FOLDER" => "/partners/trade/",
			        "CACHE_TYPE" => "N",
			        "CACHE_TIME" => "3600",
			        "LIST_URL" => "/partners/trade/",
			        "EDIT_URL" => "/partners/trade/",
			        "SUCCESS_URL" => "",


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
	    <!--.b-row__first-->
	</div>

	<div class="review s02">
		<p>Наша задача не просто предложить вам оптимальный ассортимент продукции и цены на нее, главной задачей для нас является долгосрочная перспектива сотрудничества и Ваше финансовое процветание.</p>
		<div class="pic"><img src="/partners/trade/img/trade_shemilkin.jpg"/></div>
		<div class="name">Михаил Щемилкин <span>(Руководитель ОТК)</span></div>
	</div>

<div class="trade_partner">
    <div class="orange s42 bold upper">Станьте Нашим
        <br/>
        торговым Партнером
    </div>

    <p>Мы помним, что вас поразило при нашей первой встрече &mdash; как же
        <br/>
        мы успеваем обслуживать такое большое количество партнёров и
        <br/>
        ни разу не подвести с поставкой? Мы объяснили тем, что просто
        <br/>
        любим свою работу&hellip; И вы улыбнулись.</p>
</div>

<div class="long_orange">
    <div class="wrapp">
        <div class="title">Что вы получаете?</div>

        <div class="item i1">
            <p class="torgpart"><a href="/partners/trade/page2.php">Осуществляем подбор оптимального складского ассортимента с учетом особенностей региона и конкретной
                ситуации (максимальная оборачиваемость товара и создание товарного запаса, исходя из финансовых
                требований)</a></p>
        </div>

        <div class="item i2">
            <p class="torgpart"><a href="/partners/trade/page.php">Ведем гибкую ценовую политику (дополнительные бонусы за объем
                <br/>
                и активное продвижение новых продуктов, а так же за работу по
                <br/>
                широкой линейке брендов)</a></p>
        </div>

        <div class="item i3">
            <p class="torgpart"><a href="/partners/trade/page1.php">Помогаем в оформлении торговой экспозиции (фирменные модульные стенды для дополнительного привлечения
                покупателей)</a></p>
        </div>

        <div class="item i4">
            <p class="torgpart"><a href="/partners/trade/page3.php">Обучаем Ваш торговый персонал
                <br/>
                (семинары по основам электротехники и ассортименту)</a></p>
        </div>

        <div class="item i5">
            <p class="torgpart"><a href="/partners/trade/page5.php">Предоставляем возможность возврата товара в течении 3-х месяцев (по договоренности)</a></p>
        </div>

        <div class="item i6"></div>
    </div>
</div>

<div class="why_elevel">
    <div class="item i1">Делимся огромным, многолетним опытом
        <br/>
        управлением своими розничными магазинами
    </div>

    <div class="item i2">Большие товарные запасы —
        <br/>
        бесперебойные отгрузки Ваших
        <br/>
        заказов
    </div>

    <div class="item i3">Личный менеджер
        <br/>
        по любым Вашим
        <br/>
        вопросам
    </div>

    <div class="item i4">Отдел по обработке Ваших
        <br/>
        заявок
    </div>

    <div class="item i5">Экспресс обработка и доставка товара</div>

    <div class="item i6">Просмотр остатков через
        <br/>
        сайт
    </div>

    <div class="item i7">Возможность
        <br/>
        оформлять Ваши
        <br/>
        заявки через сайт
    </div>

    <div class="item i8">Комплексный поставщик с
        <br/>
        большим портфелем
        <br/>
        электрооборудования для дома
    </div>

    <div class="item i9">Почему
        <br/>
        эlevel?
    </div>
</div>

<!--<div class="long_gray">
    <div class="wrapp">
        <div class="title">Как это работает?</div>
        <img src="img/min_elevel.jpg" align="left"/>

        <p style="line-height: 2;"> — Регистрация на портале обеспечит Вам круглосуточный доступ к системе
            <br/>
            резервирования товаров и формирования заказов:</p>

        <ul>
            <li><span>автоматизация процесса закупок упростит и ускорит работу компании;</span></li>

            <li><span>фильтры по группам/артикулу/бренду/параметрам облегчат поиск и подбор электрооборудования;</span>
            </li>

            <li><span>информация о наличии товаров и их доступных аналогов предоставляется в режиме online;</span></li>

            <li><span>текущий баланс компании, сроки поставки продукции на склад, даты отгрузки и оплаты,<br> исходя из условий договора, можно контролировать через e.Way.</span>
            </li>
        </ul>
    </div>
</div>-->

<div class="b-row b-row__examples clearfix">
    <h3 style="font-weight: normal; text-transform: uppercase; margin: 40px 0px 15px;">Только оригинальное оборудование
        от ведущих производителей</h3>

    <div class="flexslider slider-example i2">
        <ul class="slides">
            <li>
                <div class="slider-expl__ins clearfix"><img src="img/slide_1.png"/>

                    <div class="txt">
                        <div class="header">Электроустановочные изделия
                            <br/>
                            Schneider Electric Unica и Unica Хамелеон
                        </div>

                        <p><b>Особенности:</b> 3 цвета вставок, более 30 цветов рамок и используемых
                            <br/>
                            материалов, рамки из пластика, металла или натурального дерева.</p>

                        <p>Оригинальная синяя подсветка выключателей.</p>
                    </div>
                </div>

                <!--.slider-expl__ins-->
            </li>

            <li>
                <div class="slider-expl__ins clearfix"><img src="img/slide_1.png"/>

                    <div class="txt">
                        <div class="header">Электроустановочные изделия
                            <br/>
                            Schneider Electric Unica и Unica Хамелеон
                        </div>

                        <p><b>Особенности:</b> 3 цвета вставок, более 30 цветов рамок и используемых
                            <br/>
                            материалов, рамки из пластика, металла или натурального дерева.</p>

                        <p>Оригинальная синяя подсветка выключателей.</p>
                    </div>
                </div>

                <!--.slider-expl__ins-->
            </li>
        </ul>
    </div>

    <!--.slider-example-->
</div>

<!--.b-row__examples-->

<div class="download"><a href="/upload/pres/elevel_traders.ppt"><span>Общая презентация для торговых партнеров</span>.ppt
    (1.29 мб)</a> <a
        href="/upload/pres/elevel_traders_diy.ppt"><span>Общая презентация для торговых партнеров (DIY)</span>.ppt (1.27
    мб)</a></div>

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
      <div class="b-pull-right b-form partners-form bottom-form-without-float">
        <div id="bottom_form">
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "sendpartners_bottom", array(
                    "WEB_FORM_ID" => "61",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "Y",
                    "SEF_MODE" => "N",
                    "SEF_FOLDER" => "/partners/trade/",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "/partners/trade/",
                    "EDIT_URL" => "/partners/trade/",
                    "SUCCESS_URL" => "",


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
        <!--.b-row__first-->
    </div>
            <div class="b-pull-right1 under-bottom-form row col-xs-6 col-md-12">
            <p>Свяжитесь с менеджером отдела по работе<br/>с торговыми партнерами:</p>
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
    <!--.b-form-contacts-->
</div>

<!--.b-row__last-->
</div>

<!--.b-promo-->
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
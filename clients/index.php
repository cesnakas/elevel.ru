<?
define('SITE_TEMPLATE_ID','company');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Клиенты и отзывы об Эlevel и Эlevel Инженер");
$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, клиенты элевел, реализованные объекты, выигранные тендеры, объекты поставок, проекты, электрооборудование, проектирование электроснабежния, проектирование инженерных системы, проекты эlevel, проекты элевел, клиенты эlevel, Жилые многоквартирные дома, коттеджи, квартиры, гостиницы, гостиничные комплексы, Торговые и развлекательные центры, торгово-выставочные комплексы, деловые центры, офисные комплексы, Банки, школы, больницы, спортивные сооружения, информационно-вычислительные центры, Склады, транспортные базы, фабрики, заводы, производственные цеха, промышленные здания и сооружения");
$APPLICATION->SetPageProperty("keywords", "элевел, эlevel, elevel, elevel.ru, клиенты элевел, реализованные объекты, выигранные тендеры, объекты поставок, проекты, электрооборудование, проектирование электроснабежния, проектирование инженерных системы, проекты эlevel, проекты элевел, клиенты эlevel, Жилые многоквартирные дома, коттеджи, квартиры, гостиницы, гостиничные комплексы, Торговые и развлекательные центры, торгово-выставочные комплексы, деловые центры, офисные комплексы, Банки, школы, больницы, спортивные сооружения, информационно-вычислительные центры, Склады, транспортные базы, фабрики, заводы, производственные цеха, промышленные здания и сооружения");
$APPLICATION->SetTitle("Клиенты и отзывы");
?> 

<div class="container">
    <div class="row">
        <nav>
            <div class="wrap_nav_block">
                <div class="col-lg-3 col-md-3">
                    <div class="navigation_box">
                        <ul class="navigation_block">
                            <li class="active_block_bg">
                                Компания
                                <div class="close_btn">
                                </div>
                            </li>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "left-active",
                                Array(
                                    "CACHE_SELECTED_ITEMS" => "N",
                                    "CACHE_TIME" => 3600,
                                    "CACHE_TYPE" => "A",
                                    "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU_otz",
                                    "MAX_LEVEL" => "1",
                                    "ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU_otz",
                                    "USE_EXT" => "Y"
                                )
                            );?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>    <!-- end side navigation -->

        <!-- begin content -->
        <div class="main_wrap">
            <div class="col-md-9 col-lg-9">
                <div class="wrap_nav hidden-lg hidden-md">
                    <div class="nav_btn"> </div>
                </div>
                <h1>Клиенты и отзывы</h1>

<div class="clients-box">
	<ul>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/liv/" ><img src="/images/mirex.gif" alt="Объект Эlevel - Жилой комплекс &amp;laquo;Мирекс-парк&amp;raquo;" title="Объект Эlevel - Жилой комплекс &amp;laquo;Мирекс-парк&amp;raquo;"  /></a>
			</div>
			<div class="info-box">
				<h2><a href="/clients/liv/" >Жилье</a></h2>
				<p>Жилые многоквартирные дома, коттеджи, квартиры</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/hotel/" ><img src="/images/pinn.gif" alt="Объект Эlevel - Гостиница Парк Инн Прибалтийская" title="Объект Эlevel - Гостиница Парк Инн Прибалтийская"  /></a>
			</div>
			<div class="info-box">
				<h2><a href="/clients/hotel/" >Гостиницы</a></h2>
				<p>Гостиничные комплексы</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/trade/" ><img src="/images/wereiskaya_plaza.gif" alt="Объект Эlevel - Бизнес-центр &amp;laquo;Верейская плаза&amp;raquo;" title="Объект Эlevel - Бизнес-центр &laquo;Верейская плаза&raquo;"  /></a>
			</div>
			<div class="info-box">		
				<h2><a href="/clients/trade/" >Торговые и деловые центры</a></h2>
				<p>Торговые и развлекательные центры, торгово-выставочные комплексы, деловые центры, офисные комплексы</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/iobjects/" ><img src="/images/krylatskoe.gif" alt="Объект Эlevel - Спортивный комплекс «Крылатское»" title="Объект Эlevel - Спортивный комплекс «Крылатское»"  /></a>
			</div>		
			<div class="info-box">
				<h2><a href="/clients/iobjects/" >Объекты инфраструктуры</a></h2>
				<p>Банки, школы, больницы, спортивные сооружения, информационно-вычислительные центры</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/factures/" ><img src="/images/kox.gif" alt="Объект Эlevel - ОАО «Алтай Кокс»" title="Объект Эlevel - ОАО «Алтай Кокс»"  /></a>
			</div>
			<div class="info-box">
				<h2><a href="/clients/factures/" >Складские и промышленные объекты</a></h2>
				<p>Склады, транспортные базы, фабрики, заводы, производственные цеха, промышленные здания и сооружения</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/otziv/" title="отзывы клиентов Эlevel" ><img src="/images/otziv.gif" alt="отзывы клиентов Эlevel" title="отзывы клиентов Эlevel"  /></a>
			</div>		
			<div class="info-box">
				<h2><a href="/clients/otziv/" >Отзывы клиентов Эlevel</a></h2>
			</div>
		</li>
	</ul>
</div>
            </div>
        </div>
    </div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
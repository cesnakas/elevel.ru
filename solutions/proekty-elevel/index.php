<?
define('SITE_TEMPLATE_ID','cable-systems-nano');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "Проекты Эlevel ");
$APPLICATION->SetPageProperty("description", "Проекты Эlevel: индивидуальные решения для Вас");
$APPLICATION->SetTitle("Сотрудничество");
?><nav>
<div class="container">
	<div class="row">
		<div class="wrap_nav_block">
			<div class="col-lg-3 col-md-12">
				<div class="navigation_box">
					<ul class="navigation_block">
						<li class="active_block_bg">
						Инженерные услуги
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
		"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
		"MAX_LEVEL" => "1",
		"ROOT_MENU_TYPE" => "left_solutions_cable",
		"USE_EXT" => "Y"
	)
);?>
					</ul>
					<ul class="navigation_block">
						<li class="bg_gray">
						Поставки оборудования
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
		"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
		"MAX_LEVEL" => "1",
		"ROOT_MENU_TYPE" => "left_partners_cable",
		"USE_EXT" => "Y"
	)
);?>
					</ul>
				</div>
				<div class="association-top visible-lg">
					 <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?> <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?> <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?> <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
				</div>
			</div>
		</div>
		 <!-- begin content -->
		<div class="col-md-12 col-lg-9">
			 <!--
			<div class="search_nav_block clearfix">
				<div class="search_block">
					<form action="#">
						    <div class="select-container">
	                           <div id="search-category" class="search-category">

	                                <span category="0" class="first_menu">Искать по всему сайту <i class="tz-caret"></i></span>

	                                <div class="list-cat">
	                                    <ul>
	                                        <li><span category="0">Весь сайт</span></li>
	                                        <li><span category="1">Корпоративный сайт</span></li>
	                                        <li><span category="2">Интернет - магазин</span></li>
	                                    </ul>
	                                </div>
	                           </div>
	                        </div>  <input type="text" placeholder="Поиск по сайту..."> <input type="submit" value=""> <i class="search_bg"></i>
					</form>
				</div>
				<div class="wrap_nav hidden-lg">
					<div class="nav_btn">
					</div>
				</div>
			</div>-->
			<div class="main_content_txt">
				<h1>Проекты Эlevel</h1>
			</div>
			<div style="align=left; margin-right:20px; display:block; width:400px;color:#aaa">
 <b>Владимир Забавников, Руководитель направления</b><br>
 <img width="400px" src="http://www.elevel.ru/images/manager/zabav.JPG" align="left" style="margin-right:20px;">
			</div>
			<p>
				Направление «Проекты для Элевел» давно переросло «простой набор» инжиниринговых услуг. Фактически это экономическая модель мира, созданная профессионалами компании и реализованная через комплекс проектных и электромонтажных услуг. Выглядит на практике это следующим образом: здесь также есть производственная и непроизводственная сфера, есть отрасли и сегменты рынка, есть люди и целые промышленные комплексы. В нашей модели предусмотрено всё. Именно поэтому мы понимаем ЛЮБОГО клиента и ЛЮБЫЕ запросы. Нам не нужно пытаться «впихнуть» и «подогнать» Ваши потребности под возможности Элевел. Мы с одинаковой скрупулёзностью реализуем проект по электроснабжению животноводческого комплекса или распределительного устройства 10кВ для действующей АЭС или смонтируем систему кабельного обогрева и молниезащиты для частного дома.
			</p>
			<p>
				 Каждый проект – это индивидуальное решение Ваших потребностей на максимальном уровне профессионализма и ответственности.
			</p>
			<p>
				 Как мы работаем? Думаю, что об этом лучше расскажут наши клиенты:
			</p>
 <span style="font-style: italic;"> - Не секрет, что к компаниям, работающим с «Икея» и другими гигантами выстраивается очередь из подрядчиков. Не скрою, до Элевела к нам как руководителям проекта «Мега Белая Дача» обращалось огромное число представителей инжиниринговых компаний. Надо сказать, что выбрать среди очередных обещаний действительно достойного исполнителя задача не всегда простая. <br>
			 Для нас объекты такого масштаба – ежедневная работа, для электротехнических компаний это серьёзный опыт. И какое бы впечатление не производили компании, единицы подрядчиков получают проекты. С «Элевел Инженер» также состоялась встреча, где они себя показали вполне неплохо. Привели ряд технических проектных доводов, явно знали теоретические возможности, продемонстрировали референц-лист. Кто знает, успешно ли бы закончилась эта история для компании, если бы в ходе беседы не возник спор по поводу требуемых весо-габаритных характеристик будущего ГРЩ, который должен был устанавливаться под потолком. Высказав свои доводы и не во всём согласившись с нами, сотрудники «Элевел Инженер» во главе с Директором, не переодевая деловые костюмы, забрались по шатающейся лестнице на самый верх строящегося помещения и сделали все нужные замеры площадки, чтобы не быть голословными. Более того, как оказалось впоследствии, с «высоты птичьего полёта» удалось заметить и другие нюансы проекта. Конечно, нас порадовал такой нестандартный и добросовестный подход к делу. Элевел получил заказ на этот проект, а мы – достойную реализацию». </span><br>
			<p style="text-align:right; font-weight: 600;">
				Алексей Михайлович Заславский, генеральный директор ОАО «Белая Дача»
			</p>
		</div>
	</div>
</div>
 </nav> <!-- end side navigation -->
<div class="association-bottom hidden-lg">
	<div class="col-md-4 col-sm-4 col-xs-12">
		 <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		 <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		 <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		 <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
	</div>
</div>
<!-- begin footer --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
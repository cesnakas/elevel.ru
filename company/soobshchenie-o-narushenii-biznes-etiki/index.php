<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сообщение о нарушениях бизнес этики Elevel, телефон доверия");
?>
<link href="/bitrix/templates/company/css/add-styles.css" type="text/css" rel="stylesheet">
<nav>
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

<div class="main_wrap">
<h1>Сообщение о нарушениях бизнес - этики</h1>
<div class="col-md-12 col-lg-9">
<br>
<div class="textBlock1">
<p>
	 Вы можете оставить сообщение о возможных нарушениях этики и принципов ведения бизнеса сотрудниками или контрагентами компании Эlevel, о которых Вам стало известно:
</p>
<ul type="disc" style="list-style: circle outside;margin-left: 30px;">
	<li>о некачественном или непрофессиональном обслуживании клиентов</li>
	<li>о готовящихся или свершившихся фактах коррупции, мошенничества, хищений</li>
	<li>об использовании юридических лиц, не имеющих отношения к компании Эlevel</li>
	<li>об использовании имени или реквизитов компании в сомнительных сделках или переговорах</li>
	<li>о нарушениях при проведении закупочных процедур</li>
	<li>о невыдаче кассового чека при продаже в розничных точках компании</li>
	<li>о злоупотреблениях служебным положением или превышении полномочий сотрудниками компании любых уровней</li>
	<li>о раскрытии персональных данных сотрудников, &nbsp;а также другой конфиденциальной, коммерческой или договорной информации </li>
	<li>о раскрытии тайны служебной переписки</li>
	<li>о совершении иных действий, которые наносят или могут нанести материальный ущерб или причинить вред деловой репутации компании Эlevel</li>
</ul>
<p>
	 Ваше обращение поступит непосредственно в <u><b>независимую</b></u> диспетчерскую службу при руководстве компании для последующего анализа и проверки. <u>Конфиденциальность гарантирована!</u>
</p>
<p>
	 Вы можете проинформировать о нарушении анонимно, но в этом случае у нас не будет возможности Вам ответить. Вне зависимости от решения о сохранении анонимности, сообщение о нарушении и последующая обработка переданной информации будут проводиться в конфиденциальном порядке в соответствии с нормами законодательства РФ и политики информирования о нарушении.
</p>
<p>
 <b>Телефон доверия: 8 (800) 333-90-62 (круглосуточно и бесплатно из России)</b>
</p>
<p>
 <b>Адрес электронной почты: <a href="mailto:help-info@list.ru">help-info@list.ru</a></b>
</p>
<p>
	 Никакая информация, кроме той, которая указывается Вами в сообщении, компанией не используется. Мы не отслеживаем телефонные звонки и не определяем уникальный сетевой адрес узла компьютерной сети (IP-адрес).
</p>
<p>
	 В компании «Эlevel» принят Кодекс деловой этики, определяющий нравственные и этические нормы, которыми надлежит руководствоваться сотрудникам Компании при исполнении должностных обязанностей. Кодекс является сводом понятных и четких нравственных и этических ориентиров для всех без исключения работников Компании.
</p>
</div>
</div>
</div>
 </nav>

<!-- end side navigation 
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
	</div>-->



<!-- begin footer --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
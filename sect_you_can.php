<?$APPLICATION->ShowBanner("BANNER_MONTH_NEW");?>
<?$APPLICATION->ShowBanner("LEFT_BANNER_6");?>
		<?/*<div class="block208a">
			<span class="left-menu-header">Рассчитать стоимость:</span>
			<ul class="list1">
				<li><span class="home_price" onclick="_gaq.push(['_trackEvent', 'start-home_price', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-home_price'); return true;">Умного дома</span></li>
				<li><span class="hot_home" onclick="_gaq.push(['_trackEvent', 'start-hot_home', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-hot_home'); return true;">Тёплого дома</span></li>
				<li><span class="sneg" onclick="_gaq.push(['_trackEvent', 'start-sneg', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-sneg'); return true;">Системы снеготаяния</span></li>
				<li><span class="trubi" onclick="_gaq.push(['_trackEvent', 'trubi', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('trubi'); return true;">Защиты труб</span></li>
				<li><span class="electroshit" onclick="_gaq.push(['_trackEvent', 'start-electroshit', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-electroshit'); return true;">Электрощита</span></li>
			</ul>
		</div>*/?>
		
        <div class="block208a">
			<span class="left-menu-header">Наши решения:</span>
			<ul class="list1">
				<li><span><a href="/solutions/automation/smart_house/" title="Умный дом" target="_blank">Умный дом</a></span></li>
				<li><span><a href="/solutions/cable_systems/" title="Теплый дом">Тёплый дом</a></span></li>
				<li><span><a href="/solutions/cable_systems/heating_outdoor/" title="Система снеготаяния" target="_blank">Система снеготаяния</a></span></li>
				<li><span><a href="/solutions/cable_systems/heating_gutters_roofs/" title="Защита труб от замерзания" target="_blank">Защита труб</a></span></li>
				<li><span><a href="/solutions/electroboards/" title="Производство электрощитов" target="_blank">Электрощиты</a></span></li>
			</ul>
		</div>
<?$APPLICATION->ShowBanner("LEFT_BANNER_1");?>
<div class="block208a"> 			
  <span class="left-menu-header">Прайс-лист</span>
<ul class="list1"><li><a href="/upload/Elevel_Price.xls">Скачать прайс-лист в .xls</a> 
  <br>

<a class="osl" href="/upload/Elevel_Price.xls">от <?=date ("d.m.Y", filemtime($_SERVER['DOCUMENT_ROOT'].'/upload/Elevel_Price.xls'));?></a></li></ul></div>

<?$APPLICATION->IncludeComponent("bitrix:advertising.banner", "", array(
	"TYPE" => "PRICE_FILE",
	"CACHE_TYPE" => "A",
	"NOINDEX" => "Y",
	"CACHE_TIME" => "3600"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>

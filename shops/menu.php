
<nav role="navigation" class="menu1 cfx">
	<ul class="cfx">
		
		<li class="mag">
			<a href="/catalog/" id="catalog_menu" class="top_menu_sel">Интернет-магазин электротоваров</a>
			<ul>
				<li><a href="#" title="">Кабели. Провода <span>(9158)</span></a></li>
				<li class="has-child">
					<a href="#" title="">Муфты. Наконечники. Гильзы. Клеммы <span>(9158)</span></a>
					<ul>
						<li><a href="#" title="">Конденсаторные установки. УКРМ</a></li>
						<li><a href="#" title="">Щиты осветительные. ОЩВ</a></li>
						<li><a href="#" title="">Щиты автоматического переключения. ЩАП</a></li>
					</ul>
				</li>
				<li><a href="#" title="">Крепеж кабеля. Маркировка <span>(9158)</span></a></li>
			</ul>
		</li>
		
		
		
		
		<li>
			<a href="/services/" rel="nofollow" class="top_menu_sel">Услуги</a>
			<ul>
				<li><a href="/services/project/" rel="nofollow">Проектирование</a></li>
				<li><a href="/services/complect/" rel="nofollow">Комплектация</a></li>
				<li><a href="/services/installation/" rel="nofollow">Монтаж, программирование</a></li>
				<li><a href="/services/supervision/" rel="nofollow">Технический и авторский надзор</a></li>
				<li class="lst1"><a href="/services/electrolaboratory/" rel="nofollow">Электролаборатория</a></li>
			</ul>
		</li>
		<li>
			<a href="/solutions/" rel="nofollow" class="top_menu_sel">Решения</a>
			<ul style="visibility: hidden;">
				<li class=""><a href="/solutions/smart_house/" rel="nofollow">Умный дом</a></li>
				<li class=""><a href="/solutions/automation/" rel="nofollow">Автоматизация</a></li>
				<li class=""><a href="/solutions/electroboards/" rel="nofollow">Производство электрощитов</a></li>
				<li class=""><a href="/solutions/lighting_work/" rel="nofollow">Светотехнические проекты</a></li>
				<li class=""><a href="/solutions/cable_systems/" rel="nofollow">Системы кабельного обогрева</a></li>
				<li class=""><a href="/solutions/electric_power_supply/" rel="nofollow">Электроснабжение</a></li>
				<li class=""><a href="/solutions/energy_conservation/" rel="nofollow">Энергосбережение</a></li>
				<li class="lst1"><a href="/solutions/segment_solutions/" rel="nofollow">Решения по сегментам рынка</a></li>
			</ul>
		</li>									
		<li><a href="/company/actions/" rel="nofollow" class="top_menu_sel">Акции</a></li>
		<li>
			<a href="/partners/" rel="nofollow" class="top_menu_sel">Сотрудничество</a>
			<ul style="visibility: hidden;">
				<li class=""><a href="/partners/investors/" rel="nofollow">Инвестору, заказчику, подрядчику</a></li>
				<li><a href="/partners/system-integrator/" rel="nofollow">Системному интегратору IT</a></li>
				<li><a href="/partners/shielder/" rel="nofollow">Щитовику</a></li>
				<li><a href="/partners/build/" rel="nofollow">Строителю и монтажнику</a></li>
				<li><a href="/partners/trade/" rel="nofollow">Торговому партнеру</a></li>
				<li><a href="/partners/design/" rel="nofollow">Дизайнеру и архитектору</a></li>
				<li class="item-selected lst1"><a href="/shop/" rel="nofollow">Частному покупателю</a></li>
			</ul>
		</li>
	</ul>

	<div class="block270 basket-box">
		<div id="small-basket">
			<p><a href="/personal/basket.php"><i class="tz-icon"></i></a><strong><a href="/personal/basket.php" class="hbask">Корзина</a></strong><span class="goods-count">2 товара | 3 730.23 руб.</span></p>
			<a class="trigger1" href="#">Показать корзину</a>
			<div class="insCart">
				<p>Отложенные товары: <span>0</span></p>
				<p>Недавно просмотренные: <span>0</span></p>
				<div class="cart_separt"></div>
				<a href="/personal/order.php" class="lnk-to-basket">Оформить заказ</a>
			</div>

			<script>
			$(document).ready(function(){	
				$('a.trigger1').click(function() {
					$('.insCart').slideToggle('slow');
					$('.w214').val('');
				});
			});
			</script>
		</div>

		<form action="/search/index.php">
			<input type="text" autocomplete="off" maxlength="50" placeholder="Поиск по сайту" value="" class="w214" name="q" id="title-search-input">&nbsp;
			<input type="submit" value="" class="btn22a" name="s">
		</form>
		
		<div class="12" id="title-search"></div>

		<script type="text/javascript">
		var jsControl = new JCTitleSearch({
			//'WAIT_IMAGE': '/bitrix/themes/.default/images/wait.gif',
			'AJAX_PAGE' : '/shop/lampy-nakalivaniya/',
			'CONTAINER_ID': 'title-search',
			'INPUT_ID': 'title-search-input',
			'MIN_QUERY_LEN': 2
		});
		</script>
	</div>
</nav>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
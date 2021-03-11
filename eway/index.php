<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("e.Way – простой способ управления закупками");
$APPLICATION->SetPageProperty("title", "e.Way – простой способ управления закупками");
?>
<h1><span class="ico-eway">E.way</span> <span class="text-small">Круглосуточный онлайн сервис, который позволяет нашим клиентам:</span></h1>
<div class="top-block-eway clearfix">
	<div class="text-about">
		<ul class="list-eway">
			<li class="time">
				<h3>Сократить время сотрудников на процесс закупки</h3>
				<ul class="list">
					<li>Приоритет обработки заявок из евей</li>
					<li>Загрузка заказов из файлов любого формата</li>
					<li>Самостоятельное резервирование товара</li>
					<li>Точные сроки поставки на отсутствующий товар</li>
					<li>Заказ по индивидуальным артикулам</li>
					<li>Автоматизированная загрузка приходных накладных</li>
				</ul>
			</li>
			<br/><li class="mistakes">
				<h3>Уменьшить ошибки при заказе и поставке товара</h3>
				<ul class="list">
					<li>Информация и коммуникация в одном месте</li>
					<li>Снижение человеческого фактора</li>
					<li>Подбор оборудования для замены</li>
					<li>On-line консультации и ответы на вопросы</li>
				</ul>
			</li>
			<br/><li class="choose">
				<h3>Упростить поиск и подбор оборудования</h3>
				<ul class="list">
					<li>Полные прайс-листы ключевых производителей</li>
					<li>Остатки товаров на складах в режиме онлайн</li>
					<li>95% товаров имеют фото и подробные описания</li>
					<li>Интеллектуальная поисковая строка, то есть работает
						как Яндекс, только по электротехнической области (
						при внесении в поисковую строку любой
						информации о товаре - бренд, серия, тип изделия,
						технических характеристик - система выдаст
						релевантный список товаров)</li>
					<li>Поиск  по техническим характеристикам</li>
					<li>Предложение замен оборудования для уже снятых с
						производства товаров</li>
					<li>Быстрый подбор аксессуаров и комплектующих</li>
				</ul>
			</li>
			<br/><li class="control">
				<h3>Контролировать отгрузки и текущий баланс</h3>
				<ul class="list">
					<li>Отчетность о состоянии заказов и сроках поставки</li>
					<li>Автоматические оповещения остатусе заказа</li>
					<li>Ведомость взаиморасчетов и график платежей</li>
					<li>Формирование пакета документов для бухгалтерии</li>
				</ul>
			</li>
		</ul>
		<p>Телефон поддержки  8 (800) 333 9351, <strong><a href="mailto:e.way@elevel.ru">написать по электронной почте</a></strong> или <strong><a class="lightbox-open" href="#order-call">заказать звонок</a></strong></p>
		<ul class="buttons">
			<li><a class="button white" href="https://eway.elevel.ru/registration/">Зарегистрироваться</a></li>
			<li>
				<form method="post" action="https://eway.elevel.ru/" class="formDemoAccess">
					<input type="hidden" name="trace" value="1"> <button type="submit" id="buttonEwayDemo" class="button orange-border">Войти без пароля</button>
				</form>
			 </li>			
		</ul>
	</div>
	<div class="block-sign">
		<h3>Войти в e.way</h3>
		<form class="form-sign-eway" action="https://eway.elevel.ru/" method="post">
			<fieldset>
				<div class="clearfix">
					<div class="input-holder">
 <input name="username" placeholder="E-mail" type="text">
					</div>
					<div class="input-holder">
 <input name="password" placeholder="Пароль" type="password">
					</div>
				</div>
				<div class="clearfix">
 <a href="https://eway.elevel.ru/registration/fogot/">Забыли пароль?</a> <button class="button" type="submit">Войти</button>
				</div>
			</fieldset>
		</form>
	</div>
</div>

<h2>Узнать про e.way за 2,5 мин</h2>
<div class="main-video" style="height:auto;">
	 <iframe width="100%" height="500px" src="https://www.youtube.com/embed/aAUzV7b0TBg" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
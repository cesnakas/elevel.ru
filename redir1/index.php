<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>
 <div class="block-404">
	<strong class="title text-orange">404</strong>
	<p>cтраница не найдена</p>
	<?/*<h1>МЫ ДАРИМ ВАМ КУПОН <strong style="color:#fd7621;">elevel404</strong> НА СКИДКУ 4%, КОТОРЫЙ МОЖНО ПРИМЕНИТЬ В КОРЗИНЕ!</h1>*/?>
	<div class="buttons">
		<a href="/" class="button navy">Перейти на главную</a>
		<a href="/personal/basket.php" class="button">Перейти в корзину</a>
	</div>
</div>
<span style='color:red; font-weight:bold;'>Внимание! Интернет-магазин https://www.elevel.ru/shop/ не обрабатывает заказы в праздничные дни 29,30 апреля и 2,3 мая.  Наши менеджеры свяжутся с Вами после праздников 3,4 мая.</span>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
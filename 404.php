<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");?>
 <div class="block-404">
	<strong class="title text-orange">404</strong>
	<p>Страница не найдена</p>
	<?/*<h1>МЫ ДАРИМ ВАМ КУПОН <strong style="color:#fd7621;">elevel404</strong> НА СКИДКУ 4%, КОТОРЫЙ МОЖНО ПРИМЕНИТЬ В КОРЗИНЕ!</h1>*/?>
	<div class="buttons">
		<a href="/" class="button navy">Перейти на главную</a>
		<a href="/personal/basket.php" class="button">Перейти в корзину</a>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
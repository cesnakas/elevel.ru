<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("�������� �� �������");?>
 <div class="block-404">
	<strong class="title text-orange">404</strong>
	<p>�������� �� �������</p>
	<?/*<h1>�� ����� ��� ����� <strong style="color:#fd7621;">elevel404</strong> �� ������ 4%, ������� ����� ��������� � �������!</h1>*/?>
	<div class="buttons">
		<a href="/" class="button navy">������� �� �������</a>
		<a href="/personal/basket.php" class="button">������� � �������</a>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
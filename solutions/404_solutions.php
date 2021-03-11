<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404 - страница не найдена");
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
?>

<div class="block404">
    <h1>Упс, 404 ошибка</h1>
    <p>К сожалению, запрашиваемой страницы не существует. Вы можете перейти <a href="#" onClick="history.back(); return false">назад</a>, поискать нужную Вам страницу в меню слева или начните <a href="/">с главной страницы</a>.</p>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
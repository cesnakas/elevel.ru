<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ошибка 404 - страница не найдена");
CHTTP::SetStatus("404 Not Found");
//@define("ERROR_404","Y");
?>

<?/*
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

error_reporting(E_ALL);
if(!defined(AUTH_404)) define(AUTH_404,"Y");

$arrImage = array("jpg","bmp","jpeg","jpe","gif","png");
$arrPath = pathinfo($_SERVER["REQUEST_URI"]);
if (isset($arrPath["extension"]) && in_array($arrPath["extension"],$arrImage)) die();

$params = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], "?")+1);
parse_str($params, $_GET);
parse_str($params, $v);
$GLOBALS += $v;
parse_str($params, $HTTP_GET_VARS);

//Файл включается, когда необходимо обеспечить правильный приход
//посетителей по ссылкам со старого сайта.
//require($_SERVER["DOCUMENT_ROOT"]."/incoldpages.php");

if (isset($_SERVER["REDIRECT_STATUS"]) && $_SERVER["REDIRECT_STATUS"]=="404") define("ERROR_404","Y");

if (strpos(php_sapi_name(),'cgi') !== false)
	header('Status: 404 Not Found');
else
	header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found'); 

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - HTTP not found");
?>
<br />
<table align="center" border="0"><tr><td><img src="/images/400_ep.gif"><br />
<sup><strong>ОШИБКА 404</strong></sup></td></tr></table>
<br />
К сожалению, запрашиваемая Вами страница не найдена.
  <br />
Воспользуйтесь:
<ul type="square">
<li><a href="http://elevel.ru/help/search.php" target="_blank">помощью в поиске по сайту <img src="/images/help_search.gif" border="0"></a></li>
<li><a href="http://elevel.ru/sitemap.php" target="_blank">картой сайта <img src="/i/btn-map-disabled.gif" border="0"></a> для поиска интересующей вас информации.</li>
</ul>
<br />
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"",
Array(),
false
);?>
<hr />Вы можете попробовать найти необходимую Вам информацию при помощи &quot;<a href="/help/tags.php" title="облако тего сайта www.elevel.ru" target="_blank" >облака тегов</a>&quot;: 
<br />
<br />
<div class="infoz">
 <?$APPLICATION->IncludeComponent(
	"bitrix:search.tags.cloud",
	"",
	Array(
	"FONT_MAX" => "50",	// Максимальный размер шрифта (px)
	"FONT_MIN" => "9",	// Минимальный  размер шрифта (px)
	"COLOR_NEW" => "CC4F00",	// Цвет более позднего тега (пример: "C0C0C0")
	"COLOR_OLD" => "999999",	// Цвет более раннего тега (пример: "FEFEFE")
	"PERIOD_NEW_TAGS" => "",	// Период,  в течение которого считать тег новым (дней)
	"SHOW_CHAIN" => "N",	// Показывать цепочку навигации
	"COLOR_TYPE" => "Y",	// Плавное изменение цвета
	"WIDTH" => "100%",	// Ширина облака тегов (пример: "100%" или "100px", "100pt", "100in")
	"SORT" => "NAME",	// Сортировка тегов
	"PAGE_ELEMENTS" => "80",	// Количество тегов
	"PERIOD" => "",	// Период выборки тегов (дней)
	"URL_SEARCH" => "/search/index.php",	// Путь к странице поиска (от корня сайта)
	"TAGS_INHERIT" => "N",	// Сужать область поиска
	"CHECK_DATES" => "N",	// Искать только в активных по дате документах
	"arrFILTER" => "",	// Ограничение области поиска
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	)
);?>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");*/
?>
<div class="block404">
		<h1>Ошибка 404--</h1>
		<p>К сожалению, такой страницы не существует.<br />
		Вы можете вернуться <a href="#" onClick="history.back(); return false">назад</a><br />или перейти на <a href="/">главную страницу</a>.</p>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
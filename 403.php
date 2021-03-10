<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
?><?
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

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 - HTTP not found");
?>
<br />
<table align="center" border="0"><tr><td><img src="/images/400_ep.gif"><br />
<sup><strong>ОШИБКА 403</strong></sup></td></tr></table>
<br />
К сожалению, запрашиваемая Вами страница не найдена.
  <br />
Воспользуйтесь:
<ul type="square">
<li><a href="http://elevel.ru/help/search.php" target="_blank">помощью в поиске по сайту <img src="/images/help_search.gif" border="0"></a></li>
<li><a href="http://elevel.ru/sitemap.php" target="_blank">картой сайта <img src="/i/btn-map-disabled.gif" border="0"></a> для поиска интересующей вас информации.</li>
</ul>

<br />
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
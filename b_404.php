<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������ 404 - �������� �� �������");
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

//���� ����������, ����� ���������� ���������� ���������� ������
//����������� �� ������� �� ������� �����.
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
<sup><strong>������ 404</strong></sup></td></tr></table>
<br />
� ���������, ������������� ���� �������� �� �������.
  <br />
��������������:
<ul type="square">
<li><a href="http://elevel.ru/help/search.php" target="_blank">������� � ������ �� ����� <img src="/images/help_search.gif" border="0"></a></li>
<li><a href="http://elevel.ru/sitemap.php" target="_blank">������ ����� <img src="/i/btn-map-disabled.gif" border="0"></a> ��� ������ ������������ ��� ����������.</li>
</ul>
<br />
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page",
	"",
Array(),
false
);?>
<hr />�� ������ ����������� ����� ����������� ��� ���������� ��� ������ &quot;<a href="/help/tags.php" title="������ ���� ����� www.elevel.ru" target="_blank" >������ �����</a>&quot;: 
<br />
<br />
<div class="infoz">
 <?$APPLICATION->IncludeComponent(
	"bitrix:search.tags.cloud",
	"",
	Array(
	"FONT_MAX" => "50",	// ������������ ������ ������ (px)
	"FONT_MIN" => "9",	// �����������  ������ ������ (px)
	"COLOR_NEW" => "CC4F00",	// ���� ����� �������� ���� (������: "C0C0C0")
	"COLOR_OLD" => "999999",	// ���� ����� ������� ���� (������: "FEFEFE")
	"PERIOD_NEW_TAGS" => "",	// ������,  � ������� �������� ������� ��� ����� (����)
	"SHOW_CHAIN" => "N",	// ���������� ������� ���������
	"COLOR_TYPE" => "Y",	// ������� ��������� �����
	"WIDTH" => "100%",	// ������ ������ ����� (������: "100%" ��� "100px", "100pt", "100in")
	"SORT" => "NAME",	// ���������� �����
	"PAGE_ELEMENTS" => "80",	// ���������� �����
	"PERIOD" => "",	// ������ ������� ����� (����)
	"URL_SEARCH" => "/search/index.php",	// ���� � �������� ������ (�� ����� �����)
	"TAGS_INHERIT" => "N",	// ������ ������� ������
	"CHECK_DATES" => "N",	// ������ ������ � �������� �� ���� ����������
	"arrFILTER" => "",	// ����������� ������� ������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	)
);?>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");*/
?>
<div class="block404">
		<h1>������ 404--</h1>
		<p>� ���������, ����� �������� �� ����������.<br />
		�� ������ ��������� <a href="#" onClick="history.back(); return false">�����</a><br />��� ������� �� <a href="/">������� ��������</a>.</p>
	</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
$rUri = $_SERVER["REQUEST_URI"];
$cur_d = explode('/',$rUri);
if(in_array('solutions', $cur_d) || in_array('partners', $cur_d) || in_array('clients', $cur_d) || in_array('services', $cur_d) || (in_array('company', $cur_d) && !in_array('actions', $cur_d)))
{	
	define("CUST_404","SOLUTIONS");
} 

@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("������ 404 - �������� �� �������");
CHTTP::SetStatus("404 Not Found");
//echo '<pre style="display:none;">';
//print_r($_SERVER);
//echo '</pre>';

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
if(defined("CUST_404") && CUST_404 =="SOLUTIONS")
{
?>
<nav>
<div class="container">
	<div class="row">
		<div class="wrap_nav_block">
			<div class="col-lg-3 col-md-12">
				<div class="navigation_box">
					<ul class="navigation_block">
						<li class="active_block_bg">
						���������� ������
						<div class="close_btn">
						</div>
 </li>
						 <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left-active",
	Array(
		"CACHE_SELECTED_ITEMS" => "N",
		"CACHE_TIME" => 3600,
		"CACHE_TYPE" => "A",
		"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
		"MAX_LEVEL" => "1",
		"ROOT_MENU_TYPE" => "left_solutions_cable",
		"USE_EXT" => "Y"
	)
);?>
					</ul>
					<ul class="navigation_block">
						<li class="bg_gray">
						�������� ������������
						<div class="close_btn">
						</div>
 </li>
						 <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left-active",
	Array(
		"CACHE_SELECTED_ITEMS" => "N",
		"CACHE_TIME" => 3600,
		"CACHE_TYPE" => "A",
		"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
		"MAX_LEVEL" => "1",
		"ROOT_MENU_TYPE" => "left_partners_cable",
		"USE_EXT" => "Y"
	)
);?>
					</ul>
				</div>

				<div class="association-top visible-lg">
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?>
					<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
				</div>

			</div>
		</div>
		 <!-- begin content -->
		<div class="col-md-12 col-lg-9">
			
			<div class="main_content_txt">
			<div class="block404" style="margin: 0 auto; width: 320px;">
				<h1>���, 404 ������</h1>
				<p>� ���������, ����� �������� �� ����������.<br />
				�� ������ ��������� <a href="#" onClick="history.back(); return false">�����</a><br />��� ������� �� <a href="/">������� ��������</a>.</p>
			</div>
			</div>
			
		</div>
	</div>
</div>


 </nav>    <!-- end side navigation -->

<div class="association-bottom hidden-lg">
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
	</div>
</div>
<?
}
else
{
	?>
	<div class="block404">
	<h1>������ 404</h1>
	<p>� ���������, ����� �������� �� ����������.<br />
	�� ������ ��������� <a href="#" onClick="history.back(); return false">�����</a><br />��� ������� �� <a href="/">������� ��������</a>.</p>
</div>
	
	<?
}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
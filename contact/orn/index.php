<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "������ � �������� ������ � �������� �level");
$APPLICATION->SetPageProperty("tags", "������, ��������, ��������, ��������, �������, ����� ��������� ��������, ����� ������, ���-����, �������, ���������������� ����");
$APPLICATION->SetPageProperty("keywords", "������, ��������, ��������, ��������, �������, ����� ��������� ��������, ����� ������, ���-����, �������, ���������������� ����");
$APPLICATION->SetPageProperty("description", "�������� ������ ������, ���������������� �����, ���-�����, ��������� � ����� ��������� ��������, ��������� ���� �level � ��������");
$APPLICATION->SetTitle("���������� ���������� � ��������");	
?>

<?
if($dir=='/contact/orn/'&&($_COOKIE['chek']==0)):?>
<?
$_COOKIE['town_contact']='28212';
$_SESSION['town_contact']='28212';
setcookie ("chek", 1);
?>
<?else:?>
<?
setcookie ("chek", 0);
header('Location:/contact/');
endif;?>

<?$APPLICATION->IncludeFile("/includes/town_contact.php");?>

<p class="h1">����� ������</p>
<?
ob_start();
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"offices",
	Array(
		"IBLOCK_TYPE" => "vecancy",
		"IBLOCK_ID" => "24",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "/contact/#SECTION_CODE#/",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(),
		"SECTION_USER_FIELDS" => array(),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y"
	),
false
);
$tmp = ob_get_contents();
ob_end_clean();
include('../seo_phone.php');
seo_phone($tmp);
?> 
			
			
			
			
			
<?php 	/*		
<table cellspacing="2" width="100%" style="background-color: rgb(255, 240, 225); margin-bottom: 0px;">
<tr><td width="50%"><a href="/contact/msc/14/" title="�������� �������� &amp; ����������� �� �������� ��������������" class="gray">�������� �������������</a></td><td width="50%"><a href="/contact/msc/15/" title="������� �������� &amp; ����������� �� �������� ����������" class="gray">�������� ���������</a></td></tr>
<tr><td><a href="/contact/msc/7/" title="������� �������� �� ������������ ����� �41 �� ���Ļ" class="gray">������������ ����� 41 �� ����</a></td><td><a href="/contact/msc/13/" title="������� �������� �� ������������ ����� ������������ �������" class="gray">������������ ����� ����������� �������</a></td></tr>
<tr><td><a href="/contact/msc/8/" title="�������� �������� �� ������������ ����� ���������� ����" class="gray">������������ ����� ��������� ����</a></td><td><a href="/contact/msc/9/" title="������� �������� �� ������������ ����� ���������� ����-3�" class="gray">������������ ����� ��������� ���� 3</a></td></tr>
<tr><td><a href="/contact/msc/4/" title="�������� �������� �� ������������ ����� ����������� ��ʻ" class="gray">������������ ����� ���������� ���</a></td><td><a href="/contact/msc/5/" title="������� �������� � �������� ��������� ����������� ����" class="gray">C����������� ����� ���������� ����</a></td></tr>
<tr><td><a href="/contact/msc/11/" title="�������� �������� �� ������������ ����� �������� λ" class="gray">������������ ����� C������ �</a></td><td><a href="/contact/msc/12/" title="�������� �������� �� ������������ ����� ������������� �����" class="gray">������������ ����� ������������ �����</a></td></tr>
<tr><td><a href="/contact/msc/10/" title="������� �������� �� ������������ ����� ������������ ����" class="gray">������������ ����� ����������� ����</a></td><td><a href="/contact/msc/6/" title="������� �������� �� ������������ ����� ������-��������" class="gray">������������ ����� �����-��������</a></td></tr></table>
*/?>		

<script type="text/javascript" src="/js/highslide.js"></script>
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css">
<![endif]-->
<script type="text/javascript">
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.allowMultipleInstances = false;
</script>
<script type="text/javascript">
//<![CDATA[
//hs.registerOverlay({
//	fade: 2 // fading the semi-transparent overlay looks bad in IE
//});
hs.graphicsDir = '/images/highslide/';
hs.wrapperClassName = 'borderless';
//]]>
</script>
<?php /*
<h1>����� ������:�</h1>
 
<h1>
<span style="vertical-align: middle; font-size: 14px; "><a href="#msc">������</a>� 
<a href="#mo">���������� ���.</a> �<a href="#spb">�����-���������</a>� 
<a href="#ekt">������������</a>� <a href="#nsk">�����������</a> �
<a href="#rst">������-��-����</a>� <a href="#orn">��������</a></span>
</h1>
<table cellspacing="10"> 
		<?php

		
		$city_arr[0] = '';
		$city_arr[1] = 'msc_inc.php';
		$city_arr[2] = 'spb_inc.php';
		$city_arr[3] = 'ekt_inc.php';
		$city_arr[4] = 'nsk_inc.php';
		$city_arr[5] = 'rst_inc.php';
		$city_arr[6] = 'orn_inc.php';
		if ($TRGlobalSe)
		{
		 if ($city == "�����-���������")
		 {
			$city_arr[0] = 'spb_inc.php';
			$city_arr[2] = '';
		 }
		 elseif ($city == "������������")
		 {
			$city_arr[0] = 'ekt_inc.php';
			$city_arr[3] = '';
		 }
		 elseif ($city == "�����������")
		 {
			$city_arr[0] = 'nsk_inc.php';
			$city_arr[4] = '';
		 }
		 elseif ($city == "������-��-����")
		 {
			$city_arr[0] = 'rst_inc.php';
			$city_arr[5] = '';
		 }
		 elseif ($city == "��������")
		 {
			$city_arr[0] = 'orn_inc.php';
			$city_arr[6] = '';
		 }
		}
		 for ($i=0; $i<7; $i++)
		 {
			if ($city_arr[$i] != '') include($city_arr[$i]);
		 }

		?>
</table>
<img src="/images/contacts/qr-code_2.gif" alt="QR CODE �level" title="QR CODE �level" style="margin: 5px 5px 5px 5px;float:right;"><h3><a href="javascript:window.open('http://maps.yandex.ru/?um=fV_U7pqPeZ_M6WMiQ8DpEQFfANlQHoeY&l=map', '', 'width=1280,height=1024,status=no,resizable=no,');" title="���������� ������.����� �� ���� �����" target="_blank">���������� �� ���� ����� �� ������.������ ^</a></h3>
<h3><a href="javascript:window.open('/contact/fl_map.php', '', 'width=1164,height=813,status=no,resizable=no,');" title="���������� ����-����� �� ���� �����" target="_blank">���������� �� ���� ����� �� ����-����� ^</a></h3>
<a href="#header-buttons" style="float:right">������ ^</a>

*/
?>
		<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
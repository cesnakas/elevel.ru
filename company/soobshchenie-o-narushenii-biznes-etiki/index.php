<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������� � ���������� ������ ����� Elevel, ������� �������");
?>
<link href="/bitrix/templates/company/css/add-styles.css" type="text/css" rel="stylesheet">
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
					 <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/raec.php",Array(),Array("MODE"=>"html"));?> <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/imelko.php",Array(),Array("MODE"=>"html"));?> <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/honest_position.php",Array(),Array("MODE"=>"html"));?> <?$APPLICATION->IncludeFile(SITE_DIR."includes/association/cabel_bez_opasnosty-05-mini-2.php",Array(),Array("MODE"=>"html"));?>
				</div>
			</div>
		</div>

<div class="main_wrap">
<h1>��������� � ���������� ������ - �����</h1>
<div class="col-md-12 col-lg-9">
<br>
<div class="textBlock1">
<p>
	 �� ������ �������� ��������� � ��������� ���������� ����� � ��������� ������� ������� ������������ ��� ������������� �������� �level, � ������� ��� ����� ��������:
</p>
<ul type="disc" style="list-style: circle outside;margin-left: 30px;">
	<li>� �������������� ��� ������������������ ������������ ��������</li>
	<li>� ����������� ��� ������������ ������ ���������, �������������, �������</li>
	<li>�� ������������� ����������� ���, �� ������� ��������� � �������� �level</li>
	<li>�� ������������� ����� ��� ���������� �������� � ������������ ������� ��� �����������</li>
	<li>� ���������� ��� ���������� ���������� ��������</li>
	<li>� �������� ��������� ���� ��� ������� � ��������� ������ ��������</li>
	<li>� ���������������� ��������� ���������� ��� ���������� ���������� ������������ �������� ����� �������</li>
	<li>� ��������� ������������ ������ �����������, &nbsp;� ����� ������ ����������������, ������������ ��� ���������� ���������� </li>
	<li>� ��������� ����� ��������� ���������</li>
	<li>� ���������� ���� ��������, ������� ������� ��� ����� ������� ������������ ����� ��� ��������� ���� ������� ��������� �������� �level</li>
</ul>
<p>
	 ���� ��������� �������� ��������������� � <u><b>�����������</b></u> ������������� ������ ��� ����������� �������� ��� ������������ ������� � ��������. <u>������������������ �������������!</u>
</p>
<p>
	 �� ������ ���������������� � ��������� ��������, �� � ���� ������ � ��� �� ����� ����������� ��� ��������. ��� ����������� �� ������� � ���������� �����������, ��������� � ��������� � ����������� ��������� ���������� ���������� ����� ����������� � ���������������� ������� � ������������ � ������� ���������������� �� � �������� �������������� � ���������.
</p>
<p>
 <b>������� �������: 8 (800) 333-90-62 (������������� � ��������� �� ������)</b>
</p>
<p>
 <b>����� ����������� �����: <a href="mailto:help-info@list.ru">help-info@list.ru</a></b>
</p>
<p>
	 ������� ����������, ����� ���, ������� ����������� ���� � ���������, ��������� �� ������������. �� �� ����������� ���������� ������ � �� ���������� ���������� ������� ����� ���� ������������ ���� (IP-�����).
</p>
<p>
	 � �������� ��level� ������ ������ ������� �����, ������������ ������������ � ��������� �����, �������� �������� ����������������� ����������� �������� ��� ���������� ����������� ������������. ������ �������� ������ �������� � ������ ������������ � ��������� ���������� ��� ���� ��� ���������� ���������� ��������.
</p>
</div>
</div>
</div>
 </nav>

<!-- end side navigation 
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
	</div>-->



<!-- begin footer --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
define('SITE_TEMPLATE_ID','cable-systems-nano');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("title", "������� �level ");
$APPLICATION->SetPageProperty("description", "������� �level: �������������� ������� ��� ���");
$APPLICATION->SetTitle("��������������");
?><nav>
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
		 <!-- begin content -->
		<div class="col-md-12 col-lg-9">
			 <!--
			<div class="search_nav_block clearfix">
				<div class="search_block">
					<form action="#">
						    <div class="select-container">
	                           <div id="search-category" class="search-category">

	                                <span category="0" class="first_menu">������ �� ����� ����� <i class="tz-caret"></i></span>

	                                <div class="list-cat">
	                                    <ul>
	                                        <li><span category="0">���� ����</span></li>
	                                        <li><span category="1">������������� ����</span></li>
	                                        <li><span category="2">�������� - �������</span></li>
	                                    </ul>
	                                </div>
	                           </div>
	                        </div>  <input type="text" placeholder="����� �� �����..."> <input type="submit" value=""> <i class="search_bg"></i>
					</form>
				</div>
				<div class="wrap_nav hidden-lg">
					<div class="nav_btn">
					</div>
				</div>
			</div>-->
			<div class="main_content_txt">
				<h1>������� �level</h1>
			</div>
			<div style="align=left; margin-right:20px; display:block; width:400px;color:#aaa">
 <b>�������� ����������, ������������ �����������</b><br>
 <img width="400px" src="http://www.elevel.ru/images/manager/zabav.JPG" align="left" style="margin-right:20px;">
			</div>
			<p>
				����������� �������� ��� ������ ����� ��������� �������� ����� �������������� �����. ���������� ��� ������������� ������ ����, ��������� ��������������� �������� � ������������� ����� �������� ��������� � ���������������� �����. �������� �� �������� ��� ��������� �������: ����� ����� ���� ���������������� � ������������������ �����, ���� ������� � �������� �����, ���� ���� � ����� ������������ ���������. � ����� ������ ������������� ��. ������ ������� �� �������� ������ ������� � ����� �������. ��� �� ����� �������� ���������� � ����������� ���� ����������� ��� ����������� ������. �� � ���������� �������������� ��������� ������ �� ���������������� ����������������� ��������� ��� ������������������ ���������� 10�� ��� ����������� ��� ��� ���������� ������� ���������� �������� � ������������ ��� �������� ����.
			</p>
			<p>
				 ������ ������ � ��� �������������� ������� ����� ������������ �� ������������ ������ ���������������� � ���������������.
			</p>
			<p>
				 ��� �� ��������? �����, ��� �� ���� ����� ��������� ���� �������:
			</p>
 <span style="font-style: italic;"> - �� ������, ��� � ���������, ���������� � ������ � ������� ��������� ������������� ������� �� �����������. �� �����, �� ������� � ��� ��� ������������� ������� ����� ����� ���� ���������� �������� ����� �������������� �������������� ��������. ���� �������, ��� ������� ����� ��������� �������� ������������� ���������� ����������� ������ �� ������ �������. <br>
			 ��� ��� ������� ������ �������� � ���������� ������, ��� ������������������ �������� ��� ��������� ����. � ����� �� ����������� �� ����������� ��������, ������� ����������� �������� �������. � ������� ������� ����� ���������� �������, ��� ��� ���� �������� ������ �������. ������� ��� ����������� ��������� �������, ���� ����� ������������� �����������, ������������������ ��������-����. ��� �����, ������� �� �� ����������� ��� ������� ��� ��������, ���� �� � ���� ������ �� ������ ���� �� ������ ��������� ����-���������� ������������� �������� ���, ������� ������ ��� ��������������� ��� ��������. �������� ���� ������ � �� �� ��� ������������ � ����, ���������� ������� ������� �� ����� � ����������, �� ���������� ������� �������, ��������� �� ���������� �������� �� ����� ���� ����������� ��������� � ������� ��� ������ ������ ��������, ����� �� ���� ������������. ����� ����, ��� ��������� ������������, � ������� �������� ����� ������� �������� � ������ ������ �������. �������, ��� ��������� ����� ������������� � �������������� ������ � ����. ������ ������� ����� �� ���� ������, � �� � ��������� �����������. </span><br>
			<p style="text-align:right; font-weight: 600;">
				������� ���������� ����������, ����������� �������� ��� ������ ����
			</p>
		</div>
	</div>
</div>
 </nav> <!-- end side navigation -->
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
<!-- begin footer --><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
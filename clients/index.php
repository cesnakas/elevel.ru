<?
define('SITE_TEMPLATE_ID','company');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "������� � ������ �� �level � �level �������");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, ������� ������, ������������� �������, ���������� �������, ������� ��������, �������, �������������������, �������������� ����������������, �������������� ���������� �������, ������� �level, ������� ������, ������� �level, ����� ��������������� ����, ��������, ��������, ���������, ����������� ���������, �������� � ���������������������, �������-����������� ���������, ������� ������, ������� ���������, �����, �����, ��������, ���������� ����������, �������������-�������������� ������, ������, ������������ ����, �������, ������, ���������������� ����, ������������ ������ � ����������");
$APPLICATION->SetPageProperty("keywords", "������, �level, elevel, elevel.ru, ������� ������, ������������� �������, ���������� �������, ������� ��������, �������, �������������������, �������������� ����������������, �������������� ���������� �������, ������� �level, ������� ������, ������� �level, ����� ��������������� ����, ��������, ��������, ���������, ����������� ���������, �������� � ���������������������, �������-����������� ���������, ������� ������, ������� ���������, �����, �����, ��������, ���������� ����������, �������������-�������������� ������, ������, ������������ ����, �������, ������, ���������������� ����, ������������ ������ � ����������");
$APPLICATION->SetTitle("������� � ������");
?> 

<div class="container">
    <div class="row">
        <nav>
            <div class="wrap_nav_block">
                <div class="col-lg-3 col-md-3">
                    <div class="navigation_box">
                        <ul class="navigation_block">
                            <li class="active_block_bg">
                                ��������
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
                                    "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU_otz",
                                    "MAX_LEVEL" => "1",
                                    "ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU_otz",
                                    "USE_EXT" => "Y"
                                )
                            );?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>    <!-- end side navigation -->

        <!-- begin content -->
        <div class="main_wrap">
            <div class="col-md-9 col-lg-9">
                <div class="wrap_nav hidden-lg hidden-md">
                    <div class="nav_btn"> </div>
                </div>
                <h1>������� � ������</h1>

<div class="clients-box">
	<ul>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/liv/" ><img src="/images/mirex.gif" alt="������ �level - ����� �������� &amp;laquo;������-����&amp;raquo;" title="������ �level - ����� �������� &amp;laquo;������-����&amp;raquo;"  /></a>
			</div>
			<div class="info-box">
				<h2><a href="/clients/liv/" >�����</a></h2>
				<p>����� ��������������� ����, ��������, ��������</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/hotel/" ><img src="/images/pinn.gif" alt="������ �level - ��������� ���� ��� �������������" title="������ �level - ��������� ���� ��� �������������"  /></a>
			</div>
			<div class="info-box">
				<h2><a href="/clients/hotel/" >���������</a></h2>
				<p>����������� ���������</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/trade/" ><img src="/images/wereiskaya_plaza.gif" alt="������ �level - ������-����� &amp;laquo;��������� �����&amp;raquo;" title="������ �level - ������-����� &laquo;��������� �����&raquo;"  /></a>
			</div>
			<div class="info-box">		
				<h2><a href="/clients/trade/" >�������� � ������� ������</a></h2>
				<p>�������� � ���������������������, �������-����������� ���������, ������� ������, ������� ���������</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/iobjects/" ><img src="/images/krylatskoe.gif" alt="������ �level - ���������� �������� �����������" title="������ �level - ���������� �������� �����������"  /></a>
			</div>		
			<div class="info-box">
				<h2><a href="/clients/iobjects/" >������� ��������������</a></h2>
				<p>�����, �����, ��������, ���������� ����������, �������������-�������������� ������</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/factures/" ><img src="/images/kox.gif" alt="������ �level - ��� ������ ����" title="������ �level - ��� ������ ����"  /></a>
			</div>
			<div class="info-box">
				<h2><a href="/clients/factures/" >��������� � ������������ �������</a></h2>
				<p>������, ������������ ����, �������, ������, ���������������� ����, ������������ ������ � ����������</p>
			</div>
		</li>
		<li class="client-item">
			<div class="photo-box">
				<a href="/clients/otziv/" title="������ �������� �level" ><img src="/images/otziv.gif" alt="������ �������� �level" title="������ �������� �level"  /></a>
			</div>		
			<div class="info-box">
				<h2><a href="/clients/otziv/" >������ �������� �level</a></h2>
			</div>
		</li>
	</ul>
</div>
            </div>
        </div>
    </div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
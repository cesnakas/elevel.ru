<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "�������������� ������ ������������� ������ | �level");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� �������������� � ���������������� ������ ������������� ������.");
$APPLICATION->SetPageProperty("tags", "�������������, ������� �������������, ������������� ���������, ������������� ����, abb �������������, knx, konnex, lcn �������������, inntech, yesinn, merten knx, gira knx, moeller, eaton, siemens �������������, legrand �������������, ����� ���, smart house, ���������������� ������, ������������ �������������, ������� ������������ ����������, ������� ������������ �������������, ���������������, ��������������� ������, ������� ���������������, ������������� ���������� ������, ���������� ���������� ������, ���������� ������ �������������");
$APPLICATION->SetPageProperty("keywords", "������� ������������� ������");
$APPLICATION->SetTitle("������������� ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">

		<h1>������� ������������� ������</h1>

		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "left-menu-sol",
                    Array(
                         "ROOT_MENU_TYPE" => "TOP_MENU_FOOTER_SUBMENU", 
                         "MAX_LEVEL" => "3", 
                         "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU", 
                         "USE_EXT" => "Y" 
                     )
                );?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // �������� ��������� ���
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "76",    // ID ���-�����
                    "LIST_URL" => "/sendquery/sended.php",    // �������� �� ������� �����������
                    "EDIT_URL" => "/sendquery/sended.php",    // �������� �������������� ����������
                    "SUCCESS_URL" => "/sendquery/sended.php",    // �������� � ���������� �� �������� ��������
                    "CHAIN_ITEM_TEXT" => "",    // �������� ��������������� ������ � ������������� �������
                    "CHAIN_ITEM_LINK" => "",    // ������ �� �������������� ������ � ������������� �������
                    "IGNORE_CUSTOM_TEMPLATE" => "N",    // ������������ ���� ������
                    "USE_EXTENDED_ERRORS" => "N",    // ������������ ����������� ����� ��������� �� �������
                    "CACHE_TYPE" => "A",    // ��� �����������
                    "CACHE_TIME" => "3600",    // ����� ����������� (���.)
                    "VARIABLE_ALIASES" => array(
                        "WEB_FORM_ID" => "WEB_FORM_ID",
                        "RESULT_ID" => "RESULT_ID",
                    )
                ),
                false
            );?>
			</div><!--.b-form-->
			<div class="review s02">
				<p><strong>������������� �� ��level� ���:</strong>
				<ul class="list_sol">
				<li>�������� �������� �� 30%;</li>
				<li>������� � ��� � ����; </li>
				<li>������� ����������� ��������������; </li>
				<li>������������ � ����������;</li>
				<li>���� ������� ��� ��� ������ � �������.</li>
				</ul>
				<em>�... ���� ������������ � ����������� �������. � ��� ���� ��������������, ���� ������ ������������, ���� ���� �����������, ���� ������������ � ��������. � ��� ������ �������� ��������, ������ � �����.</em></p>
				<div class="pic"><img src="/solutions/automation/img/el-babichevavt.png"></div>
				<div class="name">������� �������<br><span>(������������ ��������)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_avtext">
			� ����� ��������  ����������� ���� �������� ����� �� <span>������������� ���������� ������ </span>��� �������� ������ ���������� � ������ ���������: �������������� ������ �������������, ��������� ��������� ������������� � ������ ��������, ��������� ������ ����������� ������������� � ��������������� ���������� �������� � ��.
		</div>
		<div class="t_avgreyline">
			<div class="t_avtitle">
				�� ��������� ����� ����������� ������� � ������ �������� ����������, ���:
			</div>
			<ul class="t_avul">
				<li><a href="/solutions/automation/smart_house/" title="">����� ���</a>;</li>
				<li><a href="/solutions/automation/intellectual_building/" title="">���������������� ������</a>;</li>
				<li><a href="/solutions/automation/hotel_management_system/" title="">���������� ����������� ����������</a>;</li>
				<li>���������� ����������� ��������� (BMS) ���������������-������� ������, �������� �������, ���������� ����������, �������� ������������ ����������.</li>
			</ul>
		</div>
		<div class="t_wrapdiv2">
			����� �� ������ �������� ���������� � ��������� ������ ��������� ������������� � �� �������� ������� <br/>�������� � <a href="/solutions/cable_systems/heating_gutters_roofs/">�������� ����������</a> �� <a href="/solutions/automation/intellectual_building/alarm_system/">������ �������� ������������</a> � <a href="/solutions/automation/intellectual_building/hvac_system/">���������� ��������</a>.
		</div>
		<div class="t_avorangebox">
			����� ������������ ������� ��������������� � ����������� ������������� ��� ������ ������, �������� ����������� ����������� ������� � ��������� ���������.  �� ���������� ������������ ����������� ������ � ����������� ����� ���������� ������� �� ���������� ������� ������������������� ����� � �����, ��� 
			<a href="/shop/merten-knx/" title="">Merten KNX</a>, 
			<a href="/shop/abb-knx/" title="">ABB I-bus KNX (ABB I-bus EIB)</a>, 
			<a href="/brands/bticino/my-home/" title="">Bticino My home</a>, 
			<a href="/shop/gira-knx/" title="">Gira Funkbus � Gira Instabus</a>, 
			<a href="/brands/legrand/in-one/" title="">Legrand In one</a>, 
			<a href="/brands/issendorff/" title="">Issendorff KG LCN</a>, 
			<a href="/brands/esylux/" title="">Esylux</a>, 
			<a href="/brands/inntech/" title="">Inntech</a> � ��.
		</div>
		<div class="t_avtextupper">
			��������� �� ������������� <span>������ �������������</span> �� �������� ����� �� � ���� ������������ �������� �������, ��������, �, ��� �����������, ������� � ������
		</div>
		<div class="t_avblue">
			������������ ������� ���������� �������� � �������� � ����� �������� � ����������� ����������. �� ������� � ��� ��� � �������� ������� ���� ������������� ��  �������� � �������������� ������������, �������� ��������� �������� � ������� �����
		</div>
		<p class="t_avtitlep">��������� ������������� ������������� ��������:</p>
		<div class="t_boxdo-wrap">
			<div class="t_boxdo t_marginleft">
				<img src="/solutions/automation/img/boxdo_01.png" alt=""/>
				<p>
					<a href="/solutions/automation/hotel_management_system/" title="">������� ���������� ����������� � <br/>�������� ������</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_02.png" alt=""/>
				<p>
					<a href="/solutions/automation/intellectual_building/" title="">������� <br/>����������������� <br/>������</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_03.png" alt=""/>
				<p>
					<a href="/solutions/automation/smart_house/" title="">������� ������ ���</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_04.png" alt=""/>
				<p>
					<a href="/solutions/automation/process_automation_systems/" title="">������� ������������ ���������� ��<br/>�level �������</a>
				</p>
			</div>		
			<div class="t_boxdo">
				<img src="/solutions/automation/img/boxdo_05.png" alt=""/>
				<p>
					<a href="/solutions/automation/scheduling/" title="">��������������� <br/>� ������������</a>
				</p>
			</div>
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">�������� �������</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // �������� ��������� ���
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "76",    // ID ���-�����
                    "LIST_URL" => "/sendquery/sended.php",    // �������� �� ������� �����������
                    "EDIT_URL" => "/sendquery/sended.php",    // �������� �������������� ����������
                    "SUCCESS_URL" => "/sendquery/sended.php",    // �������� � ���������� �� �������� ��������
                    "CHAIN_ITEM_TEXT" => "",    // �������� ��������������� ������ � ������������� �������
                    "CHAIN_ITEM_LINK" => "",    // ������ �� �������������� ������ � ������������� �������
                    "IGNORE_CUSTOM_TEMPLATE" => "N",    // ������������ ���� ������
                    "USE_EXTENDED_ERRORS" => "N",    // ������������ ����������� ����� ��������� �� �������
                    "CACHE_TYPE" => "A",    // ��� �����������
                    "CACHE_TIME" => "3600",    // ����� ����������� (���.)
                    "VARIABLE_ALIASES" => array(
                        "WEB_FORM_ID" => "WEB_FORM_ID",
                        "RESULT_ID" => "RESULT_ID",
                    )
                ),
                false
            );?>
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>��������� � ���������� ������ �������������<br>��� ������ ������ ��� ��������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/solutions/automation/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/solutions/automation/img/pic5a.gif" alt=""></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo--> 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
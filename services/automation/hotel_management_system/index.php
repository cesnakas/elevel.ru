<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "������� ������������� ��������� | ������� ���������� ����������, ������ | �level");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� ������� �� ���������� ������ ������������� � ����������� �������.");
$APPLICATION->SetPageProperty("tags", "������� ���������� ����������, ������� ������������� ��������, ������������� ������, ������� ���������� ��������, ������������� ���������� ����������, ������� �������� �������, ������� ���������������, ������� �������� ������������, ������� �������� ������������, �������� ����������� ������� ������������, �������� ������ ���������������, ������� ���������������� �������������� ����������������, ������� ���������, ������� ���������� � �����������������, ������� ���������, ���������� ���������� ��������, ������� ����� ���������������, �����, �����, ������� ��������, ������� ���������� ������� � ������������, ������� ��������������� �����������, �������������� ���, �������������� ���������� �����, ����������� � ���������, ����������� �����������, ������� ����������� �����, ���������������� ���������, ������� ����������������� ������, ���������������, ���������� ��������, ������������������ ������� ���������� ����������, ���, ���, ����������������� ��������� �������, merten knx, ������� lcn, esylux, gira knx, ���������� ������� ������");
$APPLICATION->SetPageProperty("keywords", "������������� ���������, ������� ������������� ���������, ������������� ���������� ����������, ������������� �����, ������������������ ������� ���������� ����������");
$APPLICATION->SetTitle("������� ���������� ���������� ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<script type="text/javascript" src="/js/highslide.js"></script> 
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css" />
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
<div class="b-centered b-promo clearfix">

		<h1>������� ���������� ���������� (������������� ���������)</h1>

		
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left">
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
			<div class="review s07">
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

		<div class="sug_title">
			<span>���������� ������ ������������� � ����������� �������</span> � ������������ ������������ ������ �����������, ��� ������� ���������� ����������� ����������, �������� ������������ � �������������� ��������� ������� ��� ������.
			<p>
				���� ��� ��� ����� ���������� ����� ����� ��� ���� ������� ��� �� ����� ������� � ��� ���� ������� ��������� �������, �������� ���������� � ���������� ������������������ ������� ���������� ����������
			</p>
		</div>
		<div class="sug_grey">
			<p>��� ��� ��� � ������������ ����������:</p>
			<ul>
				<li>������������� ������ ���� <a href="/solutions/automation/intellectual_building/" title="������� &laquo;���������������� ������&raquo; �� �������� �level �������">���������� ������</a> (����������������, ���������������, ���������������� � ��.);</li>
				<li>���������� �������� ���������� ��������� ������� � ������ �������, ���������������� ������;</li>
				<li>�������� ������������� ���������� �������� � <a href="/solutions/automation/intellectual_building/lighting_system/" title="������� ��������� � ���������� ���������� �� �������� �level �������">����������� ����������</a>;</li>
				<li>��������-������ ������������: ������ �������, �������� ��������� � ��������� ������, �������� ������� ���������;</li>
				<li>��������� ��������� ���������� � ����������� ������� ��� ������������ �����������;</li>
				<li>����������� ���������� � ������� PMS (Property Management System).</li>
			</ul>
		</div>
		<p class="sug_justext">
			������������ ������ ������� ������������� ��������� �������� <a href="/solutions/automation/hotel_management_system/numbers_management_system/" title="������� ���������� ��������">������� ���������� ��������</a>
		</p>
		<div class="sug_blue">
			�� ����� ���� ������������� ������ �������� ������. ��� �������, ����������� ����� ���������, ����������� �� �������� ��������� �������� �� ������� �������������� ������������ � �����, ��� My Home �� Bticino ��� ������� ������������� ����������� ������� YESINN �������� INNTECH Co. Ltd
		</div>
		<div class="sug_below">
			���������� �������, ����������� ���������� ������������ ����������� �������<br/> � ����������� �������
			
			<p>���� ������������� ������� �� ������������� ��������:</p>
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img01.png" alt=""/>
				Barvikha Luxury Village Hotel & SPA
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img02.png" alt=""/>
				Lotte Plaza
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img03.png" alt=""/>
				Holiday Inn Sokolniki
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/sug-img04.png" alt=""/>
				Baltschug Kempinski
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
					<p>��������� � ���������� ������ <br>��� ������ ������ ��� ��������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					<!--<div class="b-top-link-wrp1">
						<div class="toplink1">
							<img src="/solutions/electroboards/panel_lighting/img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
						</div>						
						<div class="toplink2">
							<img src="/solutions/electroboards/panel_lighting/img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->  
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
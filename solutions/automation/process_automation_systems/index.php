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
<div class="b-centered b-promo clearfix">

		<h1>������� ������������ ����������</h1>

		
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
			��� ����������� ������ �������� ���������� � ������ ����������� ����� ����������� ���������� ����������� ����� �������������� ��������� ����������� <span>������������ ������ �������������</span>
		</div>
		<div class="sug_grey">
			<div>���������� �������� ���� �������� ������������ ������������� ������ ������������� � ��������������, ����� ������, ��������� �� ���������� ����������� � ������������ �������:</div>
			<ul>
				<li>���������� ������� � ����������� �������� �������� �� ���� ������������� ��������������� ���������;</li>
				<li>��������������� ������ � ��������� ����� ������������ ������������;</li>
				<li>��������� ������������� � ������������ ������������;</li>
				<li>����������������;</li>
				<li>�������� ����������� ���������������� ���������.</li>
			</ul>
		</div>
		<div class="sug_blue">
			�� ����� ������� ���� ������ �� �������� � ��������� ��������� ������ ������������ ������������� ��� �������� ������� ������ � �� ����������� ����������� ��� ��������� ������-�������� �� ��������� ���������������� ����������.
		</div>
		<div class="spa_orange">
			<p>� ����� �������� ������������� ���� �������� ����� � ������� ������������ ����������:</p>
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spaorange01.png" alt=""/><br/>
				�������������� ������ �������������, � ��� ����� ��� ����������� � ������� ��������� ������������
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spaorange03.png" alt=""/><br/>
				������������ <br/>������������������ ������������� �� ������� ��������������
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spaorange02.png" alt=""/><br/>
				������, �����-���������� ������ � ��������� ������������
			</div>
		</div>
		<div class="sug_below">
			<p>���� ������������� �������:</p>
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img01.png" alt=""/>
				���������������� �������� �������������
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img02.png" alt=""/>
				����� �������� �VEKA-RUS�
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img03.png" alt=""/>
				����� Nexans
			</div>			
			<div>
				<img src="/solutions/electroboards/panel_lighting/img/spa-img04.png" alt=""/>
				���������� ������������� ��������
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
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
					</div>						
					
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/solutions/electroboards/panel_lighting/img/pic5a.gif" alt=""></a>
					</div>
					
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->  
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
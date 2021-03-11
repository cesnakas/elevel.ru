<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "������ ����� ���, Elevel - ��������� ����������������� ��������� ������");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� ������ �� ������� ���. �� ���������� ������ ��� �� �������� ��������");
$APPLICATION->SetPageProperty("tags", "���, ����������������� ��������� �������, ��������� �������, ������, ������ ��������� �������, ������������� ��������� �������, ���������������� ��������� �������");
$APPLICATION->SetPageProperty("keywords", "������ ���, ���");
$APPLICATION->SetTitle("���");
?>
<div class="b-centered b-promo clearfix">
		<h1>����������������� ��������� �������  (���)</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left">
				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "left-menu-sol",
                    Array(
                         "ROOT_MENU_TYPE" => "TOP_MENU_FOOTER_SUBMENU", 
                         "MAX_LEVEL" => "2", 
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
			<div class="avr_descr review">
				����������������� ��������� ������� (���) � <span>��� �������� ���������� ������������, ������������ ������� �������� ������, ������, �����-, �����- � ������ �������� � �������� ��������� ���� ��� ���� �����������.</span>
				<p>������� ���������� ��� � ����������� ��������� ������������� �� �������� �������������� ������ � �������� ����������� ��� ����������� �������� �� ������ ���� �������� ����� ����������� ��������, ���������� �� ���� �������� ���� � ������������� ������������� ������������.</p>
			</div>
		</div><!--.b-row__first-->
		<div class="t_sks_cheme">
			����� ���
			<img src="/bitrix/templates/wt-elevel/images/sks.jpg" alt=""/>
		</div>
		<div class="t_sks">
			����� ������ ��������� ������� ������������ ��� �������� ���������������� �������������� ������ ������������� � ���������� ��������������� �������������, ���������� ���������� ����, ������ ����������, ��������� � ������������� ����������� � ��. ��� ������������ ������������� ����������� ������ � ����������� ������ ������������, � ����� ������ ������ ������������ ����������.
			
			<p>����������������� ��������� ������� �������� ������ <br/>��������� ������ ��������������� ����������� ������ �� ���������� ���������:</p>			
			<ul>
				<li><a href="/solutions/automation/intellectual_building/lan/" title="">��������� ���������������� ���� (���)</a></li>
				<li><a href="/solutions/automation/intellectual_building/phone_etwork/" title="">���������� ����</a></li>
				<li><a href="/solutions/automation/intellectual_building/rapid_communication/" title="">������� ����������� ����� �������������� ���������</a></li>
				<li><a href="/solutions/automation/intellectual_building/tv/" title="">����������� � ������� �����������</a></li>
			</ul>
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
							<img src="/bitrix/templates/wt-elevel/images/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/bitrix/templates/wt-elevel/images/pic5a.gif" alt=""></a>
						</div>						
						<div class="toplink2">
							<img src="/bitrix/templates/wt-elevel/images/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/bitrix/templates/wt-elevel/images/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "������� �������� ������������, ������� ��������, ������� ������������, �������� ������������, ������� ������, ������� ��������, ��������� ������, �������� �������������");
$APPLICATION->SetPageProperty("keywords", "������� �������� ������������, ������� ��������, ������� ������������, �������� ������������, ������� ������, ������� ��������, ��������� ������, �������� �������������");
$APPLICATION->SetTitle("������� �������� ������������ ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div id="container">
	<div class="b-centered solutions-box clearfix">

		<h1>������� �������� ������������</h1>

		
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
			<div class="b-pull-right s01 b-form b-promo " id="bottom_form">
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
                �������������� ������ ������������ ������� ������� <span> ������������� ������������ ������� �������, ������� ������������������ ���� � ����</span>
                <p>�� ��� ���� ��� ��������������� ����������� 100% ����������� � ������������ �������</p>
            </div>
		</div><!--.b-row__first-->

        <div class="col-xs-12 text-center coc_img">
            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_01.jpg" alt="">
        </div>
        <div class="col-xs-12  lc_orange">
            ��� ������ ������� ����������� ����� ���������� ������ �� ���������� �������������. ��� ������� ���� ������ ��������� ����������� ������ � ���������� ������ ���������� � ������ ������������ ����������� �������. �� �������� � ������ ������������� � �������� ������ �������� ������������, ����������� �������� ����������� ��������� ����������� ������������ ��������� � ����������� ���������. ���� ������� ��������� ���������� ��� ���������� ��������, ��� ��������� �������������� �������, � ��������� ��������� �� ������������ ��������.
        </div>
        <div class="coc_list row">
            <div class="coc_icons">
                <div class=" col-xs-12 coc_line">
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_02.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/intellectual_building/access_control_system/" title="">������� �������� �������</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_03.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/smart_house/alarm_system/" title="">������� �������� ������������</a>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class=" col-xs-12 coc_line">
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_04.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/intellectual_building/lighting_protection/" title="">������� ������������</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/coc_05.png" alt="" class="pull-left"/>
                            <div class="coc_list_link">
                                 <a href="/solutions/automation/smart_house/video_system/" title="">������� ���������������</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 coc_grey">
            <div class="text-center">
                <h2>������� ��������� �� ������� ������ ����������� ������� ������������</h2>
            </div>
            <div class="coc_ul">
                <ul>
                    <li><strong>���������� ���������</strong> ������� �������������������� ������������� �� ���������� ����������</li>
                    <li><strong>����������� ����������</strong> (��������� ������, ��������� ��������������, �������� ��������� � �������������� �������� �����)</li>
                    <li><strong>������������ ������</strong> �� ��������� � ������ �������������� ��������� ������������� � 
    ������������, ������ ���������� ���������� � ������; ��������� �������� �������
    (����� ��������� ������������ ��� ������� �������������)</li>
                    <li><strong>����������� � ���������</strong> ���������� � ���������� ��������� (�������� ����, ����� � ������� �������������������� �������������)</li>
                </ul>
            </div>
        </div>

		<div class="b-row b-row__last clearfix b-promo ">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">��������</h3>
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
							<img src="img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="img/pic5a.gif" alt=""></a>
						</div>
						
						<div class="toplink2">
							<img src="img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="img/pic5a.gif" alt=""></a>
						</div>
					</div>-->

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
    </div><!--.b-promo-->
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
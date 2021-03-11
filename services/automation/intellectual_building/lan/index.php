<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "���, �������������� ���, ��������� ���������������� ����, ������ ���, ������ ������������ �����");
$APPLICATION->SetPageProperty("keywords", "���, �������������� ���, ��������� ���������������� ����, ������ ���, ������ ������������ �����");
$APPLICATION->SetTitle("���");
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

		<h1>��������� �������������� ���� (���)</h1>

		
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
               <span>��� ��� (LAN) �</span> ��� ���������� ����������� ��������� ����������� <span>(������� �������) � ������ �������� ������. ��� �������� � ���� ��������� ���� (���), �������� ������� ������������ � ���������� ���������� ����������.</span>
            </div>
		</div><!--.b-row__first-->

         <div class="lvc_blue col-xs-12">
            <div class="col-xs-3 col-sm-2 col-md-2 text-center">
                <img src="/solutions/automation/intellectual_building/information_system/img/lvc01.png" alt="">
            </div>
            <div class="col-xs-9 col-sm-10 col-md-10">
                � ����������� ���� ����������� ����� ����������� ���������� � ��������� ��������� �������������� ���� (���) � �� ���������, ������������ ��������� ��������� ����� �� �������, ������������� ����� �������� ������. ��� ������� ������������ � ������� ������ ����������� ����� �������������� ���� � ����������� ������������� �������������� � ���������-����������� ��������, � ��� �������  � ���������� ����������� ���.
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <img src="/solutions/automation/intellectual_building/information_system/img/lvc02.jpg" alt="" class="lvc_img">
        </div>
        <div class="col-xs-12 lvc_grey">
            <div class="text-center">
                <h2>������������ �������� ��� ��������</h2>
            </div>
            <ul>
                <li><p><strong>���������� ��������������</strong> � ���������������� ������������ ������ ���</p></li>
                <li><p><strong>����������� ����������� ������������� ����������� �������</strong>, ����������� ������ � ������������ ����������� 
� ���������� ������, ���������, ��������, ������ � ��.</p></li>
                <li><p><strong>���������������� ���������� �����</strong>, ����������� ������� ������ ����� � ��������� ������ (� �������, ���������������� ����������� �� ��� ������ �� ����������� ����)</p></li>
                <li><p><strong>�������������� ���������� ������</strong> � ������������� ��� ������ ���������� ������������� ���</p></li>
                <li><p><strong>�����������</strong> �������� ������ ����</p></li>
                <li><p><strong>����������� ������������� �������</strong> ���������� ������ � ������������ (����������� �����, ����������� ���������������, ��� � ����������, �������� � ��.)</p></li>
            </ul>
        </div>
        <div class="insu_orange col-xs-12">
            <div class="insu_box">
                <div class="text-center">
                    <h3>��������� �������������� ���� (���) �������� ������������ ������ ��������� ������ ��������������� ����������� ������ �� ���������� ���������:</h3>
                </div>
                <ul>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_02.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/tv/">����������� � ������� <br/>�����������</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_03.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/sks/">���</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_04.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/rapid_communication/">������� ����������� <br/>����� ��������������<br/>���������</a>
                        </div>
                    </li>
                    <li>
                        <img src="/solutions/automation/intellectual_building/information_system/img/insu_05.png" alt="">
                        <div class="col-xs-12">
                            <a href="/solutions/automation/intellectual_building/phone_etwork/">����������<br/>����</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xs-12 lvc_last">
            <div class="col-xs-2 col-sm-1 col-md-2 text-center"><img src="/solutions/automation/intellectual_building/information_system/img/lvc02.png" alt=""></div>
            <div class="col-xs-10 ">
                ��������� ��, ��� �� ��������������� � �������� ���  ���������� ���������� � ��������������, ��������� ������ ��������� ����������� �������������� <strong>���� ������ ���������� ����������� ������</strong>, � ����� ������������� ��������������, ������������ �������� � ������ �����������. ����������� ����� �������� ������� ���������� ����������� ������� ����, ����������� � ����������� ��� ������ ������ � ������� ������������ �� ����������� ���.
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
							<img src="/solutions/automation/intellectual_building/information_system/img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/solutions/automation/intellectual_building/information_system/img/pic5a.gif" alt=""></a>
						</div>						
						<div class="toplink2">
							<img src="/solutions/automation/intellectual_building/information_system/img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/solutions/automation/intellectual_building/information_system/img/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
    </div><!--.b-promo-->
	</div><!--.b-promo-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
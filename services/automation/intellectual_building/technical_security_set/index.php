<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�������� ����������� ������� ������������, ������� �������� �������, ������� ���������������, ������� �������� ������������, ������� �������� ������������, ������������ ����������������� ������, ������� ������������ ������, ������� �������-�������� ������������, ������� ������������ ����������������� ������, �������������� �������� ������������, ��������� ���������� � ������, �������������� �������������");
$APPLICATION->SetPageProperty("keywords", "�������� ����������� ������� ������������, ������� �������� �������, ������� ���������������, ������� �������� ������������, ������� �������� ������������, ������������ ����������������� ������, ������� ������������ ������, ������� �������-�������� ������������, ������� ������������ ����������������� ������, �������������� �������� ������������, ��������� ���������� � ������, �������������� �������������");
$APPLICATION->SetTitle("�������� ����������� ������� ������������ ");
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

		<h1>�������� ����������� ������� ������������</h1>

		
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
                ������ ����������� ������������ ������� <span>��������� ����� ��� �������� � ������������� �����, ���������� ������ ������������ � ����������� � ���������������������� ���������� � ���������� �� ���������������� ��������</span>
                <p>���� ������������ ��������, ������������ ��������� �������� �����, ����������� ��������� � ���������� ����������� ������ � ������������, ������ ������� � ����� �������� �������� � �������������� � ���������� ������ ������������ ���������� � � ��������� �������������
            </div>
		</div><!--.b-row__first-->

        <div class="col-xs-12 text-center">
            <img src="/solutions/automation/intellectual_building/technical_security_set/img/kompleks-k-s-b.jpg" alt="" class="kompleksimg"/>
        </div>
            <div class="kom_tex_text">
                ����������� ����� �������� ������ ������������� ��������� ��� ��� ���� ������� ������������, ����� ��� ���� ��������� � ����������� ���������� ��� ����������� �������, ��������� ����������� ���������� � �������� �������, ��t�������� �������������� ������������ ������ � ��� ����������
            </div>
            <div class="kom_tex_center">
                <div class="kom_tex_title">
                    <h2>� �������� ����������� ������� ������������ ������:</h2>
                </div>
                <ul class="kom_tex_ul">
                    <li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">������� �������� �������</a></li>
                    <li><a href="/solutions/automation/intellectual_building/video_control/" title="">������� ���������������</a></li>
                    <li><a href="/solutions/automation/intellectual_building/fire_alarm/" title="">������� �������� ������������</a></li>
                    <li><a href="/solutions/automation/intellectual_building/alarm_system/" title="">������� �������� ������������</a></li>
                    <li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">������� ������������</a></li>
                </ul>
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
					<div class="b-top-link-wrp1">
						
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
    </div><!--.b-promo-->
	</div><!--.b-promo-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
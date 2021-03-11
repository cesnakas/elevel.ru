<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "������� �������� ������������, ������� ����, ������� �������������, ������ �����������, ����������, �������� ������������, �������� ����������");
$APPLICATION->SetPageProperty("keywords", "������� �������� ������������, ������� ����, ������� �������������, ������ �����������, ����������, �������� ������������, �������� ����������");
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
	<div class="b-centered   solutions-box clearfix">
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
			<div class="b-pull-right s01 b-form b-promo" id="bottom_form">
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
            <div class="avr_descr review s02">
                <span>������ �������, ��� ����� <br/></span>� ��� ������������ ������� � ����������� �������������.<span>
                �� ������� ��� �������� � � ���������� ������� �������� ������������ ������������ ���������� ���� ��������� �� ��������� ��������, � ����� �� �������� � ����������������� ������� ���������.</span>
            </div>
		</div><!--.b-row__first-->

        <div class="t_against_fire01 col-xs-12">
            <div class="col-xs-12">
                <h2>��� ������� ������ ���������� � �������������� ���������� ������������� ������� ������������� ��������, ������� � ����������� ����</h2>
                ������� �������� ������������ �������� ������������ ������ ���������  ����������� ������� ������������ ������ �� ���������� ���������:
            </div>
                <div class="col-xs-12">
                    <div class="centerpage">
                        <ul>
                            <li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">������� �������� �������</a></li>
                            <li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">������� ������������</a></li>
                        </ul>                   
                        <ul>
                            <li><a href="/solutions/automation/smart_house/video_system/" title="">������� ���������������</a></li>
                            <li><a href="/solutions/automation/smart_house/alarm_system/" title="">������� �������� ������������</a></li>
                        </ul>
                    </div>
                </div>
                <img src="/solutions/automation/intellectual_building/technical_security_set/img/against_fire.jpg" alt="" class="against_fire_img"/>
                <div class="text-center">
                    <div class="t_against_fire_title">
                        �������� ������������ �������:
                    </div>
                </div>
        </div>
        <div class="t_against_fire02 col-xs-12">

                <div>
                    <p>
                        ������ ����������� ������ ���������� � ���������� (������� �����������, ���� � ��.)
                    </p>
                </div>              
                <div>
                    <p>
                        ������������ ������ �� ��������� � ������ �������������� ��������� ������������� � ������������, ������ ���������� ���������� � ������
                    </p>
                </div>              
                <div>
                    <p>
                        ����������� ���������� (��������� ������, ��������� ��������������, �������� ��������� � �������������� �������� �����); � ������� ������ ������� ���������� ����� �������������� ����� ��� �������� ������� 
                    </p>
                </div>              
                <div>
                    <p>
                        ����������� � ��������� ���������� � ���������� ��������� (�������� ����, ����� � ������� 
�������������������� �������������, ������������� ������)
                    </p>
                </div>              
                <div>
                    <p>
                        ����� ��������� ��� ���������� ��������� ��� ������������� ��������� (����� ��������������� ������� ����������, ������ ������ � ��.)
                    </p>
                </div>
        </div>
		<div class="b-row b-row__last clearfix">
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
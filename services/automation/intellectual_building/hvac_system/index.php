<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "������� ���������, ������� ��������� ������, ������������������ ������� ���������, ������� ���������� ����������, ���� ���������� �������� ���������, ����� ���������, ������������� ���������� ����������, ���������� ���������, ���������, ������� �����������, ������� ����������, ������� ���������� � �����������������, ���������� � ����������������� �������, ���������� �����������, ������� ���������� �����������, ������������������ ������� ���������� �����������, ������������� ����������, ������������� ������ ����������, ������������� ���������� � �����������������, ������������� ������ �����������������, ������������� �����������������, ������� ���������� � �����������������, ���������� ����������� � ������������������, ���������� � ����������������� � ����� ����, ���������� ������������ ��� ����������, ����������� ���������, ����������� ������, ���������, ������� �����������, ������� ���������");
$APPLICATION->SetPageProperty("keywords", "������� ���������, ������� ��������� ������, ������������������ ������� ���������, ������� ���������� ����������, ���� ���������� �������� ���������, ����� ���������, ������������� ���������� ����������, ���������� ���������, ���������, ������� �����������, ������� ����������, ������� ���������� � �����������������, ���������� � ����������������� �������, ���������� �����������, ������� ���������� �����������, ������������������ ������� ���������� �����������, ������������� ����������, ������������� ������ ����������, ������������� ���������� � �����������������, ������������� ������ �����������������, ������������� �����������������, ������� ���������� � �����������������, ���������� ����������� � ������������������, ���������� � ����������������� � ����� ����, ���������� ������������ ��� ����������, ����������� ���������, ����������� ������, ���������, ������� �����������, ������� ���������");
$APPLICATION->SetTitle("������� ���������, ���������� � ����������������� ������� ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div id="container">
	<div class="b-centered  solutions-box clearfix">

		<h1>������� ���������, ���������� � ����������������� �������</h1>

		
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
                �� ������ ���� ������� � ����������  <span> � ���������� ������� ��������� ���������� ������� ������ � ������, � ����� ������� ���� ������ ������������ � ��� ��������������, ��� ������� ���</span> �������������� ������������� ������
            </div>
		</div><!--.b-row__first-->

        <div class="vent_orange col-xs-12">
                <div class="col-xs-2  col-sm-1 col-md-1 col-lg-1 text-center"><img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_01.png" alt=""></div>
                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11 ">
                    ���������, ���������� � ����������������� ������� � ������ ��������� ��������� ������ ����������������, ��� ������� ���������� ���������������� ������ ������������ ������. 
                    � ������ ��������� ������������� ��������� ����� ��������� �������� � ���������������� ��������� �������������� ������������ �� ������� ������ ��������.
                </div>
        </div>
        <div class="col-xs-12 text-center vent_img">
            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_02.png" alt="">
        </div>

        <div class="col-xs-12 vent_txt">
            �� ���������� ����������� � <strong>���������������� ����������� ������ �������������</strong> ���������, ���������� � ����������������� ����� ������������ � ��������� ���������. ��������� � �������� ������ ����� ������� ��������� ��������������� �� ������ ���������������� ������������, �� � ������������� ���, ��� ������� ��������������� � �������� ������ ���������. ���� �����������, ������ ����������� ������� � ���� ���������, ����������� ��� ������� <strong>(���������, ������� ��� �������)</strong> � �������� ��������������, ���������� ����������� ����� ������� ��� ������� ������� � �������� ����������� ������������, ��������������� ���� ��������� � ����������� ����������. � ������ ������������ � ������������ ������� �� ��������� ����������� ����� ���������� ������� ������� � �����������������, ����������� ������������ ����������� ��� ��������� � ����������� �������������.
        </div>

        <div class="vent_orange col-xs-12">
            <div class="text-center">
                <h2>����������� ������� ���������, ���������� � ����������������� �������:</h2>
            </div>
                <div class="text-center">
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_03.png" alt="">    
                        </div>
                        <strong>������-��������</strong> � ���������������� ��������� �����������, ������ ��������� � ���������
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_04.png" alt="">    
                        </div>
                        <strong>��������� ������������</strong> � ����������� ����������;
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_05.png" alt="">    
                        </div>
                        <strong>������������� ����������</strong> ��������, � ��� ����� � ���������� ����������;
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_06.png" alt="">    
                        </div>
                        <strong>����������</strong> ���������� ������� � �������������� �������������;
                    </div>                    
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_07.png" alt="">    
                        </div>
                        <strong>��������� ������������</strong> 
                        � ������ ������� ������� 
                        (����� �����, ����� � ��.);
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_08.png" alt="">    
                        </div>
                        <strong>�������</strong>, ������������, ��������� �������;
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_09.png" alt="">    
                        </div>
                        <strong>������������</strong> ������ ��������� ������ � ������������ ����� ��� ������ (��������� ������ ����, ���������� ����������� � ����������� �� ����������� � ��������� � ��.);
                    </div>
                    <div class="vent-box col-xs-4 col-sm-4 col-md-4 col-lg-3">
                        <div>
                            <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_10.png" alt="">    
                        </div>
                        <strong>��������</strong> ��������� ��������
                    </div>
                </div>
        </div>
           <div class="lc_list">
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_12.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/ups/" title="">������� ���������������� �������������� ���������������� (������������ ���������)</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_11.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/lighting_system/" title="">������� ��������� � ���������� ����������</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_13.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/elevator_system/" title="">������� �������� � ���������� �������, ������������</a>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-xs-2 text-right">
                        <img src="/solutions/automation/intellectual_building/alarm_system/img/ventilation_14.png" alt="">
                    </div>
                    <div class="col-xs-9 lc_list_link">
                        <a href="/solutions/automation/intellectual_building/accounting_system/" title="">������� ����� ��������������� (�����, �����)</a>
                    </div>
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
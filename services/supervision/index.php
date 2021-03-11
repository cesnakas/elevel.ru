<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� ������ ������������ � ���������� �������");
$APPLICATION->SetPageProperty("tags", "����������� ������, ��������� ������, ������� ������������ �������, ������� ���������� �������, ������ �� ��������, ����������� � ��������� ������, �������� �� ��������, �������� ���������� �������");
$APPLICATION->SetPageProperty("keywords", "����������� � ��������� ������");
$APPLICATION->SetTitle("����������� � ��������� ������ ");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>����������� � ��������� ������</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
				<?$APPLICATION->IncludeComponent(
				    "bitrix:menu",
				    "left-menu",
				    Array(
				        "ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
				        "MENU_CACHE_TYPE" => "N",
				        "MENU_CACHE_TIME" => "3600",
				        "MENU_CACHE_USE_GROUPS" => "Y",
				        "MENU_CACHE_GET_VARS" => array(),
				        "MAX_LEVEL" => "1",
				        "CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
				        "USE_EXT" => "N",
				        "DELAY" => "N",
				        "ALLOW_MULTI_SELECT" => "N"
				    )
				);?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // �������� ��������� ���
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "44",    // ID ���-�����
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
				<p>�� ���� ���������� ��� ������ �� ������������� ������������ � ���������� ������� �� ��������. ���� ����������� �������� �������� � ���������� ������������ �����, ��������������� ������������ ������������ ����� ��������� ��������, ���������� ������ �������������� (����������) ��������� ������������, �������� ������������ �� ������������ � ����� ���� ������� � ������������ � ����������� ���������.</p>
				<div class="pic"><img src="/services/supervision/img/el-avtzabavnikov.png"></div>
				<div class="name">�������� ����������<br><span>(�������� ����������� "�������")</span></div>
			</div>
		</div><!--.b-row__first-->
		<div class="t_orange t_boldtext">
			��������� � ����������� ������ ����������, ���� �� ������ ���� ������� � �������� ���������� � �������� ������� �������� ��� ���������� ����� �� �������
		</div>
		<div class="tz-center">
			<div class="t_nadzbox">
				<img src="/services/supervision/img/nadzimg2.png" alt=""/>
				<p>��������� ������</p>
				<div>
					��� �������� ����������� ������ � ������ ���������� �������, ������������� ���������������. ��� ��������� ������� ����� ���������� ����� ���������� ����� ������� � ������������ ����������� � ��������������� ����� �������.
				</div>
			</div>
			<div class="t_nadzbox">
				<img src="/services/supervision/img/nadzimg.png" alt=""/>
				<p>����������� ������</p>
				<div>
					��� ����� �������� ���������-����������� �����. ������� ���������� ������ ������ ���������� ����������� ��� ����������� ������� ���������, ������, ������� �, ����������, �������� ������������ �����.
				</div>		
			</div>
		</div>
		<div class="t_elektrotitle t_center">
			��������� � ����������� ������ ������������ ���������� ��������� <br/>������� ��� <span>�������� ��� ����������� �������</span>, � ����� ������� ����<br/> �������� � ������������ � ����������� ���������.
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">�������� ������</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
					<div id="bottom_form">
					<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
	                        "SEF_MODE" => "N",    // �������� ��������� ���
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "44",    // ID ���-�����
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
	                </div>
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>��������� � ���������� <br>��� ������ ������ ��� ��������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/services/supervision/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/services/supervision/img/pic5a.gif" alt=""></a>
					</div>
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("���� ���������� (��) � ���������� (��)");
?> 
<script>
	(function($) {
	$(function() {
		$('select.stylize').selectbox();
	})
	})(jQuery)
</script>
<div class="b-centered b-promo clearfix">
		<h1>���� ���������� (��) � ���������� (��)</h1>	
		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "left-menu", array(
	"ROOT_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "TOP_MENU_1_SUBMENU",
	"USE_EXT" => "N",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
			</div>			
			<div class="b-pull-right s01 b-form" id="bottom_form">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // �������� ��������� ���
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "7",    // ID ���-�����
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
				������� ������������ ���������� � ���������� <span>������������� ��� ���������������� ������ ������������� - ���������, ��������� � ����������, �������� � ��.</span>
				<p>���� ���������� (��) ������������ ��� ������������� ������ ����������� ���������� ������ ������.
���� ���������� (��) ����������� � ���������, ����� �� ���������������� ������ �������� ������������������� �����������.</p>
			</div>
		</div><!--.b-row__first-->

	<div class="avr_title">
		� ����������� �� ������������ ����������� ������� ����������� ����� ��������� ��������� �������:
	</div>
	<ul class="avrul">
		<li>����������� ��������������� � ������������� ������ ������ �� ������� ������������� ���������;</li>
		<li>�������� ��������� ������������ � �������� (��������, ���������, ������������ � ��.);</li>		
		<li>���������� �������� ������������ ��� �������������� ��������� ��������;</li>
		<li>���������� � �������������� ������ � ������������ � ��������� �����������, ���� � ������ ������.</li>
	</ul>

	<div class="avrcontainer">
		<img src="/solutions/electroboards/main_switchboard/img/shusha.png" alt=""/>
		<div class="shusharyellow">
			� ����� �������� ����� �������� ���� �� � �� �� �������������� � ������� ����� � ��������� ���������� � ������� �������� � ���������� ������������� ������� � �������� ��� ���������. ������������ ������������� ������� �� �������������� �������� ����������� � ������������ ����������� �������.
		</div>		
	</div>	
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">��������</h3>
				<div class="b-pull-left b-form" id="bottom_form">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // �������� ��������� ���
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "7",    // ID ���-�����
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
					<p>��������� � ���������� <br>��� ������ ������ ��� ��������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;" class="pp-callback" href="#">�������� ������<img alt="" src="/img/pic5a.gif"></a>
					</div>
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;" class="pp-sendquery" href="#">��������� �����c<img alt="" src="/img/pic5a.gif"></a>
					</div>

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
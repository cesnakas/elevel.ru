<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "��������� ������� �������� | �level");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� �������������� � ���������� ��������� ������ ��������");
$APPLICATION->SetPageProperty("tags", "������ ��������, ������� ���������� ��������, ��������� ������� �������� ������, ��������� ������� �������� �������������, ��������� ������� �������� � ���������, ��������� ������� �������� ����, ������ ���, ������� ��������, ������� �������� ����, ������� �������� ���������, ������� �������� �����, ������� ����������, ������� ����, ������� ����, ������� ��������, ������� ������� ������, �������� �������, ������� ������, ��������������, �������������� ������, �������� ������");
$APPLICATION->SetPageProperty("keywords", "��������� �������, ��������� ������� ��������, ��������� ������� �������");
$APPLICATION->SetTitle("������� ���������� �������� ");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix solutions-box">
		<h1>������� ���������� ��������</h1>		
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
                    "WEB_FORM_ID" => "77",    // ID ���-�����
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
				<p>���������������� ������, ����������� ������������ ���� � �������������� � �������� ��������������� ��������� ���  ���������� ����� �������� ����������� ������ � ������� ����� ���������� �������� ����� ���������.</p>
				<div class="pic"><img src="/solutions/cable_systems/img/sko-sushkov.png"></div>
				<div class="name">������ �������<br><span>(������� �������� ���)</span></div>
			</div>
		</div><!--.b-row__first-->
		<div class="t_sikabob01">
			�� ������ ������ ���������� ��� �������, ����������� �������� �������� � ���������������� � �������� ��������� �������� � �����
		</div>
		<div class="t_sikabob02">
			������������� ������ ���������� �������� � ��� ������ ���, <br/>��������� �������� ��� ������ ���������� �������� �� �������� ������� � ������ ������� ��������
		</div>		
		<div class="t_sikabob03">
			���� ������� ������� �������� ����������� ��-�� ��������� �������� � ������� ���� �� ������, �� �������� ��������� ����� �� ����� � ������� ����� ��� � ����
		</div>
		<div class="t_avgreyline">
			<div class="t_avtitle t_sikabob04">
				������� ���������� �������� �������� ���� ������������� � �������������� ��� ������������� �� ������������ � ���������������� ��������:
			</div>
			<ul class="t_sikabob05">
				<li>������ �� ����������� ����� ����������� �����;</li>
				<li>������� �������� � �������� ��������� (��������� ������� ������);</li>
				<li>���������� ���������� ������ ��� ����� � ������ ������;</li>
				<li>��������� �������� �������, ���������� �����;</li>
				<li>������� ������ ������� �� ������� ������.</li>
			</ul>
		</div>
		<div class="t_sikabob06">
			�� ���������� ��, ��� ����� ���������� �������� � ������ ������� � ���� ������������� ������� ������� ����������� � ������� ������� ����������� ������������� ���, <br/>����������� ������ ������� �������� � ������� �������������� ������
		</div>		
		<div class="t_sikabob07">
			������� ����������� � ������� ������������������� ������������, ����������� ������������� ����������, �� �������� ���������� ����������� � � ������ <br/>������������ ����������� �������������������. ����� �������� �� �������������� �� <br/>�������� ������� ������ ���������� ������� ����������� ����� ��������, ������� ��������������� ������������
		</div>
		<div class="t_sikabob08">
			<p>�������� ���� ������ ���������� ��������:</p>
			<ul>
				<li><a href="/solutions/cable_systems/warm_floor/" title="">������ ���</a>;</li>
				<li><a href="/solutions/cable_systems/heating_gutters_roofs/" title="">������� ���������� � ����</a>;</li>
				<li><a href="/solutions/cable_systems/heating_outdoor/" title="">������� �������� ��������</a>;</li>
				<li><a href="/solutions/cable_systems/floor_freezers/" title="">������� ����� ����������� �����</a>;</li>
				<li><a href="/solutions/cable_systems/lawn_football_fields/" title="">������� ������� ���������� �����</a>.</li>
			</ul>
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">�������� ������� ��������</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // �������� ��������� ���
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "77",    // ID ���-�����
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
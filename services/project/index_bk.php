<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "�������������� ������ �������������, �������������� ���������� ������, ��������� ������������, �������������� ���������� ���������� ������ ������, �������������� ����������������, �������������� ������ ����, �������������� ����������������� ������, �������������� ����������������, �������������� ���������������, �������������� ������ ���������������, �������������� ���, �������������� ���������, �������������� ������ ���������, �������������� ��������, �������������� ������ ��������, �������������� ������� ����, �������������� ���, �������������� ���, �������������� ���, �������������� ���, �������������� ��������� ������, �������������� ���������� ������ �����, �������������� ���������� ������ ������, �������������� ���������� �����, �������������� ���������� �����, �������������� �����������, ������ ������ ����, �������������� ��������� �����, �������������� ������ ���������������, �������������� ���������������, �������������� ����������������� ��������� ������, �������������� ������ ����� ��������������, �������������� �����, �������������� �����, �������������� ���������������� ����������������, �������������� ������������, �������������� ������������ ������, ���������� ��������� ���������, �������������, �������������� ������������, �������������� ������������ ������, �������������� ������ ���������������, �������������� ������� ���������, �������������� ����������� ������");
$APPLICATION->SetPageProperty("keywords", "�������������� ����������������, �������������� ���������� ������, �������������� ������ ����������������, �������������� ���������������� ����, �����������, ������, ���������, ������, ������");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� �������������� ���������������� � ���������� ������.");
$APPLICATION->SetTitle("�������������� ���������������� | �������������� ���������� ������ | �level");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix">

		<h1 class="tz-center">��������������</h1>

		
		<div class="b-row b-row__first clearfix">
			<?/*<div class="b-pull-left">*/?>
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

            <div class="b-pull-right s01 b-form"  id="bottom_form">

                <?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // �������� ��������� ���
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "68",    // ID ���-�����
                    "LIST_URL" => "/sendquery/sended.php",    // �������� �� ������� �����������
                    "EDIT_URL" => "/sendquery/sended.php",    // �������� �������������� ����������
                    "SUCCESS_URL" => "/sendquery/sended.php",    // �������� � ���������� �� �������� ��������
                    "CHAIN_ITEM_TEXT" => "",    // �������� ��������������� ������ � ������������� �������
                    "CHAIN_ITEM_LINK" => "",    // ������ �� �������������� ������ � ������������� �������
                    "IGNORE_CUSTOM_TEMPLATE" => "N",    // ������������ ���� ������
                    "USE_EXTENDED_ERRORS" => "N",    // ������������ ����������� ����� ��������� �� �������
                    "CACHE_TYPE" => "N",    // ��� �����������
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
				<p>�� �������� ���������� ��������� ������������ ������ ����������������, ������������� � ���������������  ��� �������� ������ ������ ���������.</p>
				<div class="pic"><img src="/services/project/img/el-alexeev.png"></div>
				<div class="name">������� ��������<br><span>(������������ ������ ���������� ��������)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="grafic">
			�� ��������� ��������� ������ ��� �������� ������ ������ ��������� � ���������� ����������. ���� ������� ������ � �� ��������� ��������, � �������� �������, ���������� ������������� ���������� � ���������� ����������� ����� � ����� ������������ �����������������.
		</div>
		<div class="wrapdiv">
			<div class="divbox1">
				<p>���� ������ �� ��������������<br/> ������ � ���������� ����������<br/> ����� �������, ���:</p>
				<ul>
					<li><a href="/solutions/electric_power_supply/" title="">������� ����������������</a>;</li>
					<li><a href="/solutions/energy_conservation/" title="">����������������</a>;</li>
					<li><a href="/solutions/lighting_work/" title="">���������</a>;</li>
					<li><a href="/solutions/automation/" title="">������������� � ��������������� ������ (������ ������ ���, ����������������� ������)</a>;</li>
					<li><a href="/solutions/automation/smart_house/multiroom/" title="">���������</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/sks/" title="">����������������� ��������� ���� (���)</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/accounting_system/" title="">������� ����� �������������� (�����, �����)</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/ups/" title="">������� ���������������� ���������������� (���)</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/lighting_protection/" title="">������������</a>;</li>
					<li><a href="/solutions/automation/intellectual_building/access_control_system/" title="">������� �������� ������� � ���������������</a>;</li>
					<li><a href="/solutions/automation/smart_house/alarm_system/" title="">������� �������-�������� ������������</a></li>
				</ul>
			</div>
			<div class="divbox2">
				<p>���� �������� ����� ���������� � ������ ������������ � ������������ �������� ���������� ����������:</p>
				<div class="matter1">
					<p>������������</p>
					<a href="/clients/hotel/" title="">���������</a>, <a href="/clients/trade/" title="">�������-��������������� ���������</a>, ��������� �������� �����, <a href="/clients/trade/" title="">���������������-������� ������</a>, <a href="/clients/iobjects/" title="">���������-��������� �������</a>
				</div>
				<div class="matter2">
					<p>������������</p>
					<a href="/clients/factures/" title="">���������������� ���������</a>, <a href="/clients/factures/" title="">������</a>, <a href="/clients/factures/" title="">���������������� ���������</a> � ��.
				</div>
				<div class="matter3">
					<p>�����</p>
					<a href="/clients/liv/" title="">������� �����</a>, <a href="/clients/liv/" title="">���������� ����</a>
				</div>
			</div>
		</div>
		<div class="wrapdiv2">
			���� ������� ���������� ����������������������� ���������-���������������, ������� ������� ���� � �������������� ���������� ������, ������ ������� �� ������ ������� � ������� �������� � ���������������� ����������� �����.
		</div>
		<div class="bluediv">
			��������������� �������� ���������� ����� ������������ ����������, ���������������� ��� ���������� ����� �� �������������� ���������� ���������� ������ ������ � ����������. ��� ������ ����������� � ������ ������������ � ������� � �����������, ��������� � ��.
		</div>
		
		<div class="b-row b-row__last clearfix">
			
<!-- 			<div class="b-to-first-step">
				<div class="b-title3">�� ��� �� ������ ���� ����� �����...</div>
				<p>�������� ������ ��� ����� ������ � �� �������� <strong>������ 5%</strong> �� ������������</p>
			</div>

			<div class="b-more-bonuses clearfix">
				<h3>��������������<br>������</h3>
				<ul class="b-list-bonuses">
					<li>
						<i class="n-ico ico-portfolio"></i>
						<p>����������� ������� ��� ������-���� � ������������.</p>
					</li>
					<li class="w270">
						<i class="n-ico ico-wallet"></i>
						<p>������ � ����������� �� ��������� �������. </p>
					</li>
				</ul>
			</div> -->

			<div class="b-form-contacts clearfix v2">

				<h3>��������� ������</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
				<!--
                    <form action="/">
					<div class="b-form__row">
						<label for="/">���</label>
						<input type="text" class="inptxt-sty">
					</div>
					<div class="b-form__row">
						<label for="/">E-mail</label>
						<input type="text" class="inptxt-sty">
					</div>
					<div class="b-form__row">
						<label for="/">�������</label>
						<input type="text" class="inptxt-sty">
					</div>
					<div class="b-form__row">
						<label for="/">����� ������</label>
						<select name="/" id="/" class="stylize">
							<option value="/">08:00-09:00</option>
							<option value="/">09:00-10:00</option>
							<option value="/">10:00-11:00</option>
							<option value="/">11:00-12:00</option>
							<option value="/">12:00-13:00</option>
						</select>
					</div>
					<div class="b-form__row b-form__row_btn">
						<input type="submit" value="������� ������ ���" class="btn gradient">
					</div>
				</form>
                    -->
                    <div id="bottom_form">
                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
                        "SEF_MODE" => "N",    // �������� ��������� ���
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "68",    // ID ���-�����
                        "LIST_URL" => "/sendquery/sended.php",    // �������� �� ������� �����������
                        "EDIT_URL" => "/sendquery/sended.php",    // �������� �������������� ����������
                        "SUCCESS_URL" => "/sendquery/sended.php",    // �������� � ���������� �� �������� ��������
                        "CHAIN_ITEM_TEXT" => "",    // �������� ��������������� ������ � ������������� �������
                        "CHAIN_ITEM_LINK" => "",    // ������ �� �������������� ������ � ������������� �������
                        "IGNORE_CUSTOM_TEMPLATE" => "N",    // ������������ ���� ������
                        "USE_EXTENDED_ERRORS" => "N",    // ������������ ����������� ����� ��������� �� �������
                        "CACHE_TYPE" => "N",    // ��� �����������
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
					<p>��������� � ���������� ������ �������������<br>��� ������ ������ ��� ��������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/services/project/img/pic5a.gif" alt=""></a>
					</div>

					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/services/project/img/pic5a.gif" alt=""></a>
					</div>
					
				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
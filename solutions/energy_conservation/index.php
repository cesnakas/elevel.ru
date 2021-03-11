<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "����������������, �������������� ��������� �������, ������� �������������, ��������� �������, ���������������, ����������������, ������� ��������������, ��������� �������������������, ����������������� ����������, ������������, ������� �����������, ������������ �����������, �������������� ���������� �����");
$APPLICATION->SetPageProperty("keywords", "����������������, �������������� ��������� �������, ������� �������������, ��������� �������, ���������������, ����������������, ������� ��������������, ��������� �������������������, ����������������� ����������, ������������, ������� �����������, ������������ �����������, �������������� ���������� �����");
$APPLICATION->SetPageProperty("description", "������� ��������� ������������������� � ���������������� (����������������� �������) � ������� �������� �level �������");
$APPLICATION->SetTitle("������� ���������������� � �������� �level �������");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
	<div class="b-centered b-promo clearfix solutions-box">
		<h1>����������������</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
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
                    "WEB_FORM_ID" => "72",    // ID ���-�����
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
				<p>�� �� ������ �������� ����������� ���������� ��� ��������� �������������������, ��� ��� ���������������� - ��� ������ ������ �� ���������� ��������� �������� � ������ �������!</p>
				<div class="pic"><img src="/solutions/electric_power_supply/img/el-alexeev.png"></div>
				<div class="name">������� ��������<br><span>(������������ ������ ���������� ��������)</span></div>
			</div>
		</div><!--.b-row__first-->

		<div class="t_text">
			<img src="img/t_earth.png" alt="" class="t_earth"/>
			������ � ������ ����� ����� ������ �� ���������� ���������� ������������ �������, ���� ������ � ���� �� ����� �������������� ����� � ����. ����������� ���������������� � ����� ������ �������, ����� ������ ����������� ������������ �������������.<br/><br/>

			������������ ������� ������������ ����� �������� ����������� �����, � ������� � ���������� ����������� � ���������� �������� ������������ ���������� ����������� � ���������� ���������� ���������� ������������ �������. ���������������� ������������ ����������� � �������� ������ ������������� ��� �����������, ������������ �� ���������� ����������������� ��������� ���������, ���������, ���������� � ����������������� �������. ������������ ������� ����������� ���� �� �������� ����������������� � ���������������� ��������.<br/><br/>
			<img src="img/t_arrow.png" alt="" class="t_arrow"/>			
			�������� ����������� ��������� ���������������� �����������, ��������� �������� ������������� <strong>��������� ������������� ������������� �������������� � �������� ���������� �������.</strong>
			<br/><br/>
			�� ���� � ���� �� �������� � ���������� � ������ ����������� ����������������� ���������� � ��� �� ������ ��������� ������������� �����, ��� ��� � ������������� ������ � ������������ ���������� �������� ������� ������� � �������� ��������� �� �������.
			<div class="t_elektrotitle">
				���� �������� <span>������</span> (�level) � <span>����������� ����������� � ����������� ������� ����������������� ������� � �����������������</span>
				<p>��������� ��� � ���������� � ��� ������ ���������� � ������������ ����� ��������, �����������, ��������� <br/>� ���������� ������ � ������� ������������ �����, ����������������������� ������� ������������.</p>
			</div>
		</div>
	<div class="t_greyline">
		<div class="t_wrapdiv1">
			<div class="t_greytitle">�������� ������ ������������� ����������������� ���������� 
			� ��������������:</div>
			<ul class="t_motivi">
				<li>������������ ��������� ����������</li>
				<li>������������� �������</li>
				<li>������� ������������ ����������� ���������</li>
			</ul>
		</div>
	</div>
	<div class="t_greyline">
		<div class="t_wrapdiv1">
			<div class="t_greytitle">���� ������������� ����������������� ����������:</div>
			<ul class="t_motivi">
				<li>��������� ������������� ���������</li>
				<li>��������� ��������������������� ��������� �� �����</li>
				<li>���������� ���������� ������</li>
			</ul>
		</div>
	</div>
		<div class="t_weready">
			<p>�� ������ ����� �� ����</p>
			<div class="t_readyto">�������������� -</div>
			<div class="t_readyto">������������ -</div>
			<div class="t_readyto">�������� ������������ -</div>
			<div class="t_readyto">������ -</div>
			<span>������ ����������������, � ����� �������� �������� ��� ������� ���, ��� � <br/>�������������� ��������� �� ������� ������������ ��������</span>
		</div>
		<div class="t_levels">
			<p>������ ����������������, ������������ ��������� �level:</p>
			<div class="t_level">
				1 ������� � <span>�����</span>
				<div class="t_levelboxwrap">
					<div class="t_levelbox">
						<img src="img/t_esy.png" alt=""/>
						<p>������� ����������� � �������� <strong>Esylux</strong> � ��� �� ������ ����������������, �� ��� � �������.</p>
					</div>
				</div>
			</div>			
			<div class="t_level">
				2 ������� � <span>�������</span>
				<div class="t_levelboxwrap">
					<div class="t_levelbox">
						<img src="img/t_briaton.png" alt=""/>
						<img src="img/t_esy.png" alt=""/>
						<p>������� ����������� � �������� Esylux � ����������������� ������������ �����������<br/> <strong>Briaton</strong> � ���������, ����������� �������� ������������������� � ����. �������������� ���������� ����� ��������� � ������ ����������� �������������� ������������� ����������� ����� �������� ������� �������� �� �������� ������ ��������. ����������� ��� ������������ � ���� � �� ��� ���������</p>
					</div>
				</div>
			</div>			
			<div class="t_level">
				3 ������� � <span>������</span>
				<div class="t_levelboxwrap">
					<div class="t_levelbox">
						<p>���������� ������� I � II � ������������ ��������� ������������� � ��������������� ����������� �������:</p>
						<img src="img/t_levimg01.png" alt=""/>
						<p><span>��������� �������</span> - ��� ��������� ��������� �������, ��������� ������������� ��������� ������� � �������������. ��������� ������� � ���� �� ������������ ������ ���������� ������� �� ������������ ������� ���.</p>
						<img src="img/t_levimg02.png" alt=""/>
						<p><span>��������������� (�������)</span> � ���������, ���������������� ������������ ������� ����� � �������������.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="t_wrapdiv1">
			� �����-��������� ��������������� ���������� ������������ <a href="#" alt=""><strong>����������������</strong></a>, ������������ �<br/> �����������. ���������� ������ ����� ����� ������������ ������ � ����� ������������� ������������� ������ �������������������� ���������
		</div>
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">�������� �������</h3>
				<div class="b-pull-left b-form" id="bottom_form">
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new",
                "formResult_request_submit_form", Array(
                    "SEF_MODE" => "N",    // �������� ��������� ���
                    "AJAX_MODE" => "N",
                    "WEB_FORM_ID" => "72",    // ID ���-�����
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
				</form>
				</div><!--.b-form-->

				<div class="b-pull-right1">
					<p>��������� � ���������� ������ �������������<br>��� ������ ������ ��� ��������:</p>
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
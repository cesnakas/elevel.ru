<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "����������� �������������� ���������, ��������� � ���. ���������� �� �level");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �����������, ��������������, ���������, ���������, ���. ����������, ������������, ������, �������������������, �������������, ��������������, ����������������, ��������, ������������ ���������, ���������, �������������� ����������������, ����� ���, ���������� �������, ������������� ������, ����������������");
$APPLICATION->SetPageProperty("keywords", "�level �������, �level, elevel.ru, �����������, ��������������, ���������, ���������, ���. ����������, ������������ ���������� ������������, ������, �������������������, �������������, ��������������, ����������������, ��������, ������������ ���������, ���������, �������������� ����������������, ����� ���, ���������� �������, ������������� ������, ����������������, ������������� ��������, ���������� ��������� ������������");
$APPLICATION->SetPageProperty("description", "�������������� � �level ��� ���������, ���������, ���. ����������");
$APPLICATION->SetTitle("���������, ���������, ���. ����������");
?>
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>�� ��������? ��������? ���������?<br>������� ����� ��������� ������!</h1>		
		<div class="b-row b-row__first clearfix">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
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
			<div class="b-pull-right s01 b-form"  id="bottom_form">
            
				<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // �������� ��������� ���
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "65",    // ID ���-�����
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
				<p>�� ������� ��������������, ������� ��������� ���: ������ ����, ����������� �������, ������������� � �������� �����, �������������� ������</p>
				<div class="pic"><img src="/img/build-lico.jpg"></div>
				<div class="name">����� ����������<br><span>(�������� �� ������ � �����������)</span></div>
			</div>
		</div><!--.b-row__first-->	
	<div class="blue_txt">
		<div class="ico"><img src="/partners/investors/img/ico.png"></div>
		<div class="item i1"><span class="shark"></span>�������� ������, ����� �� ���������� � � �� �� ������������� �����, ����<br>�������� ������� ������������� ������� ������ �����</div>
		<div class="item i2"><span class="shark"></span>� ����� �������, ��������� ���������� ��� ������ ����� � ������������<br>�������, �� ��� ��� ���������� � ������������� �������?</div>
		<div class="item i3"><span class="shark"></span><span class="orange">� ����� ����� �������, ����� ������ � ��� ��<br
		>������ ���������� �� �������.</span></div>
	</div>
	
	<div class="pic-bl"><img src="/partners/investors/img/ico2.png" align="left" style="margin:0 20px 0;">�� �������, ��� ���� ������� �� ��������� � ��������� �������������� ������. ��� ������������� �������� ��������, ������� ������� ��� �� �������������� �������� � ����� �� ������ ����, ��� �� �������� ������������ �������������� ���������.</div>
	<div class="long_orange">
		<div class="wrapp">
			<div class="title">�� ���������� ���:</div>
			<div class="item1 i01">
				<p>�������<br>���������������� �<br>������������� ������</p>
			</div>
			<div class="item1 i02">
				<p>������� ������<br>���</p>
			</div>
			<div class="item1 i03">
				<p>���������������<br>���������� ������</p>
			</div>
			<div class="item1 i04">
				<p>������� ����������� �<br>��������� ���������<br>������, ������������<br>���������</p>
			</div>
			<div class="item1 i05">
				<p>��������������<br>���� � �����-�����<br>���������</p>
			</div>
			<div class="item1 i06">
				<p>�������<br>��������������� �<br>���������� ��������</p>
			</div>
			<div class="item1 i07">
				<p>������� ����� �<br>�������������<br>��������������</p>
			</div>
		</div>
	</div>
	<div class="pic-bl"><img src="/partners/investors/img/ico3.png" align="left" style="margin:0 20px 0;">���� ���������, ��� ��� ���������� ��� ������, ���������� �� ��� ���. � ������, ���� ��� � �� ������ ������ ����������? ���, �� ������������� � ����� �������, ��� ��-�������� ������� �� ��� �� ����������� � ��������������� ������ ��� ���������� ������?<br><br>

�� �� � ������� ����������� �� ������ ��� �����, ����� �� ������� ������ � ������������, ��� ���������, �������.</div>
	
	<p style="font-size:16px;">�� � ������� ���������� ��������� ����������� ������� ��� ��������, �������� � ��������������� ����������, ������� ��������� � �������, ���������������-������� ������, �������� �����. � �� ����� ������ ������������ ������ ������ �����:</p>
	
	<ul class="ulorange">
		<li><span>��������������</span></li>
		<li><span>������������ ��������������� ������������</span></li>
		<li><span>������������ �������� �������������������� �������� ��������</span></li>
		<li><span>������ � ��������������� ������</span></li>
		<li><span>����������� � ��������� ������������ ������������� ������</span></li>
	</ul>	
	<div class="blue_txt">
		<div class="ico" style="left:100px;"><img src="/partners/investors/img/ico.png"></div>
		<div class="item i1" style="left:50px;"><span class="shark"></span>�������� ������, ����� �� ���������� � � �� �� ������������� �����, ����<br>�������� ������� ������������� ������� ������ �����</div>
	</div>	
		<div class="b-row b-row__examples clearfix">
			<!--<h3 style="font-weight:normal; text-transform:uppercase; margin:40px 0 15px 0;">������������� �������</h3>
			<div class="flexslider slider-example i5">
				<ul class="slides">
					<li>
						<div class="slider-expl__ins clearfix">
							<img src="/partners/investors/img/slide_2.png">
							<div class="txt">
								<div class="header">������ ���� �����, ������</div>
								<p>������������ ������������: <b>ABB</b></p>
								<p class="s18">
									���������: <b>243 350 ���.</b><br>
									����: <b>30 ����</b>
								</p>
								<p><i>��� ������, ����������� � � ����. ��� ��� ����� �������. ������� �� ��������������</i></p>
								<div class="turd">
									<img src="/partners/investors/img/pic2_min.jpg">
									<div class="name">���� ��������</div>
									<div class="post">(�������� ��������)</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-expl__ins clearfix">
							<img src="/partners/investors/img/slide_2.png">
							<div class="txt">
								<div class="header">������ ���� �����, ������</div>
								<p>������������ ������������: <b>ABB</b></p>
								<p class="s18">
									���������: <b>243 350 ���.</b><br>
									����: <b>30 ����</b>
								</p>
								<p><i>��� ������, ����������� � � ����. ��� ��� ����� �������. ������� �� ��������������</i></p>
								<div class="turd">
									<img src="/partners/investors/img/pic2_min.jpg">
									<div class="name">���� ��������</div>
									<div class="post">(�������� ��������)</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>-->

		</div><!--.b-row__examples-->		
		<div class="download">
			<a href="/Presentation_ru.ppt"><span>����� ����������� �������� � �������</span>.ppt (12.3 ��)</a>
			<a href="/upload/pres/elevel_engineer_hotels.ppt"><span>����������� ������� ��� �������� � �������</span>.ppt (12.3 ��)</a>
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
				<h3 style="text-transform:uppercase; font-size:30px;">��������� ������</h3>
				<div class="b-pull-left b-form"  id="bottom_form_2">
					<div id="bottom_form">
					 <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
	                        "SEF_MODE" => "N",    // �������� ��������� ���
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "65",    // ID ���-�����
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
					<p>��������� � ���������� ������ �� ������<br>� ����������� � ������������ ������������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>

					<!--<div class="b-top-link-wrp1">
						<div class="toplink1">
							<i class="tz-icon"></i>
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/partners/investors/img/pic5a.gif" alt=""></a>
						</div>						
						
						<div class="toplink2">
							<i class="tz-icon"></i>
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/partners/investors/img/pic5a.gif" alt=""></a>
						</div>
					</div>-->
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "����������� �������������� ������� �������� �� �level");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �����������, ��������������, ��������� ��������, �������������������, ������, �����������, ����������� ��������� �����, ������� ��������, ���������� �������� �������, ������, ��������, ���������� ��������, �������, �����������, �����, ������, ������, �������������� �����������, �����������, ������������� ����������");
$APPLICATION->SetPageProperty("keywords", "�level, �level �������, �����������, ��������������, ��������� ��������, �������������������, ������, �����������, ����������� ��������� �����, ������� ��������, ���������� �������� �������, ������, ��������, ���������� ��������, �������, �����������, �����, ������, ������, �������������� �����������, �����������, ������������� ����������, ���������� �������� ������, ������ �������� ���������");
$APPLICATION->SetPageProperty("description", "�������������� � �level ��� �������� ���������");
$APPLICATION->SetTitle("��������� ��������");
$APPLICATION->AddHeadScript('/js/masked.js');
?>                                          
<style>
    .trade_partner {
        clear: both;
        padding-top: 24px;
    }
</style>
<script>
    (function ($) {
        $(function () {
            $('select.stylize').selectbox();
            $('.inputselect').selectbox();
        })
    })(jQuery)
</script>
 <script type=text/javascript>
    $(document).ready(function(){
        $(".tz-phone-input").mask("+7(999) 999-99-99");    
    });
</script>


<div class="b-centered b-promo clearfix">
<h1>����� ��������� ��������? &ndash; �� ����� ���!</h1>

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

	<div class="b-pull-right b-form partners-form">
		<div id="bottom_form">
		    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "sendpartners", array(
			        "WEB_FORM_ID" => "61",
			        "IGNORE_CUSTOM_TEMPLATE" => "N",
			        "USE_EXTENDED_ERRORS" => "Y",
			        "SEF_MODE" => "N",
			        "SEF_FOLDER" => "/partners/trade/",
			        "CACHE_TYPE" => "N",
			        "CACHE_TIME" => "3600",
			        "LIST_URL" => "/partners/trade/",
			        "EDIT_URL" => "/partners/trade/",
			        "SUCCESS_URL" => "",


			        "CHAIN_ITEM_TEXT" => "",
			        "CHAIN_ITEM_LINK" => "",
			        "VARIABLE_ALIASES" => array(
			            "WEB_FORM_ID" => "WEB_FORM_ID",
			            "RESULT_ID" => "RESULT_ID",
			        )
			    ),
			    false
			);?>
	        </div>
	    <!--.b-row__first-->
	</div>

	<div class="review s02">
		<p>���� ������ �� ������ ���������� ��� ����������� ����������� ��������� � ���� �� ���, ������� ������� ��� ��� �������� ������������ ����������� �������������� � ���� ���������� �����������.</p>
		<div class="pic"><img src="/partners/trade/img/trade_shemilkin.jpg"/></div>
		<div class="name">������ �������� <span>(������������ ���)</span></div>
	</div>

<div class="trade_partner">
    <div class="orange s42 bold upper">������� �����
        <br/>
        �������� ���������
    </div>

    <p>�� ������, ��� ��� �������� ��� ����� ������ ������� &mdash; ��� ��
        <br/>
        �� �������� ����������� ����� ������� ���������� �������� �
        <br/>
        �� ���� �� �������� � ���������? �� ��������� ���, ��� ������
        <br/>
        ����� ���� ������&hellip; � �� ����������.</p>
</div>

<div class="long_orange">
    <div class="wrapp">
        <div class="title">��� �� ���������?</div>

        <div class="item i1">
            <p class="torgpart"><a href="/partners/trade/page2.php">������������ ������ ������������ ���������� ������������ � ������ ������������ ������� � ����������
                �������� (������������ ��������������� ������ � �������� ��������� ������, ������ �� ����������
                ����������)</a></p>
        </div>

        <div class="item i2">
            <p class="torgpart"><a href="/partners/trade/page.php">����� ������ ������� �������� (�������������� ������ �� �����
                <br/>
                � �������� ����������� ����� ���������, � ��� �� �� ������ ��
                <br/>
                ������� ������� �������)</a></p>
        </div>

        <div class="item i3">
            <p class="torgpart"><a href="/partners/trade/page1.php">�������� � ���������� �������� ���������� (��������� ��������� ������ ��� ��������������� �����������
                �����������)</a></p>
        </div>

        <div class="item i4">
            <p class="torgpart"><a href="/partners/trade/page3.php">������� ��� �������� ��������
                <br/>
                (�������� �� ������� �������������� � ������������)</a></p>
        </div>

        <div class="item i5">
            <p class="torgpart"><a href="/partners/trade/page5.php">������������� ����������� �������� ������ � ������� 3-� ������� (�� ��������������)</a></p>
        </div>

        <div class="item i6"></div>
    </div>
</div>

<div class="why_elevel">
    <div class="item i1">������� ��������, ����������� ������
        <br/>
        ����������� ������ ���������� ����������
    </div>

    <div class="item i2">������� �������� ������ �
        <br/>
        ������������� �������� �����
        <br/>
        �������
    </div>

    <div class="item i3">������ ��������
        <br/>
        �� ����� �����
        <br/>
        ��������
    </div>

    <div class="item i4">����� �� ��������� �����
        <br/>
        ������
    </div>

    <div class="item i5">�������� ��������� � �������� ������</div>

    <div class="item i6">�������� �������� �����
        <br/>
        ����
    </div>

    <div class="item i7">�����������
        <br/>
        ��������� ����
        <br/>
        ������ ����� ����
    </div>

    <div class="item i8">����������� ��������� �
        <br/>
        ������� ���������
        <br/>
        ������������������� ��� ����
    </div>

    <div class="item i9">������
        <br/>
        �level?
    </div>
</div>

<!--<div class="long_gray">
    <div class="wrapp">
        <div class="title">��� ��� ��������?</div>
        <img src="img/min_elevel.jpg" align="left"/>

        <p style="line-height: 2;"> � ����������� �� ������� ��������� ��� �������������� ������ � �������
            <br/>
            �������������� ������� � ������������ �������:</p>

        <ul>
            <li><span>������������� �������� ������� �������� � ������� ������ ��������;</span></li>

            <li><span>������� �� �������/��������/������/���������� �������� ����� � ������ �������������������;</span>
            </li>

            <li><span>���������� � ������� ������� � �� ��������� �������� ��������������� � ������ online;</span></li>

            <li><span>������� ������ ��������, ����� �������� ��������� �� �����, ���� �������� � ������,<br> ������ �� ������� ��������, ����� �������������� ����� e.Way.</span>
            </li>
        </ul>
    </div>
</div>-->

<div class="b-row b-row__examples clearfix">
    <h3 style="font-weight: normal; text-transform: uppercase; margin: 40px 0px 15px;">������ ������������ ������������
        �� ������� ��������������</h3>

    <div class="flexslider slider-example i2">
        <ul class="slides">
            <li>
                <div class="slider-expl__ins clearfix"><img src="img/slide_1.png"/>

                    <div class="txt">
                        <div class="header">������������������� �������
                            <br/>
                            Schneider Electric Unica � Unica ��������
                        </div>

                        <p><b>�����������:</b> 3 ����� �������, ����� 30 ������ ����� � ������������
                            <br/>
                            ����������, ����� �� ��������, ������� ��� ������������ ������.</p>

                        <p>������������ ����� ��������� ������������.</p>
                    </div>
                </div>

                <!--.slider-expl__ins-->
            </li>

            <li>
                <div class="slider-expl__ins clearfix"><img src="img/slide_1.png"/>

                    <div class="txt">
                        <div class="header">������������������� �������
                            <br/>
                            Schneider Electric Unica � Unica ��������
                        </div>

                        <p><b>�����������:</b> 3 ����� �������, ����� 30 ������ ����� � ������������
                            <br/>
                            ����������, ����� �� ��������, ������� ��� ������������ ������.</p>

                        <p>������������ ����� ��������� ������������.</p>
                    </div>
                </div>

                <!--.slider-expl__ins-->
            </li>
        </ul>
    </div>

    <!--.slider-example-->
</div>

<!--.b-row__examples-->

<div class="download"><a href="/upload/pres/elevel_traders.ppt"><span>����� ����������� ��� �������� ���������</span>.ppt
    (1.29 ��)</a> <a
        href="/upload/pres/elevel_traders_diy.ppt"><span>����� ����������� ��� �������� ��������� (DIY)</span>.ppt (1.27
    ��)</a></div>

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
      <div class="b-pull-right b-form partners-form bottom-form-without-float">
        <div id="bottom_form">
            <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "sendpartners_bottom", array(
                    "WEB_FORM_ID" => "61",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "Y",
                    "SEF_MODE" => "N",
                    "SEF_FOLDER" => "/partners/trade/",
                    "CACHE_TYPE" => "N",
                    "CACHE_TIME" => "3600",
                    "LIST_URL" => "/partners/trade/",
                    "EDIT_URL" => "/partners/trade/",
                    "SUCCESS_URL" => "",


                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",
                    "VARIABLE_ALIASES" => array(
                        "WEB_FORM_ID" => "WEB_FORM_ID",
                        "RESULT_ID" => "RESULT_ID",
                    )
                ),
                false
            );?>
            </div>
        <!--.b-row__first-->
    </div>
            <div class="b-pull-right1 under-bottom-form row col-xs-6 col-md-12">
            <p>��������� � ���������� ������ �� ������<br/>� ��������� ����������:</p>
            <span class="numb-phone1">8 (495) 363-32-03</span>

            <!--<div class="b-top-link-wrp1">
                <div class="toplink1">
                    <i class="tz-icon"></i>
                    <a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="img/pic5a.gif"/></a>
                </div>                        
                
                <div class="toplink2">
                    <i class="tz-icon"></i>
                    <a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="img/pic5a.gif"/></a>
                </div>
            </div>-->
        </div>
    <!--.b-form-contacts-->
</div>

<!--.b-row__last-->
</div>

<!--.b-promo-->
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
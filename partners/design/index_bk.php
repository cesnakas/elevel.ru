<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "����������� �������������� ��������� � �����������");
$APPLICATION->SetPageProperty("tags", "������, �level, elevel, elevel.ru, �����������, ��������������, ���������, �����������, �����������, ���������, ��������, ������, ������������, �������������������, ������������������ ������������, ������������� ������, ������������������, ��������, ������, �����������, �������");
$APPLICATION->SetPageProperty("keywords", "�level �������, �level, elevel.ru, �����������, ��������������, ���������, �����������, �����������, ���������, ��������, ������, ������������, �������������������, ������������������ ������������, ������������� ������, ������������������, ��������, ������, �����������, �������, ���������������� ���, �����������, gira, abb, schneider electric, fontini, gi gambarellim merten, legrand, bticino, mk electric, fede,  ������������ �������������������, ������� ����� ������������");
$APPLICATION->SetPageProperty("description", "�������������� � �level ��� ���������� � ������������");
$APPLICATION->SetTitle("��������� � �����������");
$APPLICATION->AddHeadString('<link href="http://allfont.ru/allfont.css?fonts=franklin-gothic-demi-cond" rel="stylesheet" type="text/css" />');
$APPLICATION->AddHeadString('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">');
$APPLICATION->AddHeadString('<script src="'.SITE_TEMPLATE_PATH.'/script.js"></script>');

$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>
<script>

$( document ).ready(function() {
    $(".text").text("");
    $(".adress_ul li").css("width","100%");
});

		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
		
		
</script>
  <div class="b-centered b-promo clearfix">
		<div class="h1-center" ><h1 style="line-height: 30px;  font-family: 'Franklin Gothic Demi Cond', arial; font-size: 36px;">�� ��������? ����������? � �level ������ ����� ��� ���!</h1></div>
		<div class="b-row b-row__first clearfix">
			<!--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 tz-l-sidebar">
<?/*$APPLICATION->IncludeComponent(
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
);*/?>
			</div>	-->		
			<div class="b-pull-right s01 b-form" id="bottom_form">
                <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form", Array(
                        "SEF_MODE" => "N",    // �������� ��������� ���
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "62",    // ID ���-�����
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
        
			</div><!--.b-form--><!--.b-form-->

			<div class="review s02">
				<p>� ����� �������� �� ������� �� ����������� ��� ���������� ����� ����� ������ �������� - �� ����������� � �������� ������������ �� ���������� ������� ������������� ��������� � ���������. 
				</p><p>� ������ �� ��� ����� �������� �������������� ����������, ������� ������������������ �� ������ ������� � ����� �����. ������ ������� ������, ���������� ����������� � ����������� ������ ������� ��� ����� ���������� �������� �� ������ ����.
				</p><p>������ ��������� ���!</p>
				<div class="pic"><img src="/partners/design/img/irinavoljanina.jpg"></div>
				<div class="name">���� ��������<br><span>(������������ ������ �� ������ � ����������� � �������������)</span></div>
			</div>
			<div class="review s02 last">
				<div class="review_adress">
					<div class="review_adress_title">���� ��� � ����� ���-����� �� �������: </div>
					<ul class="adress_ul">
						<li><i class="fa fa-map-marker"></i>111524, ������, ��. �����������, 13�</li>
						<li><i class="fa fa-map-marker"></i>123060, ������, ��. ������� �������, 10</li>
					</ul>
					<a href="/upload/pres/elevel_designers.ppt">
						<div class="download_link">���� �����������.pdf<span>(800 ��)</span></div>
					</a>	
				</div>
				
				<div class="review_contacts">
				 	<ul>
				 		<li>+7 (915) 256 67 79</li>
				 		<li>v.golikova@elevel.ru</li>
				 		<li><a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-2x"></i></a></li>
				 	</ul>
				</div>
				
			</div>

			
			
		</div><!--.b-row__first-->	
        </div>
        </div>
        </div>
	    <div class="long_orange"> 
		    <div class="wrapp">
			    <div class="title">�level � �������� ������� �� ���� ������� ���������� � ���������� ������-�������</div>
			    <div class="title_2">����� ���������� ������� � ���� ����� ����� �������:</div>
			    
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>1</strong></div></li>
                             <li>������ � ���������������� � ��������� ������� �� ��������� � ���������:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>������ � ���������� ����� � ��������  ����� �������������� ������������</li>
                        <li><i class="fa fa-angle-right"></i>����� ��������� �� ������� ������������</li>
                        <li><i class="fa fa-angle-right"></i>����� ������������ ������� � ������������</li>
                        <li><i class="fa fa-angle-right"></i>����� ���������� ���������� (� ��� ����� ������������� ���������, ������ ���)</li>
                        <li><i class="fa fa-angle-right"></i>���������� � ������������ ������������ ������� ��� �������������� �������, � ����� ������ ������� ���������������� � ��������� � ������� ������������</li>
                        <li><i class="fa fa-angle-right"></i>������ ������������</li>
                    </ul>
                </div>
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>2</strong></div></li>
                             <li>������ ������������ ������������ � ���������� ��� ���������� �������:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>������ ������������, �����, ���, ������������ ������������ ���������, ������ �� ��������� �����, ���� ���������, ������� � ������ ����������</li>
                        <li><i class="fa fa-angle-right"></i>������ ������������, ������� � ������ ����������������</li>
                        <li><i class="fa fa-angle-right"></i>����� ������������ ������� � ������������</li>
                        <li><i class="fa fa-angle-right"></i>����������� �����-������������ � ������������ � �������� ��������� �� ��������� ��������� ������� � ������</li>
                        <li><i class="fa fa-angle-right"></i>�������� ����� � ������������ ������� </li>
                    </ul>
                </div>
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>3</strong></div></li>
                             <li>������ ������������� �������:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>����� �� ������ � ����-����������� ��� ������������ � ����������</li>
                        <li><i class="fa fa-angle-right"></i>������������ � �������� ����������������� � �������������������</li>
                        <li><i class="fa fa-angle-right"></i>�������� �������� ��������� �� ������ � ������  ������ � � ����������� �����</li>
                    </ul>
                </div>
                <div class="section_long_orange">
                    <div class="section_long_orange_title">
                        <ul >
                             <li><div class="orange_circul"><strong>4</strong></div></li>
                             <li>��������� ������:</li>
                        </ul>
                        
                    </div>    
                    <ul>
                        <li> <i class="fa fa-angle-right"></i>�������� ������������ (������� ��� ����������� ������� ���)</li>
                        <li><i class="fa fa-angle-right"></i>�����-������� � ���������������� ������������ (������� KNX, ����� ���) </li>
                        <li><i class="fa fa-angle-right"></i>������������ ����������� ����� � ��������� �������</li>
                    </ul>
                </div>
			  
		    </div>
	    </div>

    <div class="contaigner">
   
            <div class="slider_menu">
                <ul>
                    <!--<li id="1" class="active_slider_menu">�����<span>/</span></li> 
                	<li   id="2">���������<span>/</span></li>
                   <li id="3" class="active_slider_menu">�����������<span>/</span></li>-->
                </ul>
            
            </div>

            <!-- <div class="b-row b-row__examples i4 clearfix" id="slider_full_1" style="visibility: visible; position: unset;">
                    <div class="flexslider slider-example i3 b1">
                        <ul class="slides">
                            <li>
                            	<div class="desc-sl"><span>���������� �������� �� ������ �� 14/06/2016!</span></div>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                      <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                <div class="b-row b-row__examples i4 clearfix" id="slider_full_2" style="visibility: visible; position: unset;">
                    <div class="flexslider slider-example i3 b2">
                        <ul class="slides">
                            <li>
                                <div class="desc-sl s1"><span>HE BOOZE PUB, ������������</span></div>
                                <div class="desc-sl s2"><span><p>������������ ������������: Merten Antic (�������� ������), ����������� GIRA</p>
                                <p>��� ������, ����������� � � ����. ��� ��� ����� �������. ������� �� ��������������</p>
                                <p> ���� �������� (��������)</p></span></div>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.jpg" draggable="false">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                      	<img src="/partners/design/img/demo_shlk.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 
                <div class="b-row b-row__examples i4 clearfix" id="slider_full_3" >
                    <div class="flexslider slider-example i3 b3">
                        <ul class="slides">
                            <li>
                            <div class="desc-sl s1"><span>����</span></div>
                                <div class="desc-sl s2"><span><p>������������ ������������: Merten Antic (�������� ������), ����������� GIRA</p>
                                <p>��� ������, ����������� � � ����. ��� ��� ����� �������. ������� �� ��������������</p>
                                <p> ���� �������� (��������)</p></span></div>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                      <img src="/partners/design/img/test1.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
     <!--  <div class="b-row b-row__examples i4 clearfix"  id="slider_full_2">
                    <div class="flexslider slider-example i3">
                        <ul class="slides">
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.png">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_shlk.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
               <div class="b-row b-row__examples i4 clearfix"  id="slider_full_3">
                    <div class="flexslider slider-example i3">
                        <ul class="slides">
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/test1.png">
                                </div>
                            </li>
                            <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_push.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_shlk.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_sgpsd.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_elst.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_spb.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_ekt.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_hck.jpg">
                                </div>
                            </li>
        <li>
                                <div class="slider-expl__ins clearfix">
                                    <img src="/partners/design/img/demo_pct.jpg">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> 


<!--<div id="slider-wrap" >
	<div id="slider">
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
		<div class="slide"><img src="/partners/design/img/test1.jpg" ></div>
	</div>
</div> -->

        
           <div class="long_orange cl">
           		<div class="wrapp">
                	<div class="title">��� �� ���������?</div>
               		<div class="item i7">
                		<img src="/partners/design/img/part_i7_or.png">
                    	<p>������������ ������� � ������������ ���������� �������������������� ��������� �� ������ ������ �� ���� � ������������ ������</p>
                	</div>
                    <div class="item i8">
                		<img src="/partners/design/img/part_i8_or.png">
                    	<p>������ � ������� ������������������� ������� � ������������� �����</p>
                	</div>
               </div>
           </div>
           <div class="elevel-deluxe">
           		<div class="long_orange cl">
           		<div class="wrapp">
                	<div class="item i7 t">
                		<img src="/partners/design/img/elevel-deluxe.jpg">
                   	</div>
                    <div class="item i8 t">
                		<p><strong>���������� ������������� ������ ������� � ������ ������������������� ������� � ������������ �������-������</strong></p>
                    	<p>���������� ���������� ��� ���������� � ������������, ����������� ������ � �������� ������ ������������ ������������, ������������, ������� � ������ ���������, ���������� � ���� ��������� ����� � ���������������� ����������� ������.</p>
                	    <a href="http://www.elevel-deluxe.ru/" class="btn gradient" >������� �� �level DELUXE</a>
                    </div>
                     
               </div>
               
           </div>
           </div>
		        
            <!--<div class="download"><a href="/upload/pres/elevel_designers.ppt"><span>����� ����������� ��� ���������� � ������������ � �������</span>.ppt
            (1.29 ��)</a></div>	
            <div class="download"><a href="/partners/design/catalogs/"><span>������������ ��������</span></a></div>	-->	
	       <div class="b-row b-row__last clearfix">			
			<div class="b-form-contacts clearfix v2">
				<h3 style="text-transform:uppercase; font-size:30px;">��������� ������</h3>
				<div class="b-pull-left b-form" id="bottom_form_2">
                <div id="bottom_form">
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_submit_form_bottom", Array(
                        "SEF_MODE" => "N",    // �������� ��������� ���
                        "AJAX_MODE" => "N",
                        "WEB_FORM_ID" => "62",    // ID ���-�����
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
					<p>��������� � ���������� ������ �� ������<br>� ������������� � �����������:</p>
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
				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo--> 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
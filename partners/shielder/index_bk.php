<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "�������������� ������������ � ������ ������������ | �level");
$APPLICATION->SetPageProperty("description", "�������� �level ������������ ������� ��������������� ������������. ������ ����������� �� ������� ������� �������������� �� �������� ��������.");
$APPLICATION->SetPageProperty("tags", "������������ ��������������� ������������, �������������� ������������, �����������, ����, ������ ������������, ������������ �����, ������������ ������������, ����� ����������, �������������� ������������, ����������������� �����������, ������������ �����, ���� �� ��������������� �������, �������� ����, ������� ���������, ������� ������������, ���, ������� ����������������� ����, ���, ������ ����������������� ����������, ��, ���� �����������������, ���, �������������� ���� �������, ��, ���� ����������, ��, ���� ����������, ���� ����, ��, ���� �������������, ��, ���� �������, ����������� �� �����, ������������� ����������� ����������, ���");
$APPLICATION->SetPageProperty("keywords", "����������, ������ ������������, �������������� ������������, ������ �����������, ��������� �����������, ������ �����������, ������������ ������������, ������ ��������������� ������������, ������������ ��������������� ������������");
$APPLICATION->SetTitle("������ �������������� ������������ Elevel - �������� ���� �� �����������.");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
</script>
<div class="b-centered clearfix">
		<h1>��������� ������� ������������? ����� ��������� ����������? - �level ��, ��� ���������� ������ �������</h1>
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

			<div class="b-pull-right b-form partners-form">
				<div class="b-title-orange">������� ����� ��������� ����� ������!</div>
				
<script>
    $(document).ready(function() {
        $('#call_close').first().remove();
        $('#suber').first().remove();
        $(".inner_params td").first().css('padding','0px');
        
        $(this).on( 'keypress','input[name="form_text_119"]', function (e){
            if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
                $(".error").html("������ �����").show().fadeOut(3000); 
                return false;
            }
        });

        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
        
        $('form[name="smart_house"]').attr('class','back_call');
        $('form[name="smart_house"]').attr('display','block !important');
        
        $(this).on('click', '.subm_form', function() {
            CONTACTUSER = $('input[name="form_text_117"]').val();
            PHONEUSER = $('input[name="form_text_119"]').val();
            EMAIL = $('input[name="form_text_121"]').val();
            MESSAGES = $('select[name="form_dropdown_call_time"]').val();
            textError='';
            error = 0;
              
            if(CONTACTUSER==''){textError='������� ���������� ����<br>';error = 1;};
                    
            if(EMAIL==''){
                textError+='�� ������ email<br>';
                error = 1;
            } else {
            if(!isValidEmailAddress(EMAIL)){
                textError+='�� ���������� email<br>';
            };}
            
            if(PHONEUSER==''){textError+='������� ����� ��������<br>';error = 1;};
            if(MESSAGES==''){textError+='������� ����� ������<br>';error = 1;};
            
            
            if(error == 0){
                
            var m_data=$("#simul_form1").serialize();
            m_data = m_data + "&web_form_submit=Y";
            
            /*$.ajax({
                async: true,
                type: "POST",
                url: '/sendquery/fcallback.php',
                dataType: "text",
                data: m_data,
                beforeSend: function() {
                },
                error:function(result) {
                    alert(result);
                },
                
                success: function(result) {
                    $('.table-bottom').hide();
                    $("#back_call").append('<div style="text-align: center; font-size: 16px; margin-bottom: 20px;">��� ������ ������� ���������!</div>')
                }
            });
            return false;*/
            } else{
                $('.error').empty();
                $('.b-pull-right').css('height','450px');
                $('.error').show().fadeOut(3000);
                $('.error').html(textError);
                $('#simul_form').css('height','410px');
                setTimeout( function () {$('#simul_form').css('height','320px');$('.b-pull-right').css('height','391px');}, 3000);
                return false;
            }
        });
        
    });
</script>

    <div id="simul_form1" style="margin-left: 0px;">
        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <div id="bottom_form">
			<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "electroshields_top", array(
				"WEB_FORM_ID" => "73",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"USE_EXTENDED_ERRORS" => "N",
				"SEF_MODE" => "N",
				"SEF_FOLDER" => "/partners/shielder/",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"LIST_URL" => "/sendquery/sended.php",
				"EDIT_URL" => "/sendquery/sended.php",
				"SUCCESS_URL" => "/sendquery/sended.php",
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
    </div>
				<?/*?>
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
						<input type="submit" value="�������� ������������" class="btn gradient">						
					</div>
				</form>
				<?*/?>
				<p>�� ������ �������� �������� ��������������� ������� ������������� ����������������  (���, ��, ���, ���) � ����� ����������  (� ��� ����� �����������������  �����������), ����� ����� �  �������������</p>
				<img src="/img/cask.png" alt="">
				<!--<article>�������������� � ������<br> ��������� <br>����������������������� <br>�����������</article>-->
			</div><!--.b-form-->
			
			<div class="review s02">
				<p>�� ���������� �������, ������������ ������� �����������������, ���������������� � ���������������. ���� ������� �������� ������ � ���������� ������������ ������������� � � ������������ ������ ���������.</p>
				<div class="pic"><img src="/img/shitovik-lico.jpg"></div>
				<div class="name">����� ����� <span>(������������ ���)</span></div>
			</div>
			

		</div><!--.b-row__first-->
		<div class="b-row b-row__task clearfix">
			<div id="orange_block">
			<div>
				<figure><img src="/img/graph.png" alt=""></figure>
				<header class="b-title-orange2">
					����������� � ����, �� ��������� ����������� ��������� ��������,<span> �������� � ���-10</span> ���������� ���������� ����������� �������������������.
				</header>
			</div>
			<article>
				<p>���������� �� ������� � ������ �����, ��������� ����� ������ �� ������� ��� ������, � ����� ���� � ������� � ������ ����.</p>
			</article>
			</div>	
		</div><!--.b-row__task-->
<!--<p>����������� � ����, �� ��������� ����������� ��������� ��������, �������� � ���-10 ���������� ���������� ����������� �������������������. ���������� �� ������� � ������ �����, ��������� ����� ������ �� ������� ��� ������, � ����� ���� � ������� � ������ ����.<p>-->
		<!--<div class="b-row b-row__advantages clearfix">
			<h2>��� �� ���������?</h2>
			<div class="b-adv__col b-adv__col_left" style="padding-top: 180px;">
				<div class="b-advantage__item">				
					<i class="n-ico n-ico-multiroom"></i>
					<strong>����������<br>�����������<br>������������ </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>�������� ������ � �������� ������� ������ ���, ��� ��� ������. �� ����� �������� ������ ������� ���������� �����-/���������������� - ���������� ������ ��� ��������� ���������� ������ � ����� � ����� ����� ������, ���������� �� ����� ��������� ��������� ������� (CD, DVD).</p></div>
				</div>
				<div class="b-advantage__item">
					<i class="n-ico n-ico-link" style="width: 55px"></i>
					<strong>������������<br>���</strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>�������� ������ � �������� ������� ������ ���, ��� ��� ������. �� ����� �������� ������ ������� ���������� �����-/���������������� - ���������� ������ ��� ��������� ���������� ������ � ����� � ����� ����� ������, ���������� �� ����� ��������� ��������� ������� (CD, DVD).</p>
					</div>
				</div>
				<div class="b-advantage__item">
				</div>	
			</div>
<div class="b-adv__col b-adv__col_right">
				<div class="b-advantage__item"style="padding-right: 115px;">
					<i class="n-ico n-ico-home"></i>
					<strong>����������<br>����</strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>��������� ������� ���� �� �������� ���������� ������� ��������� � ������������� �������, ���� ���� ������ ������ �� �������� ���� ��� �������� �����-������� ��� ���������� ���������.  ��������� ����������������� ���������� ������������ �������������, ������ �����, ������������� � ����������� � ����� ���� ������ ����� �����.</p>
					</div>
				</div>
				<div class="b-advantage__item" style="padding-right: 70px; padding-top: 25px;">
					<i class="n-ico n-ico-door"></i>
					<strong>������� �<br>��������������<br>������� </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>��������� ������� ���� �� �������� ���������� ������� ��������� � ������������� �������, ���� ���� ������ ������ �� �������� ���� ��� �������� �����-������� ��� ���������� ���������.  ��������� ����������������� ���������� ������������ �������������, ������ �����, ������������� � ����������� � ����� ���� ������ ����� �����.</p>
					</div>
				</div>
				<div class="b-advantage__item"style="padding-right: 110px;margin-top: 10px">	
				</div>			
			</div>
			  <div class="b-adv__col b-adv__col_right2">

				<div class="b-advantage__item"style="
    padding-right: 115px;
">
					<i class="n-ico n-ico-lamp"></i>
					<strong>����������<br>����������� ��� </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>������, ����� ���� � �������� ��������� �� ������� ��������, ���������� ������������ ��� ��������� ������� � ���������� ������� � ���������, ����� �� ���������� ������? � ������ ������� ����� ������ ����� ��������. ����� ��������� ��������� ��������� ���������� ������ ������� � ��������� ������.</p>
					</div>
				</div>
				<div class="b-advantage__item"style="padding-right: 70px;">
					<i class="n-ico n-ico-lock"></i>
					<strong>�������� �<br>����������������<br>������������ </strong>
					<div class="b-adv__pop" style="display: none;"><i class="arrow-top"></i>
						<p>������, ����� ���� � �������� ��������� �� ������� ��������, ���������� ������������ ��� ��������� ������� � ���������� ������� � ���������, ����� �� ���������� ������? � ������ ������� ����� ������ ����� ��������. ����� ��������� ��������� ��������� ���������� ������ ������� � ��������� ������.</p>
					</div>
				</div>

				<div class="b-advantage__item"style="padding-right: 110px;margin-top: 10px">					
				</div>				
			</div>
			<article>������������ ������������</article>
			<span class="b-title-pult">������ ���������������� ����������</span>

		</div>-->
		<div class="b-row b-row__why clearfix">
			<h3>������ �level?</h3>			
			<div class="b-why__list">
				<article>
					<figure><img src="/img/elevel_icon1.png" alt=""></figure>
					<header>�������������� ������</header>
				<p>� ������� ������ � �������� �� ���������, ��� � ���� ��������� ��������. ��� ������������� �� ����������� ������������� ������������ �� ����������� ��������, �������� ���������� ������������, ��������� ����������� ��������� � ����������� ������������ ������������ ����� �����������.</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon2.png" alt=""></figure>
					<header>������ ���������������</header>
					<p>���� ������� �� ������������� �� ������������. ��� ����� ����� ����� ������������ ��������, ��������������� ����������� ����������� ��� ������� ����������� �������. �� ������� ��������� � ������ ������� � ����� ��������������� �� ������������� ���� ��������������� �������.</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon3.png" alt=""></figure>
					<header>��� ��� �������� ������ ��������</header>
					<p>�� ���������� ��������������� ����������� � ����� 55 000 ������������ ��������� ABB, Schneider Electric, Legrand, DEKraft, Rittal, Finder, DKC � ������ ������������������ �������. � ��� ������ ����� ����������� ������ ��������� ��������� ����������, ��������� ����������������, ��������� ����������, ����������� � ������� ������������ � ��������� ������� ���������.</p>
				</article>

				<article>
					<figure><img src="/img/elevel_icon4.png" alt=""></figure>
					<header>���������� ���������</header>
					<p>����� �� ����� ����������� ������ ����� � ����, ���� �������� ����� ������������ ��� ����� �������� ������� � ����� ��������������� �� ������ ���� ��������. ������� �� ������ � ���������� ������� ����� �������� ��������� ��� �� ��������� ���� ����� ���������� ������.</p>
				</article>
			</div><!--.b-why__list-->
		</div><!--.b-row__why-->
		<!--<div class="b-row b-row__packages clearfix">			
			<h3>���� ������ ���</h3>
			<div class="big_block">			
				<header>�� ������������� �������� ��� ����������������:</header>
				<div id="info_block">
					<img src="/img/img1.png" alt="">
					<header>���</header>
					<article>(������� ����������������� ����)</article>
					<p>������� ����������������� ��� � ����������, ���������� �� ��������������� ����� ������ ��� ��� ������������ �����.
					</p>
				</div>
				<div id="info_block">
					<img src="/img/img2.png" alt="" style="position: relative; right: 10px;">
					<header style="right: 465px;">��, ���</header>
					<article style="left: 10px;">(��� ����� �������������)</article>
					<p style="left: 50px;">��� ����� ������������� -  ������������ ��� ������, �����, ������������� ��������������, � ����� ��� ������ ����� �� ����������, ����� ��������� ��������� � ����� ������ �� �����.
					</p>
				</div>
				<div id="info_block">
					<img src="/img/img3.png" alt="">
					<header>���</header>
					<article>(������-����������������� ����������)</article>
					<p>������-����������������� ���������� � ����������� ������������� ������������ ��� ������, ����� � ������������� ��������������, � ����� ������ ��������� ����� �� ����������.
					</p>
				</div>
				<div id="info_block">
					<img src="/img/img4.png" alt="" >
					<header style="right: 535px;">��</header>
					<article style="left: 18px;">(����� ����������)</article>
					<p style="left: 50px;">���� ���������� � ���������� ���  ���������������, ����������, ������� ��� ���������� (� ������ ����������) ���������� ������ ���������������.
					</p>
				</div>				
				<header>�� �������������� ����������� ���������������:</header>			
				<table border="0" width="710" height="433" cellpadding="15" cellspacing="15">
					<tr>
						<td>
							<header><a href="/solutions/electroboards/control_and_automation/">���</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>������������ ������������� ���������������� ��������. ���� ���������� �� �������� ����� ���������/������, ��� ������������� ����������� ������ ������� �� ��������� ��������. ����� ������������ ��������������� ������� � �� 0,1 �� 30 ������.</p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/panel_lighting/">��</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>��������� �������������� ��������� � �����, ���������������� � ���������������� �������. � ������� �� �������������� ���������� ���������� ������� ������������� �����, � ����� �������������� ������ �� ���������� � �������� ���������.</p>
							</article>
						</td>
					</tr>
					<tr>
						<td>
							<header><a href="/solutions/electroboards/shield_accounting/">���</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>������������ ��� ������������� ����� � ������������� ��������������, ������ ���������� ������� � ������������� ����� �����, ������� ������ � ������������ ������������ �� ����� ��������� ��������� � ����������.</p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/control_and_automation/">���</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>��������� ��������� ���������� �� ���������������� ��������� �������. ��� ������������� �������� � ��������� ��������� ���������, � ����� ������������ ����� �������.</p>
							</article>
						</td>						
					</tr>
					<tr>
					<td>
							<header>��</header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>��������������� �� ������������ � ������������ �������� � ����� ���������������� �� ���� ����������� ���������� �������� � ����������� ���������� ������������� ������� � ���������� ������������ ��������. </p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/introductory_switchgear/">���</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
								<p>�������� ������������������, �������� � ��������� ��� ������, �����, ������������� � �������������� ��������������, � ����� ������ ����� � ������������ �� ���������� � �������� ���������.</p>
							</article>
						</td>
					</tr>
					<tr>
					<td>
							<header><a href="/solutions/electroboards/switchboard/">��</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>������������ ��� ������ � ������������� �������������� � �����, ���������������� � ������������ �������, ������ ����� � ������������ �� ���������� � �������� ���������, � ����� �������� ������������� ���������/���������� �����.</p>
							</article>
						</td>
						<td>
							<header>��</header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>������������ ��� �������������� ���������� ��������� �������������, �����, �����, �������� � ������������� ��������������, ������ ���� �� ��������� ��������� � ����������, � ����� ���������� ��������� ���������� �������.</p>
							</article>
						</td>
					</tr>
					<tr>
					<td>
							<header><a href="/solutions/electroboards/main_switchboard/">���</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>�������� �� ����������� ��������������� ����� ������ ��� ��� ������������ �����. ������������� ��� ������ � ������������� �������, ������ ���� �� ��������� ��������� � ����������. ��������������� �� �������� ������, ����������������� � ������������� ��������.</p>
							</article>
						</td>
						<td>
							<header><a href="/solutions/electroboards/control_and_automation/">��</a></header>
							<figure><img src="/img/table_icon.png" alt=""></figure>
							<article>
							<p>������������ ���������� ���������������� ������ �������������, ����������� ������������������� ������������ � ���������, ���������, ����������, �������� ������������ � �.�.</p>
							</article>
						</td>
					</tr>
				</table>			
			</div>
		</div>-->
		<div class="b-row b-row__architecture clearfix">			
			<!-- <h3>����������� ������� ����</h3> -->
			<div class="flexslider slider-architecture">
				<ul class="slides">
					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-shits-1.jpg" alt="">
							<figcaption></figcaption>
						</figure>
					</li>
				</ul>
			</div><!--.slider-architecture-->
		</div><!--.b-row__architecture-->
		<div class="b-row b-row__we-work clearfix">			
			<div class="b-gray-bg">
			<h3>��� �� ��������?</h3>
			<div class="b-steps">
				<span class="blue-line gradient"></span>
				<ul class="clearfix">
					<li class="active">
						<a href="javascript: void(0)">
							<span class="b-numb">1</span><strong>����� � ����������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">2</span><strong>��������� ������������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">3</span><strong>������������ ��������������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">4</span><strong>��������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">5</span><strong>��������� ������������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
				</ul>
			</div>
			</div><div class="b-steps__content">
				<div class="b-steps__cont_item visible">
					<p>����������� ������������ ������ �������� ������� � ���� ���������� � ����������� ��������������� ������������. ���� ��� ���������� ������� ���������� ������ ����������� ��������������� �������, �� ����������� ����������� ������������ � ��������� ��� ���������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>����������� � ���������������� ������ �������� �������� � ������ ��������������. �� ������ ����������� �� ����� ������� �������� ����� ��������������� ����� ���������� �������, � ��� ����� �� ���������� ���� �������� ��������������� � �������� ���������� ��������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>�� ���� ��������� ������� ������ �������������� � ���������� ����� �� ������ �������� ��� ���������� ��������� ��������� �� ������ ���� ��������� �������: ������������ �����������, ������ ������������, ��������������� ������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>�� ������ ������� ��������������� �������� � 2 ����. � ������� ����� ����� �� ��������� ������� � �������������� ���������� ������ ��������������� ������������ � �������� ���������� �������������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>�� ������ ��������� � ���� ������� �� ��������� ������������ �� ������������� ����� ��� ���������� ������� ������ ������������, ����� � ���� ��������� �������������.</p>
				</div>
			</div>
		</div>	
		<!--<div class="b-row b-row__examples clearfix">
			<h3>������� ����������</h3>
			<div class="flexslider slider-example">
				<ul class="slides">
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/kempinski1.png" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
								<header>��������� ������� ����������, �. ������</header>
								<div class="slider-expl__row clearfix" style="	margin-top: 10px;">
									<div class="b-left">��������������</div>
									<div class="b-right"><p>10 ����</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������</div>
									<div class="b-right"><p>20 ����</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������������<br>������������:</div>
									<div class="b-right"><p>ABB, Gira, LCN</p></div>									
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">�����������<br>������:</div>
									<div class="b-right"><p>�������������� � �������� ������ ���������� ����������, ����������. �������� ������� ����� ��� �������������� ������� ����������������. ������������������� �������.</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">
										<img src="/img/face.png" alt="" id="face">
									</div>
									<div class="b-right">
									<div id="right_block1">
										<article>���� ��������</article>
										<p>��� ������, ����������� � � ����. ���<br> ��� ����� �������. ������� ��<br> ��������������</p>
									</div>
										<p>���������� KNX � 511 000 ���.</p>
										<p>������� ���������� ������ + ������ � 150 000 ���.</p>
										<p>������������������� ������� � <br>80 000 ���.</p>
										<p>������ � ���������������� � <br>500 000 ���.</p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/moscowh1.png" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
									<header><p>��������� �������, �. ������</header>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������������<br>������������</div>
									<div class="b-right"><p>ABB</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">�����������<br>������</div>
									<div class="b-right"><p>������ ����� ���</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">���������</div>
									<div class="b-right">
										<p>���������� KNX � 1 295 000 ���.</p>
										<p>������� ���������� ������ + ������ � 500 000 ���.</p>
										<p>������������������� ������� � <br>250 000 ���.</p>
										<p>������ � ���������������� � <br>1 500 000 ���.</p>
									</div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">����� ����������:</div>
									<div class="b-right"><p>���</p></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/croco1.png" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
								<header>������� ����� ����, �. ������</header>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������������<br>������������</div>
									<div class="b-right"><p>ABB, Schneider Electric</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">�����������<br>������</div>
									<div class="b-right"><p>��������������, ������ � ������ ����� ���������� � ���������������</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">���������</div>
									<div class="b-right">
										<p>���������� KNX � 2 821 000 ���.</p>
										<p>������� ���������� ������ + ������ � 1 600 000 ���.</p>
										<p>������������������� ������� � <br>800 000 ���.</p>
										<p>������ � ���������������� � <br>3 000 000 ���.</p>
									</div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">����� ����������:</div>
									<div class="b-right"><p>���</p></div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>-->
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<div class="b-pull-left b-form">
				
				    <?/*<div id="simul_form1">*/?>
				    <div>
                        <div class="info"></div>
                        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
                        <div id="bottom_form">
                        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "electroshields_bottom", array(
							"WEB_FORM_ID" => "73",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"USE_EXTENDED_ERRORS" => "N",
							"SEF_MODE" => "N",
							"SEF_FOLDER" => "/partners/shielder/",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "3600",
							"LIST_URL" => "/sendquery/sended.php",
							"EDIT_URL" => "/sendquery/sended.php",
							"SUCCESS_URL" => "/sendquery/sended.php",
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
                    </div>
				<?/*?>
				
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
						<input type="submit" value="�������� ������" class="btn gradient">
					</div>
				</form>
				<?*/?>
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>��������� � ���������� ����� �������� <br>��� ������ ��������������:</p>
					<span class="numb-phone1">8 (495) 363-32-03</span>
					
					<!--<div class="toplink1">
						<i class="tz-icon"></i>
						<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/img/pic5a.gif" alt=""></a>
					</div>						
					
					<div class="toplink2">
						<i class="tz-icon"></i>
						<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/img/pic5a.gif" alt=""></a>
					</div>-->

				</div>				
			</div><!--.b-form-contacts-->
		</div><!--.b-row__last-->		
	</div><!--.b-promo-->
<div class="border">&nbsp;</div>
<div style="clear: both; "></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

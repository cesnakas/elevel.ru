<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "����� ��� - ����������, �������������� � ��������� ������� �� �������� �level");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� �������������� � ���������������� ������� ������ ���. ������� ������ ��� ��������� ��������� ����������� �������������� ������ ����. ");
$APPLICATION->SetPageProperty("tags", "����� ���, smart house, ������� ����� ���, ������� ������������� ����, ������������� ����, knx, eib, ������� lcn, merten knx, abb i-bus eib, legrand in one, bticino my home, gira funkbus, gira instabus, esylux, teleco, moeller, ����� ��� ����, ����� ��� ���������, ������� ����� ����� ���, ���������� �������� ���������, �������� ������� ��������,  ���������� ����������, �������� �������� ������, �������� �������� ����, ������� ������, ������� ����������, ���������� ������������������, ���������� �������������, �������� �������, ����� ��� ������������, ������ ����� ���, ���������, ���������� ����������, ���������� ������, ���������� �������������, ���������� ����� �����, ������������� ���������� �����, ������������� ����, �������� �������������, ���������� ������, ������������� ���������� ������, ���������� ��������, ������������� ���������� ��������, ���������� �����������, ���������� ��������, �������� �����������, ������������ ����� ���, ������ �������� ������������");
$APPLICATION->SetPageProperty("keywords", "����� ���, ������� ����� ���, ����, ���������, ������������, ������ ����� ���, ����� ��� ������, ��������� ����� ���, ������ ������� ����� ���, ����� ��� ��������������, ������ ����� ���");
$APPLICATION->SetTitle("������� ������ ���");
?> 
<div class="b-centered b-promo clearfix">

		<h1>������� ������ ���</h1>

		<div class="b-row b-row__first clearfix">
			<div class="b-pull-left"><img src="/img/monitor.jpg" alt=""></div>
			<div class="b-pull-right b-form">
				<div class="b-title-orange">���������� ����� ����� ��������</div>
                
<script>
$(document).ready(function() {
    $('#call_close').first().remove();
    $('#suber').first().remove();
    //$(".table10").removeClass("table10").addClass("table-bottom")
    //$(".table-bottom").first().append('<tr><td colspan="4" style="padding: 26px 0 0 0;"><span id="suber-bottom" style="cursor:pointer; position: relative; left: 188px;"><img src="/i/btn140g.gif"></span></td></tr>');
    
   // $(".txt8").first().css('padding-top','12px');
   // $(".inputtext").attr('class','w170');
   // $('textarea').first().attr('class','h92');
    //$("#form_dropdown_TIME,#form_dropdown_CITY").first().attr('class','sel1');
    //$('input[name="web_form_submit"]').first().css('display','none');
    //$('form').css('height','392px');
   
    $(".inner_params td").first().css('padding','0px');
    
    
//$(this).on('event', ":element", function() {})
    $(this).on( 'keypress','input[name="form_text_411"]', function (e){
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
       //_gaq.push(['_trackEvent', 'sent_home_price', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_home_price');
        CONTACTUSER = $('input[name="form_text_409"]').val();
        PHONEUSER = $('input[name="form_text_411"]').val();
        EMAIL = $('input[name="form_text_410"]').val();
        MESSAGES = $('select[name="form_textarea_412"]').val();
        //console.log(MESSAGES);
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
            $('.error').show().fadeOut(3000);
            $('.error').html(textError);
            $('#simul_form').css('height','410px');
            setTimeout( function () {$('#simul_form').css('height','320px');}, 3000);
            return false;
        }
    });
    
});

</script>         
        <div class="bottom-form" style="float: left;"> 
        <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_smart_house", Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"AJAX_MODE" => "N",
	"WEB_FORM_ID" => "30",	// ID ���-�����
	"LIST_URL" => "/sendquery/sended.php",    // �������� �� ������� �����������
    "EDIT_URL" => "/sendquery/sended.php",    // �������� �������������� ����������
    "SUCCESS_URL" => "/sendquery/sended.php",    // �������� � ���������� �� �������� ��������
	"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
	"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
	"IGNORE_CUSTOM_TEMPLATE" => "N",	// ������������ ���� ������
	"USE_EXTENDED_ERRORS" => "N",	// ������������ ����������� ����� ��������� �� �������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	),
	false
);?>
    </div>
</div>
 
<!--<div style="clear: both; "></div>-->
 
            
                    <!--<div class="b-form__row">
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
                        <p>�������� ���� ������������ ������� ���������� </p>
                    </div>-->
    
			
			</div><!--.b-form-->
		</div><!--.b-row__first-->


		<div class="b-row b-row__task clearfix">

			<header class="b-title-orange2">
				������ ���������� ������ ��� � ������� ������ ����� ����������, �������������� ��������� ������ ���������� ����� � ������� �������
			</header>

			<figure><img src="/img/task-img.jpg" alt=""></figure>

			<article>
				<p>
					������� �� ��� ������� �������� ������� ��������� � �����, ������, ������ ����, ������������, ��������� � �������� ����������. ������ ���������� ������ ��� � ������� ������ ����� ����������, �������������� ��������� ������ ���������� ����� � ������� �������. 
				</p>
				<p>
					������� ������ �������� ������ � ������������� ������ ���������. ����� �������� ����� ������������, �� �������� ������ ����� � ������ ������������ ��������� ����, ���������� ���������� �������������� ���������� � ������� �������� ��������� �������.
				</p>
			</article>

		</div><!--.b-row__task-->


		<div class="b-row b-row__advantages clearfix">

			<h2>��� �� ���������?</h2>

			<div class="b-adv__col b-adv__col_left">

				<div class="b-advantage__item">
					<i class="n-ico n-ico-lamp"></i>
					<strong>���������<br>��������� </strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							������, ����� ���� � �������� ��������� �� ������� ��������, ���������� ������������ ��� ��������� ������� � ���������� ������� � ���������, ����� �� ���������� ������? � ������ ������� ����� ������ ����� ��������. ����� ��������� ��������� ��������� ���������� ������ ������� � ��������� ������. 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-home"></i>
					<strong>����������<br>�����������</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							��������� ������� ���� �� �������� ���������� ������� ��������� � ������������� �������, ���� ���� ������ ������ �� �������� ���� ��� �������� �����-������� ��� ���������� ���������.  ��������� ����������������� ���������� ������������ �������������, ������ �����, ������������� � ����������� � ����� ���� ������ ����� �����. 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-multiroom"></i>
					<strong>���������</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							�������� ������ � �������� ������� ������ ���, ��� ��� ������. �� ����� �������� ������ ������� ���������� �����-/���������������� - ���������� ������ ��� ��������� ���������� ������ � ����� � ����� ����� ������, ���������� �� ����� ��������� ��������� ������� (CD, DVD).
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-lock"></i>
					<strong>������������</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							��� �� �� �� ����, ������������ ���� ��������� ��� ���������. ������� ���������������� ������� ���������� ��������� ��������� ������������� ������ � ������������� �� ����������, ����������, ��������. ��� ������������ ������� ����������� ��������� �������������, � �� ������� ���������� ������� �������� �� ����� ���������� ��� ����������.  
						</p>
					</div>
				</div><!--.b-advantage__item-->
				
			</div><!--.b-adv__col_left-->

			<div class="b-adv__col b-adv__col_right">

				<div class="b-advantage__item">
					<i class="n-ico n-ico-door"></i>
					<strong>�������������<br>���������� </strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							������ � ���������� ����������� ���� ������ �����, ��� ���� ��������� ����� ��� ���� �������� � ����� ����� SMS ������������ ������� ����������� �� �������� � ����������� ��������, ������� �������� ���� � �������� � ������ ��� � ��������. ������ �������� ���� � ������? �������� ��� �� ������ �� ������ �� ������.  
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-link"></i>
					<strong>����� � <br>���������</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							�� ������ ������ �����, ��� ����� �� ������. �������, � ����� ����� ���� �� ���������� - ������������ � ���������� �������� ������� �����, ������������ � �����������, ������� ����� ��� ��������� ������ �� ����������. ����� ������������ ���������� ������ ���� ��� ���������� �������� � �������� �������� ���������� ��������. 	 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-settings"></i>
					<strong>����������������</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							������ �� �������������� ������ ������ ���. ������� ������� ���������� ������ �����, �� ������ ���������, �� �����������. ���� ����� ������������� ���������� ��������� � ����. ������� �� ������� ������: ������� ����, ���� �� ������ � ���, �������������� ������ ������������ ��������, ����� ��� �� �������� ������������� �� �������.  	 
						</p>
					</div>
				</div><!--.b-advantage__item-->

				<div class="b-advantage__item">
					<i class="n-ico n-ico-shield"></i>
					<strong>�������� ���������� ��������</strong>
					<div class="b-adv__pop"><i class="arrow-top"></i>
						<p>
							��� ��� ����� ���������� � ����� �������. ������ ��� �������� ����� ����������� �������� ������ ��� �������� ����, ������ �����, ������ ����. ��� ������� �������� ������ �������: ��� ������������ �������� ������������ ��������� ���������� ����� ���������, ��������� ������� � ���������, �� �������� ��������� ���������� �� ������, ��������� �� SMS ��� e-mail.
						</p>
					</div>
				</div><!--.b-advantage__item-->

			</div><!--.b-adv__col_right-->

			<span class="b-title-pult">������ ���������������� ����������</span>

		</div><!--.b-row__advantages-->


		<div class="b-row b-row__why clearfix">

			<h3>������ �level?</h3>
			
			<div class="b-why__list">

				<article>
					<figure><img src="/img/why-img1.jpg" alt=""></figure>
					<header>��������� ������������ �� ���������� KNX �� �������</header>
					<p>
						���� �������� � ����������� ��������� ������������ LCN, Merten, Schneider Electric, INNTECH, Esylux, Gira, ABB. ������������ ������� ����� ��������� ��� �������� � ����� ������.
					</p>
				</article>

				<article>
					<figure><img src="/img/why-img2.jpg" alt=""></figure>
					<header>�� �������� ���� �����������</header>
					<p>
						������ ������ ������� ���� ��������������� ��� �������������� ������ ���������. ���������� � ����� �����, � �� ��������� ������� � ������ ������� ����������. 
					</p>
				</article>

				<article>
					<figure><img src="/img/why-img3.jpg" alt=""></figure>
					<header>��������� ������� ���� �����</header>
					<p>
						�������� ������������� ���� � ��������� ��������� ������ ���������������, ��������� � �����������. ����������� ������ � �������� ������������� � �������� �������� ������ �������.
					</p>
				</article>

				<article>
					<figure><img src="/img/why-img4.jpg" alt=""></figure>
					<header>������������, ���������, ��������� ���������� ������� ����</header>
					<p>
						���� ����������� ������� �� ������ ������, ������� � ��������� ������������ � ���������� ���������� �������.
					</p>
				</article>

			</div><!--.b-why__list-->

		</div><!--.b-row__why-->


		<div class="b-row b-row__examples clearfix">

			<h3>������� ����������</h3>

			<div class="flexslider slider-example">
				<ul class="slides">

					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">������</div>
									<div class="b-right"><p>��������� ������� ������ ��� � �������� �������� 110 �2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">���������</div>
									<div class="b-right"><p>��������</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������������</div>
									<div class="b-right"><p>ABB</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">���������</div>
									<div class="b-right">
										<p>���������� KNX � 511 000 ���.</p>
										<p>������� ���������� ������ + ������ � 150 000 ���.</p>
										<p>������������������� ������� � <br>80 000 ���.</p>
										<p>������ � ���������������� � <br>500 000 ���.</p>
									</div>
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>

					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">������</div>
									<div class="b-right"><p>������������� 2-��������� ����������� �������� �������� 300 �2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">���������</div>
									<div class="b-right"><p>�������</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������������</div>
									<div class="b-right"><p>ABB</p></div>
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
									<!--<div class="b-left">����� ����������:</div>
									<div class="b-right"><p>���</p></div>-->
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>

					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
								<div class="slider-expl__row clearfix">
									<div class="b-left">������</div>
									<div class="b-right"><p>����������� ������� ����������������� ���������� ������� 3-�������� ��������� �������� 1 100 �2</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">���������</div>
									<div class="b-right"><p>�������</p></div>
								</div>
								<div class="slider-expl__row clearfix">
									<div class="b-left">������������</div>
									<div class="b-right"><p>ABB</p></div>
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
									<!--<div class="b-left">����� ����������:</div>
									<div class="b-right"><p>���</p></div>-->
								</div>
							</div><!--.slider-expl__txt-->
						</div><!--.slider-expl__ins-->
					</li>

				</ul>
			</div><!--.slider-example-->

		</div><!--.b-row__examples-->


		<div class="b-row b-row__packages clearfix">
			
			<h3>������ �����</h3>

			<div class="b-row__pack_col1">
				<p><span>���������</span></p>
				<p><span>�������� ���������</span></p>
				<p><span>���������� ����������������</span></p>
				<p><span>���������� ����������,<br>�������, ������</span></p>
				<p><span>������� ���������</span></p>
				<p><span>������� ����������<br>� �����������������</span></p>
				<p><span>������� �������������</span></p>
				<p><span>������� �������-�������� ������������</span></p>
				<p><span>������������� �������� � ����������</span></p>
				<p><span>������� ���������������</span></p>
				<p><span>�������� ��������� ��������</span></p>
			</div>

			<div class="b-row__pack_col b-row__pack_start">

				<header class="b-pack-col__green">
					<strong><i class="n-ico ico-home-green"></i><span>�����</span></strong>
					�� 1 000 000 ���.
				</header>

				<ul class="b-row-wrp">
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
				</ul>
				<a href="#" class="btn gradient btn-medium btn-opac">��������</a>

			</div><!--.b-row__pack_col__start-->

			<div class="b-row__pack_col b-row__pack_standart">

				<header class="b-pack-col__violet">
					<strong><i class="n-ico ico-home-violet"></i><span>��������</span></strong>
					�� 3 000 000 ���.
				</header>

				<ul class="b-row-wrp">
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
					<li><i class="n-ico arrow-blue"></i></li>
				</ul>
				<a href="#" class="btn gradient btn-medium">��������</a>

			</div><!--.b-row__pack_col_standart-->

			<div class="b-row__pack_col b-row__pack_premium">

				<header class="b-pack-col__orange">
					<strong><i class="n-ico ico-home-orange"></i><span>�������</span></strong>
					�� 5 000 000 ���.
				</header>

				<ul class="b-row-wrp">
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
					<li class="check"><i class="n-ico arrow-blue"></i></li>
				</ul>
				<a href="#" class="btn gradient btn-large">��������</a>

			</div><!--.b-row__pack_col_premium-->

		</div><!--.b-row__packages-->


		<div class="b-row b-row__architecture clearfix">
			
			<h3>����������� ������� ����</h3>

			<div class="flexslider slider-architecture">
				<ul class="slides">

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>��������� ���������</figcaption>
						</figure>
					</li>

					<!--<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>��������� ���������2</figcaption>
						</figure>
					</li>

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>��������� ���������3</figcaption>
						</figure>
					</li>

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>��������� ���������4</figcaption>
						</figure>
					</li>

					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>��������� ���������5</figcaption>
						</figure>
					</li>-->

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
							<span class="b-numb">2</span><strong>��������� �����������</strong>
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

			</div><!--.b-gray-bg-->

			<div class="b-steps__content">
				<div class="b-steps__cont_item visible">
					<p>
						������� �������� ������ ������������� �������� ������� � ���� ����������� ��������� ���������� ������ � ����� ��������� � �����. ���� �� ��� ������, ����� ������ ������ ���� ���, �� ��������� � ��������� ������ ��������� �����.
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						������� �� �������������� ����������� ����� ���������������� ������������ ������� � ����������� ������������ �������. �� ������ �������������� ������� ������������ ����� � �������������� ������ ��������� ������� ����. 
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						�� ���������� ��� ������� ������� ������ �������������� � ���������� ����� �� ������ �������� ��� ���������� ��������� ��������� �� ������ ���� ��������� �������: ��������� ������, ������������ � ��������� �����������, ������ ������������, ��������������� ������. 
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						�� ������ ������������ Elevel ��������������� �������� 1 ���, � ������� ������ 3 ������� ������������ �� ��������� ������� � �������������� �������������� �������� �������.  
					</p>
				</div>
				<div class="b-steps__cont_item">
					<p>
						� ���������� �� ������ ��������� � ���� ������� �� ��������� ������������ �� ������������� ����� ��� ���������� ������� ������ ������������, ����� � ���� ��������� �������������. 
					</p>
				</div>
			</div><!--.b-steps__content-->

		</div><!--.b-row__we-work-->


		<div class="b-row b-row__last clearfix">
			
			<div class="b-to-first-step">
				<div class="b-title3">�� ��� �� ������ ���� ����� �����...</div>
				<!--<p>�������� ������ ��� ����� ������ � �� �������� <strong>������ 5%</strong> �� ������������</p>-->
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
			</div>

			<div class="b-form-contacts clearfix">

 <div class="bottom-form" style="float: left;"> 
        <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_smart_house", Array(
    "SEF_MODE" => "N",    // �������� ��������� ���
    "AJAX_MODE" => "N",
    "WEB_FORM_ID" => "30",    // ID ���-�����
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
</div>
				

				<div class="b-pull-right">
					<p>��������� � ���������� ������ �������������<br>��� ������ ������ ��� ��������:</p>
					<span class="numb-phone">8 (495) 363-32-03</span>

					<div class="b-top-link-wrp">
						<div class="toplink1">
							<img src="/img/pic49a.gif" alt="" class="pic49">
							<a href="#" class="pp-callback" onclick="_gaq.push(['_trackEvent', 'start-call-back', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-call-back'); return true;">�������� ������<img src="/img/pic5a.gif" alt=""></a>
						</div>
						
						<div class="toplink2">
							<img src="/img/pic49b.gif" alt="" class="pic49">
							<a href="#" class="pp-sendquery" onclick="_gaq.push(['_trackEvent', 'start-request', 'action', 'opt_label', 1]); yaCounter1485305reachGoal('start-request'); return true;">��������� �����c<img src="/img/pic5a.gif" alt=""></a>
						</div>
					</div>

				</div>
				
			</div><!--.b-form-contacts-->

		</div><!--.b-row__last-->
		
	</div><!--.b-promo-->
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "����������� �����������, ��������� ������������, ��������� ������������ � �������������, �������������� � �������������, ����������� ��������� �level, �����������");
$APPLICATION->SetPageProperty("keywords", "����������� �����������, ��������� ������������, ��������� ������������ � �������������, �������������� � �������������, ����������� ��������� �level, �����������");
$APPLICATION->SetPageProperty("description", "����������� �������������� ��������� ������������ IT �� �level");
$APPLICATION->SetTitle("����������� �������������� ��������� ������������ IT �� �level");
?> 
<script>
		(function($) {
		$(function() {
			$('select.stylize').selectbox();
		})
		})(jQuery)
	</script>
<div class="b-centered b-promo clearfix">
		<h1>���������� ��������� ������������ � ��������������� ��������������</h1>
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
				<div class="b-title-orange">������� �������������� � ��������� �level</div>
					<script>
					    $(document).ready(function() {
					        $('#call_close').first().remove();
					        $('#suber').first().remove();
					        $('#config_info').remove();
					        $(".inner_params td").first().css('padding','0px');
					        
					        $(this).on( 'keypress','input[name="form_text_788"]', function (e){
					            if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
					                $(".error").html("������ �����").show().fadeOut(3000); 
					                return false;
					            }
					        });

					        function isValidEmailAddress(emailAddress) {
					            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
					            return pattern.test(emailAddress);
					        }
					        
					        $('form[name="request_systemit"]').attr('class','back_call');
					        $('form[name="request_systemit"]').attr('display','block !important');
					        $(this).on('click', '.form_subm', function() {
					            CONTACTUSER =  $(this.form).find('input[name="form_text_786"]').val();
					            PHONEUSER = $(this.form).find('input[name="form_text_788"]').val();
					            EMAIL = $(this.form).find('input[name="form_email_787"]').val();
					            MESSAGES = $(this.form).find('select[name="form_dropdown_request_time"]').val();
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
					            var m_data=$(this.form).serialize();
					            m_data = m_data + "&web_form_submit=Y";

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
	                <div id="request_systemit_1">
	                    <div class="info"></div>
	                    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
		                    <div id="bottom_form">
		                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_systemit", Array(
		                        "SEF_MODE" => "N",    // �������� ��������� ���
		                        "AJAX_MODE" => "N",
		                        "WEB_FORM_ID" => "59",    // ID ���-�����
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
	                <!--<form action="/">
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
							<input type="submit" value="������ ��������������" class="btn gradient">
							
						</div>
					</form>  -->
					<img src="/img/arrs.png" alt="" class="pic2">
					<div class="dcrpt">��� �������������� � ������� ��������� ���������� �� ���������� � ������ ������� ��������</div>
				</div><!--.b-form-->
					
				<div class="review s02 partners-review">
					<p>�� ������� ��������������, ������� ��������� ���: ������ ����, ����������� �������, ������������� � �������� �����, �������������� ������</p>
					<div class="pic"><img src="/img/build-lico.jpg"></div>
					<div class="name">����� ����������<span> (�������� �� ������ � ���������� �������������)</span></div>
				</div>
			
			
			<?/*<div class="review">
				<div class="pic"><img src="/img/build-lico.jpg"></div>
				<div class="msg">
					<div class="txt">�� ������� ��������������, ������� ��������� ���: ������ ����, ����������� �������, ������������� � �������� �����, �������������� ������</div>
					<div class="name">����� ���������� <span>(�������� �� ������ � ���������� �������������)</span></div>
				</div>
			</div>*/?>
			
		</div><!--.b-row__first-->
		<div class="system_integration">
			<div><span class="title">��������� ����������</span>��� �������, � ������� �� ��� ����� ������������ ���� ������, ������ ���������� ������� ��������� ���� �����������</div>
		</div>
		<div class="what_you_get">
			<div class="orange_title">��� �� ���������?</div>
			<div class="title i1">������ �������� ������������ �� ������� ����������� ��������������</div>
			<ul class="left">
				<li><span>��������� ��������� � ������� ������ ���, �����, �����-LS, NYM; ������ ����� UTP/FTP, �����, SAT, RG, ��, �����, ���, ���, ����, ������ ��� ������ �������-�������� ������������, �����- � ��������������; ������ � ������ ��� ��������� �����.</span></li>
				<li><span>������������� ������������ � �������� ���������� � ���, ������� ��� ����� � �������� ���������� ������������ �������, ��������������, �����, ����������������� ����� � ������ ���������� ����������. </span></li>
				<li><span>������������������� ������� � �����������, �������, ���������������, ������� ��������, ������� ��� ������� ����. </span></li>
			</ul>
			<ul class="right">
				<li><span>������������� ������� � ������, ������, �����, �������, ������������� ��������� �����, ���������������� �����. </span></li>
				<li><span>���������������� ��������� ������� (19� �����, ����-�����, ����-������, ������� �����������)</span></li>
			</ul>
			<div class="clear"></div>
			<div class="title i2">���������� ����������� ������� � ������ �������� ����� �� �� ����������:</div>
			<ul class="left">
				<li><span>������������ �� ����� ����������� ������������ ������� (�� ����������� ��������, �������� � ������� �����������)</span></li>
				<li><span>���������� �������� �� ��������� �� (������������������ ������ � ������������, ���������������� ���������� (������� ����������), ������ ������������� � ��������������� ��������, ������-�������, �������� ������� � ������ ��������, ���������� ���������� ��������������� ������ ������������ � ������������� ����������. </span></li>
				<li><span>������ � �������� ������������: ������ ������������, ������ ����������������� ������������, ������ ��� (���, ���, ��, �� � �.�.)</span></li>
				<li><span>������ ������������ � ������ �����-������������ ������������</span></li>
				<li><span>���������� ����������� ������� �� �����������</span></li>
			</ul>
			<ul class="right">
				<li><span>���������� � ��������� ������� ������������� � ��������������� �� �������� ������������ ������������� (���������� �������� ������, ��������������� ���������� ������)</span></li>
				<li><span>���������� ������� ��� ���������� ������� �� �������� ������������� � ������������ ���������� (���, ��� � �.�.)</span></li>
				<li><span>��������� ������: �������� ����� ��� ����������� ������� ���, ��������� �����-������� � ���������������� ������������, ������������ ���������� ������� �������� � ��������� �������. </span></li>
			</ul>
			<div class="clear"></div>
			<div class="orange_dott_title">��������� ������������</div>
		</div>	
		<!--<div class="b-row b-row__architecture clearfix">			
			<div class="flexslider slider-architecture">
				<ul class="slides">
					<li>
						<figure class="slider-arch__ins">
							<img src="/img/slider-arch-1.jpg" alt="">
							<figcaption>��������� ���������</figcaption>
						</figure>
					</li>
					<li>
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
					</li>
				</ul>
			</div>
		</div>-->
		<div class="b-row b-row__why clearfix">
			<h3>������ �level?</h3>			
			<div class="b-why__list">
				<article>
					<figure><img src="/img/elevel_icon1.png" alt=""></figure>
										<header>������������ �������� ������� �������</header>
					<p>������������ �������� ������ ����� �� �����, ����� ���������������� � ���� ���������� ������, ���������� �������� �� ���� ������� � ���������� ����������� ������� ����� �������, ������� ����� ���������� � ���� ���������� �������.</p>
				</article>
				<article>
					<figure><img src="/img/elevel_icon2.png" alt=""></figure>
					<header>������� ��������� ����� ������������</header>
					<p>�� ������ ������������ ����� 55 000 ������������ ��������� � ��������� ������� ����������: 19?����� � ���������� � ���, ��������� ���������, ���, ��� � ������ ������. ���������� ��������� ��������� ����������� ���������� ������ �������� ��� �������� ������ �������� � ���������.</p>
				</article>
				<article>
					<figure><img src="/img/elevel_icon3.png" alt=""></figure>
					<header>���������� ������ � ������� �������</header>
					<p>� ��������� �������� ������ ����������� ����� �������������� � ��������� �������, ��� ��������� ������������� � ����������� ������������� ������� ���� �����.  �� ���������� ����������� ����������� �������, �� �������������� ��� �� ����������� ������������ �� �������.</p>
				</article>
				<article>
					<figure><img src="/img/elevel_icon4.png" alt=""></figure>
					<header>�������� ���� �����������: ���������� � ����������������</header>
					<p>��� ������������� ���������� ������� ����� ���� ����������� �� ���� ������������, ��������������� � ������������ ��������. ������� ����������� �������������� ���������� �������������� ��������-������������� � ���������������� ���������, �� ������ ���������� ��������� ��������� ������������ � ������ ������ �������. </p>
				</article>
			</div><!--.b-why__list-->
		</div><!--.b-row__why-->
		<div class="b-row b-row__examples clearfix">
			<!--<h3>������� ����������</h3>
			<div class="flexslider slider-example">
				<ul class="slides">
					<li>
						<div class="slider-expl__ins clearfix">
							<figure>
								<img src="/img/example1.jpg" alt="">
								<a href="#" class="btn gradient">�������� ������� ������</a>
							</figure>
							<div class="slider-expl__txt">
								<header>���������� ���, ������, ������</header>
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
									<div class="b-right"><p>����</p></div>
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
									<div class="b-right"><p>���</p></div>
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
									<div class="b-right"><p>���</p></div>
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
			</div>-->
		</div>
		<div class="b-row b-row__we-work clearfix">			
			<div class="b-gray-bg">
			<h3>��� �� ��������?</h3>
			<div class="b-steps">
				<span class="blue-line gradient"></span>
				<ul class="clearfix">
					<li class="active">
						<a href="javascript: void(0)">
							<span class="b-numb">1</span><strong>������ � ��������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">2</span><strong>������ �������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">3</span><strong>��������� �����</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">4</span><strong>���������� ���������� �������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">5</span><strong>�������������� ��</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">6</span><strong>���������� ��������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
					<li>
						<a href="javascript: void(0)">
							<span class="b-numb">7</span><strong>�������� � ������ ������������</strong>
						</a>
						<span class="arrow-top"></span>
					</li>
				</ul>
			</div>
			</div><!--.b-gray-bg-->
			<div class="b-steps__content">
				<div class="b-steps__cont_item visible">
					<p>������� ������ � �������� ������� ��� �����. ��� �������� ������� ����������� �������, �������� ���� ����������� �������������� � ���������, ����� ������������ ���������� ������������ ��� ������ ������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>�� ������ ����������� �������, ������������ � ��������� ������������, ����� ���������� ����� ����������� ������� � ������ ����������� �������. ��� ������� ��� ����������� ������������ �� �����. </p>
				</div>
				<div class="b-steps__cont_item">
					<p>�� ����� ����������� ������������ �������, ������������� ���������� � ������� ��������� ����������, ����� ���������������� ������������ �� ��������� ������������ � ������������������� ���.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>����� ��� ������ �������, �� ���������� � ���������� �������, � ������� ����� ������ ��� ���������� ����������� ���������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>�� ��������� ���������� � ����������� ������������� ����������� �������� ������������ �������-������������ �������, ������� � ����� ���� ������������ ������ �������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>����� ���������� ���������������� ����� � ������������ � ���������� �� ����������� �������, � ������� ����� ������������� ���� ����� ��������������� � ����������� �������������.</p>
				</div>
				<div class="b-steps__cont_item">
					<p>����������� ���������������� ���� ��������� ��� � ������ ����� ��������� ����������� �������������� ������������, � ����������� ������ ���������� ������� ������������� ������ �������� ����� �� ������� � �����-������� ���������� ������.</p>
				</div>
			</div><!--.b-steps__content-->
		</div><!--.b-row__we-work-->
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
		<div class="b-row b-row__last clearfix">
			<div class="b-form-contacts clearfix v2">
				<div class="b-pull-left b-form">
				<div id="request_systemit_1">
                    <div class="info"></div>
                    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
	                    <div id="bottom_form">
	                    <?$APPLICATION->IncludeComponent("bitrix:form.result.new", "formResult_request_systemit", Array(
	                        "SEF_MODE" => "N",    // �������� ��������� ���
	                        "AJAX_MODE" => "N",
	                        "WEB_FORM_ID" => "59",    // ID ���-�����
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
                <!--<form action="/">
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
						<input type="submit" value="������ ��������������" class="btn gradient">
					</div>
				</form> -->
				</div><!--.b-form-->
				<div class="b-pull-right1">
					<p>��������� � ���������� ������ �� ������<br>� ���������� �������������:</p>
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
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
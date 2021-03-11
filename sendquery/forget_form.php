<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<?$IsRuss = (substr($APPLICATION->GetCurDir(), 0, 4) != '/en/');?>
<script>
$(document).ready(function() {
	$('#authriz,#authriz2').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	
	$('#suber').click(function() {
		var m_data=$("#forgoter").serialize();
		
		m_data = m_data + "&AUTH_FORM=Y";
		error = 0;
		USER_EMAIL = $('input[name="USER_EMAIL"]').val();
		textError='';
		
		if(USER_EMAIL==''){
			textError='Введите email<br>';
			error = 1;
		}
		if(error == 0){		
		$.ajax({
			async: true,
			type: "POST",
			url: '/sendquery/fforget.php',
			dataType: "text",
			data: m_data,
			beforeSend: function() {
			},
			error:function(result) {
				
			},
			
			success: function(result) {
				//$('.table10').hide();
				
				(window['rrApiOnReady'] = window['rrApiOnReady'] || []).push(function() { rrApi.setEmail(USER_EMAIL); });
				$("#error").empty();
				$(".table10").hide();
				 $('.error').empty().hide();
				 $('.info').empty();
				 $('.info').show();
				 
				 $('.info').html('На указанный вами e-mail отправлена регистрационная информация.');
				//
			}
		});
		return false;}
		else {
			$('.error').show();
			$('.error').html(textError);
			}

	});
	
$('#call_close,#call_close1').click(function() {
	$('#fade, #container2, .popup398').css('display','none');
});

});
</script>


		<?/*if (isset($_GET['register']) && $_GET['register'] == "Y"):?>
			<u>регистрация</u>
		<?else :?>
			<a href="/auth/?register=Y" title="Зарегистрированные пользователи имеют доступ к личному кабинету и просмотру истории заказов">регистрация</a>
		<?endif;*/?>
 
<h6 style="*margin-top: -7px;">Восстановить пароль<img src="/i/pix.gif" alt="" width="18" height="19" id="authriz"/></h6>
<div class="info" style="margin-bottom: 20px;padding: 50px 30px;text-align: center; display:none;">
</div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;">
    
    </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	"forget",
	Array(
		
	),
false
);?>
			

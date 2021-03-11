<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<?$IsRuss = (substr($APPLICATION->GetCurDir(), 0, 4) != '/en/');?>
<script>
$(document).ready(function() {
	$('#authriz,#authriz2').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	$('.forget_form').click(function() {
		$('.popup398Content').empty().load('/sendquery/forget_form.php');
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);
	});

	$('.registr').click(function() {
		$('.popup398Content').empty().load('/sendquery/registr.php');
		var x = $('body').height();
		$('#fade').height(x);
		$('#container2, .popup398').css('display','block');
		$('#fade').fadeTo('slow',0.5);
	});
	
	$('#suber').click(function() {
		var m_data=$("#auth_form").serialize();
		
		if(($.browser.msie) && ($.browser.version == '7.0')){
			var regexS = "[\\?&]USER_LOGIN=([^&#]*)";
	  		var regex = new RegExp(regexS);
	  		var login = regex.exec(m_data);
	  		
			var regexS = "[\\?&]USER_PASSWORD=([^&#]*)";
	  		var regex = new RegExp(regexS);
	  		var password = regex.exec(m_data);
			
			var regexS = "[\\?&]backurl=([^&#]*)";
	  		var regex = new RegExp(regexS);
	  		var backurl = regex.exec(m_data);

			var m_data = "backurl=" + backurl[1] + "&AUTH_FORM=Y&TYPE=AUTH&USER_LOGIN="+ login[1] +"&USER_PASSWORD="+ password[1] +"&login=yes";
		}else{			
			var m_data = m_data + "&login=yes";			
		}
		
		var urlback=$('input[name="backurl"]').val();
		$.ajax({
			async: true,
			type: "POST",
			url: '/sendquery/fauth.php',
			dataType: "text",
			data: m_data,
			beforeSend: function() {
			},
			error:function(result) {
				
			},
			
			success: function(result) {
				$("#error").empty();
                //alert (result);
                if(result.indexOf('error') + 1) {
                //if(result.length==169){
                    
                    $("#error").append('Неверный логин или пароль!');
                } 
                else
                {
                    location.reload();
                }
			}
		});
		return false;

	});
	
$('#call_close,#call_close1').click(function() {
	$('#fade, #container2, .popup398').css('display','none');

});
$('html').keydown(function(eventObject){ 
  if (eventObject.keyCode == 13) { 
    $('#suber').trigger('click');
  } 
});

});
</script>
<style>
.butArea {
    position: absolute;
    margin-top: -40px;
}
</style>
 
<h6>Авторизация<img src="/i/pix.gif" alt="" width="18" height="19" id="authriz"/></h6>

<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "authorize", 
		array("REGISTER_URL"=>"/auth/","PROFILE_URL"=>"/personal/profile/","SHOW_ERRORS"=>"Y"),false);?>
			
<p style="margin: -35px 35px 20px 35px;"><br>Нажимая на кнопку "Отправить", я соглашаюсь на передачу и обработку <a href="/upload/agreement.pdf" target="_blank">персональных данных</a>.</p>

<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<script>
$(document).ready(function() {
	$(".table10").append('<tr><td colspan="2"><p class="txt8"><span>*</span> Обязательные для заполнения поля.</p><a style="padding-left:10px" class="btn140" id="call_close" href="#"><img alt="" id="call_close1" src="/i/btn140f.gif"></a><a class="btn140" href="#" id="suber"><img alt="" src="/i/btn140g.gif"></a></td></tr>')
	$('#callback_close,#call_close').click(function() {
		$('#fade, #container2, .popup560').css('display','none');
	});
	
	$(".inner_params td").css('padding','0px');

	$('input[name="form_text_314"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("Только цифры").show().fadeOut(3000); 
			return false;
		}
	});

	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
	
	$('form[name="presentation"]').attr('id','back_call');
	
	$('#suber').click(function() {
		NAMEUSER = $('input[name="form_text_313"]').val();
		EMAIL = $('input[name="form_email_315"]').val();
		PHONEUSER = $('input[name="form_text_314"]').val();
		
		textError='';
		error = 0;
		
		if(NAMEUSER==''){textError='Введите имя<br>';error = 1;};
		if(EMAIL==''){
			textError+='Не введен email<br>';
			error = 1;
		} else {
		if(!isValidEmailAddress(EMAIL)){
			textError+='Не корректный email<br>';
	    };}
	    
		if(PHONEUSER==''){textError+='Введите номер телефона<br>';error = 1;};
		
		
		if(error == 0){
			
		var m_data=$("#back_call").serialize();
		m_data = m_data + "&web_form_submit=Y";
		
		$.ajax({
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
				$('.table10').hide();
				$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')
			}
		});
		return false;
		} else{
			$('.error').empty();
			$('.error').show().fadeOut(3000);
			$('.error').html(textError);
		}
	});
	
$('#call_close,#call_close1').click(function() {
	$('#fade, #container2, .popup398').css('display','none');

});

$(".inputtext").attr('class','w170');

$('textarea').attr('class','h92');

$("#form_dropdown_profile").attr('class','sel1');
$('input[name="web_form_submit"]').css('display','none');
});
</script>
<h6>Опросник для создания щита на заказ<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>
<div id="simul_form">
<div class="info"></div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"WEB_FORM_ID" => 32,	// ID веб-формы
	"LIST_URL" => "/sendquery/sended.php",	// Страница со списком результатов
	"EDIT_URL" => "/sendquery/sended.php",	// Страница редактирования результата
	"SUCCESS_URL" => "/sendquery/sended.php",	// Страница с сообщением об успешной отправке
	"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
	"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
	"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
	"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
	"CACHE_TYPE" => "A",	// Тип кеширования
	"CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	)
);?>
</div>

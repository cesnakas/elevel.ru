<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<?if(!$_REQUEST["submit"]){?>
<script>

$(document).ready(function() {
	
	$('input[name="form_text_598"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("Только цифры").show().fadeOut(3000); 
			return false;
		}
	});
    
	$(".table10").append('<tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> Обязательные для заполнения поля.</p><span id="call_close"><img src="/i/btn140f.gif"></span><span id="suber"><img src="/i/btn140g.gif"></span></td></tr>');

	$('#callback_close,call_close').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	
	$('form[name="order_call"]').attr('id','back_call');

	$('#suber').click(function() {
		_gaq.push(['_trackEvent', 'called-back', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('called-back');
		NAMEUSER = $('input[name="form_text_596"]').val();
		PHONEUSER = $('input[name="form_text_598"]').val();
		COMPANY = $('input[name="form_text_597"]').val();
		EMAIL = $('input[name="form_email_599"]').val();
		textError='';
		error = 0;
 function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp("[0-9a-z_]+@[0-9a-z_^.]+\\.[a-z]{2,3}", 'i');
	    return pattern.test(emailAddress);
	}
		if(NAMEUSER==''){
			textError='Введите имя<br>';
			$('input[name="form_text_596"]').css('border-color','#F25B26');
			error = 1;}
		else {
			$('input[name="form_text_596"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
			
			}
		if(PHONEUSER==''){
			$('input[name="form_text_598"]').css('border-color','#F25B26');
			textError+='Введите номер телефона<br>';error = 1;
			}
		else {
			$('input[name="form_text_598"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
			}
		if(COMPANY==''){
			textError+='Введите название организации<br>';
			$('input[name="form_text_597"]').css('border-color','#F25B26');
			error = 1;}
		else {
			$('input[name="form_text_597"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
			
			}
		if(EMAIL==''){
			textError+='Введите e-mail<br>';
			$('input[name="form_email_599"]').css('border-color','#F25B26');
			error = 1;}
		else {
			$('input[name="form_email_599"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
			
			}
		if(!isValidEmailAddress(EMAIL)){
			textError+='Не корректный email';
			$('input[name="form_email_599"]').css('border-color','#F25B26');
			error = 1;
		}
		if(error == 0){
		var m_data=$("form[name='ZAKAZ_PROSCHET']").serialize();
		
		m_data = m_data + "&web_form_submit=Y";
		
		$.ajax({
			async: true,
			type: "POST",
			url: '/sendquery/fproschet.php',
			dataType: "text",
			data: m_data,
			beforeSend: function() {
			},
			error:function(result) {
				alert(result);
			},
			
			success: function(result) {
				$('.table10').hide();
				$("#simul_form").empty();
				$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')
			}
		});
		return false;
		} else {
			$('.error').empty();
			$('.error').show().fadeOut(3000);
			$('.error').html(textError);
		}
	});
	
	
$('#call_close,#call_close1').click(function() {
	$('#fade, #container2, .popup398').css('display','none');
});

$(".inputtext").attr('class','w215');
$("#form_dropdown_TIME,#form_dropdown_CITY").attr('class','sel1');
$('input[name="web_form_submit"]').parent().parent().css('display','none');
});
</script>

<style type="text/css">
		#back_call .table10 select{width: 216px; font-size: 12px;} 
		#call_close {left:113px;}
		#suber {left:301px;}
</style>

<h6 style="*margin-top: -7px;">Заказать просчет<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>

<div id="simul_form">
<div class="info"></div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;">
    
</div>
	<?$APPLICATION->IncludeComponent(
		"doal:form.result.new",
		"",
		Array(
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"WEB_FORM_ID" => "38",	// ID веб-формы
		"LIST_URL" => "/sendquery/sended.php",	// Страница со списком результатов
		"EDIT_URL" => "/sendquery/sended.php",	// Страница редактирования результата
		"SUCCESS_URL" => "/sendquery/sended.php",	// Страница с сообщением об успешной отправке
		"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
		"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
		"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
		"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
		"CACHE_TYPE" => "N",	// Тип кеширования
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
		)
	);?>
</div>

<?}
else{?>

<?	
}
?>

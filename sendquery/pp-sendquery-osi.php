<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<script>
$(document).ready(function() {
	$(".table10").append('<tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> Обязательные для заполнения поля.</p></td></tr>');
	$(".popup560Content").append('<span id="call_close" style="bottom: -50px;left: 140px;"><img src="/i/btn140f.gif"></span><span id="suber"  style="bottom: -50px;left: 300px;"><img src="/i/btn140g.gif"></span>');

	$('#callback_close,#call_close').click(function() {
		$('#fade, #container2, .popup560').css('display','none');
	});
	
	$(".inner_params td").css('padding','0px');

	$('input[name="form_text_119"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("Только цифры").show().fadeOut(3000); 
			return false;
		}
	});

	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
	
	$('form[name="SIMPLE_FORM_OSI_IT"]').attr('id','pp-sendquery-osi');
	
	$('#suber').click(function() {
		NAMEUSER = $('input[name="form_text_117"]').val();
		EMAIL = $('input[name="form_email_121"]').val();
		PHONEUSER = $('input[name="form_text_119"]').val();
		
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
$("#form_dropdown_TIME,#form_dropdown_CITY").attr('class','sel1');
$('input[name="web_form_submit"]').css('display','none');

 function radio_dis(pref){
	 var all_labels= $('#pop_old_radio_'+pref).find('label');
	 for (var i = 1, l = all_labels.length; i < l; i += 2) {
	 	$("#list_class_"+pref).append('<li id="'+pref+'_'+i+'"></li>');
	 	var lab_id=$(all_labels[i]).children('input').attr('id');
	 	$("#"+pref+"_"+i).append($(all_labels[i-1]).children('input'));
	 	$("#"+pref+"_"+i).append('<img src="/i/pic12unchecked.gif"  />');
	 	$("#"+pref+"_"+i).append('<label for="'+lab_id+'">'+$(all_labels[i]).children().text()+'</label>');

	 }

	 $('#pop_new_radio_'+pref+' ul li label').each(function() {
	 	$(this).click(function() {
	 		$('#pop_new_radio_'+pref+' ul li img').attr({'src':'/i/pic12unchecked.gif'});				   
	 		$(this).prev().attr({'src':'/i/pic12checked.gif'});
	 		$(this).prev().prev().attr("checked", "checked");				   			
	 	});
	 });
	 $('#pop_old_radio_'+pref).hide();
	 $("#list_class_"+pref+" li").css('width','150px');
}
 radio_dis('manuf');
 radio_dis('ftype');
 radio_dis('fmat');

});
</script>
<h6>Отправить запрос системному интегратору IT<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>
<div id="simul_form" style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;">

<div class="info"></div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// Включить поддержку ЧПУ
	"WEB_FORM_ID" => 36,	// ID веб-формы
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
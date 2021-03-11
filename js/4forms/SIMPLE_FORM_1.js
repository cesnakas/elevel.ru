$(document).ready(function() {

	$('input[name="form_text_7"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("Только цифры").show().fadeOut(3000); 
			return false;
		}
	});

	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
	
	$('#callback_close,call_close').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	
	//$('form[name="SIMPLE_FORM_1"]').attr('id','back_call');

	$('#suber').click(function() {
		NAMEUSER = $('input[name="form_text_6"]').val();
		EMAIL = $('input[name="form_email_8"]').val();
		PHONEUSER = $('input[name="form_text_7"]').val();
		MESSAGE=$('textarea[name="form_textarea_18"]').val();
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
		if(MESSAGE==''){textError+='Введите сообщение<br>';error = 1;};
		
	});
	
	
$('#call_close,#call_close1').click(function() {
	$('#fade, #container2, .popup398').css('display','none');
});

$("#form_dropdown_profdeyat,#form_dropdown_uoffice").attr('class','sel1');
$(".sel1").css('width','170px');
$('input[name="form_file_284"]').attr('size','12');


$('input[name="form_text_9"],input[name="form_email_8"],input[name="form_text_6"]').attr('class','w170');
$('textarea').attr('class','h92');

$('input[name="form_text_7"]').attr('class','w170');
});
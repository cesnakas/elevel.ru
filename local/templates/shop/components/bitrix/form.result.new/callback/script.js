$(document).ready(function(){

	$( "#callback_form" ).submit(function( event ) {
		event.preventDefault();		
		
		var errors = false;
		var errors_text = "";
		
		var phone = $("#callback_phone").val();
		var rv_phone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
		
		if(!rv_phone.test(phone))
		{
			errors_text += "Введите корректный номер телефона<br/>";
			errors = true;
		}
		
		if (!errors)
		{		
			$.post("/shop/ajax/callback.php", $( "#callback_form" ).serialize(), function(data){
				if (data.type == 'error') {
					$("#callback_errors").html(data.message);
				} else {
					$("#callback_form").html('<div class="text-orange">Спасибо, Ваш запрос принят! В ближайшее время с вами свяжется наш менеджер.</div>');
				}
			}, 'json');
		}
		else
		{
			$("#callback_errors").html(errors_text);
		}
	});
	
	// , #order-call form
});
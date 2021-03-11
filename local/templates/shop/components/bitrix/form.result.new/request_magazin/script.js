$(document).ready(function(){

	$( "#request_form_magazin" ).submit(function( event ) {
		event.preventDefault();		
		
		var errors = false;
		var errors_text = "";
		
		var email = $("#request_email_magazin").val();
		
		var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		
		if(!rv_email.test(email))
		{
			errors_text += "Введите корректный email<br/>";
			errors = true;
		}
		
		if (!errors)
		{		
			$.post("/shop/ajax/request.php", $( "#request_form_magazin" ).serialize(), function(data){
				if (data.type == 'error') {
					$("#request_errors_magazin").html(data.message);
				} else {
					$("#request_form_magazin").html('<div class="text-orange">Спасибо, Ваш запрос принят! В ближайшее время с вами свяжется наш менеджер.</div>');
				}
			}, 'json');
		}
		else
		{
			$("#request_errors_magazin").html(errors_text);
		}
	});
	
});
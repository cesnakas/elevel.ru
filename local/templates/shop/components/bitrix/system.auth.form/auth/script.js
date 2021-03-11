$(document).on('submit', 'div#sign form', function(){
    var $form = $(this);
	
	var errors = false;
	var errors_text = "";
	
	var login = $("#user_login").val();
	var pass = $("#user_pass").val();
	
	if (login == '')
	{
		errors_text += "¬ведите логин или номер телефона<br/>";
		errors = true;
	}
	
	if (pass == '')
	{
		errors_text += "¬ведите пароль<br/>";
		errors = true;
	}
	
	var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	var rv_phone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
	
	// if(!rv_email.test(login) && !rv_phone.test(login))
	// {
		// errors_text += "¬ведите корректный логин или номер телефона<br/>";
		// errors = true;
	// }
	
	if (!errors)
	{
		$('input', $form).removeAttr('disabled');
	
	
		$.post($form.attr('action'), $form.serialize(), function(data){
			if (data.type == 'error') {
				$("#sign_errors").text(data.message);
			} else {
				window.location = window.location;
			}
		}, 'json');
	}
	else
	{
		$("#sign_errors").html(errors_text);
	}
	
	return false;
});
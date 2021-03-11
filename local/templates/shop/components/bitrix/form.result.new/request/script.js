$(document).ready(function(){


	var $files = [];
	$('#request_form input[type=file]').on('change', function () {
		var $this = $(this);
		/*получаем загруженные файлы*/
		if($this[0].files.length && $files.length <= 4) {
			$files = $files.concat(Object.keys($this[0].files).map((i) => $(this)[0].files[i]));
		}

		arF = "";
		count = 1;
		$.each($files, function (index,file) {
			if(count <= 4) {
				arF += file.name + '<br>';
			}
			count++;
		});

		id = $this.attr('id');
		$this.parent().find('.file-name').html(arF);

		if($files.length>=4) {
			$this.parent().find('label[for=' + id + ']').hide();
		}
	});

	$( "#request_form" ).submit(function( event ) {
		event.preventDefault();		
		
		var $form = $(this);
		var errors = false;
		var errors_text = "";
		
		var phone = $("#request_phone").val();
		var email = $("#request_email").val();
		
		var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		var rv_phone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
		
		if(!rv_email.test(email))
		{
			errors_text += "Введите корректный email<br/>";
			errors = true;
		}
		
		if(!rv_phone.test(phone))
		{
			errors_text += "Введите корректный номер телефона<br/>";
			errors = true;
		}
		
		if (!errors)
		{		
			/*$.post("/shop/ajax/request.php", $( "#request_form" ).serialize(), function(data){
				if (data.type == 'error') {
					$("#request_errors").html(data.message);
				} else {
					$("#request_form").html('<div class="text-orange">Спасибо, Ваш запрос принят! В ближайшее время с вами свяжется наш менеджер.</div>');
				}
			}, 'json');*/


			var formData = new FormData(this);

			/*добавляем загруженные файлы в formData*/
			var i = 0;
			$form.find('input[type=file]').each(function () {
				var $this = $(this);
				if($files[i]) {
					formData.append($this.attr('name'), $files[i]);
				}
				i++;
			});
			
			$.ajax({
				url: "/shop/ajax/request.php",
				data: formData,
				processData: false,
				contentType: false,
				type: 'POST',
				dataType: 'json',
				success: function (data) {
					console.log(data);
					
					if (data.type == 'error') {
						$("#request_errors").html(data.message);
					} else {
						$("#request_form").html('<div class="text-orange">Спасибо, Ваш запрос принят! В ближайшее время с вами свяжется наш менеджер.</div>');
					}
				}
			});
		}
		else
		{
			$("#request_errors").html(errors_text);
		}
	});
	
	// , #order-call form
});
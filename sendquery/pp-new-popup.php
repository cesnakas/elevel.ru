<?
require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<?//if(!$_REQUEST["submit"]){?>
<script type="text/javascript" src="/js/masked.js"></script>
<script type="text/javascript" src="/js/jquery.form.js"></script>


<style>
	.modal.callmodal.hide {
	    border-radius: 6px;
    }
	.callmodal .close {
		color: #fff;
		text-shadow: none;
	}
	.callmodal .modal-header {
	    background-color: #434a54;
	    color: #fff;
	}
	.modal.callmodal.hide{
	    display: none !important;
	}
	.modal.callmodal.hide.in{
	    display: block !important;
	}
	.modal.callmodal.hide{
	    display: none;
	    background: #fff;
	    width: 460px;
	    margin: 0 auto;
	    top: 50%;
	    margin-top: -200px;
	    height: 440px;
	    overflow: hidden;
	}
	.modal.callmodal h2{
	    margin: -5px 0 0;
	    font-family: "FanklinGthicDmi",Arial;
	    font-weight: normal;
	}
	.okajax{
	    font-size: 16px;
	    font-family: "FanklinGthicDmi",Arial;
	    font-weight: normal;
	}
	.modal.callmodal .table10{
		width: 100%;
	}
	.modal.callmodal .table10 td{
		vertical-align: top;
    font-family: "franklingothicbook", sans-serif;
    font-size: 16px;
	}
	.modal.callmodal p{
		vertical-align: top;
    font-family: "franklingothicbook", sans-serif;
    font-size: 16px;
	}	
	.modal.callmodal .table10 td:first-child p{
	    width:140px;
	}
	.modal.callmodal .table10 input[type=text],.modal.callmodal .table10 select,.modal.callmodal .table10 input[type=file]{
		width: 280px;
		height: 29px;
		margin-bottom: 5px;
	}
	.modal.callmodal .table10 tr:nth-child(4),
	.modal.callmodal .table10 tr:nth-child(5),
	.modal.callmodal .table10 tr:nth-child(6)
	{
		/*display: none;*/
	}
	.modal.callmodal .table10 textarea{
		width: 280px;
		height: 60px;
	}
	.modal.callmodal .table10 input[type=submit]{
		display: none;
	}
	.modal.callmodal .table10 input.error{
	    display: block !important;
	    border: 1px solid red;
	}
	.modal.callmodal .table10 input.ok{
	    display: block !important;
	    border: 1px solid green;
	}
	.modal.callmodal #suber{
		line-height: 30px;
		display: block;
		font-size: 14px;
		color: gray;
		border: 2px solid gray;
		border-radius: 3px;
		padding: 0 15px;
		margin-left: 35%;
		margin-top: 10px;
		-webkit-transition: all linear 0.3s;
		-o-transition: all linear 0.3s;
		transition: all linear 0.3s;
		background: #fff;
		cursor: pointer;
		width: 100px;
		text-align: center;
	}
	.modal.callmodal #suber:hover{
		color: #000;
		border: 2px solid #000;
	}


</style>
<div id="simul_form">
	<div class="info"></div>
	<div class="error"></div>
	<?$APPLICATION->IncludeComponent(
		"doal:form.result.new",
		"elevel-new",
		Array(
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"WEB_FORM_ID" => "92",	// ID веб-формы
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
	<span id="suber" class="tz_form_send_btn">Отправить</span>
    
    <p><br>Нажимая на кнопку "Отправить", я соглашаюсь на передачу и обработку <a href="/upload/agreement.pdf" target="_blank">персональных данных</a>.</p>
    
</div>
<script>
$(document).ready(function() {
	$('input[name="form_text_1107"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
            var errorValidPhone = "<p class='error'>Только цифры</p>";
            $('input[name="form_text_1107"]').addClass("error");
			return false;
		}
        else{
            $('input[name="form_text_1107"]').addClass("ok");
        }
	});
    $('input[name="form_text_1107"]').mask("+7(999) 999-99-99");
	$('form[name="callwant"]').keypress(function (e){
		if(e.which==13){
			return false;
		}
	});   
	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}	
	$('form[name="callwant"]').attr('id','back_call');
	$('form[name="callwant"]').attr('accept-charset','windows-1251');		
	$('form#back_call').ajaxForm({
		success: function(data) {

			//$("#modalcall .loadcall").html(data);
			$('.table10').hide();
			$('#suber').hide();
			$("#simul_form").append('<div class="okajax">Ваш запрос успешно отправлен!</div>');		    
        } 
	});	
	$('#suber').click(function() {

			console.log("CLICKED");
        var erroreValidName = "<p class='error'>Введите имя</p>";
        var erroreValidEmail = "<p class='error'>Не введен email</p>";
        var erroreValidEmail2 = "<p class='error'>Не корректный email</p>";
        var erroreValidPhone2 = "<p class='error'>Введите номер телефона</p>";
		//_gaq.push(['_trackEvent', 'done_request', 'action', 'opt_label', 1]); 
		//yaCounter1485305.reachGoal('done_request'); 
		NAMEUSER = $('input[name="form_text_1105"]').val();
		EMAIL = $('input[name="form_email_1106"]').val();
		PHONEUSER = $('input[name="form_text_1107"]').val();
		FILE = $('input[name="form_file_1109"]').val();
		textError='';
		error = 0;
			console.log("2");  
		if(NAMEUSER==''){
			console.log("NAMEUSER",NAMEUSER);
            $('input[name="form_text_1105"]').addClass("error");
            $('input[name="form_text_1105"]').removeClass("ok");
            error = 1;
        }
        else{
            $('input[name="form_text_1105"]').removeClass("error");
            $('input[name="form_text_1105"]').addClass("ok");
        };
		if(EMAIL==''){
			console.log("EMAIL1",EMAIL);
            $('input[name="form_email_1106"]').addClass("error");
            $('input[name="form_email_1106"]').removeClass("ok");
			error = 1;
		} else {
            $('input[name="form_email_1106"]').removeClass("error");
            $('input[name="form_email_1106"]').addClass("ok");

		    if(!isValidEmailAddress(EMAIL)){
                $('input[name="form_email_1106"]').addClass("error");
            $('input[name="form_email_1106"]').removeClass("ok");
	        } else{
            $('input[name="form_email_1106"]').removeClass("error");
                $('input[name="form_email_1106"]').addClass("ok");
            };
            
        }	  
			console.log("3");  
		if(PHONEUSER==''){
            $('input[name="form_text_1107"]').addClass("error"); 
            $('input[name="form_text_1107"]').removeClass("ok");
            error = 1;
        }
        else{
            $('input[name="form_text_1107"]').removeClass("error");
            $('input[name="form_text_1107"]').addClass("ok");
        }
        if(FILE!=""){//xls,doc,xlsx,dox,jpg,png,jpeg,rar,zip,7z,csv
			console.log("FILE");
        	if( FILE.indexOf('csv') != -1 || FILE.indexOf('xls') != -1 || FILE.indexOf('doc') != -1 || FILE.indexOf('docx') != -1 || FILE.indexOf('jpg') != -1 || FILE.indexOf('png') != -1 || FILE.indexOf('jpeg') != -1 || FILE.indexOf('rar') != -1 || FILE.indexOf('zip') != -1 || FILE.indexOf('7z') != -1){
			console.log("GOOD_BEFORE");
            	$('input[name="form_file_1109"]').removeClass("error");
            	$('input[name="form_file_1109"]').addClass("ok");
			console.log("GOOD");
        	}else{
            	$('input[name="form_file_1109"]').addClass("error"); 
            	$('input[name="form_file_1109"]').removeClass("ok");
            	error = 1;
			console.log("BAD");
        	}
        	
        }
		if(error == 0){
			console.log("YES");
                         _gaq.push(['_trackEvent', 'verhnyaya-knopka-zapros-new', 'send']);
                        _gaq.push(['_trackPageview', '/verhnyaya-knopka-zapros-new_send']); 
                        yaCounter1485305.reachGoal('verhnyaya-knopka-zapros-new_send');
 			$('form#back_call').attr("action", "https://www.elevel.ru/sendquery/add_callback_new.php");
			$('#back_call').submit();
		} else {
			console.log("NO");
			$('.error').empty();
			//$('.error').show().fadeOut(3000);
			$('.error').html(textError);
		}
	});	
});
</script>
<?//}?>

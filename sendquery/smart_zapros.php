<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<script>

$(document).ready(function() {
	$(".table10").append('<tr><td colspan="4" style="padding-top:10px;"><p class="txt8"><span>*</span> ������������ ��� ���������� ����.</p></td></tr><tr><td colspan="2" style="padding-top:10px;"> <span id="call_close2" style="padding-left: 100px; padding-right: 20px;"><img src="/i/btn140f.gif"  /></span><span id="suber2"><img src="/i/btn140g.gif"  /></span></td> </tr>');
	$(".popup398Content").append('<span id="call_close" style="bottom: -50px;left: 50px;"><img src="/i/btn140f.gif"></span><span id="suber"  style="bottom: -50px;left: 200px;"><img src="/i/btn140g.gif"></span>');
	$('#callback_close,#call_close,#callback_close2,#call_close2').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	$(".table11").css('width','330px');
	
	$(".inner_params td").css('padding','0px');

	$('input[name="form_text_411"],input[name="form_text_438"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("������ �����").show().fadeOut(3000); 
			return false;
		}
	});

	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
	
	$('form[name="smart_house_lazy"]').attr('id','back_call_lazy');
	$('form[name="smart_house"]').attr('id','back_call_house');
	
	
	$('#suber').click(function() {
		NAMEUSER = $('input[name="form_text_436"]').val();
		PHONEUSER = $('input[name="form_text_438"]').val();
		
		textError='';
		error = 0;
		
		if(NAMEUSER==''){
			textError='������� ���<br>';error = 1;
			//$('input[name="form_text_436"]').css('border','1px #DB5A00 solid');
			};
		
		if(EMAIL==''){
			textError+='�� ������ email<br>';
			error = 1;
		} else {
		if(!isValidEmailAddress(EMAIL)){
			textError+='�� ���������� email<br>';
	    };}
	    
		if(PHONEUSER==''){textError+='������� ����� ��������<br>';error = 1;};
		
		
		if(error == 0){
			
		var m_data=$("#back_call_lazy").serialize();

		m_data = m_data +"&web_form_submit=Y";
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
				$('.table11').hide();
				$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">��� ������ ������� ���������!</div>')
			}
		});
		return false;
		} else{
			$('.error').empty();
			$('.error').show().fadeOut(3000);
			$('.error').html(textError);
		}
	});
	
	/* simply*/
	$('#suber2').click(function() {
		CONTACTUSER = $('input[name="form_text_409"]').val();
		PHONEUSER2 = $('input[name="form_text_411"]').val();
		EMAIL = $('input[name="form_text_410"]').val();
		MESSAGES=$('textarea[name="form_textarea_412"]').val();
		textError='';
		error = 0;
		
		
		
		if(CONTACTUSER==''){textError='������� ���������� ����<br>';error = 1;};
		
		
		if(EMAIL==''){
			textError+='�� ������ email<br>';
			error = 1;
		} else {
		if(!isValidEmailAddress(EMAIL)){
			textError+='�� ���������� email<br>';
	    };}
	    
		if(PHONEUSER2==''){textError+='������� ����� ��������<br>';error = 1;};
		if(MESSAGES==''){textError+='������� �����������<br>';error = 1;};
		
		if(error == 0){
			
		
		var m_data2=$("#back_call_house").serialize();
		m_data2 = m_data2+ "&web_form_submit=Y";
		$.ajax({
			async: true,
			type: "POST",
			url: '/sendquery/home_fcallback.php',
			dataType: "text",
			data: m_data2,
			beforeSend: function() {
			},
			error:function(result) {
				alert(result);
			},
			
			success: function(result) {
				$('.table10').hide();
				$('.table11').hide();
				$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">��� ������ ������� ���������!</div>')
			}
		});
		return false;
		} else{
			$('.error').empty();
			$('.error').show().fadeOut(3000);
			$('.error').html(textError);
		}
	});

/**/	
$(".inputtext").attr('class','w170');
$("#form_dropdown_TIME,#form_dropdown_CITY").attr('class','sel1');
$('input[name="web_form_submit"]').css('display','none');
$("#form_dropdown_call_time").attr('class','sel1');
$(".sel1").css('width','170px');
$('textarea').attr('class','h93');
$('textarea').parent().parent().prev().children().css('padding-bottom','0px');
$('textarea').wrap("<center></center>");

/*for system*/
var all_labels= $('#pop_old_radio_sys').find('label');

for (var i = 1, l = all_labels.length; i < l; i += 2) {
	$("#list_class_system").append('<li id="sys_'+i+'"></li>');
	var lab_id=$(all_labels[i]).children('input').attr('id');
	$("#sys_"+i).append($(all_labels[i-1]).children('input'));
	$("#sys_"+i).append('<img src="/i/pic12unchecked.gif"  />');
	$("#sys_"+i).append('<label for="'+lab_id+'">'+$(all_labels[i]).children().text()+'</label>');

}

$('#pop_new_radio_sys ul li label').each(function() {
	$(this).click(function() {
		$('#pop_new_radio_sys ul li img').attr({'src':'/i/pic12unchecked.gif'});				   
		$(this).prev().attr({'src':'/i/pic12checked.gif'});
		$(this).prev().prev().attr("checked", "checked");				   			
	});
});
$('#pop_old_radio_sys').hide();

/*for obj*/
  
 
var all_labels= $('#pop_old_radio_obj').find('label');

for (var i = 1, l = all_labels.length; i < l; i += 2) {
	$("#list_class_obj").append('<li id="obj_'+i+'"></li>');
	var lab_id=$(all_labels[i]).children('input').attr('id');
	$("#obj_"+i).append($(all_labels[i-1]).children('input'));
	$("#obj_"+i).append('<img src="/i/pic12unchecked.gif"  />');
	$("#obj_"+i).append('<label for="'+lab_id+'">'+$(all_labels[i]).children().text()+'</label>');

}

$('#pop_new_radio_obj ul li label').each(function() {
	$(this).click(function() {
		$('#pop_new_radio_obj ul li img').attr({'src':'/i/pic12unchecked.gif'});				   
		$(this).prev().attr({'src':'/i/pic12checked.gif'});
		$(this).prev().prev().attr("checked", "checked");				   			
	});
});
$('#pop_old_radio_obj').hide();
});

</script>
<?/*
<script type="text/javascript" src="/js/home-form.js"></script>
*/?>
<h6>������� ������<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>
<div id="simul_form">
<div class="info"></div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>

<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"WEB_FORM_ID" => "smart_house_lazy",	// ID ���-�����
	"LIST_URL" => "/sendquery/sended.php",	// �������� �� ������� �����������
	"EDIT_URL" => "/sendquery/sended.php",	// �������� �������������� ����������
	"SUCCESS_URL" => "/sendquery/sended.php?WEB_FORM_ID",	// �������� � ���������� �� �������� ��������
	"CHAIN_ITEM_TEXT" => "",	// �������� ��������������� ������ � ������������� �������
	"CHAIN_ITEM_LINK" => "",	// ������ �� �������������� ������ � ������������� �������
	"IGNORE_CUSTOM_TEMPLATE" => "N",	// ������������ ���� ������
	"USE_EXTENDED_ERRORS" => "N",	// ������������ ����������� ����� ��������� �� �������
	"CACHE_TYPE" => "A",	// ��� �����������
	"CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"VARIABLE_ALIASES" => array(
		"WEB_FORM_ID" => "WEB_FORM_ID",
		"RESULT_ID" => "RESULT_ID",
	)
	)
);?>
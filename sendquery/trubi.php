<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<script>
$(document).ready(function() {
	$(".table10").append('<tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> ������������ ��� ���������� ����.</p></td></tr>');

	$(".popup398Content").append('<span id="call_close" style="bottom: -50px;left: 40px;"><img src="/i/btn140f.gif"></span><span id="suber"  style="bottom: -50px;left: 200px;"><img src="/i/btn140g.gif"></span>');

	$('#callback_close,#call_close').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	
	$('input[name="form_text_66"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("������ �����").show().fadeOut(3000); 
			return false;
		}
	});

	function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
	
	$('form[name="SIMPLE_FORM_5"]').attr('id','back_call');

	$('#suber').click(function() {
		_gaq.push(['_trackEvent', 'sent_trubi', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_trubi'); 
		NAMEUSER = $('input[name="form_text_65"]').val();
		EMAIL = $('input[name="form_email_68"]').val();
		
		textError='';
		error = 0;
		if(NAMEUSER==''){textError='������� ���<br>';error = 1;};
		if(EMAIL==''){
			textError+='�� ������ email<br>';
			error = 1;
		} else {
		if(!isValidEmailAddress(EMAIL)){
			textError+='�� ���������� email<br>';
	    };}
	    
		
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
				$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">��� ������ ������� ���������!</div>')
			}
		});
		return false;
		} 
		else {
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
});
</script>
<h6>������ �����<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>
<div style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;" id="simul_form">
<div class="info"></div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"WEB_FORM_ID" => 5,	// ID ���-�����
	"LIST_URL" => "/sendquery/sended.php",	// �������� �� ������� �����������
	"EDIT_URL" => "/sendquery/sended.php",	// �������� �������������� ����������
	"SUCCESS_URL" => "/sendquery/sended.php",	// �������� � ���������� �� �������� ��������
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
</div>

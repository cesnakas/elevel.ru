<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') return;?>
<?if(!$_REQUEST["submit"]){?>
<script>

$(document).ready(function() {
	
	$('input[name="form_text_325"]').keypress(function (e){
		if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
			$(".error").html("������ �����").show().fadeOut(3000); 
			return false;
		}
	});
    
	$(".table10").append('<tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> ������������ ��� ���������� ����.</p><span id="call_close"><img src="/i/btn140f.gif"></span><span id="suber"><img src="/i/btn140g.gif"></span></td></tr>');

	$('#callback_close,call_close').click(function() {
		$('#fade, #container2, .popup398').css('display','none');
	});
	
	$('form[name="order_call"]').attr('id','back_call2');

	$('#suber').click(function() {
		_gaq.push(['_trackEvent', 'called-back', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('called-back');
		NAMEUSER = $('input[name="form_text_323"]').val();
		PHONEUSER = $('input[name="form_text_325"]').val();
		textError='';
		error = 0;
		
		if(NAMEUSER==''){
			textError='������� ���<br>';
			$('input[name="form_text_323"]').css('border-color','#F25B26');
			error = 1;}
		else {
			$('input[name="form_text_323"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
			
			}
		if(PHONEUSER==''){
			$('input[name="form_text_325"]').css('border-color','#F25B26');
			textError+='������� ����� ��������<br>';error = 1;
			}
		else {
			$('input[name="form_text_325"]').css('border-color','#B7B7B7 #E4E3E3 #E4E3E3 #B7B7B7');
			}
		
		if(error == 0){
		var m_data=$("#back_call2").serialize();
		
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
				$("#simul_form").empty();
				$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">��� ������ ������� ���������!</div>')
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

$("#back_call2 .inputtext").attr('class','w215');
$("#form_dropdown_TIME,#form_dropdown_CITY").attr('class','sel1');
//$('input[name="web_form_submit"]:not(#bottom-submit)').parent().parent().css('display','none');
$(".back_call").css('display','block');
});
</script>

<style type="text/css">
		#back_call2 .table10 select{width: 216px; font-size: 12px;} 
</style>

<h6 style="*margin-top: -7px;">�������� �������� ������<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>

<div id="simul_form">
<div class="info"></div>
<div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;">
    
</div>
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"",
	Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"WEB_FORM_ID" => "28",	// ID ���-�����
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

<?}
else{?>

<?	
}
?>

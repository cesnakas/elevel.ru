<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "������ ���, ������� ����, ������� �������� ����, ������� ������� ������, ������ ��� �������������, ������������ ������ ���, ��������� ������ ����, ��������� ������� ����, �������������� ����, ������������ ���, ������������ ������ ���, ��������� ������������ ���, ��������� ������������ ������ ���, ��������� ������ ���, ������������ ������� ����, ������ ��� ������, ������������ �������� ����, ������ ������� ����, ������ ������ ���");
$APPLICATION->SetPageProperty("keywords", "��������� ������� �������� ����, ��������� ������� ����, ������� ��������� ����");
$APPLICATION->SetPageProperty("description", "�������� �level ���������� ���������� � ������ ��������� ������ �������� ���� - ������ ���.");
$APPLICATION->SetTitle("������� ��������� ���� | ������ ��� | �level");
?> 
<h1>������ ���</h1>
<?if($_REQUEST["print"] !== "Y"){?> 
<div class="rbutton"> <span id="hotdom" class="button_forms">�������� ������ ���</span></div>
<?}?> 
<div style="clear: both; "></div>
 
<p><strong>������� ��������� ����</strong>, ������� �������� ������� <strong>Ҹ���� ���</strong>, ����� ��� ����� ����� �� ������� ��������� ��������. �<strong>��������� ������� ����</strong> ������������ ����� ���������� � ������������ ������������� �����, ��� ��� ����� ������� ������� ������� ������������ ���������. ������� ��������� ���� ���������� ������������ ����� �� ���� ������� ���������, �������� ����������� ����������� �������.</p>
 
<br />
 <center><img src="/images/ei_heated_floor.png" alt="������� ������ ��� �� �������� �level �������" title="������� ������ ��� �� �������� �level �������" class="sol_bp"  /> </center> 
<br />
 
<p>������� Ҹ���� ��� ������������� ���� ������������� ������, ��������� ������������ ��������� ������� � ������� ���������� ���� � �������, ��� ����������� ��� �����, ���������� ��������� ��� ������.</p>
 
<br />
 
<p>����������� ������� ������ ����� ��������� ��������� ��������� �������� �����������. ��������� ����� �������, ��� �������, ����������� ���� ��������� ������������ ������� ������ ��������� �����������, � � ������ ������� ������� ������� ������ ����� � �������.</p>
 
<br />
 
<p>������� ����� � ���������� � ��������� ��������������� ������ ��� ������ ��������, ������ ���������� ������ ���������� �����, ����� ���������� ���������� ����������� ����������� � ���������, �� ��������� Ҹ���� ��� ���.</p>
 
<br />
 
<p>������� ������ �� ������������ ������� ������ ������� ������ ��� -������������ ����������� �������, ������� ������ � ������������� (���� ������ ��������������� ������ - ����� 30-� ��� � 15-������ �������� ������) ������ ������� ����������� �������� ��� ������� ������ ������.</p>
 
<br />
 
<p>�� ���������� ���������������� � ����������� ��������� Ҹ����� ���� � ����������� ������ ����������� �������� � ������ ������������ ��������� � ���������� ���������, ��� ����� ��� ������� ������� �� ������� ��������. ����������� ������� � ���� ������������ ����������������� ���������� �������� ��� ��� � ���.</p>

<p>
  <br />
</p>
 <br>

<script>
$(document).ready(function() {
    $('#call_close').first().remove();
    $('#suber').first().remove();
    $(".table10").removeClass("table10").addClass("table-bottom")
    $(".table-bottom").first().append('<tr><td colspan="4" style="padding: 26px 0 0 0;"><span id="suber-bottom" style="cursor:pointer; position: relative; left: 188px;"><img src="/i/btn140g.gif"></span></td></tr>');
    
    $(".txt8").first().css('padding-top','12px');
    $(".inputtext").attr('class','w170');
    $('textarea').first().attr('class','h92');
    $("#form_dropdown_TIME,#form_dropdown_CITY").first().attr('class','sel1');
    $('input[name="web_form_submit"]').first().css('display','none');
//    $('form').css('height','401px');
    
    $(".inner_params td").css('padding','0px');

    $('input[name="form_text_32"]').keypress(function (e){
        if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
            $(".error").html("������ �����").show().fadeOut(3000); 
           // $('#simul_form1').css('height','360px');
           // setTimeout( function () {$('#simul_form1').css('height','327px');}, 3000); 
            return false;
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    
    $('form[name="SVET_1"]').attr('id','back_call');
    
    $('#suber-bottom').click(function() {
       // _gaq.push(['_trackEvent', 'sent_intbuilding', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_intbuilding');
        NAMEUSER = $('input[name="form_text_30"]').val();
        PHONEUSER = $('input[name="form_text_32"]').val();
        EMAIL = $('input[name="form_text_34"]').val();
        MESSAGE=$('textarea[name="form_textarea_675"]').val();
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
        
        if(PHONEUSER==''){textError+='������� ����� ��������<br>';error = 1;};
        if(MESSAGE==''){textError+='������� �����������<br>';error = 1;};
        
        
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
                $("#simul_form1").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">��� ������ ������� ���������!</div>')
            }
        });
        return false;
        } else{
            $('.error').empty();
            $('.error').show().fadeOut(3000);
            $('.error').html(textError);
        }
    });
            
});
</script>
    <div class="bottom-form" style="float: left;">
    <div class="bottom-form-title"><p>�������� �������</p></div>
    <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

    <div class="info"></div>
    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form.result.new",
        "",
        Array(
        "SEF_MODE" => "N",    // �������� ��������� ���
        "WEB_FORM_ID" => 3,    // ID ���-�����
        "LIST_URL" => "/sendquery/sended.php",    // �������� �� ������� �����������
        "EDIT_URL" => "/sendquery/sended.php",    // �������� �������������� ����������
        "SUCCESS_URL" => "/sendquery/sended.php",    // �������� � ���������� �� �������� ��������
        "CHAIN_ITEM_TEXT" => "",    // �������� ��������������� ������ � ������������� �������
        "CHAIN_ITEM_LINK" => "",    // ������ �� �������������� ������ � ������������� �������
        "IGNORE_CUSTOM_TEMPLATE" => "N",    // ������������ ���� ������
        "USE_EXTENDED_ERRORS" => "N",    // ������������ ����������� ����� ��������� �� �������
        "CACHE_TYPE" => "A",    // ��� �����������
        "CACHE_TIME" => "3600",    // ����� ����������� (���.)
        "VARIABLE_ALIASES" => array(
            "WEB_FORM_ID" => "WEB_FORM_ID",
            "RESULT_ID" => "RESULT_ID",
        )
        )
    );?>
    </div>
</div>

<div style="clear: both; "></div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
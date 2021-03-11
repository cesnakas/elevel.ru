<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "КТП, комплектные трансформаторные подстанции, трансформаторные подстанции, комплектные подстанции, блочные комплектные трансформаторные подстанции, БКТП, ВРУ, ГРЩ, НКУ, компенсация реактивной мощности");
$APPLICATION->SetPageProperty("keywords", "подстанции трансформаторные комплектные, комплектные трансформаторные подстанции ктп, цена, установка, производство, монтаж");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает комплектные трансформаторные подстанции собственного производства.");
$APPLICATION->SetTitle("Комплектные трансформаторные подстанции (КТП) | Эlevel");
?>
<h1>Комплектные трансформаторные подстанции (КТП)</h1>
 
<p>Комплектная трансформаторная подстанция (КТП) предназначена для приёма, преобразования и распределения электроэнергии и представляет собой железный корпус, где размещается трансформатор и распределительные устройства высокого и низкого напряжений. КТП применяются в системах электроснабжения промышленных предприятий в районах с умеренным климатом.</p><br>

<?if($_REQUEST["print"] !== "Y"){?> 
    <div class="rbutton"> <span class="button_forms" id="elpsupply">Заказать систему</span> </div>
<?}?>

 <center><img src="/images/ei_transformer_substations.png" alt="Комплектные трансформаторные подстанции (КТП) от компании Эlevel Инженер" title="КТП от компании Эlevel Инженер" class="sol_bp" /></center>
<br />
 
<p>Комплектные подстанции способствуют снижению потерь электроэнергии в проводах. Благодаря этим устройствам улучшаются технические показатели электросети и продлевается срок эксплуатации оборудования.</p><br>
 
<p>Наша компания предлагает комплектные трансформаторные подстанции собственного производства различных типов и назначения как стандартного, так и индивидуального исполнения. Предлагаемые КТП полностью безопасны для окружающей среды, оснащены всевозможными степенями защиты, комплектуются новейшими силовыми трансформаторами, они легко монтируются, а также просты в подключении и эксплуатации.</p>

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
//    $('form').css('height','370px');
    
    $(".inner_params td").css('padding','0px');

    $('input[name="form_text_672"]').keypress(function (e){
        if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
            $(".error").html("Только цифры").show().fadeOut(3000); 
           // $('#simul_form1').css('height','360px');
           // setTimeout( function () {$('#simul_form1').css('height','327px');}, 3000); 
            return false;
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    
    $('form[name="electric_power_supply"]').attr('id','back_call');
    
    $('#suber-bottom').click(function() {
       // _gaq.push(['_trackEvent', 'sent_intbuilding', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_intbuilding');
        NAMEUSER = $('input[name="form_text_671"]').val();
        PHONEUSER = $('input[name="form_text_672"]').val();
        EMAIL = $('input[name="form_email_673"]').val();
        MESSAGE=$('textarea[name="form_textarea_674"]').val();
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
        if(MESSAGE==''){textError+='Введите комментарий<br>';error = 1;};
        
        
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
                $("#simul_form1").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')
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
    <div class="bottom-form-title"><p>Заказать систему</p></div>
    <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

    <div class="info"></div>
    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form.result.new",
        "",
        Array(
        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
        "WEB_FORM_ID" => 47,    // ID веб-формы
        "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
        "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
        "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
        "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
        "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
        "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
        "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
        "CACHE_TYPE" => "A",    // Тип кеширования
        "CACHE_TIME" => "3600",    // Время кеширования (сек.)
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
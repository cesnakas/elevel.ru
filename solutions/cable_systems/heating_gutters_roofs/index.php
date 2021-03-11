<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Обогрев водостоков и кровли | Обогрев крыши | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и реализацию систем обогрева: водостоков, желобов, крыши, кровли. Установка кабельных систем обогрева крыш и водостоков по выгодной цене.");
$APPLICATION->SetPageProperty("tags", "обогрев водостоков, обогрев крыш, обогрев кровли и водостоков, системы обогрева водостоков, кабель для обогрева водостоков, кабельный обогрев водостоков, система обогрева крыш, обогрев кровли, система обогрева кровли, кабельный обогрев кровли, кабельный обогрев крыш, системы кабельного обогрева крыш, системы кабельного обогрева кровель, защита от наледи, система снеготаяния, защита от промерзания");
$APPLICATION->SetPageProperty("keywords", "обогрев водостоков, обогрев кровли и водостоков, кабель для обогрева водостока, монтаж обогрева водостоков, системы обогрева водостоков, обогрев крыши, огрев желобов, цена, монтаж");
$APPLICATION->SetTitle("Обогрев кровли, обогрев водостоков, Elevel - обогрев крыш, желобов, водосточных труб");
?> 
<h1>Обогрев водостоков и крыш</h1>
 
<p style="margin-bottom: 0cm; "> </p>
<?if($_REQUEST["print"] !== "Y"){?> 
<div class="rbutton-long"> <span id="sneg" class="button_forms">Заказать Систему снеготаяния</span></div>
<?}?> 
<div style="clear: both; "></div>
 
<p></p>
 
<p style="margin-bottom: 0cm; ">Антиобледенительные системы, которые появились в арсенале электротехнических и строительных компаний сравнительно недавно, быстро получили заслуженное признание. Всё это благодаря тому, что такие системы, осуществляющие обогрев кровли, помогли исключить образование наледи в водосточных трубах, желобах, по краю крыши и в других местах ее наиболее вероятного появления, что традиционно вызывает аварийные ситуации, нередко угрожая здоровью человека.</p>
 <center><img src="/images/ei_heating_of_gutters_and_roofs.png" alt="Системы кабельного обогрева водостоков и крыш от компании Эlevel Инженер" title="Системы кабельного обогрева водостоков и крыш от компании Эlevel Инженер" class="sol_bp"  /> </center> 
<br />
 
<p>Система обогрева водостоков и крыш &ndash; это эффективное решение проблемы наледи за счёт поддержания постоянной температуры обогрева крыш зданий. Она может быть ориентирована на работу в разных режимах (бюджетный вариант - регулятор, включающий систему в диапазоне температуры воздуха от минус 10 до плюс 5 градусов; более продвинутый вариант – регулятор, чувствительный к наличию влаги, включающий систему только в случае необходимости). Система отличается лёгкостью монтажа и простотой обслуживания.</p>
 
<br />
 
<p>Мы предлагаем Вам установку <strong>системы кабельного обогрева крыш</strong> и стоков, которые помогут Вам больше не беспокоиться о непредвиденной угрозе в виде наледи и огромных сосулек для здания, а также о безопасности для водителей и пешеходов. Кроме того, это - разумная инвестиция в безопасность обитателей здания, способная приносить экономическую выгоду - стоимость ремонта кровли, водосточных труб и желобов, поврежденных после суровой зимы, всегда высока. Расходы на работу системы легко окупаются за несколько лет.</p>
 
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
//    $('form').css('height','360px');
    
    $(".inner_params td").css('padding','0px');

    $('input[name="form_text_48"]').keypress(function (e){
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
    
    $('form[name="SVET_1"]').attr('id','back_call');
    
    $('#suber-bottom').click(function() {
       // _gaq.push(['_trackEvent', 'sent_intbuilding', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_intbuilding');
        NAMEUSER = $('input[name="form_text_46"]').val();
        PHONEUSER = $('input[name="form_text_48"]').val();
        EMAIL = $('input[name="form_email_50"]').val();
        MESSAGE=$('textarea[name="form_textarea_676"]').val();
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
        "WEB_FORM_ID" => 4,    // ID веб-формы
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
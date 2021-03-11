<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "обогрев наружных площадок, обогрев ступеней, обогрев дорожек, обогрев двора, обогрев площадок, обогрев открытых площадок, обогрев участка, защита трубопроводов от промерзания");
$APPLICATION->SetPageProperty("keywords", "система снеготаяния, система антиобледенения, системы снеготаяния devi");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает разработку и монтаж систем снеготаяния и обогрева наружных площадок.");
$APPLICATION->SetTitle("Системы снеготаяния | Обогрев наружных площадок | Эlevel");
?> 
<h1>Обогрев наружных площадок</h1>
<?if($_REQUEST["print"] !== "Y"){?>
 <div class="rbutton-long"> <span id="sneg" class="button_forms">Заказать систему снеготаяния</span></div>
 <?}?>
 <br>
 <div style="clear: both; "></div>
<p>Основная задача системы обогрева наружных площадок &ndash; обеспечить безопасность людей и транспорта в зимний период.</p>

<br />
 
<p>Нагревательный кабель быстро очищает от снега и льда дороги, пандусы, лестницы, въезды в гаражи и любые открытые площадки, исключая падение на скользких ступенях и потерю контроля над транспортным средством при пробуксовке. Ещё один несомненный плюс системы - защита покрытия открытых площадок от повреждений, которые обычно возникают при скалывании льда и очистке от снега.</p>

<br />
 <center><img src="/images/ei_heating_outdoor_areas.png" alt="Обогрев наружных площадок от компании Эlevel Инженер" title="Обогрев наружных площадок от компании Эlevel Инженер" vspace="5" class="sol_bp"  /></center> 
<br />
 
<p>Система для стаивания снега и льда полностью автоматизирована: она определяет необходимость стаивания снега на участках, включает и выключает обогрев, подогревая покрытие ступеней лестниц или других открытых площадей и освобождая их от наледи и снега.</p>

<br />
 
<p>Наиболее часто системы стаивания снега и льда на грунте используются на стоянках, проезжих частях, тротуарах, наружных ступенях, погрузочных рампах и мостах.</p>

<br />

<p>Мы предлагаем установку системы с возможностью оптимального для Вас выбора режима работы: </p>
 
<ul class="list_sol"> 
  <li>постоянная поддержка температуры на поверхности покрытия +5 градусов (используется регулятор с датчиком, закладываемым внутрь покрытия;</li>
 
  <li>работа только в диапазоне температуры воздуха от минус 15 до плюс 5 градусов и только при наличии влаги на поверхности, и поддерживает температуру на поверхности покрытия +5 градусов.</li>
 </ul>
 
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
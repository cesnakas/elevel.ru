<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "дистанционное управление умным домом, дистанционное управление домом, дистанционное управление освещением, дистанционное управление воротами, дистанционное управление приводами, дистанционное управление жалюзи, управление охранно-пожарной сигнализацией, управление охранной сигнализацией, дистанционное управление системой умный дом, дистанционное управление электроснабжением, дистанционное управление видеонаблюдением, дистанционный контроль доступа, система дистанционного контроля, дистанционное управление системами автоматизации, дистанционное управление автоматизацией, дистанционное управление инженерными системами, ду умный дом, умный дом sms оповещение, СКД, СКУД, контроль доступа, управление доступом, система контроля и управления доступом");
$APPLICATION->SetPageProperty("keywords", "дистанционное управление домом, умный дом ipad, управление умным домом с ipad, удаленное управление домом");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает разработку системы дистанционного управления умным домом.");
$APPLICATION->SetTitle("Дистанционный контроль и управлением умным домом | Эlevel");
?> 
<h1>Дистанционный контроль и управление</h1>
 
<div class="rbutton"> <span id="umd" class="button_forms">Отправить запрос</span></div>
 
<div style="clear: both; "></div>

<p></p>

<p>Современные технологии позволяют взаимодействовать со всем оборудованием и системами не только с помощью беспроводных устройств, но даже в удалённом режиме. Даже если Вы забыли выключить свет, или захотите проверить обстановку в доме, это можно сделать не только из соседнего помещения, но даже из другого города.</p>

<br />
 <center><img src="/images/ei_automation_smarthouse_rc.png" title="Дистанционный контроль и управление от компании Эlevel Инженер" alt="Дистанционный контроль и управление от компании Эlevel Инженер" vspace="5" class="sol_bp"  /></center> 
<br />
 
<p>С помощью дистанционного управления системами автоматизации решаются следующие задачи:</p>
 
<ul class="list_sol"> 
  <li>Дистанционное управление и контроль системами (освещение, охрана и сигнализация, мультимедиа и прочие системы, входящие в комплекс Умный дом);</li>
 
  <li>Возможность удалённого управления и контроля (с помощью КПК, мобильного телефона и пр. из любой точки мира, где доступна цифровая связь);</li>
 
  <li>Координация с помощью единой сенсорной панелью или универсального пульта управления с графическим дисплеем.</li>
 </ul>
 
<br />

<p>Данное решение входит в комплексную систему автоматизации <a href="/solutions/automation/smart_house/" title="Система &amp;laquo;умный дом&amp;raquo; от компании Эlevel Инженер" target="_blank" >&laquo;умный дом&raquo;</a>.</p>

<p>
  <br />
</p>

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
    $('form').css('height','392px');
   
    $(".inner_params td").first().css('padding','0px');
    
    $('input[name="form_text_411"]').first().keypress(function (e){
        if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
            $(".error").html("Только цифры").show().fadeOut(3000); 
            return false;
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    
    $('form[name="smart_house"]').first().attr('id','back_call');
    
    $('#suber-bottom').first().click(function() {
       //_gaq.push(['_trackEvent', 'sent_home_price', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_home_price');
        CONTACTUSER = $('input[name="form_text_409"]').val();
        PHONEUSER = $('input[name="form_text_411"]').val();
        EMAIL = $('input[name="form_text_410"]').val();
        MESSAGES=$('textarea[name="form_textarea_412"]').val();
        textError='';
        error = 0;
        
        
        
        if(CONTACTUSER==''){textError='Введите контактное лицо<br>';error = 1;};
                
        if(EMAIL==''){
            textError+='Не введен email<br>';
            error = 1;
        } else {
        if(!isValidEmailAddress(EMAIL)){
            textError+='Не корректный email<br>';
        };}
        
        if(PHONEUSER==''){textError+='Введите номер телефона<br>';error = 1;};
        if(MESSAGES==''){textError+='Введите комментарий<br>';error = 1;};
        
        
        if(error == 0){
            
        var m_data=$("#simul_form1").serialize();
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
                $('.table-bottom').hide();
                $("#back_call").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')
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
        <div class="bottom-form-title" style="background-color: #f15922; width: 200px; height: 24px; border-radius: 5px; color: #fff; padding-top: 5px; text-align: center;"><p>Отправить запрос</p></div>
        <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "",
            Array(
            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
            "WEB_FORM_ID" => 30,    // ID веб-формы
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

<p></p>

<p>
  <br />
</p>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
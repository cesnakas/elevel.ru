<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "внутреннее освещение, освещение помещений, освещение офисных помещений, освещение административных помещений, освещение жилых помещений, освещение офисов, офисное освещение, освещение в гостиницах, освещение квартир, освещение коттеджей, освещение в подъездах, освещение лестничных клеток, промышленное освещение, освещение промышленных предприятий, освещение промышленных помещений, освещение складов, освещение складских помещений, освещение заводов, освещение фабрик, освещение цехов, освещение торговых площадей, техническое освещение, акцентное освещение, освещение в торговых центрах, освещение в торговых комплексах, проектирование внутреннего освещения");
$APPLICATION->SetPageProperty("keywords", "внутреннее освещение, освещение помещений, освещение офисных помещений, освещение административных помещений, освещение жилых помещений, освещение офисов, офисное освещение, освещение в гостиницах, освещение квартир, освещение коттеджей, освещение в подъездах, освещение лестничных клеток, промышленное освещение, освещение промышленных предприятий, освещение промышленных помещений, освещение складов, освещение складских помещений, освещение заводов, освещение фабрик, освещение цехов, освещение торговых площадей, техническое освещение, акцентное освещение, освещение в торговых центрах, освещение в торговых комплексах, проектирование внутреннего освещения");
$APPLICATION->SetTitle("Внутреннее освещение ");
?> 
<h1>Внутреннее освещение</h1>
 
<p> 
  <br />
 </p>
<?if($_REQUEST["print"] !== "Y"){?> 
<div class="rbutton-long"> <span id="diod" class="button_forms">Запросить светодиодную продукцию</span></div>
<?}?> 
<div style="clear: both; "></div>
 
<p></p>
 
<p>
  <br />
</p>

<p>Для создания светотехнического проекта внутреннего освещения необходимо чётко определить тип объекта, его особенности и поставленные перед источниками света задачи. И, безусловно, создавая проект внутреннего освещения, необходимо учитывать не только функциональность, но и эстетическое восприятие.</p>
 
<br />
 <center><img src="/images/ei_interior_lighting.png" alt="Проект внутреннего (интерьерного) освещения от компании Эlevel Инженер" align="center" title="Проект внутреннего (интерьерного) освещения от компании Эlevel Инженер" vspace="5" class="sol_bp"  /></center> 
<br />
 
<p>Объектом, который требует разработки и реализации светотехнического проекта, может стать как обычная квартира или загородный дом, так и любой  крупномасштабный объект абсолютно любого назначения &ndash; торгово-развлекательный центр, заводской комплекс, дом-музей и пр.</p>
 
<br />
 
<p>Специалисты нашей компании, имеющие огромный опыт работы с проектами внутреннего освещения, создадут для Вас проект, где будут максимально реализованные определённые Вами задачи и характеристики самого объекта. </p>
 
<br />
 
<p>Наши возможности для вас:</p>
 
<ul class="list_sol"> 
  <li>Разработка схем технического и декоративного освещения для проектов любого масштаба и с учётом особенностей эксплуатации;</li>
 
  <li>Сочетание различных приёмов освещения для решения поставленных задач (освещение офисов, освещение служебных помещений и </li>
 
  <li>Максимальное соблюдение оформления интерьера, вплоть до реализации светотехнических проектов в стилистике сложных дизайнерских решений;</li>
 
  <li>Возможность предварительной оценки проекта (визуализация)</li>
 
  <li>Комплектация проектов оборудованием от ведущих электротехнических брендов, предлагающих надёжное и высококачественное оборудование для технического и декоративного света. В предлагаемом ассортименте доступны также серии класса люкс с необычными дизайнерскими находками;</li>
 
  <li>Использование технологий скрытого монтажа;</li>
 
  <li>Применение энергосберегающих технологий и оборудования;</li>
 </ul>
 
<br />
 
<p>Наша компания осуществляет разработку <a href="/solutions/automation/intellectual_building/lighting_system/" target="_blank" title="системы освещения и управления освещением от компании Эlevel Инженер" >комплексных решений освещения</a> в системах автоматизации.</p>

<p>
  <br />
</p>
 
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
    $('form').css('height','360px');
    
    $(".inner_params td").css('padding','0px');

    $('input[name="form_text_298"]').keypress(function (e){
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
        NAMEUSER = $('input[name="form_text_297"]').val();
        PHONEUSER = $('input[name="form_text_298"]').val();
        EMAIL = $('input[name="form_text_299"]').val();
        MESSAGE=$('textarea[name="form_textarea_300"]').val();
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
    <div style="background-color: #f15922; width: 275px; height: 24px; border-radius: 5px; color: #fff; padding-top: 5px; text-align: center;"><p>Запросить светодиодную продукцию</p></div>
    <div id="simul_form1"> <!-- style="height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;"> -->

    <div class="info"></div>
    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:form.result.new",
        "",
        Array(
        "SEF_MODE" => "N",    // Включить поддержку ЧПУ
        "WEB_FORM_ID" => 24,    // ID веб-формы
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
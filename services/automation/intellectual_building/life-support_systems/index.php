<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "жизнеобеспечение здания,системы жизнеобеспечения здания, система гарантированного бесперебойного электроснабжения, ибп, система отопления, система управления отоплением, система вентиляции и кондиционирования, система управления вентиляцией и кондиционированием, система освещения, система управления освещением, управление светом, системы учета энергоносителей, АСТУЭ, АСКУЭ, системы управления приводами, системы контроля лифтов, системы управления лифтами, системы управления эскалаторами, управление система жизнеобеспечения, системы жизнеобеспечения зданий");
$APPLICATION->SetPageProperty("keywords", "жизнеобеспечение здания,системы жизнеобеспечения здания, система гарантированного бесперебойного электроснабжения, ибп, система отопления, система управления отоплением, система вентиляции и кондиционирования, система управления вентиляцией и кондиционированием, система освещения, система управления освещением, управление светом, системы учета энергоносителей, АСТУЭ, АСКУЭ, системы управления приводами, системы контроля лифтов, системы управления лифтами, системы управления эскалаторами, управление система жизнеобеспечения, системы жизнеобеспечения зданий");
$APPLICATION->SetTitle("Комплекс систем жизнеобеспечения ");
?> 
<h1>Комплекс систем жизнеобеспечения</h1>
 
<p>Любой современный объект, будь это крупный торгово-развлекательный комплекс или небольшое офисное здание, нуждается в обеспечении безопасности, защите от внештатных ситуаций, а также поддержания необходимых условий работы и соблюдения санитарно-гигиенических норм. За каждую задачу отвечает множество разнообразных подсистем инженерного оборудования, вместе образующих систему жизнеобеспечения здания.</p>
<br>
<?if($_REQUEST["print"] !== "Y"){?> 
    <div class="rbutton"> <span class="button_forms" id="intbuilding">Заказать систему</span> </div>
<?}?>

<br />
 <center><img src="/images/ei_automation_ib_lifesystem.png" alt="Комплекс систем жизнеобеспечения в системе &amp;laquo;интеллектуальное здание&amp;raquo; от Эlevel Инженер" title="Комплекс систем жизнеобеспечения в системе &laquo;интеллектуальное здание&raquo; от Эlevel Инженер" vspace="5" class="sol_bp"  /></center> 
<br />
 
<p>Главная задача комплекса систем жизнеобеспечения - создать оптимальные условия работы  и отдыха для людей, пребывающих на территории объекта, а также обеспечить безопасность и целостность объекта.</p>

<br />
 
<p>Современный комплекс должен быть спроектирован с учетом энергосберегающих технологий, удобства обслуживания и эксплуатации оборудования.</p>

<br />
 
<p>Наша компания имеет огромный опыт по разработке и реализации комплекса жизнеобеспечения с различным количеством задействованных систем и набором технологических задач, а также интеграции отдельных систем в уже существующий инженерный комплекс: </p>
 
<ul class="list_sol"> 
  <li><a href="/solutions/automation/intellectual_building/ups/" title="система гарантированного бесперебойного электроснабжения в системе «интеллектуальное здание» от Эlevel Инженер" ><strong>система гарантированного бесперебойного электроснабжения</strong></a></li>
 
  <li><a href="/solutions/automation/intellectual_building/hvac_system/" title="системы отопления, вентиляции и кондиционирования воздуха в системе «интеллектуальное здание» от Эlevel Инженер" ><strong>системы отопления, вентиляции и кондиционирования воздуха</strong></a></li>
 
  <li><a href="/solutions/automation/intellectual_building/lighting_system/" title="системы освещения и управления освещением в системе «интеллектуальное здание» от Эlevel Инженер" ><strong>системы освещения и управления освещением</strong></a></li>
 
  <li><a href="/solutions/automation/intellectual_building/accounting_system/" title="система учета энергоносителей и другие системы (АСКУЭ, АСТУЭ) в системе «интеллектуальное здание» от Эlevel Инженер" ><strong>система учета энергоносителей (АСКУЭ, АСТУЭ)</strong></a></li>
 
  <li><a href="/solutions/automation/intellectual_building/elevator_system/" title="системы контроля и управления лифтами, эскалаторам в системе «интеллектуальное здание» от Эlevel Инженер" ><strong>системы контроля и управления лифтами, эскалаторами</strong></a></li>
 </ul>
 
<br />
 
<p>Все предлагаемые системы разрабатываются с учётом потребностей и особенностей конкретного объекта и интегрируются в комплексные системы автоматизации <a href="/solutions/automation/intellectual_building/" title="Интеллектуальное здание от компании Эlevel Инженер" >«интеллектуальное здание»</a>, <a href="/solutions/automation/hotel_management_system/" title="Управление Гостиницами от компании Эlevel Инженер" >«управление гостиницами»</a> и <a href="/solutions/automation/smart_house/" title="Умный дом от компании Эlevel Инженер" >«умный дом»</a>.</p>

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
//    $('form').css('height','392px');
    
    $(".inner_params td").css('padding','0px');

    $('input[name="form_text_668"]').keypress(function (e){
        if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
            $(".error").html("Только цифры").show().fadeOut(3000); 
            $('#simul_form1').css('height','360px');
            setTimeout( function () {$('#simul_form1').css('height','327px');}, 3000); 
            return false;
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    
    $('form[name="intellectual_building"]').attr('id','back_call');
    
    $('#suber-bottom').click(function() {
       // _gaq.push(['_trackEvent', 'sent_intbuilding', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_intbuilding');
        NAMEUSER = $('input[name="form_text_667"]').val();
        EMAIL = $('input[name="form_email_669"]').val();
        PHONEUSER = $('input[name="form_text_668"]').val();
        MESSAGES=$('textarea[name="form_textarea_670"]').val();
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
        if(MESSAGES==''){textError+='Введите комментарий<br>';error = 1;};
        
        
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
        "WEB_FORM_ID" => 46,    // ID веб-формы
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
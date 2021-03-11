<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "система отопления, система отопления дома, система отопления умного дома, автоматизированная система отопления, система управления отоплением, блок управления системой отопления, умное отопление, дистанционное управление отоплением, автономное отопление, термостат, датчики температуры");
$APPLICATION->SetPageProperty("keywords", "умный дом отопление, система отопления умный дом, система отопления дома, умное отопление, умная система отопления, дистанционное управление отоплением загородного дома");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает разработку и установку систем отопления для Вашего дома. ");
$APPLICATION->SetTitle("Система отопления | Эlevel");
?> 
<h1>Система отопления</h1>
 
<div class="rbutton"> <span id="umd" class="button_forms">Отправить запрос</span></div>
 
<div style="clear: both; "> 
  <br />
 </div>
 
<p>Система отопления входит в комплекс систем жизнеобеспечения, без которых невозможно функционирование любого современного здания. Надёжность и качество работы любой системы отопления  характеризуется не только характеристиками отопительного оборудования, но и квалификацией тех, кто займётся проектированием и монтажом систем отопления.</p>
 
<br />
 <center><img src="/images/ei_automation_smarthouse_hs.png" title="Система отопления от компании Эlevel Инженер" alt="Система отопления от компании Эlevel Инженер" vspace="5" class="sol_bp"  /></center> 
<br />
 
<p>Мы занимаемся разработкой и профессиональным воплощением систем отопления объектов любой конфигурации и категории сложности. Наши специалисты, оценив потребности объекта и Ваши пожелания, рекомендуют тип системы (воздушный, газовый или водяной)  и источник теплоснабжения, сформируют оптимальный набор функций для будущей системы и подберут оптимальное оборудование, соответствующее всем расчётным и техническим параметрам. Вы можете быть уверены в результате &ndash; применение системы обеспечит комфортные условия в здании и удобство обслуживания отопительного оборудования, а также повысят срок его службы, что принесёт Вам дополнительные экономические выгоды.</p>
 
<br />
 
<p>Предлагаемая система может устанавливаться как индивидуально, так и входить в комплексные системы автоматизации <a href="/solutions/automation/smart_house/" title="Система умный дом от компании Эlevel Инженер" target="_blank" >&laquo;умный дом&raquo;</a> и <a href="/solutions/automation/intellectual_building/" title="Интеллектуальное здание от компании Эlevel Инженер" target="_blank" >«интеллектуальное здание»</a>.</p>
 
<br />
 
<p>С проектированием отопления неразрывно связано и проектирование других инженерных систем &mdash; водоснабжения, электроснабжения, вентиляции и пр. Только согласованная и бесперебойная работа всех перечисленных сетей обеспечит выполнение задач, предусмотренных проектом.</p>
 
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
//    $('form').css('height','392px');
   
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
        <div style="background-color: #f15922; width: 200px; height: 24px; border-radius: 5px; color: #fff; padding-top: 5px; text-align: center;"><p>Отправить запрос</p></div>
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
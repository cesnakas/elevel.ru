<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "спутниковое и эфирное телевидение, системы телевидения");
$APPLICATION->SetPageProperty("keywords", "спутниковое и эфирное телевидение, системы телевидения");
$APPLICATION->SetTitle("Спутниковое и эфирное телевидение ");
?>
<h1>Спутниковое и эфирное телевидение</h1>
 
<p>Необходимость применения инженерных систем затрагивает не только области, где на первом месте стоит автоматизация процессов и повышенная функциональность. Безусловно, элементы автоматизации также эффективны и удобны в выстраивании систем, направленных на создание комфорта и дополнительных функциональных преимуществ, и примером такой системы как раз могут стать <strong>системы телевидения</strong>. В наше время практически невозможно найти здание, где бы не использовалась система приема того или иного вида телевизионного сигнала - будь это жилой дом, торговый центр или крупное промышленное предприятие.</p><br>

<div class="rbutton"> <span class="button_forms" id="intbuilding">Заказать систему</span> </div>

 <center><img src="/images/ei_automation_ib_tv.png" title="Спутниковое и эфирное телевидение от компании Эlevel Инженер" alt="Спутниковое и эфирное телевидение от компании Эlevel Инженер" vspace="5" class="sol_bp" /></center>
<br />
 
<p>В нашей компании Вы можете заказать проектирование и монтаж <strong>систем эфирного и спутникового телевидения</strong>, полностью учитывающих Ваши потребности и особенности объекта. Предлагаемые нами системы отвечают современным стандартам, предъявляемым к цифровому телевидению, и реализуются на высокотехнологичном оборудовании от ведущих компаний.</p><br>
 
<p>Применение таких систем дарит ряд ощутимых преимуществ:</p>

<ul class="list_sol"> 
  <li>возможность передачи сигнала от одного источника (ТВ-антенна, ресивер спутникового ТВ) в любое помещение, где есть телевизоры и управляющие устройства;</li>
 
  <li>централизованное управление сигналом, благодаря которому не нужно иметь в каждом помещении антенну эфирного или спутникового вещания или точку выхода в Интернет;</li>
 
  <li>возможность удалённого управления любым ТВ-приёмником;</li>
 
  <li>высокое качество ТВ-сигнала вне зависимости от удалённости от источника.</li>
 </ul>

<br>
 
<p>Данная система легко интегрируется с другими системами локальной автоматизации и инженерными комплексами, за счёт чего Вы можете максимально использовать её возможности. К примеру, сигнал с видеокамер наблюдения Вы можете просматривать не только по служебным мониторам, установленным в диспетчерских пунктах, но и в любом помещении здания по заранее определённому телевизионному каналу. Более того, с телевизора возможен даже выход в Интернет и просмотр электронной почты.</p><br>
 
<p>Спутниковое и эфирное телевидение является частью комплекса систем информационного обеспечения наряду со следующими системами:</p>

<ul class="list_sol"> 
  <li><a href="/solutions/automation/intellectual_building/lan/" title="Локальные высокоскоростные сети (ЛВС) в системе &laquo;интеллектуальное здание&raquo; от Эlevel Инженер" >локальные высокоскоростные сети (ЛВС)</a>;</li>
 
  <li><a href="/solutions/automation/intellectual_building/phone_etwork/" title="Телефонные сети в системе «интеллектуальное здание» от Эlevel Инженер" >телефонные сети</a>;</li>
 
  <li><a href="/solutions/automation/intellectual_building/rapid_communication/" title="Система оперативной связи обслуживающего персонала в системе «интеллектуальное здание» от Эlevel Инженер" >система оперативной связи обслуживающего персонала</a>;</li>
 
  <li><a href="/solutions/automation/intellectual_building/sks/" title="СКС в системе «интеллектуальное здание» от Эlevel Инженер" >СКС</a>.</li>
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
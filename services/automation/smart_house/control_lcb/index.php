<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "управление освещением, управление шторами, управление жалюзи, система управления освещением, управление светом, дистанционное управление освещением, управление наружным освещением, управлением внутренним освещением, автоматизированное управление освещением, дистанционное управление жалюзи, управление воротами, дистанционное управление воротами, приводы ворот, управление приводами, система управления приводами, автоматические жалюзи, автоматические ворота, светорегулятор, диммер");
$APPLICATION->SetPageProperty("keywords", "управление освещением дома, управление жалюзи, управление шторами, управление освещением умный дом");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает комплексные решения автоматизации управления освещением, шторами и жалюзи. ");
$APPLICATION->SetTitle("Система управления освещением, шторами, жалюзи | Автоматизированное управление освещением от компании Эlevel");
?> 
<h1>Система управления освещением, шторами и жалюзи</h1>

<div class="rbutton"> <span id="umd" class="button_forms">Отправить запрос</span></div>
 
<div style="clear: both; "></div>

<p></p>

<p>Основная задача таких систем &ndash; создать комфортные условия для проживания и работы. Однако реализация систем управления освещением способны также снизить эксплуатационные затраты и эффективно использовать внутреннее пространство здания.</p>

<br />
 <center><img src="/images/ei_automation_smarthouse_lc.png" title="Система управления освещением, шторами и жалюзи от компании Эlevel Инженер" alt="Система управления освещением, шторами и жалюзи от компании Эlevel Инженер" vspace="5" class="sol_bp"  /></center>
<br />
 
<p>Мы предлагаем решения по <strong>автоматизированному управлению освещением</strong>, полностью отвечающие потребностям конкретного объекта по всем параметрам: </p>
 
<ul class="list_sol"> 
  <li>виду и индивидуальным особенностям;</li>
 
  <li>назначению системы (внутреннее и внешнее освещение) и, соответственно, требованиям к типу, количеству и яркости светильников;</li>
 
  <li>набору функциональных задач (необходимости поддерживания определенного уровня освещенности,  локального и дистанционного управления из одного или нескольких помещений, контроля исправности осветительных приборов и пр.);</li>
 
  <li>требованиям не только дизайна, но и санитарно–гигиенических норм;</li>
 
  <li>применению проводных или беспроводных технологий (при монтаже систем управления в помещениях с уже завершенной отделкой).</li>
 </ul>
 
<div class="" style="float: right; width: 370px; margin-left: 18px;"> 
<p>Средства управления освещением обеспечивают гибкую конфигурацию, являющуюся большим плюсом для современного бизнеса - при необходимости перепланировки офисного пространства Вам не придётся заново тратиться на монтаж кабельной сети.</p>

<br />
 
<p>Для комфортного использования управление разными источниками света и выбор режимов объединены в сценарии, создающие соответствующую ситуации атмосферу.</p>

<br />
 
<p>Для максимального удобства <strong>управление светом</strong> сочетается с системой управления шторами и жалюзи. Одним нажатием кнопки с пульта дистанционного управления или настенной панели Вы можете выбирать нужный режим - открыть или закрыть жалюзи или рольставни на всех окнах сразу или выборочно, изменить положение для затемнения или дополнительного света в помещении.</p>

<br />
 
<p>Для коммерческих объектов, характеризующихся большим количеством оконных конструкций, устанавливаются системы группового <strong>управления жалюзи</strong>.</p>

<br />

<p>Предлагаемая система может устанавливаться как индивидуально, так и может входить в комплексную систему автоматизации <a href="/solutions/automation/smart_house/" title="Система &amp;laquo;умный дом&amp;raquo; от компании Эlevel Инженер" target="_blank" >&laquo;умный дом&raquo;</a>.</p>

<p>
  <br />
</p>
</div>
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
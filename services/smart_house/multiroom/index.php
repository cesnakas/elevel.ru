<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Система мультирум (multiroom) | Управление аудио- и видеоаппаратурой | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает проектирование и установку системы мультирум. Система мультирум позволяет управлять аудио- и видеосигналами в Вашем доме.");
$APPLICATION->SetPageProperty("tags", "мультирум, система мультирум, управление светом, мультирум оборудование, мультирум проектирование, управление светом, мультирум умный дом, система управления светом, управление домашним кинотеатром, мультирум оборудование, проектирование домашних кинотеатров, напольная акустика, система домашнего кинотеатра, аудиосервер, самые домашние кинотеатры, multiroom, систему управления звуком, сенсорная панель управления, единая панель управления");
$APPLICATION->SetPageProperty("keywords", "мультирум, система мультирум, мультирум оборудование");
$APPLICATION->SetTitle("Система «мультирум»");
?> 
<h1>Система &laquo;мультирум&raquo; (multiroom)</h1>
 
<div class="rbutton"> <span id="umd" class="button_forms">Отправить запрос</span></div>
 
<div style="clear: both; "></div>
 
 
<p>Система управления аудио- и видеосигналами <strong>«мультирум»</strong> (<em>multiroom</em>) &ndash; одна из основных составляющих «умного дома», однако благодаря своей востребованности часто устанавливается как отдельная система. С помощью «мультирума» в любом уголке дома можно создавать аудио- и видеотерритории, и даже там, где раньше это было недоступно – например, в ванной комнате. Система работает по принципу разведения аудио- и видеосигнала от источников, находящихся как в едином помещении, так и установленных в разных местах. <strong>Система «мультирум»</strong> позволяет управлять цифровой аудио- и видеоаппаратурой из любого помещения с помощью настенных панелей – выбирать источник, регулировать настройки, переключать программы и каналы, ставить на паузу и прочее. Ещё одно неоспоримое преимущество системы – использование встраиваемой акустики и скрытый монтаж, что позволяет экономить пространство и не нарушать декор помещения.</p>
 
<br />
 <center><img src="/images/ei_automation_smarthouse_multiroom.png" alt="мультирум в системе «умный дом» от компании Эlevel Инженер" title="мультирум в системе «умный дом» от компании Эlevel Инженер" vspace="5" class="sol_bp"  /></center> 
<br />
 
<p>Мультирум относится к категории думающих систем – именно поэтому её возможности не заканчиваются на  распространении аудио- и видеосигнала и управлении источниками. Система подарит ряд дополнительных удобств: </p>
 
<ul class="list_sol"> 
  <li>приглушение звука включённых устройств, если вам звонят в дверь или по телефону;</li>
 
  <li>аудиосвязь между помещениями;</li>
 
  <li>система оповещения и выведение предупреждающих сообщений на экран;</li>
 
  <li>следящий звук (включение/приглушение/отключение звука в зависимости от присутствия людей в комнате.</li>
 </ul>
 
<br />
 
<div> 
 
<p>Применение системы не ограничивается домашним использованием – Мультирум отлично справляется с функциями инструмента, создающего комфортную рабочую среду: </p>
 
<br />
 
<ul class="list_sol"> 
  <li>интегрированные аудио-видеокомплексы для переговорных с многоуровневой конференц-связью;</li>
 
  <li>возможность работы с различными источниками информации - видеоматериалами, DVD, компьютерными презентациями и пр.;</li>
 
  <li>режим телеконференций с участниками, находящимися в любой точке мира;</li>
 
  <li>использование специальных методов защиты информации  для обеспечения конфиденциальности переговоров.</li>
 </ul>
 
<br />
 
<p><strong>Система «мультирум»</strong> разрабатывается персонально для каждого заказчика с учётом уровня сложности (назначения, количества источников, задействованных помещений и пр.), особенностей объекта, и Ваших индивидуальных пожеланий.</p>
 
<br />
 
<p>Предлагаемая система может устанавливаться как индивидуально, так и входить в комплексную систему автоматизации <a href="/solutions/automation/smart_house/" title="Система «умный дом» от компании Эlevel Инженер" target="_blank" >«умный дом»</a>.</p>
 
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
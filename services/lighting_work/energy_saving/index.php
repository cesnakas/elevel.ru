<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Энергосберегающее освещение | Эlevel");
$APPLICATION->SetPageProperty("description", "Компания Эlevel предлагает энергосберегающие системы освещения с использованием технологий Esylux");
$APPLICATION->SetPageProperty("tags", "энергосберегающее освещение, энергосберегающие системы освещения, esylux, энергосбережение в освещении, энергосбережение в системах освещения, энергосбережение в наружном освещении, энергосбережение в уличном освещении, системы энергосбережения, датчики присутствия, датчики движения, датчики освещенности, осветительное оборудование, уличное освещение, автоматические фонари, автоматические прожекторы, энергосберегающие фонари, энергосберегающие светильники, энергосберегающие лампы");
$APPLICATION->SetPageProperty("keywords", "энергосберегающее освещение, энергосберегающее светодиодное освещение, энергосберегающие системы освещения");
$APPLICATION->SetTitle("Энергосберегающее освещение | Эlevel");
?> 
<h1>Энергосберегающее освещение</h1>
<?if($_REQUEST["print"] !== "Y"){?> 
<div class="rbutton-long"> <span id="diod" class="button_forms">Запросить светодиодную продукцию</span></div>
<?}?> 
<div style="clear: both; "></div>
 
<p></p>
 
<p>Энергозатраты &ndash; весьма ощутимая и неизбежная статья расходов при эксплуатации объектов, особенно на крупномасштабных объектах, где требуется круглосуточное обеспечение работы электрооборудования. Чтобы максимально снизить затраты и оптимизировать потребление электроэнергии, мы предлагаем использовать технологии <strong>энергосберегающего освещения</strong> от немецкой компании <strong>Esylux</strong>. </p>
 
<br />
 <center><img src="/images/ei_energy_save.png" alt="Светотехнический проект энергосберегающего освещения от компании Эlevel Инженер" title="Светотехнический проект энергосберегающего освещения от компании Эlevel Инженер" class="sol_bp"  /> </center> 
<br />
 
<p>Оборудование, предлагаемое компанией - это способ разумного и эффективного управления освещением, которое позволит Вам экономить до 70% ресурсов.</p>
 
<br />
 
<p> 	 	 	 	 
<style type="text/css"> 	&lt;!-- 		@page { size: 21cm 29.7cm; margin: 2cm } 		P { margin-bottom: 0.21cm } 	--&gt; 	</style>
 </p>
 
<p style="margin-bottom: 0cm; ">Esylux предлагает <b>датчики присутствия, датчики движения</b>, сумеречные переключатели, осветительные приборы с встроенными датчиками движения и оборудование для внутреннего и наружного освещения, в том числе энергосберегающие светильники, благодаря которым можно добиться не только значительно экономии энергопотребления, но и сократить эксплуатационные расходы и снизить уровень выброса CO2.</p>
 
<br />
 
<p>Всё оборудование Esylux имеет встроенный датчик освещенности и таймер задержки отключения, а для большинства моделей также предусмотрена возможность настройки и контроля с пульта дистанционного управления. </p>
 
<br />
 
<p>Список объектов, где могут использоваться датчики движения и присутствия и прочее оборудование от Esylux, неограничен - гостиницы, офисные здания, жилые дома, склады, паркинги, спортивные объекты, больницы, школы, помещения общественного питания и любой другой объект, нуждающийся в <strong>энергосберегающих системах освещения</strong>.</p>
 
<br />
 
<p>Также оборудование Esylux может использоваться в системе &laquo;<a href="/solutions/automation/smart_house/" title="Система умный дом от компании Эlevel Инженер" target="_blank" >умный дом</a>&raquo; по протоколу <strong>KNX</strong>.</p>
 
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
    $('form').css('height','396px');
    
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
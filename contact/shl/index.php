<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Адреса и телефоны офисов и магазино Эlevel");
$APPLICATION->SetPageProperty("tags", "адреса, телефоны, магазины, контакты, филиалы, точки розничной торговли, офисы продаж, шоу-румы, демзалы, демонстрационные залы");
$APPLICATION->SetPageProperty("keywords", "адреса, телефоны, магазины, контакты, филиалы, точки розничной торговли, офисы продаж, шоу-румы, демзалы, демонстрационные залы");
$APPLICATION->SetPageProperty("description", "Контакты офисов продаж, демонстрационных залов, шоу-румов, магазинов и точек розничной торговли, розничной сети Эlevel и филиалов");
$APPLICATION->SetTitle("Контактная информация о компании");	
?>

<?
if($dir=='/contact/shl/'&&($_COOKIE['chek']==0)):?>
<?
$_COOKIE['town_contact']='28214';
$_SESSION['town_contact']='28214';
setcookie ("chek", 1);
?>
<?else:?>
<?
setcookie ("chek", 0);
header('Location:/contact/');
endif;?>

<?$APPLICATION->IncludeFile("/includes/town_contact.php");?>

<p class="h1">Офисы продаж</p>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"offices",
	Array(
		"IBLOCK_TYPE" => "vecancy",
		"IBLOCK_ID" => "24",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "/contact/#SECTION_CODE#/",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(),
		"SECTION_USER_FIELDS" => array(),
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y"
	),
false
);?> 
			
<!--			
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
    $('form').css('height','427px');
   
    $(".inner_params td").first().css('padding','0px');
    
    $('input[name="form_text_690"]').first().keypress(function (e){
        if( e.which!=8 && e.which!=13 && e.which!=0 && (e.which<48 || e.which>57)){
            $(".error").html("Только цифры").show().fadeOut(3000); 
            return false;
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }
    
    $('form[name="question_Shelkovo"]').attr('id','back_call');
    $('form[name="question_Shelkovo"]').attr('accept-charset','windows-1251');
    
    $('#suber-bottom').click(function() {
        //_gaq.push(['_trackEvent', 'sent_project', 'action', 'opt_label', 1]); yaCounter1485305.reachGoal('sent_project');
        NAMEUSER = $('input[name="form_text_688"]').val();
        EMAIL = $('input[name="form_email_689"]').val();
        PHONEUSER = $('input[name="form_text_690"]').val();
        MESSAGES=$('textarea[name="form_textarea_692"]').val();
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
                $('.table-bottom').hide();
                $("#back_call").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>');
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
        <div class="bottom-form-title" style="background-color: #f15922; width: 200px; height: 24px; border-radius: 5px; color: #fff; padding-top: 5px; text-align: center;"><p>Отправить запрос Щелково</p></div>
        <div id="simul_form1"  style="/*height:400px; overflow-y:scroll; margin:-17px 16px 17px 0; position:relative; z-index:10;*/"> 

        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?$APPLICATION->IncludeComponent(
            "doal:form.result.new",
            "",
            Array(
            "SEF_MODE" => "N",    // Включить поддержку ЧПУ
            "WEB_FORM_ID" => "50",    // ID веб-формы
            "LIST_URL" => "/sendquery/sended.php",    // Страница со списком результатов
            "EDIT_URL" => "/sendquery/sended.php",    // Страница редактирования результата
            "SUCCESS_URL" => "/sendquery/sended.php",    // Страница с сообщением об успешной отправке
            "CHAIN_ITEM_TEXT" => "",    // Название дополнительного пункта в навигационной цепочке
            "CHAIN_ITEM_LINK" => "",    // Ссылка на дополнительном пункте в навигационной цепочке
            "IGNORE_CUSTOM_TEMPLATE" => "N",    // Игнорировать свой шаблон
            "USE_EXTENDED_ERRORS" => "N",    // Использовать расширенный вывод сообщений об ошибках
            "CACHE_TYPE" => "N",    // Тип кеширования
            "CACHE_TIME" => "3600",    // Время кеширования (сек.)
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            )
            )
        );?>
    </div>
</div>

<div style="clear: both;"></div>			
-->			
			
<?php 	/*		
<table cellspacing="2" width="100%" style="background-color: rgb(255, 240, 225); margin-bottom: 0px;">
<tr><td width="50%"><a href="/contact/msc/14/" title="Магазины «Розетки &amp; Выключатели» на выставке «РосСтройЭкспо»" class="gray">Выставка РосСтройЭкспо</a></td><td width="50%"><a href="/contact/msc/15/" title="Магазин «Розетки &amp; Выключатели» на выставке «СтройСити»" class="gray">Выставка СтройСити</a></td></tr>
<tr><td><a href="/contact/msc/7/" title="Магазин «Электро» на строительном рынке «41 км МКАД»" class="gray">Строительный рынок 41 км МКАД</a></td><td><a href="/contact/msc/13/" title="Магазин «Электро» на строительном рынке «Мытищинская ярмарка»" class="gray">Строительный рынок Мытищинская Ярмарка</a></td></tr>
<tr><td><a href="/contact/msc/8/" title="Магазины «Электро» на строительном рынке «Каширский Двор»" class="gray">Строительный рынок Каширский Двор</a></td><td><a href="/contact/msc/9/" title="Магазин «Электро» на строительном рынке «Каширский Двор-3»" class="gray">Строительный рынок Каширский Двор 3</a></td></tr>
<tr><td><a href="/contact/msc/4/" title="Магазины «Электро» на строительном рынке «Никольский ТВК»" class="gray">Строительный рынок Никольский ТВК</a></td><td><a href="/contact/msc/5/" title="Магазин «Электро» в торговом комплексе «Люблинское поле»" class="gray">Cтроительный рынок Люблинское поле</a></td></tr>
<tr><td><a href="/contact/msc/11/" title="Магазины «Электро» на строительном рынке «Синдика О»" class="gray">Строительный рынок Cиндика О</a></td><td><a href="/contact/msc/12/" title="Магазины «Электро» на строительном рынке «Владимирский Тракт»" class="gray">Строительный рынок Владимирский Тракт</a></td></tr>
<tr><td><a href="/contact/msc/10/" title="Магазин «Электро» на строительном рынке «Дмитровский Двор»" class="gray">Строительный рынок Дмитровский Двор</a></td><td><a href="/contact/msc/6/" title="Магазин «Электро» на строительном рынке «Тракт-Терминал»" class="gray">Строительный рынок Тракт-Терминал</a></td></tr></table>
*/?>		

<script type="text/javascript" src="/js/highslide.js"></script>
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css">
<![endif]-->
<script type="text/javascript">
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.allowMultipleInstances = false;
</script>
<script type="text/javascript">
//<![CDATA[
//hs.registerOverlay({
//	fade: 2 // fading the semi-transparent overlay looks bad in IE
//});
hs.graphicsDir = '/images/highslide/';
hs.wrapperClassName = 'borderless';
//]]>
</script>
<?php /*
<h1>Офисы продаж: </h1>
 
<h1>
<span style="vertical-align: middle; font-size: 14px; "><a href="#msc">Москва</a>  
<a href="#mo">Московская обл.</a>  <a href="#spb">Санкт-Петербург</a>  
<a href="#ekt">Екатеринбург</a>  <a href="#nsk">Новосибирск</a>  
<a href="#rst">Ростов-на-Дону</a>  <a href="#orn">Оренбург</a></span>
</h1>
<table cellspacing="10"> 
		<?php

		
		$city_arr[0] = '';
		$city_arr[1] = 'msc_inc.php';
		$city_arr[2] = 'spb_inc.php';
		$city_arr[3] = 'ekt_inc.php';
		$city_arr[4] = 'nsk_inc.php';
		$city_arr[5] = 'rst_inc.php';
		$city_arr[6] = 'orn_inc.php';
		if ($TRGlobalSe)
		{
		 if ($city == "Санкт-Петербург")
		 {
			$city_arr[0] = 'spb_inc.php';
			$city_arr[2] = '';
		 }
		 elseif ($city == "Екатеринбург")
		 {
			$city_arr[0] = 'ekt_inc.php';
			$city_arr[3] = '';
		 }
		 elseif ($city == "Новосибирск")
		 {
			$city_arr[0] = 'nsk_inc.php';
			$city_arr[4] = '';
		 }
		 elseif ($city == "Ростов-на-Дону")
		 {
			$city_arr[0] = 'rst_inc.php';
			$city_arr[5] = '';
		 }
		 elseif ($city == "Оренбург")
		 {
			$city_arr[0] = 'orn_inc.php';
			$city_arr[6] = '';
		 }
		}
		 for ($i=0; $i<7; $i++)
		 {
			if ($city_arr[$i] != '') include($city_arr[$i]);
		 }

		?>
</table>
<img src="/images/contacts/qr-code_2.gif" alt="QR CODE Эlevel" title="QR CODE Эlevel" style="margin: 5px 5px 5px 5px;float:right;"><h3><a href="javascript:window.open('http://maps.yandex.ru/?um=fV_U7pqPeZ_M6WMiQ8DpEQFfANlQHoeY&l=map', '', 'width=1280,height=1024,status=no,resizable=no,');" title="развернуть Яндекс.Карту на весь экран" target="_blank">развернуть на весь экран на Яндекс.Картах ^</a></h3>
<h3><a href="javascript:window.open('/contact/fl_map.php', '', 'width=1164,height=813,status=no,resizable=no,');" title="развернуть флеш-карту на весь экран" target="_blank">развернуть на весь экран на флеш-карте ^</a></h3>
<a href="#header-buttons" style="float:right">наверх ^</a>

*/
?>
		<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
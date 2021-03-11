<?
require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";
if ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')
    return;
?>
<? if (!$_REQUEST["submit"]) { ?> 
    <style type="text/css">
        .table10 select {width: 145px; font-size: 10px;}
        .table10 textarea {width: 315px; height: 95px;}
        .table10 .inputfile {width: 168px; *width: 145px;}
    </style>

    <h6 style="*margin-top: -7px;">Отправить запрос<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>

    <div id="simul_form">
        <div class="info"></div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
        <?
        $APPLICATION->IncludeComponent(
                "doal:form.result.new", "", Array(
            "SEF_MODE" => "N", // Включить поддержку ЧПУ
            "WEB_FORM_ID" => "1", // ID веб-формы
            "LIST_URL" => "/sendquery/sended.php", // Страница со списком результатов
            "EDIT_URL" => "/sendquery/sended.php", // Страница редактирования результата
            "SUCCESS_URL" => "/sendquery/sended.php", // Страница с сообщением об успешной отправке
            "CHAIN_ITEM_TEXT" => "", // Название дополнительного пункта в навигационной цепочке
            "CHAIN_ITEM_LINK" => "", // Ссылка на дополнительном пункте в навигационной цепочке
            "IGNORE_CUSTOM_TEMPLATE" => "N", // Игнорировать свой шаблон
            "USE_EXTENDED_ERRORS" => "N", // Использовать расширенный вывод сообщений об ошибках
            "CACHE_TYPE" => "N", // Тип кеширования
            "CACHE_TIME" => "3600", // Время кеширования (сек.)
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            )
                )
        );
        ?>

    </div>

    <script>

        $(document).ready(function () {
            $('input[name="form_text_7"]').keypress(function (e) {
                if (e.which != 8 && e.which != 13 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //$(".error").html("Только цифры").show().fadeOut(3000);
                    var errorValidPhone = "<p style=\"color:red;\">Только цифры</p>";
                    //$(errorValidPhone).insertAfter('input[name="form_text_7"]').fadeOut(3000);
                    $('input[name="form_text_7"]').css({"border": "1px solid red"});
                    return false;
                } else {
                    $('input[name="form_text_7"]').css({"border-color": "#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7", "border-width": "1px", "border-style": "solid"});
                }
            });
            $('input[name="form_text_7"]').mask("+7(999) 999-99-99");

            /*	$('input[name="form_text_6"]').keypress(function (e){
             if(e.which==13){
             $(this).parent().parent().parent().find("tr").first().next().find("input").focus();
             }
             }); */

            $('form[name="SIMPLE_FORM_1"]').keypress(function (e) {
                if (e.which == 13) {
                    return false;
                }
            });

            $(".table10").append('<tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> Обязательные для заполнения поля.</p><p>Нажимая на кнопку "Отправить", я соглашаюсь на передачу<br>и обработку <a href="/upload/agreement.pdf" target="_blank">персональных данных</a>.</p><span id="call_close"><img src="/i/btn140f.gif"></span><span id="suber" class="tz_form_send_btn">Отправить</span></td></tr>');

            function isValidEmailAddress(emailAddress) {
                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            }

            $('#callback_close,call_close').click(function () {
                $('#fade, #container2, .popup398').css('display', 'none');
            });

            $('form[name="SIMPLE_FORM_1"]').attr('id', 'back_call');
            $('form[name="SIMPLE_FORM_1"]').attr('accept-charset', 'windows-1251');


            $('form#back_call').ajaxForm({
                success: function (data) {
                    $('.table10').hide();
                    $("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')

                }
            });

            $('#suber').click(function () {
                //alert("qq");
                var erroreValidName = "<p style=\"color:red;\">Введите имя</p>";
                var erroreValidEmail = "<p style=\"color:red;\">Не введен email</p>";
                var erroreValidEmail2 = "<p style=\"color:red;\">Не корректный email</p>";
                var erroreValidPhone2 = "<p style=\"color:red;\">Введите номер телефона</p>";
                _gaq.push(['_trackEvent', 'done_request', 'action', 'opt_label', 1]);
                yaCounter1485305.reachGoal('done_request');
                NAMEUSER = $('input[name="form_text_6"]').val();
                EMAIL = $('input[name="form_email_8"]').val();
                //console.log(EMAIL);
                PHONEUSER = $('input[name="form_text_7"]').val();
                //MESSAGE=$('textarea[name="form_textarea_18"]').val();
                textError = '';
                error = 0;
                if (NAMEUSER == '') {
                    //textError='Введите имя<br>';error = 1;
                    $(erroreValidName).insertAfter('input[name="form_text_6"]').fadeOut(3000);
                    $('input[name="form_text_6"]').css({"border": "1px solid red"});
                    error = 1;
                } else {
                    $('input[name="form_text_6"]').css({"border-color": "#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7", "border-width": "1px", "border-style": "solid"});
                }
                ;
                if (EMAIL == '') {
                    //textError+='Не введен email<br>';
                    $(erroreValidEmail).insertAfter('input[name="form_email_8"]').fadeOut(3000);
                    $('input[name="form_email_8"]').css({"border": "1px solid red"});
                    error = 1;
                } else {
                    $('input[name="form_email_8"]').css({"border-color": "#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7", "border-width": "1px", "border-style": "solid"});
                    if (!isValidEmailAddress(EMAIL)) {
                        //textError+='Не корректный email<br>';
                        $(erroreValidEmail2).insertAfter('input[name="form_email_8"]').fadeOut(3000);
                        $('input[name="form_email_8"]').css({"border": "1px solid red"});
                    } else {
                        $('input[name="form_email_8"]').css({"border-color": "#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7", "border-width": "1px", "border-style": "solid"});
                    }
                    ;

                }

                if (PHONEUSER == '') {
                    //textError+='Введите номер телефона<br>';
                    $(erroreValidPhone2).insertAfter('input[name="form_text_7"]').fadeOut(3000);
                    $('input[name="form_text_7"]').css({"border": "1px solid red"});
                    error = 1;
                } else {
                    $('input[name="form_text_7"]').css({"border-color": "#b7b7b7 #e4e3e3 #e4e3e3 #b7b7b7", "border-width": "1px", "border-style": "solid"});
                }
                ;
                //if(MESSAGE==''){textError+='Введите сообщение<br>';error = 1;};
                    if (error == 0) {
                        _gaq.push(['_trackEvent', 'verhnyaya-knopka-zapros-new', 'send']);
                        _gaq.push(['_trackPageview', '/verhnyaya-knopka-zapros-new_send']); 
						(window['rrApiOnReady'] = window['rrApiOnReady'] || []).push(function() { rrApi.setEmail(EMAIL); });
                        yaCounter1485305.reachGoal('verhnyaya-knopka-zapros-new_send');
                        $('form#back_call').attr("action", "/sendquery/add_callback.php");
                        $('#back_call').submit();
                    } else {
                        $('.error').empty();
                        $('.error').show().fadeOut(3000);
                        $('.error').html(textError);
                    }
            });


            $('#call_close,#call_close1').click(function () {
                $('#fade, #container2, .popup398').css('display', 'none');
            });

            $("#form_dropdown_profdeyat,#form_dropdown_uoffice").attr('class', 'sel1');
            $(".sel1").css('width', '170px');
            $('input[name="form_file_284"]').attr('size', '12');


            $('input[name="form_text_9"],input[name="form_email_8"],input[name="form_text_6"]').attr('class', 'w170');
            $('textarea').attr('class', 'h92');

            $('input[name="form_text_7"]').attr('class', 'w170');

            $('input[name="web_form_submit"]:not(#bottom-submit)').parent().parent().css('display', 'none');
            $('input[name="web_form_submit"]:not(#bottom-submit)').parent().parent().remove();
        });

    </script>

<? } else {
    ?>

    <?
}
?>

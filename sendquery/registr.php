<? require_once $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";
if ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')
    return;
?>
<? if (!$_REQUEST["sender"]) {
    ?>

    <script type="text/javascript" src="/js/jquery.validate.js"></script>
    <style type="text/css">
        #ui-datepicker-div {
            z-index:6666 !important;
        }
    </style>
    <script src="/js/masked.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#phone").mask("7(999)9999999");

        });
        $(function () {
            $("#datepicker_reg").datepicker();
            $("#datepicker_reg").datepicker("option", "dateFormat", "dd.mm.yy");
        });
        $(document).ready(function () {
            $('.ip_type_kpp').css("display", "none");
            function isValidEmailAddress(emailAddress) {

                var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                return pattern.test(emailAddress);
            }

            $('#callback_close,#call_close').click(function () {
                $('#fade, #container2, .popup560').css('display', 'none');
            });

            $('#authorize').click(function () {
                $('.popup398Content').empty().load('/sendquery/auth.php');
                var x = $('body').height();
                $('#fade').height(x);
                $('#container2, .popup398').css('display', 'block');
                $('#fade').fadeTo('slow', 0.5);
            });

            $(document).on("blur", 'input[name="email"]', function (data) {
                var getUserMail = $('input[name="email"]').val();
                console.log(getUserMail);
                $.post("/tz-test.php", {UserMail: getUserMail}, function (data) {
                    console.log(data);
//                    if (data == 0)
//                    {
//                        textMailError = 'Такой E-mail уже существует<br>';
//                        $(".mailError").html(textMailError);
//                        $(".mailError").css("display", "block");
//                        $("#non-active-suber").css("display", "block");
//                    } else if (data == 1)
//                    {
//                        $(".mailError").html("");
//                        $(".mailError").css("display", "none");
//                        $("#non-active-suber").css("display", "none");
//                    }
                    //console.log(error);
                    $(".mailError").html("");
                    $(".mailError").css("display", "none");
                    $("#non-active-suber").css("display", "none");
                });
            });

            $('#suber').click(function () {
                error = 0;
                //$('.table10').hide();
                //$("#simul_form").append('<div style="text-align: center; padding: 80px 0px; font-size: 16px; margin-bottom: 20px;">Ваш запрос успешно отправлен!</div>')
                LOGIN = $('input[name="login"]').val();
                PASSWORD = $('input[name="password"]').val();
                CHECKPASS = $(".w249-check-pass").val()
                EMAIL = $('input[name="email"]').val();
                USERNAME = $('input[name="user_name"]').val();
                USERSERNAME = $('input[name="user_family"]').val();
                PHONE = $('input[name="phone"]').val();
                CAPTCHA = $('input[name="captcha_code"]').val();
                CAPTCHAWORD = $('input[name="captcha_word"]').val();
                user_city = $('input[name="user_city"]').val();
                user_doljn = $('input[name="user_doljn"]').val();
                user_kpp = $('input[name="user_kpp"]').val();
                user_deyal = $('.user_deyal').val();
                type_user = $('input[name="type_user"]').val();
                user_inn = $('input[name="user_inn"]').val();
                user_org_name = $('input[name="user_org_name"]').val();
                ulser_lastname = $('input[name="ulser_lastname"]').val();
                date_bd = $('input[name="date_bd"]').val();
                user_gendor = $('input[name="user_gendor"]').val();
                user_fact = $('.user_fact').val();
                propCheckboxPersonal = $("#header-registr-personal-checkbox").prop("checked");

                user_ur_addr = $('input[name="user_ur_addr"]').val();
                user_fact_addr = $('input[name="user_fact_addr"]').val();
                user_zip = $('input[name="user_zip"]').val();
                user_ras_schet = $('input[name="user_ras_schet"]').val();
                user_bik = $('input[name="user_bik"]').val();
                user_bank_name = $('input[name="user_bank_name"]').val();
                user_kad_schet = $('input[name="user_kad_schet"]').val();

                textError = '';

                if (LOGIN == '') {
                    textError = 'Не введен логин<br>';
                    error = 1;
                }
                if (LOGIN.length < 3) {
                    textError = 'Логин длиной менее 3 символов<br>';
                    error = 1;
                }
                if (PASSWORD == '') {
                    textError += 'Не введен пароль<br>';
                    error = 1;
                }
                if (PASSWORD.length < 6) {
                    textError = 'Пароль длиной менее 6 символов<br>';
                    error = 1;
                }
                if (EMAIL == '') {
                    textError += 'Не введен email<br>';
                    error = 1;
                } else {
                    if (!isValidEmailAddress(EMAIL)) {
                        textError += 'Не корректный email<br>';
                    }
                    ;
                }
                if (USERNAME == '') {
                    textError += 'Не введено имя<br>';
                    error = 1;
                }
                if (PHONE == '') {
                    textError += 'Не введен телефон<br>';
                    error = 1;
                }
                if (CAPTCHAWORD == '') {
                    textError += 'Не введен код с картинки<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_org_name == '') {
                    textError += 'Не введено название организации<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_inn.length != 10) {
                    textError += 'ИНН должен содержать 10 цифр<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_kpp == '') {
                    textError += 'КПП не заполнен<br>';
                    error = 1;
                }

                if ($(".ur_type").hasClass("act_type") && user_ur_addr == '') {
                    textError += 'Юридический адрес не заполнен<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_fact_addr == '') {
                    textError += 'Фактический адрес не заполнен<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_zip == '') {
                    textError += 'Почтовый адрес не заполнен<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_ras_schet == '') {
                    textError += 'Расчетный счет не заполнен<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_bik == '') {
                    textError += 'БИК не заполнен<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_bank_name == '') {
                    textError += 'Наименование банка не заполнено<br>';
                    error = 1;
                }
                if ($(".ur_type").hasClass("act_type") && user_kad_schet == '') {
                    textError += 'Кадастровый счет не заполнен<br>';
                    error = 1;
                }



                if ($(".ip_type").hasClass("act_type") && user_org_name == '') {
                    textError += 'Не введено название организации<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_inn.length != 10) {
                    textError += 'ИНН должен содержать 10 цифр<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_kpp == '') {
                    textError += 'КПП не заполнен<br>';
                    error = 1;
                }

                if ($(".ip_type").hasClass("act_type") && user_ur_addr == '') {
                    textError += 'Юридический адрес не заполнен<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_fact_addr == '') {
                    textError += 'Фактический адрес не заполнен<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_zip == '') {
                    textError += 'Почтовый адрес не заполнен<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_ras_schet == '') {
                    textError += 'Расчетный счет не заполнен<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_bik == '') {
                    textError += 'БИК не заполнен<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_bank_name == '') {
                    textError += 'Наименование банка не заполнено<br>';
                    error = 1;
                }
                if ($(".ip_type").hasClass("act_type") && user_kad_schet == '') {
                    textError += 'Кадастровый счет не заполнен<br>';
                    error = 1;
                }

                if (PASSWORD != CHECKPASS)
                {
                    textError += 'Пароли не совпадают<br>';
                    error = 1;
                }

                if (propCheckboxPersonal == false)
                {
                    textError += 'Не отмечено поле "Я даю согласие на обработку предоставленных персональных данных"<br>';
                    error = 1;
                }

                /*    if($(".ur_type").hasClass("act_type") && user_deyal==''){
                 textError+='Не заполнено поле "вид деятельности"<br>';
                 error = 1;
                 }*/

                if (error == 0) {
					(window['rrApiOnReady'] = window['rrApiOnReady'] || []).push(function() { rrApi.setEmail($('#EmailFieldID2').val());});
                    $.post('/sendquery/registr.php?sender=Y', {CAPTCHA: CAPTCHA, CAPTCHAWORD: CAPTCHAWORD, LOGIN: LOGIN, PASSWORD: PASSWORD, EMAIL: EMAIL, USERNAME: USERNAME, USERSERNAME: USERSERNAME, PHONE: PHONE, user_city: user_city, user_doljn: user_doljn, user_kpp: user_kpp, user_deyal: user_deyal, type_user: type_user, user_inn: user_inn, user_fact: user_fact, user_org_name: user_org_name, ulser_lastname: ulser_lastname, date_bd: date_bd, user_gendor: user_gendor}, function (data) {
                        console.log(data);
                        if (parseInt(data) == 1) {
                            $(".table10").hide();
                            $('.error').empty().hide();
                            $('.info').empty();
                            $('.info').show();

                            $('.info').html('На указанный вами e-mail отправлена регистрационная информация.');
                            jQuery('#container2').delay(3000).fadeOut();
                            jQuery('#fade').delay(3000).fadeOut();
                            setTimeout(function () {
                                location.reload();
                            }, 3000);

                        } else if (parseInt(data) == "2") {
                            alert("Слово с картинки введено не верно");
                        } else {
                            $('.info').empty();
                            $('.info').append('<div>При отправке сообщения произошла ошибка!<br/> Повторите позднее или обратитесь к администратору!</div>');
                        }
                    }, 'html');
                } else {

                    $('.error').show();
                    $('.error').html(textError);
                }
                ;
                return false;
            });

        });
        $(document).ready(function () {
            $("input[name=user_name]").suggestions({
                serviceUrl: "https://dadata.ru/api/v2",
                token: "3ddfe6802b17d1459b1980a966f8270d7cd684a6",
                type: "NAME",
                /* Вызывается, когда пользователь выбирает одну из подсказок */
                onSelect: function (suggestion) {
                    console.log(suggestion);
                }
            });
            $("input[name=email]").suggestions({
                serviceUrl: "https://dadata.ru/api/v2",
                token: "3ddfe6802b17d1459b1980a966f8270d7cd684a6",
                type: "EMAIL",
                /* Вызывается, когда пользователь выбирает одну из подсказок */
                onSelect: function (suggestion) {
                    console.log(suggestion);
                }
            });
            $("input[name=user_city]").suggestions({
                serviceUrl: "https://dadata.ru/api/v2",
                token: "3ddfe6802b17d1459b1980a966f8270d7cd684a6",
                type: "ADDRESS",
                count: 5,
                /* Вызывается, когда пользователь выбирает одну из подсказок */
                onSelect: function (suggestion) {
                    console.log(suggestion);
                }
            });
            $("input[name=user_inn]").suggestions({
                serviceUrl: "https://dadata.ru/api/v2",
                token: "3ddfe6802b17d1459b1980a966f8270d7cd684a6",
                type: "PARTY",
                count: 5,
                /* Вызывается, когда пользователь выбирает одну из подсказок */
                onSelect: function (suggestion) {
                    console.log(suggestion);
                    $("input[name=user_inn]").val(suggestion.data.inn);
                    $("input[name=user_kpp]").val(suggestion.data.kpp);
                    $("input[name=user_org_name]").val(suggestion.data.name.full);
                    $("input[name=user_ur_addr]").val(suggestion.data.address.value);
                    $("input[name=user_fact_addr]").val(suggestion.data.address.value);
                }
            });
            $("input[name=user_bik]").suggestions({
                serviceUrl: "https://dadata.ru/api/v2",
                token: "3ddfe6802b17d1459b1980a966f8270d7cd684a6",
                type: "BANK",
                count: 5,
                /* Вызывается, когда пользователь выбирает одну из подсказок */
                onSelect: function (suggestion) {
                    console.log(suggestion);
                    $("input[name=user_bik]").val(suggestion.data.bic);
                    $("input[name=user_bank_name]").val(suggestion.unrestricted_value);
                    $("input[name=user_kad_schet]").val(suggestion.data.correspondent_account);
                }
            });
        });
        $(document).on("click", ".type_user_cl", function () {
            $(".type_user_cl").removeClass("act_type");
            $(this).addClass("act_type");
            if ($(this).hasClass("ur_type")) {
                $(".hide_reg").css("display", "table-row");
                $(".fizur").val("2");
                $(".fiz_show").css("display", "none");
                $('.ip_type_kpp').css("display", "table-row");
                $(".user_fact_adr").html("Фактический адрес:");
                $('input[name=user_inn]').attr('maxlength', 10);
            } else {
                if ($(this).hasClass("ip_type")) {
                    $(".fizur").val("3");
                    $('.ip_type_kpp').css("display", "none");
                    $('input[name=user_inn]').attr('maxlength', 12);
                    $(".hide_reg").css("display", "table-row");
                    $(".fiz_show").css("display", "none");
                    $(".user_fact_adr").html("Фактический адрес:");
                } else {
                    console.log('1')
                    $(".fizur").val("1");
                    $('.ip_type_kpp').css("display", "none");
                    $(".fiz_show").css("display", "table-row");
                    $(".user_fact_adr").html("Адрес:");
                    $(".hide_reg").css("display", "none");
                }

            }
        })
    </script>

    <!--<span class="type_user_cl act_type fiz_type">Физическое лицо</span>
    <span class="type_user_cl ur_type">Юридическое лицо</span>
    <h6>Регистрация<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>

    <div class="info" style="margin-bottom: 20px;padding: 50px 30px;text-align: center; display:none;">
    </div>
        <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;">
        
        </div>
    <table class="table10 q29">
                                    <tbody>
                                    <tr>
                                            <td><p>Логин:<span>*</span></p></td>
                                            <td colspan="3"><input type="text" class="w249" name="login"><p class="note2">Логин должен быть длиной не менее 3 символов.</p></td>
                                    </tr>
                                    
                                    <tr>
                                            <td><p>Пароль:<span>*</span></p></td>
                                            <td colspan="3"><input type="password" class="w249" name="password"><p class="note2">Пароль должен быть длиной не менее 6 символов.</p></td>
                                    </tr>
                                    <tr>
                                            <td><p>E-mail:<span>*</span></p></td>
                                            <td colspan="3"><input type="text" class="w249" name="email" ></td>
                                    </tr>
                                    <tr>
                                            <td><p>Имя:<span>*</span></p></td>
                                            <td colspan="3"><input type="text" class="w249" name="user_name"></td>
                                    </tr>
                    <tr>
                        <td><p>Фамилия:</p></td>
                        <td colspan="3"><input type="text" class="w249" name="user_family" ></td>
                    </tr>				
                    <tr>
                                            <td><p>Отчество:</p></td>
                                            <td colspan="3"><input type="text" class="w249" name="ulser_lastname" ></td>
                                    </tr>
                                    <tr>
                                            <td class="w67"><p>Телефон:<span>*</span></p></td>
                                            <td><input type="text" class="w249" id="phone" name="phone"></td>	
                                    </tr>		
                    <tr class="fiz_show">
                        <td><p>Пол:</p></td>
                            <td colspan="3">
                                <label><input type="radio" name="user_gendor" value="M"> Мужчина</label>
                                <label><input type="radio" name="user_gendor" value="F"> Женщина</label>
                            </td>
                    </tr>                
                    <tr class="fiz_show">
                        <td><p>Дата<br>рождения:</p></td>
                            <td colspan="3">
                                <input type="text" id="datepicker_reg" class="w249" name="date_bd" value="">
                            </td>
                    </tr>
                    <tr class="hide_reg">
                        <td><p style="font-size:9px;">Наименование организации: <span>*</span></p></td>
                        <td colspan="3"><input type="text" class="w249" name="user_org_name" ></td>
                    </tr> 	
                    <tr class="hide_reg">
                        <td><p>Должность:<span>*</span></p> </td>
                        <td colspan="3"><input type="text" class="w249" name="user_doljn" ></td>
                    </tr>                    
                    <tr class="hide_reg">
                        <td><p>ИНН: <span>*</span></p> </td>
                        <td colspan="3"><input type="text" class="w249" maxlength="10" name="user_inn" ></td>
                    </tr>                    
                    <tr class="hide_reg">
                        <td><p>КПП:</p></td>
                        <td colspan="3"><input type="text" class="w249" name="user_kpp" ></td>
                    </tr>                    
                    <tr class="">
                        <td><p>Город:</p></td>
                        <td colspan="3"><input type="text" class="w249" name="user_city" ></td>
                    </tr>                    
                    <tr>
                        <td><p class="user_fact_adr">Адрес:</p></td>
                        <td colspan="3"><textarea style="height:76px" class="w249 user_fact" name="user_fact" ></textarea></td>
                    </tr>
                    <tr class="">
                        <td><p>Вид деят-ли:</p></td>
                        <td colspan="3">
                        <select class="w249 user_deyal" name="user_deyal">
                            <option value="Не выбрано">не выбрано</option>
                            <option value="Частный заказчик">Частный заказчик</option>
                            <option value="Проектировщик, дизайнер">Проектировщик, дизайнер</option>
                            <option value="Инвестор, Ген.Подрядчик">Инвестор, Ген.Подрядчик</option>
                            <option value="Электромонтажник, инсталлятор">Электромонтажник, инсталлятор</option>
                            <option value="Магазин электротоваров">Магазин электротоваров</option>
                        </select></td>
                    </tr> 	
                    <input type="hidden" class="fizur" value="1" name="type_user">			
    <? /* include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
      $cpt = new CCaptcha();
      $captchaPass = COption::GetOptionString("main", "captcha_password", "");
      if(strlen($captchaPass) <= 0)
      {
      $captchaPass = randString(10);
      COption::SetOptionString("main", "captcha_password", $captchaPass);
      }
      $cpt->SetCodeCrypt($captchaPass); */
    ?>
                                    <input type="hidden" name="captcha_code" value="<? //=htmlspecialchars($cpt->GetCodeCrypt()); ?>">
                                    
                                    <tr><td colspan="4" style="padding:0;"><p class="txt8"></p></td></tr>
                                    
                                    <tr>
                                            <td class="w67"><p>Слово с картинки:<span>*</span></p></td>
                                            <td colspan="4" style="padding:0;">				
                                            <input id="captcha_word" name="captcha_word" class="w42" type="text" style="margin-right: 22px;">
                                            <img src="/bitrix/tools/captcha.php?captcha_code=<? //=htmlspecialchars($cpt->GetCodeCrypt()); ?>">
                                            </td>
                                    </tr>
                                    
                                    <tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> Обязательные для заполнения поля.</p><span id="call_close"><img src="/i/btn140f.gif"></span><span id="suber"><img src="/i/btn140g.gif"></span></td></tr>
                                    
                            </tbody></table>  -->

    <span class="type_user_cl act_type fiz_type">Физическое лицо</span>
    <span class="type_user_cl ur_type">Юридическое лицо</span>
    <span class="type_user_cl ip_type">ИП</span>
    <h6>Регистрация<img src="/i/pix.gif" alt="" width="18" height="19" id="callback_close"/></h6>

    <div class="info" style="margin-bottom: 20px;padding: 50px 30px;text-align: center; display:none;">
    </div>
    <div class="mailError" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;"></div>
    <div class="error" style="margin-bottom: 20px;padding: 0px 30px;text-align: center; display:none;">

    </div>
    <table class="table10 q29">
        <tbody>
            <tr>
                <td><p>E-mail:<span>*</span></p></td>
                <td colspan="3"><input type="text" class="w249" name="email" id="EmailFieldID2" ></td>
            </tr>
            <tr>
                <td><p>Логин:<span>*</span></p></td>
                <td colspan="3"><input type="text" class="w249" name="login"><p class="note2">Логин должен быть длиной не менее 3 символов.</p></td>
            </tr>

            <tr>
                <td><p>Пароль:<span>*</span></p></td>
                <td colspan="3"><input type="password" class="w249" name="password"><p class="note2">Пароль должен быть длиной не менее 6 символов.</p></td>
            </tr>

            <tr>
                <td><p style="padding: 0 !important;">Подтвердить пароль:<span>*</span></p></td>
                <td colspan="3"><input type="password" class="w249 w249-check-pass" name="password"></td>
            </tr>


            <tr>
                <td></td>
                <td colspan="3">
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
            </tr>

            <tr>
                <td><p>ФИО:<span>*</span></p></td>
                <td colspan="3"><input type="text" class="w249" name="user_name"></td>
            </tr>
            <? /* <tr>
              <td><p>Имя:<span>*</span></p></td>
              <td colspan="3"><input type="text" class="w249" name="user_name"></td>
              </tr>
              <tr>
              <td><p>Фамилия:</p></td>
              <td colspan="3"><input type="text" class="w249" name="user_family" ></td>
              </tr> */ ?>				

            <tr>
                <td class="w67"><p>Телефон:<span>*</span></p></td>
                <td><input type="text" class="w249" id="phone" name="phone"></td>	
            </tr>

            <tr class="">
                <td><p>Город: <span>*</span></p></td>
                <td colspan="3"><input type="text" class="w249" name="user_city" ></td>
            </tr>		

            <tr class="hide_reg">
                <td colspan="3">
                </td>
            </tr> 


            <tr class="hide_reg">
                <td><p>Должность:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_doljn" ></td>
            </tr>    
            <tr class="hide_reg">
                <td><p>ИНН: <span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" maxlength="10" name="user_inn" ></td>
            </tr> 	 
            <tr class="ip_type_kpp">
                <td><p>КПП:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_kpp" ></td>
            </tr>        
            <tr class="hide_reg">        
                <td colspan="3"><p style="font-size:9px;">
                    <div class="tz-organization-name">Наименование организации: <span style="color: red;">*</span></div>
                    <input style="width: 217px; margin-left: 12px" type="text" class="w249" name="user_org_name" ></p>
                </td>
            </tr> 
            <tr class="hide_reg">
                <td><p>Юридический адрес:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_ur_addr" ></td>
            </tr>     
            <tr class="hide_reg">
                <td><p>Фактический адрес:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_fact_addr" ></td>
            </tr>                          
            <tr class="hide_reg">
                <td><p>Почтовый адрес:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_zip" ></td>
            </tr>     
            <tr class="hide_reg">
                <td><p>Расчетный счет:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_ras_schet" ></td>
            </tr>     
            <tr class="hide_reg">
                <td><p>БИК:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_bik" ></td>
            </tr>     
            <tr class="hide_reg">
                <td><p>Наименование банка:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_bank_name" ></td>
            </tr>                          
            <tr class="hide_reg">
                <td><p>Кадастровый счет:<span>*</span></p> </td>
                <td colspan="3"><input type="text" class="w249" name="user_kad_schet" ></td>
            </tr>

            <tr>
                <td colspan="3"> 

                    <p class="user_fact_adr1"><input type="checkbox" id="header-registr-product-props-checkbox" checked="checked"></p>
                    <label for="header-registr-product-props-checkbox" class="label-for-header-registr-product-props-checkbox" id="label_for_header_registr_product_props_checkbox">
                        <div class="label-for-header-props-personal-checkbox-checked"></div>
                    </label>

                    <span class="header-registr-personal-data-text" style="word-wrap: break-word;">Я даю согласие на получение индивидуальных  товарных предложений</span>
                </td>
            </tr>

            <tr>
                <td colspan="3"> 

                    <p class="user_fact_adr1"><input type="checkbox" id="header-registr-personal-checkbox" checked="checked"></p>
                    <label for="header-registr-personal-checkbox" class="label-for-header-registr-personal-checkbox" id="label_for_header_registr_personal_checkbox">
                        <div class="label-for-header-registr-personal-checkbox-checked"></div>
                    </label>

                    <span class="header-registr-product-props-data-text" style="word-wrap: break-word;">Я даю согласие на обработку предоставленных <a href="/upload/agreement.pdf" target="_blank">персональных данных</a></span>
                </td>
            </tr>

        <input type="hidden" class="fizur" value="1" name="type_user">			
        <?
        include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/captcha.php");
        $cpt = new CCaptcha();
        $captchaPass = COption::GetOptionString("main", "captcha_password", "");
        if (strlen($captchaPass) <= 0) {
            $captchaPass = randString(10);
            COption::SetOptionString("main", "captcha_password", $captchaPass);
        }
        $cpt->SetCodeCrypt($captchaPass);
        ?>
        <input type="hidden" name="captcha_code" value="<?= htmlspecialchars($cpt->GetCodeCrypt()); ?>">

        <tr><td colspan="4" style="padding:0;"><p class="txt8"></p></td></tr>

        <tr>
            <td class="w67"><p>Слово с картинки:<span>*</span></p></td>
            <td colspan="4" style="padding:0;">				
                <input id="captcha_word" name="captcha_word" class="w42" type="text" style="margin-right: 22px;">
                <img src="/bitrix/tools/captcha.php?captcha_code=<?= htmlspecialchars($cpt->GetCodeCrypt()); ?>">
            </td>
        </tr>

        <tr><td colspan="4" style="padding:0;"><p class="txt8"><span>*</span> &#8212; Обязательные для заполнения поля.</p><span id="call_close"><img src="/i/btn140f.gif"></span><div id="non-active-suber" style="display: none;"></div><span id="suber"><img src="/i/btn140g.gif"></span></td></tr>

    </tbody></table>		                  

    <? } else {
    ?>
    <?
    if ($APPLICATION->CaptchaCheckCode($_REQUEST["CAPTCHAWORD"], $_REQUEST["CAPTCHA"])) {

        global $USER;
        $arResult = $USER->Register(
                iconv("utf-8", "windows-1251", $_REQUEST["LOGIN"]), iconv("utf-8", "windows-1251", $_REQUEST["USERNAME"]), iconv("utf-8", "windows-1251", $_REQUEST["USERSERNAME"]), $_REQUEST["PASSWORD"], $_REQUEST["PASSWORD"], $_REQUEST["EMAIL"]
        );
        $USER_ID = $USER->GetID();
        $user = new CUser;
        if ($_REQUEST["type_user"] == "2") {
            $fields = Array(
                "PERSONAL_PHONE" => $_REQUEST["PHONE"],
                "PERSONAL_CITY" => iconv("utf-8", "windows-1251", $_REQUEST["user_city"]),
                "PERSONAL_STREET" => iconv("utf-8", "windows-1251", $_REQUEST["user_fact"]),
                "WORK_POSITION" => iconv("utf-8", "windows-1251", $_REQUEST["user_doljn"]),
                "WORK_PROFILE" => iconv("utf-8", "windows-1251", $_REQUEST["user_deyal"]),
                "UF_INN" => $_REQUEST["user_inn"],
                "UF_KPP" => iconv("utf-8", "windows-1251", $_REQUEST["user_kpp"]),
                "UF_USER_TYPE" => $_REQUEST["type_user"],
                "WORK_COMPANY" => iconv("utf-8", "windows-1251", $_REQUEST["user_org_name"]),
                "SECOND_NAME" => iconv("utf-8", "windows-1251", $_REQUEST["ulser_lastname"]),
                "PERSONAL_GENDER" => iconv("utf-8", "windows-1251", $_REQUEST["user_gendor"]),
                "PERSONAL_BIRTHDAY" => $_REQUEST["date_bd"],
            );
        } elseif ($_REQUEST["type_user"] == "1") {
            $fields = Array(
                "PERSONAL_PHONE" => $_REQUEST["PHONE"],
                "PERSONAL_CITY" => iconv("utf-8", "windows-1251", $_REQUEST["user_city"]),
                "PERSONAL_STREET" => iconv("utf-8", "windows-1251", $_REQUEST["user_fact"]),
                "UF_USER_TYPE" => $_REQUEST["type_user"],
                "SECOND_NAME" => iconv("utf-8", "windows-1251", $_REQUEST["ulser_lastname"]),
                "PERSONAL_GENDER" => iconv("utf-8", "windows-1251", $_REQUEST["user_gendor"]),
                "PERSONAL_BIRTHDAY" => $_REQUEST["date_bd"],
                "WORK_PROFILE" => iconv("utf-8", "windows-1251", $_REQUEST["user_deyal"]),
            );
        } elseif ($_REQUEST["type_user"] == "3") {
            $fields = Array(
                "PERSONAL_PHONE" => $_REQUEST["PHONE"],
                "PERSONAL_CITY" => iconv("utf-8", "windows-1251", $_REQUEST["user_city"]),
                "PERSONAL_STREET" => iconv("utf-8", "windows-1251", $_REQUEST["user_fact"]),
                "WORK_POSITION" => iconv("utf-8", "windows-1251", $_REQUEST["user_doljn"]),
                "WORK_PROFILE" => iconv("utf-8", "windows-1251", $_REQUEST["user_deyal"]),
                "UF_INN" => $_REQUEST["user_inn"],
                "UF_KPP" => iconv("utf-8", "windows-1251", $_REQUEST["user_kpp"]),
                "UF_USER_TYPE" => $_REQUEST["type_user"],
                "WORK_COMPANY" => iconv("utf-8", "windows-1251", $_REQUEST["user_org_name"]),
                "SECOND_NAME" => iconv("utf-8", "windows-1251", $_REQUEST["ulser_lastname"]),
                "PERSONAL_GENDER" => iconv("utf-8", "windows-1251", $_REQUEST["user_gendor"]),
                "PERSONAL_BIRTHDAY" => $_REQUEST["date_bd"],
            );
        }

        //echo '<pre>'; print_r($fields); echo '</pre>';
        $user->Update($USER_ID, $fields);
        CModule::IncludeModule("sale");
        $arFields_rec = array(
            "NAME" => iconv("utf-8", "windows-1251", $_REQUEST["LOGIN"]),
            "USER_ID" => intval($USER_ID),
            "PERSON_TYPE_ID" => "1"
        );
        $PROFILE_ID = CSaleOrderUserProps::Add($arFields_rec);
        //если профиль создан
        if ($PROFILE_ID) {
            //формируем массив свойств
            $PROPS = Array(
                array(
                    "USER_PROPS_ID" => $PROFILE_ID,
                    "ORDER_PROPS_ID" => 1,
                    "NAME" => "Имя",
                    "VALUE" => iconv("utf-8", "windows-1251", $_REQUEST["USERNAME"])
                ),
                array(
                    "USER_PROPS_ID" => $PROFILE_ID,
                    "ORDER_PROPS_ID" => 30,
                    "NAME" => "Фамилия",
                    "VALUE" => iconv("utf-8", "windows-1251", $_REQUEST["USERSERNAME"])
                ),
                array(
                    "USER_PROPS_ID" => $PROFILE_ID,
                    "ORDER_PROPS_ID" => 2,
                    "NAME" => "Телефон",
                    "VALUE" => $_REQUEST["PHONE"]
                ),
                array(
                    "USER_PROPS_ID" => $PROFILE_ID,
                    "ORDER_PROPS_ID" => 19,
                    "NAME" => "E-mail",
                    "VALUE" => $_REQUEST["EMAIL"]
                ),
                array(
                    "USER_PROPS_ID" => $PROFILE_ID,
                    "ORDER_PROPS_ID" => 4,
                    "NAME" => "Город",
                    "VALUE" => 537
                ),
                array(
                    "USER_PROPS_ID" => $PROFILE_ID,
                    "ORDER_PROPS_ID" => 48,
                    "NAME" => "Сохранить ка платежный шаблон",
                    "VALUE" => "Y"
                )
            );
            //добавляем значения свойств к созданному ранее профилю
            foreach ($PROPS as $prop) {
                if (CSaleOrderUserPropsValue::Add($prop)) {
                    
                }
            }
        }
        print "1";
    } else {
        print "2";
    }
    ?>

    <?
    /* }else{
      //echo $user->LAST_ERROR;
      } */
    ?>
<? } ?>




<? //if($_SERVER['REMOTE_ADDR'] == "178.219.245.154" || $_SERVER['REMOTE_ADDR'] == "89.108.86.114"):?>
<? if ($_SERVER['REMOTE_ADDR'] == "89.108.86.114"): ?>

    <!--<br><br><br><br><br>   <hr>
              
            <input type="text" name="tz-usr-mail" id="tz_usr_mail">
            <span id="mail-test" style="">проверка почты</span> -->
<? endif; ?>
<script type="">
    /*$(document).on("click", "#mail-test", function(){
    var getUserMail = $("input[name='tz-usr-mail']").val();
    console.log(getUserMail);
    $.post("/tz-test.php", {UserMail:getUserMail}, function(data){
    console.log(data);
    });
    });*/
</script>

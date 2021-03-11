<style type="text/css">
    .only-delivery-payment {
        display: none;
    }

    #order-submit:disabled {
        background-color: #ccc;
    }

    #dadata-suggestions {
        display: none;
        border: 1px solid #ccc;
        position: absolute;
        z-index: 1;
        top: 68px;
        left: 0;
    }

    #dadata-suggestions > div {
        display: block;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
        padding: 4px 8px;
    }

    #dadata-suggestions > div:last-child {
        border-bottom: none;
    }

    #dadata-suggestions > div:hover {
        background-color: #eee;
    }

    #dadata-suggestions > div b {
        display: block;
        font-weight: bold;
    }

    .selectric-wrapper.selectric-customOptions {
        z-index: 2 !important;
    }

    .open-close.comment-block .slide-block {
        height: 0;
        overflow: hidden;
        transition: height 0.5s;
    }

    .open-close.comment-block .slide-block.active {
        height: 245px;
    }

</style>
<?
$arCitySDEK = array();
$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$CityName = $obLocation->getCity();
$CityRegion = $obLocation->getRegion();
// получаем код города
$CityLocationId = $obLocation->getLocation();

$bxLocation = \Bitrix\Sale\Location\LocationTable::getById($CityLocationId)->fetch();
$CityLocation = $bxLocation['CODE'];
if ($CityRegion == 'Московская область' && $CityName != 'Москва'):

    $db_vars = CSaleLocation::GetList(
        array(
            "SORT" => "ASC",
            "COUNTRY_NAME_LANG" => "ASC",
            "CITY_NAME_LANG" => "ASC"
        ),
        array("LID" => LANGUAGE_ID, "REGION_NAME" => $CityRegion),
        false,
        false,
        array("CITY_NAME")
    );
    while ($vars = $db_vars->Fetch()):
        if (!empty($vars['CITY_NAME']))
            $arCitySDEK[] = $vars['CITY_NAME'];

    endwhile;

//echo "<pre>";print_r($arCitySDEK);echo "</pre>";
else:
    $arCitySDEK = array($CityName);
endif;

?>
<div id='ipolsdek' class="lightbox-sdek" style='display:none;'>
    <? $APPLICATION->IncludeComponent("ipol:ipol.sdekPickup", "custom", Array(

        "COMPONENT_TEMPLATE" => "custom",
        "NOMAPS" => "N",    // Не подключать Яндекс-карты (если их подключает что-то еще на странице)
        "CNT_DELIV" => "N",    // Расчитывать доставку при подключении
        "CNT_BASKET" => "N",    // Расчитывать доставку для корзины
        "FORBIDDEN" => "",    // Отключить расчет для профилей
        "COUNTRIES" => "",    // Подключенные страны
        "CITIES" => $arCitySDEK,
        /*"CITIES" => array(	// Подключаемые города (если не выбрано ни одного - подключаются все)
            0 => $arResult["CITY_NAME"],
        )*/
    ),
        false
    ); ?>
</div>

<script type="text/javascript">
    function IPOLSDEK_DeliveryChangeEvent(id) { //Р Р…Р В°Р В·Р Р†Р В°Р Р…Р С‘Р Вµ Р С—РЎР‚Р С‘Р Р…РЎвЂ Р С‘Р С—Р С‘Р В°Р В»РЎРЉР Р…Р С•
        $('#' + id).prop('checked', 'Y');
        submitForm();
    }

    var flDeliveryCity = '<?= $CityName?>';
    var flDeliveryAddress = '';

    function updateFLoatingDeliveryLabel() {
        var resultString = '';
        if (flDeliveryCity.length > 2) {
            resultString += flDeliveryCity;
            if (flDeliveryStreetNumber.length != 0) {
                resultString += ', ';
            }
        }

        $('.jce-order-delivery-address__value ').text(resultString);
    }

    // for mobile form steps
    var mobileCurrentStep = 1;


    function checkStep() {
        if (mobileCurrentStep == 1) {
            $('.jce-order-mobile-first').show();
            $('.jce-order-mobile-second').hide();
            $('.jce-order-mobile-third').hide();

            $('.order-mobile-header-back').css('visibility', 'hidden');

            $('#order-comment-field').detach().appendTo('.jce-order-third');
        }
        if (mobileCurrentStep == 2) {
            $('.jce-order-mobile-first').hide();
            $('.jce-order-mobile-second').show();
            $('.jce-order-mobile-third').hide();

            $('.order-mobile-header-back').css('visibility', 'visible');

            $('.order-mobile-next-container').detach().appendTo($('.jce-order-mobile-second'));
        }
        if (mobileCurrentStep == 3) {
            $('.jce-order-mobile-first').hide();
            $('.jce-order-mobile-second').hide();
            $('.jce-order-mobile-third').show();

            $('.order-mobile-header-back').css('visibility', 'visible');
        }
        $('.order-mobile-header-step-number').text(mobileCurrentStep);
        $('.order-input-error').hide();
        $('html, body').animate({
            scrollTop: 0
        }, 500);

    }

    function isEmail(email) {
        var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(email);
    }

    $('.delivery-row .selectric-wrapper').click(function () {

        if ($(this).hasClass('selectric-open')) {

            $(this).removeClass('selectric-open');

        } else {
            $(this).addClass('selectric-open');
        }
    });



    $('#cdek_delivery_point_button').click(function () {
        //if($('#SDEK_map').children().length == 2) {
        var arDeliveryCity = {0: $('input[name="address_deliveryCity"]').val()};

        IPOLSDEK_pvz.cities = arDeliveryCity;

        updatePVZs($('input[name="address_deliveryCity"]').val());
        IPOLSDEK_pvz.init();

    });
    if (window.innerWidth <= 767) {

        $('.breadcrumbs').hide();
        $('.headline-border').hide();
        $('.mobile-header').hide();



        checkStep();

        $('.order-mobile-header-close').click(function () {
            window.location.replace("<?=(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'.'personal/basket.php'?>");
        });

        $('.order-mobile-header-back').click(function () {
            if(mobileCurrentStep > 1){
                mobileCurrentStep -= 1;
                checkStep();
            }
        });

        $('#order-mobile-next-button').click(function () {

            var inputOkayOne = true;
            var inputOkayTwo = false;
            var deliveryType = $('.delivery-row .check-row').find('label.jcf-label-active').attr('for');
            var paymentType = $('.payment-row .check-row').find('label.jcf-label-active').attr('for');
            if(mobileCurrentStep === 1){
                if (deliveryType == "courier_sdek") {
                    if ($('.jce-order-mobile-first input[name="address_sdek"]').val().length > 1) {
                        inputOkayOne = true;
                    } else {
                        inputOkayOne = false;
                    }
                }
                if (deliveryType == "point_sdek") {
                    if ($('.jce-order-mobile-first input[name="address_point"]').val().length > 1) {
                        inputOkayOne = true;
                    } else {
                        inputOkayOne = false;
                    }
                }
                if (deliveryType == "pickup") {
                    if ($('.jce-order-mobile-first .selectric .label').val().length > 1) {
                        inputOkayOne = true;
                    } else {
                        //inputOkayOne = false;
                    }
                }

                if($('.jce-order-mobile-first input[name="fio"]').val().length > 1 && isEmail($('.jce-order-mobile-first input[name="phone"]').val().length > 4 && $('.jce-order-mobile-first input[name="email"]').val())){
                    inputOkayTwo = true;
                } else {
                    inputOkayTwo = false;
                }
            }
            if(mobileCurrentStep === 2){
                //alert(paymentType);
                mobileCurrentStep = 3;
                if(paymentType == 'payment_card_cloudpayments') {
                    $('#order-submit').text('Перейти к оплате');
                }
                checkStep();
                //$('.order-mobile-next-container').detach().appendTo($('.jce-order-mobile-second'));
            }
            if (inputOkayOne && inputOkayTwo && mobileCurrentStep === 1) {
                mobileCurrentStep = 2;

                checkStep();
            } else {
                $('.order-mobile-next-container').before($('.order-input-error'));
                $('.order-input-error').show();
            }

        });
    }

    if (window.innerWidth > 767) {
        jQuery(function ($) {
            var offset = $('.jce-confirm-cart').offset().top;
            var stylesFixed = {
                position: "fixed",
                top: "0",
                bottom: "auto",
            };
            var stylesBottom = {
                position: "absolute",
                bottom: "0",
                top: "auto"
            };
            var stylesTop = {
                position: "relative",
                bottom: "auto",
                top: "auto",
            };
            $(window).scroll(function fix_element() {

                if ($(window).scrollTop() >= (offset - 35 + $('.jce-confirm-inputs').height() - $('.jce-confirm-cart').height())) {
                    $('.jce-confirm-cart').css(stylesBottom);
                }
                if ($(window).scrollTop() > (offset) && $(window).scrollTop() < (offset - 35 + $('.jce-confirm-inputs').height() - $('.jce-confirm-cart').height())) {
                    $('.jce-confirm-cart').css(stylesFixed);
                }
                if ($(window).scrollTop() <= (offset)) {
                    $('.jce-confirm-cart').css(stylesTop);
                }
                /*$('.jce-confirm-cart').css(
                    $(window).scrollTop() > (offset) && $(window).scrollTop() < (offset + $('.jce-confirm-inputs').height() - $('.jce-confirm-cart').height())
                        ? {'position': 'fixed', 'top': '0px'}
                );
                $('.jce-confirm-cart').css(
                    $(window).scrollTop() > (offset + $('.jce-confirm-inputs').height() - $('.jce-confirm-cart').height())
                        ? {'position': 'absolute', 'bottom': '0px'}

                );
                */
                return fix_element;
            }());
        });
    }

    $(document).ready(
        function () {

            var userCity = $('.js-clickCity .bxmaker__geoip__city__line-name.js-bxmaker__geoip__city__line-name.js-bxmaker__geoip__city__line-city').text();
            //alert(userCity);
            $('.jce-order-city-input-container .bx-ui-sls-container > input').attr('title', userCity);
            $('.jce-order-city-input-container .bx-ui-sls-container > input').val(userCity);
            $('.jce-order-city-input-container .bx-ui-sls-container > input.bx-ui-sls-fake').attr('name', 'address_deliveryCity');

            //$('.jce-order-city-input-container input[name="ORDER_PROP_4"]').val('<?= $CityLocation ?>');

            $('.delivery-spb.delivery-row .check-row').click(
                function () {
                    var delivery_type = $(this).find('label').attr('for');

                    if (delivery_type == "point_sdek" || delivery_type == "courier_sdek") {
                        $('#cash-payment-container').closest('.detailed-description').show();
                        $('.payment-unavailable').hide();
                        $('.delivery-row .selectric-wrapper').hide();
                    } else {
                        $('#cash-payment-container').closest('.detailed-description').hide();
                        $('.payment-unavailable').show();
                        $('.delivery-row .selectric-wrapper').show();
                    }
                }
            );
            $('.delivery-row .check-row').click(
                function () {
                    var delivery_type = $(this).find('label').attr('for');

                    $('.jce-order-delivery-type__value').text($(this).find('label').text());
                    if (delivery_type == "point_sdek" || delivery_type == "courier_sdek") {

                        $('.delivery-row .selectric-wrapper').hide();
                    } else {
                        $('.delivery-row .selectric-wrapper').show();
                    }
                }
            );

            $('.delivery-row').on('change', 'select[name="delivery_pickup_point"]', function () {
                if (($(this).val() == 77) || ($(this).val() == 70) || ($(this).val() == 92)){
                    $('.payment-row .cloud_payment label').click();
                    $('#cash_payment_container').hide(100);

                } else {
                    $('#cash_payment_container').show(100);
                }
            });

            $('.jce-order-city-input-container').on('change', 'input[name="ORDER_PROP_4"]', function () {
                if ($('input[name="ORDER_PROP_4"]').val().length > 0) {
                    var arDeliveryCitySingle = {0: $('input[name="address_deliveryCity"]').val()};
                    //IPOLSDEK_pvz.city = arDeliveryCitySingle;
                    IPOLSDEK_pvz.city = $('input[name="address_deliveryCity"]').val();
                    IPOLSDEK_pvz.cities = arDeliveryCitySingle;

                    updateCity($('input[name=ORDER_PROP_4]').val());
                    updatePVZs($('input[name="address_deliveryCity"]').val());
                }
            });
            $('.selectric-wrapper').on('change', '.selectric-scroll li[data-index]', function () {
                //if ($(this).)
            });

            $("#order-submit").click(function (event) {
                if ($('#order-submit').hasClass('disabled')) {
                    event.preventDefault();
                    $("label[for='agree']").css("border", "1px solid red");
                    $("label[for='agree']").parents(".check-row").find(".chk-area").css("border", "1px solid red");
                }

                if ($('input[name=address_point]').attr("required") && !$('input[name=address_point]').val()) {
                    event.preventDefault();
                    $('#delivery-block .point-sdek').css('border', '1px solid red');
                    $('#cdek_delivery_point_button').css('color', 'red');

                    $('html, body').animate({
                        scrollTop: $("#delivery-block").offset().top
                    }, 1000);
                }
            });

            $('.jce-agreement').click(function (e) {
                $(e).closest('.chk-area').click();
                $(this).closest('input').prop("checked", true);
            });

            $('.delivery-row .selectric-wrapper').click(function () {
                if ($(this).hasClass('selectric-open')) {
                    $(this).removeClass('selectric-open');
                } else {
                    $(this).addClass('selectric-open');
                }
            });

            /*  const DELIVERY_PICKUP_POINT_BUROVAYA_20 = 30;
              $(document).on("change", "select[name=delivery_pickup_point]", function () {
                  if ($(this).val() == DELIVERY_PICKUP_POINT_BUROVAYA_20) {
                      $("input[name=delivery_type]").not("[value=pickup]").parents(".col").hide();
                      $("input[name=payment]").not("[value=cloudpayments]").parents(".col").hide();

                      $("input#pickup").prop('checked', true);
                      $("input#payment_card_cloudpayments").prop('checked', true);
                      jcf.customForms.replaceAll();
                  } else {
                      $("input[name=delivery_type]").not("[value=pickup]").parents(".col").show();
                      $("input[name=payment]").not("[value=cloudpayments]").parents(".col").show();
                  }
              });
              */


            $(document).ready(
                function () {

                    var setDeliveryPriceTrig = true;
                    var input = $('.delivery-row .rad-checked ~ input[name=delivery_type]');
                    // var input = $( this ).find( 'input' );
                    // var delivery_type = $( this ).find( 'label' ).attr('for');
                    var delivery_type = input.attr('id');
                    var user_type = $('input[name="ownership"]:checked').val();

                    if (delivery_type == "courier_sdek" || delivery_type == "point_sdek") {
                        $("input[name=delivery_company]").val("СДЭК");
                    } else {
                        $("input[name=delivery_company]").val("");
                    }

                    if (delivery_type == "courier_sdek") {
                        $('input[name=address_sdek]').attr("required", "required");
                        $('input[name=address_sdek]').parent().addClass("required");
                        $('.delivery-address').css('display', 'block');
                        $('.delivery-address-extra').css('display', 'block');
                    } else {
                        $('input[name=address_sdek]').removeAttr("required");
                        $('input[name=address_sdek]').parent().removeClass("required");
                        $('.delivery-address').css('display', 'none');
                        $('.delivery-address-extra').css('display', 'none');
                    }

                    // show map button for sdek
                    if (delivery_type == "point_sdek") {
                        $("#cdek_delivery_point_button").show();
                        $('input[name=address_point]').prop('required', true);
                        $('input[name=address_point]').parent().addClass("required");

                        //IPOLSDEK_pvz.init();
                    } else {
                        $("#cdek_delivery_point_button").hide();
                        $('input[name=address_point]').prop('required', false);
                        $('input[name=address_point]').parent().removeClass("required");
                        $('#delivery-block .point-sdek').css('border', '');
                    }

                    // load courier delivery price
                    // 14.11.2018, winchester7, временно отключаем расчет доставки СДЭКом
                    /*
                    if (delivery_type == "courier_sdek"){

                        IPOLSDEK_pvz.loadCityCostCourier(input);
                        setDeliveryPriceTrig = false;
                    }
                    */

                    // clear cdek description
                    if ($(".point_sdek").length > 0)
                        $(".point_sdek").html("");


                    // calculate delivery price
                    var deliveryPrice = 0;

                    var type = input.attr('id');

                    if (delivery_type == "delivery" && $('input[name="delivery_address"]:visible').length) {
                        var sum = $('.total-sum').data('sum');

                        if (sum <= 5000) {
                            deliveryPrice = 490;
                        }
                    }

                    if (delivery_type == "point_sdek" || delivery_type == "courier_sdek") {
                        var sum = $('.total-sum').data('sum');

                        if (sum <= 5000) {
                            deliveryPrice = 490;
                        }
                    }

                    setDeliveryPrice(input, deliveryPrice);
                }
            );


            $(document).on("change", "input[name=delivery_type]",
                function () {

                    var setDeliveryPriceTrig = true;
                    var input = $(this);
                    // var input = $( this ).find( 'input' );
                    // var delivery_type = $( this ).find( 'label' ).attr('for');
                    var delivery_type = input.attr('id');
                    var user_type = $('input[name="ownership"]:checked').val();

                    if (delivery_type == "courier_sdek" || delivery_type == "point_sdek") {
                        $("input[name=delivery_company]").val("СДЭК");
                    } else {
                        $("input[name=delivery_company]").val("");
                    }

                    if (delivery_type == "courier_sdek") {
                        $('input[name=address_sdek]').attr("required", "required");
                        $('input[name=address_sdek]').parent().addClass("required");
                        $('.delivery-address').css('display', 'block');
                        $('.delivery-address-extra').css('display', 'block');
                    } else {
                        $('input[name=address_sdek]').removeAttr("required");
                        $('input[name=address_sdek]').parent().removeClass("required");
                        $('.delivery-address').css('display', 'none');
                        $('.delivery-address-extra').css('display', 'none');
                    }

                    // show map button for sdek
                    if (delivery_type == "point_sdek") {
                        $("#cdek_delivery_point_button").show();
                        $('input[name=address_point]').prop('required', true);
                        $('input[name=address_point]').parent().addClass("required");

                        //IPOLSDEK_pvz.init();
                    } else {
                        $("#cdek_delivery_point_button").hide();
                        $('input[name=address_point]').prop('required', false);
                        $('input[name=address_point]').parent().removeClass("required");
                        $('#delivery-block .point-sdek').css('border', '');
                    }

                    // load courier delivery price
                    // 14.11.2018, winchester7, временно отключаем расчет доставки СДЭКом
                    /*
                    if (delivery_type == "courier_sdek"){

                        IPOLSDEK_pvz.loadCityCostCourier(input);
                        setDeliveryPriceTrig = false;
                    }
                    */

                    // clear cdek description
                    if ($(".point_sdek").length > 0)
                        $(".point_sdek").html("");


                    // calculate delivery price
                    var deliveryPrice = 0;

                    var type = input.attr('id');

                    if (delivery_type == "delivery" && $('input[name="delivery_address"]:visible').length) {
                        var sum = $('.total-sum').data('sum');

                        if (sum <= 5000) {
                            deliveryPrice = 490;
                        }
                    }

                    if (delivery_type == "point_sdek" || delivery_type == "courier_sdek") {
                        var sum = $('.total-sum').data('sum');

                        if (sum <= 5000) {
                            deliveryPrice = 490;
                        }
                    }

                    if (setDeliveryPriceTrig)
                        setDeliveryPrice(input, deliveryPrice);
                }
            );

            $('.jce-confirm-cart .label-holder label, .jce-confirm-cart .chk-area').click(
                function () {
                    changeSubmitActivity();
                }
            );
            $('#SDEK_info #SDEK_sign').click(
                function () {
                    if ($(this).parent().hasClass('jce-open')) {
                        $(this).parent().removeClass('jce-open');
                        $(this).text('Пункты вывоза');
                    } else {
                        $(this).parent().addClass('jce-open');
                        $(this).text('Закрыть');
                    }
                });
            $('#SDEK_wrapper').click(
                function () {
                    if ($(this).find('p.sdek_chosen').length > 0) {
                        if ($(this).parent().parent().hasClass('jce-open')) {
                            $(this).parent().parent().removeClass('jce-open');
                            $(this).text('Пункты вывоза');
                        } else {
                            $(this).parent().addClass('jce-open');
                            $(this).text('Закрыть');
                        }
                    }
                });
            /*function () {
                if ($('#SDEK_info').hasClass('jce-open')) {
                    $('#SDEK_info').removeClass('jce-open');
                    $('#SDEK_info #SDEK_sign').text('Пункты вывоза');
                } else {
                    $('#SDEK_info').addClass('jce-open');
                    $('#SDEK_info #SDEK_sign').text('Закрыть');
                }
            }
        );*/


            $('input[name="inn"]').keyup(
                function () {
                    var query = $(this).val();

                    getDadata(query);
                }
            );


            $('#dadata-suggestions').on(
                'click',
                'div',
                function () {
                    var _this = $(this);
                    setDataFromDadata(_this);
                }
            );


            $('.ownership span').click(function () {

                console.log($(this));

                if ($(this).hasClass('entity-ip')) {
                    $('.not-for-ip').hide();
                    $('input[name="inn"]').attr('pattern', '[0-9]{10,}');
                    $('input[name="kpp"]').attr('pattern', '[0-9]{9,}');
                    $('.entity-block').css('overflow', 'visible');

                    $('.beznal').css('display', 'block');
                    $('.card').css('display', 'none');
                    $('.cloud_payment').css('display', 'none');

                    $('.only-pickup-payment').css('display', 'none');

                    $('input[name="company_name"]').prop('required', true);
                    $('input[name="company_name_without_opf"]').prop('required', true);
                    $('input[name="company_opf"]').prop('required', true);
                    $('input[name="company_name_short"]').prop('required', true);
                    $('input[name="inn"]').prop('required', true);

                    $('input[name="legal_address"]').prop('required', true);
                    $('input[name="kpp"]').prop('required', false);
                    $("input[name=legal_address]").parents(".input-holder").addClass("required");
                    $("input[name=kpp]").parents(".input-holder").removeClass("required");
                } else if ($(this).hasClass('entity-row')) {
                    $('.not-for-ip').show();
                    $('input[name="inn"]').attr('pattern', '[0-9]{10,}');
                    $('input[name="kpp"]').attr('pattern', '[0-9]{9,}');
                    $('.entity-block').css('overflow', 'visible');

                    $('.beznal').css('display', 'block');
                    $('.card').css('display', 'none');
                    $('.cloud_payment').css('display', 'none');
                    $('.only-pickup-payment').css('display', 'none');

                    $('input[name="company_name"]').prop('required', true);
                    $('input[name="company_name_without_opf"]').prop('required', true);
                    $('input[name="company_opf"]').prop('required', true);
                    $('input[name="company_name_short"]').prop('required', true);
                    $('input[name="inn"]').prop('required', true);

                    $('input[name="legal_address"]').prop('required', true);
                    $('input[name="kpp"]').prop('required', true);
                    $("input[name=legal_address]").parents(".input-holder").addClass("required");
                    $("input[name=kpp]").parents(".input-holder").addClass("required");
                } else {
                    $('input[name="inn"]').attr('pattern', '');
                    $('input[name="kpp"]').attr('pattern', '');
                    $('.entity-block').css('overflow', 'hidden');

                    $('.beznal').css('display', 'none');
                    $('.card').css('display', 'block');
                    $('.cloud_payment').css('display', 'block');

                    $('.only-pickup-payment').css('display', 'block');

                    $('input[name="company_name"]').prop('required', false);
                    $('input[name="company_name_without_opf"]').prop('required', false);
                    $('input[name="company_opf"]').prop('required', false);
                    $('input[name="company_name_short"]').prop('required', false);
                    $('input[name="legal_address"]').prop('required', false);
                    $('input[name="kpp"]').prop('required', false);
                    $('input[name="inn"]').prop('required', false);

                    $("input[name=legal_address]").parents(".input-holder").removeClass("required");
                    $("input[name=kpp]").parents(".input-holder").removeClass("required");

                }

                $('.rad-area').removeClass('rad-checked');
                $('.rad-area').addClass('rad-unchecked');
                $('input[name="ownership"]').prop('checked', false);

                $(this).find('.rad-area').removeClass('rad-unchecked');
                $(this).find('.rad-area').addClass('rad-checked');
                $(this).find('input[name="ownership"]').prop('checked', true);
            });


            $('html, body').click(
                function () {
                    $('#dadata-suggestions').hide();
                }
            );


            $('.open-close.comment-block button').click(
                function () {
                    $(this).parent().find('.slide-block').toggleClass('active');
                }
            );


            // show cdek delivery points button
            // $(document).on("change", "input[name=delivery_type]", function(){

            // if($(this).is('#point_sdek:checked'))
            // $("#cdek_delivery_point_button").show();
            // else
            // $("#cdek_delivery_point_button").hide();

            // if($(this).is('#courier_sdek:checked'))
            // IPOLSDEK_pvz.loadCityCostCourier();

            // // clear cdek
            // if($(".point_sdek").length > 0)
            // $(".point_sdek").html("");
            // });
            //updatePVZs(IPOLSDEK_pvz.city);

            //IPOLSDEK_pvz.init();
            setTimeout(deleteChild, 300);//, "#ipolsdek", 2, "script");
        }
    );

    function deleteChild(parentElement = "#ipolsdek", childNumber = 2, childElementFilter = "script") {

        var pElement = parentElement;
        var cNumber = childNumber;
        var cElemFilter = childElementFilter;
        // alert(pElement);
        // alert(cElemFilter);


        if ($(pElement).children('script').length == 2) {
            if (cNumber > 0) {
                if (cNumber > 0) {
                    $('#ipolsdek').children('script').get(cNumber - 1).remove();
                }
            }
        }
        if ($(pElement)) {
            // alert('works!');
        }
    }


    function phpToJs(variable) {
        $.ajax({
            type: "POST",
            url: "ajax_phptojs.php",
            data: {jsvar: variable},
            success: function (response) {
                //alert(data);
                //alert('phpToJS ' + response.toString());
                //IPOLSDEK_pvz.PVZ = response;

            },
            error: function () {
                // alert('w');
            }
        });
        return false

    }


    function updatePVZs(cityName) {
        $.ajax({
            type: "POST",
            url: "ajax_reload_pvz.php",
            data: {city: cityName},
            success: function (data) {
                // alert(data);
                var result = JSON.parse(data);
                if (IPOLSDEK_pvz) {
                    IPOLSDEK_pvz.PVZ = result;
                }

            },
            error: function () {
                // alert('Ошибка. Пожалуйста, выберите ');
            }
        });
        return false;

    }

    function updateCity(cityID) {
        $.ajax({
            type: "POST",
            url: "ajax_updatelocation.php",
            data: {id: cityID},
            success: function (res) {
                $('input[name="SDEK_CITY"]').val(res);
                var arDeliveryCitySingle = {0: $('input[name="address_deliveryCity"]').val()};
                //IPOLSDEK_pvz.city = arDeliveryCitySingle;
                IPOLSDEK_pvz.city = $('input[name="address_deliveryCity"]').val();
                //IPOLSDEK_pvz.cities = array($('input[name="address_deliveryCity"]').val())
                //IPOLSDEK_pvz.initCityPVZ();
                //IPOLSDEK_pvz.resetCityName();

            },
            error: function () {
            }
        });
        return false;

    }

    function setDeliveryPrice(input, deliveryPrice) {

        if (input.is(":checked")) {

            var type = input.attr('id');
            var user_type = $('input[name="ownership"]:checked').val();

            // set delivery price
            $('#total-delivery').text(deliveryPrice);
            $('input[name="total-delivery"]').val(parseFloat(deliveryPrice));

            showPayment(type, user_type);
            updateTotalPrice();
        }
    }

    function updateTotalPrice() {
        var deliveryPrice = parseInt($('#total-delivery').text());
        var sum = parseFloat($('.total-sum').data('sum'));

        var totalSum = deliveryPrice + sum;

        // $( '.total-sum span' ).text( nf( totalSum ) );
        $('.jce-order-total-price-container .jce-order-total-price__value').text(totalSum.toFixed(2));
    }


    function showPayment(type, user_type) {

        if (type == 'pickup' && (user_type == '4' || user_type == '5')) {

            $('.only-pickup-payment').hide();

        } else if (type == 'pickup') {

            $('.only-delivery-payment').hide();
            $('.only-pickup-payment').show();

        } else if (user_type == "1" && type != 'pickup') {

            $('.only-pickup-payment').show();

        } else {

            $('.only-pickup-payment').hide();
            $('.only-delivery-payment').show();

        }
    }

    function changeSubmitActivity() {
        setTimeout(
            function () {
                if ($('#agree').prop('checked') == true) {
                    $('#order-submit').removeClass('disabled');
                } else {
                    $('#order-submit').addClass('disabled');
                }
            },
            100
        );
    }


    function nf(number) {

        var i, j, kw, kd, km;


        i = parseInt(number = (+number || 0).toFixed(2)) + "";

        if ((j = i.length) > 3) {
            j = j % 3;
        } else {
            j = 0;
        }

        km = (j ? i.substr(0, j) + ' ' : "");
        kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ' ');
        kd = '.' + Math.abs(number - i).toFixed(2).replace(/-/, 0).slice(2);


        return km + kw + kd;
    }


    function getDadata(query) {
        if (query.length >= 3) {
            $.post(
                '/local/components/magnitmedia/order/dadata.php',
                {
                    QUERY: query
                },
                function (data) {
                    if (data.suggestions.length) {
                        var html = '';

                        for (var i = 0; i < data.suggestions.length; i++) {
                            var item = data.suggestions[i];

                            var opf = '';
                            if (item.data.opf) {
                                opf = item.data.opf.short;
                            }

                            var kpp = '';
                            if (item.data.kpp) {
                                kpp = item.data.kpp;
                            }

                            html += '<div data-inn="' + item.data.inn + '" data-kpp="' + kpp + '" data-legal_address="' + item.data.address.value + '" data-name-without-opf="' + item.data.name.short + '" data-opf="' + opf + '" data-name-short=\'' + item.unrestricted_value + '\'><b>' + item.value + '</b>' + item.data.inn + ' ' + item.data.address.value + '</div>';
                        }

                        $('#dadata-suggestions').html(html);
                        $('#dadata-suggestions').show();
                    } else {
                        $('#dadata-suggestions').hide();
                    }
                },
                'json'
            );
        } else {
            $('#dadata-suggestions').hide();
        }
    }


    function setDataFromDadata(divElement) {
        $('input[name="inn"]').val(divElement.data('inn'));
        $('input[name="company_name"]').val(divElement.find('b').text());
        $('input[name="kpp"]').val(divElement.data('kpp'));
        $('input[name="legal_address"]').val(divElement.data('legal_address'));

        var companyNameWithoutOpf = divElement.data('name-without-opf');
        if (!companyNameWithoutOpf) {
            companyNameWithoutOpf = divElement.find('b').text().substring(3);
        }
        $('input[name="company_name_without_opf"]').val(companyNameWithoutOpf);

        $('input[name="company_opf"]').val(divElement.data('opf'));
        $('input[name="company_name_short"]').val(divElement.data('name-short'));

        $('#dadata-suggestions').hide();
    }
$('#pickup').click(function(){
  $('#delivery_pickup_info').show();
});
$('#point_sdek').click(function(){
  $('#delivery_pickup_info').hide();
});
$('#courier_sdek').click(function(){
  $('#delivery_pickup_info').hide();
});
$(function() {
	$('#pickupvariants').change(function () {
		var vibor = $(this).find(':selected').val();
		if((vibor == '70')||(vibor == '77')||(vibor == '92')) {
			$('.pickupinfo').text('Доставка в течении 3-7 рабочих дней');
		} else {
			$('.pickupinfo').text('При наличии товара самовывоз с <?= date("d.m ");?>, сегодня');
		}
	});
});
</script>
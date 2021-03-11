<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");

?>
<?//if($USER->IsAdmin()):?>
<script src="/js/masked.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
           $(".order_phone").mask("7 (999) 999-99-99");
    })
</script>
<div class="order-box">
<?

//if($_SERVER["REMOTE_ADDR"] == "178.219.245.154" || $_SERVER["REMOTE_ADDR"] == "46.175.142.6" || $_SERVER["REMOTE_ADDR"] == "212.45.24.250" || $_SERVER["REMOTE_ADDR"] == "91.105.236.214" || $_SERVER["REMOTE_ADDR"] == "91.230.25.111"){ //91.105.236.214
if(1){ //91.105.236.214

    $APPLICATION->IncludeComponent("tezart:sale.order.full.tezart.new", "tezart1", Array(
	"ALLOW_PAY_FROM_ACCOUNT" => "N",	// Позволять оплачивать с внутреннего счета
		"SHOW_MENU" => "Y",	// Показывать меню навигации по процедуре оформления заказа
		"CITY_OUT_LOCATION" => "N",	// Выбор города местоположения не обязателен
		"COUNT_DELIVERY_TAX" => "N",	// Рассчитывать налог для доставки
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",	// Рассчитывать скидку для каждой позиции (на все количество товара)
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",	// Позволять оплачивать с внутреннего счета только в полном объеме
		"SEND_NEW_USER_NOTIFY" => "Y",	// Отправлять пользователю письмо, что он зарегистрирован на сайте
		"PROP_1" => "",	// Не показывать свойства для типа плательщика "Физическое лицо" (s1)
		"PATH_TO_BASKET" => "basket.php",	// Страница корзины
		"PATH_TO_PERSONAL" => "index.php",	// Страница персонального раздела
		"PATH_TO_AUTH" => "/auth.php",	// Страница авторизации
		"PATH_TO_PAYMENT" => "payment.php",	// Страница подключения платежной системы
		"USE_AJAX_LOCATIONS" => "Y",	// Использовать расширенную форму местоположения
		"SHOW_AJAX_DELIVERY_LINK" => "N",	// Запускать расчет стоимости доставки?
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRICE_VAT_SHOW_VALUE" => "Y",	// Отображать значение НДС
	),
	false
);
}
else{      
    $APPLICATION->IncludeComponent("doal:sale.order.full.tezart.new", "tezart", array(
        "ALLOW_PAY_FROM_ACCOUNT" => "N",
        "SHOW_MENU" => "Y",
        "CITY_OUT_LOCATION" => "N",
        "COUNT_DELIVERY_TAX" => "N",
        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
        "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
        "SEND_NEW_USER_NOTIFY" => "Y",
        "PROP_1" => array(
        ),
        "PATH_TO_BASKET" => "basket.php",
        "PATH_TO_PERSONAL" => "index.php",
        "PATH_TO_AUTH" => "/auth.php",
        "PATH_TO_PAYMENT" => "payment.php",
        "USE_AJAX_LOCATIONS" => "Y",
        "SHOW_AJAX_DELIVERY_LINK" => "N",
        "SET_TITLE" => "Y",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "Y"
        ),
        false
    );
}    
?>
</div>
<?/*else:?>
<div class="order-box">
<?$APPLICATION->IncludeComponent("doal:sale.order.full.tezart.new", "doal", array(
	"ALLOW_PAY_FROM_ACCOUNT" => "N",
	"SHOW_MENU" => "Y",
	"CITY_OUT_LOCATION" => "N",
	"COUNT_DELIVERY_TAX" => "N",
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
	"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
	"SEND_NEW_USER_NOTIFY" => "Y",
	"PROP_1" => array(
	),
	"PATH_TO_BASKET" => "basket.php",
	"PATH_TO_PERSONAL" => "index.php",
	"PATH_TO_AUTH" => "/auth.php",
	"PATH_TO_PAYMENT" => "payment.php",
	"USE_AJAX_LOCATIONS" => "Y",
	"SHOW_AJAX_DELIVERY_LINK" => "N",
	"SET_TITLE" => "Y",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "Y"
	),
	false
);?>
</div>
<?endif*/?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
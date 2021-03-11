<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><??>
<?$APPLICATION->IncludeComponent("bitrix:sale.order.ajax", "template3", Array(
	"COMPONENT_TEMPLATE" => "template3",
		"PAY_FROM_ACCOUNT" => "Y",	// Разрешить оплату с внутреннего счета
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",	// Разрешить оплату с внутреннего счета только в полном объеме
		"COUNT_DELIVERY_TAX" => "N",
		"ALLOW_AUTO_REGISTER" => "N",	// Оформлять заказ с автоматической регистрацией пользователя
		"SEND_NEW_USER_NOTIFY" => "Y",	// Отправлять пользователю письмо, что он зарегистрирован на сайте
		"DELIVERY_NO_AJAX" => "Y",	// Когда рассчитывать доставки с внешними системами расчета
		"DELIVERY_NO_SESSION" => "N",	// Проверять сессию при оформлении заказа
		"TEMPLATE_LOCATION" => "popup",	// Визуальный вид контрола выбора местоположений
		"DELIVERY_TO_PAYSYSTEM" => "d2p",	// Последовательность оформления
		"USE_PREPAYMENT" => "N",	// Использовать предавторизацию для оформления заказа (PayPal Express Checkout)
		"PROP_1" => "",
		"PROP_2" => "",
		"ALLOW_NEW_PROFILE" => "Y",	// Разрешить множество профилей покупателей
		"SHOW_PAYMENT_SERVICES_NAMES" => "Y",
		"SHOW_STORES_IMAGES" => "Y",	// Показывать изображения складов в окне выбора пункта выдачи
		"PATH_TO_BASKET" => "/personal/cart/",	// Путь к странице корзины
		"PATH_TO_PERSONAL" => "/personal/",	// Путь к странице персонального раздела
		"PATH_TO_PAYMENT" => "/personal/order/payment/",	// Страница подключения платежной системы
		"PATH_TO_AUTH" => "/auth/",	// Путь к странице авторизации
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"DISABLE_BASKET_REDIRECT" => "N",	// Оставаться на странице оформления заказа, если список товаров пуст
		"PRODUCT_COLUMNS" => array(
			0 => "WEIGHT_FORMATED",
		),
		"SHOW_TOTAL_BOX" => "Y"
	),
	false
);?>

<??><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
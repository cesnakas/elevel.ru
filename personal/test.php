<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent(
	//"bitrix:sale.order.full",
	"doal:sale.order.full.tezart",
	//".default",///
	"doal",
	Array(
		"PATH_TO_BASKET" => "basket.php",
		"PATH_TO_PERSONAL" => "index.php",
		"PATH_TO_AUTH" => "/auth.php",
		"PATH_TO_PAYMENT" => "payment.php",
		"ALLOW_PAY_FROM_ACCOUNT" => "N",
		"SHOW_MENU" => "Y",
		"USE_AJAX_LOCATIONS" => "Y",
		"SHOW_AJAX_DELIVERY_LINK" => "N",
		"CITY_OUT_LOCATION" => "Y",
		"COUNT_DELIVERY_TAX" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"SET_TITLE" => "Y",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "Y",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"PROP_1" => "",
		"DELIVERY2PAY_SYSTEM" => Array(
			  array('1'=> array(/*'1','2','5'*/'5','2') ),
			  array('2'=> array('1','2')     ),
			  array('5'=> array('1','2')     ),
		)
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
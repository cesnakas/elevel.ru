<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle('Корзина');
$APPLICATION->AddChainItem('Корзина');
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket", 
	"basket", 
	array(
		"COMPONENT_TEMPLATE" => "basket",
		"COLUMNS_LIST" => array(
		),
		"TEMPLATE_THEME" => "blue",
		"PATH_TO_ORDER" => "/personal/order.php",
		"HIDE_COUPON" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"USE_PREPAYMENT" => "N",
		"QUANTITY_FLOAT" => "N",
		"CORRECT_RATIO" => "N",
		"AUTO_CALCULATION" => "Y",
		"SET_TITLE" => "Y",
		"ACTION_VARIABLE" => "basketAction",
		"OFFERS_PROPS" => "",
		"USE_GIFTS" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"GIFTS_PLACE" => "BOTTOM",
		"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
		"GIFTS_SHOW_OLD_PRICE" => "N",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
		"GIFTS_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_CONVERT_CURRENCY" => "N",
		"GIFTS_HIDE_NOT_AVAILABLE" => "N"
	),
	false
);?>

<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' );
?>
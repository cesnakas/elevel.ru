<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (isset($_REQUEST['id']) && intval($_REQUEST['id']) > 0)
{
	CModule::IncludeModule("sale");
	
	$productID = intval($_REQUEST["id"]);
	CSaleBasket::Delete($productID);
	
	$APPLICATION->IncludeComponent("bitrix:sale.basket.basket", "def", array(
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"COLUMNS_LIST" => array(
			0 => "NAME",
			1 => "PRICE",
			2 => "QUANTITY",
			3 => "DELETE",
		),
		"PATH_TO_ORDER" => "/personal/order.php",
		"HIDE_COUPON" => "Y",
		"QUANTITY_FLOAT" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"SET_TITLE" => "Y"
		),
		false
	);
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
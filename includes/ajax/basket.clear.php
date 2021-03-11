<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
	CModule::IncludeModule("sale");
	$FUSER_ID = CSaleBasket::GetBasketUserID();
	CSaleBasket::DeleteAll($FUSER_ID, false);
	
	$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "wt_sml-basket", array(
		"PATH_TO_BASKET" => "/personal/order.php",
		"PATH_TO_ORDER" => "/personal/order.php"
		),
		false
	);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
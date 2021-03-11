<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ќформление заказа");
?>
<?/* if($USER->GetID() == 8): */?>
	<?
	/*
	// ѕолучаем цену и остаток товара, исход€ из местоположени€ пользовател€ и принадлежности его группам
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

	$iUserGeoGroup = GetGroupByIP();

	$sPriceID = 1;
	switch($iUserGeoGroup)
	{
		case 1:
			$sPriceID = 2;
			$sCountPropertyPostfix = 'MSK';
			break;
		case 2:
			$sPriceID = 3;
			$sCountPropertyPostfix = 'SPB';
			break;
		case 3:
			$sPriceID = 4;
			$sCountPropertyPostfix = 'EKT';
			break;
		case 4:
			$sPriceID = 5;
			$sCountPropertyPostfix = 'NSK';
			break;
		case 5:
			$sPriceID = 6;
			$sCountPropertyPostfix = 'RST';
			break;
		case 6:
			$sPriceID = 7;
			$sCountPropertyPostfix = 'ORN';
			break;
	}
	*/
	// ѕолучаем цену и остаток товара, исход€ из местоположени€ пользовател€ и принадлежности его группам
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

	$iPriceID = CGeoRegions::GetPriceIDByUser();
	$sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
	$sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);
	?>
	<?$APPLICATION->IncludeComponent(
		"infodaymedia:sale.order.full",
		".default",
		array(
			"ALLOW_PAY_FROM_ACCOUNT" => "Y",
			"SHOW_MENU" => "N",
			"CITY_OUT_LOCATION" => "Y",
			"COUNT_DELIVERY_TAX" => "N",
			"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
			"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
			"SEND_NEW_USER_NOTIFY" => "Y",
			"PROP_1" => array(
				0 => "4",
				1 => "3",
				2 => "20",
				3 => "25",
				4 => "23",
			),
			"PATH_TO_BASKET" => "/personal/",
			"PATH_TO_PERSONAL" => "/personal/",
			"PATH_TO_AUTH" => "/auth/",
			"PATH_TO_PAYMENT" => "payment.php",
			"USE_AJAX_LOCATIONS" => "Y",
			"SHOW_AJAX_DELIVERY_LINK" => "N",
			"SET_TITLE" => "N",
			"OFFICE_EMAIL" => "Y",
			"PRICE_VAT_INCLUDE" => "N",
			"PRICE_VAT_SHOW_VALUE" => "Y",
			"PRICE_ID" => $iPriceID,
			"PROPERTY_COUNT_CODE" => "COUNT_".$sPropertyCountCode
		),
		false
	);?>
<?/* else: ?>
	<?$APPLICATION->IncludeComponent("elevel:sale.order.full", ".default", array(
		"ALLOW_PAY_FROM_ACCOUNT" => "Y",
		"SHOW_MENU" => "N",
		"CITY_OUT_LOCATION" => "Y",
		"COUNT_DELIVERY_TAX" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"PROP_1" => array(
			0 => "4",
			1 => "3",
			2 => "20",
			3 => "25",
			4 => "23",
		),
		"PATH_TO_BASKET" => "/personal/",
		"PATH_TO_PERSONAL" => "/personal/",
		"PATH_TO_AUTH" => "/auth/",
		"PATH_TO_PAYMENT" => "payment.php",
		"USE_AJAX_LOCATIONS" => "Y",
		"SHOW_AJAX_DELIVERY_LINK" => "N",
		"SET_TITLE" => "N",
		"PRICE_VAT_INCLUDE" => "N",
		"PRICE_VAT_SHOW_VALUE" => "Y"
		),
		false
	);?>
<? endif */?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
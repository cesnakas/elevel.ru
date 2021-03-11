<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

		<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "nano-small-basket", array(
			"PATH_TO_BASKET" => "/personal/order.php",
			"PATH_TO_ORDER" => "/personal/order.php",
			),
			false
		);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
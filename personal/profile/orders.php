<?require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');?>
<?
    LocalRedirect("/personal/");
?>
<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.list", ".default", array(
	"PATH_TO_DETAIL" => "",
	"PATH_TO_COPY" => "",
	"PATH_TO_CANCEL" => "/personal/profile/orders.php",
	"PATH_TO_BASKET" => "",
	"ORDERS_PER_PAGE" => "",
	"SET_TITLE" => "Y",
	"SAVE_IN_SESSION" => "N",
	"NAV_TEMPLATE" => "",
	"ID" => $arResult["VARIABLES"]["ID"]
	),
	$component
);?>
<?require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>
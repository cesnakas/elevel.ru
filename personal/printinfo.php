<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Печать информации о заказе");
?>
<?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.detail", "", array(
	"PATH_TO_LIST" => "/personal/",
	"PATH_TO_CANCEL" => "/personal/",
	"PATH_TO_PAYMENT" => "/personal/payment.php",
	"SET_TITLE" => "Y",
	"ID" => $_GET['ID']
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
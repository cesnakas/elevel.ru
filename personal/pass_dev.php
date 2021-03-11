<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<?
//$APPLICATION->AuthForm("", false, false, "N", false);
?>

<?$APPLICATION->IncludeComponent("bitrix:system.auth.changepasswd", "change_pass", array(

	),
	false
);?>
<?$APPLICATION->SetTitle("Личный кабинет");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
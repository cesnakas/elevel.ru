<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
<?if (strlen($_REQUEST['register'])>0):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"",
	Array(
		"USER_PROPERTY_NAME" => "", 
		"SEF_MODE" => "N", 
		"SHOW_FIELDS" => Array("NAME","LAST_NAME","PERSONAL_PHONE"), 
		"REQUIRED_FIELDS" => Array("NAME","LAST_NAME","PERSONAL_PHONE"), 
		"AUTH" => "Y", 
		"USE_BACKURL" => "Y", 
		"SUCCESS_PAGE" => "/auth/regok.php", 
		"SET_TITLE" => "Y", 
		"USER_PROPERTY" => Array() 
	)
);?>
<?
else:
$APPLICATION->AuthForm();
endif;
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
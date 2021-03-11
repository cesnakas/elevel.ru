<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("rec.php");
LocalRedirect("/personal/");
?><?$APPLICATION->IncludeComponent("bitrix:sale.personal.profile", "profile", array(
	"SEF_MODE" => "N",
	"SEF_FOLDER" => "/personal/profile/",
	"PER_PAGE" => "2000",
	"USE_AJAX_LOCATIONS" => "N",
	"SET_TITLE" => "Y"
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Смена пароля");
?>
<div class="personal-pass-box">
	<a class="back_lk" href="/personal/">Вернуться в личный кабинет</a>
	<h2 class="h2_lk">Изменить пароль</h2>
	<?$APPLICATION->IncludeComponent("bitrix:main.profile", "def_c", array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"SET_TITLE" => "N",
		"USER_PROPERTY" => array(
		),
		"SEND_INFO" => "N",
		"CHECK_RIGHTS" => "N",
		"USER_PROPERTY_NAME" => "",
		"AJAX_OPTION_ADDITIONAL" => ""
		),
		false
	);?>
<div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
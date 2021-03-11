<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
CModule::IncludeModule("form");

header('Content-type: application/json');

$errors = "";

if (!check_bitrix_sessid()) $errors .= "Параметр сессии неверен. Попробуйте отправить форму еще раз.";
else
{
	// ID веб-формы
	$FORM_ID = intval($_POST["WEB_FORM_ID"]);
	
	
	
	$arValues = array (
		"form_text_1143"			=> utf8win1251(htmlspecialchars($_POST["form_text_1143"])), // Имя
		"form_text_1144"        	=> htmlspecialchars($_POST["form_text_1144"]), // Телефон
		"form_checkbox_question"	=> $_POST["form_checkbox_question"],	// Интересующий вопрос
	);
	
	// создадим новый результат
	if (!$RESULT_ID = CFormResult::Add($FORM_ID, $arValues))
	{
		global $strError;
		$errors .= $strError . "<br />";
	}
	else
	{
		$arEventFields = array(
			"LINK" => "https://" . SITE_SERVER_NAME . "/bitrix/admin/form_result_edit.php?lang=ru&WEB_FORM_ID=". $FORM_ID . "&RESULT_ID=". $RESULT_ID . "&WEB_FORM_NAME=SHOP_CALLBACK"
		);
		CEvent::Send("SHOP_NEW_REQUEST", "s1", $arEventFields);
	}
}

	
if (strlen($errors) > 0) {
	echo \Bitrix\Main\Web\Json::encode(array(
		'type' => 'error',
		'message' => $errors,
	));
} else {
	echo \Bitrix\Main\Web\Json::encode(array('type' => 'ok'));
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
?>
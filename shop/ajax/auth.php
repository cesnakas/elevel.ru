<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if (strlen($_POST['ajax_key']) && $_POST['ajax_key']==md5('ajax_'.LICENSE_KEY)) {
	
	$login = $_POST["USER_LOGIN"];
	$pass = $_POST["USER_PASSWORD"];
	
	if (substr_count($login, "@") > 0) // ввели email
		$arFilter = Array("=EMAIL" => $login);
	else // login
		$arFilter = Array("=LOGIN" => $login);		
	
	
	$res = Bitrix\Main\UserTable::getList(Array(
		"select" => Array("ID","LOGIN", "EMAIL", "PERSONAL_PHONE"),
		"filter" => $arFilter,
	));
	
	$arRes = $res->fetch();
	
	
	if(empty($arRes)){ // ввели телефон
	
		$login = preg_replace("/\D+/", "", $login); // преобразуем на всякий случай
		
		$arFilter = Array("PERSONAL_PHONE" => $login);		
		
		$res = Bitrix\Main\UserTable::getList(Array(
			"select" => Array("ID","LOGIN", "EMAIL", "PERSONAL_PHONE"),
			"filter" => $arFilter,
		));
		
		$arRes = $res->fetch();

	}
	
	if(!empty($arRes)){
		
		global $USER;
		if (!is_object($USER)) $USER = new CUser;
		$arAuthResult = $USER->Login($arRes["LOGIN"], $pass, "Y");
	}
	

	header('Content-type: application/json');
	if ($arAuthResult["TYPE"] == "ERROR") {
		echo \Bitrix\Main\Web\Json::encode(array(
			'type' => 'error',
			'message' => strip_tags($arAuthResult['MESSAGE']),
		));
	} else {
		echo \Bitrix\Main\Web\Json::encode(array('type' => 'ok'));
	}
	require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_after.php');
}
?>
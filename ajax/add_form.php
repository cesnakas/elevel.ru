<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


CModule::IncludeModule("form");

foreach($_REQUEST as $key => $value)
{
	if($key !== "sessid" && $key !== "WEB_FORM_ID")
	{
		$value = iconv("UTF-8", "cp1251", $value);
		$arValues[$key] = $value;
	}
}
$FORM_ID = htmlspecialchars($_REQUEST['WEB_FORM_ID']);

if ($RESULT_ID = CFormResult::Add($FORM_ID, $arValues))
{

	if (CFormResult::Mail($RESULT_ID)){
	//$sussesMsg = iconv("UTF-8", "cp1251", "Ваш запрос успешно отправлен!");
	$sussesMsg = "Ваш запрос успешно отправлен!";
		echo $sussesMsg;
	}
	
}
else
{
	global $strError;
	echo $strError;
}
?>
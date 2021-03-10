<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

//CFormResult::Add($arParams["WEB_FORM_ID"], $arResult["arrVALUES"]);
CModule::IncludeModule("form");

/*$FORM_ID = 74;

$arValues = array (
    "form_text_966"                 => "11tztest",
    "form_text_967"                 => "123",     
    "form_text_968"             => "jhjjj",  

);
// создадим новый результат
if ($RESULT_ID = CFormResult::Add($FORM_ID, $arValues))
{
    echo "Результат #".$RESULT_ID." успешно создан";
}
else
{
    global $strError;
    echo $strError;
}*/
//echo "<pre>"; print_r($_REQUEST); echo "</pre>";

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
    CFormResult::Mail($RESULT_ID);
	$sussesMsg = iconv("UTF-8", "cp1251", "Запрос успешно отправлен");
?>
    <span style="color: red;" class="tz-suc-msg"><?=$sussesMsg?> <? //echo "<pre>"; print_r($arValues); echo "</pre>";?></span>
<?}
else
{
    global $strError;
    echo $strError;
}
//echo "<pre>"; print_r($arValues); echo "</pre>";
?>
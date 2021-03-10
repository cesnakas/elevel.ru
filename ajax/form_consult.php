<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule("iblock");
# если форма заполнена успешно, отправляем данные по е-mail и выводим соответствующее сообщение
foreach($_REQUEST as $key=>$ar){
    $_REQUEST[$key] = iconv("UTF-8", "WINDOWS-1251", htmlspecialchars($ar));    
}

# отправляем данные по e-mail
$strEmailFrom = COption::GetOptionString('main','email_from');
$strEmailTo = $arParams["EMAIL"]?$arParams["EMAIL"]:$strEmailFrom;
$siteName = COption::GetOptionString("main", "site_name");
$serverName = SITE_SERVER_NAME?SITE_SERVER_NAME:$_SERVER["SERVER_NAME"];

$strEmailSubj = "NEW REQUEST FOR CONSULT";

# формируем набор полей для отправки в письме
$arEventFields["NAME"] = $_REQUEST["name"];
$arEventFields["MAIL"] = $_REQUEST["mail"];
$arEventFields["TOWN"] = $_REQUEST["town"];
$arEventFields["WEIGHT"] = $_REQUEST["weight"];
$arEventFields["V"] = $_REQUEST["v"];
$arEventFields["GOODS"] = $_REQUEST["goods"];

#допоплнительные поля
$arEventFields["EMAILTO"] = implode(",", $strEmailTo);
$arEventFields["SUBJ"] = $strEmailSubj;
$arEventFields["DATE"] = date("d.m.Y");
$eventType = "NEW_REQUEST_FOR_CONSULT";
CEvent::Send($eventType, SITE_ID, $arEventFields);

?>
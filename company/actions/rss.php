<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
header("Content-Type: text/xml");
CModule::IncludeModule("iblock");

CIBlockRSS::GetRSS(7, $LANG, "vecancy", 10, false, false);?>
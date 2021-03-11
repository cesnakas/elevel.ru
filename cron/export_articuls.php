<?
if(!$_SERVER["DOCUMENT_ROOT"])
	$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/..");

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define("BX_CAT_CRON", true);
define('NO_AGENT_CHECK', true);
@set_time_limit (0);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
//require($_SERVER["DOCUMENT_ROOT"] . '/local/classes/php-excel-reader/excel_reader2.php');
//require($_SERVER["DOCUMENT_ROOT"] . '/local/classes/SpreadsheetReader.php');

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("currency");

$fp = fopen('articuls_good_id.csv', 'w');

$arFilter = Array("IBLOCK_ID" => CATALOG_ID, "!PROPERTY_MARKING_PRODUCER" => false);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, false, false, array("ID", "PROPERTY_MARKING_PRODUCER"));
while($arGood = $res->GetNext())
{
	$articul = $arGood["PROPERTY_MARKING_PRODUCER_VALUE"];
	
	fputcsv($fp, array($articul, $arGood["ID"]));
}

fclose($fp);
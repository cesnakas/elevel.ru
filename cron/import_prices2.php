<?
if(!$_SERVER["DOCUMENT_ROOT"])
	$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/..");

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define("BX_CAT_CRON", true);
define('NO_AGENT_CHECK', true);
@set_time_limit (0);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . '/local/classes/php-excel-reader/excel_reader2.php');
require($_SERVER["DOCUMENT_ROOT"] . '/local/classes/SpreadsheetReader.php');

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("currency");

$product_ids = array();
$product_id2price = array();

$fp = fopen("prices_all.csv", "r");
while (($data = fgetcsv($fp, 100000, ",")) !== FALSE) {
    list($product_id, $articul, $price) = $data;
	
	$product_ids[] = $product_id;
	$product_id2price[$product_id] = $price;
}
fclose($fp);

if (!empty($product_ids))
{
	$db_res = CPrice::GetList(array(), array("PRODUCT_ID" => $product_ids));
	while ($arPrice = $db_res->Fetch())
	{
		$product_id = $arPrice["PRODUCT_ID"];
		
		if ($product_id && isset($product_id2price[$product_id]) && $product_id2price[$product_id])
		{
			CPrice::Update($arPrice["ID"], array("PRICE" => $product_id2price[$product_id]));
		}
	}
}

// TODO возможно все price_id тоже заранее собрать и закинуть в csv файл, а затем уже оттуда тупо импортить.
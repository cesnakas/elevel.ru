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

$arFilter = array('DATE_RATE' => '01/03/2019');
$by = "date";
$order = "desc";

$currencies = array();

$db_rate = CCurrencyRates::GetList($by, $order, $arFilter);
while($ar_rate = $db_rate->Fetch())
{
	$currencies[ $ar_rate["CURRENCY"] ] = $ar_rate["RATE"];
}


$articuls = array();
$find_articuls = array();
$articul2price = array();
$product_ids = array();
$product_id2price = array();

$articuls_have = array();
$product_id2articul = array();

$fp = fopen("articuls_good_id.csv", "r");
while (($data = fgetcsv($fp, 100000, ",")) !== FALSE) {
    list($articul, $product_id) = $data;
	
	$product_ids[] = $product_id;
	$articuls_have[] = $articul;
	$product_id2articul[$product_id] = $articul;
}
fclose($fp);

$articuls_have_flip = array_flip($articuls_have);

$fp = fopen("prices.csv", "r");
while (($data = fgetcsv($fp, 100000, ";")) !== FALSE) {
    list($articul, $price, $currency) = $data;
	
	if ($articul && $price && $currency)
	{
		$articuls[] = $articul;
		
		if (isset($articuls_have_flip[$articul]) && $articuls_have_flip[$articul])
		{
			if ($currency == "RUB")	$articul2price[$articul] = $price;
			else					$articul2price[$articul] = $price * $currencies[$currency];
		}
	}
}
fclose($fp);

$fp = fopen('prices_all.csv', 'w');

foreach($product_ids as $product_id)
{
	$articul = $product_id2articul[$product_id];
	$price = $articul2price[$articul];
	
	if ($product_id && $articul && $price)
	{
		fputcsv($fp, array($product_id, $articul, $price));
	}
}
fclose($fp);

/*if (!empty($product_ids))
{
	$db_res = CPrice::GetList(array(), array("PRODUCT_ID" => $product_ids));
	while ($arPrice = $db_res->Fetch())
	{
		$product_id = $arPrice["PRODUCT_ID"];
		$articul = $product_id2articul[$product_id];
		
		if ($articul && isset($articul2price[$articul]) && $articul2price[$articul])
		{
			CPrice::Update($arPrice["ID"], array("PRICE" => $product_id2price[$product_id]));
		}
	}
}

$not_find_articuls = array_diff($articuls, $articuls_have);

echo "not_find_articuls <pre>".print_r($not_find_articuls,true)."</pre>";*/
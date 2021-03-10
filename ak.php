<?
return;
$curDir = realpath( __DIR__);
$_SERVER["DOCUMENT_ROOT"] = realpath( __DIR__ . "/");

ini_set("memory_limit", "64G");
set_time_limit(0);

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$fp = fopen($curDir . "/goods.csv","w");
fputcsv($fp, ["NAME","ARTICUL","ACTIVE"], ';');

CModule::IncludeModule('iblock');
$arSelect = Array(
	"ID", 
	"NAME", 
	"ACTIVE", 
	"DATE_ACTIVE_FROM",
	"PROPERTY_MARKING_PRODUCER"
);
$arFilter = Array(
	"IBLOCK_ID"=>83, 
	// "ACTIVE"=>"Y"
);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($arElement = $res->GetNext())
{
	// echo "<pre>"; print_r($arElement); echo "</pre>";
	fputcsv($fp, [$arElement['NAME'],$arElement['PROPERTY_MARKING_PRODUCER_VALUE'],$arElement['ACTIVE']], ';');
}

// $filter = Array(
	
// );

// $rsUsers = CUser::GetList(($by = "ID"), ($order = "desc"), $filter, ['FIELDS' => ['ID', 'EMAIL', 'DATE_REGISTER'], 'SELECT' => ['UF_M']]);
// while ($arUser = $rsUsers->Fetch())
// {
	// if($arUser['ID'] <= 21250){
	// // if (in_array(31, $arUser["UF_M"])) continue;
	// // if (in_array(32, $arUser["UF_M"])) continue;
	// // if (in_array(43, $arUser["UF_M"])) continue;

	// fputcsv($fp, [$arUser['EMAIL']], ';');
	// }
// }

fclose($fp);

echo "done";


return;


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('bxmaker.geoip');

$locationId = 15;
$locationId = '';

$arFilterOr = array(
	'=GROUP' => $locationId,
	// '=DEF'  => true
);

$oMessage = new \Bxmaker\GeoIP\MessageTable();
$dbr = $oMessage->getList(array(
	'filter' => array(
		'TYPE.TYPE'    => "FORMS_DEFAULT_EMAIL",
		'TYPE.SITE_ID' => SITE_ID,
		$arFilterOr
	)
));
while ($ar = $dbr->fetch()) {
	
	echo "<pre>"; print_r($ar); echo "</pre>";

	if ($ar['DEF']) {
		$arEmail['DEFAULT'] = $ar;
	}
	else {
		$arEmail['CURRENT'] = $ar;
	}
}

return;
//
// Удаление дублей из таблицы b_catalog_measure_ratio. Тикеты №5513, 5750
// 
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$productId2ratios = array();
$result = array();

if (CModule::IncludeModule("catalog"))
{
  $db_ratio = CCatalogMeasureRatio::getList(array(), array("IS_DEFAULT" => ""), false, false, array("ID", "PRODUCT_ID", "RATIO", "IS_DEFAULT")); 
  while($ar_ratio = $db_ratio->Fetch())
    $productId2ratios[ $ar_ratio["PRODUCT_ID"] ][] = $ar_ratio;
}

$arRowToDelete = array();
foreach($productId2ratios as $product_id => $ratio){
	if (count($productId2ratios[$product_id]) > 1 && !in_array($product_id, $result)){

		foreach($ratio as $arRat){
			if($arRat['IS_DEFAULT'] != "Y")
				$arRowToDelete[] = $arRat['ID'];
		}
		
		$result[] = $product_id;
	}
}

if(!empty($arRowToDelete)){
	
	global $DB;
	
	foreach($arRowToDelete as $rowID){
		
		if(intval($rowID) > 0){
			$dbRes = $DB->Query('DELETE FROM `b_catalog_measure_ratio` WHERE ID=' . $rowID, false, "File: ".__FILE__."<br>Line: ".__LINE__);
			echo "Удален дубль с ID=" . $rowID . "<br/>";
		}
	
		
	}
}
else
	echo "Дублей не найдено.";


// print_r($result);



return;
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');

$filename = $_SERVER["DOCUMENT_ROOT"] . '/producer.csv';

// if (!is_writable($filename)){
	// echo "Файл недоступен для записи.";
	// exit;
// }

if (!$handle = fopen($filename, 'w')) {
	echo "Не могу открыть файл ($filename)";
	exit;
}

$str = "Артикул товара;URL";
	
if (fwrite($handle, iconv("utf-8","cp1251",$str)) === FALSE) {
	echo "Не могу произвести запись в файл ($filename)";
	exit;
}

$arSelect = Array(
	"ID", 
	"NAME", 
	"DETAIL_PAGE_URL",
	"PROPERTY_PRODUCER",
	"PROPERTY_MARKING_PRODUCER"
);
$arFilter = Array(
	"IBLOCK_ID"=>CATALOG_ID,  
	"ACTIVE"=>"Y",
	"CATALOG_AVAILABLE" => "Y",
	"PROPERTY_PRODUCER" => 45957, // schneider
);
// $rsItems = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$rsItems = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($arItems = $rsItems->GetNext())
{
	$str = "art_" . $arItems['PROPERTY_MARKING_PRODUCER_VALUE'] . ";" . $arItems['DETAIL_PAGE_URL'];
	fwrite($handle, PHP_EOL . iconv("utf-8","cp1251",$str));
	// echo "<pre>"; print_r($arItems); echo "</pre>";
	
}

echo "ok";
fclose($handle);

?>

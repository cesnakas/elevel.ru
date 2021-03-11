<?

//
// Удаление дублей из таблицы b_catalog_measure_ratio. Тикеты №5513, 5750
// 
$_SERVER["DOCUMENT_ROOT"] = "/var/www/elevel/data/www/elevel.ru";

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
?>
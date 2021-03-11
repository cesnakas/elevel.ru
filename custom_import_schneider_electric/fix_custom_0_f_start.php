<?php 
define("STOP_STATISTICS", true);
define("NOT_CHECK_PERMISSIONS", true);
if(empty($_SERVER["DOCUMENT_ROOT"])){
$_SERVER["DOCUMENT_ROOT"] = "/home/m/makoveckij/elevel.ru/public_html";
}
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main,
Bitrix\Main\Localization\Loc as Loc,
Bitrix\Main\Loader,
Bitrix\Main\Config\Option,
Bitrix\Sale\Delivery,
Bitrix\Sale\PaySystem,
Bitrix\Sale,
Bitrix\Sale\Order,
Bitrix\Sale\DiscountCouponsManager,
Bitrix\Main\Context;

Bitrix\Main\Loader::includeModule('iblock');
Bitrix\Main\Loader::includeModule('catalog');

$arSelect = Array( "ID");
$arFilter = Array("IBLOCK_ID"=>83, 
);


$res = CIBlockElement::GetList(Array("ID"=>"desc"), $arFilter, false, array(), $arSelect);

if ($res->SelectedRowsCount()==0){
echo "Нет данных";
die();
} else {
	echo "Всего данных для записи:"; echo $res->SelectedRowsCount(); echo "<br><br><br>";
	//echo $_SERVER['DOCUMENT_ROOT'];
	//die();
}

$prods = [];
while($ob = $res->GetNextElement()){ 
$arFields = $ob->GetFields();  
//$arProps = $ob->GetProperties();

$prods[] = $arFields;		



}


foreach($prods as $product){
$arMeasure = \Bitrix\Catalog\ProductTable::getCurrentRatioWithMeasure($product["ID"]);   
CIBlockElement::SetPropertyValuesEx($product["ID"], 83, ["MULTIPLICITY_CUSTOM"=> $arMeasure[$product["ID"]]['MEASURE']['SYMBOL_RUS']]);	

$measureData = \Bitrix\Catalog\MeasureRatioTable::getCurrentRatio($product["ID"]);
CIBlockElement::SetPropertyValuesEx($product["ID"], 83, ["MULTIPLICITY_CUSTOM_INT"=> $measureData[$product["ID"]]]);	
}


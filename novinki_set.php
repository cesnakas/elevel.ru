<?
$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

set_time_limit(0);

define("PROPERTY_NEW_Y", 47453);

CModule::IncludeModule("iblock");

$arSelect = array(
	"ID",
	"IBLOCK_ID",
    "DATE_CREATE",
	"PROPERTY_NEW"
);

// созданные меньше 30 дней назад и не установленная галка Новинка
$from = date('d.m.Y', time() - 86400 * 30); // 30 дней назад
$arFilter = array("IBLOCK_ID" => CATALOG_ID, ">=DATE_CREATE" => $from, "!PROPERTY_NEW" => PROPERTY_NEW_Y);

$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>10000000), $arSelect);
$count_new = 0;
while($ob = $res->GetNext())
{
    $arSelectSETPROP = array("NEW" =>  PROPERTY_NEW_Y); 

	CIBlockElement::SetPropertyValuesEx($ob['ID'], CATALOG_ID, $arSelectSETPROP); 
	
	$count_new++;
}

// созданные больше 30 дней назад и установленная галка Новинка
$arFilter = array("IBLOCK_ID" => CATALOG_ID, "<DATE_CREATE" => $from, "PROPERTY_NEW" => "Y");

$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>10000000), $arSelect);
$count_not_new = 0;
while($ob = $res->GetNext())
{
    $arSelectSETPROP = array("NEW" =>  false); 

	CIBlockElement::SetPropertyValuesEx($ob['ID'], CATALOG_ID, $arSelectSETPROP); 
	
	$count_not_new++;
}

echo "count_new = ". $count_new . "\n";
echo "count_not_new = ". $count_not_new . "\n";

exit();
<?
$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

set_time_limit(0);

CModule::IncludeModule("iblock");

$arSelect = array(
	"ID",
	"IBLOCK_ID",
    "CATALOG_QUANTITY"
);
				
$arFilter = array("IBLOCK_ID" => CATALOG_ID);

$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize"=>10000000), $arSelect);
while($ob = $res->GetNext())
{
    
    $hasFoto = false;
    $havAva = $ob['CATALOG_QUANTITY']>0?true:false;
    
    $g = CIBlockElement::GetProperty(CATALOG_ID, $ob["ID"], Array("SORT"=>"ASC"), Array("ACTIVE"=>"Y", "CODE"=>"IMAGES"));
    while($ar_res = $g->Fetch())
    {
        if (strlen($ar_res["VALUE"]) > 0)
        {
            $hasFoto = true;    
        }    
    }    
    
    $arSelectSETPROP = array(
        "FLAG_MAIN_PHOTO" =>  $hasFoto ? PROPERTY_FLAG_MAIN_PHOTO_YES : 0,
	    "FLAG_MAIN_QUANTITY" =>  $havAva ? PROPERTY_FLAG_MAIN_QUANTITY_YES : 0,
    ); 

	CIBlockElement::SetPropertyValuesEx($ob['ID'], CATALOG_ID, $arSelectSETPROP); 
}

exit();
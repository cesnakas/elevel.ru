<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$fp = fopen('get_sections_old_filters.csv', 'w');

$arFilter = Array(
	"IBLOCK_ID" => CATALOG_ID, 
	"ACTIVE" => "Y", 
);

$sections = array();

$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter, false, array("ID", "CODE", "SECTION_PAGE_URL", "IBLOCK_ID", "IBLOCK_TYPE_ID","IBLOCK_SECTION_ID"));
while ($arSect = $rsSect->GetNext())
{
   $sections[ $arSect["ID"] ] = array(
		"ID" => $arSect["ID"],
		"CODE" => $arSect["CODE"],
		"SECTION_PAGE_URL" => $arSect["SECTION_PAGE_URL"],
	);
}

$arFilter = Array(
	"IBLOCK_ID" => CATALOG_ID, 
	"ACTIVE" => "Y", 
);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("ID", "IBLOCK_SECTION_ID", "DETAIL_PAGE_URL", "PROPERTY_PRODUCER"));
while($ar_fields = $res->GetNext())
{
	if (!in_array($ar_fields["PROPERTY_PRODUCER_VALUE"], $sections[ $ar_fields["IBLOCK_SECTION_ID"] ]["BRANDS"]))
		$sections[ $ar_fields["IBLOCK_SECTION_ID"] ]["BRANDS"][] = $ar_fields["PROPERTY_PRODUCER_VALUE"];
	

}

$arFilter = Array(
	"IBLOCK_ID" => 84, // бренды
	"ACTIVE" => "Y", 
);

$brands = array();

$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter, false, array("ID", "CODE", "NAME"));
while ($arSect = $rsSect->GetNext())
{
   $brands[ $arSect["ID"] ] = array(
		"ID" => $arSect["ID"],
		"CODE" => $arSect["CODE"],
		"NAME" => $arSect["NAME"],
	);
}


$arFilter = Array(
	"IBLOCK_ID" => 84, 
	"ACTIVE" => "Y", 
);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("ID", "IBLOCK_SECTION_ID", "CODE", "NAME"));
while($ar_fields = $res->GetNext())
{
	$brands[ $ar_fields["IBLOCK_SECTION_ID"] ]["SERIES"][] = array(
		"ID" => $ar_fields["ID"],
		"CODE" => $ar_fields["CODE"],
		"NAME" => $ar_fields["NAME"],
	);
}

foreach($sections as $section)
{
	foreach($section["BRANDS"] as $brand_id)
	{
		foreach($brands[$brand_id]["SERIES"] as $serie)
		{
			$array_to_write = array($section["ID"], $section["CODE"], $section["SECTION_PAGE_URL"], $brands[ $brand_id ]["ID"], $brands[ $brand_id ]["CODE"], $brands[ $brand_id ]["NAME"], $serie["ID"], $serie["CODE"], $serie["NAME"]);
			
			fputcsv($fp, $array_to_write, ";");
		}
	}
}


//echo "<pre>".print_r($brands, true)."</pre>";

fclose($fp);
?>
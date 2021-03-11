<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$fp = fopen('get_goods_old.csv', 'w');

$arFilter = Array(
	"IBLOCK_ID" => CATALOG_ID, 
	"ACTIVE" => "Y", 
);

$elems = array();

$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("ID", "IBLOCK_ID", "CODE", "PROPERTY_" . ARTICUL_PROP, "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
while($ar_fields = $res->GetNext())
{
	$elems[] = array(
		$ar_fields["ID"],
		$ar_fields["CODE"],
		$ar_fields["PROPERTY_" . ARTICUL_PROP . "_VALUE"],
		$ar_fields["DETAIL_PAGE_URL"],
	);
}

foreach($elems as $fields)
	fputcsv($fp, $fields, ";");

fclose($fp);
?>
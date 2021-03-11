<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("iblock");

$fp = fopen('get_sections_old.csv', 'w');

$arFilter = Array(
	"IBLOCK_ID" => CATALOG_ID, 
	"ACTIVE" => "Y", 
);

$sections = array();

$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter, false, array("ID", "CODE", "SECTION_PAGE_URL", "IBLOCK_ID", "IBLOCK_TYPE_ID","IBLOCK_SECTION_ID"));
while ($arSect = $rsSect->GetNext())
{
   $setions[] = array(
		$arSect["ID"],
		$arSect["CODE"],
		$arSect["SECTION_PAGE_URL"],
	);
}

foreach($setions as $fields)
	fputcsv($fp, $fields, ";");

fclose($fp);
?>
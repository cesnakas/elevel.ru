<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$site = "https://elevel.ru";

CModule::IncludeModule("iblock");

$arSelect = Array("DETAIL_PAGE_URL", "DETAIL_TEXT", "CODE");
$arFilter = Array("IBLOCK_ID"=>84, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

$list = array();

while($ob = $res->GetNext())
{	
	if (!empty($ob["CODE"]))
	{
		//echo "<pre>"; print_r($ob); echo "</pre>";
		//echo "<pre>"; print_r($IPROPERTY); echo "</pre>";
	
		//echo $site . $ob["DETAIL_PAGE_URL"]."<br>". $ob["DETAIL_TEXT"]."<br>";
		$list[] = array($site . $ob["DETAIL_PAGE_URL"], $ob["DETAIL_TEXT"]);
	}
}

/*$list = array (
		array('aaa', 'bbb', 'ccc', 'dddd'),
		array('123', '456', '789'),
		array('"aaa"', '"bbb"')
	);

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
*/
	
echo "<br><br>";


$SectList = CIBlockSection::GetList($arSort, array("IBLOCK_ID"=>84,"ACTIVE"=>"Y") ,false, array("SECTION_PAGE_URL", "DESCRIPTION"));
while ($SectListGet = $SectList->GetNext())
{
	//echo $site . $SectListGet["SECTION_PAGE_URL"]."<br>". $SectListGet["DESCRIPTION"]."<br>";
	$list[] = array($site . $SectListGet["SECTION_PAGE_URL"], $SectListGet["DESCRIPTION"]);
}

$fp = fopen('struct.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields, ";");
}

fclose($fp);  

/*
URL
TITLE
H1
DESCRIPTION
KEYWORDS
*/

//echo "<pre>"; print_r($arValues); echo "</pre>";
?>
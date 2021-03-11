<?
$curDir = realpath( __DIR__);
$_SERVER["DOCUMENT_ROOT"] = realpath( __DIR__ . "/../");

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
?>
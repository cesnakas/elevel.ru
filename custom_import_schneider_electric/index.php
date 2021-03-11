<?
require_once('init.php');

$xls = new phpExcel; //создаем отдельный файл под каждую категорию
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setCellValue('A1',"Артикул товара");
$sheet->setCellValue('B1',"URL");


$numRow=2;


$arSelect = Array( "ID", "PROPERTY_MARKING_PRODUCER", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>83, 
"PROPERTY_PRODUCER" => 45957, 
"ACTIVE" => "Y"
);


$res = CIBlockElement::GetList(Array("ID"=>"desc"), $arFilter, false, array(), $arSelect);

if ($res->SelectedRowsCount()==0){
echo "Нет данных";
die();
} else {
	//echo "Всего данных для записи:"; echo $res->SelectedRowsCount(); echo "<br>";
	//echo $_SERVER['DOCUMENT_ROOT'];
//	die();
}


while($ob = $res->GetNextElement()){ 
$arFields = $ob->GetFields();  
//$arProps = $ob->GetProperties();

$prods[] = array( 'URL'=>$arFields['DETAIL_PAGE_URL'],
'ARC'=> $arFields['PROPERTY_MARKING_PRODUCER_VALUE']		
);

}

foreach($prods as $product){


//print_r($ob_arr);

$sheet->setCellValue('A'.$numRow, "art_".$product["ARC"]);
$sheet->setCellValue('B'.$numRow, $product["URL"]);

$numRow++;

}

$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
$objWriter->save($_SERVER['DOCUMENT_ROOT'].'/custom_import_schneider_electric/data.xlsx');



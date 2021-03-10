<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

CModule::IncludeModule( 'sale' );
CModule::IncludeModule( 'catalog' );
CModule::IncludeModule( 'iblock' );

$el = new CIBlockElement;

//pokroman - фильтр по артикулам
$filename = $_SERVER['DOCUMENT_ROOT'] . '/URL_elevel.xlsx';	
require_once $_SERVER['DOCUMENT_ROOT'] . '/ajax/Classes/PHPExcel.php';

$arResultURL = array();

$file_type = PHPExcel_IOFactory::identify( $filename );

$objReader = PHPExcel_IOFactory::createReader( $file_type );
$objPHPExcel = $objReader->load( $filename ); 
$arResultURL = $objPHPExcel->getActiveSheet()->toArray();
	
foreach($arResultURL as $result):	
	$s = explode('/',$result[0]);
	$s = array_diff($s, array(''));
	$code[] = end($s);
endforeach;

if( !empty($code) ):
	$arFilter = array(
		'CODE' => $code,
		'IBLOCK' => 83,
	);

	$arSelect = array(
		'ID',	
		'CODE',
	);

	$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	while($arItem = $res->GetNext())
	{	
		$arMas[ $arItem['CODE'] ][] = $arItem['ID'];	
	}

	foreach($arMas as $code => $ids):
		$uind = 1;
		foreach($ids as $id):				
			$arLoadProductArray = Array(	  
			  "CODE" => $code.$uind,
			  );
			
			$res = $el->Update($id, $arLoadProductArray);
			
			$uind++;
		endforeach;
	endforeach;
endif;
?>
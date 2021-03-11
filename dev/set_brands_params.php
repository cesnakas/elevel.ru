<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );



CModule::IncludeModule( 'iblock' );



$file = fopen( $_SERVER['DOCUMENT_ROOT'] . '/dev/brands_params.txt', 'r' );
while ( !feof( $file ) )
{
	$row = fgets( $file, 10240 );
	
	$arRow = explode( ';', $row );
	
	$brandId = $arRow[0];
	$quality = $arRow[1];
	$popularity = $arRow[2];
	$guarantee = $arRow[3];
	$reliability = $arRow[4];
	$service = $arRow[5];
	
	$sec = new CIBlockSection;
	$arFields = Array(
		'UF_QUALITY' => $quality,
		'UF_POPULARITY' => $popularity,
		'UF_GUARANTEE' => $guarantee,
		'UF_RELIABILITY' => $reliability,
		'UF_SERVICE' => $service
	);
	$sec->Update( $brandId, $arFields );
}
?>
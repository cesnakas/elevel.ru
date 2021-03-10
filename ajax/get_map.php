<?
$cityId = htmlspecialchars( $_POST['CITY_ID'] );



if ( $cityId )
{
	require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );
	
	
	
	CModule::IncludeModule( 'iblock' );
	
	
	
	$arFilter = Array(
		'IBLOCK_ID' => 116,
		'SECTION_ID' => $cityId,
		'ACTIVE' => 'Y'
	);
	$arSelect = Array(
		'NAME',
		'PROPERTY_COORDS'
	);

	$dbShops = CIBlockElement::GetList( Array(), $arFilter, false, false, $arSelect );
	while ( $arShop = $dbShops->Fetch() )
	{
		
		$arCoords = explode( ',', $arShop['PROPERTY_COORDS_VALUE'] );
		
		$arResult[] = Array(
			'NAME' => iconv( 'Windows-1251', 'UTF-8', $arShop['NAME'] ),
			'COORDS_1' => $arCoords[0],
			'COORDS_2' => $arCoords[1],
		);
	}
	
	
	echo json_encode( $arResult );
}
?>
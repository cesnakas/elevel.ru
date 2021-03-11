<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );



CModule::IncludeModule( 'iblock' );



$arBrandsSort = Array(
	'DATE_UPDATE' => 'ASC'
);
$arBrandsFilter = Array(
	'IBLOCK_ID' => 84,
	'DEPTH_LEVEL' => 1,
);
$arBrandsSelect = Array(
	'ID',
	'DESCRIPTION'
);
$dbBrands = CIBlockSection::GetList( $arBrandsSort, $arBrandsFilter, false, $arBrandsSelect );
while ( $arBrand = $dbBrands->Fetch() )
{
	if ( !$arBrand['DESCRIPTION'] )
	{
		$description = file_get_contents( 'http://elevel.dev.magnitmedia.ru/dev/get_brand_description.php?BRAND_ID=' . $arBrand['ID'] );
		
		
		$sec = new CIBlockSection;
		$sec->Update( $arBrand['ID'], Array( 'DESCRIPTION' => $description, 'DESCRIPTION_TYPE' => 'html' ) );
	}
}
?>

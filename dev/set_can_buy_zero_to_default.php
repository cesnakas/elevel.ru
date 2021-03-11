<?
// 12.09.2017, ownedmuhaha
// Устанавливаем всем товарам значение галочки "Разрешить покупку при отсутствии товара" в дефолтное

set_time_limit( 999999 );

require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );



CModule::IncludeModule( 'catalog' );



$arProductsSort = Array(
	'TIMESTAMP_X' => 'ASC'
);
$arProductsFilter = Array(
	'ELEMENT_IBLOCK_ID' => 83,
	'!CAN_BUY_ZERO' => 'D'
);
$arProductsSelect = Array(
	'ID'
);
$dbProducts = CCatalogProduct::GetList( $arProductsSort, $arProductsFilter, false, false, $arProductsSelect );
while ( $arProduct = $dbProducts->Fetch() )
{
	CCatalogProduct::Update( $arProduct['ID'], Array( 'CAN_BUY_ZERO' => 'D' ) );
	echo $arProduct['ID'] . '<br />';
}



?>

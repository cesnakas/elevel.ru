<?
$itemId = intval( $_POST['ITEM_ID'] );



if ( $itemId )
{
	require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );
	
	
	
	CModule::IncludeModule( 'catalog' );
	
	
	
	Add2BasketByProductID( $itemId, 1, Array(), Array() );
}
?>
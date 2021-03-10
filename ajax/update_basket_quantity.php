<?
ini_set( 'display_errors', 0 );



$basketId = intval( $_POST['BASKET_ID'] );
$quantity = intval( $_POST['QUANTITY'] );
$price = floatval( $_POST['PRICE'] );



if ( $basketId && $quantity )
{
	require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );
	
	
	
	CModule::IncludeModule( 'sale' );
	
	
	
	CSaleBasket::Update( $basketId, Array( 'QUANTITY' => $quantity ) );
	
	echo number_format( $price * $quantity, 2, ',', ' ' ) . ' Р';
}
?>
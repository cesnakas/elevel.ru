<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );



CModule::IncludeModule( 'sale' );



CSaleBasket::DeleteAll( CSaleBasket::GetBasketUserID() );
?>
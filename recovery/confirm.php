<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle( 'Регистрация' );
$APPLICATION->AddChainItem( 'Регистрация' );
?>


<?$APPLICATION->IncludeComponent( 
	'bitrix:system.auth.changepasswd',
	'recovery',
	Array(),
	false
);?>


<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' );
?>
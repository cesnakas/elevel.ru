<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle( '�����������' );
$APPLICATION->AddChainItem( '�����������' );
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
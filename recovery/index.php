<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle( 'Регистрация' );
$APPLICATION->AddChainItem( 'Регистрация' );
?>


<?$APPLICATION->IncludeComponent(
	'magnitmedia:recovery',
	'',
	Array(),
	false
);?>


<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' );
?>
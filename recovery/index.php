<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle( '�����������' );
$APPLICATION->AddChainItem( '�����������' );
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
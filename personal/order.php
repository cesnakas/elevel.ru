<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle( '���������� ������' );
$APPLICATION->AddChainItem( '���������� ������' );
?>


<?$APPLICATION->IncludeComponent("magnitmedia:order", "template1", Array(
	array(
			
		),
	),
	false
);?>


<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' );
?>
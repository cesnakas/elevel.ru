<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php' );
$APPLICATION->SetTitle( 'Поиск' );
$APPLICATION->AddChainItem( 'Каталог электротоваров' );

?>



<?$APPLICATION->IncludeComponent(
	'magnitmedia:search',
	'',
	Array(
		'QUERY' => urldecode(htmlspecialcharsbx($_GET['q'])),
		'SECTION' => intval( $_GET['section'] )
	)
);?>



<?
require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' );
?>
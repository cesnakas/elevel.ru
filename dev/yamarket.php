<?
$_SERVER['DOCUMENT_ROOT'] = '/home/www/elevel/data/www/elevel.ru';

require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

CModule::IncludeModule( 'catalog' );

CCatalogExport::PreGenerateExport(3);
?>
done!
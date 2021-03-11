<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("loc_test");
?>
<?
var_dump(\Bitrix\Sale\Location\LocationTable::getList(array(
                            'filter' => array('=ID' => array(3189), '=NAME.LANGUAGE_ID' => 'ru'),
                            'select' => array('ID', 'CODE')
                            ))->Fetch())
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
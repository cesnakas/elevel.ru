<?
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

include($_SERVER["DOCUMENT_ROOT"]."/local/php_interface/include/lt.php");


$obLt = new CMagnitmediaLT();

$obLt->recieveOrder();

?>
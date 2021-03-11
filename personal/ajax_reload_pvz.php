<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("ipol.sdek");

//if (isset($_POST['id'])) {
use Bitrix\Sale\Location\LocationTable;

$cityName = $_POST['city'];
$arList = CDeliverySDEK::getListFile(true);

foreach ($arList['PVZ'] as $key => $value){
    if( $key != $cityName){
        unset($arList['PVZ'][$key]);
    }
}

echo json_encode($arList['PVZ']);//[$cityName]);
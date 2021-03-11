<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?

//if (isset($_POST['id'])) {
use Bitrix\Sale\Location\LocationTable;

try {
    $location = LocationTable::getById($_POST['id'])->fetch();
    $cityLocationCode = $location['CODE'];
    if ($cityLocationCode){
        echo $cityLocationCode;
    }
} catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

//}


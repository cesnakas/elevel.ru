<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
    if ($_POST) {
        CModule::IncludeModule('sale');
        if (!CSaleOrder::StatusOrder($_POST["ID"], "E")){
           echo "Ошибка установки нового статуса заказа"; 
        }
        else {
            echo htmlspecialcharsex($_POST["ID"]);
        }
     
    }


?>
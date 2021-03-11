<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (isset($_REQUEST["action"]) && isset($_REQUEST['id']) && intval($_REQUEST['id']) > 0)
{
    CModule::IncludeModule("catalog");
    
    require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

    $iPriceID = CGeoRegions::GetPriceIDByUser();

    
    require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/catalog_functions.php');    
    
    // определим константу LOG_FILENAME, в которой зададим путь к лог-файлу
    //define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log-333.txt");
    $rsItems = CIBlockElement::GetList(array(), array('ID' => intval($_REQUEST["id"])), false, false, array('ID', 'CATALOG_QUANTITY', 'PROPERTY_KRATNOST_OTGRUZKI'));
    if ($arItem = $rsItems->Fetch()){
        // Сохраним в лог сообщение 
        $count = intval($_REQUEST["count"]);
        $rest = $count%$arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE'];
        if($rest != 0){
            if($count < $arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE']){
                if($arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE'] <= $arItem['CATALOG_QUANTITY']){
                    $productQ = $arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE'];
                    //AddMessage2Log("Кратность меньше количества и просили меньше кратности, отдает кратность");    
                }
                else{
                    $productQ = $arItem['CATALOG_QUANTITY'];
                    //AddMessage2Log("Пишем, что осталось на складе quantity ".$arItem['CATALOG_QUANTITY']);    
                }        
            }
            else{
                $result = (int)($count/$arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE'] + 1) * $arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE'];
                if($result <= $arItem['CATALOG_QUANTITY']){
                    if($count == $arItem['CATALOG_QUANTITY']){
                        $productQ = $count;
                        //AddMessage2Log("Отдаем count");
                    }
                    else{
                        $result = $result - $arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE'];
                        //AddMessage2Log("Отдаем result");
                        $productQ = $result;
                    }   
                }
                else{
                    if($count <= $arItem['CATALOG_QUANTITY']){
                        //AddMessage2Log("Отдаем count"); 
                        $productQ = $count;       
                    }
                    else{
                        //AddMessage2Log("Отдаем quantity и сообщение, осталось quantity ".$arItem['CATALOG_QUANTITY']);    
                        $productQ = $arItem['CATALOG_QUANTITY'];   
                    }     
                }
            }
            //AddMessage2Log($arItem['ID']." - ".$arItem['CATALOG_QUANTITY']." - ".$count." - ".$arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE']);    
        }   
        else{
            //AddMessage2Log($arItem['ID']." - ".$arItem['CATALOG_QUANTITY']." - ".$count." - ".$arItem['PROPERTY_KRATNOST_OTGRUZKI_VALUE']." OK");    
            $productQ = $count;
        }     
    }     

    
    $action = strtoupper($_REQUEST["action"]);
    if ($action == "ADD2BASKET" || $action == "BUY")
    {
        $productID = intval($_REQUEST["id"]);
        if(!isset($productQ) || empty($productQ)){
            if(intval($_REQUEST["count"]) > 0 && $productQ == 0){
                $productQ = $result;    
            }
            else{
                $productQ = intval($_REQUEST["count"]);
            }
        }
        if ($productQ<1) $productQ=1;
        
        //Add2BasketByProductID($productID, $productQ);
        Add2BasketByProductPriceID($productID, 3, $productQ);
    }
}

$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "wt_sml-basket", array(
    "PATH_TO_BASKET" => "/personal/order.php",
    "PATH_TO_ORDER" => "/personal/order.php"
    ),
    false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
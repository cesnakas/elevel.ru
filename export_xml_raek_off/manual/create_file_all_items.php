<? //скрипт из всех товаров элевела с Раек Ид формирует файл
chdir(__DIR__); // при текущих настройках окружения относительные пути кроном не понимаются - задаю вручную
// когда сохраняешь скрипт на крон через ssh, используй команду :wq, команда :w - не сохраняет
include('../settings_script.php');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
                    
global $arrFilter; $arrFilter = array("=ACTIVE" => "Y");
  $APPLICATION->IncludeComponent(
    "tezart:xml_export_raek", 
    "export_raek", 
    array(
        "IBLOCK_TYPE" => "Каталог товаров",
        "IBLOCK_ID_IN" => array(
            0 => "53",
        ),
        "IBLOCK_ID_EX" => array(
            0 => "0",
        ),
        "IBLOCK_SECTION" => array(
            0 => "0", 
           //0 => "45347"
        ),
        "SITE" => "http://www.elevel.ru/",
        "COMPANY" => "ООО \"Эlevel\"",
        "FILTER_NAME" => "arrFilter",
        "MORE_PHOTO" => "MORE_PHOTO",
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "86400",
        "CACHE_FILTER" => "N",
        "PRICE_CODE" => array(
            0 => "Московский филиал",
        ),
        "IBLOCK_ORDER" => "N",
        "CURRENCY" => "RUR",
        "LOCAL_DELIVERY_COST" => "250",
        "COMPONENT_TEMPLATE" => "export_raek",
        "IBLOCK_CATALOG" => "Y",
        "DO_NOT_INCLUDE_SUBSECTIONS" => "N",
        "IBLOCK_AS_CATEGORY" => "Y",
        "CACHE_NON_MANAGED" => "N",
        "SKU_NAME" => "PRODUCT_AND_SKU_NAME",
        "SKU_PROPERTY" => "PROPERTY_CML2_LINK",
        "NAME_PROP" => "0",
        "PARAMS" => array(
        ),
        "COND_PARAMS" => array(
        ),
        "DISCOUNTS" => "PRICE_ONLY",
        "DEVELOPER" => "",
        "COUNTRY" => "",
        "DEVELOPER_ALT" => "",
        "CURRENCIES_CONVERT" => "NOT_CONVERT",
        "DETAIL_TEXT_PRIORITET" => "N"
    ),
    false
);     
        
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
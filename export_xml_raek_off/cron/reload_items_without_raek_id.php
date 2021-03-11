<?php  // Если все товары проверены в раеке, то с товаров без раек ИД снять статус Провереных и проверять еще раз
// т.к. в раеке также регулярно появляются новые товары
// рекомондовали запускать каждые две недели
chdir(__DIR__); // при текущих настройках окружения относительные пути кроном не понимаются - задаю вручную
// когда сохраняешь скрипт на крон через ssh, используй команду :wq, команда :w - не сохраняет
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');    
   $rsElements = CIBlockElement::GetList(
        array(),
        array("IBLOCK_ID" => 53, "PROPERTY_CHEKED_IN_RAEK" => false),
        false,
        false,
        array("ID", "PROPERTY_CHEKED_IN_RAEK")
    ); 
if($ar = $rsElements->Fetch()):
else:
    $rsElements = CIBlockElement::GetList(
        array(),
        array("IBLOCK_ID" => 53, "PROPERTY_RAEK_ID" => false),
        false,
        false,
        array("ID", "PROPERTY_CHEKED_IN_RAEK")
    );  
       
    while ($ar = $rsElements->Fetch()) {     
        CIBlockElement::SetPropertyValuesEx($ar["ID"], 53, array("CHEKED_IN_RAEK" => ''));  
    }     
endif;
 
    

?>
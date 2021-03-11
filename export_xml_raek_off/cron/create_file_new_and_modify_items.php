<? // скрипт проставляет статус "не проверенные" элементам у которых изменился урл, и записывает их файл выгрузки
// Если таких товаров меньше 10000 тыс (больше будет опасно долго)
//То какое-то количество "не проверенных" элементов(сюда входят и новые товары) проверять в раеке записывать раек ID в базу
// и товары в файл
 
$_SERVER["DOCUMENT_ROOT"] = '/var/www/elevel/data/www/elevel.ru'; 
chdir(__DIR__); // при текущих настройках окружения относительные пути кроном не понимаются - задаю вручную
// когда сохраняешь скрипт на крон через ssh, используй команду :wq, команда :w - не сохраняет

include('../settings_script.php');  
include('../dop_function.php');
include('../raek_class.php');  
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 
CModule::IncludeModule('iblock');  
 
// Какое количество товаров проверять в раеке за ночь (в среднем 1 товар - 1 секунда)  
  $count_for_check_in_raek = 1000;
// найти все товары которые имеют раек_ид и изменили свой урл, записать их в массив и обновить 'старый' урл
$arSelect = Array("ID",  "NAME", "PROPERTY_RAEK_ID",  "PROPERTY_ARTIKUL_POSTAVSHCHIKA","PROPERTY_MANUFACTURER", "PROPERTY_CML2_ARTICLE",  "DETAIL_PAGE_URL", "PROPERTY_URL_IN_RAEK", "PROPERTY_CHEKED_IN_RAEK");
$arFilter = Array("IBLOCK_ID"=>53, "!PROPERTY_RAEK_ID" => false, "=PROPERTY_CHEKED_IN_RAEK" => 'Y');
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);  
while($ob = $res->GetNextElement()){
    $Fields = $ob->GetFields();          
    if($Fields['PROPERTY_URL_IN_RAEK_VALUE'] != $Fields['DETAIL_PAGE_URL']):
        $arOffer["NAME"] = $Fields["NAME"]; 
        $arOffer["RAEK_ID"] = $Fields['PROPERTY_RAEK_ID_VALUE']; 
        $arOffer["ARTIKUL_POSTAVSHCHIKA"]= $Fields["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"]; 
        $arOffer["MANUFACTURER"]= $Fields["PROPERTY_MANUFACTURER_VALUE"]; 
        $arOffer["ARTIKUL"] = $Fields["PROPERTY_CML2_ARTICLE_VALUE"];
        $arOffer["DETAIL_URL"] = $Fields["DETAIL_PAGE_URL"];   
        $arOffers[]=$arOffer;    
        CIBlockElement::SetPropertyValuesEx($Fields["ID"], 53, array("URL_IN_RAEK" => $Fields["DETAIL_PAGE_URL"]));
    endif;            
} 
   
// не делать больше ничего, если в массиве больше 10 тыс элементов - не нужно грузить все и сразу
if(count($arOffers)<10000):
// проверям не проверенные в раеке товары и записываем найденые в БД элевела и в файл на выгрузку в Раек
  $arOrder = array("created"=>"asc");// более старые проверяем первыми
  $arFilter = Array("IBLOCK_ID"=>53,"!PROPERTY_CHEKED_IN_RAEK"=>'Y'); 
  $arSelect = Array("ID", "PROPERTY_CHEKED_IN_RAEK", "NAME", "PROPERTY_RAEK_ID",  "PROPERTY_ARTIKUL_POSTAVSHCHIKA","PROPERTY_MANUFACTURER", "PROPERTY_CML2_ARTICLE",  "DETAIL_PAGE_URL");
  $res = CIBlockElement::GetList(Array(), $arFilter, false, array("nTopCount"=>$count_for_check_in_raek), $arSelect);
  $arOffer = array();

// проверяем эти товары в раеке
    $client = new RestClient('https://catalog.raec.su/api/', 'e67bcc62ba51dcdbb8cf5cb92aa3ec85'); 
    while($ob = $res->GetNextElement()){   
       $arFields = $ob->GetFields(); 
        
          
        
       $response = $client->get('product', array('filter[supplierId]' => $arFields["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"], 'filter[brandId]' => $arFields["PROPERTY_MANUFACTURER_VALUE"], 'filter[fields]' => 'raecId','filter[limit]' => 5));
       $response = json_decode($response, true);
// если товар с раек ид найден, то записываем раек идентификатор и изменяем статус на проверен 
               
        if($response[0]['raecId'] != false && count($response) < 2){
            CIBlockElement::SetPropertyValuesEx($arFields["ID"], 53, array("RAEK_ID" => $response[0]['raecId']));  
            $arOffer["NAME"]= $arFields["NAME"];
            $arOffer["RAEK_ID"]= $response[0]['raecId'];
            $arOffer["ARTIKUL_POSTAVSHCHIKA"]= $arFields["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"];
            $arOffer["MANUFACTURER"]= $arFields["PROPERTY_MANUFACTURER_VALUE"];
            $arOffer["ARTIKUL"] = $arFields["PROPERTY_CML2_ARTICLE_VALUE"]; 
            $arOffer["DETAIL_URL"] = $arFields["DETAIL_PAGE_URL"]; 
             
            $arOffers[] = $arOffer;    
        }  
        CIBlockElement::SetPropertyValuesEx($arFields["ID"], 53, array("CHEKED_IN_RAEK" => 'Y'));  
   
   }    
endif;
 if(!empty($arOffers)){   
    CreateXmlFileForRaek('xml_new_and_modify_items.xml', $arOffers);
}     
?>
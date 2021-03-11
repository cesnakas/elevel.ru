<? 
    $_SERVER["DOCUMENT_ROOT"] = '/var/www/elevel/data/www/elevel.ru'; 
    include('../settings_script.php');  
    include('../dop_function.php');
    include('../raek_class.php');  
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 
    
$client = new RestClient('https://catalog.raec.su/api/', 'e67bcc62ba51dcdbb8cf5cb92aa3ec85');  
// Выбираем какое-то количество товаров не проверенных в раек 
  CModule::IncludeModule('iblock'); 
  $count_for_check_in_raek = 10;
  $arOrder = array("created"=>"asc");
  $arFilter = Array("IBLOCK_ID"=>53,"!PROPERTY_CHEKED_IN_RAEK"=>'Y'); 
  $arSelect = Array("ID", "PROPERTY_CHEKED_IN_RAEK", "NAME", "PROPERTY_RAEK_ID",  "PROPERTY_ARTIKUL_POSTAVSHCHIKA","PROPERTY_MANUFACTURER", "PROPERTY_CML2_ARTICLE",  "DETAIL_PAGE_URL");
  $res = CIBlockElement::GetList(Array(), $arFilter, false, array("nTopCount"=>$count_for_check_in_raek), $arSelect);
  $arOffer = array();

// проверяем эти товары в раеке
   while($ob = $res->GetNextElement()){  
       $arFields = $ob->GetFields();   
       $response = $client->get('product', array('filter[supplierId]' => $arFields["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"], 'filter[brandId]' => $arFields["PROPERTY_MANUFACTURER_VALUE"], 'filter[fields]' => 'raecId',));
       $response = json_decode($response, true);
// записываем раек идентификатор и изменяем статус на проверен 
        if($response[0]['raecId'] != false && count($response) < 2){
            CIBlockElement::SetPropertyValuesEx($arFields["ID"], 53, array("RAEK_ID" => $response[0]['raecId']));  
            $arOffer["NAME"]= $arFields["NAME"];
            $arOffer["RAEK_ID"]= $response[0]['raecId'];
            $arOffer["ARTIKUL_POSTAVSHCHIKA"]= $arFields["PROPERTY_ARTIKUL_POSTAVSHCHIKA_VALUE"];
            $arOffer["MANUFACTURER"]= $arFields["PROPERTY_MANUFACTURER_VALUE"];
            $arOffer["ARTIKUL"] = $arFields["PROPERTY_CML2_ARTICLE_VALUE"]; 
            $arOffer["DETAIL_URL"] = $arFields["DETAIL_PAGE_URL"]; 
        }
        CIBlockElement::SetPropertyValuesEx($arFields["ID"], 53, array("CHEKED_IN_RAEK" => 'Y'));  
   $arOffers[] = $arOffer;    
   } 
 //echo '$arOffer';
 //echo "<pre>"; print_r($arOffers); echo "</pre>";      
//сформировать файл для записи товаров в Раек    

 CreateXmlFileForRaek('xml_new_items.xml', $arOffers);
/*
$exportfile = $_SERVER["DOCUMENT_ROOT"].'/export_xml_raek/'."xml_new_items.xml";  
$exportfileHandle = fopen($exportfile, 'w') or die("can't open file"); 
$file_begin = '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE raec_catalog SYSTEM "company_products.dtd">  
    <raec_catalog date="'.date("Y-m-d h:i:s").'"> 
        <company>  
            <name>http://www.elevel.ru/</name>
            <offers>'; 
            fwrite($exportfileHandle, $file_begin);  ?>    
            <?foreach($arOffers as $arOffer):  
                $file_offer_name =' 
                <offer>  
                    <name>'.Replace($arOffer["NAME"]).'</name>';
                $file_offer_name = iconv("WINDOWS-1251", "UTF-8", $file_offer_name);
                fwrite($exportfileHandle, $file_offer_name);  
                $file_offer_raecId = '<raecId>'.Replace($arOffer["RAEK_ID"]).'</raecId>'; 
                $file_offer_raecId = iconv("WINDOWS-1251", "UTF-8", $file_offer_raecId);
                fwrite($exportfileHandle, $file_offer_raecId);         
                $file_offer_supplierId = '<supplierId>'.Replace($arOffer["ARTIKUL_POSTAVSHCHIKA"]).'</supplierId>'; 
                $file_offer_supplierId = iconv("WINDOWS-1251", "UTF-8", $file_offer_supplierId);
                fwrite($exportfileHandle, $file_offer_supplierId);
                $file_offer_brandName = '<brandName>'.Replace($arOffer["MANUFACTURER"]).'</brandName>';
                $file_offer_brandName = iconv("WINDOWS-1251", "UTF-8", $file_offer_brandName);
                fwrite($exportfileHandle, $file_offer_brandName);
                $file_offer_article = '<article>'.Replace($arOffer["ARTIKUL"]).'</article>';
                $file_offer_article = iconv("WINDOWS-1251", "UTF-8", $file_offer_article);
                fwrite($exportfileHandle, $file_offer_article);
                $file_offer_externalLink = '<externalLink>http://www.elevel.ru'.$arOffer["DETAIL_URL"].'</externalLink>  
                </offer>';  
                $file_offer_externalLink = iconv("WINDOWS-1251", "UTF-8", $file_offer_externalLink);      
                fwrite($exportfileHandle, $file_offer_externalLink);
            endforeach;?>     
<? $file_end = '</offers> 
        </company>
    </raec_catalog>';
$file_end = iconv("WINDOWS-1251", "UTF-8", $file_end); 
    
fwrite($exportfileHandle, $file_end);   
fclose($exportfileHandle);    */

?>
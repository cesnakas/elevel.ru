<? 
$_SERVER["DOCUMENT_ROOT"] = '/var/www/elevel/data/www/elevel.ru';   
include('../settings_script.php');     
include('../dop_function.php');

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");  
CModule::IncludeModule('iblock');    
$arSelect = Array("ID",  "NAME", "PROPERTY_RAEK_ID",  "PROPERTY_ARTIKUL_POSTAVSHCHIKA","PROPERTY_MANUFACTURER", "PROPERTY_CML2_ARTICLE",  "DETAIL_PAGE_URL", "PROPERTY_URL_IN_RAEK", "PROPERTY_CHEKED_IN_RAEK");
$arFilter = Array("IBLOCK_ID"=>53, "!PROPERTY_RAEK_ID" => false, "=PROPERTY_CHEKED_IN_RAEK" => 'Y');
$res = CIBlockElement::GetList(Array(), $arFilter, false, array("nTopCount"=>100), $arSelect);  
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

CreateXmlFileForRaek('xml_modified_items.xml', $arOffers);
?>
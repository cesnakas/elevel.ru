<?  require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

    CModule::IncludeModule('iblock'); 
    
  $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_URL_IN_RAEK", "RAEK_ID");
  $arFilter = Array("IBLOCK_ID"=>53, "PROPERTY_URL_IN_RAEK" => false);
  $res = CIBlockElement::GetList(Array(), $arFilter, false, array("nTopCount"=>10000), $arSelect);
  $i=0;
  while($ob = $res->GetNextElement()){
       
      $arFields = $ob->GetFields();                      
      CIBlockElement::SetPropertyValuesEx($arFields["ID"], 53, array("URL_IN_RAEK" => $arFields['DETAIL_PAGE_URL']));  
      $i++;
     // $arProps = $ob->GetProperties();
     // print_r($arProps);
  } 
  print_r($i);     
?>
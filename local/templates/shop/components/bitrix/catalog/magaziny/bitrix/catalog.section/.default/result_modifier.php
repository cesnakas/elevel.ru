<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
foreach($arResult['ITEMS'] as $arKey => $arItem){
    foreach($arItem["PROPERTIES"]["PICTURES"]["VALUE"] as $pic){                                               
        $arFile = CFile::GetFileArray($pic);  
        $renderImage = CFile::ResizeImageGet($arFile, Array("width" => 80, "height" => 50), BX_RESIZE_IMAGE_EXACT, false);
        $arResult['ITEMS'][$arKey]["PREV_PICS"][] = $renderImage["src"];                        
    }  
}

$arResult["SPEC_COUNT"] = array("design"=> 0, "electrician"=> 0, "builder"=> 0);
foreach($arResult['ITEMS'] as $arKey => $arItem){                     
    switch($arItem["PROPERTIES"]["SPEC"]["VALUE_XML_ID"]){
        case "des": $arResult["SPEC_COUNT"]["design"] = 1; break;
        case "elect": $arResult["SPEC_COUNT"]["electrician"] = 1; break;
        case "stroit": $arResult["SPEC_COUNT"]["builder"] = 1; break; 
    }
}

if(!empty($_REQUEST['spec'])){
    /*foreach($arResult["SPEC_COUNT"] as $spKey => $spCount){
        $arResult["SPEC_COUNT"][$spKey] = 1;
    }*/
    $res = CIBlockElement::GetList(array(),array("IBLOCK_ID"=>60, "SECTION_ID" => $arResult["SECTION"]["ID"]), false, false, array("PROPERTY_SPEC"));
    while($ob = $res->GetNext()){
        if($ob["PROPERTY_SPEC_VALUE"] == "Для дизайнера") $arResult["SPEC_COUNT"]["design"] = 1; 
        if($ob["PROPERTY_SPEC_VALUE"] == "Для электрика") $arResult["SPEC_COUNT"]["electrician"] = 1; 
        if($ob["PROPERTY_SPEC_VALUE"] == "Для строителя") $arResult["SPEC_COUNT"]["builder"] = 1; 
    }
}
?>
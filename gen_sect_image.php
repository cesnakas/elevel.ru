<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?
if ($USER->isAdmin()){
    CModule::IncludeModule("iblock");
    $select = Array("ID", "PICTURE");
    $filter = Array("IBLOCK_ID" => 53);
    $result = CIBlockSection::GetList(Array(), $filter, false, $select, false);
    while($items = $result->Fetch()){ 
        if ($items["PICTURE"] == "") {
            $select1 = Array("PROPERTY_MAIN_PHOTO");
            $filter1 = Array("IBLOCK_ID" => 53, "SECTION_ID" => $items["ID"], "!PROPERTY_MAIN_PHOTO" => false);
            $result1 = CIBlockElement::GetList(Array(), $filter1, false, Array("nPageSize"=>1), $select1);
            while($items1 = $result1->Fetch()){ //SQL б жхйке. дю врн рш гмюеьэ н аегслхх. мн ме сдюкърэ, бнглнфмн опхцндхрэяъ, еякх нмх онуепър йюрюкнц (ю щрн нмх лнцср)
                if ($items1["PROPERTY_MAIN_PHOTO_VALUE"] != "") {
                    $bs = new CIBlockSection;
                    $picture = CFile::makeFileArray($items1["PROPERTY_MAIN_PHOTO_VALUE"]);
                    $picture["MODULE_ID"] = "iblock";
                    $arFields["PICTURE"] = $picture;                    
                    if ($res = $bs->Update($items["ID"], $arFields)) {
                        echo "<pre>"; print_r($items1["PROPERTY_MAIN_PHOTO_VALUE"]." - СЯОЕЬМН ДНАЮБКЕМЮ ДКЪ ЙЮРЕЦНПХХ ╧".$items["ID"]); echo "</pre>";
                    }
                    else {
                        echo "<pre>"; print_r("соя, опнхгнькю йюйюъ-рн ньханвйю"); echo "</pre>";
                    }                    
                }
            }
        }
    }
}
?>
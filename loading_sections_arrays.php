<?
$f_info = pathinfo(__FILE__);
ini_set('max_execution_time', 0);
if (!$_SERVER["DOCUMENT_ROOT"]) {
    $ar_parts_path = explode("/",$f_info["dirname"]);
    $path_root = "";

     for ($i = 1; $i < count($ar_parts_path) - 1; $i++) {
        $path_root .= "/".$ar_parts_path[$i];
    }
    $_SERVER["DOCUMENT_ROOT"] = $path_root;
    $_SERVER["SERVER_NAME"] = "dev.elevel.ru";
    $_SERVER["DOCUMENT_ROOT"] .= "/".$_SERVER["SERVER_NAME"];
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

$res = CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=> 48), false, Array("ID"), false);
while($ar_res = $res->Fetch()){
    $arSecForLoad[] = $ar_res["ID"];
}
foreach($arSecForLoad as $arSectionsLoad){
    $APPLICATION->IncludeComponent (
    "tezart:catalog.smart.filter.addon",
        "",
        Array(
            "IBLOCK_TYPE" => "Каталог товаров",
            "IBLOCK_ID" => 53,
            "SECTION_ID" => $arSectionsLoad,
            "FILTER_NAME" => "arrFilter",
            "PRICE_CODE" => "Московский филиал",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "CACHE_GROUPS" => "N",
            "SAVE_IN_SESSION" => "Y",
            "INSTANT_RELOAD" => "Y",
            "XML_EXPORT" => "Y",
            "SECTION_TITLE" => "NAME",
            "SECTION_DESCRIPTION" => "DESCRIPTION",
            "HIDE_NOT_AVAILABLE" => "N"
        ),
        $component
    );
}?>    

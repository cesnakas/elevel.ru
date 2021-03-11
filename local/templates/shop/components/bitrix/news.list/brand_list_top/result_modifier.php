<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$arSelect = Array("ID", "NAME", "CODE");
$arFilter = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->Fetch())
{
    if($ob["NAME"] != "€”даленные бренды"){   
        $check[$ob["NAME"]{0}][$ob["CODE"]] = $ob["NAME"];
    }
} 
$arResult["items"] = $check;

foreach($arResult["items"] as $key=>$item){
    $pattern = "/[a-zA-Z]/"; 
    if(preg_match($pattern, $key) && !in_array($key, $arResult["eu"])){
        $arResult["eu"][] = $key;    
    }    
    $pattern = "/[0-9]/"; 
    if(preg_match($pattern, $key) && !in_array($key, $arResult["eu_num"])){
        $arResult["eu_num"][] = $key;    
    }
    $pattern = "/[а-€Єј-я®]/"; 
    if(preg_match($pattern, $key) && !in_array($key, $arResult["ru"])){
        $arResult["ru"][] = $key;     
    } 
} 
asort($arResult["eu"]);
asort($arResult["eu_num"]);
asort($arResult["ru"]);
?>

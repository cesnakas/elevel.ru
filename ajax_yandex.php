<?
/*require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");





set_time_limit(0);
CModule::IncludeModule("iblock");

$arSelect = array(
                "ID",
                "PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL",
                "PROPERTY_OSTATOK_EKATERINBURG",
                "PROPERTY_OSTATOK_NOVOSIBIRSK",
                "PROPERTY_OSTATOK_ROSTOV",
                "PROPERTY_OSTATOK_SANKT_PETERBURG");
                
$arFilter = Array("IBLOCK_ID"=>53);

#$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10000000), $arSelect);
#while($ob = $res->GetNext())
{
    $arSelectSETPROP = array(
                "FLAG_AVAILABLE_OSTATOK_MOSKOVSKIY_FILIAL" => (empty($ob["PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL_VALUE"]) || ($ob["PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_EKATERINBURG" => (empty($ob["PROPERTY_OSTATOK_EKATERINBURG_VALUE"]) || ($ob["PROPERTY_OSTATOK_EKATERINBURG_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_NOVOSIBIRSK" => (empty($ob["PROPERTY_OSTATOK_NOVOSIBIRSK_VALUE"]) || ($ob["PROPERTY_OSTATOK_NOVOSIBIRSK_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_ROSTOV" => (empty($ob["PROPERTY_OSTATOK_ROSTOV_VALUE"]) || ($ob["PROPERTY_OSTATOK_ROSTOV_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_SANKT_PETERBURG" => (empty($ob["PROPERTY_OSTATOK_SANKT_PETERBURG_VALUE"]) || ($ob["PROPERTY_OSTATOK_SANKT_PETERBURG_VALUE"]== 0))? 0: 1); 

    $ELEMENT_ID = $ob["ID"];
    #CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, $arSelectSETPROP);
}

set_time_limit(0);
CModule::IncludeModule("iblock");

$arSelect = array(
                "ID",
                "PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL",
                "PROPERTY_OSTATOK_EKATERINBURG",
                "PROPERTY_OSTATOK_NOVOSIBIRSK",
                "PROPERTY_OSTATOK_ROSTOV",
                "PROPERTY_OSTATOK_SANKT_PETERBURG");
                
$arFilter = Array("IBLOCK_ID"=>53);

#$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10000000), $arSelect);
#while($ob = $res->GetNext())
{
    $arSelectSETPROP = array(
                "FLAG_AVAILABLE_OSTATOK_MOSKOVSKIY_FILIAL" => (empty($ob["PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL_VALUE"]) || ($ob["PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_EKATERINBURG" => (empty($ob["PROPERTY_OSTATOK_EKATERINBURG_VALUE"]) || ($ob["PROPERTY_OSTATOK_EKATERINBURG_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_NOVOSIBIRSK" => (empty($ob["PROPERTY_OSTATOK_NOVOSIBIRSK_VALUE"]) || ($ob["PROPERTY_OSTATOK_NOVOSIBIRSK_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_ROSTOV" => (empty($ob["PROPERTY_OSTATOK_ROSTOV_VALUE"]) || ($ob["PROPERTY_OSTATOK_ROSTOV_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_SANKT_PETERBURG" => (empty($ob["PROPERTY_OSTATOK_SANKT_PETERBURG_VALUE"]) || ($ob["PROPERTY_OSTATOK_SANKT_PETERBURG_VALUE"]== 0))? 0: 1); 

    $ELEMENT_ID = $ob["ID"];
    #CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, $arSelectSETPROP);
}



set_time_limit(0);
CModule::IncludeModule("iblock");

$arSelect = array(
                "ID",
                "PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL",
                "PROPERTY_OSTATOK_EKATERINBURG",
                "PROPERTY_OSTATOK_NOVOSIBIRSK",
                "PROPERTY_OSTATOK_ROSTOV",
                "PROPERTY_OSTATOK_SANKT_PETERBURG");
                $USER->Authorize(1);
$arFilter = Array("IBLOCK_ID"=>53);

#$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10000000), $arSelect);
#while($ob = $res->GetNext())
{
    $arSelectSETPROP = array(
                "FLAG_AVAILABLE_OSTATOK_MOSKOVSKIY_FILIAL" => (empty($ob["PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL_VALUE"]) || ($ob["PROPERTY_OSTATOK_MOSKOVSKIY_FILIAL_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_EKATERINBURG" => (empty($ob["PROPERTY_OSTATOK_EKATERINBURG_VALUE"]) || ($ob["PROPERTY_OSTATOK_EKATERINBURG_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_NOVOSIBIRSK" => (empty($ob["PROPERTY_OSTATOK_NOVOSIBIRSK_VALUE"]) || ($ob["PROPERTY_OSTATOK_NOVOSIBIRSK_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_ROSTOV" => (empty($ob["PROPERTY_OSTATOK_ROSTOV_VALUE"]) || ($ob["PROPERTY_OSTATOK_ROSTOV_VALUE"]== 0))? 0: 1,
                "FLAG_AVAILABLE_OSTATOK_SANKT_PETERBURG" => (empty($ob["PROPERTY_OSTATOK_SANKT_PETERBURG_VALUE"]) || ($ob["PROPERTY_OSTATOK_SANKT_PETERBURG_VALUE"]== 0))? 0: 1); 

    $ELEMENT_ID = $ob["ID"];
    #CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, $arSelectSETPROP);
}


*/
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arSelect = Array(
    "ID", 
    "IBLOCK_ID", 
    "IBLOCK_SECTION_ID", 
    "NAME", 
    "ACTIVE_FROM", 
    "TIMESTAMP_X", 
    "DETAIL_PAGE_URL", 
    "DATE_ACTIVE_FROM",
    "LIST_PAGE_URL",
    "DETAIL_TEXT",
    "PREVIEW_TEXT",
    "PREVIEW_PICTURE",
    "SORT",
    "CODE",
    // "PROPERTY_SPEC",
    // "PROPERTY_ADDRESS",
    // "PROPERTY_TIMETABLE",
    // "PROPERTY_PHONES",
    // "PROPERTY_EMAIL",
    // "PROPERTY_METRO",
    // "PROPERTY_MAP_YANDEX",
    // "PROPERTY_MAP_SHEMA",
    // "PROPERTY_PICTURES",
    // "PROPERTY_TYPE_SHOP",
    // "PROPERTY_FORM_ID",
    // "PROPERTY_FORM_NAME",
    // "PROPERTY_PICKUP",
    // "PROPERTY_YANDEX_MAP",
    // "PROPERTY_YANDEX_MAP",
);
$arFilter = Array("IBLOCK_ID"=>60, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "!ID" => 1404850);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arFields['PROPERTIES'] = $ob->GetProperties();
    $arResult["ITEMS"][] = $arFields;
    
}

// echo "<pre>"; print_r($arElements); echo "</pre>";

if ( count($arResult["ITEMS"]) > 0){
    $cityId = intval($_GET["city"]);
    
    $arOrder = array("NAME" => "ASC");
    $arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'] , 'ACTIVE' => 'Y');
    $arSelect = array('ID', 'NAME' , 'SORT', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'UF_CITY_LAT', 'UF_CITY_LONG');
    $rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
    $arSections = array();
    
    while ($arSect = $rsSect->GetNext())
    {
        $arSect['NAME'] = trim($arSect['NAME']);
        $arSections[$arSect['ID']] = $arSect;
        $arResult['CITY_NAME'][$arSect['NAME']] = $arSect['ID'];
    }
    
    $arOrder = array("NAME" => "ASC");
    $arFilter = array('IBLOCK_ID' => 60 , 'ACTIVE' => 'Y');
    $arSelect = array('ID', 'NAME' , 'SORT', 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID', 'UF_CITY_LAT', 'UF_CITY_LONG');
    $rsSect = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
    
    while ($arSect = $rsSect->GetNext())
    {
        $arSect['NAME'] = trim($arSect['NAME']);
            // echo "111<pre>"; print_r(strtolower($arSect['NAME'])); echo "</pre>";
        $stopTrigger = false;
        foreach($arSections as &$arSect2){
            // echo "222<pre>"; print_r(strtolower($arSect2['NAME'])); echo "</pre>";
            if(strtolower($arSect['NAME']) == strtolower($arSect2['NAME'])){
                // echo "333<pre>"; print_r($arSect2['ID']); echo "</pre>";
                $arSect2['ID2'] = $arSect['ID'];
                $stopTrigger = true;
                break;
            }
        }
        
        if($stopTrigger)
            continue;
        
        $arSections[$arSect['ID']] = $arSect;
        $arResult['CITY_NAME'][$arSect['NAME']] = $arSect['ID'];
    }
    
    foreach($arResult["ITEMS"] as $num => $arItem){
        
        foreach($arSections as &$arSect2){
            if($arItem['IBLOCK_SECTION_ID'] == $arSect2['ID'] || $arItem['IBLOCK_SECTION_ID'] == $arSect2['ID2'])
                $arSect2["ELEM_ID"][] = $arItem['ID'];
        }
        
        // $arSections[$arItem['IBLOCK_SECTION_ID']]["ELEM_ID"][] = $arItem['ID'];
    }
    // echo "<pre>"; print_r($arSections); echo "</pre>";
    
    foreach($arSections as $num => $arSection){
        if($arSection['DEPTH_LEVEL'] > 1){
            if(array_key_exists($arSection['IBLOCK_SECTION_ID'], $arSections)){
                $arSections[$arSection['IBLOCK_SECTION_ID']]['SECTIONS'][] = $arSection;

                foreach($arSection['ELEM_ID'] as $elemId){
                    if(!in_array($elemId, $arSections[$arSection['IBLOCK_SECTION_ID']]['ELEM_ID']))
                        $arSections[$arSection['IBLOCK_SECTION_ID']]['ELEM_ID'][] = $elemId;
                }
            
            }
            
            unset($arSections[$num]);
        }
    }

    if (is_array($arSections) && !empty($arSections)){
        
        $active_city = false;
        
        foreach($arSections as $num => &$value){
            $count_items = count($value['ELEM_ID']);
            
            if ( $count_items > 0){
                $value['COUNT_ITEMS'] = $count_items;
                
                if (!$active_city)
                {
                    $active_city = $value["ID"];
                    $active_city_name = $value["NAME"];
                }
                elseif ($cityId && $value['ID'] == $cityId)
                {
                    $active_city = $cityId;
                    $active_city_name = $value["NAME"];
                }
                
                
            }
            else{
                unset($arSections[$num]);
                continue;
            }
        }
    }    
    
    

    $arResult["ADDRESSES"] = $arSections;
    $arResult['OFFICE_ACTIVE'] = $active_city;
    $arResult['OFFICE_ACTIVE_NAME'] = $active_city_name;
}

$arResult['TABS'] = array();
$sections = array();

foreach( $arResult['ADDRESSES'] as $key => $arItem ):
    foreach( $arItem['ELEM_ID'] as $item ):
        $sections[ $item ] = $key;
    endforeach;
    $arResult['SECTIONS'][] = $key;
    $arResult['COORDS'][ 'map-partners-'.$key ][] = $arItem['UF_CITY_LAT'];
    $arResult['COORDS'][ 'map-partners-'.$key ][] = $arItem['UF_CITY_LONG'];
    
endforeach;

foreach( $arResult['ITEMS'] as $arItem ):    
// echo "<pre>"; print_r($arItem['ID'] . " " . $sections[ $arItem['ID'] ]); echo "</pre>";
    $arResult['TABS'][ $sections[ $arItem['ID'] ] ]['ITEMS'][] = $arItem;

    $arResult['ITEMS_MAP'][ 'map-partners-'.$sections[ $arItem['ID'] ] ][] = array(
        'ID'   => $arItem["ID"],
        'NAME'   => $arItem["NAME"],
        'ADDRESS'   => $arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"],
        'PHONES'   => $arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"],
        'EMAIL'   => $arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"],
        'TIMETABLE'   => $arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"],
        'COORDS'   => $arItem["PROPERTIES"]["YANDEX_MAP"]["VALUE"],
    );
endforeach;

// echo "<pre>"; print_r($arResult['ADDRESSES']); echo "</pre>";
uasort($arResult['ADDRESSES'], 'name_sort');
unset($arResult['ITEMS']);
<?
//if($USER->IsAdmin()){
    $brand_chis_en = $arResult["eu_num"];
    $brand_en = $arResult["eu"];
    $brand_ru = $arResult["ru"];
    $items = $arResult["items"];
/*}
else{
$chis = array("0", "2", "3", "4", "5", "6", "7", "8", "9", "1");

$arSelect = Array("PROPERTY_MANUFACTURER", "ID", "IBLOCK_ID");
$arFilter = Array("IBLOCK_CODE"=>"new_catalog");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
while($ob = $res->Fetch())
{
    $check[] = $ob["PROPERTY_MANUFACTURER_VALUE"];
}
$check = array_unique($check);   
                       
foreach ($arResult["ITEMS"] as $k=> $arSect){
    if (in_array($arSect["NAME"], $check)){
        $arResult["ITEMS"][$arSect["CODE"]] = $arSect["NAME"];       
        $arResult["ITEMS_MAIN"][$arSect["CODE"]] = $arSect["NAME"];
    }
}


sort($arResult["ITEMS"]);
usort($arResult["ITEMS_MAIN"]);

foreach ($arResult["ITEMS"] as $j=>$arIt) {
    
    $arResult["alfs"][$j] = mb_strcut($arIt, 0, 1);
}
foreach ($arResult["ITEMS_MAIN"] as $j=>$arIt) {
    
    $arResult["alfs1"][$j] = mb_strcut($arIt, 0, 1);
}
foreach ($arResult["alfs1"] as $lk=>$arItem){
    $items[$arItem][$lk] = $arResult["ITEMS_MAIN"][$lk];
}

$brand_name = array_unique($arResult["alfs"]);
foreach ($brand_name as $k=>$b) {
    if (in_array($b, $chis) && mb_detect_encoding($b) == "ASCII") {
        $brand_chis_en[$k] = $b;
    }    
    elseif (in_array($b, $chis) && mb_detect_encoding($b) == "UTF-8") {
        $brand_chis_ru[$k] = $b;
    }

    elseif(mb_detect_encoding($b) == "ASCII"){
        $brand_en[$k] = $b;
    }
    elseif (mb_detect_encoding($b) == "UTF-8") {
        $brand_ru[$k] = $b;
    }
}
}    */
?>
<div class="main_brands_list">
<div class="brands_name">
<span class="manufac">Производители</span>
    <div class="en_brand">
        <?foreach ($brand_en as $k=>$b_name):?>
            <span data-href="to_<?=$b_name;?>" class="b_name b_name"><?=$b_name;?></span>
        <?endforeach;?>        
        <?foreach ($brand_chis_en as $k=>$b_name):?>
            <span data-href="to_<?=$b_name;?>" class="b_name b_name_chis"><?=$b_name;?></span>
        <?endforeach;?>
        
    </div>    
    <div class="ru_brand">
        <?foreach ($brand_ru as $k=>$b_name):?>
            <span data-href="to_<?=$b_name;?>" class="b_name"><?=$b_name;?></span>
        <?endforeach;?>        
        <?foreach ($brand_chis_ru as $k=>$b_name):?>
            <span data-href="to_<?=$b_name;?>" class="b_name b_name_chis"><?=$b_name;?></span>
        <?endforeach;?>
    </div>
    <span class="to_en">A - Z</span>
    <span class="to_ru">А - Я</span>
</div>

<div class="brands_items">
<?$kj = 0;?>
    <?foreach($items as $k=>$arItem):?>
        
        <ul class="to_<?=$k;?>">    
        <div class="items_b">  
            <?foreach($arItem as $ky => $kyitem):?>
            <?
                //$cnt = array_search($ky,array_keys($arItem));
                $cnt = false;
                if ($cnt % 5 == 0):
            ?>
            </div>
            <div class="items_b">
            <?endif;?>
                <li><a href="/brands/<?=$ky;?>/"><?=$kyitem;?></a></li>
            <?endforeach;?>
            </div>
        </ul>
    <?endforeach;?>

</div>
</div>

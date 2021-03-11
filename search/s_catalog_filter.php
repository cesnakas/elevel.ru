<?
	CModule::IncludeModule("iblock");
	CModule::IncludeModule("catalog");
	CPageOption::SetOptionString("main", "nav_page_in_session", "N");            
    $select = Array("NAME");
    $filter = Array("IBLOCK_ID"=>"83", "PROPERTY_TRANSLITE_CODE" => urldecode(htmlspecialchars(urlencode($_GET['q']))));
    $result = CIBlockElement::GetList(Array(), $filter, false, false, $select);
    $searh_name = 0;
    if($items = $result->Fetch()){
        //echo "<pre>"; print_r($items); echo "</pre>";
        $_GET["q"] = $items["NAME"];
        $searh_name = 1;
    }

    $iPriceID = CGeoRegions::GetPriceIDByUser();
    $iPriceID = ($iPriceID + 1);

    if ($iPriceID > 8) {
        $iPriceID = 3;
    }

    $sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
    $sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);


    $arSelect = Array(
        'ID',
        'NAME',
        'DETAIL_PAGE_URL',
        'PROPERTY_*',
        'PROPERTY_CML2_ARTICLE',
        'CATALOG_QUANTITY',
        'PROPERTY_UPAKOVKA',
        'PROPERTY_POINT',
        'PROPERTY_MAIN_PHOTO',
        'PROPERTY_CAN_BUY',
        'PRICES',
        'CATALOG_GROUP_' . $iPriceID,
        "PROPERTY_SPETS_SKIDKA", 
        "PROPERTY_KATEGORIYA_3"
    );
	$arSelect_2 = array("ID", "IBLOCK_SECTION_ID");
	
    $arrFilter_main = Array(
        "IBLOCK_ID" => "83",
        "ACTIVE"=>"Y",
    );   
     $arrFilter = Array(
        "IBLOCK_ID" => "83",
        "ACTIVE"=>"Y",
        "PROPERTY_MARKING_PRODUCER" => "%".$_GET["q"]."%",    
    );
    
    
    $arrFilter3 = Array(
        "IBLOCK_ID" => "83",
        "ACTIVE"=>"Y",
        "?SEARCHABLE_CONTENT" => $_GET["q"],
    );


    if($_GET['filter'] == 'cnt') {
            $arrFilter[ ">CATALOG_QUANTITY"]  = 0;
            $arrFilter3[ ">CATALOG_QUANTITY"]  = 0;
            $arrFilter_main[ ">CATALOG_QUANTITY"]  = 0;
    }
    if ($_GET["filter_items"] == "new") {
        $arrFilter["PROPERTY_KATEGORIYA_3"] = array("N");
        $arrFilter3["PROPERTY_KATEGORIYA_3"] = array("N");
        $arrFilter_main["PROPERTY_KATEGORIYA_3"] = array("N");
    }
    if ($_GET["filter_items"] == "discount") {
        $arrFilter[">PROPERTY_SPETS_SKIDKA"] = 0;
        $arrFilter3[">PROPERTY_SPETS_SKIDKA"] = 0;
        $arrFilter_main[">PROPERTY_SPETS_SKIDKA"] = 0;
    }
    $cnt = 30;
    if ($_GET["count"] == 50) {
        $cnt = 50;
    }    
    if ($_GET["count"] == 100) {
        $cnt = 100;
    }    
    if ($_GET["count"] == 500) {
        $cnt = 500;
    }
    
    $sort = "";
    $by = "ASC";
    if ($_GET["by"] == "DESC") {
        $by = "DESC";
    }
    if ($_GET["sort"] == "price") {
        $sort = "catalog_PRICE_3";
    }
    else if ($_GET["sort"] == "name"){
        $sort = "name";
    }  

	if ($searh_name  < 1){         
   	$res1 = CIBlockElement::GetList(
        false,
        $arrFilter,
        false,
        Array("nPageSize"=>$cnt),
        $arSelect_2
    ); 
            

		             
    $res3 = CIBlockElement::GetList(
        false,
        $arrFilter3,
        false,
        false,
        $arSelect_2
    ); 
      
    
   $prodcut_ids = array();
   while ($q1 = $res1->Fetch()){
	   $prodcut_ids[] = $q1["ID"];
   } 
       
   while ($q3 = $res3->Fetch()){
	   $prodcut_ids[] = $q3["ID"];
   }     
   
   
   array_unique($prodcut_ids);
   if (count($prodcut_ids) < 1) {
	   $prodcut_ids = 0;
   }
   $arrFilter_main["ID"] = $prodcut_ids;
   
   
   }
   else {
	  $arrFilter_main["?SEARCHABLE_CONTENT"] = $_GET["q"];
   }   
   	$res = CIBlockElement::GetList(
        Array($sort => $by),
        $arrFilter_main,
        false,
        Array("nPageSize"=>$cnt),
        $arSelect
    );   
   
   $res_sect = CIBlockElement::GetList(
        false,
        $arrFilter_main,
        array("IBLOCK_SECTION_ID"),
        false,
        $arSelect_2);

$i=0;
$c=0;
$sects = array();
while($obj = $res_sect->Fetch()) {
	$count_elements += intval($obj["CNT"]);
	$sects[$obj["IBLOCK_SECTION_ID"]] = intval($obj["CNT"]);
}                            

foreach ($sects as $k=>$s) {
    $arSelect = Array("ID", "IBLOCK_CODE", "NAME", "DETAIL_PAGE_URL", "DEPTH_LEVEL", "SECTION_ID", "CODE", "IBLOCK_SECTION_ID");
    $arFilter = Array("IBLOCK_ID" => "83", "ACTIVE" => "Y", "ID"=> $k);
    $res4 = CIBlockSection::GetList(Array("DEPTH_LEVEL" => "ASC"), $arFilter, array("CNT_ACTIVE"=>"Y"), $arSelect);
    $i++;
    while($ob3 = $res4->Fetch()){
        $ob3["TOTAL"] = $s;
        $i++;
        
        if (intval($ob3["DEPTH_LEVEL"]) > 1) {
                $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "DEPTH_LEVEL", "SECTION_ID", "CODE", "IBLOCK_SECTION_ID");
                $arFilter = Array("IBLOCK_ID" => "83", "ACTIVE" => "Y", "ID"=> $ob3["IBLOCK_SECTION_ID"]);
                $res5 = CIBlockSection::GetList(Array("DEPTH_LEVEL" => "ASC"), $arFilter, false, $arSelect);
                while ($ob4 = $res5->Fetch()) {
                    $ob3["PARENT_CODE"] = $ob4["CODE"];
                }
        } 
        $all_sects[] = $ob3;
    }  
}

foreach ($all_sects as $k=>$v) {
    if ($v["PARENT_CODE"]) {
        $url = $v["PARENT_CODE"]."/";
    }
    else {
        $url = "";
    }
	$all_sects[$k]["DETAIL_PAGE_URL"] = "/shop/".$url.$v["CODE"]."/?search=".$_GET["q"]; 
    
}
$all_s = array();

foreach ($all_sects as $key=>$value) {
    if (intval($value["DEPTH_LEVEL"]) == 1) {
        $all_s[$value["ID"]]["PARENT"] = $value;
    }	
    elseif ($value["IBLOCK_SECTION_ID"]){
        $id = $value["IBLOCK_SECTION_ID"];
		$all_s[$id]["PARENT"]["TOTAL"] += $value["TOTAL"];
        $all_s[$id]["CHILDREN"][] = $value;
        
    }

}
if ($count_elements < 1) {
	$count_elements = 0;
}
?>
<?if ($count_elements > 0):?>  
<?/*
<div class="searcheble">
    <p>Найдено в категориях:</p>
    <ul>
    <?foreach ($all_s as $arSect):?>
        <li class="parent">
       <?if ($arSect["PARENT"]["NAME"] != ""):
       $margin = "style='margin-left:20px;'";
       ?>
        <a href="<?=$arSect["PARENT"]["DETAIL_PAGE_URL"];?>"><?=$arSect["PARENT"]["NAME"];?></a> <span>(<?=$arSect["PARENT"]["TOTAL"];?>)</span>
        <?else:?>
       	<?$margin = "";?>
       	<?endif;?>
       <?if ($arSect["CHILDREN"]):?>
            <ul class="children">
            <?foreach($arSect["CHILDREN"] as $arChil):?>
                <li <?=$margin;?>><a href="<?=$arChil["DETAIL_PAGE_URL"];?>"><?=$arChil["NAME"];?></a> <span>(<?=$arChil["TOTAL"];?>)</span></li>
            <?endforeach;?>
            </ul>
        <?endif;?>  
       </li>
       <?endforeach;?>
    </ul>
</div>
*/?>
<div class="searcheble">
	<p>
	Найдено <span id="count_page">0</span> <span class="s_cataglo_query">&ldquo;<?=htmlspecialcharsex($_GET["q"]);?>&rdquo;</span>
	</p>
    <p>В категориях:</p>
    <ul class="tz_s_categories">
    <?foreach ($all_s as $arSect):?>
    	<?if ($arSect["PARENT"]["NAME"] != ""):?>
        	<li class="parent">	        
        		<a href="<?=$arSect["PARENT"]["DETAIL_PAGE_URL"];?>"><?=$arSect["PARENT"]["NAME"];?></a> <span>(<?=$arSect["PARENT"]["TOTAL"];?>)</span>       		
       		</li>
       <?endif;?>
        <?if ($arSect["CHILDREN"]):?>
	       <?foreach($arSect["CHILDREN"] as $arChil):?>
       			<li class="parent"><a href="<?=$arChil["DETAIL_PAGE_URL"];?>"><?=$arChil["NAME"];?></a> <span>(<?=$arChil["TOTAL"];?>)</span></li>
	       <?endforeach;?>
        <?endif;?>         
       <?endforeach;?>
    </ul>
</div>
<div class="border">&nbsp;</div>              
<div class="sortings">
<form id="filter_cnt_form" method="GET">
    <label for="filter_sort111" class="drop_arr">
    Показать
                    <select id="filter_sort111" name="filter_items">
                        <?if ($_GET["filter_items"] == "new"):?>
                            <option value="new">Новинки</option>
                            <option class="chng" value="all">Все</option>
                            <option class="chng" value="discount">Акции</option>
                        <?endif;?>
                        <?if ($_GET["filter_items"] == "discount"):?>
                            <option value="discount">Акции</option>
                            <option class="chng" value="all">Все</option>
                            <option class="chng" value="new">Новинки</option>
                        <?endif;?>
                        <?if ($_GET["filter_items"] != "new" && $_GET["filter_items"] != "discount"):?>
                            <option value="all">Все</option>
                            <option class="chng" value="new">Новинки</option>
                            <option class="chng" value="discount">Акции</option>
                        <?endif;?>                    
                    </select>
    </label>        
                     <label for="filter_sort" class="drop_arr">
                    Сортировать по
                    <select name="sort" id="filter_sort" >
                        <?if ($_GET["sort"] == "name" || $_GET["sort"] == ""):?>
                        <option value="name">Наименованию</option>
                        <option value="price" class="chng">Цене</option>
                        <?elseif ($_GET["sort"] == "price"):?>
                            <option value="price">Цене</option>
                            <option value="name" class="chng">Наименованию</option>
                        <?endif;?>
                        </select>
                        </label>
    <?if($_GET["by"] == "DESC"):?>
        <img src="/i/change22.png" class="change_img">
        <input type="hidden" value="DESC" name="by">
    <?else:?>
        <img src="/i/change.png" class="change_img">
        <input type="hidden" value="ASC" name="by">
    <?endif;?>
<input type="checkbox" name="filter" <?if($_GET['filter'] == 'cnt'):?>checked="checked" <?endif;?>id="filter_cnt_checkbox" value="cnt" /> 
<label for="filter_cnt_checkbox">
<input type="hidden" name="q" value="<?=htmlspecialcharsEx($_GET['q']);?>"/> 
 <span>Только в наличии</span></label>

    <label for="filter_counts" class="drop_arr">
        Кол-во товаров на странице
        <select name="count" id="filter_counts">
            <?if ($_GET["count"]):?>
                <option value="<?=htmlspecialcharsEx($_GET["count"]);?>"><?=htmlspecialcharsEx($_GET["count"]);?></option>
            <?endif;?>
          <option value="30">30</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <option value="500">500</option>
        </select>
    </label>
    <div style="float:right; margin-right: 10px;">
        <?if ($_GET["view"] != "grid"):?>
            <img src="/i/setka.png" class="on_chan">
            <img src="/i/spisok_sel.png">
            <input type="hidden" value="list" name="view">
        <?else:?>
            <img src="/i/setka_sel.png">
            <img src="/i/spisok.png" class="on_chan">
            <input type="hidden" value="grid" name="view">       
        <?endif;?>
    </div>
</form>
</div>
<?if ($_GET["view"] != "grid"):?>
<table id="goods-list" class="table2">
    <tr>
        <th>
            <div class="crl">Наименование</div>
        </th>
        <th class="center" nowrap title="Артикул">
            <div>Артикул</div>
        </th>
        <th class="center" nowrap title="Количество изделий в одной упаковке">
            <div>в уп.</div>
        </th>
        <th class="center" nowrap title="Единицы измерения">
            <div>ед.</div>
        </th>
        <? if ($bShowGeoCount): ?>
        <th class="count">
            <div></div>
        </th>
        <? else: ?>
        <th class="count">
            <div></div>
        </th>
        <? endif ?>

        <th class="price center">
            <div>Цена (руб.)</div>
        </th>
        <th class="center" title="Количество заказываемых позиций">
            <div>кол-во</div>
        </th>
        <th class="center" title="Добавить в корзину">
            <div class="crr">&nbsp;</div>
        </th>
    </tr>

<?endif;?>

    

<?


$j=0;
    while ($ob = $res->GetNextElement()) {
    	
    $j++;
        $arFields = $ob->GetFields();
        if (!in_array($arFields["ID"],$box2)){
            $box2[] = $arFields["ID"];
			
        //CIBlockPriceTools::CanBuy(10, $arResult["PRICES"], $arItem);
        $price = CPrice::GetBasePrice($arFields['ID']);
      //  print_r($arFields); die;
      $arProperties = $ob->GetProperties();     
      /*$arFields["CATALOG_QUANTITY"] = $arProperties["PROPERTIES"]["OSTATOK_MOSKOVSKIY_FILIAL"]['VALUE'] + 
                                $arProperties["PROPERTIES"]["OSTATOK_SANKT_PETERBURG"]['VALUE'] +
                                $arProperties["PROPERTIES"]["OSTATOK_EKATERINBURG"]['VALUE'] +
                                $arProperties["PROPERTIES"]["OSTATOK_NOVOSIBIRSK"]['VALUE'] +
                                $arProperties["PROPERTIES"]["OSTATOK_ORENBURG"]['VALUE'] +
                                $arProperties["PROPERTIES"]["OSTATOK_ROSTOV"]['VALUE'];*/
        ?>

        <?if ($_GET["view"] != "grid" && intval($price['PRICE']) > 0):?>
        <tr>
            <td class="name table-element-name">
                <?if ($arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0 || $arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D"):?>
                        <div class="table-stickers-conteiner">
                            <img src="/img/sale_act.png">
                        </div> 
                <?endif;?>
                <a class="h5" href="<?= $arFields['DETAIL_PAGE_URL']?>"><?=$arFields['NAME'];?></a>
            </td>
            <td align="center" class="alt"><?=$arFields['PROPERTY_CML2_ARTICLE_VALUE'];?></td>
            <td align="center"><?=$arFields['PROPERTY_UPAKOVKA_VALUE'];?></td>
            <td align="center" class="alt"><?=$arFields['PROPERTY_POINT_VALUE'];?></td>

            <td class="count" align="center">
                <?
                //print_r($arFields);die;
                ?>
                <? if ($arFields['CATALOG_QUANTITY'] > 0): ?>
                <span class="counts can_b">На складе</span>
                <div class="uved" style=" display: none;">Товар в наличии, необходимое количество уточняйте у
                    менеджера
                </div>
                <? else: ?>
                <span class="counts" style="height: 38px;">Под заказ от 1 недели</span>
                <div class="uved" style="display: none;">Сроки поставки уточняйте у менеджеров</div>
                <?endif;?>
               
            </td>


            <td class="price" align="center">
                    <?
                        $dis = $arFields["PROPERTY_SPETS_SKIDKA_VALUE"];
                        $price['PRICE'] = round($price['PRICE'] - ($price['PRICE']*(100+$dis) / 100 - $price['PRICE']), 2);
                    ?>
                <?$old = GetCatalogProductPrice($arFields["ID"], "10");
                $old_price = $old["PRICE"];?>               
                <p class="pr2">
                    <?if(($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0)&& $old_price > $price['PRICE']){?><span style="color:#eb2525;font-weight:bold;"><?}?>
                    <?=$price['PRICE'];?> .руб 
                    <?if(($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0)&& $old_price > $price['PRICE']){?></span><?}?>
                </p> 
                <? if(($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0)&& $old_price > $price['PRICE']){?>
                    <p class="pr2_old"><span style="text-decoration: line-through;"><?=$old_price?> .руб</span></p>
                <?}?>
            </td>

            <td align="center">


                <div class="block61">
                    <input type="text" value="1" name="good_id_<?=$arFields['ID']?>" id="good_id_<?=$arFields['ID']?>">
                    <img width="7" height="7" class="dec7" ids="good_id_<?=$arFields['ID']?>" alt="" src="/i/pix.gif">
                    <img width="7" height="7" class="inc7" ids="good_id_<?=$arFields['ID']?>" alt="" src="/i/pix.gif">
                </div>


            </td>

            <td align="center">
                <a class="bsk18" href="?action=ADD2BASKET&id=<?=$arFields['ID']?>"
                   alt="Добавить <?=$arFields['NAME'];?> в корзину" title="Добавить <?=$arElement['NAME'];?> в корзину">
                    <img alt="" src="/i/bsk18a.gif"><img class="pic154" alt="" src="/i/pic154b.gif"></a>
            </td>
        </tr>
        <?elseif (intval($price['PRICE']) > 0):?>
        <div class="view-item">
                <div class="stickers big-stick"> 
                    <?/*if ($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "W" || $arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D"):?>
                        <img src="/img/sale.png">
                    <?endif;*/?>
                    <?if ($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "N"):?>
                         <img src="/img/new_s.png">
                    <?endif;?>
                    <?if (intval($arFields["PROPERTY_SPETS_SKIDKA_VALUE"]) > 0 || $arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D"):?>
                    <?
                        if (intval($arFields["PROPERTY_SPETS_SKIDKA_VALUE"]) > 0){
                            $dis = $arFields["PROPERTY_SPETS_SKIDKA_VALUE"];
                            $price['PRICE'] = round($price['PRICE'] - ($price['PRICE']*(100+$dis) / 100 - $price['PRICE']), 2);
                        }
                    ?>
                        <img src="/img/sale_act.png">   <!-- akc.png -->
                    <?endif;?>
                </div>
             <span class="art"><?if ($arFields['PROPERTY_CML2_ARTICLE_VALUE']):?>Артикул:<?endif;?><?=$arFields['PROPERTY_CML2_ARTICLE_VALUE'];?></span>
             <a href="<?= $arFields['DETAIL_PAGE_URL']?>">
                <?if (CFile::MakeFileArray($arFields['PROPERTY_MAIN_PHOTO_VALUE'])):?>
                    <div class="photo_block"><img style="margin-left: 45px;" class="photo" src="<?=$arFields["PROPERTY_MAIN_PHOTO_VALUE"];?>" title="<?=$arFields['NAME'];?>"></div>
                <?else:?>
                    <div class="photo_block"><img style="margin-left: 45px;" class="photo" src="/i/no-photo.jpg" title="<?=$arFields["NAME"];?>" /></div>
                <?endif;?>
                <span class="view-name"><?=$arFields['NAME'];?></span>
            </a>
                <div class="viewed_price_block">
                <? if ($arFields['CATALOG_QUANTITY'] > 0): ?>
                    <span class="can_b">В наличии</span>
                    <? else: ?>
                    <span class="can_b can_b_n">Под заказ</span>
                <?endif;?>
                <?
                    $old = GetCatalogProductPrice($arFields["ID"], "10");
                    $old_price = $old["PRICE"];
                ?>                
                <span class="viewed_price">
                    <? if(($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0) && $old_price > $price['PRICE']){?><span class="red-price-with-old"><?}?>
                        <?=$price['PRICE'];?> руб.
                    <? if(($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0)&& $old_price > $price['PRICE']){?></span><?}?>
                    <?if ($old_price > $price['PRICE'] && (intval($arFields["PROPERTY_SPETS_SKIDKA_VALUE"]) > 0 || $arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D")):?>
                        <br><s style="font-size: 12px;color: #8f8f8f;"><?=$old_price;?></s>
                    <?endif;?>
                </span>
                </div>
                <a href="?action=ADD2BASKET&id=<?=$arFields['ID']?>" alt="Купить" title="Купить" onclick="return false" class="basket_viewed"><img style="display:inline;height:auto;margin:0px;position: relative;top: -5px;" src="/i/basket_icon.png"><span>Купить</span></a>
                <div class="basket_basket" style="display: none;"><span>Уже в</span> <a href="/personal/basket.php">корзине</a></div>
            
        </div>
        <?endif;?>
        <?
        }
    }

    ?>
</table>
<div class="pagenavigation" id="new_lala">
    <?
    $res->NavStart($cnt);
    echo $res->NavPrint("События", false, "tablebodytext",
        "/navigation/search_nav.php");
    ?>
</div>
<?endif;?>

    <script>
        $('#count_page').html('<?=$count_elements;?>');

    </script>
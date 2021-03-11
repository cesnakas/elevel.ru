<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Товары со скидкой");


CModule::IncludeModule("search");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");

CPageOption::SetOptionString("main", "nav_page_in_session", "N");
?>
<?
    $iPriceID = CGeoRegions::GetPriceIDByUser();
    $iPriceID = ($iPriceID + 1);

    if ($iPriceID > 8) {
        $iPriceID = 3;
    }

    $sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
    $sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);

     if(!isset($_COOKIE['town']))
	 {
		$curr_city = MSK_CODE;
	 }
	 else
	 {
		$curr_city = $_COOKIE['town'];
	 } 
	 
	 
	switch ($curr_city){
		case MSK_CODE : case KZN_CODE: case PSH_CODE: case SHL_CODE: case DMT_CODE: case SRG_CODE: case NGN_CODE: case ELS_CODE: $price_prop = "OSTATOK_MOSKOVSKIY_FILIAL"; break;
 		case EKT_CODE : $price_prop = "OSTATOK_EKATERINBURG"; break;
 		case NVS_CODE : $price_prop = "OSTATOK_NOVOSIBIRSK"; break;
 		case RST_CODE : $price_prop = "OSTATOK_ROSTOV"; break;
 		case SPB_CODE : $price_prop = "OSTATOK_SANKT_PETERBURG"; break;
	}

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
        "PROPERTY_KATEGORIYA_3",
        "IBLOCK_SECTION_ID",
        "PROPERTY_".$price_prop
    );

    $arrFilter = Array(
        "IBLOCK_CODE" => "new_catalog",
        "ACTIVE_DATE"=>"Y",
        "ACTIVE"=>"Y",
        ">PROPERTY_SPETS_SKIDKA" => 0
        );
    if($_GET['filter'] == 'cnt') {

			$arrFilter[">PROPERTY_".$price_prop]  = 0;
          //  $arrFilter[ ">CATALOG_QUANTITY"]  = 0;
            
            
            
    }
    if($_GET["SECTION_ID"] > 0) {
        $arrFilter["SECTION_ID"] = $_GET["SECTION_ID"];
        
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
    $cnt = $cnt * 2;
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
    
    $res = CIBlockElement::GetList(
        Array($sort => $by),
        $arrFilter,
        false,
        Array("nPageSize"=>$cnt),
        $arSelect);    
        
        
    $arSelect1 = Array(
            "IBLOCK_SECTION_ID"
        );

    $arrFilter1 = Array(
        "IBLOCK_CODE" => "new_catalog",
        "ACTIVE_DATE"=>"Y",
        "ACTIVE"=>"Y",
        ">PROPERTY_SPETS_SKIDKA" => 0
        );

    $res1 = CIBlockElement::GetList(
        Array(),
        $arrFilter1,
        false,
        Array("nPageSize"=>9999),
        $arSelect1);
        while ($all_items = $res1->Fetch()) {
            /*Котики*/ $cats[] = $all_items["IBLOCK_SECTION_ID"];
        }
        


        $arFilterCat_2 = Array(
            'IBLOCK_CODE' => "new_catalog",
            "ID" => $cats
        );
        $arList_2 = CIBlockSection::GetList(
            Array("NAME" => "ASC"),
            $arFilterCat_2,
            false,
            array("NAME", "CODE", "ID", "PICTURE", "IBLOCK_ID")
        );
        $b = 0;
        while($arListResult = $arList_2->GetNext()) 
        {
            if ($arListResult["ID"] == $_GET["SECTION_ID"]) {                   
                    $arListResult["ACTIVE"] = "Y";
                }
            $arListResult["PICTURE"] = CFile::GetPath($arListResult['PICTURE']);
            $new_cat[] = $arListResult; 

        }
        

?>
<script>
$(document).ready(function(){
        $("#filter_cnt_checkbox, #filter_cnt_form select").live("change",function(){
            $('#filter_cnt_form').submit();
        });
        $(".change_img").click(function(){
        var inp = $("input[name=by]").val();
        if (inp == "ASC") {
            $("input[name=by]").val("DESC");
        }
        else {
            $("input[name=by]").val("ASC");
        }
        $("#filter_cnt_form").submit();
    })    
    $(".on_chan").click(function(){        
        var inp = $("input[name=view]").val();
        if (inp == "grid") {
            $("input[name=view]").val("list");
        }
        else {
            $("input[name=view]").val("grid");
        }
        $("#filter_cnt_form").submit();
    })
})
</script>
<div class="search_text">
<h1>Товары со скидкой 30%, 50%, 70%</h1>
<ul id="sale_block_cats">
<?
    $b = 0;
?>
<?foreach($new_cat as $arSect):
$b++;
?>
<li> <a <?if($arSect["ACTIVE"] == "Y"):?>class="active_cat"<?endif;?>  href="/sale/sale.php?SECTION_ID=<?=$arSect["ID"];?>"><?=$arSect["NAME"];?></a> </li>

<?endforeach;?>
</ul>


<table width="100%">
<tbody>
<tr>
<td>
<div id="catalog">
<div class="border">&nbsp;</div>              
<div class="sortings">
<form id="filter_cnt_form" method="GET">
<input type="hidden" name="SECTION_ID" value="<?=htmlspecialchars($_GET["SECTION_ID"]);?>">
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
<input type="hidden" name="q" value="<?=htmlspecialcharsex($_GET['q']);?>"/> 
 <span>Только в наличии</span></label>

    <label for="filter_counts" class="drop_arr">
        Кол-во товаров на странице
        <select name="count" id="filter_counts">
            <?if ($_GET["count"]):?>
                <option value="<?=htmlspecialcharsex($_GET["count"]);?>"><?=htmlspecialcharsex($_GET["count"]);?></option>
            <?endif;?>
          <option value="30">30</option>
          <option value="50">50</option>
          <option value="100">100</option>
          <option value="500">500</option>
        </select>
    </label>
    <div style="float:right; margin-right: 10px;">
        <?if ($_GET["view"] == "grid"):?>
            <img src="/i/setka.png" class="on_chan">
            <img src="/i/spisok_sel.png">
            <input type="hidden" value="grid" name="view">
        <?else:?>
            <img src="/i/setka_sel.png">
            <img src="/i/spisok.png" class="on_chan">
            <input type="hidden" value="list" name="view">       
        <?endif;?>
    </div>
</form>
</div>
<?if ($_GET["view"] == "grid"):?>
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
        if($USER->IsAdmin()) {
            //echo "<pre>";print_r($arFields);echo "</pre>";
        }
        
		$arFields['CATALOG_QUANTITY'] = (isset($arFields["PROPERTY_".$price_prop."_VALUE"]) ? $arFields["PROPERTY_".$price_prop."_VALUE"] : '0');
       
        if (!in_array($arFields["ID"],$box2)){
            $box2[] = $arFields["ID"];
        if ($j == 1) {
           // echo '<pre>'; print_r($arFields); echo '</pre>';
        }
        //CIBlockPriceTools::CanBuy(10, $arResult["PRICES"], $arItem);
        $price = CPrice::GetBasePrice($arFields['ID']);
      //  print_r($arFields); die;
        ?>

        <?if ($_GET["view"] == "grid" && intval($price['PRICE']) > 0):?>
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
                <span class="counts">На складе</span>
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
                        $price['PRICE'] = round($price['PRICE'] - ($price['PRICE']*(100+intval($dis)) / 100 - $price['PRICE']), 2);
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
            <? if($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0){?>
                <div class="stickers big-stick"> 
                   <img src="/img/sale_act.png">
                </div>
            <?}?>
             <span class="art"><?if ($arFields['PROPERTY_CML2_ARTICLE_VALUE']):?>Артикул:<?endif;?><?=$arFields['PROPERTY_CML2_ARTICLE_VALUE'];?></span>
             <a href="<?= $arFields['DETAIL_PAGE_URL']?>">
                <?if (CFile::MakeFileArray($arFields['PROPERTY_MAIN_PHOTO_VALUE'])):?>
                    <div class="photo_block"><img style="margin-left: 45px;" class="photo" src="<?=str_replace(" ", "_", $arFields["PROPERTY_MAIN_PHOTO_VALUE"]);?>" title="<?=$arFields['NAME'];?>"></div>
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
                    <?if ($old_price > $price['PRICE'] && ($arFields["PROPERTY_KATEGORIYA_3_VALUE"] == "D" || $arFields["PROPERTY_SPETS_SKIDKA_VALUE"] > 0)):?>
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
    <script>
        $('#count_page').html('<?=$count_elements;?>');

    </script>
<div class="pagenavigation" id="new_lala">
    <?
    $res->NavStart($cnt);
    //echo $res->NavPrint('', true, 'text', '/navigation/catalog_nav_string.php');
    echo $res->NavPrint("События", false, "tablebodytext",
        "/navigation/search_nav.php");

    ?>
</div>
</div>
</td>
</tr>
</table>

</div>
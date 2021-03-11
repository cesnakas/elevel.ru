<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
// echo "<pre>";print_r($arResult["IPROPERTY_VALUES"]['SECTION_PAGE_TITLE']);echo "</pre>";
$APPLICATION->AddHeadString('<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>',true);
?>
<script type="text/javascript">
<?foreach($arResult["SPEC_COUNT"] as $spKey => $spItem):?>
    <?if($spItem == 0):?>         
        $('.contacts-spec-filter li').each(function(){
            if($(this).find('a').data('spec')=='<?=$spKey?>'){
                 $(this).remove();
            }
        })
    <?endif?>
<?endforeach?>
</script>

<?if(count($arResult['ITEMS']) == 1):?>
    <?$arItem = $arResult['ITEMS'][0];?>
    <?
        if(!empty($arItem["PROPERTIES"]["METRO"]["VALUE"])){
            $ic = "metro-ic";
            $name = $arItem["PROPERTIES"]["METRO"]["VALUE"];
        }
            
        else{
             $ic = "other-ic";
             $name = $arItem["NAME"];
        }
            
    ?>
    <ul class="office-list office-single">
        <li>
            <div class="office-desc office-desc-single">
                <div class="office-title-single list-title" data-coord="<?=$arItem["PROPERTIES"]["YANDEX_MAP"]["VALUE"]?>">
                    <span class="<?=$ic?>"></span><a class="office-name" href="javascript:void(0)"><?=$name?></a>
                    <?if(!empty($arItem["PROPERTIES"]["PICKUP"]["VALUE"])):?>
                    <span class="has-pickup">возможен самовывоз</span>
                    <?endif?>
                </div>
                <?if($arItem["PROPERTIES"]["SPEC"]["VALUE"]):?><div class="office-desc-bl office-desc-top"><?=$arItem["PROPERTIES"]["SPEC"]["VALUE"]?></div><?endif?>
                <div class="office-desc-bl">
                    <div class="office-desc-text">
                        <?if($arItem["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"]):?>
                            <b>Адрес:</b>
                            <p><?=htmlspecialchars_decode($arItem["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"])?></p>
                        <?endif?>    
                        <?if($arItem["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"]):?>
                            <b>Часы работы:</b>
                            <p><?=htmlspecialchars_decode($arItem["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"])?></p>
                        <?endif?>     
                        <?if($arItem["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]):?>
                            <b>Email:</b>
                            <p><?=htmlspecialchars_decode($arItem["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"])?></p>
                        <?endif?>     
                        <?if($arItem["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"]):?>
                            <b>Телефон:</b>
                            <p class="phones-desc"><?=htmlspecialchars_decode($arItem["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"])?></p>
                        <?endif?>
                    </div>
                    <div class="office-desc-other">
                        <?if(!empty($arItem["PROPERTIES"]["PICTURES"]["VALUE"])):?>
                        <div class="office-desc-photo">
                            <?//foreach($arItem["PROPERTIES"]["PICTURES"]["VALUE"] as $pic):?>
                            <?foreach($arItem["PREV_PICS"] as $pic):?>
                                <img src="<?=$pic?>">
                            <?endforeach?>
                        </div>
                        <?endif?>
                    </div>    
                </div>
                <div class="office-desc-more office-desc-bl"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробно</a></div>         
            </div>
        </li>
    </ul>
<?else:?>
<ul class="office-list">
<?
foreach($arResult['ITEMS'] as $arKey => $arItem){
  ?>
  <?
        if(!empty($arItem["PROPERTIES"]["METRO"]["VALUE"])){
            $ic = "metro-ic";
            $name = $arItem["PROPERTIES"]["METRO"]["VALUE"];
        }
            
        else{
             $ic = "other-ic";
             $name = $arItem["NAME"];
        }
            
    ?>
  <li> 
    <div class="office-title list-title" data-coord="<?=$arItem["PROPERTIES"]["YANDEX_MAP"]["VALUE"]?>">
        <span class="<?=$ic?>"></span><a class="office-name" href="javascript:void(0)" id="office_<?=$arKey?>"><?=$name?></a>
        <?if(!empty($arItem["PROPERTIES"]["PICKUP"]["VALUE"])):?>
        <span class="has-pickup">возможен самовывоз</span>
        <?endif?>
    </div>
    
    <div class="office-desc">
        <div class="office-title">
            <span class="<?=$ic?>"></span><a class="office-name" href="javascript:void(0)"><?=$name?></a>
            <?if(!empty($arItem["PROPERTIES"]["PICKUP"]["VALUE"])):?>
            <span class="has-pickup">возможен самовывоз</span>
            <?endif?>
        </div>
        <?if($arItem["PROPERTIES"]["SPEC"]["VALUE"]):?><div class="office-desc-bl office-desc-top"><?=$arItem["PROPERTIES"]["SPEC"]["VALUE"]?></div><?endif?>
        <div class="office-desc-bl">
            <div class="office-desc-text">
                <?if($arItem["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"]):?>
                    <b>Адрес:</b>
                    <p><?=htmlspecialchars_decode($arItem["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"])?></p>
                <?endif?>    
                <?if($arItem["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"]):?>
                    <b>Часы работы:</b>
                    <p><?=htmlspecialchars_decode($arItem["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"])?></p>
                <?endif?>     
                <?if($arItem["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]):?>
                    <b>Email:</b>
                    <p><?=htmlspecialchars_decode($arItem["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"])?></p>
                <?endif?>     
                <?if($arItem["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"]):?>
                    <b>Телефон:</b>
                    <p class="phones-desc"><?=htmlspecialchars_decode($arItem["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"])?></p>
                <?endif?>    
            </div>
            <div class="office-desc-other">
                <?if(!empty($arItem["PROPERTIES"]["PICTURES"]["VALUE"])):?>
                <div class="office-desc-photo">
                    <?//foreach($arItem["PROPERTIES"]["PICTURES"]["VALUE"] as $pic):?>
                    <?foreach($arItem["PREV_PICS"] as $pic):?>
                        <img src="<?=$pic?>">
                    <?endforeach?>
                </div>
                <?endif?>
            </div>    
        </div>
        <div class="office-desc-more office-desc-bl"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробно</a></div>
        <div class="show-on-map"><a class="show-office" data-id="<?=$arKey?>" href="javascript:void(0);">Показать на карте</a></div>  
    </div>
  </li>
  <?   
}
?>
<?endif?>
</ul>
</div>
</div>
<div id="ya_map_all" style="width: 100%; height: 100%; min-height: 810px;"></div>
<div id="container" class="container-main">
<div class="contact-box">


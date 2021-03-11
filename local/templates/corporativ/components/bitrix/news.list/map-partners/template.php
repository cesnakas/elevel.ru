<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$CityName = $obLocation->getCity();
$SelectCity = '';
?>
<?if ( count($arResult["TABS"]) > 0 && $arResult["ADDRESSES"] ):?>
    <?//$k = 1;?>
    <div class="text-shops">Магазины-партнеры в городе
        <div class="popup-holder">
            <a class="open" href=""><span class="inner">
                <?if( !empty ($arResult["TABS"][$arResult['CITY_NAME'][$CityName]]['ITEMS'] ) ):
                    $SelectCity = $CityName;                    
                else:
                    $SelectCity = 'Москва и Область';
                endif;
                echo $SelectCity;?>
            </span></a>
            <div class="popup">
                <div class="popup-inner">
                    <ul class="tabset-cities">
                        <?foreach($arResult["ADDRESSES"] as $i => $arAdr):?>
                            <?/*if ($k == 1):?>
            <a class="open" href=""><span class="inner"><?=$arAdr["NAME"]?></span></a>
            <div class="popup">
                <div class="popup-inner">
                    <ul class="tabset-cities">
                            <?endif;*/?>
                            
                            <li>                                
                                <a href="#tab-<?=$arAdr['ID']?>" data-elements="<?=implode("|", $arAdr["ELEM_ID"])?>" class="close-link select-city <?if ($SelectCity == $arAdr['NAME']):?>active<?endif;?>" data-addr="<?=$arAdr['ID']?>" title="<?=$arAdr['NAME']?>">
                                    <?=$arAdr['NAME']?>
                                </a>
                            </li> 
                            <?$k++;?>
                        <?endforeach?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="tabs-content">
    <?foreach( $arResult["TABS"] as $city_id => $Items ):?>
        <div id="tab-<?=$city_id?>">
            <div class="clearfix shops-columns">
                <div class="shops-column custom-scroll">
                    <ul class="list-shops accordion">
                    <?foreach($Items["ITEMS"] as $arItem):?>
                        <li>
                            <strong class="title"><?=$arItem["NAME"]?></strong>
                            <div class="accordion-slide">
                            <?if (!empty($arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"])):?>
                                <p><strong>Адрес:</strong> <?=$arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"]?></p>
                            <?endif?>    
                            <?if (!empty($arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"])):?>
                                <p><strong>Телефон:</strong> <?=$arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"]?> </p>
                            <?endif?>
                            <?if (!empty($arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"])):?>
                                <p><strong>Email:</strong> <?=$arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"]?></p>
                            <?endif?>
                            <?if (!empty($arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"])):?>
                                <p><strong>График работы:</strong> <?=$arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"]?></p>
                            <?endif?>
                            </div>
                            <a class="link-shops-map" href="">Показать на карте</a> <a class="accordion-open" href="">Раскрыть</a>
                        </li>
                    <?endforeach;?>
                    </ul>
                </div>    
                <div id="map-partners-<?=$city_id?>" class="map-partners-contact"></div>                
            </div>
        </div>
    <?endforeach;?>
    </div>

<?endif?>

<script type="text/javascript">
// map

jQuery(function(){
    if( $('#partners .map-partners-contact').length ){
        ymaps.ready(init_partners);
    }
});


function init_partners() {    
    var shopMaps = {};
    $('#partners .link-shops-map').each(function(){
        var link = $(this);
        var parent = link.closest('#partners .shops-columns').find('.map-partners-contact');

        link.on('click', function(e){
            e.preventDefault();
            var mapId = parent.attr("id");
            if (shopMaps.hasOwnProperty(mapId)){
                $('html,body').animate({
                    scrollTop: parent.offset().top},
                'slow');
                var item = shopMaps[mapId].geoObjects.get(link.closest("li").index());
                // Открываем/закрываем балун у метки.
                if (item.balloon.isOpen()) {
                    item.balloon.close();
                } else {
                    item.balloon.open(item.geometry.getCoordinates());
                }
            }
        });

    });
    var cities = <?=CUtil::PhpToJSObject($arResult['SECTIONS'])?>;
    var coords = <?=CUtil::PhpToJSObject($arResult['COORDS'])?>;
    var items = <?=CUtil::PhpToJSObject($arResult['ITEMS_MAP'])?>;    
    var elementsCounts = {};
        
    cities.forEach(function(val) { 
        elementsCounts['map-partners-' + val] = 0; 
    });
    
    console.log(items);
    for(var key in elementsCounts){
        var element = $('#' + key);
        elementsCounts[key] = element.length;
        
        var myMap = new ymaps.Map(key, {
                center: [ coords[key][0], coords[key][1] ],
                zoom: 8
            }
        );
                
        myMap.behaviors.disable('scrollZoom');
        
        for (x in items[key]){            
            var pick_coords = items[key][x].COORDS.split(',');
            
            myMap.geoObjects.add(            
                new ymaps.Placemark([ pick_coords[0], pick_coords[1] ], {
                        content: items[key][x].NAME,
                        balloonContent: '<strong>Название:</strong> ' + items[key][x].NAME + '<br/>'  
                        + '<strong>Адрес:</strong> ' + items[key][x].ADDRESS + '<br/>'  
                        + '<strong>Телефон:</strong> <br>' + items[key][x].PHONES + '<br/>'  
                        + '<strong>График работы:</strong> ' + items[key][x].TIMETABLE + '<br/>'  
                        + '<strong>Email:</strong> ' + items[key][x].EMAIL + '<br/><a class="print" href="<?=$APPLICATION->GetCurDir()?>print.php?id=' + items[key][x].ID + '"><img width="14" height="14" src="<?=SITE_TEMPLATE_PATH?>/images/printer.svg" alt=""/></a>'
                    },
                    {
                        iconLayout: 'default#image',
                        iconImageHref: '/includes/img/placeholder-orange.svg',
                        iconImageSize: [21, 29],
                        iconImageOffset: [-10, -15],
                        iconCaptionMaxWidth: '50'
                 })
                );            
        }
           shopMaps[key] = myMap;
        
    }
}
</script>
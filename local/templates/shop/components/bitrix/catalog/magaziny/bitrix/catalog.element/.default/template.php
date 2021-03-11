<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$APPLICATION->SetPageProperty("body_class", "feedback-page");

//echo "<pre>";print_r($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]);echo "</pre>";


if($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"] == '') $APPLICATION->SetPageProperty("title", $arResult["NAME"]);

if($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"] == '') {
	$elementPageTitle = $arResult["NAME"];
}else {
	$elementPageTitle = $arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"];
}

if($arResult["SECTION"]["NAME"] != "Пушкино" && $arResult["SECTION"]["NAME"] != "Щелково"){
    $url = 'http://export.yandex.ru/inflect.xml?name='.$arResult["SECTION"]["NAME"];
    $sxml = simplexml_load_file($url); 
    $sxml_arr = (array)$sxml; 
    $section_rp = iconv("UTF-8",'Windows-1251', $sxml_arr["inflection"][1]);  
    $section_pp = iconv("UTF-8",'Windows-1251', $sxml_arr["inflection"][5]);  
}
else{
    $section_rp = $arResult["SECTION"]["NAME"];
    $section_pp = $arResult["SECTION"]["NAME"];
}
    
?>
<section class="section-shop-address">
	<h1 class="headline-border"><?=$elementPageTitle?></h1>
	<div class="clearfix">
		<div class="map-block">
			<div id="map"></div>
			<ul class="list-shop-info">
				<li>
					<strong class="title"><?=$arResult["NAME"]?></strong>
					<?if($arResult["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"]):?>
						<?if($arResult["PROPERTIES"]["METRO"]["VALUE"]):?>м. <?=htmlspecialchars_decode($arResult["PROPERTIES"]["METRO"]["VALUE"])?><?endif?>
						<?=htmlspecialchars_decode($arResult["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"])?><br/>
					<?endif?>
					<?if($arResult["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"]):?>
						Телефон: <?=htmlspecialchars_decode($arResult["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"])?>
					<?endif?>
				</li>
				<li>
					 <?if($arResult["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"]):?>
						<strong class="title">Часы работы:</strong>
						<?=htmlspecialchars_decode($arResult["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"])?>
					<?endif?>
				</li>
				<li>
					<?if($arResult["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]):?>
						<strong class="title">Email:</strong>
						<a href="mailto:<?=strip_tags(htmlspecialchars_decode($arResult["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]))?>">
							<span itemprop="email">
								<?=strip_tags(htmlspecialchars_decode($arResult["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]))?>
							</span>
						</a>
					<?endif?>
				</li>
				<li>
					<?=$arResult['DETAIL_TEXT'];?>
				</li>
			</ul>
		</div>
		<?if($arResult["PROPERTIES"]["PICTURES"]["VALUE"]):?>
			<div class="shop-address-slider-holder">
				<div class="shop-address-slider">
					<?foreach($arResult["BIG_PICS"] as $pk => $pic):?>						
						<div class="slide">
							<div class="center">
								<img src="<?=$pic?>" alt=""/>
							</div>
						</div>
					<?endforeach?>
				</div>
				<div class="shop-address-slider-nav">
					<?foreach($arResult["PREV_PICS"] as $pk => $pic):?>				
						<div class="slide">
							<div class="center">
								<img width="195" height="147" src="<?=$pic?>" alt=""/>
							</div>
						</div>
					<?endforeach?>
				</div>
			</div>
		<?endif;?>
	</div>
</section>
<script type="text/javascript">
    $(document).ready(function(){              
    
		console.log("test");
        
        ymaps.ready(init);
        var myMap;

        function init(){     
            myMap = new ymaps.Map("map", {
                center: [<?=$arResult["PROPERTIES"]["YANDEX_MAP"]["VALUE"]?>],
                zoom: 14,
                controls: []
            });
 
			<? $balloonContent = array();
			$balloonContent[] = str_replace(array("\r","\n"), "", $arResult["NAME"]) . '<br/>';
			
			if($arResult["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"]):
				$bal = "";
				if($arResult["PROPERTIES"]["METRO"]["VALUE"]):
					$bal .= 'м. '. htmlspecialchars_decode($arResult["PROPERTIES"]["METRO"]["VALUE"]) . ', ';
				endif;
				
				$bal .= htmlspecialchars_decode($arResult["PROPERTIES"]["ADDRESS"]["VALUE"]["TEXT"]);
				
				$balloonContent[] = str_replace(array("\r","\n"), "", $bal);
				
				
			endif;
			
			if($arResult["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"]):
				$balloonContent[] = 'Телефон: ' . str_replace(array("\r","\n"), "", htmlspecialchars_decode($arResult["PROPERTIES"]["PHONES"]["VALUE"]["TEXT"]));
			endif;
			 if($arResult["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"]):
				$balloonContent[] = 'Часы работы: ' . str_replace(array("\r","\n"), "", htmlspecialchars_decode($arResult["PROPERTIES"]["TIMETABLE"]["VALUE"]["TEXT"]));
			endif;
			if($arResult["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]):
				$balloonContent[] = 'Email: ' . str_replace(array("\r","\n"), "", htmlspecialchars_decode($arResult["PROPERTIES"]["EMAIL"]["VALUE"]["TEXT"]));
			endif;
			
			$count_balloon = count($balloonContent);?>
			
            myPlacemark = new ymaps.Placemark([<?=$arResult["PROPERTIES"]["YANDEX_MAP"]["VALUE"]?>], { 
                    content: '<?=$arResult["NAME"]?>', 
                    balloonContent: <?foreach($balloonContent as $k => $string):?>'<?=$string?><br/>' <?if ($k < $count_balloon-1):?> + <?endif;?><?endforeach;?>
					
					<?// TODO вывод всей инфы по клику на иконку ?>
            },
            {
                iconLayout: 'default#image',
                iconImageHref: '/bitrix/templates/wt-elevel-contacts/images/contacts/ymap_icon.png',
                iconImageSize: [50, 55],
                iconImageOffset: [-19, -50]
            });    
            myMap.geoObjects.add(myPlacemark);
        }
        
    });
    
</script> 
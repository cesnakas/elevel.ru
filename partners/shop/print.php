<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>
<?CModule::IncludeModule("iblock");?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <title>Эlevel - электрика оптом и в розницу, интернет-магазин. Создание систем электроснабжения, освещения и автоматизации</title>
    <link media="all" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/reset.css">
    <link media="all" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/slick.css">
    <link media="all" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/selectric.css">
    <link media="all" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/jquery.fancybox.css">
    <link media="all" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/all.css">
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.8.3.min.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.placeholder.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.same.height.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.open-close.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.popup.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.selectric.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.custom-file-input.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.tabs.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jcf.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jcf.radio.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jcf.checkbox.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.fancybox.min.js" ></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/fancybox-media.js" ></script>
    <script src="https://api-maps.yandex.ru/2.1/?load=package.full&amp;lang=ru-RU" type="text/javascript"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.main.js" ></script>
    <!--[if IE]><script src="<?=SITE_TEMPLATE_PATH?>/js/ie.js"></script><![endif]-->
</head>
<body>
    <div class="row">
        <div class="page-print">
            <div class="header-print clearfix">
                <img class="logo-print" width="120" height="35" src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="Эlevel"/>
                <div class="buttons">
                    <a class="button" href="javascript:window.print();">Печать</a>
                </div>
            </div>
			<? $ID = intval($_GET["id"]);
			$res = CIBlockElement::GetList(array(), array("ID" => $ID, "IBLOCK_ID"=>array(OFFICES_PARTNERS_IBLOCK_ID,OFFICES_CONTACTS_IBLOCK_ID)), array("ID", "NAME", "IBLOCK_ID"));
			
			// $res = CIBlockElement::GetList(array(), array("ID" => $ID, array("LOGIC" => "OR", array("IBLOCK_ID" => 126), array("IBLOCK_ID" => 60))), array("ID", "NAME", "PROPERTY_ADDRESS", "PROPERTY_PHONES", "PROPERTY_EMAIL", "PROPERTY_TIMETABLE", "PROPERTY_YANDEX_MAP", "IBLOCK_ID"));
			// if($arItem = $res->GetNext())
			if($obItem = $res->GetNextElement())
			{
				$arItem = $obItem->GetFields();
				$arItem['PROPERTY'] = $obItem->GetProperties();

			?>
				<h1 data-coord="<?=$arItem["PROPERTY"]["YANDEX_MAP"]["VALUE"]?>"><?=$arItem["NAME"]?></h1>
				<ul>
					<?if ($arItem["PROPERTY"]["ADDRESS"]["~VALUE"]["TEXT"]):?>
						<li><h2>Адрес:</h2>  <?=$arItem["PROPERTY"]["ADDRESS"]["~VALUE"]["TEXT"]?></li>
					<?endif;?>
					
					<?if ($arItem["PROPERTY"]["PHONES"]["~VALUE"]["TEXT"]):?>
						<li><h2>Телефон:</h2>  <?=$arItem["PROPERTY"]["PHONES"]["~VALUE"]["TEXT"]?></li>
					<?endif;?>
					
					<?if ($arItem["PROPERTY"]["TIMETABLE"]["~VALUE"]["TEXT"]):?>
						<li><h2>График работы:</h2>  <?=$arItem["PROPERTY"]["TIMETABLE"]["~VALUE"]["TEXT"]?></li>
					<?endif;?>
					
					<?if ($arItem["PROPERTY"]["EMAIL"]["~VALUE"]["TEXT"]):?>
						<li><h2>Email:</h2>  <?=$arItem["PROPERTY"]["EMAIL"]["~VALUE"]["TEXT"]?></li>
					<?endif;?>
				</ul>
				<div class="map-contact" id="map"></div>
				
				<div class="contact-box" style="display: none;">
					<div class="office-desc">
						<div class="office-title">
							<strong>Название:</strong> <?=$arItem["NAME"]?>
						</div>
						<div class="office-desc-bl">
							<div class="office-desc-text">
							
								<?if (!empty($arItem["PROPERTY"]["ADDRESS"]["~VALUE"]["TEXT"])):?>
									<strong>Адрес:</strong> <?=$arItem["PROPERTY"]["ADDRESS"]["~VALUE"]["TEXT"]?><br/>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTY"]["PHONES"]["~VALUE"]["TEXT"])):?> 
									<strong>Телефон:</strong> <?=$arItem["PROPERTY"]["PHONES"]["~VALUE"]["TEXT"]?><br/>
								<?endif?> 
								
								<?if (!empty($arItem["PROPERTY"]["EMAIL"]["~VALUE"]["TEXT"])):?>
									<strong>Email:</strong> <?=$arItem["PROPERTY"]["EMAIL"]["~VALUE"]["TEXT"]?><br/>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTY"]["TIMETABLE"]["~VALUE"]["TEXT"])):?>
									<strong>График работы:</strong> <?=$arItem["PROPERTY"]["TIMETABLE"]["~VALUE"]["TEXT"]?><br/>
								<?endif?>
								
								<a class="print" href="<?=$APPLICATION->GetCurDir()?>print.php?id=<?=$arItem["ID"]?>"><img width="14" height="14" src="<?=SITE_TEMPLATE_PATH?>/images/printer.svg" alt=""/></a>

							</div>
						</div>
					</div>
				</div>
			<?
			}
			?>
        </div>
    </div>
	
	<script>
		$(function(){

			var coords;

			var coordTitles;

			var myMap;  

			

			/* инициализация карты*/

			$(document).ready(function(){
				
				coords = [];
				coordTitles = [];
				
				coords[coords.length] = $("h1").data('coord').split(',');

				coordTitles[coordTitles.length] = $('.office-desc').find('.office-title').html()+"<br/>"+$('.office-desc').find('.office-desc-text').html();
				
				ymaps.ready(init);

				function init(){
							
					myMap = new ymaps.Map("map", {

						center: coords[0],

						zoom: 10,

						controls: []

					});         

					myCollection = new ymaps.GeoObjectCollection({}, { 

						});

					for(var i = 0; i < coords.length; i++){

						myPlacemark = new ymaps.Placemark(coords[i], { 

								content: coordTitles[i], 

								balloonContentBody: coordTitles[i] 

						},

						{

							iconLayout: 'default#image',

							iconImageHref: '/includes/img/placeholder-orange.svg',

							iconImageSize: [50, 55],

							iconImageOffset: [-19, -50]

						});

						myCollection.add(myPlacemark);

					} 

					

					myMap.geoObjects.add(myCollection);

					myMap.behaviors.disable('scrollZoom');

					myMap.controls.add("zoomControl", {position: {bottom: '30px', right: '5px'}, size:'small'});

					myMap.controls.add("geolocationControl", {position: {bottom: '100px', right: '5px'}, size:'small'});

					myMap.controls.add("typeSelector");

					

					

					myMap.setBounds( myCollection.getBounds(),{ checkZoomRange: true }).then(function(){ if(myMap.getZoom() > 14) myMap.setZoom(14);});

					

					var position = myMap.getGlobalPixelCenter();

					myMap.setGlobalPixelCenter([ position[0] - 100, position[1] ]);

				}
			});	

		});
	</script>
</body>
</html>
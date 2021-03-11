<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/central_office_desc.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('MAIN_OFFICE_DESCR')));
$out1 = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/central_office_img.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('MAIN_OFFICE_IMG')));
$out2 = ob_get_contents();
ob_end_clean();

// ob_start();

// $out3 = ob_get_contents();
// ob_end_clean();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/trust_contacts.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('TRUST_CONTACTS')));
$out4 = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/trust_descr.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('TRUST_DESCR')));
$out5 = ob_get_contents();
ob_end_clean();

// ob_start();

// $out6 = ob_get_contents();
// ob_end_clean();
$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$CityName = $obLocation->getCity();

//echo "<pre>"; print_r($CityName); echo "</pre>";

if( $CityName == 'Москва' || $obLocation->getRegion() == 'Московская область')
	$CityName = 'Москва и Область';

$arCities = array(
	'Уфа',
	'Самара',
	'Брянск',
	'Челябинск',
	'Пятигорск',
	'Калуга',
	'Ярославль',
	'Владивосток',
);


if ( count($arResult["ITEMS"]) > 0 && $arResult["ADDRESSES"]):?>

<ul class="list-contact-cities">
	<?
	$i = 0;
	$defaultCityId = 0;
	foreach($arResult["ADDRESSES"] as $arAdr):
	
		if($i == 0)
			$defaultCityId = $arAdr['ID'];
	?>
	<li <?if($i>1):?>class="mobile-hidden"<?endif;?>><a class="<?=($arAdr['NAME']==$CityName)?"active ":""?>tab-link" data-city-id="<?=$arAdr['ID']?>" title="<?=$arAdr['NAME']?>" href="#tab-city-<?=$arAdr['ID']?>"><?=$arAdr['NAME']?></a></li>
	<?
	$i++;
	endforeach?>

	<?/*if(count($arResult["ADDRESSES"]) > 2):?>
	<li class="popup-holder-over">
		<a class="open" title="" href=""><?=GetMessage('CITIES_MORE')?></a>
		<div class="popup">
			<div class="popup-inner">
				<ul>
					<?
					$i = 0;
					foreach($arResult["ADDRESSES"] as $arAdr):
						if($i>1):
					?>
					<li <?if($i<4):?>class="mobile-visible"<?endif;?>><a class="close-link tab-link" title="<?=$arAdr['NAME']?>" href="#tab-city-<?=$arAdr['ID']?>"><?=$arAdr['NAME']?></a></li>
					<?
						endif;
						$i++;
					endforeach?>
				</ul>
			</div>
		</div>
	</li>
	<?endif;*/?>

</ul>

<div class="tabs-content">
	<?	
	$i = 0;
	foreach($arResult["ADDRESSES"] as $arAdr):
		$k = 0;

	?>
	<div id="tab-city-<?=$arAdr['ID']?>" class="tab-city">
		<div class="top-contact-block clearfix">

			<div class="left-block">
				<div class="list-contact">

					<?
					$arPoints = array();
					$arEmailsShop = array();
					$arEmailsContact = array();
					?>

					<?foreach ($arAdr['ELEM_ID'] as $key => $itemId):?>
						
						<?
						$arItem = $arResult['ITEMS'][$itemId];

						$arPoints[$itemId]['NAME'] = $arItem['NAME'];
						$arPoints[$itemId]['LAT'] = $arItem['PROPERTIES']['LAT']['VALUE'];
						$arPoints[$itemId]['LON'] = $arItem['PROPERTIES']['LON']['VALUE'];

						if($arItem['PROPERTIES']['EMAIL']['VALUE']){
							$arEmailsShop[] = $arItem['PROPERTIES']['EMAIL']['VALUE'];
						}
						if($arItem['PROPERTIES']['CONTACT_EMAIL']['VALUE']){
							$arEmailsContact[] = $arItem['PROPERTIES']['CONTACT_EMAIL']['VALUE'];
						}
						
						?>

						<div class="adress" itemscope itemtype="http://schema.org/Organization">

							<div class="column">
								<h3 id="movePoint<?=$itemId?>" class="adress-name" data-id="<?=$itemId?>"><?=$arItem['NAME']?></h3>
								<span>
									<?=$arItem['PROPERTIES']['TIME']['VALUE']?>
								</span>
							</div>

							<div class="column">
									<span itemprop="telephone">
										<a href="tel:<?=$arItem['PROPERTIES']['PHONE']['VALUE']?>"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></a>
									</span>
									<?if($arItem['PROPERTIES']['ADD_PHONE']['VALUE']):?>
										<span>
											Доб: <?=$arItem['PROPERTIES']['ADD_PHONE']['VALUE']?>
										</span>
									<?endif;?>
									<span>
										<a href="mailto:<?=$arItem['PROPERTIES']['EMAIL']['VALUE']?>"><?=$arItem['PROPERTIES']['EMAIL']['VALUE']?></a>
									</span>
							</div>

							<div class="column column--flex">
								<?if($arItem['PROPERTIES']['CONTACT_PHOTO']['VALUE']):?>
									<div class="member_photo">
										<?
										$pic = CFile::ResizeImageGet($arItem['PROPERTIES']['CONTACT_PHOTO']['VALUE'], array('width'=>150, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, true);
										?>
										<img src="<?=$pic['src']?>" alt="">
									</div>
								<?endif;?>
								<div class="member_info">
									<span class="member_name">
										<?=$arItem['PROPERTIES']['CONTACT']['VALUE']?>
									</span>
									<span>
										<?=$arItem['PROPERTIES']['POSITON']['VALUE']?>
									</span>
									<?if($arItem['PROPERTIES']['CONTACT_PHONE']['VALUE']):?>
										<span>
											Телефон: <a href="tel:<?=$arItem['PROPERTIES']['CONTACT_PHONE']['VALUE']?>"><?=$arItem['PROPERTIES']['CONTACT_PHONE']['VALUE']?></a>
										</span>
									<?endif;?>
									<?if($arItem['PROPERTIES']['CONTACT_EMAIL']['VALUE']):?>
										<span>
												E-mail: <a href="mailto:<?=$arItem['PROPERTIES']['CONTACT_EMAIL']['VALUE']?>"><?=$arItem['PROPERTIES']['CONTACT_EMAIL']['VALUE']?></a>
										</span>
									<?endif;?>
									<?if($arItem['PROPERTIES']['INNER_PHONE']['VALUE']):?>
										<span>
											Внутренний телефон: <?=$arItem['PROPERTIES']['INNER_PHONE']['VALUE']?>
										</span>
									<?endif;?>
								</div>
							</div>

						</div>

					<?endforeach;?>

				</div>
			<?
			$arEmails = array_merge($arEmailsShop, $arEmailsContact);
			?>
				<div class="form">
					<?$APPLICATION->IncludeComponent(
						"magnitmedia:form.result.new", 
						"contacts", 
						array(
							"CACHE_TIME" => "0",
							"CACHE_TYPE" => "A",
							"CHAIN_ITEM_LINK" => "",
							"CHAIN_ITEM_TEXT" => "",
							"EDIT_URL" => "",
							"IGNORE_CUSTOM_TEMPLATE" => "N",
							"LIST_URL" => "",
							"SEF_MODE" => "N",
							"SUCCESS_URL" => "",
							"USE_EXTENDED_ERRORS" => "N",
							"WEB_FORM_ID" => "118",
							"COMPONENT_TEMPLATE" => ".default",
							"MANAGER_EMAIL" => "",
							"FORM_TITLE" => "Форма обратной связи",
							"PAGE_TITLE" => "Контакты",
							"PAGE_URL" => "",
							"VARIABLE_ALIASES" => array(
								"WEB_FORM_ID" => "WEB_FORM_ID",
								"RESULT_ID" => "RESULT_ID",
							),
							"EMAILS" => $arEmails
						),
						false
					);?>	
				</div>

			</div>
			<div class="right-block">
				<div id="shops_maps<?=$arAdr['ID']?>" class="shop_map"></div>
	
				<script>
					$(document).ready(function(){

						ymaps.ready(init);

						var map_id = "shops_maps<?=$arAdr['ID']?>";

						function init () {
						    // Параметры карты можно задать в конструкторе.
						    var myMap = new ymaps.Map(
						        // ID DOM-элемента, в который будет добавлена карта.
						        map_id,
						        // Параметры карты.
						        {
						            // Географические координаты центра отображаемой карты.
						            center: [55.76, 37.64],
            						zoom: 10
						        }, {
						            // Поиск по организациям.
						            searchControlProvider: 'yandex#search'
						        }
						    );

						    var js_array = <?php echo \Bitrix\Main\Web\Json::encode($arPoints, $options = null);?>;

						    if(Object.keys( js_array ).length > 0){

						    	for(var key in js_array){

							    	point = js_array[key];
							    	
							    	var myPlacemark = new ymaps.Placemark([parseFloat(point.LAT), parseFloat(point.LON)], {
							    			 balloonContent: decodeURIComponent(point.NAME)
							        }, 
							        {
							          preset: 'islands#greenDotIconWithCaption'
							        });

							      myMap.geoObjects.add(myPlacemark);

							      document.getElementById("movePoint"+key).addEventListener("click", function(){
							      	
							      	/*if(window.screen.width < 1023){
							      		$('html, body').animate({
									        scrollTop: $('.tab-city:not(".js-tab-hidden")').find('.shop_map').offset().top
									    	}, 1000);
							      	}*/

							      	var point_id = this.dataset.id;
							      	var arpoint = js_array[point_id];
							      	var lat = arpoint.LAT;
							      	var lon = arpoint.LON; 

										  myMap.setCenter([lat, lon], 12, {duration: 200});

										}); 

							    }

							    ymaps.geoQuery(myMap.geoObjects).applyBoundsToMap(myMap, {checkZoomRange: true});

							  }


						    /*var objectManager = new ymaps.ObjectManager({
			            // Чтобы метки начали кластеризоваться, выставляем опцию.
			            clusterize: true,
			            // ObjectManager принимает те же опции, что и кластеризатор.
			            gridSize: 32,
			            clusterDisableClickZoom: true
			        	});

						    objectManager.objects.options.set('preset', 'islands#greenDotIcon');
						    objectManager.clusters.options.set('preset', 'islands#greenClusterIcons');
						    myMap.geoObjects.add(objectManager);

						    var js_array = <?php echo json_encode($arPoints );?>;
						    if(Object.keys( js_array ).length > 0){

							    var points = [];
							    var point;
							    var i = 0;
							    for(var key in js_array){
							    	point = js_array[key];
							    	points[i] = {"type": "Feature", "id": i, "geometry": {"type": "Point", "coordinates": [point.LAT, point.LON]}};
							    	i++;
							    }

							   var arPoint = {
							    	"type": "FeatureCollection",
							    	"features": points
							    }

							    console.log(arPoint);

				        	objectManager.add(arPoint);
				       }*/


						}

					});
				</script>
			</div>

		</div>

	</div>
	
		<?
		$i++;
	endforeach?>
	
</div>

<?endif?>
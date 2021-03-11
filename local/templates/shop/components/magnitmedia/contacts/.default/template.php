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
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/trust_descr.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('TRUST_DESCR')));
$out5 = ob_get_contents();
ob_end_clean();

// ob_start();

// $out6 = ob_get_contents();
// ob_end_clean();



if ( count($arResult["ITEMS"]) > 0 && $arResult["ADDRESSES"]):?>

<?
$i = 0;
$defaultCityId = 0;
?>
	
<div class="tabs-content">
	<?
	$k = 0;
	foreach($arResult["ADDRESSES"] as $arAdr):
		if($i == 0)
			$defaultCityId = $arAdr['ID'];
		
		if ($arAdr["ID"] == $defaultCityId):?>
		
			<div id="tab-city-<?=$arAdr['ID']?>">
				<div class="top-contact-block clearfix">
					<div class="left-block">
						<ul class="list-contact">
							<li>
								<div class="clearfix" itemscope itemtype="http://schema.org/Organization">
									<div class="column">
										<?=$out1?>
									</div>
									<div class="column">
										<div class="visual-holder">
											<?=$out2?>
										</div>
									</div>
								</div>
							</li>
							<li>
								<?if(empty($arAdr['SECTIONS'])):?>
								<div class="clearfix" itemscope itemtype="http://schema.org/Store">
								<?endif;?>
								<div class="column">
									<?if(!empty($arAdr['SECTIONS'])):?>
									<h3><?=GetMessage('CITIES_OFFICES_IN')?> <?=($arAdr['UF_WHERE'])?$arAdr['UF_WHERE']:$arAdr['NAME']?></h3>
									<ul class="list-contact-cities tabset-inner">
										<?
										$j = 0;
										foreach($arAdr['SECTIONS'] as $arSection):?>
										<li><a <?if($j == 0):?>class="active"<?endif?> title="<?=$arSection['NAME']?>" href="#district-<?=$arAdr['ID']?>-<?=$arSection['ID']?>"><?=$arSection['NAME']?></a></li>
										<?
										$j++;
										endforeach;?>
									</ul>
									<?else:?>
									<h3><span class="small" itemprop="name"><?=GetMessage('CITIES_OFFICE_IN')?> <?=($arAdr['UF_WHERE'])?$arAdr['UF_WHERE']:$arAdr['NAME']?></span></h3>
									<?endif;?>
								</div>
								<div class="column">
									<?if(!empty($arAdr['SECTIONS'])):?>
									<div class="tabs-content">
										<?foreach($arAdr['SECTIONS'] as $arSection):?>
										<div id="district-<?=$arAdr['ID']?>-<?=$arSection['ID']?>">
											<?foreach($arSection['ELEM_ID'] as $elemId):
												if($arItem = $arResult['ITEMS'][$elemId]):
											?>
											<div class="store" itemscope itemtype="http://schema.org/Store" >
												<h3><span class="small" itemprop="name"><?=$arItem['NAME']?></span></h3>
												<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
													<?=$arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT']?>
													<?/*<span itemprop="addressLocality">Ìîñêâà</span> ì. Øîññå Ýíòóçèàñòîâ <span itemprop="postalCode">111524</span>, <span itemprop="streetAddress">óë Ýëåêòðîäíàÿ, 13 À</span>*/?>
												</div>
												<?if($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT']):?>
												<?=GetMessage('CITIES_PHONE')?> <?=$arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT']?>
												<?/*òåë: <span itemprop="telephone">+7 (903) 546-15-23</span>, <span itemprop="telephone">+7 (495) 363-32-03</span>*/?>
												<?endif;?>
												<?if($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT']):?>
												<br/><?=$arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT']?>
												<?/*<br/>Ãðàôèê ðàáîòû: <span itemprop="openingHours" content="ïí-ïò 9:00-19:00, ñá 10:00-18:00">ïí-ïò 9:00-19:00, ñá 10:00-18:00</span>*/?>
												<?endif;?>
												<?if($arItem['PROPERTIES']['EMAIL]']['VALUE']['TEXT']):?>
												<br/><?=$arItem['PROPERTIES']['EMAIL]']['~VALUE']['TEXT']?>
												<?/*<a href="mailto:dze@elevel.ru" itemprop="email">dze@elevel.ru</a>*/?>
												<?endif;?>
											</div>
											<div class="align-right"><a class="link-map" data-index="<?=$k?>" href=""><?=GetMessage('CITIES_SHOW_MAP')?></a></div>
											<br/>
											<?
												$k++;
												endif;
											endforeach;?>
										</div>
										<?endforeach;?>
									</div>
									<?else:?>
										<?foreach($arAdr['ELEM_ID'] as $elemId):
												if($arItem = $arResult['ITEMS'][$elemId]):
											?>
									<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<?=$arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT']?>
										<?/*<span itemprop="addressLocality">Ñàíêò - Ïåòåðãáóðã <br/>ì. Ëàäîæñêàÿ</span>, <span itemprop="postalCode">195027</span><br/><span itemprop="streetAddress">óë. Ìàãíèòîãîðñêàÿ, 51 ëèò. «æ»</span>*/?>
									</div>
									<?if($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT']):?>
									<?=GetMessage('CITIES_PHONE')?> <?=$arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT']?>	
									<?/*òåë: <span itemprop="telephone">+7 (812) 324-69-95</span>*/?>
									<?endif;?>
									<?if($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT']):?>
									<br/><?=$arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT']?>
									<?/*<br/>Ãðàôèê ðàáîòû: <span itemprop="openingHours" content="ïí-ïò 9:00-18:00">ïí-ïò 9:00-18:00</span>*/?>
									<?endif;?>
										<?
												endif;
											endforeach;?>
									<?endif;?>
									
									
								</div>
								<?if(empty($arAdr['SECTIONS'])):?>
								</div>
								<?endif;?>
							</li>
						</ul>
					</div>
					<div class="right-block">
						<h3><?=GetMessage('FEEDBACK_FORM_TITLE')?></h3>
						<?
						$APPLICATION->IncludeComponent(
							"magnitmedia:form.result.new", 
							"form3", 
							array(
								"CACHE_TIME" => "3600",
								"CACHE_TYPE" => "A",
								"CHAIN_ITEM_LINK" => "",
								"CHAIN_ITEM_TEXT" => "",
								"EDIT_URL" => "",
								"IGNORE_CUSTOM_TEMPLATE" => "N",
								"LIST_URL" => "",
								"SEF_MODE" => "N",
								"SUCCESS_URL" => "",
								"USE_EXTENDED_ERRORS" => "N",
								"WEB_FORM_ID" => "115",
								"COMPONENT_TEMPLATE" => ".default",
								"MANAGER_EMAIL" => "",
								"FORM_TITLE" => "Ôîðìà îáðàòíîé ñâÿçè",
								"PAGE_TITLE" => "Êîíòàêòû",
								"PAGE_URL" => "",
								"VARIABLE_ALIASES" => array(
									"WEB_FORM_ID" => "WEB_FORM_ID",
									"RESULT_ID" => "RESULT_ID",
								)
							),
							false
						);
						?>		
					</div>
				</div>
			</div>
		<?endif;
		$i++;
	endforeach?>
	
</div>
<div class="map-contacts" id="map-contacts"  ></div>

<div class="lightbox-holder">
	<div id="office_feedback_lightbox" class="lightbox">
		<div id="office_feedback_lightbox_cnt">
		</div>
	</div>
</div>

<script>
jQuery(function(){

	$(".list-contact-cities .tab-link").on("click", function(){
		_cityId = $(this).data('city-id');
		contactInit(_cityId);
	});
});

$(window).load(function () {
	if( $('.map-contacts').length ){
		ymaps.ready(contactInit(<?=$defaultCityId?>));
    }
});

function contactInit(cityId) {
	
	
	if(parseInt(cityId) == 0)
		return;
	
	
	<?foreach($arResult["ADDRESSES"] as $arAdr):?>
		<?if ($arAdr['ID'] == $defaultCityId):?>

		


		if(cityId == '<?=$arAdr['ID']?>') {

			$(document).ready(function(){

				function initMap(){

					$("#map-contacts").html('');
					var myMap = new ymaps.Map("map-contacts", {
							<?if($arAdr['UF_CITY_LAT'] && $arAdr['UF_CITY_LONG']):?>center: [<?=$arAdr['UF_CITY_LAT']?>,<?=$arAdr['UF_CITY_LONG']?>],<?endif;?>
							zoom: 8
						}
					);
				
					myMap.behaviors.disable('scrollZoom');
					<?if(!empty($arAdr['ELEM_ID'])):?>
					
					myMap.geoObjects<?foreach($arAdr["ELEM_ID"] as $elemId):
							if($arItem = $arResult['ITEMS'][$elemId]):
								if($arItem['PROPERTIES']['YANDEX_MAP']['VALUE']):
							
						?>.add(new ymaps.Placemark([<?=$arItem['PROPERTIES']['YANDEX_MAP']['VALUE']?>], {
								content: '<?=$arItem['NAME']?>',
								balloonContent: '<?
								$str = '<strong>' . GetMessage('MAP_BALOON_NAME') . ':</strong> ' . $arItem['NAME'] . '<br/> <strong>' . (($arItem['PROPERTIES']['ADDRESS']['VALUE']['TEXT'])?GetMessage('MAP_BALOON_ADDRESS') . ':</strong> ' . $arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['PHONE']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_PHONE') . ':</strong> <br/>' . $arItem['PROPERTIES']['PHONE']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_TIMETABLE') . ':</strong> ' . $arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['EMAIL']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_EMAIL') . ':</strong> ' . $arItem['PROPERTIES']['EMAIL']['~VALUE']['TEXT'] . '<br/>':'') . '<br/><a class="print" target="_blank" href="/partners/shop/print.php?id=' . $arItem['ID'] . '"><img width="14" height="14" src="/local/templates/corporativ/images/printer.svg" alt=""/></a>';
								
								$str = str_replace(array("\r\n", "\r", "\n"), '',  $str);
								echo $str;
								?>'
							},
							{
								iconLayout: 'default#image',
								iconImageHref: '/local/templates/corporativ/images/placeholder-orange.svg',
								iconImageSize: [21, 29],
								iconImageOffset: [-10, -15],
								iconCaptionMaxWidth: '50'
							}))<?
							
								endif;
							endif;
							
							endforeach;
							?>;
					<?endif?>
				}
				ymaps.ready(initMap);
			});
		}
		<?if(!empty($arAdr['SECTIONS'])):?>
		$('.link-map').each(function(){
			var link = $(this);
			var index = link.data('index');
			// var parent = link.closest('[id*="district-<?=$arAdr['ID']?>-"]');
		
			link.on('click', function(e){
				e.preventDefault();
				$('html,body').animate({
						scrollTop: $('.map-contacts').offset().top},
					'slow');
					
				
				var item = myMap.geoObjects.get(index);
		
				// Îòêðûâàåì/çàêðûâàåì áàëóí ó ìåòêè.
				if (item.balloon.isOpen()) {
					item.balloon.close();
				} else {
		// Ïëàâíî ìåíÿåì öåíòð êàðòû íà êîîðäèíàòû ìåòêè.

					item.balloon.open(item.geometry.getCoordinates());
				}
			});
		});
		<?endif;?>
	<?endif;?>
	<?endforeach;?>

}

function officeFeedback(elemId){
	
	if(parseInt(elemId) > 0){
		
		_data = "action=office_feedback&elem_id=" + elemId;
		console.log($("#office_feedback_lightbox_cnt"));
		$("#office_feedback_lightbox_cnt").html("<div class='loading' style='width: 100%;height: 10px;'></div>");
		$.ajax({
			type: 'post',
			url: '<?=$APPLICATION->GetCurPage()?>',
			data: _data,
			success: function(result){
				$("#office_feedback_lightbox_cnt").html(result);
				officeFeedbackInit();
			},
			complete: function(data){
				// $button.removeClass('loading');
			}
		});
	}
		
	return false;
}

</script>
<?endif?>
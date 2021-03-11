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
	<?if(count($arResult["ADDRESSES"]) > 2):?>
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
	<?endif;?>
</ul>

<div class="tabs-content">
	<?	
	$i = 0;
	foreach($arResult["ADDRESSES"] as $arAdr):
		$k = 0;
	?>
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
					<?if( !empty($arAdr['UF_DELEGATE_NAME']) || !empty($arAdr['UF_DELEGATE_EMAIL']) || !empty($arAdr['UF_DELEGATE_PHONE']) ):?>
					<li>
						<div class="clearfix">
							<div class="column">
								<h3><?=GetMessage('DELEGATE')?> <?=($arAdr['UF_WHERE'])?$arAdr['UF_WHERE']:$arAdr['NAME']?></h3>
							</div>
							<div class="column">
								<span itemscope itemtype="http://schema.org/Person">
									<?if( !empty($arAdr['UF_DELEGATE_NAME']) )?>
										<strong class="representative-name" itemprop="name"><?=$arAdr['UF_DELEGATE_NAME']?></strong><br/>
									<?if( !empty($arAdr['UF_DELEGATE_EMAIL']) )?>
										<strong>Почта:</strong> <span itemprop="email"><?=$arAdr['UF_DELEGATE_EMAIL']?></span><br/>
									<?if( !empty($arAdr['UF_DELEGATE_PHONE']) )?>
										<strong>Телефон:</strong> <span itemprop="telephone"><?=$arAdr['UF_DELEGATE_PHONE']?></span>
								</span>
							</div>
						</div>
					</li>
					<?endif;?>
					<li>
						<?if(empty($arAdr['SECTIONS'])):?>
						<div class="clearfix" itemscope itemtype="http://schema.org/Store">
						<?endif;?>
						<div class="column">
							<?
							$h3Title = $arAdr['UF_CONTACTS_CITY_H3'];
							
							if(!empty($arAdr['SECTIONS'])):
								
								if(strlen($h3Title) == 0)
									$h3Title = GetMessage('CITIES_OFFICES_IN') . " " . (($arAdr['UF_WHERE'])?$arAdr['UF_WHERE']:$arAdr['NAME']);
							?>
							<h3><?=$h3Title?></h3>
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
							<?
							
							if(strlen($h3Title) == 0)
								$h3Title = ( in_array( $arAdr['NAME'], $arCities ) ) ? GetMessage('DELEGATE').' '.$arAdr['UF_WHERE'] : GetMessage('CITIES_OFFICE_IN').' '.$arAdr['NAME'];

							?>
							<h3><span class="small" itemprop="name"><?=$h3Title?></span></h3>
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
												<?/*<span itemprop="addressLocality">Москва</span> м. Шоссе Энтузиастов <span itemprop="postalCode">111524</span>, <span itemprop="streetAddress">ул Электродная, 13 А</span>*/?>
											</div>
											<?if($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT']):?>
											<?=GetMessage('CITIES_PHONE')?> <?=$arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT']?>
											<?/*тел: <span itemprop="telephone">+7 (903) 546-15-23</span>, <span itemprop="telephone">+7 (495) 363-32-03</span>*/?>
											<?endif;?>
											<?if($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT']):?>
											<br/><?=$arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT']?>
											<?/*<br/>График работы: <span itemprop="openingHours" content="пн-пт 9:00-19:00, сб 10:00-18:00">пн-пт 9:00-19:00, сб 10:00-18:00</span>*/?>
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
								<?/*<span itemprop="addressLocality">Санкт - Петергбург <br/>м. Ладожская</span>, <span itemprop="postalCode">195027</span><br/><span itemprop="streetAddress">ул. Магнитогорская, 51 лит. «ж»</span>*/?>
							</div>
							<?if($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT']):?>
							<?=GetMessage('CITIES_PHONE')?> <?=$arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT']?>	
							<?/*тел: <span itemprop="telephone">+7 (812) 324-69-95</span>*/?>
							<?endif;?>
							<?if($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT']):?>
							<br/><?=$arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT']?>
							<?/*<br/>График работы: <span itemprop="openingHours" content="пн-пт 9:00-18:00">пн-пт 9:00-18:00</span>*/?>
							<?endif;?>
							
							<div class="align-right"><a class="link-map" data-index="<?=$k?>" href=""><?=GetMessage('CITIES_SHOW_MAP')?></a></div><br/>
								<?			$k++;
										endif;
									endforeach;?>
							<?endif;?>
							
							
						</div>
						<?if(empty($arAdr['SECTIONS'])):?>
						</div>
						<?endif;?>
					</li>
					<li>
						<div class="column">
							<h3><?=GetMessage('TRUST_TITLE')?></h3>
							<?=$out4?>
						</div>
						<div class="column">
							<?=$out5?>
							<div class="align-right">
								<a class="lightbox-open" href="#trust_info">Подробнее</a>
							<?
							/*$APPLICATION->IncludeComponent(
								"magnitmedia:form.result.new", 
								"manager_feedback_form", 
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
									"WEB_FORM_ID" => "102",
									"COMPONENT_TEMPLATE" => ".default",
									"MANAGER_EMAIL" => "mr.krotov@gmail.com",
									"FORM_TITLE" => "Форма из блока доверия",
									"PAGE_TITLE" => "Контакты",
									"BUTTON_TITLE" => "Подробнее",
									"BUTTON_LINK" => "Y",
									"PAGE_URL" => "",
									"VARIABLE_ALIASES" => array(
										"WEB_FORM_ID" => "WEB_FORM_ID",
										"RESULT_ID" => "RESULT_ID",
									)
								),
								false
							);*/
							?></div>
						</div>
					</li>
				</ul>
			</div>
			<div class="right-block">
				<h3><?=GetMessage('FEEDBACK_FORM_TITLE')?> «<?=$arAdr['NAME']?>»</h3>
				<?$APPLICATION->IncludeComponent(
					"magnitmedia:form.result.new", 
					"form3", 
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
						"WEB_FORM_ID" => "102",
						"COMPONENT_TEMPLATE" => ".default",
						"MANAGER_EMAIL" => $arAdr['UF_EMAIL_FORM'],
						"FORM_TITLE" => "Форма обратной связи",
						"PAGE_TITLE" => "Контакты",
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
		<?
		// echo "<pre>"; print_r($arResult['DEPARTMENTS'][$arAdr['ID']]); echo "</pre>";
		if(!empty($arResult['DEPARTMENTS'][$arAdr['ID']])):?>
		<ul class="list-departments">
			<?foreach($arResult['DEPARTMENTS'][$arAdr['ID']] as $arDepartment):?>
			<li>
				<div class="inner">
					<div class="text">
						<h3><?=$arDepartment['NAME']?></h3>
						<?
						if($arDepartment['EMAIL']):?>
						<a class="lightbox-open" href="#office_feedback_lightbox" onclick="officeFeedback(<?=$arDepartment['ID']?>)"><?=GetMessage('CONTACTS_SEND')?></a>
						<?
						endif;
						?>
					</div>
					<div class="icon-holder">
						<div class="icon"><?if($arDepartment['ICON']):?><img src="<?=$arDepartment['ICON']?>" width="30"  alt="<?=$arDepartment['NAME']?>"/><?endif;?></div>
					</div>
				</div>
			</li>
			<?endforeach;?>
		</ul>
		<?endif;?>
		<?/*<div class="map-contacts" id="map-<?=$arAdr['ID']?>"></div>*/?>
	</div>
	
		<?
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

<div class="lightbox-holder">
	<div id="trust_info" class="lightbox">
		<h2>Сообщение о нарушениях бизнес - этики</h2>
		<div class="feedback_form_container">
			<?$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/trust_info.php", Array(), Array("MODE" => "html"));?>
		</div>
	</div>
</div>

<script>
jQuery(function(){

	$(".list-contact-cities .tab-link").on("click", function(){
		_cityId = $(this).data('city-id');
		contactInit(_cityId);
	});
	
	$('.link-map').on('click', function(e){
		e.preventDefault();
		
		var link = $(this);
		var index = link.data('index');
		
		$('html,body').animate({
				scrollTop: $('.map-contacts').offset().top},
			'slow');
			
		var item = window.myMap.geoObjects.get(index);

		// Открываем/закрываем балун у метки.
		if (item.balloon.isOpen()) {
			item.balloon.close();
		} else {
			// Плавно меняем центр карты на координаты метки.
			item.balloon.open(item.geometry.getCoordinates());
		}
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
    if(cityId == '<?=$arAdr['ID']?>') {
		
		$("#map-contacts").html('');
		
        window.myMap = new ymaps.Map("map-contacts", {
                <?if($arAdr['UF_CITY_LAT'] && $arAdr['UF_CITY_LONG']):?>center: [<?=$arAdr['UF_CITY_LAT']?>,<?=$arAdr['UF_CITY_LONG']?>],<?endif;?>
                zoom: 8
            }
        );
		
		window.myMap.geoObjects.removeAll();
		
        window.myMap.behaviors.disable('scrollZoom');
		<?if(!empty($arAdr['ELEM_ID'])):?>
		
        window.myMap.geoObjects<?foreach($arAdr["ELEM_ID"] as $elemId):
				if($arItem = $arResult['ITEMS'][$elemId]):
					if($arItem['PROPERTIES']['YANDEX_MAP']['VALUE']):
				
			?>.add(new ymaps.Placemark([<?=$arItem['PROPERTIES']['YANDEX_MAP']['VALUE']?>], {
                    content: '<?=$arItem['NAME']?>',
                    balloonContent: '<?
					$str = '<strong>' . GetMessage('MAP_BALOON_NAME') . ':</strong> ' . $arItem['NAME'] . '<br/> <strong>' . (($arItem['PROPERTIES']['ADDRESS']['VALUE']['TEXT'])?GetMessage('MAP_BALOON_ADDRESS') . ':</strong> ' . $arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_PHONE') . ':</strong> <br/>' . $arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_TIMETABLE') . ':</strong> ' . $arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['EMAIL']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_EMAIL') . ':</strong> ' . $arItem['PROPERTIES']['EMAIL']['~VALUE']['TEXT'] . '<br/>':'') . '<br/><a class="print" target="_blank" href="/partners/shop/print.php?id=' . $arItem['ID'] . '"><img width="14" height="14" src="/local/templates/corporativ/images/printer.svg" alt=""/></a>';
					
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
	<?endforeach;?>
}

function officeFeedback(elemId){
	
	if(parseInt(elemId) > 0){
		
		_data = "action=office_feedback&elem_id=" + elemId;
		console.log($("#office_feedback_lightbox_cnt"));
		$("#office_feedback_lightbox_cnt").html("<div class='loading' style='width: 100%;height: 10px;'></div>");
		$.ajax({
			type: 'post',
			url: '<?=$APPLICATION->GetCurDir()?>',
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
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/central_office_desc.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('MAIN_OFFICE_DESCR')));
$out1 = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/central_office_img.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('MAIN_OFFICE_IMG')));
$out2 = ob_get_contents();
ob_end_clean();

ob_start();
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
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => ".default",
		"MANAGER_EMAIL" => "mr.krotov@gmail.com",
		"FORM_TITLE" => "����� �������� �����",
		"PAGE_TITLE" => "��������",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);
$out3 = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/trust_contacts.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('TRUST_CONTACTS')));
$out4 = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeFile($APPLICATION->GetCurDir() . "include/trust_descr.php", Array(), Array("MODE" => "html", "NAME" => GetMessage('TRUST_DESCR')));
$out5 = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeComponent(
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
		"FORM_TITLE" => "����� �� ����� �������",
		"PAGE_TITLE" => "��������",
		"BUTTON_TITLE" => "���������",
		"BUTTON_LINK" => "Y",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);
$out6 = ob_get_contents();
ob_end_clean();



if ( count($arResult["ITEMS"]) > 0 && $arResult["ADDRESSES"]):?>

<ul class="list-contact-cities">
	<?
	$i = 0;
	$defaultCityId = 0;
	foreach($arResult["ADDRESSES"] as $arAdr):
	
		if($i == 0)
			$defaultCityId = $arAdr['ID'];
	?>
	<li <?if($i>1):?>class="mobile-hidden"<?endif;?>><a class="<?=($i==0)?"active ":""?>tab-link" data-city-id="<?=$arAdr['ID']?>" title="<?=$arAdr['NAME']?>" href="#tab-city-<?=$arAdr['ID']?>"><?=$arAdr['NAME']?></a></li>
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
									<div class="store" itemscope itemtype="http://schema.org/Store">
										<h3><span class="small" itemprop="name"><?=$arItem['NAME']?></span></h3>
										<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
											<?=$arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT']?>
											<?/*<span itemprop="addressLocality">������</span> �. ����� ����������� <span itemprop="postalCode">111524</span>, <span itemprop="streetAddress">�� �����������, 13 �</span>*/?>
										</div>
										<?if($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT']):?>
										<?=GetMessage('CITIES_PHONE')?> <?=$arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT']?>
										<?/*���: <span itemprop="telephone">+7 (903) 546-15-23</span>, <span itemprop="telephone">+7 (495) 363-32-03</span>*/?>
										<?endif;?>
										<?if($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT']):?>
										<br/><?=$arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT']?>
										<?/*<br/>������ ������: <span itemprop="openingHours" content="��-�� 9:00-19:00, �� 10:00-18:00">��-�� 9:00-19:00, �� 10:00-18:00</span>*/?>
										<?endif;?>
										<?if($arItem['PROPERTIES']['EMAIL]']['VALUE']['TEXT']):?>
										<br/><?=$arItem['PROPERTIES']['EMAIL]']['~VALUE']['TEXT']?>
										<?/*<a href="mailto:dze@elevel.ru" itemprop="email">dze@elevel.ru</a>*/?>
										<?endif;?>
									</div>
									<div class="align-right"><a class="link-map" href=""><?=GetMessage('CITIES_SHOW_MAP')?></a></div>
									<br/>
									<?
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
								<?/*<span itemprop="addressLocality">����� - ���������� <br/>�. ���������</span>, <span itemprop="postalCode">195027</span><br/><span itemprop="streetAddress">��. ��������������, 51 ���. ��</span>*/?>
							</div>
							<?if($arItem['PROPERTIES']['PHONES']['VALUE']['TEXT']):?>
							<?=GetMessage('CITIES_PHONE')?> <?=$arItem['PROPERTIES']['PHONES']['~VALUE']['TEXT']?>	
							<?/*���: <span itemprop="telephone">+7 (812) 324-69-95</span>*/?>
							<?endif;?>
							<?if($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT']):?>
							<br/><?=$arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT']?>
							<?/*<br/>������ ������: <span itemprop="openingHours" content="��-�� 9:00-18:00">��-�� 9:00-18:00</span>*/?>
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
					<li>
						<div class="column">
							<h3><?=GetMessage('TRUST_TITLE')?></h3>
							<?=$out4?>
						</div>
						<div class="column">
							<?=$out5?>
							<div class="align-right"><?=$out6?></div>
						</div>
					</li>
				</ul>
			</div>
			<div class="right-block">
				<h3><?=GetMessage('FEEDBACK_FORM_TITLE')?></h3>
				<?=$out3?>		
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

<script>
jQuery(function(){
	
	$(".list-contact-cities .tab-link").on("click", function(){
		_cityId = $(this).data('city-id');
		contactInit(_cityId);
	});
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
					$str = '<strong>' . GetMessage('MAP_BALOON_NAME') . ':</strong> ' . $arItem['NAME'] . '<br/> <strong>' . (($arItem['PROPERTIES']['ADDRESS']['VALUE']['TEXT'])?GetMessage('MAP_BALOON_ADDRESS') . ':</strong> ' . $arItem['PROPERTIES']['ADDRESS']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['PHONE']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_PHONE') . ':</strong> <br/>' . $arItem['PROPERTIES']['PHONE']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['TIMETABLE']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_TIMETABLE') . ':</strong> ' . $arItem['PROPERTIES']['TIMETABLE']['~VALUE']['TEXT'] . '<br/>':'') . (($arItem['PROPERTIES']['EMAIL']['VALUE']['TEXT'])?'<strong>' . GetMessage('MAP_BALOON_EMAIL') . ':</strong> ' . $arItem['PROPERTIES']['EMAIL']['~VALUE']['TEXT'] . '<br/>':'') . '<br/><a class="print" href="print.html"><img width="14" height="14" src="/local/templates/corporativ/images/printer.svg" alt=""/></a>';
					
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
	<?if(!empty($arAdr['SECTIONS'])):?>
	$('.link-map').each(function(){
		var link = $(this);
		var parent = link.closest('[id*="district-<?=$arAdr['ID']?>"]');
		link.on('click', function(e){
			e.preventDefault();
			$('html,body').animate({
					scrollTop: $('.map-contacts').offset().top},
				'slow');
			var item = myMap.geoObjects.get(parent.index());
			// ���������/��������� ����� � �����.
			if (item.balloon.isOpen()) {
				item.balloon.close();
			} else {
	// ������ ������ ����� ����� �� ���������� �����.

				item.balloon.open(item.geometry.getCoordinates());
			}
		});
	});
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
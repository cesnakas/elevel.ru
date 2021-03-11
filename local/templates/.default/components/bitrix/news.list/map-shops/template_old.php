<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ( count($arResult["ITEMS"]) > 0 && $arResult["ADDRESSES"]):?>
	<?$k = 1;?>
	<div class="text-shops">�������� � ������
		<div class="popup-holder">
						<?foreach($arResult["ADDRESSES"] as $i => $arAdr):?>
							<?if ($k == 1):?>
			<a class="open" href=""><span class="inner"><?=$arResult['OFFICE_ACTIVE_NAME']?></span></a>
			<div class="popup">
				<div class="popup-inner">
					<ul class="tabset-cities">
							<?endif;?>
							
							<li>
								<a href="#tab-<?=$arAdr['ID']?>" data-elements="<?=implode("|", $arAdr["ELEM_ID"])?>" class="close-link select-city <?if ($arAdr["ID"] == $arResult['OFFICE_ACTIVE']):?>active<?endif;?>" data-addr="<?=$arAdr['ID']?>" title="<?=$arAdr['NAME']?>">
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
	
	 <div class="shops-column custom-scroll">
		<ul class="list-shops accordion">
			<li>
				<strong class="title">������� �level ������ ������</strong>
				<div class="accordion-slide">
					<p><strong>�����:</strong> ������ �. ����� ����������� 111524, �� �����������, 13 �</p>
					<p><strong>�������:</strong> +7 (903) 546-15-23, +7 (495) 363-32-03 </p>
					<p><strong>Email:</strong> <a href="mailto:dze@elevel.ru">dze@elevel.ru</a></p>
					<p><strong>������ ������:</strong> ��-�� 9:00-19:00, �� 10:00-18:00</p>
				</div>
				<a class="link-shops-map" href="">�������� �� �����</a> <a class="accordion-open" href="">��������</a>
			</li>
		</ul>
	</div>
	<div id="map"></div>
	
	<div class="contact-box">

		<ul class="office-list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<li>
					<div class="office-title list-title" data-element="<?=$arItem["ID"]?>" data-coord="<?=$arItem["PROPERTIES"]["YANDEX_MAP"]["VALUE"]?>"></div>
					
					 <div class="office-desc">
						<div class="office-title">
							<strong>��������:</strong> <?=$arItem["NAME"]?>
						</div>
						<div class="office-desc-bl">
							<div class="office-desc-text">
							
								<?if (!empty($arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"])):?>
									<strong>�����:</strong> <?=$arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"]?><br/>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"])):?> 
									<strong>�������:</strong> <?=$arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"]?><br/>
								<?endif?> 
								
								<?if (!empty($arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"])):?>
									<strong>Email:</strong> <?=$arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"]?><br/>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"])):?>
									<strong>������ ������:</strong> <?=$arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"]?><br/>
								<?endif?>
								
								<a class="print" href="<?=$APPLICATION->GetCurDir()?>print.php?id=<?=$arItem["ID"]?>"><img width="14" height="14" src="<?=SITE_TEMPLATE_PATH?>/images/printer.svg" alt=""/></a>

							</div>
						</div>
					</div>
				</li>
			<?endforeach?>
		  
		</ul>


	</div>

<?endif?>
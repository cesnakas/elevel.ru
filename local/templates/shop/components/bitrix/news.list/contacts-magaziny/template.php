<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if ( count($arResult["ITEMS"]) > 0 && $arResult["ADDRESSES"]):?>
	<h1 class="headline-border">��������</h1>
	<section class="section-cities">
		<h2 class="headline-cities">������, � ������� ���� <span class="text-orange">Elevel</span></h2>
		<ul class="list-cities">
			<?foreach($arResult["ADDRESSES"] as $arAdr):?>
				<li class="addr-item <?=($arAdr['CLASS']) ? $arAdr['CLASS'] : ''?>">
					<a href="#" data-addr="<?=$arAdr['ID']?>" title="<?=$arAdr['NAME']?>"><?=$arAdr['NAME']?></a>
				</li> 
			<?endforeach?>
		</ul>
	</section>
	
	<div class="section-map contact-map">
		<div itemscope itemtype="http://schema.org/Organization" class="text-block">
			<ul>
				<li>
					<strong class="title">�������� ����-������� <span itemprop="name">������</span></strong>
					111524, �. ������, ��. �����������, 13�
				</li>
				<li>
					<strong class="title">�������</strong>
					<span itemprop="telephone">8 (495) 134-25-21</span>
					<br/><span itemprop="telephone">8 (495) 363-32-03</span>
				</li>
				<li>
					<strong class="title">���� ������ ��������� �����</strong>
					��-��: � 9 �� 19, ��: � 10 �� 18,
					<br/>��: ��������
				</li>
				<li>
					<strong class="title">Email</strong>
					<a href="mailto:dze@elevel.ru"><span itemprop="email">dze@elevel.ru</span></a>
				</li>
				<li>
					<strong class="title">����������� ����</strong>
					��� "�������� ���"
					<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
						<span itemprop="postalCode">143956</span>, <span itemprop="addressLocality">���������� ���., �.��������, ���. ���������-�������������</span>, <span itemprop="streetAddress">������������ �., �.22</span>
					</div>
				</li>
				<li>
					<strong class="title">���</strong>
					5001057947
				</li>
				<li>
					<strong class="title">���</strong>
					500101001
				</li>
				<li>
					<strong class="title">����</strong>
					1065001028080
				</li>
				<li>
					��� ���������, �. ������
					<br/>�/� 40702810340000004514
					<br/>�/� 30101810400000000225
					<br/>��� 044525225
				</li>
			</ul>
		</div>
		<div id="map"></div>
	</div>
				
	<div class="contact-box">

		<ul class="office-list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<li>
					<div class="office-title list-title" data-coord="<?=$arItem["PROPERTIES"]["YANDEX_MAP"]["VALUE"]?>">
					   <?if(!empty($arItem["PROPERTIES"]["METRO"]["VALUE"])):?>
						  <span class="metro-ic"></span>
						   <a class="office-name" href="javascript:void(0)" id="office_0"><?=$arItem["PROPERTIES"]["METRO"]["VALUE"]?></a>
					   <?else:?>
							<span class="addr-ic"></span>
						   <a class="office-name" href="javascript:void(0)" id="office_0"><?=$arItem["NAME"]?></a>
					  
					   <?endif?>
					</div>
					
					 <div class="office-desc">
						<div class="office-title">
							<span class="metro-ic"></span><a class="office-name" href="javascript:void(0)"><?=(!empty($arItem["PROPERTIES"]["METRO"]["VALUE"])) ? $arItem["PROPERTIES"]["METRO"]["VALUE"] : $arItem["NAME"]?></a>
						</div>
						<div class="office-desc-bl">
							<div class="office-desc-text">
								<?if (!empty($arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"])):?>
									<b>�����:</b>
									<p><?=$arItem["PROPERTIES"]["ADDRESS"]["~VALUE"]["TEXT"]?></p>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"])):?>
									<b>���� ������:</b>
									<p><?=$arItem["PROPERTIES"]["TIMETABLE"]["~VALUE"]["TEXT"]?></p>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"])):?>
									<b>Email:</b>
									<p><?=$arItem["PROPERTIES"]["EMAIL"]["~VALUE"]["TEXT"]?></p>
								<?endif?>
								
								<?if (!empty($arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"])):?> 
									<b>�������:</b>
									<p class="phones-desc"><?=$arItem["PROPERTIES"]["PHONES"]["~VALUE"]["TEXT"]?></p>
								<?endif?> 

							</div>
							<?if (is_array( $arItem["PROPERTIES"]["PICTURES"]["ARR_PIC"]) && !empty( $arItem["PROPERTIES"]["PICTURES"]["ARR_PIC"])):?>
								<div class="office-desc-other">
									<div class="office-desc-photo">
										<?foreach( $arItem["PROPERTIES"]["PICTURES"]["ARR_PIC"] as $arrPicture):?>
											<img src="<?=$arrPicture["src"]?>">
										<?endforeach?>
									</div>
								</div>
							<?endif?>
						</div>
						<div class="office-desc-more office-desc-bl"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">��������</a></div>
						<div class="show-on-map"><a class="show-office" data-id="0" href="javascript:void(0);">�������� �� �����</a></div>
					</div>
				</li>
			<?endforeach?>
		  
		</ul>


	</div>

<?endif?>
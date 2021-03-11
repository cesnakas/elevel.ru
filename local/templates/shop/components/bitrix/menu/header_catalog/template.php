<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!-- test_menu -->
<?if (!empty($arResult)):?>
<div class="block-catalog">
	<a title="" class="open" href=""><span class="inner">Каталог</span></a>
	<div class="popup">
		<div class="popup-inner clearfix">
			<aside class="sidebar-nav">
				<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<ul class="sidebar-main-nav">
						<?
						$i = 0;
						foreach($arResult["TABS"] as $id => $tab):?>
							<li><a itemprop="url" href="/shop/<?=$tab["CODE"]?>/" data-tab="#tab<?=$id?>" <?if ($i == 0):?>class="active"<?endif;?> title="<?=$tab["NAME"]?>"><span itemprop="name"><?=$tab["NAME"]?></span></a></li>
						<?
						$i++;
						endforeach;?>
					</ul>
				</nav>
				<?/*
				<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<ul class="sidebar-add-nav">
						<li><a itemprop="url" href="https://yoursite.com/" title="Распродажа">Распродажа</a></li>
						<li><a itemprop="url" href="https://yoursite.com/" title="Сборка щитов">Сборка щитов</a></li>
					</ul>
				</nav>*/?>
			</aside>
			<div class="tabs-content">
			
				<?foreach($arResult["TABS"] as $tab_id => $tab):?>
					<div id="tab<?=$tab_id?>">
					
						<?//if ($tab_id == 1626996 || $tab_id == 1626997):?>
						<?if ($tab['MENU_TYPE'] == "custom"):?>
						
							<nav class="tab-columns clearfix" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<div class="column">
									<ul>
										<?$previousLevel = 0;
										$second_column = false;
										$tab_sections_count = count($arResult["TABS_SECTIONS"][$tab_id]);
										foreach($arResult["TABS_SECTIONS"][$tab_id] as $id => $arItem):?>
										
											<?if ($arItem["DEPTH_LEVEL"] != 2) continue;?>
											
											<?if (!$second_column && $id > ($tab_sections_count-1)/2 ):?>
									</ul>
								</div>
								<div class="column">
									<ul>
												<?$second_column = true;?>
											<?endif;?>
											
											<li>
												<a itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>">
													<span itemprop="name"><?=$arItem["TEXT"]?></span>
												</a>
											</li>
										
										<?endforeach;?>
										
									</ul>
								</div>
							</nav>

							<div class="slider-brands-holder">
								<div class="slider-brands">
									<?foreach($tab['PRODUCERS'] as $producerId):
									
										if($arProducer = $arResult['PRODUCERS'][$producerId]):
									?>
									<?//foreach($arResult["TABS_PRODUCERS"][$tab_id] as $arProducer):?>
										<div class="slide">
											<div class="icon">
												<a title="<?=$arProducer["NAME"]?>" href="<?=$arProducer["SECTION_PAGE_URL"]?>">
													<img src="<?=$arProducer["PICTURE"]?>" alt="<?=$arProducer["NAME"]?>"/>
												</a>
											</div>
											
											<strong class="title">
												<a title="<?=$arProducer["NAME"]?>" href="<?=$arProducer["SECTION_PAGE_URL"]?>">
													<?=$arProducer["NAME"]?>
												</a>
											</strong>
											
											<ul>
												<?foreach($arProducer["SERIES"] as $seriesId):
													
													if($arSerie = $arResult["SERIES"][$seriesId]):
												?>
													<li><a title="<?=$arSerie["NAME"]?>" href="<?=$arSerie["DETAIL_PAGE_URL"]?>"><?=$arSerie["NAME"]?></a></li>
												<?
													endif;
												endforeach;?>
											</ul>
										</div>
									<?
										endif;
									endforeach;?>
								</div>
							</div>
								
						<?else:?>
					
							<div class="categories-column">
								<?$previousLevel = 0;
								$second_column = false;
								$tab_sections_count = count($arResult["TABS_SECTIONS"][$tab_id]);
								foreach($arResult["TABS_SECTIONS"][$tab_id] as $id => $arItem):?>
								
									<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
										<?=str_repeat("</ul></div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
									<?endif?>
									
									<?if (!$second_column && $id > ($tab_sections_count-1)/2 && $arItem["DEPTH_LEVEL"] == 1):?>
							</div>
							<div class="categories-column">
										<?$second_column = true;?>
									<?endif;?>
							
									<?if ($arItem["IS_PARENT"]):?>

										<?if ($arItem["DEPTH_LEVEL"] == 1):?>
											<div class="categories-item clearfix">
												<?if ($arItem["PARAMS"]["PICTURE"]):?>
													<div class="visual">
														<img src="<?=$arItem["PARAMS"]["PICTURE"]?>" alt="<?=$arItem["TEXT"]?>"/>
													</div>
												<?endif;?>
												
												<div class="text-block">
													<strong class="title"><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><?=$arItem["TEXT"]?></a></strong>
													<ul>
										<?else:?>
													<li><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><?=$arItem["TEXT"]?></a></li>
										<?endif?>

									<?else:?>
									
										<?if ($arItem["DEPTH_LEVEL"] == 1):?>
											<div class="categories-item clearfix">
												<?if ($arItem["PARAMS"]["PICTURE"]):?>
													<div class="visual">
														<img src="<?=$arItem["PARAMS"]["PICTURE"]?>" alt="<?=$arItem["TEXT"]?>"/>
													</div>
												<?endif;?>
												<div class="text-block">
													<a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>">
														<strong class="title"><?=$arItem["TEXT"]?></strong>
													</a>
												</div>
											</div>

										<?else:?>
													<li><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><?=$arItem["TEXT"]?></a></li>
										<?endif?>
									<?endif?>
									
									<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

								<?endforeach?>
								
								<?if ($previousLevel > 1)://close last item tags?>
									<?=str_repeat("</ul></div></div>", ($previousLevel-1) );?>
								<?endif?>
							</div>
									
							<?if (count($tab['PRODUCERS']) > 0):?>
								<ul class="list-brands">
									<?foreach($tab['PRODUCERS'] as $producerId):
									
										if($arProducer = $arResult['PRODUCERS'][$producerId]):
									?>
									<?//foreach($arResult["TABS_PRODUCERS"][ $tab_id ] as $arProducer):?>
										<?if ($arProducer["PICTURE"]):?>
											<li>
												<a title="<?=$arProducer["NAME"]?>" href="<?=$arProducer["SECTION_PAGE_URL"]?>"><img src="<?=$arProducer["PICTURE"]?>" alt="<?=$arProducer["NAME"]?>"/></a>
											</li>
										<?endif;?>
									<?
										endif;
									endforeach;?>
								</ul>
							<?endif;?>
						<?endif;?>
					</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
</div>
<?endif?>
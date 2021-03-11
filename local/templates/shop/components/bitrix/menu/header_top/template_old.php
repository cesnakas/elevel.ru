<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<nav class="top-block-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<ul>
			<?foreach($arResult as $i => $arItem):?>
			
				<?if ($i < 3 || $i > 3):?>
					<li><a itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><span itemprop="name"><?=$arItem["TEXT"]?></span></a></li>
				<?else:?>
					<li class="popup-holder-over">
						<a class="open" itemprop="url" title="Åù¸" href="#"><span class="center"><span itemprop="name" class="inner">Åù¸</span></span></a>
						<div class="popup">
							<div class="popup-inner">
								<ul>
									<li><a itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><span itemprop="name"><?=$arItem["TEXT"]?></span></a></li>
				<?endif;?>
			<?endforeach;?>
								</ul>
							</div>
						</div>
					</li>
		</ul>
	</nav>
<?endif?>

	
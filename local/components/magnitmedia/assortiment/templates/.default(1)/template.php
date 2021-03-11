<?if (count($arResult["SECTIONS"]) > 0):?>
	<ul class="list-categories">
		<?
		$k = 1;
		foreach($arResult["SECTIONS"] as $section)
		{
			$class = "";
			if ($k < 4) $class = ' class="mobile-hidden"';
			elseif ($k == 4 || $k == 5) $class = ' class="tablet-hidden"';
		?>
			<li <?=$class?>><?=$section?></li>
			
			<?$k++;
			if ($k == 6) break;
		}
		?>
		
		<li class="popup-holder-over">
			<a class="open" title="" href=""><span class="text-tablet">Ещё</span><span class="text-mobile">Категории</span></a>
			<div class="popup">
				<div class="popup-inner">
					<ul>
						<?
						$k = 1;
						foreach($arResult["SECTIONS"] as $section)
						{
							$class = "";
							if ($k <= 3) $class = ' class="desktop-hidden tablet-hidden"';
							elseif ($k <= 5) $class = ' class="desktop-hidden"';
						?>
							<li <?=$class?>><?=$section?></li>
							
							<?$k++;
						}
						?>
					</ul>
				</div>
			</div>
		</li>
	</ul>
<?endif;?>

<?if (count($arResult["PRODUCERS"]) > 0):?>
	<div class="slider-brands slider-assortiment slider-content slider-arrow-position">
		<?foreach($arResult["PRODUCERS"] as $producerId => $producer):?>
			<?
			$haveSeries = false;
			if (count($producer["SERIES"]) > 0) $haveSeries = true;
			?>
			<div>
				<?if ($haveSeries):?>
					<a href="#tab-brands<?=$producerId?>" class="visual tab-link">
						<?if ($producer["PICTURE"]):?>
							<span class="center"><img src="<?=$producer["PICTURE"]["SRC"]?>" height="<?=($producer["PICTURE"]["HEIGHT"] ? $producer["PICTURE"]["HEIGHT"] : "39")?>" alt="<?=$producer["NAME"]?>"/></span>
						<?else:?>
							<span class="center"><img src="<?=SITE_TEMPLATE_PATH?>/images/no_photo.png" height="39" alt="<?=$producer["NAME"]?>"/></span>
						<?endif;?>
					</a>
					<?=$producer["NAME"]?>
						
				<?else:?>
					<div class="visual">
						<?if ($producer["PICTURE"]):?>
							<span class="center"><img src="<?=$producer["PICTURE"]["SRC"]?>" height="<?=($producer["PICTURE"]["HEIGHT"] ? $producer["PICTURE"]["HEIGHT"] : "39")?>" alt="<?=$producer["NAME"]?>"/></span>
						<?else:?>
							<span class="center"><img src="<?=SITE_TEMPLATE_PATH?>/images/no_photo.png" height="39" alt="<?=$producer["NAME"]?>"/></span>
						<?endif;?>
					</div>
					
					<?=$producer["NAME"]?>
				<?endif;?>
			</div>
		<?endforeach;?>
	</div>

	<div class="tabs-content">
		<?foreach($arResult["PRODUCERS"] as $producerId => $producer):?>
			
			<?if (count($producer["SERIES"]) > 0):?>
				<div id="tab-brands<?=$producerId?>">
					<span class='ui-closable-tab'>Закрыть</span>
					<h3>Серии <?=$producer["NAME"]?></h3>
					<div class="slider-popup slider-content">
						<?foreach($producer["SERIES"] as $serie):?>
							<div><?=$serie?></div>
						<?endforeach;?>
					</div>
				</div>
			<?endif;?>
			
		<?endforeach;?>
	</div>
<?endif;?>
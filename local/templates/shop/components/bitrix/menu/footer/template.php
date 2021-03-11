<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<?foreach($arResult as $i => $arItem):?>
		<?if ($arItem["PARAMS"]["main"] == "Y"):?>
		
			<?if ($i > 0):?>
				</ul>
			</div>
			<?endif;?>
		
			<div class="column col col-2">
				<strong class="title"><a itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><span itemprop="name"><?=$arItem["TEXT"]?></span></a></strong>
				<ul>
		<?else:?>
		
			<li><a itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><span itemprop="name"><?=$arItem["TEXT"]?></span></a></li>
	
		<?endif;?>
	<?endforeach;?>
	
				</ul>
			</div>
<?endif?>

	
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>
	<?//<div class="popup header-search-result">?>
		<div class="popup-inner">
			<ul>
				<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>

					<?if($category_id !== "all"):?>
						<?foreach($arResult["CATEGORIES"]["ITEMS"] as $i => $arItem):?>
							<li><a class="close-link" title="<?echo $arItem["NAME"]?>" href="<?echo $arItem["URL"]?>">
								<div class="visual"><img src="<?echo $arItem["ICON"]?>" alt="<?echo $arItem["NAME"]?>"/></div>
								<div class="text">
									<?echo $arItem["NAME"]?>
								</div>
							</a></li>
						<?endforeach;?>
						
					<?else:?>
						<a class="link-more" href="<?=$arResult["CATEGORIES"]["all"]["ITEMS"][0]["URL"]?>">Показать все результаты</a>
					<?endif;?>
					
				<?endforeach;?>
			</ul>
			
		</div>
	<?//</div>?>
<?endif;
?>
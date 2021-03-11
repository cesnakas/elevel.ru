<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<? if ( $USER->IsAdmin() ): ?>

	<!--<pre><? print_r( $arResult ) ?></pre>-->

<? endif; ?>




<?
if(!empty($arResult["CATEGORIES"])):?>
	<?//<div class="popup header-search-result">?>
		<div class="popup-inner">
			<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>

				<?if($category_id !== "all"):?>
					<ul>
						<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
							<?if ($i > 4) continue; // выводится лишний элемент "остальное" - не выводим его ?>
							
							<li><a class="close-link" title="<?echo $arItem["NAME"]?>" href="<?echo $arItem["URL"]?>">
								<div class="visual">
									<?if (isset($arItem["ICON"])):?>
										<img src="<?echo $arItem["ICON"]?>" width="82" height="74" alt="<?echo $arItem["NAME"]?>"/>
									<?endif;?>
								</div>
									
								<div class="text">
									<?=$arItem["NAME"]?>
									<?if (isset($arItem["PRICE"])):?>
									<br/>
									<?=$arItem["PRICE"]?> руб
									<?endif;?>
								</div>
							</a></li>
						<?endforeach;?>
					</ul>
					
				<?else:?>
					<a class="link-more" href="<?=$arResult["CATEGORIES"]["all"]["ITEMS"][0]["URL"]?>">Показать все результаты</a>
				<?endif;?>
				
			<?endforeach;?>
						
		</div>
	<?//</div>?>
<?endif;
?>
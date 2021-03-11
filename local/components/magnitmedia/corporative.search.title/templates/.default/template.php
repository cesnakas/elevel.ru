<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if($arResult["CATALOG_COUNT"] > 0 || $arResult["OTHER_COUNT"] > 0):?>
<div class="ajax_content_main">		
	<?if(!empty($arResult["SEARCH"]['OTHER'])):?>
	<div class="title"><?=GetMessage('MCST_TITLE')?> <strong><a href="/search/?q=<?=$arResult["QUERY"];?>"><?=$arResult["OTHER_COUNT"]?> <?=GetEnding($arResult["OTHER_COUNT"], GetMessage('MCST_PAGES1'), GetMessage('MCST_PAGES2'), GetMessage('MCST_PAGES3'))?>:</a></strong></div>
	<ul class="list-pages">
	<?foreach ($arResult["SEARCH"]['OTHER'] as $key=>$arGroup):
		
		// echo "<pre>"; print_r($arGroup); echo "</pre>";
	?>				
		<li>
			<strong id="fast_ajax_main_cat_<?=$key;?>"><?=GetMessage('MCST_IN_SECTION')?>  &laquo;<?=$arResult['IBLOCK'][$key]["NAME"];?>&raquo;</strong><br/>
			<?foreach($arGroup["ITEMS"] as $k => $arItem):?>
				<?if ($k == 2)
					break;
				?>			
			<a class="close-link" title="<?=$arItem["TITLE"];?>" href="<?=$arItem["URL"];?>">
				<?=$arItem["TITLE_FORMATED"];?>
			</a><br>
			<?endforeach;?>
		</li>				
	<?endforeach;?>
	</ul>	
	<?endif;?>
<?




if(!empty($arResult["SEARCH"]['CATALOG']['ITEMS'])):

$totalItems = number_format($arResult["CATALOG_COUNT"], 0, ' ', ' ');
?>  
<div class="title"><?=GetMessage('MCST_FOUND_IN_ESHOP')?> <strong><a href="/shop/search/index.php?q=<?=htmlspecialcharsex($_GET["q"]);?>"><?=$totalItems;?> <?=GetEnding($arResult["CATALOG_COUNT"], GetMessage('MCST_ITEMS1'), GetMessage('MCST_ITEMS2'), GetMessage('MCST_ITEMS3'))?>:</a></strong></div>
<ul class="list-search-products">
<?
foreach($arResult["SEARCH"]['CATALOG']['ITEMS'] as $key => $arElement):
	
	$arProduct = $arResult['PRODUCTS'][$arElement["ITEM_ID"]];
	
	if($arProduct):
	
?>
	<li>	
		<a class="close-link" title="<?=$arElement["NAME"]?>" href="<?=$arProduct["DETAIL_PAGE_URL"]?>">
			<div class="visual">				
			<?if( !empty( $arProduct['PICTURE'] ) ): ?>
				<img src="<?=$arProduct['PICTURE']["src"];?>" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" />
			<?else:?>
				<img src="<?=SITE_TEMPLATE_PATH?>/images/no-photo.png" width="62px" height="62px" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" />
			<?endif;?> 
			</div>
			<div class="text">
				<?//=tz_find_search(TruncateText($arElement["NAME"], 38), htmlspecialcharsex($_GET["q"]));?> 
				<?=$arElement["TITLE"]?><br/>
				<?=number_format($arProduct["PRICE"], 2, ".", " ");?> <?=GetMessage('MCST_RUB')?>
			</div>
		</a>
	</li>
<?
	endif;
endforeach;?>	

</ul>

<?endif;?>



</div>
<?else:?>
	<p class="note note_rem tz_n_title"><?=GetMessage('MCST_NO_RESULT')?></p>
	<p class="note note_rem tz_n_mess_main"><?=GetMessage('MCST_NO_RESULT_NOTE')?></p>
<?endif;?>
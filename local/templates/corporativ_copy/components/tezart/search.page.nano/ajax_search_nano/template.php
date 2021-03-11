<div class="ajax_content_main">		

<?if($arResult["COUNT"] > 0):?>

	<div class="title">На сайте компании найдено <strong><a href="/search/?q=<?=$arResult["QUERY"];?>"><?=$arResult["COUNT"]?> страниц:</a></strong></div>
	<ul class="list-pages">
	<?foreach ($arResult["SEARCH"] as $key=>$arGroup):?>				
		<li>
			<strong id="fast_ajax_main_cat_<?=$arGroup["IBLOCK_ID"];?>">В разделе  «<?=$arGroup["IBLOCK_NAME"];?>»</strong><br/>
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
<?/*?>
<div class="search-title-panel">
	<div class="cat-title">Сайт компании</div>
	<div class="all-pages">Всего <?=$arResult["COUNT"]?> страниц
		<a href="/search/?q=<?=$arResult["QUERY"];?>" title="Показать" class="search-page-link">Показать</a>
	</div>
</div>


		<?
			$count_cat = 0;
			$count_all_categories = 4;
			foreach ($arResult["SEARCH"] as $key=>$arGroup):?>	
				<?if ( $count_cat < $count_all_categories):?>		
					
					<?$a = 0; foreach($arGroup["ITEMS"] as $arItem):?>
					
						
						<?
							$count = count($arGroup["ITEMS"]);
							$a++;
							if ($a <=4){
						?>
						
							<?if ($a == 1):?>
								<div class="s_ajax_item" data-id="<?=$arGroup["IBLOCK_ID"];?>">
									<div class="search-category-title" id="fast_ajax_main_cat_<?=$arGroup["IBLOCK_ID"];?>"><?=$arGroup["IBLOCK_NAME"];?>&nbsp;&nbsp;<?=$count;?></div>
							<?endif;?>				
							
							<div class="search_item">
								<a href="<?=$arItem["URL"];?>" title="<?=$arItem["TITLE"];?>"><?=$arItem["TITLE_FORMATED"];?></a>
							</div>					

						
						<?  
							}
							 if ( ($count >= 4 && $a == 5) || ($count == 4 && $a == 4) || ($count < 4 && $a == $count) ){  ?>
								 </div>
								 
						<?	}?>

						
						<?endforeach;?>
					<?$count_cat++;?>
				<?endif;?>
		<?endforeach;?>

<?*/?>
<?endif;?>
<?//$category = htmlspecialcharsbx($_GET["cat"]);
//if($category == '0' || $category == '2'):?>	
	<?$APPLICATION->IncludeComponent("tezart:tz_search.nano", "fast_search_main_nano", array("IBLOCK_ID" => 83, "COUNT_MAIN_ELEMENTS"=>$arResult["COUNT"]));?>						
<?//endif?>
<?
	global $SSITE;
	global $SSHOP;
 //    echo "<pre>"; print_r($SSITE); echo "</pre>";
 //    echo "<pre>"; print_r($SSHOP); echo "</pre>";
if( $SSITE == 0 && $SSHOP == 0):?>
	<p class="note note_rem tz_n_title">По вашему запросу ничего не найдено.</p>
	<p class="note note_rem tz_n_mess_main">Попробуйте ввести новый запрос, например <span class="example">светильник</span></p>
<?endif;?>
</div>
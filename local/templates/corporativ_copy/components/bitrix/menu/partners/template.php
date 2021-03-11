<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// echo "<pre>"; print_r($arResult); echo "</pre>";
?>
<?if(!empty($arResult)):?>
<ul class="list-partners">
	<?foreach($arResult as $arItem):?>
	<li>
		<a class="box" <?if($arItem['LINK']):?>href="<?=$arItem['LINK']?>"<?endif?> <?if (isset($arItem['PARAMS']['NEW_WINDOW']) && $arItem['PARAMS']['NEW_WINDOW'] === true):?>target="_blank"<?endif;?>>
			<?if(strlen($arItem['PARAMS']['IMAGE']) > 0):?>
			<span class="icon"><img src="<?=$arItem['PARAMS']['IMAGE']?>"  alt="<?=$arItem['TEXT']?>"/></span>
			<?endif?>
			<span class="text">
				<strong><?=$arItem['TEXT']?></strong>
			</span>
			<?if ($arItem['PARAMS']['SECOND_TEXT']):?>
				<span class="text second">
					<?=$arItem['PARAMS']['SECOND_TEXT']?>
				</span>
			<?endif;?>
		</a>
	</li>
	<?endforeach?>
</ul>
<?endif;?>
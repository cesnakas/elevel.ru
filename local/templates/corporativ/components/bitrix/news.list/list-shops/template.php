<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ( count($arResult["ITEMS"]) > 0 && $arResult["ADDRESSES"]):?>
	<form class="clearfix" action="/partners/shop/" method="get" target="_blank">
		<select name="city">
			<option value="">Город</option>
			
			<?foreach($arResult["ADDRESSES"] as $i => $arAdr):?>
				<option value="<?=$arAdr['ID']?>"><?=$arAdr['NAME']?></option>
			<?endforeach?>
		</select>
		<button class="button" type="submit">Показать ближайший магазин</button>
	</form>
<?endif?>
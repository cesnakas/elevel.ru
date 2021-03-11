<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="footer-add-nav">
	<?foreach($arResult as $arItem):?>
		<li><a title="<?=$arItem["TEXT"]?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endforeach?>
</ul>
<?endif?>
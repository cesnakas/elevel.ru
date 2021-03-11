<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<ul class="menu">
		<?foreach($arResult as $arItem):?>
			<li><a <?if ($arItem["SELECTED"]):?>class="active"<?endif;?> itemprop="url" title="<?=$arItem["TEXT"]?>" href="<?=$arItem["LINK"]?>" <?if (isset($arItem['PARAMS']['NEW_WINDOW']) && $arItem['PARAMS']['NEW_WINDOW'] === true):?>target="_blank"<?endif;?>>
				<span itemprop="name">
					<?=$arItem["TEXT"]?>
				</span>
			</a></li>
		<?endforeach?>
	</ul>
</nav>
<?endif?>
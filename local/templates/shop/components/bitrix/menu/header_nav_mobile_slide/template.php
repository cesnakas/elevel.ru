<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<ul class="mobile-menu-nav">
		<?foreach($arResult as $arItem):?>
			<li class="mobile-menu-item"><a <?if ($arItem["SELECTED"]):?>class="active"<?endif;?> itemprop="url" title="<?=$arItem["TEXT"]?>" href="<?=$arItem["LINK"]?>">
				<span itemprop="name">
					<?=$arItem["TEXT"]?>
				</span>
			</a></li>
		<?endforeach?>
	</ul>
</nav>
<?endif?>
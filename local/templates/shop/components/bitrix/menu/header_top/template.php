<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<nav class="top-block-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<ul>
			<?foreach($arResult as $i => $arItem):?>				
				<li><a class="text-orange" itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" target="main"><span itemprop="name"><?=$arItem["TEXT"]?></span></a></li>				
			<?endforeach;?>
		</ul>
	</nav>
<?endif?>	
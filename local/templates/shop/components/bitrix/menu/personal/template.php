<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<a class="open" href=""><?=GetMessage('MENU_NAVIGATION')?></a>
	<nav class="popup" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<div class="popup-inner">
			<ul class="aside-nav">
				<?foreach($arResult as $i => $arItem):?>
				<li><a <?if($arItem["SELECTED"]):?>class="active"<?endif;?> itemprop="url" href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><span itemprop="name"><?=$arItem["TEXT"]?></span></a></li>
				<?endforeach;?>
			</ul>
		</div>
	</nav>
<?endif?>

	
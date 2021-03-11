<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<? if ( !empty( $arResult['ITEMS'] ) ): ?>
	<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<ul class="mobile-menu-categories">
			<? foreach ( $arResult['ITEMS'] as $key => $arItem ): ?>
				<li><a itemprop="url" href="/shop/<?=$arItem['CODE']?>/" title="<?=$arItem['NAME']?>"><span itemprop="name"><?=$arItem['NAME']?></span></a></li>
			<? endforeach; ?>
		</ul>
	</nav>
<? endif; ?>
<?/*
<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<ul class="mobile-menu-add-nav">
		<li><a itemprop="url" href="https://yoursite.com/" title="Распродажа">Распродажа</a></li>
		<li><a itemprop="url" href="https://yoursite.com/" title="Сборка щитов">Сборка щитов</a></li>
	</ul>
</nav>*/?>
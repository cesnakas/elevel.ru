<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<article class="article-page">
	<figure>
		<img src="<?=$arResult["PICTURE"]?>" alt=""/>
	</figure>
	<h1><?=$arResult["NAME"]?></h1>
	<span class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?=$arResult["DETAIL_TEXT"]?>
	
	<?if (isset($arResult["MORE_ARTICLES"]) && !empty($arResult["MORE_ARTICLES"])):?>
		<section style="margin-top: 24px;">
			<h2 class="headline-border">Читайте также</h2>
			<div class="slider-single list-articles">
				<?foreach($arResult["MORE_ARTICLES"] as $article):?>
				<div>
					<a class="article" href="<?=$article["DETAIL_PAGE_URL"]?>">
						
						<? if ( $article["PICTURE"] ): ?>
							<div class="visual">
								<img src="<?=$article["PICTURE"]?>" alt="<?=$article["NAME"]?>"/>
							</div>
						<? endif; ?>
						
						
						<span class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
						<h3><?=$article["NAME"]?></h3>
						<p><?=$article["SHORT_TEXT"]?>...</p>
					</a>
				</div>
				<?endforeach;?>
			</div>
		</section>
	<?endif;?>
</article>
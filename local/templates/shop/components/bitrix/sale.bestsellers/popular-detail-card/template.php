<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
?>

<section class="section-popular">
	<h2 class="headline-border">Популярные</h2>
	<div class="slider-single">

		<? foreach ( $arResult['ITEMS'] as $k => $arItem ): ?>
		
			<div>
				
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="visual ajax_stop">
				
					<?
					$picId = false;
					if ( $arItem['PREVIEW_PICTURE']['ID'] )
					{
						$picId = $arItem['PREVIEW_PICTURE']['ID'];
					}
					elseif ( $arItem['DETAIL_PICTURE']['ID'] )
					{
						$picId = $arItem['DETAIL_PICTURE']['ID'];
					}
					
					if ( $picId )
					{
						$pic = CFile::ResizeImageGet( $picId, Array( 'width' => 302, 'height' => 298 ), BX_RESIZE_IMAGE_EXACT );
						?>
							<img src="<?=$pic['src']?>" alt="<?=$arItem['NAME']?>"/>
						<?
					}
					else
					{
						?>
						<img src="<?=SITE_TEMPLATE_PATH?>/images/no_photo.png" alt="<?=$arItem['NAME']?>"/>
						<?
					}
					?>
					
					<span class="text-available">Доступно в <?=$arItem['STORES_COUNT']?> магазинах</span>
					<span class="article">Артикул: <?=$arItem['PROPERTIES']['MARKING_PRODUCER']['VALUE']?></span>
				</a>
				<div class="text-block">
					<span class="tablet-text article">Артикул: <?=$arItem['PROPERTIES']['MARKING_PRODUCER']['VALUE']?></span>
					<span class="qty">Количество: <?=$arItem['CATALOG_QUANTITY']?></span>
					<strong class="title">
						<a class="ajax_stop" href="<?=$arItem['DETAIL_PAGE_URL']?>">
							<?=$arItem['NAME']?>
						</a>
					</strong>
					
					<? if ( $arItem['CATALOG_QUANTITY'] > 0 ): ?>
						<span class="tablet-text available">В наличии</span>
					<? else: ?>
						<span class="tablet-text available not-available">Нет в наличии</span>
					<? endif; ?>
					
					<strong class="price text-orange"><?=number_format( $arItem['CATALOG_PRICE_3'], 2, '.', ' ' )?> руб.</strong>
					<a class="btn-buy add-to-basket-item" href="javascript:;" data-id="<?=$arItem['ID']?>" >
						<span class="center">Купить</span>
					</a>
				</div>
			</div>
		
		<? endforeach; ?>

	</div>
</section>
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

?>

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
				
				
				<?
				$word = 'магазинах';
				$lastOne = substr( $arItem['STORES_COUNT'], -1, 1 );
				$lastTwo = substr( $arItem['STORES_COUNT'], -2, 2 );
				if ( $lastOne == 1 && $lastTwo != 11 )
				{
					$word = 'магазине';
				}
				?>
				
				<? if ( intval( $arItem['STORES_COUNT'] ) > 0 ): ?>
					<span class="text-available">Доступно в <?=$arItem['STORES_COUNT']?> <?=$word?></span>
				<? else: ?>
					<span class="text-available">Под заказ</span>
				<? endif; ?>
				
				
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
				
				<a class="btn-buy add-to-basket-item quantity_one" href="javascript:;" id="add<?=$arItem['ID']?>" style="overflow: hidden;" >
					<span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="center">Купить</span></span>
				</a>
			</div>
		</div>
	
	<? endforeach; ?>

</div>
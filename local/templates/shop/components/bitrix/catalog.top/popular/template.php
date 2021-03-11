<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM'));
?>

<section class="section-popular">
	<h2 class="headline-border">Популярные товары</h2>
	<div class="slider-single">

		<? foreach ( $arResult['ITEMS'] as $k => $arItem ): ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
			$strMainID = $this->GetEditAreaId($arItem['ID']);
			?>
			<div class="popular-item" id="<? echo $strMainID; ?>">
				
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="visual ajax_stop" style="width: 292px; height: 292px; display: table-cell; vertical-align: middle">
					<img src="<?=$arItem["PICTURE"]?>" alt="<?=$arItem['NAME']?>" style="width: auto; margin: auto;"/>
					
					
					
					<span class="article">Артикул: <?=$arItem['PROPERTIES']['MARKING_PRODUCER']['VALUE']?></span>
				</a>

				<a href="<?=$arItem['DETAIL_PAGE_URL'];?>#availability">
					<? if ( intval( $arItem['STORES_COUNT'] ) > 0 ): ?>
						
						<?
						$word = 'магазинах';
						$lastOne = substr( $arItem['STORES_COUNT'], -1, 1 );
						$lastTwo = substr( $arItem['STORES_COUNT'], -2, 2 );
						if ( $lastOne == 1 && $lastTwo != 11 )
						{
							$word = 'магазине';
						}
						?>
					
						<span class="text-available">Доступно в <?=$arItem['STORES_COUNT']?> <?=$word?></span>
					<? else: ?>
						<span class="text-available"><noindex>Под заказ</noindex></span>
					<? endif; ?>
				</a>

				<div class="text-block" style="margin-top: 14px;">
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
					
					<strong class="price text-orange"><?=$arItem['ITEM_PRICES'][0]["PRINT_PRICE"]?></strong>
					
					<?/*?>
					<a class="btn-buy <?if ($arItem["CATALOG_QUANTITY"] <= 0):?>disabled<?endif;?> add-to-basket-item" href="javascript:;" data-id="<?=$arItem['ID']?>" >
						<span class="center">Купить</span>
					</a>
					<?*/?>
					<a class="btn-buy add-to-basket-item quantity_one" href="javascript:;" id="add<?=$arItem['ID']?>" style="overflow: hidden" >
						<span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="center">Купить</span></span>
					</a>
					
				</div>
				<div class="item-modal" id="modal<?=$arItem["ID"]?>">
					<div class="item-modal-close"></div>
					<h3>Товар добавлен в корзину</h3>
					<a href="" class="item-modal-link-close">Вернуться в каталог</a>
					<a href="<?=$arParams['BASKET_URL']?>" class="confirm">Перейти к оформлению заказа</a>
				</div>
			</div>
		
		<? endforeach; ?>

	</div>
</section>
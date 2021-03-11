<?
use Bitrix\Sale\DiscountCouponsManager;
?>




<? if ( empty( $arResult['ITEMS']['AnDelCanBuy'] ) ): ?>

	Корзина пуста

<? else: ?>
	<ul class="cart-list">
	    <?$arBasketItems = [];?>
		<? foreach ( $arResult['ITEMS']['AnDelCanBuy'] as $arBasketItem ): ?>
            <?
            $JSBasketItems[$arBasketItem['ID']] = [
                "ID" => $arBasketItem['PRODUCT_ID'],
                "NAME" => $arBasketItem['NAME'],
            ];
            ?>
			<?
			$pic = $arBasketItem['PREVIEW_PICTURE_SRC'];
			if ( !$pic && $arBasketItem['DETAIL_PICTURE_SRC'] )
			{
				$pic = $arBasketItem['DETAIL_PICTURE_SRC'];
			}
			?>

			<li>

				<? if ( $pic ): ?>

					<div class="table-cell visual-cell">
						<a class="visual" href="<?=$arBasketItem['DETAIL_PAGE_URL']?>">
							<img src="<?=$pic?>" alt="<?=$arBasketItem['NAME']?>"/>
						</a>
					</div>

				<? else: ?>

					<div class="table-cell visual-cell" style="height: 105px;">
					</div>

				<? endif; ?>




				<div class="tablet-block">
					<div class="table-cell text-block">
						<span class="article">
							Артикул: <?=$arResult['ITEMS_DATA'][$arBasketItem['PRODUCT_ID']]['ARTICLE']?>
						</span>
						<strong class="title">
							<a title="<?=$arBasketItem['NAME']?>" href="<?=$arBasketItem['DETAIL_PAGE_URL']?>">
								<?=$arBasketItem['NAME']?>
							</a>
						</strong>
						<?
						$producerId = $arResult['ITEMS_DATA'][$arBasketItem['PRODUCT_ID']]['PRODUCER'];
						?>
						Производитель: <a href="<?=$arResult['BRANDS_DATA'][$producerId]['URL']?>"><?=$arResult['BRANDS_DATA'][$producerId]['NAME']?></a>
					</div>
					<div class="table-cell available-cell">
						<div class="col-inner">
							<? if ( intval( $arBasketItem['AVAILABLE_QUANTITY'] ) > 0 ): ?>
								<span class="available">В наличии</span>
							<? else: ?>
								<span class="not-available">Под заказ</span>
							<? endif; ?>
						</div>
					</div>
					<div class="table-cell">
						<div class="col-inner">
							<span class="hidden-text">Цена: </span>
							<span class="old_price" data-id="<?=$arBasketItem['ID']?>"><?if ($arBasketItem['DISCOUNT_PRICE'] > 0):?><?=number_format( ($arBasketItem['BASE_PRICE']), 2, '.', ' ' )?> Р<?endif;?></span><br/>
							<span class="current_price"><?=number_format( ($arBasketItem['BASE_PRICE'] - $arBasketItem['DISCOUNT_PRICE']), 2, '.', ' ' )?> Р</span>
						</div>
					</div>
					<div class="table-cell spinner-holder">
						<div class="col-inner basket-quantity">
							<input readonly class="spinner basket-item-quantity" data-id="<?=$arBasketItem['ID']?>" data-coupon="<?=!empty($arResult['COUPON_LIST']) ? $arResult['COUPON_LIST']['ID'] :'false';?>" data-price="<?=$arBasketItem['BASE_PRICE']?>" data-discount="<?=$arBasketItem['DISCOUNT_PRICE']?>" data-multiplicity="<?=$arBasketItem['MEASURE_RATIO']?>" type="text" value="<?=$arBasketItem['QUANTITY']?>" />

							<span class="item_measure"><?=$arBasketItem["MEASURE_TEXT"]?></span>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="table-cell">
						<div class="col-inner">
							<span class="hidden-text">Итого: </span> <span> <span class="sum"><?=number_format( ($arBasketItem['DISCOUNT_PRICE'] > 0 ? ($arBasketItem['BASE_PRICE'] - $arBasketItem['DISCOUNT_PRICE']) * $arBasketItem['QUANTITY'] : $arBasketItem['BASE_PRICE'] * $arBasketItem['QUANTITY']), 2, '.', ' ' )?></span> Р</span>
						</div>
					</div>
				</div>
				<div class="right-block">
					<?/*?>
					<div class="table-cell">
						<div class="col-inner">
							<a href="?action=delay&id=<?=$arBasketItem['ID']?>">Отложить</a>
						</div>
					</div>
					<?*/?>

					<div class="table-cell">
						<div class="col-inner">
							<a class="js-delete" href="?basketAction=delete&id=<?=$arBasketItem['ID']?>">Удалить</a>
						</div>
					</div>
				</div>

			</li>

		<? endforeach; ?>

	</ul>
    <script>
      window.basketItems = <?= \Bitrix\Main\Web\Json::encode($JSBasketItems)?>;
    </script>



	<form class="form-promo-code" action="">
		<fieldset>
			<div class="input-holder">
				<input id="coupon" name="COUPON" placeholder="Промокод" type="text" onchange="enterCoupon();"/>
			</div>
			<button class="button" type="submit" onclick="enterCoupon();">Применить</button>

			<?
			if (!empty($arResult['COUPON_LIST']))
			{
				foreach ($arResult['COUPON_LIST'] as $oneCoupon)
				{
					$couponClass = 'disabled';
					switch ($oneCoupon['STATUS'])
					{
						case DiscountCouponsManager::STATUS_NOT_FOUND:
						case DiscountCouponsManager::STATUS_FREEZE:
							$couponClass = 'bad';
							break;
						case DiscountCouponsManager::STATUS_APPLYED:
							$couponClass = 'good';
							break;
					}
					?><div class="bx_ordercart_coupon"><input disabled readonly type="text" name="OLD_COUPON[]" value="<?=htmlspecialcharsbx($oneCoupon['COUPON']);?>" class="<? echo $couponClass; ?>"><span class="<? echo $couponClass; ?>" data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span></div><?
				}
				unset($couponClass, $oneCoupon);
			}
			?>

			<?
			//<div class="right-block">
			//	<input id="promo" type="checkbox"/>
			//	<label for="promo">Применить 500 баллов</label>
			//</div>
			?>

		</fieldset>
	</form>



	<div class="cart-total">
		<span class="sum-block">Сумма заказа: <span id="order-sum"><?=number_format( $arResult['PRICE_WITHOUT_DISCOUNT'], 2, '.', ' ' )?></span> Р</span>
		<span class="discount-block">Скидка: <span id="order-discount"><?=number_format( $arResult['DISCOUNT_PRICE_ALL'], 2, '.', ' ' )?></span> Р</span>
		<strong class="total-sum">Итого: <span id="order-total"><?=number_format( $arResult['PRICE_WITHOUT_DISCOUNT'] - $arResult['DISCOUNT_PRICE_ALL'], 2, '.', ' ' )?></span> Р</strong>
	</div>
	<div class="cart-buttons">
		<a title="Продолжить покупки" class="link" href="/shop/">Продолжить покупки</a>
		<a class="button" href="/personal/order.php">Оформить заказ</a>
	</div>

    <script>
        $(function() {
          $(".js-delete").on('click', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            var idInBasket = $(this).closest('li').find('.basket-item-quantity').data('id');
            var quantity = $(this).closest('li').find('.basket-item-quantity').val();

            // Yandex.Ecommerce
            dataLayerYa.push({
              "ecommerce": {
                "remove": {
                  "products": [
                    {
                      "id": window.basketItems[idInBasket]['ID'],
                      "name": window.basketItems[idInBasket]['NAME'],
                      "quantity": quantity
                    }
                  ]
                }
              }
            });
            // /Yandex.Ecommerce

            location.href = link;
          });
        });
    </script>
<? endif; ?>
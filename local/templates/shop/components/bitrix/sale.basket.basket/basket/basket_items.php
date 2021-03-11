<?

use Bitrix\Sale\DiscountCouponsManager;

?>

<? if (empty($arResult['ITEMS']['AnDelCanBuy'])): ?>
    Корзина пуста
<? else: ?>
    <pre><? //print_r($arResult);?></pre>
    <div class="cart-wrap">
        <div class="cart-left">
            <ul class="cart-list">
                <li class="cart-list__li cart-list__head">
                    <div class="cart-list__li-pic">
                    </div>
                    <div class="cart-list__li-body">
                        <div class="cart-list__li-main">
                            <div class=" cart-list__li-item--info">
                                <div class="cart-list__head-title">
                                    Товар
                                </div>
                            </div>
                            <div class="cart-list__li-item--available">
                                <div class="cart-list__head-title">
                                    Наличие
                                </div>
                            </div>
                            <div class=" cart-list__li-item--price">
                                <div class="cart-list__head-title">
                                    Цена
                                </div>
                            </div>
                            <div class="cart-list__li-item--spin">
                                <div class="cart-list__head-title">
                                    Количество
                                </div>
                            </div>
                            <div class=" cart-list__li-item--sum">
                                <div class="cart-list__head-title">
                                    Сумма
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <? $arBasketItems = []; ?>
                <? foreach ($arResult['ITEMS']['AnDelCanBuy'] as $arBasketItem): ?>
                    <?
                    $JSBasketItems[$arBasketItem['ID']] = [
                        "ID" => $arBasketItem['PRODUCT_ID'],
                        "NAME" => $arBasketItem['NAME'],
                    ];
                    ?>
                    <?
                    $pic = $arBasketItem['PREVIEW_PICTURE_SRC'];
                    if (!$pic && $arBasketItem['DETAIL_PICTURE_SRC']) {
                        $pic = $arBasketItem['DETAIL_PICTURE_SRC'];
                    }

                    ?>
                    <li class="cart-list__li">
                        <div class="cart-list__li-pic">
                            <? if ($pic): ?>
                                <a class="visual" href="<?= $arBasketItem['DETAIL_PAGE_URL'] ?>">
                                    <img src="<?= $pic ?>" alt="<?= $arBasketItem['NAME'] ?>"/>
                                </a>
                            <? else: ?>
                            <? endif; ?>
                        </div>
                        <div class="cart-list__li-body">
                            <div class="cart-list__li-main">
                                <div class="cart-list__li-item cart-list__li-item--info">
                                    <span class="article">
                                        Артикул: <?= $arResult['ITEMS_DATA'][$arBasketItem['PRODUCT_ID']]['ARTICLE'] ?>
                                    </span>
                                    <strong class="title">
                                        <a title="<?= $arBasketItem['NAME'] ?>"
                                           href="<?= $arBasketItem['DETAIL_PAGE_URL'] ?>">
                                            <?= $arBasketItem['NAME'] ?>
                                        </a>
                                    </strong>                                    
<? $articulPart = "RM17";
$namePart = "XB5 Кнопка";
if(strpos($arResult['ITEMS_DATA'][$arBasketItem['PRODUCT_ID']]['ARTICLE'], $articulPart) !== false || strpos($arBasketItem["NAME"], $namePart) !== false){	?>				
	
												<strong class="title">
											 <span style="color:red;size:18px;font-weight: 700;">
		<b>АКЦИЯ, СКИДКА 15%</b>
		</span>      </strong>
												
<?	}	?>
			
		
                                    <?
                                    $producerId = $arResult['ITEMS_DATA'][$arBasketItem['PRODUCT_ID']]['PRODUCER'];
                                    ?>
                                    Производитель: <a
                                            href="<?= $arResult['BRANDS_DATA'][$producerId]['URL'] ?>"><?= $arResult['BRANDS_DATA'][$producerId]['NAME'] ?></a>
                                </div>
                                <div class="cart-list__li-item cart-list__li-item--available">
                                    <div class="col-inner">
                                        <? if (intval($arBasketItem['AVAILABLE_QUANTITY']) > 0): ?>
                                            <span class="available">В наличии</span>
                                        <? else: ?>
                                            <span class="not-available">Под заказ</span>
                                        <? endif; ?>
                                    </div>
                                </div>
                                <div class="cart-list__li-item cart-list__li-item--price">
                                    <div class="col-inner">
                                        <div class="current_price"><?= number_format(($arBasketItem['BASE_PRICE']), 2, '.', ' ') ?>
                                            Р
                                        </div>
                                    </div>
                                </div>

                                <?if($arBasketItem['DISCOUNT_PRICE_PERCENT'] == 100){?>
                                    <div class="cart-list__li-item cart-list__li-item--gift spinner-holder">
                                        Подарок
                                    </div>
                                <?} else {?>

                                    <div class="cart-list__li-item cart-list__li-item--spin spinner-holder">
                                        <div class="col-inner basket-quantity">
                                            <input class="spinner basket-item-quantity"
                                                   data-id="<?= $arBasketItem['ID'] ?>"
                                                   data-coupon="<?= !empty($arResult['COUPON_LIST']) ? $arResult['COUPON_LIST']['ID'] : 'false'; ?>"
                                                   data-price="<?= $arBasketItem['BASE_PRICE'] ?>"
                                                   data-discount="<?= $arBasketItem['DISCOUNT_PRICE'] ?>"
                                                   data-multiplicity="<?= $arBasketItem['MEASURE_RATIO'] ?>" type="text"
                                                   value="<?= $arBasketItem['QUANTITY'] ?>"
                                                    <?if($arBasketItem['MEASURE_RATIO']>1):?>
                                                    readonly
                                                    data-step="<?=$arBasketItem['MEASURE_RATIO']?>"

                                                    <?endif;?>
                                                   min="<?=$arBasketItem['MEASURE_RATIO']?>"
                                            />
                                            <?if($arBasketItem['MEASURE_RATIO']>1):?>
                                            <div class="clearfix"></div>
                                            <span class="cart-multiplicity">кратность <?=$arBasketItem['MEASURE_RATIO']?></span>
                                            <?endif;?>
                                        </div>
                                    </div>
                                    <div class="cart-list__li-item cart-list__li-item--sum">
                                        <div class="col-inner">
                                             <span>
                                                 <span class="sum"><?= number_format($arBasketItem['BASE_PRICE'] * $arBasketItem['QUANTITY'], 2, '.', ' ') ?></span>
                                             Р</span>
                                        </div>
                                    </div>

                                <?}?>
                            </div>
                            <div class="cart-list__li-del">

                                <?
                                $js_class = ($arBasketItem['DISCOUNT_PRICE_PERCENT'] == 100) ? '' : 'js-delete';
                                ?>

                                <a class="<?=$js_class?>"
                                   href="?basketAction=delete&id=<?= $arBasketItem['ID'] ?>">Удалить</a>
                            </div>
                        </div>
                    </li>
                <? endforeach; ?>
            </ul>

            <div id="gifts_block">

                <?
                if($_GET['AJAX'] == 'Y'){
                    $APPLICATION->RestartBuffer();
                }
                ?>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:sale.gift.basket", 
                    "gifts", 
                    array(
                        "SHOW_PRICE_COUNT" => "1",
                        "PRODUCT_SUBSCRIPTION" => "N",
                        "PRODUCT_ID_VARIABLE" => "id",
                        "PARTIAL_PRODUCT_PROPERTIES" => "N",
                        "USE_PRODUCT_QUANTITY" => "N",
                        "ACTION_VARIABLE" => "actionGift",
                        "ADD_PROPERTIES_TO_BASKET" => "Y",
                        "BASKET_URL" => $APPLICATION->GetCurPage(),
                        "APPLIED_DISCOUNT_LIST" => $arResult["APPLIED_DISCOUNT_LIST"],
                        "FULL_DISCOUNT_LIST" => $arResult["FULL_DISCOUNT_LIST"],
                        "TEMPLATE_THEME" => "blue",
                        "PRICE_VAT_INCLUDE" => "N",
                        "CACHE_GROUPS" => "N",
                        "BLOCK_TITLE" => $arParams["GIFTS_BLOCK_TITLE"],
                        "HIDE_BLOCK_TITLE" => "N",
                        "TEXT_LABEL_GIFT" => $arParams["GIFTS_TEXT_LABEL_GIFT"],
                        "PRODUCT_QUANTITY_VARIABLE" => $arParams["GIFTS_PRODUCT_QUANTITY_VARIABLE"],
                        "PRODUCT_PROPS_VARIABLE" => $arParams["GIFTS_PRODUCT_PROPS_VARIABLE"],
                        "SHOW_OLD_PRICE" => "Y",
                        "SHOW_DISCOUNT_PERCENT" => "Y",
                        "SHOW_NAME" => "Y",
                        "SHOW_IMAGE" => "Y",
                        "MESS_BTN_BUY" => $arParams["GIFTS_MESS_BTN_BUY"],
                        "MESS_BTN_DETAIL" => $arParams["GIFTS_MESS_BTN_DETAIL"],
                        "PAGE_ELEMENT_COUNT" => $arParams["GIFTS_PAGE_ELEMENT_COUNT"],
                        "CONVERT_CURRENCY" => "Y",
                        "HIDE_NOT_AVAILABLE" => "N",
                        "LINE_ELEMENT_COUNT" => $arParams["GIFTS_PAGE_ELEMENT_COUNT"],
                        "COMPONENT_TEMPLATE" => ".default",
                        "IBLOCK_TYPE" => "1c_catalog",
                        "IBLOCK_ID" => "83",
                        "SHOW_FROM_SECTION" => "N",
                        "SECTION_ID" => $GLOBALS["CATALOG_CURRENT_SECTION_ID"],
                        "SECTION_CODE" => "",
                        "SECTION_ELEMENT_ID" => $GLOBALS["CATALOG_CURRENT_ELEMENT_ID"],
                        "SECTION_ELEMENT_CODE" => "",
                        "DEPTH" => "2",
                        "MESS_BTN_SUBSCRIBE" => "",
                        "DETAIL_URL" => "",
                        "CACHE_TYPE" => "N",
                        "CACHE_TIME" => "36000000",
                        "PRICE_CODE" => array(
                            0 => "Московский филиал",
                        ),
                        "SHOW_PRODUCTS_10" => "N",
                        "PROPERTY_CODE_10" => array(
                        ),
                        "CART_PROPERTIES_10" => array(
                        ),
                        "ADDITIONAL_PICT_PROP_10" => "MORE_PHOTO",
                        "SHOW_PRODUCTS_24" => "Y",
                        "PROPERTY_CODE_24" => array(
                        ),
                        "CART_PROPERTIES_24" => array(
                        ),
                        "ADDITIONAL_PICT_PROP_24" => "MORE_PHOTO_BACK",
                        "SHOW_PRODUCTS_52" => "Y",
                        "PROPERTY_CODE_52" => array(
                        ),
                        "CART_PROPERTIES_52" => array(
                        ),
                        "ADDITIONAL_PICT_PROP_52" => "MORE_PHOTO_BACK",
                        "SHOW_PRODUCTS_66" => "Y",
                        "PROPERTY_CODE_66" => array(
                            0 => "",
                            1 => "",
                        ),
                        "CART_PROPERTIES_66" => array(
                            0 => "",
                            1 => "EWAY_1488",
                            2 => "",
                        ),
                        "ADDITIONAL_PICT_PROP_66" => "",
                        "SHOW_PRODUCTS_83" => "Y",
                        "PROPERTY_CODE_83" => array(
                            0 => "PRODUCER",
                            1 => "",
                        ),
                        "CART_PROPERTIES_83" => array(
                            0 => "PRODUCER",
                            1 => "",
                        ),
                        "ADDITIONAL_PICT_PROP_83" => "GALLERY",
                        "CURRENCY_ID" => "RUB"
                    ),
                    false
                );?>

                <?
                if($_GET['AJAX'] == 'Y'){
                    die();
                }
                ?>
            </div>

        </div>
        <div class="cart-right">
            <div class="cart-info" id="js-cartInfo">
                <div class="cart-info__total">
                    Товаров: <strong><?= $arResult['ROOT']['QUANTITY'] ?></strong> на сумму
                    <strong>
                        <span id="order-sum"
                              data-num="<?= $arResult['PRICE_WITHOUT_DISCOUNT'] ?>"><?= number_format($arResult['PRICE_WITHOUT_DISCOUNT'], 2, '.', ' ') ?></span>
                    </strong>
                    рублей
                </div>


                <div class="cart-info__sale">

                    <?if($arResult['FULL_DISCOUNT_LIST']['64']):?>
                        <div class="cart-info__sale-title">Итого с учетом скидки: 20%</div>
					<?elseif($arResult["DISCOUNT_PRICE_ALL"] == 0):?>
						<div class="cart-info__sale-title">Итого:</div>
                    <?else:?>
                        <div class="cart-info__sale-title">Итого с учетом скидки:</div>
                    <?endif;?>

                    <div class="cart-info__sale-price">
                        <span id="order-total"><?= number_format($arResult['PRICE_WITHOUT_DISCOUNT'] - $arResult['DISCOUNT_PRICE_ALL'], 2, '.', ' ') ?></span>
                        р.
                    </div>
                </div>
                <?/*
                <div class="cart-info__timeline <? if (!empty($arResult['COUPON_LIST'])): ?> is-hide<? endif ?>">
                    <div class="cart-info__timeline-item">
                        <div class="cart-info__timeline-percent">3%</div>
                        <div class="cart-info__timeline-circle <? if ($arResult['PRICE_WITHOUT_DISCOUNT'] >= 3000): ?>is-active<? endif; ?>"></div>
                        <div class="cart-info__timeline-line">
                            <div class="cart-info__timeline-line__bg"
                                 style="width:<?= $arResult['ROOT']['TIMELINE'][3] ? $arResult['ROOT']['TIMELINE'][3] : '100' ?>%"></div>
                        </div>
                        <div class="cart-info__timeline-price">3000р.</div>
                    </div>
                    <div class="cart-info__timeline-item">
                        <div class="cart-info__timeline-percent">7%</div>
                        <div class="cart-info__timeline-circle <? if ($arResult['PRICE_WITHOUT_DISCOUNT'] >= 7000): ?>is-active<? endif; ?>"></div>
                        <div class="cart-info__timeline-line">
                            <div class="cart-info__timeline-line__bg"
                                <? if ($arResult['ROOT']['TIMELINE'][7] || !$arResult['ROOT']['TIMELINE'][3] || !$arResult['ROOT']['TIMELINE']): ?>
                                    style="width:<?= $arResult['ROOT']['TIMELINE'][7] ? $arResult['ROOT']['TIMELINE'][7] : '100' ?>%"
                                <? endif ?>
                            ></div>
                        </div>
                        <div class="cart-info__timeline-price">7000р.</div>
                    </div>
                    <div class="cart-info__timeline-item">
                        <div class="cart-info__timeline-percent">10%</div>
                        <div class="cart-info__timeline-circle <? if ($arResult['PRICE_WITHOUT_DISCOUNT'] >= 10000): ?>is-active<? endif; ?>"></div>
                        <div class="cart-info__timeline-line">
                            <div class="cart-info__timeline-line__bg"
                                <? if ($arResult['ROOT']['TIMELINE'][10] || $arResult['ROOT']['TIMELINE'][15] || !$arResult['ROOT']['TIMELINE']): ?>
                                    style="width:<?= $arResult['ROOT']['TIMELINE'][10] ? $arResult['ROOT']['TIMELINE'][10] : '100' ?>%"
                                <? endif ?>
                            ></div>
                        </div>
                        <div class="cart-info__timeline-price">10000р.</div>
                    </div>
                    <div class="cart-info__timeline-item">
                        <div class="cart-info__timeline-percent">15%</div>
                        <div class="cart-info__timeline-circle <? if ($arResult['PRICE_WITHOUT_DISCOUNT'] >= 15000): ?>is-active<? endif; ?>"></div>
                        <div class="cart-info__timeline-line">
                            <div class="cart-info__timeline-line__bg"
                                <? if (!$arResult['ROOT']['TIMELINE']): ?>
                                    style="width:100%"
                                <? else: ?>
                                    style="width:<?= $arResult['ROOT']['TIMELINE'][15] ? $arResult['ROOT']['TIMELINE'][15] : '0' ?>%"
                                <? endif ?>

                            ></div>
                        </div>
                        <div class="cart-info__timeline-price">15000р.</div>
                    </div>
                </div>
                */?>

                <?/*if($arResult['FULL_DISCOUNT_LIST']['64']):?>
                  
                  <div class="cart-info__timeline-info <? if (!$arResult['ROOT']['TIMELINE']): ?>is-hidden<? endif; ?> <? if (!empty($arResult['COUPON_LIST'])): ?> is-hide<? endif ?>">
                      Дополните заказ на
                      <strong><?= number_format($arResult['ROOT']['PRICE_FOR_DISCOUNT'], 2, '.', ' ') ?></strong>
                      р.<br>
                      чтобы получить скидку <strong>20%*</strong>
                  </div>

                <?else:?>

                  <div class="cart-info__timeline-info <? if (!$arResult['ROOT']['TIMELINE']): ?>is-hidden<? endif; ?> <? if (!empty($arResult['COUPON_LIST'])): ?> is-hide<? endif ?>">
                      Дополните заказ на
                      <strong><?= number_format($arResult['ROOT']['PRICE_FOR_DISCOUNT'], 2, '.', ' ') ?></strong>
                      р.<br>
                      чтобы получить скидку <strong><?= $arResult['ROOT']['PERCENT'] ?>%*</strong>
                  </div>

                <?endif;*/?>



                <div class="cart-info__delivery <? if ($arResult['PRICE_WITHOUT_DISCOUNT'] > 5000): ?>is-visible<? endif; ?>">
                    Вам доступна <strong>бесплатная</strong> доставка
                </div>

                <div class="cart-info__promo">
                    <div class="form-promo-code">
                        <fieldset>
                            <div class="input-holder">
                                <input id="coupon"
                                       name="COUPON"
                                       placeholder="Промокод"
                                       type="text"/>
                            </div>
                            <button class="button" onclick="enterCoupon();">Применить</button>
                            <div class="clearfix"></div>
                            <div id="js-couponError" class="cart-info__coupon-error">Такого промокода не существует
                            </div>
                            <div id="js-couponOk" class="cart-info__coupon-ok">Ваша скидка больше промокода</div>
                            <?
                            if (!empty($arResult['COUPON_LIST'])) {
                                foreach ($arResult['COUPON_LIST'] as $oneCoupon) {
                                    $couponClass = 'disabled';
                                    switch ($oneCoupon['STATUS']) {
                                        case DiscountCouponsManager::STATUS_NOT_FOUND:
                                        case DiscountCouponsManager::STATUS_FREEZE:
                                            $couponClass = 'bad';
                                            break;
                                        case DiscountCouponsManager::STATUS_APPLYED:
                                            $couponClass = 'good';
                                            break;
                                    }
                                    ?>
                                    <div class="bx_ordercart_coupon">
                                        <input disabled readonly type="text"
                                               name="OLD_COUPON[]"
                                               value="<?= htmlspecialcharsbx($oneCoupon['COUPON']); ?>"
                                               class="<? echo $couponClass; ?>">
                                        <?/*
                                            <span
                                                    class="<? echo $couponClass; ?>"
                                                    data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>">
                                            </span>
                                        */?>
                                    </div><?
                                }
                                unset($couponClass, $oneCoupon);
                            }
                            ?>
                        </fieldset>
                    </form>
                </div>
                <a class="cart-info__btn" href="/personal/order.php">
                    Оформить заказ
                </a>
                <div class="cart-info__desc">
                    <sup>*</sup>Промокоды и скидки не суммируются<br>
                    Итоговой считается самая выгодная скидка<br>
                    <a href="#">подробнее о программе лояльности</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.basketItems = <?= \Bitrix\Main\Web\Json::encode($JSBasketItems)?>;
    </script>

    <script>
        $(function () {
            $(".js-delete").on('click', function (e) {
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
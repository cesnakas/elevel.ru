<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

use \Bitrix\Main\Text\Encoding;

$APPLICATION->SetTitle('Оформление заказа');
$APPLICATION->AddChainItem('Оформление заказа');

$orderId = intval($_GET['ORDER_ID']);

//
global $USER;

if ($orderId) {
    CModule::IncludeModule('sale');

    $order = \Bitrix\Sale\Order::load($orderId);

    if ($order) {
		// get order user
        $userId = $order->getUserId();
        $orderDate = $order->getDateInsert();


		// get current user

		/*if ($USER->IsAuthorized()) {
			if($USER->GetID() == $userId){

			} else {
				LocalRedirect("/personal/history-of-orders/");
			}
		} else {
			LocalRedirect("/personal/history-of-orders/");
		}*/
		/*if ($USER->IsAuthorized()) {

		} else {
			$USER->Authorize($userId);
			if(CSite::InGroup(array(1,3,6))){
				$USER->Logout();
				LocalRedirect("/personal/history-of-orders/");
			}
		}*/
			if (($USER->IsAuthorized())&&($USER->GetID() == $userId)) {
				/*$arFilter = Array(
        		"USER_ID" => $userId,
				);
				$db_sales = CSaleOrder::GetList(array(), $arFilter);
				while ($ar_sales = $db_sales->Fetch())
				{
					$lastorderid = $ar_sales['ID']; //присвоили переменной ID заказа
					//break;
				}
				if ($_GET['ORDER_ID']!=$lastorderid) { 
				LocalRedirect("/personal/history-of-orders/");
				}*/
			} else {
				LocalRedirect("/personal/history-of-orders/");
			}
			

        if (intval($userId) > 0) {

            $arUser = CUser::GetList(($by), ($ord), ["ID" => $userId], ["FIELDS" => ["NAME", "LAST_NAME", "EMAIL", "PERSONAL_PHONE", "WORK_PHONE"]])->Fetch();
            $email = $arUser["EMAIL"];
            $phone = (!empty($arUser["PERSONAL_PHONE"])) ? $arUser["PERSONAL_PHONE"] : $arUser["WORK_PHONE"];
            $name = $arUser["NAME"].' '.$arUser["LAST_NAME"];
        }

        $paymentCollection = $order->getPaymentCollection();
        foreach ($paymentCollection as $payment) {
            $sum = $payment->getSum(); // сумма к оплате
            $isPaid = $payment->isPaid(); // true, если оплачена
            $paysystemId = $payment->getPaymentSystemId(); // ID платежной системы
            $paysystemName = $payment->getPaymentSystemName(); // название платежной системы
        }

        $basket = $order->getBasket();
        $orderBasket = $basket->getOrderableItems();

        $items = [];
        $itemIDs = [];
        $itemId2sectionId = [];
        $itemsGa = [];
        $itemsYaEcommerce = [];
        $itemsChannelSight = [];
        $product_id2item_id = [];

        $k = 0;

        foreach ($orderBasket as $key => $basketItem) {

            // vat calculate
            $vat = null; // default
            if ($basketItem->getField('VAT_RATE') > 0)
                $vat = $basketItem->getField('VAT_RATE') * 100;

            $items[] = [
                'label' => $basketItem->getField('NAME'), //наименование товара
                'price' => number_format($basketItem->getField('PRICE'), 2, ".", ''), //цена
                'quantity' => $basketItem->getQuantity(), //количество
                'amount' => number_format(floatval($basketItem->getField('PRICE') * $basketItem->getQuantity()), 2, ".", ''), //сумма
                'vat' => $vat, // НДС
                'itemID' => $basketItem->getProductId()
            ];
            $itemsGa[] = [
                'sku' => $basketItem->getProductId(),
                'name' => $basketItem->getField('NAME'),
                'category' => '',
                'price' => number_format($basketItem->getField('PRICE'), 2, ".", ''),
                'quantity' => $basketItem->getQuantity()
            ];
//            Удалил $basketItem->getProductId()
            $itemsYaEcommerce[] = [
                "id" => $basketItem->getProductId(),
                "name" => $basketItem->getField('NAME'),
                "price" => $basketItem->getField('PRICE'),
                "quantity" => $basketItem->getQuantity()
            ];

            $productID = $basketItem->getProductId();
            if (intval($productID) > 0) {

                $arSelect = Array("ID", "NAME", "PROPERTY_MARKING_PRODUCER");
                $arFilter = Array("ID" => $productID);
                $rsProduct = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                if ($arProduct = $rsProduct->GetNext()) {
                    $productID = $arProduct['PROPERTY_MARKING_PRODUCER_VALUE'];

                }
            }


            $itemsChannelSight[$k] = [
                "Name" => $basketItem->getField('NAME'),
                // "ProductCode" => $basketItem->getProductId(),
                "ProductCode" => $productID,
                "Price" => $basketItem->getField('PRICE'),
                "Quantity" => $basketItem->getQuantity()
            ];


            $itemIDs[] = $basketItem->getProductId();
            $product_id2item_id[$basketItem->getProductId()] = $k;

            $k++;
        }

        $sectionIDs = [];
        $sectionId2sectionName = [];

        $arFilter = Array(
            "IBLOCK_ID" => CATALOG_ID,
            "ID" => $itemIDs,
        );

        $res = CIBlockElement::GetList(Array("SORT" => "ASC", "PROPERTY_PRIORITY" => "ASC"), $arFilter, Array("ID", "IBLOCK_SECTION_ID"));
        while ($ar_fields = $res->GetNext()) {
            $itemId = $product_id2item_id[$ar_fields['ID']];
            $itemId2sectionId[$itemId] = $ar_fields['IBLOCK_SECTION_ID'];

            if (!in_array($ar_fields['IBLOCK_SECTION_ID'], $sectionIDs))
                $sectionIDs[] = $ar_fields['IBLOCK_SECTION_ID'];
        }

        $arFilter = array('IBLOCK_ID' => CATALOG_ID, 'ID' => $sectionIDs);
        $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, false, array("ID", "NAME"));
        while ($arSect = $rsSect->GetNext()) {
            $sectionId2sectionName[$arSect['ID']] = $arSect['NAME'];
        }

        foreach ($itemsChannelSight as $itemId => $item) {
            $sectionId = $itemId2sectionId[$itemId];
            $sectionName = $sectionId2sectionName[$sectionId];

            if (!empty($sectionName))
                $itemsChannelSight[$itemId]["Category"] = $APPLICATION->ConvertCharset($sectionName, "windows-1251", "utf-8");
        }

        $deliveryCollection = $order->getShipmentCollection();
        $deliveryName = "";
        if ($deliveryCollection->current()->getField('DELIVERY_NAME')) {
            $deliveryName = $deliveryCollection->current()->getField('DELIVERY_NAME');
        }
        $deliveryId = "";
        if ($deliveryCollection->current()->getField('DELIVERY_ID')) {
            $deliveryId = $deliveryCollection->current()->getField('DELIVERY_ID');
        }

        if ($order->getDeliveryPrice() > 0) {
            $items[] = array(
                'label' => 'Доставка',
                'price' => number_format($order->getDeliveryPrice(), 2, ".", ''), // доставка для CloudPayment
                'quantity' => 1,
                'amount' => number_format($order->getDeliveryPrice(), 2, ".", ''),
                'vat' => 18,
            );
            $deliveryPrice = number_format($order->getDeliveryPrice(), 2, ".", ''); // доставка для GA
        }

        $data['cloudPayments']['customerReceipt']['Items'] = $items;
        $data['cloudPayments']['customerReceipt']['taxationSystem'] = '';
        $data['cloudPayments']['customerReceipt']['email'] = $email;

        ?>
        <style>
            .order-detail-note {
                font-size: 10px;
            }
        </style>
        <div class="confirm-end">
            <?// print_r($items)
            //print_r($deliveryCollection->current()); ?>

            <div class="<? if ($paysystemId == 20 && !$isPaid) echo 'cloudPaymentPendingResult'; ?>">
                <p class="confirm-payment-success-heading">Ваш заказ успешно сформирован!</p>
            </div>
            <div id="order-payment-block"
                 class="<? if ($paysystemId == 20 && !$isPaid) echo 'cloudPaymentPendingActive'; ?>">
                <div class="confirm-payment-wrapper">
                    <?/*?>
				<strong class="title">500 баллов за покупку</strong>
				<?*/
                    ?>

                    <div class="confirm-payment-left">
                        <p class="confirm-details-heading">Параметры заказа</p>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">Ваш заказ №: </span><span class="confirm-text-right"><?= $orderId ?></span></div>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">Дата создания:</span><span class="confirm-text-right"><?= $orderDate ?></span></div>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">Способ доставки:</span><span class="confirm-text-right"><?= $deliveryName ?></span>
                        </div>
						<?
                        if ($deliveryId == 1):?>
                            <div class="confirm-payment-row"><span
                                        class="confirm-text-left">Адрес самовывоза:</span><span class="confirm-text-right"><a href="/shop/shops/"><?= $order->getPropertyCollection()->getItemByOrderPropertyId(116)->getValue() ?></a></span>
                            </div>
                        <? endif; ?>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">Способ оплаты:</span><span class="confirm-text-right"><?= $paysystemName ?></span>
                            <span id="js-cloudpayments-paid"
                                  class="<?= $isPaid ? '' : 'hide' ?>">(оплачен)</span></div>
                        <?
                        if ($deliveryId != 1):?>
                            <span class="confirm-text-left">Срок доставки </span><span>от 1 до 3 рабочих дней</span>
                            <span class="order-detail-note">Срок доставки может быть увеличен в зависимости от удаленности
                                от склада и наличия товара
                            </span>
                        <? endif; ?>

                        <?
                        if ($paysystemId == 20 && !$isPaid):?>
                            <li><span class="button payments"
                                      id="js-cloudpayments">Оплатить <?= CurrencyFormat($sum, "RUB"); ?></span></li>
                        <? endif; ?>
                        <?
                        if ($paysystemId == 21 && !$isPaid):?>
                            <li><span class="button payments" id="js-credit">Купить в рассрочку</span></li>
                        <? endif; ?>

                        <?/*<li>Получатель: <strong><?=$email?></strong></li>*/
                        ?>
                    </div>
                    <div class="confirm-payment-right">
                        <p class="confirm-details-heading">Данные покупателя</p>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">Имя:</span><span class="confirm-text-right"><?= $name?></span></div>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">Телефон:</span><span class="confirm-text-right"><?= $phone ?></span></div>
                        <div class="confirm-payment-row"><span
                                    class="confirm-text-left">E-mail:</span><span class="confirm-text-right"><?= $email ?></span></div>
                    </div>
                </div>
                <div id="order-confirm-items-container">
                    <p class="confirm-items-list-heading">Содержание заказа</p>
                    <? foreach ($items as $itemKey => $itemValue) {
                        echo '<div class="item-row">';
                        echo '<div class="item-label">' . $itemValue['label'] . '</div>';
                        echo '<div class="item-quantity">' . $itemValue['quantity'] . '</div>';
                        echo '<div class="item-price">' . $itemValue['amount'] . '</div>';
                        echo '</div>';
                    }
                    ?>
                    <div class="confirm-sum-details">
                        <div class="confirm-details-row"><span
                                    class="confirm-text-left">Сумма заказа:</span><span class="confirm-text-right"><?= $sum?></span></div>
                        <div class="confirm-details-row"><span
                                    class="confirm-text-left">Доставка:</span><span class="confirm-text-right"><?= $order->getDeliveryPrice()?></span></div>
                        <div class="confirm-details-row"><span
                                    class="confirm-text-left">Итого:</span><span class="confirm-text-right"><?= $sum + $order->getDeliveryPrice()?></span></div>
                    </div>
                </div>
            </div>

        </div>
        <? if ($paysystemId == 21 && !$isPaid) {
            // $arUser = CUser::GetList(($by), ($ord), ["ID" => $USER->GetID()], ["FIELDS" => ["PERSONAL_PHONE", "WORK_PHONE"]])->Fetch();
            // $phone = (!empty($arUser["PERSONAL_PHONE"])) ? $arUser["PERSONAL_PHONE"] : $arUser["WORK_PHONE"];
            ?>
            <? /*<form id="credit-form" class="hide" action="https://loans-qa.tcsbank.ru/api/partners/v1/lightweight/create" method="post">*/ ?>
            <form id="credit-form" class="hide" action="https://loans.tinkoff.ru/api/partners/v1/lightweight/create"
                  method="post">
                <? /*<input name="shopId" value="test_online" type="hidden">*/ ?>
                <input name="shopId" value="schneider-24" type="hidden">
                <? /*<input name="showcaseId" value="test_online" type="hidden">*/ ?>
                <input name="showcaseId" value="elevel" type="hidden">
                <input name="promoCode" value="installment_0_0_6" type="hidden">
                <input id="credit-sum" name="sum" value="<?= number_format($sum, 2, ".", "") ?>" type="hidden">
                <? foreach ($items as $i => $arItem) { ?>
                    <input name="itemName_<?= $i ?>"
                           value="<?= Encoding::convertEncoding($arItem["label"], 'Windows-1251', 'UTF-8') ?>"
                           type="hidden">
                    <input name="itemQuantity_<?= $i ?>" value="<?= $arItem["quantity"] ?>" type="hidden">
                    <input name="itemPrice_<?= $i ?>" value="<?= $arItem["price"] ?>" type="hidden">
                <? } ?>
                <input name="customerEmail" value="<?= $email ?>" type="hidden">
                <input name="customerPhone" value="<?= $phone ?>" type="hidden">
                <input type="submit" value="Купи в кредит">
            </form>
        <? } ?>
        <?
        if ($_SESSION['GA_ON'] == true) {
            ?>
            <script>
                window.dataLayer = window.dataLayer || []
                dataLayer.push({
                    'transactionId': '<?= $orderId?>',
                    'transactionTotal': '<?= $sum?>',
                    'transactionTax': '<?= $arOrder["TAX_VALUE"]?>',
                    'transactionShipping': '<?= $deliveryPrice?>',
                    'transactionProducts': <?= \CUtil::PhpToJSObject($itemsGa, false, true)?>
                });

                // Yandex.Ecommerce
                dataLayerYa.push({
                    "ecommerce": {
                        "purchase": {
                            "actionField": {
                                "id": "<?= $orderId?>"
                            },
                            "products": <?= \Bitrix\Main\Web\Json::encode($itemsYaEcommerce)?>
                        }
                    }
                });
                // /Yandex.Ecommerce
            </script>
            <?
        }
        unset($_SESSION['GA_ON']);
        ?>
        <script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>
        <script type="text/javascript">
            (function () {
                function readCookie(name) {
                    if (document.cookie.length > 0) {
                        offset = document.cookie.indexOf(name + "=");
                        if (offset != -1) {
                            offset = offset + name.length + 1;
                            tail = document.cookie.indexOf(";", offset);
                            if (tail == -1) tail = document.cookie.length;
                            return unescape(document.cookie.substring(offset, tail));
                        }
                    }
                    return null;
                }

                /* Вместо строки в кавычках подставить конкретное значение */
                var order_id = '<?=$orderId?>'; /* код заказа */
                var cart_sum = '<?=$sum?>'; /* сумма заказа */

                var uid = readCookie('_lhtm_u');
                var vid = readCookie('_lhtm_r').split('|')[1];
                var url = encodeURIComponent(window.location.href);
                var path = "https://track.leadhit.io/stat/lead_form?f_orderid=" + order_id + "&url=" + url + "&action=lh_orderid&uid=" + uid + "&vid=" + vid + "&ref=direct&f_cart_sum=" + cart_sum + "&clid=5a55f34de694aa6ed4416c9a";

                var sc = document.createElement("script");
                sc.type = 'text/javascript';
                var headID = document.getElementsByTagName("head")[0];
                sc.src = path;
                headID.appendChild(sc);


                var payHandler = function () {
                    var widget = new cp.CloudPayments();
                    widget.charge({ // options
                            publicId: 'pk_7f5834dc69689bcccb5c44c4987ab',//'pk_2a4a6686b911150a604455f9ef251',
                            description: 'Оплата в elevel.ru',
                            amount: <?= $sum?>,
                            currency: 'RUB',
                            invoiceId: <?= $orderId?>,
                            email: "<?= $email?>",
                            accountId: "<?= $email?>",
                            requireEmail: true,
                            data: <?= \CUtil::PhpToJSObject($data, false, true)?>
                        },
                        function (options) { // success
                            $('#checkout-result').text('Оплата завершена');
                            $('#js-cloudpayments-paid').removeClass('hide');
                            $('#js-cloudpayments').addClass('hide');

                        },
                        function (reason, options) { // fail
                            $('#checkout-result').text('Оплата не завершена');
                        });
                };
                $('#js-cloudpayments').on("click", payHandler);
                $('#js-credit').on("click", function () {
                    $('#credit-form').submit();
                });
            })();
        </script>

        <script type="text/javascript">
            ChannelSight_Type = "OrderTracking";
            ChannelSight_Separator = ".";
            ChannelSight_IsTest = false;
            <?if (SITE_SERVER_NAME == "elevel.dev.magnitmedia.ru"): // dev ?>
            ChannelSight_IsTest = true;
            <?endif;?>
            var CS_Products = <?= \Bitrix\Main\Web\Json::encode($itemsChannelSight)?>;
            var CS_Order = {
                Currency: "RUB"
            };
        </script>
        <script type="text/javascript" src="https://tracking.channelsight.com/api/tracking/v2/Init"></script>

        <?
    }
}
?>

<?
function getPropertyByCode($propertyCollection, $code)
{
    foreach ($propertyCollection as $property) {
        if ($property->getField('CODE') == $code)
            return $property;
    }
}

?>
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>
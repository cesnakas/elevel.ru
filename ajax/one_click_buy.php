<?
$_SESSION ['GA_ON']=true;
$itemId = intval( $_POST['ITEM_ID'] );
$name = iconv( 'UTF-8', 'Windows-1251', htmlspecialchars( $_POST['NAME'] ) );
$phone = htmlspecialchars( $_POST['PHONE'] );
$email = htmlspecialchars( $_POST['EMAIL'] );
$comment = iconv( 'UTF-8', 'Windows-1251', htmlspecialchars( $_POST['COMMENT'] ) );

$arResult = array();

if ( $itemId && $name && $phone && $email )
{
	require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );
	include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php"); 
	
	global $APPLICATION;
	
	if ( !is_object( $APPLICATION ) )
	{
		$APPLICATION = new CMain;
	}
	
	global $USER;
	if ( !is_object( $USER ) )
	{
		$USER = new CUser;
	}
	
	
	
	$userId = false;
	
	if ( $USER->IsAuthorized() )
	{
		$userId = $USER->GetID();
	}
	
	// $cpt = new CCaptcha();

	// if ( !$cpt->CheckCode( $_POST['captcha_word'], $_POST['captcha_sid'] ) )
	if ( !$APPLICATION->CaptchaCheckCode( $_POST['captcha_word'], $_POST['captcha_sid'] ) )
	{
		$arResult['ERROR'][] = 'Не прошла проверка CAPTCHA.';
	}
	else
	{
		
		
		
		
		if ( !$userId )
		{
			$arUserFilter = Array(
				'EMAIL' => $email,
				'ACTIVE' => 'Y'
			);
			$arUserSelect = Array(
				'FIELDS' => Array(
					'ID'
				)
			);
			$dbUser = CUser::GetList( $by = '', $order = '', $arUserFilter, $arUserSelect );
			if ( $arUser = $dbUser->Fetch() )
			{
				$userId = $arUser['ID'];
			}
			else
			{
				$password = randString();
				
				
				$us = new CUser;
				$arUserFields = Array(
					'EMAIL' => $email,
					'LOGIN' => $email,
					'PASSWORD' => $password,
					'CONFIRM_PASSWORD' => $password,
					'NAME' => $name,
					'PERSONAL_PHONE' => $phone
				);
				$userId = $us->Add( $arUserFields );
			}
		}
		
		
		
		if ( $userId )
		{
			CModule::IncludeModule( 'catalog' );
			CModule::IncludeModule( 'sale' );
			
			
			
			CSaleBasket::DeleteAll( CSaleBasket::GetBasketUserID() );
			Add2BasketByProductID( $itemId, 1 );
			
			// текущая корзина
			$siteId = Bitrix\Main\Context::getCurrent()->getSite();
			$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
			   \Bitrix\Sale\Fuser::getId(),
			   $siteId
			);
			$basketBasePrice = $basket->getBasePrice();
			
			// получаем массив товаров в корзине
			$arProductsIds = array();
			$arOrderList = array();

			$arResult["TOTAL"]["PRICE"] = 0;
			$arResult["TOTAL"]["DISCOUNT"] = 0;

			foreach ($basket as $basketItem) {
				$arProductsIds[] = $basketItem->getProductId();
				
				$arOrderList[ $basketItem->getProductId() ] = array(
					'NAME' => $basketItem->getField('NAME'),
					'QUANTITY' => $basketItem->getQuantity(),
					'PRICE' => $basketItem->getPrice(),
				);
			}
			
			$arResult["TOTAL"]["PRICE"] = $basket->getPrice();								// Сумма с учетом скидок
			$arResult["TOTAL"]["DISCOUNT"] = $basketBasePrice - $basket->getPrice(); // Общая скидка
			
			// добавляем артикул в массив
			if ( !empty( $arProductsIds ) && CModule::IncludeModule( 'iblock' ) )
			{
				$arFilter = Array(
					'IBLOCK_ID' => 83,
					'ID' => $arProductsIds
				);
				$arSelect = Array(
					'ID',
					'PROPERTY_MARKING_PRODUCER'
				);
				$dbItems = CIBlockElement::GetList( Array(), $arFilter, false, false, $arSelect );
				while ( $arItem = $dbItems->Fetch() )
				{
					$arOrderList[$arItem['ID']]['ARTICLE'] = $arItem['PROPERTY_MARKING_PRODUCER_VALUE'];
				}
			}
			
			$paySystemId = ($_POST["CREDIT"] == "Y") ? 21 : 1;
			$paymentType = ($paySystemId == 21) ? 'Купить в рассрочку' : 'Наличными курьеру';
			
			$priceDelivery = 0;
			
			$arOrderFields = Array(
				'LID' => SITE_ID,
				'PERSON_TYPE_ID' => 1,
				'PRICE' => 0,
				'CURRENCY' => 'RUB',
				'USER_ID' => $userId,
				'PAY_SYSTEM_ID' => $paySystemId,
				'DELIVERY_ID' => 1,
				'USER_DESCRIPTION' => $comment
			);
			$orderId = CSaleOrder::Add( $arOrderFields );
			
			
			
			if ( $orderId )
			{
				CSaleBasket::OrderBasket( $orderId );
				
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 1,
					'NAME' => 'Имя',
					'CODE' => 'name',
					'VALUE' => $name
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 2,
					'NAME' => 'Телефон',
					'CODE' => 'phone',
					'VALUE' => $phone
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 19,
					'NAME' => 'E-mail',
					'CODE' => 'PHF_EMAIL',
					'VALUE' => $email
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 90,
					'NAME' => 'ID точки самовывоза',
					'CODE' => 'PICKUP_POINT_ID',
					'VALUE' => 40	//Электродная
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$orderTable = '<table>';
			
				$orderTable .= '
				<tr>
					<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Имя:</td>
					<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;">' . $name . '</td>
				</tr>';
				
				$orderTable .= '
				<tr>
					<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Телефон:</td>
					<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;">' . $phone . '</td>
				</tr>';

				$orderTable .= '
				<tr>
					<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Тип плательщика:</td>
					<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;">Физическое лицо</td>
				</tr>';
				
				$orderTable .= '
				<tr>
					<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Способ оплаты:</td>
					<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;text-transform:uppercase;">' . $paymentType . '</td>
				</tr>';
				
				$orderTable .= '
				<tr>
					<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Способ доставки:</td>
					<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;text-transform:uppercase;">Самовывоз</td>
				</tr>';
				
				$orderTable .='</table>';
				
				
				$orderList = '<table style="width:99%;margin:0 auto 30px;border-spacing:0;">
					<tr>
						<td style="width:508px;font-weight:bold;font-size:13px;">Наименование</td>
						<td style="width:98px;font-weight:bold;font-size:13px;">Цена</td>
						<td style="width:98px;font-weight:bold;font-size:13px;">Артикул</td>
						<td style="width:40px;font-weight:bold;font-size:13px;">Шт.</td>
					</tr>';
					
				foreach ( $arOrderList as $arItem )
				{
					$orderList .= '
					<tr>
						<td style="text-align:right;padding-right:30px;font-size:13px;border:1px solid #bcbcbc;height:40px;">
							' . $arItem['NAME'] . '
						</td>
						<td style="font-size:13px;border-top:1px solid #bcbcbc;border-bottom:1px solid #bcbcbc;padding-left:10px;">
							' . $arItem['PRICE'] . '
						</td>
						<td style="font-size:13px;border-top:1px solid #bcbcbc;border-left:1px solid #bcbcbc;border-bottom:1px solid #bcbcbc;padding-left:10px;">
							' . $arItem['ARTICLE'] . '
						</td>
						<td style="font-size:13px;border:1px solid #bcbcbc;padding-left:10px;">
							' . $arItem['QUANTITY'] . '
						</td>
					</tr>';
				}
				
				$orderList .= '
				<tr>
					<td style="text-align:right;padding-right:30px;font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;height:30px;font-weight:bold;">
						Сумма заказа
					</td>
					<td style="font-size:13px;padding-left:10px;">
						' . number_format(( $arResult['TOTAL']['PRICE'] + $arResult['TOTAL']['DISCOUNT'] ), 2, '.', ' ' ) . ' руб.
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;padding-left:10px;">
						&nbsp;
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;padding-left:10px;">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td style="text-align:right;padding-right:30px;font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;height:30px;font-weight:bold;">
						Скидка
					</td>
					<td style="font-size:13px;padding-left:10px;">
						' . number_format($arResult['TOTAL']['DISCOUNT'], 2, '.', ' ' ) . ' руб.
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;padding-left:10px;">
						&nbsp;
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;padding-left:10px;">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td style="text-align:right;padding-right:30px;font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;height:30px;font-weight:bold;">
						Доставка
					</td>
					<td style="font-size:13px;padding-left:10px;">
						' . number_format($priceDelivery, 2, '.', ' ' ) . ' руб.
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;padding-left:10px;">
						&nbsp;
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;padding-left:10px;">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td style="text-align:right;padding-right:30px;font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;border-bottom:1px solid #bcbcbc;height:30px;font-weight:bold;">
						Итого
					</td>
					<td style="font-size:13px;padding-left:10px;border-bottom:1px solid #bcbcbc;">
						' . number_format(($arResult['TOTAL']['PRICE'] + $priceDelivery), 2, '.', ' ' ) . ' руб.
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;padding-left:10px;border-bottom:1px solid #bcbcbc;">
						&nbsp;
					</td>
					<td style="font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;padding-left:10px;border-bottom:1px solid #bcbcbc;">
						&nbsp;
					</td>
				</tr>';

				$orderList .= '</table>';
				
				
				$arSendFields = Array(
					'ORDER_ID' => $orderId,
					'ORDER_TABLE' => $orderTable,
					'ORDER_LIST' => $orderList
				);
				CEvent::Send( 'ONE_CLICK_BUY', SITE_ID, $arSendFields );

				$text = "Спасибо, Ваш заказ принят! В ближайшее время с вами свяжется наш менеджер.";
				if ($_POST["CREDIT"] === "Y")
					$text .= " Сейчас вы будете перенаправлены на страницу банка.";
				
				// $buffer = "
				$arResult['RESULT'] = "
					$( '#buy-one-click .error-holder' ).hide();
					$( '#buy-one-click' ).html( '" . $text ."' );
					
					window.dataLayer = window.dataLayer || []
					dataLayer.push({
						'transactionId': '".$orderId."',
						'transactionTotal': '".$arOrder["PRICE"]."',
						'transactionTax': '".$arOrder["TAX_VALUE"]."',
						'transactionShipping': '".$arOrder["PRICE_DELIVERY"]."',
						'transactionProducts': [ ";
							$arItems=array();
							$arIds=array();
							$basItems=CSaleBasket::GetList(array(),array('ORDER_ID'=>$orderId));
							while($basItem=$basItems->Fetch()){
							// $buffer .= "
							$arResult['RESULT'] .= "
				
							{
								'sku': '".$basItem["PRODUCT_ID"]."',
								'name': '".str_replace("'",'"',$basItem["NAME"])."',
								'category': '',
								'price': '".$basItem["PRICE"]."',
								'quantity': '".$basItem["QUANTITY"]."'
							},";}
				// $buffer .= "		]
				$arResult['RESULT'] .= "		]
					});";
					
				$itemsYaEcommerce = [];
				$order = \Bitrix\Sale\Order::load($orderId);

				if ($order)
				{
					$basket = $order->getBasket();
					$orderBasket = $basket->getOrderableItems();
					
					foreach ($orderBasket as $key => $basketItem)
					{
						$itemsYaEcommerce[] = [
							"id" => $basketItem->getProductId(),
							"name" => $basketItem->getField('NAME'),
							"price" => $basketItem->getField('PRICE'),
							"quantity" => $basketItem->getQuantity()
						];
					}
					
					// Yandex.Ecommerce
					 $arResult['RESULT'] .= '
					 dataLayerYa.push({
						"ecommerce": {
						  "purchase": {
							"actionField": {
							  "id" : "'. $orderId .'"
							},
							"products": ' . \Bitrix\Main\Web\Json::encode($itemsYaEcommerce) . '
						  }
						}
					  });';
					  // /Yandex.Ecommerce
				}

				if ($_POST["CREDIT"] == "Y") {
					$arResult['RESULT'] .= "setTimeout(function() {\$('#credit-form').submit();}, 3000);";
				}
				// echo $buffer;
				unset($_SESSION['GA_ON']); 
			}
		}
	}
}

if(!empty($arResult['ERROR'])){
	
	$strError = "";
	foreach($arResult['ERROR'] as $error){
		$strError .= $error . "<br/>";
	}
	$arResult['RESULT'] = "$( '#buy-one-click .error-holder' ).html( '" . $strError . "' ); $( '#buy-one-click .error-holder' ).show();";
	
}

echo $arResult['RESULT'];
?>
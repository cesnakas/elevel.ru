<?
use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem,
	Bitrix\Sale\Delivery\Services;

global $USER;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

$siteId = Context::getCurrent()->getSite();
$currencyCode = CurrencyManager::getBaseCurrency();

// текущая корзина
$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
   \Bitrix\Sale\Fuser::getId(),
   $siteId
);

// если пустая, редирект
if ( !$basket->getPrice() )
{
	LocalRedirect( '/personal/basket.php' );
}

// получаем массив товаров в корзине
$arProductsIds = array();
$arOrderList = array();

$arResult["TOTAL"]["PRICE"] = 0;
$arResult["TOTAL"]["DISCOUNT"] = 0;

$arBasketItems = array();
$dbBasketItems = CSaleBasket::GetList(array("NAME" => "ASC","ID" => "ASC"),array("FUSER_ID" => CSaleBasket::GetBasketUserID(),"LID" => SITE_ID,"ORDER_ID" => "NULL", 'CAN_BUY' => 'Y'),false,false,array("ID", "NAME", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "DELAY", "CAN_BUY", "PRICE", "WEIGHT"));
while ($arItems = $dbBasketItems->Fetch())
{if (strlen($arItems["CALLBACK_FUNC"]) > 0){CSaleBasket::UpdatePrice($arItems["ID"], $arItems["CALLBACK_FUNC"], $arItems["MODULE"], $arItems["PRODUCT_ID"], $arItems["QUANTITY"]);$arItems = CSaleBasket::GetByID($arItems["ID"]);}
$arBasketItems[] = $arItems;}

if(is_array($_SESSION['CATALOG_USER_COUPONS'])){
$arBasketItems = calculateOrder($arBasketItems);
$arBasketItems = $arBasketItems['BASKET_ITEMS'];	
}

foreach($arBasketItems as $basketItem){
	$arProductsIds[] = $basketItem['PRODUCT_ID'];
	
	$arOrderList[ $basketItem['PRODUCT_ID'] ] = array(
		'NAME' => $basketItem['NAME'],
		'QUANTITY' => $basketItem['QUANTITY'],
		'PRICE' => $basketItem['BASE_PRICE'],
    );
	
	$arResult["TOTAL"]["PRICE"] += $basketItem['PRICE'] * $basketItem['QUANTITY'];
	$arResult["TOTAL"]["DISCOUNT"] += $basketItem['DISCOUNT_PRICE'] * $basketItem['QUANTITY'];
}

/*
foreach ($basket as $basketItem) {
	$arProductsIds[] = $basketItem->getProductId();
	
	$arOrderList[ $basketItem->getProductId() ] = array(
		'NAME' => $basketItem->getField('NAME'),
		'QUANTITY' => $basketItem->getQuantity(),
		'PRICE' => $basketItem->getPrice(),
    );
}
*/
//pokroman: скидка 5% от 10000 руб
$priceDiscount = 10000;

//$arResult["TOTAL"]["PRICE"] = $basket->getPrice();								// Сумма с учетом скидок
//$arResult["TOTAL"]["DISCOUNT"] = $basket->getBasePrice() - $basket->getPrice(); // Общая скидка

if ( $arResult['TOTAL']['PRICE'] > $priceDiscount && !is_array($_SESSION['CATALOG_USER_COUPONS']) ):
	$arResult['TOTAL']['DISCOUNT'] += $arResult['TOTAL']['PRICE'] * 0.05;
	$arResult['TOTAL']['PRICE'] *= 0.95;	
endif;

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

$arResult["ERRORS"] = "";

$arResult['USER_INFO'] = Array();

// если юзер авторизован, берем данные
if ( $USER->IsAuthorized() )
{
	$arFilter = Array(
		'ID' => $USER->GetID()
	);
	$arSelect = Array(
		'FIELDS' => Array(
			'NAME',
			'LAST_NAME',
			'SECOND_NAME',
			'PERSONAL_PHONE',
			'EMAIL',
			'WORK_COMPANY'
		),
		'SELECT' => Array(
			'UF_INN',
			'UF_KPP',
			'UF_LEGAL_ADDRESS',
			'UF_ACTUAL_ADDRESS',
			'UF_MAILING_ADDRESS',
			//'UF_CHECKING_ACCOUNT',
			//'UF_BANK_NAME',
			//'UF_BIK',
			//'UF_CADASTRE_ACCOUNT',
			'UF_COMPANY_NAME_WITH',
			'UF_COMPANY_OPF',
			'UF_COMPANY_SHORTNAME'
		)
	);
	$dbUser = CUser::GetList( $by = '', $order = '', $arFilter, $arSelect );
	if ( $arUser = $dbUser->Fetch() )
	{
		$fio = '';
		
		if ( $arUser['LAST_NAME'] )
		{
			$fio .= $arUser['LAST_NAME'];
		}
		
		if ( $arUser['NAME'] )
		{
			if ( $fio )
			{
				$fio .= ' ';
			}
			
			$fio .= $arUser['NAME'];
		}
		
		if ( $arUser['SECOND_NAME'] )
		{
			if ( $fio )
			{
				$fio .= ' ';
			}
			
			$fio .= $arUser['SECOND_NAME'];
		}
		
		
		$arResult['USER_INFO'] = Array(
			'FIO' => $fio,
			'PHONE' => $arUser['PERSONAL_PHONE'],
			'EMAIL' => $arUser['EMAIL'],
			'INN' => $arUser['UF_INN'],
			'COMPANY_NAME' => $arUser['WORK_COMPANY'],
			'KPP' => $arUser['UF_KPP'],
			'LEGAL_ADDRESS' => $arUser['UF_LEGAL_ADDRESS'],
			'ACTUAL_ADDRESS' => $arUser['UF_ACTUAL_ADDRESS'],
			'MAILING_ADDRESS' => $arUser['UF_MAILING_ADDRESS'],
			//'CHECKING_ACCOUNT' => $arUser['UF_CHECKING_ACCOUNT'],
			//'BANK_NAME' => $arUser['UF_BANK_NAME'],
			//'BIK' => $arUser['UF_BIK'],
			//'CADASTRE_ACCOUNT' => $arUser['UF_CADASTRE_ACCOUNT'],
			'COMPANY_NAME_WITHOUT_OPF' => $arUser['UF_COMPANY_NAME_WITH'],
			'COMPANY_OPF' => $arUser['UF_COMPANY_OPF'],
			'COMPANY_NAME_SHORT' => $arUser['UF_COMPANY_SHORTNAME'],
		);
	}
}


// берем данные по пунктам самовывоза
$arResult['PICKUP'] = Array();

$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$cityName = $obLocation->getCity();

if ( $cityName == 'Москва' )
{
	CModule::IncludeModule( 'iblock' );
	
	
	$arPickupsSort = Array(
		'SORT' => 'ASC',
		'ID' => 'ASC'
	);
	$arPickupsFilter = Array(
		'IBLOCK_ID' => 118,
		'ACTIVE' => 'Y'
	);
	$arPickupsSelect = Array(
		'EXTERNAL_ID',
		'NAME'
	);
	$dbPickups = CIBlockElement::GetList( $arPickupsSort, $arPickupsFilter, false, false, $arPickupsSelect );
	while ( $arPickup = $dbPickups->Fetch() )
	{
		$arResult['PICKUP'][] = Array(
			'NAME' => $arPickup['NAME'],
			'ID' => $arPickup['EXTERNAL_ID']
		);
	}
}





if ( $_POST['submit'] == 'y' )
{
	// стоимость доставки
	$priceDelivery = 0;
	//if ( $_POST['delivery_type'] == 'delivery' && !$_POST['delivery_company'] )
	if ( $_POST['delivery_type'] == 'delivery' )
	{
		$priceDelivery = 490;
	}
	
	
	
	$arFio = explode( ' ', $_POST['fio'] );
	
	$sendEmail = false;
	
	// если юзер авторизован, берем данные
	if ( $USER->IsAuthorized() )
	{
		$userId = $USER->GetID();
		
		$us = new CUser;
		$arUserFields = Array(
			'NAME' => $arFio[1],
			'LAST_NAME' => $arFio[0],
			'SECOND_NAME' => $arFio[2],
			'EMAIL' => $_POST['email'],
			'PERSONAL_PHONE' => $_POST['phone'],
			'WORK_COMPANY' => $_POST['company_name'],
			'UF_INN' => $_POST['inn'],
			'UF_KPP' => $_POST['kpp'],
			'UF_LEGAL_ADDRESS' => $_POST['legal_address'],
			'UF_ACTUAL_ADDRESS' => $_POST['actual_address'],
			'UF_MAILING_ADDRESS' => $_POST['mailing_address'],
			//'UF_CHECKING_ACCOUNT' => $_POST['checking_account'],
			//'UF_BANK_NAME' => $_POST['bank_name'],
			//'UF_BIK' => $_POST['bik'],
			//'UF_CADASTRE_ACCOUNT' => $_POST['cadastre_account'],
			'UF_COMPANY_NAME_WITH' => $_POST['company_name_without_opf'],
			'UF_COMPANY_OPF' => $_POST['company_opf'],
			'UF_COMPANY_SHORTNAME' => $_POST['company_name_short'],
		);
		$us->Update( $userId, $arUserFields );
		
		$userLogin = $USER->GetLogin();
	}
	else // если юзер не авторизован, регистрируем, авторизовываем и берем данные
	{
		$sendEmail = true;
		
		
		$arUserFilter = Array(
			'EMAIL' => $_POST['email'],
			'ACTIVE' => 'Y'
		);
		$arUserSelect = Array(
			'FIELDS' => Array(
				'ID',
				'LOGIN'
			)
		);
		$dbUser = CUser::GetList( $by = '', $order = '', $arUserFilter, $arUserSelect );
		if ( $arUser = $dbUser->Fetch() )
		{
			$userId = $arUser['ID'];
			
			$userLogin = $arUser['LOGIN'];
		}
		else
		{
			$password = randString();
		
			$us = new CUser;
			$arUserFields = Array(
				'LOGIN' => $_POST['email'],
				'PASSWORD' => $password,
				'CONFIRM_PASSWORD' => $password,
				'NAME' => $arFio[1],
				'LAST_NAME' => $arFio[0],
				'SECOND_NAME' => $arFio[2],
				'EMAIL' => $_POST['email'],
				'PERSONAL_PHONE' => $_POST['phone'],
				'WORK_COMPANY' => $_POST['company_name'],
				'UF_INN' => $_POST['inn'],
				'UF_KPP' => $_POST['kpp'],
				'UF_LEGAL_ADDRESS' => $_POST['legal_address'],
				'UF_ACTUAL_ADDRESS' => $_POST['actual_address'],
				'UF_MAILING_ADDRESS' => $_POST['mailing_address'],
				//'UF_CHECKING_ACCOUNT' => $_POST['checking_account'],
				//'UF_BANK_NAME' => $_POST['bank_name'],
				//'UF_BIK' => $_POST['bik'],
				//'UF_CADASTRE_ACCOUNT' => $_POST['cadastre_account'],
				'UF_COMPANY_NAME_WITH' => $_POST['company_name_without_opf'],
				'UF_COMPANY_OPF' => $_POST['company_opf'],
				'UF_COMPANY_SHORTNAME' => $_POST['company_name_short'],
			);
			$userId = $us->Add( $arUserFields );
			
			$userLogin = $_POST['email'];
		}
		

		
		if (intval($userId) > 0)
			$USER->Authorize( $userId );
		else
			$arResult["ERRORS"] .= $us->LAST_ERROR;
		
	}
	
	$order = Order::create($siteId, $USER->GetID());				// создаем заказ
	$order->setPersonTypeId(intval( $_POST['ownership'] )); 		// тип покупателя
	$order->setField('CURRENCY', $currencyCode); 					// валюта
	if ($_POST['comment']) {
		$order->setField('USER_DESCRIPTION', $_POST['comment']);	// комментарий
	}

	$order->setBasket($basket); // привязываем корозину к заказу
	
	// Создаём отгрузку
	$shipmentCollection = $order->getShipmentCollection();
	$shipment = $shipmentCollection->createItem();
	$shipmentItemCollection = $shipment->getShipmentItemCollection();
	
	foreach ($order->getBasket() as $item)
	{
		$shipmentItem = $shipmentItemCollection->createItem($item);
		$shipmentItem->setQuantity($item->getQuantity());
	}
	$shipmentCollection = $shipment->getCollection();

	switch ( $_POST['delivery_type'] )
	{
		case 'pickup':
			$deliveryId = 1;
			$deliveryType = 'Самовывоз';
			break;
			
		case 'delivery':
			$deliveryId = 26;
			$deliveryType = 'Доставка';
			break;
			
		case 'tk-terminal':
			$deliveryId = 27;
			$deliveryType = 'ТК до терминала';
			break;
			
		case 'tk-client':
			$deliveryId = 28;
			$deliveryType = 'ТК до клиента';
			break;
	}
	
	$deliveryServiceId = DeliveryId($deliveryId);
    $arFields = Array(
        'DELIVERY_ID' => $deliveryServiceId,
        'DELIVERY_NAME' => $deliveryType,
        'CURRENCY' => $order->getCurrency(),
        'PRICE_DELIVERY' => $priceDelivery,
        'BASE_PRICE_DELIVERY' => $priceDelivery,
        'CUSTOM_PRICE_DELIVERY' => 'Y'
    );
    $shipment->setFields( $arFields );

	// Создаём оплату
	switch ( $_POST['payment'] )
	{
		case 'card':
			$paymentId = 19;
			$paymentType = 'Оплата картой на сайте';
			break;
			
		case 'cashless':
			$paymentId = 2;
			$paymentType = 'Безналичный расчет';
			break;
			
		case 'courier':
			$paymentId = 1;
			$paymentType = 'Наличными курьеру';
			break;
			
		case 'cash':
			$paymentId = 8;
			$paymentType = 'Наличными в кассе офиса';
			break;
	}
	
	/*$paymentCollection = $order->getPaymentCollection();
	$payment = $paymentCollection->createItem();
	$paySystemService = PaySystem\Manager::getObjectById($paymentId);
	$payment->setFields(array(
		'PAY_SYSTEM_ID' => $paySystemService->getField("PAY_SYSTEM_ID"),
		'PAY_SYSTEM_NAME' => $paySystemService->getField("NAME"),
		"SUM" => $order->getPrice(),
		"CURRENCY" => $order->getCurrency()
		
		//'PAY_SYSTEM_NAME' => $paymentType,
	));*/
	
    $paymentCollection = $order->getPaymentCollection();
    $payment = $paymentCollection->createItem(
		Bitrix\Sale\PaySystem\Manager::getObjectById($paymentId)
	);    

    $payment->setField("SUM", $order->getPrice());
    $payment->setField("CURRENCY", $order->getCurrency());
	
	if (strlen($arResult["ERRORS"]) <= 0)
	{		
		// Установка свойств
		$propertyCollection = $order->getPropertyCollection();

		$orderDate = ConvertTimeStamp( time(), 'FULL' );
		
		$_POST['phone'] = str_replace( Array( '+7' ), '8', $_POST['phone'] );
		$_POST['phone'] = str_replace( Array( ' ', '(', ')', '-' ), '', $_POST['phone'] );
		
		
		
		if ( intval( $_POST['ownership'] ) == 1 )
		{
			$userType = 'Физическое лицо';
			
			$companyProperty = getPropertyByCode($propertyCollection, 'TRANSPORT_COMPANY');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$nameProperty = getPropertyByCode($propertyCollection, 'name');
			$nameProperty->setValue($_POST['fio']);
			
			$phoneProperty = getPropertyByCode($propertyCollection, 'phone');
			$phoneProperty->setValue($_POST['phone']);
			
			$emailProperty = getPropertyByCode($propertyCollection, 'PHF_EMAIL');
			$emailProperty->setValue($_POST['email']);
			
			if ( $_POST['delivery_type'] == 'pickup' )
			{
				$pickupProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_ID');
				$pickupProperty->setValue($_POST['delivery_pickup_point']);
			}
			
			$addressProperty = getPropertyByCode($propertyCollection, 'address');
			$addressProperty->setValue($_POST['delivery_address']);
			
		}
		elseif ( intval( $_POST['ownership'] ) == 4 )
		{
			$userType = 'Юридическое лицо';
						
			$addressProperty = getPropertyByCode($propertyCollection, 'UR_FACT_ADDRESS');
			$addressProperty->setValue($_POST['delivery_address']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'TRANSPORT_COMPANY');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$legalAddressProperty = getPropertyByCode($propertyCollection, 'UR_ADDRESS');
			$legalAddressProperty->setValue($_POST['legal_address']);
			
			$kppProperty = getPropertyByCode($propertyCollection, 'UR_KPP');
			$kppProperty->setValue($_POST['kpp']);
			
			$innProperty = getPropertyByCode($propertyCollection, 'UR_INN');
			$innProperty->setValue($_POST['inn']);
			
			$fioProperty = getPropertyByCode($propertyCollection, 'name');
			$fioProperty->setValue($_POST['fio']);
			
			$phoneProperty = getPropertyByCode($propertyCollection, 'UR_PHONE');
			$phoneProperty->setValue($_POST['phone']);
			
			$emailProperty = getPropertyByCode($propertyCollection, 'UR_EMAIL');
			$emailProperty->setValue($_POST['email']);
			
			$companyNameProperty = getPropertyByCode($propertyCollection, 'UR_ORG_NAME');
			$companyNameProperty->setValue($_POST['company_name']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'COMPANY_NAME_WITHOUT_OPF');
			$companyProperty->setValue($_POST['company_name_without_opf']);
			
			$opfProperty = getPropertyByCode($propertyCollection, 'OPF');
			$opfProperty->setValue($_POST['company_opf']);
			
			$shortProperty = getPropertyByCode($propertyCollection, 'COMPANY_NAME_SHORT');
			$shortProperty->setValue($_POST['company_name_short']);
			
			if ( $_POST['delivery_type'] == 'pickup' )
			{
				$pickupProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_ID');
				$pickupProperty->setValue($_POST['delivery_pickup_point']);
			}
		}
		elseif ( intval( $_POST['ownership'] ) == 5 )
		{
			
			$userType = 'ИП';
						
			$legalAddressProperty = getPropertyByCode($propertyCollection, 'IP_ADDRESS');
			$legalAddressProperty->setValue($_POST['legal_address']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'TRANSPORT_COMPANY');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$innProperty = getPropertyByCode($propertyCollection, 'IP_INN');
			$innProperty->setValue($_POST['inn']);
				
			$fioProperty = getPropertyByCode($propertyCollection, 'name');
			$fioProperty->setValue($_POST['fio']);
			
			$phoneProperty = getPropertyByCode($propertyCollection, 'IP_PHONE');
			$phoneProperty->setValue($_POST['phone']);
				
			$emailProperty = getPropertyByCode($propertyCollection, 'IP_EMAIL');
			$emailProperty->setValue($_POST['email']);
			
			$companyNameProperty = getPropertyByCode($propertyCollection, 'IP_ORG_NAME');
			$companyNameProperty->setValue($_POST['company_name']);
				
			$noOpfProperty = getPropertyByCode($propertyCollection, 'COMPANY_NAME_WITHOUT_OPF');
			$noOpfProperty->setValue($_POST['company_name_without_opf']);
			
			$opfProperty = getPropertyByCode($propertyCollection, 'OPF');
			$opfProperty->setValue($_POST['company_opf']);
				
			$shortProperty = getPropertyByCode($propertyCollection, 'COMPANY_NAME_SHORT');
			$shortProperty->setValue($_POST['company_name_short']);
			
			if ( $_POST['delivery_type'] == 'pickup' )
			{
				$pickupProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_ID');
				$pickupProperty->setValue($_POST['delivery_pickup_point']);
			}
		}
		
		$result = $order->save();
		if (!$result->isSuccess())
		{
			$arResult["TEST"] = $result->getErrors();
		}
		
		$arResult["TOTAL"]["PRICE"]		= $order->getPrice(); 			// Сумма заказа
		$arResult["TOTAL"]["DISCOUNT"]	= $order->getDiscountPrice();	// Размер скидки
		
		if ( $arResult['TOTAL']['PRICE'] > $priceDiscount && !is_array($_SESSION['CATALOG_USER_COUPONS']) ):
			$arResult['TOTAL']['PRICE'] *= 0.95;
			$arResult['TOTAL']['DISCOUNT'] += $basket->getBasePrice() * 0.05;
		elseif( is_array($_SESSION['CATALOG_USER_COUPONS']) ):
			$arResult['TOTAL']['PRICE'] *= 0.95;
			$arResult['TOTAL']['DISCOUNT'] += $basket->getBasePrice() * 0.05;
		endif;
		
		$orderId = $order->GetId();
			
		if ($orderId)	
		{
			$orderTable = '<table>';
			
			$orderTable .= '
			<tr>
				<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Имя:</td>
				<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;">' . $_POST['fio'] . '</td>
			</tr>';
			
			$orderTable .= '
			<tr>
				<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Телефон:</td>
				<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;">' . $_POST['phone'] . '</td>
			</tr>';

			$orderTable .= '
			<tr>
				<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Тип плательщика:</td>
				<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;">' . $userType . '</td>
			</tr>';
			
			$orderTable .= '
			<tr>
				<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Способ оплаты:</td>
				<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;text-transform:uppercase;">' . $paymentType . '</td>
			</tr>';
			
			$orderTable .= '
			<tr>
				<td style="width:380px;text-align:right;padding-right:10px;font-size:13px;">Способ доставки:</td>
				<td style="width:370px;padding-left:10px;font-size:18px;color:#f25f29;text-transform:uppercase;">' . $deliveryType . '</td>
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
				<td style="text-align:right;padding-right:30px;font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;border-bottom:1px solid #bcbcbc;height:30px;font-weight:bold;">
					Итого
				</td>
				<td style="font-size:13px;padding-left:10px;border-bottom:1px solid #bcbcbc;">
					' . number_format($arResult['TOTAL']['PRICE'], 2, '.', ' ' ) . ' руб.
				</td>
				<td style="font-size:13px;border-left:1px solid #bcbcbc;padding-left:10px;border-bottom:1px solid #bcbcbc;">
					&nbsp;
				</td>
				<td style="font-size:13px;border-left:1px solid #bcbcbc;border-right:1px solid #bcbcbc;padding-left:10px;border-bottom:1px solid #bcbcbc;">
					&nbsp;
				</td>
			</tr>';

			$orderList .= '</table>';
			
			


			
			$arMailFields = Array(
				'EMAIL' => $_POST['email'],
				'ORDER_ID' => $orderId,
				'ORDER_USER' => $_POST['fio'],
				'ORDER_DATE' => $orderDate,
				'PRICE' => number_format($arResult['TOTAL']['PRICE'], 2, '.', ' ' ),
				'ORDER_LOGIN' => $userLogin,
				'ORDER_TABLE' => $orderTable,
				'ORDER_LIST' => $orderList
			);
			CEvent::Send( 'RS_SALE_NEW_ORDER', 's1', $arMailFields, 259 );
			
			
			LocalRedirect( '/personal/order_confirm.php?ORDER_ID=' . $orderId );
		}
	}
}

function getPropertyByCode($propertyCollection, $code)  {
    foreach ($propertyCollection as $property)
    {
        if($property->getField('CODE') == $code)
            return $property;
    }
}

function DeliveryId($deliveryCode) {
    $arFilter = Array(
        'CODE' => $deliveryCode
    );
    $arSelect = Array(
        'ID',
        'NAME'
    );
    $dbDeliveries = Services\Table::getList( Array( 'filter' => $arFilter, 'select' => $arSelect, 'limit' => 1 ) );
    if ( $arDeliv = $dbDeliveries->Fetch() )
    {
        $deliveryId = $arDeliv['ID'];
        $deliveryName = $arDeliv['NAME'];
    }
    else
    {
        $deliveryId = $deliveryCode;
    }
    return $deliveryId;
}


$this->IncludeComponentTemplate();
?>
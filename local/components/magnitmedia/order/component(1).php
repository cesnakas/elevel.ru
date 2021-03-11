<?

use Bitrix\Main\Context,
    Bitrix\Currency\CurrencyManager,
    Bitrix\Sale\Order,
    Bitrix\Sale\Basket,
    Bitrix\Sale\Delivery,
    Bitrix\Sale\PaySystem,
	Bitrix\Sale\Delivery\Services,
	Bitrix\Main\Diag,
	Bitrix\Main\Loader;

global $USER;

Bitrix\Main\Loader::includeModule("sale");
Bitrix\Main\Loader::includeModule("catalog");

\Bitrix\Sale\Compatible\DiscountCompatibility::stopUsageCompatible();
\Bitrix\Sale\DiscountCouponsManager::init();

$siteId = Context::getCurrent()->getSite();
$currencyCode = CurrencyManager::getBaseCurrency();

// ������� �������
$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
   \Bitrix\Sale\Fuser::getId(),
   $siteId
);

// ���� ������, ��������
if ( !$basket->getPrice() )
{
	LocalRedirect( '/personal/basket.php' );
}

// �������� ������ ������� � �������
$arProductsIds = array();
$arOrderList = array();

foreach ($basket as $basketItem) {
	$arProductsIds[] = $basketItem->getProductId();
	
	//Diag\Debug::writeToFile(array("basketItem before" => $basketItem), "", "test_order.txt");
	$arProduct = CIBlockElement::GetByID($basketItem->getProductId())->GetNext();
	$arOrderList[ $basketItem->getProductId() ] = array(
		'NAME' => $basketItem->getField('NAME'),
		'QUANTITY' => $basketItem->getQuantity(),
		'OLD_PRICE' => SaleFormatCurrency($basketItem->getField('BASE_PRICE'), "RUB"),
		'PREVIEW_PICTURE' => $arProduct['PREVIEW_PICTURE'],
    );
}

$discounts = Bitrix\Sale\Discount::loadByBasket($basket);
$basket->refreshData( array ( 'PRICE' ,  'COUPONS' ));

$order = Order::create($siteId, 1);				// ������� �����
$order->setPersonTypeId(1); 					// ��� ����������
$order->setField('CURRENCY', $currencyCode); 	// ������
$order->setBasket($basket); // ����������� �������� � ������

$arResult["TOTAL"]["PRICE"] = $order->getPrice();								// ����� � ������ ������
$arResult["TOTAL"]["DISCOUNT"] = $basket->getBasePrice() - $order->getPrice();	// ����� ������
$arResult["TOTAL"]["WEIGHT"] = $basket->getWeight();

$basketQuantity = 0;
foreach ($arOrderList as $orderListItem) {
    $basketQuantity += $orderListItem["QUANTITY"];
}
$arResult["TOTAL"]["QUANTITY"] = $basketQuantity;

$res = $discounts->calculate();
$discountResult = $discounts->getApplyResult();

//Diag\Debug::writeToFile(array("basket before" => $basket), "", "test_order.txt");

if ($res->isSuccess())
{
	$discountData = $res->getData();
	//echo "<pre>"; print_r($discountData); echo "</pre>";
	$discountBasket = $order->getBasket();
	
	foreach ($discountBasket as $basketItem)
	{		
		$oldPrice = $arOrderList[ $basketItem->getProductId() ]['OLD_PRICE'];
		$newPrice = $basketItem->getPrice();

		if ($newPrice > 0 && $newPrice != $oldPrice)
		{
			$arOrderList[ $basketItem->getProductId() ]['PRICE'] = $newPrice;
		}
	}
	
	unset($discountData);
}

//echo "<pre>".print_r($arOrderList,true)."</pre>";

$basket->save();

unset($order);
// --------------------------------


//Diag\Debug::writeToFile(array("arOrderList after" => $arOrderList), "", "test_order.txt");

/* 
// �������� ������ ������� � �������
$arProductsIds = array();
$arBasketItemsIds = array();
$arOrderList = array();

$arResult["TOTAL"]["PRICE"] = 0;
$arResult["TOTAL"]["DISCOUNT"] = 0;



foreach ($basket as $basketItem) {
	
	$arBasketItemsIds[] = $basketItem->getId();
	
	$arProductsIds[] = $basketItem->getProductId();
	
	$arOrderList[ $basketItem->getProductId() ] = array(
		'NAME' => $basketItem->getField('NAME'),
		'QUANTITY' => $basketItem->getQuantity(),
		'PRICE' => $basketItem->getPrice(),
    );
}

// ���������� �� ��������� ������������ [END]
*/

// ��������� ������� � ������
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

// ���� ���� �����������, ����� ������
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


// 
// Light Technology integration [start]
// 

$ltOrderId = false;

// get items properties
if(!empty($arBasketItemsIds)){
	
	
	
	$dbBasketPropList = CSaleBasket::GetPropsList(
			array(
					"SORT" => "ASC",
					"NAME" => "ASC"
				),
			array(
				"BASKET_ID" => $arBasketItemsIds
			)
		);
	while ($arBasketPropList = $dbBasketPropList->Fetch())
	{
		// set user info from LT data
		if(strlen($arBasketPropList['VALUE']) > 0){
			
			if($arBasketPropList['CODE'] == "LT_USER_NAME")
				$arResult['USER_INFO']['FIO'] = $arBasketPropList['VALUE'];
			elseif($arBasketPropList['CODE'] == "LT_USER_EMAIL")
				$arResult['USER_INFO']['EMAIL'] = $arBasketPropList['VALUE'];
			elseif($arBasketPropList['CODE'] == "LT_USER_PHONE")
				$arResult['USER_INFO']['PHONE'] = $arBasketPropList['VALUE'];
			
			if($arBasketPropList['CODE'] == "LT_ORDER_ID")
				$ltOrderId = $arBasketPropList['VALUE'];
		}
	}
}

// 
// Light Technology integration [end]
// 



// ����� ������ �� ������� ����������
$arResult['PICKUP'] = Array();

Loader::includeModule("bxmaker.geoip");

$obLocation = \Bxmaker\GeoIP\Manager::getInstance();

$cityName = $obLocation->getCity();
$arResult['CITY_NAME'] = $cityName;

// Get current location ID
$bxLocationId = $obLocation->getLocation();

// Get current location group
$arLocationGroupId = array();

if(intval($bxLocationId) == 0 && strlen($cityName) > 0){
	$arSearchLocation = $obLocation->searchLocation($cityName);
	
	if(!empty($arSearchLocation)){
		
		foreach($arSearchLocation as $arSL){
			
			if(intval($arSL['location']) > 0){
				$bxLocationId = $arSL['location'];
				break;
			}
		}
	}
}

$bxLocation = \Bitrix\Sale\Location\LocationTable::getById($bxLocationId)->fetch();
$cityLocationCode = $bxLocation['CODE'];

if(intval($bxLocationId) > 0){
	
	$dbGroup = \CSaleLocationGroup::GetLocationList(array("LOCATION_ID" => $bxLocationId));
	while ($arGroup = $dbGroup->Fetch()) {
		$arLocationGroupId[] = $arGroup['LOCATION_GROUP_ID'];
	}
}

//weight and volume

//echo $obLocation->getRegion();
// if ( $cityName == '������' )
	
// �������� �� ������ ����������� ������ � �������
// 15.10.20 �������� ��������� (����������� ������ ���������� ��� ���� �������)
//START
//if ( in_array(4,$arLocationGroupId) || in_array(5,$arLocationGroupId) )
//{
	CModule::IncludeModule( 'iblock' );

    if ( in_array(4,$arLocationGroupId) ){
        $arLocationId = Array(
            30,
            40,
            64,
            65,
            66,
            79
        );
    }
    if ( in_array(5,$arLocationGroupId) ){
        $arLocationId = Array(
            47
        );
    }

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
		'NAME',
		'PROPERTY_EMAIL'
	);
	$dbPickups = CIBlockElement::GetList( $arPickupsSort, $arPickupsFilter, false, false, $arPickupsSelect );
	while ( $arPickup = $dbPickups->Fetch() )
	{
	    //if (in_array($arPickup['EXTERNAL_ID'], $arLocationId )) {
        $arResult['PICKUP'][$arPickup['EXTERNAL_ID']] = Array(
            'NAME' => $arPickup['NAME'],
            'ID' => $arPickup['EXTERNAL_ID'],
			'EMAIL' => $arPickup['PROPERTY_EMAIL_VALUE']
        );
        //}
	}
//END

if ( $_POST['submit'] == 'y' )
{
	// ��������� ��������
	$priceDelivery = 0;
	
	if ($arResult["TOTAL"]["PRICE"] < 10000 && $_POST['total-delivery'])
	{
		$priceDelivery = $_POST['total-delivery'];
	}
	
	//if ( $_POST['delivery_type'] == 'delivery' && !$_POST['delivery_company'] )
	/*if ( $_POST['delivery_type'] == 'delivery' || $_POST['delivery_type'] == 'tk-client' || $_POST['delivery_type'] == 'tk-terminal' )
	{
		$priceDelivery = 490;
	}*/
	
	
	
	$arFio = explode( ' ', $_POST['fio'] );
	
	$sendEmail = false;
	
	// ���� ���� �����������, ����� ������
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
	else // ���� ���� �� �����������, ������������, �������������� � ����� ������
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
		

		// deactivate automatic authorization
		// if (intval($userId) > 0)
			// $USER->Authorize( $userId );
		// else
		if (intval($userId) <= 0)
			$arResult["ERRORS"] .= $us->LAST_ERROR;
		
	}
	
	if (strlen($arResult["ERRORS"]) <= 0)
	{		

		$order = Order::create($siteId, $userId);				// ������� �����
		$order->setPersonTypeId(intval( $_POST['ownership'] )); 		// ��� ����������
		$order->setField('CURRENCY', $currencyCode); 					// ������
		if ($_POST['comment']) {
			$order->setField('USER_DESCRIPTION', $_POST['comment']);	// �����������
		}

		$order->setBasket($basket); // ����������� �������� � ������
		
		// ������ ��������
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
				$deliveryType = '���������';
				break;
					
			case 'delivery':
				$deliveryId = 26;
				$deliveryType = '��������';
				break;
				
			case 'tk-terminal':
			case 'point_sdek': // ���� ���������
				$deliveryId = 27;
				$deliveryType = '�� �� ���������';
				break;
				
			case 'tk-client':
			case 'courier_sdek': // ���� ������
				$deliveryId = 28;
				$deliveryType = '�� �� �������'; 
				break;
					
			/*
			case 'point_sdek':
				$deliveryId = 61;
				$deliveryType = '�� �� ���������'; // ���� ���������
				break;
				
			case 'courier_sdek':
				$deliveryId = 60;
				$deliveryType = '�� �� �������'; // ���� ������
				break;
			*/
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
		
		//$shipmentCollection->calculateDelivery();

		// ������ ������
		switch ( $_POST['payment'] )
		{
			case 'card':
				$paymentId = 19;
				$paymentType = '������ ������ �� �����';
				break;
				
			case 'cashless':
				$paymentId = 2;
				$paymentType = '����������� ������';
				break;
				
			case 'courier':
				$paymentId = 1;
				$paymentType = '��������� �������';
				break;
				
			case 'cash':
				$paymentId = 8;
				$paymentType = '��������� � ����� �����';
				break;
			case 'cloudpayments':
				$paymentId = 20;
				$paymentType = '������ ������ ����� ������ CloudPayments';
				break;
			case 'credit':
				$paymentId = 21;
				$paymentType = '������ � ���������';
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
		
		//Diag\Debug::writeToFile(array("order getPrice" => $order->getPrice(), "order getDiscountPrice" => $order->getDiscountPrice(), "basket getPrice" => $basket->getPrice(), "basket getDiscountPrice" => ($basket->getBasePrice() - $basket->getPrice()), "basket_total_price" => $arResult["TOTAL"]["PRICE"], "basket_total_discount" => $arResult["TOTAL"]["DISCOUNT"]), "", "test_order.txt");
		
	
		// ��������� �������
		$propertyCollection = $order->getPropertyCollection();

		$orderDate = ConvertTimeStamp( time(), 'FULL' );
		
		$_POST['phone'] = str_replace( Array( '+7' ), '8', $_POST['phone'] );
		$_POST['phone'] = str_replace( Array( ' ', '(', ')', '-' ), '', $_POST['phone'] );
		
		
		
		if ( intval( $_POST['ownership'] ) == 1 )
		{
			$userType = '���������� ����';
			
			$companyProperty = getPropertyByCode($propertyCollection, 'TRANSPORT_COMPANY');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'DeliveryCarrier');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$nameProperty = getPropertyByCode($propertyCollection, 'name');
			$nameProperty->setValue($_POST['fio']);
			
			$phoneProperty = getPropertyByCode($propertyCollection, 'phone');
			$phoneProperty->setValue($_POST['phone']);
			
			$emailProperty = getPropertyByCode($propertyCollection, 'PHF_EMAIL');
			$emailProperty->setValue($_POST['email']);
			
			$cityProperty = getPropertyByCode($propertyCollection, 'city');
			$cityProperty->setValue($_POST['delivery_city']);
			
			if ( $_POST['delivery_type'] == 'pickup' )
			{
				
				$pickupProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_ID');
				$pickupProperty->setValue($_POST['delivery_pickup_point']);

				$pickupName = $arResult['PICKUP'][$_POST['delivery_pickup_point']]['NAME'];

				$pickupNameProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_NAME');
				$pickupNameProperty->setValue($pickupName);

			}			
			
			$addressProperty = getPropertyByCode($propertyCollection, 'address');
			$addressProperty->setValue($_POST['delivery_address']);
			
			if ( $_POST['delivery_type'] == 'courier_sdek' )
			{
				$emailsdekProperty = getPropertyByCode($propertyCollection, 'email_sdek');
				$emailsdekProperty->setValue($_POST['email']);
				
				$phonesdekProperty = getPropertyByCode($propertyCollection, 'phone_sdek');
				$phonesdekProperty->setValue($_POST['phone']);
				
				$addressSdek = $_POST['address_sdek'];
				if(strlen($addressSdek) == 0)
					$addressSdek = $_POST['address_point'];
				
				$addresssdekProperty = getPropertyByCode($propertyCollection, 'address');
				$addresssdekProperty->setValue($addressSdek);

				// 14.10.20, xaxai.com, ���� ����� ��������, + �������, ����, ��������

               /* if(strlen($_POST['ORDER_PROP_4']) < 7) {
                    $orderPropId = \Bitrix\Sale\Location\LocationTable::getById($bxLocationId)->fetch();
                    $addressInput = $orderPropId['CODE'];
                } else {
                    $addressInput = $_POST['ORDER_PROP_4'];
                }
               */

                $addressDeliveryCityProperty = getPropertyByCode($propertyCollection, 'address_deliveryCity');
                $addressDeliveryCityProperty->setValue($_POST['address_deliveryCity']);

				 $addressEntranceProperty = getPropertyByCode($propertyCollection, 'address_entrance');
				 $addressEntranceProperty->setValue(($_POST['address_entrance']));

                $addressFlatProperty = getPropertyByCode($propertyCollection, 'address_flat');
                $addressFlatProperty->setValue(($_POST['address_flat']));

                $addressFloorProperty = getPropertyByCode($propertyCollection, 'address_floor');
                $addressFloorProperty->setValue(($_POST['address_floor']));
			}
			
			if ( $_POST['delivery_type'] == 'point_sdek' )
			{
				$emailsdekProperty = getPropertyByCode($propertyCollection, 'email_sdek');
				$emailsdekProperty->setValue($_POST['email']);
				
				$phonesdekProperty = getPropertyByCode($propertyCollection, 'phone_sdek');
				$phonesdekProperty->setValue($_POST['phone']);
				
				$addressSdek = $_POST['address_sdek'];
				if(strlen($addressSdek) == 0)
					$addressSdek = $_POST['address_point'];
				
				$addresssdekProperty = getPropertyByCode($propertyCollection, 'address');
				$addresssdekProperty->setValue($addressSdek);					
			}
			
			if (in_array($_POST['delivery_type'], array('point_sdek', 'courier_sdek')) && strlen($cityLocationCode) > 0)
			{
				$citySdekProperty = getPropertyByCode($propertyCollection, 'city_sdek');
				$citySdekProperty->setValue($cityLocationCode);
				$citySdekProperty->setValue($_POST['SDEK_CITY']);
			}
			
		}
		elseif ( intval( $_POST['ownership'] ) == 4 )
		{
            $userType = '����������� ����';
						
			$addressProperty = getPropertyByCode($propertyCollection, 'UR_FACT_ADDRESS');
			$addressProperty->setValue($_POST['actual_address']);
			
			$addressProperty = getPropertyByCode($propertyCollection, 'address');
			$addressProperty->setValue($_POST['delivery_address']);
			
			$cityProperty = getPropertyByCode($propertyCollection, 'UR_city');
			$cityProperty->setValue($_POST['delivery_city']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'TRANSPORT_COMPANY');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'DeliveryCarrier');
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

				$pickupName = $arResult['PICKUP'][$_POST['delivery_pickup_point']]['NAME'];

				$pickupNameProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_NAME');
				$pickupNameProperty->setValue($pickupName);

			}	
			
			if (in_array($_POST['delivery_type'], array('point_sdek', 'courier_sdek')))
			{
				$emailsdekProperty = getPropertyByCode($propertyCollection, 'email_sdek');
				$emailsdekProperty->setValue($_POST['email']);
				
				$phonesdekProperty = getPropertyByCode($propertyCollection, 'phone_sdek');
				$phonesdekProperty->setValue($_POST['phone']);
				
				$addressSdek = $_POST['address_sdek'];
				if(strlen($addressSdek) == 0)
					$addressSdek = $_POST['address_point'];
					
				$addresssdekProperty = getPropertyByCode($propertyCollection, 'address');
				$addresssdekProperty->setValue($addressSdek);
				
				if (strlen($cityLocationCode) > 0)
				{

					$citySdekProperty = getPropertyByCode($propertyCollection, 'city_sdek');
					$citySdekProperty->setValue($cityLocationCode);
				}
			}
		}
		elseif ( intval( $_POST['ownership'] ) == 5 )
		{
			
			$userType = '��';
			
			$addressProperty = getPropertyByCode($propertyCollection, 'address');
			$addressProperty->setValue($_POST['delivery_address']);
						
			$legalAddressProperty = getPropertyByCode($propertyCollection, 'IP_ADDRESS');
			$legalAddressProperty->setValue($_POST['legal_address']);
			
			$cityProperty = getPropertyByCode($propertyCollection, 'IP_city');
			$cityProperty->setValue($_POST['delivery_city']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'TRANSPORT_COMPANY');
			$companyProperty->setValue($_POST['delivery_company']);
			
			$companyProperty = getPropertyByCode($propertyCollection, 'DeliveryCarrier');
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

				$pickupName = $arResult['PICKUP'][$_POST['delivery_pickup_point']]['NAME'];

				$pickupNameProperty = getPropertyByCode($propertyCollection, 'PICKUP_POINT_NAME');
				$pickupNameProperty->setValue($pickupName);
			}
			
			if (in_array($_POST['delivery_type'], array('point_sdek', 'courier_sdek')))
			{
				$emailsdekProperty = getPropertyByCode($propertyCollection, 'email_sdek');
				$emailsdekProperty->setValue($_POST['email']);
				
				$phonesdekProperty = getPropertyByCode($propertyCollection, 'phone_sdek');
				$phonesdekProperty->setValue($_POST['phone']);
				
				$addressSdek = $_POST['address_sdek'];
				if(strlen($addressSdek) == 0)
					$addressSdek = $_POST['address_point'];
				
				$addresssdekProperty = getPropertyByCode($propertyCollection, 'address');
				$addresssdekProperty->setValue($addressSdek);
				
				if (strlen($cityLocationCode) > 0)
				{
					$citySdekProperty = getPropertyByCode($propertyCollection, 'city_sdek');
					$citySdekProperty->setValue($cityLocationCode);
				}
			}
		}
		
		$result = $order->save();
		if (!$result->isSuccess())
		{
			$arResult["TEST"] = $result->getErrors();
		}
		
		//$arResult["TOTAL"]["PRICE"]		= $order->getPrice(); 			// ����� ������
		//$arResult["TOTAL"]["DISCOUNT"]	= $order->getDiscountPrice();	// ������ ������

		$orderId = $order->GetId();
			
		if ($orderId)	
		{
			$orderTable = '<table>';
			$orderTable .='</table>';
			
			
			$orderList = '<table style="width:99%;margin:0 auto 30px;border-spacing:0;">';

			//Diag\Debug::writeToFile(array("arOrderList letter" => $arOrderList), "", "test_order.txt");
				
			foreach ($arOrderList as $arItem) {

				$ttPicture = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
				//$ttPicture = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],  array('width' => 180, 'height' => 180));
                $orderList .= ' 
				<tr style="border-bottom: 1px solid #C8C8C8;">
				    <td style="width: 20%;text-align:center;padding-right:10px;font-size:13px;height:40px;">
<img style="width: 90px; height: 90px; object-fit: contain;" src="' .  $ttPicture . '"> 
					</td> 
					<td style="width: 55%;text-align:left;padding-right:30px;font-size:13px;height:40px;">
						<p style="">' . $arItem['NAME'] . '</p> <p style="font-size:10px; color: #B8B8B8">��� ' . $arItem['ARTICLE'] . ' </p>
					</td>
					<td style="width: 10%;text-align:center;font-size:13px;padding-left:10px;padding-bottom:20px;">
						x' . $arItem['QUANTITY'] . '
					</td>
					<td style="width: 15%;text-align:center;font-size:13px;padding-left:10px;padding-bottom:20px;">
						' . (!isset($arItem['PRICE']) || $arItem['PRICE'] == $arItem['OLD_PRICE'] ? $arItem['OLD_PRICE'] : '<span style="color: red; text-decoration: line-through;">' . $arItem['OLD_PRICE'] . '</span><br />' . $arItem['PRICE']) . '
					</td>
					
				</tr>';
            };

			$orderList .= '</table>';
			

			$deliverys = CSaleOrder::GetByID($orderId);
			$deliveryId = (int) $deliverys["DELIVERY_ID"];

			if($deliveryId !== 1) { //��������� � ID=1
				$sendEmail = "zakaz-market@krokus.ru";
				
			} else {
				$sendEmail = "";
				$db_props = CSaleOrderPropsValue::GetOrderProps($orderId);
				while ($arProp = $db_props->Fetch()){
					if($arProp["CODE"] == "PICKUP_POINT_ID" && !empty($arProp["VALUE"])){
						$pickupId = $arProp["VALUE"];
					}
				}
			
				foreach($arResult['PICKUP'] as $pickup) {
					if($pickup["ID"] == $pickupId) {
						$sendEmail = $pickup["EMAIL"];
					}
				}
			
				if(empty($sendEmail)) {
					$sendEmail = "zakaz-market@krokus.ru";
				}
			
			}
$mailDeliveryType = '';
            $mailDeliveryAddress = '';
            if ($_POST['delivery_type'] == 'pickup') {
                $mailDeliveryType = '����� ����������:';
                $mailDeliveryAddress = $arResult['PICKUP'][$_POST['delivery_pickup_point']]['NAME'];
            }
            if (in_array($_POST['delivery_type'], array('point_sdek', 'courier_sdek'))) {
                if($_POST['delivery_type'] == 'point_sdek') {
                    $mailDeliveryType = '����� ������:';
                    $mailDeliveryAddress = $_POST['address_point'];
                } elseif ($_POST['delivery_type'] == 'courier_sdek') {
                    $mailDeliveryType = '����� ��������:';
                    $mailDeliveryAddress = $_POST['address_sdek'];
                }
            }
            $mailPaymentDetails = '';
            $mailPaymentType = '������ ������:';
            if($_POST['payment'] == 'cash') {
                $mailPaymentDetails = '��������� � ����� �����';
            } elseif ($_POST['payment'] == 'courier') {
                $mailPaymentDetails = '��������� �������';
            } elseif ($_POST['payment'] == 'cashless') {
                $mailPaymentDetails = '����������� ������';
            } elseif ($_POST['payment'] == 'cloudpayments') {
                $mailPaymentDetails = '������ ������ �� �����';
            }



            $arMailFields = Array(
                'SEND_EMAIL' => $sendEmail,
                'EMAIL' => $_POST['email'],
                'ORDER_ID' => $orderId,
                'ORDER_USER' => $_POST['fio'],
                'ORDER_DATE' => $orderDate,
                'PRICE' => number_format(($arResult['TOTAL']['PRICE'] + $priceDelivery), 2, '.', ' '),
                'ORDER_LOGIN' => $userLogin,
                'ORDER_TABLE' => $orderTable,
                'ORDER_LIST' => $orderList,
                "COMMENT" => $_POST['comment'],
                "DELIVERY_TYPE" => $mailDeliveryType,
                "DELIVERY_ADDRESS" => $mailDeliveryAddress,
                "PAYMENT_TYPE" => $mailPaymentType,
                "PAYMENT_DETAILS" => $mailPaymentDetails,

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
<?
CModule::IncludeModule( 'sale' );

$arResult["ERRORS"] = "";

global $USER;
if ( !is_object( $USER ) )
{
	$USER = new CUser;
}



$arResult['USER_INFO'] = Array();



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
			'UF_CHECKING_ACCOUNT',
			'UF_BANK_NAME',
			'UF_BIK',
			'UF_CADASTRE_ACCOUNT'
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
			'CHECKING_ACCOUNT' => $arUser['UF_CHECKING_ACCOUNT'],
			'BANK_NAME' => $arUser['UF_BANK_NAME'],
			'BIK' => $arUser['UF_BIK'],
			'CADASTRE_ACCOUNT' => $arUser['UF_CADASTRE_ACCOUNT'],
		);
	}
}



$obLocation = \Bxmaker\GeoIP\Manager::getInstance();
$locationId = $obLocation->getLocation();



$arOrder = Array(
	'SORT' => 'ASC',
	'ID' => 'ASC'
);
$arFilter = Array(
	'ACTIVE' => 'Y',
	'LOCATION' => $locationId
);
$arSelect = Array(
	'ID',
	'NAME',
	'DESCRIPTION'
);
$dbDeliveries = CSaleDelivery::GetList( $arOrder, $arFilter, false, false, $arSelect );
while ( $arDelivery = $dbDeliveries->Fetch() )
{
	if ( $arDelivery['NAME'] == 'Самовывоз' )
	{
		$arResult['PICKUP'][$arDelivery['ID']] = Array(
			'ID' => $arDelivery['ID'],
			'ADDRESS' => $arDelivery['DESCRIPTION']
		);
	}
}



$arFilter = Array(
	'ORDER_ID' => 'NULL',
	'FUSER_ID' => CSaleBasket::GetBasketUserID(),
	'LID' => SITE_ID
);
$arSelect = Array(
	'QUANTITY',
	'PRICE',
	'DISCOUNT_PRICE'
);
$dbBasketItems = CSaleBasket::GetList( Array(), $arFilter, false, false, $arSelect );
while ( $arBasketItem = $dbBasketItems->Fetch() )
{
	$totalPrice = $arBasketItem['PRICE'] * $arBasketItem['QUANTITY'];
	$totalDiscountPrice = $arBasketItem['DISCOUNT_PRICE'] * $arBasketItem['QUANTITY'];
	
	$arResult['TOTAL']['PRICE'] += $totalPrice;
	$arResult['TOTAL']['DISCOUNT'] += $totalDiscountPrice;
}




if ( $_POST['submit'] == 'y' )
{
	$priceDelivery = 0;
	if ( $_POST['delivery_type'] == 'delivery' && !$_POST['delivery_company'] )
	{
		$priceDelivery = 300;
	}
	
	
	
	$arFio = explode( ' ', $_POST['fio'] );
	
	$sendEmail = false;
	
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
			'UF_CHECKING_ACCOUNT' => $_POST['checking_account'],
			'UF_BANK_NAME' => $_POST['bank_name'],
			'UF_BIK' => $_POST['bik'],
			'UF_CADASTRE_ACCOUNT' => $_POST['cadastre_account']
		);
		$us->Update( $userId, $arUserFields );
	}
	else
	{
		$sendEmail = true;
		
		
		$arUserFilter = Array(
			'EMAIL' => $_POST['email'],
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
				'UF_CHECKING_ACCOUNT' => $_POST['checking_account'],
				'UF_BANK_NAME' => $_POST['bank_name'],
				'UF_BIK' => $_POST['bik'],
				'UF_CADASTRE_ACCOUNT' => $_POST['cadastre_account'],
				'UF_COMPANY_NAME_WITHOUT_OPF' => $_POST['company_name_without_opf'],
				'UF_COMPANY_OPF' => $_POST['company_opf']
			);
			$userId = $us->Add( $arUserFields );
		}
		
		
		
		if (intval($userId) > 0)
			$USER->Authorize( $userId );
		else
			$arResult["ERRORS"] .= $us->LAST_ERROR;
		
	}
	
	$deliveryId = 26;
	if ( $_POST['delivery_type'] == 'pickup' )
	{
		$deliveryId = $_POST['delivery_pickup_point'];
	}
	else
	{
		$deliveryId = $_POST['delivery_company'];
	}

	
	if (strlen($arResult["ERRORS"]) <= 0)
	{
		
		$arOrderFields = Array(
			'LID' => SITE_ID,
			'PERSON_TYPE_ID' => intval( $_POST['ownership'] ),
			'PAYED' => 'N',
			'STATUS_ID' => 'N',
			'PRICE_DELIVERY' => $priceDelivery,
			'PRICE' => $arResult['TOTAL']['PRICE'],
			'DISCOUNT_PRICE' => $arResult['TOTAL']['DISCOUNT'],
			'CURRENCY' => 'RUB',
			'USER_ID' => $userId,
			'PAY_SYSTEM_ID' => $_POST['payment'],
			'DELIVERY_ID' => $deliveryId,
			'USER_DESCRIPTION' => $_POST['comment']
		);
		$orderId = CSaleOrder::Add( $arOrderFields );

		if ( $orderId )
		{
			CSaleBasket::OrderBasket( $orderId );
			
			
			
			if ( intval( $_POST['ownership'] ) == 1 )
			{
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 2,
					'NAME' => 'Телефон',
					'CODE' => 'phone',
					'VALUE' => $_POST['phone']
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 19,
					'NAME' => 'E-mail',
					'CODE' => 'PHF_EMAIL',
					'VALUE' => $_POST['email']
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				if ( $_POST['delivery_type'] == 'pickup' )
				{
					$arProp = Array(
						'ORDER_ID' => $orderId,
						'ORDER_PROPS_ID' => 20,
						'NAME' => 'Адрес самовывоза',
						'CODE' => 'PHF_OFFICE_GET',
						'VALUE' => $arResult['PICKUP'][$_POST['delivery_pickup_point']]['ADDRESS']
					);
					CSaleOrderPropsValue::Add( $arProp );
				}
				else
				{
					$arProp = Array(
						'ORDER_ID' => $orderId,
						'ORDER_PROPS_ID' => 52,
						'NAME' => 'Куда доставить',
						'CODE' => 'DELIVERY_PLACE',
						'VALUE' => $_POST['delivery_address']
					);
					CSaleOrderPropsValue::Add( $arProp );
				}		
			}
			elseif ( intval( $_POST['ownership'] ) == 4 )
			{
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 66,
					'NAME' => 'Телефон контактного лица',
					'CODE' => 'UR_PHONE',
					'VALUE' => $_POST['phone']
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 67,
					'NAME' => 'Адрес электронной почты контактного лица',
					'CODE' => 'UR_EMAIL',
					'VALUE' => $_POST['email']
				);
				CSaleOrderPropsValue::Add( $arProp );
			}
			elseif ( intval( $_POST['ownership'] ) == 5 )
			{
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 79,
					'NAME' => 'Телефон контактного лица',
					'CODE' => 'IP_PHONE',
					'VALUE' => $_POST['phone']
				);
				CSaleOrderPropsValue::Add( $arProp );
				
				
				$arProp = Array(
					'ORDER_ID' => $orderId,
					'ORDER_PROPS_ID' => 80,
					'NAME' => 'Адрес электронной почты контактного лица',
					'CODE' => 'IP_EMAIL',
					'VALUE' => $_POST['email']
				);
				CSaleOrderPropsValue::Add( $arProp );
			}
			
			
			
			
			
			
			LocalRedirect( '/personal/order_confirm.php?ORDER_ID=' . $orderId );
		}
	}
}




$this->IncludeComponentTemplate();
?>
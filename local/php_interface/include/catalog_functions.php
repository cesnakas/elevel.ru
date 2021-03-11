<?
// Языковой файл модуля "Торговый каталог"
IncludeModuleLangFile('/www/elevel.infodaymedia.com/bitrix/modules/catalog/include.php');

CModule::IncludeModule('iblock');
CModule::IncludeModule('catalog');
/**
 * Функция добавления товара в корзину
 * $iProductID - код (идентификатор) товара
 * $iPriceID - тип цены, используемой при добавлении товара
 * $iQuantity = 1 - количество товара
 * $arProductParams = array() - дополнительные параметры
 **/
function Add2BasketByProductPriceID(
	$iProductID,
	$iPriceID,
	$iQuantity = 1,
	$arProductParams = array()
)
{
	global $APPLICATION;

	$iProductID = intval($iProductID);
	if($iProductID <= 0)
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_ERR_EMPTY_PRODUCT_ID'),
			'EMPTY_PRODUCT_ID'
		);
		return false;
	}

	$iQuantity = doubleval($iQuantity);
	if($iQuantity <= 0)
	{
		$iQuantity = 1;
	}
	
	$iPriceID = intval($iPriceID);
	if($iPriceID <= 0)
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_PRODUCT_PRICE_NOT_FOUND'),
			'NO_PRODUCT_PRICE'
		);
		return false;
	}

	if(!CModule::IncludeModule('sale'))
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_ERR_NO_SALE_MODULE'),
			'NO_SALE_MODULE'
		);
		return false;
	}

	if(CModule::IncludeModule('statistic') && (intval($_SESSION['SESS_SEARCHER_ID']) > 0))
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_ERR_SESS_SEARCHER'),
			'SESS_SEARCHER'
		);
		return false;
	}

	$arProduct = CCatalogProduct::GetByID($iProductID);
	if($arProduct === false)
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_ERR_NO_PRODUCT'),
			'NO_PRODUCT'
		);
		return false;
	}

	if(($arProduct['QUANTITY_TRACE'] == 'Y') && (doubleval($arProduct['QUANTITY']) <= 0))
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_ERR_PRODUCT_RUN_OUT'),
			'PRODUCT_RUN_OUT'
		);
		return false;
	}

	$CALLBACK_FUNC = 'CatalogBasketCallback';
	$arCallbackPrice = CSaleBasket::ReReadPrice(
		$CALLBACK_FUNC,
		'catalog',
		$iProductID,
		$iQuantity
	);
	if(!is_array($arCallbackPrice) || empty($arCallbackPrice))
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_PRODUCT_PRICE_NOT_FOUND'),
			'NO_PRODUCT_PRICE'
		);
		return false;
	}
	
	$dbIBlockElement = CIBlockElement::GetList(
		array(),
		array(
			'ID' => $iProductID,
			'ACTIVE_DATE' => 'Y',
			'ACTIVE' => 'Y',
			'CHECK_PERMISSIONS' => 'Y',
            'PROPERTY_SPETS_SKIDKA'
		),
		false,
		false,
		array(
			'ID',
			'IBLOCK_ID',
			'XML_ID',
			'NAME',
			'DETAIL_PAGE_URL',
			'CATALOG_GROUP_'.$iPriceID,
            'PROPERTY_SPETS_SKIDKA'
		)
	);
	$arIBlockElement = $dbIBlockElement->GetNext();

	if($arIBlockElement == false)
	{
		$APPLICATION->ThrowException(
			GetMessage('CATALOG_ERR_NO_IBLOCK_ELEMENT'),
			'NO_IBLOCK_ELEMENT'
		);
		return false;
	}
	
	$arProps = array();

	$dbIBlock = CIBlock::GetList(
		array(),
		array('ID' => $arIBlockElement['IBLOCK_ID'])
	);
	if($arIBlock = $dbIBlock->Fetch())
	{
		$arProps[] = array(
			'NAME' => 'Catalog XML_ID',
			'CODE' => 'CATALOG.XML_ID',
			'VALUE' => $arIBlock['XML_ID']
		);
	}

	$arProps[] = array(
			'NAME' => 'Product XML_ID',
			'CODE' => 'PRODUCT.XML_ID',
			'VALUE' => $arIBlockElement['XML_ID']
	);
	
	//проверяем есть ли скидка 
	$dbProductDiscounts = CCatalogDiscount::GetList(
			array("SORT" => "ASC"),
			array(
					"PRODUCT_ID" => $iProductID
			),
			false,
			false,
			array(
					"ID", "SITE_ID", "ACTIVE", "ACTIVE_FROM", "ACTIVE_TO",
					"RENEWAL", "NAME", "SORT", "MAX_DISCOUNT", "VALUE_TYPE",
					"VALUE", "CURRENCY", "PRODUCT_ID"
			)
	);
	if ($arProductDiscounts = $dbProductDiscounts->Fetch())
	{
		echo $arIBlockElement['CATALOG_PRICE_'.$iPriceID]."<br/>";
		$arIBlockElement['CATALOG_PRICE_'.$iPriceID]=$arIBlockElement['CATALOG_PRICE_'.$iPriceID]-$arProductDiscounts["VALUE"];
		if ($arIBlockElement['CATALOG_PRICE_'.$iPriceID]<0) $arIBlockElement['CATALOG_PRICE_'.$iPriceID]=0;
	}
	$price = $arIBlockElement['CATALOG_PRICE_'.$iPriceID];
    if (intval($arIBlockElement["PROPERTY_SPETS_SKIDKA_VALUE"]) > 0) {
        $des = $arIBlockElement["PROPERTY_SPETS_SKIDKA_VALUE"];
        $price = $price - ($price * (100+$des)/100 - $price);
    }
	$arFields = array(
		'PRODUCT_ID' => $iProductID,
		'PRODUCT_PRICE_ID' => $arIBlockElement['CATALOG_PRICE_ID_'.$iPriceID],
		'PRICE' => $price,
		'CURRENCY' => $arIBlockElement['CATALOG_CURRENCY_'.$iPriceID],
		'WEIGHT' => $arIBlockElement['CATALOG_WEIGHT'],
		'QUANTITY' => $iQuantity,
		'LID' => SITE_ID,
		'DELAY' => 'N',
		'CAN_BUY' => 'Y',
		'NAME' => $arIBlockElement['~NAME'],
		//'CALLBACK_FUNC' => $CALLBACK_FUNC,
		'MODULE' => 'catalog',
		'NOTES' => $arIBlockElement['CATALOG_GROUP_NAME_'.$iPriceID],
		//'ORDER_CALLBACK_FUNC' => 'CatalogBasketOrderCallback',
		//'CANCEL_CALLBACK_FUNC' => 'CatalogBasketCancelCallback',
		//'PAY_CALLBACK_FUNC' => 'CatalogPayOrderCallback',
		'DETAIL_PAGE_URL' => $arIBlockElement['DETAIL_PAGE_URL'],
		'CATALOG_XML_ID' => $arIBlock['XML_ID'],
		'PRODUCT_XML_ID' => $arIBlockElement['XML_ID'],
		'VAT_RATE' => $arCallbackPrice['VAT_RATE'],
			
		//"DISCOUNT_PRICE" =>"5",
	);
	
	
	

	if($arProduct['QUANTITY_TRACE'] == 'Y')
	{
		if((intval($arProduct['QUANTITY']) - $iQuantity) < 0)
		{
			$arFields['QUANTITY'] = doubleval($arProduct['QUANTITY']);
		}
	}

	if(is_array($arProductParams) && !empty($arProductParams))
	{
		foreach ($arProductParams as &$arOneProductParams)
		{
			$arProps[] = array(
				'NAME' => $arOneProductParams['NAME'],
				'CODE' => $arOneProductParams['CODE'],
				'VALUE' => $arOneProductParams['VALUE'],
				'SORT' => $arOneProductParams['SORT']
			);
		}
	}
	
	$arFields['PROPS'] = $arProps;
	
	echo '===';
	echo $arFields['PRICE'];
	
	$addres = CSaleBasket::Add($arFields);
	if($addres && CModule::IncludeModule('statistic'))
	{
		CStatistic::Set_Event('sale2basket', 'catalog', $arFields['DETAIL_PAGE_URL']);
	}

	return $addres;
}
?>
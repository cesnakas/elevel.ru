<?php
use Bitrix\Sale;
use Bitrix\Сatalog;
use Bitrix\Main\Diag;

Class CMagnitmediaLT
{
    public static $__instance;
	private static $brandIblockId;
	private static $productsIblockId;
	private static $apiKey;
	private static $priceImportUrl;
	private static $priceImportHttpAuth;
	private static $priceImportUser;
	private static $priceImportPass;
	private static $orderRedirectUrl;
	private static $log;
	private static $logFile;
	
	
    /**
     * Session constructor.
     */
    function __construct()
    {
		set_time_limit(0);
		
        self::$__instance = $this;
		
		// include iblocks
		CModule::IncludeModule('iblock');	
		CModule::IncludeModule('catalog');	
		CModule::IncludeModule('sale');	
		
		self::$brandIblockId = IBLOCK_BRAND_ID;
		self::$productsIblockId = CATALOG_ID;
		
		// Light Technology API key
		self::$apiKey = 'b4d47d64e59f4a065e03aac50f8935985485fc44125bbbc647c0ca6cf40e9481';
		
		// LT import handler
		// self::$priceImportUrl = 'https://ltcompany.com/en/price-import/'; 				// prod
		// self::$priceImportUrl = 'https://devsite2.ltcompany.com/ru/price-import/';		// dev
		self::$priceImportUrl = 'https://devsite2.ltcompany.com/en/price-import/';		// dev
		// self::$priceImportUrl = 'https://tlgrm.magnitmedia.ru/test2.php';
		self::$priceImportHttpAuth = true;
		self::$priceImportUser = "greensight";
		self::$priceImportPass = "greensight";
		
		
		
		// Redirect after recieving order data from LT
		self::$orderRedirectUrl = '/personal/basket.php';
		
		// Log trigger
		self::$log = true;
		
		// Path to Log file
		self::$logFile = realpath(dirname(__FILE__)) . '/lt.log';

    }
	
	
    /**
     * Gets instance of Session class.
     * @return Session
     */
    public static function getInstance()
    {
        if (self::$__instance === null)
        {
            self::$__instance = new self();
        }
        return self::$__instance;
    }
	
	

	// Запись в лог
	public function logWrite($message)
	{
		if(self::$log === true){
			
			if(strlen(self::$logFile) > 0){

				$file = fopen(self::$logFile, 'a');
			
				// write to file
					
				if(is_array($message) || is_object($message))
					$message = "\n" . print_r($message,true);
			
				fwrite($file, date("d.m.Y H:i:s") . " " .  $message . "\n");
				
				fclose($file);
				
				return true;
			}
		}
		
	}
	
	
	public function sendItems()
	{
		self::logWrite('EXPORT_START--------------------');
		
		$arResult = array(
			"api_key" => self::$apiKey,
			"distr_luminaire_data_ru" => array()
		);
		
		if(intval(self::$productsIblockId) > 0 || intval(self::$brandIblockId) > 0){
		
			// get brand
			$arBrand = self::getBrand();
			
			if ($arBrand)
			{
				
				$arProducts = array();
				$arProductsID = array();
				
				$arSelect = Array(
					"ID", 
					"NAME", 
					"IBLOCK_ID",
					"PROPERTY_MARKING_PRODUCER"
				);
				$arFilter = Array(
					"IBLOCK_ID"=>self::$productsIblockId, 
					"PROPERTY_PRODUCER" => $arBrand['ID'],
					// PRODUCER_WTF
					"ACTIVE_DATE"=>"Y", 
					"ACTIVE"=>"Y",
					// "CATALOG_AVAILABLE" => "Y"  // we cannot use this parameter cause there's active option "allow to buy products with zero quantity"
				);
				// $rsProducts = CIBlockElement::GetList(Array(), $arFilter, false,  Array("nPageSize"=>10), $arSelect);
				$rsProducts = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
				while($arProduct = $rsProducts->GetNext())
				{
					
					$arProducts[$arProduct['ID']] = array(
						"id" => $arProduct['PROPERTY_MARKING_PRODUCER_VALUE'],	// артикул НК
						"title" => $arProduct['NAME'],							// наименование НК
						"sale" => false,										// если НК распродажная, то параметр должен иметь значение TRUE. В противном случае параметр имеет значение FALSE.
						//"sale_price": 5048.5,									// цена распродажного светильника. Параметр имеет смысл заполнять только в том случае, если значение предыдущего параметра имеет значение TRUE
						"warehouse" => array()
					);

					$arProductsID[] = $arProduct['ID'];
				}
				
				// Get products availability and use only available products
				$arProductIDTemp = array();
				if(!empty($arProductsID)){
					
					$i = 1;
					$dbCatalogProduct = CCatalogProduct::GetList(
							array("ID" => "ASC"),
							array(
								"ID" => $arProductsID
							),
							false,
							false
						);
					while ($arCatalogProduct = $dbCatalogProduct->Fetch())
					{
						if($arCatalogProduct['QUANTITY'] > 0 && $i<10){
							$arProductIDTemp[] = $arCatalogProduct['ID'];
							$i++;
						}
						else
							unset($arProducts[$arCatalogProduct['ID']]);
					
					}
				}
				
				echo "<pre>"; print_r($arProducts); echo "</pre>";
				
				
				// get available products store quantity
				if(!empty($arProductIDTemp)){

					$dbCatalogStore = CCatalogStore::GetList(
					   array('PRODUCT_ID'=>'ASC','ID' => 'ASC'),
					   array('ACTIVE' => 'Y','PRODUCT_ID'=>$arProductsID),
					   false,
					   false,
					   array("ID","TITLE","ACTIVE","PRODUCT_AMOUNT","ELEMENT_ID")
					);
					while($arCatalogStore = $dbCatalogStore->GetNext())
					{
						if($arProducts[$arCatalogStore['ELEMENT_ID']] && $arCatalogStore['PRODUCT_AMOUNT'] > 0){
							$arProducts[$arCatalogStore['ELEMENT_ID']]['warehouse'][] = array(		// кол-во складов, на которых доступна НК, соответствует кол-ву элементов массива.
								"stock_balance" => $arCatalogStore['PRODUCT_AMOUNT'],				// кол-во данной НК на складе у дистрибьютора	
								// "stock_addr" =>	iconv("windows-1251", "utf-8", $arCatalogStore['TITLE']),							// адрес склада
								"stock_addr" =>	$arCatalogStore['TITLE'],							// адрес склада
							);
							
						}
					}
				}
				
				foreach($arProducts as $arProduct){
					$arResult["distr_luminaire_data_ru"][] = $arProduct;
				}
				
				$data = \Bitrix\Main\Web\Json::encode($arResult);
				
				$arResultLog = $arResult;
				$arResultLog["distr_luminaire_data_ru"] = count($arResult["distr_luminaire_data_ru"]);
				$dataLog = \Bitrix\Main\Web\Json::encode($arResultLog);
				// echo $data;
				
				if(strlen(self::$priceImportUrl) > 0){

					$curl = CLTCurl::getInstance();
					$curl->initCurl(self::$priceImportUrl);
					$arCurlOptions = array(
						CURLOPT_CUSTOMREQUEST => "POST",
						CURLOPT_POSTFIELDS => $data,
						CURLINFO_HEADER_OUT => true,
						CURLOPT_RETURNTRANSFER => TRUE,
						CURLOPT_CONNECTTIMEOUT => 60,
						CURLOPT_TIMEOUT => 300,
						CURLOPT_HTTPHEADER => array (
							"Accept: application/json",
							'Content-Length: ' . strlen($data)      
						)
					);  
					
					if(self::$priceImportHttpAuth){
						$arCurlOptions[CURLOPT_USERPWD] = self::$priceImportUser . ":" . self::$priceImportPass;
					}
					
					self::logWrite('Request body:');
					self::logWrite($dataLog);
					
					$curl->setOptions($arCurlOptions);
					$response = $curl->sendCurl();
					
					$curl->closeCurl();
				}
				
				self::logWrite('EXPORT_END--------------------');
				
				

				
				// Формат данных: JSON
				// Протокол: https
				// Метод запроса: POST
				// URL: https://ltcompany.com/en/price-import/
				// Периодичность отправки: каждые 30 минут

				// URL для отладки: https://devsite2.ltcompany.com/en/price-import/
				// Login/Pass для отладки: greensight/greensight
				// Отладочные реквизиты используется на этапе первичного подключения дистрибьютора к сайту СТ, чтобы протестировать обмен информацией. Далее обе стороны переключаются на “боевые” доменные имена и используют только их

				// {
				// "api_key": "123456API_KEY",		// API-ключ, который формируется на стороне сайта СТ один раз и передаётся дистрибьютору для его идентификации во всех сеансах обмена с сайтом СТ
				// "distr_luminaire_data_ru": [{	// кол-во НК в передаче соответствует кол-ву элементов массива
					// "id": "12345678900",			// артикул НК
					// "title": "ADV/K UNI LED",	// наименование НК
					// "sale": false,				// если НК распродажная, то параметр должен иметь значение TRUE. В противном случае параметр имеет значение FALSE.
					// "sale_price": 5048.5,		// цена распродажного светильника. Параметр имеет смысл заполнять только в том случае, если значение предыдущего параметра имеет значение TRUE
					// "warehouse": [{				// кол-во складов, на которых доступна НК, соответствует кол-ву элементов массива.
						// "stock_balance": "12",	// кол-во данной НК на складе у дистрибьютора	
						// "stock_addr": "Msk"		// адрес склада
					// },{
						// "stock_balance": "11",		
						// "stock_addr": "Spb"		
					// }],
				// },]
				// }
			}
		}

	}
	
	// for tests
	// public function sendOrderDataTest($idUniq = "ID_UNIQ")
	// {
		
		// $arResult = array(
			// "order_list" => array(
				// array(
					// "lt_lum_id" => "2CDS241001R0164",		// артикул НК 		
					// "lt_lum_price" => "2839.00", 			// цена СТ. Число с двумя знаками после запятой.		
					// "lt_lum_amount" => "3"					// кол-во заказанных единиц. Целочисленое, без дробной части.
				// ),
				// array(
					// "lt_lum_id" => "1095000030",			// артикул НК 		
					// "lt_lum_price" => "0.00", 				// цена СТ. Число с двумя знаками после запятой.		
					// "lt_lum_amount" => "3"					// кол-во заказанных единиц. Целочисленое, без дробной части.
				// ),
				// array(
					// "lt_lum_id" => "1088000510",			// артикул НК 		
					// "lt_lum_price" => "9999.00", 			// цена СТ. Число с двумя знаками после запятой.		
					// "lt_lum_amount" => "1"					// кол-во заказанных единиц. Целочисленое, без дробной части.
				// ),
				// array(
					// "lt_lum_id" => "1229000190",			// артикул НК 		
					// "lt_lum_price" => "15.50", 				// цена СТ. Число с двумя знаками после запятой.		
					// "lt_lum_amount" => "10"					// кол-во заказанных единиц. Целочисленое, без дробной части.
				// )
				
			// ),
			// "lt_order_id" => $idUniq, 						// уникальный номер заказа, который формируется на сайте СТ в момент совершения заказ
			// "lt_user_name" => "Сергей Петров",	 			// имя пользователя, которое он заполняет в момент регистрации на сайте СТ
			// "lt_user_email" => "dima@ivanov.com",		 	// E-mail пользователя, которое он заполняет в момент регистрации на сайте СТ
			// "lt_user_phone" => "+7(916)7771122", 			// Моб. телефон пользователя, который он заполняет в момент регистрации на сайте СТ
			// "api_key" => self::$apiKey,						// API-ключ, который формируется на стороне сайта СТ один раз и передаётся дистрибьютору для его идентификации во всех сеансах обмена с сайтом СТ	
		// );
		
		// // $data = json_encode($arResult);
		// $data = \Bitrix\Main\Web\Json::encode($arResult);
		
		// echo "111<pre>"; print_r($data); echo "</pre>";
		// echo "222<pre>"; print_r(json_decode($data)); echo "</pre>";
		// return;
		// $curl = CLTCurl::getInstance();
		// $curl->initCurl('http://elevel6.dev.magnitmedia.ru/ak2.php');
		// $arCurlOptions = array(
			// CURLOPT_CUSTOMREQUEST => "POST",
			// CURLOPT_POSTFIELDS => $data,
			// CURLOPT_RETURNTRANSFER => TRUE,
			// CURLOPT_HTTPHEADER => array (
				// "Accept: application/json",
				// 'Content-Length: ' . strlen($data)      
			// )
		// );  
		
		// $curl->setOptions($arCurlOptions);
		// $response = $curl->sendCurl();
		// echo "111<pre>"; print_r($response); echo "</pre>";
	// }
	
	public function recieveOrder()
	{
		self::logWrite('ORDER RECIEVE START --------------------');
		
		$arResponse = array();
		$arRequest = json_decode(file_get_contents('php://input'), true);
		
		// check data
		if(empty($arRequest))
			$arResponse['ERROR'][] = "Empty request.";
		
		if($arRequest['api_key'] != self::$apiKey)
			$arResponse['ERROR'][] = "API key is not valid.";
		
		if(empty($arRequest['order_list']))
			$arResponse['ERROR'][] = "Empty order_list.";
		
		if(strlen($arRequest['lt_order_id']) <= 0)
			$arResponse['ERROR'][] = "Empty lt_order_id.";
			
		if(empty($arResponse['ERROR'])){
			
			// collect all product codes
			$arProductCode = array();
			foreach($arRequest['order_list'] as $key=>$arOrderList){
				
				if(strlen($arOrderList['lt_lum_id']) <= 0)
					$arResponse['ERROR'][] = "Empty lt_lum_id in $key item";
				else
					$arProductCode[] = $arOrderList['lt_lum_id'];
			}
			
			if(!empty($arProductCode)){
				
				// get brand
				$arBrand = self::getBrand();
				
				if ($arBrand)
				{
					
					// get all available products
					$arProductsToBasket = array();
					$arProductsID = array();
					$arProductsQuantity = array();
					
					$arSelect = Array(
						"ID",
						"NAME", 
						"IBLOCK_ID",
						"PROPERTY_MARKING_PRODUCER",
					);
					$arFilter = Array(
						"IBLOCK_ID"=>self::$productsIblockId, 
						"PROPERTY_PRODUCER" => $arBrand['ID'],
						"PROPERTY_MARKING_PRODUCER" => $arProductCode,
						// PRODUCER_WTF
						"ACTIVE_DATE"=>"Y", 
						"ACTIVE"=>"Y",
					);
					$rsProduct = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
					while($arProduct = $rsProduct->GetNext())
					{
						$arProductsToBasket[$arProduct['PROPERTY_MARKING_PRODUCER_VALUE']] = $arProduct;
						
						$arProductsID[] = $arProduct['ID'];
					}
					
					// Get products availability
					if(!empty($arProductsID)){
						
						$dbCatalogProduct = CCatalogProduct::GetList(
								array("ID" => "ASC"),
								array(
									"ID" => $arProductsID
								),
								false,
								false
							);
						while ($arCatalogProduct = $dbCatalogProduct->Fetch())
						{
							$arProductsQuantity[$arCatalogProduct['ID']] = $arCatalogProduct['QUANTITY'];
						}
					}
										
					// let's check product existance, availability and if it's ok - add it to basket
					foreach($arRequest['order_list'] as $key=>$arOrderList){
						
						// only if this product exists
						if($arProductsToBasket[$arOrderList['lt_lum_id']]){
							
							$productId = $arProductsToBasket[$arOrderList['lt_lum_id']]['ID'];
							
							if(intval($arOrderList['lt_lum_amount']) > 0){
								
								// available quantity check
								if($arProductsQuantity[$productId] > $arOrderList['lt_lum_amount']){

									// save in basket item properties 
									
									$arBasketItemProps = array(
										array("NAME" => iconv( "UTF-8", "cp1251", "Уникальный номер заказа сайта СТ"), "CODE" => "LT_ORDER_ID", "VALUE" => $arRequest['lt_order_id']),
									);
									
									if(strlen($arRequest['lt_user_name']) > 0)
										$arBasketItemProps[] = array("NAME" => iconv( "UTF-8", "cp1251", "Имя пользователя"), "CODE" => "LT_USER_NAME", "VALUE" => iconv( "UTF-8", "cp1251", $arRequest['lt_user_name']));
									
									if(strlen($arRequest['lt_user_email']) > 0)
										$arBasketItemProps[] = array("NAME" => "Email", "CODE" => "LT_USER_EMAIL", "VALUE" => $arRequest['lt_user_email']);
									
									if(strlen($arRequest['lt_user_phone']) > 0)
										$arBasketItemProps[] = array("NAME" => iconv( "UTF-8", "cp1251", "Телефон"), "CODE" => "LT_USER_PHONE", "VALUE" => $arRequest['lt_user_phone']);
									
									// add item to basket
									$result = Add2BasketByProductID(
										$productId,
										$arOrderList['lt_lum_amount'],
										array(),
										$arBasketItemProps
									);
									
									// throw exeption in error array
									global $APPLICATION;
									if ($ex = $APPLICATION->GetException())
										$arResponse['ERROR'][] = "Product " . $arOrderList['lt_lum_id'] . " error adding to basket:" . $ex->GetString();
									else
										$arResponse['SUCCESS'][] = "Product " . $arOrderList['lt_lum_id'] . " successfully added to basket.";
								}
								else
									$arResponse['ERROR'][] = "Product " . $arOrderList['lt_lum_id'] . " not available in ammount lt_lum_amount = " .  $arOrderList['lt_lum_amount'];
							}
							else
								$arResponse['ERROR'][] = "Product " . $arOrderList['lt_lum_id'] . " lt_lum_amount not valid.";
						}
						else
							$arResponse['ERROR'][] = "Product " . $arOrderList['lt_lum_id'] . " not found.";
					}
				}
				else
					$arResponse['ERROR'][] = "No brand found.";
			}
			else
				$arResponse['ERROR'][] = "No lt_order_id found.";
		}
		
		echo json_encode($arResponse);
		
		self::logWrite('Request:');
		self::logWrite($arRequest);
		
		self::logWrite('Response:');
		self::logWrite($arResponse);
		
		self::logWrite('ORDER RECIEVE END --------------------');
		
		// {
		// “order_list”:[							// кол-во НК в заказе соответствует кол-ву элементов массива
			// {
			// “lt_lum_id”: “12345678900”,			// артикул НК 		
			// “lt_lum_price”: “2839.00”, 			// цена СТ. Число с двумя знаками после запятой.		
			// “lt_lum_amount”: “3” 				// кол-во заказанных единиц. Целочисленое, без дробной части.
			// },
			// // данные могут передаваться массивом
		// ]

		// “lt_order_id” = “ID_UNIQ” 				// уникальный номер заказа, который формируется на сайте СТ в момент совершения заказа
		// “lt_user_name” = “Dima”, 				// имя пользователя, которое он заполняет в момент регистрации на сайте СТ
		// “lt_user_email” = “dima@ivanov.com”, 	// E-mail пользователя, которое он заполняет в момент регистрации на сайте СТ
		// “lt_user_phone” = “+7(916)7771122” 		// Моб. телефон пользователя, который он заполняет в момент регистрации на сайте СТ
		// “api_key”: “123456API_KEY”,				// API-ключ, который формируется на стороне сайта СТ один раз и передаётся дистрибьютору для его идентификации во всех сеансах обмена с сайтом СТ
		// }

	}
	
	public function redirectToBasket(){
		
		self::logWrite('REDIRECT TO BASKET START --------------------');
		
		$arResponse = array();
		
		$lt_order_id = $_REQUEST['lt_order_id'];
		
		$fUser = CSaleBasket::GetBasketUserID();
		
		if(intval($fUser) > 0){
			
			// add basket to current user 
			if(strlen($lt_order_id) > 0){
				
				$arBasketItemsId = array();
				$arBasketItemsProperties = array();
				
				// get properties values with LT ORDER ID than collect basket item ids
				$dbBasketPropList = CSaleBasket::GetPropsList(
						array(
								"SORT" => "ASC",
								"NAME" => "ASC"
							),
						array(
							"CODE" => "LT_ORDER_ID",
							"VALUE" => $_REQUEST['lt_order_id']
						)
					);
				while ($arBasketPropList = $dbBasketPropList->Fetch())
				{
					if(!in_array($arBasketPropList['BASKET_ID'],$arBasketItemsId))
						$arBasketItemsId[] = $arBasketPropList['BASKET_ID'];
					
					$arBasketItemsProperties[$arBasketPropList['BASKET_ID']] = $arBasketPropList;
				}
				
				
				if(!empty($arBasketItemsId)){
					
					foreach($arBasketItemsId as $basketItemId){
						
						if(intval($basketItemId > 0)){
							
							// set basket item to current user
							$arFields = array(
							   "FUSER_ID" => $fUser
							);
							CSaleBasket::Update($basketItemId, $arFields);
							
							$arResponse['SUCCESS'][] = "Basket item added to FUSER = " . $fUser;
						}
					}
					
				}
				else
					$arResponse['ERROR'][] = "No basket items with lt_order_id = " . $lt_order_id . " found.";
				
			}
			else
				$arResponse['ERROR'][] = "lt_order_id not valid.";
		}
		else
			$arResponse['ERROR'][] = "FUSER error.";
		
		self::logWrite('Request:');
		self::logWrite($_REQUEST);
		self::logWrite('Response:');
		self::logWrite($arResponse);
		self::logWrite('REDIRECT TO BASKET END --------------------');
		
		localRedirect(self::$orderRedirectUrl);
		
	}

	public function getBrand(){
		
		// get brand id
		$arFilter = array(
			'IBLOCK_ID' => self::$brandIblockId,
			"CODE" => "svetovye-tekhnologii" // Световые Технологии
		);
		$rsBrand = CIBlockSection::GetList(array('LEFT_MARGIN' => 'ASC'), $arFilter, false, array("ID","NAME","CODE"));
		if ($arBrand = $rsBrand->Fetch())
			return $arBrand;
		else
			return false;
	}
	
}

Class CLTCurl
{
    public static $__instance;
    private $curl;
    private $url;
    public function __construct()
    {
        self::$__instance = $this;
    }
    /**
     * Gets instance of Session class.
     * @return Session
     */
    public static function getInstance()
    {
        if (self::$__instance === null)
        {
            self::$__instance = new self();
        }
        return self::$__instance;
    }

    /**
     * Инициализация curl
     * @param $url
     */
    public function initCurl($url)
    {
        $this->url = $url;
        $this->curl = curl_init($this->url);
    }

    /**
     * Закрытие сессии curl
     */
    public function closeCurl()
    {
        curl_close($this->curl);
    }

    /**
     * Применение настроек curl
     * @param $arOptions - массив параметров curl
     */
    public function setOptions($arOptions)
    {
        foreach ($arOptions as $option=>$value){
            curl_setopt($this->curl, $option, $value);
        }
    }

    /**
     * Отправка запроса через curl
     * @return array - ответ
     */
    public function sendCurl()   {
		
		$obLt = CMagnitmediaLT::getInstance();
		
        $result = curl_exec($this->curl);
		$httpcode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
		$info = curl_getinfo($this->curl);
		
		$obLt->logWrite("Request info:");
		$obLt->logWrite($info);
		
		$obLt->logWrite("Response:");
		$obLt->logWrite($result);
		
		echo "<pre>"; print_r($result); echo "</pre>";
		echo "<pre>"; print_r($info); echo "</pre>";
		
		// echo var_dump($httpcode);
		// echo var_dump($this->curl);
		// echo var_dump($result);
		// echo "qwe<pre>"; print_r($result); echo "</pre>asd";
        $json = json_decode($result, TRUE);
		

        $tryCount = 3;

        if ($httpcode != 200)
        {
            while ($tryCount > 0 && $httpcode != 200){
                sleep(60);
                $result = curl_exec($this->curl);
				$httpcode = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
                $json = json_decode($result, TRUE);
                $tryCount--;
            }
        }

        return $json;
    }
}
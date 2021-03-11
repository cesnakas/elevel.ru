<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
ini_set('error_reporting', E_ERROR);   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', "6070M");
set_time_limit(2400);  
 
ini_set('memory_limit', "6000M"); 
set_time_limit(2400);    

// текущая сборка php 4~ не содержит этой функции        
if (!function_exists('curl_file_create')) {     
     function curl_file_create($filename, $mimetype = '', $postname = '') {
        return "@$filename;filename="
            . ($postname ?: basename($filename))
            . ($mimetype ? ";type=$mimetype" : '');
    }  
}
// этот класс будет использован в резал модифаере компонента "tezart:xml_export_raek",  шаблон "new_items_without_raek_id",
class RestClient
{
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';   
    protected $apiKey;
     
    protected $urlBase;
     
    
    protected $format;
     
    public function __construct($urlBase, $apiKey, $format = self::FORMAT_JSON)
    {
        $this->urlBase = $urlBase;
        $this->apiKey = $apiKey;
        $this->format = $format;
    }
     
    public function get($url, $params = [])
    {
        return $this->httpRequest($url, $params, 'GET');
    }
     
    protected function _convertParams($params)
    {
        return $result = http_build_query($params);
    }
     
    public function getHttpCode()
    {
        return $this->httpCode;
    }
     
    public function httpRequest($url, $postfields = array(), $method = "GET")
    {
        foreach ($postfields as $key => $value) {
            if (is_null($value)) {
                unset($postfields[$key]);
            }
        }
        $url = $this->urlBase . $url;
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_HEADER, false);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false); // отключение проверки сертификата для получения ответа при боевой загрузке
        //curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ci, CURLOPT_HTTPHEADER, [
            'API-KEY: ' . $this->apiKey,
            'format: ' . $this->format,
            //'json_force_object: 0'
        ]);
        $postfields = $this->_convertParams($postfields);
        switch ($method) {
            case 'GET':
                $url .= "?" . $postfields;
                break;
        }
        curl_setopt($ci, CURLOPT_URL, $url);
        $response = curl_exec($ci);
        $this->httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        curl_close($ci);
        return $response;
    }
}   
 
global $arrFilter;
$arrFilter = array(">=DATE_CREATE" =>  '01.04.2016 00:00:00', "<=DATE_CREATE" => '04.05.2016 00:00:00');  
  $APPLICATION->IncludeComponent(
	"tezart:xml_export_raek", 
	"new_items_without_raek_id", 
	array(
		"IBLOCK_TYPE" => "Каталог товаров",
		"IBLOCK_ID_IN" => array(
			0 => "53",
		),
		"IBLOCK_ID_EX" => array(
			0 => "0",
		),
		"IBLOCK_SECTION" => array(
			//0 => "45295"
            0 => "0",
			/*1 => "45335",
			2 => "45336",
			3 => "45337",
			4 => "45338",
			5 => "45341",
			6 => "45342",
			7 => "45343",
			8 => "45344",
			9 => "45345",
			10 => "45346",*/ 
		//11 => "45347",
			/*12 => "45348",
			13 => "45349",
			14 => "45350",
			15 => "45351",
			16 => "45352",
			17 => "45353",
			18 => "45354",*/
		),
		"SITE" => "http://www.elevel.ru/",
		"COMPANY" => "ООО \"Эlevel\"",
		"FILTER_NAME" => "arrFilter",
		"MORE_PHOTO" => "MORE_PHOTO",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "86400",
		"CACHE_FILTER" => "N",
		"PRICE_CODE" => array(
			0 => "Московский филиал",
		),
		"IBLOCK_ORDER" => "N",
		"CURRENCY" => "RUR",
		"LOCAL_DELIVERY_COST" => "250",
		"COMPONENT_TEMPLATE" => "new_items_without_raek_id",
		"IBLOCK_CATALOG" => "Y",
		"DO_NOT_INCLUDE_SUBSECTIONS" => "N",
		"IBLOCK_AS_CATEGORY" => "Y",
		"CACHE_NON_MANAGED" => "N",
		"SKU_NAME" => "PRODUCT_AND_SKU_NAME",
		"SKU_PROPERTY" => "PROPERTY_CML2_LINK",
		"NAME_PROP" => "0",
		"PARAMS" => "",
		"COND_PARAMS" => "",
		"DISCOUNTS" => "PRICE_ONLY",
		"DEVELOPER" => "",
		"COUNTRY" => "",
		"DEVELOPER_ALT" => "",
		"CURRENCIES_CONVERT" => "NOT_CONVERT",
		"DETAIL_TEXT_PRIORITET" => "N"
	),
	false
);  
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
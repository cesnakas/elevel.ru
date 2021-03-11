<?php   
// Ручной запуск
// сценарий получает из Раека все элементы привязанные к элевелу - и проставляет раек_Ид в БД элевела
chdir(__DIR__); // при текущих настройках окружения относительные пути кроном не понимаются - задаю вручную
// когда сохраняешь скрипт на крон через ssh, используй команду :wq, команда :w - не сохраняет
include('../raek_class.php');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 

$client = new RestClient('https://catalog.raec.su/api/', 'e67bcc62ba51dcdbb8cf5cb92aa3ec85'); // используйте ваш ключ  
  
$Items_with_raek_ID_tmp = array(); 
$Items_with_raek_ID = array(); 
$count_pages = $client->get('product/pages', array('filter[companyId]' => 2, 'filter[fields]' => 'raecId,individualCodes', 'filter[limit]' => 999));
 
for ($i = 1; $i <= $count_pages; $i++) {
    $response = $client->get('product/page-'.$i, array('filter[companyId]' => 2, 'filter[fields]' => 'raecId,individualCodes', 'filter[limit]' => 999));
    $Items_with_raek_ID_tmp = array_merge($Items_with_raek_ID_tmp, json_decode($response, true));  
}     
 
 
foreach($Items_with_raek_ID_tmp as $key => $value):
    $Items_with_raek_ID[$value["individualCodes"][2]["article"]] = $value["raecId"]; 
endforeach;      


CModule::IncludeModule('iblock');     
$rsElements = CIBlockElement::GetList(
    array(),
    array("IBLOCK_ID" => 53),
    false,
    false,
    array("ID", "PROPERTY_CML2_ARTICLE")
);  
$arItems = array();   
while ($ar = $rsElements->GetNext()) {     
    $arItems[$ar["PROPERTY_CML2_ARTICLE_VALUE"]] = $ar["ID"];    
}     
       
foreach ($arItems as $article => $ID):                              
    if($Items_with_raek_ID[$article] != false):  
          CIBlockElement::SetPropertyValuesEx($arItems[$article], 53, array("RAEK_ID" => $Items_with_raek_ID[$article]));   
    endif;  
endforeach;

//Тест массивы.            
/*$Items_with_raek_ID = array (
    "1754-0-4107 (1724-80)]" => 1,
    "1754-0-4232 (1723-182 K)" => 2,
    "1754-0-4121 (1734 KA-260)" => 5, 
    "1754-0-4256 (1723-860)" => 8, 
);

$arItems = array(
    "1754-0-4107 (1724-80)" => 1337897,
    "1754-0-4232 (1723-182 K)" => 1337427,
    "1754-0-4121 (1734 KA-260)" => 1336843,
    "1754-0-4256 (1723-860)" => 1337336
);   */


/*
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
}  */
?>
<?        
class RestClient
{   
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml'; 
    protected $format;   
    protected $_httpCode; 
    protected $apiKey; 
    protected $urlBase;
    public $debug = false;   
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
    public function post($url, $params = [])
    {
        return $this->httpRequest($url, $params, 'POST');
    }
  
    public function getHttpCode_get()
    {
        return $this->httpCode;
    }
    public function getHttpCode_post()
    {
        return $this->_httpCode;
    }            
    public function httpRequest($url, $postfields = [], $method)
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
        
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, 0); // отключение проверки сертификата для получения ответа при боевой загрузке
 
        $httpHeader = ['API-KEY: ' . $this->apiKey];
        if ($this->debug) {
            $httpHeader[] = 'DEBUG: 1';
        }
 
        switch ($method) {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($postfields)) {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
                }
                curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);     
                break;
            case 'GET':
                curl_setopt($ci, CURLOPT_HTTPHEADER, [
                    'API-KEY: ' . $this->apiKey,
                    'format: ' . $this->format 
                ]);
                $postfields = $this->_convertParams($postfields);
                $url .= "?" . $postfields;
                break;
        }
        curl_setopt($ci, CURLOPT_URL, $url);
  
        curl_setopt($ci, CURLOPT_HTTPHEADER, $httpHeader);  
        $response = curl_exec($ci);  
                                                                
        $this->httpCode = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        
        curl_close($ci);
  
        return $response;
              
    }
}        
?>
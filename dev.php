<?

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$curl = curl_init();

$id = "0";
$method = 'orders';
$code = "6Ofl5zjIBWd0QBDkNs0Ry1fzTo0EW70ahxpnroUTX8Lo9raKkrrFF3EYysNpBFdJ";
$message = '{"32880":{"ID":32880,"PTI":"1","DATE":"2020-05-14 19:18:00","PAYED":false,"CANCELED":false,"STATUS_ID":"N","PAYER_TYPE":"np","PRICE":{"CASH":"N","PRICE":521.85000000000002,"DELIVERY":490,"PAID":0,"BONUS":0},"ALLOW_DELIVERY":false,"COMMENT":"","DELIVERY":"h","DELIVERY_CARRIER":"","ITEMS":[{"ID":"94501","QUANTITY":1,"PRICE":{"PRICE":31.850000000000001,"DISCOUNT":0,"CUSTOM":false}}],"VALUES":{"Name":"\u044b\u0444\u0432\u0444\u044b\u0432\u0444\u044b\u0432\u044b","Phone":"222222222","DeliveryAddress":"\u0422\u0435\u0441\u0442","Email":"a.kuzmina@elevel.ru","StorageId":""},"ADDITIONAL_VALUES":{"\u041e\u0444\u0438\u0441 \u042d\u043b\u0435\u0432\u0435\u043b":["-"],"\u0424\u0430\u043c\u0438\u043b\u0438\u044f":[""],"\u0423\u043b\u0438\u0446\u0430":[""],"\u0414\u043e\u043c":[""],"\u041a\u043e\u0440\u043f.\/\u0441\u0442\u0440.":[""],"\u041a\u0432.\/\u043e\u0444\u0438\u0441":[""],"\u0412\u0430\u0448 \u043f\u0440\u043e\u0444\u0438\u043b\u044c":[null],"\u0422\u0438\u043f \u043f\u043b\u0430\u0442\u0435\u043b\u044c\u0449\u0438\u043a\u0430":[null],"\u0421\u043e\u0445\u0440\u0430\u043d\u0438\u0442\u044c \u043a\u0430 \u043f\u043b\u0430\u0442\u0435\u0436\u043d\u044b\u0439 \u0448\u0430\u0431\u043b\u043e\u043d":["N"],"\u041d\u0430\u0438\u043c\u0435\u043d\u043e\u0432\u0430\u043d\u0438\u0435 \u044e\u0440\u0438\u0434\u0438\u0447\u0435\u0441\u043a\u043e\u0433\u043e \u043b\u0438\u0446\u0430":[""],"\u0418\u043d\u0434\u0435\u043a\u0441":[""],"\u0413\u043e\u0440\u043e\u0434":[""],"\u041a\u0443\u0434\u0430 \u0434\u043e\u0441\u0442\u0430\u0432\u0438\u0442\u044c":[""],"\u0424\u0430\u043a\u0442\u0438\u0447\u0435\u0441\u043a\u0438\u0439 \u0430\u0434\u0440\u0435\u0441 (\u0430\u0434\u0440\u0435\u0441 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438)":[""],"\u0422\u0440\u0430\u043d\u0441\u043f\u043e\u0440\u0442\u043d\u0430\u044f \u043a\u043e\u043c\u043f\u0430\u043d\u0438\u044f":["\u0421\u0414\u042d\u041a","\u0421\u0414\u042d\u041a"],"\u0410\u0434\u0440\u0435\u0441 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \u0434\u043b\u044f \u0421\u0414\u042d\u041a":[null],"\u0422\u0435\u043b\u0435\u0444\u043e\u043d \u0434\u043b\u044f \u0421\u0414\u042d\u041a":["222222222"],"E-mail \u0434\u043b\u044f \u0421\u0414\u042d\u041a":["a.kuzmina@elevel.ru"],"\u0413\u043e\u0440\u043e\u0434 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438":["\u0420\u043e\u0441\u0441\u0438\u044f, \u041f\u043e\u0432\u043e\u043b\u0436\u044c\u0435, \u0420\u0435\u0441\u043f\u0443\u0431\u043b\u0438\u043a\u0430 \u0422\u0430\u0442\u0430\u0440\u0441\u0442\u0430\u043d, \u041a\u0430\u0437\u0430\u043d\u044c"],"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u043a\u0430\u0437\u0430 LT":[""]},"GARM_SEND_ON_ORDER_SAVE":"Y"}}';

$params = array(
    'id'=> $id,
    'method'=>$method,
    'message'=>$message,
    'code'=> "elevelru",
    'hash'=>sha1($id.$method.$message.$code)
);

$host = "https://eway.elevel.ru/api/exchange/message/";
$timeout = 500;

$options = array(
    CURLOPT_URL            => $host,
    CURLOPT_POST           => 1,
    CURLOPT_POSTFIELDS     => $params,
    CURLOPT_RETURNTRANSFER => true,     // return web page
    CURLOPT_HEADER         => false,    // don't return headers
    CURLOPT_FOLLOWLOCATION => true,     // follow redirects
    CURLOPT_ENCODING       => "",       // handle all encodings
    CURLOPT_USERAGENT      => "spider", // who am i
    CURLOPT_AUTOREFERER    => true,     // set referer on redirect
    CURLOPT_CONNECTTIMEOUT => $timeout,      // timeout on connect
    CURLOPT_TIMEOUT        => $timeout,      // timeout on response
    CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
    CURLOPT_SSL_VERIFYPEER => false,    // Disabled SSL Cert checks
);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

curl_setopt_array( $curl, $options );
$out = curl_exec($curl);

$errno = curl_errno($curl);
$error_message = curl_strerror($errno);

 echo "<pre>"; print_r($out); echo "</pre>";
echo "<pre>"; var_dump($error_message); echo "</pre>";

curl_close($curl);


?>
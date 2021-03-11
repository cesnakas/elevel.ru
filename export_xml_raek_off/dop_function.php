<?
// текущая сборка php 4~ не содержит этой функции        
if (!function_exists('curl_file_create')) {     
     function curl_file_create($filename, $mimetype = '', $postname = '') {
        return "@$filename;filename="
            . ($postname ?: basename($filename))
            . ($mimetype ? ";type=$mimetype" : '');
    }  
}
function Replace($str_for_replace){     // дополнительно очистит текст от спецсимволов 
    $str_for_replace = htmlspecialchars_decode($str_for_replace);
    $str_for_replace = str_replace(array('&'), array('&amp;'), $str_for_replace);    
    $str_for_replace = str_replace(array('"'), array('&quot;'), $str_for_replace);    
    $str_for_replace = str_replace(array('>'), array('&gt;'), $str_for_replace); 
    $str_for_replace = str_replace(array('<'), array('&lt;'), $str_for_replace); 
    $str_for_replace = str_replace(array("'"), array('&apos;'), $str_for_replace);  
    return $str_for_replace;    
}
function SendFileInRaek($FilePath, $FileName, $base_url = 'https://catalog.raec.su/api/', $api_key = 'e67bcc62ba51dcdbb8cf5cb92aa3ec85'){
    $client = new RestClient($base_url, $api_key); 
    $cfile = curl_file_create($FilePath, 'text/xml', $FileName);   
    $post = ['xml' => $cfile, 'companyId' => 2];
    $response = $client->post('companycodes/add', $post); 
    //var_dump($response);    
}

function CreateXmlFileForRaek($FileName, $arOffers){       
$exportfile = $_SERVER["DOCUMENT_ROOT"].'/export_xml_raek/'.$FileName;  
$exportfileHandle = fopen($exportfile, 'w') or die("can't open file"); 
$file_begin = '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE raec_catalog SYSTEM "company_products.dtd">  
    <raec_catalog date="'.date("Y-m-d h:i:s").'"> 
        <company>  
            <name>http://www.elevel.ru/</name>
            <offers>'; 
            fwrite($exportfileHandle, $file_begin); 
             foreach($arOffers as $arOffer):
                $file_offer_name =' 
                <offer>  
                    <name>'.Replace($arOffer["NAME"]).'</name>';
                $file_offer_name = iconv("WINDOWS-1251", "UTF-8", $file_offer_name);
                fwrite($exportfileHandle, $file_offer_name);  
                $file_offer_raecId = '<raecId>'.Replace($arOffer["RAEK_ID"]).'</raecId>'; 
                $file_offer_raecId = iconv("WINDOWS-1251", "UTF-8", $file_offer_raecId);
                fwrite($exportfileHandle, $file_offer_raecId);         
                $file_offer_supplierId = '<supplierId>'.Replace($arOffer["ARTIKUL_POSTAVSHCHIKA"]).'</supplierId>'; 
                $file_offer_supplierId = iconv("WINDOWS-1251", "UTF-8", $file_offer_supplierId);
                fwrite($exportfileHandle, $file_offer_supplierId);
                $file_offer_brandName = '<brandName>'.Replace($arOffer["MANUFACTURER"]).'</brandName>';
                $file_offer_brandName = iconv("WINDOWS-1251", "UTF-8", $file_offer_brandName);
                fwrite($exportfileHandle, $file_offer_brandName);
                $file_offer_article = '<article>'.Replace($arOffer["ARTIKUL"]).'</article>';
                $file_offer_article = iconv("WINDOWS-1251", "UTF-8", $file_offer_article);
                fwrite($exportfileHandle, $file_offer_article);
                $file_offer_externalLink = '<externalLink>http://www.elevel.ru'.$arOffer["DETAIL_URL"].'</externalLink>  
                </offer>';  
                $file_offer_externalLink = iconv("WINDOWS-1251", "UTF-8", $file_offer_externalLink);      
                fwrite($exportfileHandle, $file_offer_externalLink); 
            endforeach;?>     
<? $file_end = '</offers> 
        </company>
    </raec_catalog>';
$file_end = iconv("WINDOWS-1251", "UTF-8", $file_end); 
    
fwrite($exportfileHandle, $file_end);   
fclose($exportfileHandle);     
}
?> 
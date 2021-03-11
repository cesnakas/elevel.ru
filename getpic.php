<?php
if (!function_exists('getallheaders')) {
   function getallheaders() 
    {
       foreach ($_SERVER as $name => $value) 
       {
           if (substr($name, 0, 5) == 'HTTP_') 
           {
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
           }
       }
       return $headers;
    }
}

    $fn=preg_replace("@^\/@","",$_GET["src"]);

    preg_match("@[a-zA-Z0-9_ -\.]*$@",$fn,$arr);

    if(isset($_GET["w"])&&($_GET["w"]>0))
    {
        $w=$_GET["w"];
    } else {
        $w=0;
    };

    if(isset($_GET["h"])&&($_GET["h"]>0))
    {
        $h=$_GET["h"];
    } else {
        $h=0;
    };

    $cfn=$w."_".$h."_".$arr[0];

    if(file_exists("cache/".$cfn))
    {
// Получаем время последней модификации кэш-файла
$lastModified = filemtime("cache/".$cfn); $slastModified = gmdate('D, d M Y H:i:s', $lastModified) . ' GMT';
// Выдаём заголовок HTTP Last-Modified
header('Last-Modified: ' . $slastModified ); 
// Получаем заголовки запроса клиента - только для Apache
$headers = getallheaders(); 
if (isset($headers['If-Modified-Since'])) {  // Разделяем If-Modified-Since (Netscape < v6 отдаёт их неправильно) 
   $modifiedSince = explode(';', $headers['If-Modified-Since']); 
   // Преобразуем запрос клиента If-Modified-Since в таймштамп
   $modifiedSince = strtotime($modifiedSince[0]); 
   // Сравниваем время последней модификации контента с кэшем клиента
   if ($lastModified <= $modifiedSince) { header('HTTP/1.1 304 Not Modified'); exit(); } // Разгружаем канал передачи данных!
   } ;


        $fh=fopen("cache/".$cfn,"r");
        $str=fread($fh,filesize("cache/".$cfn));
        fclose($fh);
    header("Expires: Mon, 18 Oct 2015 14:15:00 GMT");
    Header('Content-type: image/jpeg');
        echo $str;
    } else { 

    $fh=fopen($fn,"r");
    $str=fread($fh,filesize($fn));
    fclose($fh);    

    $img=imagecreatefromstring($str);
   
        if(($w>0)&($h>0))
        {
                $size[0]=imagesx($img);
                $size[1]=imagesy($img);


                $o1=$w/$h;
                $o2=$size[0]/$size[1];
                
                if($o1<$o2)
                {
                  $dw=$w;
                  $dh=round($size[1]*$dw/$size[0]);
                } else {
                  $dh=$h;
                  $dw=round($size[0]*$dh/$size[1]);
                };
        } else if($w>0){
            $dh=$w/imagesx($img)*imagesy($img);
            $dw=$w;
        } else {
            $dw=$h/imagesy($img)*imagesx($img);
            $dh=$h;
        };
        $src=imagecreatetruecolor($dw,$dh);
        imagecopyresampled($src,$img,0,0,0,0,$dw,$dh,imagesx($img),imagesy($img));


        imagejpeg($src,"cache/".$cfn,100);
        $fh=fopen("cache/".$cfn,"r");
        $str=fread($fh,filesize("cache/".$cfn));
        fclose($fh);
        Header('Content-type: image/jpeg');

        echo $str;
    };
?>
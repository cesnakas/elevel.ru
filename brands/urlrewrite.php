<?
$new_url = str_replace('_', '-', mb_strtolower(htmlspecialchars($_SERVER["REQUEST_URI"])));  

header("HTTP/1.1 301 Moved Permanently"); 
header("Location: {$new_url}");                 
?>
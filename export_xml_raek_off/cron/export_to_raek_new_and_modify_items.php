<?php  
chdir(__DIR__); // при текущих настройках окружения относительные пути кроном не понимаются - задаю вручную
// когда сохраняешь скрипт на крон через ssh, используй команду :wq, команда :w - не сохраняет   
include('../settings_script.php');  
include('../dop_function.php');  
include('../raek_class.php');
SendFileInRaek('../xml_new_and_modify_items.xml', 'xml_new_and_modify_items.xml');
?>    
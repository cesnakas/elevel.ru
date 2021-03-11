<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

set_time_limit(0);
ini_set("memory_limit", "1000M");

define("ID", 0);
define("CODE", 1);
define("ARTICUL", 2);
define("URL", 3);

$redirects = array();
$count_finded = 0;
$count_not_finded = 0;

//$csv_old = array_map('str_getcsv', file('get_goods_old.csv'), ";");
//$csv_new = array_map('str_getcsv', file('get_goods_new.csv'), ";");

if (($csv_old_file = fopen("get_goods_old.csv", "r")) !== FALSE && ($csv_new_file = fopen("get_goods_new.csv", "r")) !== FALSE) {
    while (($old_string = fgetcsv($csv_old_file, 5000, ";")) !== FALSE) {
		$csv_old[ $old_string[ID] ] = $old_string;
	}
	
	while (($new_string = fgetcsv($csv_new_file, 5000, ";")) !== FALSE) {
		$csv_new[ $new_string[ID] ] = $new_string;
	}
	
	fclose($csv_old_file);
	fclose($csv_new_file);
}

foreach($csv_old as $old_string)
{
	if (isset($csv_new[ $old_string[ID] ]))
	{
		$redirects[] = array($old_string[URL], $csv_new[ $old_string[ID] ][URL]);
		$count_finded++;
	}
	else
	{
		$redirects[] = array($old_string[URL], "/shop/search/index.php?q=".$old_string[ARTICUL]);
		$count_not_finded++;
	}
}

echo "finded: ". $count_finded . "\n" . "not finded: ". $count_not_finded;

foreach($redirects as $redirect)
	file_put_contents("get_goods_redirect.txt", "Redirect 301 ". $redirect[0] . " " . $redirect[1] . "\n", FILE_APPEND);
?>
<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

set_time_limit(0);
ini_set("memory_limit", "1000M");

define("URL_BEFORE", 2);
define("URL_AFTER", 3);

$redirects = array();
$count_finded = 0;
$count_not_finded = 0;


if (($csv_old_file = fopen("get_sections_old.csv", "r")) !== FALSE) {
    while (($old_string = fgetcsv($csv_old_file, 5000, ";")) !== FALSE) {
		file_put_contents("get_sections_redirect.txt", "Redirect 301 ". $old_string[URL_BEFORE] . " " . $old_string[URL_AFTER] . "\n", FILE_APPEND);
	}

	fclose($csv_old_file);
}
?>
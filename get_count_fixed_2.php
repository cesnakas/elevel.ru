<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

set_time_limit(0);
ini_set("memory_limit", "1000M");

//define("ID", 0);
define("OLD_LINK", 2);
define("NEW_LINK", 3);
/*define("ARTICUL", 2);
define("URL", 3);*/

$file_redirects = file_get_contents('redirects.txt');
$redirects = explode("\n", $file_redirects);
$urls = array();

foreach($redirects as $redirect)
{
	$redirect_data = explode(" ", $redirect);
	//echo $redirect_data[OLD_LINK] . "\n";
	$urls[] = str2url($redirect_data[OLD_LINK]);
	
	$redirects[ str2url($redirect_data[OLD_LINK]) ] = $redirect_data;
	
	//echo "<pre>".print_r($urls,true)."</pre>";
	//echo "<pre>".print_r($redirect_data,true)."</pre>";
}

$file_indexed = file_get_contents('elevel.csv');
$indexed_urls = explode("\n", $file_indexed);

$count_finded = 0;
$count_not_finded = 0;

//echo "<pre>".print_r($indexed_urls,true)."</pre>";

$flip_array = array_flip($urls);

//$i = 0;
foreach($indexed_urls as $url)
{
	if (!isset($flip_array[ str2url($url) ]) && substr($url, 0, 6) == "/shop/")
	{
		file_put_contents("elevel_fixed_fail.csv", "Redirect 301 " . trim($url) . " /shop/\n", FILE_APPEND);
		$count_finded++;
	}
	
	//if ($i == 10) break;
	//$i++;
}

echo $count_finded . "\n";
	
	
function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}
function str2url($str) {
    // переводим в транслит
    $str = rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
    $str = trim($str, "-");
    return $str;
}
?>
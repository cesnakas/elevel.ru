<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

set_time_limit(0);
ini_set("memory_limit", "1000M");

$file_redirects = file_get_contents('redirects_our.txt');
$redirects = explode("\n", $file_redirects);
$urls = array();

foreach($redirects as $redirect)
{
	if (!in_array($redirect, $urls))
	{
		$urls[] = $redirect;
		
		if (substr_count($redirect, "/search/index.php?q=") > 0)
		{
			$data = explode("/search/index.php?q=", $redirect);
			$data[1] = urlencode($data[1]);
			
			$redirect = implode("/search/index.php?q=", $data);
		}
		
		file_put_contents("elevel_urlencoded.csv", trim($redirect) . "\n", FILE_APPEND);
	}
}

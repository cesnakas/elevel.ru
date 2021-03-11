<?$_SERVER['DOCUMENT_ROOT'] = "/home/www/elevel/data/www/elevel.ru";

set_time_limit(0);
ini_set("memory_limit", "1000M");

define("SECTION_ID", 		0);
define("SECTION_CODE", 		1);
define("SECTION_PAGE_URL", 	2);
define("BRAND_ID", 			3);
define("BRAND_CODE", 		4);
define("BRAND_NAME", 		5);
define("SERIE_ID", 			6);
define("SERIE_CODE",		7);
define("SERIE_NAME",		8);
define("BRANDS",			9);

define("SECTION_ID_BEFORE", 0);
define("SECTION_ID_AFTER", 	5);

define("FILTER_PROPERTY_ID",		0);
define("FILTER_PROPERTY_VALUE_ID",	1);

$redirects = array();
$count_finded = 0;
$count_not_finded = 0;

if (($csv_brands_series = fopen("get_sections_new_filters_brands_series.csv", "r")) !== FALSE) {
    while (($brands_series_string = fgetcsv($csv_brands_series, 10000, ";")) !== FALSE) {
		
		$brands_series_id2filter_id[ $brands_series_string[FILTER_PROPERTY_VALUE_ID] ] = $brands_series_string[FILTER_PROPERTY_ID];
	}
}

if (($csv_old_file = fopen("get_sections_old_filters.csv", "r")) !== FALSE && ($csv_new_file = fopen("get_sections_new_filters.csv", "r")) !== FALSE && ($csv_file_sections = fopen("get_sections_old.csv", "r")) !== FALSE) {
    while (($old_string = fgetcsv($csv_old_file, 10000, ";")) !== FALSE) {
		if (!isset($csv_old[ $old_string[SECTION_ID] ]))
			$csv_old[ $old_string[SECTION_ID] ] = $old_string;
		
		$csv_old[ $old_string[SECTION_ID] ][BRANDS][ $old_string[BRAND_ID] ]["CODE"] = $old_string[BRAND_CODE];
		$csv_old[ $old_string[SECTION_ID] ][BRANDS][ $old_string[BRAND_ID] ]["SERIES"][ $old_string[SERIE_ID] ] = $old_string[SERIE_CODE];
	}
	
	while (($new_string = fgetcsv($csv_new_file, 10000, ";")) !== FALSE) {
		if (!isset($csv_new[ $new_string[SECTION_ID] ]))
			$csv_new[ $new_string[SECTION_ID] ] = $new_string;
		
		$csv_new[ $new_string[SECTION_ID] ][BRANDS][ $new_string[BRAND_ID] ]["CODE"] = $new_string[BRAND_CODE];
		$csv_new[ $new_string[SECTION_ID] ][BRANDS][ $new_string[BRAND_ID] ]["SERIES"][ $new_string[SERIE_ID] ] = $new_string[SERIE_CODE];
		
		//$csv_new[ $new_string[SECTION_ID] ][SERIES][ $new_string[SERIE_ID] ] = $new_string[SERIE_CODE];
	}
	
	while (($section_string = fgetcsv($csv_file_sections, 10000, ";")) !== FALSE) {
		$csv_sections[ $section_string[SECTION_ID_BEFORE] ] = $section_string[SECTION_ID_AFTER];
	}
	
	fclose($csv_old_file);
	fclose($csv_new_file);
	fclose($csv_file_sections);
}

foreach($csv_old as $old_string)
{
	$csv_new_string_id = $csv_sections[ $old_string[SECTION_ID] ];
	
	if ($csv_new_string_id && isset($csv_new[ $csv_new_string_id ]))
	{
		foreach($old_string[BRANDS] as $brand_id => $brand)
		{
			if (isset($csv_new[ $csv_new_string_id ][BRANDS][$brand_id]))
			{
				foreach($brand["SERIES"] as $serie_id => $serie)
				{
					if ($serie && isset($brands_series_id2filter_id[$serie_id]) && isset($brands_series_id2filter_id[$brand_id]))
					{
						// фильтр по серии
						$redirects[] = array(
							$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/" . $serie . "/",
							
							$csv_new[ $csv_new_string_id ][SECTION_PAGE_URL] . "?set_filter=Показать&" . $brands_series_id2filter_id[$brand_id] . "=Y&" . $brands_series_id2filter_id[$serie_id] . "=Y"
						);
						
						$count_finded++;
					}
					elseif($serie)
					{
						$redirects[] = array(
							$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/" . $serie . "/",
							"/shop/"
						);
					}
				}
				
				// фильтр по бренду
				$redirects[] = array(
					$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/",
					
					$csv_new[ $csv_new_string_id ][SECTION_PAGE_URL] . "?set_filter=Показать&" . $brands_series_id2filter_id[$brand_id] . "=Y"
				);
				$count_finded++;				
			}
			else
			{
				foreach($brand["SERIES"] as $serie_id => $serie)
				{
					if ($serie)
					{
						// фильтр по серии
						$redirects[] = array(
							$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/" . $serie . "/",
							"/shop/"
						);
					}
				}
				
				$redirects[] = array(
					$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/",
					"/shop/"
				);
			}
		}
	}
	else
	{
		foreach($old_string[BRANDS] as $brand_id => $brand)
		{
			foreach($brand["SERIES"] as $serie_id => $serie)
			{
				if ($serie)
				{
					// фильтр по серии
					$redirects[] = array(
						$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/" . $serie . "/",
						"/shop/"
					);
				}
			}
			
			$redirects[] = array(
				$old_string[SECTION_PAGE_URL] . $brand["CODE"] . "/",
				"/shop/"
			);
		}
	}
}

echo "finded: ". $count_finded;

foreach($redirects as $redirect)
	file_put_contents("get_filters_redirect.txt", "Redirect 301 ". $redirect[0] . " " . $redirect[1] . "\n", FILE_APPEND);
?>
<?php


function seo_phone($tmp)
{
	global $TRGlobalSe;
	global $citySeo;
	if ($TRGlobalSe){
		//switch($citySeo){
		//case "Москва":
			$seoPhone = "<span class=\"s18\"><span>+7 (495)</span> 518-94-23</span>";
			$tmp = str_replace("<span class=\"s18\"><span>+7 (495)</span> 363-32-03</span>\r\n<span class=\"s18\"><span>+7 (495)</span> 258-56-56</span>", $seoPhone, $tmp);
			$tmp = str_replace("<span class=\"s18\"><span>+7 (495)</span> 258-56-56 доб. 5505, 5506</span>", $seoPhone, $tmp);
		//	break;
		//case "Санкт-Петербург":
			$seoPhone = "<span class=\"s18\"><span>+7 (812)</span> 313-22-93</span>";
			$tmp = str_replace("<span class=\"s18\"><span>+7 (812)</span> 449-44-11</span>\r\n<span class=\"s18\"><span>+7 (812)</span> 324-69-95</span>", $seoPhone, $tmp);
		//	break;	
		//case "Екатеринбург":
			$seoPhone = "<span class=\"s18\"><span>+7 (343)</span> 237-23-12</span>";
			$tmp = str_replace("<span class=\"s18\"><span>+7 (343)</span> 287-01-61 (многоканальный)</span>", $seoPhone, $tmp);
		//	break;	
		//default:
			$seoPhone = "<span class=\"s18\"><span>+7 (800)</span> 555-09-84</span>";
			$tmp = str_replace("<span class=\"s18\"><span>+7 (383)</span> 335-88-09</span>\r\n<span class=\"s18\"><span>+7 (383)</span> 227-71-40</span>\r\n<span class=\"s18\"><span>+7 (383)</span> 227-71-30</span>", $seoPhone, $tmp);
			$tmp = str_replace("<span class=\"s18\"><span>+7 (863)</span> 300-78-00</span>", $seoPhone, $tmp);
			$tmp = str_replace("<span class=\"s18\"><span>+7 (3532)</span> 301-002</span>\r\n<span class=\"s18\"><span>+7 (3532)</span> 301-001</span>", $seoPhone, $tmp);
			
			$seoPhone = "<p>телефон: +7 (800) 555-09-84</p>";
			$tmp = str_replace("<p>телефон: +7 (383) 230-02-12</p>", $seoPhone, $tmp);
			$tmp = str_replace("<p>телефон: +7 (383) 230-29-92</p>", $seoPhone, $tmp);
			$tmp = str_replace("<p>телефон: +7 (863) 296-93-84</p>", $seoPhone, $tmp);
		//}
	}
    
	echo $tmp; 
}
?>
<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule("search");


$count=15;
//var_dump($GLOBALS["NavNum"]);
//module_id	iblock
//param	2
//q	ABB

function title($module_id, $param)
{
	$array = array("iblock_2"=>"новостям", "iblock_6"=>"новинкам", "iblock_7"=>"акциям", "iblock_12"=>"статьям", "iblock_9"=>"вакансиям", "iblock_11"=>"фотогалереи",
			"iblock_10"=>"каталог-магазину", "main_"=>"остальным страницам", "tags_"=>"тегам страниц", "_"=>"всему сайту");
	return $array[$module_id."_".$param];
}
function count_search($q, $module_id, $param="")
{
	$obSearch = new CSearch;
	if ($module_id == "tags")
	{
		$obSearch->Search(array("TAGS" => $tag, "SITE_ID" => "s1"));
	}
	elseif ($module_id == "all")
	{
		$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1"));
	}
	else
	{
		$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "MODULE_ID"=>$module_id, "PARAM2"=>$param));
	}
	$obSearch->NavStart();
	$count = $obSearch->SelectedRowsCount();
	return $count;
}
if (
		isset($_REQUEST['module_id']) && 
		isset($_REQUEST['param']) && 
		isset($_REQUEST['q'])  )
{
	$module_id = $_REQUEST['module_id'];
	$param     = $_REQUEST['param'];
	$q         = $_REQUEST['q'];
	
	
	$count_search=count_search($q, $module_id, $param);
	
	if ($count_search==$_REQUEST['list']){die;}
	
	//$list      =
	if (isset($_REQUEST['list']))
	{
		$page=$_REQUEST['list']/$count+1;
		
	}else{
		$page=1;
	}
	
	
	
	//correct_param($module_id, $param);
	
	$obSearch = new CSearch;
	if ($module_id == "tags")
	{
		$obSearch->Search(array("TAGS" => $q, "SITE_ID" => "s1"));
	}
	else
	{
		if (!empty($module_id))
		{
			$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "MODULE_ID"=>$module_id, "PARAM2"=>$param));
		}
		else
		{
			$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1"));
		}
	}
	$obSearch->NavStart($count, true, $page);
	//CPageOption::SetOptionString("main", "nav_page_in_session", "N");
	//$title = "Результат поиска по ".title($module_id, $param).": ";
	//$obSearch->NavPrint($title, true, "", "/search/navprint.php");
	//echo '<br /><hr size="1" color="#DFDFDF">';
	global $APPLICATION;
	//echo '--';
	//echo '<ul class="search_arr" >';
	while($arResult = $obSearch->GetNext())
	{
		$arResult["BODY_FORMATED"] = str_replace('\n', "", $arResult["BODY_FORMATED"]);
		$arResult["BODY_FORMATED"] = htmlspecialchars_decode($arResult["BODY_FORMATED"]);
		$add2basket_link = "?action=ADD2BASKET&id=".$arResult['ID'];
		echo '<li><a href="'.$arResult["URL"].'">'.$arResult["TITLE_FORMATED"].'</a> </span> <a href="'.$add2basket_link.'"><img src="/i/bsk18a.gif" style="top: 5px; position: relative; left: 5px;" alt=""></a></li>';
		//echo '<li><a href="'.$arResult["URL"].'">'.$arResult["TITLE_FORMATED"].'</a> — <span style="color: #282828 !important; font-weight: bold">'.$arElement["CATALOG_PRICE_3"].' руб. </span> <a href="'.$add2basket_link.'"><img src="/i/bsk18a.gif" style="top: 5px; position: relative; left: 5px;" alt=""></a></li>';
		//echo '<div align="justify">'.$arResult["BODY_FORMATED"].'</div>';
		//echo '<br />';
		//echo '<div style="font-size: 11px">';
		//echo 'Дата: '.$arResult['DATE_CHANGE'].'<br />';
		//echo 'Путь: '.$APPLICATION->GetNavChain($arResult["URL"], 0, false, true);
		//echo '</div>';
		//echo '<hr size="1" color="#DFDFDF">';
	}
	//echo $obSearch->NavPrint();
	//echo '</ul>';
}

?>
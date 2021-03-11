<?
require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
?>
<?
CModule::IncludeModule("search");

$count=15;

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
	
	function correct_param(&$module_id, &$param)
	{
		if ($module_id != "iblock" && $module_id != "main" && $module_id != "tags")
		{
			$module_id = ""; $param = "";
			return ;
		}
		$arrayID = array(2, 6, 7, 12, 9, 11, 10);
		$param = intval($param);
		if (!in_array($param, $arrayID)) $param = "";
	}
	
	function title($module_id, $param)
	{
		$array = array("iblock_2"=>"новостям", "iblock_6"=>"новинкам", "iblock_7"=>"акциям", "iblock_12"=>"статьям", "iblock_9"=>"вакансиям", "iblock_11"=>"фотогалереи", 
						"iblock_10"=>"каталог-магазину", "main_"=>"остальным страницам", "tags_"=>"тегам страниц", "_"=>"всему сайту");
		return $array[$module_id."_".$param];
	}
?>

<?
	if (isset($_GET['q']) || isset($_GET['tags']))
	{
		$q = htmlspecialchars($_GET['q']);
		if (empty($q)) $q = htmlspecialchars($_GET['tags']);
		$arrayStop = array("quot", "amp", "lt", "gt");
		if (in_array($q, $arrayStop))
		{
			echo '<font class="text">В поисковой фразе обнаружена ошибка:</font>';
			echo ShowError("символ Special Entities");
			echo '<font class="text">Исправьте поисковую фразу и повторите поиск.</font>';
		}
		else 
		{
			if (isset($_GET['module_id']) && isset($_GET['param']))
			{			
				$module_id = $_GET['module_id'];
				$param = $_GET['param'];
				correct_param($module_id, $param);
				
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
				$obSearch->NavStart(50);
				//print_r($obSearch);
	
				if ($obSearch->errorno != 0)
				{
					echo '<font class="text">В поисковой фразе обнаружена ошибка:</font>';
					echo ShowError($obSearch->error);
					echo '<font class="text">Исправьте поисковую фразу и повторите поиск.</font>';
				}
				else 
				{
					CPageOption::SetOptionString("main", "nav_page_in_session", "N");
					
					$title = "Результат поиска по ".title($module_id, $param).": ";
					$obSearch->NavPrint($title, true, "", "/search/navprint.php");
					echo '<br /><hr size="1" color="#DFDFDF">';
					global $APPLICATION;
					while($arResult = $obSearch->GetNext()) 
					{
						$arResult["BODY_FORMATED"] = str_replace('\n', "", $arResult["BODY_FORMATED"]);
						$arResult["BODY_FORMATED"] = htmlspecialchars_decode($arResult["BODY_FORMATED"]);
						echo '<a href="'.$arResult["URL"].'">'.$arResult["TITLE_FORMATED"].'</a><br />';
						echo '<div align="justify">'.$arResult["BODY_FORMATED"].'</div>';
						echo '<br />';
						echo '<div style="font-size: 11px">';
						echo 'Дата: '.$arResult['DATE_CHANGE'].'<br />';
						echo 'Путь: '.$APPLICATION->GetNavChain($arResult["URL"], 0, false, true);
						echo '</div>';
						echo '<hr size="1" color="#DFDFDF">';
					}
					echo '<br />';
					$obSearch->NavPrint($title, true, "", "/search/navprint.php");
				}
			}
			else 
			{
				echo '<div><h2>Результаты поиска товаров:</h2></div>';
				$countSearch = count_search($q, "iblock", 10);
				echo '<div style="font-style: italic; font-size:13px;">По запросу <span style="color:#F15922;">"'.htmlspecialcharsEx($_GET['q']).'"</span> найдено позиций: <span style="color:#F15922;">'.$countSearch.'</span></div>';
				echo '<div class="border">&nbsp;</div>';
				//echo '<div class="search_text"><table width="100%">';?>
					<?
					$countSearch = count_search($q, "iblock", 10);
					if($countSearch>0):?>
					<!--<tr>
					
					<td width="170" valign="top"><h3>Каталог</h3></td>
					</tr>
					<tr>
					<td>
					<div id="catalog">-->
					<div style="clear:both"></div>
					<?
					$APPLICATION->IncludeFile('/search/s_catalog_table.php');?>
					<!--</div>
					</td></tr>
					<tr><td colspan="2"><div>&nbsp;</div></td></tr>-->
					<?endif;?>
					
				<?//echo '</table></div>';
			}
		}
	}
?>




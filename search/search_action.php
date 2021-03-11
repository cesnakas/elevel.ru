<?
require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
?>

<?
CModule::IncludeModule("search");

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

				$module_id = 'iblock';
				$param = 7;
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
				$obSearch->NavStart(15);
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

					global $APPLICATION;
					echo "<ul class='search_arr'>";
					while($arResult = $obSearch->GetNext()) 
					{
						$arResult["BODY_FORMATED"] = str_replace('\n', "", $arResult["BODY_FORMATED"]);
						$arResult["BODY_FORMATED"] = htmlspecialchars_decode($arResult["BODY_FORMATED"]);
						echo '<li><a href="'.$arResult["URL"].'">'.$arResult["TITLE_FORMATED"].'</a></li>';
					}
					echo "</ul>";

				}
			
			
		}
	}
?>




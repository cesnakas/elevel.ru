<?
require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
?>
<script type="text/javascript">
function ajax_search(module,param,q,id_div)
{
	list = $("#"+id_div+' ul li').size() 
	$.ajax({
         type: "POST",
         url: "/includes/ajax/search.php",
         data: "module_id="+module+"&param="+param+"&q="+q+"&list="+list,
         success: function(data){
        	 if (data=="") $("#"+id_div+' a.more').html('');
        	 $("#"+id_div+' ul li:last').after(data)
        	 target_offset = $("#"+id_div+' ul li:last').offset();
			 $('body,html').animate({ scrollTop: target_offset.top-100 }, 1000);   
        	 
         }
    });
} 
</script>
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
		$array = array("iblock_2"=>"��������", "iblock_6"=>"��������", "iblock_7"=>"������", "iblock_12"=>"�������", "iblock_9"=>"���������", "iblock_11"=>"�����������", 
						"iblock_10"=>"�������-��������", "main_"=>"��������� ���������", "tags_"=>"����� �������", "_"=>"����� �����");
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
			echo '<font class="text">� ��������� ����� ���������� ������:</font>';
			echo ShowError("������ Special Entities");
			echo '<font class="text">��������� ��������� ����� � ��������� �����.</font>';
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
					echo '<font class="text">� ��������� ����� ���������� ������:</font>';
					echo ShowError($obSearch->error);
					echo '<font class="text">��������� ��������� ����� � ��������� �����.</font>';
				}
				else 
				{
					CPageOption::SetOptionString("main", "nav_page_in_session", "N");
					
					$title = "��������� ������ �� ".title($module_id, $param).": ";
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
						echo '����: '.$arResult['DATE_CHANGE'].'<br />';
						echo '����: '.$APPLICATION->GetNavChain($arResult["URL"], 0, false, true);
						echo '</div>';
						echo '<hr size="1" color="#DFDFDF">';
					}
					echo '<br />';
					$obSearch->NavPrint($title, true, "", "/search/navprint.php");
				}
			}
			else 
			{
				echo '<div><h2>���������� ������:</h2></div>';
				$countSearch = count_search($q, "all");
				echo '<div style="font-style: italic; font-size:13px;">�� ������� <span style="color:#F15922;">"'.htmlspecialcharsEx($_GET['q']).'"</span> ������� �������: <span style="color:#F15922;">'.$countSearch.'</span></div>';
				echo '<div class="border">&nbsp;</div>';
				echo '<div class="search_text"><table width="100%">';?>
					<?$countSearch = count_search($q, "iblock", 2);
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>�������</h3></td>
					
					<td>
						 <div id="news">
						    <?$APPLICATION->IncludeFile('/search/search_news.php');?>
						    <? if ($countSearch>$count):?>
						 	<a class="more" onclick="ajax_search('iblock','2','<?=$q?>','news')" href='#last_news'>��� ����������</a>
						 	<a name="last_news"></a>
						 	<?endif;?>
						 <div>
					</td></tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
					<?
					$countSearch = count_search($q, "iblock", 6);
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>�������</h3></td>
					
					<td>
						<div id="novently">
						<?$APPLICATION->IncludeFile('/search/search_novelty.php');?>
						<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('iblock','6','<?=$q?>','novently')" href='#last_novently'>��� ����������</a>
						<a name="last_novently"></a>
						<?endif;?>
						</div>
					</td></tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
					<?
					$countSearch = count_search($q, "iblock", 7);
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>�����</h3></td>
					<td>
						<div id="actions">
						<?
							$APPLICATION->IncludeFile('/search/search_action.php');
						?>
						<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('iblock','7','<?=$q?>','actions')" href='#last_actions'>��� ����������</a>
						<a name="last_actions"></a>
						<?endif;?>
						</div>
					</td></tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
					
					
					
					<?$countSearch = count_search($q, "iblock", 12);
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>������</h3></td>
					
					<td>
					<div id="articles">
					<?
					$APPLICATION->IncludeFile('/search/search_articles.php');?>
					<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('iblock','12','<?=$q?>','articles')" href='#last_articles'>��� ����������</a>
						<a name="last_articles"></a>
						<?endif;?>
					</div>
					</td>
					</tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
					<?
					
					
	//				$countSearch = count_search($q, "iblock", 9);
	//				echo '<b>������������</b> <a href="?q='.$q.'&module_id=iblock&param=9">'.count($countSearch).'</a><br />';
	?>
	
	<?
					$countSearch = count_search($q, "iblock", 11);
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>�����������</h3></td>
					<td>
					<div id="photos">
					<?
					$APPLICATION->IncludeFile('/search/search_photo.php');?>
					<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('iblock','11','<?=$q?>','photos')" href='#last_photos'>��� ����������</a>
						<a name="last_photos"></a>
						<?endif;?>
					</div>
					</td></tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
					
					<?
					$countSearch = count_search($q, "iblock", 9);
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>��������</h3></td>
					<td>
					<div id="vacantion">
					<?
					$APPLICATION->IncludeFile('/search/search_vacancy.php');?>
					<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('iblock','9','<?=$q?>','vacantion')" href='#vacantion'>��� ����������</a>
						<a name="last_vacantion"></a>
						<?endif;?>
					</div>
					</td></tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
	
					<?
					$countSearch = count_search($q, "iblock", 10);
					if($countSearch>0):?>
					<tr>
					
					<td width="170" valign="top"><h3>�������</h3></td>
					<td>
					<div id="catalog">
					<?
					$APPLICATION->IncludeFile('/search/s_catalog.php');?>
					<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('iblock','10','<?=$q?>','catalog')" href='#catalog'>��� ����������</a>
						<a name="last_catalog"></a>
						<?endif;?>
					</div>
					</td></tr>
					<tr><td colspan="2"><div class="border">&nbsp;</div></td></tr>
					<?endif;?>
					
					<?
					$countSearch = count_search($q, "main", "");
					if($countSearch>0):?>
					<tr><td width="170" valign="top"><h3>���������<br> ��������</h3></td>
					<td>
					<div id="main">
					<?
					$APPLICATION->IncludeFile('/search/search_page.php');?>
					<? if ($countSearch>$count):?>
						<a class="more" onclick="ajax_search('main','','<?=$q?>','main')" href='#main'>��� ����������</a>
						<a name="last_main"></a>
						<?endif;?>
					</div>
					</td></tr>
					<?endif;?>
					
					
					<?
					
					
/*					$countSearch = count_search($q, "tags");
					echo '<b>������ �������</b> <a href="?q='.$q.'&module_id=tags&param=">'.$countSearch.'</a><br />';
					
					/*$countSearch = count_search($q, "all");
					echo '<br /><b>������� ���</b> <a href="?q='.$q.'&module_id=all&param=">'.$countSearch.'</a><br />';*/
					
				echo '<tr><td colspan="2"><br></td></tr></table></div>';
			}
		}
	}
?>




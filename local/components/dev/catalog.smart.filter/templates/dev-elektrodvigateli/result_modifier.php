<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Iblock;
global $APPLICATION;

if (isset($arParams["TEMPLATE_THEME"]) && !empty($arParams["TEMPLATE_THEME"]))
{
	$arAvailableThemes = array();
	$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
	if (is_dir($dir) && $directory = opendir($dir))
	{
		while (($file = readdir($directory)) !== false)
		{
			if ($file != "." && $file != ".." && is_dir($dir.$file))
				$arAvailableThemes[] = $file;
		}
		closedir($directory);
	}

	if ($arParams["TEMPLATE_THEME"] == "site")
	{
		$solution = COption::GetOptionString("main", "wizard_solution", "", SITE_ID);
		if ($solution == "eshop")
		{
			$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "blue", SITE_ID);
			$arParams["TEMPLATE_THEME"] = (in_array($theme, $arAvailableThemes)) ? $theme : "blue";
		}
	}
	else
	{
		$arParams["TEMPLATE_THEME"] = (in_array($arParams["TEMPLATE_THEME"], $arAvailableThemes)) ? $arParams["TEMPLATE_THEME"] : "blue";
	}
}
else
{
	$arParams["TEMPLATE_THEME"] = "blue";
}
$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";

$arTitle = array();

$arResult['TITLE_H1'] = $arResult["SECTION"]["NAME"] . ' ';
$arResult['TITLE_META'] = $arResult["SECTION"]["NAME"] . ' ';
$arResult['DESCR_META'] = $arResult["SECTION"]["NAME"] . ' - ';
$GLOBALS['FILTER_HTML'] = "";
$zzz = 0;
$params_count = 0;

//404
$url404 = explode( '/', $APPLICATION->GetCurDir() );

if( $k = array_search( 'filter', $url404 ) ):
	for( $i = 0; $i <= $k; $i++ ):
		unset( $url404[$i] );
	endfor;
	$url404 = array_diff( $url404, array('') );
endif;

$emptyFilters = array();

foreach($arResult["ITEMS"] as $arItem)
{
	if (!isset($arItem["PRICE"]))
	{
		$FHEADER = "";
		$FBODY = "";
		$style="";
		$class = "";
		$isPRODUCER = false;
		$isSERIES = false;
		$NN = false;
		if($arItem['CODE']=="NEW"){$style="display:none;"; $NN = true;}
		if($arItem['CODE']=="SPECIAL_OFFER"){$style="display:none;"; $NN = true;}
		if($arItem['CODE']=="SERIES")
		{
			$isSERIES = true;
			if(strpos($APPLICATION->getCurDir(),"producer")===false)
			{
				$style="display:none;";
				$NN = true;
			}
			if(strpos($APPLICATION->getCurDir(),"series")!==false)
			{
				$style="display:none;";
				$NN = true;
			}
		}
		if($arItem['CODE']=="PRODUCER")
		{
			$isPRODUCER = TRUE;
			if(strpos($APPLICATION->getCurDir(),"producer")!==false)
			{
				$style="display:none;";
				$NN = true;
			}
		}
		$low = strtolower($arItem['CODE']);


		if(strpos($APPLICATION->getCurDir(),$low)!==false)
		{
			$style="display:none;";
			$NN = true;

			if (isset($arItem['VALUES']["MAX"]) && isset($arItem['VALUES']["MIN"]) )
			{
				$href = strtolower($arItem['CODE']).
					($arItem['VALUES']['MIN']['HTML_VALUE'] != '' ? '-from-'. $arItem['VALUES']['MIN']['HTML_VALUE'] : '') .
					($arItem['VALUES']['MAX']['HTML_VALUE'] != '' ? '-to-'. $arItem['VALUES']['MAX']['HTML_VALUE'] : '');

				if( $delete_key = array_search( $href, $url404 ) ):
					unset( $url404[ $delete_key ] );
				endif;
			}
			else
			{
				foreach( $arItem['VALUES'] as $value ):
					$href = strtolower($arItem['CODE']).'-is-'.strtolower($value['URL_ID']);

					if( $delete_key = array_search( $href, $url404 ) ):
						unset( $url404[ $delete_key ] );
					endif;
				endforeach;
			}
		}

		if($NN==false)
		{
			if($zzz>0)
			{
				//$class = "fchide";
				$class = "";
			}
			$zzz++;
			$FHEADER='<div style="'.$style.'" class="filter_html_wrapper '.$class.' zzz'.$zzz.'"><div><h2 class="headline-border">'.$arItem['NAME'].'</h2></div>';
			$all_disable=true;
			foreach($arItem["VALUES"] as $id => $value)
			{

				if($value['DISABLED']){continue;}
				$all_disable =false;
				//echo "<pre>"; print_r($value); echo "</pre>";
				if(strpos($APPLICATION->getCurDir(),"filter")!==false)
				{
				    //ѕроходим массив параметров по пор¤дку дл¤ формировани¤ корректного URL
                    $url = "##URL##filter/";
				    foreach ($arResult["ITEMS"] as $arItem1){
				        if ($arItem1["CODE"] == $arItem['CODE']){
				            $url .= strtolower($arItem['CODE']).'-is-'.strtolower($value['URL_ID']).'/';
                        } else {
				            foreach ($arItem1["VALUES"] as $arValue1){
				                if ($arValue1["CHECKED"]){
									$url .= strtolower($arItem1['CODE']).'-is-'.strtolower($arValue1['URL_ID']).'/';
									continue 2; //т.к. выбран может быть только 1 вариант, сразу переходим к следующему параметру
                                }
                            }
                        }
                    }
					$FBODY.='<a href="'.$url.'" class="filter_html_url">'.$value['VALUE'].'</a> ';
				}
				else
				{
					$FBODY.='<a href="##URL##filter/'.strtolower($arItem['CODE']).'-is-'.strtolower($value['URL_ID']).'/" class="filter_html_url">'.$value['VALUE'].'</a> ';
				}

			}	

			if(!$all_disable)
			{
				$GLOBALS['FILTER_HTML'].= $FHEADER.$FBODY;
				$GLOBALS['FILTER_HTML'].='</div>';
				/*if($zzz==2)
				{
					$GLOBALS['FILTER_HTML'].='<a href="javascript:void(0);" onclick="$(this).hide(); show_fchide();">??? ?????????</a>';
				}*/
			} else {
				$emptyFilters[$arItem['ID']] = $arItem['ID'];
			}
		}
		foreach($arItem["VALUES"] as $id => $value)
		{
			if (isset($value["CHECKED"]) && $value["CHECKED"]){
				$params_count++;
				if(!$isPRODUCER && !$isSERIES)
				{

					if(!empty($arItem['HINT'])){
						$prop_title = ltrim($value["VALUE"], ".") .$arItem['HINT'];
					} else {
						$prop_title = $arItem['NAME'] ." \"" .ltrim($value["VALUE"], ".") ."\"";
					}

					$arTitle[] = $prop_title;
					$value['NAME'] = $arItem['NAME'];
					$value['ITEM'] = $arItem;
					$arH1[] = $value;
				}
				if($isPRODUCER || $isSERIES)
				{
					$arTitleH1[] = ltrim($value["VALUE"], ".");
				}
				if($isPRODUCER)
				{
					$PRODUCER = ltrim($value["VALUE"], ".");
				}
				if($isSERIES)
				{
					$SERIES = ltrim($value["VALUE"], ".");
				}
				break;
			}
		}
	}
	else
	{
		$price = 'price-'.mb_strtolower($arItem['CODE']);
		if( isset( $arItem['VALUES']['MIN']['HTML_VALUE'] ) )
			$price .= '-from-'.$arItem['VALUES']['MIN']['HTML_VALUE'];
		if( isset( $arItem['VALUES']['MAX']['HTML_VALUE'] ) )
			$price .= '-to-'.$arItem['VALUES']['MAX']['HTML_VALUE'];

		if( $delete_key = array_search( $price, $url404 ) ):
			unset( $url404[ $delete_key ] );
		endif;
	}
}

if( strpos($APPLICATION->getCurDir(),"filter") !== false && !empty( $url404 ) && Loader::includeModule("iblock") ):

	Iblock\Component\Tools::process404(
		'',
		true,
		"Y",
		"Y"
	);

	return;

endif;
//$GLOBALS['FILTER_HTML'].='<a href="javascript:void(0);" onclick="$(this).hide(); show_fchide();">??? ?????????</a>';
$arResult['TITLE_META'].= $PRODUCER." ".$SERIES." - ";

if(!empty($PRODUCER))
{
	$ARSP[] = $PRODUCER;
}
if(!empty($SERIES))
{
	$ARSP[] = $SERIES;
}
$PS = implode(" ",$ARSP);
$PS = trim($PS);
$arResult['TITLE_H1'] = trim($arResult['TITLE_H1']);
if(!empty($PS))
{
	$arResult['TITLE_H1'].= " ".trim($PS).": ";
}
else
{
	$arResult['TITLE_H1'].= ": ";
}
$HINT ="";
foreach($arH1 as $v)
{
	$res_prop = CIBlockProperty::GetByID($v['ITEM']['ID']);
	$ar_prop = $res_prop->GetNext();

	if(empty($ar_prop['HINT']))
	{
		$arResult['TITLE_H1'].= strtolower($v['NAME'])." «".$v['VALUE']."» ";
	}
	else
	{
		$h1_replace = str_replace(":","",$arResult['TITLE_H1']);
		$arResult['TITLE_H1']= trim($h1_replace)." ".trim($v['VALUE']).$ar_prop['HINT'];
		$HINT = $ar_prop['HINT']; 
	}
	break;
}
unset($HINT);

$arResult['TITLE_H1'] = trim($arResult['TITLE_H1']);
$arResult['TITLE_H1'] = trim($arResult['TITLE_H1'],":");
// canonical
$reduction = $params_count - 3;
if($reduction > 0)
{
	$URL = $APPLICATION->GetCurDir();
	$URL = explode("/",$URL);
	//print_r($URL);
	$URL_string = "";
	$extremum = count($URL)-($reduction+1);
	for($i = 0; $i < $extremum; $i++)
	{
		//$URL = array_pop($URL);
		if(!empty($URL[$i]))
		{
			$URL_string.= "/".$URL[$i];
		}
		//$URL = array_pop($URL);
	}
	$URL_string.="/";
	//echo $reduction;
	$APPLICATION->AddHeadString('<link rel="canonical" href="https://www.elevel.ru'.$URL_string.'"/>',true);
}
if( !empty($arTitle) ):
	$i = 0;
	foreach( $arTitle as $v ):
		$i++;
		$arResult['TITLE_META'] .= $v.$HINT.' - ';
		$arResult['DESCR_META'] .= $v.$HINT.' ';
	endforeach;

endif;

$arResult['EMPTY'] = $emptyFilters;

$arResult['TITLE_META'] .= 'купить в интернет-магазине Elevel';
$arResult['DESCR_META'] = $arResult['TITLE_H1'].' купить в интернет-магазине Elevel с доставкой по –оссии. звоните: 8 (800) 555-49-32';
$APPLICATION->SetPageProperty('description', $arResult['DESCR_META']);
$meta = getMeta();
if(!empty($meta['H1']))
	$arResult['TITLE_H1'] = $meta['H1'];
if(!empty($meta['TITLE']))
	$arResult['TITLE_META'] = $meta['TITLE'];
if(!empty($meta['DESCRIPTION']))
	$arResult['DESCR_META'] = $meta['DESCRIPTION'];
?>
<script>
$(".fchide").show();
function show_fchide()
{
	$(".fchide").show();
}
</script>
<style>
.fchide{display:none;}
body > div.wrapper > div > div > div > div > div:nth-child(1){display:inline-block !important;}
</style>
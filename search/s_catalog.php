<?
require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
?>
<?       
CModule::IncludeModule("search");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
?>


<?
$FilterArr = Array(
    "find_id",
    "find_id_exact_match",
    "find_lamp",
    "find_lang",
    "find_show_count_1",
    "find_show_count_2",
    "find_click_count_1",
    "find_click_count_2",
    "find_ctr_1",
    "find_ctr_2",
    "find_contract_id",
    "find_contract",
    "find_contract_exact_match",
    "find_group",
    "find_group_exact_match",
    "find_status_sid",
    "find_type_sid",
    "find_type",
    "find_type_exact_match",
    "find_name",
    "find_name_exact_match",
    "find_code",
    "find_code_exact_match",
    "find_comments",
    "find_comments_exact_match"
);
if (strlen($set_filter)>0) InitFilterEx($FilterArr,"ADV_BANNER_LIST","set");
else InitFilterEx($FilterArr,"ADV_BANNER_LIST","get");
if (strlen($del_filter)>0) DelFilterEx($FilterArr,"ADV_BANNER_LIST");
$order=array('SORT'=>'ORD');
InitBVar($find_id_exact_match);
InitBVar($find_status_exact_match);
InitBVar($find_group_exact_match);
InitBVar($find_contract_exact_match);
InitBVar($find_type_exact_match);
InitBVar($find_name_exact_match);
InitBVar($find_code_exact_match);
InitBVar($find_comments_exact_match);
$find_type="BOTTOM_SLIDE_BANNER_1";
$arFilter = Array(
    "ID"					=> $find_id,
    "ID_EXACT_MATCH"		=> $find_id_exact_match,
    "LAMP"				  => $find_lamp,
    "LANG"				  => $find_lang,
    "SHOW_COUNT_1"		  => $find_show_count_1,
    "SHOW_COUNT_2"		  => $find_show_count_2,
    "CLICK_COUNT_1"		 => $find_click_count_1,
    "CLICK_COUNT_2"		 => $find_click_count_2,
    "CTR_1"				 => $find_ctr_1,
    "CTR_2"				 => $find_ctr_2,
    "GROUP"				 => $find_group,
    "GROUP_EXACT_MATCH"	 => $find_group_exact_match,
    "STATUS_SID"			=> $find_status_sid,
    "CONTRACT_ID"		   => $find_contract_id,
    "CONTRACT"			  => $find_contract,
    "CONTRACT_EXACT_MATCH"  => $find_contract_exact_match,
    "TYPE_SID"			  => $find_type_sid,
    "TYPE"				  => $find_type,
    "TYPE_EXACT_MATCH"	  => $find_type_exact_match,
    "NAME"				  => $find_name,
    "NAME_EXACT_MATCH"	  => $find_name_exact_match,
    "CODE"				  => $find_code,
    "CODE_EXACT_MATCH"	  => $find_code_exact_match,
    "COMMENTS"			  => $find_comments,
    "COMMENTS_EXACT_MATCH"  => $find_comments_exact_match
);
$rsBanners = CAdvBanner::GetList($by, $order, $arFilter, $is_filtered, "N");


$arBanners=array();
while($arBanner = $rsBanners->NavNext(true, "f_"))
{
    $arBanners[]=array(
        'IMG'=>CFile::GetPath($arBanner['IMAGE_ID']),
        'URL'=>$arBanner['URL'],
        'NAME'=>$arBanner['NAME'],
    );
    //echo "<pre>"; print_r($arBanner); echo "</pre>";

};





$GET = "";
foreach($_GET as $name => $val)
{
	if(($name != "add2basket") && ($name != "id"))
	{
		$GET.= $name."=".$val."&";
	}
}
if(!empty($GET))
{
	$GET = substr($GET, 0, -1);
}
?>

<?
if(($_GET['action'] == 'add2basket') && isset($_GET['id']))
{
	// Получаем цену и остаток товара, исходя из местоположения пользователя и принадлежности его группам
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

	$iPriceID = CGeoRegions::GetPriceIDByUser();
    $iPriceID = ($iPriceID + 1);
	
	if($iPriceID > 8){
		$iPriceID = 3;
	}
	// Подключаем функцию добавления товара в корзину
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/catalog_functions.php');
	
	$ELEMENT_ID = intval($_GET['id']);
	//Add2BasketByProductID($ELEMENT_ID, 1);
	Add2BasketByProductPriceID($ELEMENT_ID, $iPriceID, 1);
	LocalRedirect("/search/catalog.php?".$GET);
}

if($_POST['action'] == 'add2basket_array')
{
	// Получаем цену и остаток товара, исходя из местоположения пользователя и принадлежности его группам
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

	$iPriceID = CGeoRegions::GetPriceIDByUser();
    $iPriceID = ($iPriceID + 1);
	
	if($iPriceID > 8){
		$iPriceID = 3;
	}
	// Подключаем функцию добавления товара в корзину
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/catalog_functions.php');
	
	foreach($_POST as $name => $val)
	{
		$pos = strpos($name, "good_id_");
		if($pos === false)
		{
			continue;
		}
		$id = IntVal(substr($name, strlen("good_id_"), strlen($name)));
		$count = IntVal($val);
		
		if(($id > 0) && ($count > 0))
		{
			//echo Add2BasketByProductID($id, $count);
			echo Add2BasketByProductPriceID($id, $iPriceID, $count);
		}
	}
	LocalRedirect("/search/catalog.php?".$GET);
}
?>

<?
$UserShowProperty = Array("CML2_ARTICLE", "PACKING", "POINT");
$UserShowPropertyNames = Array("артикул","в уп.","ед.");
$UserShowPropertyTitle = Array("Артикул","Количество изделий в одной упаковке","Единицы измерения");
?>
<br />
<? if(isset($_GET['q'])): ?>
	<?
	$q = urldecode(htmlspecialchars(urlencode($_GET['q']))); 

	$obSearch = new CSearch;
	$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "MODULE_ID"=>"iblock", "PARAM2"=>"53"));
		
	$obSearch->NavStart(25);
	if($obSearch->errorno == 0):
		CPageOption::SetOptionString("main", "nav_page_in_session", "N");
		
		
		
		
		global $APPLICATION;
		if(/*$_REQUEST['dev_testing'] == 'Y'*/true)
		{
			// Получаем цену и остаток товара, исходя из местоположения пользователя и принадлежности его группам
			require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');
   
			$iPriceID = CGeoRegions::GetPriceIDByUser();
		    $iPriceID = ($iPriceID + 1);
			
			if($iPriceID > 8){
				$iPriceID = 3;
			}
			
			$sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
			$sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);
			
			// Формируем список извлекаемых полей элементов
			$arElementsSelectFields = array(
				'ID',
				'NAME',
				'DETAIL_PAGE_URL',
				'PROPERTY_CML2_ARTICLE',
				'PROPERTY_PACKING',
				'PROPERTY_POINT',
				'CATALOG_GROUP_'.$iPriceID,
                "PROPERTY_SPETS_SKIDKA"
			);	
			
			// Флаг показа пользователю остатков
			$bShowGeoCount = false;
			$arUserGroups = array();
			$arGeoRegionsPropCounts = array();
			$iGeoRegionsSize = 0;
			$bShowGeoTableCount = false;
			$arGeoTableCount = array();
			
			// Определяем, какой отстаток показывать текущему пользователю
			if(!$USER->IsAuthorized())
			{
				// Неавторизованному пользователю не показываем остатки
				$bShowGeoCount = false;
			}
			else
			{
				// Проверяем принадлежность пользователя к группам регионов
				//43	остатки МСК
				//36	остатки СПБ
				//37	остатки ЕКТ
				//38	остатки НСК
				//40	остатки ОРН
				//39	остатки РСТ
				
				// Получаем список групп, к которым принадлежит текущий пользователь
				$arUserGroups = CUser::GetUserGroup($USER->GetID());
				
				// Определяем список групп регионов, к которым принадлежит текущий пользователь
				$arGeoRegionsPropCounts = array();
	
				if(in_array(43, $arUserGroups))
				{
					$arGeoRegionsPropCounts[] = 'MSK';
				}
				if(in_array(36, $arUserGroups))
				{
					$arGeoRegionsPropCounts[] = 'SPB';
				}
				if(in_array(37, $arUserGroups))
				{
					$arGeoRegionsPropCounts[] = 'EKT';
				}
				if(in_array(38, $arUserGroups))
				{
					$arGeoRegionsPropCounts[] = 'NSK';
				}
				if(in_array(40, $arUserGroups))
				{
					$arGeoRegionsPropCounts[] = 'ORN';
				}
				if(in_array(39, $arUserGroups))
				{
					$arGeoRegionsPropCounts[] = 'RST';
				}
				
				$iGeoRegionsSize = count($arGeoRegionsPropCounts);
				
			
				if($iGeoRegionsSize == 0)
				{
					// Пользователь не принадлежит ни к одной группе региона
					$bShowGeoCount = false;		
				}
				elseif($iGeoRegionsSize == 1)
				{
					$bShowGeoCount = true;
					// Выбираем значение только того свойства, к группе которого принадлежит пользоваетль
					$arElementsSelectFields[] = 'PROPERTY_COUNT_'.$arGeoRegionsPropCounts[0];
				}	
				else
				{
					// Выбираем значения свойств, к группам которых принадлежит пользоваетль
					$bShowGeoCount = true;
					$bShowGeoTableCount = true;
					$arGeoTableCount = array();
					foreach($arGeoRegionsPropCounts as $sPropCountPostfix)
					{
						$arElementsSelectFields[] = 'PROPERTY_COUNT_'.$sPropCountPostfix;
					}
				}
			}
			?>
			<script>
				$(function() {
					$('span[id^=geo_counts_title_]').mouseover(function() {
						var sID = String(this.id).substring('geo_counts_title_'.length);
						$('div#geo_counts_' + sID).removeClass('hidden');
					});
					$('span[id^=geo_counts_title_]').mouseout(function() {
						var sID = String(this.id).substring('geo_counts_title_'.length);
						$('div#geo_counts_' + sID).addClass('hidden');
					});
				});
			</script>				
			
			<ul class='search_arr'>
				
				<? while($arResult = $obSearch->GetNext()): ?> 
					<?
					$ELEMENT_ID = $arResult['ITEM_ID'];
					
					$dbElement = CIBlockElement::GetList(
						array(),
						array(
							"IBLOCK_ID" => 53,
							"ID" => $ELEMENT_ID
                        ),
						false,
						false,
						$arElementsSelectFields
					);
					if(!($arElement = $dbElement->GetNext()))
					{
						continue;
					}
					else
					{   $arElement['FORMATTED_PRICE'] = CCatalogProduct::GetOptimalPrice($arElement["ID"], 1, $USER->GetUserGroupArray(), "N");
                        $arElement['FORMATTED_PRICE'] = $arElement['FORMATTED_PRICE']["PRICE"]["PRICE"];

                        if($iGeoRegionsSize == 0)
						{
							// Пользователь не принадлежит ни к одной группе региона
							$bShowGeoCount = false;
							$arElement['SHOW_GEO_TABLE_COUNT'] = false;
							$arElement['GEO_COUNT'] = 0;
							$arElement['GEO_TABLE_COUNT_EXISTS'] = false;
							$arElement['GEO_TABLE_COUNT'] = array();
						}
						elseif($iGeoRegionsSize == 1)
						{
							$bShowGeoCount = true;
							// Выбираем значение только того свойства, к группе которого принадлежит пользоваетль
							$arElement['SHOW_GEO_TABLE_COUNT'] = false;
							$arElement['GEO_COUNT'] = $arElement['PROPERTY_COUNT_'.$arGeoRegionsPropCounts[0].'_VALUE'];
							$arElement['GEO_TABLE_COUNT_EXISTS'] = false;
							$arElement['GEO_TABLE_COUNT'] = array();
						}
						else
						{
							// Выбираем значения свойств, к группам которых принадлежит пользоваетль
							$bShowGeoCount = true;
							$arElement['SHOW_GEO_TABLE_COUNT'] = true;
							$arElement['GEO_COUNT'] = 0;
							$arElement['GEO_TABLE_COUNT_EXISTS'] = false;
							$arElement['GEO_TABLE_COUNT'] = array();
							foreach($arGeoRegionsPropCounts as $sPropCountPostfix)
							{
								$sCountName = '';
								switch($sPropCountPostfix)
								{
									case 'MSK':
										$sCountName = 'Остаток МСК:';
										break;
									case 'SPB':
										$sCountName = 'Остаток СПБ:';
										break;
									case 'EKT':
										$sCountName = 'Остаток ЕКТ:';
										break;
									case 'NSK':
										$sCountName = 'Остаток НСК:';
										break;
									case 'ORN':
										$sCountName = 'Остаток ОРН:';
										break;
									case 'RST':
										$sCountName = 'Остаток РСТ:';
										break;				
								}
								$iCurrentCount = intval($arElement['PROPERTY_COUNT_'.$sPropCountPostfix.'_VALUE']);

								if(!$arElement['GEO_TABLE_COUNT_EXISTS'] && ($iCurrentCount > 0))
								{
									$arElement['GEO_TABLE_COUNT_EXISTS'] = true;
								}			
								$arElement['GEO_TABLE_COUNT'][$sPropCountPostfix] = array(
									'COUNT_NAME' => $sCountName,
									'COUNT_VALUE' => $iCurrentCount
								);
							}		
						}
                        if(isset($_GET['filter']) & $_GET['filter'] == 'cnt') {

                            if($arElement['GEO_COUNT'] == 0)
                                continue;
                        }
                        //print_r($arElement); die;
						$add2basket_link = "?action=ADD2BASKET&id=".$arElement['ID'];
						//if (!empty($GET)) $add2basket_link .= "&".$GET;                        
                        
                        
                        if (intval($arElement["PROPERTY_SPETS_SKIDKA_VALUE"]) > 0){

                        $dis = $arElement["PROPERTY_SPETS_SKIDKA_VALUE"];
                        $arElement['FORMATTED_PRICE'] = round($arElement['FORMATTED_PRICE'] - ($arElement['FORMATTED_PRICE']*(100+$dis) / 100 - $arElement['FORMATTED_PRICE']), 2);}?>

                    
								<li class="1234"><a href="<?=$arResult["URL"]?>"><?=($arElement['NAME']);?></a> — <span style="color: #282828 !important; font-weight: bold"><?=$arElement['FORMATTED_PRICE']." руб."?></span> <a href="<?=$add2basket_link?>"><img src="/i/bsk18a.gif" style="top: 5px; position: relative; left: 5px;" alt=""></a></li>
						<?
					}
					?>
				<? endwhile ?>
			</ul>
		<?
		}
		else
		{
			// Получаем цену и остаток товара, исходя из местоположения пользователя и принадлежности его группам
			require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');
   
			$iUserGeoGroup = GetGroupByIP();
			
			$bUserInGeoGroup = false;
			$arUserGroups = Array();
			if($USER->IsAuthorized())
			{
				$arUserGroups = CUser::GetUserGroup($USER->GetID());
			}
			
			$sPriceID = 2;
			switch($iUserGeoGroup)
			{
				case 1:
					$sPriceID = 3;
					$sCountPropertyPostfix = 'MSK';
					$bUserInGeoGroup = in_array(43, $arUserGroups);
					break;
				case 2:
					$sPriceID = 4;
					$sCountPropertyPostfix = 'SPB';
					$bUserInGeoGroup = in_array(36, $arUserGroups);
					break;
				case 3:
					$sPriceID = 5;
					$sCountPropertyPostfix = 'EKT';
					$bUserInGeoGroup = in_array(37, $arUserGroups);
					break;
				case 4:
					$sPriceID = 6;
					$sCountPropertyPostfix = 'NSK';
					$bUserInGeoGroup = in_array(38, $arUserGroups);
					break;
				case 5:
					$sPriceID = 7;
					$sCountPropertyPostfix = 'RST';
					$bUserInGeoGroup = in_array(39, $arUserGroups);
					break;
				case 6:
					$sPriceID = 8;
					$sCountPropertyPostfix = 'ORN';
					$bUserInGeoGroup = in_array(40, $arUserGroups);
					break;		
			}
			?>
			
			<ul class='search_arr'>
				
					
				<? while($arResult = $obSearch->GetNext()): ?> 
					<?
					$ELEMENT_ID = $arResult['ITEM_ID'];
					$result_catalog = CIBlockElement::GetList(
						array(),
						array(
							"IBLOCK_ID" => 53,
							"ID" => $ELEMENT_ID
						),
						false,
						false,
						array(
							"ID",
							"*",
							"CATALOG_GROUP_".$sPriceID
						)
					);
					if($result_catalog->SelectedRowsCount() == 0)
					{
						continue;
					}
					$arFetchCatalog = $result_catalog->GetNextElement();
					$arFieldsCatalog = $arFetchCatalog->GetFields();
					$arPropertiesCatalog = $arFetchCatalog->GetProperties();
					
					$add2basket_link = "?action=ADD2BASKET&id=".$arFieldsCatalog['ID'];
					//if (!empty($GET)) $add2basket_link .= "&".$GET;
					?>
					
	
					<li><a href="<?=$arResult["URL"]?>"><?=($arFieldsCatalog['NAME']);?></a> <a href="<?=$add2basket_link?>"><img src="/i/bsk18a.gif" style="top: 5px; position: relative; left: 5px;" alt=""></a></li>

				<? endwhile ?>
			</ul>
			
					
		<?
		}
		?>
<? endif ?>
<?
endif
?>
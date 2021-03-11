<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?
CModule::IncludeModule("search");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"search",
	Array(
		"PAGE" => "/search/index.php"
	),
	false
);?>

<?
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
	$q = $_GET['q'];

	$obSearch = new CSearch;
	$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "MODULE_ID"=>"iblock", "PARAM2"=>"10"));
		
	$obSearch->NavStart(20);
	if($obSearch->errorno == 0):
		CPageOption::SetOptionString("main", "nav_page_in_session", "N");
		
		$title = "Результат поиска по каталог-магазину: ";
		$obSearch->NavPrint($title, true, "", "/search/navprint.php");
		echo '<br /><hr size="1" color="#DFDFDF">';
		global $APPLICATION;
		
		if(/*$_REQUEST['dev_testing'] == 'Y'*/true)
		{
			// Получаем цену и остаток товара, исходя из местоположения пользователя и принадлежности его группам
			require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');
   
			$iPriceID = CGeoRegions::GetPriceIDByUser();
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
				'CATALOG_GROUP_'.$iPriceID
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
			<form method="POST">
			<table id="goods-list">
				<tr>
					<th>наименование</th>
					<? foreach($UserShowPropertyNames as $key => $name): ?>
						<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
					<? endforeach ?>
					<? if($bShowGeoCount): ?>
						<th class="count"></th>
					<? endif ?>				
					<th class="price center">цена</th>
					<th class="center" title="Количество заказываемых позиций">кол-во</th>		
					<th class="center" title="Добавить в корзину"></th>
				</tr>
				<? while($arResult = $obSearch->GetNext()): ?> 
					<?
					$ELEMENT_ID = $arResult['ITEM_ID'];
					
					$dbElement = CIBlockElement::GetList(
						array(),
						array(
							"IBLOCK_ID" => 10,
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
					{
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
						$add2basket_link = "?action=ADD2BASKET&id=".$arElement['ID'];
						//if (!empty($GET)) $add2basket_link .= "&".$GET;
						?>
						
						<tr>
							<td class="name">
								<a href="<?=$arResult["URL"]?>"><?=($arElement['NAME']);?></a>
							</td>
							<?
							$num = 0;
							foreach($UserShowProperty as $code):
								$num++;
								?>
								<td align="center" <?if($num%2):?>class="alt"<?endif;?>><?=$arElement['PROPERTY_'.$code.'_VALUE']?></td>
							<? endforeach ?>
							<? if($bShowGeoCount): ?>
								<td class="count" align="center">
									<? if($arElement['SHOW_GEO_TABLE_COUNT']): ?>
										<? if($arElement['GEO_TABLE_COUNT_EXISTS']): ?>
											<span id="geo_counts_title_<?=$arElement['ID']?>">есть</span>
											<div id="geo_counts_<?=$arElement['ID']?>" class="geo_counts_list hidden">
												<table border="0" cellspacing="0" cellpadding="3" bgcolor="#ffffff" style="border: none;">
													<? foreach($arElement['GEO_TABLE_COUNT'] as $arGeoCount): ?>
														<tr>
															<td style="border: none; background-color: white;"><?=$arGeoCount['COUNT_NAME']?></td>
															<td style="border: none; background-color: white;" align="right"><?=$arGeoCount['COUNT_VALUE']?></td>
														</tr>
													<? endforeach ?>
												</table>
											</div>							
										<? else: ?>
											<span>нет</span>
										<? endif ?>
									<? else: ?>
										<span><?=$arElement['GEO_COUNT']?></span>
									<? endif ?>
								</td>
							<? endif ?>
							<td class="price" align="center"><?=SaleFormatCurrency($arElement['CATALOG_PRICE_'.$iPriceID], $arElement['CATALOG_CURRENCY_'.$iPriceID])?></td>
							<td align="center"><input type="text" name="good_id_<?=$arElement['ID']?>" id="good_id_<?=$arElement['ID']?>" value="1" style="width: 40px;" /></td>
							<td align="center">
								<div class="in_basket">
									<p>Товар добавлен в корзину</p>
									<p><a href="/personal/order.php">Оформить заказ</a></p>
									<p><a href="#" class="close">Продолжить покупки</a></p>
								</div>
								<a href="<?=$add2basket_link?>"><img src="/i/plus.png" width="18" height="18" alt="Добавить <?=($arElement['NAME']);?> в корзину" title="Добавить <?=($arElement['NAME']);?> в корзину"></a>
							</td>
						</tr>
						<?
					}
					?>
				<? endwhile ?>
			</table>
			<div style="padding: 10px 0px; text-align: right;">
				<input type="submit" value="Добавить в корзину" class="add2basket" />
			</div>
			<input type="hidden" name="action" value="add2basket_array" />
			</form>
			<br />
			<?$obSearch->NavPrint($title, true, "", "/search/navprint.php");?>
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
			
			$sPriceID = 1;
			switch($iUserGeoGroup)
			{
				case 1:
					$sPriceID = 2;
					$sCountPropertyPostfix = 'MSK';
					$bUserInGeoGroup = in_array(43, $arUserGroups);
					break;
				case 2:
					$sPriceID = 3;
					$sCountPropertyPostfix = 'SPB';
					$bUserInGeoGroup = in_array(36, $arUserGroups);
					break;
				case 3:
					$sPriceID = 4;
					$sCountPropertyPostfix = 'EKT';
					$bUserInGeoGroup = in_array(37, $arUserGroups);
					break;
				case 4:
					$sPriceID = 5;
					$sCountPropertyPostfix = 'NSK';
					$bUserInGeoGroup = in_array(38, $arUserGroups);
					break;
				case 5:
					$sPriceID = 6;
					$sCountPropertyPostfix = 'RST';
					$bUserInGeoGroup = in_array(39, $arUserGroups);
					break;
				case 6:
					$sPriceID = 7;
					$sCountPropertyPostfix = 'ORN';
					$bUserInGeoGroup = in_array(40, $arUserGroups);
					break;		
			}
			?>
			<form method="POST">
			<table id="goods-list">
				<tr>
					<th>наименование</th>
					<? foreach($UserShowPropertyNames as $key => $name): ?>
						<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
					<? endforeach ?>
					<? if($bUserInGeoGroup): ?>
						<th class="count"></th>
					<? endif ?>				
					<th class="price center">цена</th>
					<th class="center" title="Количество заказываемых позиций">кол-во</th>		
					<th class="center" title="Добавить в корзину"></th>
				</tr>
					
				<? while($arResult = $obSearch->GetNext()): ?> 
					<?
					$ELEMENT_ID = $arResult['ITEM_ID'];
					$result_catalog = CIBlockElement::GetList(
						array(),
						array(
							"IBLOCK_ID" => 10,
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
					
					<tr>
						<td class="name">
							<a href="<?=$arResult["URL"]?>"><?=($arFieldsCatalog['NAME']);?></a>
						</td>
						<?
						$num = 0;
						foreach($UserShowProperty as $code):
							$num++;
							?>
							<td align="center" <?if($num%2):?>class="alt"<?endif;?>><?=$arPropertiesCatalog[$code]['VALUE']?></td>
						<? endforeach ?>
						<? if($bUserInGeoGroup): ?>
							<td class="count" align="center">
								<?=$arPropertiesCatalog['COUNT_'.$sCountPropertyPostfix]['VALUE']?>
							</td>
						<? endif ?>
						<td class="price" align="center"><?=SaleFormatCurrency($arFieldsCatalog['CATALOG_PRICE_'.$sPriceID], $arFieldsCatalog['CATALOG_CURRENCY_'.$sPriceID])?></td>		
						<td align="center"><input type="text" name="good_id_<?=$arFieldsCatalog['ID']?>" id="good_id_<?=$arFieldsCatalog['ID']?>" value="1" style="width: 40px;" /></td>
						<td align="center">
							<div class="in_basket">
								<p>Товар добавлен в корзину</p>
								<p><a href="/personal/order.php">Оформить заказ</a></p>
								<p><a href="#" class="close">Продолжить покупки</a></p>
							</div>
							<a href="<?=$add2basket_link?>"><img src="/i/plus.png" width="18" height="18" alt="Добавить <?=($arFieldsCatalog['NAME']);?> в корзину" title="Добавить <?=($arFieldsCatalog['NAME']);?> в корзину"></a>
						</td>
					</tr>
				<? endwhile ?>
			</table>
			<div style="padding: 10px 0px; text-align: right;">
				<input type="submit" value="Добавить в корзину" class="add2basket" />
			</div>
			<input type="hidden" name="action" value="add2basket_array" />
			</form>
			<br />
			<?$obSearch->NavPrint($title, true, "", "/search/navprint.php");?>		
		<?
		}
		?>
<? endif ?>
<?
endif
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
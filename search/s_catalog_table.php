<?
require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
?>
<?
CModule::IncludeModule("search");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CPageOption::SetOptionString("main", "nav_page_in_session", "N");
?>


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
function _flu($str)
{
	$fc = mb_strtoupper(substr($str, 0, 1));
	$str{0} = $fc;
	return $str;
}

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
$UserShowProperty = Array("CML2_ARTICLE", "PACKING", "POINT");?>
<br />
<? if(isset($_GET['q'])): ?>
	<?
	$q = $_GET['q'];

	$obSearch = new CSearch;

	$obSearch->Search(array("QUERY" => $q, "SITE_ID" => "s1", "PARAM2"=>"10"), array(),
        array(
            array(
                "LOGIC" => "OR",
                ">=COUNT" => 0,
                ">=COUNT" => 20,
            )
    ));

   // debugArray($obSearch->strQueryText);

	$obSearch->NavStart(100);
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
				'PROPERTY_MAIN_PHOTO',
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
			if ($iGeoRegionsSize==0)
			{
				$arElementsSelectFields[] = "PROPERTY_COUNT_".$sPropertyCountCode;
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
			<div class="pagenavigation">
				<?CPageOption::SetOptionString("main", "nav_page_in_session", "N");
				$navString = "";
				ob_start();
				$obSearch->NavPrint('', true, 'text', '/bitrix/templates/wt-elevel/page_navigation_templates/catalog_nav_string.php');
				$navString = ob_get_contents();
				ob_end_clean();?>
				<?=$navString?>
			</div>
			<table id="goods-list" class="table2">
			<tr>
				<th><div class="crl">Наименование</div></th>

				<th class="center" nowrap title="Артикул"><div>Артикул</div></th>
				<th class="center" nowrap title="Количество изделий в одной упаковке"><div>в уп.</div></th>
				<th class="center" nowrap title="Единицы измерения"><div>ед.</div></th>
				<? if($bShowGeoCount): ?>
					<th class="count"><div></div></th>
				<?else:?>
					<th class="count"><div></div></th>
				<? endif ?>

				<th class="price center"><div>Цена (руб.)</div></th>
				<th class="center" title="Количество заказываемых позиций"><div>кол-во</div></th>
				<th class="center" title="Добавить в корзину"><div class="crr">&nbsp;</div></th>
			</tr>
			<?$vowels=array(',',')');
			$vowels2=array(', ',') ');
			/*if($USER->IsAdmin())
						{
							echo "Выбираемые свойства<pre>";
							print_r($arElementsSelectFields);
							echo "</pre>";
							echo $sPropertyCountCode;
						}*/
			?>

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
						/*if($USER->IsAdmin())
						{
							echo "<pre>";
							print_r($arElement);
							echo "</pre>";
						}*/
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
										$sCountName = 'Остаток МСК';
										break;
									case 'SPB':
										$sCountName = 'Остаток СПБ';
										break;
									case 'EKT':
										$sCountName = 'Остаток ЕКТ';
										break;
									case 'NSK':
										$sCountName = 'Остаток НСК';
										break;
									case 'ORN':
										$sCountName = 'Остаток ОРН';
										break;
									case 'RST':
										$sCountName = 'Остаток РСТ';
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
                       /* if(isset($_GET['filter']) & $_GET['filter'] == 'cnt') {

                            if($arElement['GEO_COUNT'] == 0)
                                continue;
                        }*/
						$add2basket_link = "?action=ADD2BASKET&id=".$arElement['ID'];
						//if (!empty($GET)) $add2basket_link .= "&".$GET;
						?>
						    	<tr>
					<td class="name">
					<? if(true || $arElement['SHOW_DETAIL']): ?>
							<h5><a href="/shop/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/"><?=str_replace($vowels, $vowels2, _flu($arResult["TITLE_FORMATED"]));?></a>
							<?if(file_exists($_SERVER['DOCUMENT_ROOT'].$arElement["PROPERTY_MAIN_PHOTO_VALUE"])):?>
							<?=CFile::ShowImage($arElement["PROPERTY_MAIN_PHOTO_VALUE"], 132, 132, "class=mini_img1", "", true);?>
							<?else:?>
							<?=CFile::ShowImage('/i/no-photo.jpg', 132, 132, "class=mini_img1", "", true);?>
							<?endif;?>
							</h5>
						<? else: ?>
							<h5><?=_flu($arElement['NAME'])?></h5>
						<? endif ?>
					</td>
					<? $num = 0 ?>
					<? foreach($UserShowProperty as $code): ?>
						<td align="center"<? if(++$num%2): ?> class="alt"<? endif?>><?=$arElement['PROPERTY_'.$code.'_VALUE']?></td>
					<? endforeach ?>
					<? if($bShowGeoCount): ?>
						<td class="count" align="center">
							<? if($arElement['SHOW_GEO_TABLE_COUNT']): ?>
								<? if($arElement['GEO_TABLE_COUNT_EXISTS']): ?>
									<div class="txt5"><span id="geo_counts_title_<?=$arElement['ID']?>">есть</span>
									<div class="block142" style="display: none;">
										<ul>
											<? foreach($arElement['GEO_TABLE_COUNT'] as $arGeoCount): ?>
											<li><?=$arGeoCount['COUNT_NAME']?>: <b><?=$arGeoCount['COUNT_VALUE']?></b></li>

											<? endforeach ?>
										</ul>
									</div>
									</div>
								<? else: ?>
									<span>нет</span>
								<? endif ?>
							<? else: ?>
								<span><?=$arElement['GEO_COUNT']?></span>
							<? endif ?>
						</td>
					<?else:?>
						<td class="count" align="center">
							<? if ($arElement["PROPERTY_COUNT_".$sPropertyCountCode."_VALUE"]>0):?>
									<span class="counts">На складе</span>
									<div class="uved" style=" display: none;">Товар в наличии, необходимое количество уточняйте у менеджера</div>
							<?else:?>
									<span class="counts" style="height: 38px;">Под заказ</span>
									<div class="uved" style="display: none;">Сроки поставки уточняйте у менеджеров</div>
							<?endif;?>
						</td>
					<? endif ?>
					<?//$zcena=explode(" руб",SaleFormatCurrency(floatval($arElement['CATALOG_PRICE_'.$iPriceID]), $arElement['CATALOG_CURRENCY_'.$iPriceID]))?>
					<td class="price" align="center"><p class="pr2"><?=$arElement['CATALOG_PRICE_'.$iPriceID];?></p></td>
					<td align="center">
						<? if($arElement['CATALOG_CAN_BUY_'.$iPriceID] == 'Y'): ?>
							<div class="block61">
							<input type="text" value="1" name="good_id_<?=$arElement['ID']?>" id="good_id_<?=$arElement['ID']?>">
							<img width="7" height="7" class="dec7" ids="good_id_<?=$arElement['ID']?>" alt="" src="/i/pix.gif">
							<img width="7" height="7" class="inc7" ids="good_id_<?=$arElement['ID']?>" alt="" src="/i/pix.gif">
						</div>

						<? endif ?>
					</td>
					<td align="center">
						<a class="bsk18" href="?action=ADD2BASKET&id=<?=$arElement['ID']?>" alt="Добавить <?=_flu($arElement['NAME']);?> в корзину" title="Добавить <?=_flu($arElement['NAME']);?> в корзину">
						<img alt="" src="/i/bsk18a.gif"><img class="pic154" alt="" src="/i/pic154b.gif"></a>
					</td>
				</tr>
						<?
					}
					?>
				<? endwhile ?>
			</table>
			<div class="pagenavigation">
				<?=$navString?>
			</div>
		<?
		}
	endif;
endif;?>
<div id="big_image_wrap" style="max-height: 256px;"></div>
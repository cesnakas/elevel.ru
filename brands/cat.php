<?require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";?>




<script>
	function sub_pos(good_id,good_sect_id)
	{
		var get = location.search;
		var val;
		var str;
		var st;
		st = "#good_id_" + good_id + "";
		val = $(st).attr("value");
		if(val == 0)
		{
			val = 1;
		}
		str = "/shop/view.php?sid=" + good_sect_id + "&section=sect&gid=" + good_id + "&action=add2basket&count=" + val;
		window.location = str;
	}
</script>

<? if(/*$_REQUEST['dev_testing'] == 'Y'*/true): ?>




<?
global $USER;
CModule::IncludeModule('sale');
CModule::IncludeModule('iblock');
CModule::IncludeModule('catalog');

function _flu($str)
{
	$fc = mb_strtoupper(substr($str, 0, 1));
	$str{0} = $fc;
	return $str;
}

function _fixq($id)
{
	if($ar_res = CCatalogProduct::GetByID($id))
	{
		if($ar_res['QUANTITY_TRACE'] == 'N')
		{
			return true;
		}
		$ar_res['QUANTITY_TRACE'] = 'N';
		return CCatalogProduct::Update($id, $ar_res);
	}
	else
	{
		return false;
	}
}

function _fixCurrency($id)
{
	if($ar_res = CPrice::GetBasePrice($id))
	{
		$currency = mb_strtoupper($ar_res['CURRENCY']);
		if(mb_substr_count($currency, 'РУБ') > 0)
		{
			return CPrice::SetBasePrice($id, $ar_res['PRICE'], 'RUB');
		}
		else
		{
			return true;
		}
	}
	else
	{
		return false;	
	}
}

// Получаем детальную информацию о текущем разделе	
$iCurrentSectionID = intval($_SESSION['idsecbrand']);
// Получаем цену и остаток товара, исходя из местоположения пользователя и принадлежности его группам
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

$iPriceID = CGeoRegions::GetPriceIDByUser();
$sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
$sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);

//var_dump($sPriceCode);
// var_dump($sPriceCode);
// Подключаем функцию добавления товара в корзину
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/catalog_functions.php');

// Массив, содержащий выводимые на странице каталога разделы и элементы
$arOutput = Array(
	'SECTIONS' => Array(),
	'ELEMENTS' => Array()
);

if($_REQUEST['action'] == 'add2basket')
{
	foreach($_REQUEST as $name => $val)
	{
		$pos = strpos($name, 'good_id_');
		if($pos === false)
		{
			continue;
		}
		$id = IntVal(substr($name, strlen('good_id_'), strlen($name)));
		$count = IntVal($val);
		if(($id > 0) && ($count > 0) && (_fixq($id)) && (_fixCurrency($id)))
		{
			//Add2BasketByProductID($id, $count);
			Add2BasketByProductPriceID($id, $iPriceID, $count);
		}
	}
	
}





// Обрабатываем установленный фильтр "Поиск по каталогу"
$bIsFilterSet = false;
foreach($_REQUEST as $sParamName => $sParamValue)
{
	if(stripos($sParamName, 'exf_') !== false)
	{
		$bIsFilterSet = true;
		break;
	}
}

// Фильтр для выборки элементов каталога
$arElementsFilter = Array(
	'IBLOCK_ID' => 10,	
	'ACTIVE' => 'Y'
);

$dbCurrentSection = CIBlockSection::GetByID($iCurrentSectionID);
if($arCurrentSection = $dbCurrentSection->GetNext())
{
	$arElementsFilter['SECTION_ID'] = $arCurrentSection['ID'];
	$arElementsFilter['INCLUDE_SUBSECTIONS'] = 'Y';
}
else
{
	if(!$bIsFilterSet)
	{
		//echo '<br />Запрашиваемый Вами раздел не найден';
		/*CHTTP::SetStatus('404 Not Found');
				require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
		die();*/

	}
}

$nPageSize = 20;
// Значения из формы "Поиск по каталогу"
if($bIsFilterSet)
{
	if(isset($_REQUEST['exf_articul']) && !empty($_REQUEST['exf_articul']))
	{
		$arElementsFilter['%PROPERTY_CML2_ARTICLE'] = htmlspecialcharsEx($_REQUEST['exf_articul']);
	}
	if(isset($_REQUEST['exf_name']) && !empty($_REQUEST['exf_name']))
	{
		$arElementsFilter['%NAME'] = htmlspecialcharsEx($_REQUEST['exf_name']);
	}
	if(isset($_REQUEST['exf_manufacturer']) && !empty($_REQUEST['exf_manufacturer']))
	{
		$arElementsFilter['%PROPERTY_MANUFACTURER'] = htmlspecialcharsEx($_REQUEST['exf_manufacturer']);
	}
	$bSetMinPrice = isset($_REQUEST['exf_prices']) && !empty($_REQUEST['exf_prices']);
	$bSetMaxPrice = isset($_REQUEST['exf_pricee']) && !empty($_REQUEST['exf_pricee']);
	if($bSetMinPrice && $bSetMaxPrice)
	{
		$arElementsFilter['><CATALOG_PRICE_'.$sPriceID] = Array(
			floatval(htmlspecialcharsEx($_REQUEST['exf_prices'])),
			floatval(htmlspecialcharsEx($_REQUEST['exf_pricee']))
		);
	}
	elseif($bSetMinPrice)
	{
		$arElementsFilter['>=CATALOG_PRICE_'.$sPriceID] = floatval(htmlspecialcharsEx($_REQUEST['exf_prices']));
	}
	elseif($bSetMaxPrice)
	{
		$arElementsFilter['<=CATALOG_PRICE_'.$sPriceID] = floatval(htmlspecialcharsEx($_REQUEST['exf_pricee']));
	}		
	
	$nPageSize = 0;
	if(isset($_REQUEST['exf_showcount']) && !empty($_REQUEST['exf_showcount']))
	{
		$nPageSize = intval(htmlspecialcharsEx($_REQUEST['exf_showcount']));
	}
}

if(isset($_REQUEST['sort']) && !empty($_REQUEST['sort']))
{
	$nPageSize = intval(htmlspecialcharsEx($_REQUEST['sort']));
}	

if($nPageSize < 20)
{
	$nPageSize = 20;
}

// Параметры для постраничной навигации и ограничения количества выводимых элементов
$arNavStartParams = Array(
	'iNumPage' => (intval($_REQUEST['PAGEN_1']) > 0) ? intval(htmlspecialcharsEx($_REQUEST['PAGEN_1'])) : 1,
	'nPageSize' => $nPageSize
);

// Формируем список подразделов данного, содержащих товары,
// удовлетворяющие параметрам фильтра
$dbSections = CIBlockElement::GetList(
	Array(),
	$arElementsFilter,
	Array('IBLOCK_SECTION_ID')
);

while($arSection = $dbSections->GetNext())
{
	// Получаем цепочку разделов от текущего до раздела, содержащего искомые элементы
	$dbSectionChain = CIBlockSection::GetNavChain(10, $arSection['IBLOCK_SECTION_ID']);
	while($arSectionChain = $dbSectionChain->GetNext())
	{
		if(
			($arSectionChain['DEPTH_LEVEL'] == ($arCurrentSection['DEPTH_LEVEL'] + 1))
			&&
			!array_key_exists($arSectionChain['ID'], $arOutput['SECTIONS'])
		)
		{
			$arOutput['SECTIONS'][$arSectionChain['ID']] = $arSectionChain;
			$arOutput['SECTIONS'][$arSectionChain['ID']]['PICTURE'] = CFile::GetFileArray($arSectionChain['PICTURE']);
		}
	}
}

// Упорядочиваем разделы по "сквозной" сортировке
function cmp($a, $b)
{
	if($a['LEFT_MARGIN'] == $b['LEFT_MARGIN'])
	{
		return 0;
	}
	else
	{
		return (($a['LEFT_MARGIN'] < $b['LEFT_MARGIN']) ? -1 : 1);
	}
}

usort($arOutput['SECTIONS'], 'cmp');
	
// Формируем список элементов данного раздела, удовлетворяющие параметрам фильтра

// Определяем заданный порядок сортировки товаров
$arElementsOrder = Array('NAME' => 'ASC');
if(isset($_GET['by']) && isset($_GET['order']))	
{
	$sSortField = htmlspecialcharsEx($_GET['by']);
	$sSortOrder = htmlspecialcharsEx($_GET['order']);
	
	if(($sSortOrder == "asc") || ($sSortOrder == "desc"))
	{
		$sSortOrder = strtoupper($sSortOrder);
	}
	if(($sSortField == "price") || ($_GET['by'] == "name"))
	{
		$sSortField = strtoupper($sSortField);
	}
	
	if($sSortField == "PRICE")
	{
		$sSortField = 'CATALOG_PRICE_'.$iPriceID;
		unset($arElementsOrder['NAME']);
	}
	
	if($sSortField == "manufacturer")
	{
		$sSortField = 'PROPERTY_MANUFACTURER'; //'CATALOG_PRICE_'.$iPriceID;
		unset($arElementsOrder['NAME']);
	}
	if($sSortField == "quantity")
	{
		
		$sSortField = "PROPERTY_COUNT_".$sPriceCode;//' 'CATALOG_QUANTITY'; //'CATALOG_PRICE_'.$iPriceID;
		unset($arElementsOrder['NAME']);
	}
	
	$arElementsOrder[$sSortField] = $sSortOrder;
	
	
	
}

// Корректируем фильтр товаров данного раздела
unset($arElementsFilter['INCLUDE_SUBSECTIONS']);

// Формируем список извлекаемых полей элементов
$arElementsSelectFields = array(
	'ID',
	'NAME',
	'PREVIEW_PICTURE',
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



$dbElements = CIBlockElement::GetList(
	$arElementsOrder,
	$arElementsFilter,
	false,
	$arNavStartParams,
	$arElementsSelectFields
);
while($arElement = $dbElements->GetNext())
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
	
	$arOutput['ELEMENTS'][$arElement['ID']] = $arElement;
}


?>
<div class="block756b">
	<?	if($_SERVER['REQUEST_URI'] == '/shop/4369/'): ?>
		<h1>Лампы накаливания и галогенные лампы сетевого напряжения всех фирм Philips, General Electric</h1>
	<? else: ?>
		<? if($arCurrentSection['NAME'] != ''): ?>
			<h1><?=_flu($arCurrentSection['NAME'])?></h1>
		<? else: ?>
			<h1>Поиск по каталогу</h1>
		<? endif ?>
	<? endif ?>
	<? if(!$bIsFilterSet): ?>
		<ul class="list232a mod3">
			<? foreach($arOutput['SECTIONS'] as $arSection): ?>
				<li><center>
					<a href="/shop/<?=$arSection['ID']?>/<?=$addman;?>" style="width: 132px; height: 132px; display:block;">
					<?$secpics=CFile::ResizeImageGet($arSection['PICTURE'], array('width'=>132, 'height'=>132), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
					<?if($arSection['PICTURE']['WIDTH']>=$arSection['PICTURE']['HEIGHT']):?>
					<img title="<?=_flu($arSection['NAME']);?>" src="<?=$secpics['src'];?>" width="120px"></a>
					<?else:?>
					<img title="<?=_flu($arSection['NAME']);?>" src="<?=$secpics['src'];?>" height="120px"></a>
					<?endif;?>
					
					</center>
					<h2><a href="/shop/<?=$arSection['ID']?>/<?=$addman?>"><?if(strlen(_flu($arSection['NAME']))>90):?>
					<?=substr(_flu($arSection['NAME']), 0, 90);?>...
					<?else:?>
					<?=_flu($arSection['NAME']);?>
					<?endif;?>
					</a>
					</h2><p><a href="/shop/<?=$arSection['ID']?>/<?=$addman?>">Перейти в раздел</a></p>
					
				</li>
			<? endforeach ?>
		</ul>
		
		<? if(empty($arOutput['ELEMENTS'])): ?>
			</div><p style="clear: left; color: black;"><?=$arCurrentSection['DESCRIPTION'];?></p>
			</div></div>
		<? endif ?>
	<? endif ?>


<?
if(!empty($arOutput['ELEMENTS']))
{
	if(!$bIsFilterSet)
	{
		$sPage = '/shop/'.$arCurrentSection['ID'].'/';
		if(isset($_GET['sort']))
		{
			$sPage .= "?sort=".htmlspecialcharsex($_GET['sort']);
		}
	}
	else
	{
		$sPage = $APPLICATION->GetCurPageParam();
	}
	
	$UserShowProperty = Array("CML2_ARTICLE", "PACKING", "POINT");
	$UserShowPropertyNames = Array("артикул", "в уп.", "ед.");
	$UserShowPropertyTitle = Array("Артикул", "Количество изделий в одной упаковке", "Единицы измерения");
	?>
	<script>
		$(function() {
			$('span[id^=geo_counts_title_]').mouseover(function(event) {
				var sID = String(this.id).substring('geo_counts_title_'.length);
				$('div#geo_counts_' + sID).css('left', event.screenX + 3);
				$('div#geo_counts_' + sID).removeClass('hidden');
			});
			$('span[id^=geo_counts_title_]').mouseout(function() {
				var sID = String(this.id).substring('geo_counts_title_'.length);
				$('div#geo_counts_' + sID).addClass('hidden');
			});
		});
	</script>	
	<div class="sortings">
				<table>
					<tbody><tr>
						<td style="width: 70px;">
							<ul>
								<li>Вид:</li>
								<li><img alt="" src="/i/icon14a.gif" class="block_view"></li>
								<li><img alt="" src="/i/icon14b.gif" class="table_view"></li>
							</ul>
						</td>
						<td>
							<ul>
								<li>Сортировать по:</li>
								<li>
								<span>
								<?if (isset($_REQUEST['order']) && $_REQUEST['order']=='asc' ):?>
								<a href="?by=price&order=desc">
								<?elseif(isset($_REQUEST['order']) && $_REQUEST['order']=='desc' ):?>
								<a href="?by=price&order=asc">
								<?else:?>
								<a href="?by=price&order=asc">
								<?endif;?>
								цене
								</a>
								</span>
								</li>
								<li>
								<span>
								<?if (isset($_REQUEST['order']) && $_REQUEST['order']=='asc' ):?>
								<a href="?by=manufacturer&order=desc">
								<?elseif(isset($_REQUEST['order']) && $_REQUEST['order']=='desc' ):?>
								<a href="?by=manufacturer&order=asc">
								<?else:?>
								<a href="?by=manufacturer&order=asc">
								<?endif;?>
								производителю
								</a>
								</span>
								</li>
								<li>
								<span>
								<?if (   isset($_REQUEST['order']) && $_REQUEST['order']=='asc' ):?>
								<a href="?by=quantity&order=desc">
								<?elseif( isset($_REQUEST['order']) && $_REQUEST['order']=='desc'):?>
								<a href="?by=quantity&order=asc">
								<?else:?>
								<a href="?by=quantity&order=asc">
								<?endif;?>
								наличию
								</a>
								</span>
								</li>
							</ul>
						</td>
						<td>
						
						<?=$dbElements->NavPrint('', true, 'text', '/bitrix/templates/wt-elevel/page_navigation_templates/catalog_nav_string.php');?>
						
						</td>
					</tr>
				</tbody></table>
			</div>
	<form action="cat.php" method="get">
	
			<?if(!isset($_COOKIE['view'])||$_COOKIE['view']=='table'):?>
		<table id="goods-list" class="table2">
			<tr>
				<th><div class="crl">Наименование</div></th>
				
				<th class="center" nowrap title="Артикул"><div>Артикул</div></th>
				<th class="center" nowrap title="Количество изделий в одной упаковке"><div>в уп.</div></th>
				<th class="center" nowrap title="Единицы измерения"><div>ед.</div></th>
				<? if($bShowGeoCount): ?>
					<th class="count"><div></div></th>
				<? endif ?>
				<th class="price center"><div>Цена (руб.)</div></th>
				<th class="center" title="Количество заказываемых позиций"><div>кол-во</div></th>
				<th class="center" title="Добавить в корзину"><div class="crr">&nbsp;</div></th>
			</tr>
			<? foreach($arOutput['ELEMENTS'] as $arElement): ?>
				<tr>
					<td class="name">
						<? if(true || $arElement['SHOW_DETAIL']): ?>
							<h5><a href="/shop/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/"><?=_flu($arElement['NAME'])?></a>
							<?if(!empty($arElement['PREVIEW_PICTURE'])):?>
							<?//$picts=CFile::GetPath($arElement['PREVIEW_PICTURE']);
							$picts = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>102, 'height'=>102), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							?>
							<img alt="" src="<?=$picts['src'];?>" style="display: none; border:1px solid #ccc;">
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
					
						<?/*<div class="in_basket">
							<p>Товар добавлен в корзину</p>
							<p><a href="/personal/order.php">Оформить заказ</a></p>
							<p><a href="#" class="close">Продолжить покупки</a></p>
						</div>
						<a href="?action=ADD2BASKET&id=<?=$arElement['ID']?>"><img src="/i/plus.png" width="18" height="18" 
						alt="Добавить <?=_flu($arElement['NAME']);?> в корзину" title="Добавить <?=_flu($arElement['NAME']);?> в корзину"></a>
						*/?>
					</td>
				</tr>
			<? endforeach ?>
		</table>
		<?else:?>
				
			
			
<ul class="list232b mod3">
			
			<? foreach($arOutput['ELEMENTS'] as $arElement): ?>
			<li>
			<?if(!empty($arElement['PREVIEW_PICTURE'])):?>
			<div style="height:134px;">
					<a href="/shop/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/">
					
						<?//$picts=CFile::GetPath($arElement['PREVIEW_PICTURE']);
						
						$picts = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width'=>132, 'height'=>132), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$picts['src']='/_i/1.png';
						
						$picts['width']=58;
						$picts['height']=128;
						
						if ($picts['width']==0)
						{
							$picts['height']=$picts['width'];
						}
        		        $img = '<img id="'.$arElement['ID'].'" src="'.$picts['src'].'" width="'.$picts['width'].'" height="'.$picts['height'].'" />';
						?>
						<?=$img?>
											
					</a>
					</div>
					<?else:?>
					<div style="height:134px;">
					</div>
					<?endif;?>
					<? if(true || $arElement['SHOW_DETAIL']): ?>
							<h2><a href="/shop/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/"><?=substr(_flu($arElement['NAME']), 0, 50);?>...</a></h2>
					<? else: ?>
							<h2><?=substr(_flu($arElement['NAME']), 0, 50);?>...</h2>
					<? endif ?>
						
					<p class="pr1">Цена: <span><?=SaleFormatCurrency(floatval($arElement['CATALOG_PRICE_'.$iPriceID]), $arElement['CATALOG_CURRENCY_'.$iPriceID])?></span></p>
					<p class="srv1" style="padding-left: 0px;">
					<?/*<a href="?action=ADD2BASKET&id=<?=$arElement['ID']?>" 
					style="width: 20px; height: 20px; display: block; margin-top: -4px; float: left;margin-left: 18px;">&nbsp;</a>
					*/?>
					<a href="?action=ADD2BASKET&id=<?=$arElement['ID']?>" 
					style="display: block;padding-left: 16px;"
					alt="Добавить <?=_flu($arElement['NAME']);?> в корзину" 
					title="Добавить <?=_flu($arElement['NAME']);?> в корзину">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Добавить в корзину</a></p>
					<img class="pic74" alt="" src="/i/pic74a.gif">
				<img class="quick" id="<?=$arElement['ID'];?>" alt="" src="/i/pic144a.png" style="display: none;"><img class="pic154" alt="" src="/i/pic154a.gif">
				</li>
			<? endforeach ?>
		</ul>
		<?endif;?>
<?php 		//****************/ ?>
		<div class="sortings">
				<table>
					<tbody><tr>
						<td>
							<ul>
								<li>Вид:</li>
								<li><img alt="" src="/i/icon14a.gif" class="block_view"></li>
								<li><img alt="" src="/i/icon14b.gif" class="table_view"></li>
							</ul>
						</td>
						<td>
						<ul>
								<li>Сортировать по:</li>
								<li>
								<span>
								<?if (isset($_REQUEST['order']) && $_REQUEST['order']=='asc' ):?>
								<a href="?by=price&order=desc">
								<?elseif(isset($_REQUEST['order']) && $_REQUEST['order']=='desc' ):?>
								<a href="?by=price&order=asc">
								<?else:?>
								<a href="?by=price&order=asc">
								<?endif;?>
								цене
								</a>
								</span>
								</li>
								<li>
								<span>
								<?if (isset($_REQUEST['order']) && $_REQUEST['order']=='asc' ):?>
								<a href="?by=manufacturer&order=desc">
								<?elseif(isset($_REQUEST['order']) && $_REQUEST['order']=='desc' ):?>
								<a href="?by=manufacturer&order=asc">
								<?else:?>
								<a href="?by=manufacturer&order=asc">
								<?endif;?>
								производителю
								</a>
								</span>
								</li>
								<li>
								<span>
								<?if (   isset($_REQUEST['order']) && $_REQUEST['order']=='asc' ):?>
								<a href="?by=quantity&order=desc">
								<?elseif( isset($_REQUEST['order']) && $_REQUEST['order']=='desc'):?>
								<a href="?by=quantity&order=asc">
								<?else:?>
								<a href="?by=quantity&order=asc">
								<?endif;?>
								наличию
								</a>
								</span>
								</li>
								
								
								<!-- 
								<li><span style="border: medium none;">наличию</span></li>
								 -->
							</ul>
						</td>
						<td style="text-align: right;">
							<?=$dbElements->NavPrint('', true, 'text', '/bitrix/templates/wt-elevel/page_navigation_templates/catalog_nav_string.php');?>
						</td>
					</tr>
				</tbody></table>
			</div>

		<input type="hidden" name="sid" value="<?=$arCurrentSection['ID']?>" />
		<input type="hidden" name="action" value="add2basket" />
	</form>
	</div>
	<p style="color: black;"><?=$arCurrentSection['DESCRIPTION']?></p>
	
	</div>
	<div class="b200">
		<ul>
			<li><a href="#"><img alt="" src="/i/b200a.jpg"></a></li>
			<li><a href="#"><img alt="" src="/i/b200b.jpg"></a></li>
			<li style="padding-right: 0pt;"><a href="#"><img alt="" src="/i/b200c.jpg"></a></li>
		</ul>
	</div>
	<?/*+++++++wttt*/?>
<?
}
?>






<? else: ?>








<?
global $USER;
CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");

$catst_time = microtime(true);
$IgnoreStoreCount = true;

$_REQUEST['sid'] = IntVal($_REQUEST['sid']);

function _flu($str)
{
	$fc = mb_strtoupper(substr($str, 0, 1));
	$str{0} = $fc;
	return $str;
}

function _getsectnum($iblockid, $id)
{
	$arSelect = Array("ID", "NAME");
	$arFilter = Array(
		"IBLOCK_ID" => IntVal($iblockid),
		'SECTION_ID' => IntVal($id),
		"ACTIVE" => "Y"
	);
	if(($res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect)) && ($irtm = $res->GetNext()))
	{
		return 1;
	}

	if($slist = GetIBlockSectionList(IntVal($iblockid), IntVal($id)))
	{
		while($arItem = $slist->GetNext())
		{
			$ret = _getsectnum($iblockid, $arItem['ID']);
			if($ret > 0)
			{
				return 1;
			}
		}
	}
	return 0;
}

function _fixq($id)
{
	if($ar_res = CCatalogProduct::GetByID($id))
	{
		if($ar_res['QUANTITY_TRACE'] == 'N')
		{
			return true;
		}
		$ar_res['QUANTITY_TRACE'] = 'N';
		return CCatalogProduct::Update($id, $ar_res);
	}
	else
	{
		return false;
	}
}

function _fixCurrency($id)
{
	if($ar_res = CPrice::GetBasePrice($id))
	{
		$currency = mb_strtoupper($ar_res['CURRENCY']);
		if(mb_substr_count($currency, 'РУБ') > 0)
		{
			return CPrice::SetBasePrice($id, $ar_res['PRICE'], 'RUB');
		}
		else
		{
			return true;
		}
	}
	else
	{
		return false;	
	}
}

if($_REQUEST['action'] == 'add2basket')
{
	foreach($_REQUEST as $name => $val)
	{
		$pos = strpos($name, "good_id_");
		if($pos === false)
		{
			continue;
		}
		$id = IntVal(substr($name, strlen("good_id_"), strlen($name)));
		$count = IntVal($val);
		if(($id > 0) && ($count > 0) && (_fixq($id)) && (_fixCurrency($id)))
		{
			Add2BasketByProductID($id, $count);
		}
	}
	LocalRedirect("/shop/".htmlspecialcharsex($_REQUEST['sid']).'/');
}

$arResult = Array();
$arResult["SECTIONS"] = Array();
$items = GetIBlockSectionList(10, IntVal($_REQUEST['sid']), Array('SORT' => 'ASC'));
$n = 0;
$addman = (strlen($_REQUEST['man']) > 0) ? ($_REQUEST['man'].'/') : '';
while($arItem = $items->GetNext())
{
	$arItem['PICTURE'] = CFile::GetFileArray($arItem['PICTURE']);
	if (strlen($_REQUEST['man']) > 0)
	{
		if(CheckManufacturer(10, $arItem['ID'], urldecode($_REQUEST['man'])) && (_getsectnum($arItem['IBLOCK_ID'], $arItem['ID']) > 0))
		{
			$arResult["SECTIONS"][$n++] = $arItem;
		}
	}
	else
	{
		$num = _getsectnum($arItem['IBLOCK_ID'], $arItem['ID']);
		//echo $arItem['NAME'].' - '.$num.'<br />';
		if($num > 0)
		{
			$arResult["SECTIONS"][$n++] = $arItem;
		}
	}
}
	
$SectionName = 'ERROR: No section name!';
$SectionInfo = 'ERROR: No section description!';

$result = CIBlockSection::GetNavChain(10, IntVal($_REQUEST['sid']));
while($array_fetch = $result->Fetch())
{
	if(!empty($array_fetch['IBLOCK_SECTION_ID']))
	{
		$link = ($array_fetch['ID'] != htmlspecialcharsex($_REQUEST['sid'])) ? '/shop/'.$array_fetch['ID'].'/' : "";
		$APPLICATION->AddChainItem($array_fetch['NAME'], $link);
	}
}

if($CurrentSection = GetIBlockSection(IntVal($_REQUEST['sid'])))
{
	$SectionName = $CurrentSection['NAME'];
	$SectionInfo = $CurrentSection['DESCRIPTION'];
	
	$APPLICATION->SetTitle(_flu($SectionName));
}

function GetElementList($sid, &$ret, $start = 0)
{
	$n = $start;
	if(!$_REQUEST['sort'])
	{
		$sorts = 20;
	}
	else
	{
		$sorts=$_REQUEST['sort'];
	}
	$PageNav = Array(
		'iNumPage' => (IntVal($_REQUEST['page']) > 0) ? IntVal($_REQUEST['page']) : 1,
		'nPageSize' => $sorts
	);
	$SearchFilter = Array(
		'IBLOCK_ID' => 10,
		'SECTION_ID' => IntVal($sid),
		"ACTIVE_DATE" => "Y",
		"ACTIVE" => "Y"	
	);
	
	$field = "NAME";
	$order = "ASC";
	if(isset($_GET['by']) && isset($_GET['order']))	
	{
		$_GET['order'] = strtolower($_GET['order']);
		$_GET['by'] = strtolower($_GET['by']);
		if(($_GET['order'] == "asc") || ($_GET['order'] == "desc"))
		{
			$order = strtoupper($_GET['order']);
		}
		if(($_GET['by'] == "price") || ($_GET['by'] == "name"))
		{
			$field = strtoupper($_GET['by']);
		}
		if($field == "PRICE")
		{
			$field = "CATALOG_PRICE_1";
		}
	}	
	
	$arSelect = Array('IBLOCK_ID', 'IBLOCK_SECTION_ID', 'ID', 'PREVIEW_PICTURE','NAME', 'PROPERTY_CML2_ARTICLE', 'PROPERTY_PARTY', 'PROPERTY_PACKING', 'PROPERTY_POINT', 'PROPERTY_COUNT', 'CATALOG_GROUP_1', 'PROPERTY_MANUFACTURER');
	$Items = CIBlockElement::GetList(Array($field=>$order), $SearchFilter, false, $PageNav, $arSelect);
	$PagesNum = $Items->NavPageCount;
	$CurrentPage = (IntVal($_REQUEST['page']) > 0)?IntVal($_REQUEST['page']):1;

	while($arItem = $Items->GetNext())
	{
		$Prices = Array();
		$Prices[0] = Array();

if ($arItem["CATALOG_CURRENCY_1"] == 'руб')
$arItem["CATALOG_CURRENCY_1"] = 'RUB';

		$Prices['CAN_ACCESS'] = $arItem['CATALOG_CAN_ACCESS_1'];
		$Prices['CAN_BUY'] = $arItem['CATALOG_CAN_BUY_1'];
		$Prices['NAME'] = $arItem["CATALOG_GROUP_NAME_1"];
		$Prices['PRICE'] = $arItem["CATALOG_PRICE_1"];
		$Prices['CURRENCY'] = $arItem["CATALOG_CURRENCY_1"];
		$Prices['FORMATTED'] = FormatCurrency($arItem["CATALOG_PRICE_1"], $arItem["CATALOG_CURRENCY_1"]);
		
		$arItem['PRICES'] = $Prices;
		$arItem['CAN_BUY'] = true;
		
		$arItem['PROPERTY__EXT_CAT_QUANTITY_VALUE'] = $arItem['CATALOG_QUANTITY'];

		$arItem['SHOW_DETAIL'] = ($Description = GetIBlockElementList(3, false, Array("ORDER"=>"ASC"), 1, Array('PROPERTY_GOODID' => $arItem['ID']))) && ($Description = $Description->GetNext());
		// ок
		$ret[$n++] = $arItem;
	}
//	echo '<pre>';
//	print_r($arItem);
//	echo '</pre>';
	$c = $CurrentPage;
	$a = $PagesNum;
	if(!$_REQUEST['sort'] and $sorts=="20"){
	$sort=100;
	}elseif($_REQUEST['sort']=="20"){
	$sort=100;
	}elseif($_REQUEST['sort']=="100"){
	$sort=20;
	}
	$min = $c - 5;
	if ($min < 1)
		$min = 1;
	$max = $min + 10;
	if ($max > $a)
		$max = $a;
	if (1 != $c)
		$NavStr = '<a href="/shop/'.htmlspecialcharsex($_REQUEST['sid']).'/?sort='.$sorts.'">в начало</a> | ';
	else
		$NavStr = 'в начало | ';
		
	for($i = $min; $i <= $max; $i++)
		if ($i != $c)
			$NavStr .= '<a href="/shop/'.htmlspecialcharsex($_REQUEST['sid']).'/?page='.$i.'&sort='.$sorts.'">'.$i.'</a> | ';
		else
			$NavStr .= '<span class="active-page-catalog">'.$i . '</span> | ';
			
	if ($a != $c)
		$NavStr .= '<a href="/shop/'.htmlspecialcharsex($_REQUEST['sid']).'/?page='.$a.'&sort='.$sorts.'">в конец</a>';
	else
		$NavStr .= 'в конец';
	$NavStr .= '<br><a href="/shop/'.htmlspecialcharsex($_REQUEST['sid']).'/?sort='.$sort.'">^ вывести по '.$sort.'</a>';
	return $NavStr;
}

function GetSectionsList($sid, &$ret, $start = 0)
{
	$Sections = GetIBlockSectionList(10, $sid);
	$n = $start;
	while($arItem = $Sections->GetNext())
	{
		$ret[$n++] = $arItem;
		$n = GetSectionsList($arItem['ID'], $ret, $n);
	}
	
	return $n;
}

function CheckManufacturer($bid, $sid, $man)
{
	$man = trim($man);
	if (!($sect = GetIBlockSection($sid)))
		return false;
	$sname = str_replace("\n", '', $sect['DESCRIPTION']);
	$sname = str_replace("\r", '', $sname);
	if (stripos($sname, $man) > 0)
		return true;
	return false;
}

if(true)
{
	$arOutput = Array(
		'SECTIONS' => Array(),
		'ELEMENTS' => Array()
	);
	
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
	
	// Получаем детальную информацию о текущем разделе	
	$iCurrentSectionID = intval(htmlspecialcharsEx($_REQUEST["sid"]));
	
	$dbCurrentSection = CIBlockSection::GetByID($iCurrentSectionID);
	$arCurrentSection = $dbCurrentSection->GetNext();
	
	// Фильтр для выборки элементов каталога
	$arElementsFilter = Array(
		'IBLOCK_ID' => 10,
		'ACTIVE' => 'Y',
		'INCLUDE_SUBSECTIONS' => 'Y'
	);	
	
	// Обрабатываем установленный фильтр "Поиск по каталогу"
	$bIsFilterSet = false;
	foreach($_REQUEST as $sParamName => $sParamValue)
	{
		if(stripos($sParamName, 'exf_') !== false)
		{
			$bIsFilterSet = true;
			break;
		}
	}
	
	if($iCurrentSectionID > 0)
	{
		$arElementsFilter['SECTION_ID'] = $arCurrentSection['ID'];
	}
	
	$nPageSize = 20;
	// Значения из формы "Поиск по каталогу"
	if($bIsFilterSet)
	{
		if(isset($_REQUEST['exf_articul']) && !empty($_REQUEST['exf_articul']))
		{
			$arElementsFilter['%PROPERTY_CML2_ARTICLE'] = htmlspecialcharsEx($_REQUEST['exf_articul']);
		}
		if(isset($_REQUEST['exf_name']) && !empty($_REQUEST['exf_name']))
		{
			$arElementsFilter['%NAME'] = htmlspecialcharsEx($_REQUEST['exf_name']);
		}
		if(isset($_REQUEST['exf_manufacturer']) && !empty($_REQUEST['exf_manufacturer']))
		{
			$arElementsFilter['%PROPERTY_MANUFACTURER'] = htmlspecialcharsEx($_REQUEST['exf_manufacturer']);
		}
		$bSetMinPrice = isset($_REQUEST['exf_prices']) && !empty($_REQUEST['exf_prices']);
		$bSetMaxPrice = isset($_REQUEST['exf_pricee']) && !empty($_REQUEST['exf_pricee']);
		if($bSetMinPrice && $bSetMaxPrice)
		{
			$arElementsFilter['><CATALOG_PRICE_'.$sPriceID] = Array(
				floatval(htmlspecialcharsEx($_REQUEST['exf_prices'])),
				floatval(htmlspecialcharsEx($_REQUEST['exf_pricee']))
			);
		}
		elseif($bSetMinPrice)
		{
			$arElementsFilter['>=CATALOG_PRICE_'.$sPriceID] = floatval(htmlspecialcharsEx($_REQUEST['exf_prices']));
		}
		elseif($bSetMaxPrice)
		{
			$arElementsFilter['<=CATALOG_PRICE_'.$sPriceID] = floatval(htmlspecialcharsEx($_REQUEST['exf_pricee']));
		}		
		
		$nPageSize = 0;
		if(isset($_REQUEST['exf_showcount']) && !empty($_REQUEST['exf_showcount']))
		{
			$nPageSize = intval(htmlspecialcharsEx($_REQUEST['exf_showcount']));
		}
	}
	
	/*if($USER->IsAdmin() && ($_GET["testing"] == "Y"))
	{
	*/
		if(isset($_REQUEST['sort']) && !empty($_REQUEST['sort']))
		{
			$nPageSize = intval(htmlspecialcharsEx($_REQUEST['sort']));
		}	
	//}	
	
	if($nPageSize < 20)
	{
		$nPageSize = 20;
	}

	//if($USER->IsAdmin() && ($_GET["testing"] == "Y"))
	//{
		// Параметры для постраничной навигации и ограничения количества выводимых элементов
		$arNavStartParams = Array(
			'iNumPage' => (intval($_REQUEST['PAGEN_1']) > 0) ? intval(htmlspecialcharsEx($_REQUEST['PAGEN_1'])) : 1,
			'nPageSize' => $nPageSize
		);
	/*
	}
	else
	{
		// Параметры для постраничной навигации и ограничения количества выводимых элементов
		$arNavStartParams = Array(
			'iNumPage' => (intval($_REQUEST['page']) > 0) ? intval(htmlspecialcharsEx($_REQUEST['page'])) : 1,
			'nPageSize' => $nPageSize
		);
	}
	*/
		
	// Формируем список подразделов данного, содержащих товары,
	// удовлетворяющие параметрам фильтра
	$dbSections = CIBlockElement::GetList(
		Array(),
		$arElementsFilter,
		Array('IBLOCK_SECTION_ID')
	);

	while($arSection = $dbSections->GetNext())
	{
		// Получаем цепочку разделов от текущего до раздела, содержащего искомые элементы
		$dbSectionChain = CIBlockSection::GetNavChain(10, $arSection['IBLOCK_SECTION_ID']);
		while($arSectionChain = $dbSectionChain->GetNext())
		{
			if(
				($arSectionChain['DEPTH_LEVEL'] == ($arCurrentSection['DEPTH_LEVEL'] + 1))
				&&
				!array_key_exists($arSectionChain['ID'], $arOutput['SECTIONS'])
			)
			{
				$arOutput['SECTIONS'][$arSectionChain['ID']] = $arSectionChain;
				$arOutput['SECTIONS'][$arSectionChain['ID']]['PICTURE'] = CFile::GetFileArray($arSectionChain['PICTURE']);
			}
		}
	}
	
	// Сортируем разделы по алфавиту
	function cmp($a, $b)
	{
		if($a['LEFT_MARGIN'] == $b['LEFT_MARGIN'])
		{
			return 0;
		}
		else
		{
			return (($a['LEFT_MARGIN'] < $b['LEFT_MARGIN']) ? -1 : 1);
		}
	}
	
	usort($arOutput['SECTIONS'], "cmp");
		
	// Формируем список элементов данного раздела, удовлетворяющие параметрам фильтра
	$arElementsOrder = Array('NAME' => 'ASC');

	if(isset($_GET['by']) && isset($_GET['order']))	
	{
		$sSortField = htmlspecialcharsEx($_GET['by']);
		$sSortOrder = htmlspecialcharsEx($_GET['order']);
		
		if(($sSortOrder == "asc") || ($sSortOrder == "desc"))
		{
			$sSortOrder = strtoupper($sSortOrder);
		}
		if(($sSortField == "price") || ($_GET['by'] == "name"))
		{
			$sSortField = strtoupper($sSortField);
		}
		
		
		if($sSortField == "PRICE")
		{
			$sSortField = 'CATALOG_PRICE_'.$sPriceID;
			unset($arElementsOrder['NAME']);
		}
		
		
		if($sSortField == "MANUFACTURER")
		{
			$sSortField = 'PROPERTY_MANUFACTURER';
			unset($arElementsOrder['NAME']);
		}
		
		if($sSortField == "QUANTITY")
		{
			$sSortField = 'CATALOG_QUANTITY';
			unset($arElementsOrder['NAME']);
		}
		
		
		
		$arElementsOrder[$sSortField] = $sSortOrder;
	}
	
	unset($arElementsFilter['INCLUDE_SUBSECTIONS']);
	$dbElements = CIBlockElement::GetList(
		$arElementsOrder,
		$arElementsFilter,
		false,
		$arNavStartParams,
		Array(
			'ID',
			'IBLOCK_ID',
			'IBLOCK_SECTION_ID',
			'NAME',
			'DETAIL_PAGE_URL',
			'PREVIEW_PICTURE',
			'PROPERTY_CML2_ARTICLE',
			'PROPERTY_PARTY',
			'PROPERTY_PACKING',
			'PROPERTY_POINT',
			'PROPERTY_COUNT_'.$sCountPropertyPostfix,
			'CATALOG_GROUP_'.$sPriceID,
			'PROPERTY_MANUFACTURER'
		)
	);
	//$dbElements->NavStart($nPageSize);
	while($arElement = $dbElements->GetNext())
	{
		$arOutput['ELEMENTS'][$arElement['ID']] = $arElement;
	}
	
	if($arCurrentSection['NAME'] != '')
	{
		$APPLICATION->SetTitle(_flu($arCurrentSection['NAME']));
	}
	else
	{
		$APPLICATION->SetTitle('Поиск по каталогу');
	}
	$addman = (strlen($_REQUEST['man']) > 0)?($_REQUEST['man'].'/'):'';
	?>
	<div class="cat-list-sublvl">
		<?
		if($_SERVER['REQUEST_URI'] == '/shop/4369/')
		{
			?><h1>Лампы накаливания и галогенные лампы сетевого напряжения всех фирм Philips, General Electric</h1><?
		}
		else
		{
			if($arCurrentSection['NAME'] != '')
			{
				?><h1><?=_flu($arCurrentSection['NAME']);?></h1><?
			}
			else
			{
				?><h1>Поиск по каталогу</h1><?
			}
		}
		?>
		<? if(!$bIsFilterSet): ?>
		<ul>
			<? foreach($arOutput['SECTIONS'] as $arSection): ?>
				<li>
					<div class="top"><!--ie--></div>
					<div class="content">
						<div class="img">
							<table>
								<tr>
									<td>
										<?=CFile::ShowImage($arSection['PICTURE']['SRC'], 90, 124, 'title="" alt=""', '/shop/'.$arSection['ID'].'/'.$addman)?>
									</td>
								</tr>
							</table>
						</div>
						<div class="name">
							<table>
								<tr>
									<td>
										<a href="/shop/<?=$arSection['ID']?>/<?=$addman?>"><?=_flu($arSection['NAME'])?></a>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="bottom"><!--ie--></div>
				</li>
			<? endforeach ?>
		</ul>
		<? endif ?>
		<?/*?><p style="clear: left; color: black;"><?=$arCurrentSection['DESCRIPTION']?></p><?*/?>
	</div>
<?
}
else
{
?>
	<div class="cat-list-sublvl">
		<?
		if ($_SERVER['REQUEST_URI'] == '/shop/4387/' ) {
			?><h1>Лампы накаливания e27 фирм Philips и General Electric</h1><?
		}
		elseif ($_SERVER['REQUEST_URI'] == '/shop/15151/' ) {
			?><h1>Зеркальные лампы накаливания e27, e14 фирм Philips и General Electric</h1><?
		}
		else {
			?><h1><?=_flu($arCurrentSection['NAME']);?></h1><?
		}
		?>	
		<p>&nbsp;</p>
	</div>	
<?	
}

/*if(true)
{ */
	if(!empty($arOutput['ELEMENTS']))
	{
		$navString = GetElementList($SectionID, $Items);
		
		$page = '/shop/'.htmlspecialcharsex($_REQUEST['sid']).'/';
		if(isset($_GET['sort']))
		{
			$page .= "?sort=".htmlspecialcharsex($_GET['sort']);
		}
	
		$UserShowProperty = Array("CML2_ARTICLE", "PACKING", "POINT");
		$UserShowPropertyNames = Array("артикул", "в уп.", "ед.");
		$UserShowPropertyTitle = Array("Артикул", "Количество изделий в одной упаковке", "Единицы измерения");
		?>
		<form action="cat.php" method="get">
			<table id="goods-list">
				<tr>
					<th>наименование <?=SortingEx("name", $page)?></th>
					<? foreach($UserShowPropertyNames as $key => $name): ?>
						<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
					<? endforeach ?>
					<? if($bUserInGeoGroup): ?>
						<th class="count"></th>
					<? endif ?>
					<th class="price center">цена <?=SortingEx("price", $page)?></th>
					<th class="center" title="Количество заказываемых позиций">кол-во</th>
					<th class="center" title="Добавить в корзину"></th>
				</tr>
				<? foreach($arOutput['ELEMENTS'] as $arElement):?>
				<?var_dump($arElement);?>
					<tr>
						<td class="name">
							<? if(true || $arElement['SHOW_DETAIL']): ?>
								<a href="/shop/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/"><?=_flu($arElement['NAME'])?></a>
							<? else: ?>
								<?=_flu($arElement['NAME'])?>
							<? endif ?>
						</td>
						<? $num = 0 ?>
						<? foreach($UserShowProperty as $code): ?>
							<td align="center"<? if(++$num%2): ?> class="alt"<? endif?>><?=$arElement['PROPERTY_'.$code.'_VALUE']?></td>
						<? endforeach ?>
						<? if($bUserInGeoGroup): ?>
							<td class="count" align="center">
								<?=$arElement['PROPERTY_COUNT_'.$sCountPropertyPostfix.'_VALUE']?>
							</td>
						<? endif ?>
						<td class="price" align="center"><?=SaleFormatCurrency(floatval($arElement['CATALOG_PRICE_'.$sPriceID]), $arElement['CATALOG_CURRENCY_'.$sPriceID])?></td>
						<td align="center">
							<? if($IgnoreStoreCount || $arElement['CATALOG_CAN_BUY_'.$sPriceID]): ?>
								<input type="text" name="good_id_<?=$arElement['ID']?>" id="good_id_<?=$arElement['ID']?>" value="1" style="width: 40px;" />
							<? endif ?>
						</td>
						<td align="center">
							<div class="in_basket">
								<p>Товар добавлен в корзину</p>
								<p><a href="/personal/order.php">Оформить заказ</a></p>
								<p><a href="#" class="close">Продолжить покупки</a></p>
							</div>
							<a href="?action=ADD2BASKET&id=<?=$arElement['ID']?>"><img src="/i/plus.png" width="18" height="18" alt="Добавить <?=_flu($arElement['NAME']);?> в корзину" title="Добавить <?=_flu($arElement['NAME']);?> в корзину"></a>
						</td>
					</tr>
				<? endforeach ?>
			</table>
			<div style="float: left; padding: 10px 0px;font:11px Tahoma;">
				<?/* if($USER->IsAdmin() && ($_GET["testing"] == "Y")): */?>
					<?=$dbElements->NavPrint('', true, 'text', '/bitrix/templates/elevel/page_navigation_templates/catalog_nav_string.php');?>
				<?/* else: ?>
					<?=$navString?>
				<? endif */?>
			</div>
			<div style="padding: 10px 0px; text-align: right;">
				<input type="submit" value="Добавить в корзину" class="add2basket" />
			</div>
			<input type="hidden" name="sid" value="<?=htmlspecialcharsex($_REQUEST['sid'])?>" />
			<input type="hidden" name="action" value="add2basket" />
		</form>
	<p style="color: black;"><?=$arCurrentSection['DESCRIPTION']?></p>
	<?
	}
/*}
else
{


$SectionID = $_GET['sid'];
$kstst_time = microtime(true);
$f_time = 0;

$f_time = microtime(true);
	$navString = GetElementList($SectionID, $Items);
$f_time = microtime(true) - $f_time;
	$CacheVars[0] = $Items;
	$CacheVars[1] = $navString ;
//}
$iut_time = microtime(true);
//if($eCache->StartDataCache()):
?>
<? if(count($Items) > 0): ?>
	<?
	$page = "/shop/".$_REQUEST['sid']."/";
	if (isset($_GET['sort'])) $page .= "?sort=".$_GET['sort'];
	?>

	
	<?
	$UserShowProperty = Array("CML2_ARTICLE","PACKING","POINT");
	$UserShowPropertyNames = Array("артикул","в уп.","ед.");
	$UserShowPropertyTitle = Array("Артикул","Количество изделий в одной упаковке","Единицы измерения");
	?>

	<? if(true): ?>

	<form action="cat.php" method="get">
		<table id="goods-list">
			<tr>
				<th>наименование <?=SortingEx("name", $page)?></th>
				<? foreach($UserShowPropertyNames as $key => $name): ?>
					<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
				<? endforeach ?>
				<th class="count"></th>
				<th class="price center">цена <?=SortingEx("price", $page)?></th>
				<th class="center" title="Количество заказываемых позиций">кол-во</th>
				<th class="center" title="Добавить в корзину"></th>
			</tr>
			<? foreach($arOutput['ELEMENTS'] as $arElement): ?>
				<tr>
					<td class="name">
						<? if(true || $arElement['SHOW_DETAIL']): ?>
							<a href="/shop/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/"><?=_flu($arElement['NAME'])?></a>
						<? else: ?>
							<?=_flu($arElement['NAME'])?>
						<? endif ?>
					</td>
					<?
					$num = 0;
					foreach($UserShowProperty as $code):
						$num++;
						?>
						<td align="center" <?if($num%2):?>class="alt"<?endif;?>><?=$arElement['PROPERTY_' . $code . '_VALUE']?></td>
					<? endforeach ?>
					<td class="count" align="center">
						<? if(permissions_user($arElement['IBLOCK_SECTION_ID'], $arElement['PROPERTY_MANUFACTURER_VALUE'])): ?>
							<?=$arElement["PROPERTY_COUNT_VALUE"]?>
						<? endif ?>
					</td>
					<td class="price" align="center"><?=$arElement['CATALOG_PRICE_'.$sPriceID]?></td>
					<td align="center">
						<? if($IgnoreStoreCount || $arElement['CAN_BUY']): ?>
							<input type="text" name="good_id_<?=$good['ID']?>" id="good_id_<?=$arElement['ID']?>" value="0" style="width: 40px;" />
						<? endif ?>
					</td>
					<td align="center">
						<div class="in_basket">
							<p>Товар добавлен в корзину</p>
							<p><a href="/personal/order.php">Оформить заказ</a></p>
							<p><a href="#" class="close">Продолжить покупки</a></p>
						</div>
						<a href="?action=ADD2BASKET&id=<?=$arElement['ID']?>"><img src="/i/plus.png" width="18" height="18" alt="Добавить <?=_flu($arElement['NAME']);?> в корзину" title="Добавить <?=_flu($arElement['NAME']);?> в корзину"></a>
					</td>
				</tr>
			<? endforeach ?>
		</table>
		<div style="float: left; padding: 10px 0px;font:11px Tahoma;">
			<?=$navString?>
		</div>
		<div style="padding: 10px 0px; text-align: right;">
			<input type="submit" value="Добавить в корзину" class="add2basket" />
		</div>
		<input type="hidden" name="sid" value="<?=$_REQUEST['sid']?>" />
		<input type="hidden" name="action" value="add2basket" />
	</form>
	<? else: ?>

	<form action="cat.php" method="get">
		<table id="goods-list">
			<tr>
				<th>наименование <?=SortingEx("name", $page)?></th>
		<?foreach($UserShowPropertyNames as $key=>$name):?>
			<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
		<?endforeach;?>
		<th class="count"></th>
		<th class="price center">цена <?=SortingEx("price", $page)?></th>
		<th class="center" title="Количество заказываемых позиций">кол-во</th>		
		<th class="center" title="Добавить в корзину"></th>
		</tr>
		<?foreach($Items as $good):?>
		<tr>
		<td class="name">
		<?if(true || $good['SHOW_DETAIL']):?>
			<a href="/shop/<?=$good['IBLOCK_SECTION_ID']?>/<?=$good['ID']?>/"><?=_flu($good['NAME']);?></a>
		<?else:?>
			<?=_flu($good['NAME']);?>
		<?endif;?>
		</td>
		<?
		$num = 0;
		foreach($UserShowProperty as $code):
		$num++;
		?>
		<td align="center" <?if($num%2):?>class="alt"<?endif;?>><?=$good['PROPERTY_' . $code . '_VALUE']?></td>
		<?endforeach;?>
		<td class="count" align="center">
			<?if (permissions_user($good['IBLOCK_SECTION_ID'], $good['PROPERTY_MANUFACTURER_VALUE'])): ?>
				<?=$good["PROPERTY_COUNT_VALUE"]?>	
			<?endif;?>
		</td>
		<td class="price" align="center"><?=$good['PRICES']['FORMATTED']?></td>		
		<td align="center"><?if($IgnoreStoreCount || $good['CAN_BUY']):?><input type="text" name="good_id_<?=$good['ID']?>" id="good_id_<?=$good['ID']?>" value="0" style="width: 40px;" /><?endif;?></td>
		<td align="center">
			<div class="in_basket">
				<p>Товар добавлен в корзину</p>
				<p><a href="/personal/order.php">Оформить заказ</a></p>
				<p><a href="#" class="close">Продолжить покупки</a></p>
			</div>
			<a href="?action=ADD2BASKET&id=<?=$good['ID']?>"><img src="/i/plus.png" width="18" height="18" alt="Добавить <?=_flu($good['NAME']);?> в корзину" title="Добавить <?=_flu($good['NAME']);?> в корзину"></a>
		</td>
		</tr>
		<?endforeach;?>
	</table>
	<div style="float: left; padding: 10px 0px;font:11px Tahoma;">
		<?=$navString?>
	</div>
	<div style="padding: 10px 0px; text-align: right;">
		<input type="submit" value="Добавить в корзину" class="add2basket" />
	</div>
	<input type="hidden" name="sid" value="<?=$_REQUEST['sid']?>" />
	<input type="hidden" name="action" value="add2basket" />
	</form>
	<? endif ?>
	<p style="color: black;"><?=$arCurrentSection['DESCRIPTION']?></p>
	<?
endif;
} */
?>                              
<? endif ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
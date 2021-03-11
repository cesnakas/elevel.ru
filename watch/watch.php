<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Недавно просмотренные");
CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");


$UserShowProperty = Array("ARTICUL","PARTY","PACKING","POINT");
$UserShowPropertyNames = Array("Артикул","Мин. парт.","Кол-во в уп.","Ед. изм.");
	
$AR=$_SESSION['WATCH_'];
GetElementList($AR,$iPriceID,$Items);
//GetSectionsList($sid, $InnerSections);
$iPriceID = CGeoRegions::GetPriceIDByUser();
$sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
$sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);
function _flu($str)
{
	$fc = mb_strtoupper(substr($str, 0, 1));
	$str{0} = $fc;
	return $str;
}

function GetElementList($AR,$iPriceID, &$ret, $start = 0)
{
	if (sizeof($AR)==0) return '';

	$n = $start;
	$Items=CIBlockElement::GetList(
		array(),
		array(
	   		'IBLOCK_ID'=>10,
	   		'ID'=>$AR
		),
		false,
		array(
			'nTopCount'=>10
		),
		 array(
			'ID',
			'NAME',
			'PREVIEW_PICTURE',
			'DETAIL_PAGE_URL',
			'PROPERTY_CML2_ARTICLE',
			'PROPERTY_PACKING',
			'PROPERTY_POINT',
			'CATALOG_GROUP_'.$iPriceID
		);
	);	


	while($arItem = $Items->GetNext())
	{
		// Св-ва
		$arItem['PROPERTIES'] = Array();
		$PropList = CIBlockElement::GetProperty(1, $arItem['ID']);
		while ($Property = $PropList->Fetch())
			$arItem['PROPERTIES'][$Property['CODE']] = $Property;
			
		// Цена
		$arProduct = GetCatalogProduct($arItem['ID']);
		$arPrice = GetCatalogProductPriceList($arItem['ID'], "SORT", "ASC");
		//$bCanBuy = False;
		$Prices = Array();
		$PriceAccNum = 0;
		for ($i = 0; $i<count($arPrice); $i++)
		{
			$Prices[$PriceAccNum] = Array();
			$Prices[$PriceAccNum]['CAN_ACCESS'] = $arPrice[$i]["CAN_ACCESS"];
			$Prices[$PriceAccNum]['CAN_BUY'] = $arPrice[$i]["CAN_BUY"];
			$Prices[$PriceAccNum]['NAME'] = $arPrice[$i]["CATALOG_GROUP_NAME"];
			$Prices[$PriceAccNum]['PRICE'] = $arPrice[$i]["PRICE"];
			$Prices[$PriceAccNum]['CURRENCY'] = $arPrice[$i]["CURRENCY"];
			$Prices[$PriceAccNum]['FORMATTED'] = FormatCurrency($arPrice[$i]["PRICE"], $arPrice[$i]["CURRENCY"]);
			$PriceAccNum++;
		}
		$arItem['PRICES'] = $Prices;
		// ок
		$ret[$n++] = $arItem;
	}
}

?>
<div class="block756a">

<?

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
	<form action="cat.php" method="get">
	<div class="sortings">
				<table>
					<tbody><tr>
						<td style="width: 70px;">
							<ul>
								<li>Вид:</li>
								<li><img alt="" src="/i/icon14a.gif"></li>
								<li><img alt="" src="/i/icon14b.gif"></li>
							</ul>
						</td>
						<td>
							<ul>
								<li>Сортировать по:</li>
								<li><span>цене</span></li>
								<li><span>производителю</span></li>
								<li><span style="border: medium none;">наличию</span></li>
							</ul>
						</td>
						<td>
						<div style="float: left; padding: 10px 0px;font:11px Tahoma;">
						<?=$dbElements->NavPrint('', true, 'text', '/bitrix/templates/wt-elevel/page_navigation_templates/catalog_nav_string.php');?>
						</div>
						</td>
					</tr>
				</tbody></table>
			</div>
		<table id="goods-list" class="table2">
			<tr>
				<th><div class="crl">Наименование</div></th>
				
				<th class="center" nowrap title="Артикул"><div>Артикул</div></th>
				<th class="center" nowrap title="Количество изделий в одной упаковке"><div>в уп.</div></th>
				<th class="center" nowrap title="Единицы измерения"><div>ед.</div></th>
				<? if($bShowGeoCount): ?>
					<th class="count"><div></div></th>
				<? endif ?>
				<th class="price center"><div>цена </div></th>
				<th class="center" title="Количество заказываемых позиций"><div>кол-во</div></th>
				<th class="center" title="Добавить в корзину"><div class="crr">&nbsp;</div></th>
			</tr>
			<? foreach($Items as $arElement): ?>
				<tr>
					<td class="name">
						<? if(true || $arElement['SHOW_DETAIL']): ?>
							<h5><a href="/catalog/<?=$arElement['IBLOCK_SECTION_ID']?>/<?=$arElement['ID']?>/"><?=_flu($arElement['NAME'])?></a>
							<?if(!empty($arElement['PREVIEW_PICTURE'])):?>
							<?$picts=CFile::GetPath($arElement['PREVIEW_PICTURE']);?>
							<img alt="" src="<?=$picts?>" style="display: none;">
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
					<td class="price" align="center"><p class="pr2"><?=SaleFormatCurrency(floatval($arElement['CATALOG_PRICE_'.$iPriceID]), $arElement['CATALOG_CURRENCY_'.$iPriceID])?></p></td>
					<td align="center">
						<? if($arElement['CATALOG_CAN_BUY_'.$iPriceID] == 'Y'): ?>
							<div class="block61">
							<input type="text" value="1" name="good_id_<?=$arElement['ID']?>" id="good_id_<?=$arElement['ID']?>">
							<img width="7" height="7" class="dec7" alt="" src="/i/pix.gif">
							<img width="7" height="7" class="inc7" alt="" src="/i/pix.gif">
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


</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
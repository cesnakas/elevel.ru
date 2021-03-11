<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("�����");
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
	// �������� ���� � ������� ������, ������ �� �������������� ������������ � �������������� ��� �������
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

	$iPriceID = CGeoRegions::GetPriceIDByUser();

	// ���������� ������� ���������� ������ � �������
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/catalog_functions.php');
	
	$ELEMENT_ID = intval($_GET['id']);
	//Add2BasketByProductID($ELEMENT_ID, 1);
	Add2BasketByProductPriceID($ELEMENT_ID, $iPriceID, 1);
	LocalRedirect("/search/catalog.php?".$GET);
}

if($_POST['action'] == 'add2basket_array')
{
	// �������� ���� � ������� ������, ������ �� �������������� ������������ � �������������� ��� �������
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');

	$iPriceID = CGeoRegions::GetPriceIDByUser();

	// ���������� ������� ���������� ������ � �������
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
$UserShowPropertyNames = Array("�������","� ��.","��.");
$UserShowPropertyTitle = Array("�������","���������� ������� � ����� ��������","������� ���������");
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
		
		$title = "��������� ������ �� �������-��������: ";
		$obSearch->NavPrint($title, true, "", "/search/navprint.php");
		echo '<br /><hr size="1" color="#DFDFDF">';
		global $APPLICATION;
		
		if(/*$_REQUEST['dev_testing'] == 'Y'*/true)
		{
			// �������� ���� � ������� ������, ������ �� �������������� ������������ � �������������� ��� �������
			require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/include/classes/geo_functions.php');
   
			$iPriceID = CGeoRegions::GetPriceIDByUser();
			$sPriceCode = CGeoRegions::GetPriceCodeByID($iPriceID);
			$sPropertyCountCode = CGeoRegions::GetCountPropPostfixByPriceID($iPriceID);
			
			// ��������� ������ ����������� ����� ���������
			$arElementsSelectFields = array(
				'ID',
				'NAME',
				'DETAIL_PAGE_URL',
				'PROPERTY_CML2_ARTICLE',
				'PROPERTY_PACKING',
				'PROPERTY_POINT',
				'CATALOG_GROUP_'.$iPriceID
			);				
			// ���� ������ ������������ ��������
			$bShowGeoCount = false;
			$arUserGroups = array();
			$arGeoRegionsPropCounts = array();
			$iGeoRegionsSize = 0;
			$bShowGeoTableCount = false;
			$arGeoTableCount = array();
			
			// ����������, ����� �������� ���������� �������� ������������
			if(!$USER->IsAuthorized())
			{
				// ����������������� ������������ �� ���������� �������
				$bShowGeoCount = false;
			}
			else
			{
				// ��������� �������������� ������������ � ������� ��������
				//43	������� ���
				//36	������� ���
				//37	������� ���
				//38	������� ���
				//40	������� ���
				//39	������� ���
				
				// �������� ������ �����, � ������� ����������� ������� ������������
				$arUserGroups = CUser::GetUserGroup($USER->GetID());
				
				// ���������� ������ ����� ��������, � ������� ����������� ������� ������������
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
					// ������������ �� ����������� �� � ����� ������ �������
					$bShowGeoCount = false;		
				}
				elseif($iGeoRegionsSize == 1)
				{
					$bShowGeoCount = true;
					// �������� �������� ������ ���� ��������, � ������ �������� ����������� ������������
					$arElementsSelectFields[] = 'PROPERTY_COUNT_'.$arGeoRegionsPropCounts[0];
				}	
				else
				{
					// �������� �������� �������, � ������� ������� ����������� ������������
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
					<th>������������</th>
					<? foreach($UserShowPropertyNames as $key => $name): ?>
						<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
					<? endforeach ?>
					<? if($bShowGeoCount): ?>
						<th class="count"></th>
					<? endif ?>				
					<th class="price center">����</th>
					<th class="center" title="���������� ������������ �������">���-��</th>		
					<th class="center" title="�������� � �������"></th>
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
							// ������������ �� ����������� �� � ����� ������ �������
							$bShowGeoCount = false;
							$arElement['SHOW_GEO_TABLE_COUNT'] = false;
							$arElement['GEO_COUNT'] = 0;
							$arElement['GEO_TABLE_COUNT_EXISTS'] = false;
							$arElement['GEO_TABLE_COUNT'] = array();
						}
						elseif($iGeoRegionsSize == 1)
						{
							$bShowGeoCount = true;
							// �������� �������� ������ ���� ��������, � ������ �������� ����������� ������������
							$arElement['SHOW_GEO_TABLE_COUNT'] = false;
							$arElement['GEO_COUNT'] = $arElement['PROPERTY_COUNT_'.$arGeoRegionsPropCounts[0].'_VALUE'];
							$arElement['GEO_TABLE_COUNT_EXISTS'] = false;
							$arElement['GEO_TABLE_COUNT'] = array();
						}
						else
						{
							// �������� �������� �������, � ������� ������� ����������� ������������
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
										$sCountName = '������� ���:';
										break;
									case 'SPB':
										$sCountName = '������� ���:';
										break;
									case 'EKT':
										$sCountName = '������� ���:';
										break;
									case 'NSK':
										$sCountName = '������� ���:';
										break;
									case 'ORN':
										$sCountName = '������� ���:';
										break;
									case 'RST':
										$sCountName = '������� ���:';
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
											<span id="geo_counts_title_<?=$arElement['ID']?>">����</span>
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
											<span>���</span>
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
									<p>����� �������� � �������</p>
									<p><a href="/personal/order.php">�������� �����</a></p>
									<p><a href="#" class="close">���������� �������</a></p>
								</div>
								<a href="<?=$add2basket_link?>"><img src="/i/plus.png" width="18" height="18" alt="�������� <?=($arElement['NAME']);?> � �������" title="�������� <?=($arElement['NAME']);?> � �������"></a>
							</td>
						</tr>
						<?
					}
					?>
				<? endwhile ?>
			</table>
			<div style="padding: 10px 0px; text-align: right;">
				<input type="submit" value="�������� � �������" class="add2basket" />
			</div>
			<input type="hidden" name="action" value="add2basket_array" />
			</form>
			<br />
			<?$obSearch->NavPrint($title, true, "", "/search/navprint.php");?>
		<?
		}
		else
		{
			// �������� ���� � ������� ������, ������ �� �������������� ������������ � �������������� ��� �������
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
					<th>������������</th>
					<? foreach($UserShowPropertyNames as $key => $name): ?>
						<th class="center" nowrap title="<?=$UserShowPropertyTitle[$key]?>"><?=$name?></th>
					<? endforeach ?>
					<? if($bUserInGeoGroup): ?>
						<th class="count"></th>
					<? endif ?>				
					<th class="price center">����</th>
					<th class="center" title="���������� ������������ �������">���-��</th>		
					<th class="center" title="�������� � �������"></th>
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
								<p>����� �������� � �������</p>
								<p><a href="/personal/order.php">�������� �����</a></p>
								<p><a href="#" class="close">���������� �������</a></p>
							</div>
							<a href="<?=$add2basket_link?>"><img src="/i/plus.png" width="18" height="18" alt="�������� <?=($arFieldsCatalog['NAME']);?> � �������" title="�������� <?=($arFieldsCatalog['NAME']);?> � �������"></a>
						</td>
					</tr>
				<? endwhile ?>
			</table>
			<div style="padding: 10px 0px; text-align: right;">
				<input type="submit" value="�������� � �������" class="add2basket" />
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
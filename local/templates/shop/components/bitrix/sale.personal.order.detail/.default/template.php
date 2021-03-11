<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

// echo "<pre>"; print_r($arResult); echo "</pre>";

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach ($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}

}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach ($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	?>
	<div class="history-item open-close<?=($arParams['key']==0)?" first":""?>">
		<div class="opener">
			<div class="heading">
				<strong class="title"><?=Loc::getMessage('SPOD_ORDER')?> <?=Loc::getMessage('SPOD_NUMBER_SIGN').$arResult["ACCOUNT_NUMBER"]?></strong>
				<strong><?=$arResult["DATE_INSERT_FORMATED"]?></strong>
				<strong><?= count($arResult['BASKET']);?>
						<?
						$count = count($arResult['BASKET']) % 10;
						if ($count == '1')
						{
							echo Loc::getMessage('SPOD_TPL_GOOD');
						}
						elseif ($count >= '2' && $count <= '4')
						{
							echo Loc::getMessage('SPOD_TPL_TWO_GOODS');
						}
						else
						{
							echo Loc::getMessage('SPOD_TPL_GOODS');
						}
						?></strong>
				<strong><?=Loc::getMessage('SPOD_TPL_SUMOF')?> <span class="text-orange"><?=$arResult["PRICE_FORMATED"]?></span></strong>
			</div>
			<div class="block-info">
				<h3><?= Loc::getMessage('SPOD_LIST_ORDER_INFO') ?></h3>
				<div class="clearfix">
					<div class="column">
						<strong class="title"><?
						$userName = $arResult["USER"]["NAME"] ." ". $arResult["USER"]["SECOND_NAME"] ." ". $arResult["USER"]["LAST_NAME"];
						if (strlen($userName) || strlen($arResult['FIO']))
						{
							echo Loc::getMessage('SPOD_LIST_FIO').':';
						}
						else
						{
							echo Loc::getMessage('SPOD_LOGIN').':';
						}
						?></strong>
						<?
						if (strlen($userName))
						{
							echo htmlspecialcharsbx($userName);
						}
						elseif (strlen($arResult['FIO']))
						{
							echo htmlspecialcharsbx($arResult['FIO']);
						}
						else
						{
							echo htmlspecialcharsbx($arResult["USER"]['LOGIN']);
						}
						?>
					</div>
					<div class="column">
						<strong class="title"><?= Loc::getMessage('SPOD_LIST_CURRENT_STATUS')?></strong>
						<?
						if ($arResult['CANCELED'] !== 'Y')
						{
							echo htmlspecialcharsbx($arResult["STATUS"]["NAME"]);
						}
						else
						{
							echo Loc::getMessage('SPOD_ORDER_CANCELED');
						}
						?>
					</div>
					<div class="column">
						<strong class="title"><?= Loc::getMessage('SPOD_ORDER_PRICE')?></strong>
						<?= $arResult["PRICE_FORMATED"]?>
					</div>
				</div>
			</div>
		</div>
		<div class="slide-block">
			<div class="block-info">
				<h3><?= Loc::getMessage('SPOD_ORDER_PAYMENT') ?></h3>
				<div class="block-payment clearfix">
					<div class="block-left">
						<strong class="title"><?= Loc::getMessage('SPOD_SUB_ORDER_TITLE', array(
													"#ACCOUNT_NUMBER#"=> htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"]),
													"#DATE_ORDER_CREATE#"=> $arResult["DATE_INSERT_FORMATED"]
												))?>. <?
												if ($arResult['CANCELED'] !== 'Y')
												{
													echo htmlspecialcharsbx($arResult["STATUS"]["NAME"]);
												}
												else
												{
													echo Loc::getMessage('SPOD_ORDER_CANCELED');
												}
												?></strong>
						<?=Loc::getMessage('SPOD_ORDER_PRICE_FULL')?>: <?=$arResult["PRICE_FORMATED"]?>
					</div>
				</div>
				<?
				// ОПЛАТА
				foreach ($arResult['PAYMENT'] as $payment)
				{
					?>
					<div class="block-payment clearfix">
						<div class="block-left">
							<strong class="title"><?
											$paymentData[$payment['ACCOUNT_NUMBER']] = array(
												"payment" => $payment['ACCOUNT_NUMBER'],
												"order" => $arResult['ACCOUNT_NUMBER'],
												"allow_inner" => $arParams['ALLOW_INNER'],
												"only_inner_full" => $arParams['ONLY_INNER_FULL']
											);
											$paymentSubTitle = Loc::getMessage('SPOD_TPL_BILL')." ".Loc::getMessage('SPOD_NUM_SIGN').$payment['ACCOUNT_NUMBER'];
											if(isset($payment['DATE_BILL']))
											{
												$paymentSubTitle .= " ".Loc::getMessage('SPOD_FROM')." ".$payment['DATE_BILL']->format($arParams['ACTIVE_DATE_FORMAT']);
											}
											$paymentSubTitle .=".";
											echo htmlspecialcharsbx($paymentSubTitle);
											?> <?=$payment['PAY_SYSTEM_NAME']?></strong>
							<?= Loc::getMessage('SPOD_ORDER_PRICE_BILL')?>: <?=$payment['PRICE_FORMATED']?>
							<?
							if (!empty($payment['CHECK_DATA']))
							{
								$listCheckLinks = "";
								foreach ($payment['CHECK_DATA'] as $checkInfo)
								{
									$title = Loc::getMessage('SPOD_CHECK_NUM', array('#CHECK_NUMBER#' => $checkInfo['ID']))." - ". htmlspecialcharsbx($checkInfo['TYPE_NAME']);
									if (strlen($checkInfo['LINK']) > 0)
									{
										$link = $checkInfo['LINK'];
										$listCheckLinks .= "<div><a href='$link' target='_blank'>$title</a></div>";
									}
								}
								if (strlen($listCheckLinks) > 0)
								{
									?>
									<strong class="title"><?= Loc::getMessage('SPOD_CHECK_TITLE')?>:</span>
									<?=$listCheckLinks?>
									<?
								}
							}
							?>
						</div>
						<span class="status"><?/*
											if ($payment['PAID'] === 'Y')
											{
												echo Loc::getMessage('SPOD_PAYMENT_PAID');
											}
											elseif ($arResult['IS_ALLOW_PAY'] == 'N')
											{
												echo Loc::getMessage('SPOD_TPL_RESTRICTED_PAID');
											}
											else
											{
												echo Loc::getMessage('SPOD_PAYMENT_UNPAID');
											}*/
											?></span>
						<?
						if ($payment['PAY_SYSTEM']["IS_CASH"] !== "Y")
						{
							if ($payment['PAY_SYSTEM']['PSA_NEW_WINDOW'] === 'Y' && $arResult["IS_ALLOW_PAY"] !== "N")
							{
								?>
								<a class="button"
								   target="_blank"
								   href="<?=htmlspecialcharsbx($payment['PAY_SYSTEM']['PSA_ACTION_FILE'])?>">
									<?= Loc::getMessage('SPOD_ORDER_PAY') ?>
								</a>
								<?
							}
						}
						?>
					</div>
					<?
				}
				?>
			</div>	
			<div class="block-info">
				<h3><?= Loc::getMessage('SPOD_ORDER_SHIPMENT') ?></h3>	
			<?
			// ДОСТАВКА
			if (count($arResult['SHIPMENT']))
			{
				
				foreach ($arResult['SHIPMENT'] as $shipment)
				{
					?>
					<div class="block-payment clearfix">
						<div class="block-left">
							<strong class="title"><?
								//change date
								if (!strlen($shipment['PRICE_DELIVERY_FORMATED']))
								{
									$shipment['PRICE_DELIVERY_FORMATED'] = 0;
								}
								$shipmentRow = Loc::getMessage('SPOD_SUB_ORDER_SHIPMENT')." ".Loc::getMessage('SPOD_NUM_SIGN').$shipment["ACCOUNT_NUMBER"];
								if ($shipment["DATE_DEDUCTED"])
								{
									$shipmentRow .= " ".Loc::getMessage('SPOD_FROM')." ".$shipment["DATE_DEDUCTED"]->format($arParams['ACTIVE_DATE_FORMAT']);
								}
								$shipmentRow = htmlspecialcharsbx($shipmentRow);
								$shipmentRow .= ". ".Loc::getMessage('SPOD_SUB_PRICE_DELIVERY', array(
										'#PRICE_DELIVERY#' => $shipment['PRICE_DELIVERY_FORMATED']
									));
								echo $shipmentRow;
							?></strong>
							<strong class="title">					
							<?
								if (strlen($shipment["DELIVERY_NAME"]))
								{
									echo Loc::getMessage('SPOD_ORDER_DELIVERY')?>: <?= htmlspecialcharsbx($shipment["DELIVERY_NAME"]);
								}
							?>
							</strong>
							<?= Loc::getMessage('SPOD_ORDER_TRACKING_NUMBER')?>:<?= htmlspecialcharsbx($shipment['TRACKING_NUMBER'])?>
						</div>
						<span class="status">
						<?= htmlspecialcharsbx($shipment['STATUS_NAME'])?>
						</span>
						
					</div>
					<?
				}
			}
			?>
			</div>
			<div class="block-info">
				<h3><?= Loc::getMessage('SPOD_ORDER_BASKET')?></h3>
				<ul class="cart-list">
				<?
				foreach ($arResult['BASKET'] as $basketItem)
				{
					?>
					<li>
						<div class="table-cell visual-cell">
							<a class="visual" href="<?=$basketItem['DETAIL_PAGE_URL']?>">
								<?
								if (strlen($basketItem['PICTURE']['SRC']))
								{
									$imageSrc = $basketItem['PICTURE']['SRC'];
								}
								else
								{
									$imageSrc = $this->GetFolder().'/images/no_photo.png';
								}
								?>
								<img src="<?=$imageSrc?>" alt="<?=htmlspecialcharsbx($basketItem['NAME'])?>"/>
							</a>
						</div>
						<div class="tablet-block">
							<div class="table-cell text-block">
								<!--<span class="article">Артикул: 2N-CMNBH</span>-->
								<strong class="title"><a title="<?=htmlspecialcharsbx($basketItem['NAME'])?>" href="<?=$basketItem['DETAIL_PAGE_URL']?>"><?=htmlspecialcharsbx($basketItem['NAME'])?></a></strong>
								<!--Производитель: <a href="">Legrand</a>-->
							</div>
							<div class="table-cell">
								<div class="col-inner">
									<span class="hidden-text"><?= Loc::getMessage('SPOD_PRICE')?>: </span> <span><?=$basketItem['BASE_PRICE_FORMATED']?></span>
								</div>
							</div>
							<div class="table-cell qty">
								<div class="col-inner">
									<?= Loc::getMessage('SPOD_QUANTITY')?>: <?=$basketItem['QUANTITY']?>&nbsp;<?
									if (strlen($basketItem['MEASURE_NAME']))
									{
										echo htmlspecialcharsbx($basketItem['MEASURE_NAME']);
									}
									else
									{
										echo Loc::getMessage('SPOD_DEFAULT_MEASURE');
									}
									?>
								</div>
							</div>
							<div class="table-cell">
								<div class="col-inner">
									<span class="hidden-text"><?= Loc::getMessage('SPOD_ORDER_PRICE')?>: </span> <span class="sum"><?=$basketItem['FORMATED_SUM']?></span>
								</div>
							</div>
						</div>
					</li>
				<?
				}
				?>
				</ul>
			</div>
			<div class="cart-total">
				<?if($arResult['PRICE_DELIVERY'] > 0):?><span class="sum-block"><?= Loc::getMessage('SPOD_DELIVERY')?>: <?= $arResult["PRICE_DELIVERY_FORMATED"] ?></span><?endif;?>
				<?if($arResult['DISCOUNT_VALUE'] > 0):?><span class="discount-block"><?= Loc::getMessage('SPOD_DISCOUNT') ?>: <?=number_format($arResult["DISCOUNT_VALUE"], 2, ',', ' ')?> <?= Loc::getMessage('RUB')?></span><?endif;?>
				<strong class="total-sum"><?= Loc::getMessage('SPOD_COMMON_SUM')?>: <?=$arResult['PRICE_FORMATED']?></strong>
			</div>
		</div>
	</div>
<?
}
?>


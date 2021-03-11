<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);

echo "<pre>"; print_r($arResult); echo "</pre>";

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}
	$component = $this->__component;
	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}

}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	if (!count($arResult['ORDERS']))
	{
		if ($_REQUEST["filter_history"] == 'Y')
		{
			if ($_REQUEST["show_canceled"] == 'Y')
			{
				?>
				<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER')?></h3>
				<?
			}
			else
			{
				?>
				<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST')?></h3>
				<?
			}
		}
		else
		{
			?>
			<h3><?= Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></h3>
			<?
		}
	}
	?>
	
	
	<?

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$paymentChangeData = array();
		$orderHeaderStatus = null;
		
		foreach ($arResult['ORDERS'] as $key => $order)
		{
			?>
			<div class="history-item open-close<?=($key==0)?" first":""?>">
				<div class="opener">
					<div class="heading">
						<strong class="title"><?=Loc::getMessage('SPOL_TPL_ORDER')?> <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?></strong>
						<strong><?=$order['ORDER']['DATE_INSERT']->format($arParams['ACTIVE_DATE_FORMAT'])?></strong>
						<strong><?=count($order['BASKET_ITEMS']);?>
							<?
							$count = count($order['BASKET_ITEMS']) % 10;
							if ($count == '1')
							{
								echo Loc::getMessage('SPOL_TPL_GOOD');
							}
							elseif ($count >= '2' && $count <= '4')
							{
								echo Loc::getMessage('SPOL_TPL_TWO_GOODS');
							}
							else
							{
								echo Loc::getMessage('SPOL_TPL_GOODS');
							}
							?></strong>
						<strong><?=Loc::getMessage('SPOL_TPL_SUMOF')?> <span class="text-orange"><?=$order['ORDER']['FORMATED_PRICE']?></span></strong>
					</div>
					<div class="block-info">
						<h3><?=Loc::getMessage('ORDER_INFO')?></h3>
						<div class="clearfix">
							<div class="column">
								<strong class="title">Ф.И.О.</strong>
								Константиновский Олег Дмитриевич
							</div>
							<div class="column">
								<strong class="title">Текущий статус</strong>
								Ожидает оплаты
							</div>
							<div class="column">
								<strong class="title">Сумма</strong>
								20 000 Р.
							</div>
						</div>
					</div>
				</div>
				<div class="slide-block">
					<div class="block-info">
						<h3>Параметры оплаты</h3>
						<div class="block-payment clearfix">
							<div class="block-left">
								<strong class="title">Заказ №3, 28.03.2017. Оплачен, готов к отправке</strong>
								Сумма заказа: 20 000 Р.
							</div>
						</div>
						<div class="block-payment clearfix">
							<div class="block-left">
								<strong class="title">Счет №3 от 28.03.2017. Наличные курьеру</strong>
								Сумма к оплате: 20 000 Р.
							</div>
							<span class="status">Ожидает оплаты</span>
							<button class="button" type="button">Оплатить</button>
						</div>
					</div>
					<div class="block-info">
						<h3>Содержание заказа</h3>
						<ul class="cart-list">
							<li>
								<div class="table-cell visual-cell">
									<a class="visual" href="">
										<img src="images/img12.jpg" alt=""/>
									</a>
								</div>
								<div class="tablet-block">
									<div class="table-cell text-block">
										<span class="article">Артикул: 2N-CMNBH</span>
										<strong class="title"><a title="" href="">Legrand LCS Кабель
											UTP кат.5е PVC</a></strong>
										Производитель: <a href="">Legrand</a>
									</div>
									<div class="table-cell">
										<div class="col-inner">
											<span class="hidden-text">Цена: </span> <span>10 000 Р</span>
										</div>
									</div>
									<div class="table-cell qty">
										<div class="col-inner">
											Количество: 5
										</div>
									</div>
									<div class="table-cell">
										<div class="col-inner">
											<span class="hidden-text">Итого: </span> <span class="sum">50 000 Р</span>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="table-cell visual-cell">
									<a class="visual" href="">
										<img src="images/img13.jpg" alt=""/>
									</a>
								</div>
								<div class="tablet-block">
									<div class="table-cell text-block">
										<span class="article">Артикул: 2N-CMNBH</span>
										<strong class="title"><a title="" href="">Legrand LCS Кабель
											UTP кат.5е PVC</a></strong>
										Производитель: <a href="">Legrand</a>
									</div>
									<div class="table-cell">
										<div class="col-inner">
											<span class="hidden-text">Цена: </span> <span>100 000 Р</span>
										</div>
									</div>
									<div class="table-cell qty">
										<div class="col-inner">
											Количество: 125
										</div>
									</div>
									<div class="table-cell">
										<div class="col-inner">
											<span class="hidden-text">Итого: </span> <span class="sum">500 000 Р</span>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="table-cell visual-cell">
									<a class="visual" href="">
										<img src="images/img12.jpg" alt=""/>
									</a>
								</div>
								<div class="tablet-block">
									<div class="table-cell text-block">
										<span class="article">Артикул: 2N-CMNBH</span>
										<strong class="title"><a title="" href="">Legrand LCS Кабель
											UTP кат.5е PVC</a></strong>
										Производитель: <a href="">Legrand</a>
									</div>
									<div class="table-cell">
										<div class="col-inner">
											<span class="hidden-text">Цена: </span> <span>10 000 Р</span>
										</div>
									</div>
									<div class="table-cell qty">
										<div class="col-inner">
											Количество: 5
										</div>
									</div>
									<div class="table-cell">
										<div class="col-inner">
											<span class="hidden-text">Итого: </span> <span class="sum">50 000 Р</span>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="cart-total">
						<span class="sum-block">Доставка: 500 Р</span>
						<span class="discount-block">Скидка: 0 Р</span>
						<strong class="total-sum">Итого: 24 040 Р</strong>
					</div>
				</div>
			</div>

			<?
		}
	}
	else
	{
		$orderHeaderStatus = null;

		if ($_REQUEST["show_canceled"] === 'Y' && count($arResult['ORDERS']))
		{
			?>
			<h1 class="sale-order-title">
				<?= Loc::getMessage('SPOL_TPL_ORDERS_CANCELED_HEADER') ?>
			</h1>
			<?
		}

		foreach ($arResult['ORDERS'] as $key => $order)
		{
			if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $_REQUEST["show_canceled"] !== 'Y')
			{
				$orderHeaderStatus = $order['ORDER']['STATUS_ID'];
				?>
				<h1 class="sale-order-title">
					<?= Loc::getMessage('SPOL_TPL_ORDER_IN_STATUSES') ?> &laquo;<?=htmlspecialcharsbx($arResult['INFO']['STATUS'][$orderHeaderStatus]['NAME'])?>&raquo;
				</h1>
				<?
			}
			?>
			<div class="col-md-12 col-sm-12 sale-order-list-container">
				<div class="row">
					<div class="col-md-12 col-sm-12 sale-order-list-accomplished-title-container">
						<div class="row">
							<div class="col-md-8 col-sm-12 sale-order-list-accomplished-title-container">
								<h2 class="sale-order-list-accomplished-title">
									<?= Loc::getMessage('SPOL_TPL_ORDER') ?>
									<?= Loc::getMessage('SPOL_TPL_NUMBER_SIGN') ?>
									<?= htmlspecialcharsbx($order['ORDER']['ACCOUNT_NUMBER'])?>
									<?= Loc::getMessage('SPOL_TPL_FROM_DATE') ?>
									<?= $order['ORDER']['DATE_INSERT'] ?>,
									<?= count($order['BASKET_ITEMS']); ?>
									<?
									$count = substr(count($order['BASKET_ITEMS']), -1);
									if ($count == '1')
									{
										echo Loc::getMessage('SPOL_TPL_GOOD');
									}
									elseif ($count >= '2' || $count <= '4')
									{
										echo Loc::getMessage('SPOL_TPL_TWO_GOODS');
									}
									else
									{
										echo Loc::getMessage('SPOL_TPL_GOODS');
									}
									?>
									<?= Loc::getMessage('SPOL_TPL_SUMOF') ?>
									<?= $order['ORDER']['FORMATED_PRICE'] ?>
								</h2>
							</div>
							<div class="col-md-4 col-sm-12 sale-order-list-accomplished-date-container">
								<?
								if ($_REQUEST["show_canceled"] !== 'Y')
								{
									?>
									<span class="sale-order-list-accomplished-date">
										<?= Loc::getMessage('SPOL_TPL_ORDER_FINISHED')?>
									</span>
									<?
								}
								else
								{
									?>
									<span class="sale-order-list-accomplished-date canceled-order">
										<?= Loc::getMessage('SPOL_TPL_ORDER_CANCELED')?>
									</span>
									<?
								}
								?>
								<span class="sale-order-list-accomplished-date-number"><?= $order['ORDER']['DATE_STATUS_FORMATED'] ?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 sale-order-list-inner-accomplished">
						<div class="row sale-order-list-inner-row">
							<div class="col-md-3 col-sm-12 sale-order-list-about-accomplished">
								<a class="sale-order-list-about-link" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>">
									<?=Loc::getMessage('SPOL_TPL_MORE_ON_ORDER')?>
								</a>
							</div>
							<div class="col-md-3 col-md-offset-6 col-sm-12 sale-order-list-repeat-accomplished">
								<a class="sale-order-list-repeat-link sale-order-link-accomplished" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>">
									<?=Loc::getMessage('SPOL_TPL_REPEAT_ORDER')?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?
		}
	}
	?>
	<div class="clearfix"></div>
	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"paymentList" => $paymentChangeData
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
		</script>
		<?
	}
}
?>

<?
if ( !defined( 'B_PROLOG_INCLUDED' ) || B_PROLOG_INCLUDED !== true ) die();
?>


<? if ( !empty( $arResult['ITEMS']['AnDelCanBuy'] ) ): ?>

	<div class="cart-nav-panel clearfix">

		<?/*?>
		<ul class="cart-sub-nav">
			<li><a title="Корзина" <? if ( $_GET['delay'] != 'y' ): ?>class="active"<? endif; ?> href="/personal/basket.php">Корзина</a></li>
			<li><a title="Отложенные" <? if ( $_GET['delay'] == 'y' ): ?>class="active"<? endif; ?> href="/personal/basket.php?delay=y">Отложенные</a></li>
		</ul>
		<?*/?>
		
		
		<div class="right-block popup-holder">
			<?/*?>
			<a class="open" href="">Дополнительно</a>
			<div class="popup">
				<div class="popup-inner">
					<ul class="cart-tools">
						<li><a class="download" title="Скачать excel файл" href="javascript:;">Скачать excel файл</a></li>
						<li><a class="mail" title="Отправить на почту" href="javascript:;">Отправить на почту</a></li>
						<li><a class="phone lightbox-open" href="#call-manager">Связаться с менеджером</a></li>
					</ul>
				</div>
			</div>
			<?*/?>
			<a class="link-clear" href="javascript:;" id="clear-basket">Очистить корзину</a>
		</div>
		
	</div>

<? endif; ?>



<?
if ( $_GET['delay'] != 'y' )
{
	require( 'basket_items.php' );
}
else
{
	require( 'basket_items_delay.php' );
}
?>
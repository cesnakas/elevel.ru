<?
if ( !defined( 'B_PROLOG_INCLUDED' ) || B_PROLOG_INCLUDED !== true ) die();
?>


<? if ( !empty( $arResult['ITEMS']['AnDelCanBuy'] ) ): ?>

	<div class="cart-nav-panel clearfix">

		<?/*?>
		<ul class="cart-sub-nav">
			<li><a title="�������" <? if ( $_GET['delay'] != 'y' ): ?>class="active"<? endif; ?> href="/personal/basket.php">�������</a></li>
			<li><a title="����������" <? if ( $_GET['delay'] == 'y' ): ?>class="active"<? endif; ?> href="/personal/basket.php?delay=y">����������</a></li>
		</ul>
		<?*/?>
		
		
		<div class="right-block popup-holder">
			<?/*?>
			<a class="open" href="">�������������</a>
			<div class="popup">
				<div class="popup-inner">
					<ul class="cart-tools">
						<li><a class="download" title="������� excel ����" href="javascript:;">������� excel ����</a></li>
						<li><a class="mail" title="��������� �� �����" href="javascript:;">��������� �� �����</a></li>
						<li><a class="phone lightbox-open" href="#call-manager">��������� � ����������</a></li>
					</ul>
				</div>
			</div>
			<?*/?>
			<a class="link-clear" href="javascript:;" id="clear-basket">�������� �������</a>
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
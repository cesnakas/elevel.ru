<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>
<??>
<? $cart_empty = ($arResult['NUM_PRODUCTS'] > 0 ? false : true); ?>

<div class="block-cart <?if (!$cart_empty):?>full<?endif;?>">
	<a title="�������" class="link-cart" href="<?=$arParams['PATH_TO_BASKET']?>">
		<?if ($arResult['NUM_PRODUCTS'] > 0):?>
			������� (<?=$arResult['NUM_PRODUCTS']?>)<br/>
			<?=(($arResult['TOTAL_PRICE']>0)?$arResult['TOTAL_PRICE']:"")?>
		<?else:?>
			� ������� ��� �������
		<?endif;?>
	</a>
</div>
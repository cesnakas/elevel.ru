<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<? $cart_empty = ($arResult['NUM_PRODUCTS'] > 0 ? false : true); ?>

<div class="block-cart <?if (!$cart_empty):?>popup-active<?endif;?>">
	<a title="�������" class="open" href="<?=$arParams['PATH_TO_BASKET']?>">�������</a>
</div>
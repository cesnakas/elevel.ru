<?
$coupon = htmlspecialchars( $_POST['COUPON'] );

if ( $coupon )
{
	require( $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php' );

	CModule::IncludeModule( 'catalog' );
    \Bitrix\Sale\DiscountCouponsManager::clear(true);
    $check = \Bitrix\Sale\DiscountCouponsManager::isExist($coupon);
    if($check["ID"]>0):

        \Bitrix\Sale\DiscountCouponsManager::add($coupon);

        $basket  = \Bitrix\Sale\Basket::loadItemsForFUser(
            \Bitrix\Sale\Fuser::getId(),
            \Bitrix\Main\Context::getCurrent()->getSite()
        );

        $discounts  = \Bitrix\Sale\Discount::loadByBasket( $basket );
        $discounts ->calculate();
        $discountResult  =  $discounts ->getApplyResult();

        //получаем размер купона
        $discountId = \Bitrix\Sale\DiscountCouponsManager::getData($coupon)['DISCOUNT_ID'];
        $sale = $discountResult['FULL_DISCOUNT_LIST'][$discountId]['SHORT_DESCRIPTION_STRUCTURE']['VALUE'];

        $price = htmlspecialchars( $_POST['PRICE'] );

        $sale3 = 3000;
        $sale7 = 7000;
        $sale10 = 10000;
        $sale15 = 15000;
        switch ($price):
            case ($price > $sale3) && ($price < $sale7):
                if($sale < 3):
                    \Bitrix\Sale\DiscountCouponsManager::clear(true);
                    echo 'ok';
                endif;
                break;
            case ($price > $sale7) && ($price < $sale10):
                if($sale < 7):
                    \Bitrix\Sale\DiscountCouponsManager::clear(true);
                    echo 'ok';
                endif;
                break;
            case ($price > $sale10) && ($price < $sale15):
                if($sale < 10):
                    \Bitrix\Sale\DiscountCouponsManager::clear(true);
                    echo 'ok';
                endif;
                break;
            case $price > $sale15:
                if($sale < 15):
                    \Bitrix\Sale\DiscountCouponsManager::clear(true);
                    echo 'ok';
                endif;
                break;
            default:
                $basket ->refreshData( array ( 'PRICE' ,  'COUPONS' ));
                $basket->save();
        endswitch;
	else:
        echo 'error';
	endif;
}
?>
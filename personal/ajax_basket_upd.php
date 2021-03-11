<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<div id="basket">
	<?$APPLICATION->IncludeComponent(
    "tezart:sale.basket.basket", 
    "tezart_newlevel_cart", 
    array(
        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
        "COLUMNS_LIST" => array(
            0 => "NAME",
            1 => "DISCOUNT",
            2 => "WEIGHT",
            3 => "PROPS",
            4 => "DELETE",
            5 => "DELAY",
            6 => "TYPE",
            7 => "PRICE",
            8 => "QUANTITY",
            9 => "PROPERTY_MANUFACTURER",
            10 => "PROPERTY_MORE_PHOTO",
        ),
        "PATH_TO_ORDER" => "/personal/order.php",
        "HIDE_COUPON" => "Y",
        "QUANTITY_FLOAT" => "N",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "SET_TITLE" => "Y",
        "USE_PREPAYMENT" => "N",
        "ACTION_VARIABLE" => "action"
    ),
    false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?//if($_SERVER["REMOTE_ADDR"] == "62.76.12.88"):?>
<?
$id = intval($_REQUEST["id"]);
CModule::IncludeModule('sale');

unset($_REQUEST["BasketOrder"]);
if ($id > 0)
{
    $dbBasketItems = CSaleBasket::GetList(
        array("ID" => "ASC"),
        array(
            "FUSER_ID" => CSaleBasket::GetBasketUserID(),
            "LID" => SITE_ID,
            "ORDER_ID" => "NULL",
            "ID" => $id,
        ),
        false,
        false,
        array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "DELAY", "CAN_BUY", "CURRENCY")
    );
    $arItem = $dbBasketItems->Fetch();
    if ($arItem)
    {
        CSaleBasket::Delete($arItem["ID"]);            
    }
}
?>
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

<?/*else:?>
<div id="basket">
        <?$APPLICATION->IncludeComponent(
    "tezart:sale.basket.basket", 
    "cart", 
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
<?endif*/?>
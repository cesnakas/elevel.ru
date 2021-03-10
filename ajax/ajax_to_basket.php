<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if(!empty($_REQUEST["elements_to_basket"]))
    //товары добавляем в корзину
    if (CModule::IncludeModule("catalog"))
    {
        foreach($_REQUEST["elements_to_basket"] as $key=>$arBasketNewEl){
            if($key%2 == 0){
                Add2BasketByProductID($_REQUEST["elements_to_basket"][$key], $_REQUEST["elements_to_basket"][$key+1], array(), array());
            }              
        }
    }
?>   
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
<?
$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
        array(
                "DATE_UPDATE" => "DESC"
            ),
        array(
                // "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                // "<DATE_INSERT" => "2017-04-22",
                "ORDER_ID" => "NULL"
            ),
        false,
        false,//array("nTopCount"=>10),
        array("ID", "CALLBACK_FUNC", "MODULE", 
              "PRODUCT_ID", "QUANTITY", "DELAY", 
              "CAN_BUY", "PRICE", "WEIGHT")
    );
while ($arItems = $dbBasketItems->Fetch())
{
    if (strlen($arItems["CALLBACK_FUNC"]) > 0)
    {
        CSaleBasket::UpdatePrice($arItems["ID"], 
                                 $arItems["CALLBACK_FUNC"], 
                                 $arItems["MODULE"], 
                                 $arItems["PRODUCT_ID"], 
                                 $arItems["QUANTITY"]);
        $arItems = CSaleBasket::GetByID($arItems["ID"]);
    }
    $arPrice = CCatalogProduct::GetOptimalPrice($arItems["PRODUCT_ID"], 1, $USER->GetUserGroupArray());

    if($arPrice["DISCOUNT_PRICE"]!=""){
    	$newprice=$arPrice["DISCOUNT_PRICE"];
    }else $newprice=$arItems["PRICE"];
    $arFieldsList = array(
       "PRICE" => $newprice
    );
  echo "<pre>ID=";print_r($arItems["ID"]);echo "</pre>";
     CSaleBasket::Update($arItems["ID"], $arFieldsList);

    // $arBasketItems[] = $arItems;
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?>

<?
CModule::IncludeModule("iblock");
CModule::IncludeModule("sale");
CModule::IncludeModule("currency");
CModule::IncludeModule("catalog");

$ID = 52;

$arOrder = CSaleOrder::GetByID($ID);

$GoodsList = '';
$dbBasket = CSaleBasket::GetList(
		array("NAME" => "ASC"),
		array("ORDER_ID" => $ID),
		false,
		false,
		array("ID", "NAME", "QUANTITY", "PRICE", "CURRENCY", "PRODUCT_ID")
);
print_r($dbBasket);
	while ($arBasket = $dbBasket->Fetch())
	{
		$rec = GetIBlockElement($arBasket['PRODUCT_ID']);
		$GoodsList .= $arBasket['NAME'].', '.$rec['PROPERTIES']['ARTICUL']['VALUE'].', '. CurrencyFormat($arBasket['PRICE'],$arBasket['CURRENCY']).', '.$arBasket['QUANTITY'].' шт.<br />';
	}

echo $GoodsList;
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
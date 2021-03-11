<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
 
<?
CModule::IncludeModule("sale");
CModule::IncludeModule("catalog");

if($_REQUEST["elemid"]){
	if(isset($_REQUEST["quant"]) && intval($_REQUEST["quant"]) > 0)
	{
		CSaleBasket::Update($_REQUEST["elemid"], array("QUANTITY" => intval($_REQUEST["quant"])));
	}
	elseif($_REQUEST["act"] == "del")
	{
		CSaleBasket::Update($_REQUEST["elemid"], array("QUANTITY" => 1));
		CSaleBasket::Delete($_REQUEST["elemid"]);	
	}

	$dbBasketItems = CSaleBasket::GetList(
		array("PRICE" => "DESC"),
		array(
				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID" => SITE_ID,
				"ORDER_ID" => "NULL"
			),
		false,
		false,
		array("ID", "CALLBACK_FUNC", "MODULE", "PRODUCT_ID", "QUANTITY", "DELAY", "CAN_BUY", "CURRENCY", 'PRICE')
	);
	
	$sum = 0;
	while ($arBasketItems = $dbBasketItems->Fetch())
	{
		$sum += $arBasketItems['PRICE'] * $arBasketItems['QUANTITY'];
	}	

	$res['SUM'] = $sum;
	$res['SUM_FORMATED'] = number_format($sum, 0,'', '');
	
	echo json_encode($res);
}?>
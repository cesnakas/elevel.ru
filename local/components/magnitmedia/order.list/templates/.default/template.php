<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!empty($arResult)){
	
	foreach($arResult as $key=>$ORDER_ID){
		
		$APPLICATION->IncludeComponent("bitrix:sale.personal.order.detail", ".default", array(
			"ID" => $ORDER_ID,
			"key" => $key
				),
				$component
			);	
	}
}
else{
	
}

?>
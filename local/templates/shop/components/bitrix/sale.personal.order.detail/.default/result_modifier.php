<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// $arBasketIDs = array();

// foreach ($arResult['BASKET'] as $basketItem){
	// $arBasketIDs[] = $basketItem["ID"];
// }

// if(!empty($arBasketIDs)){
	
	// $arSelect = Array("ID", "DATE_ACTIVE_FROM");
	// $arFilter = Array("IBLOCK_ID"=>IntVal($yvalue), "ID" => $arBasketIDs);
	// $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	// while($ob = $res->GetNextElement())
	// {
	 // $arFields = $ob->GetFields();
	 // print_r($arFields);
	// }
	// $dbBasketProps = CSaleBasket::GetPropsList(
					// array("SORT" => "ASC", "ID" => "DESC"),
			// array(
					// // "BASKET_ID" => $arBasketIDs,
					// "BASKET_ID" => $basketItem["ID"],
					// "!CODE" => array("CATALOG.XML_ID", "PRODUCT.XML_ID")
				// ),
			// false,
			// false,
			// array()
			// //array("ID", "BASKET_ID", "NAME", "VALUE", "CODE", "SORT")
	// );
	// while($arBasketProps = $dbBasketProps->GetNext())
	// {
		// echo "<pre>"; print_r($arBasketProps); echo "</pre>";
	// }
// }
?>
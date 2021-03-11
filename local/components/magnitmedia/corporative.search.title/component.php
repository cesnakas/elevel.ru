<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentName */
/** @var string $componentPath */
/** @var string $componentTemplate */
/** @var string $parentComponentName */
/** @var string $parentComponentPath */
/** @var string $parentComponentTemplate */
$this->setFrameMode(false);
CModule::IncludeModule("iblock");
CModule::IncludeModule("sale");
if(!CModule::IncludeModule("search"))
{
	ShowError(GetMessage("SEARCH_MODULE_UNAVAILABLE"));
	return;
}

$catalogResultCount = 3;
$otherResultCount = 12;

$q = htmlspecialcharsbx($_REQUEST["q"]);
$category = htmlspecialcharsbx($_REQUEST["cat"]);

// foreach($_REQUEST as $key => $value){
	// //$_REQUEST[$key] = iconv("UTF-8","Windows-1251",htmlspecialcharsbx($_REQUEST[$key]));
// }


$arIblockOtherId = array(
	COMPANY_NEWS_IBLOCK_ID, // 2 Новости компании
	NEW_IBLOCK_ID, // 6 Новинки
	ACTIONS_IBLOCK_ID, // 7 Акции
	VACANCY_IBLOCK_ID, // 9 Вакансии
	CLIENT_REVIEWS_IBLOCK_ID, // 37 Клиенты и отзывы
	OFFICES_CONTACTS_IBLOCK_ID, // 60 Офисы (контакты)	
);

$arIblockCatalogId = array(
	CATALOG_ID // 83 Каталог
);

$arIblockId = array_merge($arIblockOtherId, $arIblockCatalogId);

if (($q != "") && ($category == '0' || $category == '1'))
{
	
	// Get all iblocks 
	$obCache = new CPHPCache;
		
	if($obCache->StartDataCache(108000, md5(serialize($arIblockId)), "/corporative.search.title/"))
	{

		$rsIblock = CIBlock::GetList(
			Array(), 
			Array(
				'SITE_ID' => SITE_ID, 
				'ID' => $arIblockId
			), true
		);
		while($arIblock = $rsIblock->Fetch())
		{
			$arResult['IBLOCK'][$arIblock['ID']] = $arIblock;
		}
		
		$obCache->EndDataCache($arResult['IBLOCK']);
	}
	else
	{
		$arResult['IBLOCK'] = $obCache->GetVars();
	}
	
	// OTHER SEARCH
	$arResult["SEARCH"] = array();
	
	$module_id = "iblock";
	$param1="";
	$obSearch = new CSearch();	
	$obSearch->Search(
		array
		(
			"QUERY"     => $q,
			"SITE_ID"   => LANG,
			"PARAM2"    => $arIblockOtherId,
			"MODULE_ID" => $module_id,
			"CHECK_DATES" => "Y"	
		)
	);
	$obSearch->NavStart($otherResultCount, false);
	while ($obSearchItems = $obSearch->GetNext()){
		
		$arResult["SEARCH"]['OTHER'][$obSearchItems["PARAM2"]]["ITEMS"][] = $obSearchItems;

		
		// if ($arKey > 0)
		// {
			
			// $result = CIBlock::GetByID($arKey);	
			// if ($iblock = $result->GetNext()){				
				// $arResult["SEARCH"][$arKey]["IBLOCK_NAME"] = $iblock["NAME"];
				// $arResult["SEARCH"][$arKey]["IBLOCK_ID"] = $iblock["ID"];
			// }
		// }
		
	}
	$arResult["OTHER_COUNT"] = $obSearch->NavRecordCount;
	// $arResult["SEARCH"]['OTHER']['COUNT'] += 1;
	
	// CATALOG SEARCH
	$arProductId = array();
	$obSearch = new CSearch();	
	$obSearch->Search(
		array
		(
			"QUERY"     => $q,
			"SITE_ID"   => LANG,
			"PARAM2"    => $arIblockCatalogId,
			"!ITEM_ID" => "S%",
			"MODULE_ID" => $module_id,
			"CHECK_DATES" => "Y"	
		)
	);
	$obSearch->NavStart($catalogResultCount, false);
	while ($obSearchItems = $obSearch->GetNext()){
		
		$arResult["SEARCH"]['CATALOG']["ITEMS"][] = $obSearchItems;
		$arProductId[] = $obSearchItems['ITEM_ID'];
		
	}
	$arResult["CATALOG_COUNT"] = $obSearch->NavRecordCount;
	
	// get additional product info
	if(!empty($arProductId)){
		
		$PictureWidth = 62;
		$PictureHeight = 62;
		
		$arResult['PRODUCTS'] = array();
		$arFilter = Array(
			// "IBLOCK_ID"=>$arElement["IBLOCK_ID"], 
			"ID" => $arProductId
		);
		$arSelect = array(
			"ID",
			'DETAIL_PICTURE',
			"DETAIL_PAGE_URL"
		);
		
		$rsElement = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($arElement = $rsElement->GetNext()){ 
			
			
			if (!empty($arElement["DETAIL_PICTURE"])):
				$arElement['PICTURE'] = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"], array('width'=>$PictureWidth, 'height'=>$PictureHeight), BX_RESIZE_IMAGE_PROPORTIONAL, true);	
				
				//$arFile = CFile::GetFileArray($ob["DETAIL_PICTURE"]);
			endif;
			
			$arPrice = CPrice::GetBasePrice($arElement['ID']);
			$arElement['PRICE'] = $arPrice['PRICE'];
			
			$arResult['PRODUCTS'][$arElement['ID']] = $arElement;
		}
		
	}
	
	
	$arResult["QUERY"] = $q;

	// echo "<pre>"; print_r($arResult); echo "</pre>";
	$this->IncludeComponentTemplate();
}
?>

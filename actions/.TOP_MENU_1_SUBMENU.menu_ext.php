<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$actionIblockId = CORPORATIV_ACTIONS_IBLOCK_ID;
$aMenuLinksExt = array();

if(!CModule::IncludeModule("iblock"))
	return;

// Объект
$obCache = new CPHPCache();

// Время кеширования
$cacheLifetime = 3600; 

// Идентификатор кеша
$cacheID = $actionIblockId; 

// Директория кеша
$cachePath = '/corp_menu_actions/';


if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) ){
   $aMenuLinksExt = $obCache->GetVars();

   $obCache->Output();
}
elseif( $obCache->StartDataCache()  ){
	
	$arFilter = array(
		'IBLOCK_ID' => $actionIblockId,
		"DEPTH_LEVEL" => 1,
		"CNT_ACTIVE" => "Y",
		"ELEMENT_SUBSECTIONS" => "Y"
	);
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"IBLOCK_TYPE_ID",
		"IBLOCK_SECTION_ID",
		"CODE",
		"DEPTH_LEVEL",
		"NAME",
		"SECTION_PAGE_URL",
	);
	
	$rsSections = CIBlockSection::GetList(array('LEFT_MARGIN' => 'ASC'), $arFilter, true, $arSelect);

	global $CACHE_MANAGER;
	$CACHE_MANAGER->StartTagCache($cachePath);
	
	while ($arSection = $rsSections->GetNext())
	{
		$CACHE_MANAGER->RegisterTag("iblock_id_" . $arSection["IBLOCK_ID"]);
		
		if($arSection['ELEMENT_CNT'] > 0){
			$aMenuLinksExt[] = array(
				htmlspecialcharsbx($arSection["~NAME"]),
				// print_r($arSection, true),
				$arSection["~SECTION_PAGE_URL"],
				array(),
				array(
					"FROM_IBLOCK" => true,
					"IS_PARENT" => false,
					"DEPTH_LEVEL" => $arSection["DEPTH_LEVEL"],
				),
				""
			);
		}
		
	}
	
	$CACHE_MANAGER->EndTagCache();
	
	// Сохранение переменных в кеш
	$obCache->EndDataCache(
		$aMenuLinksExt
	);
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
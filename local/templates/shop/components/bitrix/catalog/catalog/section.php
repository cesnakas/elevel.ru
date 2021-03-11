<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Iblock;

$this->setFrameMode(true);

global $CHANGE_TITLE;
global $ZERO_SECTION_NAME;
$CHANGE_TITLE = "";
$ZERO_SECTION_NAME = "";

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

// провер¤ем, 0-вой ли это раздел
$sections_first_level = array();

if ($arResult["VARIABLES"]["SECTION_CODE_PATH"])
{
	$rs = CIBlockElement::GetList(
	   array(), 
	   array(
		   "IBLOCK_ID" => ZERO_SECTION_IBLOCK_ID,
		   "GLOBAL_ACTIVE" => "Y",
		   "=CODE" => $arResult["VARIABLES"]["SECTION_CODE_PATH"]
	   ),
	   false, 
	   false,
	   array("ID", "NAME", "PROPERTY_SECTIONS_FIRST_LEVEL")
	);

	while($ar = $rs->GetNext())
	{
		$sections_first_level[] = $ar["PROPERTY_SECTIONS_FIRST_LEVEL_VALUE"];
		$section_zero_name = $ar["NAME"];
		$section_zero_id = $ar["ID"];
		$ZERO_SECTION_NAME = $ar["NAME"];
	}
	
	$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(ZERO_SECTION_IBLOCK_ID, $section_zero_id);
	$arResult["IPROPERTY_VALUES"] = $ipropValues->getValues();
	
	if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]){
		$APPLICATION->SetTitle($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]);
		$APPLICATION->SetPageProperty("title", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]);
	}
	
	if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"])
		$APPLICATION->SetPageProperty("description", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]);
	
	

	$meta = getMeta();
	
	if(empty($meta['H1']))
	{
		if($section_zero_name)
			echo "<h1>{$section_zero_name}</h1>";
	}
	else
	{
		// echo "<h1>".$meta['H1']."</h1>";
	}

}

$arFilter = array(
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"ACTIVE" => "Y",
	"GLOBAL_ACTIVE" => "Y",
);

if (count($sections_first_level))
	$arFilter["ID"] = $sections_first_level;
elseif (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
	$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
	$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

if (count($sections_first_level) && $APPLICATION->GetCurDir() != '/shop/search/' )
{
	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSections = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSections = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				while ($arCurSection = $dbRes->Fetch())
					$arCurSections[] = $arCurSection["ID"];
				
				$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				while ($arCurSection = $dbRes->Fetch())
					$arCurSections[] = $arCurSection["ID"];
			}
		}
		$obCache->EndDataCache($arCurSections);
	}
	if (!isset($arCurSections))
		$arCurSections = array();
	?>
	<div class="row">
		<?include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_zero.php");?>
	</div>
	<?
}
else
{
	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock") && (!empty($arFilter['ID']) || !empty($arFilter['=CODE'])) )
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID","NAME"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	
	if (empty($arCurSection)) 	
	{
		//$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{		
			Iblock\Component\Tools::process404(
				'',
				true,
				"Y",
				"Y"				
			);	
		}
		return;	
		//также 404 для фильтра реализована в /local/components/dev/catalog.smart.filter/templates/dev/result_modifier.php
	}
	?>
	<div class="row">
		<?include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_horizontal.php");?>
	</div>
	<?
}
// $APPLICATION->SetTitle($arCurSection['NAME'].GetMessage('CATALOG_SECTION_TITLE1'));
// $APPLICATION->SetPageProperty('title', $arCurSection['NAME'].GetMessage('CATALOG_SECTION_TITLE1'));
// global $CHANGE_DESCRIPTION;
// if(empty($CHANGE_DESCRIPTION))
// {
	// $APPLICATION->SetPageProperty('description', GetMessage('CATALOG_SECTION_BUY').$arCurSection['NAME'].GetMessage('CATALOG_SECTION_TITLE2'));
// }
// else
// {
	// $APPLICATION->SetPageProperty('description', $CHANGE_DESCRIPTION);
// }
// упить #H1# оптом и в розницу в интернет-магазине Ёлевел с доставкой по –оссии. «воните: 8 (800) 555-49-32

if ($CHANGE_TITLE)
{
	//$APPLICATION->SetTitle($CHANGE_TITLE);
	//$APPLICATION->SetPageProperty('title', $CHANGE_TITLE);
	
	// if($USER->IsAdmin()){
		// echo "<pre>"; print_r($CHANGE_TITLE); echo "</pre>";
	// }
	if(isset($_GET["PAGEN_1"])){
		$APPLICATION->SetPageProperty("description", "");
		$APPLICATION->SetPageProperty("keywords", "");
	}
}
?>
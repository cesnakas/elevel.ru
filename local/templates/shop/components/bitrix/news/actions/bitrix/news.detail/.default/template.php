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
$this->setFrameMode(true);
$component->SetResultCacheKeys(array("CACHED_TPL"));

$APPLICATION->SetPageProperty("tags", "элевел, эlevel, elevel, elevel.ru, акции, скидки, спецпредложения, распродажи, снижена цена, электрооборудование, электроустановочные изделия, низковольтное оборудование, кабельно-проводниковая продукция, светотехника, вру");
//$APPLICATION->SetTitle("Акции");
$APPLICATION->SetAdditionalCSS("/css/service.css");

ob_start();
//$APPLICATION->SetTitle($arResult['NAME']);
//$APPLICATION->SetPageProperty("keywords", $arResult["PROPERTIES"]["KEYWORDS"]["VALUE"]);
//$APPLICATION->SetPageProperty("description", $arResult["PROPERTIES"]["DESCRIPTION"]["VALUE"]);
?>
<div class="action-box">
	<div>
		<h1><?=$arResult['NAME']?></h1>
		<?=$arResult['DETAIL_TEXT']?>
	</div>
	<a class="lnk-back" href="/company/actions/" title="Вернуться назад"><i class="tz-icon"></i><span>Вернуться назад</span></a>
	
	#BANNER_DNY#
</div>
<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>
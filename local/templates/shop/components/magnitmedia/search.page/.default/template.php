<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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

$NavRecordCount = $arResult['NAV_RESULT']->NavRecordCount;

global $searchNavString;
$searchNavString = "<div class='ajax_stop_container'>" . $arResult["NAV_STRING"] . "</div>";

?>
<?if(strlen($arResult['REQUEST']['QUERY']) > 0):?>
<h1>Вы искали: <span class="text-orange"><?=strtoupper($arResult['REQUEST']['QUERY'])?></span><?if($NavRecordCount > 0):?><span class="text-gray">&nbsp;(<?=$NavRecordCount?> <?=GetEnding($NavRecordCount, "товаров", "товар", "товара")?>)</span><?endif;?></h1>
<?endif;?>
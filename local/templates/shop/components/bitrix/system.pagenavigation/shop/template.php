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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<ul class="pagination">
	
	<?if ($arResult["NavPageNomer"] > 1):?>
		<li>
			<a class="prev" title="Назад" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Назад</a>
		</li>
	<?endif;?>
	
	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<li><a
					<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>class="active"<?endif;?>
					title="<?=$arResult["nStartPage"]?>" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"
				>
					<?=$arResult["nStartPage"]?>
				</a>
			</li>
		<?else:?>
			<li><a
					<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>class="active"<?endif;?>
					title="<?=$arResult["nStartPage"]?>" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"
				>
					<?=$arResult["nStartPage"]?>
				</a>
			</li>
		<?endif?>

		<?$arResult["nStartPage"]++?>
	<?endwhile?>
	
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<li>
			<a class="next" title="Вперёд" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">Вперёд</a>
		</li>
	<?endif;?>
</ul>
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
?>
<div class="slider-about-box">
	<div class="slider-about">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="text-block">
					<?if ($arItem["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"]):?>
						<h2 class="year text-orange"><?=$arItem["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"]?> ã.</h2>
					<?endif;?>
					
					<?if ($arItem["DISPLAY_PROPERTIES"]["HEADING"]["VALUE"]):?>
						<strong class="title"><?=$arItem["DISPLAY_PROPERTIES"]["HEADING"]["VALUE"]?></strong>
					<?endif;?>
					
					<p><?=$arItem["DETAIL_TEXT"]?></p>
				</div>
				<div class="visual-block">
					<?if ($arItem["DETAIL_PICTURE"]["SRC"]):?>
						<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""/>
					<?endif;?>
				</div>
			</div>
		<?endforeach;?>
	</div>
	
	<div class="slider-about-nav">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?if ($arItem["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"]):?>
				<div><?=$arItem["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"]?></div>
			<?endif;?>
		<?endforeach;?>
	</div>
	
</div>
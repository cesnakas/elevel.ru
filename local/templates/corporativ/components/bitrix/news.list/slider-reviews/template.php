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
<section class="section-testimonials">
	<h2>Наши клиенты думают о нас</h2>
	<div class="slider-testimonials slider-content">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="visual-block">
					<?if ($arItem["DETAIL_PICTURE"]["SRC"] || $arItem["PREVIEW_PICTURE"]["SRC"]):?>
						<div class="icon">
							<img width="130" height="78" src="<?=($arItem["DETAIL_PICTURE"]["SRC"] ? $arItem["DETAIL_PICTURE"]["SRC"] : $arItem["PREVIEW_PICTURE"]["SRC"])?>" alt="<?=$arItem["NAME"]?>"/>
						</div>
					<?endif;?>
					<strong class="text"><?=$arItem["NAME"]?></strong>
				</div>
				
				<div class="text-block">
					<?if ($arItem["DETAIL_TEXT"]):?>
						<?=$arItem["DETAIL_TEXT"]?>
					<?elseif ($arItem["PREVIEW_TEXT"]):?>
						<?=$arItem["PREVIEW_TEXT"]?>
					<?endif;?>
				</div>
			</div>
		<?endforeach;?>
	</div>
</section>
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
<h2>По категориям</h2>
<?foreach($arResult["SECTIONS"] as $arSection):?>
	<section class="section-video-category">
		<h3><?=$arSection["NAME"]?></h3>
		<div class="slider-video-categories slider-arrow-position slider-content">
			<?foreach($arSection["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a data-fancybox href="<?=$arItem['PROPERTIES']["URL"]["VALUE"]?>">
						<?if ($arItem["DETAIL_PICTURE"]["SRC"]):?>
							<div class="visual"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""/></div>
						<?endif;?>
						
						<span class="date"><?=$arItem["DATE_CREATE"]?></span>
						<?=$arItem["NAME"]?>
					</a>
				</div>
			<?endforeach;?>
		</div>
	</section>
<?endforeach;?>
<div class="block-subscribe">
	<h2>Подписывайтесь и будьте всегда в курсе</h2>
	<a class="link-subscribe" target="_blank" href="https://www.youtube.com/channel/UCgRtzjyiLki4njMdeiZn2KQ">Подписаться</a>
</div>
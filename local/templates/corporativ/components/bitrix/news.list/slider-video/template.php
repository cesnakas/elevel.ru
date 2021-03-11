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
<div class="heading-video clearfix">
	<h1>Видеоблог</h1>
	<a class="link-video-subscribe" href="https://www.youtube.com/channel/UCgRtzjyiLki4njMdeiZn2KQ" target="_blank">Подписаться</a>
</div>
<section class="section-main-video clearfix">
	<div class="big-video">
		<iframe width="100%" height="100%" src="<?=$arResult["YOUTUBE"]?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
	</div>
	<div class="column-right">
		<h3>Последние добавленные видео</h3>
		<div class="video-slider slider-arrow-position slider-content">
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">


<a data-fancybox="" href="<?=$arItem['PROPERTIES']["URL"]["VALUE"]?>" tabindex="0">

						<?if ($arItem["DETAIL_PICTURE"]["SRC"]):?>
							<div class="visual"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""/></div>
						<?else:?>
							<div class="visual"><img src="<?=SITE_TEMPLATE_PATH?>/images/no_photo.png" alt=""/></div>
						<?endif;?>
						
						<div class="text-block">
							<span class="date"><?=$arItem["DATE_CREATE"]?></span>
							<?=$arItem["NAME"]?>
						</div>
					</a>
				</div>
			<?endforeach;?>
		</div>
	</div>
</section>
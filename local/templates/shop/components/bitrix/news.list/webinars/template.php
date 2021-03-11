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

<div class="webinar-list">

	<?foreach($arResult["WEBINARS"] as $arWeb):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

		<?
		$arProp = $arItem['PROPERTIES'];
		?>

		<div class="webinar-list__item">
			<div class="webinar-list__date"><?=$arWeb['DATE']?></div>

			<?foreach ($arWeb['ITEMS'] as $key => $web):?>

				<div class="webinar-item" id="<?=$this->GetEditAreaId($web['ID']);?>">
					<span class="webinar-item__time"><?=$web['time']?></span>
					<a class="webinar-item__link" href="<?=$web['PROPERTIES']['LINK']['VALUE']?>"><?=$web['NAME']?></a>
					<span class="webinar-item__duration">(~ <?=$web['PROPERTIES']['DURATION']['VALUE']?>)</span>
				</div>

			<?endforeach;;?>

		</div>

	<?endforeach;?>

</div>

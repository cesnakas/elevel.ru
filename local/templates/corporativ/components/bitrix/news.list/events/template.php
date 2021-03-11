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

$bxajaxid = CAjax::GetComponentID($component->__name, $component->__template->__name, $component->arParams['AJAX_OPTION_ADDITIONAL']);

?>
<?if (count($arResult["ITEMS"]) > 0):?>
	<?if ($arParams["H2_TITLE"]):?>
		<h2><?=$arParams["H2_TITLE"]?></h2>
	<?endif;?>
	<ul class="list-events" id="comp_<?=$bxajaxid?>">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["DETAIL_PICTURE"]["SRC"]):?>
						<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="" />
					<?endif;?>
					
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<h3><?=$arItem["NAME"]?></h3>
					<?endif;?>
				</a>
			</li>
		<?endforeach;?>
	</ul>
	<?if($arResult["NAV_RESULT"]->nEndPage > 1 && $arResult["NAV_RESULT"]->NavPageNomer<$arResult["NAV_RESULT"]->nEndPage):?>
		<div id="btn_<?=$bxajaxid?>" class="button-center">
			<a data-ajax-id="<?=$bxajaxid?>" class="button" href="javascript:void(0)" data-show-more="<?=$arResult["NAV_RESULT"]->NavNum?>" data-next-page="<?=($arResult["NAV_RESULT"]->NavPageNomer + 1)?>" data-max-page="<?=$arResult["NAV_RESULT"]->nEndPage?>">Показать ещё</a>
		</div>
	<?endif?>
<?endif?>
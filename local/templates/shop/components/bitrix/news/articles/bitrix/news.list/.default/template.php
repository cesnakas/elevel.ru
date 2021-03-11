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
<ul class="list-articles slider-list">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<a class="article" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<?if ($arItem["PICTURE"]):?>
					<div class="visual">
						<img src="<?=$arItem["PICTURE"]?>" alt="<?=$arItem["NAME"]?>"/>
					</div>
				<?endif;?>
				<span class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
				<h3><?=$arItem["NAME"]?></h3>
				<p><?=$arItem["SHORT_TEXT"]?>...</p>
			</a>
		</li>
	<?endforeach;?>
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
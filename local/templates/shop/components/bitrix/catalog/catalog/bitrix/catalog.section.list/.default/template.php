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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if ($arResult['SECTION']['ID'] > 0)
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
}


if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
<?
$meta = getMeta();
?>
<?if(empty($meta['H1'])):?>
<h1>
	<?=$arResult['SECTION']['NAME']?>
	<?$APPLICATION->ShowViewContent('brands_filtered');?>
</h1>
<?endif?>

<div class="top-sub-categories columns-container" id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>">
		<?
		foreach ($arResult['SECTIONS'] as $i => &$arSection)
		{
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

			?>
			<div class="col col-3 box-content" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<?if($arSection["PICTURE"]):?>
					<div class="visual">
						<a class="ajax_stop" href="<?=$arSection["SECTION_PAGE_URL"]?>"><img src="<?=$arSection["PICTURE"]?>" alt=""/></a>
					</div>
				<?endif;?>
				<strong class="title"><a class="ajax_stop" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></strong>
			</div>
			
		<?
		}
		
		unset($arSection);
	?>
</div>

<?
}
?>
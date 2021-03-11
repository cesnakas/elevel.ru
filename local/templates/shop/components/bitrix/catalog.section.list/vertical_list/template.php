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

<div class="sidebar_block vertical-sections">

	<div id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>">

			<div class="sidebar_title">Категории</div>

			<?
			foreach ($arResult['SECTIONS'] as $i => &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				?>
				<div class="col-12 vertical-sections__item" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
					<strong class="title"><a class="ajax_stop" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a></strong>
				</div>
				
			<?
			}
			
			unset($arSection);
		?>
	</div>

</div>

<?
}
?>
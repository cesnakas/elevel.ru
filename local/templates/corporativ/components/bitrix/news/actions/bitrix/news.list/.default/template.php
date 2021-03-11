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
<style>
	<?=$arResult["CSS"]?>
</style>
<div class="clearfix">
<?/*?>
	<aside class="sidebar-left popup-holder">
		<a class="open" href="">
			<?if ($arResult["SECTION_CHECKED_NAME"]):?>
				<?=$arResult["SECTION_CHECKED_NAME"]?>
			<?else:?>
				Все акции
			<?endif;?>
		</a>
		<div class="popup">
			<div class="popup-inner">
				<ul class="list-categories-actions">
					<?foreach($arResult["SECTIONS"] as $arSection):?>
						<li <?if ($arSection["CHECKED"]):?>class="active"<?endif;?>>
							<a class="section_id<?=$arSection["ID"]?>" href="<?=$arSection["SECTION_PAGE_URL"]?>"><span class="center"><?=$arSection["NAME"]?></span></a>
						</li>
					<?endforeach;?>
				</ul>
			</div>
		</div>
	</aside>
<?*/?>
	<div class="right-content">
		<ul class="list-news list-actions" id="comp_<?=$bxajaxid?>">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
						
						<div class="action-holder">
							<?if($arParams["DISPLAY_PICTURE"]!="N" && $arItem["DETAIL_PICTURE"]["SRC"]):?>
								<div class="visual"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""/></div>
							<?endif;?>
							
							<div class="text-block">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
									<h3><?=$arItem["NAME"]?></h3>
								<?endif;?>
								
								<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["DETAIL_TEXT"]):?>
									<p><?=TruncateText( HTMLToTxt($arItem["DETAIL_TEXT"], "", array("'<img[^>]*?>'si"), false), 100);?></p>
								<?endif;?>
							</div>
						</div>
						
						<?if ($arItem["DATES"]):?>
							<span class="expired"><?=$arItem["DATES"]?></span>
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

		<div class="button-center">
			<a href="/subscribe/" class="button">Подписаться на новости</a>
		</div>
	</div>
</div>

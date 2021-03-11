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
<section class="section-design-projects">
	<h2>Проекты архитекторов - наших партнеров</h2>
	<div class="slider-design-projects-nav slider-arrow-position">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?if ($arItem["DETAIL_PICTURE"]["SRC"]):?>
					<div class="visual"><img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt=""/></div>
				<?endif;?>
				
				<strong class="name"><?=$arItem["NAME"]?></strong>
				<?=$arItem["PROPERTIES"]["AUTHOR_POSITION"]["VALUE"]?>
			</div>
		<?endforeach;?>
	</div>
	<div class="slider-design-projects-for">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="slider-project">
					<div class="slider-project-for">
						<?foreach($arItem["OBJECT_PICTURES"] as $picture):?>
							<div><img src="<?=$picture?>" alt=""/></div>
						<?endforeach;?>
					</div>
					<div class="slider-project-nav">
						<?foreach($arItem["OBJECT_PICTURES_SMALL"] as $picture):?>
							<div><img src="<?=$picture?>" alt=""/></div>
						<?endforeach;?>
					</div>
				</div>
				<div class="text-block">

					<h2><?=$arItem["PROPERTIES"]["PROJECT_TITLE"]["VALUE"]?></h2>
					
					<?if ($arItem["DETAIL_TEXT"]):?>
						<?=$arItem["DETAIL_TEXT"]?>
					<?endif;?>
						
					<?if ($arItem["PROPERTIES"]["USED_EQUIPMENT"]["VALUE"]):?>
						<div class="text-inner"><p><strong>Использованное оборудование:</strong> <?=$arItem["PROPERTIES"]["USED_EQUIPMENT"]["VALUE"]?></p></div>
					<?endif;?>
				</div>
				<?if ($arItem["PROPERTIES"]["EMAIL"]["VALUE"]):?>
					<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"manager_feedback_form", 
	array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "102",
		"COMPONENT_TEMPLATE" => "manager_feedback_form",
		"MANAGER_EMAIL" => $arItem["PROPERTIES"]["EMAIL"]["VALUE"],
		"FORM_TITLE" => "Форма обратной связи с автором проекта",
		"BUTTON_TITLE" => "Написать автору",
		"PAGE_URL" => "",
		"PAGE_TITLE" => "Запрос автору проекта - архитектору ".$arItem["NAME"],
		"BUTTON1_ONCLICK" => "yaCounter1485305.reachGoal('NapisatAvtoru'); return true;",
		"POPUP_TITLE" => "",
		"BUTTON_LINK" => "N",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?>
				<?endif;?>
			</div>
		<?endforeach;?>
	</div>
</section>
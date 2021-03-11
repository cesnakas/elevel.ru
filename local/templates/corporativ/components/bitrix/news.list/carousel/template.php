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
<div class="carousel-wrap">
  

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	
	<?if(count($arItem['PROPERTIES']['IMGS']['VALUE']) > 0):?>

		<div class="carousel-item">
			<div class="carousel-item__name"><?=$arItem['NAME']?></div>
			<div class="carousel">
				<?
				foreach ($arItem['PROPERTIES']['IMGS']['VALUE'] as $key => $pic) {
					$full = CFile::GetPath($pic);
					$file = CFile::ResizeImageGet($pic, array('width'=>350, 'height'=>350), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				?>
					<a rel='lightbox' data-fancybox="gal-<?=$arItem['ID']?>" href="<?=$full?>">
						<img src="<?=$file['src']?>" alt="">
					</a>
				<?}?>
			</div>

		</div>	

	<?endif;?>

<?endforeach;?>

</div>


<div class="textBlock1">
	<p></p>
	<p></p>
	<p></p>
	<h3>Получи техническое решение/спецификацию для своего проекта, <br> заполнив форму обратной связи или обратившись по контактам ниже.</h3>
	<p>
		Новикова Ирина, Руководитель направления Дизайнеры и Архитекторы <br>
		<a href="tel:+79167232768">+7 916 730 58 92</a> <br>
		<a href="mailto:i.novikova@elevel.ru">i.novikova@elevel.ru</a>
	</p>
</div>

<?$APPLICATION->IncludeComponent(
	"magnitmedia:form.result.new", 
	"partners", 
	array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"EDIT_URL" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "N",
		"WEB_FORM_ID" => "119",
		"COMPONENT_TEMPLATE" => ".default",
		"MANAGER_EMAIL" => "",
		"FORM_TITLE" => "Форма обратной связи",
		"PAGE_TITLE" => "Партнеры",
		"PAGE_URL" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		),
	),
	false
);?>	

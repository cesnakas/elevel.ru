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
<div class="heading-project clearfix">
	<h1><?=$arResult["NAME"]?></h1>
	<div class="block-right">
		<a href="<?=$arResult["LIST_PAGE_URL"]?>">Назад</a>
	</div>
</div>
<section class="section-project clearfix">
	<div class="slider-project">
		<div class="slider-project-for">
			<?foreach($arResult["OBJECT_PICTURES"] as $picture):?>
				<div><div class="visual"><img src="<?=$picture?>" alt=""/></div></div>
			<?endforeach;?>
		</div>
		<div class="slider-project-nav">
			<?foreach($arResult["OBJECT_PICTURES_SMALL"] as $picture):?>
				<div><img src="<?=$picture?>" alt=""/></div>
			<?endforeach;?>
		</div>
	</div>
	<div class="text-block">
		<ul class="list-info">
			<?if ($arResult["PROPERTIES"]["OBJECT_TYPE"]["VALUE"]):?>
				<li><strong>Тип здания:</strong> <?=$arResult["PROPERTIES"]["OBJECT_TYPE"]["VALUE"]?></li>
			<?endif;?>
			
			<?if ($arResult["PROPERTIES"]["SOLUTION_TYPE"]["VALUE"]):?>
				<li><strong>Тип решения:</strong> <?=implode(", ", $arResult["PROPERTIES"]["SOLUTION_TYPE"]["VALUE"])?></li>
			<?endif;?>
			
			<?if ($arResult["PROPERTIES"]["EQUIPMENT"]["VALUE"]):?>
				<li><strong>Производитель:</strong> <?=$arResult["PROPERTIES"]["EQUIPMENT"]["VALUE"]?></li>
			<?endif;?>
			
			<?if ($arResult["PROPERTIES"]["YEAR"]["VALUE"]):?>
				<li><strong>Год реализации:</strong> <?=$arResult["PROPERTIES"]["YEAR"]["VALUE"]?></li>
			<?endif;?>
		</ul>
		
		<?if ($arResult["DETAIL_TEXT"]):?>
			<?=$arResult["DETAIL_TEXT"]?>
		<?endif;?>
	</div>
</section>
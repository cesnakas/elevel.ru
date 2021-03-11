<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="block210b right_brands">
					<p>Производители</p>
					<?
					$pathers=explode('/',$_SERVER['REQUEST_URI']);
					//var_dump($pathers);
					$u=count($pathers)-2;
					$RootPath="/brands/".$pathers[$u]."";
//echo $RootPath;
?>
	
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "brands_menu", Array(
	"IBLOCK_TYPE" => "vecancy",	// Тип инфо-блока
	"IBLOCK_ID" => "5",	// Инфо-блок
	"SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
	"SECTION_CODE" => "",	// Код раздела
	"SECTION_URL" => "/brands/#SECTION_CODE#/",	// URL, ведущий на страницу с содержимым раздела
	"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
	"TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
	"SECTION_FIELDS" => "",	// Поля разделов
	"SECTION_USER_FIELDS" => "",	// Свойства разделов
	"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
	"CACHE_TYPE" => "N",	// Тип кеширования
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_GROUPS" => "Y",	// Учитывать права доступа
	),
	false
);?>
</div>
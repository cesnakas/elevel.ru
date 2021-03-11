<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"", 
	array(
		"COMPONENT_TEMPLATE" => "",
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"ORDER" => "rank",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => "#SITE_DIR#shop/search/index.php",
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "header-search-input2",
		"CONTAINER_ID" => "header-search2",
		"CATEGORY_0_TITLE" => "Товары",
		"CATEGORY_0" => array(
			0 => "iblock_1c_catalog",
		),
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "83",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
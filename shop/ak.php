<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?
CModule::IncludeModule("search");
CModule::IncludeModule("iblock");

$arItemsOrder = Array(
	'SORT' => 'ASC',
	'NAME' => 'ASC'
);
$arItemsFilter = Array(
	'IBLOCK_ID' => 83,
	'ACTIVE' => 'Y',
	'SECTION_ACTIVE' => 'Y',
	'SECTION_GLOBAL_ACTIVE' => 'Y',
	Array(
		'LOGIC' => 'OR',
		Array(
			'NAME' => '%' . $_REQUEST['q'] . '%'
		),
		Array(
			'PROPERTY_PRODUCER_S' => '%' . $_REQUEST['q'] . '%'
		)
	)
);

if ( $section )
{
	$arItemsFilter['SECTION_ID'] = $section;
	$arItemsFilter['INCLUDE_SUBSECTIONS'] = 'Y';
}

$arItemsSelect = Array(
	'ID',
	'IBLOCK_SECTION_ID',
	"IBLOCK_ID"
);
$dbItems = CIBlockElement::GetList( $arItemsOrder, $arItemsFilter, false, false, $arItemsSelect );
while ( $arItem = $dbItems->Fetch() )
{
	$arResult['ITEMS_IDS'][] = $arItem['ID'];
	
}

echo "<pre>"; print_r($arResult); echo "</pre>";

return;
if($_REQUEST['asd']=="zxc"){
	include_once($_SERVER["DOCUMENT_ROOT"] . '/local/xhprof.php');
	xhprof_start(0);
}
$obSearch = new CSearch;
$arFilter = array(
  'QUERY' => $_REQUEST['q'],
  'SITE_ID' => LANG,
  'MODULE_ID' => 'iblock',
);
$aSort = array();
$arEXFilter = Array(
   Array
   (
      "=MODULE_ID" => "iblock",
      "PARAM1" => "1c_catalog",
      "PARAM2" => Array(83)
   )
);

$obSearch->Search($arFilter,$aSort,$arEXFilter);
$obSearch->NavStart(50, false);
$arId = array();
while ($arSearch = $obSearch->Fetch()) {
	$arId[] = $arSearch['ID'];
   
}

echo "<pre>="; print_r($obSearch); echo "</pre>";
if($_REQUEST['asd']=="zxc"){	
	xhprof_stop();
}


// $APPLICATION->IncludeComponent(
	// "bitrix:search.page",
	// "",
	// Array(
		// "AJAX_MODE" => "N",
		// "AJAX_OPTION_ADDITIONAL" => "",
		// "AJAX_OPTION_HISTORY" => "N",
		// "AJAX_OPTION_JUMP" => "N",
		// "AJAX_OPTION_STYLE" => "Y",
		// "CACHE_TIME" => "3600",
		// "CACHE_TYPE" => "A",
		// "CHECK_DATES" => "N",
		// "DEFAULT_SORT" => "rank",
		// "DISPLAY_BOTTOM_PAGER" => "Y",
		// "DISPLAY_TOP_PAGER" => "N",
		// "FILTER_NAME" => "",
		// "NO_WORD_LOGIC" => "N",
		// "PAGER_SHOW_ALWAYS" => "N",
		// "PAGER_TEMPLATE" => "",
		// "PAGER_TITLE" => "Результаты поиска",
		// "PAGE_RESULT_COUNT" => "1000000",
		// "RESTART" => "Y",
		// "SHOW_WHEN" => "N",
		// "SHOW_WHERE" => "N",
		// "USE_LANGUAGE_GUESS" => "N",
		// "USE_SUGGEST" => "N",
		// "USE_TITLE_RANK" => "Y",
		// "arrFILTER" => array("iblock_1c_catalog"),
		// "arrFILTER_iblock_1c_catalog" => array("83"),
		// "arrWHERE" => array()
	// )
// );
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
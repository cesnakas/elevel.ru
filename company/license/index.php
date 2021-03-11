<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Лицензии, свидетельства и сертификаты компании Эlevel");
$APPLICATION->SetPageProperty("keywords", "elevel, elevel engeener, эlevel, эlevel инженер, элевел, сертификаты эlevel, лицензии эlevel, лицензии, сертификаты, проектирование, строительство, свидетельство о электролаборатории, сертификаты специалистов, электромонтаж, проектирование электроснабжение, проектирование инженерных систем, сертификат ABB, сертификат Legrand, сертификат Schneider Electric, сертификат Merten, сертификат Gira, сертификат Bticino, сертификат DKC, сертификат Philips, сертификат Nexans, сертификат Hensel, сертификат Lena Lighting, сертификат Световые технологии, сертификат Anam, сертификат КОСМОС, сертификат Теплолюкс, сертификат Zamel");
$APPLICATION->SetPageProperty("description", "Лицензии и сертификаты компании Эlevel");
$APPLICATION->SetPageProperty("tags", "elevel, elevel engeener, эlevel, эlevel инженер, элевел, сертификаты эlevel, лицензии эlevel, лицензии, сертификаты, проектирование, строительство, свидетельство о электролаборатории, сертификаты специалистов, электромонтаж, проектирование электроснабжение, проектирование инженерных систем");
$APPLICATION->SetTitle("Лицензии и сертификаты");
?>
 
<script type="text/javascript" src="/js/highslide.js"></script>
 
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="/css/highslide-ie6.css" />
<![endif]-->
 
<script type="text/javascript">
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.allowMultipleInstances = false;
</script>
 
<script type="text/javascript">
	//<![CDATA[
	//hs.registerOverlay({
	//	fade: 2 // fading the semi-transparent overlay looks bad in IE
	//});
	hs.graphicsDir = '/images/highslide/';
	hs.wrapperClassName = 'borderless';
	//]]>
</script>


	<?$APPLICATION->IncludeComponent("bitrix:catalog", "paym", array(
		"IBLOCK_TYPE" => "licenses",
		"IBLOCK_ID" => "36",
		"BASKET_URL" => "/personal/basket.php",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/subscribers/faq/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"USE_FILTER" => "N",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"PAGE_ELEMENT_COUNT" => "5",
		"LINE_ELEMENT_COUNT" => "1",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"VARIABLE_ALIASES" => array(
			"SECTION_ID" => "SECTION_ID",
			"ELEMENT_ID" => "ELEMENT_ID",
		)
		),
		false
	);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
global $APPLICATION;

if (!function_exists("GetTreeRecursive")) {
		
	$aMenuLinks=$APPLICATION->IncludeComponent("magnitmedia:menu.sections", "", array(
	"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "83",
		"SECTION_URL" => "#SITE_DIR#/shop/#SECTION_CODE_PATH#/",
		"DEPTH_LEVEL" => "5",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "86400"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);
}
?>
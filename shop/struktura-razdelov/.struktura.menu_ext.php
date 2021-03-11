<?
global $APPLICATION;

if (!function_exists("GetTreeRecursive")) {
   $aMenuLinks = $APPLICATION->IncludeComponent(
      "bitrix:menu.sections",
      "",
      Array(
         "IBLOCK_TYPE" => "1c_catalog",
         "IBLOCK_ID" => 83,
         "SECTION_URL" => "#SITE_DIR#/shop/struktura-razdelov/#SECTION_CODE#/",
         "DEPTH_LEVEL" => "5",
         "CACHE_TYPE" => "A",
         "CACHE_TIME" => "3600"
      )
   );
}
?>
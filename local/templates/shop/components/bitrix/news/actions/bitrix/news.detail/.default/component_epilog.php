<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

echo preg_replace_callback(
         "/#BANNER_DNY#/is".BX_UTF_PCRE_MODIFIER,
         create_function('$matches', 'ob_start();
         
		if($_REQUEST["print"] !== "Y")
		{
			echo \'<div style="height:10px;"></div>\';
			$GLOBALS["APPLICATION"]->IncludeFile("/includes/bottom_slide_banners.php");
			echo \'<div>\';
				$GLOBALS["APPLICATION"]->ShowBanner("TOVAR_DNY");
			echo \'</div>\';
		}
		 
         $retrunStr = @ob_get_contents();
         ob_get_clean();
         return $retrunStr;'),
         $arResult["CACHED_TPL"]);
?>
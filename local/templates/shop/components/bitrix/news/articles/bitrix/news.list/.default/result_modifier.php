<?
$obParser = new CTextParser;
foreach ($arResult['ITEMS'] as $key => &$arItem)
{
	if ($arItem["DETAIL_PICTURE"]["SRC"])
	{
		$arPhotoSmall = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>305, 'height'=>241), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, Array("name" => "sharpen", "precision" => 0));
		$arResult['ITEMS'][$key]["PICTURE"] = $arPhotoSmall["src"];
	}
	
	if ($arItem["~PREVIEW_TEXT"])
	{
		$arItem["SHORT_TEXT"] = $obParser->html_cut($arItem["~PREVIEW_TEXT"], 150);			
		$arItem["SHORT_TEXT"] = mb_substr($arItem["SHORT_TEXT"], 0, mb_strrpos($arItem["SHORT_TEXT"],' '));
	}
}
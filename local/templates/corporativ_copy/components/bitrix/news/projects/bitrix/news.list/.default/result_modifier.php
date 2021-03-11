<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as &$arItem)
{
	$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>720, 'height'=>450), BX_RESIZE_IMAGE_PROPORTIONAL);                
	if ($file['src'])
		$arItem["PREVIEW_PICTURE"]["SRC"] = $file['src'];
}
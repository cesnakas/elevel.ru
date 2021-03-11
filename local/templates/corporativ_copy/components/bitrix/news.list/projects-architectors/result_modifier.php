<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as &$arItem)
{
	foreach($arItem["PROPERTIES"]["PICTURES"]["VALUE"] as $value)
	{
		$file = CFile::ResizeImageGet($value, array('width'=>1000, 'height'=>666), BX_RESIZE_IMAGE_PROPORTIONAL);                
		if ($file['src'])
			$arItem["OBJECT_PICTURES"][] = $file["src"];
		
		$file = CFile::ResizeImageGet($value, array('width'=>170, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL);                
		if ($file['src'])
			$arItem["OBJECT_PICTURES_SMALL"][] = $file['src'];
	}
}
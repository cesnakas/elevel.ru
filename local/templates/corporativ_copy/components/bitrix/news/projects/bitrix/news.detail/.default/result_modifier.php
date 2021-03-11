<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $value)
{
	$file = CFile::ResizeImageGet($value, array('width'=>965, 'height'=>965), BX_RESIZE_IMAGE_PROPORTIONAL);                
	if ($file['src'])
		$arResult["OBJECT_PICTURES"][] = $file['src'];
	
	$file = CFile::ResizeImageGet($value, array('width'=>170, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL);                
	if ($file['src'])
		$arResult["OBJECT_PICTURES_SMALL"][] = $file['src'];
}
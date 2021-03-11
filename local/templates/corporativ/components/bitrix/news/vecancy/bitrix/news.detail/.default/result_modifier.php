<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $value)
{
	$arFile = CFile::GetFileArray($value);
	if($arFile["SRC"])
		$arResult["OBJECT_PICTURES"][] = $arFile["SRC"];
	
	$file = CFile::ResizeImageGet($value, array('width'=>170, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL);                
	if ($file['src'])
		$arResult["OBJECT_PICTURES_SMALL"][] = $file['src'];
}
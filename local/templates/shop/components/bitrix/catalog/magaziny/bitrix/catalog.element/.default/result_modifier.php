<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
foreach($arResult["PROPERTIES"]["PICTURES"]["VALUE"] as $pic){                                               
    $arFile = CFile::GetFileArray($pic);  
    $renderImage = CFile::ResizeImageGet($arFile, Array("width" => 195, "height" => 147), BX_RESIZE_IMAGE_EXACT, false);
    $arResult["PREV_PICS"][] = $renderImage["src"];
	
	$bigImage = CFile::ResizeImageGet($pic, Array("width" => 628, "height" => 471), BX_RESIZE_IMAGE_EXACT, false);
    $arResult["BIG_PICS"][] = $bigImage["src"];                        
}
?>
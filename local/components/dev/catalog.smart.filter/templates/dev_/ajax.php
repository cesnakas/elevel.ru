<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$APPLICATION->RestartBuffer();
unset($arResult["COMBO"]);
foreach($arResult as $key => $val) {
    if(strpos($key, "URL") !== false){
	if(!is_array($val)){
	    $arResult[$key] = preg_replace("!page\-(.*?)$!", "", $val);
	}
    }
}
foreach($arResult['JS_FILTER_PARAMS'] as $key => $val) {
    if(strpos($key, "URL") !== false){
	if(!is_array($val)){
	    $arResult['JS_FILTER_PARAMS'][$key] = preg_replace("!page\-(.*?)$!", "", $val);
	}
    }
}
echo CUtil::PHPToJSObject($arResult, true);
?>
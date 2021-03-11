<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;
CJSCore::Init(array('fx', 'popup'));

if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}

global $CHANGE_TITLE;	//section.php
// $CHANGE_TITLE = $arResult['TITLE_META'] . GetMessage("CT_BCSF_BRAND_SERIES_TITLE");
$CHANGE_TITLE = $arResult['TITLE_META'];
global $CHANGE_DESCRIPTION;
$CHANGE_DESCRIPTION = $arResult['DESCR_META'];
$APPLICATION->SetPageProperty('description', $arResult['DESCR_META']);

?>
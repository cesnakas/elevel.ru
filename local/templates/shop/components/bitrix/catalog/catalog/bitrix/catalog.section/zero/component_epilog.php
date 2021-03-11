<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
if (isset($arResult["NAV_RESULT"]->PAGEN) && $arResult["NAV_RESULT"]->PAGEN > 1)
{
	$APPLICATION->SetPageProperty("keywords", "");
	$APPLICATION->SetPageProperty("description", "");
	
	
	global $CHANGE_TITLE;
	global $ZERO_SECTION_NAME;
	
	$currentTitle = $ZERO_SECTION_NAME;
	
	$CHANGE_TITLE = "Каталог – Страница " . $arResult["NAV_RESULT"]->PAGEN . " из ". $arResult["NAV_RESULT"]->NavPageCount . " - " . $currentTitle;
	// $CHANGE_TITLE = $currentTitle . " страница " . $arResult["NAV_RESULT"]->PAGEN . " из ". $arResult["NAV_RESULT"]->NavPageCount;
}

if (isset($arResult["NAV_RESULT"]->PAGEN) && $arResult["NAV_RESULT"]->PAGEN > $arResult["NAV_RESULT"]->NavPageCount && $arResult["NAV_RESULT"]->NavPageCount > 0)
{
	LocalRedirect($APPLICATION->GetCurDir(), false, '301 Moved permanently');
}

$CURRENT_PAGE = (CMain::IsHTTPS()) ? "https://" : "http://";
$CURRENT_PAGE .= $_SERVER["HTTP_HOST"];
$CURRENT_PAGE .= $APPLICATION->GetCurDir();

if ($arResult["NAV_RESULT"]->PAGEN < $arResult["NAV_RESULT"]->NavPageCount)
{
	$APPLICATION->SetPageProperty("rel_next", "<link rel='next' href='" . $CURRENT_PAGE . "?PAGEN_" . $arResult["NAV_RESULT"]->NavNum . "=" . ($arResult["NAV_RESULT"]->PAGEN + 1) . "'>");
}

if ($arResult["NAV_RESULT"]->PAGEN > 1)
{
	$prevUrl = $CURRENT_PAGE;
	if ($arResult["NAV_RESULT"]->PAGEN > 2) $prevUrl .= "?PAGEN_" . $arResult["NAV_RESULT"]->NavNum . "=" . ($arResult["NAV_RESULT"]->PAGEN - 1);
		
	$APPLICATION->SetPageProperty("rel_prev", "\n<link rel='prev' href='" . $prevUrl . "'>");
	$APPLICATION->SetPageProperty("rel_canonical", "\n<link rel='canonical' href='" . $CURRENT_PAGE . "'>");
}
else
{
    $APPLICATION->SetPageProperty("rel_canonical", "\n<link rel='canonical' href='" . $CURRENT_PAGE . "'>\n"); 
}
?>
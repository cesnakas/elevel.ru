<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
$CURRENT_PAGE = (CMain::IsHTTPS()) ? "https://" : "http://";
$CURRENT_PAGE .= $_SERVER["HTTP_HOST"];
$CURRENT_PAGE .= $APPLICATION->GetCurDir();

if (
		// если у серии есть товары и есть пагинация, но указанная страница пагинации за пределами страниц (например 6ая из 4х)
		(isset($arResult["NAV_RESULT"]->PAGEN) && $arResult["NAV_RESULT"]->PAGEN > $arResult["NAV_RESULT"]->NavPageCount && $arResult["NAV_RESULT"]->NavPageCount > 0) ||
		// или у серии нет товаров и выводятся товары бренда без пагинации, тогда при любом GET параметре PAGEN_1 делаем редирект на страницу без него
		(!$arParams["DISPLAY_BOTTOM_PAGER"] && isset($_GET["PAGEN_1"]))
	)
{
	LocalRedirect($APPLICATION->GetCurDir(), false, '301 Moved permanently');
}

if (isset($arResult["NAV_RESULT"]->PAGEN) && $arResult["NAV_RESULT"]->PAGEN > 1)
{
	// стираем кеи и описание
	$APPLICATION->SetPageProperty("keywords", "");
	$APPLICATION->SetPageProperty("description", "");

	global $CHANGE_TITLE;
	global $SECTION_NAME;

	$CHANGE_TITLE = "Каталог – Страница " . $arResult["NAV_RESULT"]->PAGEN . " из ". $arResult["NAV_RESULT"]->NavPageCount . " – " . $SECTION_NAME;

	// prev
	$prevUrl = $CURRENT_PAGE;
	if ($arResult["NAV_RESULT"]->PAGEN > 2) $prevUrl .= "?PAGEN_" . $arResult["NAV_RESULT"]->NavNum . "=" . ($arResult["NAV_RESULT"]->PAGEN - 1);
		
	$APPLICATION->SetPageProperty("rel_prev", "<link rel='prev' href='" . $prevUrl . "'>");
}

if ($arResult["NAV_RESULT"]->PAGEN < $arResult["NAV_RESULT"]->NavPageCount)
{
	$APPLICATION->SetPageProperty("rel_next", "<link rel='next' href='" . $CURRENT_PAGE . "?PAGEN_" . $arResult["NAV_RESULT"]->NavNum . "=" . ($arResult["NAV_RESULT"]->PAGEN + 1) . "'>");
}
?>
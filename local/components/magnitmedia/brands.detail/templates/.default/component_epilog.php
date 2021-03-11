<?
global $APPLICATION;
if ( !is_object( $APPLICATION ) )
{
	$APPLICATION = new CMain;
}

global $CHANGE_TITLE;

if ($CHANGE_TITLE)
{
	$APPLICATION->SetTitle($CHANGE_TITLE);
	$APPLICATION->SetPageProperty('title', $CHANGE_TITLE);
}
else
{
	if ($arResult["PAGE"] == "SERIE")
	{
		if ($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"])
			$APPLICATION->SetTitle($arResult["IPROPERTY_VALUES"]["ELEMENT_PAGE_TITLE"]);

		if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"])
			$APPLICATION->SetPageProperty("title", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]);
		if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"])
			$APPLICATION->SetPageProperty("description", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]);
		if ($arResult["IPROPERTY_VALUES"]["ELEMENT_META_KEYWORDS"])
			$APPLICATION->SetPageProperty("keywords", $arResult["IPROPERTY_VALUES"]["ELEMENT_META_KEYWORDS"]);
	}
	else
	{
		if ($arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"])
			$APPLICATION->SetTitle($arResult["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]);

		if ($arResult["IPROPERTY_VALUES"]["SECTION_META_TITLE"])
			$APPLICATION->SetPageProperty("title", $arResult["IPROPERTY_VALUES"]["SECTION_META_TITLE"]);
		if ($arResult["IPROPERTY_VALUES"]["SECTION_META_DESCRIPTION"])
			$APPLICATION->SetPageProperty("description", $arResult["IPROPERTY_VALUES"]["SECTION_META_DESCRIPTION"]);
		if ($arResult["IPROPERTY_VALUES"]["SECTION_META_KEYWORDS"])
			$APPLICATION->SetPageProperty("keywords", $arResult["IPROPERTY_VALUES"]["SECTION_META_KEYWORDS"]);
	}
}

foreach ( $arResult['META']['NAV_CHAIN'] as $arChainItem )
{
	$APPLICATION->AddChainItem( $arChainItem['NAME'], $arChainItem['URL'] );
}
?>
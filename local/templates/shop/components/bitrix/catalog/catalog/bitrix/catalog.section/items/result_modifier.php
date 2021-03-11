<?
use Bitrix\Main\Type\Collection;
use Bitrix\Currency\CurrencyTable;


if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
$arDefaultParams = array(
	'TEMPLATE_THEME' => 'blue',
	'PRODUCT_DISPLAY_MODE' => 'N',
	'ADD_PICT_PROP' => '-',
	'LABEL_PROP' => '-',
	'OFFER_ADD_PICT_PROP' => '-',
	'OFFER_TREE_PROPS' => array('-'),
	'PRODUCT_SUBSCRIPTION' => 'N',
	'SHOW_DISCOUNT_PERCENT' => 'N',
	'SHOW_OLD_PRICE' => 'N',
	'ADD_TO_BASKET_ACTION' => 'ADD',
	'SHOW_CLOSE_POPUP' => 'N',
	'MESS_BTN_BUY' => '',
	'MESS_BTN_ADD_TO_BASKET' => '',
	'MESS_BTN_SUBSCRIBE' => '',
	'MESS_BTN_DETAIL' => '',
	'MESS_NOT_AVAILABLE' => '',
	'MESS_BTN_COMPARE' => ''
);
$arParams = array_merge($arDefaultParams, $arParams);

$this->__component->SetResultCacheKeys(array("NAV_RESULT"));

$arResult['NAV_STRING'] = $arResult['NAV_RESULT']->GetPageNavStringEx(
	$navComponentObject,
	$arParams['PAGER_TITLE'],
	$arParams['PAGER_TEMPLATE'],
	$arParams['PAGER_SHOW_ALWAYS'],
	$this->__component,
	$arResult['NAV_PARAM']
);

$itemsIDs = array();
$item_id2stores = array();
$producersIDs = array();

foreach ($arResult['ITEMS'] as $key => &$arItem)
{
	$itemsIDs[] = $arItem["ID"];
	
	if ($arItem["PREVIEW_PICTURE"]["SRC"])
	{
		$arPhotoSmall = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>292, 'height'=>292), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, Array("name" => "sharpen", "precision" => 0));
		$arItem["PICTURE"] = $arPhotoSmall["src"];
	}
	elseif ($arItem["DETAIL_PICTURE"]["SRC"])
	{
		$arPhotoSmall = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>292, 'height'=>292), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, Array("name" => "sharpen", "precision" => 0));
		$arItem["PICTURE"] = $arPhotoSmall["src"];
	}
	else $arItem["PICTURE"] = SITE_TEMPLATE_PATH . "/images/no_photo.png";
	if (!empty($arItem["PROPERTIES"]["PRODUCER"]["VALUE"]))
		$producersIDs[] = $arItem["PROPERTIES"]["PRODUCER"]["VALUE"];
}

if (!empty($itemsIDs))
{
	CModule::IncludeModule('catalog');
	$arFilter = Array("PRODUCT_ID" => $itemsIDs);
	$res = CCatalogStoreProduct::GetList(Array(),$arFilter,false,false,Array("STORE_ID", "AMOUNT", "PRODUCT_ID"));
	while ($arRes = $res->GetNext())
	{
		if ($arRes["AMOUNT"] > 0)
		{
			if (!in_array($arRes["STORE_ID"], $item_id2stores[ $arRes["PRODUCT_ID"] ]))
			{
				$item_id2stores[ $arRes["PRODUCT_ID"] ][] = $arRes["STORE_ID"];
			}
		}
	}

	foreach ($arResult['ITEMS'] as $key => &$arItem)
	{
		$arItem["STORES_COUNT"] = count($item_id2stores[ $arItem["ID"] ]);
	}
}


$pos = strpos($APPLICATION->GetCurDir(), "filter");
if ($pos !== false) {
	$arResult['DESCRIPTION'] = "";
}

$meta = getMeta();
if(!empty($meta['TEXT']))
{$arResult['DESCRIPTION'] = $meta['TEXT'];}

if (!empty($producersIDs)) {
	$dbProducers = CIBlockSection::GetList(array(), array("ID" => $producersIDs, "IBLOCK_ID" => IBLOCK_BRAND_ID, "!UF_TXT_NOT_AVAILABLE" => false), false, array("ID", "UF_TXT_NOT_AVAILABLE"));
	$arTxtNotAvailable = array();
	while ($arProducer = $dbProducers->Fetch()) {
		$arTxtNotAvailable[$arProducer["ID"]] = $arProducer["UF_TXT_NOT_AVAILABLE"];
	}
	foreach ($arResult["ITEMS"] as &$arItem) {
		$producerId = $arItem["PROPERTIES"]["PRODUCER"]["VALUE"];
		if (!empty($arTxtNotAvailable[$producerId]))
			$arItem["TXT_NOT_AVAILABLE"] = $arTxtNotAvailable[$producerId];
		else
			$arItem["TXT_NOT_AVAILABLE"] = "Под заказ";
	}
}
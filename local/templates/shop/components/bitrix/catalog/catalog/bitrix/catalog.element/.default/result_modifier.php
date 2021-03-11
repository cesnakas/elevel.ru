<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
 
// $noPhotoArray =  CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/images/no_photo.png");

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$detailPicture = $arResult["DETAIL_PICTURE"];

if ($arResult["DETAIL_PICTURE"]["SRC"]){

	$file = CFile::ResizeImageGet($detailPicture, array('width'=>49, 'height'=>59), BX_RESIZE_IMAGE_PROPORTIONAL, false);
	$arResult["DETAIL_PICTURE"]["THUMB"] = $file["src"];

	$file_big = CFile::ResizeImageGet($detailPicture, array('width'=>414, 'height'=>450), BX_RESIZE_IMAGE_PROPORTIONAL, false);
	$arResult["DETAIL_PICTURE"]["SRC"] = $file_big["src"];
}
else{
	$arResult["DETAIL_PICTURE"]["THUMB"] = SITE_TEMPLATE_PATH . "/images/no_photo.png";
	$arResult["DETAIL_PICTURE"]["SRC"] = SITE_TEMPLATE_PATH . "/images/no_photo.png";
}

foreach($arResult['PROPERTIES']["GALLERY"]["VALUE"] as &$image_id)
{
	if ($image_id){

		$file = CFile::ResizeImageGet($image_id, array('width'=>49, 'height'=>59), BX_RESIZE_IMAGE_PROPORTIONAL, false);
		$arResult['PROPERTIES']["GALLERY"]["VALUE_THUMB"][] = $file["src"];
		
		$file_big = CFile::ResizeImageGet($image_id, array('width'=>414, 'height'=>450), BX_RESIZE_IMAGE_PROPORTIONAL, false);
		
		$image_id = $file_big["src"];
	}
	else
		$image_id = SITE_TEMPLATE_PATH . "/images/no_photo.png";
}

if ($producer_id = $arResult['DISPLAY_PROPERTIES']["PRODUCER"]["VALUE"])
{
	if ($picture_id = $arResult['DISPLAY_PROPERTIES']["PRODUCER"]["LINK_SECTION_VALUE"][$producer_id]["PICTURE"])
	{
		$file = CFile::ResizeImageGet($picture_id, array('width'=>60, 'height'=>18), BX_RESIZE_IMAGE_PROPORTIONAL, false);
		$arResult['DISPLAY_PROPERTIES']["PRODUCER"]["LINK_SECTION_VALUE"][$producer_id]["PICTURE"] = $file["src"];
	}
}

// Собираем склады
$storesInfo = CCatalogStore::GetList(array("ID"=>"ASC"), array("ACTIVE" => "Y"), false, false, array("ID", "TITLE", "UF_CITY", "ADDRESS", "GPS_N", "GPS_S") );
while($store = $storesInfo->GetNext())
	$arResult["SHOPS"][ $store["ID"] ] = $store;

// Собиаем наличие товара на складах
$rsStore = CCatalogStoreProduct::GetList(array(), array('PRODUCT_ID' => $arResult["ID"]), false, false, array("STORE_ID", 'AMOUNT')); 
while($arStore = $rsStore->GetNext()){
	$arResult["SHOPS"][ $arStore["STORE_ID"] ]["AMOUNT"] = $arStore['AMOUNT'];
}

foreach($arResult["SHOPS"] as $id => $store)
{
	/*if (!isset($store["AMOUNT"]) || $store["AMOUNT"] == 0)
		unset($arResult["SHOPS"][$id]);*/

	if(!isset($store['TITLE']))
		unset($arResult["SHOPS"][$id]);

}

// удаляем лишние свойства
$arStopList = Array(
	'Акция',
	'Новинка',
	'Розничная цена'
);
foreach($arResult["DISPLAY_PROPERTIES"] as $key => $property)
{
	if (in_array($property["NAME"], $arStopList))
		unset($arResult["DISPLAY_PROPERTIES"][$key]);
}

// CANONICAL
$groups = CIBlockElement::GetElementGroups($arResult["ID"], true);
$groups_arr = array();
while($ar_group = $groups->Fetch())
{
	$groups_arr[]=$ar_group['ID'];
}
$cnt_section = count($arResult['SECTION']['PATH']);

/*if($cnt_section>1)
{ 	
    if($arResult['SECTION']['DEPTH_LEVEL']>1)
	{
		$arResult["CANONICAL_URL"] = "https://" . SITE_SERVER_NAME . $arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL'].$arResult['CODE']."/";
	}
}
else
{
	if($arResult['SECTION']['DEPTH_LEVEL']==1)
	{
		$SECTION_ID = $groups_arr[0];
		$res = CIBlockSection::GetByID($SECTION_ID);
		if($ar_res = $res->GetNext())
		{
			$arResult["CANONICAL_URL"] = "https://" . SITE_SERVER_NAME . $arResult['SECTION']['PATH'][0]['SECTION_PAGE_URL'].$arResult['CODE']."/";
		}
	}     
}*/

/*$dbProducers = CIBlockSection::GetList(array(), array("ID" => $arResult["PROPERTIES"]["PRODUCER"]["VALUE"], "IBLOCK_ID" => IBLOCK_BRAND_ID, "!UF_TXT_NOT_AVAILABLE" => false), false, array("ID", "UF_TXT_NOT_AVAILABLE"));
$arProducer = $dbProducers->Fetch();
if (!empty($arProducer)) {
	$arResult["TXT_NOT_AVAILABLE"] = $arProducer["UF_TXT_NOT_AVAILABLE"];
} else {
	$arResult["TXT_NOT_AVAILABLE"] = "Под заказ";
}*/
/*echo '<pre>';
print_r ( $arResult['SECTION']['PATH']);
echo '</pre>'; */
$obSecElement = CIBlockSection::GetList(array(), array("IBLOCK_ID" => $arResult['IBLOCK_ID'], "ID" => $arResult['IBLOCK_SECTION_ID']), false, array("ID", 'CODE', 'IBLOCK_ID', 'SECTION_PAGE_URL')) -> GetNext ();
$arResult["CANONICAL_URL"] = "https://" . SITE_SERVER_NAME . $obSecElement['SECTION_PAGE_URL'].$arResult['CODE']."/";

$arResult["TXT_NOT_AVAILABLE"] = "Под заказ<br/>*О сроках доставки уточняйте у менеджера интернет-магазина";


$this->__component->SetResultCacheKeys(array('CANONICAL_URL', "CACHED_TPL"));
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
if (!empty($arResult['ITEMS']))
{
	$templateLibrary = array('popup');
	$currencyList = '';
	if (!empty($arResult['CURRENCIES']))
	{
		$templateLibrary[] = 'currency';
		$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
	}
	$templateData = array(
		'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
		'TEMPLATE_CLASS' => 'section-popular',
		'TEMPLATE_LIBRARY' => $templateLibrary,
		'CURRENCIES' => $currencyList
	);
	unset($currencyList, $templateLibrary);

	$skuTemplate = array();
	if (!empty($arResult['SKU_PROPS']))
	{
		foreach ($arResult['SKU_PROPS'] as $arProp)
		{
			$propId = $arProp['ID'];
			$skuTemplate[$propId] = array(
				'SCROLL' => array(
					'START' => '',
					'FINISH' => '',
				),
				'FULL' => array(
					'START' => '',
					'FINISH' => '',
				),
				'ITEMS' => array()
			);
			$templateRow = '';
			if ('TEXT' == $arProp['SHOW_MODE'])
			{
				$skuTemplate[$propId]['SCROLL']['START'] = '<div class="bx_item_detail_size full" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';;
				$skuTemplate[$propId]['SCROLL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style=""></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style=""></div>'.
					'</div></div>';

				$skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_size" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_size_scroller_container"><div class="bx_size"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';;
				$skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'</div></div>';
				foreach ($arProp['VALUES'] as $value)
				{
					$value['NAME'] = htmlspecialcharsbx($value['NAME']);
					$skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="'.$propId.'_'.$value['ID'].
						'" data-onevalue="'.$value['ID'].'" style="width: #WIDTH#;" title="'.$value['NAME'].'"><i></i><span class="cnt">'.$value['NAME'].'</span></li>';
				}
				unset($value);
			}
			elseif ('PICT' == $arProp['SHOW_MODE'])
			{
				$skuTemplate[$propId]['SCROLL']['START'] = '<div class="bx_item_detail_scu full" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';
				$skuTemplate[$propId]['SCROLL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style=""></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style=""></div>'.
					'</div></div>';

				$skuTemplate[$propId]['FULL']['START'] = '<div class="bx_item_detail_scu" id="#ITEM#_prop_'.$propId.'_cont">'.
					'<span class="bx_item_section_name_gray">'.htmlspecialcharsbx($arProp['NAME']).'</span>'.
					'<div class="bx_scu_scroller_container"><div class="bx_scu"><ul id="#ITEM#_prop_'.$propId.'_list" style="width: #WIDTH#;">';
				$skuTemplate[$propId]['FULL']['FINISH'] = '</ul></div>'.
					'<div class="bx_slide_left" id="#ITEM#_prop_'.$propId.'_left" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'<div class="bx_slide_right" id="#ITEM#_prop_'.$propId.'_right" data-treevalue="'.$propId.'" style="display: none;"></div>'.
					'</div></div>';
				foreach ($arProp['VALUES'] as $value)
				{
					$value['NAME'] = htmlspecialcharsbx($value['NAME']);
					$skuTemplate[$propId]['ITEMS'][$value['ID']] = '<li data-treevalue="'.$propId.'_'.$value['ID'].
						'" data-onevalue="'.$value['ID'].'" style="width: #WIDTH#; padding-top: #WIDTH#;"><i title="'.$value['NAME'].'"></i>'.
						'<span class="cnt"><span class="cnt_item" style="background-image:url(\''.$value['PICT']['SRC'].'\');" title="'.$value['NAME'].'"></span></span></li>';
				}
				unset($value);
			}
		}
		unset($templateRow, $arProp);
	}

	if ($arParams["DISPLAY_TOP_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}

	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
?>

<section class="<?=$templateData['TEMPLATE_CLASS']?>">
	<h2 class="headline-border">С этим товаром также покупают</h2>
	<div class="slider-single">
		<?
		foreach ($arResult['ITEMS'] as $key => $arItem)
		{
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
			$strMainID = $this->GetEditAreaId($arItem['ID']);

			$arItemIDs = array(
				'ID' => $strMainID,
				'PICT' => $strMainID.'_pict',
				'SECOND_PICT' => $strMainID.'_secondpict',
				'STICKER_ID' => $strMainID.'_sticker',
				'SECOND_STICKER_ID' => $strMainID.'_secondsticker',
				'QUANTITY' => $strMainID.'_quantity',
				'QUANTITY_DOWN' => $strMainID.'_quant_down',
				'QUANTITY_UP' => $strMainID.'_quant_up',
				'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
				'BUY_LINK' => $strMainID.'_buy_link',
				'BASKET_ACTIONS' => $strMainID.'_basket_actions',
				'NOT_AVAILABLE_MESS' => $strMainID.'_not_avail',
				'SUBSCRIBE_LINK' => $strMainID.'_subscribe',
				'COMPARE_LINK' => $strMainID.'_compare_link',

				'PRICE' => $strMainID.'_price',
				'DSC_PERC' => $strMainID.'_dsc_perc',
				'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',
				'PROP_DIV' => $strMainID.'_sku_tree',
				'PROP' => $strMainID.'_prop_',
				'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
				'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
			);

			$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);

			$productTitle = (
				isset($arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])&& $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'] != ''
				? $arItem['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
				: $arItem['NAME']
			);
			$imgTitle = (
				isset($arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']) && $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE'] != ''
				? $arItem['IPROPERTY_VALUES']['ELEMENT_PREVIEW_PICTURE_FILE_TITLE']
				: $arItem['NAME']
			);

			$minPrice = false;
			if (isset($arItem['MIN_PRICE']) || isset($arItem['RATIO_PRICE']))
				$minPrice = (isset($arItem['RATIO_PRICE']) ? $arItem['RATIO_PRICE'] : $arItem['MIN_PRICE']);
		?>
			<div>
				<a href="" class="visual ajax_stop">
					<img src="<? echo $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="<?=$imgTitle?>"/>
					<span class="text-available">Доступно в 5 магазинах</span>
					<span class="article">Артикул: NC2444</span>
				</a>
				<div class="text-block">
					<span class="tablet-text article">Артикул: NC2444</span>
					<span class="qty">Количество: 23</span>
					<strong class="title"><a class="ajax_stop" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></strong>
					<span class="tablet-text available">В наличии</span>
					<strong class="price text-orange"><?=$minPrice?></strong>
					<a class="btn-buy" href=""><span class="center">Купить</span></a>
				</div>
			</div>
		<?
		}
		?>
	</div>
</section>
<?
}
?>
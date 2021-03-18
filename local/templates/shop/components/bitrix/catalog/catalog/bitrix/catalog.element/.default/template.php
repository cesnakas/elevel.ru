<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;
//Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/detect_swipe/2.1.4/jquery.detect_swipe.js");
ob_start();

use \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Text\Encoding;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES'])) {
    $templateLibrary[] = 'currency';
    $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
    'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
    'TEMPLATE_LIBRARY' => $templateLibrary,
    'CURRENCIES' => $currencyList,
    'ITEM' => array(
        'ID' => $arResult['ID'],
        'IBLOCK_ID' => $arResult['IBLOCK_ID'],
        'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
        'JS_OFFERS' => $arResult['JS_OFFERS']
    )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
    'ID' => $mainId,
    'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
    'STICKER_ID' => $mainId . '_sticker',
    'BIG_SLIDER_ID' => $mainId . '_big_slider',
    'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
    'SLIDER_CONT_ID' => $mainId . '_slider_cont',
    'OLD_PRICE_ID' => $mainId . '_old_price',
    'PRICE_ID' => $mainId . '_price',
    'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
    'PRICE_TOTAL' => $mainId . '_price_total',
    'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
    'QUANTITY_ID' => $mainId . '_quantity',
    'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
    'QUANTITY_UP_ID' => $mainId . '_quant_up',
    'QUANTITY_MEASURE' => $mainId . '_quant_measure',
    'QUANTITY_LIMIT' => $mainId . '_quant_limit',
    'BUY_LINK' => $mainId . '_buy_link',
    'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
    'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
    'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
    'COMPARE_LINK' => $mainId . '_compare_link',
    'TREE_ID' => $mainId . '_skudiv',
    'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
    'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
    'OFFER_GROUP' => $mainId . '_set_group_',
    'BASKET_PROP_DIV' => $mainId . '_basket_prop',
    'SUBSCRIBE_LINK' => $mainId . '_subscribe',
    'TABS_ID' => $mainId . '_tabs',
    'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
    'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
    'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);

$articul = $arResult['DISPLAY_PROPERTIES']["MARKING_PRODUCER"]["DISPLAY_VALUE"];
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
    : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
    : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
    ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
    : $arResult['NAME'];


$haveOffers = !empty($arResult['OFFERS']);
$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;

$skuProps = array();
$price = $arResult['ITEM_PRICES'][$arResult['ITEM_PRICE_SELECTED']];
$measureRatio = $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['CATALOG_SUBSCRIBE'] === 'Y');

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
    'left' => 'product-item-label-left',
    'center' => 'product-item-label-center',
    'right' => 'product-item-label-right',
    'bottom' => 'product-item-label-bottom',
    'middle' => 'product-item-label-middle',
    'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

?>

    <div itemscope itemtype="http://schema.org/Product" class="overflow">
        <form action="#">
            <fieldset>
                <section class="product-top clearfix" id="product_top" data-product_id="<?= $arResult["ID"] ?>">
                    <header class="heading clearfix">
                        <h1 itemprop="name"><?= $name ?></h1>
                        <? $articulPart = "RM17";
                        $namePart = "XB5 ������";
                        if (strpos($articul, $articulPart) !== false || strpos($name, $namePart) !== false) { ?>
                            <h1 style="color:red;font-weight: 700;">�����, ������ 15%</h1>
                        <? } ?>
                    </header>
					
					<? function does_url_exist($url) {

						$ch = curl_init(trim($url, " "));

						curl_setopt($ch, CURLOPT_NOBODY, true);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_exec($ch);
						$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
							//echo $code;
						if ($code == 200) {
							$status = true;
						} else {
							$status = false;
						}
							//print curl_error($ch);
						curl_close($ch);
						return $status;
}
                    ?>

					<div class="mainAttributes-section-merge__lm">
                        <div class="mainAttributes-section__left">
							<div class="product-slider__wrapper">
								<?if (count($arResult['PROPERTIES']["IMAGES"]["VALUE"]) > 1/*!empty($arResult['PROPERTIES']["GALLERY"]["VALUE_THUMB"])*/): ?>
									<?$n = 1;?>
									<div class="product-slider--nav">
										<?/*
										<div class="slide" data-slide="<?echo $n++;?>">
											<div class="center">
												<img src="<?= $arResult["DETAIL_PICTURE"]["THUMB"] ?>" alt="<?= $name ?>"/>
											</div>
										</div>
										*/ ?>

										<?foreach($arResult['PROPERTIES']["IMAGES"]["VALUE"] as $i => $thumb_src): ?>
										<? 
										if (does_url_exist($thumb_src)): ?>
											<?
												$fileparts = pathinfo($thumb_src);
												$thumbFileName = $fileparts['dirname'] . "/" .$fileparts['filename'] . ".99999x55." .$fileparts['extension'];
											?>
											<?if ($fileparts['extension'] == 'jpeg' || $fileparts['extension'] == 'jpg' || $fileparts['extension'] == 'png' || $fileparts['extension'] == 'gif'): ?>
											<div class="slide" data-slide="<?echo $n++;?>">
													<div class="center">
														<img src="<?= $thumbFileName ?>" alt="<?= $name ?> ���� <?= ($i + 2) ?>"/>
													</div>
												</div>
											<?endif; ?>
										<?endif; ?>
										<?endforeach; ?>
									</div>
								<?else:?>
									<?$n = 1;?>
								<div style="display:none" class="product-slider--nav">
										<div class="slide" data-slide="<?echo $n++;?>">
											<div class="center">
												<img src="<?= $arResult["DETAIL_PICTURE"]["THUMB"] ?>" alt="<?= $name ?>"/>
											</div>
										</div>

										<?foreach($arResult['PROPERTIES']["GALLERY"]["VALUE_THUMB"] as $i => $thumb_src): ?>
										<div class="slide" data-slide="<?echo $n++;?>">
												<div class="center">
													<img src="<?= $thumb_src ?>" alt="<?= $name ?> ���� <?= ($i + 2) ?>"/>
												</div>
											</div>
										<?endforeach; ?>
									</div>
								<?endif; ?>
								<div class="product-slider">
									<?$n=1;?>
									<? /*
									<div class="slide" style="background-image:url(<?= $arResult['PROPERTIES']['IMAGES']['VALUE'][$n-1] //$arResult["DETAIL_PICTURE"]["SRC"] ?>)" data-slide="<?echo $n++;?>">
										<div class="center">
											<img src="<?= $arResult['PROPERTIES']['IMAGES']['VALUE'][$n-1]//$arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $name ?>"
												 itemprop="image"/>
										</div>
									</div>
									*/
									?>


									<?foreach ($arResult['PROPERTIES']["IMAGES"]["VALUE"] as $i => $img_src): 
										if (does_url_exist($img_src)): ?>
											<?
											$fileparts = pathinfo($img_src);
											?>
											<?if ($fileparts['extension'] == 'jpeg' || $fileparts['extension'] == 'jpg' || $fileparts['extension'] == 'png' || $fileparts['extension'] == 'gif'): ?>
												<? if($n == 1) {
                                                    if(strlen($arResult["DETAIL_PICTURE"]["SRC"]) > 0) {
                                                        $img_src = $arResult["DETAIL_PICTURE"]["SRC"];
                                                    }
                                                }
                                                ?>
												<div class="slide" style="background-image:url(<?= $img_src ?>)" alt="<?= $name ?> ���� <?= ($i + 2) ?>" data-slide="<?echo $n++;?>">
													<div class="center"> <? ?>
														<img src="<?= $img_src ?>" alt="<?= $name ?> ���� <?= ($i + 2) ?>"/>
													</div>
												</div>
											<?endif; ?>
										<?endif; ?>
									<?endforeach; ?>
	
								</div>
							</div>
                        </div>
                        <div class="mainAttributes">
							<div><? //print_r($arResult['PROPERTIES']['IMAGES']) ?>
                                <div class="jce-section-head jce-v-center">
                                    <strong class="mainAttributes-section-title">�������� ��������������</strong>
                                </div>
                                <?
                                $count_properties = count($arResult['DISPLAY_PROPERTIES']);
                                $count_properties_show = 8;
                                $count_properties_start = 3;
                                if($count_properties <= $count_properties_show + $count_properties_start){
                                    $count_properties_show = $count_properties;
                                }
                                $k = 0;
                                foreach ($arResult['DISPLAY_PROPERTIES'] as $property) {
                                    if ($k == 0) echo "<ul>";

                                    if ($k == ($count_properties_show + $count_properties_start)) echo '</ul>
                                    <div class="jce-mainAttributes-toAll">
                                    <a class="jce-link" href="javascript:void(0);">��� ��������������</a>
                                    <ul class="slide-block" style="display:none;">';
                                    ?>
                                    <? $cellBack = 'odd';
                                    if ($k % 2 == 0) $cellBack = 'even';
                                    if ($k >= ($count_properties_start) && $k < ($count_properties_show + $count_properties_start)) echo '
                                        <li class="mainAttributes-cell__container ' . $cellBack . '">
                                            <div class="mainAttributes-cell__left">
                                                ' . $property['NAME'] . '
                                            </div>
                                            <div class="mainAttributes-cell__right">
                                                <strong>
                                                   ' . (is_array($property['DISPLAY_VALUE'])
                                                        ? implode(' / ', $property['DISPLAY_VALUE'])
                                                        : $property['DISPLAY_VALUE']) . '
                                                </strong>
                                             </div>
                                        </li>
                                '
                                    ?>
                                    <?
                                    $k++;
                                }
                                unset($property);
                                echo '<a class="jce-link" href="javascript:void(0);">��� ��������������</a> ';

                                if ($k > 0 && $k <= $count_properties_show) echo "</ul>";
                                elseif ($k > $count_properties_show) echo "</ul></div>";
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="text-block">


                        <?
                        $ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues($arResult["IBLOCK_ID"], $arResult["ID"]);
                        $arResult["IPROPERTY_VALUES"] = $ipropValues->getValues();
                        ?>
                        <div itemprop="description"
                             style="display:none;"><?= $arResult["IPROPERTY_VALUES"]['ELEMENT_META_DESCRIPTION'] ?></div>

                        <? if ($price['BASE_PRICE'] > 0): ?>
                            <div class="jce-section-head jce-v-start">
                                <div class="row-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <strong class="price">
                                        <? // <span class="desktop-text">����:</span> ?>
										<?if ($arResult["PROPERTIES"]["RAZPRODAZHA"]["VALUE"]=="Y"):?>
											<span class="old-price" id="price<?=$arItem["ID"]?>">
												<?$arItemSale=1.5*$price['BASE_PRICE']?>
												<?=number_format($arItemSale, 2, ".", " ")?>&nbsp���.
											</span><br>
										<?endif;?>
                                        <span id="price" class="price-number"
                                              itemprop="price"><?= number_format($price['BASE_PRICE'], 2, ".", " ") ?></span><span
                                                class="price-appendix"> ���.</span></strong>
                                    <span itemprop="priceCurrency" class="hide">RUB</span>

                                    <? if ($arResult['SHOPS'][MAIN_STORE_ID]['AMOUNT'] != 0): ?>
                                        <link itemprop="availability" href="http://schema.org/InStock">
                                    <? else: ?>
                                        <link itemprop="availability" href="http://schema.org/OutOfStock">
                                    <? endif; ?>

                                    <? if ($showDiscount34 == "59565656565656565"): ?>
                                        <del class="old-price"><?= $price['PRINT_RATIO_PRICE'] ?></del>
                                    <? endif; ?>
                                </div>
                            </div>
							<div class="notesum" style="margin: inherit;">���� ������������� ������ ��� ���������� ������ ����� ����</div>
                        <? endif; ?>

                        <div style="display:none">
                            <?
                            $APPLICATION->IncludeComponent(
                                "intervolga:conversionpro.productdetail",
                                "",
                                Array(
                                    "CURRENCY" => "RUB",
                                    "ID" => $arResult['ID'],
                                    "NAME" => $name,
                                    "PRICE" => $price['BASE_PRICE']
                                )
                            ); ?>
                        </div>
                        <div class="mainAttributes-section__right">
                            <div class="jce-mobile-row">
                                <div class="row-delivery row-info jce-row odd">
                                    <strong>������� :</strong>
                                    <?//if( $arResult['SHOPS'][MAIN_STORE_ID]['AMOUNT'] != 0 ):?>
									<?//print_r($arResult["SHOPS"]); ?>
                                    <? 
                                    if ($arResult["CATALOG_QUANTITY"] > 0): ?>
                                        <a href="javascript:void(0);" class="ui-pseudolink availability-link">
                                        <span class="ui-pseudolink"> �
                                            <span class="stock-shops-number">
                                            <?
                                            $j = 0;
                                            foreach ($arResult["SHOPS"] as $store) {
												if($store["AMOUNT"] > 0){
													$j++;
												}
                                            }
                                            echo $j;
                                            ?>
                                            </span>
                                            <?= ($j == 1) ? " ��������" : " ���������" ?>
											<? //echo $j; ?>
                                        </span>
                                        </a>
                                    <? else: ?>
                                        <span class="">��� �����<? //<?=$arResult["TXT_NOT_AVAILABLE"]?></span>
                                    <? endif; ?>
                                </div>
                                <div class="row-info jce-row even">
                                    <strong>��������
                                        :</strong> <?= ($arResult["CATALOG_QUANTITY"] > 0) ? " 3-5 ����" : " �� ��������� ���������" ?>
                                </div>
                            </div>
                            <div class="jce-mobile-row " id="jce-info-movable">

                                <?
                                if ($arResult['DISPLAY_PROPERTIES']["MARKING_PRODUCER"]["DISPLAY_VALUE"]): ?>
                                    <div class="row-info jce-row odd">
                                        <strong>������� :</strong>
                                        <div id="articul"
                                             class="jce-display-ib"><?= $arResult['DISPLAY_PROPERTIES']["MARKING_PRODUCER"]["DISPLAY_VALUE"] ?></div>
                                    </div>
                                <? endif; ?>
                                <?
                                unset($arResult['DISPLAY_PROPERTIES']["MARKING_PRODUCER"]); ?>

                                <?
                                if ($producer_id = $arResult['DISPLAY_PROPERTIES']["PRODUCER"]["VALUE"]): ?>
                                    <div class="row-info jce-row even">
                                        <strong>������������� :</strong>
                                        <?
                                        // ticket 5745 hide brand logo
                                        /*if ($arResult['DISPLAY_PROPERTIES']["PRODUCER"]["LINK_SECTION_VALUE"][$producer_id]["PICTURE"]):?>
                                            <a href="<?=$arResult['DISPLAY_PROPERTIES']["PRODUCER"]["LINK_SECTION_VALUE"][$producer_id]["SECTION_PAGE_URL"]?>">
                                                <img src="<?=$arResult['DISPLAY_PROPERTIES']["PRODUCER"]["LINK_SECTION_VALUE"][$producer_id]["PICTURE"]?>">
                                            </a>
                                        <?endif;*/ ?>
                                        <span class="ui-pseudolink"><?= $arResult['DISPLAY_PROPERTIES']["PRODUCER"]["DISPLAY_VALUE"] ?></span>
                                    </div>
                                <? endif; ?>
                                <?
                                unset($arResult['DISPLAY_PROPERTIES']["PRODUCER"]); ?>

                                <?
                                if ($arResult['DISPLAY_PROPERTIES']["SERIES"]["DISPLAY_VALUE"]): ?>
                                    <div class="row-info jce-row odd">
                                        <strong>����� :</strong>
                                        <span class="ui-pseudolink"><?= $arResult['DISPLAY_PROPERTIES']["SERIES"]["DISPLAY_VALUE"] ?></span>
                                    </div>
                                <? endif; ?>
                                <?
                                unset($arResult['DISPLAY_PROPERTIES']["SERIES"]); ?>

                                <?
                                if ($instructionID = $arResult['PROPERTIES']["INSTRUCTION"]["VALUE"]):
                                $instructionPath = CFile::GetPath($instructionID);
                                ?>
                                <div class="row-info jce-row even">
                                    <strong>���������� :</strong> <a href="<?= $instructionPath ?>" target="_blank">�������</a>
                                </div>

                            </div>
                            <?
                            endif; ?>

                        </div>
                        <div class="jce-counter-container">
                            <div class="row-info jce-row counter">
                                <input readonly class="spinner" type="text" data-multiplicity="<?= $measureRatio ?>"
                                       id="<?= $itemIds['QUANTITY_ID'] ?>" value="<?= $price['MIN_QUANTITY'] ?>"/>
                                <span class="item_measure"><?= $arResult["ITEM_MEASURE"]["TITLE"] ?></span>
                            </div>

                            <? if ($price['BASE_PRICE'] > 0): ?>

                                <?
                                $totalPrice = $price['BASE_PRICE'];

                                if (intval($price['MIN_QUANTITY']) > 1) {
                                    $totalPrice *= intval($price['MIN_QUANTITY']);
                                }
                                ?>

                                <div class="jce-total-container">
                                    <strong class="total upper">�����:</strong>
                                    <strong class="total lower"> <?= number_format($totalPrice, 2, ".", " ") ?>
                                        ���.</strong>
                                </div>
                            <? endif; ?>
                        </div>


                        <div class="row-buttons jce-submit-container" id="jce-single-submit">
                            <button class="jce-button jce-submit-left add2basket" type="button">
                                <span class="cssload-container"><span
                                            class="cssload-loading"><i></i><i></i><i></i><i></i></span></span>
                                <span class="button-title">������</span>
                            </button>


                            <?
                            // 21.09.2017, ownedmuhaha
                            // #7860
                            ?>
                            <?
                            $arUserData = Array();

                            if ($USER->IsAuthorized()) {
                                $userId = $USER->GetID();

                                $arUserFilter = Array(
                                    'ID' => $userId
                                );
                                $arUserSelect = Array(
                                    'FIELDS' => Array(
                                        'NAME',
                                        'LAST_NAME',
                                        'SECOND_NAME',
                                        'EMAIL',
                                        'PERSONAL_PHONE'
                                    )
                                );
                                $dbUser = CUser::GetList($by = '', $order = '', $arUserFilter, $arUserSelect);
                                if ($arUser = $dbUser->Fetch()) {
                                    $arUserName = Array();
                                    $arUserName[] = $arUser['LAST_NAME'];
                                    $arUserName[] = $arUser['NAME'];
                                    $arUserName[] = $arUser['SECOND_NAME'];
                                    $arUserData['NAME'] = trim(implode(' ', $arUserName));
                                    $arUserData['PHONE'] = $arUser['PERSONAL_PHONE'];
                                    $arUserData['EMAIL'] = $arUser['EMAIL'];
                                }
                            }

                            // $arResult['DISPLAY_PROPERTIES']["MARKING_PRODUCER"]["DISPLAY_VALUE"] != "774420" ||
                            ?>
                            <? /*
							<a id="credit-button" href="#buy-one-click" class="button white lightbox-open <?=($totalPrice < 3000)?"hide":""?>" style="padding: 10px 20px;">������ � ���������</a>
							*/ ?>
                            <? /*<a id="buy-one-click-button" class="button white lightbox-open" href="#buy-one-click" style="padding: 10px 20px;">������ � 1 ����</a>*/ ?>


                            <div id="buy-one-click" class="lightbox" style="display: none;">
                                <h3>������ � 1 ����</h3>
                                <form action="" method="post">
                                    <fieldset>
                                        <div class="input-holder required">
                                            <input required name="name" placeholder="���" type="text"
                                                   value="<?= $arUserData['NAME'] ?>"/>
                                        </div>
                                        <div class="input-holder required">
                                            <input class="phone-mask" required name="phone"
                                                   placeholder="���������� �������" type="text"
                                                   value="<?= $arUserData['PHONE'] ?>"/>
                                        </div>
                                        <div class="input-holder required">
                                            <input required name="email" placeholder="E-mail" type="text"
                                                   value="<?= $arUserData['EMAIL'] ?>"/>
                                        </div>
                                        <div class="input-holder">
                                            <textarea style="height: 190px;" placeholder="����������� � ������"
                                                      cols="30" rows="10"></textarea>
                                        </div>

                                        #CAPTCHA_DIV#

                                        <div class="input-holder error-holder"
                                             style="color: #fd7621; display: none;"></div>
                                        <input id="credit-flag" type="hidden" name="credit" value="N">
                                        <button class="button" type="submit">������</button>
                                        <span class="note">�������� �����, � ����������� ���� �������� �� ��������� �� ��������, e-mail ��� sms ���������� �� ���������� � ���������� ������, �������� �� ��������� ���� ������������ ������.</span>
                                        <input type="hidden" name="item-id" value="<?= $arResult['ID'] ?>"/>
                                    </fieldset>
                                </form>
                            </div>

                            <div class="jce-button jce-submit-right availability-link"><a href="javascript:void(0);">���������
                                    �������</a>
                            </div>

                            <? // <div class="catalog-card-buy-notes">������������ � ������� ��� ������ ������ ����� ���������� �� �������������� �� �����</div> ?>
                            <?
                            //------------------------
                            ?>

                        </div>
                        <div class="item-modal" id="modal<?= $arResult["ID"] ?>">
                            <div class="item-modal-close"></div>
                            <h3>����� �������� � �������</h3>
                            <a href="" class="item-modal-link-close">��������� � �������</a>
                            <a href="<?= $arParams['BASKET_URL'] ?>" class="confirm">������� � ���������� ������</a>
                        </div>
                    </div>
                </section>
            </fieldset>
        </form>
        <? if ($totalPrice) { ?>
            <? /*<form id="credit-form" class="hide" action="https://loans-qa.tcsbank.ru/api/partners/v1/lightweight/create" method="post">*/ ?>
            <form id="credit-form" class="hide" action="https://loans.tinkoff.ru/api/partners/v1/lightweight/create"
                  method="post">
                <? /*<input name="shopId" value="test_online" type="hidden">*/ ?>
                <input name="shopId" value="schneider-24" type="hidden">
                <? /*<input name="showcaseId" value="test_online" type="hidden">*/ ?>
                <input name="showcaseId" value="elevel" type="hidden">
                <input name="promoCode" value="installment_0_0_6" type="hidden">
                <input id="credit-sum" name="sum" value="<?= number_format($totalPrice, 2, ".", "") ?>" type="hidden">
                <input name="itemName_0" value="<?= Encoding::convertEncoding($name, 'Windows-1251', 'UTF-8') ?>"
                       type="hidden">
                <input id="itemQuantity_0" name="itemQuantity_0" value="<?= $price['MIN_QUANTITY'] ?>" type="hidden">
                <input name="itemPrice_0" value="<?= number_format($price['BASE_PRICE'], 2, ".", "") ?>" type="hidden">
                <? if ($USER->IsAuthorized()) { ?>
                    <input name="customerEmail" value="<?= $arUserData['EMAIL'] ?>" type="hidden">
                    <input name="customerPhone" value="<?= $arUserData['PHONE'] ?>" type="hidden">
                <? } ?>
                <input type="submit" value="���� � ������">
            </form>
        <? } ?>

        <div class="jce-allInfo-container">
            <ul class="product-tabset">
                <li>
                    <svg class="jce-svg-icon" viewBox="0 0 20 20">
                        <path fill="none" d="M1.683,3.39h16.676C18.713,3.39,19,3.103,19,2.749s-0.287-0.642-0.642-0.642H1.683
								c-0.354,0-0.641,0.287-0.641,0.642S1.328,3.39,1.683,3.39z M1.683,7.879h11.545c0.354,0,0.642-0.287,0.642-0.641
								s-0.287-0.642-0.642-0.642H1.683c-0.354,0-0.641,0.287-0.641,0.642S1.328,7.879,1.683,7.879z M18.358,11.087H1.683
								c-0.354,0-0.641,0.286-0.641,0.641s0.287,0.642,0.641,0.642h16.676c0.354,0,0.642-0.287,0.642-0.642S18.713,11.087,18.358,11.087z
								 M11.304,15.576H1.683c-0.354,0-0.641,0.287-0.641,0.642s0.287,0.641,0.641,0.641h9.621c0.354,0,0.642-0.286,0.642-0.641
								S11.657,15.576,11.304,15.576z"></path>
                    </svg>
                    <a class="active" href="#product-tab0">��������</a></li>
                <li>
                    <svg class="jce-svg-icon" viewBox="0 0 20 20">
                        <path fill="none" d="M15.808,14.066H6.516v-1.162H5.354v1.162H4.193c-0.321,0-0.581,0.26-0.581,0.58s0.26,0.58,0.581,0.58h1.162
								v1.162h1.162v-1.162h9.292c0.32,0,0.58-0.26,0.58-0.58S16.128,14.066,15.808,14.066z M15.808,9.419h-1.742V8.258h-1.162v1.161
								h-8.71c-0.321,0-0.581,0.26-0.581,0.581c0,0.321,0.26,0.581,0.581,0.581h8.71v1.161h1.162v-1.161h1.742
								c0.32,0,0.58-0.26,0.58-0.581C16.388,9.679,16.128,9.419,15.808,9.419z M17.55,0.708H2.451c-0.962,0-1.742,0.78-1.742,1.742v15.1
								c0,0.961,0.78,1.74,1.742,1.74H17.55c0.962,0,1.742-0.779,1.742-1.74v-15.1C19.292,1.488,18.512,0.708,17.55,0.708z M18.13,17.551
								c0,0.32-0.26,0.58-0.58,0.58H2.451c-0.321,0-0.581-0.26-0.581-0.58v-15.1c0-0.321,0.26-0.581,0.581-0.581H17.55
								c0.32,0,0.58,0.26,0.58,0.581V17.551z M15.808,4.774H9.419V3.612H8.258v1.162H4.193c-0.321,0-0.581,0.26-0.581,0.581
								s0.26,0.581,0.581,0.581h4.065v1.162h1.161V5.935h6.388c0.32,0,0.58-0.26,0.58-0.581S16.128,4.774,15.808,4.774z"></path>
                    </svg>
                    <a href="#product-tab1">��������������</a></li>
                <li>
                    <svg class="jce-svg-icon" viewBox="0 0 20 20">
                        <path fill="none" d="M10.292,4.229c-1.487,0-2.691,1.205-2.691,2.691s1.205,2.691,2.691,2.691s2.69-1.205,2.69-2.691
								S11.779,4.229,10.292,4.229z M10.292,8.535c-0.892,0-1.615-0.723-1.615-1.615S9.4,5.306,10.292,5.306
								c0.891,0,1.614,0.722,1.614,1.614S11.184,8.535,10.292,8.535z M10.292,1C6.725,1,3.834,3.892,3.834,7.458
								c0,3.567,6.458,10.764,6.458,10.764s6.458-7.196,6.458-10.764C16.75,3.892,13.859,1,10.292,1z M4.91,7.525
								c0-3.009,2.41-5.449,5.382-5.449c2.971,0,5.381,2.44,5.381,5.449s-5.381,9.082-5.381,9.082S4.91,10.535,4.91,7.525z"></path>
                    </svg>
                    <a href="#availability">������� � ���������</a></li>
            </ul>
            <div class="product-tabs-content jce-product-tabs">
                <div id="product-tab0" class="product-open-close">
                    <div class="item-description">������ �������� ������������ <?= $name ?>. ����� ���������� �����,
                        �������� ��� � ������� � �������� �����. �������� �������������� �� ������ � ���� ������.
                    </div>

                </div>
                <div id="product-tab1" class="product-open-close">
                    <strong class="tab-title">��������������</strong>
                    <div class="slide-block">
                        <div class="columns-features">
                            <aside class="left-column">

                                <? $count_properties = count($arResult['DISPLAY_PROPERTIES']);
                                $count_properties_show = 15;
                                $i = 0;
                                echo '<div class="jce-allAttributes-wrapper">';
                                $nextFirst = 0;
                                foreach ($arResult['DISPLAY_PROPERTIES'] as $property) {

                                    if ($i == 0) echo '<ul class="jce-left">';
                                    /*if ($i == $count_properties_show) echo '</ul>
                                    <div class="open-close">
                                        <a class="opener" href="">�������� ��� '. ($count_properties - $count_properties_show) . '</a>
                                        <ul class="slide-block" style="display:none;">';
                                    */


                                    $cellBack = 'odd';
                                    if ($i % 2 == 0) $cellBack = 'even';
                                    if ($i == ceil(($count_properties - 1) / 2)) $nextFirst = 1;
                                    if ($nextFirst == 1 && $cellBack == 'even') {
                                        echo '</ul><ul class="jce-right">';
                                        $nextFirst = 0;
                                    }
                                    ?>
                                    <li class="jce-allAttributes <?= $cellBack ?>">
                                        <div class="cell left"><?= $property['NAME'] ?>
                                        </div>
                                        <div class="cell right">
                                            <?= (is_array($property['DISPLAY_VALUE'])
                                                ? implode(' / ', $property['DISPLAY_VALUE'])
                                                : $property['DISPLAY_VALUE']) ?>

                                        </div>
                                    </li>
                                    <?

                                    $i++;

                                }
                                unset($property);

                                //if ($i > 0 /* && $i <= $count_properties_show */) echo "</ul>";
                                if ($i == $count_properties ) echo "</ul></div>";
                                //elseif ($i > $count_properties_show) echo "</ul></div>";
                                ?>
                            </aside>
                        <div class="text-block">

                            <?
                            if ($arResult["DETAIL_TEXT"]): ?>
                                <h2>��������</h2>
                                <span><?= $arResult["DETAIL_TEXT"] ?></span>


                            <? endif; ?>

                            <?
                            if ($url = $arResult["PROPERTIES"]["YOUTUBE"]["VALUE"]): ?>
                                <h2>�����</h2>
                                <div class="block-video">
                                    <iframe class="youtube" src="<?= $url ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="availability" class="product-open-close">
                <strong class="tab-title">������� � ���������</strong>
                <div class="slide-block">
                    <h2>�������� � ��������� <span class="text-orange">ELEVEL</span></h2>
                    <div class="item-description"><?= $arResult["IPROPERTY_VALUES"]['ELEMENT_META_DESCRIPTION'] ?></div>
                    <font class="store-notes">����������� ��������� ������� �� ��������! <a class="roistattel"
                                                                                            href="tel:8 (495) 134-25-21">8
                            (495) 134-25-21</a></font>
                    <div class="clearfix">
                        <table class="table-shops">
                            <tr>
                                <th>�����</th>
                                <th>�������</th>
                                <!--<th>��������</th>-->
                            </tr>
                            <?
                            foreach ($arResult["SHOPS"] as $id => $store): ?>
                                <tr class="store_info" data-city="<?= $store["UF_CITY"] ?>"
                                    data-address="<?= $store["ADDRESS"] ?>" data-gps_n="<?= $store["GPS_N"] ?>"
                                    data-gps_s="<?= $store["GPS_S"] ?>">
                                    <td>
                                        <div class="inner">
                                            <?= $store["TITLE"] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inner">
                                            <span class="tablet-hidden">���-��:</span> <?= $store["AMOUNT"] ?>
                                        </div>
                                    </td>
                                    <!--
							<td>
								<?
                                    if ($store["AMOUNT"] > 0): ?>
									<div class="inner">
										<a class="add2basket cssload-orange quantity_one" href="#"><span class="cssload-container"><span class="cssload-loading"><i></i><i></i><i></i><i></i></span></span><span class="button-title">������</span></a>
									</div>
								<? endif; ?>
							</td>
							-->
                                </tr>
                            <? endforeach; ?>
                        </table>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="recommended-wrapper">
        <?
        $APPLICATION->IncludeComponent("bitrix:catalog.element", "recommended", Array(
            "ACTION_VARIABLE" => "action",    // �������� ����������, � ������� ���������� ��������
            "ADD_DETAIL_TO_SLIDER" => "N",    // ��������� ��������� �������� � �������
            "ADD_ELEMENT_CHAIN" => "N",    // �������� �������� �������� � ������� ���������
            "ADD_PICT_PROP" => "-",    // �������������� �������� ��������� ������
            "ADD_PROPERTIES_TO_BASKET" => "Y",    // ��������� � ������� �������� ������� � �����������
            "ADD_SECTIONS_CHAIN" => "Y",    // �������� ������ � ������� ���������
            "ADD_TO_BASKET_ACTION" => array(    // ���������� ������ ���������� � ������� � �������
                0 => "BUY",
            ),
            "ADD_TO_BASKET_ACTION_PRIMARY" => array(    // �������� ������ ���������� � ������� � �������
                0 => "BUY",
            ),
            "BACKGROUND_IMAGE" => "-",    // ���������� ������� �������� ��� ������� �� ��������
            "BASKET_URL" => "/personal/basket.php",    // URL, ������� �� �������� � �������� ����������
            "BROWSER_TITLE" => "-",    // ���������� ��������� ���� �������� �� ��������
            "CACHE_GROUPS" => "Y",    // ��������� ����� �������
            "CACHE_TIME" => "36000000",    // ����� ����������� (���.)
            "CACHE_TYPE" => "A",    // ��� �����������
            "CHECK_SECTION_ID_VARIABLE" => "N",    // ������������ ��� ������ �� ����������, ���� �� ����� ������ ��������
            "COMPATIBLE_MODE" => "Y",    // �������� ����� �������������
            "COMPOSITE_FRAME_MODE" => "A",    // ����������� ������� ���������� �� ���������
            "COMPOSITE_FRAME_TYPE" => "AUTO",    // ���������� ����������
            "CONVERT_CURRENCY" => "N",    // ���������� ���� � ����� ������
            "DETAIL_PICTURE_MODE" => array(    // ����� ������ ��������� ��������
                0 => "POPUP",
                1 => "MAGNIFIER",
            ),
            "DETAIL_URL" => "",    // URL, ������� �� �������� � ���������� �������� �������
            "DISABLE_INIT_JS_IN_COMPONENT" => "N",    // �� ���������� js-���������� � ����������
            "DISPLAY_COMPARE" => "N",    // ��������� ��������� �������
            "DISPLAY_NAME" => "Y",    // �������� �������� ��������
            "DISPLAY_PREVIEW_TEXT_MODE" => "E",    // ����� �������� ��� ������
            "ELEMENT_CODE" => "",    // ��� ��������
            "ELEMENT_ID" => $arResult['ID'],//$_REQUEST["ELEMENT_ID"],	// ID ��������
            "GIFTS_DETAIL_BLOCK_TITLE" => "�������� ���� �� ��������",    // ����� ��������� "�������"
            "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",    // ������ ��������� "�������" � ��������� ���������
            "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",    // ���������� ��������� � ����� "�������" � ������ � ��������� ���������
            "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "�������",    // ����� ����� "�������" � ��������� ���������
            "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "�������� ���� �� �������, ����� �������� �������",    // ����� ��������� "������ � �������"
            "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",    // ������ ��������� "������ � �������" � ��������� ���������
            "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",    // ���������� ��������� � ����� "������ � �������" � ������ � ��������� ���������
            "GIFTS_MESS_BTN_BUY" => "�������",    // ����� ������ "�������"
            "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",    // ���������� ������� ������
            "GIFTS_SHOW_IMAGE" => "Y",    // ���������� �����������
            "GIFTS_SHOW_NAME" => "Y",    // ���������� ��������
            "GIFTS_SHOW_OLD_PRICE" => "Y",    // ���������� ������ ����
            "HIDE_NOT_AVAILABLE_OFFERS" => "N",    // ����������� �������� �����������
            "IBLOCK_ID" => "83",    // ��������
            "IBLOCK_TYPE" => "",    // ��� ���������
            "IMAGE_RESOLUTION" => "16by9",    // ����������� ������ ����������� ������
            "LABEL_PROP" => "",    // �������� ����� ������
            "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",    // URL �� ��������, ��� ����� ������� ������ ��������� ���������
            "LINK_IBLOCK_ID" => "",    // ID ���������, �������� �������� ������� � ������� ���������
            "LINK_IBLOCK_TYPE" => "",    // ��� ���������, �������� �������� ������� � ������� ���������
            "LINK_PROPERTY_SID" => "",    // ��������, � ������� �������� �����
            "MAIN_BLOCK_PROPERTY_CODE" => "",    // ��������, ������������ � ����� ������ �� ��������
            "MESSAGE_404" => "",    // ��������� ��� ������ (�� ��������� �� ����������)
            "MESS_BTN_ADD_TO_BASKET" => "� �������",    // ����� ������ "�������� � �������"
            "MESS_BTN_BUY" => "������",    // ����� ������ "������"
            "MESS_BTN_SUBSCRIBE" => "�����������",    // ����� ������ "��������� � �����������"
            "MESS_COMMENTS_TAB" => "�����������",    // ����� ������� "�����������"
            "MESS_DESCRIPTION_TAB" => "��������",    // ����� ������� "��������"
            "MESS_NOT_AVAILABLE" => "��� � �������",    // ��������� �� ���������� ������
            "MESS_PRICE_RANGES_TITLE" => "����",    // �������� ����� c ������������ ������
            "MESS_PROPERTIES_TAB" => "��������������",    // ����� ������� "��������������"
            "META_DESCRIPTION" => "-",    // ���������� �������� �������� �� ��������
            "META_KEYWORDS" => "-",    // ���������� �������� ����� �������� �� ��������
            "OFFERS_LIMIT" => "0",    // ������������ ���������� ����������� ��� ������ (0 - ���)
            "PARTIAL_PRODUCT_PROPERTIES" => "N",    // ��������� ��������� � ������� ������, � ������� ��������� �� ��� ��������������
            "PRICE_CODE" => "",    // ��� ����
            "PRICE_VAT_INCLUDE" => "Y",    // �������� ��� � ����
            "PRICE_VAT_SHOW_VALUE" => "N",    // ���������� �������� ���
            "PRODUCT_ID_VARIABLE" => "id",    // �������� ����������, � ������� ���������� ��� ������ ��� �������
            "PRODUCT_INFO_BLOCK_ORDER" => "sku,props",    // ������� ����������� ������ ���������� � ������
            "PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",    // ������� ����������� ������ ������� ������
            "PRODUCT_PROPERTIES" => "",    // �������������� ������
            "PRODUCT_PROPS_VARIABLE" => "prop",    // �������� ����������, � ������� ���������� �������������� ������
            "PRODUCT_QUANTITY_VARIABLE" => "quantity",    // �������� ����������, � ������� ���������� ���������� ������
            "PRODUCT_SUBSCRIPTION" => "Y",    // ��������� ���������� ��� ������������� �������
            "PROPERTY_CODE" => array(    // ��������
                0 => "",
                1 => "",
            ),
            "SECTION_CODE" => "",    // ��� �������
            "SECTION_ID" => "",    // ID �������
            "SECTION_ID_VARIABLE" => "SECTION_ID",    // �������� ����������, � ������� ���������� ��� ������
            "SECTION_URL" => "",    // URL, ������� �� �������� � ���������� �������
            "SEF_MODE" => "N",    // �������� ��������� ���
            "SET_BROWSER_TITLE" => "Y",    // ������������� ��������� ���� ��������
            "SET_CANONICAL_URL" => "N",    // ������������� ������������ URL
            "SET_LAST_MODIFIED" => "N",    // ������������� � ���������� ������ ����� ����������� ��������
            "SET_META_DESCRIPTION" => "Y",    // ������������� �������� ��������
            "SET_META_KEYWORDS" => "Y",    // ������������� �������� ����� ��������
            "SET_STATUS_404" => "N",    // ������������� ������ 404
            "SET_TITLE" => "Y",    // ������������� ��������� ��������
            "SET_VIEWED_IN_COMPONENT" => "N",    // �������� ���������� ���������� � ��������� ������ ��� ������ ��������
            "SHOW_404" => "N",    // ����� ����������� ��������
            "SHOW_CLOSE_POPUP" => "N",    // ���������� ������ ����������� ������� �� ����������� �����
            "SHOW_DEACTIVATED" => "N",    // ���������� ���������������� ������
            "SHOW_DISCOUNT_PERCENT" => "N",    // ���������� ������� ������
            "SHOW_MAX_QUANTITY" => "N",    // ���������� ������� ������
            "SHOW_OLD_PRICE" => "N",    // ���������� ������ ����
            "SHOW_PRICE_COUNT" => "1",    // �������� ���� ��� ����������
            "SHOW_SLIDER" => "N",    // ���������� ������� ��� �������
            "STRICT_SECTION_CHECK" => "N",    // ������� �������� ������� ��� ������ ��������
            "TEMPLATE_THEME" => "blue",    // �������� ����
            "USE_COMMENTS" => "N",    // �������� ������ � ������
            "USE_ELEMENT_COUNTER" => "Y",    // ������������ ������� ����������
            "USE_ENHANCED_ECOMMERCE" => "N",    // �������� �������� ������ � ����������� ��������
            "USE_GIFTS_DETAIL" => "Y",    // ���������� ���� "�������" � ��������� ���������
            "USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",    // ���������� ���� "������ � �������" � ��������� ���������
            "USE_MAIN_ELEMENT_SECTION" => "N",    // ������������ �������� ������ ��� ������ ��������
            "USE_PRICE_COUNT" => "N",    // ������������ ����� ��� � �����������
            "USE_PRODUCT_QUANTITY" => "N",    // ��������� �������� ���������� ������
            "USE_RATIO_IN_RANGES" => "N",    // ��������� ������������ ��� ���������� ���
            "USE_VOTE_RATING" => "N",    // �������� ������� ������
        ),
            false
        ); ?>
    </div>
    <br>
<?
unset($arResult, $itemIds, $jsParams);

$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>
<!--<script src="<?=$templateFolder?>/jquery.detect_swipe.js"></script>-->
<script src="<?=$templateFolder?>/swipe.js"></script>
<script>


</script>
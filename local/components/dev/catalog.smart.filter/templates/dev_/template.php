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

$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
);
?>
<div class="filter-mobile-head">
    <div class="filter-mobile-head__item">
        <button class="link link-w-icon" data-toggle="category-card-sidebar">
            <span class="icon">
              <svg class="icon-svg icon-svg--16">
                <use xlink:href="<?=TEMPLATE_ASSETS_PATH;?>/icons/sprite.svg#arrow-long-left"></use>
              </svg>
            </span>
            <span>Назад</span>
        </button>
    </div>
    <div class="filter-mobile-head__item">
        <div class="filter-mobile-head__title">Фильтр</div>
    </div>
    <div class="filter-mobile-head__item">
        <button class="link js-filters-reset">Сбросить</button>
    </div>
</div>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
<div class="filter-mobile__body">
        <?foreach($arResult["HIDDEN"] as $arItem):?>
            <input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
        <?endforeach;?>
        <?foreach($arResult["ITEMS"] as $key=>$arItem) {
            $key = $arItem["ENCODED_ID"];
            if(isset($arItem["PRICE"])):
            if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
                continue;

            $step_num = 4;
            $step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
            $prices = array();
            if (Bitrix\Main\Loader::includeModule("currency"))
            {
                for ($i = 0; $i < $step_num; $i++)
                {
                    $prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
                }
                $prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
            }
            else
            {
                $precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
                for ($i = 0; $i < $step_num; $i++)
                {
                    $prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
                }
                $prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
            }
        ?>
        <!-- catcard-filter-->
        <!--div class="catcard-filter catcard-filter--price js-catcard-filter is-active">

            <span class="bx-filter-container-modef right fxd"></span>

            <div class="catcard-filter__header">
                <div class="catcard-filter__title">Цена</div>
            </div>
            <div class="catcard-filter__body">
                <div class="price-range js-price-range">
                    <div class="price-range__inputs">
                        <label class="price-range-input"><span>От</span>
                            <input class="price-range-input__field input-text js-input-min js-input-number" onchange="smartFilter.keyup(this)" id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>" type="text" name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>" value="" placeholder="<?echo $arItem["VALUES"]["MIN"]['VALUE']?>" min="<?echo intval($arItem["VALUES"]["MIN"]['VALUE']);?>" max="<?echo intval($arItem["VALUES"]["MAX"]['VALUE']);?>"/>
                        </label>
                        <label class="price-range-input"><span>До</span>
                            <input class="price-range-input__field input-text js-input-max js-input-number" onchange="smartFilter.keyup(this)" id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>" type="text" name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>" value="" placeholder="<?echo $arItem["VALUES"]["MAX"]['VALUE']?>" min="<?echo intval($arItem["VALUES"]["MIN"]['VALUE']);?>" max="<?echo intval($arItem["VALUES"]["MAX"]['VALUE']);?>"/>
                        </label>
                    </div>
                    <div class="price-range__rangeslider">
                        <div class="range-slider" id="range-slider" data-min="<?echo intval($arItem["VALUES"]["MIN"]['VALUE']);?>" data-max="<?echo intval($arItem["VALUES"]["MAX"]['VALUE']);?>" data-start="<?echo intval($arItem["VALUES"]["MIN"]['VALUE']);?>" data-end="<?echo intval($arItem["VALUES"]["MAX"]['VALUE']);?>"></div>
                    </div>
                    <div class="price-range__range"><span><?echo intval($arItem["VALUES"]["MIN"]['VALUE']);?></span><span><?echo intval($arItem["VALUES"]["MAX"]['VALUE']);?></span></div>
                </div>
            </div>
        </div-->
        <?endif;
        }
        ?>
                    <?
                    //not prices
                    foreach($arResult["ITEMS"] as $key=>$arItem) {

                        if (
                            empty($arItem["VALUES"])
                            || isset($arItem["PRICE"])
                        )
                            continue;

                        if (
                            $arItem["DISPLAY_TYPE"] == "A"
                            && (
                                $arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
                            )
                        )
                            continue;
                        ?>

        <!-- catcard-filter-->
        <div class="catcard-filter js-catcard-filter is-active">

            <span class="bx-filter-container-modef right fxd"></span>

            <div class="catcard-filter__header">
                <div class="catcard-filter__title">
                    <a class="link-list js-rollup" href="javascript:;">
                        <span class="icon">
                            <svg class="icon-svg icon-svg--8">
                                <use xlink:href="<?=TEMPLATE_ASSETS_PATH?>/icons/sprite.svg#arrow-left"></use>
                            </svg>
                        </span>
                        <span><?=$arItem["NAME"];?></span>
                    </a>
                </div>
                <?/*<a class="catcard-filter__reset link js-reset" href="javascript:;">Сбросить</a>*/?>
                <span class="catcard-filter__status">Все</span>
            </div>
            <div class="catcard-filter__body">
                <div class="catcard-list js-filter-list">
                    <div class="catcard-list__field">
                        <input class="input-text search js-search" type="text" placeholder="Поиск по типу"/>
                    </div>
                    <div class="catcard-list__items list js-filter-ps">
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <div class="catcard-list__item">
                                <label class="checkbox"  data-role="label_<?=$ar["CONTROL_ID"]?>">
                                    <input
                                            class="checkbox__input"
                                            type="checkbox"
                                            value="<? echo $ar["HTML_VALUE"] ?>"
                                            name="<? echo $ar["CONTROL_NAME"] ?>"
                                            id="<? echo $ar["CONTROL_ID"] ?>"
                                        <? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
                                            onclick="smartFilter.click(this)"
                                    />
                                    <span class="checkbox__control">
                                        <span class="icon">
                                            <svg class="icon-svg icon-svg--16">
                                              <use xlink:href="<?=TEMPLATE_ASSETS_PATH?>/icons/sprite.svg#check"></use>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="checkbox__label name"><?=$ar["VALUE"];?> <?=((isset($ar["ELEMENT_COUNT"])) ? "(" . $ar["ELEMENT_COUNT"] . ")" : "")?></span>
                                </label>
                            </div>
                        <?endforeach;?>
                    </div>
                    <div class="catcard-list__footer"><a class="link js-expander" href="javascript:;">Показать все</a></div>
                </div>
            </div>
        </div>
                        <?
                    }
                    ?>
        <div class="bx-filter-block">
            <div class="bx-filter-parameters-box-container">
                <div class="bx-filter-popup-result  catcard-filter-reset <?if ($arParams["FILTER_VIEW_MODE"] == "VERTICAL") echo $arParams["POPUP_POSITION"]?>" id="modef" <?=(!isset($arResult["ELEMENT_COUNT"])) ? 'style="display:none; margin-bottom: 10px; text-align: left;"' : "style=\"display: block; margin-bottom: 10px; text-align: left;\"";?>>
                    <a href="<?echo $arResult["FILTER_URL"]?>" class="link js-filters-reset" target=""><?echo GetMessage("CT_BCSF_FILTER_SHOW")?> (<?echo GetMessage("CT_BCSF_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>)</a>
                </div>
            </div>
        </div>
        <div class="catcard-filter-reset">
            <input
                    class="link js-filters-reset"
                    type="submit"
                    id="del_filter"
                    name="del_filter"
                    value="Сбросить все фильтры"
            />
        </div>
        <?/*
        <div class="catcard-filter-reset">
            <input
                    class="filter-mobile-button link link--bold"
                    type="submit"
                    id="set_filter"
                    name="set_filter"
                    value="Применить фильтр"
            />
        </div>*/?>
</div>
    <input
            class="filter-mobile-button link link--bold"
            type="submit"
            id="set_filter"
            name="set_filter"
            value="Применить фильтр"
    />
</form>

<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>
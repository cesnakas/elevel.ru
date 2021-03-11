<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if( is_array($arResult["ITEMS"]) && !empty($arResult["ITEMS"])):?>



                    <h2 class="main-style-1">Последние <span>новости</span></h2>

                <div class="controls">
                    <button class="prev"><</button>
                    <button class="next">></button>
                </div>
                <div class="news-jcarousel-lite">
                    <ul>
                        <?foreach($arResult["ITEMS"] as $num => $arItem):?>

                            <?
                            $arItem["NAME"] = TruncateText($arItem["NAME"], 78);
                            $arItem["PREVIEW_TEXT"] = TruncateText($arItem["PREVIEW_TEXT"], 160);
                            ?>

                                <li>
                                    <time><?=$arItem["DISPLAY_ACTIVE_FROM"]?></time>
                                    <h3><?=$arItem["NAME"]?></h3>
                                    <div class="preview-text"><?=$arItem["PREVIEW_TEXT"]?></div>
                                    <a class="more-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">Читать далее</a>

                                </li>
                        <?endforeach?>
                    </ul>
                </div>

<?endif?>
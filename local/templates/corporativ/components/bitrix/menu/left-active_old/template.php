<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

//echo "<pre>".print_r($arResult, true)."</pre>";
?>
<? if (!empty($arResult)): ?>
    <? foreach ($arResult as $num => $arItem): ?>
        <li><a <?= ($arItem["SELECTED"] == 1) ? 'class="active_nav"' : '' ?> href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? /* ?><li><a href="#" >Архитектурным бюро, дизайнерам интерьеров</a></li><? */ ?>
    <? endforeach ?>
    <?
endif?>
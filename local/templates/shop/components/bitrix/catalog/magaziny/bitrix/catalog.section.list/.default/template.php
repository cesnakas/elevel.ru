<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
$this->setFrameMode(true);                        
?>
<ul class="contacts-city-filter">
<?
foreach($arResult['SECTIONS'] as $arKey => $arSection){    
    ?>
    <?if($arSection["ELEMENT_CNT"]>0):?>
    <li<?if($arSection["CODE"] == $arResult["CURRENT_SECT"]):?> class="active"<?endif?>>
        <a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
        <span><?=$arSection["ELEMENT_CNT"]?></span>
    </li>
    <?endif?>
    <? 
}
?>
</ul>
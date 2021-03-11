<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach ($this as $k=>$v) {
    $arResult[$k] = $v;
}
if(!$arResult["NavShowAlways"])
{
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
?>
<div class="modern-page-navigation">
<?
$strNavQueryString .= "&";
$strNavQueryString = str_replace("&amp;q", "q", $strNavQueryString);


?>
    <span class="modern-page-title">��������:</span>
<?
if($arResult["bDescPageNumbering"] === true):
    $bFirst = true;
    if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
        if($arResult["bSavePage"]):
?>
            
            <a class="modern-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">����������</a>
<?
        else:
            if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
?>
            <a class="modern-page-previous" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">����������</a>
<?
            else:
?>
            <a class="modern-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">����������</a>
<?
            endif;
        endif;
        
        if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
            $bFirst = false;
            if($arResult["bSavePage"]):
?>
            <a class="modern-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a>
<?
            else:
?>
            <a class="modern-page-first" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
<?
            endif;
            if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
            <span class="modern-page-dots">...</span>
<?*/
?>    
            <span class="modern-page-dots">...</span>
<?
            endif;
        endif;
    endif;
    do
    {
        $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
        
        if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
        <span class="<?=($bFirst ? "modern-page-first " : "")?>modern-page-current"><?=$NavRecordGroupPrint?></span>
<?
        elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
?>
        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>
<?
        else:
?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
            ?> class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$NavRecordGroupPrint?></a>
<?
        endif;
        
        $arResult["nStartPage"]--;
        $bFirst = false;
    } while($arResult["nStartPage"] >= $arResult["nEndPage"]);
    
    if ($arResult["NavPageNomer"] > 1):
        if ($arResult["nEndPage"] > 1):
            if ($arResult["nEndPage"] > 2):
/*?>
        <span class="modern-page-dots">...</span>
<?*/
?>
        <span class="modern-page-dots">...</span>
<?
            endif;
?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
<?
        endif;
    
?>
        <a class="modern-page-next"href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">���������</a>
<?
    endif; 

else:
    $bFirst = true;

    if ($arResult["NavPageNomer"] > 1):
        if($arResult["bSavePage"]):
?>
            <a class="modern-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">����������</a>
<?
        else:
            if ($arResult["NavPageNomer"] > 2):
?>
            <a class="modern-page-previous" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">����������</a>
<?
            else:
?>
            <a class="modern-page-previous" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">����������</a>
<?
            endif;
        
        endif;
        
        if ($arResult["nStartPage"] > 1):
            $bFirst = false;
            if($arResult["bSavePage"]):
?>
            <a class="modern-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
<?
            else:
?>
            <a class="modern-page-first" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>">1</a>
<?
            endif;
            if ($arResult["nStartPage"] > 2):
/*?>
            <span class="modern-page-dots">...</span>
<?*/
?>
            <span class="modern-page-dots">...</span>
<?
            endif;
        endif;
    endif;

    do
    {
        if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
        <span class="<?=($bFirst ? "modern-page-first " : "")?>modern-page-current"><?=$arResult["nStartPage"]?></span>
<?
        elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
        <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$arResult["nStartPage"]?></a>
<?
        else:
?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
            ?> class="<?=($bFirst ? "modern-page-first" : "")?>"><?=$arResult["nStartPage"]?></a>
<?
        endif;
        $arResult["nStartPage"]++;
        $bFirst = false;
    } while($arResult["nStartPage"] <= $arResult["nEndPage"]);
    
    if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
        if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
            if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
/*?>
        <span class="modern-page-dots">...</span>
<?*/
?>
        <span class="modern-page-dots">...</span>
<?
            endif;
?>
        <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
<?
        endif;
?>
        <a class="modern-page-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">���������</a>
<?
    endif;
endif;

?>
</div>
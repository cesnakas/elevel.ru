<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn .= '<ol class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

$catFlag = false;
for ($i = 0; $i < count($arResult); $i++) {
    if($arResult[$i]["LINK"] == "/"){
        $catFlag = true;
    }
    if($catFlag) {
        if($arResult[$i]["LINK"] == "/shop/") {
            $catFlag = true;
            array_splice($arResult, $i-1, 1);
            $arResult[$i-1]["TITLE"] = 'Каталог';
        }
    }
    if($catFlag) {
        if($arResult[$i]["LINK"] == "/personal/") {
            $catFlag = false;
            array_splice($arResult, $i-1, 1);
            $arResult[$i-1]["TITLE"] = 'Каталог';
        }
    }
    for ($j = 0; $j < $i; $j++) {
        if ($arResult[$i]["LINK"] == $arResult[$j]["LINK"]) {
            array_splice($arResult, $i, 1);
        }
    }
}

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize && $arResult[$index]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

    if ( $index == $itemSize - 1 && $APPLICATION->GetPageProperty( 'body_class' ) == 'product-page' )
    {
        $strReturn .= '
			<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="'.$arResult[$index]["LINK"].'" style="color: #fd7621; margin-left: -4px;">
				<span itemprop="name">'.$title.'</span></a>
				<meta itemprop="position" content="'.($index+1).'" />
			</li>
		';
    }elseif($arResult[$index]["LINK"] <> "" && $index != $itemSize)
    {
        $strReturn .= '
			<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem">
				<a itemprop="item" href="'.$arResult[$index]["LINK"].'">
					<span itemprop="name">'.$title.'</span></a>
				<meta itemprop="position" content="'.($index+1).'" />
			</li>
			<span class="jce-breadcrumbs-arrow">&#8594;</span>
		';
    }
	else
	{
		$strReturn .= '
			<li itemprop="itemListElement" itemscope
				itemtype="http://schema.org/ListItem">
				<span itemprop="name">'.$title.'</span>
				<meta itemprop="position" content="'.($index+1).'" />
			</li>
		';
	}
}

$strReturn .= '</ol>';

return $strReturn;

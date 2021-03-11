<?

if(!defined("B_PROLOG_INCLUDED") || (B_PROLOG_INCLUDED !== true))
{
	die();
}

$PictureWidth = 62;
$PictureHeight = 62;

?>
<?if(count($arResult["SEARCH"]) > 0): ?>
  
<?$totalItems = number_format(count($arResult["SEARCH"]), 0, ' ', ' ');?>  
<div class="title">¬ интернет-магазине найдено <strong><a href="/shop/search/index.php?q=<?=htmlspecialcharsex($_GET["q"]);?>"><?=$totalItems;?> товаров:</a></strong></div>
<ul class="list-search-products">
<?
foreach($arResult["ITEMS"] as $key => $arElement):

if ($key == 3)
	break;

$arFile = array();

$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>$arElement["IBLOCK_ID"], "ID" => $arElement["ID"]), false, false, array('DETAIL_PICTURE') );
if($ob = $res->GetNext()){ 
	if (!empty($ob["DETAIL_PICTURE"])):
		$arFile = CFile::ResizeImageGet($ob["DETAIL_PICTURE"], array('width'=>$PictureWidth, 'height'=>$PictureHeight), BX_RESIZE_IMAGE_PROPORTIONAL, true);	
		
		//$arFile = CFile::GetFileArray($ob["DETAIL_PICTURE"]);
	endif;
}

$price = CPrice::GetBasePrice($arElement['ID']);
?>
	<li>	
		<a class="close-link" title="<?=$arElement["NAME"]?>" href="<?=$arElement["DETAIL_PAGE_URL"]?>">
			<div class="visual">				
			<?if( !empty( $arFile ) ): ?>
				<img src="<?=$arFile["src"];?>" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" />
			<?else:?>
				<img src="<?=SITE_TEMPLATE_PATH?>/images/no-photo.png" width="62px" height="62px" alt="<?=$arElement['TITLE']?>" title="<?=$arElement['TITLE']?>" />
			<?endif;?> 
			</div>
			<div class="text">
				<?//=tz_find_search(TruncateText($arElement["NAME"], 38), htmlspecialcharsex($_GET["q"]));?> 
				<?=$arElement["NAME"]?><br/>
				<?=number_format($price["PRICE"], 2, ".", " ");?> руб
			</div>
		</a>
	</li>
<?endforeach;?>	

</ul>

<?endif;?>
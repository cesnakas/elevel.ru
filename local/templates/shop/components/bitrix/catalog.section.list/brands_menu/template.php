<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<script type="text/javascript" src="/js/jquery.scrollTo-1.4.3.1-min.js"></script>
					<div class="blockH1075">
					<!--noindex-->
<ul id="scroller">
<?
$CURRENT_DEPTH=$arResult["SECTION"]["DEPTH_LEVEL"]+1;
foreach($arResult["SECTIONS"] as $arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	if($CURRENT_DEPTH<$arSection["DEPTH_LEVEL"])
		echo "<ul>";
	elseif($CURRENT_DEPTH>$arSection["DEPTH_LEVEL"])
		echo str_repeat("</ul>", $CURRENT_DEPTH - $arSection["DEPTH_LEVEL"]);
	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
?>
	<li id="<?=$this->GetEditAreaId($arSection['ID']);?>">
	<?
	$par_url=explode('/',$_SERVER["REQUEST_URI"]);
	 
	?>
	<?$name_sec=explode(":",$arSection["NAME"]);
	$name_sec_end=explode("(",$name_sec[0]);
	?>
	<?if(in_array($arSection['CODE'],$par_url)):?>
	<a href="<?=$arSection["SECTION_PAGE_URL"]?>" style="font-size: 14px; font-weight: bold;"><?=$name_sec_end[0]?></a>
	<?else:?>
	<a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$name_sec_end[0]?></a>
	<?endif;?>
	</li>
<?endforeach?>
</ul>
<!--/noindex-->
</div>

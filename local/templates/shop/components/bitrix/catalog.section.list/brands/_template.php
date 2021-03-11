<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul  class="list172">
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
	<table>
						<tr><td><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><img src="<?=$arSection['PICTURE']['SRC']?>" alt="<?=$arSection["NAME"]?>" title="<?=$arSection["NAME"]?>"/></a>
						
						</td></tr>
						<tr><td>
						<?
						$name_sec=explode(":",$arSection["NAME"]);
						$name_sec_end=explode("(",$name_sec[0]);
						?>
						<span><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"];?></a></span></td></tr>
					</table>
					

	</li>
<?endforeach?>
</ul>


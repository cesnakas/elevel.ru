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
?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>#section-library" method="get" class="smartfilter form-library-filter clearfix">
	<?foreach($arResult["HIDDEN"] as $arItem):?>
		<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
	<?endforeach;?>
	
	<?
	//not prices
	foreach($arResult["ITEMS"] as $key=>$arItem)
	{
		if(
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
		
		$arCur = current($arItem["VALUES"]);
		switch ($arItem["DISPLAY_TYPE"])
		{
			case "P"://DROPDOWN
				$checkedItemExist = false;
				?>
				<select name="<?=$arCur["CONTROL_NAME_ALT"]?>">
					<option
						value=""
						id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
					><?=$arItem["NAME"]?></option>
					
					<?foreach ($arItem["VALUES"] as $val => $ar):?>
						<option
							name="<?=$ar["CONTROL_NAME_ALT"]?>"
							id="<?=$ar["CONTROL_ID"]?>"
							value="<? echo $ar["HTML_VALUE_ALT"] ?>"
							<? echo $ar["CHECKED"]? 'selected="selected"': '' ?>
							<? echo $ar["DISABLED"]? 'disabled': '' ?>
						>
							<?=$ar["VALUE"]?>
						</option>
					<?endforeach?>
				</select>
				<?
				break;
				
			case "A"://NUMBERS_WITH_SLIDER
			case "B"://NUMBERS
			case "G"://CHECKBOXES_WITH_PICTURES
			case "H"://CHECKBOXES_WITH_PICTURES_AND_LABELS
			case "R"://DROPDOWN_WITH_PICTURES_AND_LABELS
			case "K"://RADIO_BUTTONS
			case "U"://CALENDAR
			default://CHECKBOXES
				
				continue;
		}
	}
	?>
	
	<button class="button" type="submit" name="set_filter" value="Y">��������</button>
</form>
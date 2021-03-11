<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>

	<a class="open" href="">Поиск</a>
	<form class="popup" action="<?echo $arResult["FORM_ACTION"]?>">
		<fieldset>
			<input required id="<?echo $INPUT_ID?>" type="text" name="q" placeholder="Введите слово для поиска ..." type="text"/>
		</fieldset>
	</form>

<?endif?>
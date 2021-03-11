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

	<form class="search-form tablet-hidden popup-holder-search" action="<?echo $arResult["FORM_ACTION"]?>">
	
		<fieldset>
			<input id="<?echo $INPUT_ID?>" type="text" name="q" placeholder="Поиск по сайту ..." value="<?if(!empty($GET["q"])){echo "";};?>" maxlength="50" autocomplete="off" />
			<input value="Поиск" name="s" type="submit"/>

			<div class="popup-search">
				<div class="popup-inner-search" id="<?echo $CONTAINER_ID?>">
					
				</div>
			</div>
		</fieldset>
		
		<?/*
		<div class="row">
		
			<div class="query-container">
				<input id="<?echo $INPUT_ID?>" type="text" name="q"  class="w214" value="<?if(!empty($GET["q"])){echo "";};?>" placeholder="Поиск по сайту..." maxlength="50" autocomplete="off" />&nbsp;
			</div>

			<div class="select-container">
					
					<div id="search-category" class="search-category" >
						
						<span category="0"><!--Весь сайт <i class="tz-caret"></i>--></span>
						<!--
						<div class="list-cat">
							<span>Весь сайт <i class="tz-caret"></i></span>
							<ul>
								<li><span category="0">По всему сайту</span></li>
								<li><span category="1">Корпоративный сайт</span></li>
								<li><span category="2">Интернет - магазин</span></li>
							</ul>
						</div>-->
					
					</div>
			</div>
			<div class="search_btn">
				<input name="s" type="submit" class="btn22a" value="" />
			</div>

		</div>
		*/?>
	</form>

<?endif?>
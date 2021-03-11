<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<pre><?//print_r($arResult)?></pre>

<div id="order-call" class="lightbox">
	<h3>ЗАКАЗАТЬ ОБРАТНЫЙ ЗВОНОК</h3>
	<?=$arResult["FORM_HEADER"]?>
	
		<?=bitrix_sessid_post()?>
		
		<fieldset>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder required">
						<input <?if($arResult["QUESTIONS"]["fio"]["REQUIRED"] == "Y"):?>required<?endif;?> placeholder="Ф.И.О" name="<?=$arResult["QUESTIONS"]["fio"]["TAG_FIELD_NAME"]?>" placeholder="Ф.И.О" type="text" <?=$arResult["USER"]["NAME"]?> />
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder required">
						<input <?if($arResult["QUESTIONS"]["phone"]["REQUIRED"] == "Y"):?>required<?endif;?> name="<?=$arResult["QUESTIONS"]["phone"]["TAG_FIELD_NAME"]?>" placeholder="Телефон" id="callback_phone" type="text" <?=$arResult["USER"]["PHONE"]?> />
					</div>
				</div>
			</div>
			<span class="title">Выберите интересующий вопрос</span>
			<div class="form-row clearfix">
				<? $checkboxes_count = count($arResult["arAnswers"]["question"]);?>
				<div class="form-column">
					<?for($i = 0; $i < $checkboxes_count / 2; $i++):?>
						<? $answer = $arResult["arAnswers"]["question"][$i]; ?>
						<div class="check-row">
							<input id="check<?=$i?>" type="checkbox" name="<?=$arResult["QUESTIONS"]["question"]["TAG_FIELD_NAME"]?>" value="<?=$answer["ID"]?>" />
							<div class="label-holder">
								<label for="check<?=$i?>"><?=$answer["MESSAGE"]?></label>
							</div>
						</div>
					<?endfor;?>
				</div>
				<div class="form-column">
					<?for($i = $checkboxes_count / 2; $i < $checkboxes_count; $i++):?>
						<? $answer = $arResult["arAnswers"]["question"][$i]; ?>
						<div class="check-row">
							<input id="check<?=$i?>" type="checkbox" name="<?=$arResult["QUESTIONS"]["question"]["TAG_FIELD_NAME"]?>" value="<?=$answer["ID"]?>" />
							<div class="label-holder">
								<label for="check<?=$i?>"><?=$answer["MESSAGE"]?></label>
							</div>
						</div>
					<?endfor;?>
				</div>
			</div>
			<div class="text-required"><span class="text-orange">*</span> Поля, обязательные для заполнения</div>
			<div class="button-center">
				<div id="callback_errors" class="text-orange"></div>
				<button class="button" type="submit" name="web_form_submit" id="callback_submit">Заказать звонок</button>
			</div>
		</fieldset>
	<?=$arResult["FORM_FOOTER"]?>
</div>
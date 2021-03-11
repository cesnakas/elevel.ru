<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<section>
	<h2 class="headline-border">Обратная связь</h2>
	<?=$arResult["FORM_HEADER"]?>
		<fieldset>
			<div class="clearfix">
				<div class="form-column">
					<div class="input-holder <?if($arResult["QUESTIONS"]["fio"]["REQUIRED"] == "Y"):?>required<?endif;?>">
						<input <?if($arResult["QUESTIONS"]["fio"]["REQUIRED"] == "Y"):?>required<?endif;?> placeholder="Ф.И.О" name="<?=$arResult["QUESTIONS"]["fio"]["TAG_FIELD_NAME"]?>" type="text" <?=$arResult["USER"]["NAME"]?> />
					</div>
					<div class="input-holder <?if($arResult["QUESTIONS"]["email"]["REQUIRED"] == "Y"):?>required<?endif;?>">
						<input <?if($arResult["QUESTIONS"]["email"]["REQUIRED"] == "Y"):?>required<?endif;?> name="<?=$arResult["QUESTIONS"]["email"]["TAG_FIELD_NAME"]?>" placeholder="E-mail" type="text" id="request_email_magazin" <?=$arResult["USER"]["EMAIL"]?>/>
					</div>
					<div class="input-holder <?if($arResult["QUESTIONS"]["subject"]["REQUIRED"] == "Y"):?>required<?endif;?>">
						<input <?if($arResult["QUESTIONS"]["subject"]["REQUIRED"] == "Y"):?>required<?endif;?> placeholder="Тема" name="<?=$arResult["QUESTIONS"]["subject"]["TAG_FIELD_NAME"]?>" type="text"/>
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder <?if($arResult["QUESTIONS"]["message"]["REQUIRED"] == "Y"):?>required<?endif;?>">
						<textarea <?if($arResult["QUESTIONS"]["message"]["REQUIRED"] == "Y"):?>required<?endif;?> name="<?=$arResult["QUESTIONS"]["message"]["TAG_FIELD_NAME"]?>" placeholder="Текст сообщения" cols="30" rows="10"></textarea>
					</div>
				</div>
			</div>
			<div class="button-center">
				<div id="request_errors_magazin" class="text-orange"></div>
				<button class="button" type="submit" name="web_form_submit" id="request_submit_magazin">Отправить запрос</button>
				<div class="text-required"><span class="text-orange">*</span> Поля, обязательные для заполнения</div>
			</div>
		</fieldset>
	</form>
</section>
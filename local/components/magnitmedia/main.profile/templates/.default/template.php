<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

?>
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<form class="form-profile" name="form1" action="<?=$arResult["FORM_TARGET"]?>" method="post" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
	<fieldset>
		<?if(!empty($arResult['USER_FIELD_ENUM']['UF_USER_TYPE'])):?>
		<div class="check-row ownership">
			<?
			$entityChecked = false;
			foreach($arResult['USER_FIELD_ENUM']['UF_USER_TYPE'] as $arUserTypeEnum):
			
				if($arUserTypeEnum['XML_ID'] == "entity" && $arResult['USER_PROPERTIES']['DATA']['UF_USER_TYPE']['VALUE'] == $arUserTypeEnum['ID'])
					$entityChecked = true;
			?>
			<span class="mobile-row">
				<input <?if($arResult['USER_PROPERTIES']['DATA']['UF_USER_TYPE']['VALUE'] == $arUserTypeEnum['ID']):?>checked="checked" <?endif;?> class="<?=$arUserTypeEnum['XML_ID']?>" name="UF_USER_TYPE" id="<?=$arUserTypeEnum['XML_ID']?>" value="<?=$arUserTypeEnum['ID']?>" type="radio"/>
				<div class="label-holder <?=$arUserTypeEnum['XML_ID']?>">
					<label for="<?=$arUserTypeEnum['XML_ID']?>"><?=$arUserTypeEnum['VALUE']?></label>
				</div>
			</span>
			<?endforeach;?>
		</div>
		<?endif;?>
		<div class="form-row clearfix">
			<div class="form-column">
				<div class="input-holder">
					<?
					$fio = $arResult["arUser"]["LAST_NAME"];
					$fio .= ((strlen($fio) > 0 && strlen($arResult["arUser"]["NAME"]) > 0)?" ":"") . $arResult["arUser"]["NAME"];
					$fio .= ((strlen($fio) > 0 && strlen($arResult["arUser"]["SECOND_NAME"]) > 0)?" ":"") . $arResult["arUser"]["SECOND_NAME"];
					?>
					<input placeholder="<?=GetMessage('NAME')?>" id="profile_fio_input" type="text" name="FIO" maxlength="255" value="<?=$fio?>"/>
					<input type="text" id="profile_last_name_input" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>"/>
					<input type="text" id="profile_name_input" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>"/>
					<input type="text" id="profile_second_name_input" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>"/>
				</div>
			</div>
			<div class="form-column">
				<div class="input-holder required">
					<input required placeholder="<?=GetMessage('USER_PHONE')?>" type="text" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>"/>
				</div>
			</div>
		</div>
		<div class="form-row clearfix">
			<div class="form-column">
				<div class="input-holder required">
					<input required placeholder="<?=GetMessage('EMAIL')?>" type="text" name="LOGIN" maxlength="50" id="profile_login_input" value="<? echo $arResult["arUser"]["LOGIN"]?>"/>
					<input type="text" name="EMAIL" maxlength="50" id="profile_email_input" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
				</div>
			</div>
			<div class="form-column">
				<div class="input-holder">
					<input  placeholder="<?=GetMessage('USER_CITY')?>" type="text" name="PERSONAL_CITY" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>" />
				</div>
			</div>
		</div>
		<div class="form-row clearfix">
			<div class="form-column">
				<div class="input-holder">
					<input placeholder="<?=GetMessage('NEW_PASSWORD')?>" type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
				</div>
			</div>
			<div class="form-column">
				<div class="input-holder">
					<input placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" />
				</div>
			</div>
		</div>
		<div class="form-row clearfix">
			<div class="form-column">
				<div class="block-captcha">
					<?
					$captchaSid = $APPLICATION->CaptchaGetCode();
					?>
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$captchaSid?>" alt="CAPTCHA" />
					<input type="hidden" name="captcha_sid" value="<?=$captchaSid?>" />
				</div>
			</div>
			<div class="form-column">
				<div class="input-holder">
					<input required placeholder="Код с картинки" type="text" name="captcha_word"/>
				</div>
			</div>
		</div>
		<div class="entity-block <?if($entityChecked):?>visible<?endif;?>">
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_POSITION')?>" type="text" name="WORK_POSITION" maxlength="255" value="<?=$arResult["arUser"]["WORK_POSITION"]?>" />
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_INN')?>" type="text" name="UF_INN" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_INN"]['VALUE']?>" />
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_COMPANY')?>" type="text" name="WORK_COMPANY" maxlength="255" value="<?=$arResult["arUser"]["WORK_COMPANY"]?>" />
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_KPP')?>" type="text" name="UF_INN" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_INN"]['VALUE']?>" />
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_LEGAL_ADDRESS')?>" type="text" name="UF_LEGAL_ADDRESS" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_LEGAL_ADDRESS"]['VALUE']?>" />
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_ACTUAL_ADDRESS')?>" type="text" name="UF_ACTUAL_ADDRESS" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_ACTUAL_ADDRESS"]['VALUE']?>" />
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_MAILING_ADDRESS')?>" type="text" name="UF_MAILING_ADDRESS" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_MAILING_ADDRESS"]['VALUE']?>" />
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_CHECKING_ACCOUNT')?>" type="text" name="UF_CHECKING_ACCOUNT" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_CHECKING_ACCOUNT"]['VALUE']?>" />
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_BANK_NAME')?>" type="text" name="UF_BANK_NAME" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_BANK_NAME"]['VALUE']?>" />
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_BIK')?>" type="text" name="UF_BIK" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_BIK"]['VALUE']?>" />
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="<?=GetMessage('USER_CADASTRE_ACCOUNT')?>" type="text" name="UF_CADASTRE_ACCOUNT" maxlength="255" value="<?=$arResult['USER_PROPERTIES']['DATA']["UF_CADASTRE_ACCOUNT"]['VALUE']?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="check-row subscribe">
			<input type="hidden" value="0" name="UF_DISPATCH">
			<input id="subscribe" type="checkbox" name="UF_DISPATCH" <?if ($arResult['USER_PROPERTIES']['DATA']["UF_DISPATCH"]['VALUE']) echo "checked=\"checked\"";?> value="1"/>
			<div class="label-holder">
				<label for="subscribe"><?=GetMessage('USER_DISPATCH')?></label>
			</div>
		</div>
		<div class="button-center"><input class="button" name="save" type="submit" value="<?=GetMessage('SAVE')?>" /></div>
		<span class="note-required"><span class="text-orange sign-required">*</span> <?=GetMessage('NOTES')?></span>
	</fieldset>
</form>
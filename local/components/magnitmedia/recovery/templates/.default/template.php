<h1 class="headline-border">Заполните поля для восстановления пароля</h1>

<?=$arResult['SUCCESS']?>

<form class="form-password-recovery" action="" method="post" id="recovery-form">
	<fieldset>
		<div class="form-row input-holder required">
			<input required placeholder="E-mail, указанный при регистрации" type="text" name="email"/>
		</div>
		<div class="clearfix">
			<div class="form-column">
				<div class="block-captcha" style="padding: 4px 10px;">
					<?
					$captchaSid = $APPLICATION->CaptchaGetCode();
					?>
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$captchaSid?>" alt="CAPTCHA" />
					<input type="hidden" name="captcha_sid" value="<?=$captchaSid?>" />
				</div>
			</div>
			<div class="form-column">
				<div class="input-holder required">
					<input required placeholder="Код с картинки" type="text" name="captcha_word"/>
				</div>
			</div>
		</div>
		
		<div id="recovery-error" <? if ( $arResult['ERROR'] ): ?>style="display: block;"<? endif; ?>><?=$arResult['ERROR']?></div>
		
		<div class="button-center"><button class="button" type="submit" id="recovery-submit">Отправить</button></div>
		<input type="hidden" name="submit" value="y" />
	</fieldset>
</form>
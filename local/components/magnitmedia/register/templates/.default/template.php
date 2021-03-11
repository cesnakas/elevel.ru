<h1 class="headline-border">Регистрация</h1>
	<form class="form-register" action="" method="post" id="register-form">
		<fieldset>
			<div class="check-row ownership">
				<span class="mobile-row">
					<input checked="checked" name="ownership" id="individual" type="radio" value="1"/>
					<div class="label-holder">
						<label for="individual">Физическое лицо</label>
					</div>
				</span>
				<span class="mobile-row">
					<input class="entity" id="entity" name="ownership" type="radio" value="2"/>
					<div class="label-holder entity">
						<label for="entity">Юридическое лицо</label>
					</div>
				</span>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="Ф.И.О." type="text" name="fio"/>
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder required">
						<input required placeholder="Телефон" type="text" name="phone"/>
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder required">
						<input required placeholder="E-mail" type="text" name="email"/>
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="Город" type="text" name="city"/>
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder required">
						<input placeholder="Пароль" required type="password" name="password"/>
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder required">
						<input placeholder="Подтвердить пароль" required type="password" name="password_confirm"/>
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
			<div class="entity-block">
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Должность" type="text" name="post"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="ИНН" type="text" name="inn"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Наименование организации" type="text" name="company_name"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="КПП" type="text" name="kpp"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Юридический адрес" type="text" name="legal_address"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Фактический адрес" type="text" name="actual_address"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Почтовый адрес" type="text" name="mailing_address"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Расчетный счет" type="text" name="checking_account"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Наименование банка" type="text" name="bank_name"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="БИК" type="text" name="bik"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="Кадастровый счет" type="text" name="cadastre_account"/>
						</div>
					</div>
				</div>
			</div>
			<div class="check-row subscribe">
				<input id="subscribe" type="checkbox" name="subscribe"/>
				<div class="label-holder">
					<label for="subscribe">Я даю согласие на получение индивидуальных товарных предложений</label>
				</div>
			</div>
			<div class="check-row personal">
				<input id="personal" type="checkbox" checked="checked"/>
				<div class="label-holder">
					<label for="personal">Я даю согласие на обработку предоставленных персональных данных</label>
				</div>
			</div>
			<div class="button-center">
			
				<div id="register-error" <? if ( $arResult['ERROR'] ): ?>style="display: block;"<? endif; ?>><?=$arResult['ERROR']?></div>
			
				<button class="button" type="submit" id="register-submit">Зарегистрироваться</button>
				<input type="hidden" name="submit" value="y" />
				<span class="note-required"><span class="text-orange sign-required">*</span> Поля, обязательные для заполнения</span>
			</div>
		</fieldset>
	</form>
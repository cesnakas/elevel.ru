<h1 class="headline-border">�����������</h1>
	<form class="form-register" action="" method="post" id="register-form">
		<fieldset>
			<div class="check-row ownership">
				<span class="mobile-row">
					<input checked="checked" name="ownership" id="individual" type="radio" value="1"/>
					<div class="label-holder">
						<label for="individual">���������� ����</label>
					</div>
				</span>
				<span class="mobile-row">
					<input class="entity" id="entity" name="ownership" type="radio" value="2"/>
					<div class="label-holder entity">
						<label for="entity">����������� ����</label>
					</div>
				</span>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder">
						<input placeholder="�.�.�." type="text" name="fio"/>
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder required">
						<input required placeholder="�������" type="text" name="phone"/>
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
						<input placeholder="�����" type="text" name="city"/>
					</div>
				</div>
			</div>
			<div class="form-row clearfix">
				<div class="form-column">
					<div class="input-holder required">
						<input placeholder="������" required type="password" name="password"/>
					</div>
				</div>
				<div class="form-column">
					<div class="input-holder required">
						<input placeholder="����������� ������" required type="password" name="password_confirm"/>
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
						<input required placeholder="��� � ��������" type="text" name="captcha_word"/>
					</div>
				</div>
			</div>
			<div class="entity-block">
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="���������" type="text" name="post"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="���" type="text" name="inn"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="������������ �����������" type="text" name="company_name"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="���" type="text" name="kpp"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="����������� �����" type="text" name="legal_address"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="����������� �����" type="text" name="actual_address"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="�������� �����" type="text" name="mailing_address"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="��������� ����" type="text" name="checking_account"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="������������ �����" type="text" name="bank_name"/>
						</div>
					</div>
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="���" type="text" name="bik"/>
						</div>
					</div>
				</div>
				<div class="form-row clearfix">
					<div class="form-column">
						<div class="input-holder">
							<input placeholder="����������� ����" type="text" name="cadastre_account"/>
						</div>
					</div>
				</div>
			</div>
			<div class="check-row subscribe">
				<input id="subscribe" type="checkbox" name="subscribe"/>
				<div class="label-holder">
					<label for="subscribe">� ��� �������� �� ��������� �������������� �������� �����������</label>
				</div>
			</div>
			<div class="check-row personal">
				<input id="personal" type="checkbox" checked="checked"/>
				<div class="label-holder">
					<label for="personal">� ��� �������� �� ��������� ��������������� ������������ ������</label>
				</div>
			</div>
			<div class="button-center">
			
				<div id="register-error" <? if ( $arResult['ERROR'] ): ?>style="display: block;"<? endif; ?>><?=$arResult['ERROR']?></div>
			
				<button class="button" type="submit" id="register-submit">������������������</button>
				<input type="hidden" name="submit" value="y" />
				<span class="note-required"><span class="text-orange sign-required">*</span> ����, ������������ ��� ����������</span>
			</div>
		</fieldset>
	</form>
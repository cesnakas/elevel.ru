<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult["FORM_TYPE"] == "login"):?>
	<div id="sign" class="lightbox">
		<h3>Вход</h3>
		<span id="sign_errors" class="text-orange"></span>
		
		<?
		if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
			ShowMessage($arResult['ERROR_MESSAGE']);
		?>

		<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="/shop/ajax/auth.php">
			<fieldset>
				<?if($arResult["BACKURL"] <> ''):?>
					<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
				<?endif?>
				<?foreach ($arResult["POST"] as $key => $value):?>
					<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
				<?endforeach?>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />
					<input type="hidden" name="ajax_key" value="<?= md5('ajax_'.LICENSE_KEY)?>" />
					
					<div class="input-holder user">
						<input required placeholder="Логин или номер телефона" id="user_login" type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" />
					</div>
					
					<div class="input-holder password">
						<input placeholder="Пароль" type="password" id="user_pass" name="USER_PASSWORD" maxlength="50" autocomplete="off" />
					</div>
					
					<div class="bottom-row clearfix">
						<button class="button" type="submit">Вход</button>
						<ul class="links">
							<li><a href="/recovery/">Забыли пароль?</a></li>
							<li><a href="/register/">Регистрация</a></li>
						</ul>
					</div>		
			</fieldset>
		</form>
	</div>
<?endif;?>
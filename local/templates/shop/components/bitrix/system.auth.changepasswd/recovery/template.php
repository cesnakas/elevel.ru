<h1 class="headline-border">Заполните поля для восстановления пароля</h1>


<?
if ( $_POST['USER_PASSWORD'] != $_POST['USER_CONFIRM_PASSWORD'] )
{
	echo '<div>Пароли не совпадают.</div>';
}
else
{
	echo '<div>Ваш пароль успешно изменён.</div>';
}
?>


<?
ShowMessage($arParams["~AUTH_RESULT"]);
?>



<form class="form-password-recovery" method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform">
	<fieldset>
		
		<?if (strlen($arResult["BACKURL"]) > 0): ?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<? endif ?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="CHANGE_PWD">
	
		
		<div class="form-row input-holder required">
			<input required placeholder="Логин" type="text" name="USER_LOGIN" value="<?=$arResult["LAST_LOGIN"]?>"/>
		</div>
		
		<div class="form-row input-holder required">
			<input required placeholder="Контрольная строка" type="text" name="USER_CHECKWORD" value="<?=$arResult["USER_CHECKWORD"]?>"/>
		</div>
		
		<div class="form-row input-holder required">
			<input required placeholder="Новый пароль" type="password" name="USER_PASSWORD" value="<?=$arResult["USER_PASSWORD"]?>"/>
		</div>
		
		<div class="form-row input-holder required">
			<input required placeholder="Подтверждение пароля" type="password" name="USER_CONFIRM_PASSWORD" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>"/>
		</div>
		
		<div class="button-center">
			<button class="button" type="submit" name="change_pwd" >Изменить пароль</button>
		</div>


		
		<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>



	</fieldset>
</form>
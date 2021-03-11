<?
global $USER;
if ( !is_object( $USER ) )
{
	$USER = new CUser;
}



global $APPLICATION;
if ( !is_object( $APPLICATION ) )
{
	$APPLICATION = new CMain;
}



if ( $USER->IsAuthorized() )
{
	LocalRedirect( '/' );
}



if ( $_POST['submit'] == 'y' )
{
	
	if ( !$APPLICATION->CaptchaCheckCode( $_POST['captcha_word'], $_POST['captcha_sid'] ) )
	{
		$arResult['ERROR'] = 'Неверный код с картинки.';
	}
	else
	{
		$result = $USER->SendPassword( '', $_POST['email'] );
		
		if ( $result['TYPE'] == 'OK' )
		{
			$arResult['SUCCESS'] = '<div>На указанный адрес электронной почты было отправлено письмо с инструкциями по смене пароля.</div>';
		}
		else
		{
			$arResult['ERROR'] = 'Пользователь с указанным e-mail не найден';
		}
	}
}



$this->IncludeComponentTemplate();
?>
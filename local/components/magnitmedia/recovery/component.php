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
		$arResult['ERROR'] = '�������� ��� � ��������.';
	}
	else
	{
		$result = $USER->SendPassword( '', $_POST['email'] );
		
		if ( $result['TYPE'] == 'OK' )
		{
			$arResult['SUCCESS'] = '<div>�� ��������� ����� ����������� ����� ���� ���������� ������ � ������������ �� ����� ������.</div>';
		}
		else
		{
			$arResult['ERROR'] = '������������ � ��������� e-mail �� ������';
		}
	}
}



$this->IncludeComponentTemplate();
?>
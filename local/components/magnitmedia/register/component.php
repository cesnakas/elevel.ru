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
		if (strpos($_POST['fio'], "bit.") !== false) $arResult['ERROR'] = 'Спам запрещен.';		
		
		if (empty($arResult['ERROR']))
		{
			$arFio = explode( ' ', $_POST['fio'] );
		
			$us = new CUser;
			
			$arUserFields = Array(
				'LOGIN' => $_POST['email'],
				'LAST_NAME' => $arFio[0],
				'NAME' => $arFio[1],
				'SECOND_NAME' => $arFio[2],
				'EMAIL' => $_POST['email'],
				'PERSONAL_PHONE' => $_POST['phone'],
				'PASSWORD' => $_POST['password'],
				'CONFIRM_PASSWORD' => $_POST['password_confirm'],
				'WORK_COMPANY' => $_POST['company_name'],
				'UF_INN' => $_POST['inn'],
				'UF_KPP' => $_POST['kpp'],
				'UF_LEGAL_ADDRESS' => $_POST['legal_address'],
				'UF_ACTUAL_ADDRESS' => $_POST['actual_address'],
				'UF_MAILING_ADDRESS' => $_POST['mailing_address'],
				'UF_CHECKING_ACCOUNT' => $_POST['checking_account'],
				'UF_BANK_NAME' => $_POST['bank_name'],
				'UF_BIK' => $_POST['bik'],
				'UF_CADASTRE_ACCOUNT' => $_POST['cadastre_account'],
				'UF_USER_TYPE' => $_POST['ownership'],
				'PERSONAL_CITY' => $_POST['city'],
				'WORK_POSITION' => $_POST['post']
			);
			$userId = $us->Add( $arUserFields );
			
			if ( $userId )
			{		
				if ( $_POST['subscribe'] && CModule::IncludeModule( 'subscribe' ) )
				{
					$arSubscriptionFields = Array(
						'RUB_ID' => Array( 1 ),
						'SEND_CONFIRM' => 'N',
						'USER_ID' => $userId,
						'EMAIL' => $_POST['email'],
						'ACTIVE' => 'Y',
						'FORMAT' => 'html',
					);
					$subscr = new CSubscription;
					$subscr->Add( $arSubscriptionFields );
				}
		
				LocalRedirect( '/register/confirm.php' );
			}
			else
			{
				$arResult['ERROR'] = $us->LAST_ERROR;
			}
		}
	}
}



$this->IncludeComponentTemplate();
?>
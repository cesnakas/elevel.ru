<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?> 

<?if (strlen($_REQUEST['register'])>0):?> 

<?$APPLICATION->IncludeComponent(
	"elevel:main.register",
	"def-reg",
	Array(
		"USER_PROPERTY_NAME" => "",
		"SEF_MODE" => "N",
		"SHOW_FIELDS" => Array("NAME", "LAST_NAME", "PERSONAL_PHONE"),
		"REQUIRED_FIELDS" => Array(),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "/auth/regok.php",
		"SET_TITLE" => "Y",
		"USER_PROPERTY" => Array()
	)
);?> 

<?
else:
	global $USER;
if($_REQUEST['USER_EMAIL'])
{
$rsUser = CUser::GetByLogin($_REQUEST['USER_EMAIL']);
$arUser = $rsUser->Fetch();
$arGroups = CUser::GetUserGroup($arUser['ID']);
//echo "<pre>"; print_r($arGroups); echo "</pre>";
if (in_array(27, $arGroups) && !in_array(4, $arGroups))
LocalRedirect($APPLICATION->GetCurPageParam("USER_EMAIL=none_elevel_user&TYPE=SEND_PWD&AUTH_FORM=Y", array()));
}
	if (!$USER->IsAuthorized())
	{  
		$APPLICATION->AuthForm();
	}
	else 
	{
		LocalRedirect("/personal/user.php");
	}
endif;
?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["FORM_HEADER"] = str_replace("<form", '<form id="request_form"', $arResult["FORM_HEADER"]);

foreach($arResult["QUESTIONS"] as $SID => $arQuestion)
{
	if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "dropdown")
		$arResult["QUESTIONS"][$SID]["TAG_FIELD_NAME"] = "form_dropdown_shop";
	else
		$arResult["QUESTIONS"][$SID]["TAG_FIELD_NAME"] = "form_" . $arQuestion["STRUCTURE"][0]["FIELD_TYPE"] . "_" . $arQuestion["STRUCTURE"][0]["ID"];
	
}

$arResult["USER"] = array(
	"NAME" => "",
	"EMAIL" => "",
	"PHONE" => "",
);

global $USER;
if ($USER->IsAuthorized())
{
	$userBy = "id";
	$userOrder = "desc";

	$userFilter = array('ID' => $USER->GetID());

	$userParams = array(
		'SELECT' => array(),
		'NAV_PARAMS' => array(
			'nTopCount' => 1
		),
		'FIELDS' => array(
			'ID',
			'NAME',
			'PERSONAL_PHONE',
			'EMAIL'
		),
	);

	$rsUser = CUser::GetList(
		$userBy,
		$userOrder,
		$userFilter,
		$userParams
	);

	if ($arUser = $rsUser->Fetch())
	{
		if ($arUser["NAME"]) 	$arResult['USER']["NAME"] 	= 'value="'.$arUser["NAME"].'"';
		if ($arUser["EMAIL"]) 	$arResult['USER']["EMAIL"] 	= 'value="'.$arUser["EMAIL"].'"';
		if ($arUser["PERSONAL_PHONE"]) 	$arResult['USER']["PHONE"] 	= 'value="'.$arUser["PERSONAL_PHONE"].'"';
	}
}
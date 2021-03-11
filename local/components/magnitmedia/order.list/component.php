<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!CModule::IncludeModule("sale"))
{
	ShowError(GetMessage("SALE_MODULE_NOT_INSTALL"));
	return;
}
if (!$USER->IsAuthorized())
{
	$APPLICATION->AuthForm(GetMessage("SALE_ACCESS_DENIED"));
}

$arResult = array();

$arFilter = array(
	"USER_ID" => $USER->GetID(),
);
$dbOrder = CSaleOrder::GetList(array("DATE_INSERT" => "DESC"), $arFilter);

while($arOrder = $dbOrder->GetNext()){
	$arResult[] = $arOrder["ID"];
}

$this->IncludeComponentTemplate();
?>
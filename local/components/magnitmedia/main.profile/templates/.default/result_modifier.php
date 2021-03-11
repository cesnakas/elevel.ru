<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$rsEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_NAME"=>"UF_USER_TYPE")); 
while($arEnum = $rsEnum->GetNext()){
	$arResult['USER_FIELD_ENUM']['UF_USER_TYPE'][] = $arEnum;
}
?>
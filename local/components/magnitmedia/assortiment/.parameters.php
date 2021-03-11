<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */
/** @global CUserTypeManager $USER_FIELD_MANAGER */
global $USER_FIELD_MANAGER;

if(!\Bitrix\Main\Loader::includeModule("iblock"))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array();
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch())
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];

$arSections = array();
$sectionsFilter = Array('IBLOCK_ID' => $arCurrentValues['IBLOCK_ID'], 'DEPTH_LEVEL' => 1, "ACTIVE" => "Y");
$dbSections = CIBlockSection::GetList( array(), $sectionsFilter, false, array("NAME", "ID"));
while ( $arSection = $dbSections->GetNext() )
{
	$arSections[$arSection["ID"]] = "[".$arSection["ID"]."] ".$arSection["NAME"];
}

CModule::IncludeModule('highloadblock');
$arHLBlock = array();
$rsData = \Bitrix\Highloadblock\HighloadBlockTable::getList(array());
while ($arData = $rsData->fetch())
{
	$arHLBlock[$arData["ID"]] = "[".$arData["ID"]."] ".$arData["NAME"];
}

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => "Тип инфоблока",
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "Инфоблок",
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),
		"SECTION_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "Страница Ассортимента",
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arSections,
			"REFRESH" => "N",
		),
		"HL_BLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => "Справочник картинок производителей",
			"TYPE" => "LIST",
			"ADDITIONAL_VALUES" => "Y",
			"VALUES" => $arHLBlock,
			"REFRESH" => "N",
		),
		"CACHE_TIME"  =>  Array("DEFAULT"=>86400),
	),
);
?>
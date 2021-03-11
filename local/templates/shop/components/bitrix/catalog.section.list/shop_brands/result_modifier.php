<?
CModule::IncludeModule( 'iblock' );

$arFilter = Array(
	'IBLOCK_ID' => 83,
	'ACTIVE' => 'Y',
	'!PROPERTY_PRODUCER' => false
);
$arSelect = Array(
	'ID',
	'PROPERTY_PRODUCER'
);
$dbItems = CIBlockElement::GetList( Array(), $arFilter, false, false, $arSelect );
while ( $arItem = $dbItems->Fetch() )
{
	$arResult['ITEMS_COUNT'][$arItem['PROPERTY_PRODUCER_VALUE']]++;
}
?>
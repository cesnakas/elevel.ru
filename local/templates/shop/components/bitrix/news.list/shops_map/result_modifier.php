<?
if ( !empty( $arResult['ITEMS'] ) )
{
	$arSectionsIds = Array();
	
	foreach ( $arResult['ITEMS'] as $arItem )
	{
		$arSectionsIds[] = $arItem['IBLOCK_SECTION_ID'];
	}
	
	
	if ( !empty( $arSectionsIds ) )
	{
		$arFilter = Array(
			'IBLOCK_ID' => $arParams['IBLOCK_ID']
		);
		$arSelect = Array(
			'ID',
			'NAME'
		);
		$dbSections = CIBlockSection::GetList( Array(), $arFilter, false, $arSelect );
		while ( $arSection = $dbSections->Fetch() )
		{
			$arResult['SECTIONS_NAMES'][$arSection['ID']] = $arSection['NAME'];
		}
	}
}
?>
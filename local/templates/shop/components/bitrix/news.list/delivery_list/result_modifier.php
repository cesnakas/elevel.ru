<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule( 'iblock' );

if ( $arParams['CITY_NAME'] == 'Москва' ):
	$arParams['CITY_NAME'] = 'Москва и Московская область';
endif;

foreach($arResult["ITEMS"] as $key => $arItem):
	if($arItem['CODE'] == 'pickup')
		$arResult['KEY_PICKUP'] = $key;
endforeach;

if( !empty($arResult['KEY_PICKUP']) ):

	$arFilter = array(
		'IBLOCK_ID' => SHOPS_IBLOCK_ID,
		'NAME' => $arParams['CITY_NAME'],
		); 
	$rsSect = CIBlockSection::GetList(array(),$arFilter, false, array('ID'));
	
	if ($arSect = $rsSect->GetNext()):
		$SectionID = $arSect['ID'];
	endif;

	if( !empty($SectionID) ):
		$arPickupsSort = Array(
			'SORT' => 'ASC',
			'ID' => 'ASC'
		);
		$arPickupsFilter = Array(
			'IBLOCK_ID' => SHOPS_IBLOCK_ID,
			'ACTIVE' => 'Y',
			"SECTION_ID" => $SectionID,
		);
		$arPickupsSelect = Array(		
			'NAME',
			'PROPERTY_COORDS',
			'PROPERTY_PHONE',
		);
		$dbPickups = CIBlockElement::GetList( $arPickupsSort, $arPickupsFilter, false, false, $arPickupsSelect );
		while ( $arPickup = $dbPickups->Fetch() )
		{
			$arResult['PICKUP'][] = Array(
				'NAME' => $arPickup['NAME'],			
				'COORDS' => $arPickup['PROPERTY_COORDS_VALUE'],			
				'PHONE' => $arPickup['PROPERTY_PHONE_VALUE'],			
			);
		}
		
		$arResult["FAIL"] = "not fail";
	else:
		$arResult["FAIL"] = "fail";
		unset($arResult["ITEMS"][ $arResult['KEY_PICKUP'] ]);
	endif;	
	
endif;	
?>
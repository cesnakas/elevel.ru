<?
if ( $this->StartResultCache( $arParams["CACHE_TIME"] ) )
{
	CModule::IncludeModule( 'iblock' );
	
	$rsParentSection = CIBlockSection::GetByID($arParams["SECTION_ID"]);
	if ($arParentSection = $rsParentSection->GetNext())
	{
		$arPageDataOrder = Array(
			'ID' => 'ASC',
			'LEFT_MARGIN' => 'ASC',
		);

		$arPageDataSelect = Array(
			'ID',
			'NAME',
			'DEPTH_LEVEL',
			'IBLOCK_SECTION_ID',
			'UF_DATA_TYPE'
		);
		
		$arPageDataFilter = Array(
			'IBLOCK_ID' => $arParentSection['IBLOCK_ID'],
			'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],
			'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],
			'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL'],
			"ACTIVE" => "Y"
		);
		
		$producerNames = array();
		
		$dbPageData = CIBlockSection::GetList( $arPageDataOrder, $arPageDataFilter, false, $arPageDataSelect);
		while ( $arPageData = $dbPageData->GetNext() )
		{
			if ($arPageData["UF_DATA_TYPE"] == UF_DATA_TYPE_SECTION) // разделы
			{
				if ($arPageData["NAME"] = trim($arPageData["NAME"]))
					$arResult["SECTIONS"][] = $arPageData["NAME"];
			}
			elseif ($arPageData["UF_DATA_TYPE"] == UF_DATA_TYPE_PRODUCER) // производители
			{
				if ($arPageData["ID"] && $arPageData["NAME"] = trim($arPageData["NAME"]))
				{
					$arResult["PRODUCERS"][ $arPageData["ID"] ]["NAME"] = $arPageData["NAME"];
					
					$producerNames[] = $arPageData["NAME"];
				}
			}
			elseif ($arPageData["UF_DATA_TYPE"] == UF_DATA_TYPE_SERIE) // серии
			{
				if ($arPageData["ID"] && $arPageData["IBLOCK_SECTION_ID"] && $arPageData["NAME"] = trim($arPageData["NAME"]))
				{
					if (isset($arResult["PRODUCERS"][ $arPageData["IBLOCK_SECTION_ID"] ]))
					{
						$arResult["PRODUCERS"][ $arPageData["IBLOCK_SECTION_ID"] ]["SERIES"][] = $arPageData["NAME"];
					}
				}
			}
		}
		
		// получаем картинки производителей из HL-блока
		if (count($producerNames) > 0)
		{
			$producerName2picture = array();
			
			if (CModule::IncludeModule('highloadblock')) {
				$arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById($arParams["HL_BLOCK_ID"])->fetch();
				$obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
				$strEntityDataClass = $obEntity->getDataClass();

				$rsData = $strEntityDataClass::getList(array(
					'select' => array('ID','UF_PRODUCER','UF_PICTURE','UF_HEIGHT'),
					'order' => array('ID' => 'ASC'),
					'filter' => array('UF_PRODUCER' => $producerNames)
				));
				
				while ($arItem = $rsData->Fetch()) {
					if ($arItem["UF_PRODUCER"] && $arItem["UF_PICTURE"])
						$producerName2picture[ $arItem["UF_PRODUCER"] ] = array(
							"SRC" => CFile::GetPath($arItem["UF_PICTURE"]),
							"HEIGHT" => $arItem["UF_HEIGHT"]
						);
				}
			}
		}
		
		if (count($producerName2picture) > 0)
		{
			foreach($arResult["PRODUCERS"] as &$producer)
			{
				if (isset($producerName2picture[ $producer["NAME"] ]))
					$producer["PICTURE"] = $producerName2picture[ $producer["NAME"] ];
			}
		}
	}
	
	$this->IncludeComponentTemplate();
}
?>
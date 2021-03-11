<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();



$arIBlocks = array();

$image_path = $this->GetFolder()."/images/";
$abs_path = $_SERVER["DOCUMENT_ROOT"].$image_path;

CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");

$arItemIDs = array();
$id2image = array();
$id2price = array();

foreach($arResult["CATEGORIES"] as $category_id => $arCategory)
{
	foreach($arCategory["ITEMS"] as $i => $arItem)
	{
		if(isset($arItem["ITEM_ID"]))
			$arResult["SEARCH"][] = &$arResult["CATEGORIES"][$category_id]["ITEMS"][$i];
		
		$arItemIDs[] = $arItem["ITEM_ID"];
	}
}

if (count($arItemIDs) > 0)
{	
	$arFilter = Array(
		"ID" => $arItemIDs
	);

	$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("ID", "PROPERTY_IMAGES"));
	while($ar_fields = $res->GetNext())
	{
		if ($ar_fields["PROPERTY_IMAGES_VALUE"])
		{
			if (!isset($id2image[ $ar_fields["ID"] ]))
			{
				$image_src = $ar_fields["PROPERTY_IMAGES_VALUE"];
				$tmp_image_src = $_SERVER["DOCUMENT_ROOT"] . "/upload/tmp_resize/" . basename($image_src);

				// TODO ресайз фотки
				
				
				/*$arFile = CFile::MakeFileArray($ar_fields["PROPERTY_IMAGES_VALUE"]);
				$file = CFile::ResizeImageGet($arFile, array('width'=>82, 'height'=>74), BX_RESIZE_IMAGE_PROPORTIONAL);*/
				
				/*CFile::ResizeImageFile(
					$image_src, 
					$tmp_image_src, 
					array('width'=>82, 'height'=>74), 
					BX_RESIZE_IMAGE_PROPORTIONAL
				);*/
				
				$id2image[ $ar_fields["ID"] ] = $image_src = $ar_fields["PROPERTY_IMAGES_VALUE"];
				
			}
		}
	}


	$dbProductPrice = CPrice::GetListEx(
		array(),
		array("PRODUCT_ID" => $arItemIDs, "CATALOG_GROUP_ID" => 3),
		false,
		false,
		array("PRODUCT_ID", "PRICE")
	);

	while ($price = $dbProductPrice->GetNext())
	{
		$id2price[ $price["PRODUCT_ID"] ] = $price["PRICE"];
	}

	foreach($arResult["CATEGORIES"] as $category_id => $arCategory)
	{
		foreach($arCategory["ITEMS"] as $i => $arItem)
		{
			if(isset($id2image[ $arItem["ITEM_ID"] ]))
				$arResult["CATEGORIES"][$category_id]["ITEMS"][$i]["ICON"] = $id2image[ $arItem["ITEM_ID"] ];
			
			if(isset($id2price[ $arItem["ITEM_ID"] ]))
				$arResult["CATEGORIES"][$category_id]["ITEMS"][$i]["PRICE"] = $id2price[ $arItem["ITEM_ID"] ];
		}
	}
}


// Список разделов каталога для поиска. Отключен из за невозможности стандартного поиска Битрикс по подразделам.
/*
// 25.08.2017, ownedmuhaha
// Список разделов первого уровня для выбора области поиска
$arSectionsOrder = Array(
	'SORT' => 'ASC',
	'NAME' => 'ASC'
);
$arSectionsFilter = Array(
	'IBLOCK_ID' => 83,
	'ACTIVE' => 'Y',
	'DEPTH_LEVEL' => 1
);
$arSectionsSelect = Array(
	'ID',
	'NAME'
);
$dbSections = CIBlockSection::GetList( $arSectionsOrder, $arSectionsFilter, false, $arSectionsSelect );
while ( $arSection = $dbSections->Fetch() )
{
	$arResult['SECTIONS'][] = $arSection;
}
//------------------------
 */
?>
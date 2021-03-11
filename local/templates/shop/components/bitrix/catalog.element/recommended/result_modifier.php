<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
// echo "<pre>";
// print_r($arResult);
// echo "</pre>";

function similarID($ID,$PRODUCER_ID){
	$csvName = "";
	if($PRODUCER_ID == 45895)//ABB
	{
		$csvName = $_SERVER['DOCUMENT_ROOT']."/tools/recommended/abb.csv";
	}
	elseif($PRODUCER_ID == 45941)//Legrand
	{
		$csvName = $_SERVER['DOCUMENT_ROOT']."/tools/recommended/legrand.csv";
	}
	else
	{
		return array();
	}
	$arrSimilar = array();
	if (($handle = fopen($csvName, "r")) !== FALSE) 
	{
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
		{
			if($data[0]==$ID)
			{
				
				//echo "similar: ";
				//echo "<pre>";
				//print_r($data);
				//echo "</pre>";
				for($i=2;$i<9;$i++)
				{
					if(!empty($data[$i]))
					{
						//echo $data[$i].", ";
						$arrSimilar[]=intval($data[$i]);
					}
				}
				//echo "<br>";
			}
		}
		fclose($handle);
	}
	return $arrSimilar;
}

$arrSimilarRes = similarID($arResult['ID'],$arResult['PROPERTIES']['PRODUCER']['VALUE']);

$arSimilarProd = array();

if(!empty($arrSimilarRes))
{
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "CATALOG_PRICE_3", "DETAIL_PAGE_URL");
	$arFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ID" => $arrSimilarRes);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	//print_r($res);
	while($ar_fields = $res->GetNext())
	{
		//echo "похожий товар: <br>";
		
		//echo "<pre>";
		//print_r($ar_fields);
		//echo "<pre>";
		
		//$picture = CFile::GetPath($ar_fields["PREVIEW_PICTURE"]);
		$pictureArr = CFile::ResizeImageGet($ar_fields["PREVIEW_PICTURE"], array('width'=>'150', 'height'=>'150'), BX_RESIZE_IMAGE_EXACT, true);
		$picture = $pictureArr['src'];
		if(empty($picture))
		{
			$picture = "/local/templates/amperkin_art/components/bitrix/catalog.element/adaptive/images/no_photo.png";
		}
		
		$arSimilarProd[] = array(
			"ID"=>$ar_fields['ID'],
			"NAME"=>$ar_fields['NAME'],
			"CATALOG_PRICE_1"=>$ar_fields['CATALOG_PRICE_3'],
			"PICTURE_SRC"=>$picture,
			"DETAIL_PAGE_URL"=>$ar_fields["DETAIL_PAGE_URL"],
            "CATALOG_QUANTITY"=>$ar_fields["CATALOG_QUANTITY"],
		);
		//echo "</pre><br>--------------------------<br>";
	}
}
$arResult['SIMILAR_PROD'] = $arSimilarProd;

// additional goods
$arAgCats = Array(46927, 46924, 46929, 46836); // IDs // 46927 - safety apparel, 46924 - electro tools, 46929 - measurement tools, 46836 - tape and others
$arAgSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "CATALOG_PRICE_3", "DETAIL_PAGE_URL", "CATALOG_QUANTITY"); // поля для выборки сопуствующих товаров
$arAgResult = array();
foreach ($arAgCats as $catID) {
    $arAgFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID" => $catID,">CATALOG_QUANTITY" => 1 ,"!ID" => $arResult["ID"]); // фильтр для выборки
    $agListTemp = CIBlockElement::GetList(array('rand'=>'ASC'), $arAgFilter,  false, array('nTopCount'=>4), $arAgSelect);
    while($arAg_field = $agListTemp->GetNext()) {

        $picArr = CFile::ResizeImageGet($arAg_field["PREVIEW_PICTURE"], array('width'=>'200', 'height'=>'200'), BX_RESIZE_IMAGE_EXACT, true);
        //$pic = "/local/templates/shop/components/bitrix/catalog.element/recommended/images/no_photo.png";
        $pic = $picArr['src'];
        if(empty($pic))
        {
            $pic = "/local/templates/shop/components/bitrix/catalog.element/recommended/images/no_photo.png";
        }

        $arAgResult[] = array(
            "ID"=>$arAg_field['ID'],
            "NAME"=>$arAg_field['NAME'],
            "CATALOG_PRICE_1"=>$arAg_field['CATALOG_PRICE_3'],
            "PICTURE_SRC"=>$pic,
            "DETAIL_PAGE_URL"=>$arAg_field["DETAIL_PAGE_URL"],
            "CATALOG_QUANTITY"=>$arAg_field["CATALOG_QUANTITY"],
        );
    }
    unset($agListTemp);
}
shuffle($arAgResult);
$arResult['Add_Goods'] = $arAgResult;
unset($arAgCats, $arAgSelect, $arAgResult);


<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $$arParams["FILTER_NAME"];
$filter = $$arParams["FILTER_NAME"];
foreach($filter as $property => $filterValue)
{
	preg_match("/(?<=PROPERTY_).*?(?=_VALUE)/", $property, $results);
	
	if ( $results && !empty($results) )
	{
		if ($results[0]) $property_code = $results[0];
	}
	
	if ($property_code)
	{
		foreach($arResult["ITEMS"] as $key => $arItem)
		{
			if ($arItem["CODE"] == $property_code)
			{
				foreach($arItem["VALUES"] as $id => $itemValue)
				{
					if ($itemValue["VALUE"] == $filterValue)
					{
						$arResult["ITEMS"][$key]["VALUES"][$id]["CHECKED"] = "Y";
						break;
					}
				}
				
				break;
			}
		}
	}
	
	unset($results);
}

foreach($arResult["ITEMS"] as $key => &$arItem)
{
	if ($arItem["CODE"] == "YEAR")
	{
		usort($arItem["VALUES"], "sortYear"); 
	}
}

function sortYear($a, $b)  
{ 
	 if ($a["VALUE"] == $b["VALUE"]) {
        return 0;
    }
    return ($a["VALUE"] > $b["VALUE"]) ? -1 : 1;
}
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
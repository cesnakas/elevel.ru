<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
$brands_ids = array();
$brands_names = array();
$FILTERS_BOTTOM = "";
//echo "1231331321";
foreach($arResult["ITEMS"] as $i => &$arItem)
{
	if (!isset($arItem["PRICE"]))
	{
		
		$FILTERS_BOTTOM.="";
		$code = $arItem["CODE"];
		
		if ($arItem["CODE"] == "PRODUCER")
		{
			$producer_property_id = $i;
			
			foreach($arItem["VALUES"] as $id => $value)
			{
				$brands_ids[] = $id;
				
				if (isset($value["CHECKED"]) && $value["CHECKED"])
					$brands_names[] = ltrim($value["VALUE"], "."); // ltrim ����� ��� �������� ����� � ������ �������� ������
			}
		}
		
		$disabled = true; $filtered = false;
		foreach($arItem["VALUES"] as $value)
		{
			if ($value["CHECKED"])		$filtered = true;
			if (!$value["DISABLED"])	$disabled = false;
				
			if ($filtered && !$disabled) break;
		}
		
		$arItem["FILTERED"] = $filtered;
		$arItem["DISABLED"] = $disabled;
		
		$arResult["ITEMS_CODE"][$code] = $arItem;
	}
}

// �������� �������� ��� �������
if ($producer_property_id && count($brands_ids) > 0)
{
	$arFilter = array('IBLOCK_ID' => IBLOCK_BRAND_ID, "ID" => $brands_ids, "GLOBAL_ACTIVE" => "Y");
	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc', "sort" => "asc", "id" => "asc"), $arFilter, false, array("ID", "PICTURE", "CODE"));
	while ($arSect = $rsSect->GetNext())
	{
		$id = $arSect["ID"];
		
		$arPhotoSmall = CFile::ResizeImageGet($arSect["PICTURE"], array('width'=>91, 'height'=>29), BX_RESIZE_IMAGE_PROPORTIONAL, Array("name" => "sharpen", "precision" => 0));
		$arResult["ITEMS"][$producer_property_id]["VALUES"][$id]["PICTURE"] = $arPhotoSmall["src"];
		$arResult["ITEMS_CODE"]["PRODUCER"]["VALUES"][$id]["PICTURE"] = $arPhotoSmall["src"];
	}
}

// �������� ����������
$arFilter = array('IBLOCK_ID' => $arResult["SECTION"]["IBLOCK_ID"], "SECTION_ID" => $arResult["SECTION"]["ID"], "GLOBAL_ACTIVE" => "Y");
$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc', "sort" => "asc", "id" => "asc"), $arFilter, false, array("NAME", "SECTION_PAGE_URL"));
while ($arSect = $rsSect->GetNext())
{
	$arResult["SECTIONS"][] = $arSect;
}

// �������� �� action ����� ���������� � ���������� �������
$form_action_data = explode("?", $arResult["FORM_ACTION"]);
if ($form_action_data[1])
{
	$action_params = explode("&", $form_action_data[1]);
	foreach($action_params as $id => $param_and_value)
	{
		$param_data = explode("=", $param_and_value);
		
		if (in_array($param_data[0], array("count", "sort", "order")))
			unset($action_params[$id]);
	}
	
	$form_action_data[1] = implode("&", $action_params);
	$arResult["FORM_ACTION"] = implode("?", $form_action_data);
}

// �������� ����� �� HIDDEN
foreach($arResult["HIDDEN"] as $id => $field)
{
	if (in_array($field["CONTROL_NAME"], array("count", "sort", "order")))
		unset($arResult["HIDDEN"][$id]);
}

// ���� ������� ������� ������������� �� ������ - ���������� � ���������� �������
$APPLICATION->SetPageProperty("description", $arResult["SECTION"]["NAME"] . ' - ��������� �����, � ����� � ������� � ��������-�������� ������ � ��������� �� ������. ��������������, ����, ������ ����������');
if (!empty($brands_names))
{
	$this->SetViewTarget('brands_filtered');
		echo " " . implode(", ", $brands_names);
		$APPLICATION->SetPageProperty("description", $arResult["SECTION"]["NAME"] . " " . implode(", ", $brands_names) . ' - ��������� �����, � ����� � ������� � ��������-�������� ������ � ��������� �� ������. ��������������, ����, ������ ����������');
	$this->EndViewTarget();
}

// ��� ����������� ������� ������� ��� �������� ������� �� GET
if (isset($_GET["del_filter"]) && !empty($_GET["del_filter"]))
{
	foreach($_GET as $name => $value)
	{
		if (substr($name, 0, 9) == "arrFilter")
			unset($_GET[$name]);
	}
}
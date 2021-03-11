<?
if ($arResult["DETAIL_PICTURE"]["SRC"])
{
	$arPhotoSmall = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array('width'=>1276, 'height'=>480), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, Array("name" => "sharpen", "precision" => 0));
	$arResult["PICTURE"] = $arPhotoSmall["src"];
}

if ($arResult["IBLOCK_SECTION_ID"])
{
	$obParser = new CTextParser;
	$arFilter = array("!ID" => $arResult["ID"], "IBLOCK_ID" => $arResult["IBLOCK_ID"], "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"], "GLOBAL_ACTIVE" => "Y", "ACTIVE" => "Y");
	$res = CIBlockElement::GetList(Array("active_from"=>"desc"), $arFilter, Array("DATE_ACTIVE_FROM", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "DETAIL_PICTURE", "DETAIL_PAGE_URL"));
	$i = 0;
	while($ar_fields = $res->GetNext())
	{
		if ($ar_fields["DETAIL_PICTURE"]["SRC"])
		{
			$arPhotoSmall = CFile::ResizeImageGet($ar_fields["DETAIL_PICTURE"], array('width'=>305, 'height'=>241), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, Array("name" => "sharpen", "precision" => 0));
			$ar_fields["PICTURE"] = $arPhotoSmall["src"];
		}	
				
		if ($ar_fields["~PREVIEW_TEXT"])
		{	
			$ar_fields["SHORT_TEXT"] = $obParser->html_cut($ar_fields["~PREVIEW_TEXT"], 150);			
			$ar_fields["SHORT_TEXT"] = mb_substr($ar_fields["SHORT_TEXT"], 0, mb_strrpos($ar_fields["SHORT_TEXT"],' '));		
		}
				
		if ($ar_fields["DATE_ACTIVE_FROM"])
		{
			$ar_fields["DISPLAY_ACTIVE_FROM"] = CIBlockFormatProperties::DateFormat("SHORT", MakeTimeStamp($arResult["DATE_ACTIVE_FROM"], CSite::GetDateFormat()));
		}
		
		$arResult["MORE_ARTICLES"][] = $ar_fields;
		$i++;
		
		if ($i > 2) break;
	}	
}